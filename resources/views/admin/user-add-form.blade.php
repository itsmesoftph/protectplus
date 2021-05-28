
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

@endphp

<div class="row">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary ">
                <div class="card-header bg-navy">
                {{-- <h3 class="card-title">{{ $shipping_name }} - Shipping Info</h3> --}}
                <h3 class="card-title">New User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                 {{-- @foreach ( $getUserById as $user) --}}

                <form action="{{route('admin.add-user-process')}}" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                        <div class="image-preview" id="imagePreview">
                            <img src="https://via.placeholder.com/150x150.jpg" alt="Image Preview" id="image-preview__image" class="image-preview__image" style="width: 150px;">
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
                                    <div class="file-select-name" id="noFile">Upload Photo ...</div>
                                    {{-- <input type="file" name="image" id="id_image"> --}}
                                    <input type="file" name="image" accept="image/*" class="clearablefileinput form-control-file" id="id_image">
                                </div>
                            </div>

                        </div>
                        {{-- <div class="form-group">
                            <div class="file-upload">
                                <div class="file-select">
                                    <div class="file-select-button" id="fileName">Choose File</div>
                                    <div class="file-select-name" id="noFile">Upload Proof of Payment ...</div>
                                    <input type="file" name="image" accept="image/*" class="clearablefileinput form-control-file" id="id_image">
                                </div>
                            </div>

                        </div> --}}


                        <div class="form-group">
                            <label for="shipping_fullname">Shipping Full Name</label>
                            <input type="text" class="form-control" id="shipping_fullname" placeholder="Shipping Full Name" name="shipping_fullname" required>
                        </div>
                        <div class="form-group">
                            <label for="shipping_address">Shipping Address</label>
                            <input type="text" class="form-control" id="shipping_address" placeholder="Shipping Address" name="shipping_address"  required>
                        </div>
                        <div class="form-group">
                            <label for="shipping_city">Shipping City</label>
                            <input type="text" class="form-control" id="shipping_city" name="shipping_city" placeholder="Shipping City" required>
                        </div>
                        <div class="form-group">
                            <label for="shipping_phone">Contact Number</label>
                            <input type="text" class="form-control" id="shipping_mobile" name="shipping_phone" placeholder="Contact Number"  required>
                        </div>
                        <div class="form-group">
                            <label for="user_email">Email</label>
                            <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email"  required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password *"  required>
                        </div>
                        <div class="form-group">
                            <label>User Role</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" name="user_role" aria-hidden="true">


                                    <option selected="selected"value="default">Select Role</option>
                                 @foreach  ( $getAllUserRoles as $roles )
                                    <option value="{{ $roles->id }}">{{ $roles->display_name }}</option>
                                 @endforeach

                            </select>
                            {{-- <span class="text-muted "> Current Role: {{ $user_role }}</span> --}}
                        </div>

                </div>
                <!-- /.card-body -->


                @csrf
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save New User</button>
                </div>
                </form>
                    {{-- @endforeach --}}

            </div>
            <!-- /.card -->
        </div>
    </div>

</div>

@endsection


