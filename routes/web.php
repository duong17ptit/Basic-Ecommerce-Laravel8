<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
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
    return Redirect("/product");
});
Route::get('/login', function () {
    return View("login");
});
Route::get('/logout', function () {

    Session::forget('user');
    return Redirect("/login"); 
});
Route::post('/login-page', [UserController::class,'login']);

//product
Route::get('/product', [ProductController::class,'index']);
Route::get('/product/detail/{id}', [ProductController::class,'detail']);
Route::post('/add-to-cart', [ProductController::class,'addToCart']);