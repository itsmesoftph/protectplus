@extends('layouts.admin')

@section('styles')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" /> --}}
@endsection

@section('content')
<ol class="breadcrumb mt-4">
        {{-- <li class="breadcrumb-item "  aria-current="page"><a href="{{ route('inventory') }}">Dashboard</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>

    </ol>
<div class="container table-repsonsive">
 @php
    $fmt = new NumberFormatter( 'en_PHP', NumberFormatter::CURRENCY );
@endphp


<div class="card">

    <div class="card-header bg-navy">
        DASHBOARD OVERVIEW

    </div>

    <div class="card-body">
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

    </div>
</div>


  @endsection

  @section('javascripts')
     {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}

    {{-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src=" https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script> --}}


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



                $(".ethyl_capacity_value").change(function() {
                    //var $tr = $(this).closest("tr");
                    //$tr.find("td:eq(7) span").css("color", "blue").text(this.value);

                    // Those are columns 5 and 6
                      var total_liters = $(this).parent().parent().find("#ethyl_total_liters").text();


                      document.getElementById('ethyl_product_quantity').firstChild.data = Number(total_liters / this.value).toFixed(0);
                      //alert(nomePessoa);

                });


                $(".capacity_value").change(function() {
                    //var $tr = $(this).closest("tr");
                    //$tr.find("td:eq(7) span").css("color", "blue").text(this.value);

                    // Those are columns 5 and 6
                      var total_liters = $(this).parent().parent().find("#total_liters").text();


                      document.getElementById('product_quantity').firstChild.data = Number(total_liters / this.value).toFixed(0);
                      //alert(nomePessoa);

                });


        });
</script>
  @endsection
