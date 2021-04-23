<?php

namespace App\Http\Controllers;

use App\Product as Product;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

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



        // foreach($getProduct as $product){
        //     var_dump(Voyager::setting('site.stock_threshold'));
            
        //         if($product->quantity > (Voyager::setting('site.stock_threshold'))){
        //             $stockLevel = 'In Stock'; 
        //         } else {
        //             // dd($product->quantity);
        //             var_dump($product->quantity);
        //             $stockLevel = 'Low'; 
        //         }
      
        // }

        return view('home',[
            'products' => $products
            // 'stockLevel' => $stockLevel
            ]);
    }
}
