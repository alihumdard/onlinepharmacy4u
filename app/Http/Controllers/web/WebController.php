<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\otpVerifcation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

// models ...
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\Question;
use App\Models\AssignQuestion;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Transaction;
use App\Models\UserBmi;
use App\Models\UserConsultation;
use App\Models\Cart;
use App\Models\Order;
use App\Models\QuestionMapping;
use App\Models\QuestionCategory;
use App\Models\PMedGeneralQuestion;
use App\Models\PrescriptionMedGeneralQuestion;
use App\Models\ShipingDetail;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

use Deyjandi\VivaWallet\Enums\RequestLang;
use Deyjandi\VivaWallet\Enums\PaymentMethod;
use Deyjandi\VivaWallet\Facades\VivaWallet;
use Deyjandi\VivaWallet\Customer;
use Deyjandi\VivaWallet\Payment;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

use GuzzleHttp\Client;
use Symfony\Component\CssSelector\Parser\Shortcut\ElementParser;

class WebController extends Controller
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

    public function shop($category = null, $sub_category = null, $child_category = null)
    {
        $slug = [
            "main_category" => $category,
            "sub_category" => $sub_category,
            "child_category" => $child_category
        ];
        if ($slug == session('slug') ?? []) {
            $data['is_add_to_cart'] = 'yes';
        } else {
            $data['is_add_to_cart'] = Null;
        }
        // product listing
        $level = '';
        if ($category && $sub_category && $child_category) {
            $level = 'child';
            $category_detail = ChildCategory::where('slug', $child_category)->first();
        } else if ($category && $sub_category && !$child_category) {
            $level = 'sub';
            $category_detail = SubCategory::where('slug', $sub_category)->first();
        } else if ($category && !$sub_category && !$child_category) {
            $level = 'main';
            $category_detail = Category::where('slug', $category)->first();
        }

        switch ($level) {
            case 'main':
                $products = Product::where(['category_id' => $category_detail->id])->get();
                break;
            case 'sub':
                $products = Product::where(['sub_category' => $category_detail->id])->get();
                break;
            case 'child':
                $products = Product::where(['child_category' => $category_detail->id])->get();
                break;
            default:
                $products = Product::get();
        }

        $data['products'] = $products;
        $data['categories_list'] = Category::where('publish', 'Publish')
            ->latest('id')
            ->get();
 
        return view('web.pages.shop', $data);
    }

    public function show_products($category = null, $sub_category = null, $child_category = null)
    {
        $slug = [
            "main_category" => $category,
            "sub_category" => $sub_category,
            "child_category" => $child_category
        ];
        if ($slug == session('slug') ?? []) {
            $data['is_add_to_cart'] = 'yes';
        } else {
            $data['is_add_to_cart'] = Null;
        }
        // product listing
        $level = '';
        if ($category && $sub_category && $child_category) {
            $level = 'child';
            $category_detail = ChildCategory::where('slug', $child_category)->first();
        } else if ($category && $sub_category && !$child_category) {
            $level = 'sub';
            $category_detail = SubCategory::where('slug', $sub_category)->first();
        } else if ($category && !$sub_category && !$child_category) {
            $level = 'main';
            $category_detail = Category::where('slug', $category)->first();
        }

        switch ($level) {
            case 'main':
                $products = Product::where(['category_id' => $category_detail->id])->get();
                break;
            case 'sub':
                $products = Product::where(['sub_category' => $category_detail->id])->get();
                break;
            case 'child':
                $products = Product::where(['child_category' => $category_detail->id])->get();
                break;
            default:
                $products = Product::get();
        }

        $data['products'] = $products;
        $data['categories_list'] = Category::where('publish', 'Publish')
            ->latest('id')
            ->get();
        $data['category_detail'] = $category_detail;
 
        return view('web.pages.products_list', $data);
    }

    public function products(Request $request)
    {
        session()->forget('pro_id');
        $cat_id = $request->input('cat_id') ?? NULL;
        $data['user'] = auth()->user() ?? [];
        $query = Product::with('category:id,name')->latest('id');
        if ($cat_id) {
            $query->where('category_id', $cat_id);
        }
        $data['products'] = $query->get()->toArray();

        $data['categories'] = Category::withCount('products')->latest('id')->get()->toArray();

        return view('web.pages.products', $data);
    }


    public function product_detail(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        $data['product'] = Product::with('category:id,name,slug', 'sub_cat:id,name,slug', 'child_cat:id,name,slug', 'variants')->findOrFail($request->id);
        if ($data['product']) {
            // dd(array_keys(session('consultations')));
            $data['is_add_to_cart'] = (session()->has('consultations') && in_array($data['product']['id'], array_keys(session('consultations')))) ? 'yes' : null;
            return view('web.pages.product', $data);
        } else {
            redirect()->back();
        }
    }

    public function consultation_form(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        $data['template'] = $request->template ?? session('template');
        $data['product_id'] = $request->product_id ?? session('product_id');
        if ($data['template'] == config('constants.PHARMACY_MEDECINE')) {
            $data['questions'] = PMedGeneralQuestion::where(['status' => 'Active'])->get()->toArray();
            return view('web.pages.pmd_genral_question', $data);
        } else if ($data['template'] == config('constants.PRESCRIPTION_MEDICINE')) {
            if (auth()->user()) {
                $data['questions'] = PrescriptionMedGeneralQuestion::where(['status' => 'Active'])->get()->toArray();
                return view('web.pages.premd_genral_question', $data);
            } else {
                session()->put('intended_url', 'fromConsultation');
                session()->put('template', $data['template']);
                session()->put('product_id', $data['product_id']);
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('shop');
        }
    }

    public function consultation_store(Request $request)
    {
        $consultations = Session::get('consultations', []);
        $questionAnswers = [];
        foreach ($request->all() as $key => $value) {
            if ($key === '_token' || $key === 'template') {
                continue;
            }
            if (strpos($key, 'quest_') === 0) {
                $question_id = substr($key, 6);
                $questionAnswers[$question_id] = $value;
            }
        }

        $consultationData = [];
        if ($request->template == config('constants.PHARMACY_MEDECINE')) {
            $consultationData = ['type' => 'pmd', 'product_id' => $request->product_id, 'gen_quest_ans' => $questionAnswers, 'pro_quest_ans' => ''];
        } else {
            $category = Product::with('category', 'sub_cat', 'child_cat')->find($request->product_id);
            $slug = ['main_category' => $category->category->slug, 'sub_category' => $category->sub_cat->slug ?? null, 'child_category' => $category->child_cat->slug ?? null];
            $consultationData = ['type' => 'premd', 'product_id' => $request->product_id, 'slug' => $slug, 'gen_quest_ans' => $questionAnswers, 'pro_quest_ans' => ''];
        }



        if ($request->template == config('constants.PHARMACY_MEDECINE')) {
            $consultations[$request->product_id] = $consultationData;
            Session::put('consultations', $consultations);
            return redirect()->route('web.product', ['id' => $request->product_id]);
        } else {
            $consultations[$request->product_id] = $consultationData;
            Session::put('consultations', $consultations);
            return redirect()->route('web.productQuestion', ['id' => $request->product_id]);
        }
    }

    public function product_question(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        if (auth()->user()) {
            if (isset(session('consultations')[$request->id])) {
                $generic_consultation = (isset(session('consultations')[$request->id]['gen_quest_ans'])) ? true : false;
                if (!$generic_consultation) {
                    return redirect()->route('shop');
                }
            } else {
                return redirect()->route('shop');
            }

            $data['template'] = config('constants.PRESCRIPTION_MEDICINE');
            $data['product_id'] = $request->id;
            $data['product_detail'] = Product::find($request->id);
            $quest_category_id = $data['product_detail']->question_category;
            $questions = Question::where(['category_id' => $quest_category_id, 'status' => 'Active'])
                ->orderByRaw('IF(`order` IS NULL, 1, 0), CAST(`order` AS UNSIGNED), `order`')
                ->orderBy('id')
                ->get()
                ->toArray();
            $question_map_cat  = QuestionMapping::where('category_id', $quest_category_id)->get()->toArray();
            $data['questions'] = [];
            $data['dependent_questions'] = [];
            foreach ($questions as $key => $quest) {
                $q_id = $quest['id'];
                $quest['next_quest'] =[];
                if ($quest['anwser_set'] == "mt_choice") {
                    foreach ($question_map_cat as $key => $val1) {
                        if ($val1['question_id'] == $q_id && $val1['answer'] == 'optA') {
                            $quest['next_quest']['optA'] = $val1['next_question'];
                        } elseif ($val1['question_id'] == $q_id && $val1['answer'] == 'optB') {
                            $quest['next_quest']['optB'] = $val1['next_question'];
                        } elseif ($val1['question_id'] == $q_id && $val1['answer'] == 'optC') {
                            $quest['next_quest']['optC'] = $val1['next_question'];
                        } elseif ($val1['question_id'] == $q_id && $val1['answer'] == 'optD') {
                            $quest['next_quest']['optD'] = $val1['next_question'];
                        }
                    }
                } else if ($quest['anwser_set'] == "yes_no") {
                    foreach ($question_map_cat as $key => $val2) {
                        if ($val2['question_id'] == $q_id && $val2['answer'] == 'optY') {
                            $quest['next_quest']['yes_lable'] = $val2['next_question'];
                        } elseif ($val2['question_id'] == $q_id && $val2['answer'] == 'optN') {
                            $quest['next_quest']['no_lable']  = $val2['next_question'];
                        }
                    }
                } else if ($quest['anwser_set'] == "file") {
                    foreach ($question_map_cat as $key => $val3) {
                        if ($val3['question_id'] == $q_id && $val3['answer'] == 'file') {
                            $quest['next_quest']['file'] = $val3['next_question'];
                        }
                    }
                } else if ($quest['anwser_set'] == "openbox") {
                    foreach ($question_map_cat as $key => $val4) {
                        if ($val4['question_id'] == $q_id && $val4['answer'] == 'openBox') {
                            $quest['next_quest']['openbox'] = $val4['next_question'];
                        }
                    }
                }
                if ($quest['is_dependent'] == 'yes') {
                    $data['dependent_questions'][$q_id] = $quest;
                } else {
                    $data['questions'][] = $quest;
                }
            }

            // dd($data);
            return view('web.pages.product_question', $data);
        } else {
            session()->put('intended_url', 'fromConsultation');
            session()->put('template', $data['template']);
            session()->put('product_id', $data['product_id']);
            return redirect()->route('login');
        }
    }

    public function transaction_store(Request $request)
    {
        if (auth()->user()) {
            if (isset(session('consultations')[$request->product_id])) {
                $productSession = session('consultations')[$request->product_id];
                $generic_consultation = isset($productSession['gen_quest_ans']);

                if ($generic_consultation) {
                    $questionAnswers = [];
                    foreach ($request->all() as $key => $value) {
                        if ($key === '_token' || $key === 'template') {
                            continue;
                        }
                        if (strpos($key, 'quest_') === 0) {
                            $question_id = substr($key, 6);
                            $questionAnswers[$question_id] = $value;
                        } else if (strpos($key, 'qfid_') === 0) {
                            $question_id = substr($key, 5);
                            if ($request->hasFile($key)) {
                                $file = $request->file($key);
                                $fileName = time() . '_' . uniqid('', true) . '.' . $file->getClientOriginalExtension();
                                $file->storeAs('consultation/product', $fileName, 'public');
                                $filePath = 'consultation/product/' . $fileName;
                                $questionAnswers[$question_id] = $filePath;
                            }
                        }
                    }

                    $productSession['pro_quest_ans'] = $questionAnswers;
                    session(['consultations.' . $request->product_id => $productSession]);
                    $slug = session('consultations')[$request->product_id]['slug'];
                    return redirect()->route('category.products', $slug);
                } else {
                    return redirect()->route('shop');
                }
            } else {
                return redirect()->route('shop');
            }
        } else {
            session()->put('intended_url', 'fromConsultation');
            return redirect()->route('login');
        }
    }


    public function view_cart(Request $request)
    {
        $data['cart'] = session('cart');
        // return $data['cart']->product_data;
        return view('web.pages.cart', $data);
    }

    public function add_to_cart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $productData = json_decode($request->input('product_data'), true);

        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'quantity' => $quantity,
                'product_data' => $productData
            ];
        }

        Session::put('cart', $cart);

        return response()->json(['message' => 'Item added to cart']);
    }

    public function show_categories($category = null, $sub_category = null, $child_category = null)
    {
        $level = '';
        if ($category && $sub_category && $child_category) {
            $level = 'child';
            $child_category_id = ChildCategory::where('slug', $child_category)->first()->id;
        } else if ($category && $sub_category && !$child_category) {
            $level = 'sub';
            $sub_category_id = SubCategory::where('slug', $sub_category)->first()->id;
        } else if ($category && !$sub_category && !$child_category) {
            $level = 'main';
            $category_id = Category::where('slug', $category)->first()->id;
        }

        switch ($level) {
            case 'main':
                $data['main_category'] = Category::where('slug', $category)->first();
                $data['categories'] = SubCategory::where('category_id', $data['main_category']->id)->get()->toArray();
                $data['image'] = $data['main_category']['image'];
                $data['category_name'] = $data['main_category']['name'];
                $data['main_slug'] = $data['main_category']['slug'];
                $data['products'] = Product::where(['category_id' => $data['main_category']->id])->get();
                break;
            case 'sub':
                $data['main_category'] = Category::where('slug', $category)->first();
                $data['sub_category'] = SubCategory::where('slug', $sub_category)->first();
                $data['categories'] = ChildCategory::where('sub_category_id', $data['sub_category']->id)->get()->toArray();
                $data['image'] = $data['sub_category']['image'];
                $data['category_name'] = $data['sub_category']['name'];
                $data['main_slug'] = $data['main_category']['slug'];
                $data['sub_slug'] = $data['sub_category']['slug'];
                break;
            case 'child':
                $data['category'] = ChildCategory::where('slug', $child_category)->first();
                break;
            default:
                $products = Product::get();
        }
        return view('web.pages.collections', $data);
    }

    // cloned methods of myweightloss
    public function product_question_new()
    {
        $data['user'] = auth()->user() ?? [];
        return view('web.pages.product_question', $data);
    }

    public function account()
    {
        $data['user'] = auth()->user() ?? [];
        return view('web.pages.account', $data);
    }

    public function wishlist()
    {
        $data['user'] = auth()->user() ?? [];
        return view('web.pages.wishlist', $data);
    }

    public function works()
    {
        $data['user'] = auth()->user() ?? [];
        return view('web.pages.works', $data);
    }
    public function faq()
    {
        $data['user'] = auth()->user() ?? [];
        return view('web.pages.faq', $data);
    }

    public function categories()
    {
        $data['user'] = auth()->user() ?? [];
        return view('web.pages.categories', $data);
    }

    public function categorydetail()
    {
        $data['user'] = auth()->user() ?? [];
        return view('web.pages.categorydetail', $data);
    }

    public function skincare()
    {
        $data['user'] = auth()->user() ?? [];
        $sub_category_id = SubCategory::where('slug', 'skin-care')->first()->id;
        $data['products'] = Product::where(['sub_category' => $sub_category_id])->get();
        return view('web.pages.skincare', $data);
    }

    public function diabetes()
    {
        $data['user'] = auth()->user() ?? [];
        $sub_category_id = SubCategory::where('slug', 'diabetes')->first()->id;
        $data['products'] = Product::where(['sub_category' => $sub_category_id])->get();
        return view('web.pages.diabetes', $data);
    }

    public function sleep()
    {
        $data['user'] = auth()->user() ?? [];
        $sub_category_id = SubCategory::where('slug', 'sleep')->first()->id;
        $data['products'] = Product::where(['sub_category' => $sub_category_id])->get();
        return view('web.pages.sleep', $data);
    }


    public function payment(Request $request)
    {
        //     Session::flush();
        //     Auth::logout();
        $user = auth()->user() ?? [];
        $order =  Order::create([
            'user_id'        => $user->id ?? 'guest',
            'email'          => $request->email,
            'note'           => $request->note,
            'shiping_cost'   => $request->shiping_cost,
            'coupon_code'    => $request->coupon_code ?? Null,
            'coupon_value'   => $request->coupon_value ?? Null,
            'total_ammount'  => $request->total_ammount ?? Null,
        ]);
        if ($order) {
            $order_details = [];
            $index = 0;
            foreach ($request->order_details['product_id'] as $key => $val) {
                $consultaion_type = 'one_over';
                if (isset(session('consultations')[$val])) {
                    $consultaion_type = session('consultations')[$val]['type'];
                    $generic_consultation = (isset(session('consultations')[$val]['gen_quest_ans'])) ? json_encode(session('consultations')[$val]['gen_quest_ans'], true) : NULL;
                    $product_consultation = (isset(session('consultations')[$val]['pro_quest_ans'])) ? json_encode(session('consultations')[$val]['pro_quest_ans'], true) : NULL;
                }

                $order_details[] = [
                    'product_id' => $val,
                    'order_id' => $order->id,
                    'product_price' => $request->order_details['product_price'][$index],
                    'product_name' => $request->order_details['product_name'][$index],
                    'product_qty' => $request->order_details['product_qty'][$index],
                    'generic_consultation' => $generic_consultation ?? NULL,
                    'product_consultation' => $product_consultation ?? NULL,
                    'consultation_type' => $consultaion_type ?? NULL,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $index++;
            }
            $inserted =  OrderDetail::insert($order_details);
            if ($inserted) {
                $shipping_details = [
                    'order_id' => $order->id,
                    'user_id' => $user->id ?? '',
                    'cost' => $request->shiping_cost,
                    'method' => $request->shipping_method,
                    'old_address' => $request->old_address ?? 'no',
                    'firstName' => $request->firstName,
                    'lastName' => $request->lastName,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'address2' => $request->address2,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zip_code' => $request->zip_code,
                ];
                $shiping =  ShipingDetail::create($shipping_details);
                if ($shiping) {
                    session()->put('order_id', $order->id);

                    return redirect()->away('/Completed-order');
                    $productPrice = $request->total_ammount * 100;
                    $productName = 'Medical Products';
                    $productDescription = 'Medical Products';
                    $full_name = $request->firstName . ' ' . $request->lastName;

                    // Viva Wallet API credentials
                    $username = 'dkwrul3i0r4pwsgkko3nr8c4vs0h5yn5tunio398ik403.apps.vivapayments.com';
                    $password = 'BuLY8U1pEsXNPBgaqz98y54irE7OpL';
                    $credentials = base64_encode($username . ':' . $password);

                    // Obtain Access Token
                    $accessToken = $this->getAccessToken($credentials);
                    // dd($accessToken);
                    // Prepare POST fields for creating an order
                    $postFields = [
                        'amount'              => $productPrice,
                        'customerTrns'        => $productDescription,
                        'customer'            => [
                            'email'       => $request->email,
                            'fullName'    => $full_name,
                            'phone'       => $request->phone,
                            'countryCode' => 'GB', // United Kingdom country code
                            'requestLang' => 'en-GB', // Request language set to English (United Kingdom)
                        ],
                        'paymentTimeout'      => 1800,
                        'preauth'             => false,
                        'allowRecurring'      => false,
                        'maxInstallments'     => 0,
                        'paymentNotification' => true,
                        'disableExactAmount'  => false,
                        'disableCash'         => false,
                        'disableWallet'       => false,
                        'sourceCode'          => '2399',
                        "merchantTrns" => "Short description of items/services purchased by customer",
                        "tags" =>
                        [
                            "tags for grouping and filtering the transactions",
                            "this tag can be searched on VivaWallet sales dashboard",
                            "Sample tag 1",
                            "Sample tag 2",
                            "Another string"
                        ],
                    ];

                    // Make an HTTP request to create an order
                    $response = $this->sendHttpRequest('https://api.vivapayments.com/checkout/v2/orders', $postFields, $accessToken);
                    // dd($response);

                    // Decode the JSON response
                    $responseData = json_decode($response, true);

                    if (isset($responseData['orderCode'])) {
                        $orderCode = $responseData['orderCode'];
                        // Redirect to the Viva Payments checkout page with the orderCode parameter
                        $redirectUrl = "https://www.vivapayments.com/web/checkout?ref={$orderCode}&color=c50c26";
                        // Redirect to the external URL
                        return redirect()->away($redirectUrl);
                    }
                }
            }
        }
    }

    private function getAccessToken($credentials)
    {
        try {
            // Make an HTTP request to obtain an access token
            $response = Http::asForm()->withHeaders([
                'Authorization' => 'Basic ' . $credentials,
            ])->post('https://accounts.vivapayments.com/connect/token', [
                'grant_type' => 'client_credentials',
            ]);

            // Check if the request was successful (status code 2xx)
            if ($response->successful()) {
                return $response->json('access_token');
            } else {
                // Log the error response for further investigation
                Log::error('Error response: ' . $response->body());
                return null;
            }
        } catch (\Exception $e) {
            // Log any exceptions that occurred during the request
            Log::error('Exception: ' . $e->getMessage());
            return null;
        }
    }

    private function sendHttpRequest($url, $postFields, $accessToken)
    {
        // Make an HTTP request with Laravel HTTP client
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type'  => 'application/json',
        ])->post($url, $postFields);

        // Return the response body
        return $response->body();
    }

    public function completed_order(Request $request)
    {

        if (session('order_id')) {
            Order::where(['id' => session('order_id'), 'payment_status' => 'Unpaid', 'status' => 'Received'])->latest('created_at')->first()
                ->update(['payment_status' => 'Paid']);
            Session::flush();
            Auth::logout();

            return view('web.pages.completed_order');
        } else {
            dd('contact to developer');
        }
    }

    public function unsuccessful_order(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        return view('web.pages.unsuccessful_order', $data);
    }
}
