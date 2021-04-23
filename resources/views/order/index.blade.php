@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{ route('home')}}">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Orders</li>

                    </ol>

                </nav>
<div class="container table-responsive">



                 {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('Hello '. Auth::user()->name . ',  You are logged in!') }} --}}



                <div class="row mt-4">
                     <table class="table table-bordered table-striped" style="width: 100%;">
                            <thead class="thead-inverse bg-navy">
                                <tr>
                                    <td colspan="7" class="bg-navy"> TO RELEASE ORDERS </td>
                                </tr>
                                <tr>
                                    <th>Date Ordered</th>
                                    <th>Order No.</th>
                                    <th>Status</th>
                                    <th>Number of Item(s)</th>
                                    <th>Grand Total</th>
                                    <th>Payment Status</th>
                                </tr>
                                </thead>
                                <tbody>

                    @foreach ( $orders as $orderItem )

                                    <tr>
                                    <td>
                                         @php
                                          $timestamp = strtotime($orderItem->created_at);
                                          echo date('m-d-Y', $timestamp);
                                        @endphp

                                    </td>


                                        <td scope="row">{{ $orderItem->order_number }}</td>

                                        <td>{{ $orderItem->status }}</td>
                                        <td>{{ $orderItem->item_count }}</td>
                                        @php
                                            $fmt = new NumberFormatter( 'en_PHP', NumberFormatter::CURRENCY );
                                        @endphp
                                        <td>{{ $fmt->formatCurrency($orderItem->grand_total,'PHP') }}</td>
                                        <td>

                                           {{$orderItem->is_paid}}

                                        </td>
                                    </tr>

                    @endforeach


                                </tbody>

                        </table>
                        {{ $orders->links() }}
                </div>
                {{-- END OF ROW --}}
                {{-- to receive orders --}}
                <div class="row mt-4">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td colspan="6" class="bg-green"> TO RECEIVE ORDERS </td>
                            </tr>
                            <tr>
                                  <th>Date Ordered</th>
                                    <th>Order No.</th>
                                    <th>Number of Item(s)</th>
                                    <th>Grand Total</th>
                                    <th>Payment Status</th>
                                    <th class="text-center">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach ( $releasedOrders as $releasedOrder )


                            <tr>
                                <td scope="row">
                                    @php
                                        $timestamp = strtotime($releasedOrder->created_at);
                                        echo date('m-d-Y', $timestamp);
                                    @endphp
                                </td>
                                <td>{{ $releasedOrder->order_number}}</td>
                                <td>{{ $releasedOrder->item_count }}</td>
                                   @php
                                        $fmt = new NumberFormatter( 'en_PHP', NumberFormatter::CURRENCY );
                                    @endphp
                                <td>{{ $fmt->formatCurrency($releasedOrder->grand_total,'PHP') }}</td>
                                <td>{{$releasedOrder->is_paid}}</td>
                                <td class="text-center">

                                    <form class="receiveItems" action="{{ route('distro.update',$releasedOrder->id) }}" method="post" id="checkout-form">


                                        <input type="hidden" name="status" value="received">
                                            @method('POST')
                                            {{ csrf_field() }}
                                        <button type="submit" class="btn btn-success ml-2" {{  ($releasedOrder->is_paid === 'no' || $releasedOrder->status === 'receive') ? 'disabled' : 'enabled' }} >
                                        Receive Item/s
                                        </button>

                                    </form>

                                </td>

                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>


</div>
@endsection

@section('javascripts')




    <script>
        $(".receiveItems").on("submit", function(){
            return confirm("Are you sure?");
        });
    </script>
@endsection

