<div id="t_audittable"></div>

<script type="text/javascript">
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

        pagination: true,
        
        // columns definition
        columns: [
            {
                field: 'id',
                title: '#',
                width: 12,
                template: function(row, index, datatable){
                    return '<div>#</div>';
                },
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
                    let new_data = JSON.stringify(row.new_data);
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return     '<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load view_audit_detail" data-table="audits" data-new="'+new_data+'" data-route="/audit/details/'+row.id+'" data-toggle="modal" data-target="#sy_global_modal"  title="View audit details">\
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
</script>