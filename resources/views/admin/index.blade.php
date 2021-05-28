@extends('layouts.data')

@section('assets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
@endsection

@section('content')
<ol class="breadcrumb mt-4">
    {{-- <li class="breadcrumb-item "  aria-current="page"><a href="{{ route('inventory') }}">Dashboard</a></li> --}}
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>

</ol>
<div class="contatiner table-responsive">
    <div class="clearfix container-fluid row">
          <div class="col-xs-12 col-sm-6 col-md-4">
              <div class="panel widget center bgimage" style="margin-bottom:0;overflow:hidden;background-image:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),url({{asset('adminlte/dist/img/photo2.png')}});">
                {{-- <div class="dimmer"></div> --}}
                  <div class="panel-content" style="color: white;">
                      <i class="fa fa-2x fa-user circle-icon"></i>
                      <h4>{{$allUserCount}}</h4>
                      <p>You have {{$allUserCount}} users in your database. Click on button below to view all users.</p>
                      <a href="http://staging-protectplus.test/admin_users" class="btn btn-primary">View all users</a>
                  </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="panel widget center bgimage" style="margin-bottom:0;overflow:hidden;background-image:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),url({{asset('adminlte/dist/img/photo1.png')}});">
              {{-- <div class="dimmer"></div> --}}
              <div class="panel-content" style="color: white;">
                  <i class="fa fa-2x fa-cubes circle-icon"></i>        <h4>{{$allProductCount}}</h4>
                  <p>You have {{$allProductCount}} products in your database. Click on button below to view all products.</p>
                  <a href="http://staging-protectplus.test/admin_product" class="btn btn-primary">View all Products</a>
              </div>
            </div>
        </div>
    </div>
</div>
{{-- .container --}}
@endsection

