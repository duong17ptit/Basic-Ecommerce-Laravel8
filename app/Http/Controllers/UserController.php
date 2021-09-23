<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Providers\RouteServiceProvider;
class UserController extends Controller
{
    //customer
    function startLogin(Request $rq)
    {
        Redirect::setIntendedUrl(url()->previous());
        return View("login");

    }
    function login(Request $rq)
    {
        # code...

        $user = User::where(['email'=>$rq->email])->first();
        if(!$user || !Hash::check($rq->password,  $user->password)){
            $rq->session()->put('messa', 'Invalid Information !!');
            return Redirect('/login'); 
        }
        else {
            $rq->session()->put('user', $user);
        
            return Redirect()->intended(RouteServiceProvider::HOME); 
        }
    }
    function register(Request $rq)
    {
        # code...
        $user = new User();
        $user->name = $rq->name;
        $user->email =  $rq->email;
        $user->password = Hash::make($rq->password);
        $user->role = "customer";
        $user->save();
        $rq->session()->put('messa', 'Register Successfully! Login Now ');
        return redirect('/login');
    }


    // Admin
    function adminLogin(Request $rq)
    {
        // Redirect::setIntendedUrl(url()->previous());
        return View("admin.loginAdmin");

    }
    function adminCheck(Request $rq)
    {
        $user = User::where(['email'=>$rq->email])->first();
        if(!$user || !Hash::check($rq->password,  $user->password) || ($user->role != "admin")){
            $rq->session()->put('message', 'Invalid information !!');
            return Redirect('/admin/login'); 
        }
     
        else {
            $rq->session()->put('user', $user);
            // echo "<pre>";
            // var_dump($rq->session()->get('user')['role']);
            // echo "</pre>";
            // die();
            return Redirect('/admin/dashboard'); 
        }

    }

}
