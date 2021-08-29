<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    function index()
    {
        # code...
        $data = Product::all();
        return view('product',[ 'products'=> $data ]);
    }
    function detail($id){
        $data = Product::find($id);
        return view('product_detail',[ 'item'=> $data ]);
    }
    function addToCart(Request $rq)
    {   
        if( $rq->session()->has('user')){
            $cart = new Cart();
            $cart->user_id = $rq->session()->get('user')->id;
            $cart->product_id  = $rq->product_id;
            $cart->save();
        }
        else {
            return Redirect("/login");
        }
       

    }
    static function cartItem()
    {
        $userID =  Session::get('user')['id'];
        return Cart::where('user_id',   $userID )->count();
    }
}
