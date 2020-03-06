$(document).on("click", ".rp_menu", function(e) {
    $(this)
        .siblings()
        .removeClass("rp_menu_active");
    $(this).addClass("rp_menu_active");
    let tab_name = $(this).find("p");
    let current_tab_name = tab_name.html();
    $("#current_tab_name").html(current_tab_name);
    e.preventDefault();
    let url = "/admin/showPage/" + current_tab_name;
    roles_permissions(url);
});

// $(document).on('click', '.add_elements', function(e){
//     e.preventDefault();
//     let url = $(this).attr('data_url');
//     let method = 'POST'
//     // let data = $(this).closest('form').serializeArray();
//     roles_permissions(url, method, data);
// });

function roles_permissions(url, method = "GET", data = null) {
    $.ajax({
        url: url,
        method: method,
        data: data ? data : null,
        success: function(resp) {
            $("#datatable_container")
                .empty()
                .append(resp);
        },
        error: function(err) {
            console.log(err);
        }
    });
}

$(document).on("click", ".kt-menu__nav>.kt-menu__item", function(e) {
    e.preventDefault();
    e.stopPropagation();
    let all = document.getElementsByClassName("kt-menu__item");
    menuItems = Array.from(all);
    menuItems.forEach(function(menu, index) {
        $(menu).removeClass("kt-menu__item--active");
    });
    // $(this).addClass('.kt-menu__item--active');
    $(this).addClass("kt-menu__item--active");
});

toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
    progressBar: false,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut"
};

function formValidateError(formId, errors, notifyToastr = true) {
    $(formId)
        .find("[name]")
        .changeInputColors("#bdc0c7", formId);
    let message = "";
    for (let i in errors) {
        let element = $(formId).find('[name="' + i + '"]');
        message += errors[i][0] + "<br/>";
        element.changeInputColors("#ea4335", formId, i);
    }
    if (notifyToastr === false) return;
    toastr.error(message);
    return false;
}

//  Template operations
$(document)
    .off("click", ".changeTemp")
    .on("click", ".changeTemp", function(e) {
        e.preventDefault();
        let id = $(this).attr("data-id");
        supportAjax(
            {
                url: "/changeTemplate/" + id
            },
            function(resp) {
                location.reload(true);
                toastr.success("Theme Changed.");
            },
            function(err) {
                toastr.error("Sorry, theme could not be changed.");
            }
        );
    });

$(document)
    .off("click", "#addNewTemplate")
    .on("click", "#addNewTemplate", function(e) {
        e.preventDefault();
        showModal({
            url: "/addTemplateModal"
        });
    });

function removeCustomClass(el) {
    let els = $(document).find(`.${el}`);
    $.each(els, function(index, element) {
        $(element).removeClass(`${el}`);
    });
}

function toggleInputState(el, on) {
    console.log(on);
    // 'on' = true(visible) or false(hidden)
    // If a field is to be shown, enable it; if hidden, disable it.
    // Disabling will prevent the field's value from being submitted
    $(el)
        .prop("disabled", on)
        .toggle(on);
}
