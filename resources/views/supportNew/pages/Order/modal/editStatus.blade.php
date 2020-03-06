<div class="modal-dialog" role="document" style="width: 600px;">
    <div class="modal-content">
        <form id="update_status">
            <div class="modal-body" style="background: #fff;">
                <p style="font-size: 19px;">Are you sure you want to change this Status?</p>
                <p class="text-danger">This action will change the status of this Package !</p>
            </div>
        </form>

        <!-- Modal Footer -->
        <div class="modal-footer" style="display: inline-block; background: #eee;">
            <button type="button" class="btn btn-light btn-pill float-left" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger btn-pill btn-elevate float-right" data-status="{{$status}}" id="updateStatus">
                <span>
                    Change
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
            url:'/admin/order/status/{{$order->id}}?status='+status,
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
                                                        <a class="dropdown-item pointer update_status" data-status="pending"> Pending</a>
                                                        <a class="dropdown-item pointer update_status" data-status="confirmed"> Confirm</a>
                                                        <a class="dropdown-item pointer update_status" data-status="delivered"> Delivered</a>
                                                        <a class="dropdown-item pointer update_status" data-status="picked_up"> Picked up</a>
                                                        <a class="dropdown-item pointer update_status" data-status="closed"> Closed</a>
                                                        <a class="dropdown-item pointer update_status" data-status="deleted"> Deleted</a>
                                                    </div>
                                                </div>`; 
                if(response.data.order_status == "confirmed"){
                    span =`<span class="kt-badge  kt-badge--info kt-badge--inline kt-badge--pill pointer " data-id="{{$order->id}}">Confirmed</span>`;
                }
                else if(response.data.order_status == "delivered"){
                    $('#span_delivery_by').text(response.delivery);
                    span =`<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill pointer " data-id="{{$order->id}}" >Delivered</span>`;
                }
                else if(response.data.order_status == "picked_up"){
                    $('#span_pickup_by').text(response.pickup);
                    span =`<span class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill pointer " style="background: #48cfbd; color: #fff;" data-id="{{$order->id}}">Picked Up</span>`;
                }                
                else if(response.data.order_status == "closed"){
                    span =`<span class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill pointer " data-id="{{$order->id}}">Closed</span>`;
                }
                else if(response.data.order_status == "deleted"){
                    span =`<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill pointer " data-id="{{$order->id}}">Deleted</span>`;
                }            
                else{
                    span =`<span class="kt-badge  kt-badge--warning kt-badge--inline kt-badge--pill pointer " data-id="{{$order->id}}" >Pending</span>`;
                }
                $('#span_status').empty().append(span+div);
                
               


            }, 
            error:function({status, responseJSON})
            {
                
            }
        });
    });
</script>