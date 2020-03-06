
<div id="t_sitesettingtable"></div>

<script type="text/javascript">
    $('#t_sitesettingtable').KTDatatable({
    // datasource definition
        data: {
            type: 'remote',
            source: {
            read: {
                url: '/siteSetting/table',
                method: 'GET',
                params: {
                    "_token": "{{ csrf_token() }}"
                    },
                    //map: function(raw) {
                    // sample data mapping
                    //var dataSet = raw;
                    //if (typeof raw.original !== 'undefined') {
                    //	dataSet = raw.original;
                    //}
                    //return dataSet;
                //},
            },
            },
            pageSize: 50,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
        },

        // layout definition
        layout: {
            scroll: false,
            footer: false,
            minHeight: 500,
        },

        // column sorting
        sortable: true,

        pagination: true,

        // columns definition
        columns: [
        {
            sortable: 'asc',
            field: 'code',
            title: 'Code',
            type: 'text',
            selector: false,

            }, {
            field: 'value',
            title: 'Value',
            },
             {
            field: 'description',
            title: 'Description',
            selector: {
                class: 'data_col_height_fix'
            }
            },      
            {
            field: 'Actions',
            title: 'Actions',
            sortable: false,
            width: 130,
            overflow: 'visible',
            textAlign: 'center',
            template: function(row, index, datatable) {
                var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                return     '<a id="edit_sitesetting" class="btn btn-hover-brand btn-icon btn-pill model_load" data-route="/siteSetting/editmodal/'+row.id+'" href="JavaScript:void(0);" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
                                <i class="la la-edit"></i>\
                            </a>\
                            <a href="#" class="btn btn-hover-danger btn-icon btn-pill delButton" data-id="'+row.id+'" title="Delete">\
                                <i class="la la-trash"></i>\
                            </a>';
            },
            }],

    });
    
    $(document).off('click', '#edit_sitesetting').on('click', '#edit_sitesetting', function(e){
        e.preventDefault();
        showModal({
            url: $(this).data('route')	
        });
    }).off('click', '.delButton').on('click', '.delButton', function(e){
        e.preventDefault();
        let id= $(this).data('id');
        delConfirm({
            url:"/siteSetting/delete/"+id,
            header: $('#t_sitesettingtable')
        });
    });
</script>