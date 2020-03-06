{{-- {{dd($validationSection)}} --}}
<div class="modal-dialog editValidationModalDialog" id="editValidationModal" role="document" style="width: 600px;">
    <div class="modal-content addValidationModalContent">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Validation Section</h5>
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
                        <label class="control-label" for="section">Section</label>
                        <input type="text" class="form-control" id="section" name="section" autocomplete="off" value="{{ucfirst($validationSection->section?$validationSection->section:'')}}">
                        <div class="errorMessage"></div>

                    </div>
                </div>
                
            </form>
            
        </div>
        <div class="modal-footer">
            {{-- {{dd($validationSection->id)}} --}}
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="update_validation_section" data-id="{{$validationSection->id}}">Save</button>
        </div>
    </div>
</div>