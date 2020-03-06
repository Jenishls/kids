<style type="text/css">
	
	.input-group-prepend button.searchByRoleSelectBtn:hover{
		background:#e8f8ff!important;
		border: 1px solid #e8f8ff!important;
	}
	.kt-datatable > .kt-datatable__table > .kt-datatable__head{
	    background: #e8f8ff !important;
	}
	.kt-datatable__table .kt-datatable__row th span {
	    font-size: 1rem!important;
	    font-weight: 600!important;
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
</style>
<div id="datatable_container" class="usersControlContent">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Content
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Table</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Account</a>
				</div>
			</div>
		</div>
		<div class="kt-subheader__wrapper">
			<a href="#" class="btn btn-pill btn-brand btn-elevate btn-icon-sm" id="add_content">
				<i class="la la-plus"></i>
				Content
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
			<div id="t_section_table">
				<div class="alert alert-light alert-elevate search_top_container" role="alert">
					<div class="alert-text">
						<div class="row">
							<div class="col-xl-10 order-1 order-xl-1 serach_col user_search_col userSearchCol">
								<div class="form-group m-form__group row align-items-center ">
									<div class="col-md-6 col-sm-3">
										<div class="input-group input-group-sm userInputGroup">
											<div class="input-group-prepend">
												<button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Title</button>
											</div>
											<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="industry_name_search" autocomplete="off" name="Company_name">
										</div>
									</div>
									<div class="col-md-6 col-sm-3">
										<div class="input-group input-group-sm userInputGroup">
											<div class="input-group-prepend">
												<button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Section</button>
											</div>
											<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="industry_name_search" autocomplete="off" name="phone_no">
										</div>
									</div>
									
									{{-- <div id="reload_table">
										<i class="fas fa-redo searchRedo"></i>
									</div> --}}
								</div>
							</div>
							<div class="rp_btn col-xl-2 order-1 order-xl-1" style="display:inline-flex;">
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
		</div>
		<div class="col-md-7">
			{{-- <div class="row">
				<div class="col-md-12">
					<h5><small class="pr-1 text-info">Category: </small> <span style="font-size: 1rem;">Websites</span></h5>
				</div>
			</div> --}}
			<div class="kt-portlet ">
			    <div class="kt-portlet__body">
					<div class="kt-portlet__content">
						<div class="row pb-2">
							<div class="col-md-6">
							 	<h5><small class="pr-1 text-info">Title:</small><span style="font-size: 1rem;">Can a Website Help You Beat Jet Lag?</span></h5>
							</div>
							<div class="col-md-3">
								<h5><small class="pr-1 text-info">Category: </small> <span style="font-size: 1rem;">Websites</span></h5>
							</div>
							<div class="col-md-3">
								<h5><small class="pr-1 text-info"> Section:</small> <span style="font-size: 1rem;"> Advertisement </span> </h5>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h5><small class="pr-1 text-info">Content: </small></h5>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto quo nulla, enim error soluta tenetur inventore et nemo labore debitis, id tempore autem assumenda ipsum! Libero iure, nobis quam autem. Et aliquam, tempore delectus quis, natus officiis veritatis odit reiciendis? Eveniet alias, deserunt distinctio eligendi suscipit odit! Mollitia, nisi illo, perferendis corrupti voluptatum, voluptatem aspernatur obcaecati commodi explicabo hic laudantium odio temporibus quisquam nostrum. Repellat atque esse velit voluptate vel ratione, delectus totam, minima harum iure blanditiis, consequuntur et, necessitatibus ipsum? Ullam veniam excepturi doloremque eaque accusamus in odit voluptatibus nulla nam animi fugit incidunt, quasi nihil, officia, porro. Ullam doloribus labore eos odit quas explicabo ad aliquam, quia est, autem quibusdam adipisci a, architecto in cupiditate voluptatem quo laboriosam, voluptates libero. Vero minima facere, repellat in consequuntur dolorum explicabo aut impedit enim sunt, ducimus dolorem molestiae quaerat sapiente. Enim perspiciatis odio rem, doloribus, modi sint est molestias harum ab explicabo, ipsum nesciunt numquam repudiandae quae iusto odit doloremque accusamus? Qui aliquam iusto eveniet rem, at, excepturi quia dolore itaque perferendis id nesciunt alias eum consectetur saepe, magnam mollitia sequi odio! Odit, omnis eveniet odio tempora incidunt, cumque sapiente reprehenderit dolor qui, ducimus officia sit veniam obcaecati similique maiores soluta.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script> --}}
	<script type="text/javascript">
		var contentTable = $('#t_section_table').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: '/admin/content/outer/list',
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
			detail: {
	            title: "sub child data table",
	            content:  subTableInit
            },
			// columns definition
			columns: [
				{
					sortable: false,
					field: 'table',
					title: 'Table',
					type: 'text',
					width: 80,
				},
				{
					sortable: false,
					field: 'section',
					title: 'Section',
					type: 'text',
					width: 200,
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
						return '<div class="custom_a_btn_popover">\<a class="btn btn-hover-brand btn-icon btn-pill get_account" onclick="event.preventDefault();" data-route="/admin/account/view/' + row.id + '"><i class="la la-eye" title="View profile"></i></a>\<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load edit_account" data-route="/admin/account/modal?edit&account=' + row.id + '" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
								<i class="la la-edit"></i>\
							</a>\<a href="#" class="btn btn-hover-danger btn-icon btn-pill delButton" data-id="' + row.id + '" title="Delete" data-route="/admin/account/delete/'+row.id+'">\
								<i class="la la-trash"></i>\
							</a><div>';
					},
				}
			],

		});

	$(document).ready(function() {
		contentTable.on('kt-datatable--on-init', function() {
	      	$(".text_to_p_mask").text(function(i, text){
				console.log(text);
				text = text.replace(/(\d{3})(\d{3})(\d{4})/, "($1) $2 $3");
				return text;
			})
	    });
	    // $(".dropdown-toggle").dropdown();
	    const basicSearch = (advanced = false, cb = "default cb") => {
	        if (advanced) {
	            contentTable.setDataSourceParam("query", {});
	        } else {
	            let sanitized = contentTable.getDataSourceQuery('query');

	            if (sanitized.advanced) delete sanitized.advanced;
	            contentTable.setDataSourceParam("query", sanitized);
	        }
	        typeof cb === "function" ? cb() : '';
	    }
	    $(document)
    .off("click", ".bs-donebutton")
    .on("click", ".bs-donebutton", function(e) {
        e.preventDefault();
        basicSearch(false, () => {
	    	contentTable.search($('#industry_picker').val(), 'industry');
		});	

	    $('.basic--search').off('keyup').on('keyup', function(e) {
	    	if($(this).val().length > 2 || $(this).val().length ==0)
	    	{
	    		basicSearch(false, () => {
	    		    contentTable.search($(this).val(), $(this).attr('name'));
	    		});	
	    	}
	    });
	    // advance search
	    $('#advSearchBtn').on('click', function(e) {
	        e.preventDefault();
	        let data = $('#account_adv_form').serializeArray();
	        let reducedData = data.reduce((acc, x) => {
	            acc[x.name] = x.value;
	            return acc;
	        }, {})
	        basicSearch(true, () => {
	            contentTable.search(reducedData, "advanced");
	        });
	        $('#dropdownMenuLink').css({
	            'background' : '#8b83f3',
	        });
	    });
	    $('#reload_table').on('click', function(e) {
	        e.preventDefault();
	        $('.userInputGroup').find('input').val('');
	        // localStorage.removeItem("t_account_table-1-meta");
	        contentTable.setDataSourceParam("query",{});
	        $('#t_account_table').KTDatatable().reload();
	        localStorage.removeItem("t_account_table-1-meta");
	    });
	    $(document).find("#statusSelect2").select2({
	    	width:'100%'
	    });
	});
		$(document).off('click','.get_account').on('click','.get_account', function(e){
		    e.preventDefault();
		    supportAjax({
		        url: $(this).data('route'),
		    }, function(resp){
		        $('#kt_body').empty().append(resp);
		    },function(err){
		        console.log(err);
		    })
		});
		$(document).on('click', '#adv_reset', function(e) {
	        e.preventDefault();
	        $(this).closest('form').find('input').val('');
	        $('#advSearchBtn').trigger('click');
	    });
		$(document).off('click', '.exportTo').on('click', '.exportTo', function(e) {
		    e.preventDefault();
		    e.stopPropagation();
		    window.open('/export/account/' + $(this).attr('data-export-to'))
		});
		$(document).off('click','#adv_close').on('click','#adv_close', function(e){
			e.preventDefault();
			e.stopPropagation();
			$('.userAdvSearchDropDown').dropdown('toggle');
		});
	});
	</script>
</div>