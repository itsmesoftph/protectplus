@extends('layouts.sales')


@section('content')

@if(  !\Cart::isEmpty()  )
<div class="container py-5">
    <div class="row">
        <div class="col">
             <h2>Your Cart</h2>
        </div>
        <div class="col text-center">
            <a class="btn btn-primary" href="{{ route('walkin') }}" role="button">Add Item</a>
        </div>



    </div>


    <div class="row">

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>In Stock (pcs)</th>
                    <th>Price</th>
                    <th class="text-right">Quantity</th>
                </tr>
            </thead>
            <tbody>

            @foreach ($cartItems as $item )
                </div>
                <tr>

                    <td scope="row"> {{ $item->name }}</td>
                    <td> {{ $item->associatedModel->quantity }}</td>
                    <td>
                    Php {{Cart::session(auth()->id())->get($item->id)->getPriceSum() }}
                    </td>
                    <td class="text-right">

                        <form action="{{ route('walkin.update', $item->id) }}">
                            <input name="order_quantity" id="quantity" type="number" value="{{ $item->quantity }}"
                            onChange="quantityFunction()" style="width: 50px;" class="mb-2">
                            <input class="btn btn-primary" type="submit" value="save">
                            <input name="product_quantity" type="hidden" value="{{$item->associatedModel->quantity}}">
                            <a href="{{ route('walkin_cart.destroy', $item->id) }}" class="align-middle">
                            <i class="fas fa-trash-alt text-danger fa-2x text-center "></i>

                            </a>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <h3>
            Total Price: Php {{ \Cart::session(auth()->id())->getTotal() }}
        </h3>

    </div>
    <div class="row">
        <a class="btn btn-primary" href="{{route('walkin.checkout')}}" role="button">Checkout</a>
    </div>

    @php
    $fmt = new NumberFormatter( 'en_PHP', NumberFormatter::CURRENCY );
    @endphp

</div>
</div>




@else
<div class="row">
        <div class="col-sm-6 col-md-6 offset-sm-3 offset-md-3">
            <h2>No Items in Cart!</h2>
        </div>
    </div>
@endif



@endsection
