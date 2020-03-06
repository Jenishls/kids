<div class="modal-dialog addProductModalDialog modal-md" role="document"
    style="margin-top: 4% !important; margin-left: 27% !important;">
    <div class="modal-content addProductModal" style="width: 900px;">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Product List Report</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"
                style="color: #fff !important;">
            </button>
        </div>
        <div class="modal-body no-padding" style="">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
                <div class="kt-portlet__body no-padding" style="background:#e4e4e4 !important; ">
                    <form class="kt-form kt-form--label-right" method="post" action="admin/reports/generate/sql-raw"
                        id="generateReport">
                        @csrf
                        <div style="background:#e5f7ff !important;">
                            <div class="kt-portlet__body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea name="raw_query" class="form-control" cols="30" rows="5"
                                            id="rawSQLQuery"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot footer_white">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div style="display: flex;justify-content: flex-start;">
                                                <button type="reset" class="btn btn-secondary btn-pill"
                                                    data-dismiss="modal">Cancel</button>

                                                <button type="button"
                                                    class="btn btn-success btn-elevate btn-pill kt-margin-l-10 saveTemplate"
                                                    data-template="sql-raw">Save</button>

                                                <button type="button"
                                                    class="btn btn-secondary btn-pill kt-margin-l-10 loadTemplate"
                                                    data-template="sql-raw">Load</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div style="display: flex;justify-content: flex-end;">
                                                <select name="report_type" id="reportType" class="form-control">
                                                    <option value="csv" selected>CSV</option>
                                                    <option value="json">JSON</option>
                                                    <option value="pdf">PDF</option>
                                                </select>
                                                <button type="submit"
                                                    class="btn btn-primary btn-elevate btn-pill kt-margin-l-10">Generate</button>
                                            </div>
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
    $(function () {

        autosize($('#rawSQLQuery'));

        $('#reportType').select2({
            width: 150,
            minimumResultsForSearch: -1
        });

        $('#generateReport').off('submit').on('submit', function (e) {
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
