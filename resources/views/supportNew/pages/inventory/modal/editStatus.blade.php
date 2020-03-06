<style>
    .modal-header-danger {
        background-color: #fb7b91 !important;
        border-color: #fb7b91 !important;
    }    
</style>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body" style="background: #fff;">
                    <p style="font-size: 19px;">Are you sure you want to update this Status?</p>
                                <p class="text-danger">This action will update the status of this Package !</p>
                            </div>
        
                <!-- Modal Footer -->
                <div class="modal-footer" style="display: inline-block; background: #eee;">
                    <button type="button" class="btn btn-secondary btn--pill float-left" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger btn--icon btn--pill float-right" id="updateStatus"  data-dismiss="modal">
                        <span>
                            <span>Update</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <script>
            $(document).off('click','#updateStatus').on('click','#updateStatus',function(e){
                e.preventDefault();
                $.ajax({
                url:'/admin/package/status/update/{{$package->id}}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response){
                    $('#cModal').modal('hide');
                    toastr.success(response.message);
                    $('#packageDataTable').KTDatatable().reload(); 

                }, 
                error:function({status, responseJSON})
                {
                   
                }
            });
            });
        </script>