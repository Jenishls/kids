function loadTabs(option, cb = '') {
    var selectId = option.selectId;
    var url = option.url ? url = option.url : url = '';
    var tableId = option.tableId;

    $('#' + selectId).on('click', function () {
        var nthis = $(this);
        $(this).parent().find('li').each(function () {
            $(this).removeClass("active");
        });
        nthis.addClass('active');

        page_load({
            url: url,
            el: tableId,
            class: 'active',
            id: selectId
        });

        if (typeof cb == "function") {
            cb();
        }
    });
}


