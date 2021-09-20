<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Facade\FlareClient\View;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    //

    function checkout(Request $req)
    {
        // return view('order_now');

        if (Session::has('user')) {
            $userID =  Session::get('user')['id'];
            $allCart = Cart::where('user_id',$userID)->get();
            foreach($allCart as $key => $item){
                $order = new Order();
                $order->firstname = $req->firstname;
                $order->lastname = $req->lastname;
                $order->product_id = $item->product_id;
                $order->cart_id =   $item->id;
                $order->user_id =   $item->user_id;
                $order->address = $req->address;
                $order->status = "Pending";
                $order->description = $req->note;
                $order->phone =  $req->phone_number;
                $order->payment_method = $req-> payment_method;
                $order->save();
                $cart_item =  Cart::where('id',$item->id)->get()->first();
                $cart_item ->status = 0;
                $cart_item ->save();
            }
            // if(Session::has('arr_cartid')){
            //     foreach(Session::get('arr_cartid') as $item)
               
            // }
            // $value = "duong";
            // $req->session()->flash('key', $value);
            return redirect("/my-orders");
            // return view('order_now');
        } else {
            return Redirect("/cart");
        }
    }

    function orderNow()
    {
        if (Session::has('user')) {
            // $arr_qty = array();
            // $arr_cartid = array();
            $userID =  Session::get('user')['id'];
            $total_price_products = DB::table('cart')->join('products', 'cart.product_id', '=', 'products.id')->where('cart.user_id', $userID)->where('cart.status', 1)->sum(DB::raw('products.price * cart.qty'));
            // var_dump( $products);
            $products = DB::table('cart')->join('products', 'cart.product_id', '=', 'products.id')->where('cart.user_id', $userID)->where('cart.status', 1)->select('products.*','cart.qty as cart_qty','cart.id as cart_id')->get();
         
                // foreach($products as $products_item){
                //     // echo" <pre>";
                //     // var_dump($products_item->cart_qty);
                //     // echo "</pre>";
                //     // array_push($arr_qty , $products_item->);
                //     array_push($arr_cartid , $products_item->cart_id);

                // }
               
                Session::put('message','Order Successfully, Thanks!');
                $amount =  Cart::where('user_id',$userID)->where('cart.status', 1)->count();

            return view('order_now', ['total' => $total_price_products, 'amount' => $amount, 'products_in_cart' => $products]);
        } else {
            return Redirect("/cart");
        }
    }

    function myOrders(Request $req)
    {
        if (Session::has('user')) {
            $userID =  Session::get('user')['id'];
            $orders = DB::table('orders')->join('products', 'orders.product_id', '=', 'products.id')->join('cart', 'orders.cart_id', '=', 'cart.id')->where('orders.user_id', $userID)->select('products.*','orders.*','cart.qty as cart_qty','cart.id as cart_id')->orderBy('orders.id', 'desc')->get();
        //     $orders_price =  DB::table('orders')->join('products', 'orders.product_id', '=', 'products.id')->join('cart', 'orders.cart_id', '=', 'cart.id')->where('orders.user_id', $userID)->sum(DB::raw('products.price * cart.qty'))->get();

        //     echo" <pre>";
        //    var_dump($orders);
        //    echo "</pre>";
        //    die();
            return view('my_orders', ['orders' => $orders]);
        } else {
            return Redirect("/cart");
        }
        // return View('my_orders');
    }

}
