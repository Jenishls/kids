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
        /* label{
            font-weight: bold !important;
        } */
        .btn{
            border-radius: 19px !important;
        }
        #itemLists{
            display: none;
            position: absolute;
            z-index: 9999;
            display: block;
            list-style: none;
            width: 94%;
            background: #fafafa;
            min-height: 75px;
            border-radius: 4px;
            border: 1px solid #41bcf6;
            text-align: left;
            padding-left: 0px;
        }
        .listOfCompanies{
            background: #fafafa;
            display:flex;
            
        }
        .listOfCompanies>li{
            cursor: pointer;
            width: 50%;
        }
    </style>
    <div class="modal-dialog " role="document" style="margin-left:26%; margin-top:4%;">
        <div class="modal-content " style="width: 900px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
                </button>
            </div>
            <div class="modal-body" style="padding:0px !important;">
                <div class="kt-portlet kt-portlet--tabs" style="margin-bottom:0px !important;">
                    <div class="kt-portlet__head" style="padding:0px !important;">
                        <div class="kt-portlet__head-toolbar" style="width:100%;">
                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success" role="tablist" style="width: 100%;display:flex;">
                                <li class="nav-item " data-step = '0' data-action="add" style="flex:1;margin-right:0px !important;">
                                    <a class="nav-link active modal_tab_headers"  data-toggle="tab" href="#kt_portlet_base_demo_1_1_tab_content" role="tab" aria-selected="false">
                                        <i class="fa fa-gift"></i> Package Deail
                                    </a>
                                </li>
                                <li class="nav-item " data-step = '1' data-action="add" style="flex:1;margin-right:0px !important;">
                                    <a class="nav-link modal_tab_headers" id="next" data-toggle="tab"  href="#kt_portlet_base_demo_1_2_tab_content" role="tab" aria-selected="false">
                                        <i class="la la-file-text"></i>Package Items
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                        <form class="kt-form kt-form--label-right" id="packageEditForm">   
                            @csrf
                            <div class="tab-content" id="tabContent">
                                <div class="tab-pane active" id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel" style="background:#e5f7ff !important;">
                                    
                                    <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important;">
                                        <div class="row mb-10">
                                            <div class="form-group col-12">
                                                <div class="shadow_inputs">
                                                    <div class="form-group row ">
                                                        <div class="col-lg-6">
                                                            <label class="control-label boldLabel" for="salutation">Name</label>
                                                        <input class="form-control" type="text" name="package_name" value="{{$package->package_name}}" required="require" autocomplete="off">
                        
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="control-label boldLabel" for="first_name">Package Type</label>
                                                            <select class="form-control" name="package_type_id" id="package_type_id">
                                                            <option value="{{$package->packageType->id}}">{{$package->packageType->type}}</option>
                                                            </select>
                                                            <div class="errorMessage"></div>
                        
                                                        </div>
                                                        <div class="col-6">
                                                            <label class="control-label boldLabel" for="dob">Start Date</label>
                                                            <input class="form-control" type="text" id="start-date" value="{{format_to_us_date($package->date_from)}}" name="date_from" required="require" autocomplete="off">
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                        <div class="col-6">
                                                            <label class="control-label boldLabel" for="dob">End Date</label>
                                                            <input class="form-control" type="text" id="end-date" value="{{format_to_us_date($package->date_to)}}" name="date_to" required="require" autocomplete="off">
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>             
                                    </div>
                                    <div class="kt-portlet__foot footer_white">
                                        <div class="kt-form__actions">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    {{-- <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="la la-times"></i>Cancel</button> --}}
                                                </div>
                                                <div class="col-lg-6 kt-align-right">
                                                    <button type="" class="btn btn-success" data-step = '1' data-action="add" id = "continue">Continue <i class="la la-arrow-right"></i></button>
                                                    {{-- <button type="button" class="btn btn-brand btn-elevate btn-pill"><i class="la la-arrow-"></i> Continue</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel" style="background:#e5f7ff !important;">
                                    <div class="kt-portlet__body">
                                            <div class="row mb-10">
                                                <div class="form-group col-12">
                                                    <div class="shadow_inputs">
                                                        <div class="form-group row ">
                                                            <div class="col-lg-6">
                                                                <label class="control-label boldLabel" for="salutation">Name</label>
                                                                <input class="form-control" type="text" required="require" autocomplete="off" id="item_search">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>     
                                        <div id="packageItemsTable" style="display: none;">
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
                                                        
                                                    </tbody>
                                                </table>
                
                                            </div>
                                            <!--end: Datatable -->
                                        </div>
                                        
                                        <div id="selectedPackageItems" >
                                            <!--begin: Datatable -->
                                            <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="kt_selected_items_table" style="position: relative;">
                                                <table class="kt-datatable__table" style="display: block; padding-bottom: 45px;">
                                                    <thead class="kt-datatable__head" style="background: #55b4aa !important;">
                                                        <tr class="kt-datatable__row" style="left: 0px;">
                                                            <th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort">
                                                                <span style="width: 250px;">Item</span></th>
                                                            <th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 80px;">Price</span></th>
                                                            <th data-field="Status" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 80px;">Items</span></th>
                                                            <th data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 160px;">Discount</span></th>
                                                            <th data-field="disAmt" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort pr-0"><span style="width: 80px;">Dis Amt</span></th>
                                                            <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort pr-0"><span style="width: 80px;">Total</span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="kt-datatable__body" id="selected_items_table">
                                                        @foreach($package->packageItems as $item)
                                                        <tr data-row="0" data-inv-id="{{$item->inv_id}}" class="kt-datatable__row" style="left: 0px;">
                                                            <input type="hidden" name="inv_id[]" value="{{$item->inv_id}}">
                                                            <td data-field="AgentName" class="kt-datatable__cell">
                                                                <span style="width: 250px;">
                                                                    <div class="kt-user-card-v2">
                                                                            <div class="kt-user-card-v2__pic">
                                                                                <img alt="photo" src="{{$item->inventory->product->thumb?"/admin/products/image/".$item->inventory->product->thumb->file_name:"images/no-image.png"}}" style="height: 40px; width: 40px; object-fit: cover; border-radius: 0;">
                                                                            </div>
                                                                        <div class="kt-user-card-v2__details">
                                                                            <a class="kt-user-card-v2__name" href="#">{{$item->inventory->product->name}}</a>									
                                                                            <span class="kt-user-card-v2__desc">{{$item->inventory->product->code}}</span>                                
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </td>
                                                            <td data-field="ShipDate" class="kt-datatable__cell"><span style="width: 80px;">{{$item->inventory->price?:0}}</span></td>
                                                            <td data-field="Status" class="kt-datatable__cell">
                                                                <span style="width: 80px;">
                                                                <input class="form-control items" type="number" value="{{$item->quantity?:0}}" data-price="{{$item->inventory->price?:0}}" name="qty[]" required="require" autocomplete="off">
                                                                </span>
                                                            </td>
                                                            <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                                                <span style="width: 160px;">
                                                                    <select class="form-control dis_types" data-price="{{$item->inventory->price?:0}}" name="dis_type[]" id="" style="width:50%; display:inline-block;">
                                                                        <option value="flat" @if ($item->dis_type == "flat")
                                                                            selected
                                                                        @endif>Flat</option>
                                                                        <option value="percent" @if ($item->dis_type == "percent")
                                                                            selected
                                                                        @endif>%</option>
                                                                    </select>
                                                                <input class="form-control discounts" type="text" data-price="{{$item->inventory->price?:0}}" name="discount[]" value="{{$item->dis_rate?:0}}" required="require" autocomplete="off" style="width:46%; display:inline-block;">
                                                                </span>
                                                            </td>
                                                            <td class="kt-datatable__cell--center kt-datatable__cell pr-0 dis_amt_td" data-field="disAmt">
                                                                <span class="dis_amt" style="overflow: visible; position: relative; width: 80px;">                     
                                                                        {{$item->dis_amt?:0}}
                                                                </span>
                                                                <input class="form-control" type="hidden" name="dis_amt_item[]" value="{{$item->dis_amt?:0}}" required="require" autocomplete="off" style="width:46%; display:inline-block;">
                                                            </td>
                                                            <td class="kt-datatable__cell--center kt-datatable__cell pr-0" data-field="Actions">
                                                                <span class="total_price" style="overflow: visible; position: relative; width: 80px;">                     
                                                                    {{($item->inventory->price * $item->quantity) - $item->dis_amt}} 
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div style="position: absolute; right: 20px; bottom: 10px;">
                                                    <h6 id="g_total_discount" class="text-right d-iblock mr-10" >Total Discount : {{$package->price}}
                                                    </h6>
                                                    <input type="hidden" name="dis_amt" id="g_total_discount__input">
                                                    <h6 id="g_total" class="text-right d-iblock" >Grand Total : {{$package->dis_amt}}
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
                                                    {{-- <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="la la-times"></i>Cancel</button> --}}
                                                    <button type="reset" class="btn btn-brand form_previous_step" data-step="2"><i class="la la-arrow-left"></i>Previous</button>
                                                </div>
                                                <div class="col-lg-6 kt-align-right">
                                                    <button type="reset" class="btn btn-success" id="editPackage">Edit <i class="la la-save"></i></button>
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
            $(document).off('click', '#continue').on('click', '#continue', function(e){
                e.preventDefault();
                $('#next').click();
            });
            $('.items').focusout(function(e){
                e.preventDefault();
                totalPrice($(this));
                g_total();
            })
        
            $('.discounts').focusout(function(e){
                e.preventDefault();
                totalPrice1($(this));
                g_total();
            })
            
            $('.dis_types').on('change', function(e){
                e.preventDefault();
                totalPrice2($(this));
                g_total();
            })
        
            $(document).find('#package_type_id').select2({
                placeholder: 'Select Package Type',
                width: '100%',
                tags: true,
                ajax: {
                    method: 'POST',
                    url: '/admin/package/type/all',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    processResults: function(data) {
                        let res = [];
                        $.each(data, function(i, obj) {
                            res.push({
                                id: obj.id,
                                text: obj.name
                            });
                        });
                        return {
                            results: res
                        };
                    }
                }
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
                                        <td data-field="AgentName" class="kt-datatable__cell">
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
                                        <td data-field="ShipDate" class="kt-datatable__cell"><span style="width: 100px;">${result.price}</span></td>
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
                                <td data-field="AgentName" class="kt-datatable__cell">
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
                                <td data-field="ShipDate" class="kt-datatable__cell"><span style="width: 80px;">${price}</span></td>
                                <td data-field="Status" class="kt-datatable__cell">
                                    <span style="width: 80px;">
                                            <input class="form-control items" type="number" value="1" data-price="${price}" name="qty[]" required="require" autocomplete="off">
                                    </span>
                                </td>
                                <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                    <span style="width: 160px;">
                                        <select class="form-control dis_types" data-price="${price}" name="dis_type[]" id="" style="width:50%; display:inline-block;">
                                            <option value="flat">Flat</option>
                                            <option value="percent">%</option>
                                        </select>
                                        <input class="form-control discounts" type="text" data-price="${price}" value="0" name="discount[]" required="require" autocomplete="off" style="width:46%; display:inline-block;">
                                    </span>
                                </td>
                                <td class="kt-datatable__cell--center kt-datatable__cell pr-0 dis_amt_td" data-field="disAmt">
                                    <span class="dis_amt" style="overflow: visible; position: relative; width: 80px;">                     
                                            0
                                    </span>
                                    <input class="form-control" type="hidden" name="dis_amt_item[]" value="0" required="require" autocomplete="off" style="width:46%; display:inline-block;">
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
                
                    $('.discounts').focusout(function(e){
                        e.preventDefault();
                        totalPrice1($(this));
                        g_total();
                    })
                    
                    $('.dis_types').on('change', function(e){
                        e.preventDefault();
                        totalPrice2($(this));
                        g_total();
                    })
                });
            }
        
            function totalPrice1(item){
                let discount = item.val();
                let price = item.attr('data-price');
                let dis_type = item.prev('select').val();
                let qty = item.closest('td').prev('td').children('span').find('input').val();;
                let total = 0;
                if(dis_type == "flat"){
                    total = (qty * price) - discount;
                    item.closest('td').siblings(".dis_amt_td").children('span').text(Number(discount).toFixed(2));
                    item.closest('td').siblings(".dis_amt_td").children('input').val(Number(discount).toFixed(2));
                }
                else{
                    let dis = (qty * price) * (discount/100);
                    total = (qty * price) - dis;
                    item.closest('td').siblings(".dis_amt_td").children('span').text(Number(dis).toFixed(2));
                    item.closest('td').siblings(".dis_amt_td").children('input').val(Number(dis).toFixed(2));
                }
                item.closest('td').siblings(":last").children('span').text(Number(total).toFixed(2));
            }
            
            function totalPrice2(item){
                let dis_type = item.val();
                let price = item.attr('data-price');
                let discount = item.next('input').val();
                let qty = item.closest('td').prev('td').children('span').find('input').val();;
                let total = 0;
                if(dis_type == "flat"){
                    total = (qty * price) - discount;
                    item.closest('td').siblings(".dis_amt_td").children('span').text(Number(discount).toFixed(2));
                    item.closest('td').siblings(".dis_amt_td").children('input').val(Number(discount).toFixed(2));
                }
                else{
                    let dis = (qty * price) * (discount/100);
                    total = (qty * price) - dis;
                    item.closest('td').siblings(".dis_amt_td").children('span').text(Number(dis).toFixed(2));
                    item.closest('td').siblings(".dis_amt_td").children('input').val(Number(dis).toFixed(2));
                }
                item.closest('td').siblings(":last").children('span').text(Number(total).toFixed(2));
            }
            
            function totalPrice(item){
                let qty = item.val();
                let price = item.attr('data-price');
                let discount = item.closest('td').next('td').children('span').find('input').val();
                let dis_type = item.closest('td').next('td').children('span').find('select').val();
                let total = 0;
                if(dis_type == "flat"){
                    total = (qty * price) - discount;
                    item.closest('td').siblings(".dis_amt_td").children('span').text(Math.ceil(discount));
                    item.closest('td').siblings(".dis_amt_td").children('input').val(Math.ceil(discount));
                }
                else{
                    let dis = (qty * price) * (discount/100);
                    total = (qty * price) - dis;
                    item.closest('td').siblings(".dis_amt_td").children('span').text(Math.ceil(dis));
                    item.closest('td').siblings(".dis_amt_td").children('input').val(Math.ceil(dis));
                }
                item.closest('td').siblings(":last").children('span').text(Number(total).toFixed(2));
            }
            
            function g_total(){
                let g_total = 0;
                let g_dis_total = 0;
                $('#selected_items_table td .total_price').each(function(i, obj) {
                    let value =obj.innerHTML;
                    value = isNaN(value)?0:value;
                    g_total += Number(value);
                });
                
                $('#selected_items_table td .dis_amt').each(function(i, obj) {
                    let value =obj.innerHTML;
                    value = isNaN(value)?0:value;
                    g_dis_total += Number(value);
                });
        
                $('#g_total').text("Grand Total : "+ g_total);
                $('#g_total_input').val(g_total);
                
                $('#g_total_discount').text("Total Discount : "+ g_dis_total);
                $('#g_total_discount__input').val(g_dis_total);
            }
        
            $('#start-date').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 2001,
                maxYear: parseInt(moment().format('YYYY'),10)
            });
        
            $('#end-date').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 2001,
                maxYear: parseInt(moment().format('YYYY'),10)
            }); 
        
            $(document).off('click','#editPackage').on('click','#editPackage',function(e){
                e.preventDefault();
                $.ajax({
                    url:'/admin/package/update/{{$package->id}}',
                    method: 'POST',
                    data: new FormData(document.getElementById('packageEditForm')),
                    contentType: false,
                    processData: false,
                    success: function(response){
                        toastr.success(response.message);
                        $('#packageDataTable').KTDatatable().reload(); 
                        $('#cModal').modal('hide');
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
        });
    
    </script>