@extends('layouts.data')


@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Products</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Product Listing</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-12">
         <div class="card">
            <div class="card-header bg-navy d-flex flex-row align-items-center">
                <h3 class="card-title">Product Listing</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="users" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Product Code</th>
                            <th>Product Capacity</th>
                            <th>Product Image</th>
                            <th>Product Price</th>
                            <th>Product SRP</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $products as $product )
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->product_code }}</td>
                                <td>{{ $product->product_capacity }}</td>
                                <td ><img src="{{ 'storage/'. $product->img_url }}" style="width: 50px;"></td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->srp_price }}</td>
                                <td class="text-center"><a class="btn btn-primary" href="{{ route('admin.edit-product',$product->id)}}">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

