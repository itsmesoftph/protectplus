<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ProtectPlus+</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
  
  <!-- Favicons-->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

  <!-- GOOGLE WEB FONT -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

   
  @stack('styles')


</head>
<body class="hold-transition sidebar-mini layout-fixed">
  @php

  @endphp
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{asset('storage/'.setting('site.logo'))}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <header class="version_1">
		<div class="layer"></div><!-- Mobile menu overlay mask -->

		<div class="main_nav Sticky">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 col-md-3">
						<nav class="categories">
							<ul class="clearfix">
								<li>

                  <span>
                    
                      <a class="navbar-brand" href="{{ route('home') }}">
                          <img src="{{asset('storage/'.setting('site.logo'))}}" alt="protect+" width="30" height="30">
                                      {{ config('app.name', 'ProtectPlus+') }}
                      </a>
                      {{-- @endif --}}
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
                  @if (Cart::session(auth()->id())->getContent()->count() != 0)
                      <a href="{{ route('cart.index') }}" class="cart_bt">

                        @auth
                        <strong>{{ Cart::session(auth()->id())->getContent()->count() }}</strong>
                        @else
                        0
                        @endauth
                    </a>
                  @endif
                    

									<div class="dropdown-menu">
                      <a href="{{ route('walkin.index') }}" class="btn_1"><i class="ti-shopping-cart-full"></i> Cart Items</a>
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


                                        <a href="{{ route('logout') }}" class="btn_1" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                           {{ __('Logout') }}
                                        </a>
										
									</div>
								</div>
								<!-- /dropdown-access-->
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
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="{{asset('storage/'.setting('site.logo'))}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ProtectPlus+</span>
      </a>

       <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex flex-column align-items-center">
        <div class="image d-flex justify-content-center">
          {{-- <img src="https://via.placeholder.com/150x150.jpg" class="img-circle elevation-2 w-50" alt="User Image"> --}}
          <img src="{{asset('storage/'. Auth::user()->avatar)}}" class="img-circle elevation-2 w-50" alt="User Image">

        </div>
        <div class="info d-flex flex-column align-items-center">
          <a href="#" class="d-block"> {{ Auth::user()->name }} </a>

          <a class="text-muted text-sm" href="#"><i class="fas fa-circle text-success"></i>  {{ Auth::user()->role->name }}</a>

        </div>
      </div>

      <!-- Sidebar -->
      <div class="sidebar">

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

              @switch(Auth::user()['role_id'])
                @case(Auth::user()['role_id'] === 3)
                    <li class="nav-item">
                        <a href="{{ route('sales') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="{{ route('walkin') }}" class="nav-link">
                            <i class="nav-icon fas fa-walking"></i>
                            <p>
                            Walk-In

                            </p>
                        </a>
                    </li>

                     <li class="nav-header">Promo / Featured Product</li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-ad"></i>

                          <p>
                            Promo Settings
                            <i class="fas fa-angle-left right"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                             <a href="{{ route('sales.promo') }} " class="nav-link ">
                                <i class="far fa-circle nav-icon ml-2"></i>
                                <p>
                                    View Promo
                                </p>
                            </a>
                          {{-- </li>
                          <li class="nav-item">
                            <a href="{{ route('admin.add-product-form') }}" class="nav-link">
                              <i class="far fa-circle nav-icon ml-2"></i>
                              <p>Add Promo</p>
                            </a>
                          </li> --}}

                        </ul>

                    </li>
                     <li class="nav-item ">
                        <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">

                            <i class="fas fa-power-off mr-2"></i> {{ __('Logout') }}

                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </li>

                    @break
                  @case(Auth::user()['role_id'] == 8)

                    <li class="nav-item menu-open">
                      <a href="{{ route('overview')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Dashboard
                        </p>
                      </a>

                    </li>
                    <li class="nav-item">
                      <a href="{{ route('production')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                          Production Estimates
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('sales_summary') }}" class="nav-link">
                        <i class="nav-icon  fas fa-chart-line"></i>
                        <p>
                          Sales Summary

                        </p>
                      </a>

                    </li>
                    <li class="nav-item">
                      <a href="{{ route('estimator') }}" class="nav-link">
                        <i class="nav-icon  fas fa-calculator"></i>
                        <p>
                          Material Estimator
                        </p>
                      </a>
                    </li>
                  @break

                  @case(Auth::user()['role_id'] == 1)

                    <li class="nav-header">Dashboard</li>

                    <li class="nav-item ">
                        <a href="{{route('admin')}}" class="nav-link ">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                            Dashboard
                          </p>
                        </a>

                    </li>

                    <li class="nav-header">User's Information</li>

                    <li class="nav-item ">
                        <a href="#" class="nav-link">
                          <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                          <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                          </p>
                        </a>
                         <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="{{route('admin.users')}}" class="nav-link">
                              <i class="far fa-circle nav-icon ml-2"></i>
                              <p>View Users</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              <i class="far fa-circle nav-icon ml-2"></i>
                              <p>Add User</p>
                            </a>
                          </li>

                        </ul>
                    </li>
                    <li class="nav-item ">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                        <p>
                          User Roles
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{route('admin.roles')}}" class="nav-link">
                            <i class="far fa-circle nav-icon ml-2"></i>
                            <p>View Roles</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{route('admin.add-roles-form')}}" class="nav-link">
                            <i class="far fa-circle nav-icon ml-2"></i>
                            <p>Add Roles</p>
                          </a>
                        </li>

                      </ul>
                    </li>
                     <li class="nav-header">Product's Information</li>

                   <li class="nav-item">
                        <a href="#" class="nav-link ">
                          <i class="nav-icon fa fa-cubes" aria-hidden="true"></i>
                          <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="{{ route('admin.product') }}" class="nav-link">
                              <i class="far fa-circle nav-icon ml-2"></i>
                              <p>View Products</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{ route('admin.add-product-form') }}" class="nav-link">
                              <i class="far fa-circle nav-icon ml-2"></i>
                              <p>Add Product</p>
                            </a>
                          </li>

                        </ul>

                    </li>

                  @break

                  @default

              @endswitch

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-color: white;">
      <section class="content pt-4">
        <div class="container-fluid">
            @yield('content')
        </div>
      </section>
      <!-- Content Header (Page header) -->

      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2021 ProtectPlus+.</strong>
      All rights reserved.
     
      </div> --}}
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>

<!-- ./wrapper -->


 {{-- <script src="{{ asset('js/app.js') }}" ></script> --}}

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.js')}}"></script>
 <!-- DataTables  & Plugins -->
  <script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/jszip/jszip.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

{{--
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script> --}}


	

@stack('scripts')

@include('sweetalert::alert')
</body>
</html>
