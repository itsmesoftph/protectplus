<?php

namespace App\Http\Controllers;

use DB;
use App\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index() {

        $orders = DB::table('orders')
        ->where('dr_at','!=', null)
        ->where('is_paid','no')
        ->paginate(10);

        return view('payment.index',['orders'=>$orders]);
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

          return view('payment.update',['orders'=>$order]);
      }


      public function postUpdate(Request $request, $id){
          $order = Order::find($id);
          if($request->input('chk_status') == 'not_free' ){

              if($request->input('chk_input_price') == null){
                 return back()->with('toast_error','Please provide appropriate amount for delivery fee');

              }else{
                $order->status = $request->input('status');
                if($request->input('status') == 'paid'){
                      $order->paid_at = \Carbon\Carbon::now();
                    $order->is_paid = 'yes';
                    $order->delivery_fee = $request->input('chk_input_price');
                    $order->is_free_delivery = 'no';
                    $order->save();
                }
              }

          } else {
             //   delivery is free
            $order->status = $request->input('status');
            if($request->input('status') === 'paid'){
                    $order->paid_at = \Carbon\Carbon::now();
                $order->is_paid = 'yes';
                $order->is_free_delivery = 'yes';
                $order->delivery_fee = 0;
                $order->save();
            }

          }


        return redirect()->route('payment')->with('toast_success','Payment has been approved');


      }
}
