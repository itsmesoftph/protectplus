<?php

namespace App\Http\Controllers;

use App\Estimate;
use DB;

use Carbon\Carbon;
use App\Product;
use App\Inventory;
use App\ProductCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class InventoryController extends Controller
{
    public function index(){
         //  FORMAT CURRENT DATE
         $date = Carbon::now();
         $date->toDateTimeString();
         // GET ALL PRODUCTS
         $products = DB::table('products')
         ->paginate(15);


         $estimates = DB::table('estimates')
         ->get();

         $isoEstimates = Estimate::where('mat_name','=','Iso')
         ->whereDate('created_at','=',$date)
         ->get();

         $ethylEstimates = Estimate::where('mat_name','=','Ethyl')
         ->whereDate('created_at','=',$date)
         ->get();
        // $ethylEstimates = DB::table('estimates')
        // ->where('mat_name','Ethyl')
        // ->whereDate('created_at',$date)
        // ->get();

        // dd($ethylEstimates);

         return view('production.index',['products'=>$products, 'isoEstimates'=>$isoEstimates, 'ethylEstimates'=> $ethylEstimates]);
    }

    public function getUpdate(Request $request, $id){


        $product = Product::find($id);


        return view('production.update',['product'=>$product]);
    }





    public function postUpdate(Request $request){


        $request->validate([
            'name' => 'required',
            'description'  => 'required',
            'quantity'     => 'required',
            'price'    => 'required',
        ]);


        $product = Product::find($request->input('product_id'));
        // $product_history = DB::table('inventory')
        //                     ->where('product_id',$request->input('product_id'))
        //                     ->latest()
        //                     ->first();
        //     dd($product_history);

            if($request->input('new_quantity')){
                $quantity = $request->input('quantity') + $request->input('new_quantity');

                Inventory::create([
                    'product_id' => $request->input('product_id'),
                    'user_id' => Auth::user()->id,
                    'cur_qty' => $quantity,
                    'new_qty' => $request->input('new_quantity')
                ]);

            }else{
                $quantity = $request->input('quantity');


                // Inventory::create([
                //     'product_id' => $request->input('product_id'),
                //     'user_id' => Auth::user()->id,
                //     'cur_qty' => $request->input('quantity'),
                //     'new_qty' => $product_history['new_qty']
                // ]);




            }


            if ($request->hasFile('product_image')){
                $request->validate([
                    'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
                ]);

                DB::table('products')
                ->where('id',$request->input('product_id'))
                ->update([
                    'name'          => $request->input('name'),
                    'description'   => $request->input('description'),
                    'quantity'      => $quantity,
                    'price'         => $request->input('price'),
                    'img_url'       => $request->product_image->store('products/April2021','public')
                ]);

            } else {
                DB::table('products')
                ->where('id',$request->input('product_id'))
                ->update([
                    'name'          => $request->input('name'),
                    'description'   => $request->input('description'),
                    'quantity'      => $quantity,
                    'price'         => $request->input('price'),
                    'img_url'       => $product->img_url
                ]);




            }



        return redirect()->route('inventory');

    }

    public function getAdd(){
        // $product_codes = DB::table('product_codes')->get();
        $product_codes = ProductCode::all(['id','pc_code','pc_description','pc_size']);
        // dd($product_codes);
        return view('production.add',['product_codes'=> $product_codes]);
    }


    public function createProduct(Request $request){
        $request->validate([
            'pc_name'           => 'required',
            'pc_description'    => 'required|not_in:0',
            'pc_code'           => 'required|not_in:0',
            'pc_size'           => 'required|not_in:0',
            // 'quantity'          => 'required',
            'price'             => 'required',
        ]);


        if($request->pc_description == 'default' || $request->pc_code == 'default' || $request->pc_size == 'default'){
            return back()->with('toast_error','Please review product details, select all necessary info properly');
        }

        if ($request->hasFile('product_image')){
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            Product::create([
            'name'          => $request->input('pc_name'),
            'description'   => $request->input('pc_description'),
            'product_code'  => $request->input('pc_code'),
            'product_capacity' => $request->input('pc_size'),
            'quantity'      => 0,
            'price'         => $request->input('price'),
            'img_url'       => $request->product_image->store('products/April2021','public')
            ]);
        }else{

            Product::create([
                'name'          => $request->input('pc_name'),
                'description'   => $request->input('pc_description'),
                'product_code'  => $request->input('pc_code'),
                'product_capacity' => $request->input('pc_size'),
                'quantity'      => 0,
                'price'         => $request->input('price'),
                ]);
        }


        $product_id = ($lastId = DB::getPdo()->lastInsertId());


        Inventory::create([
            'product_id' => $product_id,
            'user_id' => Auth::user()->id,
            'cur_qty' => 0,
            'new_qty' => 0
        ]);

            // DB::table('inventory')->create([
            //     'product_id' => $product_id,
            // 'user_id' => Auth::user()->id,
            // 'cur_qty' => $request->input('quantity'),
            // 'new_qty' => 0
            // ]);


        return redirect()->route('inventory');

    }

    // CODE FOR ESTIMATES
    public function getEstimates(){
        return view('production.estimates');
    }


    public function estimateStore(Request $request){

        // dd($request->input('alcohol_amount'));

        if($request->input('alcohol_amount') > '0' ){

        $totalLiters = $request->input('alcohol_computed') + $request->input('scent_computed') + $request->input('water_computed');
        // dd($totalLiters);
                    Estimate::create([
                        'mat_name' => $request->input('raw_mat'),
                        'mat_value' => $request->input('alcohol_amount'),
                        'mat_value_sg' => $request->input('alcohol_computed'),
                        'mat_scent' => $request->input('scent_computed'),
                        'mat_water' => $request->input('water_computed'),
                        'total_liters' => $totalLiters,
                        'cur_val' => $totalLiters,
                    ]);

            return redirect(route('inventory'));
        } else {
            return redirect()->route('estimates')->with('toast_error','Review the details provided, value cannot be zero or less than zero');
        }




    }


    public function quantityUpdate(Request $request, $id){


         //  FORMAT CURRENT DATE
         $date = Carbon::now();
         $date->toDateTimeString();

        // dd($iso_quantity[0]);
        $ethyl_quantity = DB::table('estimates')
        ->select("total_liters")
        ->where('mat_name','ethyl')
        ->whereDate('created_at', $date)
        ->get();

        $request_product = $request->quantity * $request->capacity;

        // dd($request_product);

        if($request->product_type == 'I'){
            $iso_quantity = Estimate::where('mat_name','=','Iso')
            ->whereDate('created_at','=', $date)
            ->get(['id','total_liters']);

            // dd(gettype($iso_quantity));



            if($iso_quantity->isEmpty()){

                // IF NO AVAILABLE ISO IN PRODUCTION
                return back()->with('toast_error','No available Isopropyl in production');
            } else {
                // ISO IS AVAILABLE
                // NUMBER OF PRODUCED MATERIAL TO BE TRANSFERRED TO SHOP
                // if requested quantity is less than the produced material then proceed
                if($request_product <= $iso_quantity[0]->total_liters && $request_product > 0 ){

                        // SAVE NEW VALUE FOR THE INVENTORY
                        $new_val = Estimate::find($iso_quantity[0]->id);
                        $cur_val = $new_val->cur_val - $request_product;
                        // dd($cur_val );
                        $new_val->cur_val = $cur_val;
                        $new_val->deducted_val = $request_product;
                        $new_val->save();

                        // UPDATE PRODUCT QUANTITY

                        $qty = Product::find($id);
                        $quantity = $request->input('quantity') + $qty->quantity;
                        if($qty){

                            $qty->quantity = ($qty->quantity + $request->input('quantity'));
                            $qty->save();
                        }

                        //UPDATE INVENTORY AUDIT TRAIL
                        Inventory::create([
                            'product_id' => $qty->id,
                            'user_id' => Auth::user()->id,
                            'cur_qty' => $quantity,
                            'new_qty' => $request->input('quantity')
                        ]);

                        return back()->with('toast_success','Product was succefully updated');

                }else{
                    return back()->with('toast_error','Review your input, should not be zero, less than zero or greater than the available material');
                }
            }



        }else{
            $ethyl_quantity = Estimate::where('mat_name','=','Ethyl')
            ->whereDate('created_at','=', $date)
            ->get(['id','total_liters']);
            // dd($ethyl_quantity);
            if($ethyl_quantity->isEmpty()){
                return back()->with('toast_error','No available Ethyl in production');
            } else {
                // ETHYL IS AVAILABLE
                // NUMBER OF PRODUCED MATERIAL TO BE TRANSFERRED TO SHOP
                // if requested quantity is less than the produced material then proceed
                if($request_product <= $ethyl_quantity[0]->total_liters && $request_product > 0 ){

                        // SAVE NEW VALUE FOR THE INVENTORY
                        $new_val = Estimate::find($ethyl_quantity[0]->id);

                        $new_val->cur_val = $new_val->cur_val - $request_product;
                        $new_val->deducted_val = $request_product;
                        $new_val->save();

                        // UPDATE PRODUCT QUANTITY

                        $qty = Product::find($id);
                        $quantity = $request->input('quantity') + $qty->quantity;
                        if($qty){

                            $qty->quantity = ($qty->quantity + $request->input('quantity'));
                            $qty->save();
                        }

                        //UPDATE INVENTORY AUDIT TRAIL
                        Inventory::create([
                            'product_id' => $qty->id,
                            'user_id' => Auth::user()->id,
                            'cur_qty' => $quantity,
                            'new_qty' => $request->input('quantity')
                        ]);
                        return back()->with('toast_success','Product was succefully updated');

                }else{
                    return back()->with('toast_error','Review your input, should not be zero, less than zero or greater than the available material');
                }
            }
        }



    }




// PRODUCT CODE GENERATION
    public function getProductCode(){

        $pc = ProductCode::all();

        if($pc){
            return view('production.product_code_index',['product_code' => $pc]);
        }


    }




    public function productCodeStore(Request $request){

        $request->validate([
            'product_prefix'            => 'required',
            'prodcut_size'              => 'required',
            'product_description'       => 'required',
        ]);

        $pcCode = $request->input('product_prefix') . '-' . $request->input('prodcut_size');

        $product_code = new ProductCode();

        $product_code->pc_prefix        = $request->input('product_prefix');
        $product_code->pc_size          = $request->input('prodcut_size');
        $product_code->pc_code          = $pcCode;
        $product_code->pc_description   = $request->input('product_description');


        $pc_verify = ProductCode::where('pc_code', $pcCode )->pluck('pc_code');

        // if($pc_verify[0] == $pcCode){
        //     return back()->with('toast_error','The product code already exists');
        // } else {
        //     $product_code->save();
        //     return back()->with('toast_success','Successfully added new product code');

        // }
        if(isEmpty($pc_verify) ){

                $product_code->save();
                return redirect()->route('product_code')->with('toast_success','Successfully updated new product code');
        } else {
            return back()->with('toast_error','The product code already exists');
        }


    }

    public function productCodeEdit(Request $request, $id){
        $pc_edit = ProductCode::find($id);

        $pc = ProductCode::all();

        if($pc_edit){
            return view('production.product_code_edit',['product_code_item' => $pc_edit, 'product_code' => $pc]);
        }
    }

    public function productCodeUpdate(Request $request, $id){
        $request->validate([
            'product_prefix'            => 'required',
            'prodcut_size'              => 'required',
            'product_description'       => 'required',
        ]);


        $pcCode = $request->input('product_prefix') . '-' . $request->input('prodcut_size');

        $pc_edit = ProductCode::find($id);

        $pc_edit->pc_prefix        = $request->input('product_prefix');
        $pc_edit->pc_size          = $request->input('prodcut_size');
        $pc_edit->pc_code          = $pcCode;
        $pc_edit->pc_description   = $request->input('product_description');


        $pc_verify = ProductCode::where('pc_code', $pcCode )->pluck('pc_code');
        // dd($pc_verify);
        if(isEmpty($pc_verify) ){
            // if($pc_verify[0] == $pcCode){
            //     return back()->with('toast_error','The product code already exists');
            // } else {
                $pc_edit->save();
                return redirect()->route('product_code')->with('toast_success','Successfully updated new product code');

            // }
        } else {
            return back()->with('toast_error','The product code already exists');
        }


    //     $pc_edit->save();

    //     return redirect()->route('product_code')->with('toast_success','Successfully updated product code');
    }
}
