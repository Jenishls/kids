<div class="kt-portlet__body kt-portlet__body--fit">
    <div class="kt-invoice-2">	
        <div class="kt-invoice__body">
            <div class="kt-invoice__container">
                <div id="mailLogdataTable">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var mailTable = $('#mailLogdataTable').KTDatatable({        
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/mail/allMails/Order/{{$order->id}}',
                    method: 'get',
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
        autoColumns: true,

        // layout definition
        layout: {
            scroll: false,
            footer: false,
        },

        // column sorting
        sortable: true,

        pagination: false,


        // columns definition
        columns: [
            {
                // sortable: true,
                field: 'created_at',
                title: 'Date',
                // width:120,
                template: function(row, index, datatable) {
                    return moment(row.created_at).format('MM/DD/YYYY');
                },
            },
            {
                // sortable: true,
                field: 'subject',
                title: 'Subject',
                // width:100,

            },
            // {
            //     // sortable: true,
            //     field: 'order.order_no',
            //     title: 'Order #',
            //     // width:100,

            // },
            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
				textAlign: 'center',
                class: 'pr-0',
				width: 80,
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return '<a class="btn btn-hover-brand btn-icon btn-pill viewMail" data-route="/admin/mail/view/'+row.id+'"><i class="la la-eye" title="Add Item"></i></a>';
                },
            }
        ],

    });

    $(document).off('click', '.viewMail').on('click', '.viewMail', function(e) {
			e.preventDefault();
			e.stopPropagation();
			showModal({
				url: $(this).data('route')
			});
		})
</script>