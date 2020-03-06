<div id="addNewCardType"  role="dialog" class="modal fade colored-header colored-header-primary">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New ID Card Type</h5>
                <button type="button" class="close closeThisAddNewModal" aria-label="Close">
                </button>
            </div>
            <form id ="save_new_card_type_form">
                <div class="row">
                    <div class="col-lg-11 pd-t-20" style="margin: 0 auto;">
                        <div class="m-portlet m-portlet--mobile" style="margin-top:10px;">
                            <div class="m-portlet__body bg-form-box">
                                <div class="form-group m-form__group row no-pd-i m-b-10-i">
                                    <label for="">Look Up Code</label>                                    
                                    <input type="text" class="form-control input-sm" name="code">
                                </div>
                                <div class="form-group m-form__group row no-pd-i m-b-10-i " style="margin-top: 19px;">
                                    <label for="">Value</label>                                    
                                    <input type="text" class="form-control input-sm" name="value">
                                </div>
                            </div>
                        </div>                        
                    </div> 
                </div>
            </form>
                    
                {{-- footer --}}
                <div class="modal-footer">
                    <div>
                        <button type="button" class="btn btn-secondary x closeThisAddNewModal">Close</button>
                        
                    </div>
                    
                <button type="button" class="btn btn-primary sy_icon store_new_card_type" data-id="{{$card->section_id}}" data-route="addCardType/storeCardtype">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
    