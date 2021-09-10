<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    
}
