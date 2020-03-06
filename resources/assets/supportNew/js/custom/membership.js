$(document)
    .off("click", "#add_membership")
    .on("click", "#add_membership", function() {
        let url = $(this).data("route");
        showModal({
            url: url
        });
    });

// add new membership
$(document)
    .off("click", "#add_new_membership")
    .on("click", "#add_new_membership", function(e) {
        e.preventDefault();
        let add_membership_form = $("#add_membership_form");
        let form = $("#add_membership_form").serializeArray();
        let url = $(this).data("route");

        let id = $(this).attr("data-id");
        let data = form.concat({
            name: "this_user_id",
            value: id
        });
        supportAjax(
            {
                url: url,
                method: "POST",
                data: data
            },
            function(resp) {
                $("#cModal").modal("hide");
                $("#t_membershipstable")
                    .KTDatatable()
                    .reload();
                toastr.success("Updated successfully.");
            },
            function({ status, responseJSON }) {
                if (status === 422) {
                    add_membership_form
                        .find("input[name]")
                        .css("border-color", "#F44336");
                    if (!responseJSON.errors) return;
                    const messages = [];
                    for (const [key, message] of Object.entries(
                        responseJSON.errors
                    )) {
                        add_membership_form
                            .find(`input[name = "${key}"]`)
                            .css("border-color", "#F44336");
                        messages.push(message);
                    }
                    toastr.error(
                        "<strong>Please check hightlighted fields!</strong> <br><br>" +
                            messages.flat(1).join("<br>")
                    );
                }
            }
        );
    });

// edit update mebership
$(document)
    .off("click", "#membership_update")
    .on("click", "#membership_update", function(e) {
        e.preventDefault();
        let form = $(this)
            .closest("form")
            .serializeArray();
        let membership_update_form = $("#edit_membership_form");
        let url = $(this).data("route") + "/" + $(this).attr("data-id");

        let id = $(this).attr("data-id");
        let data = form.concat({
            name: "this_user_id",
            value: id
        });
        supportAjax(
            {
                url: url,
                method: "POST",
                data: data
            },
            function(resp) {
                $("#cModal").modal("hide");
                $("#t_membershipstable")
                    .KTDatatable()
                    .reload();
                toastr.success("Updated successfully.");
                // $('.profile_content_column').load('/userMenu/{profile_sidebar}/' + id);
            },
            function({ status, responseJSON }) {
                if (status === 422) {
                    membership_update_form
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
                        membership_update_form
                            .find(`input[name = "${key}"]`)
                            .css("border-color", "#F44336");
                        membership_update_form
                            .find(`select[name = "${key}"]`)
                            .css("border-color", "#F44336");
                        messages.push(message);
                        $(`input[name="${key}"]`)
                            .siblings(".errorMessage")
                            .empty()
                            .append(message);

                        $(`select[name="${key}"]`)
                            .siblings(".errorMessage")
                            .empty()
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

// look up modal
$(document)
    .off("click", ".addModal")
    .on("click", ".addModal", function() {
        let url = $(this).data("route");
        $("#membership_modal_body").css({
            display: "none"
        });
        $("#addNewCardType")
            .modal()
            .show();
        //show id Card type
        supportAjax(
            {
                url: "/dashboard/membership/idCardType",
                method: "GET"
            },
            function(resp) {
                let temp = "";
                resp.forEach(function(data, index) {
                    temp += `<label class="kt-checkbox kt-checkbox--solid f-s-16" id="card_type_label" style="text-transform:capitalize;">
                            <input type="radio" name="id_card_type" class="" value="${data.value}">${data.value}
                            <span ></span>
                            </label> <br>`;
                });
                $(".id_cardlook_up_div")
                    .empty()
                    .append(temp);
            }
        );
    });
//close addModal
$(document)
    .off("click", ".closeThisModal")
    .on("click", ".closeThisModal", function(e) {
        e.preventDefault();
        e.stopPropagation();
        $("#addNewCardType")
            .modal()
            .hide();
        $("#membership_modal_body").show();
        $(".modal-backdrop.fade.show").remove();
    });
//add new modal
$(document)
    .off("click", ".custom_id_type_modal_btn")
    .on("click", ".custom_id_type_modal_btn", function(e) {
        e.preventDefault();
        e.stopPropagation();
        $("#membership_modal_body").css({
            display: "none"
        });
        $("#addMembershipModal")
            .modal()
            .hide();
        $("#addNewCardType")
            .modal()
            .show();
    });
// store new card value
$(document)
    .off("click", ".store_new_card_type")
    .on("click", ".store_new_card_type", function(e) {
        e.preventDefault();
        e.stopPropagation();

        let url = $(this).data("route");
        let data = $("#save_new_card_type_form").serializeArray();
        // console.log(data);
        let section_id = $(this).attr("data-id");
        let form = data.concat({
            name: "section_id",
            value: section_id
        });

        let errors = [];
        $('form#save_new_card_type_form :input[type="text"]').each(function() {
            if ($(this).val()) {
                $(this).css("border-color", "#ebedf2");
            } else {
                errors.push($(this));
                $(this).css("border-color", "#ff9a9a");
            }
        });

        supportAjax(
            {
                url: url,
                data: form,
                method: "POST"
            },
            function(resp) {
                toastr.success("Added successfully.");
                $("#addNewCardType")
                    .modal()
                    .hide();
                $("#membership_modal_body").collapse();
                $(".modal-backdrop.fade.show").remove();
                $(document)
                    .find("#add_membership")
                    .trigger("click");
            },
            function(err) {
                console.log(errors);
                // $('.fieldError').append(error);
            }
        );
    });
