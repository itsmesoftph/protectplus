@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item "  aria-current="page"><a href="{{ route('inventory') }}">Production Oveview</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Production Overview</li>

        </ol>

    </nav>
    <div class="row justify-content-center mt-4">
            <div class="col-auto">

                    <table class="table table-striped table-bordered mb-4 ">
                        <thead>
                        <tr class="bg-gray">
                            <td colspan="7">RAW MATERIAL ESTIMATES</td>
                        </tr>
                            <tr>

                                <th>Name</th>
                                <th>Date</th>
                                <th>Quantity (Liters)</th>
                                <th>Quantity With Specific Gravity (Liters)</th>
                                <th>Scent</th>
                                <th>Water</th>
                                <th>Remaining Material (Liters)</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ( $estimates as $estimate )
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
                                <td>{{ $estimate->cur_val}}</td>
                            </tr>
                              @endforeach

                            <tr></tr>
                        </tbody>
                    </table>


                     @php
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
                                            {{-- <i class="fas fa-plus-circle text-center text-success fa-2x text-center "
                                            data-toggle="tooltip" data-placement="top" title="Add New Product">


                                            </i> --}}
                                            Add New Product
                                        </a>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="align-middle" >Name</th>
                                    <th class="align-middle" >Product Code</th>
                                    <th class="align-middle" >Description</th>
                                    <th class="align-middle"> Available</th>
                                    <th class="align-middle" >Image</th>
                                    <th class="align-middle" >Price</th>
                                    <th class="align-middle" colspan="2" class="text-center">Add Quantity</th>
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

                                         {{-- return $fmt->formatCurrency($value, 'PHP'); --}}
                                        <td class="align-middle">{{ $fmt->formatCurrency($product->price,'PHP') }}</td>
                                        <td class="align-middle">
                                        @php

                                            $pc_code = Str::substr($product->product_code , 0,1);
                                        @endphp
                                             <form action="{{ route('quantity.update', $product->id) }}">
                                                <input name="quantity" id="quantity" type="number" style="width: 100px;" class="mb-2">
                                                <input class="btn btn-primary" type="submit" value="save">
                                                <input type="hidden" name="product_type" value="{{$pc_code}}">
                                            </form>

                                        </td>


                                    </tr>

                                     @endforeach


                                </tbody>

                        </table>
                        {{ $products->links() }}

            </div>

    </div>

</div>
@endsection
