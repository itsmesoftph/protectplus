@extends('layouts.sales')

@section('content')
<div class="container table-responsive">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item "  aria-current="page"><a href="{{ route('inventory') }}">Production Oveview</a></li> --}}
            <li class="breadcrumb-item " aria-current="page"><a href="{{route('sales.promo')}}">Product Promo and Discounts</a></li>
            <li class="breadcrumb-item active"  aria-current="page">Update Promo Setting(s)</li>
        </ol>

    </nav>

    <div class="row justify-content-md-center">

        <div class="col-xs-12 col-md-6">
            <div class="card">
                <div class="card-header bg-navy">
                    CREATE FEATURED PRODUCT
                </div>
                <div class="card-body">
                    <form action="{{ route('sales.create-featured-product') }}" method="post">
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

                            {{-- <div class="form-group">
                                <div class="form-check">
                                    @if ($product->is_sale == 'yes')

                                        <label class="form-check-label" for="chk_sale">
                                            <input class="form-check-input" type="checkbox" value="" id="chk_sale" checked>
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

                                    @endif

                                </div>


                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                            </div> --}}

                            <div class="form-group">
                                @if ($product->is_featured != null)

                                    <div class="form-check">
                                            <label class="form-check-label mb-2">
                                                <input type="checkbox" class="form-check-input" name="chk_fatured" id="chk_fatured" value="checkedValue" checked >
                                                Make featured product
                                            </label>
                                            <select class="form-control" id="featured_option" name="featured_option">
                                                <option value="default" selected>Select Feature Option</option>
                                                <option value="hot" {{ $product->is_featured == 'hot' ? 'selected' : '' }}>Hot Products</option>
                                                <option value="new" {{ $product->is_featured == 'new' ? 'selected' : '' }}>New Products</option>
                                                {{-- <option value="sale" {{ $product->is_featured == 'sale' ? 'selected' : '' }}>Discounted Products</option> --}}


                                            </select>

                                            <input type="hidden" id="chk_is_featured" name="chk_is_featured" value="{{$product->is_featured}}">

                                    </div>
                                    <div class="form-group">
                                        <label for="product_code">Discount Rate</label>
                                        @if ($product->discount_rate != null)
                                        <input type="number" class="form-control" id="chk_input_discount" name="chk_input_discount" value="{{ $product->discount_rate}}" aria-describedby="emailHelp" readonly>
                                        <input type="hidden" id="chk_status" class="float-right" name="chk_status" value="yes">

                                        @else
                                        <input type="number" class="form-control" id="chk_input_discount" name="chk_input_discount" value="0" aria-describedby="emailHelp" readonly>
                                        <input type="hidden" id="chk_status" class="float-right" name="chk_status" value="no">

                                        @endif
                                    </div>

                                @else
                                    <div class="form-check">
                                        <label class="form-check-label mb-2">
                                            <input type="checkbox" class="form-check-input" name="chk_fatured" id="chk_fatured" value="checkedValue" >
                                            Make featured product
                                        </label>
                                        <select class="form-control" id="featured_option" name="featured_option" disabled="disabled">
                                            <option value="default" selected>Select Feature Option</option>
                                            <option value="hot">Hot Products</option>
                                            <option value="new">New Products</option>
                                            {{-- <option value="sale">Discounted Products</option> --}}


                                        </select>
                                        <label class="form-check-label mt-4">
                                            Discount Rate (%)

                                            <input type="number" class="form-control mt-3" name="chk_input_discount" id="chk_input_discount" value="{{ $product->discount_rate}}" readonly >
                                        </label>


                                    </div>


                                    <input type="hidden" class="form-check-input mt-5 ml-2" id="chk_is_featured" name="chk_is_featured" valu="no">
                                    <input type="hidden" id="chk_status" class="float-right" name="chk_status" value="">

                                @endif
                                <input type="hidden" id="featured_value" name="featured_value" value="{{ $product->is_featured}}">

                            </div>
                        {{-- <div class="form-group">
                            <input type="text" class="form-control" name="chk_input_discount" id="chk_input_discount " placeholder="discount percentage" aria-describedby="emailHelp" disabled="disabled">
                        </div> --}}

                                <input type="hidden" id="product_id" name="product_id" value="{{ $product->id}}">


                        {{ csrf_field() }}
                        <a href="{{ route('sales.promo') }}" class="btn btn-warning float-right mt-4 ml-4" >Back ></a>
                        @if ($product->is_featured != null)

                            <button type="submit"  id="btn_save" class="btn btn-primary float-right mt-4" >Save</button>
                        @else
                            <button type="submit"  id="btn_save" class="btn btn-primary float-right mt-4" disabled="disabled" >Save</button>

                        @endif

                         @endforeach
                    </form>
                </div>

            </div>
            {{-- <div class="card">
                <div class="card-header">
                    Promo Details
                </div>
                <div class="card-body">
                </div>
            </div> --}}
        </div>

    </div>




</div>
@endsection

@section('javascripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>



    <script>

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


    document.getElementById('chk_fatured').onchange = function() {
         document.getElementById('featured_option').disabled = !this.checked;
         document.getElementById('btn_save').disabled = !this.checked;
        if(document.getElementById('chk_fatured').checked){

            document.getElementById('chk_is_featured').value = "yes";


        }else{
            document.getElementById('chk_is_featured').value = "no";
            document.getElementById('featured_option').value="default";
            $("#chk_input_discount").attr("disabled","disabled");
            //$("#chk_input_discount").val('0');
        }



    };

     $(function() {
         $("#featured_option").change(function () {
            if($(this).val()=="sale"){
               // document.getElementById('chk_input_discount').disabled = !this.checked;
               $("#chk_input_discount").removeAttr("disabled");
               $("#chk_status").val("yes");
               $("#chk_input_discount").focus();
            }else{
               $("#chk_input_discount").attr("disabled","disabled");
                //$("#chk_input_discount").val('0');
                $("#chk_status").val("no");
            }
         });
     });
    </script>
@endsection
