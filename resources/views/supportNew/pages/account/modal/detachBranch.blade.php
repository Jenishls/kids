<div class="modal-dialog" role="document" style="width: 600px;">
    <div class="modal-content">
        <form id="update_status">
            <div class="modal-body" style="background: #fff;">
                <p style="font-size: 19px;">Are you sure you delete association from this Branch?</p>
                <p class="text-danger">This action will remove association from the Branch!</p>
            </div>
        </form>
        <!-- Modal Footer -->
        <div class="modal-footer" style="display: inline-block; background: #eee;">
            <button type="button" class="btn btn-light btn-pill float-left" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger btn-pill btn-elevate float-right" data-route="/admin/account/delete/{{$company->id}}/branch/{{$branch}}" id="detachBranch">
                <span>
                    Change
                </span>
            </button>
        </div>
    </div>
</div>

<script>
    $(document).off('click','#detachBranch').on('click','#detachBranch',function(e){
        e.preventDefault();
        let url = $(this).attr('data-route');
        $.ajax({
            url,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                $('#cModal').modal('hide');
                
            }, 
            error:function({status, responseJSON})
            {
                console.log(responseJSON);
            }
        });
    });
</script>