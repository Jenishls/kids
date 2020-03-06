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
<div class="modal-dialog" role="document" style="margin-left: 27%;">
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
                        
                        <div class="form-group label-floating col-md-6 p-0">
                            <label class="control-label" for="role">Category</label>
                            <div class="postCategorySelect">
                                <select title="Select a category.." name="category" id="postCategory">
                                </select>
                                <i class="fas fa-plus" id="add_post_category" title="Add category"></i>
                                <div class="errorMessage"></div>
                            </div>

                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label" for="type" style="font-weight:450;">Image</label>

                            <div class="edit_img_div">
                                    <img class="editableImage" src="media/blog/No_Image_Available.jpg" style="width: 30%; display:block;" id="prev_output">
                                    <br>
    
                                <input class="form-control" type="file" name="file" id="editImageInput" onchange="document.getElementById('prev_output').src = window.URL.createObjectURL(this.files[0])" style="border:none; width: 64%; padding: 0.35rem 0.5rem;">
                                {{-- <div id="editPicture">+</div> --}}
                            </div>
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
</div>

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

<script>
    $(document).off('click', '#storePost').on('click', '#storePost', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let template_id = $(this).attr('data-id');
        let addPostForm = $('#addPostForm');
        $.ajax({
            url: '/cms/add/post/'+template_id,
            method: "POST",
            data: new FormData(document.getElementById('addPostForm')),
            contentType: false,
            processData: false,
            success: function(resp) {
                $("#cModal").modal("hide");
                
                toastr.success("Added successfully.");
                $('#t_cmsposttable').KTDatatable().reload();
            },
            error: function({
                status,
                responseJSON
            }) {
                if (status === 422) {
                    addPostForm.find('input[name]').css('border-color', '#ddd');
                    $(`input[name]`).siblings(".errorMessage").empty();

                    if (!responseJSON.errors) return;
                    const messages = [];
                    for (const [key, message] of Object.entries(responseJSON.errors)) {
                        addPostForm.find(`input[name = "${key}"]`).css('border-color', '#F44336');
                        addPostForm.find(`select[name = "${key}"]`).css('border-color', '#F44336');
                        addPostForm.find(`textarea[name = "${key}"]`).css('border-color', '#F44336');

                        messages.push(message);
                        $(`input[name="${key}"]`).siblings(".errorMessage").empty().append(message);

                        $(`select[name="${key}"]`).siblings(".errorMessage").empty().append(message);

                        $(`textarea[name="${key}"]`).siblings(".errorMessage").empty().append(message);


                    }
                    toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
                }
            }
        });
    });



    $(document).ready(function() {
        $('#postDescription').summernote({
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

    $(function() {
        $('#postCategory').select2({
            livesearch: true,
            width: 200,
            placeholder: 'Select a category',
            allowClear: true,
            ajax: {
                url: '/posts/categories',
                method: 'get',
                processResults: function(data) {
                    return {
                        results: data
                    };
                }
            },
        });

    });

    $(document).off('click', '#add_post_category').on('click', '#add_post_category', function(e) {
        // alert('hee');
        e.preventDefault();
        e.stopPropagation();
        $("#cModal").modal("hide");
        showModal({
            url: '/add/postCategory'
        });
    });
</script>

