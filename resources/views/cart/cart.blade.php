 @extends('layouts.shop')

    @section('content')



    <main class="bg_gray">
		<div class="container margin_30">
            <div class="page_header">
                <div class="breadcrumbs">
                    <ul>
                        <li class="breadcrumb-item "><a href="{{route('home')}}">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Your Cart</li>
                    </ul>
                </div>
                <h1>Cart page</h1>
            </div>
        @if(  !\Cart::isEmpty()  )
		<!-- /page_header -->
                        <table class="table table-striped cart-list">
                            <thead>
                                <tr>
                                    <th style="style:none;">
                                        Product
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Quantity
                                    </th>
                                    <th>
                                        Subtotal
                                    </th>
                                    <th>

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item )
                                    {{-- <form action="{{ route('cart.update', $item->id) }}" id="cart_form"> --}}
                                        <tr>
                                            <td>
                                                <div class="thumb_cart">
                                                    <img src="{{asset('storage/'.$item->associatedModel->img_url)}}" data-src="{{asset('storage/'.$item->associatedModel->img_url)}}" class="lazy" alt="Image" style="width: 50px; height:50px;">
                                                </div>
                                                <span class="item_cart">{{ $item->name }}</span>
                                            </td>
                                            <td >
                                                @if ($item->associatedModel->is_sale == 'yes')
                                                    <strong> Php {{$item->associatedModel->price - ($item->associatedModel->price * ($item->associatedModel->discount_rate/100)) }}</strong>
                                                @else
                                                    <strong> Php {{$item->associatedModel->price}}</strong>

                                                @endif
                                            </td>
                                            <form action="{{ route('cart.update', $item->id) }}" id="cart_form" method="POST">
                                            <td>
                                                <div class="numbers-row" >
                                                    <input type="text" value="{{ $item->quantity }}" id="quantity" class="qty2" name="order_quantity">

                                                <div class="inc button_inc">+</div><div class="dec button_inc">-</div></div>
                                            </td>
                                            <td >
                                                <strong>Php {{Cart::session(auth()->id())->get($item->id)->getPriceSum() }}</strong>
                                            </td>
                                            <td class="options">
                                                <a href="{{ route('cart.destroy', $item->id) }}" class="action"><i class="ti-trash"></i></a>

                                            </td>
                                            {{-- <td class="text-right w-10" style="width:  5%">
                                                <input type="submit" class="btn_1 gray btn" form="cart_form" value="Update Cart">

                                            </td> --}}
                                        </tr>
                                            <input name="product_quantity" type="hidden" value="{{$item->associatedModel->quantity}}">
                                    </form>
                                @endforeach

                            </tbody>
                        </table>

						<div class="row add_top_30 flex-sm-row-reverse cart_actions">
						<div class="col-sm-4 text-right mb-4">
							<input type="submit" class="btn_1 gray btn" form="cart_form" value="Update Cart">
						</div>
							{{-- <div class="col-sm-8">
							<div class="apply-coupon">
								<div class="form-group form-inline">
									<input type="text" name="coupon-code" value="" placeholder="Promo code" class="form-control"><button type="button" class="btn_1 outline">Apply Coupon</button>
								</div>
							</div>
						</div>
					</div> --}}
					<!-- /cart_actions -->

		</div>
		<!-- /container -->

		<div class="box_cart mb-4">
			<div class="container">
			<div class="row justify-content-end">
				<div class="col-xl-4 col-lg-4 col-md-6">
			<ul>
				{{-- <li>
					<span>Subtotal</span> Php {{ \Cart::session(auth()->id())->getTotal() }}
				</li>
				<li>
					<span>Shipping</span> Php 0
				</li> --}}
				<li >
					<h5><span>Total</span> Php {{ \Cart::session(auth()->id())->getTotal() }}</h5>
				</li>
			</ul>
			<a href="{{ route('cart.checkout') }}" class="btn_1 full-width cart">Proceed to Checkout</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /box_cart -->


        @else
        <div class="container margin_30" >
            <div class="row justify-content-center">
				<div class="col-md-5">
					<div id="confirm">
						{{-- <div class="icon icon--order-success svg add_bottom_15">
							<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
								<g fill="none" stroke="#8EC343" stroke-width="2">
									<circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
									<path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
								</g>
							</svg>
						</div> --}}
					<h2>Cart is Empty</h2>

					</div>
				</div>
			</div>
        </div>
        @endif

	</main>




    @endsection
