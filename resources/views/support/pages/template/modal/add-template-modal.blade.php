<style>
    
    .kt-switch input:checked ~ span:after {
        background-color: #25b9fe;
        color: #ffffff;
    }
</style>
<div class="modal-dialog" role="document" style="margin-left: 20%;" id="">
        <div class="modal-content modal-1200">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form id ="addTemplateForm">
                {{-- modal body --}}
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group label-floating col-3">
                            <label class="control-label">Name</label>
                            <input class="form-control" type="text" name="name" id="">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="form-group label-floating col-4">
                            <label class="control-label">Url</label>
                            <input class="form-control" type="text" name="url" id="">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="form-group label-floating col-4">
                            <label class="control-label">Site Name</label>
                            <input class="form-control" type="text" name="site_name" id="">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="form-group label-floating col-1">
                            <label class="control-label">Is Active</label>
                            <input type="hidden" name="builder[layout][toolbar][display]" value="false">
                            <span class="kt-switch kt-switch--icon-check">
                                <label>
                                    <input type="checkbox" name="builder[layout][toolbar][display]" value="true" checked="" style="position:inherit;">
                                    <span style="margin-top: 32px; margin-left: -56px;"></span>
                                </label>
                            </span>
                        </div>
                    </div>
                    
                </div>
                
            </form>
            {{-- footer --}}
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addCmsTemp" >Save</button>
                </div>
        </div>
    </div>

<script>
    $(document).off('click', '#addCmsTemp').on('click', '#addCmsTemp', function(e){
        e.preventDefault();
        let add_temp_form = $("#addTemplateForm");
        let data = $('#addTemplateForm').serializeArray();
        supportAjax({
            url: '/cms/add/template',
            method:"POST",
            data: data,
        },function(resp){
            $('#cModal').modal('hide');
            $('#kt_body').empty().append(resp);
            toastr.success('New template added.');
        },function({ status,responseJSON}){
            if (status === 422) 
            {
                add_temp_form.find('input[name]').css('border-color', '#ddd');
                $(`input[name]`).siblings(".errorMessage").empty();
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    add_temp_form.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`input[name="${key}"]`).siblings(".errorMessage").append(message);

                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        });
    });

</script>