
<div class="modal-dialog editTypeModalDialog" id="editTypeModal" role="document" style="width: 600px;">
    <div class="modal-content editTypeContent">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Type</h5>
            <div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
            </div>
        </div>
        <div class="modal-body">
            <form id="update_validation_section_form">
                @csrf
                <div class="row form-group">
                    <div class="col-lg-12 label-floating">
                        <label class="control-label" for="type">Type</label>
                        <input type="text" class="form-control" id="type" name="type" autocomplete="off" value="">
                        <div class="errorMessage"></div>

                    </div>
                </div>
                
            </form>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="update--type" data-id="{{$validationSection->id}}">Save</button>
        </div>
    </div>
</div>