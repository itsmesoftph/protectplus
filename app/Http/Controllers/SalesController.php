<?php

namespace App\Http\Controllers;
use DB;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;


class SalesController extends Controller
{
    public function index(){


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
            ->where('status','pending')
            ->paginate(10);

            return view('sales.index',[
                'orders'                    => $orders,

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


      public function getOrderById(Request $request, $id){

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




      public function postOrderUpdate(Request $request, $id){
          $order = Order::find($id);

          if($request->status === 'sales_approved'){
            $order->status = $request->input('status');
            $order->approve_at = \Carbon\Carbon::now();
            $order->save();
          }




        return redirect()->route('sales');




    }


    // ====================== PROMO RELATED CODES ======================

    public function createPromo(Request $request){

      $product = Product::find($request->input('product_id'));

    //   dd($request->check_input_discount);

        if($product->is_sale == 'yes'){

            if($request->chk_input_discount =! $product->discount_rate && $request->chk_input_discount <= 0) {

                return back()->with('toast_error','Please review discount details, provide necessary changes accordingly');

            } else {

                $product->is_sale = $request->input('chk_status');
                $product->discount_rate = $request->input('chk_input_discount');
                // $product->is_featured = "sale";
                $product->save();

                return redirect()->route('sales.promo')->with('toast_success','Promo successfully created');

            }

        }else{
            if( $request->chk_input_discount <=0){
                return back()->with('toast_error','Please review discount details, provide necessary changes accordingly');
            }else{
                $product->is_sale = $request->input('chk_status');
                // $product->is_featured = "sale";
                $product->discount_rate = $request->input('chk_input_discount');
                $product->save();

                return redirect()->route('sales.promo')->with('toast_success','Promo successfully created');
            }
        }

    }


    public function editPromoForm( $id){
        $loadProduct = DB::table('products')
        ->where('id',$id)
        ->get();
        // dd($loadProduct);
        return view('sales.promo_edit',['product_details'=>$loadProduct]);
    }
    public function createFeaturedProduct(Request $request){

        $product = Product::find($request->input('product_id'));
        // dd($request->featured_option);
        // if( $request->featured_option == 'default' || $request->featured_option == null){
        //     return back()->with('toast_error','Please review featured product details, provide necessary changes accordingly');

        // }
    //   dd($request->chk_status);

        if($request->input('featured_option') == 'default' || $request->featured_option == null){
            return back()->with('toast_error','Please review featured product details, provide necessary changes accordingly');


        } else {

            if($request->featured_option == 'sale') {
                if($request->chk_input_discount <= 0 || $request->chk_input_discount == null ){
                return back()->with('toast_error','Please review discount rate details, provide necessary changes accordingly');

                } else {
                    $product->is_featured =  $request->input('featured_option') ;
                    $product->discount_rate = $request->chk_input_discount;
                    $product->is_sale = $request->chk_status;
                    $product->save();
                    return redirect()->route('sales.promo')->with('toast_success','featured product successfully created');

                }

            } else {
                $product->is_featured = $request->input('featured_option') ;
                // $product->discount_rate = $request->chk_input_discount;

                $product->save();
                return redirect()->route('sales.promo')->with('toast_success','featured product successfully created');

            }




        }
    }


    public function getProductData(){

        $data = DB::table('products')
            // ->where('is_sale','yes')
            ->get();

          return view('sales.promo',['data'=>$data]);


    }
    public function loadFeaturedProduct($id){
        $loadProduct = DB::table('products')
        ->where('id',$id)
        ->get();
        // dd($loadProduct);



        return view('sales.featured',['product_details'=>$loadProduct]);
    }

    public function getProductById($id){
      $loadProduct = DB::table('products')
      ->where('id',$id)
      ->get();
      // dd($loadProduct);
      return view('sales.promo_add',['product_details'=>$loadProduct]);
      // return redirect()->back()->with(compact($loadProduct));
    }

    public function getFeaturedProductById($id){
        $loadProduct = DB::table('products')
        ->where('id',$id)
        ->get();
        // dd($loadProduct);
        return view('sales.featured_add',['product_details'=>$loadProduct]);
    }

    public function editFeaturedForm($id){
        $loadProduct = DB::table('products')
        ->where('id',$id)
        ->get();
        // dd($loadProduct);
        return view('sales.featured_edit',['product_details'=>$loadProduct]);
    }

}


