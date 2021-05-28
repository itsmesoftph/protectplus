@extends('layouts.sales')

@push('styles')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" media="print" href="{{ asset('css/print_media.css') }}" >
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}" >
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Promo</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('sales')}}">Home</a></li>
                <li class="breadcrumb-item active">Product Listing</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-navy d-flex flex-row align-items-center">
                    <h3 class="card-title">Promo and Featured Product Listing</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="users" class="table table-bordered table-striped">
                       <thead>
                        <tr>
                            <th>Name</th>
                            <th>Product Code</th>
                            <th>Description</th>
                            <th>On Sale</th>
                            <th>Featured</th>
                            <th>Discount (%)</th>
                            <th>Price</th>
                            <th>Discounted Price</th>
                            <th>Action Promo</th>
                            <th>Action Featured</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $data as $product )
                            <tr>
                                <td  scope="row">{{ $product->name }}</td>
                                <td  scope="row">{{ $product->product_code }}</td>
                                <td>{{ $product->description }}</td>
                                <td>
                                    @if ($product->is_sale == null || $product->is_sale == 'no')
                                        {{ $product->is_sale = 'no'}}
                                        @else
                                        {{ $product->is_sale}}
                                    @endif

                                </td>
                                <td>
                                @if ($product->is_featured  == null || $product->is_featured == 'no')
                                    {{ $product->is_featured = 'no'}}
                                    @else
                                    {{ $product->is_featured }}
                                @endif
                                </td>
                                <td >{{$product->discount_rate / 100}}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->price - ($product->price * ($product->discount_rate/100)) }}</td>

                                <td class="text-center">
                                    @if ($product->is_sale != 'no' && $product->is_sale != null )
                                        <a class="btn btn-warning" href="{{ route('sales.promo.edit',$product->id)}}">Update Promo</a>
                                        @else
                                        <a class="btn btn-success" href="{{ route('sales.promo.view',$product->id)}}">Create Promo</a>
                                    @endif

                                </td>
                                <td class="text-center">
                                    @if ($product->is_featured != 'no'  && $product->is_featured != null)
                                        <a class="btn btn-warning" href="{{ route('sales.featured.edit',$product->id)}}">Update Featured</a>
                                        @else
                                        <a class="btn btn-success" href="{{ route('sales.featured.view',$product->id)}}">Create Featured</a>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('javascripts')


    <script type="text/javascript">

    function change( val ){
                var btn = document.getElementById("dashboard_btn");

                if (btn.value == "View Dashboard") {
                    btn.value = "Hide Dashboard";
                    btn.innerHTML = "Hide Dashboard";
                }
                else {
                    btn.value = "View Dashboard";
                    btn.innerHTML = "View Dashboard";
                }
    }
    </script>

@endsection
