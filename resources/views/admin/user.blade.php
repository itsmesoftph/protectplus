@extends('layouts.data')


@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Users</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">User Listing</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-12">
         <div class="card">
            <div class="card-header bg-navy d-flex flex-row align-items-center">
                <h3 class="card-title">User Listing</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="users" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Shipping Full Name</th>
                            <th>Shipping Address</th>
                            <th>Shipping City</th>
                            <th>Shipping Phone</th>
                            <th>Avatar</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $userDetails as $detail )
                            <tr>
                                <td>{{ $detail->id }}</td>
                                <td>{{ $detail->name }}</td>
                                <td>{{ $detail->email }}</td>
                                <td>{{ $detail->shipping_fullname }}</td>
                                <td>{{ $detail->shipping_address }}</td>
                                <td>{{ $detail->shipping_city }}</td>
                                <td>{{ $detail->shipping_phone }}</td>
                                <td ><img src="{{ 'storage/'. $detail->avatar }}" style="width: 50px;"></td>
                                <td class="text-center"><a class="btn btn-primary" href="{{route('admin.getUserById', $detail->id )}}">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

