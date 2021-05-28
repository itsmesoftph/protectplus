@extends('layouts.shop')

@section('content')
    <div class="container" style="width: 100%;">



        <div class="row text-center mt-5 mb-2">
            {{-- <div class="col">
                <h4>PROTECTPLUS+ INDUSTRIES CHEMICAL MANUFACTURING</h4>

            </div> --}}
            <div class="col text-right">
                <a href="{{route('distro')}}" class="btn btn-primary">My order listing</a>
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
                            <td colspan="5">Mode of Payment :
                            @if ($orders->payment_method == 'cash_on_delivery')
                                <span class="ml-3"><strong>Cash On Delivery</strong></span>
                            @elseif ($orders->payment_method == 'over_the_counter')
                                <span class="ml-3"><strong>Over The Counter</strong></span>
                            @elseif ($orders->payment_method == 'bank_transfer')
                                <span class="ml-3"><strong>Bank Transfer</strong></span>
                            @elseif ($orders->payment_method == 'gcash')
                                <span class="ml-3"><strong>GCASH</strong></span>
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
        <div class="row " >

            <div class="col ">
                <form action="{{ route('distro.update',$orders['id'])}}" method="post" id="checkout-form">
                        <div class="col-xs-3">
                            <div class="form-group row">
                                <h4 for="payment_status" class="col-xs-12 col-md-1 mt-2">Status </h4>
                                <select class="form-control col-xs-12 col-md-3 " name="status" id="sel1"
                                {{  ($orders['is_paid'] === 'no' || $orders['status'] === 'receive') ? 'disabled' : 'enabled'}}>

                                    <option selected="selected">{{$orders['status']}}</option>
                                    <option value="receive">receive</option>



                                </select>
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-success ml-2" {{  ($orders['is_paid'] === 'no' || $orders['status'] === 'receive') ? 'disabled' : 'enabled'}}>
                                Confirm
                                </button>
                            </div>
                        </div>


                </form>
            </div>
        </div>


    </div>
@endsection
