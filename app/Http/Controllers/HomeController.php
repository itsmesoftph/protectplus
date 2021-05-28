<?php

namespace App\Http\Controllers;

use App\Product as Product;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $getProduct = Product::all();
        $products = Product::take(20)->get();

        $featured_product = DB::table('products')
        ->where('is_featured','!=','no')
        ->get();

        $firstFeaturedProduct = DB::table('products')
        ->where('is_featured','!=','no')->first();

        return view('home2',[
            'products' => $products,
            'featured_products'=>$featured_product,
            'firstFeaturedProduct' => $firstFeaturedProduct
        ]);



    }

    public function help(){
        return view('help.index');
    }
}
