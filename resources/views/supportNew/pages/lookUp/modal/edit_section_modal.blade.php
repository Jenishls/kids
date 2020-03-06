<div class="modal-dialog addUserModalDialog" role="document">
    <div class="modal-content addUserModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Lookup Section</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            {{-- {{dd($section)}} --}}
            <div class="row">
                <div class="col">
                    <form id ="edit_lookup_section">
                        @csrf
                        <div class="row">
                            <div class="form-group label-floating col-md-12">
                                <label class="control-label" for="section_name">Name</label>
                                <input class="form-control" type="text"  name="section" value="{{$section->section}}" id="section_name"  required="require" autocomplete="off">
                                
                            <div class="errorMessage"></div>
                                
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-md-12">
                                <label class="control-label" for="value">Description</label>
                                <br>
                                <textarea class="form-control" type="text"  name="description" id="lookup_section_description" value="{{$section->description}}" autocomplete="off">{{$section->description}}</textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="edit_lookupSection" data-id="{{$section->id}}">Save</button>
        </div>
    </div>
</div>

<script>
    $(document).off('click', '#edit_lookupSection').on('click', '#edit_lookupSection', function(e){
        e.preventDefault();
        e.stopPropagation();
        let edit_section = $('#edit_lookup_section');
        let data = $('#edit_lookup_section').serializeArray();
        let id = $(this).attr('data-id');
        supportAjax({   
            url: '/admin/lookup/editSection/'+id,
            method: 'post',
            data: data
        },function(resp){
                $('#kt_content').empty().append(resp);
                $('#cModal').modal('hide');
                toastr.success('Updated successfully.')
        },function({ status,responseJSON}){
            if (status === 422) 
            {
                add_section.find('input[name]').css('border-color', '#ddd');
                $(`input[name]`).siblings(".errorMessage").empty();
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    add_section.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`input[name="${key}"]`).siblings(".errorMessage").append(message);

                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        });
    });

    /*let sections = $('.lookup_sections_all');
    $(document).on('blur', '#section_name', function(e){
        sections.each(function(index, data){
            console.log();
        })
    });*/
</script>