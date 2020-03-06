<style>
    .form-group{
        padding-bottom:5px !important;
    }
    .btn{
        border-radius: 19px !important;
    }
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
   
</style>
<div class="modal-dialog custom_dialog" role="document" >
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Client</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;" id="editClientWizard">

            <div class="kt-portlet kt-portlet--tabs" style="margin-bottom:0px !important;">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-toolbar" style="width:100%;">
                        <ul  class="nav  nav-tabs-line" role="tablist"  style="width: 100%;display:flex;align-items:center;"  id="clientForm">
                            <li class="wizard-tabs active" data-validateurl="muted"  data-url="/admin/client/validate/edit_client_form" data-target="#generalForm" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab" href="javascript:" role="tab" aria-selected="false">
                                     <i class="la la-user"></i> Client
                                </a>
                            </li>
                            <li class="wizard-tabs col-sm-12" data-target="#companyForm" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab"  href="javascript:" role="tab" aria-selected="false">
                                    <i class="la la-file-text"></i> Client Company
                                </a>
                            </li>
                            <li class="wizard-tabs col-sm-12" data-target="#attachmentForm" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab"  href="javascript:" role="tab" aria-selected="true">
                                     <i class="la la-photo"></i>Uploads
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="client_edit_form">   
                        @csrf
                        <div class="row" id="client_form_info" style="display:none; background:#fefefe;">
                            <div class="kt-widget5">
                                <div class="kt-widget5__item">
                                    <div class="kt-widget5__content" style="margin-right:20px !important;">
                                        <div class="kt-widget5__pic">
                                            @if($profile_pic)
                                            <img class="kt-widget7__img" src="data:image;base64,{{base64_encode(file_get_contents(storage_path("client/profile/".$profile_pic->file_name)))}}" alt="">
                                            @else
                                            <img class="kt-widget7__img" src="{{asset('media/users/default.jpg')}}" alt="">
                                            @endif
                                        </div>
                                        <div class="kt-widget5__section infobox_separator">
                                            <a class="kt-widget5__title">
                                                {{$client->fname}} {{$client->mname ?: ''}} {{$client->lname ?: ''}}
                                            </a>
                                            
                                            <div class="kt-widget5__info">
                                                <span class="kt-font-info clientAdd1"></span>
                                            </div>
                                            <div class="kt-widget5__info">
                                                <span class="kt-font-info clientAdd2"></span>
                                            </div>
                                            <div class="kt-widget5__info">
                                                <span class="kt-font-info clientLocation"></span>
                                            </div>
                                            <div class="kt-widget5__info">
                                                <span class="kt-font-info clientLocation2"></span>
                                            </div>
                                        </div>
                                    </div>						
                                    <div class="kt-widget5__content" style="margin-right:20px !important;">
                                        <div class="kt-widget5__section infobox_separator">
                                             <div class="kt-widget5__info">
                                                <span class="clientPhone1"></span>
                                                <span class="kt-font-info clientContact1"></span>
                                            </div>
                                            <div class="kt-widget5__info">
                                                <span class="clientPhone2"></span>
                                                <span class="kt-font-info clientContact2"></span>
                                            </div>
                                            <div class="kt-widget5__info">
                                                <span class="kt-font-info clientEmail"></span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="kt-widget5__content" style="margin-right:20px !important;">
                                        <div class="kt-widget5__section infobox_separator">
                                            <div class="kt-widget5__info">
                                                <span>Company</span>
                                                <span class="kt-font-info clientCompany"></span>
                                            </div>                                    
                                        </div>
                                    </div>
                                    <div class="kt-widget5__content">
                                        <div class="kt-widget5__stats">
                                            
                                        </div>
                                        <div class="kt-widget5__stats">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="tabContent">
                            <div class="wizard-panel active" id="generalForm" role="tabpanel" style="background:#e5f7ff !important;">
                                <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important;">
                                    <div class="row mb-5">
                                        <div class="form-group col-7">
                                            <div class="shadow_inputs">
                                                <div class="form-group row">
                                                    <div class="col-lg-2">
                                                        <label class="control-label" for="salutation">Salutation</label>
                                                        <select name="salutation"  class="client_salutation">
                                                            <option value="Mr">Mr.</option>
                                                            <option value="Mrs">Mrs.</option>
                                                            <option value="Ms">Ms.</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="control-label" for="first_name">First Name</label>
                                                        <input class="form-control" type="text" name="fname" data-inputName="FirstName" id="first_name"  autocomplete="off" value="{{$client->fname}}">
                                                        <div class="errorMessage"></div>
                                                        {{-- <span class="form-text text-muted">First Name</span> --}}
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label class="control-label" for="middle_name">Middle Name</label>
                                                        <input class="form-control" type="text" id="middle_name"  data-inputName="MiddleName"  name="mname"  autocomplete="off" value="{{$client->mname}}">
                                                        
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label class="control-label" for="last_name">Last Name </label>
                                                        <input class="form-control" type="text" id="last_name"  data-inputName="LastName"  name="lname"  autocomplete="off" value="{{$client->lname}}">
                                                        
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-6">
                                                    <label class="control-label" for="dob">Date of Birth</label>
                                                    <input class="form-control" type="text"   name="dob"  autocomplete="off" value="{{format_to_us_date($client->dob)}}">
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                    {{-- <div class="col-6">
                                                        <label class="control-label" for="dob">SSN</label>
                                                        <div class="input-group">
                                                            <input class="form-control" type="password" id="clientSSN"  data-inputName="ssn" name="ssn" autocomplete="off" value="{{isset($contact)?$contact->ssn:''}}">

                                                            <div class="input-group-append">
                                                                <span class="input-group-text toggleSSN" data-target-input="vol_ssn">
                                                                    <i class="fa fa-eye"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="errorMessage"></div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-5">
                                            <div class="shadow_inputs">
                                                <div class="form-group row">
                                                    <div class="col-6">
                                                        <label class="control-label" for="profile_pic">Profile Picture</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                                                                    <div class="kt-avatar__holder" id="uploaded_img" @if($profile_pic)style="background-image: url(data:image;base64,{{base64_encode(file_get_contents(storage_path("client/profile/".$profile_pic->file_name)))}}" @else style="background-image: url({{asset('media/users/default.jpg')}})" @endif></div>
                                                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                                        <i class="fa fa-pen"></i>
                                                                        <input id="client_pic" type="file" name="client_profile_pic" accept=".png, .jpg, .jpeg">
                                                                    </label>
                                                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                                        <i class="fa fa-times"></i>
                                                                    </span>
                                                                </div>
                                                                
                                                            </div>
                                                       
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="control-label" for="client_comm">Communication Preference </label>
                                                        <div class="kt-checkbox-list">
                                                            @if(sectionNameToLookups('communication_preference')->count())
                                                                @foreach(sectionNameToLookups('communication_preference') as $key => $preference)
                                                                    <label class="kt-checkbox kt-checkbox--solid">
                                                                        <input type="checkbox" value="{{$preference->id}}" data-code="{{$preference->code}}" name="comm_pref_id[]"
                                                                        @foreach($client->comm_preferences as $key => $clientPref)
                                                                            @if($preference->code== $clientPref->code)
                                                                            checked="checked"
                                                                            @endif
                                                                        @endforeach
                                                                        >
                                                                        {{$preference->value}}
                                                                        <span></span>
                                                                    </label>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom:1rem;">
                                        <div class="form-group col-7">
                                            <span class="btn portlet_label">Address</span>
                                            <div class="shadow_inputs">  
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-12" style="padding-top:10px;">
                                                        <label class="control-label" for="user_add_1">Address 1</label>
                                                        
                                                        <input class="form-control" type="text" id="user_add_1" name="add1" value="{{isset($client->address->add1)?$client->address->add1:''}}">
                                                    </div>
                                                    <div class="form-group  col-md-12">
                                                        <label class="control-label" for="user_add_2">Address 2</label>
                                                        
                                                        <input class="form-control" value="{{isset($address->address->add2)?$client->address->add2:''}}" type="text" id="user_add_2" name="add2">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-4">
                                                        <label class="control-label" for="user_city">City</label>
                                                        
                                                    <input class="form-control" value="{{isset($client->address->city)?$client->address->city:''}}" type="text" id="user_city_name" name="city">
                                                    </div>
                                                    <div class="form-group  col-md-4">
                                                        <label class="control-label" for="user_state">State</label>
                                                        <input class="form-control" value="{{isset($client->address->state)?$client->address->state:''}}" type="text" id="user_state_name" name="state">
                                                    </div>
                                                    <div class="form-group  col-md-4">
                                                        <label class="control-label" for="zip">Zip</label>
                                                        <input class="form-control" value="{{isset($client->address->zip)?$client->address->zip:''}}" type="text" id="user_zip" name="zip">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-4">
                                                        <label class="control-label" for="user_county">County</label>
                                                            
                                                        <input class="form-control" value="{{isset($client->address->county)?$client->address->county:''}}" type="text" id="user_county_name" name="county">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-5">
                                            <span class="btn portlet_label">Contact</span>
                                            <div class="shadow_inputs">
                                                <div class="form-group row"  style="padding-top:10px;">
                                                    <div class="col-lg-3 col-sm-6">
                                                        <label class="control-label" for="member">Phone Type </label>
                                                        <select name="client_phone_1" class="client_salutation">
                                                            <option value="Cell Phone">Cell Phone</option>
                                                            <option value="Office">Office</option>
                                                            <option value="Telephone">Telephone</option>
                                                            <option value="Home">Home</option>
                                                        </select> 
                                                        {{-- <div class="errorMessage"></div> --}}
                                                    </div>
                                                    <div class="col-lg-9 col-sm-6">
                                                        <label class="control-label" for="member">Number </label>
                                                        <input class="form-control" type="text" data-inputName="PhoneNumber"  name="phone_no_1" autocomplete="off" value="{{isset($client->contact->phone_no)?$client->contact->phone_no:$client->phone_no}}"> 
                                                        {{-- <div class="errorMessage"></div> --}}
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-3 col-sm-6">
                                                        <label class="control-label" for="client_phone_2">Phone Type </label>
                                                        <select name="client_phone_2" id="client_phone_2"  class="client_salutation">
                                                            <option value="Cell Phone">Cell Phone</option>
                                                            <option value="Office">Office</option>
                                                            <option value="Telephone">Telephone</option>
                                                            <option value="Home">Home</option>
                                                        </select> 
                                                        {{-- <div class="errorMessage"></div> --}}
                                                    </div>
                                                    <div class="col-lg-9 col-sm-6">
                                                        <label class="control-label" for="member">Number </label>
                                                        <input class="form-control" type="text" value="{{isset($client->contact->mobile_no)?$client->contact->mobile_no : ''}}" data-inputName="PhoneNumber"  name="phone_no_2" autocomplete="off"> 
                                                        {{-- <div class="errorMessage"></div> --}}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-12">
                                                        <label class="control-label" for="client_email">Primary Email</label>
                                                        
                                                        <input class="form-control" value="{{isset($client->contact->email)?$client->contact->email:$client->email}}" type="text" id="client_email" name="email">
                                                    </div>
                                                   
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-12">
                                                        <label class="control-label" for="client_email_2">Secondary Email</label>
                                                        
                                                        <input class="form-control" value="{{isset($client->contact->other_email)? $client->contact->other_email:''}}" type="text" id="client_email_2" name="email_sec">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>	  
                                </div>
                            </div>
                            <div class="wizard-panel" id="companyForm" role="tabpanel" style="background:#e5f7ff !important;">
                               @include('supportNew.pages.client.inc.client_company')
                            </div>
                            <div class="wizard-panel" id="attachmentForm" role="tabpanel" style="background:#e5f7ff !important;">
                                <div class="kt-portlet__body" style="margin-left: 1.5rem;">
                                    <div class="form-group row">
                                        <div class="form-group shadow_inputs" style="max-width:100% !important;width:97.6% !important;">
                                            <span class="btn portlet_label" style="position:relative !important;top:-14% !important;">Upload Files</span>	  
                                            <div class="form-group row">
                                                <div class="form-group  col-md-12" style="padding-top:10px;">
                                                <div class="dropzone dropzone-default dropzone-success dz-clickable" id="document-dropzone">
                                                        <div class="dropzone-msg dz-message needsclick">
                                                            <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                                            <span class="dropzone-msg-desc">Only image, pdf and psd files are allowed for upload</span>
                                                        </div>
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
                                    <div class="col-md-6  wizard--btn" data-wizard-step="prev">
                                        <button type="reset" class="btn btn-secondary btn-sm btn-pill" ><i class="la la-arrow-left"></i>Back</button>
                                    </div>
                                    <div class="col-md-6 kt-align-right wizard--btn ml-auto" data-wizard-step="next">
                                        <button type="" class="btn btn-sm btn-pill btn-success " >Continue <i class="la la-arrow-right"></i></button>
                                    </div>
                                    <div class="col-md-6 wizard--btn kt-align-right ml-auto" data-wizard-step="save">
                                        <button type="" class="btn btn-sm btn-pill btn-success" id="updateClient" data-id="{{$client->id}}">Update <i class="la la-save"></i></button>
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
    $('[name="dob"]').daterangepicker({
        singleDatePicker: true,
        autoUpdateInput: false,
        showDropdowns: true,
        minYear: 2001,
        maxYear: parseInt(moment().format('YYYY'),10)
    }, function(start_date, end_date) {
        this.element.val(start_date.format("{{settingsValue('momentDateFormat')}}"));
    });

    $("input[name=phone_no_1], input[name=phone_no_2]").inputmask("mask", {
        "mask": "(999) 999-9999"
    });

    $('#client_pic').change(function(e){
        e.preventDefault();
        var profile_pic = window.URL.createObjectURL(this.files[0]);
        $('#uploaded_img').css({backgroundImage:`url(${profile_pic})`});
        $('.kt-widget7__img').attr('src', `${profile_pic}`);
        
    });
    var ssnClick = 0
    $('.toggleSSN').click(function(e){
        e.preventDefault();
        if(ssnClick === 0){
            $('input[name=ssn]').attr('type', 'text');
            ssnClick++;
        }else{
            $('input[name=ssn]').attr('type', 'password');
            ssnClick--;
        }

    });
    var uploadedDocumentMap = {}
    $("div#document-dropzone").dropzone(
        { 
            url: "/admin/client/processfiles",
            paramName: "attachment",
            maxFiles: 10,
            maxFileSize:10,
            addRemoveLinks: true,
            acceptedFiles: "image/*,application/pdf,.psd",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                console.log(response, file);
                $('#client_edit_form').append('<input type="hidden" name="attachment[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
        }
    );
    
    // datepicker
     

// Selectpicker
$('.client_communication').selectpicker({
    showTick: true,
    doneButton: true,
    doneButtonText: "Apply"
});
$('#company, #company_contact').selectpicker({
    showTick: true,
    doneButton: true,
    doneButtonText: "Apply"
});
var clientWizard = $('#editClientWizard').WizardForm();
clientWizard.on('nextBtn', function(wizard){
    if(wizard.currentStep().data("url")){
        wizard.sendAjax(wizard.currentStep().data("url"));
    }
})
clientWizard.on('tabEvent', function(wizard){
    if(wizard.currentStep().data("url")){
        wizard.sendAjax(wizard.currentStep().data("url"));
    }
})
clientWizard.on('beforeNext', function(wizard){return;});
clientWizard.on('formChange', function(wizard){
    const dialog = $(wizard[0]).parent().parent();
    wizard.currentStep().attr('data-target') == '#companyForm'?dialog.addClass('c-modal-700'):dialog.removeClass('c-modal-700');
});
$('.client_salutation').select2({});
$(document).off('click', '#updateClient').on('click', '#updateClient', function(e){
    e.preventDefault();
    let id= $(this).attr('data-id');
    var data = new FormData(document.getElementById('client_edit_form'));
    // console.log(form1);
    $.ajax({
        url: "/admin/client/updateClient/"+id,
        method: "POST",
        data: data,
        contentType: false,
        processData: false,
        success: function(resp) {
            $("#cModal1").modal("hide");
            if($('#t_clientstable').length)
                clientTableReloader();
            if($('#t_account_table').length)
                companyTableReloader();
            if($('#t_company_client_table').length)
                $('#t_company_client_table').KTDatatable().reload();
            toastr.success("Updated successfully.");
            
        },
        error: function(err) {
            console.log(err);
        }
    });
});
</script>