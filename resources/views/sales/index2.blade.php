@extends('layouts.app')

@section('content')
<div class="container table-responsive">

                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('Hello '. Auth::user()->name . ',  You are logged in!') }} --}}

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "  aria-current="page">Order Listing</li>
                            {{-- <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('sales') }}">Order Listing</a></li> --}}

                        </ol>

                    </nav>

                    <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Toggle first element</a>

                    <div class="col">
                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="card card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                        </div>
                        </div>
                    </div>


                        <table class="table table-striped ">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Order No.</th>
                                    <th>Customer Name</th>
                                    <th>Status</th>
                                    <th>Number of Item(s)</th>
                                    <th>Grand Total</th>
                                    <th>Payment Status</th>
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
                                        <td><a href="{{ route('sales.update',$orderItem->id) }}" class="btn btn-info">Update</a></td>
                                    </tr>

                    @endforeach


                                </tbody>

                        </table>
                        {{ $orders->links() }}




</div>
@endsection
