function supportAjax(
    { url = "/", method = "get", data = "" },
    cb = "",
    errorCb = "",
    bsCb = ""
) {
    var xhr = new window.XMLHttpRequest();
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    if (xhr && xhr.readyState !== 400 && xhr.status !== 200) {
        xhr.abort();
    }
    xhr = $.ajax({
        url: url,
        method: method,
        data: data,
        success: function(response) {
            if (typeof cb !== "string") {
                cb(response);
            }
        },
        error: function(error) {
            if (typeof errorCb !== "string") {
                errorCb(error);
            }
        },
        beforeSend: function() {
            if (typeof bsCb !== "string") {
                bsCb();
            }
        }
    });
}

// Login adn register

// $(document).on('click', '.pageload', function (e) {
//     e.preventDefault();
//     e.stopPropagation();
//     let url = $(this).data('url');
//     supportAjax({
//         url: url,
//     }, function (resp) {
//         $('.profile-container').empty().append(resp);
//     }, function (err) {

//     });

// });

$(document)
    .off("click", ".view_audit_detail")
    .on("click", ".view_audit_detail", function(e) {
        e.preventDefault();
        let url = $(this).attr("data-route");
        let table_name = $(this).attr("data-table");
        let new_data = $(this).attr("data-new");
        let data = {
            table_name: table_name,
            new_data: new_data
        };
        showModal({
            url: url + "/" + table_name + "/" + new_data
        });
    });

function imageAjax(formId) {
    $.ajax({
        url: "/option/store",
        method: "POST",
        data: new FormData(document.getElementById(`${formId}`)),
        contentType: false,
        processData: false,
        success: function(resp) {
            $("#defaultCompanyTable")
                .KTDatatable()
                .reload();
            $("#cModal").modal("hide");

            toastr.success("Added successfully.");
        },
        error: function(err) {
            console.log(err);
        }
    });
}
