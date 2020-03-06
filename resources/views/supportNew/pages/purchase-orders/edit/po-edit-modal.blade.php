<div class="modal-dialog addClientModalDialog" role="document" style="margin-left:16%;">
    <div class="modal-content addClientModal modal-1300">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Invoice</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:10px !important;">
            <div class="row" style="margin-left:0px;margin-right:0px;">
                <div class="col-sm-12 kt-portlet" style="margin-bottom: 0px;">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Invoice Detail
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <form id="editInvoiceForm" data-provider-type="Service Provider">
                {{-- {{dd(auth()->user()->client)}} --}}
                <div class="row m-t-20" style="padding-bottom: 3.5rem;">
                    <div class="col-sm-12">
                        <div class="accordion  accordion-toggle-arrow" id="accordionExample4">
                            <div class="card mb-20" style="border-radius:4px !important;">
                                <div class="card-header" id="headingOne4">
                                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="false" aria-controls="collapseOne4">
                                        <div class="row" style="width:80%;">
                                            <div class="form-group col-xl-3 col-sm-6">
                                                <label class="kt-font-bolder" style="color:#505054">Vendor Name:</label>
                                                <div class="input-group">
                                                
                                                    <input type="text" value="{{$company->c_name}}" class="form-control" name="c_name" disabled>
                                                    <input type="text" value="{{$company->id}}" name="vendor_id" hidden>
                                                    {{-- <input type="text" value="{{$requested}}" name="requested_id" hidden> --}}
                                                </div>
                                            </div>
                                            <div class="form-group col-xl-2 col-sm-6">
                                                <label class="kt-font-bolder" style="color:#505054">PO Date</label>
                                                <div class="input-group" >
                                                    <input type="date" id="inv_date" class="form-control" name="date" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group col-xl-2 col-sm-6">
                                                <label class="kt-font-bolder" style="color:#505054">PO Number</label>
                                                <div class="input-group" >
                                                    <input type="text" class="form-control" value="{{$order->po_number}}"  name="inv_no" disabled>
                                                    <input type="text" class="form-control" value="{{$order->po_number}}"  name="po_number" hidden>
                                                </div>
                                            </div>
                                            <div class="form-group col-xl-2 col-sm-6">
                                                <label class="kt-font-bolder" style="color:#505054">Expiry Date</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="{{\Carbon\Carbon::parse($order->delivery_date)->format('m/d/Y')}}" name="exp_date" id="expiryDate">
                                                </div>
                                            </div>
                                            <div class="form-group col-xl-2 col-sm-6">
                                                <label class="kt-font-bolder" style="color:#505054">Update Status</label>
                                                <div class="input-group">
                                                    <select name="status" id="updateStatus">
                                                        <option value="" {{!$order->status?'selected':''}}>Select</option>
                                                        <option value="paid" {{$order->status === 'paid'? 'selected':''}}>Paid</option>
                                                        <option value="pending" {{$order->status === 'pending'? 'selected':''}}>Pending</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapseOne4" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample4" style="">
                                    <div class="card-body">
                                    
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card mb-20" style="border:1px solid #fafafa;border-radius:4px !important;padding:20px;">
                                
                                <table class="table" style="border-radius:4px;">
                                    <thead>
                                        <tr style="background: #fbce4496;">
                                            <th style="border-radius:4px 0px 0px 4px;width:30%;">Product</th>
                                            <th style="width:9%;">Qty</th>
                                            <th>Quoted Amt</th>
                                            <th>Approved Amt</th>
                                            <th>Amt Billed</th>
                                            <th style="border-radius:0px 4px 4px 0px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="prependTableRow">
                                        @foreach ($order->poItems as $item)
                                            <tr class="table_row_0">
                                                <td>
                                                    <div class="row">
                                                        <div class="col-sm-9 productLookup" data-count="1">
                                                            <input type="text" class="form-control" name="product_name[]" autocomplete="off" value="{{ucfirst($item->product->name)}}" placeholder="Select Product" disabled>
                                                             <input type="text" class="form-control" name="product_id[]" autocomplete="off" value="{{$item->product->id}}" hidden>
                                                            <input type="text" class="form-control" name="po_item_id[]" autocomplete="off" value="{{$item->id}}" hidden>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <button class="btn btn-sm btn-secondary btn-elevate-hover btn-circle btn-icon productLookup" data-count="1" data-container="body" data-toggle="kt-popover" data-placement="top" data-content="Product Lookup" data-original-title="" title="" aria-describedby="popover787089" style="cursor:pointer;">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-warning btn-elevate-hover btn-circle btn-icon orderExtra" data-count="1" data-container="body" data-toggle="kt-popover" data-placement="top" data-content="Extras Lookup" data-original-title="" title="" aria-describedby="popover787089" style="cursor:pointer;">
                                                                <i class="flaticon-add"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            
                                                <td>
                                                    <div class="row">
                                                        <div class="col-sm-11">
                                                            <input type="number" min="0" class="form-control" autocomplete="off" value="{{$item->total_quantity}}" name="qty[]">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-sm-11">
                                                            <input type="text" class="form-control" autocomplete="off"  name="quoted_amt[]" value="{{number_format($item->actual_price*$item->total_quantity,2)}}"  original-amt="{{$item->actual_price}}" style="text-align:right;">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-sm-11">
                                                            <input type="text" class="form-control" autocomplete="off" name="approved_amt[]" value="{{number_format($item->actual_price*$item->total_quantity,2)}}" style="text-align:right;">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-sm-11">
                                                            <input type="text" class="form-control" name="billed_amt[]" autocomplete="off"  value="{{number_format($item->estimate_price,2)}}" style="text-align:right;">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-success btn-secondary btn-elevate-hover btn-circle btn-icon addNewItem" data-id="0" style="color:brown">
                                                        <i class="la la-plus"></i>
                                                    </button>
                                                    {{-- <button class="btn btn-sm btn-secondary btn-elevate-hover btn-circle btn-icon po_rowremove" data-id="0" style="color:brown">
                                                        <i class="la la-remove"></i>
                                                    </button> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                                <hr style="margin-left:58%!important;">
                                <div class="subTotal">
                                    
                                    <div class="row taxRow_0" style="padding:0px 20px;">
                                        <div class="col-xl-9 col-sm-6 kt-align-right kt-font-bolder" style="padding-right:5px;padding-top:15px;">  <span style="float:left;"><button  class="btn btn-pill btn-brand addNewItem" data-id="1"><i class="la la-plus"></i>Add Item</button></span> Sub Total:</div>
                                        <div class="col-xl-2 col-sm-6" style="margin-left:2.2rem;padding-right:0px;">
                                            <input type="text" class="form-control" autocomplete="off" name="subtotal" disabled style="width:100%;text-align:right;">
                                            <input type="text" class="form-control" autocomplete="off" name="po_subtotal" hidden>
                                        </div>
                                        
                                    </div>
                                </div>
                                <hr style="margin-left:58%!important;">
                                <div class="taxField">
                                    <div class="row taxRow_0" style="padding: 0px 20px 0px 20px;">
                                        <div class="col-xl-7 col-sm-6 kt-align-right kt-font-bolder"></div>
                                        <div class="col-xl-2 col-sm-6" style="padding-left:0px;">
                                            <label for="" class="kt-font-bolder kt-align-right" style="width:100%;">Taxes</label>
                                            <select class="form-control selectTax" name="taxes[]" style="width:100%;">
                                                <option value="" onload="initTaxSelect()">Choose Tax</option>
                                                {{-- @foreach ($taxes as $tax)
                                                <option value="{{$tax->id}}">{{$tax->type}} ({{$tax->value}} @if($tax->is_percentage === 1)%@else$@endif)</option>
                                                @endforeach --}}
                                            </select>
                                            {{-- <input type="text" class="form-control" autocomplete="off" name="tax[]"> --}}
                                        </div>
                                        <div class="col-xl-2 col-sm-6" style="margin-left:2.2rem;padding-right:0px;">
                                            <label for="" class="kt-font-bolder kt-align-center">Tax Amount</label>
                                            <input type="text" class="form-control" autocomplete="off" name="tax[]" disabled style="width:100%;text-align:right;">
                                            <input type="text" class="form-control" autocomplete="off" name="tax_value[]" hidden>
                                        </div>
                                        <div class="col-xl-1 col-sm-1 kt-align-right" style="padding-top:2%;margin-left:-3rem;">
                                            <button class="btn btn-sm btn-secondary btn-elevate-hover btn-circle btn-icon" style="color:brown" id="newTaxField">
                                                <i class="la la-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr style="margin-left:58%!important;">
                                <div class="grandTotal">
                                    <div class="row taxRow_0" style="padding:20px 20px;">
                                        <div class="col-xl-9 col-sm-6 kt-align-right kt-font-bolder" style="padding-right:5px;padding-top:15px;">Grand Total:</div>
                                        <div class="col-xl-2 col-sm-6" style="margin-left:2.2rem;padding-right:0px;">
                                            <input type="text" class="form-control" autocomplete="off" name="total" disabled style="width:100%;text-align:right;">
                                            <input type="text" class="form-control" autocomplete="off" name="po_total" hidden>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row" style="padding:20px; padding-bottom:25px;">
                                    <div class="col-lg-6">
                                        {{-- <button  class="btn btn-pill btn-brand addNewItem" data-id="1"><i class="la la-plus"></i>Add Item</button> --}}
                                    </div>
                                    <div class="col-lg-6 kt-align-right">
                                        <button class="btn btn-pill btn-success" id="updatePurchaseOrder" data-id="{{$order->id}}"><i class="la la-upload"></i>Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#updateStatus').select2({
        width:'100%',
    });
    calculate_sub_total();
    $('input', 'select').change(function(){
        calculate_sub_total();
    });
    initTaxSelect();
    $('#inv_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        todayHighlight: true,
        locale: {
              format: 'YYYY-MM-DD'
        },
        templates: {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    });
    $('#expiryDate').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        todayHighlight: true,
        locale: {
              format: 'MM/DD/YYYY'
        },
        templates: {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    });
    
    $(document)
    .off("click", ".productLookup")
    .on("click", ".productLookup", function(e) {
        e.preventDefault();
        let count = $(this).attr('data-count');
        if (count<5) {
            showModal({
                url: "/admin/purchaseorder/productlookup"
            });    
        }else{
            toastr.error('Cannot add more rows');
        }
        
    });

    $(document).off('click', '.orderExtra').on('click', '.orderExtra', function(e){
        e.preventDefault();
        showModal({
            url: `/admin/quotes/orderextra`,
            c: 'Quote'
        });
    });

    $(document)
        .off("click", ".po_rowremove")
        .on("click", ".po_rowremove", function(e) {
            let count = $('#productLookup').attr('data-count');
            e.preventDefault();
            let rowsCount = $('#prependTableRow').children('tr').length;
            if(rowsCount === 1){
                $(document).find('.p_lookupDiv').css('display', 'block');
            }
            if(rowsCount>1){
                $(this)
                    .closest("tr")
                    .remove();
                count--;
                $('#productLookup').attr('data-count', count);
                
            }else{
                toastr.error('At least one product needs to be filled');
            }
            if(rowsCount === 2){
                $(document).find('.p_lookupDiv').css('display', 'block');
            }
            calculate_sub_total();
        });
    $('#resetForm').click(function(e){
        e.preventDefault();
        $('#purchaseOrderAddForm').trigger('reset');
    });

    $('#newTaxField').click(function(e){
        e.preventDefault();
        // let count=$(this).attr('data-count');
        let newrow = `
             <div class="row taxRow" style="padding: 20px 20px 0px 20px;">
                            <div class="col-xl-7 col-sm-6 kt-align-right kt-font-bolder"></div>
                            <div class="col-xl-2 col-sm-6" style="padding-left:0px;">
                                <select class="form-control selectTax" name="taxes[]" style="width:100%;">
                                    <option value="" onload="initTaxSelect()">Choose Tax</option>
                                    
                                </select>
                            </div>
                            <div class="col-xl-2 col-sm-6" style="margin-left:2.2rem;padding-right:0px;">
                                <input type="text" class="form-control" autocomplete="off" name="tax[]" disabled style="width:100%;text-align:right;">
                                <input type="text" class="form-control" autocomplete="off" name="tax_value[]" hidden>
                            </div>
                            <div class="col-xl-1 col-sm-1 kt-align-right" style="margin-left:-3rem;">
                                <button class="btn btn-sm btn-secondary btn-elevate-hover btn-circle btn-icon deletePoTaxField" style="color:brown">
                                    <i class="la la-remove"></i>
                                </button>
                            </div>
                        </div>
        `;
        // let newrow = `
        //     <div class="row p-20 taxRow">
        //         <div class="col-xl-8 col-sm-6 kt-align-right kt-font-bolder">Taxes</div>
        //         <div class="col-xl-3 col-sm-6">
        //             <select class="form-control selectTax" name="taxes[]">
        //                 <option>Select Tax</option>    
        //             </select>
        //         </div>
        //         <div class="col-xl-1 col-sm-1 kt-align-right">
        //             <button class="btn btn-sm btn-secondary btn-elevate-hover btn-circle btn-icon deletePoTaxField" style="color:brown">
        //                 <i class="la la-remove"></i>
        //             </button>
        //         </div>
        //     </div>
        // `;
        $('.taxField').append(newrow);
        initTaxSelect();
        setTimeout(() => {
            calculate_sub_total();
        }, 200);
    });

    $(document).off('click', '.deletePoTaxField').on('click', '.deletePoTaxField', function(e){
        e.preventDefault();
        $(this).closest('div.taxRow').remove();
        setTimeout(() => {
            calculate_sub_total();
        }, 200);
    });



    $(document).off('click', '.addNewItem').on('click', '.addNewItem', function(e){
        e.preventDefault();
        let prependrow = `
            <tr class="table_row_1">
                <td>
                    <div class="row">
                        <div class="col-sm-9 productLookup" data-count="1">
                            <input type="text" class="form-control" placeholder="Select Product" name="product_name[]" autocomplete="off" disabled>
                            <input type="text" class="form-control" name="product_id[]" autocomplete="off" hidden>
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-sm btn-secondary btn-elevate-hover btn-circle btn-icon productLookup" data-count="1"  data-container="body" data-toggle="kt-popover" data-placement="top" data-content="Product Lookup" data-original-title="" title="" aria-describedby="popover787089" style="cursor:pointer;">
                                <i class="fa fa-search"></i>
                            </button>
                            <button class="btn btn-sm btn-warning btn-elevate-hover btn-circle btn-icon orderExtra" data-count="1" data-container="body" data-toggle="kt-popover" data-placement="top" data-content="Extras Lookup" data-original-title="" title="" aria-describedby="popover787089" style="cursor:pointer;">
                                <i class="flaticon-add"></i>
                            </button>
                        </div>
                    </div>
                </td>
                
                <td>
                    <div class="row">
                        <div class="col-sm-11">
                            <input type="number" min="0" name="qty[]" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-sm-11">
                            <input type="text" name="quoted_amt[]" value="0" class="form-control" autocomplete="off" style="text-align:right;">
                        </div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-sm-11">
                            <input type="text" name="approved_amt[]" value="0" class="form-control" autocomplete="off" style="text-align:right;">
                        </div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-sm-11">
                            <input type="text" name="billed_amt[]" value="0" class="form-control" autocomplete="off" style="text-align:right;">
                        </div>
                    </div>
                </td>
                <td>
                    
                    <button class="btn btn-sm btn-secondary btn-elevate-hover btn-circle btn-icon po_rowremove" data-id="1" style="color:brown">
                        <i class="la la-remove"></i>
                    </button>
                </td>
            </tr>
        `;
        $('#prependTableRow').append(prependrow);
    });

    $(document).on('change','input[name="qty[]"]', function(e){
        let qty = $(this).val();
        let amountcontainer = $(this).closest('td').next().children().find('input[name="quoted_amt[]"]');
        let approvedcontainer = amountcontainer.closest('td').next().children().find('input[name="approved_amt[]"]');
        let billedcontainer = approvedcontainer.closest('td').next().children().find('input[name="billed_amt[]"]');
        let amt = $(amountcontainer).attr('original-amt');
        let quoted_amt = parseFloat(qty)*parseFloat(amt);
        quoted_amt = quoted_amt || 0
        amountcontainer.val(quoted_amt.toFixed(2));
        approvedcontainer.val(quoted_amt.toFixed(2));
        billedcontainer.val(quoted_amt.toFixed(2));
        calculate_sub_total();
    });

    $(document).change(function(){
        // initTaxSelect();
        calculate_sub_total();
    });

    $(document).off('click', '#updatePurchaseOrder').on('click', '#updatePurchaseOrder', function(e){
        e.preventDefault();
        removeExtraRows();
        let id = $(this).attr('data-id');
        let add_purchase_order = $('#editInvoiceForm');
        let data = $('#editInvoiceForm').serializeArray();
        console.log(data);
        supportAjax({
            url: `/admin/purchaseorder/edit/${id}`,
            method: 'POST',
            data: data
        },function(resp){
            $('#cModalpoEdit').modal('hide');
            $('#t_p_o_table').KTDatatable().reload();
            toastr.success('Invoice Updated');
            setTimeout(() => {
                showModal({
                    url: `/admin/purchaseorder/items/${resp.id}`,
                })
            }, 500);
        },function({ status,responseJSON}){
            if (status === 422) 
            {
                add_purchase_order.find('input[name="product_name[]"]').css('border-color', '#ddd');
                $(`input[name="product_name[]"]`).siblings(".errorMessage").empty();
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    add_purchase_order.find(`input[name = "product_name[]"]`).css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="product_name[]"]`).siblings(".errorMessage").empty();
                    $(`input[name="product_name[]"]`).siblings(".errorMessage").append('This field is required.');

                }
                toastr.error('<strong>Please check hightlighted fields!</strong>');
            }
        });
    })

     var initPopover = function(el) {
        var skin = el.data('skin') ? 'popover-' + el.data('skin') : '';
        var triggerValue = el.data('trigger') ? el.data('trigger') : 'hover';

        el.popover({
            trigger: triggerValue,
            template: '\
            <div class="popover ' + skin + '" role="tooltip">\
                <div class="arrow"></div>\
                <h3 class="popover-header"></h3>\
                <div class="popover-body"></div>\
            </div>'
        });
    }

    $('[data-toggle="kt-popover"]').each(function() {
        initPopover($(this));
    });
   $(document).on('change','input[name="billed_amt[]"], input[name="approved_amt[]"], input[name="quoted_amt[]"]', function(e){
        let amt = $(this).val();
        let qtycontainer = $(this).closest('td').siblings().children().find('input[name="qty[]"]');
        let amountcontainer = qtycontainer.closest('td').next().children().find('input[name="quoted_amt[]"]');
        let approvedcontainer = amountcontainer.closest('td').next().children().find('input[name="approved_amt[]"]');
        let billedcontainer = approvedcontainer.closest('td').next().children().find('input[name="billed_amt[]"]');
        let qty = $(qtycontainer).val();
        console.log(qty);
        if($(this).is(approvedcontainer)){
            approvedcontainer = $(this);
            // alert('appr');
            qty = 1;
        }else if($(this).is(billedcontainer)){
            // alert('bill');
            qty = 1;
            billedcontainer = $(this);
        }else{
            amountcontainer = $(this);
            qty = 1;
        }
        let quoted_amt = parseFloat(qty)*parseFloat(amt);
        quoted_amt = quoted_amt || 0
        amountcontainer.val(quoted_amt.toFixed(2));
        approvedcontainer.val(quoted_amt.toFixed(2));
        billedcontainer.val(quoted_amt.toFixed(2));
        calculate_sub_total();
    });
    $(document).off('click', '.orderExtra').on('click', '.orderExtra', function(e){
        e.preventDefault();
        showModal({
            url: `/admin/quotes/orderextra`,
            c: 'Quote'
        });
    });



    var purchase_order_grand_total = 0;
    var tax_value = 0;
    function calculate_sub_total(){
        let qty_el = document.querySelectorAll('input[name="quoted_amt[]"]');
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