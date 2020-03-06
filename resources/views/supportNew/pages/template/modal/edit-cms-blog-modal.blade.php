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
                    <form id="editBlogForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label" for="property">Title</label>
                            <input class="form-control" type="text" name="title" id="myTitle" value="{{$blog->title}}" placeholder="Title">
                        </div>
                        <div class="edit_img_div">
                            @if($blog->file)
                            <img class="editableImage" src="data:image;base64,{{base64_encode(file_get_contents(storage_path('app/blog'.'/'.$blog->file->file_name)))}}" style="width: 30%; display:block;" id="blog_output">
                            @else
                            <img class="media_obj" src="media/blog/No_Image_Available.jpg" id="blog_output">
                            @endif
                            <input class="form-control" type="file" name="file" id="editImageInput" onchange="document.getElementById('blog_output').src = window.URL.createObjectURL(this.files[0])">
                            <div id="editPicture">+</div>
                        </div>
                        <div class="form-group label-floating col-md-6 p-0 cat_div">
                            <label class="control-label" for="role">Category</label>
                            <div class="blogCategorySelect">
                                <select title="Select a category.." value="{{ucwords($blog->category->category)}}" name="category" id="editBlogCategory">
                                <option  value="{{ucwords($blog->category->id)}}">{{ucwords($blog->category->category)}}</option>
                                </select>
                                <i class="fas fa-plus" id="edit_add_blog_category"></i>
                                <div class="errorMessage"></div>
                            </div>
                            
                        </div>
                        <div class="my-3 label-floating" value="textarea">
                            <label class="control-label">Description</label>
                            <textarea class="form-control" type="text" id="blogDescription" name="description">{!!$blog->description!!}</textarea>

                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon " data-id="{{$blog->id}}" id="editBlog">Update</button>
        </div>
    </div>
</div>
    
<script>
    $(document).off('click', '#editBlog').on('click', '#editBlog', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let id = $(this).data('id');
        $.ajax({
            url: '/admin/edit/blog/' + id,
            method: "POST",
            data: new FormData(document.getElementById('editBlogForm')),
            contentType: false,
            processData: false,
            success: function(resp) {

                $('#kt_body').empty().append(resp);
                $("#cModal").modal("hide");

                toastr.success("Updated successfully.");
            },
            error: function(err) {
                // console.warning(err)
            }
        });
    });



    $(document).ready(function() {
        $('#blogDescription').summernote({
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
        $('#editBlogCategory').select2({
            width:200,
            allowClear: true,
            ajax : {
                url : '/blogs/categories',
                method: 'get',
                processResults: function(data){
                    return {
                        results: data
                    };
                }
            },
        });

    });
    $(document).off('click', '#edit_add_blog_category').on('click', '#edit_add_blog_category', function(e) {
        // alert('hee');
        e.preventDefault();
        e.stopPropagation();
        $("#cModal").modal("hide");
        showModal({
            url: '/add/blogCategory'
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