<style>
    .form-group{
        padding-bottom:5px !important;
    }
    label{
        font-weight: bold !important;
    }
    .portlet_label{
        font-size: 13px!important;
        color: white !important;
        border: 1px solid #e2e5ec;
        background-color: rgba(103, 193, 236, 0.87);
    }
    .form-group label {
    font-size: 0.9rem!important;
    font-weight: 500!important;
    }
</style>
@if($data['status'] == 0)
<div class="modal-dialog" role="document" style="margin-left:16%; margin-top:1.5rem;">
    <div class="modal-content modal-1300">
        <div class="modal-header">
            <h5 class="modal-title" style="margin-left:2.5rem;" id="exampleModalLabel">Add Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:cornsilk;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet kt-portlet--tabs" style="margin-bottom:0px !important;">
                <div class="kt-portlet__head" style="padding:0px !important;">
                    <div class="kt-portlet__head-toolbar" style="width:100%;">
                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success" role="tablist" id="clientForm" style="width: 100%;display:flex;">
                            <li class="nav-item form_next_step" data-step = '0' data-action="add" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link active modal_tab_headers"  data-toggle="tab" href="#account_wizard_tab" role="tab" aria-selected="false">
                                    <i class="la la-user"></i> Account
                                </a>
                            </li>
                            <li class="nav-item form_next_step" data-step = '1' data-action="add" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab"  href="#branch_wizard_tab" role="tab" aria-selected="false">
                                    <i class="la la-file-text"></i>Branches
                                </a>
                            </li>
                            <li class="nav-item form_next_step" data-step = '2' data-action="add" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab"  href="#member_wizard_tab" role="tab" aria-selected="true">
                                    <i class="la la-photo"></i>Members
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body" style="background:#f9f4f4 !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="add_account_form">   
                        @csrf
                        <div class="tab-content" id="tabContent">
                            <div class="tab-pane active" id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel" style="background:#f9f4f4 !important;">
                                <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important;">
                                    <div class="row">
                                        <div class="form-group col-7">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="btn portlet_label" style="top:-4%!important; left:3%!important">General Info</span> 
                                                    <div class="shadow_inputs">
                                                        <div class="form-group row " style="padding-top:10px;">
                                                            <div class="col-lg-4" >
                                                                <label class="control-label" for="salutation">Company Name</label>
                                                               <input type="text" name="company_name" class="form-control" placeholder="XYZ Co.Ltd">
                                                               <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="control-label" for="first_name">Industry</label>
                                                                <input class="form-control" type="text" name="industry" placeholder="Industry" autocomplete="off">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="control-label" for="middle_name">Ownership</label>
                                                                <input class="form-control" type="text" name="ownership" placeholder="Ownership" autocomplete="off">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="control-label" for="last_name">Establised Date</label>
                                                                <input class="form-control" type="date" name="estd_date" autocomplete="off">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="control-label" for="">Registration Number</label>
                                                                <input class="form-control" type="text" name="reg_no" maxlength="10" placeholder="Example: GB123456789" autocomplete="off">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="control-label" for="">Account Code</label>
                                                                <input class="form-control" type="text" name="account_code" placeholder="Example: XXXXXX" maxlength="6" autocomplete="off">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="control-label" for="">Credit Terms</label>
                                                                <input class="form-control" type="text" name="credit_terms" placeholder="Example: 2/10, net 30"  autocomplete="off">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="control-label" for="">URL</label>
                                                                <input class="form-control" type="text" name="url" placeholder="Example: www.xyz.com"  autocomplete="off">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="control-label" for="">References</label>
                                                                <input class="form-control" type="text" name="reference" placeholder="Example: 0123 456"  autocomplete="off">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <label class="control-label" for="">Description</label>
                                                                <textarea name="short_desc" class="form-control" cols="30" rows="11" placeholder="Some words about your company.."></textarea>
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-5">
                                            <div class="row">
                                                <div class="col-md-12 pb-4">
                                                    <span class="btn portlet_label" style="top:-4%!important;left:4%">Address & Contact</span>    
                                                    <div class="shadow_inputs">
                                                        <div class="form-group row" style="padding-top:10px;">
                                                            <div class="form-group  col-md-12" >
                                                                <label class="control-label" for="add1">Address 1</label>
                                                                <input class="form-control" type="text" name="add1">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="form-group  col-md-12">
                                                                <label class="control-label" for="add2">Address 2</label>
                                                                <input class="form-control" type="text" name="add2">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            
                                                            <div class="form-group  col-md-4">
                                                                <label class="control-label" for="state">State</label>
                                                                <input class="form-control" type="text" name="state">
                                                            </div>
                                                            <div class="form-group  col-md-4">
                                                                <label class="control-label" for="zip">Zip</label>
                                                                <input class="form-control" type="text" name="zip">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="form-group  col-md-4">
                                                                <label class="control-label" for="country">County</label>
                                                                <input class="form-control" type="text" name="county">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="form-group  col-md-6">
                                                                <label class="control-label" for="user_city">City</label>
                                                                <input class="form-control" type="text"  name="city">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="form-group  col-md-6">
                                                                <label class="control-label" for="user_city">Country</label>
                                                                <input class="form-control" type="text"  name="country">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                 <label class="control-label" for="s_email">Name</label>
                                                                <input class="form-control" type="text" name="name">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                 <label class="control-label" for="email">Primary Email</label>
                                                                <input class="form-control" type="email" name="email">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                 <label class="control-label" for="phone_no">Phone Number</label>
                                                                <input class="form-control" type="number" name="phone_no">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                 <label class="control-label" for="mobile_no">Mobile Number</label>
                                                                <input class="form-control" type="number" name="mobile_no">
                                                                <div class="errorMessage"></div>
                                                            </div>
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
                                            <div class="col-lg-6">
                                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            </div>
                                            <div class="col-lg-6 kt-align-right">
                                                <button type="submit" class="btn btn-success">Submit</button>
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
@else
<div class="modal-dialog" role="document" style="margin-left:16%; margin-top:1.5rem;">
    <div class="modal-content modal-1300">
        <div class="modal-header">
            <h5 class="modal-title" style="margin-left:2.5rem;" id="exampleModalLabel">Edit Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:cornsilk;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet kt-portlet--tabs" style="margin-bottom:0px !important;">
                <div class="kt-portlet__body" style="background:#f9f4f4 !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="edit_account_form" data-accountid="{{$data['account']->id}}">   
                        @csrf
                        <div class="tab-content" id="tabContent">
                            <div class="tab-pane active" id="account_wizard_tab" role="tabpanel" style="background:#f9f4f4 !important;">
                                <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important;">
                                    <div class="row">
                                        <div class="form-group col-7">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="btn portlet_label" style="top:-4%!important; left:3%!important">General Info</span> 
                                                    <div class="shadow_inputs">
                                                        <div class="form-group row " style="padding-top:10px;">
                                                            <div class="col-lg-4" >
                                                                <label class="control-label" for="salutation">Company Name</label>
                                                               <input type="text" value="{{$data['account']->company_name}}" name="company_name" class="form-control" placeholder="XYZ Co.Ltd">
                                                               <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="control-label" for="first_name">Industry</label>
                                                                <input class="form-control" type="text" name="industry" value="{{$data['account']->industry}}" placeholder="Industry" autocomplete="off">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="control-label" for="middle_name">Ownership</label>
                                                                <input class="form-control" type="text" name="ownership" value="{{$data['account']->ownership}}" placeholder="Ownership" autocomplete="off">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="control-label" for="last_name">Establised Date</label>
                                                                <input class="form-control" value="{{$data['account']->estd_date->format('Y-m-d')}}" type="date" name="estd_date" autocomplete="off">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="control-label" for="">Registration Number</label>
                                                                <input class="form-control" type="text" name="reg_no" value="{{$data['account']->company->reg_no}}" maxlength="10" placeholder="Example: GB123456789" autocomplete="off">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="control-label" for="">Account Code</label>
                                                                <input class="form-control" type="text" name="account_code" value="{{$data['account']->account_code}}" placeholder="Example: XXXXXX" maxlength="6" autocomplete="off">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="control-label" for="">Credit Terms</label>
                                                                <input class="form-control" value="{{$data['account']->credit_terms}}" type="text" name="credit_terms" placeholder="Example: 2/10, net 30"  autocomplete="off">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="control-label" for="">URL</label>
                                                                <input class="form-control" type="text" name="url" value="{{$data['account']->url}}" placeholder="Example: www.xyz.com"  autocomplete="off">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="control-label" for="">References</label>
                                                                <input class="form-control" type="text" name="reference" placeholder="Example: 0123 456" value="{{$data['account']->reference}}"  autocomplete="off">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <label class="control-label" for="">Description</label>
                                                                <textarea name="short_desc" class="form-control" cols="30" rows="11" placeholder="Some words about your company..">{{$data['account']->short_desc}}"</textarea>
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-5">
                                            <div class="row">
                                                <div class="col-md-12 pb-4">
                                                    <span class="btn portlet_label" style="top:-4%!important;left:4%">Address & Contact</span>    
                                                    <div class="shadow_inputs">
                                                        <div class="form-group row" style="padding-top:10px;">
                                                            <div class="form-group  col-md-12" >
                                                                <label class="control-label" for="add1">Address 1</label>
                                                                <input value="{{$data['account']->hOAddress->add1}}" class="form-control" type="text" name="add1">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="form-group  col-md-12">
                                                                <label class="control-label" for="add2">Address 2</label>
                                                                <input value="{{$data['account']->hOAddress->add2}}" class="form-control" type="text" name="add2">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="form-group  col-md-4">
                                                                <label class="control-label" for="state">State</label>
                                                                <input value="{{$data['account']->hOAddress->state}}" class="form-control" type="text" name="state">
                                                            </div>
                                                            <div class="form-group  col-md-4">
                                                                <label class="control-label" for="zip">Zip</label>
                                                                <input value="{{$data['account']->hOAddress->zip}}" class="form-control" type="text" name="zip">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="form-group  col-md-4">
                                                                <label class="control-label" for="country">County</label>
                                                                <input value="{{$data['account']->hOAddress->county}}" class="form-control" type="text" name="county">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="form-group  col-md-6">
                                                                <label class="control-label" for="user_city">City</label>
                                                                <input value="{{$data['account']->hOAddress->city}}" class="form-control" type="text"  name="city">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="form-group  col-md-6">
                                                                <label class="control-label" for="user_city">Country</label>
                                                                <input value="{{$data['account']->hOAddress->country}}" class="form-control" type="text"  name="country">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                 <label class="control-label" for="email">Name</label>
                                                                <input value="{{$data['account']->contact->fname}} {{$data['account']->contact->lname}}" class="form-control" type="text" name="name">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                 <label class="control-label" for="email">Email</label>
                                                                <input value="{{$data['account']->contact->email}}" class="form-control" type="email" name="email">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                 <label class="control-label" for="phone_no">Phone Number</label>
                                                                <input value="{{$data['account']->contact->phone_no}}" class="form-control" type="text" name="phone_no">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                 <label class="control-label" for="mobile_no">Mobile Number</label>
                                                                <input value="{{$data['account']->contact->mobile_no}}" class="form-control" type="text" name="mobile_no">
                                                                <div class="errorMessage"></div>
                                                            </div>
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
                                            <div class="col-lg-6">
                                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            </div>
                                            <div class="col-lg-6 kt-align-right">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="branch_wizard_tab" role="tabpanel" style="background:#f9f4f4 !important;">
                                branch
                            </div>
                            <div class="tab-pane" id="member_wizard_tab" role="tabpanel" style="background:#f9f4f4 !important;">
                                member
                            </div>
                        </div>
                    </form>     
                </div>
            </div>
        </div>
    </div>
</div>

@endif

{{-- $('.issuedDatepicker, .accountDatePicker').datepicker({
        format:'yyyy-mm-dd',
        // rtl: KTUtil.isRTL(),
        todayHighlight: true,
        orientation: "bottom left",
        templates: arrows
    }).on('hide', function(event) {
        event.preventDefault();
        event.stopPropagation();
    }); --}}
<script>
    
    $(document).off('submit','#add_account_form').on('submit','#add_account_form',function(e){
        e.preventDefault();
        let data = $(this).serializeArray();
        supportAjax({
            url:'/admin/account/store',
            method:'POST',
            data
        },
        function(resp)
        {
            $('#cModal').modal('hide');
            toastr.success(resp.success);
            $('#t_account_table').KTDatatable().reload();
        },
        function(err)
        {
               $('#add_account_form').find('input[name], select[name]').css('border-color', '#ddd');
               $(`input[name]`).siblings(".errorMessage").empty();
               $(`select[name]`).siblings(".errorMessage").empty();

               if (!err.responseJSON.errors) return;
               const messages = [];
               for (const [key, message] of Object.entries(err.responseJSON.errors)) {
                    $('#add_account_form').find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    $('#add_account_form').find(`select[name = "${ key }"]`).siblings('button').css('border-color', '#F44336');
                   messages.push(message);
                   $(`input[name="${key}"]`).siblings(".errorMessage").empty().append(message);

                   $(`select[name="${key}"]`).siblings(".errorMessage").empty().append(message);
               }
               toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
        });

    });    
    $(document).off('submit','#edit_account_form').on('submit','#edit_account_form',function(e){
        e.preventDefault();
        let data = $(this).serializeArray();
        supportAjax({
            url:'/admin/account/update/'+$(this).data('accountid'),
            method:'POST',
            data
        },
        function(resp)
        {
            $('#cModal').modal('hide');
            toastr.success(resp.success);
            $('#t_account_table').KTDatatable().reload();
        },
        function(err)
        {
               $('#add_account_form').find('input[name], select[name]').css('border-color', '#ddd');
               $(`input[name]`).siblings(".errorMessage").empty();
               $(`select[name]`).siblings(".errorMessage").empty();

               if (!err.responseJSON.errors) return;
               const messages = [];
               for (const [key, message] of Object.entries(err.responseJSON.errors)) {
                    $('#add_account_form').find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    $('#add_account_form').find(`select[name = "${ key }"]`).siblings('button').css('border-color', '#F44336');
                   messages.push(message);
                   $(`input[name="${key}"]`).siblings(".errorMessage").empty().append(message);

                   $(`select[name="${key}"]`).siblings(".errorMessage").empty().append(message);
               }
               toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
        });
        
    });
</script>