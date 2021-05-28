<?php

namespace App\Http\Controllers;

use DB;
use App\Order;
use App\Product;
use App\Estimate;
use App\Inventory;
use App\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class OverviewController extends Controller
{
    //

    public function index(Request $request){


        // ->order_by('created_at','desc')
        // ->limit(1);

        $name_MostOrdered = [];
        $id= '';
        // GET ID of most ordered product
        $mostOrdered = DB::table('order_items')
        ->select( 'product_id')
        ->groupBy('product_id')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(1)
        ->get();

        // GET Name of the most ordered item
        foreach( $mostOrdered as $order){
            $name_MostOrdered = DB::table('products')
            ->where('id', $order->product_id)
            ->get();
        }

        // GET ID of most ordered item
        foreach($name_MostOrdered as $product){
           $id = $product->id;
        }

            $NumberOfMostOrderedProduct = '';
        if($id){

            $NumberOfMostOrderedProduct=OrderItem::where('product_id',$id)->count();

        }



        //  FORMAT CURRENT DATE
        $date = Carbon::now();
        $date->toDateTimeString();

        // GET ALL PRODUCTS
        $products = DB::table('products')
        ->paginate(15);


        // GET COUNT OF PRODUCTS
        $getCountProducts = DB::table('products')->get()->count();





        // ================= DAILY TRANSACTION ===================




        // ======================== 1ST ROW ============================
         // GET TOTAL SALES
         $totalSales = DB::table('orders')
         ->where('status','!=', 'pending')
         ->where('status','!=','decline')
         // ->whereDate('paid_at',$date)
         ->whereDate('created_at',$date)
         ->sum('grand_total');


         // GET ALL APPROVED ORDERS (processing)
         $getAllApproved = DB::table('orders')
        //  ->where('is_paid', 'yes')
        ->where('approve_at','!=', null)
         ->whereDate('created_at',$date)
         ->sum('grand_total');


         //  GET ALL DR CREATED (completed)
        $getAllDRcreated = DB::table('orders')
        ->where('status', 'dr_created')
        ->whereDate('created_at',$date)
        ->whereDate('dr_at',$date)
        ->sum('grand_total');


         //  GET ALL PAID (paid)
        $getAllPaidOrder = DB::table('orders')
        ->where('status', 'paid')
        ->whereDate('created_at',$date)
        ->whereDate('paid_at',$date)
        ->sum('grand_total');

         //  GET ALL RELEASED (released)
         $getAllRealeasedOrder = DB::table('orders')
         ->where('status', 'released')
         ->whereDate('created_at',$date)
         ->whereDate('released_at',$date)
         ->sum('grand_total');

         //  GET ALL RECEIVED (received)
         $getAllRecievedOrder = DB::table('orders')
         ->where('status', 'receive')
        //  ->whereDate('created_at',$date)
         ->whereDate('received_at',$date)
         ->sum('grand_total');


        $getAllDeliveryFee  = DB::table('orders')
        ->where('is_free_delivery', 'no')
        ->whereDate('created_at',$date)
        ->sum('delivery_fee');
        // dd($getAllDeliveryFee);


        // NUMBER OR DR CREATED ORDERS
        $DrOrders=DB::table('orders')
        ->where('status','dr_created' )
        ->whereDate('created_at',$date)
        ->get()->count();

        // NUMBER OR RELEASED ORDERS
        $releasedOrders=DB::table('orders')
        ->where('status','release' )
        ->whereDate('released_at',$date)
        ->whereDate('created_at',$date)
        ->get()->count();

        // ==================== 2nd line of boxes =======================
        // NUMBER OF ORDER
        $numberOfOrder = DB::table('orders')
        ->whereDate('created_at',$date)
        ->get()
        ->count();

        // NUMBER OF APPROVED ORDERS
        $numberOfApproved = DB::table('orders')
        ->where('status','sales_approved')
        ->whereDate('created_at',$date)
        ->whereDate('approve_at',$date)
        ->get()
        ->count();



         // NUMBER OF CREATED DR
         $numberOfDRcreated = DB::table('orders')
         // ->where('status','sales_approved')
         ->whereDate('created_at',$date)
         ->whereDate('dr_at',$date)
         ->get()
         ->count();

         // NUMBER OF PAID ORDERS
         $numberOfPaidOrder = DB::table('orders')
         // ->where('status','sales_approved')
         ->whereDate('created_at',$date)
         ->whereDate('paid_at',$date)
         ->get()
         ->count();


          // NUMBER OF RELEASED ORDERS
          $numberOfReleasedOrder = DB::table('orders')
          // ->where('status','sales_approved')
          ->whereDate('created_at',$date)
          ->whereDate('released_at',$date)
          ->get()
          ->count();

           // NUMBER OF RECEIVED ORDERS
           $numberOfReceievedOrder = DB::table('orders')
           // ->where('status','sales_approved')
           ->whereDate('created_at',$date)
           ->whereDate('received_at',$date)
           ->get()
           ->count();

        // ==================== 3RD line of boxes =======================


            // NUMBER OF UNAPPROVED ORDERS
        $numberOfunpproved = DB::table('orders')
        ->where('status','pending')
        ->whereDate('created_at',$date)
        // ->whereDate('approve_at',$date)
        ->get()
        ->count();

        // NUMBER OF PENDING DR CREATEION
        $numberOf_ForDrCreation = DB::table('orders')
        ->where('status','sales_approved')
        ->whereDate('created_at',$date)
        ->whereDate('approve_at',$date)
        ->get()
        ->count();

         // NUMBER OF ACCOUNT RECEIVABLES
         $numberOf_AccountReceivable = DB::table('orders')
         ->where('is_paid','no')
         ->where('payment_method','cash_on_delivery')
         ->whereDate('created_at',$date)
         ->get()
         ->count();

         // NUMBER OF PENDING RELEASE
         $numberOf_PendingRelease = DB::table('orders')
         ->where('status','dr_created')
         ->whereDate('created_at',$date)
         ->whereDate('dr_at', $date)
         ->get()
         ->count();


          // NUMBER OF IN-TRANSIT
          $numberOf_InTransit = DB::table('orders')
          ->where('status','released')
          ->where('received_at', null)
          ->whereDate('released_at',$date)
          ->get()
          ->count();


          //==================== IS_PAID STATUS ==============

          $paidStatus = DB::table('orders')
          ->select("*")
          ->get();

        $orders = DB::table('orders')->get();
        $orders = Order::all();
        $countAllOrders = count($orders);

        $distributor = DB::table('users')->where('role_id', 2)->get();
        $countDistributor = count($distributor);

        // dd($request->from_date);




           //  FORMAT CURRENT DATE
           $from_date = Carbon::parse($request->input('from_date'));
           $from_date->toDateTimeString();

           $to_date = Carbon::parse($request->input('to_date'));
           $to_date->toDateTimeString();

        // PRODUCT ESTIMATES

        $productsEstimates = DB::table('products')
        ->select("*")
        ->whereDate('updated_at',$date)
        ->get();

        // dd($productsEstimates);

         // GET RAW MATERIAL ESTIMATES
        //  $estimates = DB::table('estimates')->latest('created_at')->first();
        $estimates = DB::table('estimates')
        ->select("*")
        ->whereDate('created_at',$date)
        ->get();


        $isoEstimates = Estimate::where('mat_name','=','Iso')
        ->whereDate('created_at','=',$date)
        ->get();

        $ethylEstimates = Estimate::where('mat_name','=','Ethyl')
        ->whereDate('created_at','=',$date)
        ->get();

        // $invQuantity = DB::table('inventory')
        // ->select('*')
        // ->whereDate('created_at',$date)
        // ->get();
        $invQuantity = Product::join('inventory','products.id','=','inventory.product_id')
        ->whereDate('inventory.created_at', $date)
        ->get(['products.*','inventory.new_qty']);

        // $invQuantity = Inventory::where('created_at',$date);
        // $invQuantity = Inventory::where('created_at',$date)->pluck('new_qty');
        // dd($invQuantity);

        if(request()->ajax())  {

            if(!empty($request->from_date)){
             $data = DB::table('orders')
               ->whereBetween('created_at', [$from_date, $to_date])
               ->get();

            } else  {
             $data = DB::table('orders')
               ->get();
            }

            return datatables()->of($data)->make(true);
        }


           return view('overview.overview',[


            'isoEstimates' => $isoEstimates,
            'ethylEstimates' => $ethylEstimates,
            'productsEstimates' => $productsEstimates,
            'invQuantity'=> $invQuantity,



                    // 'countOrders'=>$countOrders,
            'totalSales'=>$totalSales,
            'numberOfOrder' => $numberOfOrder,
            'numberOfApproved'=> $numberOfApproved,
            'numberOfDRcreated'=>$numberOfDRcreated,
            'numberOfPaidOrder'=>$numberOfPaidOrder,
            'numberOfReleasedOrder'=>$numberOfReleasedOrder,
            'numberOfReceievedOrder'=>$numberOfReceievedOrder,
            'getAllDeliveryFee'=>$getAllDeliveryFee,


            'paidStatus'=>$paidStatus,


            'numberOfunpproved'=>$numberOfunpproved,
            'numberOf_ForDrCreation'=>$numberOf_ForDrCreation,
            'numberOf_AccountReceivable'=>$numberOf_AccountReceivable,
            'numberOf_PendingRelease'=>$numberOf_PendingRelease,
            'numberOf_InTransit'=>$numberOf_InTransit,


            'getAllApproved'=>$getAllApproved,
            'getAllDRcreated'=>$getAllDRcreated,
            'getAllPaidOrder'=>$getAllPaidOrder,

            'getAllRealeasedOrder'=>$getAllRealeasedOrder,
            'getAllRecievedOrder'=>$getAllRecievedOrder,

            'countDistributor' => $countDistributor,
            'DrOrders' => $DrOrders,

            'products' => $products,

            // 'GrandTotalSales' => $GrandTotalSales,
            // 'paidOrders' => $paidOrders,
            'name_MostOrdered' => $name_MostOrdered,
            'NumberOfMostOrderedProduct' => $NumberOfMostOrderedProduct,
            'DrOrders' => $DrOrders,
            'releasedOrders' => $releasedOrders,
            // 'processingOrders' => $processingOrders
           ]);


          }


        // return view('overview.overview',[
        //     // 'countOrders'=>$countOrders,
        //     'countAllOrders'=>$countAllOrders,
        //     'countDistributor' => $countDistributor,
        //     'countCompletedOrder' => $countAllCompletedOrders,
        //     'allOrders' => $allOrders,
        //     'GrandTotalSales' => $GrandTotalSales,
        //     'countAllPaidOrders' => $countAllPaidOrders,
        //     ]);







        public function ajax(){

            $orders = Order::query();
            // return Datatables::of($orders)->make(true);

            // $status = $orders->sortBy('status')->pluck('status')->unique();
            // $order_number = $orders->sortBy('order_number')->pluck( 'order_number')->unique();

            // return  response()->json(['status'=> 'status', 'order_number' => 'order_number']);
        }

        public function production(){

              //  FORMAT CURRENT DATE
                $date = Carbon::now();
                $date->toDateTimeString();

            $isoEstimates = Estimate::where('mat_name','=','Iso')
            ->whereDate('created_at','=',$date)
            ->get();

            $ethylEstimates = Estimate::where('mat_name','=','Ethyl')
            ->whereDate('created_at','=',$date)
            ->get();

            // $invQuantity = DB::table('inventory')
            // ->select('*')
            // ->whereDate('created_at',$date)
            // ->get();
            $invQuantity = Product::join('inventory','products.id','=','inventory.product_id')
            ->whereDate('inventory.created_at', $date)
            ->get(['products.*','inventory.new_qty']);

            return view('overview.production_estimates',[
                'isoEstimates'      => $isoEstimates,
                'ethylEstimates'    => $ethylEstimates,
                'invQuantity'       =>$invQuantity

            ]);
        }

        public function salesSummary(Request $request){

        $name_MostOrdered = [];
        $id= '';
        // GET ID of most ordered product
        $mostOrdered = DB::table('order_items')
        ->select( 'product_id')
        ->groupBy('product_id')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(1)
        ->get();

        // GET Name of the most ordered item
        foreach( $mostOrdered as $order){
            $name_MostOrdered = DB::table('products')
            ->where('id', $order->product_id)
            ->get();
        }

        // GET ID of most ordered item
        foreach($name_MostOrdered as $product){
           $id = $product->id;
        }

            $NumberOfMostOrderedProduct = '';
        if($id){

            $NumberOfMostOrderedProduct=OrderItem::where('product_id',$id)->count();

        }



        //  FORMAT CURRENT DATE
        $date = Carbon::now();
        $date->toDateTimeString();

        // GET ALL PRODUCTS
        $products = DB::table('products')
        ->paginate(15);


            $paidStatus = DB::table('orders')
            ->select("*")
            ->get();

          $orders = DB::table('orders')->get();
          $orders = Order::all();
          $countAllOrders = count($orders);

          $distributor = DB::table('users')->where('role_id', 2)->get();
          $countDistributor = count($distributor);

          // dd($request->from_date);




             //  FORMAT CURRENT DATE
             $from_date = Carbon::parse($request->input('from_date'));
             $from_date->toDateTimeString();

             $to_date = Carbon::parse($request->input('to_date'));
             $to_date->toDateTimeString();


            if(request()->ajax())  {

                if(!empty($request->from_date)){
                 $data = DB::table('orders')
                   ->whereBetween('created_at', [$from_date, $to_date])
                   ->get();

                } else  {
                 $data = DB::table('orders')
                   ->get();
                }

                return datatables()->of($data)->make(true);
            }


               return view('overview.sales_summary',[


                // 'isoEstimates' => $isoEstimates,
                // 'ethylEstimates' => $ethylEstimates,
                // 'productsEstimates' => $productsEstimates,
                // 'invQuantity'=> $invQuantity,



                        // 'countOrders'=>$countOrders,
                // 'totalSales'=>$totalSales,
                // 'numberOfOrder' => $numberOfOrder,
                // 'numberOfApproved'=> $numberOfApproved,
                // 'numberOfDRcreated'=>$numberOfDRcreated,
                // 'numberOfPaidOrder'=>$numberOfPaidOrder,
                // 'numberOfReleasedOrder'=>$numberOfReleasedOrder,
                // 'numberOfReceievedOrder'=>$numberOfReceievedOrder,
                // 'getAllDeliveryFee'=>$getAllDeliveryFee,


                // 'paidStatus'=>$paidStatus,


                // 'numberOfunpproved'=>$numberOfunpproved,
                // 'numberOf_ForDrCreation'=>$numberOf_ForDrCreation,
                // 'numberOf_AccountReceivable'=>$numberOf_AccountReceivable,
                // 'numberOf_PendingRelease'=>$numberOf_PendingRelease,
                // 'numberOf_InTransit'=>$numberOf_InTransit,


                // 'getAllApproved'=>$getAllApproved,
                // 'getAllDRcreated'=>$getAllDRcreated,
                // 'getAllPaidOrder'=>$getAllPaidOrder,

                // 'getAllRealeasedOrder'=>$getAllRealeasedOrder,
                // 'getAllRecievedOrder'=>$getAllRecievedOrder,

                // 'countDistributor' => $countDistributor,
                // 'DrOrders' => $DrOrders,

                'products' => $products,

                // 'GrandTotalSales' => $GrandTotalSales,
                // 'paidOrders' => $paidOrders,
                'name_MostOrdered' => $name_MostOrdered,
                'NumberOfMostOrderedProduct' => $NumberOfMostOrderedProduct,
                // 'DrOrders' => $DrOrders,
                // 'releasedOrders' => $releasedOrders,
                // 'processingOrders' => $processingOrders
               ]);




        }

        public function getEstimator(){
            return view('overview.mat_estimator');
        }
}
