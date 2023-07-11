<?php

use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\MechanicController;
use App\Http\Controllers\backend\PaymentController;
use App\Http\Controllers\backend\ReportController;
use App\Http\Controllers\backend\ServiceCenterController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\backend\ServiceRequestController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\frontend\HomepageController;
use Illuminate\Support\Facades\Route;

//frontend
Route::get('/',[HomepageController::class,'homepage'])->name('homepage');


// Route::get('/',[HomepageController::class,'homepage'])->name('homepage');

Route::get('/admin/login',[AuthController::class,'admin_login'])->name('admin.login');
Route::post('/admin/do_login',[AuthController::class,'admin_do_login'])->name('admin.do.login');


Route::group(['prefix'=>'admin','middleware'=>['auth','checkAdmin']], function(){

Route::get('/admin/logout',[AuthController::class,'admin_logout'])->name('admin.logout');
Route::get('/',[DashboardController::class,'dashboard'])->name('dashboard');

// user
Route::get('/user_list',[UserController::class,'user_list'])->name('user.list');
Route::get('/add_user',[UserController::class,'user_add'])->name('user.add');
Route::post('/store',[UserController::class,'store'])->name('user.store');

//service center
Route::get('/servcie_center',[ServiceCenterController::class,'sercive_center_list'])->name('center.list');
Route::get('/add_center',[ServiceCenterController::class,'add_sercive_center'])->name('center.add');
Route::post('/store_center',[ServiceCenterController::class,'store_sercive_center'])->name('center.store');
Route::get('/delete_center/{id}',[ServiceCenterController::class,'delete_sercive_center'])->name('center.delete');



// service
Route::get('/service_list',[ServiceController::class,'service'])->name('service.list');
Route::get('/add_service',[ServiceController::class,'add_service'])->name('service.add');
Route::post('/admin/store_service',[ServiceController::class,'store_service'])->name('service.store');
Route::get('/delete_service/{id}',[ServiceController::class,'detele_service'])->name('service.delete');

// mechanic
Route::get('/mechanic_list',[MechanicController::class,'mechanic_list'])->name('mechanic.list');
Route::get('/add_mechanic',[MechanicController::class,'add_mechanic'])->name('mechanic.add');
Route::post('/store_mechanic',[MechanicController::class,'store_mechanic'])->name('mechanic.store');
Route::get('/edit_mechanic/{id}',[MechanicController::class,'edit_mechanic'])->name('mechanic.edit');
Route::post('/update_mechanic/{id}',[MechanicController::class,'update_mechanic'])->name('mechanic.update');
Route::get('/delete_mechanic/{id}',[MechanicController::class,'delete_mechanic'])->name('mechanic.delete');


//Service Request
Route::get('/service_request',[ServiceRequestController::class,'service_request'])->name('service.request');

// Car Type
Route::get('/car_type',[CategoryController::class,'category'])->name('category');
Route::get('/add_car_type',[CategoryController::class,'add_category'])->name('add.category');
Route::post('/store_car_type',[CategoryController::class,'store_category'])->name('store.category');

// payment
Route::get('/payment',[PaymentController::class,'payment'])->name('payment');



//report
Route::get('/report',[ReportController::class,'report'])->name('report');

//customer
Route::get('/customer_list',[CustomerController::class,'customer_list'])->name('customer.list');


});
