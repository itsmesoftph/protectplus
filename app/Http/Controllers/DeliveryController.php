<?php

namespace App\Http\Controllers;

use DB;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }
      public function index() {

        $orders = DB::table('orders')
        ->where('status','sales_approved')
        // ->where('dr_at',null)
        ->paginate(10);


        // $orders = DB::table('orders')
        // ->where('status','released')
        // ->where('dr_at','!=',null)
        // ->paginate(10);



        return view('delivery.index',['orders'=>$orders]);
      }


      public function getUpdate(Request $request, $id){

        $order = Order::find($id);
        // dd($order);
        $orderItems = DB::table('order_items')
        ->where('order_id',$order['id'])
        ->get();

        $product_id = array();

        foreach($orderItems as $item){

            array_push($product_id,$item->id);

        }

        $products = DB::table('products')
        ->whereIn('id',$product_id)
        ->get();







        // var_dump($products);

          return view('delivery.update',['orders'=>$order ]);
      }


      public function postUpdate(Request $request, $id){
          $order = Order::find($id);
          if($request->status === 'dr_created'){
            $order->status = $request->input('status');
            $order->dr_at = \Carbon\Carbon::now();

            $order->save();
          }
        return redirect()->route('delivery');




      }


      public function getDrCreated(){
        $createdDr = DB::table('orders')
        ->where('dr_at','!=',null)
        ->get();

        return view('delivery.created_dr',['createdDr'=>$createdDr]);
    }

    public function getDrList(Request $request, $id){
        // $order = DB::table('orders')
        // ->where('id',$request->id)
        // ->where('dr_at','!=', null)
        // ->get();

        $order = Order::find($id);

        return view('delivery.created_dr_listing',['orders'=>$order]);
    }
}
