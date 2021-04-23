<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check()) {
        //     return redirect(RouteServiceProvider::HOME);
        // }

        // return $next($request);

    // if((Auth::user()) !== null){
    //     dd(Auth::user());
    // } else {
    //     dd(Auth::user());
    // }

    if(Auth::user() !== null) {

        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->role;
            // dd($role['name']);
            if($role){
                switch ($role['name']) {
                    case 'Admin':
                    return redirect('/admin');
                    break;

                    case 'Sales':
                    return redirect('sales');
                    break;

                    case 'Production':
                    return redirect('/admin');
                    break;

                    case 'DR':
                    return redirect('delivery');
                    break;

                    case 'Releasing':
                    return '/releasing_dashboard';
                    break;

                    case 'Payment':
                    return 'payment';
                    break;

                    case 'Supervisor':
                    return 'overview';
                    break;

                    case 'User':
                    return redirect ('/home');
                    break;

                    default:
                       return redirect('/home');
                       break;
                  }
            }

          }
    }

        return $next($request);



    }

    // public function handle($request, Closure $next, $guard = null) {
    //     if (Auth::guard($guard)->check()) {
    //       $role = Auth::user()->role;

    //       switch ($role) {
    //         case 'admin':
    //            return redirect('/admin');
    //            break;
    //         case 'sales':
    //            return redirect('/sales_dashboard');
    //            break;

    //         default:
    //            return redirect('/home');
    //            break;
    //       }
    //     }
    //     return $next($request);
    //   }
}
