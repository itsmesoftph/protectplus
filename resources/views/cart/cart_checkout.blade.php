@extends('layouts.shop')

@section('css')
<!-- SPECIFIC CSS -->
    <link href="{{asset('/allia/css/checkout.css')}}" rel="stylesheet">
@stop

@section('content')


    @php
    $fmt = new NumberFormatter( 'en_PHP', NumberFormatter::CURRENCY );
    @endphp
    <main class="bg_gray">
        <div class="container margin_30">
            <div class="page_header">
                <div class="breadcrumbs">
                    <ul>
                        <li class="breadcrumb-item "><a href="{{route('home')}}">Shop</a></li>
                        <li class="breadcrumb-item "><a href="{{route('cart.index')}}">Cart</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Your Items</li>
                    </ul>
            </div>
            {{-- <h1>Sign In or Create an Account</h1> --}}


	        <!-- /page_header -->
			<div class="row">
                <form action="{{ route('orders.store') }}" method="post" enctype ="multipart/form-data" id="my_form">

                    @csrf
                </form>

                    {{-- @include('errors') --}}
                    <div class="col-lg-4 col-md-6">
                        @foreach ( $user as $item )

                            <div class="step first">
                                <h3>1. User Info and Billing address</h3>

                                <div class="tab-content checkout">
                                    <div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
                                        <div class="form-group">
                                            <input type="text" name="shipping_fullname" form="my_form" id="" class="form-control" value="{{ $item->shipping_fullname }}" placeholder="Full Name" aria-describedby="helpId" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="shipping_address" form="my_form" id="" class="form-control" value="{{ $item->shipping_address }}" placeholder="Full Address" aria-describedby="helpId" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="shipping_city" form="my_form" id="" class="form-control" value="{{ $item->shipping_city }}" placeholder="Shipping City" aria-describedby="helpId" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="shipping_phone" form="my_form" id="" class="form-control" value="{{ $item->shipping_phone }}" placeholder="Telephone" aria-describedby="helpId" readonly required>
                                        </div>


                                    </div>

                                </div>
                            </div>
                            <!-- /step -->
                        @endforeach
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="step middle payments">
                                <h3>2. Payment and Shipping</h3>
                                <ul>
                                    <li>
                                        <label class="container_radio">Cash On Delivery<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
                                            <input type="radio" class="form-check-input" name="payment_method" form="my_form" value="cash_on_delivery" >
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_radio">Over The Counter<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
                                            <input type="radio" class="form-check-input" name="payment_method" form="my_form" value="over_the_counter">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_radio">Bank Transfer<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
                                            <input type="radio" class="form-check-input" name="payment_method" form="my_form" value="bank_transfer">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_radio">GCASH<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
                                            <input type="radio" class="form-check-input" name="payment_method" form="my_form" value="gcash" >
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                                <hr>
                                <div class="row no-gutters">
                                    <div class="col-6 form-group pr-1">
                                        <span class="text-muted">Proof of Payment</span>
                                    </div>
                                    <div class="col-6 form-group pl-1">
                                        <input type="file" name="payment_url" form="my_form" />
                                    </div>
                                </div>
                        </div>
                        <!-- /step -->
                    </div>
                {{-- </form> --}}

				<div class="col-lg-4 col-md-6">
					<div class="step last">
						<h3>3. Order Summary</h3>
                        <div class="box_general summary">
                            <ul>
                            @foreach ( $cartItems as $item )
                                <li class="clearfix"><em>{{$item['name']}} <span class="badge badge-danger badge-pill">{{$item['quantity']}}</span></em>  <span>{{ $fmt->formatCurrency($item['price'],'Php') }}</span></li>
                            @endforeach

                            </ul>
                            <ul>
                                <li class="clearfix"><em><strong>Subtotal</strong></em>  <span>{{ $fmt->formatCurrency(\Cart::session(auth()->id())->getTotal(),'PHP') }}</span></li>
                                {{-- <li class="clearfix"><em><strong>Shipping</strong></em> <span>$0</span></li> --}}

                            </ul>
                            <div class="total clearfix">TOTAL
                                <span>{{ $fmt->formatCurrency(\Cart::session(auth()->id())->getTotal(),'Php') }}</span>
                            </div>
                            {{-- <div class="form-group">
                                    <label class="container_check">Register to the Newsletter.
                                    <input type="checkbox" checked>
                                    <span class="checkmark"></span>
                                    </label>
                                </div> --}}

                            {{-- <a form="my_form" class="btn_1 full-width">Confirm Order</a> --}}
                            <button type="submit" class="btn_1 full-width" form="my_form">Place Order</button>

                        </div>
					<!-- /box_general -->
					</div>
					<!-- /step -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>



@endsection
