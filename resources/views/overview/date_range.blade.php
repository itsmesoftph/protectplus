@extends('layouts.app')

@section('styles')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" /> --}}
@endsection

@section('content')
<div class="container">
 @php
    $fmt = new NumberFormatter( 'en_PHP', NumberFormatter::CURRENCY );
@endphp
     <div class="row">
        <div class="col-md-3">
          <!-- small box -->
          <div class="small-box bg-navy">
            <div class="inner">
                <h3>{{ $fmt->formatCurrency($GrandTotalSales,'PHP') }}</h3>
              <p>‌Amount of Paid Order(s)</p>

            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer py-2"></i></a>
          </div>
        </div>
        <div class="col-md-3">
          <!-- small box -->
          <div class="small-box bg-navy">
            <div class="inner">
              <h3>{{ $countAllOrders }}</h3>
              <p>‌Total Order(s)</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer py-2"></i></a>
          </div>
      </div>
        <div class="col-md-3">
            <!-- small box -->
            <div class="small-box bg-navy">
              <div class="inner">
                <h3>{{ $countDistributor}}</h3>
                <p>‌Total Registered Distributor(s)</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="#" class="small-box-footer py-2"></i></a>
            </div>
        </div>
        <div class="col-md-3">
            <!-- small box -->
            <div class="small-box bg-navy">
            <div class="inner">
            @foreach ( $name_MostOrdered as $productName)
                <h5>{{ $productName->name }} </h5>
            @endforeach

              <p>Most Ordered Product</p>
              <h6>{{$NumberOfMostOrderedProduct}} Unit(s) Sold</h6>

            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer py-2"></i></a>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
          <!-- small box -->
            <div class="small-box bg-navy">
              <div class="inner">
                <h3>{{ $processingOrders }} </h3>
                <p>‌Total Processed Order(s)</p>
              </div>

              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="#" class="small-box-footer py-2"></i></a>

          </div>
        </div>
          <div class="col-md-3">
          <!-- small box -->
            <div class="small-box bg-navy">
                    <div class="inner">
                        <h3>{{ $DrOrders }} </h3>
                        <p>‌Total Completed Order(s)</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer py-2"></i></a>

            </div>
          </div>
          <div class="col-md-3">
          <!-- small box -->
            <div class="small-box bg-navy">
              <div class="inner">

                <h3>{{ $paidOrders }} </h3>
                <p>‌Total Paid Order(s)</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="#" class="small-box-footer py-2"></i></a>

             </div>
          </div>
          <div class="col-md-3">
          <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <h3>{{$releasedOrders}} </h3>
                        <p>Total Released Order(s)</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer py-2"></i></a>

                </div>
          </div>



    </div>
     <br />
            <br />
            <div class="row input-daterange text-center">
                <div class="col-md-4">
                    <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
                </div>
                <div class="col-md-4 text-center">
                    <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
                </div>
                <div class="col-md-4  text-right">
                    <button type="button" name="filter" id="filter" class="btn btn-primary mr-5">Filter</button>
                    <button type="button" name="refresh" id="refresh" class="btn btn-success">Refresh</button>
                </div>
            </div>
            <br />
    <div class="table-responsive">
    <table class="table table-bordered table-striped" id="order_table">
           <thead>
            <tr>
                <th>Order Number</th>
                <th>Customer Name</th>
                <th>Number of Item</th>
                <th>Is Paid</th>
                {{-- {{$orders}} --}}
                {{-- <th>
                    <select name="is_paid_filter" id="is_paid_filter" class="form-control">
                        <option value="">Select Status</option>
                        @foreach ( $orders as $order )
                            <option value="{{ $order->is_paid}}">
                               {{ $order->is_paid === 1 ? "Paid" : "Not Paid" }}
                            </option>
                        @endforeach
                    </select>
                </th> --}}
                <th>Total</th>
                <th>Date Ordered</th>
            </tr>
           </thead>
       </table>
       {{csrf_field()}}
   </div>
  </div>
  @endsection

  @section('js')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>


    <script>




$(document).ready(function(){
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format:'yyyy-mm-dd',
  autoclose:true
 });


 load_data();

 function load_data(from_date = '', to_date = '')
 {
  $('#order_table').DataTable({
      "pageLength": 50,
   processing: true,
   serverSide: true,
   ajax: {
    url:'{{ route("overview") }}',
    data:{from_date:from_date, to_date:to_date}
   },
   columns: [
        {data:'order_number', name:'order_number' },
        { data:'shipping_fullname', name:'shipping_fullname' },
        {data:'item_count',name:'item_count'},
        { data:'is_paid', name: 'is_paid' },
        {data: 'grand_total',  render: $.fn.dataTable.render.number( ',', '.', 2, 'PHP ' )},
        { data:'created_at', name:'created_at'}
   ]
  });
 }



 $('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  if(from_date != '' &&  to_date != '')
  {
   $('#order_table').DataTable().destroy();
   load_data(from_date, to_date);
  }
  else
  {
   alert('Both Date is required');
  }
 });

 $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
  $('#order_table').DataTable().destroy();
  load_data();
 });

});
</script>
  @endsection
