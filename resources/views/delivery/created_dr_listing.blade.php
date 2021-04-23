@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="{{ route('delivery')}}">Approved Orders</a></li>
            <li class="breadcrumb-item "><a href="{{route('delivery.created')}}">Created D.R. Listing</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Created D.R</li>

        </ol>

    </nav>
    <div class="container" style="width: 100%;">



        <div class="row text-center mt-5 mb-4">
            <div class="col">
                <h4>
                <strong><span class="text-primary">ProtectPlus</span></strong>
                <img src="{{asset('storage/'.setting('site.logo'))}}" alt="protect+" width="40" height="40" class="img-print">

                    <strong>INDUSTRIES CHEMICAL MANUFACTURING</strong>
                </h4>
                <h6><span class="text-address">32 A. Bonifacio Avenue Corner Dr.Alejos Street, La Loma, Quezon City</span></h6>

            </div>

        </div>
        <div class="row mb-4">



            <div class="col ">
                <table class="table table-bordered" style="height: 40px; min-width:100%;" >
                    <tbody >
                         <tr class="bg-navy">
                            <td class="align-middle p-2" colspan="3">
                            Order Number : <span>{{ $orders->order_number }}</span>

                                {{--  DISPLAY WALKIN IF YES  --}}
                                @if ($orders['is_walkin'] == 'yes')
                                    <span class=" float-right bg-danger" style="padding: 2px; border-radius: 5px;">{{ $orders['is_walkin'] ? 'Walk-In' : ''}}</span>
                                @else
                                <span class=" float-right bg-danger" style="display: none;">{{ $orders['is_walkin'] ? 'Walk-In' : ''}}</span>


                                @endif

                            </td>


                        </tr>
                        <tr>
                            <td class="align-middle p-2">{{ $orders['is_walkin'] ? 'Customer Name' : 'Distributor Name'}} : <span class="ml-3">{{ $orders['shipping_fullname']}}</span></td>
                            <td class="align-middle  p-2">Company : <span class="mr-3"></span></td>
                            <td class="align-middle p-2 text-right">Date : <span >
                            {{-- FORMAT DATE --}}
                                 @php
                                    $date_ordered = strtotime($orders->created_at);
                                    echo date('m-d-Y', $date_ordered);
                                @endphp
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle p-2" colspan="3"> Address : <span class="ml-3">{{ $orders['shipping_address']}}</span></td>
                        </tr>
                         <tr>
                            <td class="align-middle p-2">Contact # : <span class="ml-3"> {{ $orders['shipping_mobile']}} </span></td>
                            <td colspan="2" class="align-middle p-2">time<span></span> : </td>
                        </tr>
                    </tbody>
                </table>

            </div>



        </div>

        <div class="row mb-3">

            @php
                $fmt = new NumberFormatter( 'en_PHP', NumberFormatter::CURRENCY );
            @endphp

            <div class="col">


                <table class="table table-bordered mb-4">
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
                            <td id="tbl-qty"  style="width: 5%;" scope="row">{{ $item->pivot->quantity }}</td>
                            <td>
                                <div>
                                    {{ $item->name }}
                                </div>
                                <small>{{ $item->pivot->product_description }}</small></td>
                            <td id="tbl-boxes" style="width: 25%;"></td>

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
                <table class="table table-bordered">
                     <tr>
                            <td ><span>Prepared By :</span></td>
                            <td><span>Released By :</span></td>
                            <td><span>Checked By :</span></td>
                            <td><span>Received By :</span></td>
                        </tr>
                </table>

            </div>
        </div>
        {{-- <div class="row no-print" >

            <div class="col-md-12 no-print float-right">
                <a href="{{url('/prntpriview')}}" class="btnprn" >
                    <i class="fas fa-print fa-2x"></i> <span class="text-muted" >Print DR</span>
                </a>
            </div>
        </div> --}}
        <div class="col text-right no-print">
            <a href="{{route('delivery.created')}}" class="btn btn-primary">Back ></a>
        </div>

    </div>
@endsection

{{-- @section('javascripts')
    <script>

        $(document).ready(function(){
            $('.btnprn').printPage();
        });
    </script>
@endsection --}}
