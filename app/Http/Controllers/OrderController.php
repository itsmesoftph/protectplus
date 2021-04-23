<?php

namespace App\Http\Controllers;

use App\Order;
// use Darryldecode\Cart\Cart;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'shipping_fullname' => 'required',
            'shipping_address'  => 'required',
            'shipping_city'     => 'required',
            'shipping_phone'    => 'required',
            'payment_method'    => 'required'
        ]);

        $order = new Order();


        // Code that Generates order_number
        $getMonth = (\Carbon\Carbon::now()->format('m'));
        $getYear = (\Carbon\Carbon::now()->format('y'));

        $datePrefix = $getMonth.$getYear;
        $id = Order::latest()->first();
        if ($id) {
            $newId = $id->id + 1;
        } else {
            $newId = 1;
        }

        $order->order_number = $datePrefix . '-' . str_pad($newId,6,'0', STR_PAD_LEFT);
        // End of order_number



        // PROCESS STAGE
        // dd($request);



        $order->shipping_fullname = $request->input('shipping_fullname');
        $order->shipping_address = $request->input('shipping_address');
        $order->shipping_city = $request->input('shipping_city');
        $order->shipping_phone = $request->input('shipping_phone');

        if(!$request->has('billing_fullname')){
            $order->billing_fullname = $request->input('shipping_fullname');
            $order->billing_address = $request->input('shipping_address');
            $order->billing_city = $request->input('shipping_city');
            $order->billing_phone = $request->input('shipping_phone');
        }else{
            $order->billing_fullname = $request->input('billing_fullname');
            $order->billing_address = $request->input('billing_address');
            $order->billing_city = $request->input('billing_city');
            $order->billing_phone = $request->input('billing_phone');
        }


        if($request->payment_method ){

            if ($request->payment_method === 'cash_on_delivery'){
                // $order->is_paid = "no";
                $order->status = $request->input('status');
                $order->payment_method = $request->payment_method;
            }

            if($request->payment_method === 'over_the_counter'){
                // $order->is_paid = "yes";
                // $order->status = 'processing' ;
                $order->payment_method = $request->payment_method;
                $order->status = $request->input('status');

            }

            if($request->payment_method === 'bank_transfer' || $request->payment_method === 'gcash'){
                if ($request->hasFile('payment_url')){

                    $request->validate([
                        'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
                    ]);
                    $order->payment_method = $request->payment_method;
                    $order->payment_url = $request->payment_url->store('proof_of_payment','public');
                    $order->status = $request->input('status');

                } else {
                    return redirect()->route('cart.checkout')->withError('Please upload an image of your ' .strtoupper($request->payment_method) . ' payment');
                }
            }


        }


        if($request->order_from_walkin){
            $order->is_walkin = 'yes';
        } else {
            $order->is_walkin = 'no';
        }


        $order->grand_total = \Cart::session(auth()->id())->getTotal();
        $order->item_count = \Cart::session(auth()->id())->getContent()->count();

        // $order->payment_method = $request->payment_method;
        $order->user_id = auth()->id();


        $order->status = 'pending' ;

        $order->save();


        // save order items

        $cartItems = \Cart::session(auth()->id())->getContent();

        foreach($cartItems as $item){
            // dd($item->associatedModel->description);
            $order->items()->attach($item->id,['price' => $item->price, 'quantity' => $item->quantity, 'product_description' => $item->associatedModel->description]);

            $product = Product::find($item->model->id);
            $product->update(['quantity'=> $product->quantity - $item->quantity]);
        }


        // $this->decreasQuantities();
        // payment
        // if(request('payment_method') == 'cash_on_delivery'){

        // }

        // empty cart
        \Cart::session(auth()->id())->clear();

        // send email to customer


        //take user to thank you page
        if($request->order_from_walkin){
            return redirect()->route('walkin')->with('toast_success','Order has been placed');

        }else{
            return redirect()->route('home')->with('toast_success','Order has been placed');

        }

        // return "order completed, thank you for your order";
        // dd('created_order',$order);

    }

    public function decreasQuantities(){

        foreach($cartItems as $item){
            $product = Product::find($item->model->id);

            $product->update(['quantity'=> $product->quantity - $item->quantity]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }







}
