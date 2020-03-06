<div class="modal-dialog addSectionModal" id="createSectionModal" role="document" style="/* width: 600px; */">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create New Section</h5>
            <div>
            <button type="button" class="close closeSectionModal"  data-dismiss="modal" aria-label="Close">
            </button>
            </div>
        </div>
        <div class="modal-body">
            <form id="add_section_modal_form">
                @csrf
                <div class="row form-group">
                    <div class="col-lg-12 label-floating">
                            <label class="control-label" for="section" class="required">Section</label>
                            <input type="text" class="form-control " id="section" name="section" autocomplete="off" >
                            <div class="errorMessage"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12 label-floating">
                        <label class="control-label" for="description" class="required">Description</label>
                        <textarea class="form-control rounded-0" id="exampleFormControlTextarea3" name="description" rows="3"></textarea>
                    </div>
                </div>
                
            </form>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x closeSectionModal" data-dismiss="modal" >Close</button>
            <button type="button" class="btn btn-primary sy_icon"  id="add_section">Save</button>
        </div>
    </div>
</div>