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
                <h5 class="modal-title" id="exampleModalLabel">Extend Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
                </button>
            </div>
            <div class="modal-body" style="padding:0px !important;">
                <div class="kt-portlet kt-portlet--tabs" style="margin-bottom:0px !important;">
                    <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                        <form class="kt-form kt-form--label-right" id="orderExtendForm">   
                            @csrf
                            @if($new_pickup_date)
                                <input type="hidden" name="new_pickup_date" value="{{$new_pickup_date}}">
                            @elseif($new_moving_date)
                                <input type="hidden" name="new_moving_date" value="{{$new_moving_date}}">
                            @endif
                            <div class="tab-content" id="tabContent">
                                <div class="tab-pane active" id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel" style="background:#e5f7ff !important;">
                                    <div class="kt-portlet__body">
                                            <div class="row mb-10">
                                                <div class="form-group col-12">
                                                    <div class="alert alert-light alert-elevate width-100 mb-0" role="alert">
                                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                        <div class="alert-text">Extension of Pickup Date will make a charge on following items with 50% charge in <span style="color: #fd397a">Package items</span> only.
                                                        <div class="alert-text" style="font-weight: bold;">Extention: <span class="mr-30" style="color: #fd397a">{{$days}} Days</span> Total Extention Charge: <span style="color: #fd397a">$ {{ number_format((float)$amount, 2, '.', '')}}</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>     
                                        
                                        
                                        <div id="selectedPackageItems" >
                                            <!--begin: Datatable -->
                                            <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="kt_selected_items_table" style="position: relative;">
                                                <table class="kt-datatable__table" style="display: block;">
                                                    <thead class="kt-datatable__head" style="background: #55b4aa !important;">
                                                        <tr class="kt-datatable__row" style="left: 0px;">
                                                            <th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort">
                                                                <span style="width: 250px;">Item</span></th>
                                                            <th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 80px;">Price ($)</span></th>
                                                            <th data-field="Status" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 80px;">Items</span></th>
                                                            <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort pr-0"><span style="width: 80px;">Total  ($)</span></th>
                                                            {{-- <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort pr-0"><span style="width: 80px;">Action</span></th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody class="kt-datatable__body" id="selected_items_table">
                                                        @if($order->package)
                                                        @foreach($order->package->packageItems as $item)
                                                        <tr data-row="0" data-inv-id="{{$item->inv_id}}" class="kt-datatable__row" style="left: 0px;">
                                                            {{-- <input type="hidden" name="inv_id[]" value="{{$item->inv_id}}"> --}}
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
                                                                    {{$item->quantity?:0}}
                                                                <input class="form-control items" type="hidden" readonly value="{{$item->quantity?:0}}" data-price="{{$item->inventory->price?:0}}" required="require" autocomplete="off">
                                                                </span>
                                                            </td>
                                                            <td class="kt-datatable__cell--center kt-datatable__cell pr-0" data-field="Actions">
                                                                <span class="total_price" style="overflow: visible; position: relative; width: 80px;">                     
                                                                    {{($item->inventory->price * $item->quantity) - $item->dis_amt}} 
                                                                </span>
                                                            </td>
                                                            {{-- <td class="kt-datatable__cell--center pr-0 kt-datatable__cell" data-field="Actions">
                                                                <span style="overflow: visible; position: relative; width: 80px;">
                                                                    <a class="btn btn-hover-brand btn-icon btn-danger btn-pill btn-xs pointer" style="border:none;">
                                                                        <i title="Add Item" class="la la-close"></i>
                                                                    </a>
                                                                </span>
                                                            </td> --}}
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                        @foreach($order->addOnItems as $item)
                                                        <tr data-row="0" data-inv-id="{{$item->inventory_id}}" class="kt-datatable__row" style="left: 0px;">
                                                            <input type="hidden" name="inv_id[]" value="{{$item->inventory_id}}">
                                                            <input type="hidden" name="days" value="{{$days}}">
                                                            <td data-field="AgentName" class="kt-datatable__cell pl-25">
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
                                                            <td data-field="ShipDate" class="kt-datatable__cell">
                                                                <span style="width: 80px;">
                                                                    <input type="hidden" name="item_price[]" value="{{$item->inventory->price?:0}}">
                                                                    {{$item->inventory->price?:0}}
                                                                </span>
                                                            </td>
                                                            <td data-field="Status" class="kt-datatable__cell">
                                                                <span style="width: 80px;">
                                                                    {{$item->quantity?:0}}
                                                                    <input class="form-control items" type="hidden" value="{{$item->quantity?:0}}" data-price="{{$item->inventory->price?:0}}" name="qty[]" required="require" autocomplete="off">
                                                                </span>
                                                            </td>
                                                            
                                                            <td class="kt-datatable__cell--center kt-datatable__cell pr-0" data-field="Actions">
                                                                <span class="total_price" style="overflow: visible; position: relative; width: 80px;">                     
                                                                    {{($item->inventory->price * $item->quantity) - $item->dis_amt}} 
                                                                </span>
                                                            </td>
                                                            {{-- <td class="kt-datatable__cell--center pr-0 kt-datatable__cell" data-field="Actions">
                                                                <span style="overflow: visible; position: relative; width: 80px;">
                                                                    <a class="btn btn-xs btn-icon btn-danger btn-pill pointer remove_items" style="border:none;">
                                                                        <i title="Add Item" class="la la-close"></i>
                                                                    </a>
                                                                </span>
                                                            </td> --}}
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{-- <div style="position: absolute; right: 20px; bottom: 10px;">
                                                    <h6 id="g_total" class="text-right d-iblock" >Grand Total : {{$order->payment->amount}}
                                                    </h6>
                                                    <input type="hidden" name="price" id="g_total_input">
                                                </div> --}}
                
                                            </div>
                                            <!--end: Datatable -->
                                        </div>
                                    </div>
                                    <div class="kt-portlet__foot footer_white">
                                        <div class="kt-form__actions">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                        <button type="reset" class="btn btn-secondary btn-pill" data-dismiss="modal"> <i class="la la-times"></i> Cancel</button>
                                                    {{-- <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="la la-times"></i>Cancel</button> --}}
                                                    {{-- <button type="reset" class="btn btn-brand form_previous_step" data-step="2"><i class="la la-arrow-left"></i>Previous</button> --}}
                                                </div>
                                                <div class="col-lg-6 kt-align-right">
                                                    <button type="reset" class="btn btn-success" id="extendOrder"><i class="la la-plus"></i> Extend</button>
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
            $('.items').focusout(function(e){
                e.preventDefault();
                totalPrice($(this));
                g_total();
            })
             
            function totalPrice(item){
                let qty = item.val();
                let price = item.attr('data-price');
                let total = (qty * price);
                item.closest('td').next("td").children('span').text(Number(total).toFixed(2));
            }
            
            function g_total(){
                let g_total = 0;
                let g_dis_total = 0;
                $('#selected_items_table td .total_price').each(function(i, obj) {
                    let value =obj.innerHTML;
                    value = isNaN(value)?0:value;
                    g_total += Number(value);
                });
                
                $('#g_total').text("Grand Total : "+ g_total);
                $('#g_total_input').val(g_total);
               
            }
        
        
            $(document).off('click','#extendOrder').on('click','#extendOrder',function(e){
                e.preventDefault();
                let data = new FormData(document.getElementById('orderExtendForm'));
                $('#cModal2').modal('hide');
                pickup_extend_data = data;
                $('#make_payment').show();
                showModal({
                    url: "/admin/order/directPayment/{{$order->id}}?balance={{ number_format((float)$amount, 2, '.', '')}}",
                    p:1,
                    c: 3
                });
                // $.ajax({
                //     url:'/admin/order/addInvoice/{{$order->id}}',
                //     method: 'POST',
                //     data: new FormData(document.getElementById('orderExtendForm')),
                //     contentType: false,
                //     processData: false,
                //     success: function(response){
                //         toastr.success(response.message);
                //         $('#orderItemDatatable').KTDatatable().reload(); 
                //         $('#cModal1').modal('hide');
                //         $('#cModal2').modal('hide');
                //     }, 
                //     error:function({status, responseJSON})
                //     {
                    //     }
                    // });
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
            
            $(document).off('click', '.remove_items').on('click', '.remove_items', function(e){
                e.preventDefault();
                $(this).closest('tr').remove();
            });


            // $('#item_search').keyup(function(e){
            //     let value = $(this).val();
            //         supportAjax({
            //             url:`/admin/package/search/items?item=${value}`
            //         }, function(resp){
            //             if(resp.length>0){
            //                 let listitem = '';
            //                 $.each(resp, function(index, result){
            //                     if(result.product  != null){
            //                         listitem += `
            //                         <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
            //                             <td data-field="AgentName" class="kt-datatable__cell">
            //                                 <span style="width: 200px;">
            //                                     <div class="kt-user-card-v2">
            //                                             <div class="kt-user-card-v2__pic">
            //                                                 <img alt="photo" src="${result.product.thumb?"/admin/products/image/"+result.product.thumb.file_name:"images/no-image.png"}" style="height: 40px; width: 40px; object-fit: cover; border-radius: 0;">
            //                                             </div>
            //                                         <div class="kt-user-card-v2__details">
            //                                             <a class="kt-user-card-v2__name" href="#">${result.product.name}</a>									
            //                                             <span class="kt-user-card-v2__desc">${result.product.code}</span>                                
            //                                         </div>
            //                                     </div>
            //                                 </span>
            //                             </td>
            //                             <td data-field="ShipDate" class="kt-datatable__cell"><span style="width: 100px;">${result.price}</span></td>
            //                             <td data-field="Status" class="kt-datatable__cell"><span style="width: 100px;">${result.color.color}</span>
            //                             </td>
            //                             <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell"><span style="width: 110px;">${result.size.size}</span></td>
            //                             <td class="kt-datatable__cell--center kt-datatable__cell pr-0" data-field="Actions">
            //                                 <span style="overflow: visible; position: relative; width: 80px;">                     
            //                                         <a class="btn btn-hover-brand btn-icon btn-pill select_item" 
            //                                         data-thumb="${result.product.thumb?result.product.thumb.file_name:""}"
            //                                         data-product="${result.product.name}"
            //                                         data-product-code="${result.product.code}"
            //                                         data-price="${result.price}"
            //                                         data-inv-id="${result.id}"><i class="la la-plus" title="Add Item"></i></a>
            //                                 </span>
            //                             </td>
            //                         </tr>
            //                         `;
            //                     }
            //                 });
            //                 $('#packageItemsTable').show();
            //                 $('#items_table').html(listitem);
            //                 addPackageItem();
            //             }else{
            //                 $('#packageItemsTable').hide();
            //             }
            //         })
        
            // });
        
            // function addPackageItem(){
            //     $(document).off('click', '.select_item').on('click', '.select_item', function(e){
            //         e.preventDefault();
            //         e.stopPropagation();
            //         let thumb = $(this).attr('data-thumb');
            //         let inv_id = $(this).attr('data-inv-id');
            //         let product = $(this).attr('data-product');
            //         let code = $(this).attr('data-product-code');
            //         let price = $(this).attr('data-price');
            //         $('#selectedPackageItems').show();
            //         let selecteditem = `
            //         <tr data-row="0" class="kt-datatable__row" data-inv-id="${inv_id}" style="left: 0px;">
            //                     <input type="hidden" name="inv_id[]" value="${inv_id}">
            //                     <td data-field="AgentName" class="kt-datatable__cell">
            //                         <span style="width: 250px;">
            //                             <div class="kt-user-card-v2">
            //                                     <div class="kt-user-card-v2__pic">
            //                                         <img alt="photo" src="${thumb?"/admin/products/image/"+thumb:"images/no-image.png"}" style="height: 40px; width: 40px; object-fit: cover; border-radius: 0;">
            //                                     </div>
            //                                 <div class="kt-user-card-v2__details">
            //                                     <a class="kt-user-card-v2__name" href="#">${product}</a>									
            //                                     <span class="kt-user-card-v2__desc">${code}</span>                                
            //                                 </div>
            //                             </div>
            //                         </span>
            //                     </td>
            //                     <td data-field="ShipDate" class="kt-datatable__cell">
            //                         <span style="width: 80px;">
            //                             <input type="hidden" name="item_price[]" value="${price}">
            //                             ${price}
            //                         </span>
            //                     </td>
            //                     <td data-field="Status" class="kt-datatable__cell">
            //                         <span style="width: 80px;">
            //                                 <input class="form-control items" type="number" value="1" data-price="${price}" name="qty[]" required="require" autocomplete="off">
            //                         </span>
            //                     </td>
            //                     <td class="kt-datatable__cell--center kt-datatable__cell pr-0" data-field="Actions">
            //                         <span class="total_price" style="overflow: visible; position: relative; width: 80px;">                     
            //                                 ${price}
            //                         </span>
            //                     </td>
            //                     <td class="kt-datatable__cell--center pr-0 kt-datatable__cell" data-field="Actions">
            //                         <span style="overflow: visible; position: relative; width: 80px;">
            //                             <a class="btn btn-xs btn-icon btn-danger btn-pill pointer remove_items" style="border:none;">
            //                                 <i title="Add Item" class="la la-close"></i>
            //                             </a>
            //                         </span>
            //                     </td>
            //                 </tr>
            //                     `;
                    
            //         if($("#selected_items_table").find('tr[data-inv-id="'+inv_id+'"]').length == 0){
            //             $('#selected_items_table').append(selecteditem);
            //         }
                    
            //         $('.items').focusout(function(e){
            //             e.preventDefault();
            //             totalPrice($(this));
            //             g_total();
            //         })
                
            //         $('.discounts').focusout(function(e){
            //             e.preventDefault();
            //             totalPrice1($(this));
            //             g_total();
            //         })
                    
            //         $('.dis_types').on('change', function(e){
            //             e.preventDefault();
            //             totalPrice2($(this));
            //             g_total();
            //         })
            //     });
            // }
        });
    
    </script>