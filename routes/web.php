<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
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
//register
Route::get('/register', function () {
    return view("register");
});
Route::post('/signup',[UserController::class,'register']);
//end-register

Route::get('/logout', function () {

    Session::forget('user');
    return Redirect("/login"); 
});
Route::post('/login-page', [UserController::class,'login']);

//product
Route::get('/product', [ProductController::class,'index']);
Route::get('/product/detail/{id}', [ProductController::class,'detail']);

Route::post('/add-to-cart', [CartController::class,'addToCart']);
Route::get('/cart', [CartController::class,'cartList'])->name('cartList');
Route::get('/removeCart/{id}', [CartController::class,'removeCart']);
Route::get('/clear-cart', [CartController::class,'removeAllCart']);
Route::post('/cart/update',[CartController::class,'updateCart']);

Route::get('/order-now', [OrderController::class,'orderNow']);
Route::post('/checkout', [OrderController::class,'checkout']);
Route::get('/my-orders', [OrderController::class,'myOrders']);


//contact
Route::get('/contact', function () {
    return view("contact");
});