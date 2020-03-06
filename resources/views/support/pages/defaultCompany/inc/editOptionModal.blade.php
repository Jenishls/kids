<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Option</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <form id="updateOptionForm">
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label" for="property">Property</label>
                            <input class="form-control" type="text" value="{{$defaultCompany->property}}" name="property" id="lookup_code">
                        </div>
                        <div>
                            <label class="control-label" for="type">Type</label>
                            <select id="type" name="type">

                                <option value="text">Text</option>
                                <option value="number">Number</option>

                                <option value="file">File</option>
                                <option value="textarea">TextArea</option>
                            </select>
                        </div>
                        <div class="form-group label-floating repeatThisRow" style="margin-top:10px;">
                            <label class="control-label" for="value">Value</label>
                            <div id="dynamicFormGroup">
                                <input class="form-control" id="optionValue" value="{{$defaultCompany->value}}" name="value">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="storeUpdateOption" data-id="{{$defaultCompany->id}}">Update</button>
        </div>
    </div>
</div>

<script>
    $('#type').select2({
        placeholder: "select a type",
        width: "100%"
    }).on('select2:select', function(e) {
        let type = $(this).val();
        let field;
        if (type === "text") {
            field = '<input type="text" name="value">';
        } else if (type === "textarea") {
            field = '<textarea/>';
        } else if (type === "file") {
            field = '<input type="file" name="file"/>';
        } else {
            field = '<input type="number" name="value">';
        }

        $('#dynamicFormGroup').html(field);
    });

    $(document).off('click', '#storeUpdateOption').on('click', '#storeUpdateOption', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let formId = 'updateOptionForm';
        imageAjax(formId);

      
    });
</script>