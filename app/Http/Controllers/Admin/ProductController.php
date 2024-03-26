<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\QuestionCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    protected $status;
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->status = config('constants.USER_STATUS');
    }

    public function prodcuts(Request $request)
    {
        $user = auth()->user();
        $page_name = 'prodcuts';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['products'] = Product::with('category:id,name')->latest('id')->get()->toArray();
        }
        // dd($data['products']);
        return view('admin.pages.products.prodcuts', $data);
    }

    public function add_product(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_product';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $data['categories'] = Category::latest('id')->get()->toArray();
        $data['templates'] = config('constants.PRODUCT_TEMPLATES');
        $data['question_category'] = QuestionCategory::latest('id')->get()->toArray();
        
        $data['product'] = [];
        if ($request->has('id')) {
            $data['product'] = Product::with('variants')->findOrFail($request->id)->toArray();
            
            $data['sub_category'] = SubCategory::select('id', 'name')
            ->where('category_id', $data['product']['category_id'])
            ->pluck('name', 'id')
            ->toArray(); 
            
            $data['child_category'] = ChildCategory::select('id', 'name')
            ->where('sub_category_id', $data['product']['sub_category'])
            ->pluck('name', 'id')
            ->toArray();

            $data['prod_question'] = explode(',', $data['product']['question_category']);
        }

        return view('admin.pages.products.add_product', $data);
    }

    public function store_product(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_product';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $rules = [
            'price'             => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'category_id'       => 'required',
            'product_template'  => 'required',
            'stock'             => 'required',
            'cut_price'         => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'desc'              => 'required',
            'short_desc'        => 'required',
            'title'             => [
                'required',
                Rule::unique('products')->ignore($request->id),
            ],
        ];

        if($request->id == null || !$request->id){
            $rules['main_image'] = [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif,webm,svg,webp',
                'max:1024',
                'dimensions:max_width=1000,max_height=1000',
            ];
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()]);
        }

        $data['user'] = auth()->user();
        if ($request->hasFile('main_image')) {

            $rules['main_image'] = [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif,webm,svg,webp',
                'max:1024',
                'dimensions:max_width=1000,max_height=1000',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(['status' => 'error', 'message' => $validator->errors()]);
            }

            $mainImage = $request->file('main_image');
            $mainImageName = time() . '_' . uniqid('', true) . '.' . $mainImage->getClientOriginalExtension();
            $mainImage->storeAs('product_images/main_images', $mainImageName, 'public');
            $mainImagePath = 'product_images/main_images/' . $mainImageName;
        }

        $question_category = $request->question_category ? implode(",", $request->question_category) : NULL;

        // Create or update product
        $product = Product::updateOrCreate(
            ['id' => $request->id ?? null],
            [
                'title'      => ucwords($request->title),
                'desc'       => $request->desc,
                'short_desc' => $request->short_desc,
                'main_image' => $mainImagePath ?? Product::findOrFail($request->id)->main_image,
                'category_id' => $request->category_id,
                'sub_category' => $request->sub_category ?? NULL,
                'child_category' => $request->child_category ?? NULL,
                'product_template' => $request->product_template ?? NULL,
                'question_category' => $question_category ?? NULL,
                'cut_price'    => $request->cut_price,
                'barcode'    => $request->barcode,
                'SKU'        => $request->SKU,
                'stock'      => $request->stock,
                'price'      => $request->price,
                'status'     => $this->status['Active'],
                'created_by' => $user->id,
            ]
        );

        if ($product) {

            // Handle image uploads
            $uploadedImages = [];
            if ($request->hasFile('images')) {

                foreach ($request->file('images') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('product_images', $imageName, 'public'); // Change 'product_images' to your storage folder
                    $extImagePath = 'product_images/' . $imageName;

                    $uploadedImages[] = $extImagePath;
                }

                // Associate product attributes
                foreach ($uploadedImages as $uploadedImage) {
                    $productAttributesData[] = [
                        'product_id' => $product->id,
                        'image'      => $uploadedImage,
                        'status'     => $this->status['Active'],
                        'created_by' => $user->id,
                    ];
                }

                DB::table('product_attributes')->insert($productAttributesData);
            }


            // new variant
            if ($request['vari_value'] ?? NULL) {
                // handle the product variations .....
                $valueArr = $request['vari_value'];
                $priceArr = $request['vari_price'];
                $skuArr   = $request['vari_sku'];
                $nameArr  = $request['vari_name'];
                $barcodeArr   = $request['vari_barcode'];
                $inventoryArr = $request['vari_inventory'];
                foreach ($skuArr as $key => $val) {

                    $productAttrArr['product_id'] = $product->id;
                    $productAttrArr['title'] = $nameArr[$key];
                    $productAttrArr['price'] = $priceArr[$key];
                    $productAttrArr['value'] = $valueArr[$key];
                    $productAttrArr['barcode'] = $barcodeArr[$key];
                    $productAttrArr['inventory'] = $inventoryArr[$key];
                    $productAttrArr['sku'] = $skuArr[$key];

                    // Correcting the array key for variant images
                    if ($request->hasFile("vari_attr_images.$key")) {
                        $vari_Image = $request->file("vari_attr_images.$key");
                        $vari_ImageName = time() . '_' . uniqid('', true) . '.' . $vari_Image->getClientOriginalExtension();
                        $vari_Image->storeAs('product_images/main_images', $vari_ImageName, 'public');
                        $vari_ImagePath = 'product_images/main_images/' . $vari_ImageName;
                        $productAttrArr['image'] = $vari_ImagePath;
                    }

                    DB::table('product_variants')->insert($productAttrArr);
                }
            }

            // update variant
            if ($request['exist_vari_value'] ?? NULL) {
                // handle the product variations .....
                $idArrExist = $request['exist_vari_id'];
                $valueArrExist = $request['exist_vari_value'];
                $priceArrExist = $request['exist_vari_price'];
                $skuArrExist   = $request['exist_vari_sku'];
                $nameArrExist  = $request['exist_vari_name'];
                $barcodeArrExist   = $request['exist_vari_barcode'];
                $inventoryArrExist = $request['exist_vari_inventory'];
                if ($request->hasFile('exist_vari_attr_images')) {
                    foreach ($request->file('exist_vari_attr_images') as $variantId => $image) {
                        if ($image) {
                            $variImageNameExist = time() . '_' . uniqid('', true) . '.' . $image->getClientOriginalExtension();
                            $variImagePathExist = $image->storeAs('product_images/main_images', $variImageNameExist, 'public');

                            $productAttrImage = ['image' => $variImagePathExist];

                            DB::table('product_variants')
                                ->where('id', $variantId)
                                ->update($productAttrImage);
                        }
                    }
                }
                foreach ($skuArrExist as $key1 => $val1) {

                    $id = $idArrExist[$key1];
                    $productAttrArrE['title'] = $nameArrExist[$key1];
                    $productAttrArrE['price'] = $priceArrExist[$key1];
                    $productAttrArrE['value'] = $valueArrExist[$key1];
                    $productAttrArrE['barcode'] = $barcodeArrExist[$key1];
                    $productAttrArrE['inventory'] = $inventoryArrExist[$key1];
                    $productAttrArrE['sku'] = $skuArrExist[$key1];

                    DB::table('product_variants')
                        ->where('id', $id)
                        ->update($productAttrArrE);
                }
            }
        }

        $message = "Product " . ($request->id ? "Updated" : "Saved") . " Successfully";
        return response()->json(['status' => 'success', 'message' => $message, 'data' => []]);
    }
}
