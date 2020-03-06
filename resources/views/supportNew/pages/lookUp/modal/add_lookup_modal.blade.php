<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Lookup For {{ucfirst($section->section)}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <form id ="add_lookup_form">
                        @csrf
                        <div class="form-group label-floating">
                                <label class="control-label" for="lookup_code">Code</label>
                                <input class="form-control" type="text" name="code" id="lookup_code" placeholder="lookup code">
                                <div class="errorMessage"></div>
                        </div>
                        <div class="form-group label-floating repeatThisRow" style="margin-top:10px;">
                            <label class="control-label" for="lookup_value">Value</label>
                            <input class="form-control" id="lookup_value" name="value" placeholder="lookup value">
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
            <button type="button" class="btn btn-primary sy_icon" data-id="{{$section->id}}" id="add_lookup" >Save</button>
        </div>
    </div>
</div>

<script>
 $(document).off('click', '#add_lookup').on('click', '#add_lookup', function(e){
    e.preventDefault();
    e.stopPropagation();
    let add_look_up = $('#add_lookup_form');
    let table = $('.tableloader').attr('id');
    let form_data = $('#add_lookup_form').serializeArray();
    let section_id = $(this).attr('data-id');
    let data = form_data.concat({'name':'section_id', 'value':section_id});
    supportAjax({
        url: '/admin/lookup/newLookup',
        method: 'post',
        data: data
    },function(resp){
         $('#cModal').modal('hide');
         toastr.success("New lookup added successfully");
         $(`#${table}`).KTDatatable().reload();
    },function({ status,responseJSON}){
        if (status === 422) 
        {
            add_look_up.find('input[name]').css('border-color', '#ddd');
            $(`input[name]`).siblings(".errorMessage").empty();
            if (!responseJSON.errors) return;
            const messages = [];
            for (const [key, message] of Object.entries(responseJSON.errors)) {
                add_look_up.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                messages.push(message);
                $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                $(`input[name="${key}"]`).siblings(".errorMessage").append(message);

            }
            toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
        }
    });
 });
</script>

