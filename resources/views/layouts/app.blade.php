<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ProtectPlus+') }}</title>

    <link rel="icon" type="image/png" href="{{asset('storage/'.setting('site.logo'))}}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

    {{-- <link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css"> --}}

      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/custom.css') }}">
    <!-- Styles -->
    <link rel="stylesheet" media="screen" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" media="print" href="{{ asset('css/print_media.css') }}" >
</head>
<body>
    <div id="app">
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
                    {{-- <li class="nav-item" style="">

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
                    @endif --}}

{{--
                        <li class="nav-item">

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

                    @endif --}}


                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>


                            {{-- registration code --}}
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                        {{ __('Logout') }}

                                    </a>
                                    <div class="dropdown-divider"></div>
                                    {{-- <a class="dropdown-item" href="{{ route('distro') }}">
                                        My Order(s)
                                    </a> --}}

                                     @if(Auth::user()!== null)

                                         @switch(Auth::user()['role_id'])

                                            @case(Auth::user()['role_id'] === 2 || Auth::user()['role_id'] == null)
                                                <a class="dropdown-item" href="{{ route('distro') }}">
                                                    My Order(s)
                                                </a>
                                                <div class="dropdown-divider"></div>
                                             @break

                                            @case(Auth::user()['role_id'] === 3)
                                                <a class="dropdown-item" href="{{ route('walkin') }}">
                                                    Walk-In
                                                </a>
                                                <a class="dropdown-item" href="{{ route('sales') }}">
                                                    Order Listing
                                                </a>
                                             @break

                                             @case(Auth::user()['role_id'] === 4)
                                                <a class="dropdown-item" href="{{ route('delivery.created')}}">
                                                   Created D.R.
                                                </a>
                                                 <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{ route('delivery') }}">
                                                   Approved Orders
                                                </a>

                                             @break

                                              @case(Auth::user()['role_id'] === 6)
                                              <a class="dropdown-item" href="{{ route('inventory')}}">
                                                   Product Overview
                                                </a>
                                              <a class="dropdown-item" href="{{ route('estimates')}}">
                                                   Estimates
                                                </a>

                                                <a class="dropdown-item" href="{{ route('product_code')}}">
                                                   Create Product Code
                                                </a>

                                             @break

                                            @default

                                        @endswitch

                                    @endif






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

        {{-- display success message --}}
        @if(session()->has('message'))
            <div class="alert alert-success text-center" role="alert">
                 {{ session('message') }}
            </div>

        @endif
         {{-- display error message --}}
        @if(session()->has('error'))
            <div class="alert alert-danger text-center" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <main class="py-4 container">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.printPage.js') }}"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    {{-- <script src=" https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>

     {{-- <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script> --}}
   {{-- <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js"></script> --}}

    @yield('javascripts')
    <script>

        $(document).ready(function(){
        $('.toast').toast('show');
        });

    </script>
     @include('sweetalert::alert')
</body>
</html>
