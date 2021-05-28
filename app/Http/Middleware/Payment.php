<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Payment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
         // CURRENT ROLE IS PAYMENT


        //  ROLE Listing
        // Role 1 - admin
        // Role 2 - user
        // Role 3 - sales
        // Role 4 - DR
        // Role 5 - releasing
        // Role 6 - production
        // Role 7 - payment
        // Role 8 - supervisor

        if(!Auth::check()){
            return redirect()->route('login');
        }

        // PAYMENT role
        if(Auth::user()->role->name == 'Payment'){
            return $next($request);
        }else{
            return redirect()->back();
        }

    }
}
