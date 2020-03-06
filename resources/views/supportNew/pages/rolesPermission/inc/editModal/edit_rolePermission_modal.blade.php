<?php $existing = []; ?>
@foreach($role->permissions as $permission)
    <?php $existing[] = $permission->id; ?>
@endforeach
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Role-Permission</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <form id ="edit_role_permission_form">
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label" for="role_name">Role Name:  </label>
                            <p style="font-weight:bold;">{{$role->label}}</p>
                        </div>
                        <hr>
                        <p style="font-weight:bold;">Permissions:</p>
                        <div class="form-group label-floating kt-checkbox-list" style="margin-top:10px;">
                            <div class="kt-checkbox-inline">
                            @foreach($permissions as $permission)
                                <label class="kt-checkbox kt-checkbox--solid  @if(in_array($permission->id, $existing)) kt-checkbox--success @endif">
                                    <input type="checkbox"name="role_permission[]" value="{{$permission->id}}" @if($role->permissions->contains($permission->id)) checked=checked @endif>{{ucWords($permission->permission_name)}}
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
            <button type="button" class="btn btn-primary sy_icon" id="update_role_permission" data-rid="{{$role->id}}" data-id="{{$permission->id}}" >Save</button>
        </div>
    </div>
</div>

<script>
    $(document).off('click', '#update_role_permission').on('click', '#update_role_permission', function(e){
        e.preventDefault();
        e.stopPropagation();
        let data = $('#edit_role_permission_form').serializeArray();
        let role = $(this).data('rid');
        let permission = $(this).data('id');
        data = data.concat({'name':'role_id', value:role}, {'name':'permission_id', 'value':permission});
        supportAjax({   
            url: '/admin/rolePermissions/update/rolePermission/'+$(this).data('id'),
            method: 'post',
            data: data
        },function(resp){
                $('#cModal').modal('hide');
                toastr.success("Updated!");
                $('#t_rolepermissionstable').KTDatatable().reload();
        }, function(err){
            $('#cModal').modal('hide');
            toastr.error(err.reponseJSON.message);
        });
    });
</script>