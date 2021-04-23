@extends('layouts.app')

@section('content')
<div class="container" style="width: 100%;">

    {{-- {{ $product }} --}}

    <div class="row justify-content-md-center">


                <div class="col-xs-12 col-md-8">
                       <div class="card">
                        <div class="card-header">
                            :: ADD NEW PRODUCT
                            <a href="{{route('inventory')}}" class="btn btn-danger float-right" style="width: 200px;">Cancel</a>
                        </div>
                        <div class="card-body">
                            <form action="{{route('production.create')}}" method="post" enctype ="multipart/form-data">



                                    <div class="form-group">
                                        <label for="">Product Name</label>
                                        <input type="text" name="name" id="" class="form-control" value="" placeholder="" aria-describedby="helpId"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Product Description</label>
                                        <input type="text" name="description" id="" class="form-control" value="" placeholder="" aria-describedby="helpId"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Quantity</label>
                                        <input type="number" name="quantity" id="" class="form-control" value="" placeholder="" aria-describedby="helpId"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input type="number" name="price" id="" class="form-control" value="" placeholder="" aria-describedby="helpId"  required>
                                    </div>


                                    <div class="form-group">
                                        <label for="">Product Image</label>
                                        <img class="card-img-top form-control mb-2" src="" alt="Card image cap" id="product-img-tag" style="width:200px; height:200px;">

                                        {{-- <input type="file" name="product_image" class="form-control-file"/> --}}
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="product_image"  id="product-image"/>
                                    </div>

                                    <input type="hidden" name="product_id" value="" />
                                    @csrf

                                    <button type="submit" class="btn btn-primary mt-4">Add Product</button>
                            </form>
                        </div>
                </div>

        </div>




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
