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
                        {{-- <input type="checkbox" name="vehicle1" value="Passport"> <span class="f-s-16">Passport</span><br>
                        <input type="checkbox" name="vehicle2" value="Citizenship"> <span class="f-s-16">Citizenship</span><br>
                        <input type="checkbox" name="vehicle3" value="License" checked> <span class="f-s-16">License</span><br> --}}
                    </div>
                    {{-- <div class="row">
                        <div class="col-lg-11 pd-t-20" style="margin: 0 auto;">
                            <div class="m-portlet m-portlet--mobile" style="margin-top:10px;">
                                <div class="m-portlet__body bg-form-box">
                                    <div class="form-group m-form__group row no-pd-i m-b-10-i">
                                        <label for="">Card Name</label>                                    
                                        <input type="text" class="form-control input-sm" name="value">                                    
                                                                            
                                    </div>                              
                                    
                                </div>
                            </div>                        
                        </div>                   
    
                    </div> --}}
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
    @include('support.pages.modal.addModal.add_new_card_type')
    
    
    