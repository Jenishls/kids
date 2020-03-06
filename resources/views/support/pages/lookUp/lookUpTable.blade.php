

<script type="text/javascript">
	var lookUpTable= $('#t_lookUpTable').KTDatatable({
	// datasource definition
		data: {
			type: 'remote',
			source: {
			read: {
				url: '/lookUp/list',
				method: 'get',
				params: {
					"_token": "{{ csrf_token() }}"
				},
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
			pageSize:50,
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

		pagination:true,

		
		// columns definition
		columns: [
		{
				sortable: 'asc',
				field: 'code',
				title: 'Code',
				type: 'text',
				width: 150
			},
			{
				sortable: 'asc',
				field: 'section_id',
				title: 'Section Id',
			},
			{
			field: 'value',
			title: 'value',
			
			},
			 {
			field: 'description',
			title: 'Description',
			
			},    
			{
			field: 'Actions',
			title: 'Actions',
			sortable: false,
			overflow: 'visible',
			textAlign: 'center',
			template: function(row, index, datatable) {
				var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
				return     '<a class="btn btn-hover-brand btn-icon btn-pill" id ="get_profile" onclick="event.preventDefault();" data-route="/users/userProfile/'+row.id+'"><i class="la la-eye" title="View profile"></i></a>\<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load edit_user" data-route="/users/edit/'+row.id+'" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
								<i class="la la-edit"></i>\
							</a>\<a class="btn btn-hover-brand btn-icon btn-pill pageLoad changePassword" data-toggle="modal" data-route="/users/changePassword/'+row.id+'" data-id="'+row.id+'" title="Update password"><i class="fas fa-key" style="font-size: 1.1rem;"></i></a>\
							<a href="#" class="btn btn-hover-danger btn-icon btn-pill delButton" data-id="'+row.id+'" title="Delete">\
								<i class="la la-trash"></i>\
							</a>';
			},
			}],

	});


	
</script>