<div class="kt-portlet">
    <div class="kt-portlet__head" style="min-height: 45px;">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="flaticon-add"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Suppliers
            </h3>
        </div>
        <div class="kt-subheader__wrapper" style="padding-top: 8px;">
        <a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm" id="add_c_supplier" data-route="/admin/campaign/suppliers/add/{{$campaign->id}}"><i class="la la-plus"></i>
                Supplier
            </a>
        </div>
    </div>
    <div class="kt-portlet__body kt-portlet__body--fit p-4">
        <div id="t_c_supplier"></div>
    </div>
</div>
<script>
    var supplierTable = $('#t_c_supplier').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/campaign/activites/list/{{$campaign->id}}',
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
        rows:{
            afterTemplate: function(){
                active_current_row()
            }
        },
        // columns definition
        columns: [
            {
                // sortable: true,
                field: 'company_id',
                title: 'Company Name',
                width:200,
                template: function(row, index, datatable) {
                    return 'ABC Company';
                },
            },
            {
                // sortable: true,
                field: 'company_id',
                title: 'Type of Service',
                width:200,
                template: function(row, index, datatable) {
                    return 'Art Work';
                },
            },
            {
                // sortable: true,
                field: 'Cost',
                title: 'Cost ($)',
                width:80,
                template: function(row, index, datatable) {
                    return Number(row.budget).toFixed(2);
                },
            },
            {
                sortable: true,
                field: 'status',
                title: 'Status',
                type: 'text',
                width: 100,
                class: 'kt-datatable--off-click_over_action_btn',
                template(row){
                    if(row.is_active){
                        if(row.is_default)
                        return `<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill" style="padding:10px 15px;">Default</span>`;
                        return `<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill" style="padding:10px 15px;">Active</span>`;
                    }
                        if(row.is_default)
                        return `<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Default</span>`;
                        return `<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Inactive</span>`;
                }
            },
            {
                // sortable: true,
                field: 'Activites',
                title: 'Conversion',
                width:80,
                template: function(row, index, datatable) {
                    return row.name
                },
            },
            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
				textAlign: 'center',
                class: 'pr-0',
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return `
                        <a class="btn btn-hover-brand btn-default btn-icon btn-pill" data-route="/admin/campaign/activites/edit/${row.id}" style="border:none;">
                            <i class="la la-edit" title="view Item"></i>
                        </a>
                        <a class="btn btn-hover-brand btn-default btn-icon btn-pill" data-route="/admin/campaign/activites/sdelete/${row.id}" style="border:none;">
                            <i class="la la-trash" title="view Item"></i>
                        </a>`;
                },
            },
        ],
    });

    clickEvent('#add_c_supplier')(supplierAddModal);

    function supplierAddModal()
    {
        let url= $(this).attr('data-route');
        showModal({
            url,
            c:1
        });
    }
</script>