<div class="modal-dialog " role="document"
    style="margin-top: 4% !important;">
    <div class="modal-content" style="width: 500px;">
        <div class="modal-header">
            <h5 class="modal-title">
                <span class="la la-dropbox"></span>
                Load Template
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
                        <div class="bg-light">
                            <div class="kt-portlet__body">
                                <table class="table kt-marginless">
                                    <thead>
                                        <tr>
                                            <th style="width: 50px">SN</th>
                                            <th>Name</th>
                                            <th style="width: 100px;">&nbsp;Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($templates as $temp)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $temp->name }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-secondary btn-icon btn-pill loadTemplateThis" data-data="{{ $temp->data }}"
                                                title="Load this template">
                                                    <span class="la la-recycle"></span>
                                                </button> &nbsp;
                                                <button type="button" class="btn btn-sm btn-danger btn-icon btn-pill deleteTemplateThis" data-route="admin/reports/delete-template/{{ $temp->id }}"
                                                title="Delete this template">
                                                    <span class="la la-trash"></span>
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" style="text-align: center;">No Saved Template</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="kt-portlet__foot footer_white">
                                <div class="kt-form__actions">
                                    <div style="display: flex;justify-content: space-between;">
                                        <button type="reset" class="btn btn-secondary btn-pill"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit"
                                            class="btn btn-success btn-elevate btn-pill kt-margin-l-10 kt-hide">Load</button>
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
    $(function (form_id) {
        localStorage.removeItem('templateForm');

        $('.loadTemplateThis').off('click').on('click', function(e) {
            let self = $(this),
                data = self.attr('data-data'),
                params = decodeURIComponent(data).split('&'),
                form = $(document.getElementById(form_id));

            for(let i = 0, len = params.length; i < len; i++) {
                let [key, value] = params[i].split('=');
                form.find(`[name="${ key }"]`).val(value);
            }

            $('.modal.show').modal('hide');
        });

        $('.deleteTemplateThis').off('click').on('click', function(e) {
            let self = $(this),
                url = self.attr('data-route');

            showModal({
                url, c: 'DeleteTemplate', p: 'TemplateLoad'
            });
        });
    } (localStorage.getItem('templateForm')));
</script>
