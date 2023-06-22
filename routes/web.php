<?php

use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\MechanicController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\frontend\HomepageController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomepageController::class,'homepage'])->name('homepage');
// Route::get('/admin',[DashboardController::class,'admin_panel'])->name('admin.panel');
Route::get('/admin',[DashboardController::class,'dashboard'])->name('dashboard');

// user
Route::get('/admin/user_list',[UserController::class,'user_list'])->name('user.list');
Route::get('/admin/add_user',[UserController::class,'user_add'])->name('user.add');

// service
Route::get('/admin/services_list',[ServiceController::class,'service'])->name('service.list');

// mechanic
Route::get('/admin/mechanic_list',[MechanicController::class,'mechanic_list'])->name('mechanic.list');
Route::get('/admin/add_mechanic',[MechanicController::class,'add_mechanic'])->name('mechanic.add');
Route::post('/store_mechanic',[MechanicController::class,'store_mechanic'])->name('mehcanic.store');
Route::get('/edit_mechanic/{id}',[MechanicController::class,'edit_mechanic'])->name('mehcanic.edit');
Route::post('/update_mechanic/{id}',[MechanicController::class,'update_mechanic'])->name('mehcanic.update');
// Route::get('/delete_mechanic/{id}',[MechanicController::class,'delete'])->name('mehcanic.delete');
