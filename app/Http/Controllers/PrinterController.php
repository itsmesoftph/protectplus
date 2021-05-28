<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class PrinterController extends Controller
{
    public function prntPreview(Request $request, $id){
        // dd($id);
        $order = Order::find($id);

        return view('delivery.printdelivery',['orders' => $order]);
    }
}
