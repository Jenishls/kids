<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Blog Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <form id="addBlogCategoryForm">
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label" for="property">Category</label>
                            <input class="form-control" type="text" name="category" id="myTitle" placeholder="Category">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon " data-id="" id="storeBlogCategory">Create</button>
        </div>
    </div>
</div>

<script>
    $(document).off('click', '#storeBlogCategory').on('click', '#storeBlogCategory', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let data = $('#addBlogCategoryForm').serializeArray();
        $.ajax({
            url: '/admin/store/blogCategory',
            method: "post",
            data,
            success: function(resp) {
                $("#cModal").modal("hide");
                showModal({
                    url: '/admin/add/blog'
                });
                toastr.success("Category added successfully.");
            },
            error: function(err) {
                showModal({
                    url: '/admin/add/blog'
                });
                console.log(err)
            }
        });
    });
</script>