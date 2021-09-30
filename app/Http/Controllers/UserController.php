<?php

namespace App\Http\Controllers;
// namespace App\Http\Requests;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
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

        $user = User::where(['email'=>$rq->email])->where('role','customer')->first();
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
        $user->phone =  $rq->phone;
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
            $rq->session()->put('userAD', $user);
            // echo "<pre>";
            // var_dump($rq->session()->get('user')['role']);
            // echo "</pre>";
            // die();
            return Redirect('/admin/dashboard'); 
        }

    }
    function adminSignUp(Request $rq)
    {
        // Redirect::setIntendedUrl(url()->previous());
        return View("admin.registerAdmin");

    }
    function adminRegister(Request $rq)
    {
        # code...
        $user = new User();
        $user->name = $rq->name;
        $user->email =  $rq->email;
        $user->password = Hash::make($rq->password);
        $user->phone =  $rq->phone;
        $user->role = "admin";
        $user->save();
        $rq->session()->put('messa', 'Register Successfully! Login Now ');
        return redirect('/admin/login');
    }

    function profileAdmin(Request $rq)
    {   
        $user_id =  Session::get('userAD')['id'];
        $data = User::find($user_id);
        // Redirect::setIntendedUrl(url()->previous());
        return View("admin.profile",['data'=> $data]);

    }
    function updateProfileAdmin(Request $rq)
    {   
        $input = $rq->all();
        $user = User::find($rq->userID);
        // dd($rq->file('image'));
        if ($image =  $rq->file('image')) {
            $destinationPath = 'resources/images';
            $profileImage = date('Ymd') .  $image->getClientOriginalName()."." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
            $user->image = $input['image'];
        }else{
            unset($input['image']);
        }
        
        $user->name = $rq->name;
        $user->phone = $rq->phone;
        $user->save();
        $rq->session()->put('message', 'Update Sucssessfully !');
        return redirect('/admin/profile');
    }
    function changePasswordUserAdmin(Request $req)
    {  
        // dd( $req->all());
        // die();
        $user_id =  Session::get('userAD')['id'];
        $data = User::find($user_id);
        //  dd( $req->current_pass);
        //  die();
        if(!Hash::check($req->current_pass,  $data->password)){
            $req->session()->put('message', 'Current password is wrong');
            return redirect('/admin/profile/password');
        }else
        {
            $data->password = Hash::make($req->new_pass);
            $data->save();
            $req->session()->put('message_success', 'Change password Successfully!');
            return redirect('/admin/profile/password');
        }
        // Redirect::setIntendedUrl(url()->previous());

    }

}
