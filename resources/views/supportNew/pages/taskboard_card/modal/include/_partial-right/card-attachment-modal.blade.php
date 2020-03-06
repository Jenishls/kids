<div class="modal-dialog modal-custom-800-width" role="document">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h5 class="modal-title fs-modal-header">
                <i class="la la-plus cust_plus_icon"></i>
                Upload Attachment
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    &times;
                </span>
            </button>
        </div>
        <!-- Modal Body -->
        <div class="modal-body has-divider pd-20">
            <form id="cardAttachmentForm" class="m-form m-form--label-align-right">
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row no-pd-i mb-0">

                        <div class="col-lg-12">
                            <div class="upload-divider no-pd-bottom">
                                <div class="row p-0">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 m-b-20">
                                        <input type = "hidden" name="card_id" value="{{$cardList->id}}">
                                        <input type="text" class="form-control form-control-sm m-b-15 no-m-left" name="document_name[]"  value="default title">
                                        <label class="m-dropzone dropzone ApplicationFiles full-width p-rel justify-center" for='photoId'>
                                            <input type="file" class="hidden uploadApplicationFiles clear-option" name="documents[]" id="photoId" data-app="ApplicationFiles">
                                            <div class="m-dropzone__msg dz-message needsclick fileDetail">
                                                <h3 class="m-dropzone__msg-title">
                                                    Click to upload
                                                </h3>
                                                <span class="m-dropzone__msg-desc">
                                                    Maximum upload size:
                                                    <strong>
                                                        4.00 MB
                                                    </strong>
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                    <div id="extraUploadSection"></div>
                                </div>
                            </div>

                            <a class="btn btn-info m-btn--pill m-btn m-btn--custom m-btn--icon text-white m-t-10" rel="getExtraUpload" title="Add another upload section">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>
                                        Add Files
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer d-ib">
            <button type="button" class="float-left btn btn-secondary m-btn--pill" data-dismiss="modal">
                Cancel
            </button>

            <button type="button" class="float-right btn btn-success m-btn--pill" id="btnSubmitCardAttachment" data-target="projectForm">
                Upload
            </button>
        </div>
    </div>
</div>

