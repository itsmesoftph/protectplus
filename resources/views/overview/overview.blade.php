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
        <div class="col-md-2">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
                <h4 >{{ $fmt->formatCurrency($totalSales,'Php') }}</h4>
                <p>TOTAL SALES</p>
            </div>

            <div class="icon">
              <i class="fas fa-money-bill-wave"></i>
            </div>
            <a href="#" class="small-box-footer py-1"></i></a>
          </div>
        </div>
        <div class="col-md-2">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
                <h4 >{{ $fmt->formatCurrency($getAllApproved,'Php') }}</h4>
                <p>TOTAL APPROVED</p>
            </div>

            <div class="icon">
              <i class="fas fa-money-bill-wave"></i>
            </div>
            <a href="#" class="small-box-footer py-1"></i></a>
          </div>
        </div>
        <div class="col-md-2">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
                <h4 >{{ $fmt->formatCurrency($getAllDRcreated,'PHP') }}</h4>
                <p>TOTAL DR CREATED</p>
            </div>

            <div class="icon">
              <i class="fas fa-money-bill-wave"></i>
            </div>
            <a href="#" class="small-box-footer py-1"></i></a>
          </div>
        </div>
        <div class="col-md-2">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
                <h4 >{{ $fmt->formatCurrency($getAllPaidOrder,'PHP')}}</h4>
                <p>TOTAL PAID</p>
            </div>

            <div class="icon">
              <i class="fas fa-money-bill-wave"></i>
            </div>
            <a href="#" class="small-box-footer py-1"></i></a>
          </div>
        </div>
        <div class="col-md-2">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
                <h6 >{{ $fmt->formatCurrency($getAllRealeasedOrder,'PHP')}}</h6>
                <p>TOTAL RELEASED</p>
            </div>
            <div class="inner">
                <h6 >{{ $fmt->formatCurrency($getAllDeliveryFee,'PHP')}}</h6>
                <p>TOTAL Collected Delivery Fees</p>
            </div>
            <div class="icon">
              <i class="fas fa-money-bill-wave"></i>
            </div>
            <a href="#" class="small-box-footer py-1"></i></a>
          </div>
        </div>
        <div class="col-md-2">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
                <h4 >{{$fmt->formatCurrency($getAllRecievedOrder,'PHP')}}</h4>
                <p>TOTAL RECEIVED</p>
            </div>

            <div class="icon">
              <i class="fas fa-money-bill-wave"></i>
            </div>
            <a href="#" class="small-box-footer py-1"></i></a>
          </div>
        </div>
    </div>
  {{-- end .row --}}

    {{-- SECOND ROW --}}
    <div class="row">
        <div class="col-md-2">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <h3>{{ $numberOfOrder }} </h3>
              <p>NO. OF ORDERS</p>‌
            </div>

            <div class="icon">
              <i class="fas fa-box"></i>
            </div>
            <a href="#" class="small-box-footer py-1"></i></a>
        </div>

      </div>
          <div class="col-md-2">
          <!-- small box -->
            <div class="small-box bg-white">
                    <div class="inner">
                        <h3>{{ $numberOfApproved }}</h3>
                        <p>‌NO. OF APPROVED</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <a href="#" class="small-box-footer py-2"></i></a>

            </div>
          </div>
          <div class="col-md-2">
          <!-- small box -->
            <div class="small-box bg-white">
              <div class="inner">

                <h3>{{ $numberOfDRcreated }}</h3>
                <p>‌NO. OF DR's</p>
              </div>
              <div class="icon">
                <i class="fas fa-box"></i>
              </div>
              <a href="#" class="small-box-footer py-2"></i></a>

             </div>
          </div>
          <div class="col-md-2">
          <!-- small box -->
                <div class="small-box bg-white">
                    <div class="inner">
                        <h3>{{$numberOfPaidOrder}} </h3>
                        <p>NO. OF PAID</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <a href="#" class="small-box-footer py-2"></i></a>

                </div>
          </div>

          <div class="col-md-2">
          <!-- small box -->
                <div class="small-box bg-white">
                    <div class="inner">
                        <h3>{{$numberOfReleasedOrder}} </h3>
                        <p>NO. OF RELEASED</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <a href="#" class="small-box-footer py-2"></i></a>

                </div>
          </div>

          <div class="col-md-2">
          <!-- small box -->
                <div class="small-box bg-white">
                    <div class="inner">
                        <h3>{{$numberOfReceievedOrder}} </h3>
                        <p>NO. OF RECEIVED</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <a href="#" class="small-box-footer py-2"></i></a>

                </div>
          </div>



    </div>
  {{-- end 2nd row --}}



    {{-- THIRD ROW --}}
    <div class="row">

          <div class="col-md-3">
          <!-- small box -->
            <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $numberOfunpproved }}</h3>
                        <p>‌# OF UNAPPROVED ORDERS</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-people-carry"></i>
                    </div>
                    <a href="#" class="small-box-footer py-2"></i></a>

            </div>
          </div>
          <div class="col-md-3">
          <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">

                <h3>{{ $numberOf_ForDrCreation }} </h3>
                <p>‌# OF PENDING DR CREATION</p>
              </div>
              <div class="icon">
                <i class="fas fa-people-carry"></i>
              </div>
              <a href="#" class="small-box-footer py-2"></i></a>

             </div>
          </div>
          <div class="col-md-2">
          <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $numberOf_AccountReceivable }} </h3>
                        <p># OF ACCOUNT RECEIVABLES</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-people-carry"></i>
                    </div>
                    <a href="#" class="small-box-footer py-2"></i></a>

                </div>
          </div>

          <div class="col-md-2">
          <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $numberOf_PendingRelease }} </h3>
                        <p># OF ORDERS FOR RELEASING</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-people-carry"></i>
                    </div>
                    <a href="#" class="small-box-footer py-2"></i></a>

                </div>
          </div>

          <div class="col-md-2">
          <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $numberOf_InTransit }}</h3>
                        <p># OF IN-TRANSIT</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-people-carry"></i>
                    </div>
                    <a href="#" class="small-box-footer py-2"></i></a>

                </div>
          </div>
    </div>
  {{-- end 3rd row --}}


<div class="row">

  <div class="col">
   <table class="table table-striped table-bordered mb-4 ">
        <thead>
        <tr class="bg-gray">
            <td colspan="7">RAW MATERIAL </td>
        </tr>
            <tr>

                <th>Name</th>
                <th>Date</th>
                <th>Quantity (Liters)</th>
                <th>Quantity With Specific Gravity (Liters)</th>
                <th>Scent</th>
                <th>Water</th>
                <th class="bg-navy">Total (Liters)</th>
            </tr>
        </thead>
        <tbody>
        @foreach ( $estimates as $estimate )
                @php
                    $createdAt = strtotime($estimate->created_at)
                @endphp

            <tr>
                <td scope="row">{{$estimate->mat_name}}</td>
                <td>{{date('m-d-y', $createdAt)}}</td>
                <td>{{$estimate->mat_value}}</td>
                <td>{{$estimate->mat_value_sg}}</td>
                <td scope="row">{{$estimate->mat_scent}}</td>
                <td>{{$estimate->mat_water}}</td>
                <td class="bg-navy">{{$estimate->total_liters}}</td>
            </tr>
        @endforeach


        </tbody>
    </table>
    <table class="table table-bordered mb-4">
        <thead>
            <tr>
                <td colspan="7" class="bg-gray">PRODUCTION ESTIMATES</td>
            </tr>
            <tr>
                <th>Product Code</th>
                <th >Product Size (Liters)</th>
                <th>Production Quantity (pcs)</th>
                <th>Production Quantity (Liters)</th>

                <th class="bg-navy">Total Produced Alcohol(Liters)</th>
                <th>Remaining Alcohol(Liters)</th>
            </tr>
        </thead>
        <tbody>

                            {{-- {{$qty = $inv->new_qty}} --}}





            @foreach ($invQuantity as $product )
                {{-- @foreach ( $invQuantity as $invQty ) --}}
                    <tr>
                        <td>{{ $product->product_code}}</td>
                        <td>{{ $product->product_capacity}}</td>
                        <td>{{ $product->new_qty }}</td>

                            {{-- <td>{{ $product->inventories['new_qty']}}</td> --}}


                            {{-- <td>{{ $qty *  $product->product_capacity}}</td> --}}
                        {{-- <td>{{ $product->quantity}}</td> --}}

                            <td>{{$estimate->total_liters * $product->product_capacity}}</td>
                            <td class="bg-navy">{{$estimate->total_liters }}</td>

                            <td>{{ $estimate->total_liters - ($product->new_qty * $product->product_capacity)   }}</td>

                    </tr>
                  {{-- @endforeach --}}
              @endforeach
        </tbody>
    </table>



    <table class="table table-bordered">
        <thead>
            <tr>
                <td colspan="5" class="bg-gray">PRODUCTION ESTIMATES</td>
            </tr>
            <tr>
                <th>Product Code</th>
                <th>Production Quantity (pcs)</th>
                <th>Number Of Boxes</th>
                <th>Number Of Seal</th>
                <th>Number Of Sticker</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invQuantity as $product )

            <tr>
                <td scope="row">{{ $product->product_code}}</td>
                <td>{{ number_format((float)$product->new_qty, 2, '.', '') }}</td>
               @switch($product->product_capacity)
                   @case(3.78)
                       <td> {{  number_format((float)$product->new_qty/12, 2, '.', '')}}</td>
                       @break

                    @case(3.2)
                       <td> {{  number_format((float)$product->new_qty/12, 2, '.', '')}}</td>
                       @break

                     @case(.25)
                       <td> {{  number_format((float)$product->new_qty/60, 2, '.', '')}}</td>
                       @break

                   @case(.1)
                       <td> {{  number_format((float)$product->new_qty/63, 2, '.', '')}}</td>
                       @break

                    @case(.5)
                       <td> {{  number_format((float)$product->new_qty/36, 2, '.', '')}}</td>
                       @break


                   @default

               @endswitch

                <td>{{ number_format((float)$product->new_qty, 2, '.', '') }}</td>
                <td>{{ number_format((float)$product->new_qty, 2, '.', '') }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>



    {{-- TABLE INVENTORY --}}
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <td colspan="4" class="bg-navy"> :: PRODUCT INVENTORY DETAILS </td>
        </tr>
        <tr>
          <th class="align-middle" >Product Name</th>
          <th class="align-middle">Product Description</th>
          <th class="align-middle">Image</th>
          <th class="align-middle">Product Quantity</th>
      </tr>
      </thead>
      <tbody>
      @foreach ( $products as $item )

        <tr>
          <td scope="row">{{ $item->name }}</td>
          <td>{{ $item->description }}</td>
          <td>
              <img class="card-img-top" src="{{asset('storage/'.$item->img_url)}}" alt="Card image cap" style="width:100px; height:100px;">
          </td>
          <td>{{ $item->quantity }}</td>
        </tr>
      @endforeach

      </tbody>
    </table>
    {{ $products->links() }}
    {{-- END OF TABLE INVENTORY --}}






  </div>

</div>




<hr>
<div class="row">
  <div class="col">
      <div class="card" Style="width:100%;">
        <div class="card-header bg-navy">

         :: DATE COVERED
        </div>
        <div class="card-body row input-daterange ">
            <div class="col-md-4">
              <input type="text" name="from_date" id="from_date" class="btn-dtpicker form-control btn btn-primary" placeholder="From" style="color: #001f3f;" readonly />
            </div>
            <div class="col-md-4 text-center">
                <input type="text" name="to_date" id="to_date" class="btn-dtpicker form-control btn btn-primary" placeholder="To"  style="color: #001f3f;" readonly />
            </div>
            <div class="col">
                <button type="button" name="filter" id="filter" class=" btn btn-block btn-primary mr-5">Go</button>

            </div>
            <div class="col">
              <button type="button" name="refresh" id="refresh" class=" btn btn-block btn-success">Refresh</button>
            </div>
        </div>

    </div>
  </div>
</div>

<hr>

  <div class="table-responsive mt-5">
    <table class="table table-bordered table-striped table-fixed" id="order_table">
           <thead>
            <tr>
                <th>Order Number</th>
                <th>Customer Name</th>
                <th>Number of Item</th>
                <th>Is Paid</th>
                {{-- {{$orders}} --}}

                <th>Total</th>
                <th>Date Ordered</th>
            </tr>
           </thead>
           <tbody></tbody>



       </table>
       {{csrf_field()}}
   </div>
  @endsection

  @section('javascripts')
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    {{-- <script src=" https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>

    <script>

        $(document).ready(function(){



                $('.input-daterange').datepicker({
                todayBtn:'linked',
                dateFormat:'yyyy-mm-dd',
                autoclose:true
                });


                load_data();

                function load_data(from_date = '', to_date = '') {
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
                            { data:'created_at', render: function(data){
                                return moment(data).format('MM-DD-YYYY');
                                } }
                        ]
                    });
                }






                $('.filter-input').keyup(function() {
                $('#order_table').column( $(this).data('column') )
                .search( $(this).val() )
                .draw();
                });


                $('#filter').click(function(){
                    var from_date = $('#from_date').val();
                    var to_date = $('#to_date').val();
                    if(from_date != '' &&  to_date != '') {
                    $('#order_table').DataTable().destroy();
                        load_data(from_date, to_date);
                    } else  {
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
