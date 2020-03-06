<div id="datatable_container" class="usersControlContent">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Default Company
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">SETTINGS</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Default Company</a>
				</div>
			</div>
		</div>
		<div class="kt-subheader__wrapper">
			<a href="#" class="btn btn-brand btn-elevate btn-icon-sm" id="add_option"><i class="la la-plus"></i>Option
				<!-- Company -->
			</a>
		</div>


	</div>
	<div class="row">
		<div class="col-xl-4">
			<!--begin:: Portlet-->
			<div class="kt-portlet kt-portlet--height-fluid defaultCompanyMainContent">
				<div class="kt-portlet__body kt-portlet__body--fit">
					<!--begin::Widget -->
					<div class="kt-widget kt-widget--project-1 ">
						<div class="kt-widget__head defaultCompanyHead">
							<div class="kt-widget__label defaultCompanyWidgetLabel">
								<div class="kt-widget__media">
									<!-- <span class="kt-media kt-media--lg kt-media--circle defaultCompanyLogo">
										<img src="media/logos/shubhu-logo.png" alt="logo">
									</span> -->
									<div class="kt-avatar kt-avatar--outline kt-avatar--circle companyLogoCircle" id="kt_user_avatar_3">
										{{-- <div class="kt-avatar__holder logoHolder" style="background-image: url(data:image;base64,{{base64_encode(file_get_contents(storage_path('app/defaultCompany'.'/'.$logo->value)))}}) "></div> --}}
										<label class="kt-avatar__upload logoUpload" data-toggle="kt-tooltip" title="" data-original-title="Change logo">
											<i class="fa fa-pen"></i>
											<input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg">
										</label>
										<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
											<i class="fa fa-times"></i>
										</span>
									</div>

								</div>
								<div class="kt-widget__info kt-margin-t-5 defaultCompanyInfo">
									<a href="#" class="kt-widget__title defaultCompanyTitle">
										Shubhu Tech
									</a>
									<span class="kt-widget__desc defaultCompanyHeadDesc">
										Business Technology Solution Provider.
									</span>

								</div>
							</div>
							<div class="kt-portlet__head-toolbar">
								<a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
									<i class="flaticon-more-1"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
									<ul class="kt-nav">
										<li class="kt-nav__item">
											<a href="#" class="kt-nav__link">
												<i class="kt-nav__link-icon flaticon2-line-chart"></i>
												<span class="kt-nav__link-text">Reports</span>
											</a>
										</li>
										<li class="kt-nav__item">
											<a href="#" class="kt-nav__link">
												<i class="kt-nav__link-icon flaticon2-send"></i>
												<span class="kt-nav__link-text">Messages</span>
											</a>
										</li>
										<li class="kt-nav__item">
											<a href="#" class="kt-nav__link">
												<i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
												<span class="kt-nav__link-text">Charts</span>
											</a>
										</li>
										<li class="kt-nav__item">
											<a href="#" class="kt-nav__link">
												<i class="kt-nav__link-icon flaticon2-avatar"></i>
												<span class="kt-nav__link-text">Members</span>
											</a>
										</li>
										<li class="kt-nav__item">
											<a href="#" class="kt-nav__link">
												<i class="kt-nav__link-icon flaticon2-settings"></i>
												<span class="kt-nav__link-text">Settings</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="kt-widget__content defaultCompanyWidgetContent">
							<div class="kt-widget__details defaultCompanyWidgetDetails">
								<span class="kt-widget__subtitle defaultCompanySubtitle ">Industry</span>
								@foreach($company as $info)

								@if($info->property == 'industry')

								<span class="kt-widget__value defaultCompanySubtitleValue descText">{{$info->value}}</span>
								@endif
								@endforeach
							</div>

							<div class="kt-widget__details defaultCompanyWidgetDetails">
								<span class="kt-widget__subtitle defaultCompanySubtitle ">Ownership</span>
								@foreach($company as $info)
								@if($info->property == 'ownership')
								<span class="kt-widget__value defaultCompanySubtitleValue descText">{{$info->value}}</span>
								@endif
								@endforeach
							</div>

							<div class="kt-widget__details defaultCompanyWidgetDetails">
								<span class="kt-widget__subtitle defaultCompanySubtitle ">Employees</span>
								@foreach($company as $info)
								@if($info->property == 'employees')
								<span class="kt-widget__value defaultCompanySubtitleValue descText">{{$info->value}}</span>
								@endif
								@endforeach
							</div>
							<div class="kt-widget__details defaultCompanyWidgetDetails">
								<span class="kt-widget__subtitle defaultCompanySubtitle ">Est. Date</span>
								@foreach($company as $info)
								@if($info->property == 'est_date')
								<span class="kt-widget__value defaultCompanySubtitleValue descText">{{$info->value}}</span>
								@endif
								@endforeach
							</div>
						</div>

						<div>
							@foreach($company as $info)
							@if($info->property == 'description')
							<span class="kt-widget__text defaultCompanyDesc">
								<span class="kt-widget__date defaultCompanyAddTitle">Description</span>
								<p class="descText">
									{{$info->value}}
								</p>
							</span>
							@endif
							@endforeach
						</div>

						<div class="kt-widget__body defaultCompanyStats ">

							<!-- <div class="kt-widget__item defaultCompanyItem">
								<span class="kt-widget__date defaultCompanyItemTitle defaultCompanyAddTitle">
									Est. Date
								</span>
								<div class="kt-widget__label">
									@foreach($company as $info)
									@if($info->property == 'est_date')
									<p class="descText">{{$info->value}}</p>
									@endif
									@endforeach
								</div>
							</div> -->

							<div class="kt-widget__item defaultCompanyItem">
								<span class="kt-widget__date defaultCompanyItemTitle ">
									Phone No.
								</span>
								<div class="kt-widget__label">
									@foreach($company as $info)
									@if($info->property == 'phone_number')
									<p class="descText">{{$info->value}}</p>
									@endif
									@endforeach
								</div>
							</div>
							<div class="kt-widget__item defaultCompanyItem">
								<span class="kt-widget__date defaultCompanyItemTitle ">
									Website
								</span>
								<div class="kt-widget__label">
									@foreach($company as $info)
									@if($info->property == 'website')
									<p class="descText">{{$info->value}}</p>
									@endif
									@endforeach
								</div>
							</div>

							<div class="kt-widget__item defaultCompanyItem">
								<span class="kt-widget__date defaultCompanyItemTitle ">
									Email
								</span>
								<div class="kt-widget__label">
									@foreach($company as $info)
									@if($info->property == 'email')
									<p class="descText">{{$info->value}}</p>
									@endif
									@endforeach
								</div>
							</div>




						</div>

						<div class="kt-widget__footer">
							<div class="kt-widget__wrapper defaultCompanyAddress">

								<div class="kt-widget__section defaultComapnyAddressSection">
									<span class="kt-widget__date defaultCompanyAddTitle">
										Main
									</span>
									<div class="descText">
										@foreach($company as $info)
										@if($info->property == 'address1')
										<address>
											{{$info->value}},<br>
										</address>
										@endif
										@endforeach

										@foreach($company as $info)
										@if($info->property == 'city1')
										<address>
											{{$info->value}},
										</address>
										@endif
										@endforeach

										@foreach($company as $info)
										@if($info->property == 'zip1')
										<address>
											{{$info->value}},<br>
										</address>
										@endif
										@endforeach

										@foreach($company as $info)
										@if($info->property == 'country1')
										<address>
											{{$info->value}}.<br>
										</address>
										@endif
										@endforeach
									</div>


								</div>

								<div class="kt-widget__section defaultComapnyAddressSection">
									<span class="kt-widget__date defaultCompanyAddTitle">
										Branch
									</span>
									<div class="descText">
										@foreach($company as $info)
										@if($info->property == 'address2')
										<address>
											{{$info->value}},<br>
										</address>
										@endif

										@endforeach
										@foreach($company as $info)
										@if($info->property == 'city2')
										<address>
											{{$info->value}},
										</address>
										@endif
										@endforeach

										@foreach($company as $info)
										@if($info->property == 'zip2')
										<address>
											{{$info->value}},<br>
										</address>
										@endif
										@endforeach

										@foreach($company as $info)
										@if($info->property == 'country2')
										<address>
											{{$info->value}}.<br>
										</address>
										@endif
										@endforeach
									</div>
								</div>


							</div>
						</div>
					</div>
					<!--end::Widget -->

				</div>
				<hr style="width:100%;">
				<div class="kt-portlet__body kt-portlet__body--fit businessHourContent">
					<!--begin::Widget -->
					<div class=" businessHoursHead">
						<div>
							<h5>Business Hours</h5>
						</div>
						<div class="kt-subheader__wrapper addHourBtn">
							<a href="#" class="btn btn-brand btn-elevate btn-icon-sm" id="addHoursBtn"><i class="la la-plus"></i>
								<!-- Company -->
							</a>
						</div>
					</div>
					@include('support.pages.defaultCompany.inc.businessHoursTable')
					<!--end::Widget -->
				</div>
			</div>
			<!--end:: Portlet-->


		</div>

		<div class="col-xl-8" id="defaultCompanyTable">
			<div class="tableTopBar ">
				<div class="col-md-3 tableTopBarContent" style="padding-left:0px;">
					<div class="input-group mb-3 input-group-sm userInputGroup">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-default">Property</span>
						</div>
						<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="propertySearch" autocomplete="off">
					</div>


				</div>
				<div class="dropdown dropdown-inline exportBtn">

					<button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-download"></i></button>

					<div class="dropdown-menu dropdown-menu-right">
						<ul class="kt-nav">
							<li class="kt-nav__section kt-nav__section--first">
								<span class="kt-nav__section-text">Choose an option</span>
							</li>

							<li class="kt-nav__item">
								<a href="#" class="kt-nav__link">
									<i class="kt-nav__link-icon la la-file-text-o"></i>
									<span class="kt-nav__link-text dcExportTo" data-export-to="csv">CSV</span>
								</a>
							</li>
							<li class="kt-nav__item">
								<a href="#" class="kt-nav__link">
									<i class="kt-nav__link-icon la la-file-pdf-o"></i>
									<span class="kt-nav__link-text dcExportTo" data-export-to="pdf">PDF</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- <div class="col-md-3">
					<div class="input-group mb-3 input-group-sm userInputGroup">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-default">Value</span>
						</div>
						<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="valueSearch" autocomplete="off">
					</div>

				</div> -->

			</div>
		</div>

	</div>
	<script type="text/javascript">
		var defaultCompanyTable = $('#defaultCompanyTable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: '/option/list',
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
				scroll: true,
				footer: false,
				// customScrollbar: true,
				height: 1000
			},

			// column sorting
			sortable: true,

			pagination: true,


			// columns definition
			columns: [{
					sortable: true,
					field: 'property',
					title: 'Property',
					type: 'text',

				},
				{
					// sortable: 'asc',
					field: 'value',
					title: 'Value',
					type: 'text',

				},
				{
					field: 'created_at',
					title: 'Created At',
					type: 'date',
					textAlign: "center",
					width: 150,
					template(row) {
						return moment(row.created_at_date).format('M/D/Y');
					}
				},

				{
					field: 'Actions',
					title: 'Actions',
					sortable: false,
					overflow: 'visible',
					textAlign: 'center',
					width: 100,
					template: function(row, index, datatable) {
						var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
						return '<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load updateOption" data-route="/option/updateModal/' + row.id + '" data-toggle="modal" data-target="#sy_global_modal"  title="Update details">\
								<i class="la la-edit"></i>\
							</a>\
							<a href="#" class="btn btn-hover-danger btn-icon btn-pill delButton" data-id="' + row.id + '" title="Delete">\
								<i class="la la-trash"></i>\
							</a>';
					},
				}
			],

		});

		$(document).off('click', '#add_option').on('click', '#add_option', function(e) {
			e.preventDefault();

			showModal({
				url: 'option/add'
			});
		}).off('click', '.updateOption').on('click', '.updateOption', function(e) {
			e.preventDefault();
			showModal({
				url: $(this).data('route')
			});
		}).off('click', '.delButton').on('click', '.delButton', function(e) {
			e.preventDefault();
			let id = $(this).data('id');
			delConfirm({
				url: "option/delete/" + id,
				header: $('#defaultCompanyTable')
			});
		});

		$(document).ready(function() {
			$('#propertySearch').on('keyup', function(e) {
				if (e.which === 13) {
					if ($(this).val().length >= 3) {
						defaultCompanyTable.search($(this).val(), 'property');
					}
				}
				if ($(this).val() == '') {
					defaultCompanyTable.search($(this).val(), 'property');

				}

			});

		});

		$(document).off('click', '#addHoursBtn').on('click', '#addHoursBtn', function(e) {
			e.preventDefault();

			showModal({
				url: 'hour/add'
			});
		});

		$(document).off('click', '.dcExportTo').on('click', '.dcExportTo', function(e) {
			e.preventDefault();
			e.stopPropagation();


			window.open('export/' + $(this).attr('data-export-to'))
		});

		$(document).off('click', '.logoUpload').on('click', '.logoUpload', function(e) {
			e.preventDefault();
			e.stopPropagation();

			showModal({
				url: 'logo/add',
			});

		});
	</script>