<style type="text/css">
   
    .btn_p_p4rem {
        padding: 0.50rem 0.60rem !important;
        font-size: 0.9rem !important;
    }

    .industry_search .bootstrap-select>.dropdown-toggle {
        padding: 0.50rem 0.60rem !important;
        font-size: 0.9rem !important;
        border-left: none !important;
    }

    .industry_search .bootstrap-select.show>.dropdown-toggle.btn-light,
    .bootstrap-select.show>.dropdown-toggle.btn-secondary {
        border-color: #e2e5ec !important;
        border-left: none !important;
    }

    .userAdvSearchDropDown {
        width: 800px !important;
    }

    @media screen and (max-width: 1023px) {
        .custom__offset-1 {
            margin-left: 5% !important;
            padding-top: 10px !important;
        }
    }

    [name="status"]~.select2-selection__rendered {
        line-height: 12px !important;
    }

    [name="status"]~.select2-container .select2-selection--single {
        height: 32px !important;
    }

    [name="status"]~.select2-selection__arrow {
        height: 32px !important;
    }
</style>
<div id="datatable_container" class="contactContent">
    <div class="kt-subheader kt-grid__item uc_subHeader contactSubHeader" id="kt_subheader">
        <div class="kt-container" style="display:flex; justify-content:space-between">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Enquiry
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">TABLE</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Enquiry</a>
                </div>
            </div>
            <div class="kt-subheader__wrapper">
                <a href="#" class="btn btn-brand btn-pill btn-elevate btn-icon-sm" id="add--enquiry" data-route="/admin/enquiry/add" style="width:131px !important;"><i class="la la-plus"></i>
                    Add Enquiry
                </a>
            </div>
        </div>        
    </div>
    <div id="t_contactstable">
        <div class="alert alert-light alert-elevate search_top_container" role="alert">
            <div class="alert-text">
                <div class="row">
                    <div class="col-xl-11 col-lg-11 col-md-11 order-1 order-xl-1 search_col contact_search_col contactSearchCol">
                        <div class="form-group m-form__group row align-items-center ">
                            <div class="input-group input-group-sm userInputGroup ml-4" style="width:250px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                                </div>
                                <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="name">
                            </div>
                            <div class="input-group input-group-sm userInputGroup ml-4" style="width:200px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Phone</span>
                                </div>
                                <input type="text" class="form-control basic--search" aria-label="Sizing example input" name="phone_no" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="phone_search">
                            </div>
                            <div class="input-group input-group-sm userInputGroup ml-4" style="width:250px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                                </div>
                                <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="email_search" autocomplete="off" name="email">
                            </div>
                            <div class="input-group input-group-sm userInputGroup ml-4" style="width:200px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Date</span>
                                </div>
                                <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="email_search" autocomplete="off" name="date">
                            </div>
                            <div class=" custom__offset-1 ml-4">
                                <i class="fas fa-redo searchRedo"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var contactsTable = $('#t_contactstable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: '/admin/enquiry/list',
                        method: 'get',
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
                    field: 'created_at',
                    title: 'Date',
                    width: 200,
                    template: function(row, index, datatable) {
                        if (row.created_at) {
                            return moment(row.created_at).format("m,/d/Y");
                        }
                    }
                },
                {
                    // sortable: true,
                    field: 'fname',
                    title: 'Name',
                    width: 150,
                    // type: 'text',
                    template: function(row, index, datatable) {
                        if (row.mname) {
                            return row.fname + ' ' + row.mname + ' ' + row.lname;
                        } else {
                            return row.fname + ' ' + row.lname;
                        }
                    }
                },
                {
                    field: 'company',
                    title: 'Company',
                    width: 100                    
                },                
                {
                    field: 'email',
                    title: 'Email',
                    template: function(row, index, datatable) {
                        if (row.contact && row.contact.email) {
                            return row.contact.email;
                        } else {
                            return row.email;
                        }
                    }

                },                
                {
                    field: 'phone',
                    title: 'Phone',
                    width: 100,
                    template: function(row, index, datatable) {                        
                        if(row.phone){
                            return row.phone.toString().replace(/(\d{3})(\d{3})(\d{1,4})/, "($1) $2-$3");
                        }
                        return '';
                    }
                },
                {
                    sortable: true,
                    field: 'enq_type',
                    title: 'Type',
                    template(row){
                        return `<span class="text-capitalize">${row.enq_type}</span>`;
                    }
                },                
                {
                    field: 'reason',
                    title: 'Reason',
                    width: 200,                   
                },
               
                {
                    field: 'Actions',
                    title: 'Actions',
                    sortable: false,
                    overflow: 'visible',
                    textAlign: 'center',
                    template: function(row, index, datatable) {
                        var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                        return `
                        <a class="btn btn-hover-brand btn-icon btn-pill" id="view_enq_detail" onclick="event.preventDefault();" data-route="/admin/enquiry/view/${row.id}" data-callback="active_contacts_current_row"><i class="la la-eye" title="View Detail"></i></a>
                        `.trim();
                    },
                }
            ],

        });

        function modal(){
            let url = $(this).attr('data-route');
            showModal({
                url: url
            });
        }
        
        clickEvent('#view_enq_detail')(function(){
            modal.call(this)
        })
        clickEvent('#add--enquiry')(function(e){
            e.preventDefault()
            modal.call(this)
        })       
        
        $('[name="date"]').daterangepicker({
            singleDatePicker: true,
            autoUpdateInput: false,
            showDropdowns: true,
            minYear: 2001,
            maxYear: parseInt(moment().format('YYYY'), 10)
        }, function(start_date, end_date) {
            this.element.val(start_date.format('YYYY-MM-DD'));
        });

        var contactsTableSearch = (advanced = false, cb = "default cb") => {
            if (advanced) {
                contactsTable.setDataSourceParam("query", {});
            } else {
                let sanitized = contactsTable.getDataSourceQuery('query');
                if (sanitized.advanced) delete sanitized.advanced;
                contactsTable.setDataSourceParam("query", sanitized);
            }
            typeof cb === "function" ? cb() : '';
        }

        (() => {
			let currentTimeout = '';
			$('#t_contactstable .basic--search').off('blur keyup').on('blur keyup', function(e) {
			    if($(this).val().length > 2 || $(this).val().length == 0)
			    {
			        clearInterval(currentTimeout)
			        currentTimeout = setTimeout(() => {
			        	contactsTableSearch(false, () => {
				            contactsTable.search($(this).val(), $(this).attr('name'));
				        }); 
			        }, 1500);

			    }
			});
		})();
        
        $(document).find('[name="status"').select2({
            width: '100%'
        });
    });
</script>