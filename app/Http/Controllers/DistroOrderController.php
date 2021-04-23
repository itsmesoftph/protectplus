<?php

namespace App\Http\Controllers;

use DB;
use App\Order;
use Illuminate\Http\Request;

class DistroOrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }


      public function index() {

        $orders = DB::table('orders')
        ->where('user_id',(Auth()->id()))
        // ->where('is_paid',1)
        ->paginate(20);


        $releasedOrders = DB::table('orders')
        ->where('status','released')
        ->get();

        return view('order.index',['orders'=>$orders, 'releasedOrders' => $releasedOrders]);
      }


      public function getUpdate(Request $request,$id){

        $order = Order::find($id);
        // var_dump($order);
        $orderItems = DB::table('order_items')
        ->where('order_id',Auth()->id())
        ->get();


          return view('order.update',['orders'=>$order]);
      }


      public function postUpdate(Request $request, $id){

          $order = Order::find($id);
          if($request->input('status') === 'received'){
            $order->received_at = \Carbon\Carbon::now();
            $order->status = 'receive';
            $order->save();
          }

          return redirect()->route('distro');




      }


}

