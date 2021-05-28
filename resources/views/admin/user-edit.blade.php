
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
            <li class="breadcrumb-item active">User Info</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

@php
    foreach($getUserById as $user){
    $shipping_name              = $user->shipping_fullname;
    $shipping_address           = $user->shipping_address;
    $shipping_city              = $user->shipping_city;
    $shipping_phone             = $user->shipping_phone;
    $shipping_avatar            = $user->avatar;
    $email                      = $user->email;
    $user_role                  = $user->display_name;
    $user_id                    = $user->id;
    }
@endphp

<div class="row">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary ">
                <div class="card-header bg-navy">
                <h3 class="card-title">{{ $shipping_name }} - Shipping Info</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                 {{-- @foreach ( $getUserById as $user) --}}

                <form action="{{ route('admin.update-user',$user_id) }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                        @if ($shipping_avatar != null)
                            <div class="image-preview" id="imagePreview">
                                <img src="{{asset('storage/'.$shipping_avatar)}}" alt="Image Preview" class="image-preview__image" style="width:150px;">
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
                                    <div class="file-select-name" id="noFile">Upload Photo...</div>
                                    {{-- <input type="file" name="image" id="id_image"> --}}
                                    <input type="file" name="image" accept="image/*" class="clearablefileinput form-control-file" id="id_image">
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="shipping_fullname">Shipping Full Name</label>
                            <input type="text" class="form-control" id="shipping_fullname" placeholder="Shipping Full Name" name="shipping_fullname" value="{{ $shipping_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="shipping_address">Shipping Address</label>
                            <input type="text" class="form-control" id="shipping_address" placeholder="Shipping Address" name="shipping_address" value="{{ $shipping_address }}" required>
                        </div>
                        <div class="form-group">
                            <label for="shipping_city">Shipping City</label>
                            <input type="text" class="form-control" id="shipping_city" name="shipping_city" placeholder="Shipping City" value="{{ $shipping_city }}" required>
                        </div>
                        <div class="form-group">
                            <label for="shipping_phone">Contact Number</label>
                            <input type="text" class="form-control" id="shipping_mobile" name="shipping_phone" placeholder="Contact Number" value="{{ $shipping_phone }}" required>
                        </div>
                        <div class="form-group">
                            <label for="user_email">Email</label>
                            <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Contact Number" value="{{ $email }}" required>
                        </div>
                        <div class="form-group">
                            <label>User Role</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" name="user_role" aria-hidden="true">


                                    <option selected="selected"value="{{ $user_role }}">{{ $user_role }}</option>
                                 @foreach  ( $getAllUserRoles as $roles )
                                    <option value="{{ $roles->display_name }}">{{ $roles->display_name }}</option>
                                 @endforeach

                            </select>
                            <span class="text-muted "> Current Role: {{ $user_role }}</span>
                        </div>

                </div>
                <!-- /.card-body -->


                @csrf
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update User Information</button>
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
