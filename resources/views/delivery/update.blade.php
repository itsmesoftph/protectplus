@extends('layouts.dr')

@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>DR</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('delivery')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('delivery.created')}}">Created DR Listing</a></li>
            <li class="breadcrumb-item active">Update DR</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-12">
         <div class="card">
            <div class="card-header bg-navy d-flex flex-row align-items-center">
                <h3 class="card-title">Update DR - {{ $orders['order_number'] }}</h3>
                <div class="col text-right no-print">
                        <a href="{{route('delivery')}}" class="btn btn-primary float-right">Order Listing</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row text-center mt-5">
                    <div class="col">
                        <h4>PROTECTPLUS+ INDUSTRIES CHEMICAL MANUFACTURING</h4>

                    </div>

                </div>
                <div class="row mb-4">


                    <div class="col ">
                        <table class="table-bordered" style="height: 40px; min-width:100%;" >
                            <tbody >
                                <tr class="bg-navy">
                                    <td class="align-middle p-2" colspan="3">
                                        Order Number : <span>{{ $orders['order_number'] }}</span>
                                        <span class=" badge badge-warning float-right">{{ $orders['is_walkin'] ? 'Walk-In' : ''}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle p-2">Distributor's Name : <span class="ml-3">{{ $orders['shipping_fullname']}}</span></td>
                                    <td class="align-middle  p-2">Company : <span class="mr-3"></span></td>
                                    <td class="align-middle p-2 text-right">Date : <span >{{$orders->created_at}}</span></td>
                                </tr>
                                <tr>
                                    <td class="align-middle p-2" colspan="3"> Address : <span class="ml-3">{{ $orders['shipping_address']}}</span></td>
                                </tr>

                            </tbody>
                        </table>
                        <table class="table-bordered" style="height: 40px; min-width:100%;" >
                            <tbody style="border-top:none; border:none;">

                                <tr>
                                    <td class="align-middle p-2">Contact # : <span class="ml-3"> {{ $orders['shipping_mobile']}} </span></td>
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
                                <tr class="bg-navy ">
                                    <td class="align-middle p-2" colspan="5">Order Details</td>
                                </tr>
                                <tr>

                                    <th >Qty</th>
                                    <th >Particular</th>
                                    <th >No of Boxes</th>
                                    <th id="tbl-price">Price</th>
                                    <th id="text-right tbl-amount">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $orders->items as $item )
                                <tr >
                                    <td  id="tbl-qty"  style="width: 5%;">{{ $item->pivot->quantity }}</td>
                                    <td id="tbl-particular" style="width: 30%;" >
                                        <div>
                                            {{ $item->name }}
                                        </div>
                                        <small>{{ $item->pivot->product_description }}</small>
                                    </td>
                                    <td id="tbl-boxes" style="width: 25%;"></td>

                                    <td style="width: 15%;">{{ $fmt->formatCurrency($item->pivot->price,'PHP') }}</td>
                                    <td class="text-right " style="width: 15%;">
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


                    </div>
                </div>
                <div class="row no-print" >

                    <div class="col-md-6 ">

                        <div class="card">
                            <div class="card-header bg-gray" style="padding: 8px !important; color: #fff;">
                                :: STATUS
                            </div>
                            <div class="card-body">
                                <form action="{{ route('delivery.update',$orders['id'])}}" method="post" id="checkout-form" >
                                            <div class="form-group row">

                                                <div class="col-6">
                                                    <select class="form-control col mx-auto" name="status" id="sel1">

                                                        {{-- <option selected="selected">{{$orders['status']}}</option> --}}
                                                        <option value="dr_created">Create D.R</option>
                                                        <option value="decline">Decline Order</option>


                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    {{csrf_field()}}
                                                    <button type="submit" class="btn btn-success btn-block ml-2">Update</button>
                                                </div>

                                                <div class="col" style="padding-top: 6px;">
                                                    <a href="{{url('/delivery/print',$orders['id'])}}" class="float-right btnprn">
                                                        <i class="fas fa-print fa-2x"></i>
                                                    </a>
                                                </div>



                                            </div>


                                </form>
                            </div>
                        </div>


                    </div>
                    {{-- <div class="col-md-6 no-print mx-auto">
                        <a href="{{url('/delivery/print',$orders['id'])}}" class="float-right btnprn">
                            <i class="fas fa-print fa-2x"></i>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('javascripts')
    <script>

        $(document).ready(function(){
            $('.btnprn').printPage();
        });
    </script>
@endsection
