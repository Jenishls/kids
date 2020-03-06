 <div class="modal-dialog editUserModalDialog" role="document">
    <div class="modal-content addUserModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
            <div>
            <button class="resetBtn" style="background:none; border:none; padding:5px"><i class="fas fa-undo" style="color:#d6d2d2"></i></button>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
            </div>
        </div>
        <div class="modal-body">
            
            <div class="row ">
                <div class="col">
                    <form id ="edit_users_form">
                        @csrf
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="first_name">First Name</label>
                                <input class="form-control" value="{{$user->member->first_name}}" type="text" name="FirstName" data-inputName="FirstName" id="first_name" placeholder="First Name">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="last_name">Last Name</label>
                                <input class="form-control" value="{{$user->member->last_name}}" type="text" data-inputName="LastName" id="last_name" name="LastName" placeholder="Last Name">
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="username">Username</label>
                                
                                <input class="form-control" value="{{$user->name}}" type="text" data-inputName="username" id="userName" name="username" placeholder="Username">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="email">Email</label>
                                <input class="form-control" value="{{$user->email}}" type="email" data-inputName="email" id="userEmail" name="email" placeholder="Email">
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="email">Phone Number</label>
                                <input class="form-control" value="{{$user->member->mobile_no}}" type="text" data-inputName="PhoneNumber" id="phNumber" name="PhoneNumber" placeholder="Phone Number">
                                <div class="errorMessage"></div>
                            </div>
                            @if($roles->count())
                            @php
                                $currentRoles = '';
                                foreach($user->roles as $role){
                                    $currentRoles.= $role->role_name.'  ';
                                };
                            @endphp
                            <div class="form-group label-floating col-md-6 addUserRole">
                                <label class="control-label" for="role">Role</label>
                                <div>
                                    <select title="{{$currentRoles}}" value="" name="role[]" id="edit_role" multiple>
                                        
                                        @foreach($roles as $role)
                                        <option  value="{{$role->id}}">{{$role->role_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="errorMessage"></div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" data-id="{{$user->id}}" id="update_users" >Save</button>
        </div>
    </div>
</div>

<script>
    $(document).off('click', '#update_users').on('click', '#update_users', function(e){
       e.preventDefault();
       e.stopPropagation();
       let edit_user_modal = $('#edit_users_form');
       let data = $('#edit_users_form').serializeArray();
       let userId= $(this).data('id');
       supportAjax({   
           url: 'user/updateUser/'+userId,
           method: 'post',
           data: data
       },function(resp){
            $('#cModal').modal('hide');
            toastr.success("Updated!");
            $('#t_userstable').KTDatatable().reload();
       },function({ status,responseJSON}){
            if (status === 422) 
            {
                edit_user_modal.find('input[name]').css('border-color', '#ddd');
                $(`input[name]`).siblings(".errorMessage").empty();
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    edit_user_modal.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`input[name="${key}"]`).siblings(".errorMessage").append(message);

                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        });
    });
    $(document).on('click', '.resetBtn', function(e){
        e.preventDefault();
        $('#edit_users_form').find("input").val("");
    });

    $("input[name=PhoneNumber]").inputmask("mask", {
    "mask": "(999) 999-9999"
    });
    
    $('#edit_role').selectpicker({
		liveSearch: true,
        showTick: true,
        actionsBox: true,
        doneButton : true, 
        doneButtonText : "Apply"
	});
</script>