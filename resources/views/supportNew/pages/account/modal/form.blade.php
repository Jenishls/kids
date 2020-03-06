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
<div class="modal-dialog custom_dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" style="margin-left:2.5rem;" id="cWizardTitle">Add Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:cornsilk;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;" id="companyAddWizard">
            <div class="kt-portlet kt-
            --tabs" style="margin-bottom:0px !important;">
                <div class="kt-portlet__head" style="padding:0px !important;">
                    <div class="kt-portlet__head-toolbar" style="width:100%;padding: 0 25px;">
                        <ul class="nav  nav-tabs-line" role="tablist"  style="width: 100%;display:flex;">
                            <li class="wizard-tabs active" data-validateurl="/admin/account/validate/account" data-target="#accountWForm" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab" href="javascript:" role="tab" aria-selected="false">
                                    <i class="la la-user mr-1"></i>Account
                                </a>
                            </li>
                            <li class="wizard-tabs col-sm-12" data-target="#branchWForm" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab"  href="javascript:" role="tab" aria-selected="false">
                                    <i class="flaticon-map mr-1"></i> Branches
                                </a>
                            </li>
                            <li class="wizard-tabs col-sm-12"   data-target="#memberWForm" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab"  href="javascript:" role="tab" aria-selected="true">
                                    <i class="flaticon2-group mr-1"></i> Members
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="account_add_form">   
                        @csrf
                        <div class="tab-content">
                            <div class="wizard-panel active" id="accountWForm" role="tabpanel" style="background:#e5f7ff !important;">
                                <div class="kt-portlet__body" id="accountWizardForm" style="padding:25px;padding-bottom:0px !important;">
                                    <div class="row mb-3">
                                        <div class="form-group col-md-12">
                                            <div class="shadow_inputs">
                                                <div class="form-group row ">
                                                    <div class="col-md-4 col-sm-6" >
                                                       <label class="control-label" for="company_name">Company Name</label>
                                                      <input type="text" name="company_name" class="form-control">
                                                      <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-md-4 col-sm-6">
                                                       <label class="control-label" for="industry">Industry</label>
                                                       <select name="industry" class="industrySelect2"></select>
                                                       {{-- <input class="form-control" type="text" name="industry" autocomplete="off"> --}}
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-md-4 col-sm-6">
                                                       <label class="control-label" for="ownership">Ownership</label>
                                                       <input class="form-control" type="text" name="ownership" autocomplete="off">
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-md-4 col-sm-6">
                                                       <label class="control-label" for="estd_date">Establised Date</label>
                                                       <input class="form-control" type="text" name="estd_date" autocomplete="off">
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-md-4 col-sm-6">
                                                       <label class="control-label" for="reg_no">Registration Number</label>
                                                       <input class="form-control" type="text" name="reg_no" maxlength="10" autocomplete="off">
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-md-4 col-sm-6">
                                                       <label class="control-label" for="account_code">Account Code</label>
                                                       <input class="form-control" type="text" name="account_code" maxlength="6" autocomplete="off">
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-md-4 col-sm-6">
                                                       <label class="control-label" for="credit_terms">Credit Terms</label>
                                                       <select name="credit_terms" class="credit_terms_select2"></select>
                                                       {{-- <input class="form-control" type="text" name="credit_terms" autocomplete="off"> --}}
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-md-4 col-sm-6">
                                                       <label class="control-label" for="url">URL</label>
                                                       <input class="form-control" type="text" name="url"  autocomplete="off">
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-md-4 col-sm-6">
                                                       <label class="control-label" for="reference">References</label>
                                                       <select name="reference" class="reference_select2"></select>
                                                       {{-- <input class="form-control" type="text" name="reference" autocomplete="off"> --}}
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 pt-20">
                                            <span class="btn portlet_label" style="top:0!important;">Address</span>	  
                                            <div class="shadow_inputs">
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-12" style="padding-top:10px;">
                                                        <label class="control-label" for="add1">Address 1</label>
                                                        <input class="form-control" type="text" id="search_input" name="add1">
                                                         <div class="errorMessage"></div>
                                                         <input type="hidden" id="latitude_input">
                                                         <input type="hidden" id="longitude_input">
                                                    </div>
                                                    
                                                    <div class="form-group  col-md-12">
                                                        <label class="control-label" for="add2">Address 2</label>
                                                        <input class="form-control" type="text" name="add2">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                                        <label class="control-label" for="user_city">City</label>
                                                        <input class="form-control" type="text" name="city">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group col-lg-4 col-md-6 col-sm-6">
                                                        <label class="control-label" for="user_state">State</label>
                                                        <input class="form-control" type="text" name="state">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                   <div class="form-group col-lg-4 col-md-6 col-sm-6">
                                                        <label class="control-label" for="zip">Zip</label>
                                                        <input class="form-control" type="text" name="zip">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group col-lg-6  col-md-6 col-sm-6">
                                                        <label class="control-label" for="user_county">County</label>
                                                        <input class="form-control" type="text" name="county">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group col-lg-6  col-md-6 col-sm-6">
                                                        <label class="control-label" for="user_county">Country</label>
                                                        <input class="form-control" type="text" name="country">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 pt-20">
                                            <span class="btn portlet_label" style="top:0!important;">Contact</span>
                                            <div class="shadow_inputs">
                                                <div class="form-group row" style="padding-top:10px;">
                                                    <div class="form-group col-lg-6 col-md-12 col-sm-6" >
                                                        <label class="control-label" for="client_email">First Name</label>
                                                        <input class="form-control" type="text" name="fname">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-12 col-sm-6">
                                                        <label class="control-label" for="client_email_2">Last Name</label>
                                                        <input class="form-control" type="text" name="lname">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row" >
                                                    <div class="col-lg-5 col-md-6 col-sm-6">
                                                        <label class="control-label" for="member">Phone Type</label>
                                                        <select name="phone_type1" class="client_salutation">
                                                            <option value="mobile_no">Mobile Number</option>
                                                            <option value="phone_no">Telephone</option>
                                                        </select> 
                                                    </div>
                                                    <div class="col-lg-7 col-md-6 col-sm-6">
                                                        <label class="control-label" for="member">Number </label>
                                                        <input class="form-control e_mask_phone" type="text"  name="phone1"  autocomplete="off"> 
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-5 col-md-6 col-sm-6">
                                                        <label class="control-label" for="">Phone Type </label>
                                                        <select name="phone_type2"  class="client_salutation">
                                                            <option value="mobile_no">Mobile Number</option>
                                                            <option value="phone_no">Telephone</option>
                                                        </select> 
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="col-lg-7 col-md-6 col-sm-6">
                                                        <label class="control-label" for="">Number </label>
                                                        <input class="form-control e_mask_phone" type="text"  name="phone2"  autocomplete="off">
                                                         <div class="errorMessage"></div> 
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group col-lg-6 col-md-12 col-sm-6" >
                                                        <label class="control-label" for="client_email">Primary Email</label>
                                                        <input class="form-control" type="text" name="email">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-12 col-sm-6">
                                                        <label class="control-label" for="client_email_2">Secondary Email</label>
                                                        <input class="form-control" type="text" name="email2">
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
                                    @include('supportNew.pages.account.modal.add_branch')
                                </div>
                            </div>
                            <div class="wizard-panel" id="memberWForm" style="background:#e5f7ff !important;">
                               @include('supportNew.pages.account.modal.member_modal')
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
                                        <button type="" class="btn btn-sm btn-pill btn-success" id="storeAccount">Save <i class="la la-save"></i></button>
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
//datepicker init
    $('[name="estd_date"]').daterangepicker({
        singleDatePicker: true,
        autoUpdateInput: false,
        showDropdowns: true,
        minYear: 2001,
        maxYear: parseInt(moment().format('YYYY'),10)
    }, function(start_date, end_date) {
        this.element.val(start_date.format('YYYY-MM-DD'));
    });

//select 2 init
    $('.industrySelect2').select2({
        width: '100%',
        placeholder: "Select an industry",
        tags: true,
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
      
    })
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

    //custom wizard init
    var companyAddWizard = $('#companyAddWizard').WizardForm();
    companyAddWizard.on('nextBtn', function(wizard){
        wizard.sendAjax(wizard.currentStep().data("validateurl"));
    });
    
//Company Store operation starts here
    $('#storeAccount').off('click').on('click', function(e){
    e.preventDefault();
    let data = $('#account_add_form').serializeArray();
    supportAjax({
        url:'/admin/account/store',
        method:'Post',
        data
    }, function(resp){
        $('#cModalcAccount').modal('hide');
        if(typeof makeCompanyTempalte !== 'undefined')
            makeCompanyTempalte(resp.data);
        toastr.success('<strong>'+resp.success+'</strong>');
        companyTableReloader();
    },
    function(err){
        console.log(err);
    });

    })
    var searchInput = 'search_input';
    $(document).ready(function(){
        var autocomplete;
        autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
            types:['geocode']
        });
        google.maps.event.addListener(autocomplete, 'place_changed', function(){
            var near_place = autocomplete.getPlace();
            document.getElementById('latitude_input').value = near_place.geometry.location.lat();
            document.getElementById('longitude_input').value = near_place.geometry.location.lng();
        });
    });
    $(document).on('change', '#'+searchInput, function(){
        document.getElementById('latitude_input').value = '';
        document.getElementById('longitude_input').value = '';
    })
   
</script>