<script>
var clientsTable = $('#productColorDataTable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/products/tab/color/data/{{$product->id}}',
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
                field: 'color_code',
                title: 'Code',

            },{
                // sortable: true,
                field: 'color',
                title: 'Name',

            },
            {
                // sortable: true,
                field: 'seq_no',
                title: 'Sequence No',

            },
            {
                // sortable: true,
                field: 'image',
                title: 'Image',
                template: function(row, index, datatable) {
                    return `<div class="kt-widget4__pic kt-widget4__pic--pic">
                                <img style="width: 100px; height: 50px;" src="/admin/products/color/image/${row.image}" alt="">   
                            </div>`;
                },

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
                    return '<a class="btn btn-hover-brand btn-icon btn-pill model_load edit_color" data-route="/admin/products/tab/color/edit/'+row.id+'" data-toggle="modal"  title="Edit details">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-hover-danger btn-icon btn-pill del_color" data-url ="admin/products/tab/color/delete/'+row.id+'" title="Delete">\
                            <i class="la la-trash"></i>\
                        </a>';
                },
            }
        ],

    });

    $(document).off('click', '.edit_color').on('click', '.edit_color', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let url = $(this).attr("data-route");
        showModal({
            url: url
        });
    }); 

    $(document).off('click', '.del_color').on('click', '.del_color', function(e){
        e.preventDefault();
        delConfirm({
			url: $(this).attr('data-url'),
			header: $('#productColorDataTable')
        });
    })
</script>