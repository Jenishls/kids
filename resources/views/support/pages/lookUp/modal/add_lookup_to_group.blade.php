<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <?php $g = explode('_', $group);
            $name= '';
            foreach($g as $t){
                $name.=$t.' ';
            }
        ?>
            <h5 class="modal-title" id="exampleModalLabel">Add New {{ucfirst($name)}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <form id ="add_lookup_form">
                        @csrf
                        <div class="form-group label-floating repeatThisRow" style="margin-top:10px;">
                            <label class="control-label" for="lookup_value">Value</label>
                            <input class="form-control" id="lookup_value" name="value" data-inputName="value" placeholder="lookup value">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="form-group label-floating repeatThisRow" style="margin-top:10px;">
                            <label class="control-label" for="description">Description</label>
                            <br>
                            <textarea class="form-control" type="text" name="description" id="lookup_section_description" placeholder="Write description." autocomplete="off"></textarea>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" data-code="{{$group}}" data-id="{{$id}}" id="add_lookup" >Save</button>
        </div>
    </div>
</div>

<script>
 $(document).off('click', '#add_lookup').on('click', '#add_lookup', function(e){
    e.preventDefault();
    e.stopPropagation();
    let table = $('.tableloader').attr('id');
    let form_data = $('#add_lookup_form').serializeArray();
    let code = $(this).attr('data-code');
    let section_id = $(this).attr('data-id');
    let data = form_data.concat({'name':'section_id', 'value':section_id}, {'name':'code', 'value':code});
    supportAjax({
        url: '/lookup/newLookup',
        method: 'post',
        data: data
    },function(resp){
         $('#cModal').modal('hide');
         toastr.success("New lookup added successfully");
         $(`#${table}`).KTDatatable().reload();
    },function(err){
        /*errorHandler({
            fields: ['value']
        }, error);*/
        toastr.error(err.responseJSON.message);
    })
 });
</script>