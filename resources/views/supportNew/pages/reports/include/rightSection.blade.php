<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                {{ request()->input('name', 'Unknown Report') }}
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <button type="button" class="btn btn-primary btn-pill btn-elevate modalOpener"
                data-modal-route="admin/reports/generateModal/{{ request()->route('section') }}">
                <i class="la la-plus"></i>
                Generate
            </button>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-portlet kt-portlet--bordered">
            <div class="kt-portlet__body p-2">
                <div class="row">
                    <div class="col-auto">
                        <input type="text" id="reportDateRangePicker" name="dateRange"
                            class="form-control form-control-sm kt-radius-20" />
                    </div>
                </div>
            </div>
        </div>
        <table id="reportsTable"></table>
    </div>
</div>

<script>
    $(function () {
        let picker = $("#reportDateRangePicker").daterangepicker({
            ranges: {
                "Last 30 Days": [moment().subtract(30, "days"), moment()],
                "Last 15 Days": [moment().subtract(15, "days"), moment()],
                "Last 7 Days": [moment().subtract(7, "days"), moment()],
                "Last 3 Days": [moment().subtract(3, "days", moment())]
            }
        })

        let ReportsTable = $("#reportsTable").KTDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        url: "admin/reports/datatable",
                        params: {
                            _token: $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                            query: {
                                name: "{{ request()->route('section') }}"
                            }
                        }
                    }
                },
                saveStat: false,
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true
            },
            pagination: true,
            sortable: true,
            columns: [{
                    field: 'created_at',
                    title: 'Date',
                    width: 100,
                    sortable: 'desc',
                    template: ({
                        created_at
                    }) => moment(created_at).format('MM/DD/YYYY')
                },
                {
                    field: 'created_at_time',
                    title: 'Time',
                    width: 100,
                    template: ({
                        created_at
                    }) => moment(created_at).format('hh:mm A')
                },
                {
                    field: 'name',
                    title: 'User',
                    width: 150
                },
                {
                    field: 'report_name',
                    title: 'Report Name',
                    width: 150
                },
                {
                    field: 'file_name',
                    title: 'File Name',
                    width: 400
                },
                {
                    field: 'actions',
                    title: 'Actions',
                    width: 100,
                    sortable: false,
                    template({
                        id
                    }) {
                        return `<a class="btn btn-sm btn-hover-brand btn-icon btn-pill"
                        href="admin/reports/download/${id}" download=""><i title="Download" class="la la-download"></i></a>
                        <button class="btn btn-sm btn-hover-danger btn-icon btn-pill deleteReport"
                        data-route="admin/reports/delete/${id}" ><i title="Download" class="la la-trash"></i></button>`;
                    }
                }
            ]
        });

        $('body').on('hide.bs.modal', '#cModal', function(e) {
            ReportsTable.reload();
        });

        picker.on('apply.daterangepicker', function (e) {
            ReportsTable.search(this.value, this.name);
        });

        $(document).off('click', '.deleteReport').on('click', '.deleteReport', function (e) {
            e.preventDefault();

            let self = $(this),
                url = self.attr('data-route');

            confirmAction({
                btn: 'btn-danger',
                action: 'Delete',
                message: '<i class="la la-trash text-danger display-4"></i> <br> <br> Are you sure you want to delete this report ?'
            }, function () {
                $.post(url, {
                    _token: $('meta[name="csrf-token"]').attr('content')
                }).then(function (response) {
                    ReportsTable.reload();
                    toastr.success(response.message);
                }, function (err) {
                    toastr.error('Failed To Delete!');
                });
            });
        });
    });

</script>
