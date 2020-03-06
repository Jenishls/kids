<div class="modal-dialog addZipModalDialog" role="document">
    <div class="modal-content addZipModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Location</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <form id="update_zip_form">
                        @csrf
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="city">City</label>
                                <input class="form-control" type="text" name="city" data-inputName="city" id="city" value="{{$location->city}}" placeholder="City" required="require" autocomplete="off">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-6 ">
                                <label class="control-label" for="county">County</label>
                                <input class="form-control" type="text" id="county" data-inputName="county" name="county" value="{{$location->county}}" placeholder="County" required="require" autocomplete="off">
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="state">State</label>
                                <input class="form-control" type="text" id="state" data-inputName="state" name="state" value="{{$location->state}}" placeholder="State" required="require" autocomplete="off">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="zip">Zip Code</label>
                                <input class="form-control" type="text" id="zip" data-inputName="zip" name="zipcode" value="{{$location->zipcode}}" placeholder="Zip" required="require" autocomplete="off">
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-md-12">
                                <label class="control-label" for="price">Price</label>
                                <input class="form-control" type="number" id="price" data-inputName="price" name="price" value="{{$location->price}}" placeholder="Price" required="require" autocomplete="off">
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="update_location" data-id="{{$location->id}}">Update</button>
        </div>
    </div>
</div>

<script>
    $(document).off('click', '#update_location').on('click', '#update_location', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let add_zip_form = $('#update_zip_form');
        let data = $('#update_zip_form').serializeArray();
        let id = $(this).attr('data-id');
        supportAjax({
            url: 'zip/updateZip/' + id,
            method: 'POST',
            data: data
        }, function(resp) {
            $('#cModal').modal('hide');
            toastr.success("Location updated!");
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



    //  $(function(){
    //         $('#user_role').selectpicker({
    //             liveSearch: true,
    //             showTick: true,
    //             actionsBox: true,
    //             doneButton : true, 
    //             doneButtonText : "Apply"

    //         });

    //  });
</script>