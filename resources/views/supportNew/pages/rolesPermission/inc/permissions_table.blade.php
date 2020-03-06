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
									<label>Permission Name</label>
									<input type="text" class="form-control kt-input" placeholder="Full name" data-col-index="0">
								</div>
								<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
									<label>Action</label>
									<input type="text" class="form-control kt-input" placeholder="E.g: 123" data-col-index="1">
								</div>
							</div>
							<div class="row kt-margin-b-20">
								<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
									<label>Page Name</label>
									<input type="text" class="form-control kt-input" name="MobileNumber" placeholder="Mobile phone" data-col-index="1">
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
					<input type="text" class="form-control m-input" placeholder="Search by permission name" id="permission_name">
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
<div id="t_permissionstable"></div>

<script type="text/javascript">
$('#t_permissionstable').KTDatatable({
  // datasource definition
	  data: {
	    type: 'remote',
	    source: {
	      read: {
	        url: '/admin/getDatatable/'+'permissions',
	        method: 'GET',
	        params: {
				"_token": "{{ csrf_token() }}"
				},
			//   map: function(raw) {
			//   // sample data mapping
			//   alert('map');
	        //   var dataSet = raw;
	        //   if (typeof raw.data !== 'undefined') {
	        //     dataSet = raw.data;
	        //   }
	        //   return dataSet;
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
	      field: 'permission_name',
	      title: 'Name',
	    }, {
	      field: 'action',
	      title: 'Action',
	       
	    },{
			sortable: false,
            field: 'pages',
            title: 'Page',
			template: function(row, index, datatable){
				let temp ='';
				row.pages.forEach(function(data, index){
					temp+= `<span class="kt-badge kt-badge--info kt-badge--inline">${data.page_name} </span>`	
				})
				return temp;
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
        return     '<a  id="edit_permission" class="btn btn-hover-brand btn-icon btn-pill model_load" data-route="/admin/rolePermissions/edit/permission/'+row.id+'" href="JavaScript:void(0);" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
                        <i class="la la-edit"></i>\
                    </a>\
                    <a href="#" class="btn btn-hover-danger btn-icon btn-pill delButton" data-id="'+row.id+'" title="Delete">\
                        <i class="la la-trash"></i>\
                    </a>';
	      },
	    }],

});

$(document).off('click', '#edit_permission').on('click', '#edit_permission', function(e){
		e.preventDefault();
		showModal({
			url: $(this).data('route')
		});
	}).off('click', '.delButton').on('click', '.delButton', function(e){
		e.preventDefault();
		let id= $(this).data('id');
		delConfirm({
			url:"/admin/rolePermissions/delete/permission/"+id,
			header: $('#t_permissionstable')
		});
	});

	$(document).on('keyup','#permission_name',  function(e){
		if($(this).val().length >= 3){
			$('#t_permissionstable').KTDatatable().search($(this).val(), 'permission_name');	
		
		}
		if($(this).val() == ''){
			$('#t_permissionstable').KTDatatable().search($(this).val(), 'permission_name');
			
		}
	});

</script>