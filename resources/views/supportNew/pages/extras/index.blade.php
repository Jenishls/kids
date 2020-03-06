<div id="datatable_container" class="">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Extras
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Table</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Extras</a>
				</div>
			</div>
		</div>
		<div class="kt-subheader__wrapper">
			<a href="#" class="btn btn-brand btn-elevate btn-icon-sm btn-pill" data-target="#sy_global_modal" data-toggle="modal"  id="addExtraOption">
				<i class="la la-plus"></i>
				Extras
			</a>
		</div>
    </div>


	<div class="row pt-2">
        <div class="col col-sm-12 col-md-12 col-lg-2 col-xl-2">
            <div class="col_style left_col_style">
                <div class="kt-section">
                        <div class="add_question_section_div">
                            <div class="bs-searchbox " style="padding:0; width: 75%;">
                                <input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search" id="searchQuestionSections" placeholder="Search Question" style="height: 34px;">
                            </div>
                            <div class="kt-subheader__wrapper" title="Add Question">
                                <a class="btn btn-brand btn-elevate btn-icon-sm create_new_section" data-route="/admin/extras/addQuestionModal" id="addQuestionSection" style="color: white; height: 34px;"><i class="la la-plus question_section_add_icon" style="padding-bottom: 6px;"></i>
                                    
                                </a>
                            </div>
                        </div>
                    <div class="kt-section__content kt-section__content--border kt-section__content--fit sideSectionContent sideQuestionNav">
                        <ul class="kt-nav kt-nav--bold kt-nav--md-space kt-nav--v3 "  role="tablist" id="questionSectionsContainer">
                            @foreach ($questions as $question)
                                <li class="kt-nav__item  question_sections_element "  role="tab">
                                    <a class="kt-nav__link load_questions" data-id="{{$question->id}}" data-toggle="tab" data-route="/admin/extras/data/list/{{$question->id}}"  style="padding-top:0; padding-left:0; width: 195px;" >
                                        <span class="kt-nav__link-text">{{ucfirst($question->question)}}</span>
                                    </a>
                                    <div class="section_edit_delete">
                                        <i class="la la-edit question_section_li_edit " data-route="/admin/extras/editquestionmodal/{{$question->id}}" data-toggle="modal" data-target="#sy_global_modal"style="font-size: 16px; padding: 0px 9px;"></i>
                                        <i class="la la-trash question_section_li_delete del--question" data-id="{{$question->id}}" style="font-size: 16px;"></i>
                                    </div>
                                </li>
                                <hr style="margin: 0px;">
                            @endforeach
                                                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-sm-12 col-md-12 col-lg-9 col-xl-9">
            <div class="col_style">
                    <div class="col-md-12" id="extrasTableContainer">
                        
                    </div>
            </div>
        </div>

    </div>

   
</div>


<script>
    // $('.question_active').trigger('click');
    // setTimeout(() => {
    //     $(document).find('.question_active').children('a').trigger('click')
    // }, 100);
    // seclectpicker
    $('.selectPicker').select2({
        width:'100%',
        placeholder: 'Select'
    });
	// load question
	$(document).off("click", ".load_questions").on("click", ".load_questions", function(e) {
        loadTab($(this));
    });

	// create question section
	$(document).off("click", "#addQuestionSection").on("click", "#addQuestionSection", function () {
        let url = $(this).data("route");
        showModal({
            url: url
        });
       
    });

	// edit question section
	$(document).off("click", ".question_section_li_edit").on("click", ".question_section_li_edit", function () {
        let url = $(this).data("route");
        showModal({
            url: url
        });
	});
	
    // update question modal
    $(document).off("click", "#update_question").on("click", "#update_question", function (e) {
        let update_question = $("#update_question_form");
        e.preventDefault();
        e.stopPropagation();
        let data = $("#update_question_form").serializeArray();
        let id = $(this).attr('data-id');
        supportAjax({
                url: "/admin/extras/updateQuestion/" + $(this).data("id"),
                method: "post",
                data: data
            },
            function (resp) {
                $("#cModal").modal("hide");
                $("#kt_body").empty().append(resp);
                let tab = $(document).find(`a[data-route="/admin/extras/data/list/${id}"]`)
                toastr.success("Updated successfully.");
                loadTab($(tab));
                // $(document).find(".sideValidNav").trigger("click");
            },
            function ({
                status,
                responseJSON
            }) {
                if (status === 422) {
                    update_question.find("input[name], textarea[name]").css("border-color", "#ddd");
                    $(`input[name]`)
                        .siblings(".errorMessage")
                        .empty();

                    if (!responseJSON.errors) return;
                    const messages = [];
                    for (const [key, message] of Object.entries(
                            responseJSON.errors
                        )) {
                        update_question.find(`input[name="${key}"]`).css("border-color", "#f44336");
                        update_question.find(`textarea[name="${key}"]`).css("border-color", "#f44336");
                        messages.push(message);
                        $(`input[name="${key}"]`).siblings(".errorMessage").empty().append(message);

                        $(`textarea[name="${key}"]`).siblings(".errorMessage").empty().append(message);
                    }
                    toastr.error(
                        "<strong>Please check highlighted fields! </strong> <br> <br>" +
                        messages.flat(1).join("<br>")
                    );
                }
                // $('#cModal').modal('hide');
                // toastr.error(error.responseJSON.message);
            }
        );
    });

    // delete question
    $(document).off("click", ".del--question").on("click", ".del--question", function (e) {
        e.preventDefault();
        let table = $(".tableloader").attr("id");
        let id = $(this).data("id");
        delConfirm({
            url: "/admin/extras/deletequestion/" + id,
            appendView: $('#kt_body')
        });
    });


	// add options  modal
	$(document).off("click", "#addExtraOption").on("click", "#addExtraOption", function(e) {
			e.preventDefault();
			e.stopPropagation();
			let question_id = $(".question_active").attr("data-id");
			if (question_id == null) {
				toastr.error("Please Select Section.");
			} else {
				showModal({
					url: "/admin/extras/addmodal/"+ question_id
				});
			}
    }).off('click', '.edit--extras').on('click', '.edit--extras', function(e) {
		e.preventDefault();
		showModal({
			url: $(this).data('route')
		});
	});

	// delete
	$(document).off('click', '.extras_delete_icon').on('click', '.extras_delete_icon', function (e) {
		e.preventDefault();
		let id = $(this).attr('data-id');
		delConfirm({
			url: `/admin/extras/del/${id}`,
			header: $(`.question_section_dynamic_table`)
		});

	});


    function loadTab(element){
        let url = element.attr("data-route");
        element.parent().siblings().children().removeClass("question_active , active");
        element.parent().siblings().css("background", "white");
        element.addClass("question_active , active");

        let el = element.siblings("div ").first().children();
        if (element.hasClass("question_active")) {
            element.siblings().children().css("display", "block");
            element.parent().siblings().children(".section_edit_delete").children().css("display", "none");
            element
                .parent()
                .css("background", "#e8f8ff ");
        } else {
            // el.css('display', 'none');
            el
                .parent()
                .css("background", "white");
        }

        supportAjax(
            {
                url: url
            },
            function(resp) {
                let html = `
				<div  id = "t_questionstable_${resp.id}" data-id="${resp.id}" class="tableloader question_section_dynamic_table">
				
				</div>
				`;
                $("#extrasTableContainer")
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
                    url:  `/admin/extras/data/tablelist/${id}`,
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
                // field: '#',
                // title: '#',
				// width: 30,
				// sortable: 'true',
                // template: function(row, index, datatable) {
                //     return index+1;
                // }
                field: 'seq',
                title: 'Seq',
                sortable: 'asc',
                width: 100,
                type: 'number',
                selector: false,
                textAlign: 'center'

			}, 
			// {
			// 	sortable: true,
			// 	field: 'type',
			// 	title: 'Type',
            //     type: 'text',
            //     template: function(row){
            //         return row.extra_option.type;
            //     }
			// },
			{
				field: 'label',
				title: 'Label',
				sortable: 'true',
				type: 'text',
				selector: false,
				textAlign: 'center',
			},
			{
				field: 'price',
				title: 'Price($)',
				type: 'text',
				template: function(row){
					return `$${row.price}.00`;
				}
            },
            {
				field: 'is_default',
				title: 'Default',
				type: 'text',
				selector: false,
				textAlign: 'center',
			},

            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
                textAlign: 'center',
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return '<a class="btn btn-hover-brand btn-icon btn-pill model_load edit--extras" data-route="/admin/extras/edit/'+row.id+'" data-toggle="modal"  title="Edit details">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-hover-danger btn-icon btn-pill extras_delete_icon" data-id="'+row.id+'" title="Delete">\
                            <i class="la la-trash"></i>\
                        </a>';
                },
            }],
                });
            }
        );
    }
</script>

{{-- <li class="kt-nav__item  question_sections_element @if($key === 0) question_active @endif"  role="tab">
    <a class="kt-nav__link load_questions" data-id="{{$question->id}}" @if($key === 0) onload="$(this).trigger('click');" @endif data-toggle="tab" data-route="/admin/extras/data/list/{{$question->id}}"  style="padding-top:0; padding-left:0; width: 240px;" >
        <span class="kt-nav__link-text">{{ucfirst($question->question)}}</span>
    </a>
    <div class="section_edit_delete">
        <i class="la la-edit question_section_li_edit " data-route="/admin/extras/editquestionmodal/{{$question->id}}" data-toggle="modal" data-target="#sy_global_modal"style="font-size: 16px; padding: 0px 9px;"></i>
        <i class="la la-trash question_section_li_delete del--question" data-id="{{$question->id}}" style="font-size: 16px;"></i>
    </div>
</li> --}}

{{-- <script>

	var  extrasTable = $('#t_extras_table').KTDatatable({	
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/extras/data/list',
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
				sortable: 'true',
                template: function(row, index, datatable) {
                    return index+1;
                }

			}, 
			{
				sortable: true,
				field: 'type',
				title: 'Type',
				type: 'text',
			},
			{
				field: 'flight',
				title: 'Flight',
				sortable: 'true',
				type: 'text',
				selector: false,
				textAlign: 'center',
			},
			{
				sortable: true,
				field: 'price',
				title: 'Price($)',
				type: 'text',
				template: function(row){
					return `$${row.price}.00`;
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
                    return '<a class="btn btn-hover-brand btn-icon btn-pill model_load edit--extras" data-route="/admin/extras/edit/'+row.id+'" data-toggle="modal"  title="Edit details">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-hover-danger btn-icon btn-pill extras_delete_icon" data-id="'+row.id+'" title="Delete">\
                            <i class="la la-trash"></i>\
                        </a>';
                },
            }
        ],
	});

	$(document).off('click', '#add_extras').on('click', '#add_extras', function(e) {
		e.preventDefault();

		showModal({
			url: '/admin/extras/add'
		});
	}).off('click', '.edit--extras').on('click', '.edit--extras', function(e) {
		e.preventDefault();
		showModal({
			url: $(this).data('route')
		});
	});

	// delete
	$(document).off('click', '.extras_delete_icon').on('click', '.extras_delete_icon', function (e) {
		e.preventDefault();
		let id = $(this).attr('data-id');
		delConfirm({
			url: `/admin/extras/del/${id}`,
			header: $('#t_extras_table')
		});

	});

	
</script> --}}


