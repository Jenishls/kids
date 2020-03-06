<div class="modal-dialog" role="document" style="margin-left: 31%;" id="addNewComponent">
    <div class="modal-content modal-830" >
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Component</h5>
            <button type="button" class="close closeThisNewModal"  aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <form id="addNewComponentForm">
                        @csrf
                        <div class="row">
                            <div class="form-group label-floating col-6">
                                    <label class="control-label" for="sequence_no" style="font-weight:450;font-size:14px;">Component</label>
                                    <input class="form-control" type="text" name="name" id="" placeholder="">
                                    <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating my-3 col-6 sequence_div" value="textarea">
                                <label class="control-label" for="sequence_no" style="font-weight:450;font-size:14px;">Location</label>
                                <input class="form-control" type="text" name="location" id="" placeholder="">
                                <div class="errorMessage"></div>
    
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x closeThisNewModal">Close</button>
        <button type="button" class="btn btn-primary sy_icon " id="makeNewComponent">Create</button>
        </div>
    </div>
</div>