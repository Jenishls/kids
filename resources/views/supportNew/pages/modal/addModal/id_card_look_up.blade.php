<div id="addMembershipModal"  role="dialog" class="modal fade colored-header colored-header-primary">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New ID Card Type</h5>
                <button type="button" class="close closeThisModal" aria-label="Close">
                </button>
            </div>
            <form id ="edit_membership_form">
                <div style="padding: 23px; " class="id_cardlook_up_div">
                    
                </div>
            </form>
                    
                {{-- footer --}}
                <div class="modal-footer">
                    <div>
                        <button type="button" class="btn btn-secondary x closeThisModal">Close</button>
                        <button type="button" class="btn btn-primary custom_id_type_modal_btn" style="margin-left:10px;">Add New</button>
                    </div>
                    
                    <button type="button" class="btn btn-primary sy_icon" id="save_card_type_selected">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('supportNew.pages.modal.addModal.add_new_card_type')


