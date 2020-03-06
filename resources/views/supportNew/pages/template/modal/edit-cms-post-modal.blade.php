<style>
    #editImageInput {
        /* display: none; */
    }

    .edit_img_div {
        position: relative;
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
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
        <div class="col-lg-12">	
            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Edit {{ucwords($post->title)}}</h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a class="btn btn-clean kt-margin-r-10 view_sections_element" data-route="/admin/cms/view/posts/{{$post->component_id}}" style="border:1px solid #fbce44; border-radius:19px;">
                            <i class="la la-arrow-left"></i>
                            <span class="kt-hidden-mobile">Back</span>
                        </a>
                        
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <form id="editPostForm">
                        @csrf
                        <div class="row">
                            <div class="form-group label-floating col-8">
                                <label type="text" class="control-label" for="title" style="font-weight:450;font-size:14px;">Title</label>
                                <input class="form-control select_component_name" name="title" style="text-transform:capitalize;" data-inputName="Title" title="Post Title" required placeholder="Title" value="{{$post->title}}">
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
                                <input class="form-control" type="number" name="seq_no" id="seq_no" placeholder="Sequence Number" value="{{$post->seq_no}}">
                                <div class="errorMessage"></div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-12">
                                <label class="control-label" for="sub_title" style="font-weight:450;font-size:14px;">Sub Title</label>
                                <input class="form-control" value="{{ $post->sub_title}}" type="text" name="sub_title" id="sub_title" placeholder="Sub Title" >
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-12">
                                <label type="text" class="control-label" for="highlight" style="font-weight:450;font-size:14px;">Highlight</label>
                                 <textarea class="form-control" name="highlight" style="text-transform:capitalize;" data-inputName="Title" title="Highlight" placeholder="Highlight" value="{{$post->highlight}}">{{$post->highlight}}</textarea>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-12">
                                <label type="text" class="control-label" for="short_description" style="font-weight:450;font-size:14px;">Short Description</label>
                                <textarea class="form-control" name="short_description" style="text-transform:capitalize;" data-inputName="Title" title="Short Description" placeholder="Short Description" rows="8" value="{{$post->short_description}}">{{$post->short_description}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-12">
                                <label class="control-label" for="description" style="font-weight:450;font-size:14px;">Description</label>
                                <textarea class="form-control" name="description" id="postDescription" placeholder="Sequence Number" value="{{$post->description}}">{{$post->description}}</textarea>
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-12">
                                <label class="control-label" for="content" style="font-weight:450;font-size:14px;">Content</label>
                                <textarea class="form-control" name="content" id="postContent" placeholder="Content" value="{{$post->content}}">{{$post->content}}</textarea>
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-6">
                                <label type="text" class="control-label" for="image" style="font-weight:450;font-size:14px;">Image</label>

                                <div class="edit_img_div" style="width:100% !important;">
                                        @if($post->file)
                                        <img class="editableImage" src="data:image;base64,{{base64_encode(file_get_contents(storage_path('CMS/post'.'/'.$post->file->file_name)))}}" style="width: 30%; display:block;" id="blog_output">
                                        @else
                                        <img class="editableImage" src="media/blog/No_Image_Available.jpg" style="width: 30%; display:block; height: 108px;" id="prev_output">
                                        <br>
                                        @endif
        
                                    <input class="form-control" type="file" name="file" id="editImageInput" onchange="document.getElementById('prev_output').src = window.URL.createObjectURL(this.files[0])" style="border: 1px solid #e2e5ec; padding: 0.35rem 0.5rem;">
                                    
                                </div>
                            </div>
                            <div class="form-group label-floating col-6">
                                    <span data-toggle="tooltip" data-placement="right" title="If your post has video links paste URL to the video." >
                                        <label class="control-label" for="link_url" style="font-weight:450;font-size:14px;">Link/Url</label>
                                        <span>
                                            <i class="fa fa-question" style="font-size: 11px;"></i>
                                        </span>
                                    </span>
                                    
                                    <input class="form-control" type="text" name="link_url" id="link_url" placeholder="Link Url" value="{{$post->link_url}}">
                                    <div class="errorMessage"></div>
                                </div>
                            {{-- <div class="col-12">
                                <div class="dropzone dropzone-default dropzone-brand dz-clickable" id="kt_dropzone_2">
                                    <div class="dropzone-msg dz-message needsclick">
                                        <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                        <span class="dropzone-msg-desc">Upload up to 10 files</span>
                                    </div>
                                </div>
                            </div> --}}
                            
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary x view_sections_element" data-route="/admin/cms/view/posts/{{$post->component_id}}">Close</button>
                <button type="button" class="btn btn-primary sy_icon" data-id="{{$post->id}}" id="editPost">Update</button>
            </div>	
            <!--end::Portlet-->
        </div>
    </div>	
</div>

<script>
    $(document).off('click', '#editPost').on('click', '#editPost', function(e) {
        $('#kt_body').css('display', 'none');
        KTApp.block('body', {
            overlayColor: '#000000',
            type: 'v2',
            state: 'success',
            size: 'lg'
        });
        e.preventDefault();
        e.stopPropagation();
        let editPostForm = $('#editPostForm');
        let id = $(this).data('id');
        $.ajax({
            url: '/admin/cms/update/post/' + id,
            method: "POST",
            data: new FormData(document.getElementById('editPostForm')),
            contentType: false,
            processData: false,
            success: function(resp) {
                setTimeout(function() {
                    KTApp.unblock('body');
                    $('#kt_body').css('display', 'block');
                    $('#cmsElContainer').empty().append(resp);
                    toastr.success("Updated successfully.");
                }, 2000);
            },
            error: function({status,
            responseJSON}) {
                KTApp.unblock('body');
                $('#kt_body').css('display', 'block');
                if (status === 422) {
                    editPostForm.find('input[name]').css('border-color', '#ddd');
                    $(`input[name]`).siblings(".errorMessage").empty();

                    if (!responseJSON.errors) return;
                    const messages = [];
                    for (const [key, message] of Object.entries(responseJSON.errors)) {
                        editPostForm.find(`input[name = "${key}"]`).css('border-color', '#F44336');
                        messages.push(message);
                        $(`input[name="${key}"]`).siblings(".errorMessage").empty().append(message);

                    }
                    toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
                }
            }
        });
    });



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

    
    $(document).off('click', '#editPicture').on('click', '#editPicture', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('#editImageInput').trigger('click').show();
        // $(this).hide();
        $('#editImageInput').hide();
        // $('.editableImage').hide();

    });
    $('.posttype_select').selectpicker({
        liveSearch: true,
        showTick: true,
        actionsBox: true,
        doneButton : true, 
        doneButtonText : "Apply"
    });
    // Dropzone
    // Dropzone.options.kDropzoneTwo = {
    //         paramName: "file", // The name that will be used to transfer the file
    //         maxFiles: 10,
    //         maxFilesize: 10, // MB
    //         addRemoveLinks: true,
    //         accept: function(file, done) {
    //             if (file.name == "justinbieber.jpg") {
    //                 done("Naha, you don't.");
    //             } else { 
    //                 done(); 
    //             }
    //         }   
    //     };
</script>