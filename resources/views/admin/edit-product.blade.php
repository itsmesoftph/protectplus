
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
            <li class="breadcrumb-item active">Product Details</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

@php
    foreach($products as $product){
    $product_name               = $product->name;
    $product_description        = $product->description;
    $product_code               = $product->product_code;
    $product_id                 = $product->id;
    $product_capacity           = $product->product_capacity;
    $product_image              = $product->img_url;
    $product_price              = $product->price;
    $product_srp                = $product->srp_price;
    $product_img                = $product->img_url;
    }
@endphp

<div class="row">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary ">
                <div class="card-header bg-navy">
                <h3 class="card-title">{{ $product_name }} - Product Info</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                 {{-- @foreach ( $getUserById as $user) --}}
    {{-- {{ route('admin.update-product',$product_id) }} --}}
                <form action="{{ route('admin.update-product',$product_id) }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                        @if ($product_image != null)
                            <div class="image-preview" id="imagePreview">
                                <img src="{{asset('storage/'.$product_image)}}" alt="Image Preview" class="image-preview__image" style="width:150px;">
                                <span class="image-preview__default-text"></span>
                            </div>
                            @else
                            <div class="image-preview" id="imagePreview">
                                <img src="https://via.placeholder.com/150x150.jpg" alt="Image Preview" class="image-preview__image">
                                <span class="image-preview__default-text"></span>
                            </div>
                        @endif


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
                                    <input type="file" name="image" accept="image/*" class="clearablefileinput form-control-file" value="{{asset('storage/'.$product_img)}}" id="id_image">
                                </div>
                            </div>

                        </div>

                        
                        <div class="form-group">
                            <label>Product Code</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" id="product_code" name="product_code" aria-hidden="true">

                                    <option selected="selected"value="{{ $product_code }}">{{ $product_code }}</option>
                                 @foreach  ( $product_codes as $code )
                                    <option value="{{ $code->pc_code }}" data-code="{{$code->pc_size}}" data-description="{{ $code->pc_description }}">{{ $code->pc_code }}</option>
                                 @endforeach

                            </select>
                            <span class="text-muted "> Current Product Code: {{ $product_code }}</span>
                        </div>
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" placeholder="Product Name" name="product_name" value="{{ $product_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="product_description">Product Description</label>
                            <input type="text" class="form-control" id="product_description" name="product_description" placeholder="Shipping City" value="{{ $product_description }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="product_capacity">Product Size (liters)</label>
                            <input type="text" class="form-control" id="product_capacity" name="product_capacity" placeholder="Shipping City" value="{{ $product_capacity }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="product_price">Reseller Price (Php)</label>
                            <input type="number" class="form-control" id="product_price" name="product_price" placeholder="Product Pricer" value="{{ number_format($product_price,2) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="product_srp">Suggested Retail Price (Php)</label>
                            <input type="number" class="form-control" id="product_srp" name="product_srp" placeholder="Contact Number" value="{{ $product_srp }}" required>
                        </div>
                        {{-- <div class="form-group">
                            <label>User Role</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" name="user_role" aria-hidden="true">


                                    <option selected="selected"value="{{ $product_code }}">{{ $product_code }}</option>
                                 @foreach  ( $product_codes as $code )
                                    <option value="{{ $code->pc_code }}">{{ $code->pc_code }}</option>
                                 @endforeach

                            </select>
                            <span class="text-muted "> Current Role: {{ $user_role }}</span>
                        </div> --}}

                </div>
                <!-- /.card-body -->


                @csrf
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Product Information</button>
                </div>
                </form>
                    {{-- @endforeach --}}

            </div>
            <!-- /.card -->
        </div>
    </div>

</div>

@endsection

@section('javascripts')
    <script>
        const imageFile = document.getElementById('id_image');
        const imagePreviewContainer = document.getElementById('imagePreview');
        const imagePreview = imagePreviewContainer.querySelector('.image-preview__image');
        const imagePreviewDefaultText = imagePreviewContainer.querySelector('.image-preview__default-text');

        imageFile.addEventListener("change", function(){
        const file = this.files[0];

        if(file){
            const reader = new FileReader();
            // imagePreviewDefaultText.style.display = "none";
            // imagePreview.style.display = "block";

            reader.addEventListener("load", function(){
            imagePreview.setAttribute("src",this.result);
            });

            reader.readAsDataURL(file);
        }
        // else{
        //   imagePreviewDefaultText.style.display = "block";
        //   imagePreview.style.display = "none";
        // }
        });


         function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#id_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#id_image").change(function(){
        readURL(this);
    });


   
    </script>
@endsection
