<?php

namespace App\Http\Controllers;

use DB;
use App\Order;
use Illuminate\Http\Request;

class ReleasingController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }


      public function index() {

        $orders = DB::table('orders')
        ->where('dr_at','!=', null)
        ->where('released_at', null)
        // ->where('status','paid')
        ->paginate(10);

        return view('releasing.index',['orders'=>$orders]);
      }


      public function getUpdate(Request $request, $id){

        $order = Order::find($id);
        // dd($order);
        $orderItems = DB::table('order_items')
        ->where('order_id',$order['id'])
        ->get();


          return view('releasing.update',['orders'=>$order]);
      }


      public function postUpdate(Request $request, $id){

          $order = Order::find($id);
          // dd($request->input('status'));
          if($request->input('status') === 'released'){
            $order->released_at = \Carbon\Carbon::now();
            $order->status = $request->input('status');
            $order->save();
          }
          return redirect()->route('releasing');


      }
}
