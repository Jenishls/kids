<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Assign permission to role</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <form id ="role_permission_form">
                        @csrf
                        <div class="form-group label-floating" style="margin-top:10px;">
                            <label class="control-label" for="role_id">Select role:</label>
                            <select name="role_id" id="role_id" class="form-control">
                                @foreach($roles as $role)
                                <option value="{{$role->id}}">{{ucWords($role->label)}}</option>
                                @endforeach
                            </select>
                        </div>  
                        <hr>
                        <p style="font-weight:bold;">Select permissions:</p>
                        <div class="form-group label-floating kt-checkbox-list" style="margin-top:10px;">
                            <div class="kt-checkbox-inline">
                            @foreach($permissions as $permission)
                                <label class="kt-checkbox kt-checkbox--solid">
                                    <input type="checkbox"name="role_permission[]" value="{{$permission->id}}">{{ucWords($permission->permission_name)}}
                                    <span></span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="assign_role_permission" >Save</button>
        </div>
    </div>
</div>
    
<script>
    $('#page_id').select2({ width: 'resolve' });
    $(document).off('click', '#assign_role_permission').on('click', '#assign_role_permission', function(e){
        e.preventDefault();
        e.stopPropagation();
        let data = $('#role_permission_form').serializeArray();
        supportAjax({
            url: 'rolePermission/add/rolePermission/',
            method: 'post',
            data: data
        },function(resp){
            $('#cModal').modal('hide');
            toastr.success('Assigned permission successfully.')
            $('#t_rolepermissionstable').KTDatatable().reload();
        },function(err){
            $('#cModal').modal('hide');
            toastr.error('Sorry, unable to assign.');
        })
    })
</script>
    
    