@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item "  aria-current="page"><a href="{{ route('overview') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Production Estimates</li>

    </ol>

</nav>
<div class="container table-repsonsive">
 @php
    $fmt = new NumberFormatter( 'en_PHP', NumberFormatter::CURRENCY );
@endphp
   <div class="card px-2 py-2  mb-4">
            <div class="card-header bg-navy">
                ISOPROPYL ALCOHOL DETAILS
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered mb-4 ">
                    <thead>
                    <tr class="bg-gray">
                        <td colspan="8">ISOPROPYL RAW MATERIALS ESTIMATES</td>
                    </tr>
                        <tr>

                            <th>Name</th>
                            <th>Date</th>
                            <th>Quantity (Liters)</th>
                            <th>Quantity With Specific Gravity (Liters)</th>
                            <th>Scent</th>
                            <th>Water</th>
                            <th>Approximate Output (Liters) </th>
                            <th>Remaining Materials (Liters)</th>


                        </tr>
                    </thead>
                    <tbody>
                    @foreach ( $isoEstimates as $estimate )
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
                            <td>{{ $estimate->total_liters }}</td>
                            <td >{{ $estimate->cur_val}}</td>

                        </tr>

                        @endforeach

                    </tbody>
                </table>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td class="bg-green" colspan="3">Isopropyl Computation Reference </td>
                        </tr>
                        <tr>
                            <th>Remaining Material (Liters)</th>
                            <th>Approximate Output (pcs)</th>
                            <th>Product Capacity (pcs)

                        </tr>
                    </thead>
                    <tbody>
                    @foreach ( $isoEstimates as $estimate )
                        <td id="total_liters" class="bg-navy">{{$estimate->cur_val}}</td>
                            <td  id="product_quantity">0</td>
                            <td>
                                <select class="capacity_value" id="capacity_value">
                                        <option value="excluded" selected="selected">Select Product Here</option>
                                        <option value="3.78">3.78L</option>
                                        <option value="3.2">3.2L</option>
                                        <option value="1">1L</option>
                                        <option value=".5">500ml</option>
                                        <option value=".25">250ml</option>
                                        <option value=".1">100ml</option>
                                </select>
                            </td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    <div class="card px-2 py-2 mb-4">

        <div class="card-header bg-navy">
            ETHYL ALCOHOL DETAILS
        </div>
        <div class="card-body">
            {{-- ETHYL ALCOHOL --}}
            <table class="table table-striped table-bordered mb-4 ">
                <thead>
                <tr class="bg-gray">
                    <td colspan="8">ETHYL RAW MATERIALS ESTIMATES</td>
                </tr>
                    <tr>

                        <th>Name</th>
                        <th>Date</th>
                        <th>Quantity (Liters)</th>
                        <th>Quantity With Specific Gravity (Liters)</th>
                        <th>Scent</th>
                        <th>Water</th>
                        <th>Approximate Output (Liters) </th>
                        <th>Remaining Materials (Liters)</th>


                    </tr>
                </thead>
                <tbody>
                @foreach ( $ethylEstimates as $ethyl_estimate )
                        @php
                            $createdAt = strtotime($ethyl_estimate->created_at)
                        @endphp

                    <tr>
                        <td scope="row">{{$ethyl_estimate->mat_name}}</td>
                        <td>{{date('m-d-y', $createdAt)}}</td>
                        <td>{{$ethyl_estimate->mat_value}}</td>
                        <td>{{$ethyl_estimate->mat_value_sg}}</td>
                        <td scope="row">{{$ethyl_estimate->mat_scent}}</td>
                        <td>{{$ethyl_estimate->mat_water}}</td>
                        <td>{{ $ethyl_estimate->total_liters }}</td>
                        <td >{{ $ethyl_estimate->cur_val}}</td>

                    </tr>

                    @endforeach

                </tbody>
            </table>

            {{-- ETHYL ALCOHOL CONVERSION --}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td class="bg-red" colspan="3">Ethyl Computation Reference </td>
                    </tr>
                    <tr>
                        <th>Remaining Material (Liters)</th>
                        <th>Approximate Output (pcs)</th>
                        <th >Product Capacity (Liters)

                    </tr>
                </thead>
                <tbody>
                    @foreach ( $ethylEstimates as $ethyl_estimate )
                        <td id="ethyl_total_liters" class="bg-navy">{{$ethyl_estimate->cur_val}}</td>
                        <td  id="ethyl_product_quantity">0</td>
                        <td>
                            <select class="ethyl_capacity_value" id="ethyl_capacity_value">
                                    <option value="excluded" selected="selected">Select Product Here</option>
                                    <option value="3.78">3.78L</option>
                                    <option value="3.2">3.2L</option>
                                    <option value="1">1L</option>
                                    <option value=".5">500ml</option>
                                    <option value=".25">250ml</option>
                                    <option value=".1">100ml</option>
                            </select>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- /.card-body --}}
    </div>

    <div class="card px-2 py-2 mb-4">
        <div class="card-header bg-navy">
            PACKAGING MATERIALS ESTIMATES
        </div>
        <div class="card-body">
                <table class="table table-bordered ">
                    <thead>

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
            </div>
        </div>
    </div>

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
