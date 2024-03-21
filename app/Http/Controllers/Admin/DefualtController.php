<?php

namespace App\Http\Controllers\Admin;

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

// models ...
use App\Models\User;
use App\Models\Category;
use App\Models\Question;
use App\Models\AssignQuestion;
use App\Models\Product;
use App\Models\ProductAttribute;


class DefualtController extends Controller
{
    protected $status;
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->status = config('constants.USER_STATUS');
    }

    public function index()
    {
        $user = auth()->user();

        if ($user) {
            $page_name = 'dashboard';
            if (!view_permission($page_name)) {
                return redirect()->back();
            }
            session(['user_details' => $user]);
            $data['user']       = $user;
            $data['role'] = user_role_no($user->role);
            // User roles: 1 for Super Admin, 2 for Admin, 3 for Doctor, 4 User
            if (isset($user->role) && $user->role == user_roles('1')) {
                return view('admin.pages.dashboard', $data);
            } else if (isset($user->role) && $user->role == user_roles('2')) {
                return view('admin.pages.dashboard', $data);
            } else if (isset($user->role) && $user->role == user_roles('3')) {
                return view('admin.pages.dashboard', $data);
            } else if (isset($user->role) && $user->role == user_roles('4')) {
                // return redirect('/');
                return view('admin.pages.dashboard', $data);
            }
        } else {
            return redirect('/login');
        }
    }

    public function profile_setting()
    {
        return view('admin.pages.profile_setting');
    }

    public function faq()
    {
        return view('admin.pages.faq');
    }

    public function contact()
    {
        return view('admin.pages.contact');
    }

    public function login(Request $request)
    {
        $user = auth()->user();
        $data['categories'] = Category::with('subcategory.childCategories')
        ->where('publish', 'Publish')
        ->latest('id')
        ->get()
        ->toArray();
        // return $user;
        if (!$user) {
            if ($request->all()) {
                $validator = Validator::make($request->all(), [
                    'password' => 'required',
                    'email' => 'required',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->with(['status' => 'error', 'message' => $validator->errors()]);
                }

                $credentials = $request->only('email', 'password');
                $user = User::where('email', $credentials['email'])->first();

                if ($user) {
                    if (in_array($user->status, auth_users())) {
                        if (Auth::attempt($credentials)) {
                            $token = $user->createToken('MyApp')->plainTextToken;
                            if (isset($user->role) && $user->role == user_roles('1')) {
                                return  redirect('/admin');
                            } else if (isset($user->role) && $user->role == user_roles('2')) {
                                return  redirect('/admin');
                            } else if (isset($user->role) && $user->role == user_roles('3')) {
                                return  redirect('/admin');
                            } else if (isset($user->role) && $user->role == user_roles('4')) {     
                                $product_id =  session('pro_id') ?? NULL;
                                if($product_id){
                                    if($user->consult_status != 'done'){
                                        return redirect()->route('web.bmiForm');
                                    }
                                    else{
                                        return redirect()->route('web.products');
                                    }        
                                }else{
                                    if($user->consult_status != 'done'){
                                        return redirect()->route('web.bmiForm');
                                    }
                                    else{
                                        return redirect()->route('admin.index');
                                    }
                                }
                            }
                            // return redirect()->back()->with(['status' => 'success', 'message' => 'User successfully logged in', 'token' => $token]);
                        } else {
                            return redirect()->back()->with(['status' => 'invalid', 'message' => 'Invalid Credentails', 'email' => $credentials['email']]);
                        }
                    } else if ($user->status == 4) {
                        return redirect()->back()->with(['status' => 'Unverfied', 'message' => 'User is unverified, Please Check Your Email', 'email' => $credentials['email']]);
                    } else {
                        return redirect()->back()->with(['status' => 'Deactive', 'message' => 'You are Unauthorized to Login', 'email' => $credentials['email']]);
                    }
                } else {
                    return redirect()->back()->with(['status' => 'noexitance', 'message' => 'User does not exist', 'email' => $credentials['email']], 401);
                }
            } else {
                return view('web.pages.login', $data);
            }
        } else {
            if (isset($user->role) && $user->role == user_roles('1')) {
                return  redirect('/admin');
            } else if (isset($user->role) && $user->role == user_roles('2')) {
                return  redirect('/admin');
            } else if (isset($user->role) && $user->role == user_roles('3')) {
                return  redirect('/admin');
            } else if (isset($user->role) && $user->role == user_roles('4')) {
                return redirect()->route('web.bmiForm');
            }
        }
        return view('web.pages.login');
    }

    public function logout(REQUEST $request)
    {
        $user = auth()->user();

        session()->flush();
        Auth::logout();

        if (isset($user->role) && $user->role == user_roles('1')) {
            return redirect('/login');
        } else if (isset($user->role) && $user->role == user_roles('2')) {
            return redirect('/login');
        } else if (isset($user->role) && $user->role == user_roles('3')) {
            return redirect('/login');
        } else if (isset($user->role) && $user->role == user_roles('4')) {
            return redirect('/');
        }
    }
    public function regisration_from(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        if (auth()->user()) {
            return redirect()->route('web.bmiForm');
        } else {
            return view('web.pages.regisration_from', $data);
        }
    }

    public function user_register(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            $validator = Validator::make($request->all(), [
                'name'     => 'required',
                'phone'    => 'required|digits:11',
                'address'  => 'required',
                'role'     => 'required',
                'dob'     => 'required',
                'zip_code'     => 'required',
                'email'    => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($request->id),
                ],
                'password' => [
                    'required',
                    'min:8']                ],
            );

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data['user'] = auth()->user();

            $saved = User::updateOrCreate(
                ['id' => $request->id ?? NULL],
                [
                    'name'       => ucwords($request->name),
                    'email'      => $request->email,
                    'dob'        => $request->dob,
                    'role'       => $request->role,
                    'phone'      => $request->phone,
                    'address'    => $request->address,
                    'zip_code'   => $request->zip_code,
                    'city'       => $request->city ?? '',
                    'state'      => $request->state ?? '',
                    'password'   => Hash::make($request->password),
                    'status'     => $this->status['Active'],
                    'created_by' => 1,
                ]
            );
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = auth()->user();
                $token = $user->createToken('MyApp')->plainTextToken;
            }
            $message = "User" . ($request->id ? "Registraion" : "Registraion") . " Successfully";
            if ($saved) {
                return redirect()->route('web.bmiForm')->with(['msg' => $message]);
            }
        }else{
            return redirect()->back();
        }
    }
}
