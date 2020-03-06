<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col">
                        <form id ="permission_form">
                            @csrf
                            <div class="form-group label-floating">
                                    <label class="control-label" for="permission_name">Permission Name</label>
                                    <input class="form-control" type="text" name="permission_name" id="permissionName" placeholder="Permission Name">
                                    <div class="errorMessage"></div>

                            </div>
                            <div class="form-group label-floating repeatThisRow" style="margin-top:10px;">
                                <label class="control-label" for="action">Action</label>
                                <input class="form-control" id="action" name="action" placeholder="Multiple Action seperate by |">
                            </div>
                            <hr>
                            <p style="font-weight:bold;">Select pages to assign this permission:</p>
                            <div class="form-group label-floating kt-checkbox-list" style="margin-top:10px;">
                                <div class="kt-checkbox-inline">
                                @foreach($pages as $page)
                                    <label class="kt-checkbox kt-checkbox--solid">
                                        <input type="checkbox"name="page_id[]" value="{{$page->id}}">{{ucWords($page->page_name)}}
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
                <button type="button" class="btn btn-primary sy_icon" id="store_permission" >Save</button>
            </div>
        </div>
    </div>
    
    <script>

        $('#page_id').select2({ width: 'resolve' });
     $(document).off('click', '#store_permission').on('click', '#store_permission', function(e){
        e.preventDefault();
        e.stopPropagation();
        let add_permission_form = $('#permission_form');
        let data = $('#permission_form').serializeArray();
        supportAjax({
            url: 'rolePermission/add/permissions',
            method: 'post',
            data: data
        },function(resp){
            $('#cModal').modal('hide');
            toastr.success("New permission has been added!");
            $('#t_permissionstable').KTDatatable().reload();
        }, function({status,responseJSON}){
            if (status === 422) 
            {
                add_permission_form.find('input[name]').css('border-color', '#ddd');
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    add_permission_form.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`input[name="${key}"]`).siblings(".errorMessage").append(message);

                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        });
     });
    </script>
    
    