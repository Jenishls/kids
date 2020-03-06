<div class="modal-dialog " role="document"
    style="margin-top: 4% !important;">
    <div class="modal-content" style="width: 500px;">
        <div class="modal-header">
            <h5 class="modal-title">
                <span class="la la-dropbox"></span>
                New Template
            </h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"
                style="color: #fff !important;">
            </button>
        </div>
        <div class="modal-body no-padding" style="">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
                <div class="kt-portlet__body no-padding" style="background:#e4e4e4 !important; ">
                    <form class="kt-form kt-form--label-right" method="post" action="admin/reports/save-template"
                        id="saveReportTemplate">
                        @csrf
                        <input type="hidden" name="report_name" value="{{ request()->route('template') }}">
                        <input type="hidden" name="data" value="" id="reportData">
                        <div style="background:#e5f7ff !important;">
                            <div class="kt-portlet__body">
                                <label for="templateName">Template Name</label>
                                <input type="text" name="name" class="form-control" id="templateName">
                            </div>
                            <div class="kt-portlet__foot footer_white">
                                <div class="kt-form__actions">
                                    <div style="display: flex;justify-content: space-between;">
                                        <button type="reset" class="btn btn-secondary btn-pill"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit"
                                            class="btn btn-success btn-elevate btn-pill kt-margin-l-10">Save</button>
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
    $(function () {

        if(localStorage.getItem('reportData')) {
            $('#reportData').val(localStorage.getItem('reportData'));
            localStorage.removeItem('reportData');
        }

        $('#saveReportTemplate').off('submit').on('submit', function (e) {
            e.preventDefault();

            let form_id = this,
                form = $(this),
                data = new FormData(form_id);

            // addFormLoader();
            $.ajax({
                url: form.attr('action'),
                method: 'post',
                data,
                processData: false,
                contentType: false
            }).then(function (response) {
                $('.modal.show').modal('hide');
                toastr.success(response.message);
            }, function (errResponse) {

                if (errResponse.responseJSON && errResponse.responseJSON.exception) {
                    toastr.error(errResponse.responseJSON.message, errResponse.responseJSON
                        .exception);
                } else if (errResponse.responseJSON && errResponse.responseJSON.message) {
                    toastr.error(errResponse.responseJSON.message);
                }
            });
        });
    });

</script>
