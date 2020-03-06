 <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Role</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            
            <div class="row">
                <div class="col">
                    <form id ="add_role_form">
                        @csrf
                        <div class="form-group label-floating">
                                <label class="control-label" for="role_name">Role Name</label>
                                <input class="form-control" type="text" name="role_name" id="role_name" placeholder="Role Name">
                                <div class="errorMessage"></div>
                        </div>
                        <div class="form-group label-floating repeatThisRow" style="margin-top:10px;">
                            <label class="control-label" for="label">Label</label>
                            <input class="form-control" id="label" name="label" placeholder="Add label for role">
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
            <button type="button" class="btn btn-primary sy_icon" id="store_roles" >Save</button>
        </div>
    </div>
</div>

<script>
 $(document).off('click', '#store_roles').on('click', '#store_roles', function(e){
    e.preventDefault();
    e.stopPropagation();
    let add_role_form = $('#add_role_form');
    let data = $('#add_role_form').serializeArray();
    supportAjax({
        url: 'rolePermission/add/roles',
        method: 'post',
        data: data
    },function(resp){
         $('#cModal').modal('hide');
        toastr.success('New role added!');
         $('#t_rolestable').KTDatatable().reload();
    }, function({status,responseJSON}){
        if (status === 422) 
        {
            add_role_form.find('input[name]').css('border-color', '#ddd');
            if (!responseJSON.errors) return;
            const messages = [];
            for (const [key, message] of Object.entries(responseJSON.errors)) {
                add_role_form.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                messages.push(message);
                $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                $(`input[name="${key}"]`).siblings(".errorMessage").append(message);

            }
            toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
        }
    });
 })
</script>

