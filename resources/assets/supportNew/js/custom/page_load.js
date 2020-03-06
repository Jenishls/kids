function page_load(options) {
    $('.' + options.class).css("color", "#404040");
    $('.' + options.class).find('i').css("color", "#404040");
    $('#' + options.id).css("color", "#4285f4");
    $('#' + options.id).find('i').css("color", "#4285f4");

    if (xhr && xhr.readyState !== 400 && xhr.status !== 200) {
        xhr.abort();
    }

    xhr = $.ajax({
        url: options.url,
        method: 'get',
        dataType: 'html',
        beforeSend: function() {
            $('#travel_modal').modal('show', {
                backdrop: 'static',
                keyboard: false
            });
            $('#travel_modal').css("width", options.width);
        },
        success: function(data) {
            $('#travel_modal').modal('toggle');
            $('body').find('.modal-backdrop').remove();

            // $('#'+options.loading).remove();
            $('#' + options.el).html(data);
            if (typeof options.cb === 'function') options.cb();
        },
        error: function(data) {
            $('#travel_modal').modal('toggle');
            $('#' + options.loading).remove();
            $.extend($.gritter.options, {
                position: 'top-right'
            });
            $.gritter.add({
                title: 'Error',
                text: "Something went worng while loading page.",
                class_name: 'color danger'
            });
        }
    });


}