<style>
    .form-group{
        padding-bottom:5px !important;
    }
    /* label{
        font-weight: bold !important;
    } */
    .kt-datatable__row th span {
        font-size: 14px !important;
    }
</style>
<div class="modal-dialog addClientModalDialog" role="document" style="margin-left:16%;">
    <div class="modal-content addClientModal modal-1200">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Products</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
               
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <div  style="box-shadow: 0px 0px 13px 0px rgba(82, 63, 105, 0.05); background-color: #ffffff; margin-bottom: 20px; border-radius: 4px;">
                        <div class="row user_search_row">
                            <div class="col-xl-8 order-1 order-xl-1 serach_col user_search_col userSearchCol">
                                <div class="form-group m-form__group row align-items-center ">
                                   


                                    <div class="col-md-5 col-sm-5">
                                        <div class="input-group mb-3 input-group-sm userInputGroup">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Product Name</span>
                                            </div>
                                            <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="productSearch" autocomplete="off" name="name">
                                        </div>

                                    </div>
                                    {{-- <div class="col-md-3 col-sm-3">
                                        <div class="input-group mb-3 input-group-sm userInputGroup">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Ownership</span>
                                            </div>
                                            <input type="text" class="form-control basic--search" aria-label="Sizing example input" name="ownership" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="ownership_search">
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3">
                                        <div class="input-group input-group-sm userInputGroup">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Industry</button>
                                            </div>
                                            <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="industry_name_search" autocomplete="off" name="industry">

                                        </div>
                                    </div> --}}
                                    <div id="reload_table">
                                        <i class="fas fa-redo searchRedo"></i>
                                    </div>

                                </div>
                            </div>
                           
                        </div>

                    </div>
                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__body">
                            <!--begin: Selected Rows Group Action Form -->
                            <div class="kt-form kt-form--label-align-right kt-margin-t-20 collapse" id="kt_datatable_group_action_form" style="">
                                <div class="row align-items-center">
                                    <div class="col-xl-12">
                                        <div class="kt-form__group kt-form__group--inline">
                                            <div class="kt-form__label kt-form__label-no-wrap">
                                                <label class="kt-font-bold kt-font-danger-">Selected
                                                    <span id="kt_datatable_selected_number">0</span> records:</label>
                                            </div>
                                            <div class="kt-form__control">
                                                <div class="btn-toolbar">
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-brand btn-sm dropdown-toggle" data-toggle="dropdown">
                                                            Update status
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Pending</a>
                                                            <a class="dropdown-item" href="#">Delivered</a>
                                                            <a class="dropdown-item" href="#">Canceled</a>
                                                        </div>
                                                    </div>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <button class="btn btn-sm btn-danger" type="button" id="kt_datatable_delete_all">Delete All</button>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <button class="btn btn-sm btn-success" type="button" data-toggle="modal" data-target="#kt_modal_fetch_id">Fetch Selected Records</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end: Selected Rows Group Action Form -->
                        </div>
                        <div id="productstable">
                            
                        </div>
                    </div>
                    {{-- <div id="productstable"></div>     --}}
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var options = {
            // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/products/allData',
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
            saveState: {
                cookie: false,
                webstorage: true
            },
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true
            //saveState: true 
        },
            
        // layout definition
        layout: {
            theme: 'default',
            class: '',
            scroll: true,
            height: 500,
        },

        // column sorting
        sortable: true,

        filterable: false,

        pagination: true,

        columns: [
            {
                field: 'id',
                title: '#',
                width: 40,
                sortable: false,
                selector: {
                    class: 'kt-checkbox--solid'
                },
                textAlign: 'center',
                

            },{
                // sortable: true,
                field: 'code',
                title: 'Code',
                width: 50,

            },{
                // sortable: true,
                field: 'name',
                title: 'Name',
                width: 200,

            },
            {
                field: 'brand.name',
                title: 'Brand',
                // width: 350,
            },
            {
                field: 'unit_price_label',
                title: 'Unit Price ($)',
                // width: 350,

            },
            {
                field: 'row.categories[0].category',
                title: 'Category',
                template: function(row, index, datatable) {
                    if(row.categories[0]){
                        return row.categories[0].category;
                    }else{
                        return "-"
                    }
                }
            },
            {
                field: 'inv_hold',
                title: 'Inventory Hold',
                // width: 350,
            },
            {
                field: 'inv_sold',
                title: 'Inventory Sold',
                // width: 350,
            },

            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
                textAlign: 'center',
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return '<a class="btn btn-hover-success btn-icon btn-pill selectProduct" data-value="'+row+'" data-route="/admin/purchaseorder/product/select/'+row.id+'" data-id="'+row.id+'"><i class="la la-check" title="Add This Product"></i></a>';
                },
            }
        ]
    };
    var serverSelectorDemo = function() {
        // enable extension
        options.extensions = {
            checkbox: {}
        };
        options.search = {
            input: $("#generalSearch1")
        };

        var productsTable = $("#productstable").KTDatatable(options);

        $("#kt_form_status1").on("change", function() {
            productsTable.search(
                $(this)
                    .val()
                    .toLowerCase(),
                "Status"
            );
        });

        $("#kt_form_type1").on("change", function() {
            productsTable.search(
                $(this)
                    .val()
                    .toLowerCase(),
                "Type"
            );
        });

        $("#kt_form_status1,#kt_form_type1").selectpicker();

        productsTable.on(
            "kt-datatable--on-click-checkbox kt-datatable--on-layout-updated",
            function(e) {
                // datatable.checkbox() access to extension methods
                var ids = productsTable.checkbox().getSelectedId();
                var count = ids.length;
                $("#kt_datatable_selected_number1").html(count);
                if (count > 0) {
                    $("#kt_datatable_group_action_form1").collapse("show");
                } else {
                    $("#kt_datatable_group_action_form1").collapse("hide");
                }
            }
        );

        $("#kt_modal_fetch_id_server")
            .on("show.bs.modal", function(e) {
                var ids = productsTable.checkbox().getSelectedId();
                var c = document.createDocumentFragment();
                for (var i = 0; i < ids.length; i++) {
                    var li = document.createElement("li");
                    li.setAttribute("data-id", ids[i]);
                    li.innerHTML = "Selected record ID: " + ids[i];
                    c.appendChild(li);
                }
                $(e.target)
                    .find(".kt-datatable_selected_ids")
                    .append(c);
            })
            .on("hide.bs.modal", function(e) {
                $(e.target)
                    .find(".kt-datatable_selected_ids")
                    .empty();
            });
    };
    jQuery(document).ready(function() {
        serverSelectorDemo();
    });
    //     var productsTable = $('#productstable').KTDatatable({
    //     // datasource definition
    //     data: {
    //         type: 'remote',
    //         source: {
    //             read: {
    //                 url: '/admin/products/allData',
    //                 method: 'get',
    //                 map: function(raw) {
    //                     // sample data mapping
    //                     var dataSet = raw;
    //                     if (typeof raw.data !== 'undefined') {
    //                         dataSet = raw.data;
    //                     }
    //                     return dataSet;
    //                 },
    //             },
    //         },
    //         pageSize: 50,
    //         saveState: {
    //             cookie: false,
    //             webstorage: true
    //         },
    //         serverPaging: true,
    //         serverFiltering: true,
    //         serverSorting: true
    //         //saveState: true 
    //     },
        
    //     // layout definition
    //     layout: {
    //         theme: 'default',
    //         class: '',
    //         scroll: true,
    //         height: 500,
    //     },

    //     // column sorting
    //     sortable: true,

    //     filterable: false,

    //     pagination: true,


    //     // columns definition
    //     columns: [
    //         {
    //             field: 'id',
    //             title: '#',
    //             width: 40,
    //             sortable: false,
    //             selector: {
    //                 class: 'kt-checkbox--solid'
    //             },
    //             textAlign: 'center',
                

    //         },{
    //             // sortable: true,
    //             field: 'code',
    //             title: 'Code',
    //             width: 50,

    //         },{
    //             // sortable: true,
    //             field: 'name',
    //             title: 'Name',
    //             width: 200,

    //         },
    //         {
    //             field: 'brand.name',
    //             title: 'Brand',
    //             // width: 350,
    //         },
    //         {
    //             field: 'unit_price_label',
    //             title: 'Unit Price ($)',
    //             // width: 350,

    //         },
    //         {
    //             field: 'row.categories[0].category',
    //             title: 'Category',
    //             template: function(row, index, datatable) {
	// 				if(row.categories[0]){
	// 					return row.categories[0].category;
	// 				}else{
	// 					return "-"
	// 				}
	// 			}
    //         },
    //         {
    //             field: 'inv_hold',
    //             title: 'Inventory Hold',
    //             // width: 350,
    //         },
    //         {
    //             field: 'inv_sold',
    //             title: 'Inventory Sold',
    //             // width: 350,
    //         },

    //         {
    //             field: 'Actions',
    //             title: 'Actions',
    //             sortable: false,
    //             overflow: 'visible',
    //             textAlign: 'center',
    //             template: function(row, index, datatable) {
    //                 var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
    //                 return '<a class="btn btn-hover-success btn-icon btn-pill selectProduct" data-value="'+row+'" data-route="/admin/purchaseorder/product/select/'+row.id+'"><i class="la la-check" title="Add This Product"></i></a>';
    //             },
    //         }
    //     ],

    // });
    $('#productSearch').on('keyup', function(e){
        e.preventDefault();
        let value = $(this).val();
        if(value.length >= 3){
            productsTable.KTDatatable().search(value, 'name');
        }
    })
    // productsTable.on('kt-datatable--on-check', function(event, args){
    //     console.log(event, args);
    //     productsTable.setActive($this);
    // });
    $('.kt-checkbox input[type="checkbox"]').click(function(e){
        productsTable.initCheckbox();
    })

    
    $(document)
    .off("click", ".selectProduct")
    .on("click", ".selectProduct", function(e) {
        e.preventDefault();
        let already_selected_products_array = [];
        let id_holds = document.querySelectorAll('input[name="product_id[]"]');
        // console.log(id_holds);
        let current_pid = parseInt($(this).attr('data-id'));
        $.each(id_holds, function(i,v){
            let p_id = $(v).val();
            if (p_id!= null && p_id!== '') {
                already_selected_products_array.push(parseInt(p_id));
            }
        });
        if ($.inArray(current_pid, already_selected_products_array) >= 0) {
            toastr.error('Product Already Selected');
            return;
        }
        let po_row_count = $('#productLookup').attr('data-count');
        let url = $(this).attr("data-route");
        // console.log(po_row_count);
        supportAjax(
            {
                url: url
            },
            function(resp) {
                $("#cModal").modal("hide");
                $("#cModal2").modal("hide");
                let newrow = `
                <tr class="table_row_${po_row_count}">
                    <td>
                        <div class="row">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="product_name[]" autocomplete="off" value="${resp.name}" disabled>
                                <input type="text" class="form-control" name="product_id[]" autocomplete="off" value="${resp.id}" hidden>
                            </div>
                            <div class="col-sm-2 p_lookupDiv" style="display:none">
                                <button class="btn btn-sm btn-secondary btn-elevate-hover btn-circle btn-icon productLookup" data-count="-2">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                    
                    <td>
                        <div class="row">
                            <div class="col-sm-11">
                                <input type="number" min="1" name="qty[]" value="1" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-sm-11">
                                <input type="text" name="quoted_amt[]" original-amt="${resp.unit_price_label}" value="${resp.unit_price_label}" class="form-control" autocomplete="off" style="text-align:right;">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-sm-11">
                                <input type="text" name="approved_amt[]" value="${resp.unit_price_label}" class="form-control" autocomplete="off" style="text-align:right;">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-sm-11">
                                <input type="text" name="billed_amt[]" value="${resp.unit_price_label}" class="form-control" autocomplete="off" style="text-align:right;">
                            </div>
                        </div>
                    </td>
                    <td>
                        
                        <button class="btn btn-sm btn-secondary btn-elevate-hover btn-circle btn-icon po_rowremove" style="color:brown" data-id="${po_row_count}">
                            <i class="la la-remove"></i>
                        </button>
                    </td>
                </tr>
            `;
                $("#prependTableRow").prepend(newrow);
                po_row_count++;
                $('#productLookup').attr('data-count', po_row_count);
            },
            function(err) {
                console.log(err);
            }
        );
        setTimeout(() => {
            calculate_sub_total();
        }, 200);

    });

</script>