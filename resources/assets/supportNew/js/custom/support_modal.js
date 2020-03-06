var c = "",
    xhr = "";
var modal_extrax_class = "";
xhr = new XMLHttpRequest();

function showModal(option, cb = false) {
    url = option.url;
    width = option.width;
    c = option.c;
    modal_extrax_class = option.hasOwnProperty('extra_classes') ? option.extra_classes : "";
    data = option.data;
    if (!c) {
        c = "";
    }
    $('#loadingGif').removeClass("hidden");
    if (c === "") {
        $("#cModal" + c).remove();
    }
    if (!width) {
        width = "100%!important;";
    } else {
        width = width + "px!important;";
    }
    option.width = width;
    // $('#cModal').modal('show', {backdrop: 'static', keyboard: false});
    // $('#cModal .modal-dialog').css("width", width);
    if (xhr && xhr.readyState !== 400 && xhr.status !== 200) {
        xhr.abort();
    }
    xhr = $.ajax({
        url: url,
        method: option.mtype ? option.mtype : 'get',
        data: data,
        dataType: option.dataType ? option.dataType : 'html',
        success: function (response) {
            ModalWindow(response, c, cb, option);


            // if (typeof cb === "function") {  
            //     cb(response);
            // }
            // $('#loadingGif').addClass("hidden");
            // $('#cModal').find('.modal-content').html(response);
        },
        error: function (error) {
            console.log(error.statusText);
        }
    });
    $('body').on('hide.bs.modal', "#cModal" + c, function () {
        $(this).remove();
        if (c) {
            let p = option.p || '';
            $('#cModal' + p).addClass('show');
            $('.modal-backdrop.fade:not(.show):first').addClass('show');
        }
    });
}

function ModalWindow(res, c, cb, option = {}) {
    var mdl = '<div id="cModal' + c + '"  role="dialog" class="modal fade colored-header colored-header-primary">' +
        '<div class="modal-dialog" style="width:' + option.width + '">' +
        '<div id="loadingGif" class="hidden"></div>' +
        '<div class="modal-content ' + modal_extrax_class + '" role="document" id="addModalMember"> ' +
        '</div>' +
        '</div>';
    $('#my-mdl').append(mdl);
    var md = "#cModal" + c;
    let modalOptions = {};
    // if (option.hasOwnProperty('closable') && option.closable === true) {
    //     modalOptions.backdrop = 'static';
    //     modalOptions.keyboard = false;
    // }
    if(!option.closable){
        modalOptions.backdrop = 'static';
        modalOptions.keyboard = false;
    }
    
    // $('body ' + md + ' .modal-dialog')
    if (res.search('modal-dialog') !== -1) {
        $(md).html(res).find('.modal-dialog').css("width", option.width);
    } else {
        $(md + ' .modal-content').html(res);
    }

    if (c && $('.modal.show').length) {
        let p = option.p || '';
        $('#cModal' + p).removeClass('show');
        $('.modal-backdrop.fade.show:first').removeClass('show');
    }

    $('body ' + md).modal(modalOptions).modal('show');
    if (cb && typeof cb === "function") {
        cb(res);
    }
}

function removeMdl(val) {

}

// Clear all Modal on close
$(document).on('click', '.md-close', function (e) {
    //e.preventDefault();
    // e.stopPropagation();
    //
    $('.modal-backdrop').remove();
    $('body').removeClass("modal-open");
});
