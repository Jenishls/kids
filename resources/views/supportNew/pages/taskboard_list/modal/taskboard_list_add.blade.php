<div class="modal-dialog modal-custom-600-width" role="document">
    <div class="modal-content mp0">
        <!-- Modal Header -->
        <div class="modal-header">
            <h5 class="modal-title fs-modal-header">
                 <i class="la la-plus cust_plus_icon"></i>
                <span>New Taskboard List</span>
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
            <form class="m-form m-form--label-align-right floatLabelForm" id="taskboardListForm" enctype="multipart/form-data">
                @csrf
                <div class="no-bx-shadow">
                    <div class="m-portlet__body">
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                <div class="form-group">
                                    <h4>Title</h4>
                                    <input type="text" name="title" id="title" class="form-control m-input" required>
                                    <input type="hidden" name="taskboard_id" value="{{$taskboard->id}}">
                                </div>
                            </div> 
                            <div class="col-12 col-sm-12 m-t-10">
                                <div class="m-form__group form-group">
                                    <h4>Status</h4>
                                    <div class="form-group">
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio">
                                                <input type="radio" name="status_id" value=""  checked="checked"> None
                                                <span></span>
                                            </label>
                                            @if(count($status)>0)
                                                @foreach($status as $stat)
                                                    <label class="kt-radio">
                                                        <input type="radio" name="status_id" value="{{$stat->id}}"> {{$stat->value}}
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
            <button type="button" class="float-right btn btn-success" id="btnTaskboardListCreate">
                Create 
            </button>
        </div>
    </div>
</div>
