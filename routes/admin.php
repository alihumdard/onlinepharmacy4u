<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SystemController;
use App\Http\Controllers\Admin\DefualtController;
use App\Http\Controllers\Admin\ProductController;


Route::get('/admin', [DefualtController::class, 'index'])->name('admin.index');

Route::prefix('admin')->middleware(['check.userAuthCheck'])->group(function () {
    Route::get('/setting', [DefualtController::class, 'profile_setting'])->name('admin.profileSetting');
    Route::get('/faq', [DefualtController::class, 'faq'])->name('admin.faq');
    Route::get('/contact', [DefualtController::class, 'contact'])->name('admin.contact');

    Route::get('/doctors', [SystemController::class, 'doctors'])->name('admin.doctors');
    Route::match(['get','post'],'/addDoctor',   [SystemController::class, 'add_doctor'])->name('admin.addDoctor');
    Route::match(['get','post'],'/storeDoctor', [SystemController::class, 'store_doctor'])->name('admin.storeDoctor');
    
    Route::get('/categories', [SystemController::class, 'categories'])->name('admin.categories');
    Route::match(['get','post'],'/addCategory', [SystemController::class, 'add_category'])->name('admin.addCategory');
    Route::match(['get','post'],'/storeCategory', [SystemController::class, 'store_category'])->name('admin.storeCategory');
    Route::get('/subCategories', [SystemController::class, 'sub_categories'])->name('admin.subCategories');
    Route::get('/childCategories', [SystemController::class, 'child_categories'])->name('admin.childCategories');
    Route::get('/getParentCategory', [SystemController::class, 'get_parent_category'])->name('admin.getParentCategory');
    Route::get('/getSubCategory', [SystemController::class, 'get_sub_category'])->name('admin.getSubCategory');
    Route::get('/getChildCategory', [SystemController::class, 'get_child_category'])->name('admin.getChildCategory');

    Route::get('/collections', [SystemController::class, 'collections'])->name('admin.collections');
    Route::match(['get','post'],'/addCollection', [SystemController::class, 'add_collection'])->name('admin.addCollection');
    Route::match(['get','post'],'/storeCollection', [SystemController::class, 'store_collection'])->name('admin.storeCollection');

    Route::match(['get','post'],'/prodcuts', [ProductController::class, 'prodcuts'])->name('admin.prodcuts');
    Route::match(['get','post'],'/addProduct', [ProductController::class, 'add_product'])->name('admin.addProduct');
    Route::match(['get','post'],'/storeProduct', [ProductController::class, 'store_product'])->name('admin.storeProduct');
    
    Route::get('/admins', [SystemController::class, 'admins'])->name('admin.admins');
    Route::match(['get','post'],'/addAdmin',   [SystemController::class, 'add_admin'])->name('admin.addAdmin');
    Route::match(['get','post'],'/storeAdmin', [SystemController::class, 'store_admin'])->name('admin.storeAdmin');
    Route::get('/users', [SystemController::class, 'users'])->name('admin.users');
    
    Route::get('/questionCategories', [SystemController::class, 'question_categories'])->name('admin.questionCategories');
    Route::match(['get','post'], '/addQuestionCategory', [SystemController::class, 'add_question_category'])->name('admin.addQuestionCategory');
    Route::post('/storeQuestionCategory', [SystemController::class, 'store_question_category'])->name('admin.storeQuestionCategory');
    Route::get('/questions', [SystemController::class, 'questions'])->name('admin.questions');
    Route::match(['get','post'],'/addQuestion', [SystemController::class, 'add_question'])->name('admin.addQuestion');
    Route::match(['get','post'],'/storeQuestion', [SystemController::class, 'store_question'])->name('admin.storeQuestion');
    Route::get('/assignQuestion', [SystemController::class, 'assign_question'])->name('admin.assignQuestion');
    Route::match(['get','post'], '/getAssignQuestion', [SystemController::class, 'get_assign_quest'])->name('admin.getAssignQuestion');
    Route::match(['get','post'], '/storeAssignQuestion', [SystemController::class, 'store_assign_quest'])->name('admin.storeAssignQuestion');
    Route::post('/questionMapping', [SystemController::class, 'question_mapping'])->name('admin.qustionMapping');
    Route::get('/questionDetail', [SystemController::class, 'question_detail'])->name('admin.qustionDetail');

    Route::get('/ordersRecieved', [SystemController::class, 'orders_recieved'])->name('admin.ordersRecieved');
    Route::get('/doctorsApproval', [SystemController::class, 'doctors_approval'])->name('admin.doctorsApproval');
    Route::get('/ordersShiped', [SystemController::class, 'orders_shiped'])->name('admin.ordersShiped');
    Route::get('/orderDetail/{id}', [SystemController::class, 'order_detail'])->name('admin.orderDetail');
    Route::get('/consultationView/{uid}/{pid}/{oid}', [SystemController::class, 'consultation_view'])->name('admin.consultationView');
    Route::match(['get','post'], '/changeStatus', [SystemController::class, 'change_status'])->name('admin.changeStatus');


});
