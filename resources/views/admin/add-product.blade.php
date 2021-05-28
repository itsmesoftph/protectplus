
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
            <li class="breadcrumb-item active">New Product</li>
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
                <h3 class="card-title">Create New Product</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                 {{-- @foreach ( $getUserById as $user) --}}
    {{-- {{ route('admin.update-product',$product_id) }} --}}
                <form action="{{ route('admin.add-product-process') }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                     <div class="image-preview" id="imagePreview">
                        <img src="https://via.placeholder.com/150x150.jpg" alt="Image Preview" class="image-preview__image">
                        <span class="image-preview__default-text"></span>
                      </div>
                        <div class="form-group">
                            <label for="id_image" class="">
                                Image
                            </label>
                                {{-- <input type="file" name="image" accept="image/*" class="clearablefileinput form-control-file" id="id_image"> --}}
                            <div class="file-upload" style="width: 400px;">
                                <div class="file-select">
                                    <div class="file-select-button" id="fileName">Choose File</div>
                                    <div class="file-select-name" id="noFile">Upload Product Image...</div>
                                    {{-- <input type="file" name="image" id="id_image"> --}}
                                    <input type="file" name="image" accept="image/*" class="clearablefileinput form-control-file"  id="id_image">
                                </div>
                            </div>

                        </div>

                        
                        <div class="form-group">
                            <label>Product Code</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" id="pc_code" name="product_code" aria-hidden="true">

                                    <option selected="selected"value="default">Select Product Code Here..</option>
                                 @foreach  ( $productCodes as $code )
                                    <option value="{{ $code->pc_code }}" data-size="{{$code->pc_size}}" data-description="{{ $code->pc_description }}">{{ $code->pc_code }}</option>
                                 @endforeach

                            </select>
                            {{-- <span class="text-muted "> Current Product Code: {{ $product_code }}</span> --}}
                        </div>
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" placeholder="Product Name" name="product_name" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="product_description">Product Description</label>
                            <input type="text" class="form-control" id="product_description" name="product_description" placeholder="Product description" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="product_capacity">Product Size (liters)</label>
                            <input type="text" class="form-control" id="product_capacity" name="product_capacity" placeholder="Product Capacity" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="product_price">Reseller Price (Php)</label>
                            <input type="number" class="form-control" id="product_price" name="product_price" placeholder="Product Price" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="product_srp">Suggested Retail Price (Php)</label>
                            <input type="number" class="form-control" id="product_srp" name="product_srp" placeholder="Product SRP" value="" required>
                        </div>

                </div>
                <!-- /.card-body -->


                @csrf
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add New Product</button>
                </div>
                </form>
                    {{-- @endforeach --}}

            </div>
            <!-- /.card -->
        </div>
    </div>

</div>

@endsection


