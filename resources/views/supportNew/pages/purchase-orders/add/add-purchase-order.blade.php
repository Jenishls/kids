<style>
    .bootstrap-select .dropdown-toggle .caret {
        position: absolute;
        top: 50%;
        right: 12px;
        margin-top: -2px;
        vertical-align: middle;
    }
</style>
<div class="kt-portlet__body" style=" padding:0px !important;border-top: 2px solid #41bcf6;border-radius: 5px;"> 
    <div style="">
        <div class="kt-portlet__body" style="padding:25px;padding-bottom:25px !important;">
            <div class="row">
                <div class="col-xl-4"></div>     
                <div class="col-xl-4">
                    <div class="form-group col-12">
                        <span class="btn portlet_label" style="position:relative !important;margin: 0 auto !important; left:0%!important;top:18px!important;">Select Vendor</span>
                        <div class="shadow_inputs" style="padding-top:1.5rem;">
                            <div class="form-group row" style="padding-top:10px;">
                                <div class="col-lg-3 col-sm-3">
                                    
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <select name="supplier" id="supplierCompany">
                                        <option>Select Vendor</option>
                                        @foreach ($companies as $company)
                                            <option value="{{$company->id}}">{{ucfirst($company->c_name)}}</option>
                                        @endforeach
                                        {{-- <option value="Office">Office Phone</option>
                                        <option value="Telephone">Telephone</option>
                                        <option value="Home">Home</option> --}}
                                    </select> 
                                    {{-- <div class="errorMessage"></div> --}}
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>     
                <div class="col-xl-4">
                    <span style="position:relative;left:86%;">
                        <button class="btn btn-pill btn-warning pageload" data-route="/admin/purchaseorder"><i class="la la-arrow-left"></i>back</button>
                    </span>
                </div>     
            </div>                   
        </div>
    </div>
    <div id="appendedForm"></div>
</div>
<script>
    $('#supplierCompany').selectpicker({
        liveSearch:true,
        showTick:true,
        actionsBox:true,
        template: {
            caret: '<span class="caret"></span>'
        },
        showIcon: true,
        dropupAuto: true,
    });

    $("#supplierCompany").on("change", function(e) {
    var val = $(this).val();
    supportAjax(
        {
            url: `/admin/purchaseorder/appendaddform/${val}`
        },
        function(resp) {
            $("#appendedForm")
                .empty()
                .append(resp);
            initTaxSelect();
        }
    );
});
var purchase_order_grand_total = 0;
var tax_value = 0;
function calculate_sub_total(){
    let qty_el = document.querySelectorAll('input[name="billed_amt[]"]');
    let sub_total = 0;
    let grand_total = 0;
    $.each(qty_el, function(i, data){
        sub_total+=parseFloat($(data).val());
    });
    $('input[name="subtotal"]').val(sub_total.toFixed(2));
    $('input[name="po_subtotal"]').val(sub_total.toFixed(2));
    let taxes = document.querySelectorAll('.selectTax');
    grand_total = sub_total;
    $.each(taxes, function(i, data){
        if($(data).val()!== 'Select Tax'){
            let tax_id = $(data).val();
            supportAjax({
                url: `/admin/purchaseorder/taxes/${tax_id}`
            }, function(resp){
                if(resp.is_percentage === 1){
                    tax_value = (grand_total*resp.value)/100
                    grand_total += tax_value;
                }else{
                    tax_value = resp.value;
                    grand_total += parseInt(resp.value);
                }
                tax_value = tax_value || 0;
                purchase_order_grand_total = grand_total;
                purchase_order_grand_total = purchase_order_grand_total || 0;
                $('input[name="total"]').val(purchase_order_grand_total.toFixed(2));
                $(data).parent().next().children('input[name="tax_value[]"]').val(tax_value.toFixed(2));
                $(data).parent().next().children('input[name="tax[]"]').val(tax_value.toFixed(2));
                $('input[name="po_total"]').val(purchase_order_grand_total.toFixed(2));
            })
        }else{
            grand_total = grand_total || 0;
            $('input[name="total"]').val(grand_total.toFixed(2));
            $('input[name="po_total"]').val(grand_total.toFixed(2));
        }
        // grand_total+=parseFloat($(data).val());
    });
}
</script>