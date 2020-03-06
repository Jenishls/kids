// report section js
$(document).on('click', '.m-list-search__result-item', function (e) {
    e.preventDefault();

    let self = $(this),
        url = self.attr('data-route'),
        name = self.attr('data-title');

    $.get(url, { name }).then(function (rightSection) {
        $('#reportRightSection').html(rightSection);
    });
});


/*
* confirm box before ajax action
* */
function confirmAction(props, callback = '') {
    let date = new Date();
    const modal_id = date.getTime();
    props.btn = props.btn || 'btn-primary';
    props.fresh = props.fresh || true;
    if (props.fresh) {
        $('.custom-confirm-modal').remove();
    }
    $('body').append(`
    <div class="modal fade std-modal modal-default custom-confirm-modal" id="confirm-${modal_id}" tabindex="-1" role="dialog" aria-labelledby="modalContainerHeader" data-backdrop="static" data-keyboard="false" style="z-index: 99999; display: none;" >
    <style>
        .modal-header-danger {
            background-color: #fb7b91 !important;
            border-color: #fb7b91 !important;
        }    
    </style>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" style="background: #fff;">
                <p class="text-center">${props.message}</p>
            </div>
            <div class="modal-footer" style="display: inline-block; background: #eee;">
                <button type="button" class="btn btn-light btn-pill float-left" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn ${props.btn} btn-pill btn-elevate float-right" data-dismiss="modal" id="btn-${modal_id}-confirm">
                    <span>
                        ${props.action}
                    </span>
                </button>
            </div>
        </div>
    </div>
    </div>
    `.trim());

    $('#confirm-' + modal_id).modal('show');
    if (props.ajax) {
        $(`#btn-${modal_id}-confirm`).off('click').on('click', function () {
            $.ajax(props.ajax, function (response) {
                if (response.status >= 200 && response.status < 400) {
                    if (typeof props.ajax.success === 'function') {
                        props.ajax.success();
                    }
                } else if (typeof props.ajax.error === 'function') {
                    props.ajax.error(response);
                }
            });
        });
    }
    if (typeof callback === 'function') {
        $(`#btn-${modal_id}-confirm`).off('click').on('click', function (e) {
            callback(e);
        });
    }
    if (typeof props.callback === 'function') {
        props.callback();
    }
}

function processForm(response, cb = null) {
    if (response.status === 422) {
        if (response.responseJSON && response.responseJSON.errors) {
            let form = $('.modal.show');
            for (let [key, message] of Object.entries(response.responseJSON.errors)) {
                let index;
                let input = form.find(`[name="${key}"]`);
                if (!input.length) {
                    input = form.find(`[name="${key}[]"]`);
                }
                if (!input.length && key.split('.').length) {
                    [key, index] = key.split('.');
                    input = form.find(`[name="${key}[]"]:eq(${index})`);
                }
                input.addClass('input-required').attr('title', [message].flat(1).join(' ')).parent().addClass('input-required');
            }
            toastr.error('Please check highlighted fields !');
        }
    } else if (response.status >= 400) {
        if (response.responseJSON && response.responseJSON.exception) {
            toastr.error(response.responseJSON.message, response.responseJSON
                .exception);
        } else if (response.responseJSON && response.responseJSON.message) {
            toastr.error(response.responseJSON.message);
        }
    } else if (response.message) {
        toastr.success(response.message);
    }
    if (typeof cb === 'function') {
        cb(response);
    }
}

function ajaxRequest(request, cb = null) {
    if (request.form) {
        request.data = new FormData(document.getElementById(request.form));
    }

    let token = $('meta[name="csrf-token"]').attr('content');
    if (request.data instanceof FormData) {
        request.processData = false;
        request.contentType = false;
        if (request.data.get('_token')) {
            token = request.data.get('_token');
            request.data.delete('_token');
        }
    } else if (Array.isArray(request.data)) {
        if (request.data.filter(x => x.name === '_token').length) {
            token = request.data.filter(x => x.name === '_token')[0].value;
            request.data = request.data.filter(x => x.name !== '_token');
        }
    }

    request.beforeSend = function (xhr) {
        xhr.setRequestHeader('X-CSRF-Token', token);
    };

    $.ajax(request).then(function (response) {
        if (typeof cb === 'function') {
            cb(response);
        }
    }, function (err) {
        if (typeof cb === 'function') {
            cb(err);
        }
    });
}

function addFormLoader() { }
function removeFormLoader() { }

function reloadDatatable(selector) {
    $(selector).KTDatatable('reload');
}

$.fn.mDatatable = function (options) {
    return this.KTDatatable(options);
}


$(document).on('click', '.modalOpener', function (e) {
    let self = $(this),
        url = self.attr('data-modal-route');

    let request = {
        url
    };
    Object.assign(request, this.dataset);
    showModal(request);
});

$(document).on('click', '.saveTemplate', function (e) {
    let self = $(this),
        template = self.attr('data-template'),
        url = 'admin/reports/save-template/' + template,
        data = self.closest('form').find(':input:not([name="_token"])').serialize();

    localStorage.setItem('reportData', data);
    showModal({
        url, c: 'Template'
    });
});

$(document).on('click', '.loadTemplate', function (e) {
    let self = $(this),
        template = self.attr('data-template'),
        url = 'admin/reports/load-template/' + template,
        form = self.closest('form').attr('id');

    localStorage.setItem('templateForm', form);
    showModal({
        url, c: 'TemplateLoad'
    });
});