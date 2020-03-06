<style>
.data_col_height_fix{
    height:40px!important;
    overflow:auto!important;
}
.kt-datatable__table{
    padding:10px!important;
}  
</style>
<div id="datatable_container" class="usersControlContent">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Audit
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">SETTINGS</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">Audit</a>
				</div>
			</div>
		</div>
	</div>
	<div id="t_audittable">
		<div class="row site_search_row">
			<div class="col-xl-8 order-1 order-xl-1 serach_col user_search_col userSearchCol">
				<div class="form-group m-form__group row align-items-center ">
                    {{-- <div class="col-md-3 col-sm-3">
						<div class="input-group mb-3 input-group-sm userInputGroup">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-code">Username</span>
							</div>
							<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-code" placeholder="search.." id="username_search" autocomplete="off">
						</div>
					</div> --}}
					<div class="col-md-3 col-sm-3">
						<div class="input-group mb-3 input-group-sm userInputGroup">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-code">Table</span>
							</div>
							<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-code" placeholder="search.." id="table_search" autocomplete="off">
						</div>
					</div>
					<div class="col-md-3 col-sm-3">
						<div class="input-group mb-3 input-group-sm userInputGroup">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-value">Activity</span>
							</div>
							<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-value" placeholder="search.." id="activity_search">
						</div>
					</div>
                    
				</div>
			</div>
			
		</div>
        @include('support.pages.audit.audittable')
	</div>
</div>
{{-- <script type="text/javascript">
    $('#t_audittable').KTDatatable({
    // datasource definition
        data: {
            type: 'remote',
            source: {
            read: {
                url: '/system/auditdata',
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
            scroll: true,
            footer: false,
        },

        // column sorting
        sortable: true,

        pagination: false,
        
        // columns definition
        columns: [
            {
                field: 'id',
                title: '#',
                width: 12,
                template: function(row, index, datatable){
                    return '<div>#</div>';
                },
                autohide: true,
            },
            {
                field: 'user_name',
                title: 'User Name',
            }, 
            {
                field: 'table_name',
                title: 'Table Name',
            },
            {
                field: 'activity',
                title: 'Activity',
            }, 
            {
                field: 'old_data',
                title: 'Old Data',
                
            },
            {
                field: 'new_data',
                title: 'New Data',
            },	
            {
                field: 'userc_date',
                title: 'Modified Date',
            }, 
            {
                field: 'userc_time',
                title: 'Modified Time',
            },
            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
                textAlign: 'center',
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return     '<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load view_audit_detail" data-id="'+row.id+'" data-route="/audit/details/'+row.id+'" data-toggle="modal" data-target="#sy_global_modal"  title="View audit details">\
                                    <i class="la la-eye"></i>\
                                </a>';
                }
            }
        ],
    });

    $(document).ready(function () {
		$('#table_search').on('keyup', function(e){

			if($(this).val().length >= 3){
				$('#t_audittable').KTDatatable().search($(this).val(), 'table_name');	
			
			}
			if($(this).val() == ''){
				$('#t_audittable').KTDatatable().search($(this).val(), 'table_name');
				
			}
		});	

		$('#activity_search').on('keyup', function(e){

			if($(this).val().length >= 3){
				$('#t_audittable').KTDatatable().search($(this).val(), 'activity');	
			
			}
			if($(this).val() == ''){
				$('#t_audittable').KTDatatable().search($(this).val(), 'activity');
				
			}
		});	
    });	
</script> --}}