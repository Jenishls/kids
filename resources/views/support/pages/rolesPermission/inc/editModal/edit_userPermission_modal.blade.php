<?php $existing = []; ?>
@foreach ($user->permissions as $permission)
    <?php
        $existing[] = $permission->id;    
    ?>
@endforeach
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit User-Permissions</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <form id ="edit_user_permission_form">
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label" for="role_name">User Name: &nbsp;  </label>
                            <p style="font-weight:bold;">{{$user->name}}</p>
                        </div>
                        <hr>
                        <p style="font-weight:bold;">Permissions:</p>
                        <div class="form-group label-floating kt-checkbox-list" style="margin-top:10px;">
                            <div class="kt-checkbox-inline">
                            @foreach($permissions as $permission)
                                <label class="kt-checkbox kt-checkbox--solid  @if(in_array($permission->id, $existing))kt-checkbox--success @endif">
                                    <input type="checkbox"name="user_permission[]" value="{{$permission->id}}" @if($user->permissions->contains($permission->id)) checked=checked @endif>{{ucWords($permission->permission_name)}}
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
            <button type="button" class="btn btn-primary sy_icon" id="update_user_permission" data-uid="{{$user->id}}" data-id="{{$permission->id}}" >Save</button>
        </div>
    </div>
</div>

<script>
    $(document).off('click', '#update_user_permission').on('click', '#update_user_permission', function(e){
        e.preventDefault();
        e.stopPropagation();
        let data = $('#edit_user_permission_form').serializeArray();
        let user = $(this).data('uid');
        let permission = $(this).data('id');
        data = data.concat({'name':'user_id', value:user}, {'name':'permission_id', 'value':permission});
        supportAjax({   
            url: 'rolePermissions/update/userPermission/'+$(this).data('uid'),
            method: 'post',
            data: data
        },function(resp){
            $('#cModal').modal('hide');
            toastr.success('Updated successfully.');
            $('#t_userpermissionstable').KTDatatable().reload();
        }, function(err){
            $('#cModal').modal('hide');
            toastr.error(err.responseJSON.message);
        })
    })
</script>