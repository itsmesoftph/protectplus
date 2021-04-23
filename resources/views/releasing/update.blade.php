@extends('layouts.app')

@section('content')
    <div class="container" style="width: 100%;">



        <div class="row text-center mt-5">
            <div class="col">
                <h4>PROTECTPLUS+ INDUSTRIES CHEMICAL MANUFACTURING</h4>

            </div>
            <div class="col text-right no-print">
                <a href="{{route('releasing')}}" class="btn btn-primary">Order Listing</a>
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
                            <td class="align-middle p-2">Client Name : <span class="ml-3">{{ $orders['shipping_fullname']}}</span></td>
                            <td class="align-middle  p-2">Company : <span class="mr-3"></span></td>
                            <td class="align-middle p-2">Date : <span class="mr-3"></span></td>
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
                            <td class="align-middle  p-2">Distributor : <span class="mr-4"></span></td>
                            <td class="align-middle p-2">time<span></span> : </td>
                        </tr>
                    </tbody>
                </table>
            </div>



        </div>

        <div class="row">
            {{-- {{$orders}} --}}

            @php
                $fmt = new NumberFormatter( 'en_PHP', NumberFormatter::CURRENCY );
            @endphp

            <div class="col">
                <table class="table table-bordered">
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
                <form action="{{ route('releasing.update',$orders['id'])}}" method="post" id="checkout-form">
                        <div class="col-xs-3">
                            <div class="form-group row">
                            <label for="payment_status" class="col-xs-12 col-md-1">Status</label>
                            <select class="form-control col-xs-12 col-md-3 " name="status" id="sel1">

                                {{-- <option selected="selected">{{$orders['status']}}</option> --}}
                                <option value="released" selected="selected">released</option>
                                <option value="decline">decline</option>


                            </select>
                             {{csrf_field()}}
                            <button type="submit" class="btn btn-success ml-2">Update</button>
                            </div>
                        </div>


                </form>
            </div>
        </div>


    </div>
@endsection
