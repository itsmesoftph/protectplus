@extends('layouts.data')

@push('styles')

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@endpush

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
            <li class="breadcrumb-item active">FAQ Listing</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-md-4">
        <div class="card collapsed-card ">
            <div class="card-header bg-navy" >
                    <i class="fas fa-shipping-fast float-left" style="padding-top: 3px;"></i>

                <h3 class="card-title ml-2">Shipping</h3>

                <div class="card-tools">

                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus" style="color: white;"></i>
                </button>
                </div>
            </div>
            <div class="card-body collapsed-card " >
                @foreach ($faq as $items )
                    @foreach ( $items as $item)
                        @if($item->category == 'Shipping')
                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h5 class="card-title">{{$item->title}}</h5>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body row" >
                                    <p class="mb-4">{{$item->description}}</p>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary float-right" >Update Details</button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
    {{-- <div class="col-md-4">
        <div class="card collapsed-card ">
            <div class="card-header bg-navy" >
                    <i class="fas fa-shipping-fast float-left" style="padding-top: 3px;"></i>

                <h3 class="card-title ml-2">Shipping</h3>

                <div class="card-tools">

                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus" style="color: white;"></i>
                </button>
                </div>
            </div>
            <div class="card-body collapsed-card " >
                @foreach ($faq as $items )
                    @foreach ( $items as $item)
                        @if($item->category == 'Shipping')
                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h5 class="card-title">{{$item->title}}</h5>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body row" >
                                    <p class="mb-4">{{$item->description}}</p>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary float-right" >Update Details</button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div> --}}
    {{-- end of shipping --}}

    <div class="col-md-4">
        <div class="card collapsed-card ">
            <div class="card-header bg-navy" >
                    <i class="fas fa-eraser float-left" style="padding-top: 3px;"></i>

                <h3 class="card-title ml-2">Returns</h3>

                <div class="card-tools">

                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus" style="color: white;"></i>
                </button>
                </div>
            </div>
            <div class="card-body" >
                @foreach ($faq as $items )
                    @foreach ( $items as $item)
                        @if($item->category == 'Returns')
                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h5 class="card-title">{{$item->title}}</h5>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                 <div class="card-body row" >
                                    <p class="mb-4 card-text">{{$item->description}}</p>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary float-right" >Update Details</button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
    {{-- end of returns --}}
</div>






@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endpush

