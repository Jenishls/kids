$(document)
    .off("click", ".load_validations")
    .on("click", ".load_validations", function(e) {
        let url = $(this).attr("data-route");
        $(this)
            .parent()
            .siblings()
            .children()
            .removeClass("validation_active , active");
        $(this)
            .parent()
            .siblings()
            .css("background", "white");
        $(this).addClass("validation_active , active");

        let el = $(this)
            .siblings("div ")
            .first()
            .children();
        if ($(this).hasClass("validation_active")) {
            $(this)
                .siblings()
                .children()
                .css("display", "block");
            $(this)
                .parent()
                .siblings()
                .children(".section_edit_delete")
                .children()
                .css("display", "none");
            $(this)
                .parent()
                .css("background", "#5d58d129");
        } else {
            // el.css('display', 'none');
            $(this)
                .parent()
                .css("background", "white");
        }

        supportAjax(
            {
                url: url
            },
            function(resp) {
                let html = `
        <div id="t_validationstable" class="validationTableContent">
            <div class="row tableHead ">
                    
                    <div class="input-group mb-3 input-group-sm col-xl-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-code">Code</span>
                        </div>
                        <input type="text" class="form-control searchLookup" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Search.." id="validation_code_search" autocomplete="off">
                    </div>
                    <div class="input-group mb-3 input-group-sm col-xl-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-value">Value</span>
                        </div>
                        <input type="text" class="form-control searchLookup" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-value" placeholder="search.." id="validation_value_search" autocomplete="off">
                    </div>
            </div>
        </div>
        <div  id = "t_validationstable_${resp.id}" data-id="${resp.id}" class="tableloader validation_section_dynamic_table">
        
        </div>
        `;
                $("#lookupTableContainer")
                    .empty()
                    .append(html);

                //load tabledata
                var table = $(".tableloader").attr("id");
                var id = $(".tableloader").attr("data-id");

                $(`#${table}`).KTDatatable({
                    // datasource definition
                    data: {
                        type: "remote",
                        source: {
                            read: {
                                url: `/validations/tableList/${id}`,
                                method: "GET",
                                params: {
                                    _token: "{{ csrf_token() }}"
                                }
                                //map: function(raw) {
                                // sample data mapping
                                //var dataSet = raw;
                                //if (typeof raw.original !== 'undefined') {
                                //	dataSet = raw.original;
                                //}
                                //return dataSet;
                                //},
                            }
                        },
                        pageSize: 10,
                        serverPaging: true,
                        serverFiltering: true,
                        serverSorting: true
                    },

                    // layout definition
                    layout: {
                        scroll: false,
                        footer: false
                    },

                    // column sorting
                    sortable: true,

                    pagination: true,

                    // columns definition
                    columns: [
                        {
                            sortable: false,
                            field: "#",
                            title: "#",
                            width: 12,
                            template: function(row, index, datatable) {
                                return "#";
                            }
                        },
                        {
                            sortable: "asc",
                            field: "code",
                            title: "Code",
                            type: "text",
                            selector: false
                        },
                        {
                            field: "value",
                            title: "Value"
                        },
                        {
                            field: "description",
                            title: "Description"
                        },
                        {
                            field: "Actions",
                            title: "Actions",
                            sortable: false,
                            width: 130,
                            overflow: "visible",
                            textAlign: "center",
                            template: function(row, index, datatable) {
                                var dropup =
                                    datatable.getPageSize() - index <= 4
                                        ? "dropup"
                                        : "";
                                return (
                                    '<a id="edit_validationSection" class="btn btn-hover-brand btn-icon btn-pill model_load" data-route="/validation/editmodal/' +
                                    row.id +
                                    '" href="JavaScript:void(0);" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
                                        <i class="la la-edit" style="font-size: 1.2rem;"></i>\
                                    </a>\
                                    <a  class="btn btn-hover-danger btn-icon btn-pill delValidationButton" data-id="' +
                                    row.id +
                                    '" title="Delete">\
                                        <i class="la la-trash" style="font-size: 1.2rem;"></i>\
                                    </a>'
                                );
                            }
                        }
                    ]
                });
            },
            function(err) {}
        );
    });

// validation section seacrh
$(document).on("keyup", "#searchValidationSections", function(e) {
    e.preventDefault();
    var text = $(this)
        .val()
        .toLowerCase();
    if (text.length >= 3) {
        $(".validation_sections_element").hide();
        $('#validationSectionsContainer>li>a>span:contains("' + text + '")')
            .closest(".validation_sections_element")
            .show();
    }
    if (text == "") {
        $('#validationSectionsContainer>li>a>span:contains("' + text + '")')
            .closest(".validation_sections_element")
            .show();
    }
});
$.expr[":"].contains = $.expr.createPseudo(function(arg) {
    return function(elem) {
        return (
            $(elem)
                .text()
                .toUpperCase()
                .indexOf(arg.toUpperCase()) >= 0
        );
    };
});

// validation table code search
$(document).on("keyup", "#validation_code_search", function(e) {
    e.preventDefault();
    let value = $(this).val();
    let table_id = $(".tableloader").attr("id");
    if (value.length >= 3) {
        $(`#${table_id}`)
            .KTDatatable()
            .search(value, "code");
    }
    if (value == "") {
        $(`#${table_id}`)
            .KTDatatable()
            .search(value, "code");
    }
});

// validation value search
$(document).on("keyup", "#validation_value_search", function(e) {
    let value = $(this).val();
    let table_id = $(".tableloader").attr("id");
    if (value.length >= 3) {
        $(`#${table_id}`)
            .KTDatatable()
            .search(value, "value");
    }
    if (value == "") {
        $(`#${table_id}`)
            .KTDatatable()
            .search(value, "value");
    }
});
