<div class="modal-dialog editUserModalDialog" role="document">
    <div class="modal-content addUserModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Time</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form id ="edit_time_form">
            {{-- modal body --}}
            <div class="modal-body">
                <div class="row ">
                    <div class="col">
                            <div class="row">
                                
                                {{-- <div class="form-group label-floating col-md-3">
                                    <label class="control-label" for=""> Type</label>
                                    <div class="">
                                        <select class="form-control selectPicker" name="type">
                                           
                                            <option value="delivery" @if($location->type==='delivery') selected @endif>Delivery</option>
                                            <option value="pickup" @if($location->type==='pickup') selected @endif>Pickup</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="form-group label-floating col-md-3">
                                    <label class="control-label" for="from" >Sequence</label>
                                    
                                    <input class="form-control"   name="seq" value="{{$location->seq}}" id="">
                                </div>
                                <div class="form-group label-floating col-md-3">
                                    <label class="control-label" for="from" >Time From</label>
                                    
                                    {{-- <input class="form-control"   name="from" value="{{$location->from}}" id=""> --}}
                                    <select class="form-control selectPicker" name="from" >
                                        <option selected=""></option>
                                        <option value="1" @if($location->from==='1') selected @endif>1</option>
                                        <option value="2" @if($location->from==='2') selected @endif>2</option>
                                        <option value="3" @if($location->from==='3') selected @endif>3</option>
                                        <option value="4" @if($location->from==='4') selected @endif>4</option>
                                        <option value="5" @if($location->from==='5') selected @endif>5</option>
                                        <option value="6" @if($location->from==='6') selected @endif>6</option>
                                        <option value="7" @if($location->from==='7') selected @endif>7</option>
                                        <option value="8" @if($location->from==='8') selected @endif>8</option>
                                        <option value="9" @if($location->from==='9') selected @endif>9</option>
                                        <option value="10" @if($location->from==='10') selected @endif>10</option>
                                        <option value="11" @if($location->from==='11') selected @endif>11</option>
                                        <option value="12" @if($location->from==='12') selected @endif>12</option>
                                    </select>
                                </div>
                                <div class="form-group label-floating col-md-3">
                                    <label class="control-label" for="to">Time To</label>
                                    {{-- <input class="form-control"  value="{{$location->to}}" type="text"  name="to" id=""> --}}
                                        <select class="form-control selectPicker" name="to" >
                                            <option selected=""></option>
                                            <option value="1" @if($location->to==='1') selected @endif>1</option>
                                            <option value="2" @if($location->to==='2') selected @endif>2</option>
                                            <option value="3" @if($location->to==='3') selected @endif>3</option>
                                            <option value="4" @if($location->to==='4') selected @endif>4</option>
                                            <option value="5" @if($location->to==='5') selected @endif>5</option>
                                            <option value="6" @if($location->to==='6') selected @endif>6</option>
                                            <option value="7" @if($location->to==='7') selected @endif>7</option>
                                            <option value="8" @if($location->to==='8') selected @endif>8</option>
                                            <option value="9" @if($location->to==='9') selected @endif>9</option>
                                            <option value="10" @if($location->to==='10') selected @endif>10</option>
                                            <option value="11" @if($location->to==='11') selected @endif>11</option>
                                            <option value="12" @if($location->to==='12') selected @endif>12</option>
                                        </select>
                                </div>
                                <div class="form-group label-floating col-md-3">
                                    <label class="control-label" for=""> AM\PM</label>
                                    <div class="">
                                        <select class="form-control selectPicker" name="time_flag">
                                            <option selected="" ></option>
                                            <option value="am" @if($location->time_flag==='am') selected @endif>AM</option>
                                            <option value="pm" @if($location->time_flag==='pm') selected @endif>PM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            {{-- modal footer --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary sy_icon time_update"  id="update_time" data-id="{{$location->id}}">Update</button>
            </div>
        </form>
    </div>
</div>
<script>
    $('.selectPicker').select2({
        width:'100%',
        placeholder: 'Select'
    });

    $('#timepicker, #timepicker_1').timepicker({
            minuteStep: false,
            defaultTime: '1',
            showSeconds: false,
            showMeridian: false,
            snapToStep: false
        });

    $(document).off('click', '#update_time').on('click', '#update_time', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let edit_time_form = $('#edit_time_form');
        let data = $('#edit_time_form').serializeArray();
        let id = $(this).attr('data-id');
        supportAjax({
            url: '/admin/preferredtime/updatetime/' + id,
            method: 'POST',
            data: data
        }, function(resp) {
            $('#cModal').modal('hide');
            toastr.success("Time updated!");
            $('.type_section_dynamic_table').KTDatatable().reload();

        },function ({
                status,
                responseJSON
            }) {
                if (status === 422) {
                    edit_time_form.find("input[name]").css("border-color", "#ddd");
                    $(`input[name]`).siblings(".errorMessage").empty();

                    if (!responseJSON.errors) return;
                    const messages = [];
                    for (const [key, message] of Object.entries(
                            responseJSON.errors
                        )) {
                        edit_time_form.find(`input[name="${key}"]`).css("border-color", "#f44336");
                        messages.push(message);
                        $(`input[name="${key}"]`).siblings(".errorMessage").empty().append(message);
                    }
                    toastr.error(
                        "<strong>Please check highlighted fields! </strong> <br> <br>" +
                        messages.flat(1).join("<br>")
                    );
                }
            }
        );
    });
</script>