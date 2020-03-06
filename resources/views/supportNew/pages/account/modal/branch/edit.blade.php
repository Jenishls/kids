<style>
    .form-group{
        padding-bottom:5px !important;
    }
    label{
        font-weight: bold !important;
    }
    .portlet_label{
        position: absolute;
        font-weight: 500;
        display: table;
        z-index: 1;
        font-size: 15px;
        padding: 7px 26px;
        letter-spacing: 1px;
        border: 1px solid #f1f2f6;
        border-radius: 19px;
        background: #41bcf6;
        color: white!important;
        font-size: 13px!important;
    }
   /* .portlet_label:hover{
        color: #e5f7ff!important;
    }*/
    .form-group label {
        font-size: 0.9rem!important;
        font-weight: 500!important;
    }
    .nav-link.modal_tab_headers{
        text-align:center!important;
    }
    .tableParentTitle{
        padding: 10px;
        background: #49bdf4!important;
        color: #ffffff!important;
        font-weight: 500;
        border: 1px solid #ebedf2;
        margin-bottom: 10px!important;
    }
    .custom_wizard_table{
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        background-color: #e5f7ff26;
        border: 1px solid #e1e1ef;
    }
    .img_placeholder{
      height: 100px;
    }
    .img_placeholder img{
      max-width: 100%;
      height: 100%;
      object-fit: contain;
    }
    .modal-900 {
      width: 900px!important;
    }
</style>
<div class="modal-dialog custom_dialog" style="max-width:700px!important;" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" style="margin-left:2.5rem;" id="cWizardTitle">Update Branch</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:cornsilk;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet kt-
            --tabs" style="margin-bottom:0px !important;">
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px!important;"> 
                    <form class="kt-form kt-form--label-right" id="branchEditForm">   
                        @csrf
                        <div class="tab-content">
                            <div class="wizard-panel active" style="background:#e5f7ff !important;padding:15px 15px 0 15px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="kt-portlet kt-portlet--mobile">
                                            <div class="kt-portlet__body pt-0 px-3">
                                            <div id="createBranchForm">
                                                <div class="row">
                                                <div class="col-md-12" id="formInputs">
                                                    <div class="form-group row mt-3 ">
                                                        <div class="col-md-6" >
                                                            <label class="control-label" for="branch_name">Branch Name</label>
                                                        <input type="text" value="{{$cBranch->branch_name?$cBranch->branch_name:''}}" name="branch_name" class="form-control" >
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                        <div class="col-md-6" >
                                                            <label class="control-label" for="branch_name">Branch #</label>
                                                            <input type="text" value="{{$cBranch->branch_no?$cBranch->branch_no:''}}" name="branch_no" class="form-control" >
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-12" >
                                                            <label class="control-label" for="branch_name">Address 1</label>
                                                            <input type="text" name="add1" value="{{isset($cBranch->address->add1)?$cBranch->address->add1:''}}"  class="form-control" >
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-12" >
                                                            <label class="control-label" for="branch_name">Address 2</label>
                                                            <input type="text" name="add2" value="{{isset($cBranch->address->add2)?$cBranch->address->add2:''}}" class="form-control" >
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6" >
                                                            <label class="control-label" for="branch_name">Phone Number</label>
                                                            <input type="text" name="phone_no"  value="{{isset($cBranch->contact->phone_no)?$cBranch->contact->phone_no:''}}" class="form-control e_mask_phone" >
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                        <div class="col-md-6" >
                                                            <label class="control-label" for="branch_name">Email</label>
                                                            <input type="text" name="email" value="{{isset($cBranch->contact->email)?$cBranch->contact->email:''}}" class="form-control" >
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-4" >
                                                            <label class="control-label" for="branch_name">City</label>
                                                            <input type="text" name="city" value="{{isset($cBranch->address->city)?$cBranch->address->city:''}}" class="form-control" >
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                        <div class="col-md-4" >
                                                            <label class="control-label" for="branch_name">State</label>
                                                            <input type="text" name="state"  value="{{isset($cBranch->address->state)?$cBranch->address->state:''}}" class="form-control" >
                                                            <div class="errorMessage"></div>
                                    
                                                        </div>
                                                        <div class="col-md-4" >
                                                            <label class="control-label" for="branch_name">Zip</label>
                                                            <input type="text" name="zip" value="{{isset($cBranch->address->zip)?$cBranch->address->zip:''}}" class="form-control" >
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
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
                                    {{-- <div class="col-md-6">
                                        <button type="" class="btn btn-sm btn-pill btn-success">
                                            <i class="la la-save"></i>
                                            Cancel
                                        </button>
                                    </div> --}}
                                    <div class="col-md-6 offset-md-6 kt-align-right ml-auto">
                                    <button type="" class="btn btn-sm btn-pill btn-warning" data-bid="{{$cBranch->id}}" id="updateBranchBtn">
                                        <i class="la la-save"></i>
                                        Update</button>
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
    $('#updateBranchBtn').off('click').on('click',function(e){
        e.preventDefault();
        let data =$('#branchEditForm').serializeArray();
        let branchId = $(this).attr('data-bid');

        supportAjax({
            url:'/admin/account/company/branches/update/'+branchId,
            method:'POST',
            data
        },
        function(resp){
            $('#cModalbranch').modal('hide');
            if(resp.data){
                appendBranchTemplate([resp.data],'branch--'+resp.data.id,true);
            }
        },
        function(err){
            console.log(err);
        })

    })
</script>