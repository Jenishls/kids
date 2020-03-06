<div class="modal-dialog editUserModalDialog" role="document">
    <div class="modal-content addUserModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Contact</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form id ="edit_contact_form">
            {{-- modal body --}}
            <div class="modal-body">
                <div class="row ">
                    <div class="col">
                            @csrf
                            <div class="row">
                                <div class="form-group label-floating col-md-4">
                                    <label class="control-label" for="user_add_1">Mobile</label>
                                    
                                    <input class="form-control" value="{{$user->member->mobile_no? $user->member->mobile_no: ''}}" type="text" id="personal_num" name="mobile_no" placeholder="">
                                </div>
                                <div class="form-group label-floating col-md-4">
                                    <label class="control-label" for="user_add_2">Home Number</label>
                                    
                                    <input class="form-control" value="{{$user->member->home_phone_no? $user->member->home_phone_no: ''}}" type="text" id="home_num" name="home_phone_no">
                                </div>
                                <div class="form-group label-floating col-md-4">
                                    <label class="control-label" for="user_city">Office Phone Number</label>
                                    
                                    <input class="form-control" value="{{$user->member->office_phone_no? $user->member->office_phone_no: ''}}" type="text" id="office_num" name="office_phone_no">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group label-floating col-md-4">
                                    <label class="control-label" for="user_add_1">Personal Email</label>
                                    
                                    <input class="form-control" value="{{$user->member->personal_email? $user->member->personal_email: ''}}" type="email" id="personal_email" name="personal_email" placeholder="">
                                </div>
                                <div class="form-group label-floating col-md-4">
                                    <label class="control-label" for="user_add_2">Office Email</label>
                                    
                                    <input class="form-control" value="{{$user->member->office_email? $user->member->office_email: ''}}" type="email" id="home_num" name="office_email">
                                </div>
                                <div class="form-group label-floating col-md-4">
                                    <label class="control-label" for="user_city">Other Email</label>
                                    
                                    <input class="form-control" value="{{$user->member->other_email? $user->member->other_email: ''}}" type="email" id="office_num" name="other_email">
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            {{-- modal footer --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary sy_icon info_update" id="contact_info_update_btn" data-route="/admin/update/contactDetail" data-id="{{$user->id}}">Update</button>
            </div>
        </form>
    </div>
</div>
<script>
    $("input[name=mobile_no], input[name=home_phone_no], input[name=office_phone_no]").inputmask("mask", {
        "mask": "(999) 999  9999"
    });
</script>