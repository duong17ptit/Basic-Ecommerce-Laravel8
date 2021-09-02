<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class CartController extends Controller
{
    function addToCart(Request $rq)
    {   
        if( $rq->session()->has('user')){
            $cart = new Cart();
            $cart->user_id = $rq->session()->get('user')->id;
            $cart->product_id  = $rq->product_id;
            $cart->qty = 1;
            $cart->save();
            return Redirect("/cart");
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
    static function cartList(){
        if(Session::has('user')){
            $userID =  Session::get('user')['id'];
            $products = DB::table('cart')->join('products','cart.product_id','=','products.id')->where('cart.user_id', $userID)->select('products.*','cart.id as cart_id')->get();
            // var_dump( $products);
            $total_price_products = DB::table('cart')->join('products', 'cart.product_id', '=', 'products.id')->where('cart.user_id', $userID)->sum('products.price');
            // echo "<pre>";
            // var_dump( $products);
            // echo "</pre>";
            // die();
            return view('cartList',[ 'cartProducts'=>$products,'total'=> $total_price_products]);
        }
        else {
            return Redirect("/login");
        }
     
    }
    function removeCart(Request $req,$id) //nen tao them cai cartcontroller . sao lai de chung voi product @@
    // sao k tao cai ajax submit. @@ nm
    {
        Cart::destroy($id);
        $data = "sdasdasd";
        $req->session()->put('message', 'Remove successfully');
        //  echo "<pre>";
        //     var_dump( $req->session()->get('remove_message'));
        // echo "</pre>";
        // die();
        return redirect('/cart');
    } 
    function removeAllCart()
    {
        Cart::truncate();
        return Redirect('cart') ;
    }
    function updateCart(Request $request)
    {
        
        return Redirect('cart') ;
    }
}
