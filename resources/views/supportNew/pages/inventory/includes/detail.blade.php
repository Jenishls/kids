<style>
    #style-7::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
        border-radius: 10px;
    }

    .scrollbar
    {
        margin-left: 30px;
        float: left;
        height: 50px;
        width: 65px;
        background: #F5F5F5;
        overflow-y: scroll;
        margin-bottom: 25px;
    }

    .force-overflow
    {
        min-height: 100px;
    }

</style>
<div class="datatable_container usersControlContent" id="datatable_container">
    <div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Package
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Table</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Package</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">{{$package->name}}</a>
                </div>
                <div class="back_temp ml-auto" style="width: 94px;">
                        <a class="kt-menu__link pageload" onclick="event.preventDefault();" data-route="/admin/package">
                            <i class="fas fa-arrow-left" style="padding-right: 10px;
                            "></i>
                            Back
                        </a>
                    </div>
                {{-- <button type="button" class="btn btn-light btn-elevate-hover btn-pill ml-auto pageload" data-route="/admin/products"><i class="fa fa-arrow-left"></i> Back</button> --}}
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-xl-6">
                <!--Begin::Portlet-->
                <div>
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__body">
                        <!--begin::Widget -->
                        <div class="kt-widget kt-widget--user-profile-2">
                            <div class="kt-widget__head" style="padding-bottom: 7px; margin-top: -10px; border-bottom: 3px solid #ccc;">
                                <div class="kt-widget__media">
                                        <div class="kt-user-card-v2__pic" style="position: relative">
                                            <img id="package_thumb" style="height: 80px; width: 80px; object-fit: cover; border-radius: 0;" src="{{$package->thumb?"/admin/package/thumb/".$package->thumb->file_name:"images/no-image.png"}}" alt="photo">
                                            <label class="kt-avatar__upload logoUpload edit_package_thumb" data-toggle="kt-tooltip" title="" data-original-title="Change logo" style="top: -15px; right: -15px;">
                                                    <i class="fa fa-pen"></i>
                                                </label>
                                        </div>
                                </div>
                                <div class="kt-widget__info">
                                    <a class="kt-widget__username pointer" style="font-size: 1.3rem;">
                                        {{ucwords($package->package_name)}}
                                    </a>
                                </div>
                                <a href="javascript:void(0);" class="btn btn-clean btn-sm btn-icon btn-icon-md edit_package ml-auto" data-route="/admin/package/editPackage/{{$package->id}}">
                                    <i class="far fa-edit"></i>
                                </a>
                            </div>
                
                            <div class="kt-widget__body pt-5">
                                <div class="kt-widget__content">
                                    <div class="kt-widget__stats kt-margin-r-20 pb-0">
                                        <div class="kt-widget__icon">
                                            <i class="flaticon-piggy-bank"></i>
                                        </div>
                                        <div class="kt-widget__details">
                                            <span class="kt-widget__title">Price</span>
                                        <span class="kt-widget__value"><span>$</span>{{$package->price}}</span>
                                        </div>
                                    </div>
                                    <div class="kt-widget__stats kt-margin-r-20 pb-0">
                                        <div class="kt-widget__icon">
                                            <i class="flaticon-open-box"></i>
                                        </div>
                                        <div class="kt-widget__details">
                                            <span class="kt-widget__title">Items</span>
                                            <span class="kt-widget__value">8</span>
                                        </div>
                                    </div>
                                    <div class="kt-widget__stats kt-margin-r-20 pb-0">
                                        <div class="kt-widget__icon">
                                            <i class="flaticon-calendar"></i>
                                        </div>
                                        <div class="kt-widget__details">
                                            <span class="kt-widget__title">Start Date</span>
                                        <span class="kt-widget__value">{{format_to_us_date($package->date_from)}}</span>
                                        </div>
                                    </div>
                
                                    <div class="kt-widget__stats pb-0">
                                        <div class="kt-widget__icon">
                                            <i class="flaticon-calendar-3"></i>
                                        </div>
                                        <div class="kt-widget__details">
                                            <span class="kt-widget__title">End Date</span>
                                        <span class="kt-widget__value">{{format_to_us_date($package->date_to)}}</span>
                                        </div>
                                    </div>
                                </div>
     
                            </div>
                        </div>
                        <!--end::Widget -->
                
                        <!--begin::Navigation -->
                        <ul class="kt-nav kt-nav--bold kt-nav--md-space kt-margin-t-20 kt-margin-b-20 kt-hidden" role="tablist">
                            <li class="kt-nav__item kt-nav__item--active">
                                <a class="kt-nav__link active" data-toggle="tab" href="#kt_profile_tab_personal_information" role="tab">
                                    <span class="kt-nav__link-icon"><i class="flaticon2-calendar-3"></i></span>
                                    <span class="kt-nav__link-text">Personal Information</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a class="kt-nav__link" data-toggle="tab" href="#kt_profile_tab_account_information" role="tab">
                                    <span class="kt-nav__link-icon"><i class="flaticon2-protected"></i></span>
                                    <span class="kt-nav__link-text">Acccount Information</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a class="kt-nav__link" href="#" role="tab" data-toggle="kt-tooltip" title="" data-placement="right" data-original-title="This feature is coming soon!">
                                    <span class="kt-nav__link-icon"><i class="flaticon2-hourglass-1"></i></span>
                                    <span class="kt-nav__link-text">Payments</span>
                                </a>
                            </li>
                            <li class="kt-nav__separator"></li>
                            <li class="kt-nav__item">
                                <a class="kt-nav__link" href="#" role="tab" data-toggle="kt-tooltip" title="" data-placement="right" data-original-title="This feature is coming soon!">
                                    <span class="kt-nav__link-icon"><i class="flaticon2-bell-2"></i></span>
                                    <span class="kt-nav__link-text">Statements</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a class="kt-nav__link" href="#" role="tab" data-toggle="kt-tooltip" title="" data-placement="right" data-original-title="This feature is coming soon!">
                                    <span class="kt-nav__link-icon"><i class="flaticon2-medical-records-1"></i></span>
                                    <span class="kt-nav__link-text">Audit Log</span>
                                </a>
                            </li>
                        </ul>
                        <!--end::Navigation -->
                    </div>
                </div>
                </div>
                <!--End::Portlet-->
                <div>
                        <div id="packageItemTable">
                            
                        </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row h-100">
                    <div class="col-md-12">
                            <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid" >
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-toolbar">
                                    <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand nav-tabs-line-2x nav-tabs-line-right nav-tabs-bold" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_4_1_tab_content" role="tab">
                                                <i class="fa fa-dolly" aria-hidden="true"></i>Orders
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_4_2_tab_content" role="tab">
                                                <i class="fab fa-dribbble" aria-hidden="true"></i>Notes
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="kt-portlet__body py-0 px-3" >                   
                                <div class="tab-content">
                                    <div class="tab-pane" id="kt_portlet_base_demo_4_1_tab_content" role="tabpanel">
                                            Orders
                                    </div>
                                    <div class="tab-pane" id="kt_portlet_base_demo_4_2_tab_content" role="tabpanel">
                                            notes
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

<script>
    $(document).off('click', '.edit_package_thumb').on('click', '.edit_package_thumb', function(e) {
       e.preventDefault();
       e.stopPropagation();
       let url = "/admin/package/edit/thumb/{{$package->id}}";
        showModal({
            url: url
        });
    })

    var clientsTable = $('#packageItemTable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/package/items/{{$package->id}}',
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
        autoColumns: true,

        // layout definition
        layout: {
            scroll: false,
            footer: false,
        },

        // column sorting
        sortable: true,

        pagination: false,


        // columns definition
        columns: [
            {
                field: '#',
                title: '#',
                width: 20,
                template: function(row, index, datatable) {
                    return index+1;
                }

            },{
                // sortable: true,
                field: 'product.name',
                title: 'Item',
                width:200,
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return `
                                <div class="kt-user-card-v2">
                                    <div class="kt-user-card-v2__pic">
                                        <img alt="photo" src="${row.inventory.product.thumb?"/admin/products/image/"+row.inventory.product.thumb.file_name:"images/no-image.png"}" style="height: 40px; width: 40px; object-fit: cover;">
                                    </div>
                                    <div class="kt-user-card-v2__details">
                                        <a class="kt-user-card-v2__name" href="#">${row.inventory.product.name}</a>
                                        <span class="kt-user-card-v2__desc">${row.inventory.product.code}</span>
                                    </div>
                                </div>
                           
                    `;
                },

            },
            {
                // sortable: true,
                field: 'inventory.price',
                title: 'Price',
                width:50,

            },
            {
                // sortable: true,
                field: 'inventory.product.brand.name',
                title: 'Brand',

            },
            {
                // sortable: true,
                field: 'inventory.color.color',
                title: 'Color',

            },
            {
                // sortable: true,
                field: 'inventory.size.size',
                title: 'Size',
                

            },
            {
                // sortable: true,
                field: 'quantity',
                title: 'Units',
                textAlign: 'center',
                class: 'theOne',
                width:50,

            },
            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
				textAlign: 'center',
                class: 'pr-0',
				width: 50,
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return '<a class="btn btn-hover-brand btn-icon btn-pill pageload" data-route="/admin/products/detail/'+row.inventory.product_id+'"><i class="la la-eye" title="Add Item"></i></a>';
                },
            }
        ],

	});

   $(document).ready(function(e){
    $.ajax({
            method: "get",
            url: "/admin/products/tab/overall/{{$package->id}}",
            data: {},
            beforeSend: function () {
                $("#tab-detail_container").html(cssload);
            },
            success: function (response, status, xhr) {
                setTimeout(function () {
                    $("#tab-detail_container").html(response);
                }, 200);
            },
            error: function (xhr, status, error) {}
        });
   })

    $(document).off('click', '#edit_category').on('click', '#edit_category', function(e) {
        let url = $(this).attr("data-route");
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: url
        });
    })

    $('#featureSmallList').hover(function(e){
        e.preventDefault();
        $('#featureList').toggle();
    });
</script>