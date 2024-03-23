<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\WebController;
use App\Http\Controllers\Admin\DefualtController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(['get', 'post'], '/login', [DefualtController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/register', [DefualtController::class, 'regisration_from'])->name('register');
Route::match(['get', 'post'], '/product_question', [DefualtController::class, 'product_question'])->name('web.product_question');
Route::match(['get', 'post'], '/regisrationFrom', [DefualtController::class, 'user_register'])->name('web.user_register');
Route::match(['get', 'post'], '/logout', [DefualtController::class, 'logout'])->name('web.logout');

Route::get('/aboutUs', [HomeController::class, 'about_us'])->name('web.aboutUs');
Route::get('/contact', [HomeController::class, 'contact_us'])->name('web.contact');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('web.blogs');
Route::get('/term&conditions', [HomeController::class, 'term'])->name('web.term&conditions');
Route::get('/privacypolicy', [HomeController::class, 'privacy'])->name('web.privacypolicy');
Route::get('/deliveryReturns', [HomeController::class, 'deliveryReturns'])->name('web.deliveryReturns');
Route::get('/howitworks', [HomeController::class, 'howitworks'])->name('web.howitworks');
Route::get('/products/{cat_id?}', [WebController::class, 'products'])->name('web.products');
Route::match(['get','post'],'/product/{id}', [WebController::class, 'product'])->name('web.product')->where('id', '[0-9]+');
Route::match(['get','post'],'/bmiForm', [WebController::class, 'bmi_form'])->name('web.bmiForm');
Route::match(['get','post'],'/bmiFormStore', [WebController::class, 'bmi_formStore'])->name('web.bmiFormStore');
Route::match(['get','post'],'/bmiUpdate', [WebController::class, 'bmi_update'])->name('web.bmiUpdate');
Route::match(['get','post'],'/consultationForm', [WebController::class, 'consultation_form'])->name('web.consultationForm');
Route::match(['get','post'],'/consultationStore', [WebController::class, 'consultation_store'])->name('web.consultationStore');
Route::match(['get','post'],'/productQuestion/{id}', [WebController::class, 'product_question'])->name('web.productQuestion');
Route::match(['get','post'],'/cart/{id?}', [WebController::class, 'cart'])->name('web.cart');
Route::match(['get','post'],'/payment', [WebController::class, 'payment'])->name('payment');
Route::match(['get','post'],'/Completed-order', [WebController::class, 'completed_order']);
Route::match(['get','post'],'/Unsuccessful-order', [WebController::class, 'unsuccessful_order']);
Route::match(['get', 'post'], '/transactionStore/', [WebController::class, 'transaction_store'])->name('web.transactionStore');

Route::get('/getOrder/{id}', [WebController::class, 'get_order']);
Route::post('/createOrder', [WebController::class, 'create_order']);

// Route::match(['get','post'],'/checkout', function(){
//     return view('web.pages.checkout');
// })->name('web.checkout');

Route::match(['get','post'],'/terms', function(){
    return view('web.pages.term');
})->name('web.term_conditions');

Route::match(['get','post'],'/privacypolicy', function(){
    return view('web.pages.privacy');
})->name('web.privacypolicy');

Route::match(['get','post'],'/howitworks', function(){
    return view('web.pages.howitworks');
})->name('web.howitworks');

Route::match(['get','post'],'/deliveryReturns', function(){
    return view('web.pages.deliveryReturns');
})->name('web.deliveryReturns');



Route::get('/', [HomeController::class, 'index'])->name('web.index');
Route::get('/category/{main_category}/{sub_category?}/{child_category?}', [HomeController::class, 'showProducts'])->name('category.products');


Route::get('/blog', function () {
    return view('web.pages.blogs');
});

Route::get('/about', function () {
    return view('web.pages.about');
});



Route::get('/contact', function(){
    return view('web.pages.contact');
});

Route::get('/faqs', function(){
    return view('web.pages.faqs');
});

Route::get('/news', function(){
    return view('web.pages.news');
});

Route::get('/services', function(){
    return view('web.pages.services');
});

Route::get('/shop', function(){
    return view('web.pages.shop');
});

// Route::get('/login', function(){
//     return view('web.pages.login');
// });

Route::get('/wishlist', function(){
    return view('web.pages.wishlist');
});

Route::get('/register', function(){
    return view('web.pages.register');
});

Route::get('/account', function(){
    return view('web.pages.account');
});

Route::get('/cart', function(){
    return view('web.pages.cart');
});

Route::get('/checkout', function(){
    return view('web.pages.checkout');
});

Route::get('/register', function(){
    return view('web.pages.register');
});

Route::get('/product_question', function(){
    return view('web.pages.product_question');
});

// Route::get('/', function(){
//     return view('web.pages.');
// });


include __DIR__ . '/admin.php';