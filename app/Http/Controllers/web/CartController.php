<?php

namespace App\Http\Controllers\web;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    private $menu_categories;

    public function __construct()
    {
        $this->menu_categories = Category::with('subcategory.childCategories')
            ->where('publish', 'Publish')
            ->latest('id')
            ->get()
            ->toArray();

        view()->share('menu_categories', $this->menu_categories);
    }
    
    public function cart()
    {
        $data['cartContent'] = Cart::content();
        return view('web.pages.cart', $data);
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        
        if($product == null){
            return response()->json([
                'status' => false,
                'message' => 'Product Not Found'
            ]);
        }

        if(Cart::count() > 0){
            $cartContent = Cart::content();
            $productAlreadyExist = false;

            foreach($cartContent as $item){
                if($item->id == $product->id){
                    $productAlreadyExist = true;
                }
            }

            if($productAlreadyExist == false){
                Cart::add($product->id, $product->title, 1, $product->price, ['productImage' => (!empty($product->main_image)) ? $product->main_image : '']);
                $status = true;
                $message = $product->title . " added in cart";
            } else {
                $status = false;
                $message = $product->title . " already added in cart";
            }
        } else {
            Cart::add($product->id, $product->title, 1, $product->price, ['productImage' => (!empty($product->main_image)) ? $product->main_image : '']);
            $status = true;
            $message = $product->title . " added in cart";
        }

        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }

    public function updateCart(Request $request)
    {
        $rowId = $request->rowId;
        $qty = $request->qty;
        Cart::update($rowId, $qty);

        $message = 'Cart updated successfully';
        session()->flash('success', $message);
        return response()->json([
            'status' => true,
            'message' => $message
        ]);
    }

    public function checkout()
    {
        if(Cart::count() == 0){
            return redirect()->route('web.view.cart');
        }
        else{
            return view('web.pages.checkout');
        }
    }
}
