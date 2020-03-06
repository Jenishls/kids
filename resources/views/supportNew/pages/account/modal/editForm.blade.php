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
</style>
<div class="modal-dialog custom_dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" style="margin-left:2.5rem;" id="cWizardTitle">Update Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:cornsilk;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;" id="demoWizard">
            <div class="kt-portlet kt-
            --tabs" style="margin-bottom:0px !important;">
                <div class="kt-portlet__head" style="padding:0px !important;">
                    <div class="kt-portlet__head-toolbar" style="width:100%;padding: 0 25px;">
                        <ul class="nav  nav-tabs-line" role="tablist"  style="width: 100%;display:flex;">
                            <li class="wizard-tabs active" data-validateurl="muted" data-updateUrl="/admin/account/update/account/{{$company->id}}" data-target="#accountWForm" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab" href="javascript:" role="tab" aria-selected="false">
                                    <i class="la la-user mr-1"></i>Account
                                </a>
                            </li>
                            <li class="wizard-tabs" data-validateurl="muted" data-updateUrl="/admin/account/update/branch/{{$company->id}}" data-target="#branchWForm" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab"  href="javascript:" role="tab" aria-selected="false">
                                    <i class="flaticon-map mr-1"></i> Branches
                                </a>
                            </li>
                            <li class="wizard-tabs" data-validateurl="muted"  data-updateUrl="/admin/account/update/member/{{$company->id}}" data-target="#memberWForm" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab"  href="javascript:" role="tab" aria-selected="true">
                                    <i class="flaticon2-group mr-1"></i> Members
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="account_edit_form">   
                        @csrf
                        <div class="tab-content">
                            <div class="wizard-panel active" id="accountWForm" role="tabpanel" style="background:#e5f7ff !important;">
                                <div class="kt-portlet__body" id="accountWizardForm" style="padding:25px;padding-bottom:0px !important;">
                                    <div class="row mb-3">
                                        <div class="form-group col-12">
                                            <div class="shadow_inputs">
                                                <div class="form-group row">
                                                    <div class="col-lg-4 col-md-3" >
                                                       <label class="control-label" for="company_name">Company Name</label>
                                                      <input type="text" value="{{$company->c_name}}" name="company_name" class="form-control" >
                                                      <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-lg-4 col-md-3">
                                                       <label class="control-label" for="industry">Industry</label>
                                                       <select name="industry" class="industrySelect2">
                                                        <option value="{{$company->industry}}" selected>{{$company->industry}}</option>
                                                       </select>
                                                       {{-- <input class="form-control" value="{{$company->industry}}" type="text" name="industry" autocomplete="off"> --}}
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-lg-4 col-md-3">
                                                       <label class="control-label" for="ownership">Ownership</label>
                                                       <input class="form-control" value="{{$company->ownership}}" type="text" name="ownership" autocomplete="off">
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-lg-4 col-md-3">
                                                       <label class="control-label" for="estd_date" >Establised Date</label>
                                                       <input class="form-control" value="{{$company->start_date?format_to_us_date($company->start_date): null}}" type="text" name="estd_date" autocomplete="off">
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-lg-4 col-md-3">
                                                       <label class="control-label" for="reg_no">Registration Number</label>
                                                       <input class="form-control"  value="{{$company->reg_no}}" type="text" name="reg_no" maxlength="10" autocomplete="off">
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-lg-4 col-md-3">
                                                       <label class="control-label" for="account_code">Account Code</label>
                                                       <input class="form-control"  value="{{$company->account_code}}" type="text" name="account_code" maxlength="6" autocomplete="off">
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-lg-4 col-md-3">
                                                       <label class="control-label" for="credit_terms">Credit Terms</label>
                                                       <select name="credit_terms" id="" class="credit_terms_select2">
                                                            <option value="{{$company->credit_terms}}" selected>
                                                                {{$company->credit_terms}}
                                                            </option>
                                                       </select>
                                                       {{-- <input class="form-control"  value="{{$company->credit_terms}}" type="text" name="credit_terms"  autocomplete="off"> --}}
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-lg-4 col-md-3">
                                                       <label class="control-label" for="url">URL</label>
                                                       <input class="form-control" value="{{$company->url}}" type="text" name="url"  autocomplete="off">
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-lg-4 col-md-3">
                                                       <label class="control-label" for="reference">References</label>
                                                       <select name="reference" id="" class="reference_select2">
                                                            <option value="{{$company->reference}}" selected>
                                                                {{$company->reference}}
                                                            </option>
                                                        </select>
                                                       {{-- <input class="form-control" value="{{$company->reference}}" type="text" name="reference"  autocomplete="off"> --}}
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-7 pt-20">
                                            <span class="btn portlet_label" style="top:0!important;">Address</span>	  
                                            <div class="shadow_inputs">
                                                <div class="form-group row">
                                                    <div class="form-group col-lg-12 col-md-12" style="padding-top:10px;">
                                                        <label class="control-label" for="add1">Address 1</label>
                                                        <input class="form-control" value="{{$company->address?$company->address->add1:''}}" type="text" name="add1">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12">
                                                        <label class="control-label" for="add2">Address 2</label>
                                                        <input class="form-control" value="{{$company->address?$company->address->add2:''}}" type="text" name="add2">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group col-lg-4 col-md-4">
                                                        <label class="control-label" for="user_city">City</label>
                                                        <input class="form-control"  value="{{$company->address?$company->address->city:''}}" type="text" name="city">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group col-lg-4 col-md-4">
                                                        <label class="control-label" for="user_state">State</label>
                                                        <input class="form-control" value="{{$company->address?$company->address->state:''}}" type="text" name="state">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group col-lg-4 col-md-4">
                                                        <label class="control-label" for="zip">Zip</label>
                                                        <input class="form-control" value="{{$company->address?$company->address->zip:''}}" type="text" name="zip">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group col-lg-4 col-md-4">
                                                        <label class="control-label" for="user_county">County</label>
                                                        <input class="form-control" value="{{$company->address?$company->address->county:''}}" type="text" name="county">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group col-lg-4 col-md-4">
                                                        <label class="control-label" for="user_county">Country</label>
                                                        <input class="form-control" value="{{$company->address?$company->address->country:''}}" type="text" name="country">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-5 pt-20">
                                            <span class="btn portlet_label" style="top:0!important;">Contact</span>
                                            <div class="shadow_inputs">
                                                <div class="form-group row" style="padding-top:10px;">
                                                    <div class="form-group  col-md-6" >
                                                        <label class="control-label" for="client_email">First Name</label>
                                                        <input class="form-control" value="{{$company->contact?$company->contact->fname:''}}" type="text" name="fname">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                        <label class="control-label" for="client_email_2">Last Name</label>
                                                        <input class="form-control" value="{{$company->contact?$company->contact->lname:''}}" type="text" name="lname">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row" >
                                                    <div class="col-lg-4 col-sm-6">
                                                        <label class="control-label" for="member">Phone Type</label>
                                                        <select name="phone_type1" class="client_salutation">
                                                            <option value="mobile_no">Mobile Number</option>
                                                            <option value="phone_no">Telephone</option>
                                                        </select> 
                                                    </div>
                                                    <div class="col-lg-8 col-sm-6">
                                                        <label class="control-label" for="member">Number </label>
                                                        <input class="form-control e_mask_phone" type="text" value="{{$company->contact?$company->contact->phone_no:''}}"  name="phone1"  autocomplete="off"> 
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-4 col-sm-6">
                                                        <label class="control-label" for="">Phone Type </label>
                                                        <select name="phone_type2"  class="client_salutation">
                                                            <option value="mobile_no">Mobile Number</option>
                                                            <option value="phone_no">Telephone</option>
                                                        </select> 
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="col-lg-8 col-sm-6">
                                                        <label class="control-label" for="">Number </label>
                                                        <input class="form-control e_mask_phone" value="{{$company->contact?$company->contact->mobile_no:''}}" type="text"  name="phone2"  autocomplete="off">
                                                         <div class="errorMessage"></div> 
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-6" >
                                                        <label class="control-label" for="client_email">Primary Email</label>
                                                        <input class="form-control" value="{{$company->contact?$company->contact->email:''}}"  type="text" name="email">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                        <label class="control-label" for="client_email_2">Secondary Email</label>
                                                        <input class="form-control" value="{{$company->contact?$company->contact->other_email:''}}" type="text" name="email2">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-panel" id="branchWForm" style="background:#e5f7ff !important;">
                                <div class="kt-portlet__body" style="padding: 20px 25px 0!important;">
                                    @include('supportNew.pages.account.modal.edit_branch')
                                </div>
                            </div>
                            <div class="wizard-panel" id="memberWForm" style="background:#e5f7ff !important;">
                               @include('supportNew.pages.account.modal.member_modal')
                            </div>
                        </div>
                        <div class="kt-portlet__foot footer_white">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="cfol-lg-6  wizard--btn" data-wizard-step="prev">
                                        <button type="reset" class="btn btn-secondary btn-sm btn-pill" ><i class="la la-arrow-left"></i>Back</button>
                                    </div>
                                    <div class="col-lg-6 kt-align-right ml-auto wizard--btn" data-wizard-step="next">
                                        <button type="" class="btn btn-sm btn-pill btn-success " >Update & continue<i class="la la-arrow-right"></i></button>
                                    </div>
                                     <div class="col-lg-6 kt-align-right ml-auto wizard--btn" data-wizard-step="save">
                                        <button type="" class="btn btn-sm btn-pill btn-success" id="updateAccount" data-targetid="{{$company->id}}">Update & continue<i class="la la-arrow-right"></i></button>
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

    $('[name="estd_date"]').daterangepicker({
        singleDatePicker: true,
        autoUpdateInput: false,
        showDropdowns: true,
        minYear: 2001,
        maxYear: parseInt(moment().format('YYYY'),10)
    }, function(start_date, end_date) {
        this.element.val(start_date.format('YYYY-MM-DD'));
    });

    $('.industrySelect2').select2({
        width: '100%',
        tags: true,
        placeholder: "Select an industry",
        ajax: {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: function (params) {
                return '/admin/account/industries'
            },
            processResults: function (data) {
                let res = [];
                $.each(data, function(i , obj){
                    res.push({
                        id: obj.industry,
                        text : obj.industry,
                        data : obj
                    });
                });
                return {
                    results: res
                };
            }
        }
    });
    $('.credit_terms_select2').select2({
        width: '100%',
        placeholder: "Select a term",
        tags: true,
        ajax: {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: function (params) {
                return '/admin/account/lookupSelectData/credit_terms'
            },
            processResults: function (data) {
                let res = [];
                $.each(data, function(i , obj){
                    res.push({
                        id: obj.value,
                        text : obj.value,
                        data : obj
                    });
                });
                return {
                    results: res
                };
            }
        }
    });
    $('.reference_select2').select2({
        width: '100%',
        placeholder: "Select a Reference",
        tags: true,
        ajax: {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: function (params) {
                return '/admin/account/lookupSelectData/company_references'
            },
            processResults: function (data) {
                let res = [];
                $.each(data, function(i , obj){
                    res.push({
                        id: obj.value,
                        text : obj.value,
                        data : obj
                    });
                });
                return {
                    results: res
                };
            }
        }
    });

    var newWiz = $('#demoWizard').WizardForm();
    newWiz.on('tabEvent', function(wizard){
        if(wizard.currentStep().attr('url')){
            wizard.sendAjax(wizard.currentStep().attr('url'))
        }
        $(wizard.currentStep().attr('data-target')).find('[data-isstoredbranch]').find(':input').each(function(i, inp){
            if($(inp).attr('name') && $(inp).attr('name').substring(0,6) != 'update'){
                let prevName = $(inp).attr('name');
                $(inp).attr('name', 'update_'+prevName);    
            }
        });
        let currentTab= wizard.currentStep();
        let data= $(wizard.currentStep().attr('data-target')).find(':input').serializeArray();
        supportAjax({
            url: wizard.currentStep().attr('data-updateUrl'),
            method: 'POST',
            data
        }, function(resp){
            if(resp.success){
                $($(wizard.currentStep()).attr('data-target') + ' input').css({ 'border-color': '#e2e5ec' }).siblings(".errorMessage")
                const nextStep = wizard.targetTab;
                nextStep.addClass('active');
                nextStep.siblings().removeClass('active');
                let target = nextStep.attr('data-target') 
                $(target).siblings().hide();
                $(target).show();
                wizard.changeBtn();
                toastr.success('<strong>'+resp.success+'</strong>');
            }
        },
        function(err){
            let targetForm = $(wizard.currentStep()).attr('data-target');
            $(targetForm).find('.errorMessage').empty();
            for (let [key, value] of Object.entries(err.responseJSON.errors)) {
                $(targetForm).find(`[name="${key}"]:not(:disabled)`).css({ 'border-color': 'red' }).siblings(".errorMessage").html(value[0]);
            }
        })
        return;
    })
    newWiz.on('nextBtn', function(wizard){
        $(wizard.currentStep().attr('data-target')).find('[data-isstoredbranch]').find(':input').each(function(i, inp){
            if($(inp).attr('name') && $(inp).attr('name').substring(0,6) != 'update'){
                let prevName = $(inp).attr('name');
                $(inp).attr('name', 'update_'+prevName);    
            }
        })
        let currentTab= wizard.currentStep();
        let data= $(wizard.currentStep().attr('data-target')).find(':input').serializeArray();
        supportAjax({
            url: wizard.currentStep().attr('data-updateUrl'),
            method: 'POST',
            data
        },
            function(resp){
                if(resp.success){
                    wizard.activeAction == 'next'? wizard.showNext():wizard.showPrev();
                    companyTableReloader();
                    toastr.success('<strong>'+resp.success+'</strong>');
                }
            },
            function(err){
                console.log(err);
            })
    });
    newWiz.on('beforeNext', function(wizard){
        return;
    });
$('#updateAccount').off('click').on('click', function(e){
  e.preventDefault();
  let data = $('#memberWForm').find(':input').serializeArray();
  supportAjax({
    url:'/admin/account/update/member/'+$(this).attr('data-targetid'),
    method:'POST',
    data
  }, function(resp){
    if(resp.success)
    {
        $('#cModaleAccount').modal('hide');
        toastr.success('<strong>'+resp.success+'</strong>');
    }
  },
  function(err){
    console.log(err);
  })
})

</script>