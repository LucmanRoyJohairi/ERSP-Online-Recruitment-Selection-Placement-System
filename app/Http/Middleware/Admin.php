<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Admin
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
        if(!Auth::check()){
            return redirect()->route('login');
        }

        // admin role
        if(Auth::user()->userTypeId == 1){
            return $next($request);
        }

        //applicant role
        if(Auth::user()->userTypeId == 2){
            return redirect()->route('applicant-dashboard');
        }
    }
}
