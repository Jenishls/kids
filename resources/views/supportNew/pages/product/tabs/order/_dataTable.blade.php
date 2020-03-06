<script>
    var clientsTable = $('#productOrderDataTable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/products/tab/order/data/{{$product->id}}',
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

        // layout definition
        layout: {
            scroll: false,
            footer: false,
        },

        // column sorting
        sortable: true,

        pagination: true,


        // columns definition
        columns: [
            {
                field: '#',
                title: '#',
                width: 50,
                template: function(row, index, datatable) {
                    return index+1;
                }

            },{
                // sortable: true,
                field: 'date',
                title: 'Date',

            },
            {
                // sortable: true,
                field: 'order_no',
                title: 'Order No',

            },
            {
                // sortable: true,
                field: 'customer_name',
                title: 'Customer',

            },
            {
                // sortable: true,
                field: 'purchase_items',
                title: 'Purchased Items',

            },
            {
                // sortable: true,
                field: 'Shipping_address',
                title: 'Shipping Address',

            },
            {
                // sortable: true,
                field: 'sattus',
                title: 'Status',

            },
            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
                textAlign: 'center',
                width: 150,
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return '<a class="btn btn-hover-brand btn-icon btn-pill model_load edit_feature" data-route="/admin/products/tab/feature/edit/'+row.id+'" data-toggle="modal"  title="Edit details">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-hover-danger btn-icon btn-pill del_feature" data-url ="admin/products/tab/feature/delete/'+row.id+'" title="Delete">\
                            <i class="la la-trash"></i>\
                        </a>';
                },
            }

        ],

    });

    $(document).off('click', '.edit_feature').on('click', '.edit_feature', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let url = $(this).attr("data-route");
        showModal({
            url: url
        });
    });            

    $(document).off('click', '.del_feature').on('click', '.del_feature', function(e){
        e.preventDefault();
        delConfirm({
			url: $(this).attr('data-url'),
			header: $('#productFeatureDataTable')
        });
    })

</script>