
    @extends('layouts.shop')

    @section('content')
        <div id="carousel-home">
			<div class="owl-carousel owl-theme">
				{{-- <div class="owl-stage-outer"> --}}
					<div class=" cover owl-slide" style="background-image: url({{asset('/allia/img/slides/slide_home_2.jpg')}});">
						<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
							<div class="container">
								<div class="row justify-content-center justify-content-md-end">
									<div class="col-lg-6 static">
										<div class="slide-text text-right white">
											<h2 class="owl-slide-animated owl-slide-title">IBP Gallon<br>IBPS 3.78L</h2>
											<p class="owl-slide-animated owl-slide-subtitle">
												Limited items available at this price
											</p>
											<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/owl-slide-->
					<div class=" cover owl-slide" style="background-image: url({{asset('/allia/img/slides/slide_home_1.jpg')}});">
						<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
							<div class="container">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-lg-6 static">
										<div class="slide-text white">
											<h2 class="owl-slide-animated owl-slide-title">ECMS<br>3.2L</h2>
											<p class="owl-slide-animated owl-slide-subtitle">
												Limited items available at this price
											</p>
											<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/owl-slide-->
					<div class=" cover owl-slide" style="background-image: url({{asset('/allia/img/slides/slide_home_3.jpg')}});">
						<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(255, 255, 255, 0.5)">
							<div class="container">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-lg-12 static">
										<div class="slide-text text-center black">
											<h2 class="owl-slide-animated owl-slide-title">IBPS<br>3.78L</h2>
											<p class="owl-slide-animated owl-slide-subtitle">
												Isopropyl Baby Powder Scent
											</p>
											<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--/owl-slide-->
					</div>
				{{-- </div> --}}
			</div>
			<div id="icon_drag_mobile"></div>
		</div>
		<!--/carousel-->

		<ul id="banners_grid" class="clearfix">
			<li>
				<a href="#0" class="img_container">
					<img src="{{asset('allia/img/banners_cat_placeholder.jpg')}}" data-src="{{asset('/allia/img/banner_1.jpg')}}" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3>Pump Collection</h3>
						<div><span class="btn_1">Shop Now</span></div>
					</div>
				</a>
			</li>
			<li>
				<a href="#0" class="img_container">
					<img src="{{asset('/allia/img/banners_cat_placeholder.jpg')}}" data-src="{{asset('/allia/img/banner_2.jpg')}}" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3>Spray Collection</h3>
						<div><span class="btn_1">Shop Now</span></div>
					</div>
				</a>
			</li>
			<li>
				<a href="#0" class="img_container">
					<img src="img/banners_cat_placeholder.jpg" data-src="{{asset('/allia/img/banner_3.jpg')}}" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3>Gallon Collection</h3>
						<div><span class="btn_1">Shop Now</span></div>
					</div>
				</a>
			</li>
		</ul>
		<!--/banners_grid -->

		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Top Selling</h2>
				<span>Products</span>
				<p>Collection of Top Selling products</p>
			</div>
			<div class="row small-gutters">
                 @foreach ( $products as $product )
                    <div class="col-xs-12 col-md-4 col-xl-3">
                        <div class="grid_item">
					@if ($product->is_sale == 'yes')
						<span class="ribbon off">-{{number_format($product->discount_rate)}}%</span>
					@endif
                            <figure>

                                <a href="product-detail-1.html">
                                    <img class="img-fluid lazy" src="{{asset('allia/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{asset('storage/'.$product->img_url)}}" alt="">
                                    <img class="img-fluid lazy" src="{{asset('allia/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{asset('storage/'.$product->img_url)}}" alt="">
                                </a>
                                {{-- <div data-countdown="2021/04/30" class="countdown"></div> --}}
                            </figure>

                            <h6> {{Str::limit($product->description,80)}}...</h6>
                            <a href="product-detail-1.html">
                                <h3> {{$product->name}}</h3>
                            </a>
                            <div class="price_box">
								@if ($product->is_sale == 'yes')

                               		 <span class="new_price">Php {{$product->price - ($product->price *  ($product->discount_rate/100))}}</span>

									<span class="old_price">Php {{ $product->price }}</span>
								@else
                               		 <span class="new_price">Php {{ $product->price }}</span>

								@endif
                            </div>
                            <ul>
                                {{-- <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                                <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li> --}}
                                <li><a href="{{ route('cart.add', $product->id) }}" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                            </ul>
                        </div>
                        <!-- /grid_item -->
                    </div>
                @endforeach

			</div>
			<!-- /row samll-gutter-->
		</div>
		<!-- /container -->

		<div class="featured lazy" data-bg="{{asset('allia/url(img/featured_home.jpg)')}}">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<div class="container margin_60">
					<div class="row justify-content-center justify-content-md-start">
                    {{-- @foreach ( $firstFeaturedProduct as $item ) --}}


						<div class="col-lg-6 wow" data-wow-offset="150">
							<h3>{{ $firstFeaturedProduct->name }}</h3>
							<p>{{ $firstFeaturedProduct->description }}</p>
							<div class="feat_text_block">
								<div class="price_box">
									<span class="new_price">Php {{ number_format($firstFeaturedProduct->price,2) }}</span>
									{{-- <span class="old_price">$170.00</span> --}}
								</div>
								{{-- <a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a> --}}
                                <a href="{{ route('cart.add', $product->id) }}" class="btn_1" data-toggle="tooltip" data-placement="left" title="Add to cart"><span>Add to cart</span></a>
							</div>
						</div>

                     {{-- @endforeach --}}
					</div>
				</div>
			</div>
		</div>
		<!-- /featured -->

		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Featured</h2>
				<span>Products</span>
				<p>Try our other new and hot products</p>
			</div>
			<div class="owl-carousel owl-theme products_carousel">
				@foreach ( $featured_products as $product )
				<div class="item">


					<div class="grid_item">
					@switch($product->is_featured)
						@case('hot')
							<span class="ribbon hot">Hot</span>
							@break

						@case('new')
							<span class="ribbon new">New</span>
							@break

						@case('sale')
							<span class="ribbon off"> -{{ number_format($product->discount_rate, 0) }} % </span>
							@break

						@default

					@endswitch
						<figure>
							<a href="product-detail-1.html">
								<img class="owl-lazy" src="{{asset('allia/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{asset('storage/'.$product->img_url)}}" alt="">
							</a>
						</figure>
						{{-- <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div> --}}

						<a href="product-detail-1.html">
							<h3>{{ $product->name }}</h3></h3>
						</a>
						<div class="price_box">
							@if ($product->is_sale == 'yes')
                                     <span class="ribbon off">-{{number_format($product->discount_rate)}}%</span>


									<span class="new_price">Php {{$product->price - ($product->price *  ($product->discount_rate/100))}}</span>

								<span class="old_price">Php {{ $product->price }}</span>
							@else
									<span class="new_price">Php {{ $product->price }}</span>

							@endif
						</div>
						<ul>
							{{-- <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li> --}}
							<li><a href="{{ route('cart.add', $product->id) }}" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->

				</div>
				@endforeach

				<!-- /item -->
			</div>
			<!-- /products_carousel -->
		</div>
		<!-- /container -->

		<div class="bg_gray">
			<div class="container margin_30">
				<div id="brands" class="owl-carousel owl-theme">
					<div class="item">
						<a href="#0"><img src="{{asset('allia/img/brands/placeholder_brands.png')}}" data-src="{{asset('allia/img/brands/logo_1.png')}}" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="{{asset('allia/img/brands/logo_2.png')}}" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="{{asset('allia/img/brands/logo_3.png')}}" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="{{asset('allia/img/brands/logo_4.png')}}" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="{{asset('allia/img/brands/logo_5.png')}}" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="{{asset('allia/img/brands/logo_6.png')}}" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
				</div><!-- /carousel -->
			</div>
		</div>
		<!-- /bg_gray -->

		{{-- <div class="container margin_60_35">
			<div class="main_title">
				<h2>Latest News</h2>
				<span>Blog</span>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<a class="box_news" href="blog.html">
						<figure>
							<img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-1.jpg" alt="" width="400" height="266" class="lazy">
							<figcaption><strong>28</strong>Dec</figcaption>
						</figure>
						<ul>
							<li>by Mark Twain</li>
							<li>20.11.2017</li>
						</ul>
						<h4>Pri oportere scribentur eu</h4>
						<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
					</a>
				</div>
				<!-- /box_news -->
				<div class="col-lg-6">
					<a class="box_news" href="blog.html">
						<figure>
							<img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-2.jpg" alt="" width="400" height="266" class="lazy">
							<figcaption><strong>28</strong>Dec</figcaption>
						</figure>
						<ul>
							<li>By Jhon Doe</li>
							<li>20.11.2017</li>
						</ul>
						<h4>Duo eius postea suscipit ad</h4>
						<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
					</a>
				</div>
				<!-- /box_news -->
				<div class="col-lg-6">
					<a class="box_news" href="blog.html">
						<figure>
							<img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-3.jpg" alt="" width="400" height="266" class="lazy">
							<figcaption><strong>28</strong>Dec</figcaption>
						</figure>
						<ul>
							<li>By Luca Robinson</li>
							<li>20.11.2017</li>
						</ul>
						<h4>Elitr mandamus cu has</h4>
						<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
					</a>
				</div>
				<!-- /box_news -->
				<div class="col-lg-6">
					<a class="box_news" href="blog.html">
						<figure>
							<img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-4.jpg" alt="" width="400" height="266" class="lazy">
							<figcaption><strong>28</strong>Dec</figcaption>
						</figure>
						<ul>
							<li>By Paula Rodrigez</li>
							<li>20.11.2017</li>
						</ul>
						<h4>Id est adhuc ignota delenit</h4>
						<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
					</a>
				</div>
				<!-- /box_news -->
			</div>
			<!-- /row -->
		</div> --}}
		<!-- /container -->
		
    @endsection()
