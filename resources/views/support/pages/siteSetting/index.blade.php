{{-- <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <div class="kt-subheader   kt-grid__item rp_subheader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main kt_sub_main">
    
                <h3 class="kt-subheader__title">
                   Site Settings
                </h3>
    
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs kt_sub_bread_crumb">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Setting</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Site Setting</a>
                </div>
                <div style="clear:both;"></div>
                <div class="kt-subheader__wrapper">
                    <a href="#" class="btn btn-brand btn-elevate btn-icon-sm" id="add_siteSetting"><i class="la la-plus"></i>
                            Site Setting
                    </a>
        
                </div>
            </div>
            
            
            <div class="kt-subheader__toolbar rp_subheader_toolbar row">
                <div class=" left_kt_div col-lg-12">
                    <div class="right_kt_content">
                        <div class="row user_search_row" style="border-bottom:0;">
                            <div class="col-xl-8 order-1 order-xl-1 serach_col user_search_col userSearchCol">
                                <div class="form-group m-form__group row align-items-center ">
                                    <div class="col-md-3 col-sm-3">
                                        <div class="input-group mb-3 input-group-sm userInputGroup">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-cdoe">Code</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-code" placeholder="search.." id="code">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="input-group mb-3 input-group-sm userInputGroup">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-value">Value</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-value" placeholder="search.." id="value">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="input-group mb-3 input-group-sm userInputGroup">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-description">Value</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-description" placeholder="search.." id="value">
                                        </div>
                                    </div>
                                    <button type="button" id="resetSiteSearch" class="btn btn-brand btn-icon" style="border-radius:50%;background:#716aca;border:0px;"><i class="fa fa-undo"></i></button>
                                </div>
                            </div>
                            <div class="rp_btn col-xl-4 order-1 order-xl-1" style="display:inline-flex;">
                                
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
                        <div id="datatable_container">
                        @include('support.pages.siteSetting.site_setting_table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="data_field">
    
    </div>
    
</div> --}}
<style>
.data_col_height_fix{
    height:40px!important;
    overflow:auto!important;
}    
</style>
<div id="datatable_container" class="usersControlContent">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Site Setting
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">SETTINGS</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">Site Setting</a>
				</div>
			</div>
		</div>
        <div class="kt-subheader__wrapper">
            <button class="btn btn-brand btn-elevate btn-icon-sm" id="add_sitesetting"><i class="la la-plus"></i>
                Add
            </button>
        </div>
	</div>
	<div id="t_sitesettingtable">
		<div class="row site_search_row">
			<div class="col-xl-8 order-1 order-xl-1 serach_col user_search_col userSearchCol">
				<div class="form-group m-form__group row align-items-center ">
					<div class="col-md-3 col-sm-3">
						<div class="input-group mb-3 input-group-sm userInputGroup">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-code">Code</span>
							</div>
							<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-code" placeholder="search.." id="code_search" autocomplete="off">
						</div>
					</div>
					<div class="col-md-3 col-sm-3">
						<div class="input-group mb-3 input-group-sm userInputGroup">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-value">Value</span>
							</div>
							<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-value" placeholder="search.." id="value_search">
						</div>
					</div>
                    <div class="col-md-6 col-sm-6">
						<div class="input-group mb-3 input-group-sm userInputGroup">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-desc">Description</span>
							</div>
							<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-desc" placeholder="search.." id="desc_search">
						</div>
					</div>
				</div>
			</div>
			<div class="rp_btn col-xl-4 order-1 order-xl-1" style="display:inline-flex;">
				{{-- <div class="userTableReset">
					<button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="userTableReload"><i class="fa fa-undo"></i></button>
				</div> --}}
				<div class="dropdown dropdown-inline exportBtn" data-skin="dark" data-toggle="kt-tooltip" data-placement="top" title="" data-original-title="Export As">
					<button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false" title="Export as"><i class="la la-download"></i></button>
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
									<span class="kt-nav__link-text ssExportTo" data-export-to="csv">CSV</span>
								</a>
							</li>
							<li class="kt-nav__item">
								<a href="#" class="kt-nav__link">
									<i class="kt-nav__link-icon la la-file-pdf-o"></i>
									<span class="kt-nav__link-text ssExportTo" data-export-to="pdf">PDF</span>
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
    $('#t_sitesettingtable').KTDatatable({
    // datasource definition
        data: {
            type: 'remote',
            source: {
            read: {
                url: '/siteSetting/table',
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
            field: 'code',
            title: 'Code',
            type: 'text',
            selector: false,

            }, {
            field: 'value',
            title: 'Value',
            },
             {
            field: 'description',
            title: 'Description',
            },      
            {
            field: 'Actions',
            title: 'Actions',
            sortable: false,
            width: 130,
            overflow: 'visible',
            textAlign: 'center',
            template: function(row, index, datatable) {
                let new_data = JSON.stringify(row);
                var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                return     '<a id="edit_sitesetting" class="btn btn-hover-brand btn-icon btn-pill model_load" data-route="/siteSetting/editmodal/'+row.id+'" href="JavaScript:void(0);" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
                                <i class="la la-edit"></i>\
                            </a>\
                            <a href="#" class="btn btn-hover-danger btn-icon btn-pill delButton" data-id="'+row.id+'" title="Delete">\
                                <i class="la la-trash"></i>\
                            </a>\
                            <a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load view_audit_detail" data-id="'+row.id+'" data-route="/audit/details" data-table="site_settings" data-new='+new_data+' data-toggle="modal" data-target="#sy_global_modal"  title="View audit details">\
                                <i class="la la-eye"></i>\
                            </a>';
            },
            }],

    });
    
    $(document).off('click', '#edit_sitesetting').on('click', '#edit_sitesetting', function(e){
        e.preventDefault();
        showModal({
            url: $(this).data('route')	
        });
    }).off('click', '.delButton').on('click', '.delButton', function(e){
        e.preventDefault();
        let id= $(this).data('id');
        delConfirm({
            url:"/siteSetting/delete/"+id,
            header: $('#t_sitesettingtable')
        });
    });

    
    
    $(document).off('click', '#add_sitesetting').on('click', '#add_sitesetting', function(e){
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: '/siteSetting/addmodal'	
        });
    })
    .off('click', '#resetSiteSearch').on('click', '#resetSiteSearch', function(e){
        e.preventDefault();
        $('#code').val('');
        $('#value').val('');
        $('#t_sitesettingtable').KTDatatable().reload();
    });


    $(document).ready(function () {
		$(".dropdown-toggle").dropdown();
		$('#code_search').on('keyup', function(e){

			if($(this).val().length >= 3){
				$('#t_sitesettingtable').KTDatatable().search($(this).val(), 'code');	
			
			}
			if($(this).val() == ''){
				$('#t_sitesettingtable').KTDatatable().search($(this).val(), 'code');
				
			}
		});	

		$('#value_search').on('keyup', function(e){

			if($(this).val().length >= 3){
				$('#t_sitesettingtable').KTDatatable().search($(this).val(), 'value');	
			
			}
			if($(this).val() == ''){
				$('#t_sitesettingtable').KTDatatable().search($(this).val(), 'value');
				
			}
		});	

        $('#desc_search').on('keyup', function(e){

			if($(this).val().length >= 3){
				$('#t_sitesettingtable').KTDatatable().search($(this).val(), 'description');	
			
			}
			if($(this).val() == ''){
				$('#t_sitesettingtable').KTDatatable().search($(this).val(), 'description');
				
			}
		});	
		
    });
    
    $(document).off('click', '.ssExportTo').on('click', '.ssExportTo', function(e) {
        e.preventDefault();
        e.stopPropagation();


        window.open('export/siteSetting/' + $(this).attr('data-export-to'))
    });
    
</script>