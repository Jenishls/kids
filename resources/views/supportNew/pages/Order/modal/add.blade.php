<style>
        .form-group{
            padding-bottom:5px !important;
        }
        label{
            font-weight: bold !important;
        }
        .portlet_label{
            position: absolute;
            font-weight: 500;
            display: table;
            z-index: 1;
            font-size: 15px;
            padding: 7px 26px;
            letter-spacing: 1px;
            border: 1px solid #f1f2f6;
            border-radius: 19px;
            background: #41bcf6;
            color: white!important;
            font-size: 13px!important;
        }
       /* .portlet_label:hover{
            color: #e5f7ff!important;
        }*/
        .form-group label {
            font-size: 0.9rem!important;
            font-weight: 500!important;
        }
        .nav-link.modal_tab_headers{
            text-align:center!important;
        }
        .tableParentTitle{
            padding: 10px;
            background: #49bdf4!important;
            color: #ffffff!important;
            font-weight: 500;
            border: 1px solid #ebedf2;
            margin-bottom: 10px!important;
        }
        .custom_wizard_table{
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            background-color: #e5f7ff26;
            border: 1px solid #e1e1ef;
        }
        .img_placeholder{
          height: 100px;
        }
        .img_placeholder img{
          max-width: 100%;
          height: 100%;
          object-fit: contain;
        }
        .modal-900 {
          width: 900px!important;
        }
    </style>
    <div class="modal-dialog custom_dialog" role="document" style="min-width: 800px !important; max-width: 800px !important;">
        <div class="modal-content" style="width: 650px !important;">
            <div class="modal-header">
                <h5 class="modal-title" style="margin-left:2.5rem;" id="cWizardTitle">Add Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:cornsilk;">
                </button>
            </div>
            <div class="modal-body" style="padding:0px !important;" id="demoWizard">
                <div class="kt-portlet kt-
                --tabs" style="margin-bottom:0px !important;">
                    <div class="kt-portlet__head" style="padding:0px !important;">
                        <div class="kt-portlet__head-toolbar" style="width:100%;padding: 0 25px;">
                            <ul class="nav  nav-tabs-line" role="tablist"  style="width: 100%;display:flex;">
                                <li class="wizard-tabs active" data-target="#generalWForm" style="flex:1;margin-right:0px !important;">
                                    <a class="nav-link modal_tab_headers"  data-toggle="tab" href="javascript:" role="tab" aria-selected="false">
                                        <i class="la la-user mr-1"></i>General
                                    </a>
                                </li>
                                <li class="wizard-tabs col-sm-12" data-target="#deliveryWForm" style="flex:1;margin-right:0px !important;">
                                    <a class="nav-link modal_tab_headers"  data-toggle="tab"  href="javascript:" role="tab" aria-selected="false">
                                        <i class="flaticon-cart mr-1"></i> Delivery
                                    </a>
                                </li>
                                <li class="wizard-tabs col-sm-12"   data-target="#pickupWForm" style="flex:1;margin-right:0px !important;">
                                    <a class="nav-link modal_tab_headers"  data-toggle="tab"  href="javascript:" role="tab" aria-selected="true">
                                        <i class="flaticon-bag mr-1"></i> Pickup
                                    </a>
                                </li>
                                <li class="wizard-tabs col-sm-12"   data-target="#extraWForm" style="flex:1;margin-right:0px !important;">
                                    <a class="nav-link modal_tab_headers"  data-toggle="tab"  href="javascript:" role="tab" aria-selected="true">
                                        <i class="flaticon2-group mr-1"></i> Extra
                                    </a>
                                </li>
                                <li class="wizard-tabs col-sm-12"   data-target="#paymentWForm" style="flex:1;margin-right:0px !important;">
                                    <a class="nav-link modal_tab_headers"  data-toggle="tab"  href="javascript:" role="tab" aria-selected="true">
                                        <i class="fab fa-amazon-pay mr-1"></i> Payment
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                        <form class="kt-form kt-form--label-right" id="order_add_form">   
                            @csrf
                            <div class="tab-content">
                                <div class="wizard-panel active" id="generalWForm" role="tabpanel" style="background:#e5f7ff !important;">
                                    <div class="kt-portlet__body" id="accountWizardForm" style="padding:25px;padding-bottom:0px !important;">
                                        <div class="row mb-3">
                                            <div class="form-group col-md-12">
                                                <div class="shadow_inputs">
                                                    <div class="form-group row ">
                                                        <div class="col-md-3 col-sm-6" >
                                                           <label class="control-label">Zip From</label>
                                                          <input type="text" name="current_zip" class="form-control mask--zip">
                                                          <div class="errorMessage"></div>
                                                       </div>
                                                       <div class="col-md-3 col-sm-6">
                                                           <label class="control-label" for="industry">Zip To</label>
                                                           <input class="form-control mask--zip" type="text" name="moving_zip"  autocomplete="off">
                                                           <div class="errorMessage"></div>
                                                       </div>
                                                       <div class="col-md-3 col-sm-6">
                                                           <label class="control-label" for="ownership">Package</label>
                                                           <select class="form-control" name="package_id" id="package_type">
                                                            </select>
                                                           <div class="errorMessage"></div>
                                                       </div>
                                                       <div class="col-md-3 col-sm-6">
                                                           <label class="control-label" for="ownership">Sales Rep</label>
                                                           <select class="form-control" name="sales_rep" id="sales_rep">
                                                            </select>
                                                           <div class="errorMessage"></div>
                                                       </div>
                                                       <div class="col-md-6 col-sm-6">
                                                           <label class="control-label" for="estd_date">First Name</label>
                                                           <input class="form-control" type="text" name="first_name" autocomplete="off">
                                                           <div class="errorMessage"></div>
                                                       </div>
                                                       <div class="col-md-6 col-sm-6">
                                                           <label class="control-label" for="reg_no">Last Name</label>
                                                           <input class="form-control" type="text" name="last_name" autocomplete="off">
                                                           <div class="errorMessage"></div>
                                                       </div>
                                                       <div class="col-md-6 col-sm-6">
                                                           <label class="control-label" for="account_code">Email</label>
                                                           <input class="form-control" type="text" name="email" autocomplete="off">
                                                           <div class="errorMessage"></div>
                                                       </div>
                                                       <div class="col-md-6 col-sm-6">
                                                           <label class="control-label" for="credit_terms">Phone</label>
                                                           <input class="form-control" type="text" name="phone"  autocomplete="off">
                                                           <div class="errorMessage"></div>
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-panel" id="deliveryWForm" style="background:#e5f7ff !important;">
                                    <div class="kt-portlet__body" style="padding: 20px 15px 0!important;">
                                        <div class="form-group col-md-12">
                                            <div class="shadow_inputs">
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-12" style="padding-top:10px;">
                                                        <label class="control-label" for="add1">Street Name</label>
                                                        <input class="form-control" type="text" id="delivery_street" name="delivery_addr1">
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                        <label class="control-label" for="add2">Apartment</label>
                                                        <input class="form-control" type="text" id="delivery_apt" name="delivery_addr2">
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                        <label class="control-label" for="add2">City</label>
                                                        <input class="form-control" type="text" id="delivery_city" name="delivery_city">
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                        <label class="control-label" for="user_city">State</label>
                                                        <input class="form-control" type="text" id="delivery_state" name="delivery_state">
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                                        <label class="control-label" for="user_state">Zip</label>
                                                        <input class="form-control mask--zip" type="text" id="delivery_zip" name="delivery_zip">
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group col-lg-6  col-md-6 col-sm-6">
                                                        <label class="control-label" for="user_county">Date</label>
                                                        <input class="form-control datepick" type="text" id="delivery_date" name="delivery_date">
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group col-lg-6  col-md-6 col-sm-6">
                                                        <label class="control-label" for="user_county">Preffered time of day</label>
                                                        <select name="temporary_pickup_time" id="delivery_pref_date_time" class="form-control preferred_time">
                                                                <option value="6-9AM" selected="">6-9AM</option>
                                                                <option value="9-12AM ">9-12AM </option>
                                                                <option value="12-3PM">12-3PM</option>
                                                                <option value="3-6PM">3-6PM</option>
                                                            </select>
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group col-lg-12  col-md-12 col-sm-12">
                                                        <label class="control-label" for="user_county">Notes</label>
                                                        <textarea class="form-control" rows="3" id="delivery_note" name="delivery_note"></textarea>
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-panel" id="pickupWForm" style="background:#e5f7ff !important;">
                                    <div class="kt-portlet__body" style="padding: 20px 15px 0!important;">
                                        <div class="form-group col-md-12">
                                            <div class="shadow_inputs">
                                                <div class="form-group row">
                                                    <div class="kt-checkbox-list ml-10" >
                                                        <label class="kt-checkbox" >
                                                            <input type="checkbox" class="same_as_delivery"> Same As Delivery Address
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group  col-md-12" style="padding-top:10px;">
                                                        <label class="control-label" for="add1">Street Name</label>
                                                        <input class="form-control" type="text" id="pickup_street" name="pickup_addr1">
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                        <label class="control-label" for="add2">Apartment</label>
                                                        <input class="form-control" type="text" id="pickup_apt" name="pickup_addr2">
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                        <label class="control-label" for="add2">City</label>
                                                        <input class="form-control" type="text" id="pickup_city" name="pickup_city">
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                        <label class="control-label" for="user_city">State</label>
                                                        <input class="form-control" type="text" id="pickup_state" name="pickup_state">
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                                        <label class="control-label" for="user_state">Zip</label>
                                                        <input class="form-control mask--zip" id="pickup_zip" type="text" name="pickup_zip">
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group col-lg-6  col-md-6 col-sm-6">
                                                        <label class="control-label" for="user_county">Date</label>
                                                        <input class="form-control datepick" id="pickup_date" type="text" name="pickup_date">
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group col-lg-6  col-md-6 col-sm-6">
                                                        <label class="control-label" for="user_county">Preffered time of day</label>
                                                        <select name="temporary_pickup_time" id="pickup_pref_date_time" class="form-control preferred_time">
                                                                <option value="6-9AM" selected="">6-9AM</option>
                                                                <option value="9-12AM ">9-12AM </option>
                                                                <option value="12-3PM">12-3PM</option>
                                                                <option value="3-6PM">3-6PM</option>
                                                            </select>
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group col-lg-12  col-md-12 col-sm-12">
                                                        <label class="control-label" for="user_county">Notes</label>
                                                        <textarea class="form-control" rows="3" id="pickup_note" name="pickup_note"></textarea>
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-panel" id="extraWForm" style="background:#e5f7ff !important;">
                                    <div class="kt-portlet__body" style="padding: 20px 15px 0!important;">
                                        <div class="form-group col-md-12">
                                            <div class="shadow_inputs">
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-6">
                                                        <label class="control-label" for="add2">Need A Delivery In A Walk-Up Apartment? </label>
                                                        <select name="delivery_appartment" class="form-control delivery_apartment add--extras">
                                                            <option value="0" class="text-capitalize">street level free</option>
                                                            <option value="5" class="text-capitalize">1 flight $5.00 </option>
                                                            <option value="10" class="text-capitalize">2 flight $10.00</option>
                                                            <option value="15" class="text-capitalize">3 flight $15.00</option>
                                                            <option value="20" class="text-capitalize">4 flight $20.00</option>
                                                        </select>
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                        <label class="control-label" for="add2">Need A Pickup In A Walk-Up Apartment?</label>
                                                        <select name="pickup_appartment" class="form-control pickup_apartment add--extras">
                                                            <option value="0" class="text-capitalize">street level free</option>
                                                            <option value="5" class="text-capitalize">1 flight $5.00 </option>
                                                            <option value="10" class="text-capitalize">2 flight $10.00</option>
                                                            <option value="15" class="text-capitalize">3 flight $15.00</option>
                                                            <option value="20" class="text-capitalize">4 flight $20.00</option>
                                                        </select>
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group  col-md-6" style="padding-top:10px;">
                                                        <label class="control-label" for="add1">Communication Preferrence?</label>
                                                        <select name="prefer_method_of_contact" class="form-control">
                                                            <option value="" selected="" class="text-capitalize ">Select</option>
                                                            <option class="text-capitalize">call me</option>
                                                            <option value="sms" class="text-capitalize">text me</option>
                                                            <option value="email" class="text-capitalize">email me</option>
                                                        </select>    
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group  col-md-6" style="padding-top:10px;">
                                                        <label class="control-label" for="add1">Coupon</label>
                                                        <input class="form-control" type="text" name="coupon_code">   
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-panel" id="paymentWForm" style="background:#e5f7ff !important;">
                                    <div class="kt-portlet__body" style="padding: 20px 15px 0!important;">
                                        <div class="form-group col-md-12">
                                            <div class="shadow_inputs">
                                                <div class="form-group">
                                                    <label>Payment Using</label>
                                                    <select class="form-control check_payment" name="check_payment" id="expiration_month">
                                                        <option value="1">Cash</option>
                                                        <option value="2">Card</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="shadow_inputs" id="card_payment" style="display: none;">
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-12">
                                                        <label class="control-label" for="add2">Card Number </label>
                                                        <input class="form-control" type="text" name="card">
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group  col-md-4">
                                                        <label class="control-label" for="add2">CVV </label>
                                                        <input class="form-control" type="text" name="code">
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group  col-md-4">
                                                        <label class="control-label" for="add2">Expiry Month</label>
                                                        <select class="form-control" name="expm" id="expiration_month">
                                                            <option value="01">January</option>
                                                            <option value="02">February</option>
                                                            <option value="03">March</option>
                                                            <option value="04">April</option>
                                                            <option value="05">May</option>
                                                            <option value="06">June</option>
                                                            <option value="07">July</option>
                                                            <option value="08">August</option>
                                                            <option value="09">September</option>
                                                            <option value="10">October</option>
                                                            <option value="11">November</option>
                                                            <option value="12">December</option>
                                                        </select>
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group  col-md-4">
                                                        <label class="control-label" for="add2">Expiry Year</label>
                                                        <select class="form-control" name="expy" id="expiration_month">
                                                            <option value="01">2017</option>
                                                            <option value="02">2018</option>
                                                            <option value="03">2019</option>
                                                            <option value="04">2020</option>
                                                            <option value="05">2021</option>
                                                        </select>
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group  col-md-8">
                                                        <label class="control-label" for="add2">Name As Per Card</label>
                                                        <input class="form-control" type="text" name="name_per_card">
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group  col-md-4">
                                                        <label class="control-label" for="add2">Zip Code</label>
                                                        <input class="form-control mask--zip" type="text" name="zip">
                                                            <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot footer_white">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-md-6  wizard--btn" data-wizard-step="prev">
                                            <button type="reset" class="btn btn-secondary btn-sm btn-pill" ><i class="la la-arrow-left"></i>Back</button>
                                        </div>
                                        <div class="col-md-6 kt-align-right wizard--btn ml-auto" data-wizard-step="next">
                                            <button type="" class="btn btn-sm btn-pill btn-success " >Continue <i class="la la-arrow-right"></i></button>
                                        </div>
                                        <div class="col-md-6 wizard--btn kt-align-right ml-auto" data-wizard-step="save">
                                            <button type="" class="btn btn-sm btn-pill btn-success" id="storeOrder">Save <i class="la la-save"></i></button>
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
    phoneMask("[name='phone']");
    zipMask(".mask--zip")
    cardMask("[name='card']");
    cvvMask("[name='code']");

    $('#package_type').select2({
        placeholder: 'Select Package',
        width: '100%',
        ajax: {
            method: 'POST',
            url: '/admin/order/package/all',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processResults: function(data) {
                let res = [];
                $.each(data, function(i, obj) {
                    res.push({
                        id: obj.id,
                        text: obj.package_name
                    });
                });
                return {
                    results: res
                };
            }
        }
    });
    
    $('#sales_rep').select2({
        placeholder: 'Select Sales Rep',
        width: '100%',
        tags: true,
        ajax: {
            method: 'POST',
            url: '/admin/order/users/all',
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
    
    var estd_date= $('.datepick').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        autoUpdateInput: false,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'),10)
      }, function(start, end, label) {
        this.element.val( start.format('MM/DD/YYYY'));
      });
    var newWiz = $('#demoWizard').WizardForm();
    newWiz.on('beforeNext', function(wizard){
       
        if($('#package_type').val() == null){
            $(document).find('[data-target="#paymentWForm"]').hide();
            $(document).find('[data-target="#extraWForm"]').hide();
            if(wizard.nextStep()[0] == $('[data-target="#pickupWForm"]')[0]){
                setTimeout(function(){
                    $('[data-wizard-step ="save"]').addClass('active');
                    $('[data-wizard-step ="next"]').removeClass('active');
                }, 100)
            }
        }
        else{
            $(document).find('[data-target="#paymentWForm"]').show();
            $(document).find('[data-target="#extraWForm"]').show();
        }
    });
    $('#storeOrder').off('click').on('click', function(e){
      e.preventDefault();
      let data = $('#order_add_form').serializeArray();
      supportAjax({
        url:'/admin/order/add',
        method:'Post',
        data
        }, function(resp){
            $('#cModal1').modal('hide');
            toastr.success('<strong>'+resp.message+'</strong>');
            $("#reload_table").trigger('click');
      },
      function(err){
        console.log(err);
      })
    })

    $(document).off('input keyup','.e_mask_zip').on('input keyup','.e_mask_zip', function(e){
        e.preventDefault();
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,5}))/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    });

    $(document).off('change', '.check_payment').on('change', '.check_payment', function(e) {
        e.preventDefault();
        e.stopPropagation();
        if($(this).val() == 1){
            $('#card_payment').hide();
        }
        else{
            $('#card_payment').show();
        }
    });
    
    $(document).off('change', '.same_as_delivery').on('click', '.same_as_delivery', function(e) {
        e.preventDefault();
        $('#pickup_street').val($('#delivery_street').val());
        $('#pickup_apt').val($('#delivery_apt').val());
        $('#pickup_city').val($('#delivery_city').val());
        $('#pickup_state').val($('#delivery_state').val());
        $('#pickup_zip').val($('#delivery_zip').val());
        $('#pickup_date').val($('#delivery_date').val());
        $('#pickup_pref_date_time').val($('#delivery_pref_date_time').val());
        $('#pickup_note').val($('#delivery_note').val());
    });
    </script>