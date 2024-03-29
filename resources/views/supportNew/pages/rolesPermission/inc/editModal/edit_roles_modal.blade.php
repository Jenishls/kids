<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <form id ="role_edit_form">
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label" for="role_name">Role Name</label>
                            <input class="form-control" type="text" value="{{$role->role_name}}" name="role_name" id="role_name" placeholder="Role Name">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="form-group label-floating repeatThisRow" style="margin-top:10px;">
                            <label class="control-label" for="Label">Label</label>
                            <input class="form-control" id="Label" value="{{$role->label}}" name="Label" placeholder="Role label">
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
            <button type="button" class="btn btn-primary sy_icon" id="update_role" data-id="{{$role->id}}" >Save</button>
        </div>
    </div>
</div>

<script>
    $(document).off('click', '#update_role').on('click', '#update_role', function(e){
        e.preventDefault();
        e.stopPropagation();
        var role_edit_form= $('#role_edit_form')
        let data = $('#role_edit_form').serializeArray();
        supportAjax({   
            url: '/admin/rolePermissions/update/role/'+$(this).data('id'),
            method: 'post',
            data: data
        },function(resp){
            $('#cModal').modal('hide');
            toastr.success('Updated successfully.');
            $('#t_rolestable').KTDatatable().reload();
        }, function({
        status,
        responseJSON
        }){
        if (status === 422) 
            {
                role_edit_form.find('input[name]').css('border-color', '#ddd');
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    role_edit_form.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`input[name="${key}"]`).siblings(".errorMessage").append(message);

                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        });
    });
</script>