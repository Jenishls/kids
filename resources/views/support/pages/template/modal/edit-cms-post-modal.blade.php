<style>
    #editImageInput {
        display: none;
    }

    .edit_img_div {
        position: relative;
        width: 500px;
        height: 120px;
        display: flex;

    }

    .editableImage {
        width: 200px;
        height: 120px;
        margin: 0 auto;
        position: absolute;
        /* left: 35%; */

        z-index: 1;
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
    .cat_div{
        margin-top: 10px;
    }
</style>
<div class="modal-dialog" role="document" style="margin-left: 27%;">
    <div class="modal-content modal-830">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Blog</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <form id="editPostForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label" for="property">Title</label>
                            <input class="form-control" type="text" name="title" id="myTitle" value="{{$cms_post->title}}" placeholder="Title">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="edit_img_div">
                            @if($cms_post->file)
                            <img class="editableImage" src="data:image;base64,{{base64_encode(file_get_contents(storage_path('app/blog'.'/'.$cms_post->file->file_name)))}}" style="width: 30%; display:block;" id="blog_output">
                            @else
                            <img class="media_obj" src="media/blog/No_Image_Available.jpg" id="blog_output">
                            @endif
                            <input class="form-control" type="file" name="file" id="editImageInput" onchange="document.getElementById('blog_output').src = window.URL.createObjectURL(this.files[0])">
                            <div id="editPicture">+</div>
                        </div>
                        <div class="form-group label-floating col-md-6 p-0 cat_div">
                            <label class="control-label" for="role">Category</label>
                            
                            
                        </div>
                        <div class="my-3 label-floating" value="textarea">
                            <label class="control-label">Description</label>
                            <textarea class="form-control" type="text" id="postContent" name="content">{!!$cms_post->content!!}</textarea>

                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon " data-id="{{$cms_post->id}}" id="editPost">Update</button>
        </div>
    </div>
</div>

<script>
    $(document).off('click', '#editPost').on('click', '#editPost', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let editPostForm = $('#editPostForm');
        let id = $(this).data('id');
        $.ajax({
            url: '/cms/update/post/' + id,
            method: "POST",
            data: new FormData(document.getElementById('editPostForm')),
            contentType: false,
            processData: false,
            success: function(resp) {

                $("#cModal").modal("hide");
                $('#t_cmsposttable').KTDatatable().reload();
                toastr.success("Updated successfully.");
            },
            error: function({status,
            responseJSON}) {
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
        $('#postContent').summernote({
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

    $(function() {
        $('#editPostCategory').select2({
           width:200,
           allowClear: true,
            ajax : {
                url : '/posts/categories',
                method: 'get',
                processResults: function(data){
                    return {
                        results: data
                    };
                }
            },
        });

    });
    $(document).off('click', '#edit_add_post_category').on('click', '#edit_add_post_category', function(e) {
        // alert('hee');
        e.preventDefault();
        e.stopPropagation();
        $("#cModal").modal("hide");
        showModal({
            url: '/add/postCategory'
        });
    });


    // $(document).ready(function (){
    //     function readURL(input) {
    //         if (input.files && input.files[0]) {
    //             var reader = new FileReader();

    //             reader.onload = function (e) {
    //                 $('#blog_output')
    //                     .attr('src', e.target.result);
    //             };

    //             reader.readAsDataURL(input.files[0]);
    //         }
    //     }
    // });
</script>