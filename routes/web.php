<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
//customer

Route::get('/', function () {
    return Redirect("/product");
});
Route::get('/login',[UserController::class,'startLogin']);
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
//cart
Route::post('/add-to-cart', [CartController::class,'addToCart']);
Route::get('/cart', [CartController::class,'cartList'])->name('cartList');
Route::get('/removeCart/{id}', [CartController::class,'removeCart']);
Route::get('/clear-cart', [CartController::class,'removeAllCart']);
Route::post('/cart/update',[CartController::class,'updateCart']);
//orer
Route::get('/order-now', [OrderController::class,'orderNow']);
Route::post('/checkout', [OrderController::class,'checkout']);
Route::get('/my-orders', [OrderController::class,'myOrders']);


//contact
Route::get('/contact', function () {
    return view("contact");
});

Route::post('/send-contact', [HomeController::class,'sendContact']);

//end-customer

//admin
Route::get('/admin/dashboard', function () {
    return View("admin.dashboard");
});
//product
Route::get('/admin/products',[ProductController::class,'productsAdmin']);
Route::get('/admin/products/list',[ProductController::class,'productsList']);
Route::post('/admin/products/create',[ProductController::class,'createProduct']);
Route::post('/admin/products/update',[ProductController::class,'updateProduct']);
Route::post('/admin/products/delete',[ProductController::class,'removeProduct']);



//end-admin