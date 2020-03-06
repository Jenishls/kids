<style>
    .type_head{
        padding: 10px 14px;
        background: #50c8ff;
    }
    .type_head p{
        font-size: 15px;
        color: white;
        font-weight: 500;
        margin-bottom: 0;
    }
    .sideSectionContent{
        margin-top: 0 !important;
    }
</style>
<div id="datatable_container" class="">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Suitable Time Period
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Table</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Suitable Time Period</a>
				</div>
			</div>
		</div>
		<div class="kt-subheader__wrapper">
			<a href="#" class="btn btn-brand btn-elevate btn-icon-sm btn-pill" id="add_time">
				<i class="la la-plus"></i>
				Time
			</a>
		</div>
    </div>

	<div class="row pt-2">
        <div class="col col-sm-12 col-md-12 col-lg-2 col-xl-2">
            <div class="col_style">
                <div class="kt-section">
                        <div class="type_head">
                            <p>Type</p>
                        </div>
                    <div class="kt-section__content kt-section__content--border kt-section__content--fit sideSectionContent sideTypeNav">
                        <ul class="kt-nav kt-nav--bold kt-nav--md-space kt-nav--v3 "  role="tablist" id="typeSectionsContainer">
                            @if(!is_null($time_types ))
                                @foreach ($time_types  as $type)
                            
                                
                                    <li class="kt-nav__item  type_sections_element"  role="tab">
                                        <a class="kt-nav__link load_type" data-time-type="{{$type->type}}" data-toggle="tab" data-route="/admin/preferredtime/data/list/{{$type->type}}"  style="padding-top:0; padding-left:0; width: 285px;">
                                            <span class="kt-nav__link-text">{{$type->type}}</span>
                                        </a>
                                        <div class="section_edit_delete">
                                            <i class="la la-edit type_section_li_edit type_li_edit" data-route="/admin/preferredtime/edittype/{{$type->type}}" data-toggle="modal" data-target="#sy_global_modal"style="font-size: 16px; padding: 0px 9px;"></i>
                                            <i class="la la-trash type_section_li_delete del--type" data-id="" style="font-size: 16px;"></i>
                                        </div>
                                    </li>
                                <hr style="margin: 0px;">
                                @endforeach
                                @else
                                {{-- {{dd($time_types)}} --}}
                                <li style="text-align:center;">Not any type available.</p>
                            @endif
                                                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-sm-12 col-md-12 col-lg-9 col-xl-9">
            <div class="col-md-12" id="typeTableContainer"></div>
        </div>
        </div>
    </div>
</div>


<script>
	// load type
	$(document).off("click", ".load_type").on("click", ".load_type", function(e) {
        let url = $(this).attr("data-route");
        let type = $(this).attr('data-time-type');
        // alert(url);
        $(this).parent().siblings().children().removeClass("type_active , active");
        $(this).parent().siblings().css("background", "white");
        $(this).addClass("type_active , active");

        let el = $(this).siblings("div ").first().children();
        if ($(this).hasClass("type_active")) {
            $(this).parent().css("background", "#e8f8ff ");
        } else {
            $(this)
                .parent()
                .css("background", "white");
        }

        supportAjax(
            {
                url: url
            },
            function(resp) {
                console.log(resp);
                let html = `
				<div  id = "t_typetable_${type}" data-id="${resp.id}" class="tableloader type_section_dynamic_table">
				
				</div>
				`;
                $("#typeTableContainer")
                    .empty()
                    .append(html);

                //load tabledata
                var table = $(".tableloader").attr("id");
                var id = $(".tableloader").attr("data-id");

                $(`#${table}`).KTDatatable({
                    // datasource definition
                    data: {
                type: 'remote',
                source: {
                read: {
                    url:  url,
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
                field: 'seq',
                title: 'Seq',
                sortable: 'asc',
                width: 50,
                type: 'number',
                selector: false,
                textAlign: 'center'

			}, 
			// {
			// 	sortable: true,
			// 	field: 'type',
			// 	title: 'Type',
            //     type: 'text',
            //     // template: function(row){
            //     //     // return row.extra_option.type;
            //     //     return ;
            //     // }
			// },
			{
				field: 'from',
				title: 'Time From',
				sortable: 'true',
				type: 'text',
				selector: false,
				textAlign: 'center',
			},
			{
				sortable: true,
				field: 'to',
				title: 'Time To',
				type: 'text',
				template: function(row){
					return `${row.to}`;
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
                    return '<a class="btn btn-hover-brand btn-icon btn-pill model_load edit--time" data-route="/admin/preferredtime/time/edit/'+row.id+'" data-toggle="modal"  title="Edit details">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-hover-danger btn-icon btn-pill time_delete_icon" data-id="'+row.id+'" title="Delete">\
                            <i class="la la-trash"></i>\
                        </a>';
                },
            }
            ],
            });
            },
        );
    });

    // add/edit type
	$(document).off("click", "#addType").on("click", "#addType", function () {
        let url = $(this).data("route");
        showModal({
            url: url
        });
    });

	// edit type section
	$(document).off("click", ".type_li_edit").on("click", ".type_li_edit", function () {
        let url = $(this).data("route");
        showModal({
            url: url
        });
	});

    // edit add time
    $(document).off('click', '#add_time').on('click', '#add_time', function(e) {
        e.preventDefault();

        showModal({
            url: '/admin/preferredtime/time/add'
        });
    }).off('click', '.edit--time').on('click', '.edit--time', function(e) {
        e.preventDefault();
        showModal({
            url: $(this).data('route')
        });
    });

    // delete
    $(document).off('click', '.time_delete_icon').on('click', '.time_delete_icon', function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        delConfirm({
            url: `/admin/preferredtime/del/${id}`,
            header: $('.type_section_dynamic_table')
        });

    });
</script>

{{-- <div id="datatable_container" class="usersControlContent">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Preferred Time
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Table</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Preferred Time</a>
				</div>
			</div>
		</div>
		<div class="kt-subheader__wrapper">
			<a href="#" class="btn btn-brand btn-elevate btn-icon-sm btn-pill" id="add_time">
				<i class="la la-plus"></i>
				Time
			</a>
		</div>
    </div>


    <div id="t_preferred_time_table">
    </div>

    <script>
        var timeTable = $('#t_preferred_time_table').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: '/admin/preferredtime/data/list',
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
			
			// columns definition
			columns: [
				{
                    field: 'seq',
                    title: 'Seq',
                    sortable: 'asc',
                    width: 40,
                    type: 'number',
                    selector: false,
                    textAlign: 'center',
                },
                {
					sortable: true,
					field: 'type',
					title: 'Type',
					type: 'text',
				},
				{
                    field: 'from',
                    title: 'Time From',
                    sortable: 'asc',
                    type: 'text',
                    selector: false,
                    textAlign: 'center',
                },
				{
					sortable: true,
					field: 'to',
					title: 'Time To',
					type: 'text',
				},
                {
					sortable: true,
					field: 'time_flag',
					title: 'AM/PM',
					type: 'text',
				},
				
				{
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 130,
                overflow: 'visible',
                textAlign: 'center',
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return '<a  class="btn btn-hover-brand btn-icon btn-pill model_load edit--time time_edit_icon"  data-id="'+row.id+'" href="JavaScript:void(0);" data-toggle="modal" data-target="#sys_model"  data-route="/admin/preferredtime/time/edit/' + row.id + '" title="Edit details">\
                                <i class="la la-edit"></i>\
                            </a>\
                            <a class="btn btn-hover-danger btn-icon btn-pill del time_delete_icon"  data-id="'+row.id+'" title="Delete">\
                                <i class="la la-trash"></i>\
                            </a>';
                },
                }],
		});

        

        // edit add time
        $(document).off('click', '#add_time').on('click', '#add_time', function(e) {
            e.preventDefault();

            showModal({
                url: '/admin/preferredtime/time/add'
            });
        }).off('click', '.edit--time').on('click', '.edit--time', function(e) {
            e.preventDefault();
            showModal({
                url: $(this).data('route')
            });
        });
        
        // delete
        $(document).off('click', '.time_delete_icon').on('click', '.time_delete_icon', function (e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            delConfirm({
                url: `/admin/preferredtime/del/${id}`,
                header: $('#t_preferred_time_table')
            });

        });

    </script>
</div> --}}