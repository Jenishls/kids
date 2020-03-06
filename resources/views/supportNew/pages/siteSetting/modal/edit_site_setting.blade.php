 <div class="modal-dialog addUserModalDialog" role="document">
    <div class="modal-content addUserModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Site Setting</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            
            <div class="row">
                <div class="col">
                    <form id ="update_sitesetting_form">
                        @csrf
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="code">Code</label>
                                <input class="form-control" type="text" value="{{$setting->code}}" name="code" id="setting_code" placeholder="Site setting code name" required="require" autocomplete="off">
                                
                            <div class="errorMessage"></div>
                                
                            </div>
                            <div class="form-group label-floating col-md-6 ">
                               
                                <label class="control-label" for="value">Value</label>
                                <input class="form-control" type="text" id="setting_value" value="{{$setting->value}}"  name="value" placeholder="Value" required="require" autocomplete="off">
                                
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-md-12">
                                <label class="control-label" for="value">Description</label>
                                <br>
                                <textarea class="form-control" type="text"  name="description" id="site_setting_description" placeholder="Add description." autocomplete="off">{{$setting->description?$setting->description:''}}</textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="update_sitesetting" data-id="{{$setting->id}}" >Save</button>
        </div>
    </div>
</div>

<script>
    $(document).off('click', '#update_sitesetting').on('click', '#update_sitesetting', function(e){
        e.preventDefault();
        e.stopPropagation();
        let data = $('#update_sitesetting_form').serializeArray();
        supportAjax({   
            url: '/admin/siteSetting/update/'+$(this).data('id'),
            method: 'post',
            data: data
        },function(resp){
                $('#cModal').modal('hide');
                toastr.success('Updated successfully.')
                $('#t_sitesettingtable').KTDatatable().reload();
        }, function(err){
            $('#cModal').modal('hide');
            toastr.error(err.responseJSON.message);
        })
    });

</script>