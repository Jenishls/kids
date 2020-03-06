<div id="datatable_container" class="">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Tax Master
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Table</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Tax Master</a>
				</div>
			</div>
		</div>
		<div class="kt-subheader__wrapper">
			<a href="#" class="btn btn-brand btn-elevate btn-icon-sm btn-pill" id="add--tax">
				<i class="la la-plus"></i>
				Tax
			</a>
		</div>
    </div>

    <div id="tax_master_table">
    </div>
</div>
<script>
    var taxmasterTable = $('#tax_master_table').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/taxmaster/data/list',
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
            pageSize: 20,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
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
                width: 30,
                template: function(row, index, datatable) {
                    return index+1;
                }

            },
            {
                field: 'tax_code',
                title: 'Tax Code',
                type: 'text',
            },
            {
                field: 'tax_name',
                title: 'Tax Name',
                type: 'text',
                selector: false,
                textAlign: 'center',
            },
            {
                sortable: false,
                field: 'type',
                title: 'Type',
                type: 'text',
            },
            {
                field: 'value',
                title: 'Value',
                type: 'text',
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
                return '<a  class="btn btn-hover-brand btn-icon btn-pill model_load edit--tax"  data-id="'+row.id+'" href="JavaScript:void(0);" data-toggle="modal" data-target="#sys_model"  data-route="/admin/taxmaster/edit/tax/' + row.id + '" title="Edit details">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a class="btn btn-hover-danger btn-icon btn-pill del tax--delete"  data-id="'+row.id+'" title="Delete">\
                            <i class="la la-trash"></i>\
                        </a>';
            },
            }],
    });

    

    // edit add time
    $(document).off('click', '#add--tax').on('click', '#add--tax', function(e) {
        e.preventDefault();

        showModal({
            url: '/admin/taxmaster/addtax'
        });
    }).off('click', '.edit--tax').on('click', '.edit--tax', function(e) {
        e.preventDefault();
        showModal({
            url: $(this).data('route')
        });
    });
    
    // delete
    $(document).off('click', '.tax--delete').on('click', '.tax--delete', function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        delConfirm({
            url: `/admin/taxmaster/del/${id}`,
            header: $('#tax_master_table')
        });

    });

    // update tax
    

</script>