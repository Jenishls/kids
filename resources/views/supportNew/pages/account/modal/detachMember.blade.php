<div class="modal-dialog" role="document" style="width: 600px;">
    <div class="modal-content">
        <form id="update_status">
            <div class="modal-body" style="background: #fff;">
                <p style="font-size: 19px;">Are you sure you delete Association from this Member?</p>
                <p class="text-danger">This action will remove Association from the member!</p>
            </div>
        </form>
        <!-- Modal Footer -->
        <div class="modal-footer" style="display: inline-block; background: #eee;">
            <button type="button" class="btn btn-light btn-pill float-left" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger btn-pill btn-elevate float-right" data-route="/admin/account/delete/{{$company->id}}/member/{{$member}}" id="detachMember">
                <span>
                    Remove
                </span>
            </button>
        </div>
    </div>
</div>

<script>
    $(document).off('click','#detachMember').on('click','#detachMember',function(e){
        e.preventDefault();
        let url = $(this).attr('data-route');
        $.ajax({
            url,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                $('#cModal1').modal('hide');
                if($('#t_clientstable').length)
                clientTableReloader();
                if($('#t_account_table').length)
                    companyTableReloader();
                if($('#t_company_client_table').length)
                    $('#t_company_client_table').KTDatatable().reload();
                toastr.success('<strong>Removed Association with Member!</strong>');
                
            }, 
            error:function({status, responseJSON})
            {
                console.log(responseJSON);
            }
        });
    });
</script>