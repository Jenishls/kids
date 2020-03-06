 <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Page</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            
            <div class="row">
                <div class="col">
                    <form id ="pages_form">
                        @csrf
                        <div class="form-group label-floating">
                                <label class="control-label" for="page_name">Page Name</label>
                                <input class="form-control" type="text" name="page_name" id="page_name" placeholder="Page Name">
                                <div class="errorMessage"></div>
                        </div>
                        <div class="form-group label-floating repeatThisRow" style="margin-top:10px;">
                            <label class="control-label" for="action">Action</label>
                            <input class="form-control" id="action" name="action" placeholder="Multiple Action seperate by |">
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
            <button type="button" class="btn btn-primary sy_icon" id="store_pages" >Save</button>
        </div>
    </div>
</div>

<script>
 $(document).off('click', '#store_pages').on('click', '#store_pages', function(e){
    var store_page = $('#pages_form');
    e.preventDefault();
    e.stopPropagation();
    let data = $('#pages_form').serializeArray();
    supportAjax({
        url: 'rolePermission/add/pages',
        method: 'post',
        data: data
    },function(resp){
         $('#cModal').modal('hide');
         toastr.success("New page has been added!");
         $('#t_pagestable').KTDatatable().reload();
         //$('.rp_menu.active').trigger('click');
    },function({
        status,
        responseJSON
    }){
        if (status === 422) 
        {
            store_page.find('input[name]').css('border-color', '#ddd');
            $(`input[name]`).siblings(".errorMessage").empty();

            if (!responseJSON.errors) return;
            const messages = [];
            for (const [key, message] of Object.entries(responseJSON.errors)) {
                store_page.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                messages.push(message);
                $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                $(`input[name="${key}"]`).siblings(".errorMessage").append(message);

            }
            toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
        }
    });
 });
</script>

