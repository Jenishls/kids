<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Page</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            
            <div class="row">
                <div class="col">
                    <form id ="edit_page_form">
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label" for="page_name">Page Name</label>
                            <input class="form-control" type="text" value="{{$page->page_name}}" name="page_name" id="page_name" placeholder="Page Name">
                            <div class="errorMessage"></div>

                        </div>
                        <div class="form-group label-floating repeatThisRow" style="margin-top:10px;">
                            <label class="control-label" for="action">Action</label>
                            <input class="form-control" id="action" value="{{$page->action}}" name="action" placeholder="Multiple Action seperate by |">
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
            <button type="button" class="btn btn-primary sy_icon" id="update_pages" data-id="{{$page->id}}" >Save</button>
        </div>
    </div>
</div>
    
    <script>
     $(document).off('click', '#update_pages').on('click', '#update_pages', function(e){
        e.preventDefault();
        e.stopPropagation();
        var edit_page = $('#edit_page_form');
        let data = $('#edit_page_form').serializeArray();
        supportAjax({   
            url: '/admin/rolePermissions/update/page/'+$(this).data('id'),
            method: 'post',
            data: data
        },function(resp){
             $('#cModal').modal('hide');
             toastr.success('Updated successfully.')
             $('#t_pagestable').KTDatatable().reload();
        }, function({
        status,
        responseJSON
        }){
        if (status === 422) 
            {
                edit_page.find('input[name]').css('border-color', '#ddd');
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    edit_page.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`input[name="${key}"]`).siblings(".errorMessage").append(message);

                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        });
     })
    </script>
    
    