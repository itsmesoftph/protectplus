@extends('layouts.app')


@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        {{-- <li class="breadcrumb-item "><a href="{{ route('delivery')}}">Approved Orders</a></li> --}}
        <li class="breadcrumb-item "><a href="{{route('home')}}">Shop</a></li>
        <li class="breadcrumb-item "><a href="{{route('cart.index')}}">Cart</a></li>
        <li class="breadcrumb-item active" aria-current="page">Checkout</li>

    </ol>

</nav>
@php
    $fmt = new NumberFormatter( 'en_PHP', NumberFormatter::CURRENCY );
@endphp
<div class="container">
  <div class="row mt-5">
  {{-- {{$cartItems}} --}}


      <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            {{-- <span class="badge badge-secondary badge-pill">3</span> --}}
          </h4>
          <ul class="list-group mb-3">
           @foreach ( $cartItems as $item )
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">
                  {{$item['name']}} <span class="badge badge-danger badge-pill">{{$item['quantity']}}</span>
                </h6>
                <small class="text-muted">{{substr($item->associatedModel['description'], 80)}}...</small>
              </div>
              <span class="text-muted">
              {{ $fmt->formatCurrency($item['price'],'PHP') }}
             </span>
            </li>
             @endforeach
              <li class="list-group-item d-flex justify-content-between">
              <span>Total (PHP)</span>
              <strong>{{ $fmt->formatCurrency(\Cart::session(auth()->id())->getTotal(),'PHP') }}</strong>
            </li>
          </ul>
      </div>



      <div class="col-md-8 order-md-1">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Shipping Information</span>
        </h4>
          <form action="{{ route('orders.store') }}" method="post" enctype ="multipart/form-data">

              @csrf

              {{-- @include('errors') --}}
              @foreach ( $user as $item )

              <div class="form-group">
                <label for="">Full Name</label>
                <input type="text" name="shipping_fullname" id="" class="form-control" value="{{ $item->shipping_fullname }}" placeholder="" aria-describedby="helpId" readonly required>
              </div>
              <div class="form-group">
                <label for="">Shipping Address</label>
                <input type="text" name="shipping_address" id="" class="form-control" value="{{ $item->shipping_address }}" placeholder="" aria-describedby="helpId" readonly required>
              </div>
              <div class="form-group">
                <label for="">Shipping City</label>
                <input type="text" name="shipping_city" id="" class="form-control" value="{{ $item->shipping_city }}" placeholder="" aria-describedby="helpId" readonly required>
              </div>
              <div class="form-group">
                <label for="">Mobile</label>
                <input type="text" name="shipping_phone" id="" class="form-control" value="{{ $item->shipping_phone }}" placeholder="" aria-describedby="helpId" readonly required>
              </div>
              @endforeach
              <hr>
              <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Payment Option</span>
              </h4>


              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="payment_method" id="" value="cash_on_delivery" >
                  Cash on Delivery
                </label>
              </div>

              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="payment_method" id="" value="over_the_counter" >
                  Over the Counter
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="payment_method" id="" value="bank_transfer" >
                  Bank Transfer
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="payment_method" id="" value="gcash" checked>
                  GCASH
                </label>
              </div>

              <hr>
              <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Proof of Payment</span>
              </h4>
              <div class="form-group">
                  <input type="file" name="payment_url" />
              </div>


              <button type="submit" class="btn btn-primary mt-4">Place Order</button>

          </form>
      </div>
  </div>
</div>

@endsection
