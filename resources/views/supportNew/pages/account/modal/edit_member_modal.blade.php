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
        background: #eeeeee;
        color: #41bcf6;
        font-weight: 500;
        border: 1px solid #ebedf2;
        margin-bottom: 0;
    }
    .custom_wizard_table{
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        background-color: #e5f7ff26;
        border: 1px solid #e1e1ef;
    }
</style>
<div class="modal-dialog custom_dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" style="margin-left:2.5rem;" id="cWizardTitle">Update Member</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:cornsilk;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;" id="demoWizard">
            <div class="kt-portlet kt---tabs" style="margin-bottom:0px !important;">
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="editMemberForm">   
                        @csrf
                        <div class="tab-content">
                            <div class="wizard-panel active" id="accountWForm" role="tabpanel" style="background:#e5f7ff !important;">
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
                        </div>
                        <div class="kt-portlet__foot footer_white">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-6 kt-align-right ml-auto" >
                                        <button type="" class="btn btn-sm btn-pill btn-success" data-targetid="{{$client->id}}" id="updateMember" >Update <i class="la la-edit"></i></button>
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
  $('#gender_select2,.salutation_picker').select2({'width':'100%'});
    $('#dob_picker').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'),10)
      }, function(start, end, label) {
        var years = moment().diff(start, 'years');
    });
   $("input[name=phone_no_1], input[name=phone_no_2]").inputmask("mask", {
      "mask": "(999) 999-9999"
  });
  $('#member_pic').change(function(e){
      e.preventDefault();
      var profile_pic = window.URL.createObjectURL(this.files[0]);
      $('#uploaded_img').css({backgroundImage:`url(${profile_pic})`});
      $('.kt-widget7__img').attr('src', `${profile_pic}`);
      
  });
$('#updateMember').off('click').on('click', function(e){
  e.preventDefault();
    $.ajax({
        url:'/admin/account/member/update/'+$(this).attr('data-targetid'),
        method: 'POST',
        data: new FormData(document.getElementById('editMemberForm')),
        contentType: false,
        processData: false,
        success: function(response){
            $('#cModal').modal('hide');
        }, 
        error:function({status, responseJSON})
        {
            $('#editMemberForm').find('input[name], select[name]').css('border-color', '#ddd');
            $(`input[name]`).siblings(".errorMessage").empty();
            $(`select[name]`).siblings(".errorMessage").empty();
            if (!responseJSON.errors) return;
            const messages = [];
            for (const [key, message] of Object.entries(responseJSON.errors)) {
                 $('#editMemberForm').find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                 $('#editMemberForm').find(`select[name = "${ key }"]`).siblings('button').css('border-color', '#F44336');
                messages.push(message);
                $(`input[name="${key}"]`).siblings(".errorMessage").empty().append(message);

                $(`select[name="${key}"]`).siblings(".errorMessage").empty().append(message);
            }
            toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
        }
    });

})
</script>