clickEvent('.order_now')(orderNow);

function orderNow() {
    let url = $(this).attr('data-route');
    cratesAjax({
            url: url,
        },
        function (resp) {
            $("#page-section").empty().append(resp);
            window.scrollTo(0, 0);
        },
        function (err) {
            let {responseJSON : {message}} = err;
            toastr.error(message);
        })
}

$(document).on('click', '.crates--dashboard--page--load', function () {
    let url = $(this).attr('data-route');
    cratesAjax({
            url: url,
        },
        function (resp) {
            $("#page-section").empty().append(resp);
            window.scrollTo(0, 0);
        },
        function (err) {})
});
