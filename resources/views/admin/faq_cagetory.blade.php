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
            <li class="breadcrumb-item active">Category Listing</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-12">
         <div class="card">
            <div class="card-header bg-navy d-flex flex-row align-items-center">
                <h3 class="card-title">Category Listing</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="users" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Date Created</th>

                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $categories as $category )
                            <tr>
                                <td>{{ $category->cat_name }}</td>
                                <td>{{ $category->cat_description }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td class="text-center"><a class="btn btn-primary" href="#">Edit</a></td>
                                {{-- href="{{ route('admin.edit-category',$category->id)}} --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

