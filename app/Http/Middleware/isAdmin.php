<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use  Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\Session;
class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

         if($request->session()->has('user') and $request->session()->get('user')['role'] == "admin" ){
            return $next($request);
        }
        return redirect()->back();
    }
}
