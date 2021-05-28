@extends('layouts.admin')


@section('content')
{{-- <h2>Checkout</h2> --}}
@php
    $fmt = new NumberFormatter( 'en_PHP', NumberFormatter::CURRENCY );
@endphp
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item "  aria-current="page"><a href="{{ route('overview') }}">Production Overview</a></li>
        <li class="breadcrumb-item active" aria-current="page">Estimator</li>

    </ol>

</nav>
<div class="container table-responsive">

        

    <div class="row">

        <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <span class="text-muted">Raw Material Estimates</span>

                    </div>
                    <div class="card-body">

                        <div class="card mb-4">
                            <div class="card-header bg-navy">
                                REQUIREMENT DETAILS
                            </div>
                            <div class="card-body">
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
                                            <label for="req_qty">Quantity (pcs)</label>
                                            <input type="number" class="form-control" id="req_qty" name="req_qty" disabled="disabled" placeholder="Input required quantity here"required>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <select class="capacity_value form-control" id="capacity_value" disabled="disabled">
                                                    <option value="excluded" selected="selected">Select Product Here</option>
                                                    <option value="3.78">3.78L</option>
                                                    <option value="3.2">3.2L</option>
                                                    <option value="1">1L</option>
                                                    <option value=".5">500ml</option>
                                                    <option value=".25">250ml</option>
                                                    <option value=".1">100ml</option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="required_mat">Total Required Material (Liters)</label>
                                                <input type="number" class="form-control" id="required_mat" name="required_mat" readonly required>
                                            </div>
                                    </div>
                        </div>
                    </div>
                    <div class="card-footer">
                         <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="card">
                                    <div class="card-header bg-green">
                                        RAW MATERIALS REQUIREMENT BREAKDOWN (Liters)
                                    </div>
                                    <div class="card-body">

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="input_alcohol_computed">Alcohol (70%)</label>
                                                <input type="number" class="form-control" id="alcohol_computed" name="alcohol_computed" readonly required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="input_scent">Scent (0.1%)</label>
                                                <input type="number" class="form-control" id="scent_computed" name="scent_computed" readonly required>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="input_water">Water (29.9%) </label>
                                                <input type="number" class="form-control" id="water_computed" name="water_computed" readonly required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="card">
                                    <div class="card-header bg-gray">
                                        PACKAGING MATERIALS REQUIREMENT BREAKDOWN (Pcs)
                                    </div>
                                    <div class="card-body">

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="input_alcohol_computed">Number Of Boxes</label>
                                                <input type="number" class="form-control" id="boxes" name="boxes" readonly required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="input_scent">Number of Seals</label>
                                                <input type="number" class="form-control" id="seals" name="seal" readonly required>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="input_water">Number of Stickers</label>
                                                <input type="number" class="form-control" id="stickers" name="stickers" readonly required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- card --}}

        </div>
    </div>
    {{-- <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="card">
                <div class="card-header bg-green">
                    RAW MATERIALS REQUIREMENT BREAKDOWN (Liters)
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="input_alcohol_computed">Alcohol (70%)</label>
                            <input type="number" class="form-control" id="alcohol_computed" name="alcohol_computed" readonly required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="input_scent">Scent (0.1%)</label>
                            <input type="number" class="form-control" id="scent_computed" name="scent_computed" readonly required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="input_water">Water (29.9%) </label>
                            <input type="number" class="form-control" id="water_computed" name="water_computed" readonly required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="card">
                <div class="card-header bg-gray">
                    PACKAGING MATERIALS REQUIREMENT BREAKDOWN (Pcs)
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="input_alcohol_computed">Number Of Boxes</label>
                            <input type="number" class="form-control" id="boxes" name="boxes" readonly required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="input_scent">Number of Seals</label>
                            <input type="number" class="form-control" id="seals" name="seal" readonly required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="input_water">Number of Stickers</label>
                            <input type="number" class="form-control" id="stickers" name="stickers" readonly required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


        

</div>

{{-- container --}}

@endsection

@section('javascripts')
    <script>

        //$('input[name=raw_mat]').change(function (e) {
         //$('#out_put_value').val(e.target.value)




         $(function () {
            $("input[name='raw_mat']").click(function () {
                if ($("#rd_iso").is(":checked")) {
                    $("#req_qty").removeAttr("disabled");
                    $("#capacity_value").removeAttr("disabled");

                    $("#btn_save").removeAttr("disabled");
                   // $("#txtEthyl").attr("disabled", "disabled");
                    $('input[type="number"]').val("");
                    $("#rd_selected").val("iso");
                    $("#alcohol_amount").focus();
                }

                if ($("#rd_ethyl").is(":checked")) {
                    $("#req_qty").removeAttr("disabled");
                    $("#capacity_value").removeAttr("disabled");

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

         $(".capacity_value").change(function() {
             // alert(this.value);
            //var $tr = $(this).closest("tr");
            //$tr.find("td:eq(7) span").css("color", "blue").text(this.value);

            // Those are columns 5 and 6
               // var total_liters = $(this).parent().parent().find("#total_liters").text();


                //document.getElementById('product_quantity').firstChild.data = Number(total_liters / this.value).toFixed(0);
                //alert(nomePessoa);
                var reqQty          = document.getElementById('req_qty').value;
                var requiredObj     = document.getElementById('required_mat');

                var divobj          = document.getElementById('alcohol_computed');
                var waterObj        = document.getElementById('water_computed');
                var scentObj        = document.getElementById('scent_computed');

                var boxObj          = document.getElementById('boxes');
                var sealObj         = document.getElementById('seals');
                var stickerObj      = document.getElementById('stickers');


                requiredObj.value   = Math.round(this.value * reqQty,2);
                divobj.value        = Math.round(requiredObj.value * (.7),2);
                scentObj.value      = Math.round(requiredObj.value * (.1),2);
                waterObj.value      = Math.round(requiredObj.value * (.299),2);

                sealObj.value       = Math.round(reqQty, 2);
                stickerObj.value    = Math.round(reqQty, 2);


                switch(this.value){
                    case '3.78':
                        boxObj.value  = Math.round(reqQty / 12, 2);
                        break;

                    case '3.2':
                        boxObj.value = Math.round(reqQty / 12, 2);
                        break;

                    case '.25':
                        boxObj.value = Math.round(reqQty / 60, 2);
                        break;

                    case '.1':
                        boxObj.value = Math.round(reqQty / 63, 2);
                        break;

                    case '.5':
                        boxObj.value = Math.round(reqQty / 36, 2);
                        break;

                    default:
                }



        });

    </script>
@endsection
