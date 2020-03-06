<style>
    .form-group{
        padding-bottom:5px !important;
    }
</style>
<div class="custom-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Cash Master</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
               
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important; padding-top:0px!important;color:#000;"> 
                    <form class="kt-form kt-form--label-right" id="editCashMasterForm" style="margin-top:15px;">   
                        @csrf
                        <div class="" id="kt_portlet_base_demo_1_1_tab_content"style="background:#e5f7ff !important;" >
                            <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important; padding-top:0px !important;">
                                <div class="row" style="margin-bottom:1rem;">
                                    <div class="form-group col-12">
                                        <div class="">
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-6" style="padding-top:10px;">
                                                    <label class="control-label" for="name">Name</label>
                                                    <input class="form-control" type="text" value="{{$c_master->name}}" name="name">
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="form-group  col-md-6" id="type_member" style="padding-top:10px;">
                                                    <label class="control-label" for="memberSelect">Member</label>
                                                    <select class="form-control" name="member_id" id="memberSelect">
                                                        <option value="{{$c_master->user->id}}" selected>{{$c_master->user->name}}({{$c_master->user->username?:$c_master->user->email}})</option>
                                                    </select>
                                                    <div class="errorMessage"></div>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-11">
                                                    <label class="control-label" for="locationSelect">Location</label>
                                                    <select class="form-control" name="location" id="locationSelect">
                                                        <option value="{{$c_master->location}}">{{$c_master->location}}</option>
                                                    </select>
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="form-group col-md-1" style="padding-top: 28px;padding-left:0px;">
                                                    <div class="xs-mt-30">
                                                        <button type="button" class="btn btn-primary btn-sm " id="addLocation"
                                                                title="Add Location" style="padding:7px; padding-right:2px;">
                                                            <i class="la la-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>	  
                            </div>
                            <div class="kt-portlet__foot footer_white">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-lg-6">
                                        </div>
                                        <div class="col-lg-6 kt-align-right">
                                            <button id="updateCashMaster" class="btn btn-pill btn-success" data-id="{{$c_master->id}}"><i class="la la-upload"></i>Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>     
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#memberSelect').select2({
        width:'100%',
        ajax:{
            url: '/admin/cashmaster/getMember',
            processResults: function(data){
                var d = [];
                $(data).each(function (k, v) {
                    var a = {
                        text: v.name+' '+'('+v.username+')',
                        id: v.id
                    };
                    d.push(a);
                });
                return {
                    results: d
                };
            }
        }
    });

    $('#locationSelect').select2({
        width: '100%',
    });
    // Lookup for Location/ Currently inactive
    // $('#locationSelect').select2({
    //     width:'100%',
    //     ajax:{
    //         url: '/admin/cashmaster/getLocation',
    //         processResults: function(data){
    //             var d = [];
    //             $(data).each(function (k, v) {
    //                 var a = {
    //                     text: v.name+' '+'('+v.username+')',
    //                     id: v.id
    //                 };
    //                 d.push(a);
    //             });
    //             return {
    //                 results: d
    //             };
    //         }
    //     }
    // });


    $(document).off('click', '#updateCashMaster').on('click', '#updateCashMaster', function(e){
        e.preventDefault();
        let cashMasterForm = $('#editCashMasterForm');
        let data = $('#editCashMasterForm').serializeArray();
        let id = $(this).attr('data-id');
        supportAjax({
            url: `/admin/cashmaster/edit/${id}`,
            method: "POST",
            data: data
        }, function(resp){
            $('#cModal').modal('hide');
            toastr.success('Updated Successfully');
            $('#cashMasterTable').KTDatatable().reload();
        }, function({ status,responseJSON}){
            if (status === 422) 
            {
                cashMasterForm.find('input[name]').css('border-color', '#ddd');
                cashMasterForm.find('select[name]').css('border-color', '#ddd');
                $(`input[name]`).siblings(".errorMessage").empty();
                $(`select[name]`).siblings(".errorMessage").empty();
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    cashMasterForm.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    cashMasterForm.find(`select[name = "${ key }"]`).css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`select[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`input[name="${key}"]`).siblings(".errorMessage").append(message);
                    $(`select[name="${key}"]`).siblings(".errorMessage").append(message);

                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        });
    });
</script>