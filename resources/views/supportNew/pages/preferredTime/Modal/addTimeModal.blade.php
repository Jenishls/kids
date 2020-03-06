
<div class="modal-dialog editUserModalDialog" role="document">
    <div class="modal-content addUserModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Time</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form id ="time_form">
            {{-- modal body --}}
            <div class="modal-body">
                <div class="time--field">
                    <div class="row">
                        
                        <div class="form-group label-floating col-md-3">
                            <label class="control-label" for=""> Type</label>
                            <div class="">
                                <select class="form-control selectPicker" name="type[]">
                                    <option selected=""></option>
                                    <option value="delivery">Delivery</option>
                                    <option value="pickup">Pickup</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group label-floating col-md-3">
                            <label class="control-label" for="from">Time From</label>
                            
                            {{-- <input class="form-control timeFrom timepicker"   name="from[]" id="timepicker"> --}}
                            <select class="form-control selectPicker" name="from[]" >
                                <option selected=""></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="form-group label-floating col-md-3">
                            <label class="control-label" for="to">Time To</label>
                            {{-- <input class="form-control timeTo timepicker_1"  type="text"  name="to[]" id="timepicker_1"> --}}
                            <select class="form-control selectPicker" name="to[]" >
                                <option selected=""></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="form-group label-floating col-md-2">
                            <label class="control-label" for=""> AM\PM</label>
                            <div class="">
                                <select class="form-control selectPicker" name="time_flag[]" >
                                    <option selected=""></option>
                                    <option value="am">AM</option>
                                    <option value="pm">PM</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group label-floating col-md-1 pd-t-30 text-center">
                            <button class="btn btn-sm btn-success btn-secondary btn-elevate-hover btn-circle btn-icon addNewTime" data-id="" style="color:brown">
                                <i class="la la-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- modal footer --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary sy_icon time_update"  id="store_time">Add</button>
            </div>
        </form>
    </div>
</div>

<script>

    
    $('.selectPicker').select2({
        width:'100%',
        placeholder: 'Select'
    });
    // $('.timeFrom, .timeTo').inputmask('hh');

    
    $(document).off('click', '#store_time').on('click', '#store_time', function(e) {
        e.preventDefault();
        let add_time_form = $('#time_form');
        let data = $('#time_form').serializeArray();
        // console.log(data);

        supportAjax({
            url: '/admin/preferredtime/time/store',
            method: 'POST',
            data: data
        }, function(resp) {
            $('#cModal').modal('hide');
            toastr.success("New Time added!");
            $('.type_section_dynamic_table').KTDatatable().reload();

        },function ({
                status,
                responseJSON
            }) {
                if (status === 422) {
                    add_time_form.find("input[name]").css("border-color", "#ddd");
                    $(`input[name]`).siblings(".errorMessage").empty();

                    if (!responseJSON.errors) return;
                    const messages = [];
                    for (const [key, message] of Object.entries(
                            responseJSON.errors
                        )) {
                        add_time_form.find(`input[name="${key}"]`).css("border-color", "#f44336");
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

    // add new item 
    $(document).off('click', '.addNewTime').on('click', '.addNewTime', function(e){
        e.preventDefault();

        let appendNewRow = `
                        <div class="row addedTimeRow">
                            
                            <div class="form-group label-floating col-md-3">
                                <div class="">
                                    <select class="form-control selectPicker" name="type[]">
                                        <option selected=""></option>
                                        <option value="delivery">Delivery</option>
                                        <option value="pickup">Pickup</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group label-floating col-md-3">
                                
                                <select class="form-control selectPicker" name="from[]" >
                                    <option selected=""></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="form-group label-floating col-md-3">
                                <select class="form-control selectPicker" name="to[]" >
                                    <option selected=""></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="form-group label-floating col-md-2">
                                <div class="">
                                    <select class="form-control selectPicker" name="time_flag[]" >
                                        <option selected=""></option>
                                        <option value="am">AM</option>
                                        <option value="pm">PM</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group label-floating col-md-1 pd-t-5 text-center">
                                <button class="btn btn-sm btn-danger btn-secondary btn-elevate-hover btn-circle btn-icon subNewTime" data-id="0" style="color:brown">
                                    <i class="la la-remove"></i>
                                </button>
                            </div>
                        </div>`
        $('.time--field').append(appendNewRow);
        
        $('.selectPicker').select2({
            width:'100%',
            placeholder: 'Select'
        });

        
    });

    $('.timepicker, .timepicker_1').timepicker({
            // minuteStep: 0,
            defaultTime: '1',
            showSeconds: false,
            showMeridian: false,
            maxHours: 12,   
        });

    $(document).off('click', '.subNewTime').on('click', '.subNewTime', function(e){
        e.preventDefault();
        $(this).closest('div.addedTimeRow').remove();
       
    });
</script>