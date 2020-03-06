<div class="modal-dialog" role="document" style="width: 600px;">
    <div class="modal-content">
        <form id="update_status">
            <div class="modal-body" style="background: #fff;">
                <p style="font-size: 19px;">Are you sure you want to change this Status?</p>
                <p class="@if($status=='active') text-success @else text-danger @endif">This action will change the status to {{$status}}!</p>
            </div>
        </form>
        <!-- Modal Footer -->
        <div class="modal-footer" style="display: inline-block; background: #eee;">
            <button type="button" class="btn btn-light btn-pill float-left" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn @if($status=='active') btn-success @else btn-danger @endif btn-pill btn-elevate float-right" data-status="{{$status}}" id="updateStatus">
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
            url:'/admin/client/status/update/{{$client}}?status='+status,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                $('#cModal').modal('hide');
                let span = "";
                if(response.data.status == "active"){
                    span =`<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill pointer">Active</span>`;
                }
                else if(response.data.status == "inactive"){
                    span =`<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill pointer" >Inactive</span>`;
                }
                $('#clientStatusDiv').empty().append(span);
            }, 
            error:function({status, responseJSON})
            {
                
            }
        });
    });
</script>