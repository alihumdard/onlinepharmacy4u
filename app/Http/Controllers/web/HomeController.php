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
    private $categories;

    public function __construct()
    {
        $this->categories = Category::with('subcategory.childCategories')
            ->where('publish', 'Publish')
            ->latest('id')
            ->get()
            ->toArray();
    }

    public function index(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        // $data['categories'] = array_column(Category::all()->toArray(), 'name');
        // $data['categories'] = Category::with('subcategory.childCategories')
        // ->where('publish', 'Publish')
        // ->latest('id')
        // ->get()
        // ->toArray();
        $data['categories'] = $this->categories;
        // return $data['categories'];
        return view('web.pages.home',$data);
    }

    public function showProducts($type, $categoryId)
    {
        return 'hello';
        // $category = Category::findOrFail($categoryId);
        // $products = $category->products()->paginate(10); // Assuming you want to paginate the products

        // return view('category.products', compact('category', 'products'));
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
