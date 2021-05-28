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
    <div class="preloader flex-column justify-content-center align-items-center no-print">
      <img class="animation__shake" src="{{asset('storage/'.setting('site.logo'))}}" alt="AdminLTELogo" height="60" width="60">
    </div>
    <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="navbar-brand" href="#">
            <img src="{{asset('storage/'.setting('site.logo'))}}" alt="protect+" width="30" height="30">
            {{ config('app.name', 'ProtectPlus+') }}
        </a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
         <!-- Notifications Dropdown Menu -->
        <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link">
                Welcome, {{ Auth::user()->name }}
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-power-off mr-2"></i> {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
         {{-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="nav-icon fas fa-shopping-cart"></i>
                @if (  Cart::session(auth()->id())->getContent()->count() != '0')
                    <span class="badge badge-danger navbar-badge">{{ Cart::session(auth()->id())->getContent()->count() }} </span>

                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="{{ route('walkin.index') }}">
                    <i class="fas fa-shopping-cart mr-2"></i> {{ Cart::session(auth()->id())->getContent()->count() }} Cart Item(s)
                </a>
            </div>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

    </ul>
  </nav>


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

                    <li class="nav-item menu-open">
                        <a href="{{ route('delivery') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="{{ route('delivery.created') }}" class="nav-link">
                            <i class="nav-icon fas fa-walking"></i>
                            <p>
                           Created DR

                            </p>
                        </a>
                    </li>
                     {{-- <li class="nav-header">Promo / Featured Product</li>
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

                        </ul>

                    </li> --}}
                    {{-- <li class="nav-item ">
                        <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault();  document.getElementById('logout-form').submit();">

                            <i class="nav-icon fas fa-power-off"></i>
                            <p>
                                {{ __('Logout') }}
                            </p>

                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </li> --}}



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

    <script type="text/javascript" src="{{ asset('js/jquery.printPage.js') }}"></script>

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
    <script>

        $(document).ready(function(){
            $('.btnprn').printPage();
        });
    </script>
@include('sweetalert::alert')
</body>
</html>
