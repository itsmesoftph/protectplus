@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "  aria-current="page"><a href="{{ route('overview') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sales Summary</li>

        </ol>

    </nav>
<div class="container table-repsonsive">
      <div class="card" Style="width:100%;">
        <div class="card-header bg-navy">

         :: DATE COVERED
        </div>
        <div class="card-body row input-daterange ">
            <div class="col-md-4">
              <input type="text" name="from_date" id="from_date" data-provide="datepicker" class="btn-dtpicker form-control btn btn-primary" placeholder="From" style="color: #001f3f;" readonly />
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

<hr>
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

 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>



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
