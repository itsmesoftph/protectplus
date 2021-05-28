
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
            <li class="breadcrumb-item active">Created DR Listing</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-12">
         <div class="card">
            <div class="card-header bg-navy d-flex flex-row align-items-center">
                <h3 class="card-title">DR Listing</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="users" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Order No.</th>
                            <th class="text-center">Customer Name</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Date DR Created</th>

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

                                    <td class="text-center"><a href="{{ route('delivery.list',$dr->id) }}" class="btn btn-success">View DR</a></td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

