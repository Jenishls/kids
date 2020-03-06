 <div class="modal-dialog addUserModalDialog" role="document">
    <div class="modal-content addUserModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Site Setting</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            
            <div class="row">
                <div class="col">
                    <form id ="sitesetting_form">
                        @csrf
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="code">Code</label>
                                <input class="form-control" type="text" name="code" id="setting_code" placeholder="Site setting code name" required="require" autocomplete="off">
                                
                            <div class="errorMessage"></div>
                                
                            </div>
                            <div class="form-group label-floating col-md-6 ">
                               
                                <label class="control-label" for="value">Value</label>
                                <input class="form-control" type="text" id="setting_value"  name="value" placeholder="Value" required="require" autocomplete="off">
                                
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-md-12">
                                <label class="control-label" for="value">Description</label>
                                <br>
                                <textarea class="form-control" type="text" name="description" id="site_setting_description" placeholder="Add description." autocomplete="off"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="store_sitesetting" >Save</button>
        </div>
    </div>
</div>

<script>
    $(document).off('click', '#store_sitesetting').on('click', '#store_sitesetting', function(e){
        e.preventDefault();
        e.stopPropagation();
        let add_site_settings = $('#sitesetting_form');
        let data = $('#sitesetting_form').serializeArray();
        supportAjax({
            url: '/admin/siteSetting/add',
            method: 'POST',
            data: data
        },function(resp){
            $('#cModal').modal('hide');
            toastr.success('Successfully added.');
            $('#t_sitesettingtable').KTDatatable().reload();
            
        },function({ status,responseJSON}){
            if (status === 422) 
            {
                add_site_settings.find('input[name]').css('border-color', '#ddd');
                $(`input[name]`).siblings(".errorMessage").empty();
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    add_site_settings.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`input[name="${key}"]`).siblings(".errorMessage").append(message);

                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        });
    });

</script>

