<div class="modal-dialog addUserModalDialog" role="document">
    <div class="modal-content addUserModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Audit History</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="kt-scroll ps ps--active-y" data-scroll="true" data-height="200" style="height: 200px; overflow: hidden;">
            @if(count($audit_details)>0)
                @foreach($audit_details as $detail)
                    <h5> Username:</h5>
                    <h6>{{$detail->user_name}}</h6>
                    <br>
                    <h5> Operation performed:</h5>
                    <h6>{{ucfirst($detail->activity)}}</h6>
                    <br>
                    <h5>Modified at:</h5>
                    <h6>{{\Carbon\Carbon::parse($detail->updated_at->format('F d Y h A'))->diffForHumans()}}</h6>
                    <br>
                    <h4>Details:</h4>
                    <hr style="width:40%;">
                    <h5>Old Data:</h5>
                    <h6 style="width:80%;display:flex;"><p>{{$detail->old_data}}<p></h6>
                    <br>
                    <h5>New Data:</h5>
                    <h6 style="width:80%;display:flex;">{{$detail->new_data}}</h6>
                    <br>
                    <hr>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                    </div>
                </div>
                <div class="ps__rail-y" style="top: 0px; right: 0px; height: 200px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 72px;">
                    </div>
                </div>
            </div>
                @endforeach
            @else
                <h3 style="margin:0 auto;">No auditted data to display.</h3>
            @endif
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
