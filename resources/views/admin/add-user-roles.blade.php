
@extends('layouts.data')



@section('content')

<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Roles</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">User Roles</li>
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
                <h3 class="card-title">New Role</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                 {{-- @foreach ( $getUserById as $user) --}}

                <form action="{{route('admin.add-roles-process')}}" method="POST" >
                <div class="card-body">

                    <div class="form-group">
                        <label for="role_name">Role Category</label>
                        <input type="text" class="form-control" id="role_name" placeholder="Role Category" name="role_name" required>
                    </div>
                    <div class="form-group">
                        <label for="role_display_name">Display Name</label>
                        <input type="text" class="form-control" id="role_display_name" placeholder="Display Name" name="role_display_name"  required>
                    </div>

                </div>
                <!-- /.card-body -->


                @csrf
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save New Role</button>
                </div>
                </form>
                    {{-- @endforeach --}}

            </div>
            <!-- /.card -->
        </div>
    </div>

</div>

@endsection


