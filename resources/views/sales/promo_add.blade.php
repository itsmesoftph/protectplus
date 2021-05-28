@extends('layouts.sales')

@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Promo Settings</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('sales.promo')}}">Home</a></li>
            <li class="breadcrumb-item active">Create Promo</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-12">
            <div class="card">
                <div class="card-header bg-navy">
                    CREATE PRODUCT PROMO
                </div>
                <div class="card-body">
                    <form action="{{ route('sales.promo.create') }}" method="post">
                        @foreach ($product_details as $product)

                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" value="{{ $product->name }}" aria-describedby="emailHelp" readonly>
                        </div>
                        <div class="form-group">
                            <label for="product_code">Product Code</label>
                            <input type="text" class="form-control" id="product_code" value="{{ $product->product_code }}" aria-describedby="emailHelp" readonly>
                        </div>
                        <div class="form-group">
                            <label for="product_code">Product Description</label>
                            <input type="text" class="form-control" id="product_description" value="{{ $product->description }}" aria-describedby="emailHelp" readonly>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                @if ($product->is_sale == 'yes')

                                    <label class="form-check-label" for="chk_sale">
                                        <input class="form-check-input" type="checkbox" value="sale" id="chk_sale" checked>
                                        On Sale (%)
                                    </label>
                                    <input type="number" class="form-check-input ml-2" name="chk_input_discount" id="chk_input_discount" value="{{ $product->discount_rate }}">
                                    <input type="hidden" id="chk_status" class="float-right" name="chk_status" value="yes">

                                @else
                                    <label class="form-check-label" for="chk_sale">
                                        <input class="form-check-input" type="checkbox" value="" id="chk_sale" >

                                        On Sale (%)
                                    </label>
                                    <input type="number" class="form-check-input ml-2" name="chk_input_discount" id="chk_input_discount" disabled="disabled" value="0">
                                    <input type="hidden" class="form-check-input mt-2" id="chk_status" name="chk_status">
                                    <input type="hidden" class="form-check-input mt-2" id="product_id" name="product_id">

                                @endif

                            </div>


                            {{-- <input type="number" class="form-check-input ml-2" name="chk_input_discount" id="chk_input_discount" disabled="disabled"> --}}
                            <input type="hidden" id="featured_value" name="featured_value" value="{{ $product->is_featured}}">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        </div>


                        @endforeach
                        {{ csrf_field() }}
                        <a href="{{ route('sales.promo') }}" class="btn btn-warning float-right mt-4 ml-4" >Cancel</a>

                        <button type="submit"  id="btn_save" class="btn btn-primary float-right mt-4">Save</button>

                    </form>
                </div>

            </div>
    </div>

</div>




@endsection

@section('javascripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>




@endsection
@push('scripts')
    <script>
         var sel = document.getElementById('product_code');
 $('#product_code').change(function () {
    var product_description = $(this).find(':selected').data('description');
    document.getElementById('product_description').value = product_description;
  });

 var sel = document.getElementById('pc_code');
 $('#pc_code').change(function () {

    var product_description = $(this).find(':selected').data('description');
    var product_capacity = $(this).find(':selected').data('size');

    document.getElementById('product_description').value = product_description;
    document.getElementById('product_capacity').value = product_capacity;
  });



    // REFERE TO THIS FOR ADDING BUTTON IN TABLE ROW
    // https://stackoverflow.com/questions/22471862/how-do-i-add-button-on-each-row-in-datatable



        function auto_calculate(val){

                var total_litters = $(this).parent().parent().find("#total_liters").text();
                var capacityObj =  document.getElementById('capacity').value;
                var quantityObj =  document.getElementById('quantity').value;


                document.getElementById('total_liters').firstChild.data = Number(total_litters = quantityObj * quantityObj).toFixed(0);


        }


         $(".capacity_value").change(function() {

                      var total_liters = $(this).parent().parent().find("#total_liters").text();


                      document.getElementById('product_quantity').firstChild.data = Number(total_liters = $(this).parent().parent().find("#total_liters").text() / this.value).toFixed(0);

                });


        // $('.mydatatable').DataTable();

        $(function(){
            $('#product_select').on('change', function () {
                var id = $(this).val(); // get selected value
                if (id) {
                    window.location = "/sales_get_product/"+id;
                }
                return false;
            });
        });


    document.getElementById('chk_sale').onchange = function() {
        document.getElementById('chk_input_discount').disabled = !this.checked;
        if(document.getElementById('chk_sale').checked){
            document.getElementById('chk_status').value = "yes";
        }else{
        document.getElementById('chk_status').value = "no";
         document.getElementById('chk_input_discount').value = 0;

        }

    };

    document.getElementById('chk_fatured').onchange = function() {
        document.getElementById('featured_option').disabled = !this.checked;
        if(document.getElementById('chk_fatured').checked){
            document.getElementById('chk_is_featured').value = "yes";
        }else{
        document.getElementById('chk_is_featured').value = "no";
        document.getElementById('featured_option').value="default";

        }

    };

    </script>
@endpush
