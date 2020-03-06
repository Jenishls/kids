<script>
var clientsTable = $('#productDataTable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/products/allData',
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
                field: 'salutation',
                title: 'Salutation',
                width: 100,

            },{
                // sortable: true,
                field: 'fname',
                title: 'Name',
                width: 300,
                // type: 'text',
                template: function(row, index, datatable) {
                    if(row.mname){
                        return row.fname + ' '+ row.mname+' '+ row.lname;
                    }else{
                        return row.fname + ' '+ row.lname;
                    }
                }

            }
            ,{
                field: 'dob',
                title: 'Date of Birth',
                type: 'date',

            },
            {
                field: 'email',
                title: 'Email',
                // width: 350,

            },
            {
                field: 'phone_no',
                title: 'Phone No.',
                // width: 350,
            },

            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
                textAlign: 'center',
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return '<a class="btn btn-hover-brand btn-icon btn-pill get_profile" onclick="event.preventDefault();" data-route="/client/clientProfile"><i class="la la-eye" title="View profile"></i></a>\<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load edit_client" data-route="/client/edit/'+row.id+'" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-hover-danger btn-icon btn-pill del_product" date-url ="admin/products/delete/'+row.id+'" title="Delete">\
                            <i class="la la-trash"></i>\
                        </a>';
                },
            }
        ],

    });

    $(document).off('click', '.del_product'),on('click', '.del_product', function(e){
        e.preventDefault();
        delConfirm({
            url: $(this).attr('data-url')
        });
    })
</script>