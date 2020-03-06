	<div class="row search_row">
		<div class="col-xl-8 order-2 order-xl-1 serach_col">
			<div class="form-group m-form__group row align-items-center" style="margin-left:0px;">
				{{-- <div class=" userFilterSearch">
					<div class="dropdown userAdvSearch">
						<button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle waves-effect waves-light" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i title="Advanced search" class="fas fa-filter"></i></button>
						<div class="dropdown-menu userAdvSearchDropDown">
								<span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust" style="right: auto; left: 20.5px;"></span>
							<div class="bodyContent">
							<form class="kt-form kt-form--fit" id="userAdvSearchForm">
								<div class="row kt-margin-b-20">
									<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
										<label>Page Name</label>
										<input type="text" class="form-control kt-input" placeholder="Full name" data-col-index="0">
									</div>
									<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
										<label>Action</label>
										<input type="text" class="form-control kt-input" placeholder="E.g: 123" data-col-index="1">
									</div>
								</div>
								
							</div>
								<div class="row userAdvFooter">
									<div class="footerLeftBtns">
									<div>
										<button class="btn btn-secondary btn-secondary--icon" id="adv_close">
											Close
										</button>
									</div>
									<div class="advSearchResetBtn">
										<button class="btn btn-secondary btn-secondary--icon" id="adv_reset">
											Reset
										</button>
									</div>
									</div>	
									<div class="">
										<button class="btn btn-primary btn-brand--icon" id="kt_search">
											Apply
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div> --}}
				<div class="col-md-6">
					<div class="m-input-icon m-input-icon--left">
						<input type="text" class="form-control m-input" placeholder="Search by page name" id="page_name">
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
				<button type="button" class="btn btn-bold btn-label-brand btn-sm add_field" data-toggle="modal" data-target="#sys_icon_model" id='add_field'>Add</button>
			</div>
		</div>
	</div>

	<div id="t_pagestable"></div>

	<script type="text/javascript">
	$('#t_pagestable').KTDatatable({
	// datasource definition
		data: {
			type: 'remote',
			source: {
			read: {
				url: '/admin/getDatatable/'+'pages',
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
			field: 'page_name',
			title: 'Page Name',
			color: 'red',
			type: 'text',
			selector: false,

			}, {
			field: 'action',
			title: 'Action',
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
				return     '<a id="edit_page" class="btn btn-hover-brand btn-icon btn-pill model_load" data-route="/admin/rolePermissions/edit/page/'+row.id+'" href="JavaScript:void(0);" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
								<i class="la la-edit"></i>\
							</a>\
							<a href="#" class="btn btn-hover-danger btn-icon btn-pill delButton" data-id="'+row.id+'" title="Delete">\
								<i class="la la-trash"></i>\
							</a>';
			},
			}],

	});
	
	$(document).off('click', '#add_page').on('click', '#add_page', function(e){
		e.preventDefault();
		e.stopPropagation();
		showModal({
			url: '/admin/callModal/'+'page'	
		});
	}).off('click', '#edit_page').on('click', '#edit_page', function(e){
		e.preventDefault();
		showModal({
			url: $(this).data('route')	
		});
	}).off('click', '.delButton').on('click', '.delButton', function(e){
		e.preventDefault();
		let id= $(this).data('id');
		delConfirm({
			url:"/admin/rolePermissions/delete/page/"+id,
			header: $('#t_pagestable')
		});
	});

	$(document).ready(function () {
        $('.dropdown-toggle').dropdown();
		$('#page_name').on('keyup', function(e){
			// $('#dropDownSelected').html(selectedField);

			if($(this).val().length >= 3){
				$('#t_pagestable').KTDatatable().search($(this).val(), 'page_name');	
			
			}
			if($(this).val() == ''){
				$('#t_pagestable').KTDatatable().search($(this).val(), 'page_name');
				
			}
		});	
	});
	
	</script>