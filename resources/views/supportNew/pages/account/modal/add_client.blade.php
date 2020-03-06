<style>
    .form-group{
        padding-bottom:5px !important;
    }
    label{
        font-weight: bold !important;
    }
    .img_placeholder{
      height: 100%;
    }
    .img_placeholder img{
      max-width: 100%;
      height: 100%;
      object-fit: contain;
    }
</style>
<div class="modal-dialog addClientModalDialog" role="document" style="margin-left:16%; margin-top:1.5rem;">
    <div class="modal-content addClientModal modal-1300">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Client</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:cornsilk;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet kt-portlet--tabs" style="margin-bottom:0px !important;">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-toolbar" style="width:100%;">
                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success" role="tablist" id="clientForm" style="width: 100%;display:flex;">
                            <li class="nav-item form_next_step" data-step = '0' data-action="add" style="flex:1;">
                                <a class="nav-link active modal_tab_headers"  data-toggle="tab" href="#kt_portlet_base_demo_1_1_tab_content" role="tab" aria-selected="false">
                                    <i class="la la-user"></i> Client
                                </a>
                            </li>
                            <li class="nav-item form_next_step" data-step = '2' data-action="add" style="flex:1;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab"  href="#kt_portlet_base_demo_1_3_tab_content" role="tab" aria-selected="true">
                                    <i class="la la-photo"></i>Uploads
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body" style="background:#e4e4e4 !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="client_add_form">   
                        @csrf
                        <div calss="row" id="client_form_info" style="display:none;">
                            <div class="kt-widget5">
                                <div class="kt-widget5__item">
                                    <div class="kt-widget5__content" style="margin-right:20px !important;">
                                        <div class="kt-widget5__pic">
                                            <img class="kt-widget7__img" src="{{asset('media/users/default.jpg')}}" alt="">
                                        </div>
                                        <div class="kt-widget5__section">
                                            <a class="kt-widget5__title">
                                                
                                            </a>
                                            <p class="kt-widget5__desc">
                                            </p>
                                            <div class="kt-widget5__info">
                                                <span>Email:</span>
                                                <span class="kt-font-info clientEmail"></span>
                                            </div>
                                            <div class="kt-widget5__info">
                                               <span>DOB:</span>
                                                <span class="kt-font-info clientDOB"></span>
                                            </div>
                                        </div>
                                    </div>						
                                    <div class="kt-widget5__content" style="margin-right:20px !important;">
                                        <div class="kt-widget5__section">
                                            <div class="kt-widget5__info">
                                                <span>Address:</span>
                                                <span class="kt-font-info clientAdd1"></span>
                                            </div>
                                            <div class="kt-widget5__info">
                                                <span>City:</span>
                                                <span class="kt-font-info clientCity"></span>
                                            </div>
                                            <div class="kt-widget5__info">
                                                <span>State:</span>
                                                <span class="kt-font-info clientState"></span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="kt-widget5__content" style="margin-right:20px !important;">
                                        <div class="kt-widget5__section">
                                            <div class="kt-widget5__info">
                                                <span>County:</span>
                                                <span class="kt-font-info clientCounty"></span>
                                            </div>
                                            <div class="kt-widget5__info">
                                                <span>ZIP:</span>
                                                <span class="kt-font-info clientZip"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-widget5__content" style="margin-right:20px !important;">
                                        <div class="kt-widget5__section">
                                            <div class="kt-widget5__info">
                                                <span class="clientPhone1"></span>
                                                <span class="kt-font-info clientContact1"></span>
                                            </div>
                                            <div class="kt-widget5__info">
                                                <span class="clientPhone2"></span>
                                                <span class="kt-font-info clientContact2"></span>
                                            </div>
                                                                                        
                                        </div>
                                    </div>
                                    <div class="kt-widget5__content" style="margin-right:20px !important;">
                                        <div class="kt-widget5__section">
                                            <div class="kt-widget5__info">
                                                <span>Company:</span>
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
                            <div class="tab-pane active" id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel" style="background:#e4e4e4 !important;">
                                
                                <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important;">
                                    <div class="row mb-5">
                                        <div class="form-group col-7">
                                            <div class="shadow_inputs">
                                                <div class="form-group row ">
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
                                                        <input class="form-control" type="text" name="fname" data-inputName="FirstName" id="first_name" placeholder="First Name" required="require" autocomplete="off">
                                                        <div class="errorMessage"></div>
                                                        {{-- <span class="form-text text-muted">First Name</span> --}}
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label class="control-label" for="middle_name">Middle Name</label>
                                                        <input class="form-control" type="text" id="middle_name"  data-inputName="MiddleName"  name="mname" placeholder="Middle Name" required="require" autocomplete="off">
                                                        
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label class="control-label" for="last_name">Last Name </label>
                                                        <input class="form-control" type="text" id="last_name"  data-inputName="LastName"  name="lname" placeholder="Last Name" required="require" autocomplete="off">
                                                        
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-6">
                                                    <label class="control-label" for="dob">Date of Birth</label>
                                                        <input class="form-control" type="date" id="clientDob"  data-inputName="dob" name="dob" placeholder="Date of Birth" required="require" autocomplete="off">
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="control-label" for="dob">SSN</label>
                                                        {{--  --}}
                                                        <div class="input-group">
                                                            <input class="form-control" type="password" id="clientSSN"  data-inputName="ssn" name="ssn" placeholder="SSN" autocomplete="off">

                                                            <div class="input-group-append">
                                                                <span class="input-group-text toggleSSN" data-target-input="vol_ssn">
                                                                    <i class="fa fa-eye"></i>
                                                                </span>
                                                            </div>
                                                            

                                                        </div>
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-5">
                                            <div class="shadow_inputs">
                                                <div class="form-group row">
                                                    <div class="col-6">
                                                        <label class="control-label" for="profile_pic">Profile Picutre</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                                                                    <div class="kt-avatar__holder" id="uploaded_img" style="background-image: url({{asset('media/users/default.jpg')}})"></div>
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
                                                            @if(lookup_value('communication_preference')->count())
                                                            @foreach(lookup_value('communication_preference') as $key => $preference)
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                            <input type="checkbox" name="{{$preference->value}}" value="cell_ph"> {{$preference->value}}
                                                                <span></span>
                                                            </label>
                                                            @endforeach
                                                            {{-- <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" name="client_comm" value="telephone"> Telephone
                                                                <span></span>
                                                            </label>
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" name="client_comm" value="home_ph"> Home Phone
                                                                <span></span>
                                                            </label>
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" name="client_comm" value="office_ph"> Office Phone
                                                                <span></span>
                                                            </label> --}}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        
                                        <div class="form-group col-7">
                                            <span class="btn portlet_label">Address</span>	  
                                            <div class="shadow_inputs">
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-12" style="padding-top:10px;">
                                                        <label class="control-label" for="user_add_1">Address 1</label>
                                                        
                                                        <input class="form-control" value="" type="text" id="user_add_1" name="add1">
                                                    </div>
                                                    <div class="form-group  col-md-12">
                                                        <label class="control-label" for="user_add_2">Address 2</label>
                                                        
                                                        <input class="form-control" value="" type="text" id="user_add_2" name="add2">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-4">
                                                        <label class="control-label" for="user_city">City</label>
                                                        
                                                    <input class="form-control" value="" type="text" id="user_city_name" name="city">
                                                    </div>
                                                    <div class="form-group  col-md-4">
                                                        <label class="control-label" for="user_state">State</label>
                                                        <input class="form-control" value="" type="text" id="user_state_name" name="state">
                                                    </div>
                                                    <div class="form-group  col-md-4">
                                                        <label class="control-label" for="zip">Zip</label>
                                                        <input class="form-control" value="" type="text" id="user_zip" name="zip">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-4">
                                                        <label class="control-label" for="user_county">County</label>
                                                            
                                                        <input class="form-control" value="" type="text" id="user_county_name" name="county">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-5">
                                            <span class="btn portlet_label">Contact</span>
                                            <div class="shadow_inputs">
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-12" style="padding-top:10px;">
                                                        <label class="control-label" for="client_email">Primary Email</label>
                                                        
                                                        <input class="form-control" value="" type="text" id="client_email" name="email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-12">
                                                        <label class="control-label" for="client_email_2">Secondary Email</label>
                                                        
                                                        <input class="form-control" value="" type="text" id="client_email_2" name="email_sec">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
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
                                                        <input class="form-control" type="text" data-inputName="PhoneNumber"  name="phone_no_1" placeholder="Phone Number" autocomplete="off"> 
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
                                                        <input class="form-control" type="text" data-inputName="PhoneNumber"  name="phone_no_2" placeholder="Phone Number" autocomplete="off"> 
                                                        {{-- <div class="errorMessage"></div> --}}
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
                                                <button type="" class="btn btn-success form_next_step" data-step = '1' data-action="add">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel" style="background:#e4e4e4 !important;">
                                <div class="kt-portlet__body" style="margin-left: 1.5rem;">
                                    <div class="form-group row" style="display: flex;">
                                        <div class="form-group shadow_inputs" style="margin-right:35px;flex:1;">
                                            <span class="btn portlet_label" style="position:relative !important; top:-21% !important;">Company</span>	  
                                            <div class="form-group row">
                                                <div class="form-group  col-md-12" style="padding-top:10px;">
                                                    <label class="control-label" for="company">Company </label>
                                                    
                                                    <select class="form-control" value="" type="text" id="company" name="company">
                                                        <option value="">Company</option>
                                                        <option value="test">Test</option>
                                                        <option value="test">Test</option>
                                                        <option value="test">Test</option>
                                                    </select>
                                                </div>
                                                <div class="errorMessage"></div>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="form-group shadow_inputs" style="margin-right:35px;flex:1;">
                                            {{-- <span class="btn portlet_label" style="top:-21% !important">Company Contacts</span>	   --}}
                                            <div class="form-group row">
                                                {{-- <div class="form-group  col-md-12" style="padding-top:10px;">
                                                    <label class="control-label" for="company_contact">Company Contact: </label>
                                                    
                                                <select class="form-control" value="" type="text" id="company_contact" name="company_contact">
                                                        <option value="test">Con</option>
                                                        <option value="test">Test</option>
                                                        <option value="test">Test</option>
                                                        <option value="test">Test</option>
                                                    </select>
                                                </div>
                                                <div class="errorMessage"></div> --}}
                                                
                                            </div>
                                            
                                        </div>
                                    
                                    </div>	  
                                    
                                </div>
                                <div class="kt-portlet__foot footer_white">
                                    <div class="kt-form__actions">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="reset" class="btn btn-brand form_previous_step" data-step="2">Previous</button>
                                            </div>
                                            <div class="col-lg-6 kt-align-right">
                                                <button type="reset" class="btn btn-success form_next_step" data-step="2" data-action="add">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="kt_portlet_base_demo_1_3_tab_content" role="tabpanel" style="background:#e4e4e4 !important;">
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
                                <div class="kt-portlet__foot footer_white">
                                    <div class="kt-form__actions">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="reset" class="btn btn-brand form_previous_step" data-step="3">Previous</button>
                                            </div>
                                            <div class="col-lg-6 kt-align-right">
                                                <button type="reset" class="btn btn-success" data-step="3" id="createClient">Submit</button>
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
    

   

    // $('.nav-link').click(function(){
    //     var target = $(this).attr('data-step');
    //     client_form_validation($(this), target);
    // })
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
            url: "/client/processfiles",
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
                $('#client_add_form').append('<input type="hidden" name="attachment[]" value="' + response.name + '">')
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

// $('.client_salutation').selectpicker({
//     showTick: true,
//     doneButton: true,
//     doneButtonText: "Apply"
// });
$('.client_salutation').select2({
    // livesearch: true,
    // width: 200,
    // placeholder: 'Select a category',
    // allowClear: true,
    // ajax: {
    //     url: '/blogs/categories',
    //     method: 'get',
    //     processResults: function(data) {
    //         return {
    //             results: data
    //         };
    //     }
    // },
});
$(document).off('click', '#createClient').on('click', '#createClient', function(e){
    e.preventDefault();
    var data = new FormData(document.getElementById('client_add_form'));
    // console.log(form1);
    $.ajax({
        url: "client/add",
        method: "POST",
        data: data,
        contentType: false,
        processData: false,
        success: function(resp) {
            $("#cModal").modal("hide");
            $('#t_clientstable').KTDatatable().reload();
            toastr.success("Added successfully.");
            if($('#t_clientstable').length)
                clientTableReloader();
            if($('#t_company_client_table').length)
                companyTableReloader();
        },
        error: function(err) {
            console.log(err);
        }
    });
});
</script>