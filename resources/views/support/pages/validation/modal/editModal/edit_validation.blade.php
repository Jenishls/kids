{{-- {{dd($validation)}} --}}
<div class="modal-dialog editValidationModalDialog" id="editValidationModal" role="document" style="width: 600px;">
    <div class="modal-content addValidationModalContent">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Validation</h5>
            <div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
            </div>
        </div>
        <div class="modal-body">
            <form id="update_validation_form">
                @csrf
                <div class="row form-group">
                    <div class="col-lg-12 label-floating">
                        <label class="control-label" for="code">Code</label>
                        <input type="text" class="form-control" id="code" name="code" autocomplete="off" value="{{$validation->code?$validation->code:''}}">
                        <div class="errorMessage"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12 label-floating">
                        <label class="control-label" for="code">Value</label>
                        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" name="value">{{$validation->value?$validation->value:''}}</textarea>
                        <div class="errorMessage"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12 label-floating">
                        <label class="control-label" for="code">Description</label>
                        <textarea class="form-control rounded-0" name="description" id="exampleFormControlTextarea3" rows="3">{{$validation->description?$validation->description:''}}</textarea>
                    </div>
                </div>
            </form>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="update_validation" data-id="{{$validation->id}}">Save</button>
        </div>
    </div>
</div>