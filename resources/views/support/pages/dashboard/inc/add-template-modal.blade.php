<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Template</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            
            <div class="row">
                <div class="col">
                    <form id ="addTempForm">
                        @csrf
                        <div class="form-group label-floating">
                                <label class="control-label" for="temp_name">Template Name</label>
                                <input class="form-control" type="text" name="temp_name" id="temp_name" placeholder="Template Name">
                                <div class="errorMessage"></div>
                        </div>
                        <div class="form-group label-floating repeatThisRow" style="margin-top:10px;">
                            <label class="control-label" for="folder">Folder Name</label>
                            <input class="form-control" id="folder" name="folder" placeholder="Folder Name">
                        </div>
                        
                         <div class="form-group label-floating repeatThisRow" style="margin-top:10px;">
                            <label class="control-label" for="site_name">Site Name</label>
                            <input class="form-control" id="site_name" name="site_name" placeholder="Site Name">
                        </div>
                        <div class="form-group label-floating repeatThisRow" style="margin-top:10px;">
                            <label class="control-label" for="">Add Preview Image</label>
                            <img class="" src="media/blog/No_Image_Available.jpg" style="width: 30%; display:block;" id="new_prev_output">
                            <input class="form-control" type="file" name="file" id="" onchange="document.getElementById('new_prev_output').src = window.URL.createObjectURL(this.files[0])" style="border:none; width: 64%; padding: 0.35rem 0.5rem; margin-top: 16px;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="store_template" >Save</button>
        </div>
    </div>
</div>

<script>
 $(document).off('click', '#store_template').on('click', '#store_template', function(e){
    var store_page = $('#addTempForm');
    e.preventDefault();
    e.stopPropagation();
    let data = $('#addTempForm').serializeArray();
    supportAjax({
        url: '/addNewTemplate',
        method: 'post',
        data: data
    },function(resp){
         $('#cModal').modal('hide');
         toastr.success("New template has been added!");
        //  $('#t_pagestable').KTDatatable().reload();
         //$('.rp_menu.active').trigger('click');
    },function(err){
        // console.log(err.responseJSON.message);
        // if (status === 422) 
        // {
        //     store_page.find('input[name]').css('border-color', '#ddd');
        //     $(`input[name]`).siblings(".errorMessage").empty();

        //     if (!responseJSON.errors) return;
        //     const messages = [];
        //     for (const [key, message] of Object.entries(responseJSON.errors)) {
        //         store_page.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
        //         messages.push(message);
        //         $(`input[name="${key}"]`).siblings(".errorMessage").empty();
        //         $(`input[name="${key}"]`).siblings(".errorMessage").append(message);

        //     }
        //     toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
        // }
        $('#cModal').modal('hide');
        toastr.error(err.responseJSON.message);
    });
 });
</script>

