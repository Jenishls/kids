<style>
        #kt_selected_items_table > .kt-datatable__table > .kt-datatable__head .kt-datatable__row > .kt-datatable__cell > span, .kt-datatable > .kt-datatable__table > .kt-datatable__foot .kt-datatable__row > .kt-datatable__cell > span {
            color: #fefefe;
        }
        
        #kt_select_item_datatable > .kt-datatable__table > .kt-datatable__head .kt-datatable__row > .kt-datatable__cell > span, .kt-datatable > .kt-datatable__table > .kt-datatable__foot .kt-datatable__row > .kt-datatable__cell > span {
            color: #fefefe;
        }
    
        .form-group{
            padding-bottom:8px !important;
        }
        .btn{
            border-radius: 19px !important;
        }
    </style>
    <div class="modal-dialog " role="document" style="margin-left:26%; margin-top:4%;">
        <div class="modal-content " style="width: 900px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Order Items</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
                </button>
            </div>
            <div class="modal-body" style="padding:0px !important;">
                <div class="kt-portlet kt-portlet--tabs" style="margin-bottom:0px !important;">
                    <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                        <form class="kt-form kt-form--label-right" id="orderItemsForm">   
                            @csrf
                            <div class="tab-content" id="tabContent">
                                <div class="tab-pane active" id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel" style="background:#e5f7ff !important;">
                                    <div class="kt-portlet__body">
                                            <div class="row mb-10">
                                                <div class="form-group col-12">
                                                    <div class="shadow_inputs">
                                                        <div class="form-group row ">
                                                            <div class="col-lg-4">
                                                                <label class="control-label boldLabel" for="salutation">Product Name</label>
                                                                <input class="form-control" type="text" required="require" autocomplete="off" id="item_search">
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="control-label boldLabel" for="salutation">Moving Date</label>
                                                                <input class="form-control" name="moving_date" type="text" required="require" autocomplete="off" id="moving_date">
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="control-label boldLabel" for="salutation">Pickup Date</label>
                                                                <input class="form-control" name="pickup_date" type="text" required="require" autocomplete="off" id="pickup_date">
                                                            </div>
                                                            <input class="form-control" name="sales_tax" id="sales_tax" type="hidden" autocomplete="off" value="{{default_company('sales_tax')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>     
                                        <div id="packageItemsTable">
                                            <!--begin: Datatable -->
                                            <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="kt_select_item_datatable" style="">
                                                <table class="kt-datatable__table" style="display: block;">
                                                    <thead class="kt-datatable__head"  style="background: #6cc0e9 !important;">
                                                        <tr class="kt-datatable__row" style="left: 0px;">
                                                            <th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort">
                                                                <span style="width: 200px;">Item</span></th>
                                                            <th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 100px;">Price</span></th>
                                                            <th data-field="Status" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 100px;">Color</span></th>
                                                            <th data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 110px;">Size</span></th>
                                                            <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort pr-0"><span style="width: 80px;">Actions</span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="kt-datatable__body" id="items_table">
                                                            @foreach($items as $item)
                                                            <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                                                <td data-field="AgentName" class="kt-datatable__cell pl-25">
                                                                    <span style="width: 200px;">
                                                                        <div class="kt-user-card-v2">
                                                                                <div class="kt-user-card-v2__pic">
                                                                                    <img alt="photo" src="{{$item->product->thumb?"/admin/products/image/".$item->product->thumb->file_name:"images/no-image.png"}}" style="height: 40px; width: 40px; object-fit: cover; border-radius: 0;">
                                                                                </div>
                                                                            <div class="kt-user-card-v2__details">
                                                                                <a class="kt-user-card-v2__name" href="#">{{$item->product->name}}</a>									
                                                                                <span class="kt-user-card-v2__desc">{{$item->product->code}}</span>                                
                                                                            </div>
                                                                        </div>
                                                                    </span>
                                                                </td>
                                                                <td data-field="ShipDate" class="kt-datatable__cell"><span style="width: 100px;">
                                                                
                                                                {{$item->price}}</span></td>
                                                                <td data-field="Status" class="kt-datatable__cell"><span style="width: 100px;">{{$item->color}}</span>
                                                                </td>
                                                                <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell"><span style="width: 110px;">{{$item->size?$item->size->size:"-"}}</span></td>
                                                                <td class="kt-datatable__cell--center kt-datatable__cell pr-0" data-field="Actions">
                                                                    <span style="overflow: visible; position: relative; width: 80px;">                     
                                                                            <a class="btn btn-hover-brand btn-icon btn-pill select_item" 
                                                                            data-thumb="{{$item->product->thumb?$item->product->thumb->file_name:""}}"
                                                                            data-product="{{$item->product->name}}"
                                                                            data-product-code="{{$item->product->code}}"
                                                                            data-price="{{$item->price}}"
                                                                            data-inv-id="{{$item->id}}"><i class="la la-plus" title="Add Item"></i></a>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            @endforeach   
                                                    </tbody>
                                                </table>
                
                                            </div>
                                            <!--end: Datatable -->
                                        </div>
                                        
                                        <div id="selectedPackageItems" style="display: none;">
                                            <!--begin: Datatable -->
                                            <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="kt_selected_items_table" style="position: relative;">
                                                <table class="kt-datatable__table" style="display: block; padding-bottom: 45px;">
                                                    <thead class="kt-datatable__head" style="background: #55b4aa !important;">
                                                        <tr class="kt-datatable__row" style="left: 0px;">
                                                            <th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort">
                                                                <span style="width: 250px;">Item</span></th>
                                                            <th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 80px;">Price</span></th>
                                                            <th data-field="Status" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 80px;">Items</span></th>
                                                            <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort pr-0"><span style="width: 80px;">Total</span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="kt-datatable__body" id="selected_items_table">
                                                    </tbody>
                                                </table>
                                                <div>
                                                    <h6 id="g_total" class="text-right d-iblock" >Grand Total : 
                                                    </h6>
                                                    <input type="hidden" name="price" id="g_total_input">
                                                </div>
                
                                            </div>
                                            <!--end: Datatable -->
                                        </div>
                                    </div>
                                    <div class="kt-portlet__foot footer_white">
                                        <div class="kt-form__actions">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                        <button type="reset" class="btn btn-secondary btn-pill" data-dismiss="modal"> <i class="la la-times"></i> Cancel</button>
                                                    {{-- <button type="reset" class="btn btn-secondary btn-pill" data-dismiss="modal">Cancel</button> --}}
                                                    {{-- <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="la la-times"></i>Cancel</button> --}}
                                                    {{-- <button type="reset" class="btn btn-brand form_previous_step" data-step="2"><i class="la la-arrow-left"></i>Previous</button> --}}
                                                </div>
                                                <div class="col-lg-6 kt-align-right">
                                                    <button type="reset" class="btn btn-success" id="storeOrderItems">Save <i class="la la-save"></i></button>
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
        </div>
    </div>
    
    <script>
        $(document).ready(function(e){
            addPackageItem();
        });
        
        $('#item_search').keyup(function(e){
    
            let value = $(this).val();
                supportAjax({
                    url:`/admin/package/search/items?item=${value}`
                }, function(resp){
                    if(resp.length>0){
                        let listitem = '';
                        $.each(resp, function(index, result){
                            if(result.product  != null){
                                listitem += `
                                <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                    <td data-field="AgentName" class="kt-datatable__cell pl-25">
                                        <span style="width: 200px;">
                                            <div class="kt-user-card-v2">
                                                    <div class="kt-user-card-v2__pic">
                                                        <img alt="photo" src="${result.product.thumb?"/admin/products/image/"+result.product.thumb.file_name:"images/no-image.png"}" style="height: 40px; width: 40px; object-fit: cover; border-radius: 0;">
                                                    </div>
                                                <div class="kt-user-card-v2__details">
                                                    <a class="kt-user-card-v2__name" href="#">${result.product.name}</a>									
                                                    <span class="kt-user-card-v2__desc">${result.product.code}</span>                                
                                                </div>
                                            </div>
                                        </span>
                                    </td>
                                    <td data-field="ShipDate" class="kt-datatable__cell"><span style="width: 100px;">
                                    
                                    ${result.price}</span></td>
                                    <td data-field="Status" class="kt-datatable__cell"><span style="width: 100px;">${result.color.color}</span>
                                    </td>
                                    <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell"><span style="width: 110px;">${result.size.size}</span></td>
                                    <td class="kt-datatable__cell--center kt-datatable__cell pr-0" data-field="Actions">
                                        <span style="overflow: visible; position: relative; width: 80px;">                     
                                                <a class="btn btn-hover-brand btn-icon btn-pill select_item" 
                                                data-thumb="${result.product.thumb?result.product.thumb.file_name:""}"
                                                data-product="${result.product.name}"
                                                data-product-code="${result.product.code}"
                                                data-price="${result.price}"
                                                data-inv-id="${result.id}"><i class="la la-plus" title="Add Item"></i></a>
                                        </span>
                                    </td>
                                </tr>
                                `;
                            }
                        });
                        $('#packageItemsTable').show();
                        $('#items_table').html(listitem);
                        addPackageItem();
                    }else{
                        $('#packageItemsTable').hide();
                    }
                })
     
        });
    
        function addPackageItem(){
            $(document).off('click', '.select_item').on('click', '.select_item', function(e){
                e.preventDefault();
                e.stopPropagation();
                let thumb = $(this).attr('data-thumb');
                let inv_id = $(this).attr('data-inv-id');
                let product = $(this).attr('data-product');
                let code = $(this).attr('data-product-code');
                let price = $(this).attr('data-price');
                $('#selectedPackageItems').show();
                let selecteditem = `
                            <tr data-row="0" class="kt-datatable__row" data-inv-id="${inv_id}" style="left: 0px;">
                                <input type="hidden" name="inv_id[]" value="${inv_id}">
                                <td data-field="AgentName" class="kt-datatable__cell pl-25">
                                    <span style="width: 250px;">
                                        <div class="kt-user-card-v2">
                                                <div class="kt-user-card-v2__pic">
                                                    <img alt="photo" src="${thumb?"/admin/products/image/"+thumb:"images/no-image.png"}" style="height: 40px; width: 40px; object-fit: cover; border-radius: 0;">
                                                </div>
                                            <div class="kt-user-card-v2__details">
                                                <a class="kt-user-card-v2__name" href="#">${product}</a>									
                                                <span class="kt-user-card-v2__desc">${code}</span>                                
                                            </div>
                                        </div>
                                    </span>
                                </td>
                                <td data-field="ShipDate" class="kt-datatable__cell"><span style="width: 80px;">
                                    <input type="hidden" name="item_price[]" value="${price}">
                                    ${price}</span>
                                </td>
                                <td data-field="Status" class="kt-datatable__cell">
                                    <span style="width: 80px;">
                                            <input class="form-control items" type="number" value="1" data-price="${price}" name="qty[]" required="require" autocomplete="off">
                                    </span>
                                </td>
                                <td class="kt-datatable__cell--center kt-datatable__cell pr-0" data-field="Actions">
                                    <span class="total_price" style="overflow: visible; position: relative; width: 80px;">                     
                                            ${price}
                                    </span>
                                </td>
                            </tr>
                            `;
                if($("#selected_items_table").find('tr[data-inv-id="'+inv_id+'"]').length == 0){
                    $('#selected_items_table').append(selecteditem);
                }
                
                $('.items').focusout(function(e){
                    e.preventDefault();
                    totalPrice($(this));
                    g_total();
                })
            });
        }
        
        function totalPrice(item){
            let qty = item.val();
            let price = item.attr('data-price');
            total = (qty * price);
            item.closest('td').siblings(":last").children('span').text(Number(total).toFixed(2));
        }
        
        function g_total(){
            let g_total = 0;
            let g_total_with_tax = 0;
            $('#selected_items_table td .total_price').each(function(i, obj) {
                let value =obj.innerHTML;
                value = isNaN(value)?0:value;
                g_total += Number(value);
            });
            let tax_percent = $('#sales_tax').val();
            if(tax_percent){
                tax = tax_percent/100 * Number(g_total);
                g_total_with_tax = tax + g_total;
            }
            $('#g_total').text("Grand Total : "+ Number(g_total_with_tax).toFixed(2));
            $('#g_total_input').val(g_total);
        }

        $(document).off('click','#storeOrderItems').on('click','#storeOrderItems',function(e){
            e.preventDefault();
            $.ajax({
                url:'/admin/order/addOrderItems/{{$order->id}}',
                method: 'POST',
                data: new FormData(document.getElementById('orderItemsForm')),
                contentType: false,
                processData: false,
                success: function(response){
                    toastr.success(response.message);
                    $('#orderItemDatatable').KTDatatable().reload();
                    $('#invoicedataTable').KTDatatable().reload();
                    $('#cModal').modal('hide');
                    $('#span_invoice').text(response.invoice);
                    $('#span_balance').text(response.balance);
                    console.log(response.balance);
                    if(response.balance > 0){
                        $('#make_payment').show();
                    }
                }, 
                error:function({status, responseJSON})
                {
                }
            });
        });
        
        $(document).off('click', '.select_item').on('click', '.select_item', function(e){
            e.preventDefault();
            let inv = $(this).attr('data-inv-id');
            let qty = $(this).parent().parent().siblings('.theOne');
            let qty_count = qty.children('span').children('span').text();
            qty.children('span').children('span').text(parseInt(qty_count)+1);
            qty.children('span').children('.qty').val(parseInt(qty_count)+1);
            qty.children('span').children('.inv').val(inv);
        });
        
        $(document).off('click', '.remove_item').on('click', '.remove_item', function(e){
            e.preventDefault();
            let inv = $(this).attr('data-inv-id');
            let qty = $(this).parent().parent().siblings('.theOne');
            let qty_count = qty.children('span').children('span').text();
            if(qty_count != 0){
                qty.children('span').children('span').text(parseInt(qty_count)-1);
                qty.children('span').children('.qty').val(parseInt(qty_count)-1);
            }
        });

        $('#moving_date').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            parentEl:$('#orderItemsForm'),
            minYear: 2001,
            maxYear: parseInt(moment().format('YYYY'),10)
        })

        $('#pickup_date').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            parentEl:$('#orderItemsForm'),
            minYear: 2001,
            maxYear: parseInt(moment().format('YYYY'),10)
        })
    
    </script>