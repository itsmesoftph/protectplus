@extends('layouts.sales')

@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Orders</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('sales')}}">Home</a></li>
            <li class="breadcrumb-item active">Order Details</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
    
  <div class="row">
    <div class="col-12">
         <div class="card">
            <div class="card-header bg-navy d-flex flex-row align-items-center">
                <h3 class="card-title">Order Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <div class="row text-center mt-5">
                    <div class="col">
                        <h4>PROTECTPLUS+ INDUSTRIES CHEMICAL MANUFACTURING</h4>

                    </div>
                    <div class="col text-right">
                        <a href="{{route('sales')}}" class="btn btn-primary">Order Listing</a>
                    </div>
                </div>

                <div class="row mb-4 mt-4">

                    <div class="col">
                        <table class="table table-bordered">

                                <tbody>
                                    <tr>
                                        <td class="align-middle p-2 bg-gray" colspan="5">Product Inventory Details</td>
                                    </tr>
                                @foreach ( $products as $item )
                                    <tr>
                                        <td > <span class="text-muted">Product Name :</span> {{ $item->name }}</td>
                                        <td ><span class="text-muted">In Stock :</span> {{ $item->quantity}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                        </table>

                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col ">
                        <table class="table-bordered" style="height: 40px; min-width:100%;" >
                            <tbody >
                                <tr class="bg-navy">
                                    <td class="align-middle p-2" colspan="3">Order Number : <span>{{ $orders['order_number'] }}</span></td>
                                </tr>
                                <tr>
                                    <td class="align-middle p-2">Distributor Name : <span class="ml-3">{{ $orders['shipping_fullname']}}</span></td>
                                    <td class="align-middle  p-2">Company : <span class="mr-3"></span></td>

                                    @php
                                        $createdAt = strtotime($orders->created_at)
                                    @endphp
                                    <td class="align-middle p-2 text-right">Date : <span >{{date('m-d-y', $createdAt)}}</span></td>
                                </tr>
                                <tr>
                                    <td class="align-middle p-2" colspan="3"> Address : <span class="ml-3">{{ $orders['shipping_address']}}</span></td>
                                </tr>

                            </tbody>
                        </table>
                        <table class="table-bordered" style="height: 40px; min-width:100%;" >
                            <tbody style="border-top:none; border:none;">

                                <tr>
                                    <td class="align-middle p-2">Contact # : <span class="ml-3"> {{ $orders['shipping_phone']}} </span></td>
                                    {{-- <td class="align-middle  p-2">Distributor : <span class="mr-4"></span></td> --}}
                                    <td class="align-middle p-2">time<span></span> : </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mb-3">
                    {{-- {{$orders}} --}}

                    @php
                        $fmt = new NumberFormatter( 'en_PHP', NumberFormatter::CURRENCY );
                    @endphp


                    <div class="col">


                        <table class="table table-bordered">
                        <hr>
                            <thead>
                                <tr class="bg-navy">
                                    <td class="align-middle p-2" colspan="5">Order Details</td>
                                </tr>
                                <tr>

                                    <th>Qty</th>
                                    <th>Particular</th>
                                    <th>No of Boxes</th>
                                    <th>Price</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $orders->items as $item )
                                <tr>
                                    <td scope="row">{{ $item->pivot->quantity }}</td>
                                    <td>
                                        <div>
                                            {{ $item->name }}
                                        </div>
                                        <small>{{ $item->pivot->product_description }}</small></td>
                                    <td></td>

                                    <td>{{ $fmt->formatCurrency($item->pivot->price,'PHP') }}</td>
                                    <td class="text-right">
                                        {{ $fmt->formatCurrency(($item->pivot->price * $item->pivot->quantity),'PHP')}}
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="text-right align-middle"><h5>TOTAL</h5></td>
                                    <td  class="text-right"><strong class="text-danger">{{ $fmt->formatCurrency($orders['grand_total'],'PHP') }}</strong></td>

                                </tr>
                                <tr>
                                    <td colspan="4">Mode of Payment :
                                        @if ($orders->payment_method == 'cash_on_delivery')
                                            <span class="ml-3"><strong>Cash On Delivery</strong></span>
                                        @elseif($orders->payment_method == 'over_the_counter')
                                            <span class="ml-3"><strong>Over The Counter</strong></span>
                                        @elseif ($orders->payment_method == 'bank_transfer')
                                            <span class="ml-3"><strong>Bank Transfer</strong></span>
                                        @elseif ($orders->payment_method == 'gcash')
                                            <span class="ml-3"><strong>GCASH</strong></span>
                                        @endif

                                    </td>
                                    <td>
                                        @if ($orders->payment_url)
                                            <a href="{{ asset('storage/'.$orders->payment_url)}}" target="_blank">
                                                <img src="{{ asset('storage/'.$orders->payment_url)}}" width="30" height="30">
                                            </a>
                                        @endif

                                    </td>
                                </tr>

                            </tbody>

                        </table>
                        {{-- <div class="mb-3">
                            <div class="col-xs-12">
                                <div class="form-group">
                                <label for="payment_status">Status</label>
                                    <select class="form-control" name="status" id="sel1">

                                        <option selected="selected">{{$orders['status']}}</option>
                                        <option value="completed">completed</option>
                                        <option value="decline">decline</option>


                                    </select>
                                </div>
                            </div>

                        </div> --}}


                    </div>
                </div>
                <div class="row no-print" >

                    <div class="col ">
                        <form action="{{ route('sales.order.update',$orders['id'])}}" method="post" id="checkout-form">
                                <div class="col-xs-3">
                                    <div class="form-group row">
                                    <label for="payment_status" class="col-xs-12 col-md-1">Status</label>
                                    <select class="form-control col-xs-12 col-md-3 " name="status" id="sel1">

                                        {{-- <option selected="selected">{{$orders['status']}}</option> --}}
                                        <option value="sales_approved">Approve Order</option>
                                        <option value="decline">Decline Order</option>


                                    </select>
                                    <input type="hidden" name="process_stage" value="sales"/>
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-success ml-2">Update</button>
                                    </div>
                                </div>


                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
