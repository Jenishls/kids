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
                    <form class="kt-form kt-form--label-right" id="addAccHeadForm" style="margin-top:15px;">   
                        @csrf
                        <div class="" id="kt_portlet_base_demo_1_1_tab_content"style="background:#e5f7ff !important;" >
                            <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important;">
                                <div class="row" style="margin-bottom:1rem;">
                                    <div class="form-group col-12">
                                        <div class="">
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-6">
                                                    <label class="control-label" for="type">Type</label>
                                                    <input class="form-control" type="text" name="type">
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label class="control-label" for="name">Name</label>
                                                    <input class="form-control" type="text" name="name">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-6">
                                                    <label class="control-label" for="code">Code</label>
                                                    <input class="form-control" type="text" name="code">
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
                                            <button id="createAccHead" class="btn btn-pill btn-success"><i class="la la-save"></i>Save</button>
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
    $(document).off('click', '#createAccHead').on('click', '#createAccHead', function(e){
        e.preventDefault();
        let data = $('#addAccHeadForm').serializeArray();
        console.log(data);
        supportAjax({
            url: `/admin/accounthead/add`,
            method:"POST",
            data: data
        }, function(resp){
            $('#cModal').modal('hide');
            toastr.success('Added Successfully.');
            $('#accountHeadsTable').KTDatatable().reload();
        }, function(err){
            console.log(err);
        });
    });
</script>