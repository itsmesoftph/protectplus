
@extends('layouts.data')



@section('content')

<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>FAQ Category</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">New Category</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

@php

@endphp

<div class="row">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary ">
                <div class="card-header bg-navy">
                {{-- <h3 class="card-title">{{ $product_name }} - Product Info</h3> --}}
                <h3 class="card-title">Create New Category</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                 {{-- @foreach ( $getUserById as $user) --}}
    {{-- {{ route('admin.update-product',$product_id) }} --}}
                <form action="{{ route('admin.add-category-process') }}" method="POST" >
                <div class="card-body">

                        <div class="form-group">
                            <label for="c_name">Category Name</label>
                            <input type="text" class="form-control" id="c_name" placeholder="Category Name" name="c_name" required>
                        </div>
                        <div class="form-group">
                            <label for="c_description">Category Description</label>
                            <input type="text" class="form-control" id="c_description" name="c_description" placeholder="Category description" required>
                        </div>

                </div>
                <!-- /.card-body -->


                @csrf
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add New Category</button>
                </div>
                </form>
                    {{-- @endforeach --}}

            </div>
            <!-- /.card -->
        </div>
    </div>

</div>

@endsection


