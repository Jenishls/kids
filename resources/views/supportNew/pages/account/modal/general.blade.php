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
            <h5 class="modal-title" style="margin-left:2.5rem;" id="cWizardTitle">Update Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:cornsilk;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet kt-
            --tabs" style="margin-bottom:0px !important;">
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="account_{{$type}}_form">   
                        @csrf
                        <div class="tab-content">
                            <div class="wizard-panel active" id="accountWForm" role="tabpanel" style="background:#e5f7ff !important;">
                                <div class="kt-portlet__body" id="accountWizardForm" style="padding:25px;padding-bottom:0px !important;">
                                    <div class="row mb-3">
                                        <div class="form-group col-12">
                                            <div class="shadow_inputs">
                                                <div class="form-group row ">
                                                    <div class="col-lg-4" >
                                                       <label class="control-label" for="company_name">Company Name</label>
                                                      <input type="text" value="{{$company->c_name}}" name="company_name" class="form-control">
                                                      <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-lg-4">
                                                       <label class="control-label" for="industry">Industry</label>
                                                       <input class="form-control" value="{{$company->industry}}" type="text" name="industry"  autocomplete="off">
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-lg-4">
                                                       <label class="control-label" for="ownership">Ownership</label>
                                                       <input class="form-control" value="{{$company->ownership}}" type="text" name="ownership"  autocomplete="off">
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-lg-4">
                                                       <label class="control-label" for="estd_date" >Establised Date</label>
                                                       <input class="form-control" value="{{format_to_us_date($company->start_date)}}" type="text" name="estd_date" autocomplete="off">
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-lg-4">
                                                       <label class="control-label" for="reg_no">Registration Number</label>
                                                       <input class="form-control"  value="{{$company->reg_no}}" type="text" name="reg_no" maxlength="10" autocomplete="off">
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-lg-4">
                                                       <label class="control-label" for="account_code">Account Code</label>
                                                       <input class="form-control"  value="{{$company->account_code}}" type="text" name="account_code" maxlength="6" autocomplete="off">
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-lg-4">
                                                       <label class="control-label" for="credit_terms">Credit Terms</label>
                                                       <input class="form-control"  value="{{$company->credit_terms}}" type="text" name="credit_terms" autocomplete="off">
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-lg-4">
                                                       <label class="control-label" for="url">URL</label>
                                                       <input class="form-control" value="{{$company->url}}" type="text" name="url" autocomplete="off">
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-lg-4">
                                                       <label class="control-label" for="reference">References</label>
                                                       <input class="form-control" value="{{$company->reference}}" type="text" name="reference" autocomplete="off">
                                                       <div class="errorMessage"></div>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-7 pt-20">
                                            <span class="btn portlet_label" style="top:0!important;">Address</span>	  
                                            <div class="shadow_inputs">
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-12" style="padding-top:10px;">
                                                        <label class="control-label" for="add1">Address 1</label>
                                                        <input class="form-control" value="{{$company->address?$company->address->add1:''}}" type="text" name="add1">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group  col-md-12">
                                                        <label class="control-label" for="add2">Address 2</label>
                                                        <input class="form-control" value="{{$company->address?$company->address->add2:''}}" type="text" name="add2">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-4">
                                                        <label class="control-label" for="user_city">City</label>
                                                        <input class="form-control"  value="{{isset($company->address->city) ? $company->address->city :''}}" type="text" name="city">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group  col-md-4">
                                                        <label class="control-label" for="user_state">State</label>
                                                        <input class="form-control" value="{{$company->address?$company->address->state:''}}" type="text" name="state">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group  col-md-4">
                                                        <label class="control-label" for="zip">Zip</label>
                                                        <input class="form-control" value="{{$company->address?$company->address->zip:''}}" type="text" name="zip">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-4">
                                                        <label class="control-label" for="user_county">County</label>
                                                        <input class="form-control" value="{{$company->address?$company->address->county:''}}" type="text" name="county">
                                                         <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group  col-md-4">
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
                        </div>
                        <div class="kt-portlet__foot footer_white">
                            <div class="kt-form__actions">
                                <div class="row">
                                     <div class="col-lg-6 kt-align-right ml-auto">
                                        <button type="" class="btn btn-sm btn-pill btn-success" id="updateGeneralModal" data-formid="#account_{{$type}}_form" data-targetid="{{$company->id}}">
                                          Update
                                          <i class="la la-save"></i>
                                        </button>
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
    showDropdowns: true,
  });
$('[name="estd_date"]').val("{{$company->start_date? format_to_us_date($company->start_date): null}}"); 



$('#updateGeneralModal').off('click').on('click', function(e){
  e.preventDefault();
  let data = $($(this).attr('data-formid')).serializeArray();
  supportAjax({
    url:'/admin/account/update/account/'+$(this).attr('data-targetid')+'?rdata',
    method:'POST',
    data
  }, function(resp){
      $('#cModal1').modal('hide');
      update_render(resp, 'companyGeneralInfo');
      // toastr.success('<strong>'+resp.success+'</strong>');
      // renderTemplate('#companyGeneralInfo','general');
  },
  function(err){
    console.log(err);
  })
})



function renderTemplate(idSlug,type)
{
  let id = $(idSlug).attr('data-cid');
  supportAjax({
    url: "/admin/account/template/"+type+"/"+id,
    method:'POST'
  },
  function(resp){
    $(idSlug).html(resp);
  },
  function(err){
    console.log(err);
  })

}

</script>