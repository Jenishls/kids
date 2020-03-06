<style type="text/css">
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
    @media only screen and (max-width: 1450px){
        .custom-input__group_responsive.col-lg-4{
            -webkit-box-flex: 0;
            -ms-flex: 0 0 45.33333%!important;
            flex: 0 0 45.33333%!important;
            max-width: 45.33333%!important;
            padding-bottom: 10px!important;
        }
        .custom-input__group_responsive.start_of_other_i_row{
            padding-left: 8.666%!important;
        }
    }
    .advSearchResetBtn .btn_p_p4rem {
        padding: 0.50rem 0.60rem!important;
        font-size: 0.9rem!important;
    }
    #datatable_container.no-margin{
        margin:0!important;
        width: 100%!important;
    }
</style>
<div id="datatable_container" class="no-margin">
    <div id="t_company_client_table">
        <div class="row mt-2 justify-content-end">
            <div class=" col-lg-2 col-md-2 text-right">
                <a href="#" class="btn btn-sm btn-brand btn-pill btn-elevate btn-icon-sm" id="add_member_b" data-cid="{{$company->id}}"><i class="la la-plus"></i>
                    Member
                </a>
            </div>
        </div>
        <div class="alert alert-light alert-elevate search_top_container" role="alert">
            <div class="alert-text">
                <div class="row">
                    <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 order-1 order-xl-1 serach_col user_search_col userSearchCol">
                        <div class="form-group m-form__group row align-items-center">
                                <div class="input-group input-group-sm userInputGroup mr-3" style="width:220px;">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Name</button>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.."  autocomplete="off" name="name">
                                </div>
                                <div class="input-group input-group-sm userInputGroup mr-3" style="width:200px;">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Phone</button>
                                    </div>
                                    <input type="text" class="form-control basic--search e_mask_phone" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="phone_no">
                                </div>
                            <div id="reload_table" class="reloadMemberTable">
								<i class="fas fa-redo searchRedo"></i>
							</div>

                            
                        </div>
                    </div>
                    <div class="rp_btn col-sm-1 order-1 order-xl-1" style="display:inline-flex;">
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
        var companyClientDataTable = $('#t_company_client_table').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: '/admin/account/member/list/{{$company->id}}',
                        method: 'get',
                        // params: {
                        //  "_token": "{{ csrf_token() }}"
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
                    width: 180,
                    template(row){
                        let template ='<div class="kt-user-card-v2">';
                        if(row.fname){
                            if(row.image && row.image.file_name){
                                template+=`
                                 <div class="kt-user-card-v2__pic">
                                    <img src="/admin/account/member/image/${row.image.file_name}" alt="${row.fname}" />
                                </div>
                                `
                            }else
                            {
                                template+=`
                                 <div class="kt-user-card-v2__pic">
                                    <img src="/media/blog/No_Image_Available.jpg" alt="${row.fname}" />
                                </div>
                                `
                            }
                            template += `
                                <div class="kt-user-card-v2__details">
                                    <span class="kt-user-card-v2__name">${row.fname} ${row.lname}</span>
                                </div>
                            `;
                        }
                        template+='</div>';
                        return template;
                    }
                },
                {
                    sortable: false,
                    field: 'email',
                    title: 'Email',
                    type: 'text',
                    width: 120
                },
                {
                    sortable: true,
                    field: 'phone_no',
                    title: 'Phone',
                    type: 'text',
                    width: 120
                },
                {
                    field: 'Action',
                    title: 'Actions',
                    sortable: false,
                    textAlign: 'center',
                    overflow: 'visible',
                    class: 'kt-datatable--off-click_over_action_btn',
                    width: 130,
                    template: function(row, index, datatable) {
                        var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                        return '<a class="btn btn-hover-brand btn-icon btn-pill pageload" onclick="event.preventDefault();" data-route="/admin/client/clientProfile/'+row.id+'" data-callback="active_clients_current_row"><i class="la la-eye" title="View profile"></i></a>\<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load edit_client" data-route="/admin/client/edit/'+row.id+'" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-hover-danger btn-icon btn-pill detachMember" data-route="/admin/account/delete/{{$company->id}}/member/' + row.id + '" title="Delete">\
                            <i class="la la-trash"></i>\
                        </a>';
                    },
                }
            ],
        });
        $('.reloadMemberTable').off('click').on('click', function(e) {
            e.preventDefault();
            $('#t_company_client_table .userInputGroup').find('input').val('');
            // $('select').select2("val", "");
            companyClientDataTable.setDataSourceParam("query",{});
            $('#t_company_client_table').KTDatatable().reload();
            localStorage.removeItem("t_company_client_table-1-meta");
            $('#t_company_client_table #dropdownMenuLink').removeClass('dropdown-on-active');
        });
    
        companyClientDataTable.on('kt-datatable--on-init', function() {
            $('[data-toggle="kt-tooltip"]').tooltip();
        });
        var companyClientSearch = (advanced = false, cb = "default cb") => {
            if (advanced) {
                companyClientDataTable.setDataSourceParam("query", {});
            } else {
                let sanitized = companyClientDataTable.getDataSourceQuery('query');
                if (sanitized.advanced) delete sanitized.advanced;
                companyClientDataTable.setDataSourceParam("query", sanitized);
            }
            typeof cb === "function" ? cb() : '';
        }
        $(document)
        .off("click", "#industry_picker .bs-donebutton")
        .on("click", "#industry_picker .bs-donebutton", function(e) {
            e.preventDefault();
            companyClientSearch(false, () => {
                companyClientDataTable.search($('#industry_picker').val(), 'industry');
            }); 
        });
        (() => {
			let currentTimeout = '';
			$('#t_company_client_table .basic--search').off('blur keyup').on('blur keyup', function(e) {
			    if($(this).val().length > 2 || $(this).val().length == 0)
			    {
			        clearInterval(currentTimeout)
			        currentTimeout = setTimeout(() => {
			        	companyClientSearch(false, () => {
				            companyClientDataTable.search($(this).val(), $(this).attr('name'));
				        }); 
			        }, 1500);

			    }
			});
		})();
        
        // advance search
    $(document).off('click','#add_member_b').on('click','#add_member_b', function(e){
        e.preventDefault();
        showModal({
            url:'/admin/account/member/add/'+$(this).attr('data-cid'),
            c:1
        })
    })
    
    $(document).off('click','.detachMember').on('click','.detachMember', function(e){
        e.preventDefault();
        let url = $(this).attr('data-route');
        showModal({
            url,
            c:1
        })
    })

    
    </script>
</div>