<div class="row search_row">
		<div class="col-xl-8 order-2 order-xl-1 serach_col">
			<div class="form-group m-form__group row align-items-center" style="margin-left:0px;">
				<div class="col-md-6">
					<div class="m-input-icon m-input-icon--left">
						<input type="text" class="form-control m-input" placeholder="Search by keywords" id="cms_post_title">
						<span class="m-input-icon__icon m-input-icon__icon--left">
							<span>
								<i class="la la-search"></i>
							</span>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="rp_btn col-xl-4 order-1 order-xl-2">
			
			<div class="kt-subheader__wrapper">
			<button type="button" class="btn btn-bold btn-label-brand btn-sm add_field" data-toggle="modal" data-target="#sys_icon_model" data-id = '{{$template}}' id='add_cms_post'>

					<span>
						<i class="la la-plus"></i>
						<span>
							Post
						</span>
					</span>
				</button>
			</div>
		</div>
	</div>

	<div id="t_cmsposttable"></div>

    <script type="text/javascript">
    var temp_id = $('#cms_template_view').attr('data-id');
	$('#t_cmsposttable').KTDatatable({
	// datasource definition
		data: {
			type: 'remote',
			source: {
			read: {
				url: '/cms/table/post/'+temp_id,
				method: 'GET',
				params: {
					"_token": "{{ csrf_token() }}"
					},
				// 	map: function(raw) {
                //     // sample data mapping
                //     console.log(raw);
				// 	var dataSet = raw;
				// 	if (typeof raw.original !== 'undefined') {
				// 		dataSet = raw.original;
				// 	}
				// 	return dataSet;
				// },
			},
			},
			pageSize: 10,
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
				sortable:false,
				field: '#',
				title: '#',
				width: 12,
				template: function(row, index, datatable){
				return '#';
			}
			},
		{
			sortable: 'asc',
			field: 'title',
			title: 'Title',
			color: 'red',
			type: 'text',
			selector: false,

			}, {
			field: 'created_at',
			title: 'Created at',
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
				return     '<a class="btn btn-hover-brand btn-icon btn-pill model_load edit_cms_post" data-route="/cms/editmodal/post/'+row.id+'" href="JavaScript:void(0);" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
								<i class="la la-edit"></i>\
							</a>\
							<a href="#" class="btn btn-hover-danger btn-icon btn-pill delButton" data-id="'+row.id+'" title="Delete">\
								<i class="la la-trash"></i>\
							</a>';
			},
			}],

	});
	
	$(document).off('click', '#add_cms_post').on('click', '#add_cms_post', function(e){
		e.preventDefault();
		e.stopPropagation();
		let template_id = $(this).attr('data-id');
		showModal({
			url: 'cms/addmodal/post/'+template_id	
		});
	}).off('click', '.edit_cms_post').on('click', '.edit_cms_post', function(e){
		e.preventDefault();
		showModal({
			url: $(this).data('route')	
		});
	}).off('click', '.delButton').on('click', '.delButton', function(e){
		e.preventDefault();
		let id= $(this).data('id');
		delConfirm({
			url:"/cms/delete/post/"+id,
			header: $('#t_cmsposttable')
		});
	});

	$(document).ready(function () {
        $('.dropdown-toggle').dropdown();
		$('#cms_post_title').on('keyup', function(e){
			// $('#dropDownSelected').html(selectedField);

			if($(this).val().length >= 3){
				$('#t_cmsposttable').KTDatatable().search($(this).val(), 'title');	
			
			}
			if($(this).val() == ''){
				$('#t_cmsposttable').KTDatatable().search($(this).val(), 'title');
				
			}
		});	
	});
	
	</script>