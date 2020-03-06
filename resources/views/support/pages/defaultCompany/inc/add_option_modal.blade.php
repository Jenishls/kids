<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">OPIONS - ADD</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <form id="addOptionForm">
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label" for="property">Property</label>
                            <input class="form-control" type="text" name="property" id="myProperty" placeholder="Property">
                        </div>
                        <div>
                            <label class="control-label" for="type">Type</label>
                            <select id="type">

                                <option value="text">Text</option>
                                <option value="number">Number</option>

                                <option value="file">File</option>
                                <option value="textarea">TextArea</option>
                            </select>
                        </div>
                        <div class="form-group label-floating" style="margin-top:10px;">
                            <label class="control-label" for="value">Value</label>
                            <div id="dynamicFormGroup">
                                <input class="form-control" id="myValue" name="value" placeholder="Value">

                            </div>
                            <!-- <label for="file" class="btn-default d-b" id="myFileValue" style="display: none; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;}"> <i class="mdi mdi-upload"></i><span>Browse Images...</span></label> -->
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon " data-id="" id="storeOption">Save</button>
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


    $(document).off('click', '#storeOption').on('click', '#storeOption', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let formId = 'addOptionForm';
        imageAjax(formId);

      
    });
</script>