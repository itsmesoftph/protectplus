<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Client\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function redirectTo() {
        $role = Auth::user()->role;
        // dd($role->name);
    if($role){
            switch ($role['name']) {
                case 'Admin':
                return '/admin';
                break;

                case 'Sales':
                return '/sales_dashboard';
                break;

                case 'Production':
                return '/inventory_dashboard';
                break;

                case 'DR':
                return '/delivery_dashboard';
                break;

                case 'Releasing':
                return '/releasing_dashboard';
                break;

                case 'Payment':
                return '/payment_dashboard';
                break;

                case 'Supervisor':
                return '/overview_dashboard';
                break;

                case 'User':
                return '/home';
                break;

                default:
                return '/home';
                break;
            }
        }else{
            return '/home';
        }

    }

    // public function logout(Request $request)
    // {
    //     $this->doLogout($request);

    //     return redirect()->route('login');
    // }

}
