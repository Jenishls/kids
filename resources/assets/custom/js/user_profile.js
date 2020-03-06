$(document).on("click", ".task_head .task_head_ul  li", function() {
    $(this)
        .siblings()
        .removeClass("task_head_li_active");
    $(this).addClass("task_head_li_active");
    changePage($(this).attr("data-pageIndex"));
});

function changePage(pageIndex) {
    let pages = $("#task_pages").children();
    $(pages).removeClass("active");
    $(pages)
        .eq(pageIndex)
        .addClass("active");
}
// edit modal route
$(document)
    .off("click", ".update_address_details")
    .on("click", ".update_address_details", function() {
        let url = $(this).data("route");
        showModal({
            url: url
        });
    });

// personal information modal update
$(document)
    .off("click", ".info_update")
    .on("click", ".info_update", function(e) {
        e.preventDefault();
        let form = $(this)
            .closest("form")
            .serializeArray();

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
                $(document)
                    .find("#personalInformation")
                    .trigger("click");
                toastr.success("Updated successfully.");
            },
            function(err) {
                console.log(err);
            }
        );
    });

$(document)
    .off("click", ".profile_update")
    .on("click", ".profile_update", function(e) {
        e.preventDefault();
        e.stopPropagation();
        let profile_update_form = $("#edit_personal_profile_form");
        let form = $(this).closest("form");

        let url = "update/userImageTitle" + "/" + $(this).attr("data-id");

        let id = $(this).attr("data-id");
        let formData = $.ajax({
            url,
            method: "POST",
            data: new FormData(
                document.getElementById("edit_personal_profile_form")
            ),
            contentType: false,
            processData: false,
            success: function(resp) {
                $("#kt_body")
                    .empty()
                    .append(resp);
                $("#cModal").modal("hide");
                toastr.success("Successfullyadded.");
            },
            error: function({ status, responseJSON }) {
                if (status === 422) {
                    profile_update_form
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
                        profile_update_form
                            .find(`input[name="${key}"]`)
                            .css("border-color", "#f44336");
                        profile_update_form
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
            }
        });
    });
// password update
$(document)
    .off("click", "#change_user_password")
    .on("click", "#change_user_password", function(e) {
        e.preventDefault();
        let data = $(this)
            .closest("form")
            .serializeArray();
        let userId = $(this).data("id");
        supportAjax(
            {
                url: "user/updatePassword/" + userId,
                method: "POST",
                data: data
            },
            function(resp) {
                $(document)
                    .find("#changePassword")
                    .trigger("click");
                toastr.success("Updated successfully.");
            },

            function(error) {
                errorHandeler(
                    {
                        fields: ["oldPassword", "password"]
                    },
                    error
                );
            }
        );
    });
// hover on profile image and title
$(document).on("mouseover", ".profile-tile-img", function() {
    $(this)
        .find(".edit_profile_img_title")
        .css("display", "block");
});
$(document).on("mouseout", ".profile-tile-img", function() {
    $(this)
        .find(".edit_profile_img_title")
        .css("display", "none");
});

// add address modal
$(document)
    .off("click", ".add_address_details")
    .on("click", ".add_address_details", function(e) {
        e.preventDefault();
        let url =
            $(this).data("route") +
            $(this).attr("data-id") +
            "/" +
            $(this).attr("user-id");
        showModal({
            url: url
        });
    });

// add new address
$(document)
    .off("click", "#addAddress")
    .on("click", "#addAddress", function(e) {
        e.preventDefault();
        let form = $("#add_address_form").serializeArray();
        let member = $(this).attr("data-id");
        let user_id = $(this).attr("user-id");

        let data = form.concat({
            name: "member_id",
            value: member
        });
        supportAjax(
            {
                url: "address/addNewAddress/",
                method: "POST",
                data: data
            },
            function(resp) {
                $("#cModal").modal("hide");
                $(document)
                    .find("#personalInformation")
                    .trigger("click");
                toastr.success("Added successfully.");
            },
            function(error) {
                console.log(error);
            }
        );
    });

// for profile image modal
$(document)
    .off("click", ".profile_image_div")
    .on("click", ".profile_image_div", function() {
        let url = $(this).data("route");
        showModal({
            url: url
        });
    });

// upadate profile image
$(document)
    .off("click", ".profile_image_update")
    .on("click", ".profile_image_update", function(e) {
        e.preventDefault();
        e.stopPropagation();
        let form = $(this).closest("form");

        let url =
            "/update/profileImage/userImage" + "/" + $(this).attr("data-id");

        let id = $(this).attr("data-id");

        let formData = $.ajax({
            url,
            method: "POST",
            data: new FormData(document.getElementById("edit_profile_image")),
            contentType: false,
            processData: false,
            success: function(resp) {
                $("#kt_body")
                    .empty()
                    .append(resp);
                $("#cModal").modal("hide");
                userPreview();
                toastr.success("Added successfully.");
            },
            error: function(err) {
                console.log(err.responseJSON.errors.profile_pic[1]);
                $("#nameError").append(err.responseJSON.errors.profile_pic[1]);
            }
        });
    });

function userPreview() {
    supportAjax(
        {
            url: "user/userPreview"
        },
        function(resp) {
            $("#userPreview")
                .empty()
                .append(resp);
        }
    );
}
