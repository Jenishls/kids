<div class="modal-dialog" role="document">
    <div class="modal-content addUserModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            
            <div class="row ">
                <div class="col">
                    <form id ="add_address_form">
                        @csrf
                        <div class="row">
                            <div class="form-group label-floating col-md-4">
                                <label class="control-label" for="user_add_type">Address Type</label>
                                <div class="">
                                    <select class="form-control">
                                        <option selected="">Select address...</option>
                                        <option value="">Permanent</option>
                                        <option value="">Temporary</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-md-12">
                                <label class="control-label" for="user_add_1">Address 1</label>
                                
                            <input class="form-control" value="" type="text" id="user_add_1" name="add1">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group label-floating col-md-12">
                                <label class="control-label" for="user_add_2">Address 2</label>
                                
                                <input class="form-control" value="" type="text" id="user_add_2" name="add2">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group label-floating col-md-4">
                                <label class="control-label" for="user_city">City</label>
                                
                            <input class="form-control" value="" type="text" id="user_city_name" name="city">
                            </div>
                            <div class="form-group label-floating col-md-4">
                                <label class="control-label" for="user_state">State</label>
                                <input class="form-control" value="" type="text" id="user_state_name" name="state">
                            </div>
                            <div class="form-group label-floating col-md-4">
                                <label class="control-label" for="zip">Zip</label>
                                <input class="form-control" value="" type="text" id="user_zip" name="zip">
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="form-group label-floating col-md-4">
                                <label class="control-label" for="user_county">County</label>
                                <input class="form-control" value="" type="text" id="user_county" name="county" placeholder="Nepal">
                            </div>
                            
                            <div class="form-group label-floating col-md-4">
                                <label class="control-label" for="user_country">Country</label>
                                <input class="form-control" value="" type="text" id="user_country" name="country" placeholder="Nepal">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary sy_icon" id="addAddress" data-id="{{$member}}" user-id = "{{$user_id}}">Add</button>
        </div>
    </div>
</div>