<div id="businessHoursTable"></div>
<script type="text/javascript">
    var defaultCompanyTable = $('#businessHoursTable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/hours/list',
                    method: 'get',
                    // params: {
                    // 	"_token": "{{ csrf_token() }}"
                    // },
                    map: function(raw) {
                        // sample data mapping
                        var dataSet = raw;
                        if (typeof raw.data !== 'undefined') {
                            dataSet = raw.data;
                        }
                        return dataSet;
                    },
                },
            },
            pageSize: 50,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
            //saveState: true 
        },

        // layout definition
        layout: {
            scroll: true,
            footer: false,
            height:255
        },

        // column sorting
        sortable: true,

        pagination: false,


        // columns definition
        columns: [{
                sortable: true,
                field: 'day',
                title: 'Day',
                type: 'text',
                width:100

            },
            {
                field: 'open_time',
                title: 'Opens',
                type: 'text',
                
                
            },
            {
                field: 'close_time',
                title: 'Closes',
                type: 'text',
            },
            {
                field: 'status',
                title: 'Status',
                type: 'text',
                width:80
            },

            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
                textAlign: 'center',
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return '<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load updateHour" data-route="/hour/updateModal/' + row.id + '" data-toggle="modal" data-target="#sy_global_modal"  title="Update details">\
								<i class="la la-edit"></i>\
							</a>\
							<a href="#" class="btn btn-hover-danger btn-icon btn-pill delHourBtn" data-id="' + row.id + '" title="Delete">\
								<i class="la la-trash"></i>\
							</a>';
                },
            }
        ],

    });


    $(document).off('click', '.updateHour').on('click', '.updateHour', function(e) {
        e.preventDefault();
        showModal({
            url: $(this).data('route')
        });
    }).off('click', '.delHourBtn').on('click', '.delHourBtn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        delConfirm({
            url: "hour/delete/" + id,
            header: $('#businessHoursTable')
        });
    });

    // $(document).ready(function() {
    //     $('#propertySearch').on('keyup', function(e) {
    //         if (e.which === 13) {
    //             if ($(this).val().length >= 3) {
    //                 defaultCompanyTable.search($(this).val(), 'property');
    //             }
    //         }
    //         if ($(this).val() == '') {
    //             defaultCompanyTable.search($(this).val(), 'property');

    //         }

    //     });

    // });
</script>