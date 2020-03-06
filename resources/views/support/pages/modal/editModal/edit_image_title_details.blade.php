{{-- {{dd($role)}} --}}
<div class="modal-dialog editUserModalDialog" role="document">
    <div class="modal-content addUserModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
       
        <form id ="edit_personal_profile_form" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row ">
                    <div class="col-md-12">
                        <!--Birth Detail-->
                        
                        <div class="row">
                            <div class="form-group label-floating col-md-4">
                                <label class="control-label" for="f_name">First Name</label>
                                <input class="form-control" type="text" id="user_name" name="first_name" value="{{ucfirst($user->member->first_name)}}">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-4">
                                <label class="control-label" for="mid_name">Middle Name</label>
                                <input class="form-control" value="{{$user->member->middle_name? ucfirst($user->member->middle_name): ''}}" type="text" id="mid_name" name="middle_name" placeholder="">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-4">
                                <label class="control-label" for="last_name">Last Name</label>
                                <input class="form-control" value="{{ucfirst($user->member->last_name)}}" type="text" id="last_name" name="last_name" placeholder="">
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <!--End Birth Detail-->
                        <div class="row">
                            <div class="form-group label-floating col-md-4">
                                <label class="control-label" for="email">Email</label>
                                <input class="form-control" type="email" id="email" name="email" value="{{$user->email}}">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-4">
                                <label class="control-label" for="mobile_no">Mobile Number</label>
                                <input class="form-control" value="{{$user->member->mobile_no}}" type="text" id="mob_no" name="mobile_no" placeholder="">
                                <div class="errorMessage"></div>
                            </div>
                            {{-- <div class="form-group label-floating col-md-4">
                                <label class="control-label" for="last_name">Role</label>
                                <input class="form-control" value="" type="text" id="role" name="role" placeholder="">
                            </div> --}}
                            @if(count($roles))
                                <div class="form-group label-floating col-md-4">
                                    <label class="control-label" for="role">Role</label>
                                    <div>
                                        <select title="Select a role.."  name="role[]" id="user_specific_role" multiple class="select_role">
                                            
                                            @foreach($roles as $role)
                                            <option  value="{{$role->id}}">{{ucfirst($role->label)}}</option>
                                            @endforeach
                                        </select>
                                        <div class="errorMessage"></div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary sy_icon profile_update" data-route="update/userImageTitle" data-id="{{$user->id}}" >Update</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(function(){
        $('#user_specific_role').selectpicker({
            liveSearch: true,
            showTick: true,
            actionsBox: true,
            doneButton : true, 
            doneButtonText : "Apply"
        });
            
    });
    $("input[name=mobile_no], input[name=home_phone_no], input[name=office_phone_no]").inputmask("mask", {
        "mask": "(999) 999  9999"
    });
</script>