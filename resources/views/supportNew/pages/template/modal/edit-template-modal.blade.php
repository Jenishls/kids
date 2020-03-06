<style>
    
    .kt-switch input:checked ~ span:after {
        background-color: #25b9fe;
        color: #ffffff;
    }
</style>
<div class="modal-dialog" role="document" style="margin-left: 30%;" id="">
        <div class="modal-content modal-800">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form id ="editTemplateForm" enctype="multipart/form-data">
                @csrf
                {{-- modal body --}}
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group label-floating col-6">
                            <label class="control-label">Name</label>
                        <input class="form-control" type="text" name="name" value="{{$cms_temp->name}}" id="">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="form-group label-floating col-6">
                            <label class="control-label">Url</label>
                        <input class="form-control" type="text" name="url" id=""value="{{$cms_temp->url}}" placeholder="{{$cms_temp->url}}">
                            <div class="errorMessage"></div>
                        </div>
                        {{-- <div class="form-group label-floating col-4">
                            <label class="control-label">Site Name</label>
                        <input class="form-control" type="text" name="site_name" id=""value="{{$cms_temp->site_name}}" placeholder="{{$cms_temp->site_name}}">
                            <div class="errorMessage"></div>
                        </div> --}}
                        {{-- <div class="form-group label-floating col-1">
                            <label class="control-label">Is Active</label>
                                    <input type="hidden" name="builder[layout][toolbar][display]" @if($cms_temp->is_active === 1)value="true" @else value="false" @endif>
                                    <span class="kt-switch kt-switch--icon-check">
                                        <label>
                                            <input type="checkbox" name="builder[layout][toolbar][display]" @if($cms_temp->is_active === 1)value="true" @else value="false" @endif checked="" style="position:inherit;">
                                            <span style="margin-top: 32px; margin-left: -56px;"></span>
                                        </label>
                                    </span>

                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="form-group label-floating col-6">
                            <label class="control-label">Upload Image</label>
                            <input class="form-control" type="file" name="file" id="editImageInput" onchange="document.getElementById('template_output').src = window.URL.createObjectURL(this.files[0])"><br>
                            {{-- <img class="media_obj" src="media/blog/No_Image_Available.jpg" id="template_output" style="width: 45%;"> --}}
                        </div>
                        <div class="form-group label-floating col-6">
                            <label class="control-label">Site Name</label>
                        <input class="form-control" type="text" value="{{$cms_temp->site_name}}" name="site_name" id="">
                            <div class="errorMessage"></div>
                        </div>
                    </div>
                </div>
                
            </form>
            {{-- footer --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="editCmsTemp"data-name="{{$cms_temp->name}}" data-id="{{$cms_temp->id}}" >Save</button>
            </div>
        </div>
    </div>

<script>
    $(document).off('click', '#editCmsTemp').on('click', '#editCmsTemp', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        let template = $(this).attr('data-name');
        let edit_temp_form = $('#editTemplateForm');
        // let data = $('#editTemplateForm').serializeArray();
        $.ajax({
            url: '/admin/cms/update/template/'+id,
            method:"POST",
            data: new FormData(document.getElementById('editTemplateForm')),
            contentType: false,
            processData: false,
            success: function(resp){
            $('#cModal').modal('hide');
            setTimeout(() => {
                
                $('#kt_body').empty().append(resp);
                toastr.success(`Template ${template} modified.`);
            }, 500);
        },error: function({ status,responseJSON}){
                if (status === 422) 
                {
                    edit_temp_form.find('input[name]').css('border-color', '#ddd');
                    $(`input[name]`).siblings(".errorMessage").empty();
                    if (!responseJSON.errors) return;
                    const messages = [];
                    for (const [key, message] of Object.entries(responseJSON.errors)) {
                        edit_temp_form.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                        messages.push(message);
                        $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                        $(`input[name="${key}"]`).siblings(".errorMessage").append(message);

                    }
                    toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
                }
            }
        });
    });

</script>