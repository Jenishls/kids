<div class="modal-dialog modal-custom-600-width" role="document">
    <div class="modal-content mp0">
        <!-- Modal Header -->
        <div class="modal-header">
            <h5 class="modal-title fs-modal-header">
                 <i class="la la-plus cust_plus_icon"></i>
                <span>Update Taskboard List</span>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    &times;
                </span>
            </button>
        </div>
        <!-- Modal Body -->
        <!-- <div class="modal-body"> -->
        <div class="modal-body mp0">
            <form class="m-form m-form--label-align-right floatLabelForm" id="taskboardListUpdateForm">
                @csrf
                <div class="no-bx-shadow">
                    <div class="m-portlet__body">
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                <div class="form-group">
                                    <h4>Title</h4>
                                    <input type="text" name="title" id="title" value="{{$taskboardList->title}}" class="form-control m-input" required>
                                    <input type="hidden" name="id" value="{{$taskboardList->id}}">
                                    <input type="hidden" name="taskboard_id" value="{{$taskboardList->taskboard_id}}">
                                </div>
                            </div> 
                            <div class="col-12 col-sm-12 m-t-10">
                                <div class="m-form__group form-group">
                                    <h4>Status</h4>
                                    <div class="form-group">
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio">
                                                <input type="radio" name="status_id" value=""> None
                                                <span></span>
                                            </label>
                                            @if(count($status)>0)
                                                @foreach($status as $stat)
                                                    <label class="kt-radio">
                                                        <input type="radio" name="status_id" @if($stat->id == $taskboardList->status_id) checked @endif value="{{$stat->id}}"> {{$stat->value}}
                                                        <span></span>
                                                    </label>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Modal Footer -->
        <div class="modal-footer d-ib">
            <button type="button" class="float-left btn btn-secondary" data-dismiss="modal">
                Cancel
            </button>
            <button type="button" class="float-right btn btn-success" id="btnTaskboardListUpdate">
                Update 
            </button>
        </div>
    </div>
</div>
