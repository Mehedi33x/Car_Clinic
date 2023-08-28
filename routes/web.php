<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\ReportController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\backend\PaymentController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\MechanicController;
use App\Http\Controllers\frontend\AuthwebController;
use App\Http\Controllers\frontend\BookingController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\SupportController;
use App\Http\Controllers\frontend\UserWebController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ProductCategoryController;
use App\Http\Controllers\backend\ProductContoller;
use App\Http\Controllers\frontend\HomepageController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\frontend\ServicePageController;
use App\Http\Controllers\backend\ServiceCenterController;
use App\Models\Product;

//frontend
// Auth
Route::get('/login', [AuthwebController::class, 'login'])->name('login.webpage');
Route::post('/do_login', [AuthwebController::class, 'do_login'])->name('do.login.webpage');
Route::get('/signup', [AuthwebController::class, 'signup'])->name('signup.webpage');
Route::post('/signup_store', [AuthwebController::class, 'signup_store'])->name('signup.store.webpage');
Route::get('/logout', [AuthwebController::class, 'logout'])->name('logout.webpage');


// homepage
Route::get('/', [HomepageController::class, 'homepage'])->name('homepage.webpage');

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


// booking
Route::get('/booking', [BookingController::class, 'booking'])->name('booking.webpage');
Route::post('/booking_store', [BookingController::class, 'booking_store'])->name('booking.webpage.store');
Route::post('/booking/serivces/charges', [BookingController::class, 'booking_charge'])->name('booking.charge');


//service
Route::get('/service', [ServicePageController::class, 'service_page'])->name('service.webpage');
Route::get('/service_details/{id}', [ServicePageController::class, 'service_details'])->name('service.details.webpage');

Route::get('/about', [AboutController::class, 'about_page'])->name('about.webpage');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact.webpage');
Route::get('/feedback', [ContactController::class, 'feedback'])->name('feedback.webpage');
Route::post('/feedback_store', [ContactController::class, 'feedback_store'])->name('feedback.store.webpage');

Route::get('/products',[ProductContoller::class,'all_product'])->name('all.products.webpage');
Route::get('/product_details/{id}',[ProductContoller::class,'product_details'])->name('details.products.webpage');
//categorywisedata
Route::get('/category_wise_products/{id}',[ProductCategoryController::class,'category_wise'])->name('category.wise');


//support
Route::get('/support', [SupportController::class, 'supoort'])->name('webpage.support');
Route::post('/support_message', [SupportController::class, 'message'])->name('webpage.support.message');


//User Profile
Route::get('/user_profile', [CustomerController::class, 'customer_profile'])->name('profile.customer');
Route::get('/users_edit', [CustomerController::class, 'edit_profile'])->name('edit.customer.profile');
Route::patch('/users_update', [CustomerController::class, 'update_profile'])->name('update.customer.profile');
Route::get('/users_booking_list', [CustomerController::class, 'booking_list'])->name('booking.list');
Route::get('/delete_booking/{id}', [BookingController::class, 'delete_booking'])->name('delete.booking.webpage');












//login
Route::get('/admin/login', [AuthController::class, 'admin_login'])->name('admin.login');
Route::post('/admin/do_login', [AuthController::class, 'admin_do_login'])->name('admin.do.login');

//backend
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'checkAdmin']], function () {

    //logout
    Route::get('/admin/logout', [AuthController::class, 'admin_logout'])->name('admin.logout');

    //dashboard
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    // user
    Route::get('/user_list', [UserController::class, 'user_list'])->name('user.list');
    Route::get('/add_user', [UserController::class, 'user_add'])->name('user.add');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user_view/{id}', [UserController::class, 'user_view'])->name('user.view');
    Route::get('/user_delete/{id}', [UserController::class, 'user_delete'])->name('user.delete');

    //service center

    // Route::get('/servcie_center', [ServiceCenterController::class, 'sercive_center_list'])->name('center.list');
    // Route::get('/view_center/{id}', [ServiceCenterController::class, 'view_sercive_center'])->name('center.view');
    // Route::get('/add_center', [ServiceCenterController::class, 'add_sercive_center'])->name('center.add');
    // Route::post('/store_center', [ServiceCenterController::class, 'store_sercive_center'])->name('center.store');
    // Route::get('/edit_center/{id}', [ServiceCenterController::class, 'edit_sercive_center'])->name('center.edit');
    // Route::get('/delete_center/{id}', [ServiceCenterController::class, 'delete_sercive_center'])->name('center.delete');



    // service
    Route::get('/service_list', [ServiceController::class, 'service'])->name('service.list');
    Route::get('/service_view/{id}', [ServiceController::class, 'view_service'])->name('service.view');
    Route::get('/add_service', [ServiceController::class, 'add_service'])->name('service.add');
    Route::post('/admin/store_service', [ServiceController::class, 'store_service'])->name('service.store');
    Route::get('/edit_service/{id}', [ServiceController::class, 'edit_service'])->name('service.edit');
    Route::post('/update_service/{id}', [ServiceController::class, 'update_service'])->name('service.update');
    Route::get('/delete_service/{id}', [ServiceController::class, 'detele_service'])->name('service.delete');
    Route::get('/service_search', [ServiceController::class, 'service_search'])->name('service.search');


    // mechanic
    Route::get('/mechanic_list', [MechanicController::class, 'mechanic_list'])->name('mechanic.list');
    Route::get('/add_mechanic', [MechanicController::class, 'add_mechanic'])->name('mechanic.add');
    Route::get('/view_mechanic/{id}', [MechanicController::class, 'view_mechanic'])->name('mechanic.view');
    Route::post('/store_mechanic', [MechanicController::class, 'store_mechanic'])->name('mechanic.store');
    Route::get('/edit_mechanic/{id}', [MechanicController::class, 'edit_mechanic'])->name('mechanic.edit');
    Route::patch('/update_mechanic/{id}', [MechanicController::class, 'update_mechanic'])->name('mechanic.update');
    Route::get('/delete_mechanic/{id}', [MechanicController::class, 'delete_mechanic'])->name('mechanic.delete');

    //product category
    Route::get('/product-category', [ProductCategoryController::class, 'view_category'])->name('category.product.view');
    Route::get('/add_product-category', [ProductCategoryController::class, 'add_category'])->name('category.product.add');
    Route::post('/store_product-category', [ProductCategoryController::class, 'store_category'])->name('product.category.store');
    //view/edit/delete/


    //product
    Route::get('/product_list', [ProductContoller::class, 'product_list'])->name('product.list');
    Route::get('/product_add', [ProductContoller::class, 'product_add'])->name('product.add');
    Route::post('/product_store', [ProductContoller::class, 'product_store'])->name('product.store');
    Route::get('/product_view', [ProductContoller::class, 'product_view'])->name('product.view');


    //Service Request
    Route::get('/service_request', [BookingController::class, 'service_request'])->name('service.request');
    Route::get('/view/service_request/{id}', [BookingController::class, 'view_request'])->name('view.request');
    Route::get('/edit/service_request/{id}', [BookingController::class, 'edit_request'])->name('edit.request');
    Route::patch('/update/service_request/{id}', [BookingController::class, 'update_request'])->name('update.request');
    Route::get('/get/service_request/{id}', [BookingController::class, 'delete_request'])->name('delete.request');


    //Car Brand
    Route::get('/brand_list', [BrandController::class, 'brand_list'])->name('brand.list');
    Route::get('/view_brand/{id}', [BrandController::class, 'view_brand'])->name('brand.view');
    Route::get('/add_brand', [BrandController::class, 'add_brand'])->name('add.brand');
    Route::post('/store_brand', [BrandController::class, 'store_brand'])->name('store.brand');
    Route::get('/edit_brand/{id}', [BrandController::class, 'edit_brand'])->name('edit.brand');
    Route::post('/update_brand/{id}', [BrandController::class, 'update_brand'])->name('update.brand');
    Route::get('/brand_delete/{id}', [BrandController::class, 'brand_delete'])->name('brand.delete');



    // Car Type
    Route::get('/car_type', [CategoryController::class, 'category'])->name('category');
    Route::get('/view_type/{id}', [CategoryController::class, 'view_type'])->name('view.type');
    Route::get('/add_car_type', [CategoryController::class, 'add_category'])->name('add.category');
    Route::post('/store_car_type', [CategoryController::class, 'store_category'])->name('store.category');
    Route::get('/edit_type/{id}', [CategoryController::class, 'edit_category'])->name('edit.category');
    Route::put('/update_type/{id}', [CategoryController::class, 'update_category'])->name('update.category');
    Route::get('/delete_type/{id}', [CategoryController::class, 'delete_category'])->name('delete.category');

    // payment
    Route::get('/payment', [PaymentController::class, 'payment'])->name('payment');

    //feedback
    Route::get('/user_feedback', [ContactController::class, 'view_feedback'])->name('view.feedback');
    Route::get('/delete_feedback/{id}', [ContactController::class, 'delete_feedback'])->name('feedback.delete');




    //report
    Route::get('/report', [ReportController::class, 'report'])->name('report');
    Route::get('/report_show', [ReportController::class, 'report_show'])->name('report.show');


    //support
    Route::get('/admin_support', [SupportController::class, 'admin_support'])->name('admin.support');
    Route::get('/admin_reply/{id}', [SupportController::class, 'admin_reply'])->name('admin.reply');
    Route::post('/send_reply', [SupportController::class, 'send_reply'])->name('send.reply');



    //customer
    Route::get('/customer_list', [CustomerController::class, 'customer_list'])->name('customer.list');
    Route::get('/customer_view/{id}', [CustomerController::class, 'customer_view'])->name('customer.view');
    Route::get('/customer_delete/{id}', [CustomerController::class, 'customer_delete'])->name('customer.delete');

    // user profile
    Route::get('/user_profile', [UserController::class, 'user_profile'])->name('user.profile');
    Route::get('/edit_profile', [UserController::class, 'edit_profile'])->name('edit.profile');
    Route::put('/update_profile', [UserController::class, 'update_profile'])->name('update.profile');
});
