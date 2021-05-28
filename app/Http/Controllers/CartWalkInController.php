<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use DB;
use Validator;
class CartWalkInController extends Controller
{



    public function index(){

            $cartItems = \Cart::session(auth()->id())->getContent();


            // dd($cartItems);

            return view( 'walkin.walkin_cart', ['cartItems'=> $cartItems]);


    }


    public function add(Product $product){

        // add the product to cart
    \Cart::session(auth()->id())->add(array(
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->srp_price,
        'quantity' => 1,
        'qty' => $product->quantity,
        'attributes' => array(),
        'associatedModel' => $product

    ));

    // dd($product->quantity);

    return redirect()->route('walkin.index');

    }


    public function destroy($itemId){
        //  remove cart item
       \Cart::session(auth()->id())->remove($itemId);
        return redirect()->back();
    }


    public function update(Request $request, $rowId){

        //  update cart item

        $product_quantity = $request->input('product_quantity');
        $order_quantity = $request->input('order_quantity');

        if($order_quantity > $product_quantity){

          return back()->withError('Please review your order,we only have ' .$product_quantity . ' item(s) in stock');

        }

        if($order_quantity <= 0 ){
            return back()->withError('Invalid order, please review the quantity of your order');
        }

            \Cart::session(auth()->id())->update($rowId,[
                'quantity' => array(
                    'relative' => false,
                    'value' => \request('order_quantity')
                    )
            ]);


        return back();
    }


    public function getProduct(){
        $products = Product::take(20)->get();


        return view('walkin.walkin_shop',[
            'products' => $products
            ]);
    }

    public function checkout(){



        $cartItems = \Cart::session(auth()->id())->getContent();

        // dd($cartItems);

        $user = DB::table('users')
        ->where('id',Auth()->id())
        ->get();
        // dd($user);
        return view('walkin.walkin_checkout',['user'=>$user, 'cartItems'=>$cartItems]);
    }



}
