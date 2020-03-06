<div class="modal-dialog " role="document"
    style="margin-top: 4% !important;">
    <div class="modal-content" style="width: 500px;">
        <div class="modal-body no-padding" style="">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
                <div class="kt-portlet__body no-padding" style="background:#e4e4e4 !important; ">
                    <form class="kt-form kt-form--label-right" method="post" 
                    action="admin/reports/destroy-template/{{ request()->route('id') }}"
                        id="delReportTemplate">
                        @csrf
                        <input type="hidden" name="report_name" value="{{ request()->route('template') }}">
                        <input type="hidden" name="data" value="" id="reportData">
                        <div class="bg-light">
                            <div class="kt-portlet__body text-center">
                                <i class="la la-trash text-danger display-4"></i> <br> 
                                Are you sure you want to delete this template ?
                            </div>
                            <div class="kt-portlet__foot footer_white">
                                <div class="kt-form__actions">
                                    <div style="display: flex;justify-content: space-between;">
                                        <button type="reset" class="btn btn-secondary btn-pill"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit"
                                            class="btn btn-danger btn-elevate btn-pill kt-margin-l-10">Delete</button>
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
        
        $('#delReportTemplate').off('submit').on('submit', function (e) {
            e.preventDefault();

            let form_id = this,
                form = $(this);

            // addFormLoader();
            $.ajax({
                url: form.attr('action'),
                method: 'post',
                data: form.serializeArray()
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
