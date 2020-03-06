// add new section modal
$(document)
    .off("click", "#addSection")
    .on("click", "#addSection", function () {
        let url = $(this).data("route");
        showModal({
            url: url
        });
        $("#createSectionModal")
            .modal()
            .show();
    });

// create new section section
$(document)
    .off("click", "#add_section")
    .on("click", "#add_section", function (e) {
        var add_section_btn = $("#add_section_modal_form");
        e.preventDefault();
        e.stopPropagation();
        let data = $("#add_section_modal_form").serializeArray();
        supportAjax({
                url: "/admin/validation/newSection",
                method: "post",
                data: data
            },
            function (resp) {
                $("#kt_body")
                    .empty()
                    .append(resp);
                $("#cModal").modal("hide");
                toastr.success("Added successfully.");
            },
            function ({
                status,
                responseJSON
            }) {
                if (status === 422) {
                    add_section_btn
                        .find("input[name]")
                        .css("border-color", "#ddd");
                    $(`input[name]`)
                        .siblings(".errorMessage")
                        .empty();

                    if (!responseJSON.errors) return;
                    const messages = [];
                    for (const [key, message] of Object.entries(
                            responseJSON.errors
                        )) {
                        $("#add_section_modal_form")
                            .find(`input[name = "${key}"]`)
                            .css("border-color", "#F44336");
                        messages.push(message);
                        $(`input[name="${key}"]`)
                            .siblings(".errorMessage")
                            .empty();
                        $(`input[name="${key}"]`)
                            .siblings(".errorMessage")
                            .append(message);
                    }
                    toastr.error(
                        "<strong>Please check hightlighted fields!</strong> <br><br>" +
                        messages.flat(1).join("<br>")
                    );
                }
            }
        );
    });

// add validation  modal
$(document)
    .off("click", "#addValidation")
    .on("click", "#addValidation", function (e) {
        e.preventDefault();
        e.stopPropagation();
        let section_id = $(".validation_active").attr("data-id");
        if (section_id == null) {
            toastr.error("Please Select Section");
        } else {
            showModal({
                url: "/admin/validation/addValidationModal/" + section_id
            });
        }
    });

// create new validation
$(document)
    .off("click", "#add_validation")
    .on("click", "#add_validation", function (e) {
        var add_validation_btn = $("#add_validation_form");
        e.preventDefault();
        e.stopPropagation();
        let table = $(".tableloader").attr("id");
        let form_data = $("#add_validation_form").serializeArray();
        let section_id = $(this).attr("data-id");
        let data = form_data.concat({
            name: "section_id",
            value: section_id
        });
        supportAjax({
                url: "/admin/validation/newValidation",
                method: "post",
                data: data
            },
            function (resp) {
                $("#cModal").modal("hide");
                toastr.success("New validation added successfully");
                $(`#${table}`)
                    .KTDatatable()
                    .reload();
            },
            function ({
                status,
                responseJSON
            }) {
                if (status === 422) {
                    add_validation_btn
                        .find("input[name], textarea[name]")
                        .css("border-color", "#ddd");
                    $(`input[name]`)
                        .siblings(".errorMessage")
                        .empty();

                    if (!responseJSON.errors) return;
                    const messages = [];
                    for (const [key, message] of Object.entries(
                            responseJSON.errors
                        )) {
                        add_validation_btn
                            .find(`input[name="${key}"]`)
                            .css("border-color", "#f44336");
                        add_validation_btn
                            .find(`textarea[name="${key}"]`)
                            .css("border-color", "#f44336");
                        messages.push(message);
                        $(`input[name="${key}"]`)
                            .siblings(".errorMessage")
                            .empty()
                            .append(message);

                        $(`textarea[name="${key}"]`)
                            .siblings(".errorMessage")
                            .empty()
                            .append(message);
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

// edit validation modal
$(document)
    .off("click", "#edit_validationSection")
    .on("click", "#edit_validationSection", function () {
        let url = $(this).data("route");
        showModal({
            url: url
        });
    });

// update on edit validation
$(document)
    .off("click", "#update_validation")
    .on("click", "#update_validation", function (e) {
        var update_validate_btn = $("#update_validation_form");
        e.preventDefault();
        e.stopPropagation();
        let data = $("#update_validation_form").serializeArray();
        supportAjax({
                url: "/admin/validation/update/" + $(this).data("id"),
                method: "post",
                data: data
            },
            function (resp) {
                $("#cModal").modal("hide");
                toastr.success("Updated successfully.");
                $(".validation_section_dynamic_table")
                    .KTDatatable()
                    .reload();
            },
            function ({
                status,
                responseJSON
            }) {
                if (status === 422) {
                    update_validate_btn
                        .find("input[name], textarea[name]")
                        .css("border-color", "#ddd");
                    $(`input[name]`)
                        .siblings(".errorMessage")
                        .empty();

                    // console.log(update_validate_btn);
                    if (!responseJSON.errors) return;
                    const messages = [];
                    for (const [key, message] of Object.entries(
                            responseJSON.errors
                        )) {
                        update_validate_btn
                            .find(`input[name="${key}"]`)
                            .css("border-color", "#f44336");
                        update_validate_btn
                            .find(`textarea[name="${key}"]`)
                            .css("border-color", "#f44336");
                        messages.push(message);
                        $(`input[name="${key}"]`)
                            .siblings(".errorMessage")
                            .empty()
                            .append(message);

                        $(`textarea[name="${key}"]`)
                            .siblings(".errorMessage")
                            .empty()
                            .append(message);

                        // console.log(messages);
                    }
                    toastr.error(
                        "<strong>Please check highlighted fields! </strong> <br> <br>" +
                        messages.flat(1).join("<br>")
                    );
                }
            }
        );
    });

// delete validation
$(document)
    .off("click", ".delValidationButton")
    .on("click", ".delValidationButton", function (e) {
        e.preventDefault();
        var tableId = $(".tableloader").attr("id");
        let id = $(this).data("id");
        delConfirm({
            url: "/admin/validation/delete/" + id,
            header: $(".validation_section_dynamic_table")
        });
    });

// edit validatio section
// edit validation modal
$(document)
    .off("click", ".validation_section_li_edit")
    .on("click", ".validation_section_li_edit", function () {
        let url = $(this).data("route");
        showModal({
            url: url
        });
    });

// update on  validation section
$(document)
    .off("click", "#update_validation_section")
    .on("click", "#update_validation_section", function (e) {
        var update_section_btn = $("#update_validation_section_form");
        e.preventDefault();
        e.stopPropagation();
        let data = $("#update_validation_section_form").serializeArray();
        supportAjax({
                url: "/admin/validation/updateSection/" + $(this).data("id"),
                method: "post",
                data: data
            },
            function (resp) {
                $("#cModal").modal("hide");
                $("#kt_body")
                    .empty()
                    .append(resp);
                toastr.success("Updated successfully.");
                // $(document).find(".sideValidNav").trigger("click");
            },
            function ({
                status,
                responseJSON
            }) {
                if (status === 422) {
                    update_section_btn
                        .find("input[name]")
                        .css("border-color", "#ddd");
                    $(`input[name]`)
                        .siblings(".errorMessage")
                        .empty();

                    if (!responseJSON.errors) return;
                    const messages = [];
                    for (const [key, message] of Object.entries(
                            responseJSON.errors
                        )) {
                        update_section_btn
                            .find(`input[name="${key}]`)
                            .css("border-color", "#f44336");
                        messages.push(message);
                        $(`input[name="${key}"]`)
                            .siblings(".errorMessage")
                            .empty();
                        $(`input[name="${key}"]`)
                            .siblings(".errorMessage")
                            .append(message);
                    }
                    toastr.error(
                        "<strong>Please check highlighted fields! </strong> <br> <br>" +
                        messages.flat(1).join("<br>")
                    );
                }
            }
        );
    });

// delete validation section
$(document)
    .off("click", ".delValidationSectionButton")
    .on("click", ".delValidationSectionButton", function (e) {
        e.preventDefault();
        let id = $(this).data("id");
        delConfirm({
            url: "/admin/validation/deleteSection/" + id,
            appendView: $("#kt_body")
        });
    });
