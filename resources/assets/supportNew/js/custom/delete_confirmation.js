function delConfirm(obj, cb = "") {
    let delUrl = obj.url;
    $('#deleteModal').modal();
    $(document).off('click', '#confirmedDelete').on('click', '#confirmedDelete', function (e) {
        e.preventDefault();
        supportAjax({
            url: delUrl,
            method: 'get'
        }, function (resp) {
            // obj.header.trigger('click')
            if (obj.header) {
                obj.header.KTDatatable().reload();
            }
            if (obj.reload_div) {
                $(document).find(obj.reload_div).trigger('click');
            }
            if (obj.appendView) {
                $(obj.appendView).empty().append(resp);
            }
            toastr.success(resp.success?resp.success:'Deleted successfully.');
            if(!(typeof cb === 'string'))
                cb(resp)
        })
    })

}
