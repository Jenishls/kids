<div class="modal-dialog editUserModalDialog" role="document">
    <div class="modal-content addUserModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Address</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form id ="adreess_form">
            @csrf
            {{-- modal body --}}
            <div class="modal-body">
                <div class="row ">
                    <div class="col">
                            <div class="row">
                                <div class="form-group label-floating col-md-4">
                                    <label class="control-label" for="user_add_type">Address Type</label>
                                    <div class="">
                                        <select class="form-control" name="address_type">
                                            <option selected="">{{ucfirst($address->address_type)}}</option>
                                            <option name="permanent">Permanent</option>
                                            <option name="temporary">Temporary</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group label-floating col-md-12">
                                    <label class="control-label" for="user_add_1">Address 1</label>
                                    
                                <input class="form-control" value="{{$address->add1}}" type="text" id="user_add_1" name="add1">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group label-floating col-md-12">
                                    <label class="control-label" for="user_add_2">Address 2</label>
                                    
                                    <input class="form-control" value="{{$address->add2}}" type="text" id="user_add_2" name="add2">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group label-floating col-md-4">
                                    <label class="control-label" for="user_city">City</label>
                                    
                                <input class="form-control" value="{{$address->city}}" type="text" id="user_city_name" name="city">
                                </div>
                                <div class="form-group label-floating col-md-4">
                                    <label class="control-label" for="user_state">State</label>
                                    <input class="form-control" value="{{$address->state}}" type="text" id="user_state_name" name="state">
                                </div>
                                <div class="form-group label-floating col-md-4">
                                    <label class="control-label" for="zip">Zip</label>
                                    <input class="form-control" value="{{$address->zip}}" type="text" id="user_zip" name="zip">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group label-floating col-md-4">
                                    <label class="control-label" for="user_county">County</label>
                                    <input class="form-control" value="{{$address->county}}" type="text" id="user_county" name="county">
                                </div>

                                
                                
                                <div class="form-group label-floating col-md-4">
                                    <label class="control-label" for="user_country">Country</label>
                                    <input class="form-control" value="{{$address->country}}" type="text" id="user_country" name="country">
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
            {{-- modal footer --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary sy_icon info_update" data-route="/update/addressDetail" data-id="{{$address->id}}" >Update</button>
            </div>
        </form>
    </div>
</div>