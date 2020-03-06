// add icon
$(document).on("click", "#add_icon", function(e) {
    let data = $("#icon").serializeArray();
    data.push({
        name: "id",
        value: $(this).attr("data-id")
    });
    data.push({
        name: "edit",
        value: "add"
    });
    $.ajax({
        method: "post",
        url: "system/icon/edit",
        data: data,
        dataType: "html",
        beforeSend: function() {},
        success: function(response, status, xhr) {
            $(".icon-dialog").html(response);
        },
        error: function(xhr, status, error) {}
    });
});
// modal open
$("#sys_icon_model").on("show.bs.modal", function(e) {});

// edit table data
$(document)
    .off("click", ".edit_icon_table")
    .on("click", ".edit_icon_table", function(e) {
        // alert('hello');
        let data = $("#icon").serializeArray();
        data.push({
            name: "id",
            value: $(this).attr("data-id")
        });
        data.push({
            name: "edit",
            value: "dialogue"
        });

        $.ajax({
            method: "post",
            url: "system/icon/edit",
            data: data,
            dataType: "html",
            beforeSend: function() {},
            success: function(response, status, xhr) {
                $(".icon-dialog").html(response);
                icon.reload();
            },
            error: function(xhr, status, error) {}
        });
    });

// icon group search
