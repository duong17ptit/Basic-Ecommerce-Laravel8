<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Foreach_;

class CartController extends Controller
{
    function addToCart(Request $rq)
    {
        if ($rq->session()->has('user')) {

            if (Cart::where('user_id', $rq->session()->get('user')->id)->where('product_id', $rq->product_id)->exists() and Cart::where('user_id', $rq->session()->get('user')->id)->where('product_id', $rq->product_id)->where('status', 1)->exists() ) {

                $item  = Cart::where('user_id', $rq->session()->get('user')->id)->where('product_id', $rq->product_id)->where('status', 1)->get()->first();
                //    echo "<pre>";
                //    var_dump( $item->qty );
                //    echo "</pre>";
                //    die();
                $item->qty =  $item->qty +  $rq->product_qty_add;
                $item->save();
                return Redirect("/cart");
            } else {
                $cart = new Cart();
                $cart->user_id = $rq->session()->get('user')->id;
                $cart->product_id  = $rq->product_id;
                $cart->qty = $rq->product_qty_add;
                $cart->status = 1;
                $cart->save();
                return Redirect("/cart");
            }
        } else {
            return Redirect("/login");
        }
    }
    static function cartItem()
    {
        $userID =  Session::get('user')['id'];
        return Cart::where('user_id', $userID)->where('status', 1)->count();
    }
    static function cartList()
    {
        if (Session::has('user')) {
            $userID =  Session::get('user')['id'];
            $products = DB::table('cart')->join('products', 'cart.product_id', '=', 'products.id')->where('cart.user_id', $userID)->where('cart.status', 1)->select('products.*', 'cart.qty as cart_qty', 'cart.id as cart_id')->get();
            // var_dump( $products);
            $total_price_products = DB::table('cart')->join('products', 'cart.product_id', '=', 'products.id')->where('cart.user_id', $userID)->where('cart.status', 1)->sum(DB::raw('products.price * cart.qty'));
            // echo "<pre>";
            // var_dump( $products);
            // echo "</pre>";'products.price','*','cart.qty'
            // die();
            return view('cartList', ['cartProducts' => $products, 'total' => $total_price_products]);
        } else {
            return Redirect("/login");
        }
    }
    function removeCart(Request $req, $id)
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
        return Redirect('cart');
    }
    function updateCart(Request $request)
    {
        // foreach ($request->input() as $value) {
        //     // foreach ($value as $value_item) {
        //         echo "<pre>";
        //         var_dump($value[1]);
        //         echo "</pre>";
        //     //  }
        // }
        // echo "<pre>";
        // var_dump($request->get('product_id'));
        // echo "</pre>";
        // echo "<pre>";
        // var_dump($request->get('incart_id'));
        // echo "</pre>";
        foreach ($request->get('incart_id') as $key => $value2) {
            // foreach ($value as $value_item) {
            // $item = Cart::where('user_id', $request->session()->get('user')->id)->where('product_id',$value2)->get();
            $item = Cart::where('id', $value2)->get()->first();
            // echo "<pre>";
            // var_dump($item);
            // echo "</pre>";
            // die();
            $item->qty = $request->get('qty')[$key];
            $item->save();
            //  }
        }
        $request->session()->put('message', 'Update Cart successfully');
        // return $request->input();
        //  return Redirect('cart') ;
        return Redirect('cart');
    }
}
