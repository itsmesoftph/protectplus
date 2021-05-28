<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ProtectPlus+') }}</title>

    <link rel="icon" type="image/png" href="{{asset('storage/'.setting('site.logo'))}}">

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{asset('allia/css/bootstrap.custom.min.css')}}" rel="stylesheet">
     <link href="{{asset('allia/css/style.css')}}" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="{{asset('allia/css/home_1.css')}}" rel="stylesheet">
	<link href="{{asset('allia/css/checkout.css')}}" rel="stylesheet">
	<link href="{{asset('allia/css/cart.css')}}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{asset('allia/css/custom.css')}}" rel="stylesheet">
    @stack('style')
</head>

<body>

	<div id="page">

	<header class="version_1">
		<div class="layer"></div><!-- Mobile menu overlay mask -->
		{{-- <div class="main_header">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
						<div id="logo">
							<a href="index.html"><img src="img/logo.svg" alt="" width="100" height="35"></a>
						</div>
					</div>
					<nav class="col-xl-6 col-lg-7">
						<a class="open_close" href="javascript:void(0);">
							<div class="hamburger hamburger--spin">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>
						</a>
						<!-- Mobile menu button -->
						<div class="main-menu">
							<div id="header_menu">
								<a href="index.html"><img src="img/logo_black.svg" alt="" width="100" height="35"></a>
								<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
							</div>
							<ul>
								<li class="submenu">
									<a href="javascript:void(0);" class="show-submenu">Home</a>
									<ul>
										<li><a href="index.html">Slider</a></li>
										<li><a href="index-2.html">Video Background</a></li>
										<li><a href="index-3.html">Vertical Slider</a></li>
										<li><a href="index-4.html">GDPR Cookie Bar</a></li>
									</ul>
								</li>
								<li class="megamenu submenu">
									<a href="javascript:void(0);" class="show-submenu-mega">Pages</a>
									<div class="menu-wrapper">
										<div class="row small-gutters">
											<div class="col-lg-3">
												<h3>Listing grid</h3>
												<ul>
													<li><a href="listing-grid-1-full.html">Grid Full Width</a></li>
													<li><a href="listing-grid-2-full.html">Grid Full Width 2</a></li>
													<li><a href="listing-grid-3.html">Grid Boxed</a></li>
													<li><a href="listing-grid-4-sidebar-left.html">Grid Sidebar Left</a></li>
													<li><a href="listing-grid-5-sidebar-right.html">Grid Sidebar Right</a></li>
													<li><a href="listing-grid-6-sidebar-left.html">Grid Sidebar Left 2</a></li>
													<li><a href="listing-grid-7-sidebar-right.html">Grid Sidebar Right 2</a></li>
												</ul>
											</div>
											<div class="col-lg-3">
												<h3>Listing row &amp; Product</h3>
												<ul>
													<li><a href="listing-row-1-sidebar-left.html">Row Sidebar Left</a></li>
													<li><a href="listing-row-2-sidebar-right.html">Row Sidebar Right</a></li>
													<li><a href="listing-row-3-sidebar-left.html">Row Sidebar Left 2</a></li>
													<li><a href="listing-row-4-sidebar-extended.html">Row Sidebar Extended</a></li>
													<li><a href="product-detail-1.html">Product Large Image</a></li>
													<li><a href="product-detail-2.html">Product Carousel</a></li>
													<li><a href="product-detail-3.html">Product Sticky Info</a></li>
												</ul>
											</div>
											<div class="col-lg-3">
												<h3>Other pages</h3>
												<ul>
													<li><a href="cart.html">Cart Page</a></li>
													<li><a href="checkout.html">Check Out Page</a></li>
													<li><a href="confirm.html">Confirm Purchase Page</a></li>
													<li><a href="account.html">Create Account Page</a></li>
													<li><a href="track-order.html">Track Order</a></li>
													<li><a href="help.html">Help Page</a></li>
													<li><a href="help-2.html">Help Page 2</a></li>
													<li><a href="leave-review.html">Leave a Review</a></li>
												</ul>
											</div>
											<div class="col-lg-3 d-xl-block d-lg-block d-md-none d-sm-none d-none">
												<div class="banner_menu">
													<a href="#0">
														<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/banner_menu.jpg" width="400" height="550" alt="" class="img-fluid lazy">
													</a>
												</div>
											</div>
										</div>
										<!-- /row -->
									</div>
									<!-- /menu-wrapper -->
								</li>
								<li class="submenu">
									<a href="javascript:void(0);" class="show-submenu">Extra Pages</a>
									<ul>
										<li><a href="header-2.html">Header Style 2</a></li>
										<li><a href="header-3.html">Header Style 3</a></li>
										<li><a href="header-4.html">Header Style 4</a></li>
										<li><a href="header-5.html">Header Style 5</a></li>
										<li><a href="404.html">404 Page</a></li>
										<li><a href="sign-in-modal.html">Sign In Modal</a></li>
										<li><a href="contacts.html">Contact Us</a></li>
										<li><a href="about.html">About 1</a></li>
										<li><a href="about-2.html">About 2</a></li>
										<li><a href="modal-advertise.html">Modal Advertise</a></li>
										<li><a href="modal-newsletter.html">Modal Newsletter</a></li>
									</ul>
								</li>
								<li>
									<a href="blog.html">Blog</a>
								</li>
								<li>
									<a href="#0">Buy Template</a>
								</li>
							</ul>
						</div>
						<!--/main-menu -->
					</nav>
					<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">
						<a class="phone_top" href="tel://9438843343"><strong><span>Need Help?</span>+94 423-23-221</strong></a>
					</div>
				</div>
				<!-- /row -->
			</div>
		</div>  --}}
		<!-- /main_header -->

		<div class="main_nav Sticky">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 col-md-3">
						<nav class="categories">
							<ul class="clearfix">
								<li>

                                    <span>
                                         @if(Auth::user() != null)
                                                @if(Auth::user()['name'] == 'user' || Auth::user()['name'] == '' || Auth::user()['name'] == null)
                                                    <a class="navbar-brand ml-auto" href="{{ route('home') }}" style="left: 5px;">
                                                    <img src="{{asset('storage/'.setting('site.logo'))}}" alt="protect+" width="30" height="30">
                                                        {{ config('app.name', 'ProtectPlus+') }}
                                                    </a>
                                                @else
                                                    <a class="navbar-brand" href="#">
                                                        <img src="{{asset('storage/'.setting('site.logo'))}}" alt="protect+" width="30" height="30" style="left: 5px;">
                                                        {{ config('app.name', 'ProtectPlus+') }}
                                                    </a>
                                                @endif
                                        @else
                                        <a class="navbar-brand" href="{{ route('home') }}">
                                            <img src="{{asset('storage/'.setting('site.logo'))}}" alt="protect+" width="30" height="30">
                                                        {{ config('app.name', 'ProtectPlus+') }}
                                        </a>
                                        @endif
                                    </span>
									<div id="menu">

                                        <ul>
                                            <li>

                                            </li>
                                        </ul>


									</div>
								</li>
                                <li class="ml-4">
                                    <span >
                                        <a href="{{ route('home')}}" class="navbar-brand">Home</a>
                                    </span>
                                </li>
                                <li class="ml-4">
                                    <span >
                                        <a href="{{ route('help') }}" >Help</a>
                                    </span>
                                </li>
							</ul>
						</nav>
					</div>
					<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">

					</div>
					<div class="col-xl-3 col-lg-2 col-md-3">
						<ul class="top_tools">
							<li>
                                <div class="dropdown dropdown-access">
									<a href="{{ route('cart.index') }}" class="cart_bt">

                                        @auth
                                        <strong>{{ Cart::session(auth()->id())->getContent()->count() }}</strong>
                                        @else
                                        0
                                        @endauth
                                        {{-- <strong>2</strong> --}}
                                    </a>

									<div class="dropdown-menu">
                                        <a href="{{ route('cart.index') }}" class="btn_1"><i class="ti-shopping-cart-full"></i> Cart Items</a>

									</div>
								<!-- /dropdown-cart-->
							</li>
							{{-- <li>
								<a href="#0" class="wishlist"><span>Wishlist</span></a>
							</li> --}}
							<li>
								<div class="dropdown dropdown-access">
									<a href="#" class="access_link"><span>Account</span></a>
									<div class="dropdown-menu">


                                     @if(Auth::user()['role_id'] == 2 || Auth::user()['role_id'] == null  )
                                        <a href="{{ route('logout') }}" class="btn_1" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                           {{ __('Logout') }}
                                        </a>
										<ul>
											{{-- <li>
												<a href="track-order.html"><i class="ti-truck"></i>Track your Order</a>
											</li> --}}
											<li>
												<a href="{{ route('distro') }}"><i class="ti-shopping-cart-full"></i>My Orders</a>
											</li>

										</ul>

                                    @else

                                    @endif
									</div>
								</div>
								<!-- /dropdown-access-->
							</li>
							<li>
								{{-- <a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a> --}}
							</li>
							<li>
                                 <span>
                                    @if(Auth::user() != null)
                                            @if(Auth::user()['name'] == 'user' || Auth::user()['name'] == '' || Auth::user()['name'] == null)
                                                <a class="navbar-brand" href="{{ route('home') }}">
                                                <img src="{{asset('storage/'.setting('site.logo'))}}" alt="protect+" width="30" height="30">
                                                    {{ config('app.name', 'ProtectPlus+') }}
                                                </a>
                                            @else
                                                <a class="navbar-brand" href="#">
                                                    <img src="{{asset('storage/'.setting('site.logo'))}}" alt="protect+" width="30" height="30">
                                                    {{ config('app.name', 'ProtectPlus+') }}
                                                </a>
                                            @endif
                                    @else
                                    <a class="navbar-brand" href="{{ route('home') }}">
                                        <img src="{{asset('storage/'.setting('site.logo'))}}" alt="protect+" width="30" height="30">
                                                    {{ config('app.name', 'ProtectPlus+') }}
                                    </a>
                                    @endif
                                </span>
							</li>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<div class="search_mob_wp">
				<input type="text" class="form-control" placeholder="Search over 10.000 products">
				<input type="submit" class="btn_1 full-width" value="Search">
			</div>
			<!-- /search_mobile -->
		</div>
		<!-- /main_nav -->
	</header>
	<!-- /header -->

	<main>
        @yield('content')
	</main>
	<!-- /main -->

	<footer class="revealed">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 col-md-6">
						<h3 data-target="#collapse_3">Contacts</h3>
					<div class="collapse dont-collapse-sm contacts" id="collapse_3">
						<ul>
							<li><i class="ti-home"></i>32 A. Bonifacio Avenue Corner Dr.Alejos Street<br>La Loma, Quezon City</li>
							<li><i class="ti-headphone-alt"></i>(02) 8569 - 1168</li>
							<li><i class="ti-email"></i><a href="#0">info@protectplus.com.ph</a></li>
						</ul>
					</div>
				</div>

			</div>
			<!-- /row-->
			<hr>
			<div class="row add_bottom_25">

				<div class="col-lg-12">
					<ul class="additional_links">

						<li><span>© 2021 ProtectPlus</span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->

	<div id="toTop"></div><!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
    <script src="{{asset('allia/js/common_scripts.min.js')}}"></script>
    <script src="{{asset('allia/js/main.js')}}"></script>

	<!-- SPECIFIC SCRIPTS -->
	{{-- <script src="{{asset('allia/js/carousel-home.min.js')}}"></script> --}}


    <!-- SWEETALERT -->
    <script src="{{ asset('js/sweetalert.all.js') }}" ></script>

	@section('javascripts')
	<script>
		$("#carousel-home .owl-carousel").on("initialized.owl.carousel", function() {
		setTimeout(function() {
			$("#carousel-home .owl-carousel .owl-item.active .owl-slide-animated").addClass("is-transitioned");
			$("section").show();
		}, 500);
		});


		const $owlCarousel = $("#carousel-home .owl-carousel").owlCarousel({
		items: 1,
		autoplay: true,
		autoPlaySpeed: 5000,
		autoplayTimeout:5000,
		autoplayHoverPause: true, // Stops autoplay
		loop: true,
		//			nav: true,
		//dots:true,
		/*
			responsive:{
				0:{
					dots:false
				},
				767:{
					dots:false
				},
				768:{
					dots:true
				}
			}
			*/
		});

		$owlCarousel.on("changed.owl.carousel", function(e) {
		$(".owl-slide-animated").removeClass("is-transitioned");
		const $currentOwlItem = $(".owl-item").eq(e.item.index);
		$currentOwlItem.find(".owl-slide-animated").addClass("is-transitioned");
		});

		$owlCarousel.on("resize.owl.carousel", function() {
		setTimeout(function() {
		}, 50);
		});

	</script>


     @include('sweetalert::alert')



</body>
</html>
