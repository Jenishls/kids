$(document)
    .off("click", ".load_lookup")
    .on("click", ".load_lookup", function(e) {
        let url = $(this).attr("data-route");
        $(this)
            .parent()
            .siblings()
            .children()
            .removeClass("lookup_active , active");
        $(this)
            .parent()
            .siblings()
            .css("background", "white");
        $(this).addClass("lookup_active , active");

        let el = $(this)
            .siblings("div ")
            .first()
            .children();
        if ($(this).hasClass("lookup_active")) {
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
            $(this)
                .parent()
                .css("background", "white");
        }
        supportAjax(
            {
                url: $(this).attr("data-route")
            },
            function(resp) {
                let html = `
        <div id="t_lookUpTable" class="lookUpTableContent">
            <div class="row tableHead">
                <div class="input-group mb-3 input-group-sm col-xl-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-code">Code</span>
                    </div>
                    <input type="text" class="form-control searchLookup" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="code_search" autocomplete="off">
                </div>
                <div class="input-group mb-3 input-group-sm col-xl-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-value">Value</span>
                    </div>
                    <input type="text" class="form-control searchLookup" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="value_search" autocomplete="off">
                </div>
                <div class="input-group mb-3 input-group-sm col-xl-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-desc">Description</span>
                    </div>
                    <input type="text" class="form-control searchLookup" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="desc_search" autocomplete="off">
                </div>
               
            </div>
        </div>
        <div  id = "t_lookuptable_${resp.id}" data-id="${resp.id}" class="tableloader">
        
        </div>
        `;
                $("#lookupTableContainer")
                    .empty()
                    .append(html);

                //load tabledata
                var table = $(".tableloader").attr("id");
                var id = $(".tableloader").attr("data-id");
                var lookUpTable = $(`#${table}`).KTDatatable({
                    // datasource definition
                    data: {
                        type: "remote",
                        source: {
                            read: {
                                url: "/lookUp/list/" + id,
                                method: "get",
                                params: {
                                    _token: "{{ csrf_token() }}"
                                }
                                /*map: function(raw) {
                        // sample data mapping
                        console.log(raw);
                        var dataSet = raw;
                        if (typeof raw.data !== 'undefined') {
                            dataSet = raw.data;
                        }
                        console.log(dataSet);
                        return dataSet;
                    },*/
                            }
                        },
                        pageSize: 50,
                        serverPaging: true,
                        serverFiltering: true,
                        serverSorting: true
                        //saveState: true
                    },

                    // layout definition
                    layout: {
                        scroll: true,
                        footer: false
                    },
                    detail: {
                        title: "sub child data table",
                        content: subTableInit
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
                                return "<div>#</div>";
                            }
                        },
                        {
                            sortable: "asc",
                            field: "code",
                            title: "Code",
                            type: "text",
                            width: 500
                        },

                        {
                            field: "Actions",
                            title: "Actions",
                            sortable: false,
                            overflow: "visible",
                            textAlign: "center",
                            template: function(row, index, datatable) {
                                var new_data = JSON.stringify(row);
                                var dropup =
                                    datatable.getPageSize() - index <= 4
                                        ? "dropup"
                                        : "";
                                return (
                                    '<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load add_lookup_group" data-id="' +
                                    row.id +
                                    '" data-route="/lookup/addGroup/' +
                                    row.code +
                                    '" data-toggle="modal" data-target="#sy_global_modal"  title="Add lookup group">\
                                    <i class="la la-plus"></i>\
                                </a>\
                                <a href="#" class="btn btn-hover-danger btn-icon btn-pill delLookupGroupButton" code="' +
                                    row.code +
                                    '" title="Delete">\
                                    <i class="la la-trash"></i>\
                                </a>\
                                <a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load view_audit_detail" data-id="' +
                                    row.id +
                                    '" data-route="/audit/details" data-table="lookups" data-new="' +
                                    new_data +
                                    '" data-toggle="modal" data-target="#sy_global_modal"  title="View audit details">\
                                    <i class="la la-eye"></i>\
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

/**
 * datatable CRUD modals
 *
 */

$(document)
    .off("click", "#addLookupSection")
    .on("click", "#addLookupSection", function(e) {
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: "/lookup/addSectionModal"
        });
    });

$(document)
    .off("click", ".add_new_lookup_fields")
    .on("click", ".add_new_lookup_fields", function(e) {
        e.preventDefault();
        e.stopPropagation();
        let section_id = $(".lookup_active").attr("data-id");
        showModal({
            url: "/lookup/addLookupModal/" + section_id
        });
    });

$(document)
    .off("click", ".edit_lookup")
    .on("click", ".edit_lookup", function(e) {
        e.preventDefault();
        e.stopPropagation();
        let lookup_id = $(this).attr("data-id");
        showModal({
            url: "/lookup/editLookupModal/" + lookup_id
        });
    });

$(document)
    .off("click", ".add_lookup_group")
    .on("click", ".add_lookup_group", function(e) {
        e.preventDefault();
        let section_id = $(".lookup_active").attr("data-id");
        url = $(this).attr("data-route");
        showModal({
            url: url + "/" + section_id
        });
    });

$(document)
    .off("click", ".delLookupGroupButton")
    .on("click", ".delLookupGroupButton", function(e) {
        e.preventDefault();
        let lookup_id = $(this).data("id");
        let table = $(".tableloader").attr("id");
        delConfirm({
            url: "/lookup/deleteLookupGroup/" + lookup_id,
            header: $(`#${table}`)
        });
    });

$(document).on("keyup", "#searchLookupSections", function(e) {
    e.preventDefault();
    var text = $(this)
        .val()
        .toLowerCase();
    if (text.length >= 3) {
        $(".validation_sections_element").hide();
        $('#lookupSectionsContainer>li>a>span:contains("' + text + '")')
            .closest(".validation_sections_element")
            .show();
    }
    if (text == "") {
        $('#lookupSectionsContainer>li>a>span:contains("' + text + '")')
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
