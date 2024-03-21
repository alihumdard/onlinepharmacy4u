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

// models ...
use App\Models\User;
use App\Models\Category;
use App\Models\Question;
use App\Models\AssignQuestion;
use App\Models\Product;
use App\Models\ProductAttribute;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        $data['products'] = Product::with('category:id,name')->take(8)->latest('id')->get()->toArray();

        return view('web.pages.home',$data);
    }

    public function blogs(Request $request)
    {
        return view('web.pages.blogs');
    }
    public function contact_us(Request $request)
    {
        return view('web.pages.contact_us');
    }
    public function about_us(Request $request)
    {
        return view('web.pages.about_us');
    }
    public function term(Request $request)
    {
        return view('web.pages.term');
    }
    public function privacy(Request $request)
    {
        return view('web.pages.privacy');
    }
    public function deliveryReturns(Request $request)
    {
        return view('web.pages.deliveryReturns');
    }
    public function howitworks(Request $request)
    {
        return view('web.pages.howitworks');
    }
    
}
