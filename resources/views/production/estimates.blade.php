@extends('layouts.app')


@section('content')
{{-- <h2>Checkout</h2> --}}
@php
    $fmt = new NumberFormatter( 'en_PHP', NumberFormatter::CURRENCY );
@endphp
<div class="container">

     <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "  aria-current="page"><a href="{{ route('inventory') }}">Production Oveview</a></li>
            <li class="breadcrumb-item active" aria-current="page">Raw Material Estimates</li>

        </ol>

    </nav>

     <div class="row justify-content-center">

  {{-- {{$cartItems}} --}}




      <div class="col-md-8 order-md-1">
        <div class="card">
            <div class="card-header">
                <span class="text-muted">Raw Material Estimates</span>
            </div>
            <div class="card-body">

                    <form action="{{ route('estimates.store') }}" method="post" enctype ="multipart/form-data">

                        @csrf

                                 <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-3 pt-0">Alcohol Type</legend>
                                        <div class="col-sm-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="raw_mat" id="rd_iso" value="Iso" >
                                                <label class="form-check-label" for="rdIso">
                                                    ISOPROPYL
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="raw_mat" id="rd_ethyl" value="Ethyl">
                                                <label class="form-check-label" for="rd_ethyl">
                                                    ETHYL
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </fieldset>
                                {{-- end fieldset --}}

                                <div class="form-row">
                                       <div class="form-group col-md-12">
                                            <label for="input_Amount">Amount (Liters)</label>
                                            <input type="number" class="form-control" id="alcohol_amount" name="alcohol_amount" onchange="auto_calculate(this.value)" disabled="disabled" required>
                                        </div>

                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="input_alcohol_computed">Amount with Specific Gravity</label>
                                            <input type="number" class="form-control" id="alcohol_computed" name="alcohol_computed" readonly required>
                                        </div>
                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="input_scent">Scent</label>
                                            <input type="number" class="form-control" id="scent_computed" name="scent_computed" readonly required>
                                        </div>
                                </div>

                                <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="input_water">Water</label>
                                            <input type="number" class="form-control" id="water_computed" name="water_computed" readonly required>
                                        </div>
                                </div>


                                <input type="hidden" id="rd_selected" name="rd_selected">

                                <button type="submit" class="btn btn-primary  mt-4" disabled="disabled" id="btn_save">Save</button>
                                <a href="{{route('inventory')}}" class="btn btn-primary  mt-4">Cancel</a>



                    </form>
            </div>
            {{-- end card body --}}
            <div class="card-footer">
                <span class="text-muted">Click outside the "Amount (Liters")" to perform auto-compute </span>
            </div>
        </div>

      </div>
  </div>
</div>

@endsection

@section('javascripts')
    <script>

        //$('input[name=raw_mat]').change(function (e) {
         //$('#out_put_value').val(e.target.value)




         $(function () {
            $("input[name='raw_mat']").click(function () {
                if ($("#rd_iso").is(":checked")) {
                    $("#alcohol_amount").removeAttr("disabled");
                    $("#btn_save").removeAttr("disabled");
                   // $("#txtEthyl").attr("disabled", "disabled");
                    $('input[type="number"]').val("");
                    $("#rd_selected").val("iso");
                    $("#alcohol_amount").focus();
                }

                if ($("#rd_ethyl").is(":checked")) {
                    $("#alcohol_amount").removeAttr("disabled");
                    $("#btn_save").removeAttr("disabled");
                   // $("#txtIso").attr("disabled", "disabled");
                    $('input[type="number"]').val("");
                    $("#rd_selected").val("ethyl");
                    $("#alcohol_amount").focus();
                }


            });
        });



        function auto_calculate(val){

            if(document.getElementById('rd_selected').value == "iso"){
                var isoVal = val * .7866;
                var waterVal= (isoVal/70) * 29.9;
                var scentVal = isoVal/ 70;
                var divobj =  document.getElementById('alcohol_computed');
                var waterObj = document.getElementById('water_computed');
                var scentObj = document.getElementById('scent_computed');

                divobj.value = Math.round(isoVal,3);
                waterObj.value = Math.round(waterVal,2);
                scentObj.value = Math.round(scentVal,2);



            } else {
                var ethylVal = val * .8104;
                var waterVal= (ethylVal/70) * 29.9;
                var scentVal = ethylVal/ 70;
                var divobj =  document.getElementById('alcohol_computed');
                var waterObj = document.getElementById('water_computed');
                var scentObj = document.getElementById('scent_computed');

                divobj.value = Math.round(ethylVal,3);
                waterObj.value = Math.round(waterVal,2);
                scentObj.value = Math.round(scentVal,2);
            }

        }

    </script>
@endsection
