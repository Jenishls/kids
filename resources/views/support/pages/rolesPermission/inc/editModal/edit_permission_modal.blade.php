<?php $existing = []; ?>
@foreach($permission->pages as $page)
    <?php $existing[] = $page->id; ?>
@endforeach
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Permission</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <form id ="edit_permission_form">
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label" for="permission_name">Permission Name</label>
                            <input class="form-control" type="text" value="{{$permission->permission_name}}" name="permission_name" id="permission_name" placeholder="Permission Name">
                            <div class="errorMessage"></div>

                        </div>
                        <div class="form-group label-floating repeatThisRow" style="margin-top:10px;">
                            <label class="control-label" for="action">Action</label>
                            <input class="form-control" value="{{$permission->action}}" name="action" placeholder="Multiple Action seperate by |">
                        </div>
                        <hr>
                        <p style="font-weight:bold;">Select pages to assign this permission:</p>
                        <div class="form-group label-floating kt-checkbox-list" style="margin-top:10px;">
                            <div class="kt-checkbox-inline">
                            @foreach($pages as $page)
                                <label class="kt-checkbox kt-checkbox--solid @if(in_array($page->id, $existing)) kt-checkbox--success @endif">
                                    <input type="checkbox"name="page_id[]" value="{{$page->id}}"  @if($permission->pages->contains($page->id)) checked=checked @endif>{{ucWords($page->page_name)}}
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
            <button type="button" class="btn btn-primary sy_icon" id="update_permission" data-id="{{$permission->id}}" >Save</button>
        </div>
    </div>
</div>

<script>
    $(document).off('click', '#update_permission').on('click', '#update_permission', function(e){
        e.preventDefault();
        e.stopPropagation();
        let edit_permission_form = $('#edit_permission_form')
        let data = $('#edit_permission_form').serializeArray();
        supportAjax({   
            url: 'rolePermissions/update/permission/'+$(this).data('id'),
            method: 'post',
            data: data
        },function(resp){
            $('#cModal').modal('hide');
            toastr.success('Updated succesfully.')
            $('#t_permissionstable').KTDatatable().reload();
        }, function({status,responseJSON}){
            if (status === 422) 
            {
                edit_permission_form.find('input[name]').css('border-color', '#ddd');
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    edit_permission_form.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`input[name="${key}"]`).siblings(".errorMessage").append(message);

                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        });
    });
</script>