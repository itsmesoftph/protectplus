@extends('layouts.app')

@section('content')
<div class="container" style="width: 100%;">

    {{-- {{ $product }} --}}

    <div class="row justify-content-md-center">


                <div class="col-xs-12 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            :: UPDATE PRODUCT DETAILS
                            <a href="{{route('inventory')}}" class="btn btn-danger float-right" style="width: 200px;">Cancel</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('production.update',$product['id'])}}" method="post" enctype ="multipart/form-data">



                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" id="" class="form-control" value="{{ $product['name'] }}" placeholder="" aria-describedby="helpId"  required>
                                </div>
                                <div class="form-group">
                                    <label for="">Product Description</label>
                                    <input type="text" name="description" id="" class="form-control" value="{{ $product['description'] }}" placeholder="" aria-describedby="helpId"  required>
                                </div>
                                <div class="form-group">
                                    <label for="">Current Quantity</label>
                                    <input type="number" name="quantity" id="" class="form-control" value="{{ $product['quantity'] }}" placeholder="" aria-describedby="helpId"  required>

                                    <label>New Quantity</label>
                                    <input type="number" name="new_quantity" id="" class="form-control" value="" placeholder="" aria-describedby="helpId" >
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="number" name="price" id="" class="form-control" value="{{ $product['price'] }}" placeholder="" aria-describedby="helpId"  required>
                                </div>


                                <div class="form-group">
                                    <label for="">Product Image</label>
                                    <img class="card-img-top form-control mb-2" src="{{asset('storage/'.$product->img_url)}}" alt="Card image cap" style="width:200px; height:200px;">

                                    {{-- <input type="file" name="product_image" class="form-control-file"/> --}}
                                </div>
                                <div class="form-group">
                                    <input type="file" name="product_image" />
                                </div>

                                <input type="hidden" name="product_id" value="{{ $product['id']}}" />
                                @csrf
                                    <button type="submit" class="btn btn-primary mt-4">Update Product</button>


                        </form>
                            </div>

                    </div>

                </div>

        </div>




</div>
@endsection
