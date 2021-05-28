<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ProtectPlus+</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
   <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
   <!-- summernote -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/summernote/summernote-bs4.min.css')}}">

   <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" media="print" href="{{ asset('css/print_media.css') }}" >
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}" >

    @stack('styles')

  @yield('assets')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">
      @php
        $img = 'storage/'. Auth::user()->avatar;
      @endphp
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{asset('storage/'.setting('site.logo'))}}" alt="AdminLTELogo" height="60" width="60">
    </div>


    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm  navbar-fixed-top no-print">
              <div class="container">
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


                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                      <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <!-- Left Side Of Navbar -->
                  @if(Auth::user() !== null)

                      @if(Auth::user()['role_id'] == 2 || Auth::user()['role_id'] == null)

                          <ul class="navbar-nav mr-auto">
                              <a class="nav-link " href="{{ route('home') }}">
                                      <i class="fas fa-store text-info"></i>
                                      Shop

                                  </a>
                          </ul>
                      @else
                          @if(Auth::user()['role_id'] == 3)
                              <ul class="navbar-nav mr-auto">
                                  <a class="nav-link " href="{{ route('walkin') }}">
                                          <i class="fas fa-store text-info"></i>
                                          Shop

                                      </a>
                              </ul>
                          @endif
                          <ul class="navbar-nav mr-auto" style="display:none;">
                              <a class="nav-link " href="{{ route('home') }}">
                                      <i class="fas fa-store text-info"></i>
                                      Shop

                                  </a>
                          </ul>

                      @endif
                  @else
                      {{-- @if(Auth::user()['role_id'] == 3){
                              <ul class="navbar-nav mr-auto">
                                  <a class="nav-link " href="{{ route('walkin') }}">
                                          <i class="fas fa-store text-info"></i>
                                          Shop

                                      </a>
                      @endif --}}
                      <ul class="navbar-nav mr-auto">
                          <a class="nav-link " href="{{ route('home') }}">
                                  <i class="fas fa-store text-info"></i>
                                  Shop
                          </a>
                      </ul>
                  @endif

                      <!-- Right Side Of Navbar -->
                      <ul class="navbar-nav ml-auto">
                      @if(Auth::user()!== null)
                              {{-- {{Auth::user()}} --}}

                          {{-- @if (Auth::user()['role_id'] == 3)
                              {{$walkin == 'walkin'}}


                          @endif --}}

                          @if(Auth::user()['role_id'] == 2 || Auth::user()['role_id'] == null  )

                              <li class="nav-item" style="">

                                  <a class="nav-link " href="{{ route('cart.index') }}">
                                      <i class="fas fa-shopping-cart text-info"></i>
                                      Cart

                                  <div class="badge badge-danger">
                                  @auth
                                      {{ Cart::session(auth()->id())->getContent()->count() }}
                                      @else
                                      0
                                  @endauth
                                  </div>
                                  </a>
                              </li>
                          @else
                              @if (Auth::user()['role_id'] == 3)
                              {{-- {{dd(Cart::session(auth()->id())->getContent()->count())}} --}}
                                  @if (Cart::session(auth()->id())->getContent()->count() == 0)
                                      <li class="nav-item" style="display:none;">

                                          <a class="nav-link " href="{{ route('walkin.index') }}">
                                              <i class="fas fa-shopping-cart text-info"></i>
                                              Cart

                                          <div class="badge badge-danger">
                                          @auth
                                              {{ Cart::session(auth()->id())->getContent()->count() }}
                                              @else
                                              0
                                          @endauth
                                          </div>
                                          </a>
                                      </li>
                                  @else
                                  <li class="nav-item" style="">

                                      <a class="nav-link " href="{{ route('walkin.index') }}">
                                          <i class="fas fa-shopping-cart text-info"></i>
                                          Cart

                                      <div class="badge badge-danger">
                                      @auth
                                          {{ Cart::session(auth()->id())->getContent()->count() }}
                                          @else
                                          0
                                      @endauth
                                      </div>
                                      </a>
                                  </li>
                                  @endif
                              @endif
                              <li class="nav-item" >

                                  <a class="nav-link " href="{{ route('cart.index') }}" style="display:none;">
                                      <i class="fas fa-shopping-cart text-info"></i>
                                      Cart

                                      <div class="badge badge-danger">
                                      @auth
                                      {{ Cart::session(auth()->id())->getContent()->count() }}
                                      @else
                                      0
                                      @endauth
                                      </div>
                                  </a>
                              </li>
                          @endif
                      @endif

                          @guest
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                              </li>


                          @else

                              <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      {{ Auth::user()->name }}
                                  </a>

                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">

                                         <i class="fas fa-power-off mr-2"></i> {{ __('Logout') }}

                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                      </form>
                                  </div>
                              </li>
                          @endguest
                      </ul>
                  </div>
              </div>
          </nav>
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
          <img src="{{ asset('storage/'. Auth::user()->avatar)}}" class="img-circle elevation-2 w-50" alt="User Image">

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

                  @case(Auth::user()['role_id'] == 8)
                    <li class="nav-header">Dashboard</li>

                    <li class="nav-item">
                      <a href="{{ route('overview')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Dashboard
                        </p>
                      </a>

                    </li>
                    <li class="nav-header">Estimates</li>

                    <li class="nav-item">
                      <a href="{{ route('production')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                          Production Estimates
                        </p>
                      </a>
                    </li>
                    <li class="nav-header">Sales</li>

                    <li class="nav-item">
                      <a href="{{ route('sales_summary') }}" class="nav-link">
                        <i class="nav-icon  fas fa-chart-line"></i>
                        <p>
                          Sales Summary

                        </p>
                      </a>

                    </li>
                    <li class="nav-header">Estimator</li>

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
                            <a href="{{route('admin.add-user-form')}}" class="nav-link">
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
                            <a href="{{ route('admin.add-roles-form') }}" class="nav-link">
                              <i class="far fa-circle nav-icon ml-2"></i>
                              <p>Add Roles</p>
                            </a>
                          </li>

                        </ul>
                    </li>
                    <li class="nav-header">Product's Information</li>

                    <li class="nav-item ">
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
                      <li class="nav-header">FAQ Settings</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-question-circle"></i>
                            <p>
                            FAQ
                            <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item ">
                                <a href="{{route('faq')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon ml-2"></i>
                                    <p>
                                    View FAQ
                                    </p>
                                </a>

                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.add-faq-form') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon ml-2"></i>
                                    <p>Add FAQ</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-question-circle"></i>
                            <p>
                                FAQ Category
                            <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                             <li class="nav-item">
                                <a href="{{ route('admin.view-all-category') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon ml-2"></i>
                                    <p>View FAQ Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.add-category-form') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon ml-2"></i>
                                    <p>Add FAQ Category</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                  @break

                  @case(Auth::user()['role_id'] === 3)
                    <li class="nav-item menu-open">
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
                                    View Promos
                                </p>
                            </a>
                          </li>
                          {{-- <li class="nav-item">
                            <a href="{{ route('sales.create-promo') }}" class="nav-link">
                              <i class="far fa-circle nav-icon ml-2"></i>
                              <p>Add Promo</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{ route('sales.create-promo') }}" class="nav-link">
                              <i class="far fa-circle nav-icon ml-2"></i>
                              <p>Add Featured Product</p>
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

                  @default

              @endswitch

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content">
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
      {{-- <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
      </div> --}}
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>

<!-- ./wrapper -->


<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


<!-- COMMON SCRIPTS -->
        {{-- <script src="{{asset('allia/js/common_scripts.min.js')}}"></script>
        <script src="{{asset('allia/js/main.js')}}"></script> --}}

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
<!-- dropzonejs -->
<script src="{{asset('adminlte/plugins/dropzone/min/dropzone.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminlte/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('adminlte/dist/js/pages/dashboard.js')}}"></script>

 @stack('scripts')


{{--
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script> --}}
<script>
  $(function () {
    $("#users").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#users_wrapper .col-md-6:eq(0)');
  });

    const imageFile = document.getElementById('id_image');
    const imagePreviewContainer = document.getElementById('imagePreview');
    const imagePreview = imagePreviewContainer.querySelector('.image-preview__image');
    const imagePreviewDefaultText = imagePreviewContainer.querySelector('.image-preview__default-text');
    imageFile.addEventListener("change", function(){
        const file = this.files[0];

        if(file){
            const reader = new FileReader();

            reader.addEventListener("load", function(){
            imagePreview.setAttribute("src",this.result);
            });
                $(".file-upload").addClass('active');
            $("#noFile").text(imageFile.value.replace("C:\\fakepath\\", ""));

            reader.readAsDataURL(file);
        } else {
            $(".file-upload").removeClass('active');
            $("#noFile").text("No file chosen...");
        }
        // else{
        //   imagePreviewDefaultText.style.display = "block";
        //   imagePreview.style.display = "none";
        // }

    });


    document.getElementById('chk_fatured').onchange = function() {
         document.getElementById('featured_option').disabled = !this.checked;
         document.getElementById('btn_save').disabled = !this.checked;
        if(document.getElementById('chk_fatured').checked){

            document.getElementById('chk_is_featured').value = "yes";


        }else{
            document.getElementById('chk_is_featured').value = "no";
            document.getElementById('featured_option').value="default";
            $("#chk_input_discount").attr("disabled","disabled");
            //$("#chk_input_discount").val('0');
        }



    };

     $(function() {
         $("#featured_option").change(function () {
            if($(this).val()=="sale"){
               // document.getElementById('chk_input_discount').disabled = !this.checked;
               $("#chk_input_discount").removeAttr("disabled");
               $("#chk_status").val("yes");
               $("#chk_input_discount").focus();
            }else{
               $("#chk_input_discount").attr("disabled","disabled");
                //$("#chk_input_discount").val('0');
                $("#chk_status").val("no");
            }
         });
     });


    </script>
@include('sweetalert::alert')
</body>
</html>
