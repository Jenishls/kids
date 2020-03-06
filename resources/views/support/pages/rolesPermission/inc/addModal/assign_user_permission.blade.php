<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Assign permission to users</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <form id ="user_permission_form">
                        @csrf
                        <div class="form-group label-floating" style="margin-top:10px;">
                            <label class="control-label" for="user_id">Users:</label>
                            <select name="user_id" id="user_id" class="form-control">
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{ucWords($user->name)}}</option>
                                @endforeach
                            </select>
                        </div>  
                        <p style="font-weight:bold;">Select permissions:</p>
                        <div class="form-group label-floating kt-checkbox-list" style="margin-top:10px;">
                            <div class="kt-checkbox-inline">
                            @foreach($permissions as $permission)
                                <label class="kt-checkbox kt-checkbox--solid">
                                    <input type="checkbox"name="user_permission[]" value="{{$permission->id}}">{{ucWords($permission->permission_name)}}
                                    <span></span>
                                </label>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="assign_user_permission" >Save</button>
        </div>
    </div>
</div>
<script>
    $('#page_id').select2({ width: 'resolve' });
    $(document).off('click', '#assign_user_permission').on('click', '#assign_user_permission', function(e){
        e.preventDefault();
        e.stopPropagation();
        let data = $('#user_permission_form').serializeArray();
        supportAjax({
            url: 'rolePermission/add/userPermission',
            method: 'post',
            data: data
        },function(resp){
            $('#cModal').modal('hide');
            $('#t_userpermissionstable').KTDatatable().reload();
            toastr.success('Permission successfully assigned.');
        }, function(err){
            $('#cModal').modal('hide');
            toastr.error('Sorry, unable to assign.');
        });
    });
</script>
    
    