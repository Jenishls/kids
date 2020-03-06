<div class="row">
    <div class="col-md-7">
        <div class="pd-15" style="box-shadow: 0px 0px 13px 0px rgba(82, 63, 105, 0.05); background-color: #ffffff; margin-bottom: 20px; border-radius: 4px;">
            <h4 class="kt-subheader__title">
                Add Package
                <hr>
            </h4>
            <form class="kt-form kt-form--label-right" id="packageForm">
                @csrf
                <div class="kt-portlet__body">
                    <div class="row mb-5 no-margin">
                        <div class="form-group col-12">
                            <div class="form-group row" style="padding: 5px;">
                                <div class="col-lg-3">
                                    <label class="control-label boldLabel" for="salutation">Name</label>
                                    <input class="form-control" type="text" name="package_name" required="require" autocomplete="off">

                                </div>
                                <div class="col-lg-3">
                                    <label class="control-label boldLabel" for="first_name">Price</label>
                                    <input class="form-control" type="text" name="price" required="require" autocomplete="off">
                                    <div class="errorMessage"></div>

                                </div>
                                <div class="col-3">
                                    <label class="control-label boldLabel" for="dob">Start Date</label>
                                    <input class="form-control" type="text" id="start-date" name="date_from" required="require" autocomplete="off">
                                    <div class="errorMessage"></div>
                                </div>
                                <div class="col-3">
                                    <label class="control-label boldLabel" for="dob">End Date</label>
                                    <input class="form-control" type="text" id="end-date" name="date_to" required="require" autocomplete="off">
                                    <div class="errorMessage"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h4 class="kt-subheader__title">
                    Selected Items
                    <button type="" class="btn btn-success btn-pill pull-right btn-sm mr-10" id="storePackage">Add</button>
                    <button type="reset" class="btn btn-secondary btn-pill pull-right btn-sm mr-10" id="cancel_package">Cancel</button>
                </h4>
                <div class="pd-15">
                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__body kt-portlet__body--fit">
                            <!--begin: Datatable -->
                            <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="kt_apps_user_list_datatable" style="">
                                <table class="kt-datatable__table" style="display: block;">
                                    <thead class="kt-datatable__head">
                                        <tr class="kt-datatable__row" style="left: 0px;">
                                            <th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort">
                                                <span style="width: 200px;">Item</span></th>
                                            <th data-field="Country" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 100px;">Brand</span></th>
                                            <th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 100px;">Price</span></th>
                                            <th data-field="ShipName" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                                <span style="width: 50px;">Units</span></th>
                                            <th data-field="Status" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 100px;">Color</span></th>
                                            <th data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 110px;">Size</span></th>
                                            <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 100px;">Actions</span></th>
                                        </tr>
                                    </thead>
                                    <tbody class="kt-datatable__body" id="selected_items_table">
                                        
                                    </tbody>
                                </table>

                            </div>
                            <!--end: Datatable -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-5">
        <div class="pt-15 pb-15 pl-5" style="box-shadow: 0px 0px 13px 0px rgba(82, 63, 105, 0.05); 
            padding-right: 5px !important; background-color: #ffffff; margin-bottom: 20px; border-radius: 4px;">
            <h4 class="kt-subheader__title pl-15 pr-15">
                Select Package Items
            </h4>
            <hr>
            <div class="pd-15">
                <div class="row">
                    @foreach ($inventories as $inv)
                    <div class="col-xl-6">
                        <!--Begin::Portlet-->
                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-portlet__head kt-portlet__head--noborder" style="min-height: 30px;">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                        
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <!--begin::Widget -->
                                <div class="kt-widget kt-widget--user-profile-2">
                                    <div class="kt-widget__head">
                                        <div class="kt-widget__media">
                                        <img class="kt-widget__img kt-hidden-" style="height: 90px; width: 90px; object-fit: cover;" src="{{$inv->product->thumb?"/admin/products/image/".$inv->product->thumb->file_name:"images/no-image.png"}}" alt="image">
                                        </div>
                                        <div class="kt-widget__info">
                                            <a href="#" class="kt-widget__username">
                                               {{ucwords($inv->product->name)}}
                                            </a>
                                            <span class="kt-widget__desc">
                                                {{$inv->product->code}}
                                            </span>
                                        </div>
                                    </div>
                        
                                    <div class="kt-widget__body">
                                        <div class="kt-widget__section">
                                           {{str_limit($inv->product->short_desc, 100)}}
                                        </div>
                        
                                        <div class="kt-widget__content">
                                            <div class="kt-widget__stats kt-margin-r-20">
                                                <div class="kt-widget__icon">
                                                    <i class="flaticon-piggy-bank"></i>
                                                </div>
                                                <div class="kt-widget__details">
                                                    <span class="kt-widget__title">Price</span>
                                                    <span class="kt-widget__value"><span>$</span>{{$inv->price}}</span>
                                                </div>
                                            </div>
                        
                                            <div class="kt-widget__stats">
                                                <div class="kt-widget__icon">
                                                    <i class="flaticon-pie-chart"></i>
                                                </div>
                                                <div class="kt-widget__details">
                                                    <span class="kt-widget__title">Brand</span>
                                                    <span class="kt-widget__value">{{$inv->product->brand->name}}</span>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="kt-widget__item">
                                            <div class="kt-widget__contact">
                                                <span class="kt-widget__label">Color:</span>
                                                <a href="#" class="kt-widget__data">{{$inv->color->color}}</a>
                                            </div>
                                            <div class="kt-widget__contact">
                                                <span class="kt-widget__label">Size:</span>
                                            <a href="#" class="kt-widget__data">{{$inv->size->size}}</a>
                                            </div>
                                            <div class="kt-widget__contact">
                                                <span class="kt-widget__label">Quantity Available:</span>
                                                <span class="kt-widget__data">{{$inv->availableQuantity}}</span>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="kt-widget__footer">
                                    <button type="button" class="btn btn-label-success btn-lg btn-upper add-package-item" 
                                        data-inv = "{{$inv}}">Add Item</button>
                                    </div>
                                </div>
                                <!--end::Widget -->
                    
                            </div>
                        </div>
                        <!--End::Portlet-->
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var clientsTable = $('#packageDataTable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/package/allData',
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
        columns: [
            {
                field: '#',
                title: '#',
                width: 30,
                template: function(row, index, datatable) {
                    return index+1;
                }

            },{
                // sortable: true,
                field: 'package_name',
                title: 'Name',

            },
            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
				textAlign: 'right',
				width: 130,
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return '<a class="btn btn-hover-brand btn-icon btn-pill pageload" data-route="/admin/products/detail/'+row.id+'"><i class="la la-eye" title="View Product"></i></a>\<a class="btn btn-hover-brand btn-icon btn-pill model_load edit_product" data-route="/admin/products/edit/'+row.id+'" data-toggle="modal"  title="Edit details">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-hover-danger btn-icon btn-pill del_product" data-url ="admin/products/delete/'+row.id+'" title="Delete">\
                            <i class="la la-trash"></i>\
                        </a>';
                },
            }
        ],

	});
    $('#start-date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 2001,
        maxYear: parseInt(moment().format('YYYY'),10)
    });
    $('#end-date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 2001,
        maxYear: parseInt(moment().format('YYYY'),10)
    });

    $(document).off('click', '.add-package-item').on('click', '.add-package-item', function(e){
        e.preventDefault();
        let inv = $(this).data('inv')
        $('#selected_items_table').append(`
            <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                <input type="hidden" name="inv_id[]" value="${inv.id}">
                <td data-field="AgentName" class="kt-datatable__cell">
                    <span style="width: 200px;">
                        <div class="kt-user-card-v2">
                            <div class="kt-user-card-v2__pic">
                                <div class="kt-badge kt-badge--xl kt-badge--success">N</div>
                            </div>
                            <div class="kt-user-card-v2__details">
                                <a class="kt-user-card-v2__name" href="#">${inv.product.name}</a>									
                                <span class="kt-user-card-v2__desc">${inv.product.code}</span>                                
                            </div>
                        </div>
                    </span>
                </td>
                <td data-field="Country" class="kt-datatable__cell"><span style="width: 100px;">${inv.product.brand.name}</span></td>
                <td data-field="ShipDate" class="kt-datatable__cell"><span style="width: 100px;">${inv.price}</span></td>
                <td data-field="ShipName" data-autohide-disabled="false" class="kt-datatable__cell">
                    <span style="width: 50px;" class="inv_unit">
                            1
                    </span>
                </td>
                <td data-field="Status" class="kt-datatable__cell"><span style="width: 100px;">${inv.color.color}</span>
                </td>
                <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell"><span style="width: 110px;">${inv.size.size}</span></td>
                <td class="kt-datatable__cell--center kt-datatable__cell" data-field="Actions">
                    <span style="overflow: visible; position: relative; width: 100px;">                     
                        <a title="Delete" class="btn btn-hover-danger btn-icon btn-pill del_sel_item" href="#">                            
                            <i class="la la-trash"></i>                        
                        </a>
                    </span>
                </td>
            </tr>
        `);
    });

    $(document).off('click', '.del_sel_item').on('click', '.del_sel_item', function(e){
        e.preventDefault();
        $(this).parent().parent().parent().remove();
    });
    
    $(document).off('click', '#cancel_package').on('click', '#cancel_package', function(e){
        e.preventDefault();
        pageload("/admin/package");
    });

    $(document).off('click','#storePackage').on('click','#storePackage',function(e){
        e.preventDefault();
        $.ajax({
            url:'/admin/package/add',
            method: 'POST',
            data: new FormData(document.getElementById('packageForm')),
            contentType: false,
            processData: false,
            success: function(response){
                toastr.success(response.message);
                // $('#packageDataTable').KTDatatable().reload(); 
                pageload("/admin/package");
            }, 
            error:function({status, responseJSON})
            {
            }
        });
    });
</script>