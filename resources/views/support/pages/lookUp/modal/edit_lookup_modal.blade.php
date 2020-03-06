<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Lookup</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <form id ="edit_lookup_form">
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label" for="lookup_code">Code</label>
                            <input class="form-control" type="text" value="{{$lookup->code}}" name="code" id="lookup_code" placeholder="lookup code">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="form-group label-floating repeatThisRow" style="margin-top:10px;">
                            <label class="control-label" for="lookup_value">Value</label>
                            <input class="form-control" id="lookup_value" value="{{$lookup->value}}" name="value" placeholder="lookup value">
                            <div class="errorMessage"></div>

                        </div>
                        <div class="form-group label-floating repeatThisRow" style="margin-top:10px;">
                            <label class="control-label" for="description">Description</label>
                            <br>
                            <textarea class="form-control" type="text" name="description" id="lookup_section_description" placeholder="Write description." autocomplete="off">{{$lookup->description}}</textarea>
                        </div>
                        
                        {{-- <div class="col form-group label-floating">
                            <label class="control-label">Icon Class</label>
                            <input class="form-control" id="icon_class" name="icon_class">
                        </div>
                                --}}
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="edit_lookup" data-id="{{$lookup->id}}" section-id="{{$lookup->section_id}}">Save</button>
        </div>
    </div>
</div>
    
    <script>
     $(document).off('click', '#edit_lookup').on('click', '#edit_lookup', function(e){
        e.preventDefault();
        e.stopPropagation();
        let edit_lookup_form = $('#edit_lookup_form');
        let table = $('.tableloader').attr('id');
        let data = $('#edit_lookup_form').serializeArray();
        supportAjax({   
            url: '/lookup/editLookup/'+$(this).data('id'),
            method: 'post',
            data: data
        },function(resp){
             $('#cModal').modal('hide');
             toastr.success('Updated successfully.')
             $(`#${table}`).KTDatatable().reload();
        },function({ status,responseJSON}){
            if (status === 422) 
            {
                edit_lookup_form.find('input[name]').css('border-color', '#ddd');
                $(`input[name]`).siblings(".errorMessage").empty();
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    edit_lookup_form.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`input[name="${key}"]`).siblings(".errorMessage").append(message);

                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        });
     })
    </script>