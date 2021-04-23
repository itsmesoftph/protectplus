<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Delivery
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        // return $next($request);



          // CURRENT ROLE IS DELIVERY


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

        // admin role
        if(Auth::user()->role->name == 'Admin'){
            // return redirect()->route('login');
            return back();


        }

        //  user role
        if(Auth::user()->role->name == 'User'){
            return redirect()->route('login');
        }

        // sales role
        if(Auth::user()->role->name == 'Sales'){
            // return redirect()->route('login');
            return back();


        }

        //  DR role
        if(Auth::user()->role->name == 'DR'){
            return $next($request);


        }

        // Releasing role
        if(Auth::user()->role->name == 'Releasing'){
            // return redirect()->route('login');
            return back();


        }

        // Payment role
    if(Auth::user()->role->name == 'Payment'){
            // return redirect()->route('login');
            return back();


        }

        // Supervisor role
        if(Auth::user()->role->name == 'Supervisor'){
            // return redirect()->route('login');
            return back();


        }
        // Production role
        if(Auth::user()->role->name == 'Production'){
            // return redirect()->route('login');
            return back();
        }

    }
}
