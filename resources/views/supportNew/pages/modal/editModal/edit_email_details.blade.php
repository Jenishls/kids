{{-- {{dd($user->member)}} --}}
<div class="modal-dialog editUserModalDialog" role="document">
        <div class="modal-content addUserModal">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Email Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form id ="edit_mail_detail_form">
                @csrf
                <div class="modal-body" style="padding:0px !important;">
                    <div class="kt-portlet kt-portlet--tabs" style="margin-bottom:0px !important;">
                        <div class="kt-portlet__body p-20" style="background:#e5f7ff !important; "> 
                            <div class="shadow_inputs mb-0">
                                <div class="row ">
                                    <div class="col">
                                        <!--Birth Detail-->
                                        <div class="row">
                                            <div class="form-group label-floating col-md-6">
                                                <label class="control-label" for="birth_date">Email</label>
                                                <input class="form-control" name="email" value="{{$user->emailSetting?$user->emailSetting->email:""}}">
                                            </div>
                                            <div class="form-group label-floating col-md-6">
                                                <label class="control-label" for="birth_place">Email From</label>
                                                <input class="form-control" name="email_from" value="{{$user->emailSetting?$user->emailSetting->email_from:""}}">
                                            </div>
                                        </div>
                                        <!--End Birth Detail-->
                
                                        <!--Marital Detail-->
                                        <div class="row">
                                            <div class="form-group label-floating col-md-6">
                                                <label class="control-label" for="marital_status">Server</label>
                                                <input class="form-control" name="mail_server" value="{{$user->emailSetting?$user->emailSetting->server:""}}">
                                            </div>
                                            <div class="form-group label-floating col-md-6">
                                                    <label class="control-label" for="anniversary_date">Password</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                        </div>
                                        <!--End Marital Detail-->
                
                                        <!--Gender Religion Detail-->
                                        <div class="row">
                                            <div class="form-group label-floating col-md-6">
                                                <label class="control-label" for="">Mail Type</label>
                                                <div class="">
                                                    <select class="form-control" name="mail_type">
                                                        <option selected="">{{$user->emailSetting? ucfirst($user->emailSetting->mail_type): ''}}</option>
                                                        <option value="pop3">POP3</option>
                                                        <option value="imap">IMAP</option>
                                                        <option value="exchange_server">Exchange Server</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group label-floating col-md-2">
                                                <label class="control-label d-block" for="user_religion">Auth</label>
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="auth" value="{{$user->emailSetting? $user->emailSetting->auth: 0}}">
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="form-group label-floating col-md-2">
                                                <label class="control-label d-block" for="user_religion">Is SSL</label>
                                                <label class="kt-checkbox" >
                                                    <input type="checkbox" name="is_ssl" value="{{$user->emailSetting? $user->emailSetting->is_ssl: 0}}">
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="form-group label-floating col-md-2">
                                                <label class="control-label d-block" for="user_religion">Is TLS</label>
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="is_tls" value="{{$user->emailSetting? $user->emailSetting->is_tls: 0}}">
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <!-- End Gender Religion Detail-->
                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary x btn-pill" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-pill btn-primary sy_icon" data-route="/admin/update/emailDetail/{{$user->id}}" id="email_info_save_btn" >Update</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).off('click','#email_info_save_btn').on('click','#email_info_save_btn',function(e){
            e.preventDefault();
            let url = $(this).attr('data-route');
            $.ajax({
                url:url,
                method: 'POST',
                data: new FormData(document.getElementById('edit_mail_detail_form')),
                contentType: false,
                processData: false,
                success: function(response){
                    toastr.success(response.message);
                    $('#cModal').modal('hide');
                }, 
                error:function({status, responseJSON})
                {
                }
            });
        });
    
    </script>