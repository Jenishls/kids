$(() => {
    loadUrlRoute();
});

function loadUrlRoute() {
    let url = location.hash && location.hash.replace(/^#/, "") || "";
    if (!url) return false;

    $.ajax(url).then(function(response) {
        $('#kt_body').html(response);
    }, function(error) {
        toastr.error(error.responseText);
    });
}