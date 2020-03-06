<div class="modal-dialog" role="document" style="width: 600px;">
    <div class="modal-content">
        <form id="update_status">
            <div class="modal-body" style="background: #fff;">
                <p style="font-size: 19px;">Are you sure you want to change this Status?</p>
                <p class="text-danger">This action will change the Campaign status to {{$status}} !</p>
            </div>
        </form>

        <!-- Modal Footer -->
        <div class="modal-footer" style="display: inline-block; background: #eee;">
            <button type="button" class="btn btn-light btn-pill float-left" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn @if($status=='active')btn-success @else btn-danger @endif btn-pill btn-elevate float-right" data-status="{{$status}}" id="updateStatus">
                <span>
                    Save
                </span>
            </button>
        </div>
    </div>
</div>

<script>
    $(document).off('click','#updateStatus').on('click','#updateStatus',function(e){
        e.preventDefault();
        let status = $(this).attr('data-status');
        $.ajax({
            url:'/admin/campaign/status/{{$campaign->id}}?status='+status,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                $('#cModal').modal('hide');
                let span = "";
                const div = `<div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-hover-brand btn-elevate-hover btn-icon btn-sm btn-icon-md btn-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="far fa-edit"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" style="">
                                    <a class="dropdown-item pointer update_status" data-status="active">Active</a>
                                    <a class="dropdown-item pointer update_status" data-status="inactive"> Inactive</a>
                                </div>
                            </div>`; 
                if(response.data.is_active){
                    span =`<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill pointer " data-id="{{$campaign->id}}">Active</span>`;
                }
                else{
                    span =`<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill pointer " data-id="{{$campaign->id}}" >Inactive</span>`;
                }
                $('#span_status').empty().append(span+div);
            }, 
            error:function({status, responseJSON})
            {
            }
        });
    });
</script>