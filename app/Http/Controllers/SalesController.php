<?php

namespace App\Http\Controllers;
use DB;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index() {

        $orders = DB::table('orders')
        ->where('status','pending')
        ->paginate(10);
        // dd($orders);
        return view('sales.index',['orders'=>$orders]);
      }


      public function getUpdate(Request $request, $id){

        $allPaidOrders = DB::table('orders')
        ->join('order_items', 'order_items.order_id','=','orders.id')
        ->join('products','products.id','=','order_items.product_id')
        ->select('orders.*', 'products.quantity','products.name')
        // ->groupBy('order_items.order_id')
        ->where('orders.id', $id)
        // ->get();
        // ->groupBy('order_items.order_id')
        // ->where('orders.order_id', $id)
        ->get();
        // dd($allPaidOrders);

        $order = Order::find($id);





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

        // $cartItems = \Cart::session(auth()->id())->getContent();
        // dd($cartItems);
        // var_dump($products);
        // , 'products' => $allPaidOrders

          return view('sales.update',['orders'=>$order, 'products' => $allPaidOrders]);
      }




      public function postUpdate(Request $request, $id){
          $order = Order::find($id);

          if($request->status === 'sales_approved'){
            $order->status = $request->input('status');
            $order->approve_at = \Carbon\Carbon::now();
            $order->save();
          }




        return redirect()->route('sales');




    }



}


