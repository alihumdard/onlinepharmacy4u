<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('web.pages.home');
});


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

Route::get('/login', function(){
    return view('web.pages.login');
});

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

// Route::get('/', function(){
//     return view('web.pages.');
// });
