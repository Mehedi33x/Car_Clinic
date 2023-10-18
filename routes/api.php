<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/all-products',[ProductController::class,'allProducts']);
Route::get('/product/{id}',[ProductController::class,'product']);
Route::post('/create-product',[ProductController::class,'createProduct']);
Route::get('delete-product/{id}',[ProductController::class,'deleteProduct']);

Route::post('/user-registration',[AuthController::class,'register']);
