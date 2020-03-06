<style>
    a.m-list-badge__item.insertintoTemp {
        line-height: 3;
    }

    .kt-form-group {
        margin-bottom: 15px;
    }

    .input-required[name] {
        border-color: #dc3545ad;
    }

</style>
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                Create New Template
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    &times;
                </span>
            </button>
        </div>
        <!-- Modal Body -->
        <div class="modal-body has-divider">
            <form id="templateEdit" class="m-form m-form--label-align-right m-form--group-seperator-dashed">
                <input type="hidden" name="temp_code" value="{{ $template->temp_code ?? 'unkwown' }}">
                <div class="kt-form-group row">
                    <div class="col-lg-4">
                        <label for="temp_name" class="required">
                            Template Code
                        </label>
                        <input type="text" class="form-control " id="temp_name" name="temp_name"
                            value="{{$template->temp_code}}" data-lookup="/email_template/getTempCode"
                            autocomplete="off">
                    </div>
                    <div class="col-lg-4">
                        <label for="temp_name">
                            Template Name
                        </label>
                        <input type="text" class="form-control " id="temp_name" name="temp_name"
                            value="{{$template->temp_name}}" autocomplete="off">
                    </div>
                    <div class="col-lg-4">
                        <label for="temp_type" class="required">
                            Template Type
                        </label>
                        <input type="text" class="form-control " id="temp_type" name="temp_type"
                            data-lookup="/lookup/getData/template_type" value="{{$template->temp_type}}"
                            autocomplete="off">
                    </div>
                    <div class="col-lg-4">
                        <label for="section" class="required">
                            Section
                        </label>
                        <input type="text" class="form-control " id="section" name="section"
                            data-lookup="/lookup/getData/section" data-lookup-callback="testLoad" autocomplete="off"
                            value="{{$template->section}}">
                    </div>
                </div>
                <div class="kt-form-group row">
                    <div class="kt-checkbox-list">
                        <label class="kt-checkbox kt-margin-l-10">
                            <input type="checkbox" disabled class="makeDefault" name="is_default" id="is_default"
                                @if($template->is_default) value="1" data-checked="true" checked @else value="0" @endif>
                            <p>Is this default template?</p>
                            <span></span>
                        </label>
                    </div>
                </div>
                <div class="kt-form-group row">
                    <div class="col-lg-12">
                        <label for="temp_html" class="required">
                            Dynamic Fileds
                        </label>
                        <textarea class="form-control " name="temp_json" id="temp_json" rows="2"
                            placeholder="id,name">{{$template->temp_json}}</textarea>
                        <span class="m-form__help">Each dynamic field should be seperated by '<strong
                                style="font-size: 15px">,</strong>' (comma).</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="temp_html" class="required">
                            Template Html
                        </label>
                        <textarea class="form-control " name="temp_html" id="temp_html"
                            rows="10">{{$template->temp_html}}</textarea>
                    </div>
                </div>
            </form>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-pill" data-dismiss="modal" style="float: left;">
                Cancel
            </button>
            <button type="button" class="btn btn-success btn-pill" id="submitForm" data-target="templateEdit"
                data-id="{{$template->id}}">
                Save
            </button>
        </div>
    </div>
</div>

<script>
    $('#temp_html').summernote({
        height: 100
    });
    $(document).off('change', 'input.makeDefault').on('change', 'input.makeDefault', function (e) {
        var self = $(this);
        if (self.prop('checked')) {
            self.val(1);
            self.attr('data-checked', true);
        } else {
            self.val(0);
            self.attr('data-checked', false);
            self.removeAttr('checked');
        }
    });
    $(document).off('click', '#submitForm').on('click', '#submitForm', function (e) {
        var form = $(this).attr('data-target');
        var request = {
            url: 'admin/email_template/update/{{$template->id}}',
            method: 'post',
            form: form
        };
        addFormLoader();
        ajaxRequest(request, function (response) {
            processForm(response, function () {
                reloadDatatable('.template_datatable');
                removeFormLoader();
                $('.modal.show').modal('hide');
            });
        });
    });
    $(document).off('change', '#merge_field').on('change', '#merge_field', function (e) {
        e.preventDefault();
        var mergeData = $('#merge_field option:selected').val();
        if (mergeData != 'no') {
            $('#temp_html').summernote('editor.insertText', '{' + mergeData + '}');
        }
    });
    $(document).ready(function () {
        $(document).off('click', '.lookup-list-items').on('click', '.lookup-list-items', function (e) {
            var value = $(this).text();
            var request = {
                url: 'admin/getTempJson/' + value,
                method: 'get',
            }
            ajaxRequest(request, function (response) {
                $('#temp_json').val(response.data);
            });
        });
    });

</script>
