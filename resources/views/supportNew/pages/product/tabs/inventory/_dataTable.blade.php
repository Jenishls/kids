<script>
    var clientsTable = $('#productInventoryDataTable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/products/tab/inventory/data/{{$product->id}}',
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
                field: 'name',
                title: 'Name',

            },
            {
                // sortable: true,
                field: 'company_name',
                title: 'Company',

            },
            {
                // sortable: true,
                field: 'size',
                title: 'Size',

            },
            {
                // sortable: true,
                field: 'color',
                title: 'Color',

            },
            {
                // sortable: true,
                field: 'quantity',
                title: 'Quantity',

            },
            {
                // sortable: true,
                field: 'price',
                title: 'Price',
                width: 70,

            },
            {
                // sortable: true,
                field: 'inv_hold',
                title: 'Hold',
                width: 70,

            },
            {
                // sortable: true,
                field: 'inv_sold',
                title: 'Sold',
                width: 70,

            },
            {
                // sortable: true,
                field: 'inv_return',
                title: 'Return',
                width: 70,

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
                    return '<a class="btn btn-hover-brand btn-icon btn-pill model_load edit_inv" data-route="/admin/products/tab/inventory/edit/'+row.id+'" data-toggle="modal"  title="Edit details">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-hover-danger btn-icon btn-pill del_inventory" data-url ="admin/products/tab/inventory/delete/'+row.id+'" title="Delete">\
                            <i class="la la-trash"></i>\
                        </a>';
                },
            }

        ],

    });

    $(document).off('click', '.edit_inv').on('click', '.edit_inv', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let url = $(this).attr("data-route");
        showModal({
            url: url,
            width: '100%',
            c:1
        });
    });    
    
    $(document).off('click', '.del_inventory').on('click', '.del_inventory', function(e){
        e.preventDefault();
        delConfirm({
			url: $(this).attr('data-url'),
			header: $('#productInventoryDataTable')
        });
    })

</script>