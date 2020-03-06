
<div class="modal-dialog" role="document" style="" id="">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Page</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form id ="edit_cms_page_form">
            {{-- modal body --}}
            <div class="modal-body"  style="">
                <div class="row">
                    <div class="col form-group label-floating">
                        <label class="control-label">Page Name</label>
                        <input class="form-control" id="" name="page_name" value="{{$cms_page->page_name}}">
                        <div class="errorMessage"></div>
                        </div>
                    <div class="col form-group label-floating">
                        <label class="control-label">Page Code</label>
                        <input class="form-control" id="" name="page_code" value="{{$cms_page->page_code}}">
                        <div class="errorMessage"></div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col form-group label-floating">
                        <label class="control-label">Template</label>
                        <select class="form-control" id="tempalte_id" name="template_id">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                    <div class="col form-group label-floating">
                        <label class="control-label">Target</label>
                        <input class="form-control" id="" name="target" value="{{$cms_page->target}}">
                        <div class="errorMessage"></div>

                    </div>
                </div>
                <div class="row">
                    <div class="col form-group label-floating">
                        <label class="control-label">Content</label>
                    <textarea rows="4" cols="50" placeholder="" name="content" class="form-control" value="content">{{{strip_tags($cms_page->content)}}}</textarea>
                    </div>
                </div>
            </div>
            
        </form>
        {{-- footer --}}
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-id="{{$cms_page->id}}" id="editCmsPage" >Save</button>
            </div>
    </div>
</div>



<script>
    $(document).off('click', '#editCmsPage').on('click', '#editCmsPage', function(e){
        e.preventDefault();
        let edit_cms_page = $('#edit_cms_page_form');
        let data = $('#edit_cms_page_form').serializeArray();
        let id = $(this).attr('data-id');
        supportAjax({
            url: '/cms/update/page/'+id,
            method:"POST",
            data: data,
        },function(resp){
            $('#cModal').modal('hide');
            $('#t_cmspagestable').KTDatatable().reload();
            toastr.success('New page added.');
        },function({ status,responseJSON}){
            if (status === 422) 
            {
                edit_cms_page.find('input[name]').css('border-color', '#ddd');
                $(`input[name]`).siblings(".errorMessage").empty();
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    edit_cms_page.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`input[name="${key}"]`).siblings(".errorMessage").append(message);

                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        });
    });

</script>