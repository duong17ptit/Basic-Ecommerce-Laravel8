<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function login(Request $rq)
    {
        # code...

        $user = User::where(['email'=>$rq->email])->first();
        if(!$user || !Hash::check($rq->password,  $user->password)){
            return "UserName or PassWord is not matched";
        }
        else {
            $rq->session()->put('user', $user);
            return redirect('/product') ;
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
        return redirect('/login') ;
    }
}
