<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Sales
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){


    // CURRENT ROLE IS SALES


    //  ROLE Listing
    // Role 1 - admin
    // Role 2 - user
    // Role 3 - sales
    // Role 4 - DR
    // Role 5 - releasing
    // Role 6 - payment
    // Role 7 - supervisor

        if(!Auth::check()){
            return redirect()->route('login');
        }

        // SALES role
        if(Auth::user()->role->name == 'Sales'){
            return $next($request);

            } else {
                return redirect()->back();

        }

    }
}
