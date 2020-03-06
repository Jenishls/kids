<div class="kt-portlet">
    <div class="kt-portlet__head" style="min-height: 45px;">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="flaticon-add"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Assets
            </h3>
        </div>
        <div class="kt-subheader__wrapper" style="padding-top: 8px;">
            <a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm" id="add_c_activites"><i class="la la-plus"></i>
                Asset
            </a>
        </div>
    </div>
    <div class="kt-portlet__body kt-portlet__body--fit p-4">
        <div id="t_c_assets"></div>
    </div>
</div>
<script>
    var assetsTable = $('#t_c_assets').KTDatatable({
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
            field: 'name',
            title: 'Name',
            template: function(row, index, datatable) {
                var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                return row.name;
            },
    
        },
        {
            // sortable: true,
            field: 'reference',
            title: 'Reference',
            width:80,
            template: function(row, index, datatable) {
                return 'Email'
            },
        },
        {
            // sortable: true,
            field: 'Type',
            title: 'type',
            width:80,
            template: function(row, index, datatable) {
                return '-'
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
                        <a title="Download file" data-route="/admin/campaign/assets/download/" class="btn btn-hover-brand btn-icon btn-pill downloadFile">
                            <i class="la la-download"></i>
                        </a>`;
            },
        },
        ],
    });
</script>