<?php

namespace App\Http\Controllers\web;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ShipingDetail;

class CartController extends Controller
{
    private $menu_categories;

    public function __construct()
    {
        $this->menu_categories = Category::where('status', 'Active')
            ->with(['subcategory' => function ($query) {
                $query->where('status', 'Active')
                    ->with(['childCategories' => function ($query) {
                        $query->where('status', 'Active');
                    }]);
            }])
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
        $variant_id =  $request->variantId ?? NULL;
        $quantity =  $request->quantity ?? 1;
        $cartItems = collect(Cart::content());
        $prod_id = $request->id;

        $variant = null;
        if ($variant_id) {
            $variant = ProductVariant::find($variant_id);
        }

        $item = $cartItems->filter(function ($value) use ($prod_id) {
            return strpos($value->id, $prod_id) !== false;
        });

        if (($product->min_buy && $quantity < $product->min_buy && count($item) == 0)) {
            return response()->json([
                'status' => false,
                'message' => 'Buy minimum ' . $product->min_buy . ' quantity'
            ]);
        }

        if (count($item) == 0) {
            if ($product->max_buy && $quantity > $product->max_buy) {
                return response()->json([
                    'status' => false,
                    'message' => 'Max buy ' . $product->max_buy . ' quantity'
                ]);
            }
        } else {
            $sumOfQty = $item->sum('qty');
            if ($product->max_buy && ($quantity + $sumOfQty > $product->max_buy)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Max buy ' . $product->max_buy . ' quantity.' . ' you already add ' . $sumOfQty
                ]);
            }
        }

        if ($product == null) {
            return response()->json([
                'status' => false,
                'message' => 'Product Not Found'
            ]);
        }

        // if(Cart::count() > 0){
        //     $cartContent = Cart::content();
        //     $productAlreadyExist = false;

        //     foreach($cartContent as $item){
        //         if($item->id == $product->id){
        //             $productAlreadyExist = true;
        //         }
        //     }

        //     if($productAlreadyExist == false){
        //         if($variant){
        //             Cart::add($variant->id, $product->title, $quantity, $variant->price, ['productImage' => (!empty($product->main_image)) ? $product->main_image : '']);
        //         }
        //         else{
        //             Cart::add($product->id, $product->title, $quantity, $product->price, ['productImage' => (!empty($product->main_image)) ? $product->main_image : '']);
        //         }

        //         $status = true;
        //         $message = $product->title . " added in cart 1";
        //     } else {
        //         $status = false;
        //         $message = $product->title . " already added in cart";
        //     }
        // } else {

        //     if($variant){
        //         Cart::add($variant->id, $product->title, $quantity, $variant->price, ['productImage' => (!empty($product->main_image)) ? $product->main_image : '']);
        //     }
        //     else{
        //         Cart::add($product->id, $product->title, $quantity, $product->price, ['productImage' => (!empty($product->main_image)) ? $product->main_image : '']);
        //     }

        //     $status = true;
        //     $message = $product->title . " added in cart 2";
        // }

        if ($variant) {
            $vart_type = explode(';', $variant->title);
            $vart_value = explode(';', $variant->value);
            $var_info = '<br>';
            foreach ($vart_type as $key => $type) {
                $var_info .= "<b>$type:</b> {$vart_value[$key]}";
                if ($key < count($vart_type) - 1) {
                    $var_info .= ', ';
                }
            }
            $variant['new_var_info'] = $var_info;
            Cart::add($product->id . '_' . $variant->id, $product->title , $quantity, $variant->price, ['productImage' => (!empty($product->main_image)) ? $product->main_image : '', 'variant_info' => $variant, 'slug' => $product->slug]);
        } else {
            Cart::add($product->id, $product->title, $quantity, $product->price, ['productImage' => (!empty($product->main_image)) ? $product->main_image : '', 'slug' => $product->slug]);
        }

        $status = true;
        $message = $product->title . " added in cart 2";

        return response()->json([
            'status'    => $status,
            'message'   => $message,
            'count'     => Cart::count(),
            'subtotal'  => Cart::subTotal(),
            'cartItems' => Cart::content()
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

    public function deleteItem(Request $request)
    {
        $rowId = $request->rowId;
        $isMini = $request->isMini;
        $itemInfo = Cart::get($rowId);

        if ($itemInfo == null) {
            $message = "Item not found";
            session()->flash('false', $message);
            return response()->json([
                'status' => true,
                'message' => $message
            ]);
        } else {
            $message = 'Item deleted successfully';
            Cart::remove($rowId);
            session()->flash('success', $message);
            return response()->json([
                'status' => true,
                'message' => $message
            ]);
        }
    }

    public function checkout()
    {
        if (Cart::count() == 0) {
            return redirect()->route('web.view.cart');
        } else {

            $ukCities = config('constants.ukCities');
            $ukPostalcode = config('constants.ukPostalcode');
            $ukAddress = Config('constants.ukAddress');

            return view('web.pages.checkout', compact('ukCities','ukPostalcode', 'ukAddress'));
        }
    }

    public function destroy()
    {
        Cart::destroy();
    }

    public function checkout_id($order_id)
    {

        $decoded_order_id = base64_decode($order_id);

        // Fetch the order details with related models
        $order = Order::with('orderDetails', 'shippingDetail')->find($decoded_order_id);

         // Dump and die to inspect shipping details
    // dd($order->payment_status);
        if (!$order) {
            return redirect()->back()->withErrors(['error' => 'Order not found']);
        }

        if ($order->payment_status == 'Paid') { // Replace 'desired_status' with the actual status you want to check for
            return redirect()->back()->withErrors(['error' => 'Order status is not valid']);
        }

        $ukCities = config('constants.ukCities');
        $ukPostalcode = config('constants.ukPostalcode');

        return view('web.pages.checkoutid', compact('ukCities', 'ukPostalcode', 'order'));
    }

}
