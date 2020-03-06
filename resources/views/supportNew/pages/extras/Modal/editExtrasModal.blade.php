
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Extras</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form id ="edit_extras_form">
            {{-- modal body --}}
            <div class="modal-body">
                <div class="extras--field">
                    <div class="row">
                        <div class="col-md-2 label-floating">
                            <label class="control-label" for="price" class="required">Seq No.</label>
                            <input type="text" class="form-control" id="" name="seq" value="{{$location->seq}}" autocomplete="off" >
                        </div>
                        <div class="col-md-4 label-floating">
                            <label class="control-label" for="label" class="required">Label</label>
                            <input type="text" class="form-control" id="code" name="label" value="{{$location->label}}" autocomplete="off" >
                            <div class="errorMessage"></div>
                        </div>
                        <div class="col-md-4 label-floating">
                            <label class="control-label" for="price" class="required">Price</label>
                            <input type="text" class="form-control" id="" name="price" value="{{$location->price}}" autocomplete="off" >
                        </div>
                        <div class="col-md-1 label-floating">
                            <label class="control-label">Default</label><br>
                            <input type="checkbox" style="margin-top:10px;" value="{{$location->is_default}}" name="is_default" @if($location->is_default=== 1) checked @endif>
                            <span></span>
                        </div>
                        {{-- <div class="form-group label-floating col-md-6">
                            <label class="control-label" for="">Type</label>
                            <div class="">
                                <select class="form-control selectPicker" name="type">
                                    <option value="delivery" @if($location->type==='delivery') selected @endif>Delivery</option>
                                    <option value="pickup" @if($location->type==='pickup') selected @endif>Pickup</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group label-floating col-md-6">
                            <label class="control-label" for=""> Street Level Free</label>
                            <div class="">
                                <select class="form-control selectPicker" name="flight">

                                    <option value="delivery" @if($location->flight . ':' . (int)$location->price === '1:5') selected @endif>
                                        <span>1</span> flight <span>$5.00</span>
                                    </option>

                                    <option value="2:10" @if($location->flight . ':' . (int)$location->price === '2:10') selected @endif        ><span>2</span> flight <span>$10.00</span></option>
                                    <option value="3:15" @if($location->flight . ':' . (int)$location->price === '3:15') selected @endif><span>3</span> flight <span>$15.00</span></option>
                                    <option value="4:20" @if($location->flight . ':' . (int)$location->price === '4:20') selected @endif><span>4</span> flight <span>$20.00</span></option>
                                    <option value="5:25" @if($location->flight . ':' . (int)$location->price === '5:25') selected @endif><span>5</span> flight <span>$25.00</span></option>
                                </select>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            {{-- modal footer --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary sy_icon extras_update"  id="update_extras" data-id="{{$location->id}}">Update</button>
            </div>
        </form>
    </div>
</div>

<script>

    $('.selectPicker').select2({
        width:'100%',
        placeholder: 'Select'
    });
    
    // update
    $(document).off('click', '#update_extras').on('click', '#update_extras', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let table = $(".tableloader").attr("id");
        let edit_extras_form = $('#edit_extras_form');
        edit_extras_form.find('input[type="checkbox"]').each(function(){
            let box = $(this);
            if(box.is(':checked') == true){

                box.attr('value', '1');
            }else{
                box.prop('checked', true);
                box.attr('value', '0');
            }
        });
        let data = $('#edit_extras_form').serializeArray();
        
        let id = $(this).attr('data-id');
        supportAjax({
            url: '/admin/extras/update/extra/' + id,
            method: 'POST',
            data: data
        }, function(resp) {
            $('#cModal').modal('hide');
            toastr.success("Extras Table updated!");
            $(`#${table}`).KTDatatable().reload();

        },
            function ({
                status,
                responseJSON
            }) {
                if (status === 422) {
                    edit_extras_form
                        .find("input[name], textarea[name]")
                        .css("border-color", "#ddd");
                    $(`input[name]`)
                        .siblings(".errorMessage")
                        .empty();

                    if (!responseJSON.errors) return;
                    const messages = [];
                    for (const [key, message] of Object.entries(
                            responseJSON.errors
                        )) {
                        edit_extras_form
                            .find(`input[name="${key}"]`)
                            .css("border-color", "#f44336");
                        edit_extras_form
                            .find(`textarea[name="${key}"]`)
                            .css("border-color", "#f44336");
                        messages.push(message);
                        $(`input[name="${key}"]`)
                            .siblings(".errorMessage")
                            .empty()
                            .append(message);

                        $(`textarea[name="${key}"]`)
                            .siblings(".errorMessage")
                            .empty()
                            .append(message);
                    }
                    toastr.error(
                        "<strong>Please check highlighted fields! </strong> <br> <br>" +
                        messages.flat(1).join("<br>")
                    );
                }
                // $('#cModal').modal('hide');
                // toastr.error(error.responseJSON.message);
            }
        )
    });
</script>