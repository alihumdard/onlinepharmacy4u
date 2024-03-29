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
use Illuminate\Support\Facades\DB;

use Deyjandi\VivaWallet\Enums\RequestLang;
use Deyjandi\VivaWallet\Enums\PaymentMethod;
use Deyjandi\VivaWallet\Facades\VivaWallet;
use Deyjandi\VivaWallet\Customer;
use Deyjandi\VivaWallet\Payment;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

use GuzzleHttp\Client;

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

    public function show_products($category = null, $sub_category = null, $child_category = null)
    {
        // product listing
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
                $products = Product::where(['category_id' => $category_id])->get();
                break;
            case 'sub':
                $products = Product::where(['sub_category' => $sub_category_id])->get();
                break;
            case 'child':
                $products = Product::where(['child_category' => $child_category_id])->get();
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

    public function product_detail(Request $request)
    {
        // $request->id;
        $data['user'] = auth()->user() ?? [];
        $data['product'] = Product::with('category:id,name,slug', 'sub_cat:id,name,slug', 'child_cat:id,name,slug', 'variants')->findOrFail($request->id);
        // $data['rel_products'] = Product::where('category_id', $data['product']['category_id'])->where('id', '!=', $request->id)->take(4)->latest('id')->get()->toArray();
        // return $data['product' ];
        return view('web.pages.product', $data);
    }

    public function consultation_form(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        $data['template'] = $request->template ?? session('template');
        $data['product_id'] = $request->product_id ?? session('product_id');
        if ($data['template'] == config('constants.PHARMACY_MEDECINE')) {
            $data['product_detail'] = Product::find($data['product_id']);
            $question_category = explode(',', $data['product_detail']->question_category);
            $data['question_category'] = QuestionCategory::whereIn('id', $question_category)->orderBy('id')->get();
            $data['questions'] = AssignQuestion::whereIn('category_id', $question_category)
                ->orderBy('category_id')
                ->get()
                ->groupBy('category_id');
            // return $data;
            return view('web.pages.product_question', $data);
        } else if ($data['template'] == config('constants.PRESCRIPTION_MEDICINE')) {
            if (auth()->user()) {
                $data['product_detail'] = Product::find($data['product_id']);
                $question_category = explode(',', $data['product_detail']->question_category);
                $data['question_category'] = QuestionCategory::where('id', $question_category[0])->orderBy('id')->get()->toArray();
                $assign_questions = AssignQuestion::where(['category_id' => $question_category[0]])->orderBy('category_id')->get()->toArray();
                // $data['questions_dependent'] = AssignQuestion::where(['category_id' => $question_category[0], 'is_dependent' => '1'])->orderBy('category_id')->get()->toArray();
                $question_map_cat  = QuestionMapping::where('category_id', $question_category[0])->get()->toArray();
                $questionIds = array_column($assign_questions, 'question_id');
                $quesions_details = Question::whereIn('id', $questionIds)->orderBy('id')->get()->toArray();
                foreach ($quesions_details as $key => $quest) {
                    $q_id = $quest['id'];
                    if ($quest['anwser_set'] == "mt_choice") {
                        foreach ($question_map_cat as $key => $val1) {
                            if ($val1['question_id'] == $q_id && $val1['answer'] == 'optA') {
                                $data['next_quest_opt'][$q_id]['optA'] = $val1['next_question'];
                                $next_quest_ids[$q_id][] = $val1['next_question'];
                            } elseif ($val1['question_id'] == $q_id && $val1['answer'] == 'optB') {
                                $data['next_quest_opt'][$q_id]['optB'] = $val1['next_question'];
                                $next_quest_ids[$q_id][] = $val1['next_question'];
                            } elseif ($val1['question_id'] == $q_id && $val1['answer'] == 'optC') {
                                $data['next_quest_opt'][$q_id]['optC'] = $val1['next_question'];
                                $next_quest_ids[$q_id][] = $val1['next_question'];
                            } elseif ($val1['question_id'] == $q_id && $val1['answer'] == 'optD') {
                                $data['next_quest_opt'][$q_id]['optD'] = $val1['next_question'];
                                $next_quest_ids[$q_id][] = $val1['next_question'];
                            }
                        }
                    } else if ($quest['anwser_set'] == "yes_no") {
                        foreach ($question_map_cat as $key => $val2) {
                            if ($val2['question_id'] == $q_id && $val2['answer'] == 'optY') {
                                $data['next_quest_opt'][$q_id]['yes_lable'] = $val2['next_question'];
                                $next_quest_ids[$q_id][] = $val2['next_question'];
                            } elseif ($val2['question_id'] == $q_id && $val2['answer'] == 'optN') {
                                $data['next_quest_opt'][$q_id]['no_lable']  = $val2['next_question'];
                                $next_quest_ids[$q_id][] = $val2['next_question'];
                            }
                        }
                    } else if ($quest['anwser_set'] == "file") {
                        foreach ($question_map_cat as $key => $val3) {
                            if ($val3['question_id'] == $q_id && $val3['answer'] == 'file') {
                                $data['next_quest_opt'][$q_id]['file'] = $val3['next_question'];
                                $next_quest_ids[$q_id][] = $val3['next_question'];
                            }
                        }
                    } else if ($quest['anwser_set'] == "openbox") {
                        foreach ($question_map_cat as $key => $val4) {
                            if ($val4['question_id'] == $q_id && $val4['answer'] == 'openBox') {
                                $data['next_quest_opt'][$q_id]['openbox'] = $val4['next_question'];
                                $next_quest_ids[$q_id][] = $val4['next_question'];
                            }
                        }
                    }
                }

                $question_num = 1;
                foreach ($quesions_details as $key => $questi) {
                    $data['questions_all'][$question_num] = $questi;
                    $data['questions_all'][$question_num]['class'] = '';
                    if (isset($next_quest_ids[$questi['id']])) {
                        $dependent_quest =  Question::whereIn('id', $next_quest_ids[$questi['id']])->orderBy('id')->get()->toArray();
                        foreach ($dependent_quest as $key => $dp_quest) {
                            $question_num++; 
                            $data['questions_all'][$question_num] = $dp_quest;
                            $data['questions_all'][$question_num]['class'] = 'd-none';
                        }
                    }
                    $question_num++;
                }
                $filteredQuestions = array_filter($data['questions_all'], function($question) {
                    return !($question['id'] == 28 && $question['class'] != 'd-none');
                });
                $data['questions'] = array_values($filteredQuestions);
                return view('web.pages.product_question', $data);
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


    // cloned methods of myweightloss
    public function product_question_new()
    {
        $data['user'] = auth()->user() ?? [];
        return view('web.pages.product_question', $data);
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

    public function product(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        $data['product'] = Product::with('category:id,name', 'variants')->findOrFail($request->id)->toArray();
        $data['rel_products'] = Product::where('category_id', $data['product']['category_id'])->where('id', '!=', $request->id)->take(4)->latest('id')->get()->toArray();

        return view('web.pages.product', $data);
    }

    public function bmi_form(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        if (auth()->user()) {
            $user = auth()->user();
            $bmiRecord = UserBmi::where('user_id', $user->id)
                ->latest('id')
                ->first();
            $data['bmi_detail'] = $bmiRecord ? $bmiRecord->toArray() : [];
            if ($data['bmi_detail']) {
                return view('web.pages.bmi_calculator', $data);
            } else {
                return view('web.pages.bmi_form', $data);
            }
        } else {
            return redirect()->route('web.regisrationFrom');
        }
    }

    public function consultation_store(Request $request)
    {
        $data['user'] = auth()->user() ?? [];

        if (auth()->user()) {
            $product_id = $request->input('product_id') ?? NULL;
            $category_id = $request->input('category_id') ?? NULL;

            $questionAnswers = [];
            foreach ($request->all() as $key => $value) {
                $iteration = 1;
                if ($key === '_token' || $key === 'website' || $key === 'process') {
                    continue; // Skip unwanted keys
                }

                if ($key === 'question_3' && $value instanceof \Illuminate\Http\UploadedFile) {
                    // Handle image upload here
                    $imagePath = $value->store('images'); // You may need to customize the storage path
                    $questionAnswers[3] = $imagePath;
                } elseif (strpos($key, 'question_') === 0) {
                    $question_id = substr($key, 9); // Extract question_id from the key
                    $questionAnswers[$question_id] = $value;
                }
            }

            $save =  UserConsultation::create([
                'user_id' => auth()->user()->id,
                'question_answers' => json_encode($questionAnswers, JSON_FORCE_OBJECT),
                'status' => '1',
                'created_by' => auth()->user()->id,
            ]);

            if ($save) {
                DB::table('users')
                    ->where('id', auth()->id())
                    ->update(['consult_status' => 'done']);

                $product_id =  session('pro_id') ?? NULL;
                if ($product_id) {
                    return redirect()->route('web.products');
                } else {
                    return redirect()->route('admin.index');
                }
            }
        }
    }


    public function product_question(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        $data['product']   = Product::with(['category:id,name', 'category.questions', 'assignedQuestions'])->findOrFail($request->id)->toArray();
        $data['category']  = $data['product']['category'];

        if (auth()->user()) {
            if ($data['user']->profile_status != 'done') {
                session()->put('pro_id', $data['product']['id']);
                return redirect()->route('web.bmiForm');
            } else if ($data['user']->consult_status != 'done') {
                session()->put('pro_id', $data['product']['id']);
                return redirect()->route('web.bmiForm');
            }

            $data['questions'] = $data['product']['category']['questions'];
            $question_map_cat  = QuestionMapping::where('category_id', $data['category']['id'])->get()->toArray();
            $check_dependency  = $data['product']['assigned_questions'];
            $data['check_dependency'] = collect($check_dependency)->keyBy('question_id');

            foreach ($data['questions'] as $key => $quest) {
                $q_id = $quest['id'];

                foreach ($question_map_cat as $key => $val) {
                    if ($quest['anwser_set'] == "mt_choice") {
                        if ($val['question_id'] == $q_id && $val['answer'] == 'optA') {
                            $data['next_quest_opt'][$q_id]['optA'] = $val['next_question'];
                        } elseif ($val['question_id'] == $q_id && $val['answer'] == 'optB') {
                            $data['next_quest_opt'][$q_id]['optB'] = $val['next_question'];
                        } elseif ($val['question_id'] == $q_id && $val['answer'] == 'optC') {
                            $data['next_quest_opt'][$q_id]['optC'] = $val['next_question'];
                        } elseif ($val['question_id'] == $q_id && $val['answer'] == 'optD') {
                            $data['next_quest_opt'][$q_id]['optD'] = $val['next_question'];
                        }
                    } else if ($quest['anwser_set'] == "yes_no") {
                        if ($val['question_id'] == $q_id && $val['answer'] == 'optY') {
                            $data['next_quest_opt'][$q_id]['yes_lable'] = $val['next_question'];
                        } elseif ($val['question_id'] == $q_id && $val['answer'] == 'optN') {
                            $data['next_quest_opt'][$q_id]['no_lable']  = $val['next_question'];
                        }
                    } else if ($quest['anwser_set'] == "file") {
                        if ($val['question_id'] == $q_id && $val['answer'] == 'file') {
                            $data['next_quest_opt'][$q_id]['file'] = $val['next_question'];
                        }
                    } else if ($quest['anwser_set'] == "openbox") {
                        if ($val['question_id'] == $q_id && $val['answer'] == 'openBox') {
                            $data['next_quest_opt'][$q_id]['openbox'] = $val['next_question'];
                        }
                    }
                }
            }

            return view('web.pages.product_question', $data);
        } else {
            session()->put('pro_id', $data['product']['id']);
            return redirect()->route('register');
        }
    }

    public function transaction_store(Request $request)
    {
        $data['user'] = auth()->user() ?? [];

        if (auth()->user()) {
            $product_id = $request->input('product_id');
            $category_id = $request->input('category_id');
            $questionAnswers = [];

            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'qid_') === 0) {
                    $question_id = substr($key, 4); // Extract question_id from the key
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
            $save =  Transaction::create([
                'user_id' => auth()->user()->id,
                'product_id' => $product_id,
                'category_id' => $category_id,
                'question_answers' =>  json_encode($questionAnswers, JSON_FORCE_OBJECT),
                'status' => '1',
                'created_by' => auth()->user()->id,
            ]);

            if ($save) {
                return redirect()->route('web.cart', ['id' => $product_id]);
            }
        } else {
            return view('web.pages.regisration_from', $data);
        }
    }

    public function bmi_formStore(Request $request)
    {
        $data['user'] = auth()->user() ?? [];

        if (auth()->user()) {
            $weight = $request->weight;
            $height = $request->height / 100;
            $bmi = $weight / ($height * $height);
            $bmi = round($bmi, 1);

            $save =  UserBmi::create([
                'user_id' => auth()->user()->id,
                'weight' => $request->weight,
                'height' => $request->height,
                'age' => $request->age,
                'gender' => $request->gender,
                'bmi' => $bmi,
                'status' => '1',
                'created_by' => auth()->user()->id,
            ]);

            if ($save) {
                DB::table('users')
                    ->where('id', auth()->id())
                    ->update(['profile_status' => 'done']);
                return redirect()->route('web.bmiForm');
            }
        } else {
            return view('web.pages.regisration_from', $data);
        }
    }

    public function bmi_update(Request $request)
    {
        $data['user'] = auth()->user() ?? [];

        if (auth()->user()) {
            // dd($request->all());
            $weight = $request->weight;
            $height = $request->height / 100;
            $bmi = $weight / ($height * $height);
            $bmi = round($bmi, 1);

            $save =  UserBmi::where('id', $request->id)
                ->update([
                    'user_id' => auth()->user()->id,
                    'weight' => $request->weight,
                    'height' => $request->height,
                    'bmi' => $bmi,
                    'status' => '1',
                    'created_by' => auth()->user()->id,
                ]);

            if ($save) {
                if ($bmi >= 30) {
                    return redirect()->route('web.consultationForm');
                } else {
                    return redirect()->route('web.bmiForm')->with(['status' => 'invalid', 'message' => "You can't proceed futher because You'r bmi is lower than 30."]);
                }
            }
        } else {
            return view('web.pages.regisration_from', $data);
        }
    }

    public function payment(Request $request)
    {

        $user = auth()->user() ?? [];
        if (auth()->user()) {
            // creating the order..
            $save =  Order::create([
                'user_id'        => auth()->user()->id,
                'product_id'     => $request->product_id,
                'coupon_code'    => $request->coupon_code ?? Null,
                'coupon_value'   => $request->coupon_value ?? Null,
                'total_ammount'  => $request->total_ammount ?? Null,
                'created_by'     => auth()->user()->id,
            ]);
            if ($save) {
                return redirect()->away('/Completed-order');
                $productPrice = $request->total_ammount * 100;
                $productName = 'health product';
                $productDescription = $request->product_desc;

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
                        'email'       => $user->email,
                        'fullName'    => $user->name,
                        'phone'       => $user->phone,
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
        } else {
            return redirect()->route('login');
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

    // extra code payment through the package...
    //  public function payment(Request $request){
    //         $customer = new Customer($email = 'ali@gmail.com',$fullName = 'John Doe',$phone = '+442037347770',$countryCode = 'en',$requestLang = RequestLang::Greek);

    //     $payment = new Payment();

    //     $payment
    //         ->setAmount(25)
    //         ->setCustomerTrns('short description of the items/services being purchased')
    //         ->setCustomer($customer)
    //         ->setMerchantTrns('customer order reference number')
    //         ->setTags(['tag-1', 'tag-2']);

    //     $checkoutUrl = VivaWallet::createPaymentOrder($payment);
    //  }

    public function completed_order(Request $request)
    {
        $data['user'] = auth()->user() ?? [];

        if (auth()->user()) {
            Order::where(['user_id' => auth()->user()->id, 'payment_status' => 'Unpaid', 'status' => 'Received'])->latest('created_at')->first()
                ->update(['payment_status' => 'Paid']);

            Cart::where(['user_id' => auth()->user()->id, 'status' => 1])
                ->update(['status' => 2]);

            return view('web.pages.completed_order', $data);
        } else {
            return redirect()->route('login');
        }
    }

    public function unsuccessful_order(Request $request)
    {

        $data['user'] = auth()->user() ?? [];

        if (auth()->user()) {
            return view('web.pages.unsuccessful_order', $data);
        } else {
            return redirect()->route('login');
        }
    }

    public function get_order(Request $request)
    {
        $order_id = $request->id;

        $apiKey = env('ROYAL_MAIL_API_KEY');

        $client = new Client();
        $response = $client->get('https://api.parcel.royalmail.com/api/v1/orders/' . $order_id, [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();

        return response()->json([
            'status_code' => $statusCode,
            'response' => json_decode($body, true),
        ]);
    }

    public function create_order(Request $request)
    {
        // response example:  views\web\pages\example.blade.php
        $apiKey = env('ROYAL_MAIL_API_KEY');
        $client = new Client();
        $response = $client->post('https://api.parcel.royalmail.com/api/v1/orders', [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => $request->all(),
        ]);

        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();

        return response()->json([
            'status_code' => $statusCode,
            'response' => json_decode($body, true),
        ]);
    }
}
