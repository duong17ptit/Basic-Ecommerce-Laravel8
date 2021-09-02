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
            foreach($allCart as $item){
                $order = new Order();
                $order->firstname = $req->firstname;
                $order->lastname = $req->lastname;
                $order->product_id = $item->product_id;
                $order->user_id =   $item->user_id;
                $order->address = $req->address;
                $order->status = "Pending";
                $order->description = $req->note;
                $order->phone =  $req->phone_number;
                $order->payment_method = $req-> payment_method;
                $order->save();
                Cart::where('user_id',$userID)->delete();
           
            }
            $value = "duong";
            $req->session()->flash('key', $value);
            return redirect("/my-orders");
            // return view('order_now');
        } else {
            return Redirect("/cart");
        }
    }

    function orderNow()
    {
        if (Session::has('user')) {
            $userID =  Session::get('user')['id'];
            $total_price_products = DB::table('cart')->join('products', 'cart.product_id', '=', 'products.id')->where('cart.user_id', $userID)->sum('products.price');
            // var_dump( $products);
            $products = DB::table('cart')->join('products', 'cart.product_id', '=', 'products.id')->where('cart.user_id', $userID)->select('products.*')->get();
            $amount =  Cart::where('user_id',$userID)->count();

            return view('order_now', ['total' => $total_price_products, 'amount' => $amount, 'products_in_cart' => $products]);
        } else {
            return Redirect("/cart");
        }
    }

    function myOrders(Request $req)
    {
        if (Session::has('user')) {
            $userID =  Session::get('user')['id'];
            $orders = DB::table('orders')->join('products', 'orders.product_id', '=', 'products.id')->where('orders.user_id', $userID)->get();
        //     echo" <pre>";
        //    var_dump( $orders);
        //    echo "</pre>";
        //    die();
            return view('my_orders', ['orders' => $orders]);
        } else {
            return Redirect("/cart");
        }
        // return View('my_orders');
    }

}
