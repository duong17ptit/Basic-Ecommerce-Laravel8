<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    function sendContact(Request $req)
    {
            $contact = new Contact();
            $contact->name =  $req->name;
            $contact->email = $req->email;
            $contact->phone = $req->phone;
            $contact->subject = $req->subject;
            $contact->content = $req->content;
            $contact->save();
            $message = "Send contact successfully !";
            $req->session()->put('message', $message);
            return Redirect('/contact');
      
    }
}
