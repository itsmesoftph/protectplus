<?php

namespace App\Http\Controllers;

use DB;
use App\Order;
use Carbon\Carbon;
use App\Product;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }
      public function index() {

           //  FORMAT CURRENT DATE
           $date = Carbon::now();
           $date->toDateTimeString();

           // ==================== 2nd line of boxes =======================
           // NUMBER OF ORDER
           $numberOfOrder = DB::table('orders')
           // ->whereDate('created_at',$date)
           ->get()
           ->count();

           // NUMBER OF APPROVED ORDERS
           $numberOfApproved = DB::table('orders')
           ->where('status','sales_approved')
           // ->whereDate('created_at',$date)
           // ->whereDate('approve_at',$date)
           ->get()
           ->count();



            // NUMBER OF CREATED DR
            $numberOfDRcreated = DB::table('orders')
            // ->where('status','sales_approved')
           //  ->whereDate('created_at',$date)
           //  ->whereDate('dr_at',$date)
            ->get()
            ->count();

            // NUMBER OF PAID ORDERS
            $numberOfPaidOrder = DB::table('orders')
            // ->where('status','sales_approved')
           //  ->whereDate('created_at',$date)
           //  ->whereDate('paid_at',$date)
            ->get()
            ->count();


             // NUMBER OF RELEASED ORDERS
             $numberOfReleasedOrder = DB::table('orders')
             // ->where('status','sales_approved')
           //   ->whereDate('created_at',$date)
           //   ->whereDate('released_at',$date)
             ->get()
             ->count();

              // NUMBER OF RECEIVED ORDERS
              $numberOfReceievedOrder = DB::table('orders')
              // ->where('status','sales_approved')
           //    ->whereDate('created_at',$date)
           //    ->whereDate('received_at',$date)
              ->get()
              ->count();

           // ==================== 3RD line of boxes =======================


               // NUMBER OF UNAPPROVED ORDERS
           $numberOfunpproved = DB::table('orders')
           ->where('status','pending')
           // ->whereDate('created_at',$date)
           // ->whereDate('approve_at',$date)
           ->get()
           ->count();

           // NUMBER OF PENDING DR CREATEION
           $numberOf_ForDrCreation = DB::table('orders')
           ->where('status','sales_approved')
           // ->whereDate('created_at',$date)
           // ->whereDate('approve_at',$date)
           ->get()
           ->count();

            // NUMBER OF ACCOUNT RECEIVABLES
            $numberOf_AccountReceivable = DB::table('orders')
            ->where('is_paid','no')
            ->where('payment_method','cash_on_delivery')
           //  ->whereDate('created_at',$date)
            ->get()
            ->count();

            // NUMBER OF PENDING RELEASE
            $numberOf_PendingRelease = DB::table('orders')
            ->where('status','dr_created')
           //  ->whereDate('created_at',$date)
           //  ->whereDate('dr_at', $date)
            ->get()
            ->count();


             // NUMBER OF IN-TRANSIT
             $numberOf_InTransit = DB::table('orders')
             ->where('status','released')
             ->where('received_at', null)
           //   ->whereDate('released_at',$date)
             ->get()
             ->count();

        $orders = DB::table('orders')
        ->where('status','sales_approved')
        // ->where('dr_at',null)
        ->paginate(10);


        // $orders = DB::table('orders')
        // ->where('status','released')
        // ->where('dr_at','!=',null)
        // ->paginate(10);



        return view('delivery.index',[
            'orders'=>$orders,

            // ========= 1st row ===================

            'numberOfOrder'             => $numberOfOrder,
            'numberOfApproved'          => $numberOfApproved,
            'numberOfDRcreated'         => $numberOfDRcreated,
            'numberOfPaidOrder'         => $numberOfPaidOrder,
            'numberOfReleasedOrder'     => $numberOfReleasedOrder,
            'numberOfReceievedOrder'    => $numberOfReceievedOrder,

            // ========= 2nd row ===================

            'numberOfunpproved'         => $numberOfunpproved,
            'numberOf_ForDrCreation'    => $numberOf_ForDrCreation,
            'numberOf_AccountReceivable'=> $numberOf_AccountReceivable,
            'numberOf_PendingRelease'   => $numberOf_PendingRelease,
            'numberOf_InTransit'        => $numberOf_InTransit

            ]);
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
