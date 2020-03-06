<style>
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
            <form id="templateCreate" class="m-form m-form--label-align-right m-form--group-seperator-dashed">
                @csrf
                <div class="kt-form-group  row">
                    <div class="col-lg-3">
                        <label for="temp_code" class="required">
                            Template Code
                        </label>
                        <input type="text" class="form-control" id="temp_code" name="temp_code" autocomplete="off" data-lookup="/email_template/getTempCode" autocomplete="off">
                    </div>
                    <div class="col-lg-3">
                        <label for="temp_name" class="required">
                            Template Name
                        </label>
                        <input type="text" class="form-control" id="temp_name" name="temp_name" autocomplete="off">
                    </div>
                    <div class="col-lg-3">
                        <label for="temp_type" class="required">
                            Template Type
                        </label>
                        <input type="text" class="form-control" id="temp_type" name="temp_type" data-lookup="/lookup/getData/temp_type" autocomplete="off">
                    </div>
                    <div class="col-lg-3">
                        <label for="section" class="required">
                            Section
                        </label>
                        <input type="text" class="form-control" id="section" name="section" data-lookup="/lookup/getData/temp_section" data-lookup-callback="testLoad" autocomplete="off">
                    </div>
                </div>
                <div class="kt-form-group">
                    <div class="kt-checkbox-list">
                        <label class="kt-checkbox kt-l-15-i" for="is_default">
                            <input type="checkbox" disabled class="makeDefault" name="is_default" id="is_default" value="0">
                                <p>Is this default template?</p>
                            <span></span>
                        </label>
                    </div>
                </div>
                <div class="kt-form-group  row">
                    <div class="col-lg-12">
                        <label for="temp_html" class="required">
                            Dynamic Fileds
                        </label>
                        <textarea class="form-control" name="temp_json" id="temp_json" rows="4" placeholder="id,name"></textarea>
                        <span class="m-form__help">Each dynamic field should be seperated by '<strong style="font-size: 15px">,</strong>' (comma).</span>
                    </div>
                </div>
                <div class="kt-form-group  row">
                    <div class="col-lg-12">
                        <label for="temp_html" class="required">
                            Template Html
                        </label>
                        <textarea class="form-control" name="temp_html" id="temp_html"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="temp_instruction">
                            Template Instruction
                        </label>
                        <textarea class="form-control" name="temp_instruction" id="temp_instruction"></textarea>
                    </div>
                </div>
            </form>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer kt-padding-25">
            <button type="button" class="btn btn-secondary btn-pill" data-dismiss="modal">
                Cancel
            </button>
            <button type="button" class="btn btn-success btn-pill" id="submitForm" data-target="templateCreate">
                Save
            </button>
        </div>
    </div>
</div>

<script>
    
    $(document).ready(function() {
        $('#temp_html').summernote({height: 100});
        $('#temp_instruction').summernote({height: 100});
    });
    $(document).off('change', 'input.makeDefault').on('change', 'input.makeDefault', function(e){
        var self = $(this);
        if(self.prop('checked')){
            self.val(1);
            self.attr('data-checked', true);
        }else{
            self.val(0);
            self.removeAttr('data-checked', false);
        }
    });
    $(document).off('click', '#submitForm').on('click', '#submitForm', function (e) {
        var form = $(this).attr('data-target');
        var request = {
            url: 'admin/template/store',
            method: 'post',
            form: form
        };
        addFormLoader();
        ajaxRequest(request, function (response) {
            processForm(response, function() {
                removeFormLoader();
                reloadDatatable('.template_datatable');
                $('.modal.show').modal('hide');
            });
        });
    });

    $(document).ready(function(){
        $(document).off('click', '.lookup-list-items').on('click', '.lookup-list-items', function(e){
            var value = $(this).text();
            var request = {
                url: 'admin/getTempJson/'+value,
                method: 'get',
            }
            ajaxRequest(request, function(response){
                $('#temp_json').val(response.data);
            });
        });
    });
</script>