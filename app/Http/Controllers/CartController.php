<?php

namespace App\Http\Controllers;

use DB;
// use Darryldecode\Cart\Cart;
use App\User;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller{



    public function add(Product $product){
        // dd($product);

        // add the product to cart
    \Cart::session(auth()->id())->add(array(
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->price,
        'quantity' => 1,
        'qty' => $product->quantity,
        'attributes' => array(),
        'associatedModel' => $product

    ));

    // dd($product->quantity);

    return redirect()->route('cart.index');

    }


    public function index(){


        // dd(\Cart::session(auth()->id()));

            $cartItems = \Cart::session(auth()->id())->getContent();
            return view( 'cart.index', ['cartItems'=> $cartItems]);

    }


    public function destroy($itemId){

        //  remove cart item
       \Cart::session(auth()->id())->remove($itemId);
        return back();
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

    public function checkout(){



        $cartItems = \Cart::session(auth()->id())->getContent();

        // dd($cartItems);

        $user = DB::table('users')
        ->where('id',Auth()->id())
        ->get();
        // dd($user);
        return view('cart.checkout',['user'=>$user, 'cartItems'=>$cartItems]);
    }

}
