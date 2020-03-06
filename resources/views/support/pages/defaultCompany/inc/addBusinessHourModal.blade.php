<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Business Hours - ADD</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <form id="addHoursForm">
                        @csrf
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="day">Day/Days</label>
                                <input class="form-control " type="text" name="day" placeholder="Day">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="opening_time">Opening time</label>
                                <input class="form-control timepicker" name="open_time" placeholder="Opening time">
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-md-6 ">
                                <label class="control-label" for="closing_time">Closing time</label>
                                <input class="form-control timepicker" type="text" name="close_time" placeholder="Closing time">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-6 hourStatus">
                                <label class="control-label" for="status">Status</label>
                                <div>
                                    <select title="Select status.." name="status" id="hourStatus" multiple>


                                        <option value="Open">Open</option>
                                        <option value="Close">Closed</option>

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
            <button type="button" class="btn btn-primary sy_icon" data-id="" id="storeHours">Save</button>
        </div>
    </div>
</div>

<script>
    $(document).off('click', '#storeHours').on('click', '#storeHours', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let data = $('#addHoursForm').serializeArray();
        supportAjax({
            url: 'hour/store',
            method: 'post',
            data: data
        }, function(resp) {
            $('#cModal').modal('hide');
            toastr.success(" New hours added!");
            $('#businessHoursTable').KTDatatable().reload();

        }, function(error) {
            errorHandeler({
                fields: ['day', 'open_time', 'close_time', 'status']
            }, error);

        });
    });

    $(function() {
        $('#hourStatus').selectpicker({
            liveSearch: true,
            showTick: true,
            actionsBox: true,
            doneButton: true,
            doneButtonText: "Apply"
        });

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