<div id="datatable_container" class="usersControlContent">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					User Logs
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">TABLES</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">User Logs</a>
				</div>
			</div>
		</div>
        
	</div>
	<div id="t_userlogstable">
		<div class="row site_search_row">
			<div class="col-xl-8 order-1 order-xl-1 serach_col user_search_col userSearchCol">
				<div class="form-group m-form__group row align-items-center ">
					<div class="col-md-4 col-sm-4">
						<div class="input-group mb-3 input-group-sm userInputGroup">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-name">Name</span>
							</div>
							<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-name" placeholder="search.." id="username_search" autocomplete="off">
						</div>
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
									<i class="kt-nav__link-icon la la-print"></i>
									<span class="kt-nav__link-text">Print</span>
								</a>
							</li>
							<li class="kt-nav__item">
								<a href="#" class="kt-nav__link">
								{{-- <a href="{{route('export.file',['type'=>'csv'])}}" class="kt-nav__link"> --}}
									<i class="kt-nav__link-icon la la-file-text-o"></i>
									<span class="kt-nav__link-text">CSV</span>
								</a>
							</li>
							<li class="kt-nav__item">
								<a href="#" class="kt-nav__link">
									<i class="kt-nav__link-icon la la-file-pdf-o"></i>
									<span class="kt-nav__link-text">PDF</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    $('#t_userlogstable').KTDatatable({
    // datasource definition
        data: {
            type: 'remote',
            source: {
            read: {
                url: '/userLogs/data',
                method: 'GET',
                params: {
                    "_token": "{{ csrf_token() }}"
                    },
                    
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
                field: 'user_name',
                title: 'Name',
                type: 'text',
                selector: false,

            },
            {
                field: 'fingerprint',
                title: 'Fingerprint'
            },
             {
                field: 'operating_system',
                title: 'Operating System',
            },
             {
                field: 'logged_in_at',
                title: 'Login time',
            },
            {
                field: 'logged_out_at',
                title: 'Logout time'
            },      
            
            
        ],

    });
    
</script>