{{-- {{dd($user->member)}} --}}
<div class="modal-dialog editUserModalDialog" role="document">
    <div class="modal-content addUserModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Personal Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form id ="edit_personal_detail_form">
            @csrf
            <div class="modal-body">
                <div class="row ">
                    <div class="col">
                        
                            
                        <!--Birth Detail-->
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="birth_date">Date of Birth</label>
                                    
                                <input class="form-control"  id="datepicker" name="date_of_birth" value="{{date('Y-m-d',strtotime($user->member->date_of_birth))}}">
                                </div>
                                <div class="form-group label-floating col-md-6">
                                    <label class="control-label" for="birth_place">Place of Birth</label>
                                <input class="form-control" value="{{$user->member->place_of_birth}}" type="text" id="user_birth_place" name="place_of_birth" placeholder="{{$user->member->place_of_birth}}">
                                </div>
                        </div>
                        <!--End Birth Detail-->

                        <!--Marital Detail-->
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="marital_status">Marital Status</label>
                                <div class="">
                                    <select class="form-control" name="marital_status">
                                        <option selected="">{{ucfirst($user->member->marital_status)}}</option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="divorced">Divorced</option>
                                        <option value="widowed">Widowed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group label-floating col-md-6">
                                    <label class="control-label" for="anniversary_date">Anniversary Date</label>
                                <input class="form-control" id="annDatepicker" name="ann_date" value="{{date('Y-m-d',strtotime($user->member->ann_date))}}">
                            </div>
                        </div>
                        <!--End Marital Detail-->

                        <!--Gender Religion Detail-->
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="">Gender</label>
                                <div class="">
                                    <select class="form-control" name="gender">
                                        <option selected="">{{ucfirst($user->member->sex)}}</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="user_religion">Religion</label>
                                <input class="form-control" value="{{ucfirst($user->member->religion)}}" type="text" id="user_religion" name="religion" placeholder="{{ucfirst($user->member->religion)}}">
                            </div>
                            
                        </div>
                        <!-- End Gender Religion Detail-->

                        <!--Race Country Detail-->
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="user_race">Race</label>
                                <input class="form-control" value="{{ucfirst($user->member->race)}}" type="text" id="user_race" name="race" placeholder="{{ucfirst($user->member->race)}}">
                            </div>
                            
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="user_nation">Nationality</label>
                                <input class="form-control" value="{{ucfirst($user->member->nationality)}}" type="text" id="user_nationality" name="nationality" placeholder="{{ucfirst($user->member->nationality)}}">
                            </div>
                        </div>
                        <!-- End Race Country Detail-->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary sy_icon info_update" data-route="/update/personalDetail" data-id="{{$user->id}}" id="personal_info_save_btn" >Update</button>
            </div>
        </form>
    </div>
</div>
<script>
    var arrows;
    if (KTUtil.isRTL()) {
        arrows = {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>'
        }
    } else {
        arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    }
    $('#datepicker, #annDatepicker').datepicker({
        format:'yyyy-mm-dd',
        rtl: KTUtil.isRTL(),
        todayHighlight: true,
        orientation: "bottom left",
        templates: arrows
    }).on('hide', function(event) {
        event.preventDefault();
        event.stopPropagation();
    });
    $(document).ready(function(){
        $('#datepicker').datepicker().init();
    });

</script>