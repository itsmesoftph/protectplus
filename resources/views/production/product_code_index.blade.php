@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('inventory') }}">Production Oveview</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Product Code</li>

        </ol>

    </nav>
<div class="container table-responsive" style="width: 100%;">

    {{-- {{ $product }} --}}

    <div class="row justify-content-md-center mb-4">


            <div class="col-xs-12 col-md-8">
                    <div class="card">
                    <div class="card-header">
                        :: ADD NEW PRODUCT CODE
                        <a href="{{route('inventory')}}" class="btn btn-danger float-right" style="width: 200px;">Cancel</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product_code.store')}}" method="post" enctype ="multipart/form-data">



                                <div class="form-group">
                                    <label for="">Product Prefix</label>
                                    <input type="text" name="product_prefix" id="product_prefix" class="form-control" value="" placeholder="Example: IBPS" aria-describedby="helpId"  required>
                                </div>
                                <div class="form-group">
                                    <label for="">Product Size</label>
                                    <input type="text" name="prodcut_size" id="prodcut_size" class="form-control" value="" placeholder="Example: 3.78L" aria-describedby="helpId"  required>
                                </div>
                                <div class="form-group">
                                    <label for="">Product Description</label>
                                    <input type="text" name="product_description" id="product_description" class="form-control" value="" placeholder="Example: Isopropyl Baby powder Scent 3.78L" aria-describedby="helpId"  required>
                                </div>


                                @csrf

                                <button type="submit" class="btn btn-primary mt-4">Add Product Code</button>
                        </form>
                    </div>
            </div>

    </div>

            <table class="table table-striped table-bordered mt-5">
                <thead>
                    <tr>
                        <td colspan="6" class="bg-navy">
                            :: PRODUCT CODE LISTING
                        </td>
                    </tr>
                    <tr>
                        <th>Product Prefix</th>
                        <th>Product Description</th>
                        <th>Product Size</th>
                        <th>Product Code</th>
                        <th>Date Created</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ( $product_code as $pc )
                    <tr>
                        <td scope="row">{{ $pc->pc_prefix }}</td>
                        <td>{{ $pc->pc_description }}</td>
                        <td>{{ $pc->pc_size }}</td>
                        <td>{{ $pc->pc_code}}</td>
                        <td>{{ $pc->created_at }}</td>
                        <td class="text-center">
                            <a href="{{ route('product_code.edit',$pc->id)}}">
                                <i class="far fa-edit fa-2x"></i>
                            </a>
                            {{-- <a href="" class="ml-2">
                                <i class="far fa-trash-alt fa-2x"></i>
                            </a> --}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

</div>
@endsection


  @section('javascripts')
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#product-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#product-image").change(function(){
        readURL(this);
    });
</script>

  @endsection
