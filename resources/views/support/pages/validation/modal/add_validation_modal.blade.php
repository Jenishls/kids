<div class="modal-dialog addValidationModalDialog" id="addValidationModal" role="document" style="/* width: 600px; */">
    <div class="modal-content addValidationModalContent">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Validation For {{$validationSection->section}}</h5>
            <div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
            </div>
        </div>
        <div class="modal-body">
            <form id="add_validation_form">
                @csrf
                {{-- <div class="row form-group">
                    <div class="col-lg-12 label-floating">
                        
                        <label class="control-label" for="section" class="required">Section</label>
                        <input type="text" class="form-control" id="section" name="section" autocomplete="off"  >
                    </div>
                </div> --}}
                <div class="row form-group">
                    <div class="col-lg-12 label-floating">
                        <label class="control-label" for="code" class="required">Code</label>
                        <input type="text" class="form-control" id="code" name="code" autocomplete="off" >
                        <div class="errorMessage"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12 label-floating">
                        <label class="control-label" for="value" class="required">Value</label>
                        <textarea class="form-control rounded-0" id="" name="value" rows="3"></textarea>
                        <div class="errorMessage"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12 label-floating">
                        <label class="control-label" for="description" class="required">Description</label>
                        <textarea class="form-control rounded-0" name="description" id="" rows="3"></textarea>
                    </div>
                </div>
                
            </form>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary sy_icon"  id="add_validation"  data-id="{{$validationSection->id}}">Save</button>
        </div>
    </div>
</div>