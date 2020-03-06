<style>
.btn.btn-default:hover {
    color: #ffffff;
    background: #d4d4d4 !important;
    border-color: #d4d4d4 !important;
}
</style>
<div class="modal-dialog" role="document">
    <div class="modal-content mp0">
        <!-- <div class="modal-body"> -->
        <div class="modal-body mp0">
            <div class="m-form m-form--label-align-right floatLabelForm">
                <form id="taskDetailUpdateForm">
                        @php
                        $date = date("d/m/Y");
                        @endphp
                    <div class="no-bx-shadow">
                        <div class="m-portlet__body card-update">
                            <div class="row">
                                <div class="col-md-12 mx-auto">
                                    <div class="card-update_title">
                                        <div style="display:flex">
                                            <div><i class="la la-align-right fs-25"></i></div>
                                            <div>
                                                <h4 class="title">{{join(" ",explode("_",strtoupper($section)))}} - in {{$task->title}}</h4>
                                            </div>
                                        </div>
                                        <div class="card-update_icon-close"><i class="la la-close fs-20" data-dismiss="modal"></i></div>
                                    </div>
                                </div> 
                                <div class="col-12 col-sm-12">
                                    @if(strtolower($section) == "priority")
                                    <div class="kt-radio-inline pd-t-20 pd-b-20">
                                        <label class="kt-radio">
                                            <input type="radio" value="high" @if($task->priority == "high") checked @endif name="priority"> High
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" value="medium" @if($task->priority == "medium") checked @endif name="priority"> Medium
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" value="low" @if($task->priority == "low") checked @endif name="priority"> Low
                                            <span></span>
                                        </label>
                                    </div>
                                    @endif
                                    @if(strtolower($section) == "start_date")
                                    <div class="datepicker-container pd-t-20 pd-b-20">
                                        <div class="form-group row">
                                            <div class="form-group  col-md-3" style="display: flex; align-items: center;">
                                                <label class="control-label active" for="add1">Start Date</label>
                                            </div>
                                            <div class="form-group  col-md-9">
                                                <input class="form-control datepick" type="text" name="start_date" value="@if(isset($task->start_date)){{format_to_us_date($task->start_date)}}@endif" placeholder="{{$date}}">
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(strtolower($section) == "due_date")
                                    <div class="datepicker-container pd-t-20 pd-b-20">
                                        <div class="form-group row">
                                            <div class="form-group  col-md-3" style="display: flex; align-items: center;">
                                                <label class="control-label active" for="add1">Due Date</label>
                                            </div>
                                            <div class="form-group  col-md-9">
                                                <input class="form-control datepick" type="text" value="@if(isset($task->due_date)){{format_to_us_date($task->due_date)}}@endif" name="due_date" placeholder="{{$date}}">
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(strtolower($section) == "reminder_date")
                                    <div class="datepicker-container pd-t-20 pd-b-20">
                                        <div class="form-group row">
                                            <div class="form-group  col-md-3" style="display: flex; align-items: center;">
                                                <label class="control-label active" for="add1">Reminder Date</label>
                                            </div>
                                            <div class="form-group  col-md-9">
                                                <input class="form-control datepick" type="text" value="@if(isset($task->reminder_date)){{format_to_us_date($task->reminder_date)}}@endif" name="reminder_date" placeholder="{{$date}}">
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(strtolower($section) =="status")
                                    <div class="form-group row  pd-t-20 pd-b-20">
                                        <label class="col-4 col-form-label" style="display:flex; align-items:center; padding-left:50px;">Status</label>
                                        <div class="col-8">
                                            <div class="kt-radio-list">
                                                @if(count($status)>0)
                                                    @foreach($status as $stat)
                                                    <label class="kt-radio">
                                                        <input type="radio" @if($task->status == $stat->id) checked @endif name="status" value="{{$stat->id}}"> {{$stat->value}}
                                                        <span></span>
                                                    </label>
                                                    @endforeach
                                                @else 
                                                <p>NO Status Available</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-12">
                                    <div style="display: flex;
                                    justify-content: space-between;">
                                    <input type="hidden" name="id" value="{{$task->id}}">
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-dollar-close"></i> Cancel</button>
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Update</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$('.datepick').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    autoUpdateInput: false,
    minYear: 1901,
    inline: true,
    }, function(start, end, label) {
        this.element.val( start.format('MM/DD/YYYY'));
    });
</script>
