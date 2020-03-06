<!-- <div class="modal-dialog addZipModalDialog" role="document">
    <div class="modal-content addZipModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Location</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">

            <div class="row">
                <div class="col">
                    <form id="zip_form">
                        @csrf
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="city">City</label>
                                <input class="form-control" type="text" name="city" data-inputName="city" id="city" placeholder="City" required="require" autocomplete="off">

                                <div class="errorMessage"></div>

                            </div>
                            <div class="form-group label-floating col-md-6 ">

                                <label class="control-label" for="county">County</label>
                                <input class="form-control" type="text" id="county" data-inputName="county" name="county" placeholder="County" required="require" autocomplete="off">

                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="state">State</label>
                                <input class="form-control" type="text" id="state" data-inputName="state" name="state" placeholder="State" required="require" autocomplete="off">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="zip">Zip Code</label>
                                <input class="form-control" type="text" id="zip" data-inputName="zip" name="zipcode" placeholder="Zip" required="require" autocomplete="off">
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="store_location">Save</button>
        </div>
    </div>
</div> -->





<!-- Modal 1 -->


<div class="modal-dialog addZipModal" role="document" style="margin-left:26%;">
    <div class="modal-content modal modal-1000">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Location</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form id="zip_form">
            {{-- modal body --}}
            <div class="modal-body row ">
                <div id="appendContainer">
                    <div class="row singleRow" data-id="1">
                        @csrf

                        <div class="form-group label-floating col-md-3">
                            <label class="control-label" for="city">City</label>
                            <input class="form-control" type="text" name="city[]" data-inputName="city"  placeholder="City" required="require" autocomplete="off">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="form-group label-floating col-md-2">

                            <label class="control-label" for="county">County</label>
                            <input class="form-control" type="text"  data-inputName="county" name="county[]" placeholder="County" required="require" autocomplete="off">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="form-group label-floating col-md-2">
                            <label class="control-label" for="state">State</label>
                            <input class="form-control" type="text"  data-inputName="state" name="state[]" placeholder="State" required="require" autocomplete="off">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="form-group label-floating col-md-2">
                            <label class="control-label" for="zip">Zip Code</label>
                            <input class="form-control" type="text"  data-inputName="zip" name="zipcode[]" placeholder="Zip" required="require" autocomplete="off">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="form-group label-floating col-md-2">
                            <label class="control-label" for="price">Price</label>
                            <input class="form-control" type="number"  data-inputName="price" name="price[]" placeholder="Price" required="require" autocomplete="off">
                            <div class="errorMessage"></div>
                        </div>

                        <div class="col-md-1 add_location_modal_data form-group label-floating pd-t-30 text-center">
                            <!-- <label class="control-label" for=""></label>
                            <div class="kt-demo-icon__preview " >
                                <i class="fa fa-plus-square"></i>
                            </div> -->
                            <button class="btn btn-sm btn-success btn-secondary btn-elevate-hover btn-square btn-icon zipBtnAddRow" style="color: #1dc9b7;border-radius:4px;">
                                <i class="la la-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        {{-- footer --}}
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="store_location">Save</button>
        </div>
    </div>
</div>
<script>
    var location_add_row = 2;
    $(document).off('click', '.zipBtnAddRow').on('click', '.zipBtnAddRow', function() {
        const newRow =
            `<div class="row singleRow"  data-id="${location_add_row}">
                @csrf
                    <div class="form-group label-floating col-md-3">
                        <label class="control-label" for="city">City</label>
                        <input class="form-control" type="text" name="city[]" data-inputName="city"  placeholder="City" required="require" autocomplete="off">
                        <div class="errorMessage"></div>
                    </div>
                    <div class="form-group label-floating col-md-2">

                        <label class="control-label" for="county">County</label>
                        <input class="form-control" type="text"  data-inputName="county" name="county[]" placeholder="County" required="require" autocomplete="off">
                        <div class="errorMessage"></div>
                    </div>
                    <div class="form-group label-floating col-md-2">
                        <label class="control-label" for="state">State</label>
                        <input class="form-control" type="text"  data-inputName="state" name="state[]" placeholder="State" required="require" autocomplete="off">
                        <div class="errorMessage"></div>
                    </div>
                    <div class="form-group label-floating col-md-2">
                        <label class="control-label" for="zip">Zip Code</label>
                        <input class="form-control" type="text"  data-inputName="zip" name="zipcode[]" placeholder="Zip" required="require" autocomplete="off">
                        <div class="errorMessage"></div>
                    </div>
                    <div class="form-group label-floating col-md-2">
                        <label class="control-label" for="price">Price</label>
                        <input class="form-control" type="number" data-inputName="price" name="price[]" placeholder="Price" required="require" autocomplete="off">
                        <div class="errorMessage"></div>
                    </div> 
            <div class="col-1 remove_membership_modal_data pd-t-30 text-center">
                <button class="btn btn-danger btn-sm btn-secondary btn-elevate-hover btn-square btn-icon zipBtnRemoveRow" style="padding-left:0px !important;border-radius:4px;">
                <i class="la la-remove"></i>
                </button>
            </div>
        </div>
        
        `;
        $('#appendContainer').append(newRow);
        location_add_row += 1;
    });



    $(document).off('click', '#store_location').on('click', '#store_location', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let add_zip_form = $('#zip_form');
        let data = $('#zip_form').serializeArray();
        supportAjax({
            url: 'zip/add',
            method: 'POST',
            data: data
        }, function(resp) {
            $('#cModal').modal('hide');
            toastr.success("New location added!");
            $('#t_zipstable').KTDatatable().reload();

        }, function({
            status,
            responseJSON
        }) {
            if (status === 422) {
                add_zip_form.find('input[name]').css('border-color', '#ddd');
                $(`input[name]`).siblings(".errorMessage").empty();
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    add_zip_form.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`input[name="${key}"]`).siblings(".errorMessage").append(message);
                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        });
    });

    $(document).on('click', '.zipBtnRemoveRow', function() {
        $(this).parent().parent().empty().remove();
    });
</script>