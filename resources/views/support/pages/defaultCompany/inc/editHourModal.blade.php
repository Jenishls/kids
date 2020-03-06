<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Hour</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <form id="updateHourForm">
                        @csrf
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="day">Day</label>
                                <input class="form-control " type="text" value="{{$businessHour->day}}" name="day">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="value">Opening time</label>
                                <input class="form-control timepicker" id="optionValue" value="{{$businessHour->open_time}}" name="open_time">
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="day">Closing time</label>
                                <input class="form-control timepicker" type="text" value="{{$businessHour->close_time}}" name="close_time">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-6 hourStatus">
                                <label class="control-label" for="status">Status</label>
                                <div>
                                    <select title="{{$businessHour->status}}" name="status" id="editHourStatus" multiple>


                                        <option value="Open">Open</option>
                                        <option value="Closed">Closed</option>

                                    </select>
                                    <div class="errorMessage"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="updateHour" data-id="{{$businessHour->id}}">Save</button>
        </div>
    </div>
</div>

<script>
    $(document).off('click', '#updateHour').on('click', '#updateHour', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let data = $('#updateHourForm').serializeArray();
        supportAjax({
            url: '/hour/update/' + $(this).data('id'),
            method: 'post',
            data: data
        }, function(resp) {
            $('#cModal').modal('hide');
            toastr.success('Updated successfully.')
            $('#businessHoursTable').KTDatatable().reload();
        }, function(err) {
            $('#cModal').modal('hide');
            toastr.error(err.responseJSON.message);

        })
    })

    $('#editHourStatus').selectpicker({
        liveSearch: true,
        showTick: true,
        actionsBox: true,
        doneButton: true,
        doneButtonText: "Apply"
    });

    $(document).ready(function() {
        $('input.timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '10',
            maxTime: '6:00pm',
            defaultTime: '',
            startTime: '10:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });

    });
</script>