function cratesAjax({
        url = "/",
        method = "get",
        data = ""
    },
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
        success: function (response) {
            $(document)
                .find(".loader_wrapper")
                .hide();
            if (typeof cb !== "string") {
                cb(response);
            }
        },
        error: function (error) {
            $(document)
                .find(".loader_wrapper")
                .hide();
            if (typeof errorCb !== "string") {
                errorCb(error);
            }
        },
        beforeSend: function () {
            $(document)
                .find(".loader_wrapper")
                .show();
        }
    });
}
