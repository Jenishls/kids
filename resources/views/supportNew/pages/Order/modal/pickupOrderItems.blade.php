<style>
    .modal-header-danger {
        background-color: #fb7b91 !important;
        border-color: #fb7b91 !important;
    }    
</style>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body" style="background: #fff;">
                    <p style="font-size: 19px;">Are you sure you want to Pickup the selected Items?</p>
                                <p class="text-danger">This action will Pickup all the selected Items !</p>
                            </div>
        
                <!-- Modal Footer -->
                <div class="modal-footer" style="display: inline-block; background: #eee;">
                    <button type="button" class="btn btn-light btn-pill float-left" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger btn-pill btn-elevate float-right" data-dismiss="modal" id="updateStatus">
                        <span>
                            Pickup Items
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <script>
            $(document).off('click','#updateStatus').on('click','#updateStatus',function(e){
                e.preventDefault();
                let data = $('tbody .grabbed_order_items').serializeArray();
                console.log(data);
                $.ajax({
                    url:'/admin/order/pickupOrderItems/{{$order->id}}',
                    method: 'POST',
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response){
                        $('#cModal1').modal('hide');
                        toastr.success(response.message);
                        $('#orderItemDatatable').KTDatatable().reload(); 
                        $('#invoicedataTable').KTDatatable().reload(); 
                    }, 
                    error:function({status, responseJSON})
                    {
                        
                    }
                });
            });
        </script>