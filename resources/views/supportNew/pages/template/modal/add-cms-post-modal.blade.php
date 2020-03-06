<style>
    #editImageInput {
        /* display: none; */
    }

    .edit_img_div {
        position: relative;
        width: 500px;
        height: 160px;
        display: flex;

    }

    .editableImage {
        width: 200px;
        height: 120px;
        margin: 0 auto;
        position: absolute;
        /* left: 35%; */

        z-index: 1;
        margin-top: 49px;
    }

    #editPicture {
        padding-top: 20px;
        display: none;
        font-size: 50px;
        color: white;
        height: 100%;
        width: 150px;
        position: absolute;
        /* left: 35%; */
        text-align: center;
        z-index: 5;
        /* top: 20px; */
        cursor: pointer;
        background: rgba(0, 0, 0, 0.5);

    }

    .edit_img_div:hover #editPicture {
        display: block;
    }
</style>
{{-- post modal --}}
{{-- <div class="modal-dialog" role="document" style="margin-left: 27%;">
    <div class="modal-content modal-830" >
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <form id="addPostForm">
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label" for="property">Title</label>
                            <input class="form-control" type="text" name="title" id="postTitle" placeholder="Title">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="form-group label-floating my-3" value="textarea">
                            <label class="control-label" for="postDescription" style="font-weight:450;font-size:14px;">Description</label>
                            <textarea class="form-control" type="text" id="postDescription" name="content"></textarea>
                            <div class="errorMessage"></div>

                        </div>

                        

                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary sy_icon " data-id="{{$template->id}}" id="storePost">Create</button>
        </div>
    </div>
</div> --}}

{{-- <form id="addPostForm">
        @csrf
        <div class="form-group label-floating">
            <label class="control-label" for="property">Title</label>
            <input class="form-control" type="text" name="title" id="myTitle" placeholder="Title">
            <div class="errorMessage"></div>
        </div>
        <div class="form-group label-floating">
            <label class="control-label" for="type" style="font-weight:450;">Image</label>
            <input class="form-control" type="file" name="file" id="postImage">
            <div class="errorMessage"></div>
        </div>
        <div class="form-group label-floating col-md-6 p-0">
            <label class="control-label" for="role">Category</label>
            <div class="postCategorySelect">
                <select title="Select a category.." name="category" id="postCategory">
                </select>
                <i class="fas fa-plus" id="add_post_category" title="Add category"></i>
                <div class="errorMessage"></div>
            </div>

        </div>

        <div class="class=" form-group label-floating my-3" value="textarea">
            <label class="control-label" for="desc" style="font-weight:450;font-size:14px;">Description</label>
            <textarea class="form-control" type="text" id="postDescription" name="description"></textarea>
            <div class="errorMessage"></div>

        </div>

    </form> --}}


    {{-- add category modal --}}
    {{-- <div class="modal-dialog" role="document" style="margin-top:1.5rem;margin-left: 28%;" id="add_postt_modal">
        <div class="modal-content modal-1000" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <form id="addPostForm">
                            @csrf
                            <div class="row">
                                <div class="form-group label-floating col-6">
                                    <label type="text" class="control-label" for="title" style="font-weight:450;font-size:14px;">Title</label>
                                    <input class="form-control select_component_name" name="title" style="text-transform:capitalize;" data-inputName="Title" title="Post Title" required placeholder="Title">
                                </div>
                                <div class="form-group label-floating col-6">
                                    <label class="control-label" for="sub_title" style="font-weight:450;font-size:14px;">Sub Title</label>
                                    <input class="form-control" type="text" name="sub_title" id="sub_title" placeholder="Sub Title">
                                    <div class="errorMessage"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group label-floating col-6">
                                    <label type="text" class="control-label" for="highlight" style="font-weight:450;font-size:14px;">Highlight</label>
                                    <input class="form-control select_component_name" name="highlight" style="text-transform:capitalize;" data-inputName="Title" title="Highlight" placeholder="Highlight">
                                </div>
                                <div class="form-group label-floating col-6">
                                    <label class="control-label" for="seq_no" style="font-weight:450;font-size:14px;">Sequence No.</label>
                                    <input class="form-control" type="number" name="seq_no" id="seq_no" placeholder="Sequence Number">
                                    <div class="errorMessage"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group label-floating col-6">
                                    <label type="text" class="control-label" for="image" style="font-weight:450;font-size:14px;">Image</label>

                                    <div class="edit_img_div">
                                            <img class="editableImage" src="media/blog/No_Image_Available.jpg" style="width: 30%; display:block; height: 108px;" id="prev_output">
                                            <br>
            
                                        <input class="form-control" type="file" name="file" id="editImageInput" onchange="document.getElementById('prev_output').src = window.URL.createObjectURL(this.files[0])" style="border: 1px solid #e2e5ec; width: 92%; padding: 0.35rem 0.5rem;">
                                    </div>
                                </div>
                                <div class="form-group label-floating col-6">
                                    <label type="text" class="control-label" for="short_description" style="font-weight:450;font-size:14px;">Short Description</label>
                                    <textarea class="form-control" name="short_description" style="text-transform:capitalize;" data-inputName="Title" title="Short Description" placeholder="Short Description" rows="8"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group label-floating col-6">
                                    <label class="control-label" for="description" style="font-weight:450;font-size:14px;">Description</label>
                                    <textarea class="form-control" name="description" id="postDescription" placeholder="Sequence Number"></textarea>
                                    <div class="errorMessage"></div>
                                </div>
                                <div class="form-group label-floating col-6">
                                    <label class="control-label" for="content" style="font-weight:450;font-size:14px;">Content</label>
                                    <textarea class="form-control" name="content" id="postContent" placeholder="Content"></textarea>
                                    <div class="errorMessage"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon " data-id="{{$component->id}}" id="storePost">Create</button>
            </div>
        </div>
    </div> --}}



<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
        <div class="col-lg-12">	
            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Add New Post ({{ucwords($component->name)}})</h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a class="btn btn-clean kt-margin-r-10 view_sections_element" data-route="/admin/cms/view/posts/{{$component->id}}" style="border:1px solid #fbce44; border-radius:19px;">
                            <i class="la la-arrow-left"></i>
                            <span class="kt-hidden-mobile">Back</span>
                        </a>
                        
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <form id="addPostForm">
                            @csrf
                            <div class="row">
                                <div class="form-group label-floating col-8">
                                    <label type="text" class="control-label" for="title" style="font-weight:450;font-size:14px;">Title</label>
                                    <input class="form-control select_component_name" name="title" style="" data-inputName="Title" title="Post Title" required placeholder="Title">
                                    <div class="errorMessage"></div>
                                </div>
                                <div class="form-group label-floating col-2">
                                    <span data-toggle="tooltip" data-placement="right" title="If your post contains image, select Image. Same applies for video audio and text type of posts as well." >
                                        <label class="control-label" for="post_type" style="font-weight:450;font-size:14px;">Type</label>
                                        <span>
                                            <i class="fa fa-question" style="font-size: 11px;"></i>
                                        </span>
                                    </span>
                                    <select class="form-control posttype_select" id="post_type" name="type">
                                        <option value="" >Select post type</option>
                                        <option value="text">Text/Document</option>
                                        <option value="image">Image</option>
                                        <option value="video">Audio</option>
                                        <option value="audio">Video</option>
                                    </select>
                                </div>
                                <div class="form-group label-floating col-2">
                                    <label class="control-label" for="seq_no" style="font-weight:450;font-size:14px;">Sequence No.</label>
                                    <input class="form-control" type="number" name="seq_no" id="seq_no" placeholder="Sequence Number">
                                    <div class="errorMessage"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group label-floating col-12">
                                    <label class="control-label" for="sub_title" style="font-weight:450;font-size:14px;">Sub Title</label>
                                    <input class="form-control" type="text" name="sub_title" id="sub_title" placeholder="Sub Title">
                                    <div class="errorMessage"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group label-floating col-12">
                                    <label type="text" class="control-label" for="highlight" style="font-weight:450;font-size:14px;">Highlight</label>
                                   <textarea class="form-control" name="highlight" id="postHighlight" placeholder="Highlight"></textarea>
                                </div>
                                
                            </div>

                            <div class="row">
                                 <div class="form-group label-floating col-12">
                                    <label type="text" class="control-label" for="short_description" style="font-weight:450;font-size:14px;">Short Description</label>
                                    <textarea class="form-control" name="short_description" style="text-transform:capitalize;" data-inputName="Title" title="Short Description" placeholder="Short Description" rows="8"></textarea>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group label-floating col-12">
                                    <label class="control-label" for="description" style="font-weight:450;font-size:14px;">Description</label>
                                    <textarea class="form-control" name="description" id="postDescription" placeholder="Sequence Number"></textarea>
                                    <div class="errorMessage"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group label-floating col-12">
                                    <label class="control-label" for="content" style="font-weight:450;font-size:14px;">Content</label>
                                    <textarea class="form-control" name="content" id="postContent" placeholder="Content"></textarea>
                                    <div class="errorMessage"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group label-floating col-6">
                                    <label type="text" class="control-label" for="image" style="font-weight:450;font-size:14px;">Image</label>

                                    <div class="edit_img_div" style="width:100% !important;">
                                            <img class="editableImage" src="media/blog/No_Image_Available.jpg" style="width: 30%; display:block; height: 108px;" id="prev_output">
                                            <br>
            
                                        <input class="form-control" type="file" name="file" id="editImageInput" onchange="document.getElementById('prev_output').src = window.URL.createObjectURL(this.files[0])" style="border: 1px solid #e2e5ec; padding: 0.35rem 0.5rem;">
                                        {{-- <div id="editPicture">+</div> --}}
                                    </div>
                                </div>
                                <div class="form-group label-floating col-6">
                                    <span data-toggle="tooltip" data-placement="right" title="If your post has video links paste URL to the video." >
                                        <label class="control-label" for="link_url" style="font-weight:450;font-size:14px;">Link/Url</label>
                                        <span>
                                            <i class="fa fa-question" style="font-size: 11px;"></i>
                                        </span>
                                    </span>
                                    
                                    <input class="form-control" type="text" name="link_url" id="link_url" placeholder="Link Url">
                                    <div class="errorMessage"></div>
                                </div>
                            </div>
                        </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary x view_sections_element" data-route="/admin/cms/view/posts/{{$component->id}}">Close</button>
                <button type="button" class="btn btn-primary sy_icon " data-id="{{$component->id}}" id="storePost">Create</button>
            </div>	
            <!--end::Portlet-->
        </div>
    </div>	
</div>


<script>
    $('.posttype_select').selectpicker({
        liveSearch: true,
        showTick: true,
        actionsBox: true,
        doneButton : true, 
        doneButtonText : "Apply"
    });
    // summernote
    $(document).ready(function() {
        $('#postDescription, #postContent').summernote({
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview']],
            ],
            dialogsInBody: true,
            dialogsFade: true,
        });
        $('.note-editing-area').css('z-index', '-1');
    });


    $(document).off('click', '#storePost').on('click', '#storePost', function(e){
        $('#kt_body').css('display', 'none');
        KTApp.block('body', {
            overlayColor: '#000000',
            type: 'v2',
            state: 'success',
            size: 'lg'
        });
        e.preventDefault();
        let form = $('#addPostForm');
        let component_id = $(this).attr('data-id');
        $.ajax({
        url: '/admin/cms/add/post/'+component_id,
        method: 'POST',
        data: new FormData(document.getElementById('addPostForm')),
        contentType: false,
        processData: false,
        success: function(response){
            setTimeout(function() {
                KTApp.unblock('body');
                $('#kt_body').css('display', 'block');
                $('#cmsElContainer').empty().append(response);
                toastr.success('Successfully added.');
            }, 2000);
        }, 
        error:function({status, responseJSON})
        {
            KTApp.unblock('body');
            $('#kt_body').css('display', 'block');
            if(status===422){
                form.find('input[name], select[name]').css('border-color', '#ddd');
                $(`input[name]`).siblings(".errorMessage").empty();
                $(`select[name]`).siblings(".errorMessage").empty();

                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    form.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    form.find(`select[name = "${ key }"]`).siblings('button').css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty().append(message);

                    $(`select[name="${key}"]`).siblings(".errorMessage").empty().append(message);
                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        }
    });
    });
</script>

