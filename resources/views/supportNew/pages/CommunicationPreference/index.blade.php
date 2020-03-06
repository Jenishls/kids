<style type="text/css">
	/*.industry_search span {
	    border: 1px solid #d5f2ff00;
	    background-color: rgba(34, 185, 255, 0);
	}*/
	/*.select2-selection__rendered {
	  line-height: 15px !important;
	}

	.select2-selection {
	  height: 32px !important;
	}*/
	/*action buttons on click event*/
		.action-menu{
		    position: absolute;
		    background-color: #e8f8ff;
		    padding: 3px;
		    border: 1px solid #fff;
		    border-radius: 64px;
		    z-index: 9;
		    transform: translateY(-18px);
		}
		.quickActionList{
			z-index: 3;
		}
		.action-menu ul:after{
		  content: "";
	      position: absolute;
	      right: 40%;
	      bottom: -20px;
	      width: 0;
	      height: 0;
	      border-top: 10px solid transparent;
	      border-right: 16px solid #e8f8ff;
	      transform: rotate(270deg);
	      border-bottom: 13px solid transparent;
		  z-index: 0;

		}
		.action-menu ul{
			margin:0;
			list-style: none;
			display: flex;
			padding: 0;
		}

	.btn_p_p4rem{
		padding: 0.50rem 0.60rem!important;
	    font-size: 0.9rem!important;
	}
	.industry_search .bootstrap-select > .dropdown-toggle{
		padding: 0.50rem 0.60rem!important;
	    font-size: 0.9rem!important;
		border-left: none!important;
	}
	.industry_search .bootstrap-select.show > .dropdown-toggle.btn-light, .bootstrap-select.show > .dropdown-toggle.btn-secondary {
	    border-color: #e2e5ec!important;
		border-left: none!important;
	}
	.userAdvSearchDropDown{
		width: 800px!important;
	}
	.bodyContent {
	    padding: 11px 24px!important;
	}
	.userAdvSearchDropDown  label {
	    font-size: 0.9rem!important;
	    font-weight: 500!important;
	}
</style>
<div id="datatable_container" class="usersControlContent">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Communication Preferences
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Table</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Communication Preferences</a>
				</div>
			</div>
		</div>
		<div class="kt-subheader__wrapper">
			<a href="#" class="btn btn-pill btn-brand btn-elevate btn-icon-sm" id="add_communication">
				<i class="la la-plus"></i>
				Communication
			</a>
		</div>
	</div>
	<div id="t_communication_table">
		<div class="alert alert-light alert-elevate search_top_container" role="alert">
			<div class="alert-text">
				<div class="row">
					<div class="col-xl-8 order-1 order-xl-1 serach_col user_search_col userSearchCol">
						<div class="form-group m-form__group row align-items-center ">
							<div class="col-md-4 col-sm-4">
								<div class="input-group input-group-sm userInputGroup">
									<div class="input-group-prepend">
										<button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Communication Name</button>
									</div>
									<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="name">
								</div>
							</div>
							<div class="col-md-4 col-sm-4">
								<div class="input-group input-group-sm userInputGroup">
									<div class="input-group-prepend">
										<button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Communication Type</button>
									</div>
									<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.."  autocomplete="off" name="comm_type">
								</div>
							</div>
							<div id="reload_table">
								<i class="fas fa-redo searchRedo"></i>
							</div>
						</div>
					</div>
					<div class="rp_btn col-xl-4 order-1 order-xl-1" style="display:inline-flex;">
						{{-- <div class="userTableReset">
							<button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="userTableReload"><i class="fa fa-undo"></i></button>
						</div> --}}
						<div class="dropdown dropdown-inline exportBtn">

							<button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-download"></i></button>

							<div class="dropdown-menu dropdown-menu-right">
								<ul class="kt-nav">
									<li class="kt-nav__section kt-nav__section--first">
										<span class="kt-nav__section-text">Choose an option</span>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon la la-file-text-o"></i>
											<span class="kt-nav__link-text exportTo" data-export-to="csv">CSV</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon la la-file-pdf-o"></i>
											<span class="kt-nav__link-text exportTo" data-export-to="pdf">PDF</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script> --}}
	<script type="text/javascript">
		var commTable = $('#t_communication_table').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: '/admin/communication_preferences/data',
						method: 'get',
						// params: {
						// 	"_token": "{{ csrf_token() }}"
						// },
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
					sortable: true,
					field: 'name',
					title: 'Name',
					type: 'text',
				},
				{
					sortable: true,
					field: 'comm_type',
					title: 'Communication Type',
					type: 'text',
				},
				{
					sortable: true,
					field: 'comm_msg',
					title: 'Message',
					type: 'text',
				},
				{
					sortable: true,
					field: 'status',
					title: 'Status',
					type: 'text',
					template: function(row, index, datatable)
					{
						if(row.is_active){
								return '<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Success</span>';
						}
						return '<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Inactive</span>';
					}
				},
				{
					field: 'Action',
					title: 'Actions',
					sortable: false,
					textAlign: 'center',
					overflow: 'visible',
					width: 130,
					template: function(row, index, datatable) {
						var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
						return '<div class="custom_a_btn_popover"><a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill edit_account" data-route="/admin/communication_preferences/edit/' + row.id + '" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
								<i class="la la-edit"></i>\
							</a>\<a href="#" class="btn btn-hover-danger btn-icon btn-pill delButton" data-id="' + row.id + '" title="Delete" data-route="/admin/communication_preferences/delete/' + row.id + '"\
								<i class="la la-trash"></i>\
							</a><div>';
					},
				}
			],

		});
		
	$(document).ready(function() {
		let initPicker = $('.comm_type_picker').selectpicker({
            liveSearch: true,
            showTick: true,
            actionsBox: true,
            doneButton : true, 
            doneButtonText : "Apply",
        });
		 commTable.on('kt-datatable--on-init', function() {
		 	$('[data-toggle="kt-tooltip"]').tooltip();
	      	$(".text_to_p_mask").text(function(i, text){
				text = text.replace(/(\d{3})(\d{3})(\d{4})/, "($1) $2 $3");
				return text;
			});
	    });
	    const basicSearch = (advanced = false, cb = "default cb") => {
	        if (advanced) {
	            commTable.setDataSourceParam("query", {});
	        } else {
	            let sanitized = commTable.getDataSourceQuery('query');
	            if (sanitized.advanced) delete sanitized.advanced;
	            commTable.setDataSourceParam("query", sanitized);
	        }
	        typeof cb === "function" ? cb() : '';
	    }
	    $(document)
	    .off("click", ".bs-donebutton")
	    .on("click", ".bs-donebutton", function(e) {
	        e.preventDefault();
	        basicSearch(false, () => {
		    	commTable.search($('.comm_type_picker').val(), 'comm_type');
			});	
	    });
	    $('.basic--search').off('blur keyup').on('blur keyup', function(e) {
	    	if( e.which && e.which != 13){
	    		return;
	    	}
	    	if($(this).val().length > 2 || $(this).val().length == 0)
    		{
    			basicSearch(false, () => {
    			    commTable.search($(this).val(), $(this).attr('name'));
    			});	
    		}
	    });
	    $('#reload_table').on('click', function(e) {
	        e.preventDefault();
	        $('.userInputGroup').find('input').val('');
	        commTable.setDataSourceParam("query",{});
	        $('#t_communication_table').KTDatatable().reload();
	        localStorage.removeItem("t_communication_table-1-meta");
	    });
	    $(document).find("#statusSelect2").select2({
	    	width:'100%'
	    });
	});
		$(document).on('click', '#adv_reset', function(e) {
	        e.preventDefault();
	        $(this).closest('form').find('input').val('');
	        $('#advSearchBtn').trigger('click');
	    });
		$(document).off('click', '.exportTo').on('click', '.exportTo', function(e) {
		    e.preventDefault();
		    e.stopPropagation();
		    window.open('/export/account/' + $(this).attr('data-export-to'));
		});
	    $(document).off('click', '#add_communication').on('click', '#add_communication', function(e) {
	    e.preventDefault();
	    e.stopPropagation();
	    showModal({
	        url: '/admin/communication_preferences/add',
	        width: '100%',
	        c: 1
	    });
	}).off('click', '.edit_communication').on('click', '.edit_communication', function(e) {
	    e.preventDefault();
	    e.stopPropagation();
	    showModal({
	        url: $(this).data('route'),
	        c: 1
	    });
	}).off('click', '.delButton').on('click', '.delButton', function(e) {
	    e.preventDefault();
	    delConfirm({
	        url: $(this).data('route'),
	        header: $('#t_account_table')
	    });
        });
	</script>
</div>