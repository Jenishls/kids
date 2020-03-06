
<div class="modal-dialog" role="document" style="" id="">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Page</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form id ="add_cms_page_form">
            {{-- modal body --}}
            <div class="modal-body">
                <div class="row">
                    <div class="col form-group label-floating">
                        <label class="control-label">SEO Page Name</label>
                        <input class="form-control" id="" name="page_name" value="">
                        <div class="errorMessage"></div>

                    </div>
                    <div class="col-6 form-group label-floating">
                        <label class="control-label">SEO Page Title</label>
                        <input class="form-control" id="" name="site_title" value="">
                        <div class="errorMessage"></div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-6 form-group label-floating">
                        <span data-toggle="tooltip" data-placement="right" title="Keyword is used for page search in search engine so you need to keep comma separator in each keyword." >
                            <label class="control-label" style="cursor:pointer;">SEO Page Keyword</label>
                            <span>
                                <i class="fa fa-question" style="font-size: 11px;"></i>
                            </span>
                        </span>
                        <input class="form-control" id="" name="site_keyword" value="">
                        <div class="errorMessage"></div>
                    </div>
                    <div class="col form-group label-floating">
                        <label class="control-label">SEO Page Description</label>
                        <textarea class="form-control rounded-0" name="site_description" id="exampleFormControlTextarea2" rows="1"></textarea>
                    </div>
                </div>
            </div>
            
        </form>
        {{-- footer --}}
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="addCmsPage" data-id="{{$template->id}}" >Save</button>
            </div>
    </div>
</div>


<script>
    $(document).off('click', '#addCmsPage').on('click', '#addCmsPage', function(e){
        e.preventDefault();
        let add_cms_page = $('#add_cms_page_form');
        let data = $('#add_cms_page_form').serializeArray();
        let id = $(this).attr('data-id');
        supportAjax({
            url: '/admin/cms/add/page/'+id,
            method:"POST",
            data: data,
        },function(resp){
            $('#cModal').modal('hide');
            // $('#t_cmspagestable').KTDatatable().reload();
            supportAjax({
                url: '/admin/cms/'+id,
            }, function(response){
                $('#kt_body').empty().append(response);
            });
            toastr.success('New page added.');
        },function({ status,responseJSON}){
            if (status === 422) 
            {
                add_cms_page.find('input[name]').css('border-color', '#ddd');
                $(`input[name]`).siblings(".errorMessage").empty();
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    add_cms_page.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`input[name="${key}"]`).siblings(".errorMessage").append(message);

                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        });
    });

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>