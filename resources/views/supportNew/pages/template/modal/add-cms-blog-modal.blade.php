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
                <h5 class="modal-title" id="exampleModalLabel">Add Blog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <form id="addBlogForm">
                            @csrf
                            <div class="form-group label-floating">
                                <label class="control-label" for="property">Title</label>
                                <input class="form-control" type="text" name="title" id="myTitle" placeholder="Title">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating my-3" value="textarea">
                                <label class="control-label" for="desc" style="font-weight:450;font-size:14px;">Description</label>
                                <textarea class="form-control" type="text" id="blogDescription" name="description"></textarea>
                                <div class="errorMessage"></div>
    
                            </div>
                            
                            <div class="form-group label-floating col-md-6 p-0">
                                <label class="control-label" for="role">Category</label>
                                <div class="blogCategorySelect">
                                    <select title="Select a category.." name="category" id="blogCategory">
                                    </select>
                                    <i class="fas fa-plus" id="add_blog_category" title="Add category"></i>
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
                <button type="button" class="btn btn-primary sy_icon " data-id="" id="storeBlog">Create</button>
            </div>
        </div>
    </div>
    
    