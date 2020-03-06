<style>
        .box_shadow{
            padding: 10px 15px 10px 15px;
            margin-bottom: 10px;
            border-radius: 4px;
            background: #fefefe;
            box-shadow: 2px 2px 7px 1px rgba(201, 201, 201, 0.7);
        }
        
        .portlet_custom_label {
            margin-top: -25px;
            font-weight: 800;
            display: table;
            z-index: 1;
            font-size: 12px;
            padding: 5px 15px;
            letter-spacing: 1px;
            border: 1px solid #f1f2f6;
            border-radius: 19px;
            background: #cbcbcb;
            color: #646c9a;
        }
        
        .dropzone {
            border: 2px dashed #0087F7;
            border-radius: 5px;
            background: white;
            min-height: 150px;
            padding: 54px 54px;
            box-sizing: border-box;
            cursor: pointer;
        }
        
        .boldLabel{
            font-weight: 600 !important;
        }
        </style>
        <div class="modal-dialog addProductModalDialog modal-md" role="document" style="margin-top: 4% !important; margin-left: 31% !important;">
            <div class="modal-content addProductModal" style="width: 700px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pickup Detail</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="color: #fff !important;">
                    </button>
                </div>
                <div class="modal-body no-padding" style="">
                    <div class="kt-portlet" style="margin-bottom:0px !important;">
                        <div class="kt-portlet__body no-padding" style="background:#e4e4e4 !important; "> 
                            <form class="kt-form kt-form--label-right" id="pickupEditForm">   
                                @csrf
                                <div class="pt-10" style="background:#e5f7ff !important;">
                                    <div class="kt-portlet__body pl-35 pr-35 pb-35">
                                        <div class="row mb-5 no-margin">
                                            <div class="form-group col-12 box_shadow" >
                                                <div class="form-group row" style="padding: 5px;">
                                                <input type="hidden" id="check_pickup_date" value="{{$order->pickup_date}}">
                                                <input type="hidden" id="check_order_items" value="{{$order->items}}">
                                                    <div class="col-lg-12">
                                                        <label class="control-label boldLabel" for="salutation">Address 1</label>
                                                    <input class="form-control" type="text" name="add1" id="code" value="{{$order->pickupAddr?$order->pickupAddr->add1:""}}" required="require" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="padding: 5px;">
                                                    <div class="col-lg-12">
                                                        <label class="control-label boldLabel" for="salutation">Address 2</label>
                                                        <input class="form-control" type="text" name="add2" id="code" value="{{$order->pickupAddr?$order->pickupAddr->add2:""}}" required="require" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="padding: 5px;">
                                                    <div class="col-6">
                                                        <label class="control-label boldLabel" for="dob">City</label>
                                                        <div class="input-group">
                                                            <input class="form-control" type="text" name="city" value="{{$order->pickupAddr?$order->pickupAddr->city:""}}" autocomplete="off">
                                                        </div>
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="control-label boldLabel" for="dob">State</label>
                                                        <div class="input-group">
                                                            <input class="form-control" type="text" name="state" value="{{$order->pickupAddr?$order->pickupAddr->state:""}}" autocomplete="off">
                                                        </div>
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row" style="padding: 5px;">
                                                    <div class="col-6">
                                                        <label class="control-label boldLabel" for="dob">Zip</label>
                                                        <div class="input-group">
                                                            <input class="form-control" type="text" name="zip" value="{{$order->pickupAddr?$order->pickupAddr->zip:""}}" autocomplete="off">
                                                        </div>
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="control-label boldLabel" for="dob">County</label>
                                                        {{--  --}}
                                                        <div class="input-group">
                                                            <input class="form-control" type="text" name="county" value="{{$order->pickupAddr?$order->pickupAddr->county:""}}" autocomplete="off">
                                                        </div>
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="padding: 5px;">
                                                    <div class="col-6">
                                                        <label class="control-label boldLabel" for="dob">Country</label>
                                                        <div class="input-group">
                                                            <input class="form-control" type="text" name="country" value="{{$order->pickupAddr?$order->pickupAddr->country:"-"}}" autocomplete="off">
                                                        </div>
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="control-label boldLabel" for="dob">Pickup Date</label>
                                                        <div class="input-group">
                                                        <input class="form-control" type="text" id="pickup_date" data-moving-date="{{$order->delivery_date?format_to_us_date($order->delivery_date):''}}" data-days="{{$days}}" name="pickup_date" value="{{$order->pickup_date?format_to_us_date($order->pickup_date):""}}" autocomplete="off">
                                                        </div>
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	                
                                    </div>
                                    <div class="kt-portlet__foot footer_white">
                                        <div class="kt-form__actions">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <button type="reset" class="btn btn-secondary btn-pill" data-dismiss="modal"> <i class="la la-times"></i>Cancel</button>
                                                </div>
                                                <div class="col-lg-6 kt-align-right">
                                                    <button type="" class="btn btn-success btn-pill" id="updatePickup"><i class="la la-save"></i>Save</button>
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
            var pickup_extend_data = {};
            var payment_data = {};

            $('#pickup_date').daterangepicker({
                singleDatePicker: true,
                parentEl:$('#pickupEditForm'),
                showDropdowns: true,
                minYear: 2001,
                maxYear: parseInt(moment().format('YYYY'),10)
            }).on('change', function(e){
                e.preventDefault();
                let newPickup = $(this).val();
                let delivery_date = $(this).attr('data-moving-date');
                let days = $(this).attr('data-days');

                const date1 = new Date(delivery_date);
                const date2 = new Date(newPickup);
                const diffTime = Math.abs(date1 - date2);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

                if($('#check_pickup_date').val() != "" && $('#check_order_items').val() != "[]"){
                    if(date1 >= date2){
                        toastr.error("Date cannet be past Moving Date");
                    }
                    else{
                        if(diffDays > days){
                            showModal({
                                url: '/admin/order/addInvoice/{{$order->id}}?new_pickup_date='+newPickup,
                                p:1,
                                c: 2
                            });
                        }
                        else if(diffDays < days){
                            showModal({
                                url: '/admin/order/addRefundInvoice/{{$order->id}}?new_pickup_date='+newPickup,
                                p:1,
                                c: 2
                            });
                        }
                    }
                }
            });
        
            $(document).off('click','#updatePickup').on('click','#updatePickup',function(e){
                e.preventDefault();
                let formData = new FormData(document.getElementById('pickupEditForm')) 
                if(!$.isEmptyObject(pickup_extend_data)){
                    for (var pair of pickup_extend_data.entries()) {
                        formData.append(pair[0], pair[1]);
                    }
                    if(!$.isEmptyObject(payment_data)){
                        for (var pair of payment_data.entries()) {
                            formData.append(pair[0], pair[1]);
                        }
                    }
                }
                $.ajax({
                    url:'/admin/order/edit/pickup/{{$order->id}}',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    
                    success: function(response){
                        $('#cModal1').modal('hide');
                        toastr.success(response.message);
                        $('#orderItemDatatable').KTDatatable().reload();
                        $('#invoicedataTable').KTDatatable().reload();
                        $('#paymentdataTable').KTDatatable().reload(); 
                        $('#orderItemDatatable').KTDatatable().reload();
                        $('#invoicedataTable').KTDatatable().reload();
                        
                        if(response.pickup_addr.add1){
                            $('#span_pickup_add1').text(response.pickup_addr.add1?response.pickup_addr.add1:"").closest('div').show();
                        }
                        if(response.pickup_addr.add2){
                            $('#span_pickup_add2').text(response.pickup_addr.add2?response.pickup_addr.add2:"").closest('div').show();
                        }
                        if(response.pickup_addr.city || response.pickup_addr.county || response.pickup_addr.state){
                            $('#span_pickup_city').text(response.pickup_addr.city?response.pickup_addr.city:"" +','+ response.pickup_addr.county?response.pickup_addr.county:"" +','+ response.pickup_addr.state?response.pickup_addr.state:"").closest('div').show();
                        }
                        if(response.pickup_addr.country || response.pickup_addr.zip){
                            $('#span_pickup_zip').text(response.pickup_addr.country?response.pickup_addr.country:"" +','+ response.pickup_addr.zip?response.pickup_addr.zip:"").closest('div').show();
                        }
                        $('#span_pickup_date').text(moment(response.data.pickup_date).format('MM/DD/YYYY'));
                        $('#span_invoice').text(response.invoice);
                        $('#span_balance').text(response.balance);
                    }, 
                    error:function({status, responseJSON})
                    {
                        
                    }
                });
            });
        </script>