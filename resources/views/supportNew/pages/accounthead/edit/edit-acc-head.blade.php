<div class="custom-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Account Head</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
               
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="editAccHeadForm" style="margin-top:15px;">   
                        @csrf
                        <div class="" id="kt_portlet_base_demo_1_1_tab_content"style="background:#e5f7ff !important;" >
                            <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important;">
                                <div class="row" style="margin-bottom:1rem;">
                                    <div class="form-group col-12">
                                        <div class="">
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-6">
                                                    <label class="control-label" for="type">Type</label>
                                                    <input class="form-control" type="text" value="{{$acc_head->type}}" name="type">
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label class="control-label" for="name">Name</label>
                                                    <input class="form-control" type="text" value="{{$acc_head->name}}" name="name">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-6">
                                                    <label class="control-label" for="code">Code</label>
                                                    <input class="form-control" type="text" value="{{$acc_head->code}}" name="code">
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
                                            <button id="updateAccHead" data-id="{{$acc_head->id}}" class="btn btn-pill btn-success"><i class="la la-upload"></i>Update</button>
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
    $(document).off('click', '#updateAccHead').on('click', '#updateAccHead', function(e){
        e.preventDefault();
        let data = $('#editAccHeadForm').serializeArray();
        let id = $(this).attr('data-id');
        console.log(data);
        supportAjax({
            url: `/admin/accounthead/edit/${id}`,
            method:"POST",
            data: data
        }, function(resp){
            $('#cModal').modal('hide');
            toastr.success('Updated Successfully.');
            $('#accountHeadsTable').KTDatatable().reload();
        }, function(err){
            console.log(err);
        });
    });
</script>