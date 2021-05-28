
    @extends('layouts.sales')
   
    @section('content')
     <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Walk-in Shop</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('sales')}}">Home</a></li>
                <li class="breadcrumb-item active">Shop
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>
      <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-navy d-flex flex-row align-items-center">
                        <h3 class="card-title">Shop</h3>
                    </div>
                    <!-- /.card-header -->
                        <div class="card-body row">
            

                             @foreach ( $products as $product )
                        <div class="col-xs-12 col-md-4 mb-4">


                            <div class="card">
                                <div class="card-header">
                                    {{$product->name}}
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-center">
                                        <img class="card-img-top" src="{{asset('storage/'.$product->img_url)}}" alt="Card image cap" style="width:200px; height:200px;">

                                    </li>
                                    <li class="list-group-item">
                                        {{Str::limit($product->description,80)}}...
                                    </li>
                                    {{-- <li class="list-group-item">

                                    <span>{{ setting('site.stock_treshold') }}</span>

                                    </li> --}}
                                    <li class="list-group-item">
                                        <span>
                                    @if( $product->quantity  > setting('site.stock_threshold'))
                                            <span class="badge badge-success">In Stock :</span> {{ $product->quantity }}
                                        @elseif( $product->quantity  <= setting('site.stock_threshold') && $product->quantity > 0)
                                            <span class="badge badge-warning">Low Stock : </span>  {{ $product->quantity }}
                                        @else
                                            <span class="badge badge-danger">Not Available :</span> {{ $product->quantity }}
                                        @endif
                                        </span>
                                    </li>
                                </ul>
                                <div class="card-footer text-muted">
                                    <div class="d-flex justify-content-between align-items-center">
                                    @if ($product->quantity > 0)
                                        <div class="btn-group">
                                            <a class="btn btn-primary" href="{{ route('walkin.add', $product->id) }}" class="card-link">Add To Cart</a>

                                        </div>

                                    @endif
                                        <small class="text-muted">PHP {{$product->srp_price}}</small>


                                    </div>
                                </div>

                            </div>

                        </div>

                        @endforeach

                            <!-- /row samll-gutter-->
                        <!-- /container -->
                        </div>
                </div>
            </div>
        </div>

		

	
		
    @endsection()

    