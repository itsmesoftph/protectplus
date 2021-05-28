@extends('layouts.production')
@push('styles')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" media="print" href="{{ asset('css/print_media.css') }}" >
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}" >
@endpush
@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Payment</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{-- <li class="breadcrumb-item "><a href="{{route('payment')}}">Order Listing</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Production Overview</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>


    <div class="row ">
            <div class="col-12">
                <div class="card px-2 py-2  mb-4">
                    <div class="card-header bg-navy">
                        ISOPROPYL ALCOHOL DETAILS
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered mb-4 ">
                            <thead>
                            <tr class="bg-gray">
                                <td colspan="8">ISOPROPYL RAW MATERIALS ESTIMATES</td>
                            </tr>
                                <tr>

                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Quantity (Liters)</th>
                                    <th>Quantity With Specific Gravity (Liters)</th>
                                    <th>Scent</th>
                                    <th>Water</th>
                                    <th>Approximate Output (Liters) </th>
                                    <th>Remaining Materials (Liters)</th>


                                </tr>
                            </thead>
                            <tbody>
                            @foreach ( $isoEstimates as $estimate )
                                    @php
                                        $createdAt = strtotime($estimate->created_at)
                                    @endphp

                                <tr>
                                    <td scope="row">{{$estimate->mat_name}}</td>
                                    <td>{{date('m-d-y', $createdAt)}}</td>
                                    <td>{{$estimate->mat_value}}</td>
                                    <td>{{$estimate->mat_value_sg}}</td>
                                    <td scope="row">{{$estimate->mat_scent}}</td>
                                    <td>{{$estimate->mat_water}}</td>
                                    <td>{{ $estimate->total_liters }}</td>
                                    <td >{{ $estimate->cur_val}}</td>

                                </tr>

                                @endforeach

                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td class="bg-green" colspan="3">Isopropyl Computation Reference </td>
                                </tr>
                                <tr>
                                    <th>Remaining Material (Liters)</th>
                                    <th>Approximate Output (pcs)</th>
                                    <th>Product Capacity (pcs)

                                </tr>
                            </thead>
                            <tbody>
                            @foreach ( $isoEstimates as $estimate )
                                <td id="total_liters" class="bg-navy">{{$estimate->cur_val}}</td>
                                    <td  id="product_quantity">0</td>
                                    <td>
                                        <select class="capacity_value" id="capacity_value">
                                                <option value="excluded" selected="selected">Select Product Here</option>
                                                <option value="3.78">3.78L</option>
                                                <option value="3.2">3.2L</option>
                                                <option value="1">1L</option>
                                                <option value=".5">500ml</option>
                                                <option value=".25">250ml</option>
                                                <option value=".1">100ml</option>
                                        </select>
                                    </td>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card px-2 py-2 mb-4">

                    <div class="card-header bg-navy">
                        ETHYL ALCOHOL DETAILS
                    </div>
                    <div class="card-body">
                        {{-- ETHYL ALCOHOL --}}
                        <table class="table table-striped table-bordered mb-4 ">
                            <thead>
                            <tr class="bg-gray">
                                <td colspan="8">ETHYL RAW MATERIALS ESTIMATES</td>
                            </tr>
                                <tr>

                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Quantity (Liters)</th>
                                    <th>Quantity With Specific Gravity (Liters)</th>
                                    <th>Scent</th>
                                    <th>Water</th>
                                    <th>Approximate Output (Liters) </th>
                                    <th>Remaining Materials (Liters)</th>


                                </tr>
                            </thead>
                            <tbody>
                            @foreach ( $ethylEstimates as $ethyl_estimate )
                                    @php
                                        $createdAt = strtotime($ethyl_estimate->created_at)
                                    @endphp

                                <tr>
                                    <td scope="row">{{$ethyl_estimate->mat_name}}</td>
                                    <td>{{date('m-d-y', $createdAt)}}</td>
                                    <td>{{$ethyl_estimate->mat_value}}</td>
                                    <td>{{$ethyl_estimate->mat_value_sg}}</td>
                                    <td scope="row">{{$ethyl_estimate->mat_scent}}</td>
                                    <td>{{$ethyl_estimate->mat_water}}</td>
                                    <td>{{ $ethyl_estimate->total_liters }}</td>
                                    <td >{{ $ethyl_estimate->cur_val}}</td>

                                </tr>

                                @endforeach

                            </tbody>
                        </table>

                        {{-- ETHYL ALCOHOL CONVERSION --}}
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td class="bg-red" colspan="3">Ethyl Computation Reference </td>
                                </tr>
                                <tr>
                                    <th>Remaining Material (Liters)</th>
                                    <th>Approximate Output (pcs)</th>
                                    <th >Product Capacity (Liters)

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $ethylEstimates as $ethyl_estimate )
                                    <td id="total_liters" class="bg-navy">{{$ethyl_estimate->cur_val}}</td>
                                    <td  id="product_quantity">0</td>
                                    <td>
                                        <select class="capacity_value" id="capacity_value">
                                                <option value="excluded" selected="selected">Select Product Here</option>
                                                <option value="3.78">3.78L</option>
                                                <option value="3.2">3.2L</option>
                                                <option value="1">1L</option>
                                                <option value=".5">500ml</option>
                                                <option value=".25">250ml</option>
                                                <option value=".1">100ml</option>
                                        </select>
                                    </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- /.card-body --}}
                </div>

                {{-- @php
                    $fmt = new NumberFormatter( 'en_PHP', NumberFormatter::CURRENCY );
                @endphp
                    <table class="table  table-bordered table-striped table-inverse table-responsive" style="width: 100%;">
                        <thead class="thead-inverse">
                            <tr>
                                <td colspan="5" class=" align-middle bg-navy">
                                    :: INVENTORY DETAILS
                                </td>
                                    <th colspan="5" class=" align-middle text-center bg-navy">
                                    <a href="{{ route('production.add') }}" class="btn btn-primary">

                                        Add New Product
                                    </a>
                                </th>
                            </tr>
                            <tr>
                                <th class="align-middle" >Name</th>
                                <th class="align-middle" >Product Code</th>
                                <th class="align-middle" >Description</th>
                                <th class="align-middle"> Available (pcs)</th>
                                <th class="align-middle" >Image</th>
                                <th class="align-middle" >Price</th>
                                <th class="align-middle" colspan="2" class="text-center">Add Quantity (pcs)</th>
                            </tr>
                        </thead>
                            <tbody>

                                @foreach ( $products as $product )

                                <tr>
                                    <td scope="row" class="align-middle">{{ $product->name }}</td>
                                        <td scope="row" class="align-middle">{{ $product->product_code }}</td>
                                    <td scope="row" class="align-middle">{{ $product->description }}</td>

                                    <td class="align-middle">{{ $product->quantity }}</td>
                                    <td class="align-middle"><img src="{{asset('storage/'.$product->img_url)}}" style="width:100px; height:100px;"></td>

                                    <td class="align-middle">{{ $fmt->formatCurrency($product->price,'PHP') }}</td>
                                    <td class="align-middle">
                                    @php

                                        $pc_code = Str::substr($product->product_code , 0,1);
                                    @endphp
                                            <form action="{{ route('quantity.update', $product->id) }}">
                                            <input name="quantity" id="quantity" type="number" style="width: 100px;" class="mb-2" >

                                            <br>
                                            <input class="btn btn-primary" type="submit" id="btn-save" value="save" >
                                            <input type="hidden" name="product_type" value="{{$pc_code}}">
                                            <input type="hidden" name="capacity" id="capacity" value="{{$product->product_capacity}}">
                                        </form>

                                    </td>


                                </tr>

                                    @endforeach


                            </tbody>

                    </table>
                    {{ $products->links() }}
 --}}

            </div>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-navy d-flex flex-row align-items-center">
                    <h3 class="card-title">Inventory Details</h3>
                    <div class="col text-right">
                        <a href="{{ route('production.add') }}" class="btn btn-primary">  Add New Product</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                @php
                    $fmt = new NumberFormatter( 'en_PHP', NumberFormatter::CURRENCY );
                @endphp
                    <table id="users" class="table table-bordered table-striped">
                        <thead >

                            <tr>
                                <th class="align-middle text-center" >Name</th>
                                <th class="align-middle text-center" >Product Code</th>
                                <th class="align-middle text-center" >Description</th>
                                <th class="align-middle text-center"> Available (pcs)</th>
                                <th class="align-middle text-center" >Image</th>
                                <th class="align-middle text-center" >Price</th>
                                <th class="align-middle text-center" class="text-center">Add Quantity (pcs)</th>
                            </tr>
                        </thead>
                            <tbody>

                                @foreach ( $products as $product )

                                <tr>
                                    <td scope="row" class="align-middle text-center">{{ $product->name }}</td>
                                        <td scope="row" class="align-middle text-center">{{ $product->product_code }}</td>
                                    <td scope="row" class="align-middle text-center">{{ $product->description }}</td>

                                    <td class="align-middle text-center">{{ $product->quantity }}</td>
                                    <td class="align-middle text-center"><img src="{{asset('storage/'.$product->img_url)}}" style="width:100px; height:100px;"></td>

                                    <td class="align-middle text-center">{{ $fmt->formatCurrency($product->price,'Php') }}</td>
                                    <td class="align-middle text-center">
                                    @php

                                        $pc_code = Str::substr($product->product_code , 0,1);
                                    @endphp
                                            <form action="{{ route('quantity.update', $product->id) }}">
                                            <input name="quantity" id="quantity" type="number" style="width: 100px; display: inline-block;" class="mb-2" >
                                            <input class="btn btn-primary ml-2" type="submit" id="btn-save" value="save" style="display: inline-block;">
                                            <input type="hidden" name="product_type" value="{{$pc_code}}">
                                            <input type="hidden" name="capacity" id="capacity" value="{{$product->product_capacity}}">
                                        </form>

                                    </td>


                                </tr>

                                    @endforeach


                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <script>




        function auto_calculate(val){

                var total_litters = $(this).parent().parent().find("#total_liters").text();
                var capacityObj =  document.getElementById('capacity').value;
                var quantityObj =  document.getElementById('quantity').value;


                document.getElementById('total_liters').firstChild.data = Number(total_litters = quantityObj * quantityObj).toFixed(0);


        }


         $(".capacity_value").change(function() {

                      var total_liters = $(this).parent().parent().find("#total_liters").text();


                      document.getElementById('product_quantity').firstChild.data = Number(total_liters = $(this).parent().parent().find("#total_liters").text() / this.value).toFixed(0);

                });



    </script>
@endsection
