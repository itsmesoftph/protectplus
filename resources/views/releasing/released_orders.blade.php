@extends('layouts.releasing')
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
        <h1>Releasing</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item "><a href="{{route('releasing')}}">Dashdboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Released Orders</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-navy d-flex flex-row align-items-center">
                <h3 class="card-title">Released Orders</h3>
                <div class="col text-right">
                    <a href="{{ route('payment') }}" class="btn btn-primary">  Dashboard</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            @php
                $fmt = new NumberFormatter( 'en_PHP', NumberFormatter::CURRENCY );
            @endphp
                <table id="users" class="table table-bordered table-striped">
                    <thead >

                        <tr>
                            <th class="align-middle text-center" >Order No</th>
                            <th class="align-middle text-center" >Customer name</th>
                            <th class="align-middle text-center"> Number of Items</th>
                            <th class="align-middle text-center">Grand Total</th>
                            <th class="align-middle text-center" >Payment Status</th>

                        </tr>
                    </thead>
                        <tbody>

                            @foreach ( $releasedOrders as $order )

                            <tr>
                                <td scope="row" class="align-middle text-center">{{ $order->order_number }}</td>
                                    <td scope="row" class="align-middle text-center">{{ $order->billing_fullname }}</td>
                                <td scope="row" class="align-middle text-center">{{ $order->item_count }}</td>
                                <td scope="row" class="align-middle text-center">{{ $order->grand_total }}</td>

                                <td class="align-middle text-center">{{ $order->status }}</td>




                            </tr>

                                @endforeach


                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
