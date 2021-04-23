@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="{{ route('delivery')}}">Approved Orders</a></li>
            <li class="breadcrumb-item active" aria-current="page">Created D.R. Listing</li>

        </ol>

    </nav>
<div class="container">
    <div class="row table-responsive">


                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('Hello '. Auth::user()->name . ',  You are logged in!') }} --}}

                        <table class="table table-bordered mt-5">
                            <thead class="thead-inverse">
                                <tr>
                                    <td colspan="5" class="bg-navy">GENERATED D.R LIST</td>
                                </tr>
                                <tr>
                                    <th class="text-center">Order No.</th>
                                    <th class="text-center">Customer Name</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Date DR Created</th>
                                    {{-- <th>Number of Item(s)</th>
                                    <th>Grand Total</th>
                                    <th>Is Paid</th> --}}
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                    @foreach ( $createdDr as $dr )

                                    <tr>
                                        <td class="text-center" scope="row">{{ $dr->order_number }}</td>
                                        <td class="text-center" scope="row">{{ $dr->billing_fullname }}</td>
                                        <td class="text-center">{{ $dr->status }}</td>
                                        <td class="text-center">
                                             @php
                                                $date_dr_created = strtotime($dr->dr_at);
                                                echo date('m-d-Y', $date_dr_created);
                                            @endphp
                                        </td>
                                        {{-- <td>{{ $dr->status }}</td>
                                        <td>{{ $dr->item_count }}</td>
                                        @php
                                            $fmt = new NumberFormatter( 'en_PHP', NumberFormatter::CURRENCY );
                                        @endphp
                                        <td>{{ $fmt->formatCurrency($dr->grand_total,'PHP') }}</td>
                                        <td>{{ $dr->is_paid  }} </td> --}}
                                        <td class="text-center"><a href="{{ route('delivery.list',$dr->id) }}" class="btn btn-success">View DR</a></td>
                                        {{-- <td class="text-center">
                                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">View D.R</button>
                                        </td> --}}

                                    </tr>

                    @endforeach


                                </tbody>

                        </table>
                        {{-- {{ $createdDr->links() }} --}}




    </div>

                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                    {{-- START CONTENT --}}
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
                                                Order Number : </span>
                                                <span class=" float-right bg-danger" style="padding: 2px; border-radius: 5px;"></span>

                                                </td>


                                            </tr>
                                            <tr>
                                                <td class="align-middle p-2"></span></td>
                                                <td class="align-middle  p-2">Company : <span class="mr-3"></span></td>
                                                <td class="align-middle p-2 text-right">Date : <span >
                                                {{-- FORMAT DATE --}}
                                                    {{-- @php
                                                        $date_ordered = strtotime($orders->created_at);
                                                        echo date('m-d-Y', $date_ordered);
                                                    @endphp --}}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle p-2" colspan="3"> Address : <span class="ml-3"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle p-2">Contact # : <span class="ml-3">  </span></td>
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
                                            {{-- @foreach ( $orders->items as $item ) --}}
                                            <tr>
                                                <td id="tbl-qty"  style="width: 5%;" scope="row">/td>
                                                <td>
                                                    <div>
                                                        {{-- {{ $item->name }} --}}
                                                    </div>
                                                    {{-- <small>{{ $item->pivot->product_description }}</small></td> --}}
                                                <td id="tbl-boxes" style="width: 25%;"></td>

                                                <td>
                                                    {{-- {{ $fmt->formatCurrency($item->pivot->price,'PHP') }} --}}
                                                </td>
                                                <td class="text-right">
                                                    {{-- {{ $fmt->formatCurrency(($item->pivot->price * $item->pivot->quantity),'PHP')}} --}}
                                                </td>
                                            </tr>
                                            {{-- @endforeach --}}
                                            <tr>
                                                <td colspan="4" class="text-right align-middle"><h5>TOTAL</h5></td>
                                                <td  class="text-right">
                                                    {{-- <strong class="text-danger">{{ $fmt->formatCurrency($orders['grand_total'],'PHP') }}</strong> --}}
                                                </td>

                                            </tr>
                                            <tr>
                                                <td colspan="4">Mode of Payment :
                                                    {{-- @if ($orders->payment_method == 'cash_on_delivery')
                                                        <span class="ml-3"><strong>Cash On Delivery</strong></span>
                                                    @elseif($orders->payment_method == 'over_the_counter')
                                                        <span class="ml-3"><strong>Over The Counter</strong></span>
                                                    @elseif ($orders->payment_method == 'bank_transfer')
                                                        <span class="ml-3"><strong>Bank Transfer</strong></span>
                                                    @elseif ($orders->payment_method == 'gcash')
                                                        <span class="ml-3"><strong>GCASH</strong></span>
                                                    @endif --}}

                                                </td>
                                                <td>
                                                    {{-- @if ($orders->payment_url)
                                                        <a href="{{ asset('storage/'.$orders->payment_url)}}" target="_blank">
                                                            <img src="{{ asset('storage/'.$orders->payment_url)}}" width="30" height="30">
                                                        </a>
                                                    @endif --}}

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


                        </div>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>

</div>
@endsection
