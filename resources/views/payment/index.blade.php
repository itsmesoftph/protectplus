@extends('layouts.payment')
@push('styles')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" media="print" href="{{ asset('css/print_media.css') }}" >
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}" >
@endpush
@section('content')

<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Payment</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item active">Approved DR Listing</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>


<div class="row mb-4">
    <div class="col-12">
                <div class="card">

                    <div class="card-header bg-navy">
                        DASHBOARD OVERVIEW

                    </div>

                    <div class="card-body">
                        {{-- SECOND ROW --}}
                        <div class="row">
                            <div class="col-md-2">
                            <!-- small box -->
                                <div class="small-box bg-white">
                                    <div class="inner">
                                    <h3>{{ $numberOfOrder }} </h3>
                                    <p>NO. OF ORDERS</p>‌
                                    </div>

                                    <div class="icon">
                                    <i class="fas fa-box"></i>
                                    </div>
                                    <a href="#" class="small-box-footer py-1"></i></a>
                                </div>

                            </div>
                            <div class="col-md-2">
                            <!-- small box -->
                                <div class="small-box bg-white">
                                        <div class="inner">
                                            <h3>{{ $numberOfApproved }}</h3>
                                            <p>‌NO. OF APPROVED</p>
                                        </div>

                                        <div class="icon">
                                            <i class="fas fa-box"></i>
                                        </div>
                                        <a href="#" class="small-box-footer py-2"></i></a>

                                </div>
                            </div>
                            <div class="col-md-2">
                            <!-- small box -->
                                <div class="small-box bg-white">
                                <div class="inner">

                                    <h3>{{ $numberOfDRcreated }}</h3>
                                    <p>‌NO. OF DR's</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-box"></i>
                                </div>
                                <a href="#" class="small-box-footer py-2"></i></a>

                                </div>
                            </div>
                            <div class="col-md-2">
                            <!-- small box -->
                                    <div class="small-box bg-white">
                                        <div class="inner">
                                            <h3>{{$numberOfPaidOrder}} </h3>
                                            <p>NO. OF PAID</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-box"></i>
                                        </div>
                                        <a href="#" class="small-box-footer py-2"></i></a>

                                    </div>
                            </div>

                            <div class="col-md-2">
                            <!-- small box -->
                                    <div class="small-box bg-white">
                                        <div class="inner">
                                            <h3>{{$numberOfReleasedOrder}} </h3>
                                            <p>NO. OF RELEASED</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-box"></i>
                                        </div>
                                        <a href="#" class="small-box-footer py-2"></i></a>

                                    </div>
                            </div>

                            <div class="col-md-2">
                            <!-- small box -->
                                    <div class="small-box bg-white">
                                        <div class="inner">
                                            <h3>{{$numberOfReceievedOrder}} </h3>
                                            <p>NO. OF RECEIVED</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-box"></i>
                                        </div>
                                        <a href="#" class="small-box-footer py-2"></i></a>

                                    </div>
                            </div>
                        </div>
                        {{-- end 2nd row --}}

                        {{-- THIRD ROW --}}
                        <div class="row">

                            <div class="col-md-3">
                            <!-- small box -->
                                <div class="small-box bg-red">
                                        <div class="inner">
                                            <h3>{{ $numberOfunpproved }}</h3>
                                            <p>‌# OF UNAPPROVED ORDERS</p>
                                        </div>

                                        <div class="icon">
                                            <i class="fas fa-people-carry"></i>
                                        </div>
                                        <a href="#" class="small-box-footer py-2"></i></a>

                                </div>
                            </div>
                            <div class="col-md-3">
                            <!-- small box -->
                                <div class="small-box bg-red">
                                <div class="inner">

                                    <h3>{{ $numberOf_ForDrCreation }} </h3>
                                    <p>‌# OF PENDING DR CREATION</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-people-carry"></i>
                                </div>
                                <a href="#" class="small-box-footer py-2"></i></a>

                                </div>
                            </div>
                            <div class="col-md-2">
                            <!-- small box -->
                                    <div class="small-box bg-red">
                                        <div class="inner">
                                            <h3>{{ $numberOf_AccountReceivable }} </h3>
                                            <p># OF ACCOUNT RECEIVABLES</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-people-carry"></i>
                                        </div>
                                        <a href="#" class="small-box-footer py-2"></i></a>

                                    </div>
                            </div>

                            <div class="col-md-2">
                            <!-- small box -->
                                    <div class="small-box bg-red">
                                        <div class="inner">
                                            <h3>{{ $numberOf_PendingRelease }} </h3>
                                            <p># OF ORDERS FOR RELEASING</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-people-carry"></i>
                                        </div>
                                        <a href="#" class="small-box-footer py-2"></i></a>

                                    </div>
                            </div>

                            <div class="col-md-2">
                            <!-- small box -->
                                    <div class="small-box bg-red">
                                        <div class="inner">
                                            <h3>{{ $numberOf_InTransit }}</h3>
                                            <p># OF IN-TRANSIT</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-people-carry"></i>
                                        </div>
                                        <a href="#" class="small-box-footer py-2"></i></a>

                                    </div>
                            </div>
                        </div>
                        {{-- end 3rd row --}}

                    </div>


                </div>
        </div>
</div>

<div class="row">
    <div class="col-12">
          <div class="card-header bg-navy d-flex flex-row align-items-center">
                <h3 class="card-title">Approved DR </h3></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="users" class="table table-bordered table-striped">
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
            </div>
    </div>




</div>

@endsection

@section('javascripts')


    <script type="text/javascript">

    function change( val ){
                var btn = document.getElementById("dashboard_btn");

                if (btn.value == "View Dashboard") {
                    btn.value = "Hide Dashboard";
                    btn.innerHTML = "Hide Dashboard";
                }
                else {
                    btn.value = "View Dashboard";
                    btn.innerHTML = "View Dashboard";
                }
    }
    </script>

@endsection
