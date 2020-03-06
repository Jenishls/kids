 <!-- JQuery -->
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
<!-- Bootstrap tooltips -->
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script> --}}
<!-- Bootstrap core JavaScript -->
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}
<!-- MDB core JavaScript -->
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script> --}}
 <div class="modal-dialog addUserModalDialog" role="document">
    <div class="modal-content addUserModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            
            <div class="row">
                <div class="col">
                    <form id ="users_form">
                        @csrf
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="first_name">First Name</label>
                                <input class="form-control" type="text" name="FirstName" data-inputName="FirstName" id="first_name" placeholder="First Name" required="require" autocomplete="off">
                                
                            <div class="errorMessage"></div>
                                
                            </div>
                            <div class="form-group label-floating col-md-6 ">
                               
                                <label class="control-label" for="last_name">Last Name</label>
                                <input class="form-control" type="text" id="last_name"  data-inputName="LastName"  name="LastName" placeholder="Last Name" required="require" autocomplete="off">
                                
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="username">Username</label>
                                <input class="form-control" type="text" id="userName" data-inputName="username" name="username" placeholder="Username" required="require" autocomplete="off">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="email">Email</label>
                                <input class="form-control" type="email" id="userEmail"  data-inputName="email" name="email" placeholder="Email" required="require" autocomplete="off">
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="password">Password</label>
                                <input class="form-control" type="password" data-inputName="password"  id="userPassword" name="password" placeholder="Password" required="require" autocomplete="off">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="password">Confirm Password</label>
                                <input class="form-control" type="password" data-inputName="password" id="userConfirmPassword" name="password_confirmation" placeholder="Confirm Password" required="require" autocomplete="off">
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="email">Phone Number</label>
                                <input class="form-control" type="text" data-inputName="PhoneNumber" id="phNumber" name="PhoneNumber" placeholder="Phone Number" autocomplete="off">
                                
                                <div class="errorMessage"></div>
                            </div>
                            @if($roles->count())
                            <div class="form-group label-floating col-md-6 addUserRole">
                                <label class="control-label" for="role">Role</label>
                                <div>
                                    <select title="Select a role.."  name="role[]" id="user_role" multiple>
                                        
                                        @foreach($roles as $role)
                                        <option  value="{{$role->id}}">{{$role->role_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="errorMessage"></div>
                                </div>
                            </div>
                            @endif
                                
                            {{-- <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="password">Confirm Password</label>
                                <input class="form-control" type="password" id="userConfirmPassword" name="password" placeholder="Confirm Password">
                            </div> --}}
                        </div>
                        
                        
                        {{-- <div class="col form-group label-floating">
                            <label class="control-label">Icon Class</label>
                            <input class="form-control" id="icon_class" name="icon_class">
                        </div>
                             --}}
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="store_users" >Save</button>
        </div>
    </div>
</div>

<script>
 $(document).on('click', '#store_users', function(e){
    e.preventDefault();
    e.stopPropagation();
    let add_user_form = $('#users_form');
    let data = $('#users_form').serializeArray();
    supportAjax({
        url: '/admin/users/add',
        method: 'POST',
        data: data
    },function(resp){
        $('#cModal').modal('hide');
        toastr.success(" New user added!");
        $('#t_userstable').KTDatatable().reload();
        
    },function({ status,responseJSON}){
        if (status === 422) 
        {
            add_user_form.find('input[name]').css('border-color', '#ddd');
            $(`input[name]`).siblings(".errorMessage").empty();
            if (!responseJSON.errors) return;
            const messages = [];
            for (const [key, message] of Object.entries(responseJSON.errors)) {
                add_user_form.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                messages.push(message);
                $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                $(`input[name="${key}"]`).siblings(".errorMessage").append(message);

            }
            toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
        }
    });
 });



 $("input[name=PhoneNumber]").inputmask("mask", {
    "mask": "(999) 999-9999"
 });

 

 $(function(){
        $('#user_role').selectpicker({
            liveSearch: true,
            showTick: true,
            actionsBox: true,
            doneButton : true, 
            doneButtonText : "Apply"
            
        });
        
 });

</script>