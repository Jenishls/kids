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
<div class="modal-dialog custom_dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" style="margin-left:2.5rem;" id="cWizardTitle"> <i class="la la-plus"></i> Suppliers</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:cornsilk;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;" id="supplierAddWizard">
            <div class="kt-portlet kt-
            --tabs" style="margin-bottom:0px !important;">
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="campaignSupplierAddForm">   
                        @csrf
                        <div class="tab-content">
                            <div class="wizard-panel active" id="accountWForm" role="tabpanel" style="background:#e5f7ff !important;">
                                @include('supportNew.pages.campaign.suppliers.inc.advSupplierForm')
                            </div>
                        </div>
                        <div class="kt-portlet__foot footer_white">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-md-6  kt-align-right ml-auto" >
                                    <button type="" class="btn btn-sm btn-pill btn-success" id="storeSuppliers" data-cid="{{$campaign->id}}">Save <i class="la la-save"></i></button>
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
    
    clickEvent('#storeSuppliers')(storeSupplier)
    function storeSupplier(e)
    {
        e.preventDefault();
        let data= $('#campaignSupplierAddForm').serializeArray();
        supportAjax({
            url:'/admin/campaign/suppliers/store/'+$(this).attr('data-cid'),
            method:'post',
            data
        },
        function(resp){
            console.log(resp);
        },
        function(err){
            console.log(err);
        })
    }
</script>