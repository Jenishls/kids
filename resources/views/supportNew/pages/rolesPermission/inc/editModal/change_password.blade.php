<div class="modal-dialog cp_modalDialog" role="document">
        <div class="modal-content addUserModal">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col">
                        @csrf
                        <form id="changePassword" class="m-form m-form--label-align-right m-form--group-seperator-dashed">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label for="state">
                                        Password <span class="required">*</span>
                                    </label>
                                    <input type="password" class="form-control m-input" id="password" data-inputName="password" name="password" autocomplete="off" required="require">
                                    <div class="errorMessage"></div>
                                </div>
            
                                <div class="col-lg-6">
                                    <label for="state">
                                        Confirm Password <span class="required">*</span>
                                    </label>
                                    <input type="password" class="form-control m-input" id="password_confirmation" data-inputName="password" name="password_confirmation" autocomplete="off" required="require">
                                    <div class="errorMessage"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" data-id="{{$user->id}}" id="update_password" >Update</button>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '#update_password', function(e){
            e.preventDefault();
            e.stopPropagation();
            let data = $('#changePassword').serializeArray();
            let userId= $(this).data('id');
            supportAjax({
                url: '/admin/user/updatePassword/'+userId,
                method: 'POST',
                data: data
            },function(resp){
                $('#cModal').modal('hide');
                $('#t_userstable').KTDatatable().reload();
                
            },function(error){
                errorHandeler({
                    fields:['password']
                }, error);
                
            });
        })
    </script>