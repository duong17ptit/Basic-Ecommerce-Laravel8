<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class ProductController extends Controller
{
    
    protected $rules = [
        'prd_name' => 'required|unique:products,name',
        'prd_desc' => 'required',
        'prd_price' => 'required|numeric',
        'prd_color' => 'required',
    ];
    protected $attributes = [
          'prd_name'=> 'Product Name' ,
          'prd_desc' => 'Description',
          'prd_price' => 'Price',
          'prd_color' => 'Color',
    ];
    protected $messages = [
        
   ];
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

    
  
    //admin
    function productsAdmin()
    {
        # code...
        $data = Product::all();
        return view('admin.productList');

    }
    function productsList()
    {
        # code...
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 5;
        // echo  $page;
        // echo $limit;
        
        $offset = ((int)$page - 1) * $limit;
        $data =  DB::table('products')->offset($offset)->limit($limit)->get();
        // var_dump($data);
        // die();
        $total= DB::table('products')->count();

        return response()->json([
            'code' => 200,
            'message' => 'Thanh Cong',
            'data' => $data,
            'total'=> $total,
            'page' => $page,
            'offset' => $offset
        ]);

    }
    
   
    function  createProduct(Request $req)
    {


        $product = new Product();
        if ($_POST) {
     


            $validator = Validator::make($req->all(), $this->rules, $this->messages, $this->attributes);

           
            if(!$validator->fails()){
                $product->name = $_POST['prd_name'];
                $product->price = $_POST['prd_price'];
                $product->category = $_POST['prd_cate'];
                $product->color = $_POST['prd_color'];
                $product->description = $_POST['prd_desc'];
                $product->gallery = $_POST['prd_gallery'];
                $product->save();
                return response()->json([
                'code' => 200,
                'message' => 'Add Successfully !'
               
            ]);
            }else{
                return response()->json([
                    'code' => 500,
                    'error' => $validator->errors()->toArray(),
                ]);
            }
         
        }
        # code...
        // $data = Product::all();
        // return view('admin.productList',['products'=> $data ]);

    }
    function  updateProduct(Request $req)
    {

        if ($_POST) {
            $product = Product::find($_POST['id']);
            $validator = Validator::make($req->all(), [
                'prd_name' => ['required',Rule::unique('products','name')->ignore($product->id),],
                'prd_desc' => 'required',
                'prd_price' => 'required|numeric',
                'prd_color' => 'required',
            ], $this->messages, $this->attributes);

           
            if(!$validator->fails()){
                $product->name = $_POST['prd_name'];
                $product->price = $_POST['prd_price'];
                $product->category = $_POST['prd_cate'];
                $product->color = $_POST['prd_color'];
                $product->description = $_POST['prd_desc'];
                $product->gallery = $_POST['prd_gallery'];
                $product->save();
                return response()->json([
                'code' => 200,
                'message' => 'Update Successfully !'
               
            ]);
            }else{
                return response()->json([
                    'code' => 500,
                    'error' => $validator->errors()->toArray(),
                ]);
            }
         
        }
        # code...
        // $data = Product::all();
        // return view('admin.productList',['products'=> $data ]);

    }
    function removeProduct(Request $req)
    {

        if($data = Product::find($_POST['id'])){
            Product::destroy($_POST['id']);
            return response()->json([
                'code' => 200,
                'message' => 'Delete Successfully !'
               
            ]);
        }
        else{
            return response()->json([
                'code' => 500,
                'message' => 'Delete Failure !'
               
            ]);
        }
        

      
        // $data = "sdasdasd";
        // $req->session()->put('message', 'Remove successfully');
        //  echo "<pre>";
        //     var_dump( $req->session()->get('remove_message'));
        // echo "</pre>";
        // die();
        return redirect('/cart');
    }
    
}
