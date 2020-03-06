<div class="modal-dialog addUserModalDialog" role="document">
    <div class="modal-content addUserModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Lookup Section</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            
            <div class="row">
                <div class="col">
                    <form id ="add_lookup_section">
                        @csrf
                        <div class="row">
                            <div class="form-group label-floating col-md-12">
                                <label class="control-label" for="section_name">Name</label>
                                <input class="form-control" type="text"  name="section" id="section_name" placeholder="Section name" required="require" autocomplete="off">
                                
                            <div class="errorMessage"></div>
                                
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-md-12">
                                <label class="control-label" for="value">Description</label>
                                <br>
                                <textarea class="form-control" type="text"  name="description" id="lookup_section_description" placeholder="Write description." autocomplete="off"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="add_lookupSection">Save</button>
        </div>
    </div>
</div>

<script>
    $(document).off('click', '#add_lookupSection').on('click', '#add_lookupSection', function(e){
        e.preventDefault();
        e.stopPropagation();
        let add_section = $('#add_lookup_section');
        let data = $('#add_lookup_section').serializeArray();
        supportAjax({   
            url: '/admin/lookup/newSection',
            method: 'post',
            data: data
        },function(resp){
                $('#kt_content').empty().append(resp);
                $('#cModal').modal('hide');
                toastr.success('Added successfully.')
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

    let sections = $('.lookup_sections_all');
    $(document).on('blur', '#section_name', function(e){
        sections.each(function(index, data){
            console.log();
        })
    });
</script>