<style type="text/css">
    #template_html {
        padding: 20px;
        max-height: 600px;
        overflow-y: scroll;
        margin-bottom: 10px;
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
                {{ucfirst($template->temp_name)}}
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    &times;
                </span>
            </button>
        </div>
        <!-- Modal Body -->
        <div class="modal-body has-divider">
            <div class="m-scrollable" data-scrollable="true" data-max-height="600">
                <div id="template_html">
                    {!! $template->temp_html !!}
                </div>
                <form id="templateEdit" class="m-form m-form--label-align-right m-form--group-seperator-dashed"
                    style="display: none;">
                    <div class="kt-form-group row">
                        <div class="col-lg-4">
                            <label for="section">
                                Section <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control " id="section" name="section"
                                data-lookup="/lookup/getData/section" data-lookup-callback="testLoad" autocomplete="off"
                                value="{{$template->section}}">
                        </div>
                        <div class="col-lg-4">
                            <label for="temp_type">
                                Template Type
                            </label>
                            <input type="text" class="form-control " id="temp_type" name="temp_type"
                                data-lookup="/lookup/getData/template_type" value="{{$template->temp_type}}"
                                autocomplete="off">
                        </div>
                        <div class="col-lg-4">
                            <label for="temp_name">
                                Template Name
                            </label>
                            <input type="text" class="form-control " id="temp_name" name="temp_name"
                                value="{{$template->temp_name}}" autocomplete="off">
                        </div>
                    </div>
                    <div class="kt-form-group row">
                        <div class="kt-checkbox-list">
                            <label class="kt-checkbox kt-margin-l-10">
                                <input type="checkbox" class="makeDefault" name="is_default" id="is_default"
                                    @if($template->is_default) value="1" data-checked="true" checked @else value="0"
                                @endif>
                                <p>Is this default template?</p>
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="kt-form-group row">
                        <div class="col-lg-12">
                            <label for="temp_html">
                                Dynamic Fileds<span class="required">*</span>
                            </label>
                            <textarea class="form-control " name="temp_json" id="temp_json" rows="2"
                                placeholder="id,name">{{$template->temp_json}}</textarea>
                            <span class="m-form__help">Each dynamic field should be seperated by '<strong
                                    style="font-size: 15px">,</strong>' (comma).</span>
                        </div>
                    </div>
                    <div class="kt-form-group row">
                        <div class="col-lg-12">
                            <label for="temp_html">
                                Template Html<span class="required">*</span>
                            </label>
                            <textarea class="form-control " name="temp_html" id="temp_html"
                                rows="10">{{$template->temp_html}}</textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal Footer -->
        <div class="modal-footer" style="display: inline-block;">
            <button type="button" class="btn btn-secondary btn-pill float-left" id="template_cancel"
                data-dismiss="modal">
                Cancel
            </button>
            <button type="button" class="btn btn-primary btn-pill enable_form float-right" id="showEdit">Edit</button>
            <button type="button" class="btn btn-success btn-pill float-right" id="submitTemplate"
                data-target="templateEdit" data-id="{{$template->id}}" style="display: none;"
                data-dismiss="modal">Save</button>
        </div>
    </div>
</div>

<script>
    $('#showEdit').on('click', function (e) {
        $('#template_html').hide();
        $('#templateEdit').show();
    });
    $(document).ready(function () {
        $('#temp_html').summernote({
            height: 100
        });
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
    $('#submitTemplate').on('click', function (e) {
        var form = $(this).attr('data-target');
        var request = {
            url: 'admin/email_template/update/{{$template->id}}',
            method: 'post',
            form: form
        };
        ajaxRequest(request, function (response) {
            processForm(response, function () {
                reloadDatatable('.template_datatable');
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

</script>
