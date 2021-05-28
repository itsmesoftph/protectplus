 @extends('layouts.sales')

     @push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />

         <!-- BASE CSS -->
        <link href="{{asset('allia/css/bootstrap.custom.min.css')}}" rel="stylesheet">
        <link href="{{asset('allia/css/style.css')}}" rel="stylesheet">

        <!-- SPECIFIC CSS -->
        {{-- <link href="{{asset('allia/css/home_1.css')}}" rel="stylesheet">
        <link href="{{asset('allia/css/checkout.css')}}" rel="stylesheet">
        <link href="{{asset('allia/css/cart.css')}}" rel="stylesheet"> --}}
        {{-- <link href="{{asset('allia/css/cart.css')}}" rel="stylesheet"> --}}
        <!-- YOUR CUSTOM CSS -->
        {{-- <link href="{{asset('allia/css/custom.css')}}" rel="stylesheet"> --}}
    @endpush



    @section('content')
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1>Cart</h1>
                    </div>
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('walkin')}}">Shop</a></li>
                        <li class="breadcrumb-item active">Your Cart</li>
                    </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <div class="row">
            <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-navy d-flex flex-row align-items-center">
                            <h3 class="card-title" style="color: white;">Your Cart</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            @if(  !\Cart::isEmpty()  )
                            <!-- /page_header -->
                                <table class="table table-striped  art-list mb-4" id="items" >
                                    <thead>
                                        <tr>
                                            <th style="style:none;" class="text-center">
                                                Product
                                            </th>
                                            <th class="text-center">
                                                Price
                                            </th>
                                            <th class="text-center">
                                                Quantity
                                            </th>
                                            <th class="text-center">
                                                Subtotal
                                            </th>
                                            <th>

                                            </th>
                                            <th style="width: 20%;">

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item )
                                            {{-- <form action="{{ route('cart.update', $item->id) }}" id="cart_form"> --}}
                                                <tr>
                                                    <td style="vertical-align: middle; border: 0;" class="text-center">
                                                        <div class="thumb_cart">
                                                            <img src="{{asset('storage/'.$item->associatedModel->img_url)}}" data-src="{{asset('storage/'.$item->associatedModel->img_url)}}" class="lazy" alt="Image" style="width: 50px; height:50px;">
                                                        </div>
                                                        <span class="item_cart">{{ $item->name }}</span>
                                                    </td>
                                                    <td class="text-center" style="vertical-align: middle; border: 0;" class="text-center">

                                                            <strong style="font-weight: 500;"> Php {{$item->price}}</strong>


                                                    </td>
                                                    <form action="{{ route('walkin.update', $item->id) }}" id="cart_form">
                                                        <td class="qty text-center" style="vertical-align: middle; border: 0;" class="text-center">
                                                            <div class="numbers-row" >
                                                                <input type="number" value="{{ $item->quantity }}" id="quantity" class="qty2" name="order_quantity">

                                                            <div id="inc" class="inc button_inc">+</div><div id="dec" class="dec button_inc"  > -</div></div>
                                                        </td>
                                                        <td class="text-center" style="vertical-align: middle; border: 0;" class="text-center">
                                                            <strong style="font-weight: 500;">Php {{Cart::session(auth()->id())->get($item->id)->getPriceSum() }}</strong>
                                                        </td>
                                                        <td class="options text-right" style="vertical-align: middle; border: 0;" >
                                                            <a href="{{ route('walkin_cart.destroy', $item->id) }}" class="action" style="display: inline-block; margin-right: 10px;"><i class="fas fa-2x fa-trash-alt"></i></i></a>

                                                        </td>
                                                        <td class="text-center"  style="vertical-align: middle; border: 0;" >
                                                            <input type="submit" class="btn_1 btn" value="Update Item">
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
                                    {{-- <div class="col-sm-4 text-right mb-4">
                                        <input type="submit" class="btn_1 gray btn" form="cart_form" value="Update Cart">
                                    </div> --}}

                                </div>
                            <!-- /container -->

                                <div class="box_cart mb-4 mt-4">
                                    <div class="container">
                                        <div class="row justify-content-end">
                                                <div class="col-xl-4 col-lg-4 col-md-6">
                                                    <ul style="list-style-type: none;" class="text-left">

                                                        <li style="style:none;">
                                                            <h5><span>Total</span> Php {{ \Cart::session(auth()->id())->getTotal() }}</h5>
                                                        </li>
                                                    </ul>
                                                    <a href="{{ route('walkin.checkout') }}" class="btn_1 full-width cart">Proceed to Checkout</a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- /box_cart -->


                            @else
                                <div class="container margin_30" >
                                    <div class="row ">
                                        <div class="col-md-4 offset-md-5">
                                            {{-- <div id="confirm"> --}}

                                                <h2>Cart is Empty</h2>

                                            {{-- </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->

            </div>
        </div>

    @endsection

    @section('javascripts')


    @endsection

    @push('scripts')

       <script>
            var i = document.getElementById('quantity').value;
           $('table tbody').on('click','.inc', function () {
                var row = $(this).closest("tr");
                var data1 = row.find("td:eq(2) input[type='number']").val();

                if(data1>=0){
                    data1 ++;
                    row.find("td:eq(2) input[type='number']").val(data1);
                }

                //alert(data1);
            })

            $('table tbody').on('click','.dec', function () {
                var row = $(this).closest("tr");
                var data2 = row.find("td:eq(2) input[type='number']").val();
                if(data2 > 0 ){
                    data2 --;
                    row.find("td:eq(2) input[type='number']").val(data2);
                }

                //alert(data1);
            })

        </script>
    @endpush
