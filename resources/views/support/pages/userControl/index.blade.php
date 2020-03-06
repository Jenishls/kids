<div id="datatable_container" class="usersControlContent">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Users Control
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">SETTINGS</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Users Control</a>
				</div>
			</div>
		</div>
		<div class="kt-subheader__wrapper">
			<a href="#" class="btn btn-brand btn-elevate btn-icon-sm" id="add_user"><i class="la la-plus"></i>
				User
			</a>
		</div>
	</div>

	<div id="t_userstable">
		<div class="row user_search_row">

			<div class="col-xl-8 order-1 order-xl-1 serach_col user_search_col userSearchCol">

				<div class="form-group m-form__group row align-items-center ">
					<div class="userFilterSearch">
						<div class="dropdown userAdvSearch">
							{{-- <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i title="Advanced search" class="fas fa-filter"></i>
							</a> --}}
							{{-- <button type="button" class="btn btn-outline-brand btn-elevate btn-circle btn-icon dropdown-toggle" role="button" id="dropdownMenuLink"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i title="Advanced search" class="fas fa-filter"></i></button> --}}
							<button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i title="Advanced search" class="fas fa-filter"></i></button>
							<!-- Advanced Search -->
							<div class="dropdown-menu userAdvSearchDropDown">
								<span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust" style="right: auto; left: 33.5px;"></span>
								<div>
									<form class="kt-form kt-form--fit" id="userAdvSearchForm" autocomplete="off">
										@csrf
										<div class="bodyContent">
											<div class="row kt-margin-b-20">
												<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
													<label>Name</label>
													<input type="text" class="form-control kt-input advSearchInput" placeholder="Full name" name="fullname" data-col-index="0" autocomplete="off">
												</div>
												<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
													<label>Username</label>
													<input type="text" name="name" class="form-control kt-input advSearchInput" placeholder="Username" data-col-index="4" autocomplete="off">
												</div>

											</div>
											<div class="row kt-margin-b-20">
												<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
													<label>Mobile phone</label>
													<input type="text" class="form-control kt-input advSearchInput" name="MobileNumber" placeholder="Mobile phone" data-col-index="1" autocomplete="off">
												</div>
												<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
													<label>UserID:</label>
													<input type="text" name="userId" class="form-control kt-input advSearchInput" placeholder="E.g: 123" data-col-index="1" autocomplete="off">
												</div>

											</div>

											<div class="row kt-margin-b-20">
												<!-- <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
													<label>SSN</label>
													<input type="text" class="form-control kt-input" name="ssn" placeholder="Social security no." data-col-index="4" autocomplete="off">
												</div> -->
												<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
													<label>Email</label>
													<input type="text" class="form-control kt-input" name="email" placeholder="Email address" data-col-index="4" autocomplete="off">
												</div>


											</div>
											<!-- <div class="row kt-margin-b-20">
												<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
													<label>Status</label>
													<select class="form-control kt-input" data-col-index="7">
														<option value="">Select</option>
														<option value="">Active</option>
														<option value="">Inactive</option>
													</select>
												</div>
												<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
													<label>Supervisor</label>
													<select class="form-control kt-input" data-col-index="6" id="advSearchSup" multiple>
														<option value="">Select</option>
													</select>
												</div>
											</div> -->
										</div>
										<div class="row userAdvFooter">
											<div class="footerLeftBtns">
												<!-- <div>
													<button class="btn btn-secondary btn-secondary--icon" id="adv_close">
														Close
													</button>
												</div> -->
												<div class="advSearchResetBtn">
													<button class="btn btn-secondary btn-secondary--icon" id="adv_reset">
														Reset
													</button>
												</div>
											</div>
											<div class="">
												<button class="btn btn-primary btn-brand--icon" id="advSearchBtn">
													Apply
												</button>
											</div>
										</div>
									</form>
								</div>

							</div>
						</div>
					</div>


					<div class="col-md-3 col-sm-3">
						<div class="input-group mb-3 input-group-sm userInputGroup">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">Name</span>
							</div>
							<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="name_search" autocomplete="off" name="fullname">
						</div>

					</div>
					<div class="col-md-3 col-sm-3">
						<div class="input-group mb-3 input-group-sm userInputGroup">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">Email</span>
							</div>
							<input type="text" class="form-control basic--search" aria-label="Sizing example input" name="email" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="email_search">
						</div>
					</div>

					<div class="col-md-3 col-sm-3">
						<div class="input-group input-group-sm userInputGroup">
							<div class="input-group-prepend">
								<button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Role</button>
							</div>
							@if($roles->count())
							<select title="Select" class="custom-select" data-inputName="role" name="role[]" id="user_role_search" multiple>
								<!-- <option value="*">All</option> -->
								@foreach($roles as $role)
								<option value="{{$role->id}}">{{$role->role_name}}</option>
								@endforeach
							</select>
							@endif

						</div>
					</div>
					<div>
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
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script>

	<script type="text/javascript">
		var usersTable = $('#t_userstable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: '/users/list',
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
				pageSize: 50,
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
			columns: [{
					sortable: true,
					field: 'fullName',
					title: 'Name',
					type: 'text',
					template: function(row, index, datatable) {
						if (row.member) {
							return row.member.first_name + ' ' + row.member.last_name;
						}
					}

				},
				{
					// sortable: 'asc',
					field: 'name',
					title: 'Username',
					color: 'red',
					width: 150,
					type: 'text',
				},
				{
					field: 'email',
					title: 'Email',

				},
				{
					field: 'member.mobile_no',
					title: 'Phone No.',
				},
				{
					field: 'created_at',
					title: 'Member since',
					type: 'date',
					textAlign: "center",
					template(row) {
						return moment(row.created_at_date).format('M/D/Y');
					}
				},
				{
					field: 'is_locked',
					title: 'Is locked',
					width: 100

				},
				{
					field: 'role',
					title: 'Role',
					template: function(row, index, datatable) {
						let temp = '';
						row.roles.forEach(role => {
							temp += `<span class="kt-badge kt-badge--info kt-badge--inline" data-role_id="${role.id}"> ${role.label}</span>`;
						})
						return temp;
					}
				},

				{
					field: 'Actions',
					title: 'Actions',
					sortable: false,
					overflow: 'visible',
					textAlign: 'center',
					template: function(row, index, datatable) {
						var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
						return '<a class="btn btn-hover-brand btn-icon btn-pill get_profile" onclick="event.preventDefault();" data-route="/users/userProfile/' + row.id + '"><i class="la la-eye" title="View profile"></i></a>\<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load edit_user" data-route="/users/edit/' + row.id + '" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
								<i class="la la-edit"></i>\
							</a>\<a class="btn btn-hover-brand btn-icon btn-pill pageLoad changePassword" data-toggle="modal" data-route="/users/changePassword/' + row.id + '" data-id="' + row.id + '" title="Update password"><i class="fas fa-key" style="font-size: 1.1rem;"></i></a>\
							<a href="#" class="btn btn-hover-danger btn-icon btn-pill delButton" data-id="' + row.id + '" title="Delete">\
								<i class="la la-trash"></i>\
							</a>';
					},
				}
			],

		});

		$(document).off('click', '#add_user').on('click', '#add_user', function(e) {
			e.preventDefault();

			showModal({
				url: 'users/add'
			});
		}).off('click', '.edit_user').on('click', '.edit_user', function(e) {
			e.preventDefault();
			showModal({
				url: $(this).data('route')
			});
		}).off('click', '.changePassword').on('click', '.changePassword', function(e) {
			e.preventDefault();
			showModal({
				url: $(this).data('route')
			});
		}).off('click', '.delButton').on('click', '.delButton', function(e) {
			e.preventDefault();
			let id = $(this).data('id');
			delConfirm({
				url: "user/delete/" + id,
				header: $('#t_userstable')
			});
		});

		$(document).ready(function() {
			$(".dropdown-toggle").dropdown();


			const basicSearch = (advanced = false, cb = "default cb") => {
				if (advanced) {
					usersTable.setDataSourceParam("query", {});
				} else {
					let sanitized = usersTable.getDataSourceQuery('query');

					if (sanitized.advanced) delete sanitized.advanced;
					usersTable.setDataSourceParam("query", sanitized);

				}
				typeof cb === "function" ? cb() : '';

			}

			$('.basic--search').off('blur').on('blur', function() {
				basicSearch(false, () => {
					usersTable.search($(this).val(), $(this).attr('name'));
				});
			});



			// advance search

			$('#advSearchBtn').on('click', function(e) {
				e.preventDefault();
				let data = $('#userAdvSearchForm').serializeArray();
				let reducedData = data.reduce((acc, x) => {
					acc[x.name] = x.value;
					return acc;
				}, {})

				basicSearch(true, () => {
					usersTable.search(reducedData, "advanced");
				});

				$('#dropdownMenuLink').css({
					'background' : '#8b83f3',
				});


			});

			$('#user_role_search').selectpicker({
				liveSearch: true,
				showTick: true,
				actionsBox: true,
				doneButton: true,
				doneButtonText: "Apply"

			}).on('hide.bs.select', function() {
				basicSearch(false, () => {
					usersTable.search($(this).val(), 'role');
				});
			});


			// $('.userInputGroup .bs-donebutton button').on('click', function(e) {
			// 	e.preventDefault();
			// 	usersTable.search($('#user_role_search').val(), 'role');
			// })

			$('#userTableReload').on('click', function(e) {
				e.preventDefault();
				$('#t_userstable').KTDatatable().reload();
			});

			$('.searchRedo').on('click', function(e){
				e.preventDefault();
				$('.userInputGroup').find('input').val('');
				$("#user_role_search").val('');
				
			});


		});

		$(document).on('click', '#adv_reset', function(e) {
			e.preventDefault();
			$('#userAdvSearchForm').find("input").val("");
		});

		$("input[name=ssn]").inputmask("mask", {
			"mask": "(999) 99-9999"
		});
		$("input[name=MobileNumber]").inputmask("mask", {
			"mask": "(999) 999-9999"
		});

		$(document).off('click', '.exportTo').on('click', '.exportTo', function(e) {
			e.preventDefault();
			e.stopPropagation();


			window.open('export/' + $(this).attr('data-export-to'))
		});



		// $(document).on('click', '#adv_close', function(e){
		//     e.preventDefault();
		// 	$(".userAdvSearchDropDown").hide();

		// });


		// $(document).off('click', '.userInputGroup .bs-donebutton button').on('click', '.userInputGroup .bs-donebutton button'function(e) {
		// 	e.preventDefault();
		// 	basicSearch(true, () => {
		// 		usersTable.search(reducedData, "advanced");
		// 	});

		// });




		// $('#advSearchSup').selectpicker({
		// 	liveSearch: true,
		// 	showTick: true,
		// 	actionsBox: true,
		// 	doneButton: true,
		// 	doneButtonText: 'Apply'
		// });
	</script>
</div>