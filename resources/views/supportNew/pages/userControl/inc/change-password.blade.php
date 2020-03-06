<div class="row">
    <div class="col-xl-12">
        <div class="kt-portlet personal_info_div">

            <form class="kt-form kt-form--label-right m-form">
                <div class="m-portlet__body">
                    <div class="m-portlet" style="margin-bottom:0;">
                        <div class="membership_info_title_name header_bottom_border  person_info_title head_bottom_border" style="padding-top: 20px;">
                            <span class="head_bottom_border">Password</span> 
                        </div>
                        {{-- <h4 style="padding: 20px" class="header_bottom_border  person_info_title head_bottom_border">Password</h4> --}}
                        <div class="password_body">
                            <div class="password_change_div">
                                <div class="form-group">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="old_password">Current Password</label>
                                        <input class="form-control" type="password" id="curr_pass" name="oldPassword" data-inputName="oldPassword" value="" required="require">
                                        <div class="errorMessage"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="password">New Password</label>
                                        <input class="form-control" type="password" id="new_pass" data-inputName="password" name="password" value="">
                                        <div class="errorMessage"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="password_confirmation">Confirm Password</label>
                                        <input class="form-control" type="password" id="confirm_password" data-inputName="password" name="password_confirmation" autocomplete="off" required="require">
                                        <div class="errorMessage"></div>
                                    </div>
                                </div>
                                <div style="text-align:center; padding-top: 16px;">
                                    <button type="reset" class="btn btn-accent m-btn m-btn--pill m-btn--custom passwordUpdate btn-primary" data-id="{{$user->id}}" id="change_user_password">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
