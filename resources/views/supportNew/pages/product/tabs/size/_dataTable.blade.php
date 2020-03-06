<script>
var clientsTable = $('#productSizeDataTable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/products/tab/size/data/{{$product->id}}',
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
                field: 'size',
                title: 'size',

            },{
                // sortable: true,
                field: 'long',
                title: 'Long',

            },
            {
                // sortable: true,
                field: 'wide',
                title: 'Width',

            },
            {
                // sortable: true,
                field: 'high',
                title: 'High',

            },
            {
                // sortable: true,
                field: 'measurement_type',
                title: 'Measurement Type',

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
                    return '<a class="btn btn-hover-brand btn-icon btn-pill model_load edit_size" data-route="/admin/products/tab/size/edit/'+row.id+'" data-toggle="modal"  title="Edit details">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-hover-danger btn-icon btn-pill del_size" data-url ="admin/products/tab/size/delete/'+row.id+'" title="Delete">\
                            <i class="la la-trash"></i>\
                        </a>';
                },
            }
        ],

    });

    $(document).off('click', '.edit_size').on('click', '.edit_size', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let url = $(this).attr("data-route");
        showModal({
            url: url
        });
    }); 

    $(document).off('click', '.del_size').on('click', '.del_size', function(e){
        e.preventDefault();
        delConfirm({
			url: $(this).attr('data-url'),
			header: $('#productSizeDataTable')
        });
    })
</script>