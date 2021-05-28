@extends('layouts.data')


@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>FAQ</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">New FAQ</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary ">
                <div class="card-header bg-navy">
                {{-- <h3 class="card-title">{{ $product_name }} - Product Info</h3> --}}
                <h3 class="card-title">Create New FAQ</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form action="{{ route('admin.add-faq-process') }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">



                        <div class="form-group">
                            <label>FAQ Category</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" id="faq_category" name="faq_category" aria-hidden="true">

                                    <option selected="selected"value="default">Select Category Here..</option>
                                 @foreach  ( $faq_categories as $category )
                                    <option value="{{ $category->cat_name }}"> {{ $category->cat_name }}</option>
                                 @endforeach

                            </select>
                            {{-- <span class="text-muted "> Current Product Code: {{ $product_code }}</span> --}}
                        </div>
                        <div class="form-group">
                            <label for="faq_title">FAQ Title</label>
                            <input type="text" class="form-control" id="faq_title" placeholder="FAQ Title" name="faq_title" required>
                        </div>
                        <div class="form-group">
                            <label for="faq_description">FAQ Description</label>
                            <input type="text" class="form-control" id="faq_description" name="faq_description" placeholder="FAQ description" required>
                        </div>


                </div>
                <!-- /.card-body -->


                @csrf
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add New FAQ</button>
                </div>
                </form>
                    {{-- @endforeach --}}

            </div>
            <!-- /.card -->
        </div>
    </div>

</div>


@endsection

