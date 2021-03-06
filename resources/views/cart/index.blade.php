@extends('layouts.app')


@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        {{-- <li class="breadcrumb-item "><a href="{{ route('delivery')}}">Approved Orders</a></li> --}}
        <li class="breadcrumb-item "><a href="{{route('home')}}">Shop</a></li>
        <li class="breadcrumb-item active" aria-current="page">Your Cart</li>

    </ol>

</nav>
@if(  !\Cart::isEmpty()  )
<div class="container table-responsive py-5">
    <div class="row">
        <div class="col">
             <h2>Your Cart</h2>
        </div>
        <div class="col text-center">
            <a class="btn btn-primary" href="{{ route('home') }}" role="button">Add Item</a>
        </div>



    </div>


    <div class="row">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>In Stock</th>
                    <th>Price</th>
                    <th class="text-right">Quantity</th>


                </tr>
            </thead>
            <tbody>
            <div>

            </div>
            @foreach ($cartItems as $item )


                </div>
                <tr>

                    <td scope="row"> {{ $item->name }}</td>
                    <td> {{ $item->associatedModel->quantity }}</td>
                    <td>
                    PHP {{Cart::session(auth()->id())->get($item->id)->getPriceSum() }}
                    </td>
                    <td class="text-right">

                        <form action="{{ route('cart.update', $item->id) }}">

                            <input name="order_quantity" id="quantity" type="number" value="{{ $item->quantity }}"
                           style="width: 50px;" class="mb-2">
                            <input class="btn btn-primary" type="submit" value="save">
                            <input name="product_quantity" type="hidden" value="{{$item->associatedModel->quantity}}">
                            <a href="{{ route('cart.destroy', $item->id) }}" class="align-middle">
                            <i class="fas fa-trash-alt text-danger fa-2x text-center "></i>

                            </a>
                        </form>



                    </td>


                </tr>
            @endforeach

            </tbody>
        </table>
        <h3>
            Total Price: PHP {{ \Cart::session(auth()->id())->getTotal() }}
        </h3>

    </div>
    <div class="row">
        <a class="btn btn-primary" href="{{ route('cart.checkout') }}" role="button">Checkout</a>
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
