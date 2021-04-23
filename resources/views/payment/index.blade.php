@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item "><a href="{{ route('delivery')}}">Approved Orders</a></li>
            <li class="breadcrumb-item "><a href="{{route('delivery.created')}}">Created D.R. Listing</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Payment</li>

        </ol>

    </nav>
<div class="container table-responsive">

                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('Hello '. Auth::user()->name . ',  You are logged in!') }} --}}

                        <table class="table table-striped table-inverse ">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Order No.</th>
                                    <th>Customer Name</th>
                                    <th>Status</th>
                                    <th>Number of Item(s)</th>
                                    <th>Grand Total</th>
                                    <th>Is Paid</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                    @foreach ( $orders as $orderItem )

                                    <tr>
                                        <td scope="row">{{ $orderItem->order_number }}</td>
                                        <td scope="row">{{ $orderItem->billing_fullname }}</td>

                                        <td>{{ $orderItem->status }}</td>
                                        <td>{{ $orderItem->item_count }}</td>
                                        @php
                                            $fmt = new NumberFormatter( 'en_PHP', NumberFormatter::CURRENCY );
                                        @endphp
                                         {{-- return $fmt->formatCurrency($value, 'PHP'); --}}
                                        <td>{{ $fmt->formatCurrency($orderItem->grand_total,'PHP') }}</td>
                                        <td>
                                            {{ $orderItem->is_paid }}
                                        </td>
                                        <td><a href="{{ route('payment.update',$orderItem->id) }}" class="btn btn-info">Update</a></td>
                                    </tr>

                    @endforeach


                                </tbody>

                        </table>
                        {{ $orders->links() }}




</div>
@endsection
