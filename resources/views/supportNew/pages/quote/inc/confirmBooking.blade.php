<div class="modal-dialog" role="document" style="width: 600px;">
    <div class="modal-content">
        <form id="update_status">
            <div class="modal-body" style="background: #fff;">
                <p style="font-size: 19px;">Are you sure you want to confirm the order of selected quotation?</p>
                <p class="text-danger">This action will make a new order of selecetd quotation !</p>
            </div>
        </form>

        <!-- Modal Footer -->
        <div class="modal-footer" style="display: inline-block; background: #eee;">
            <button type="button" class="btn btn-light btn-pill float-left" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger btn-pill btn-elevate float-right" id="confirm_order">
                <span>
                    Order
                </span>
            </button>
        </div>
    </div>
</div>

<script>
    $(document).off('click','#confirm_order').on('click','#confirm_order',function(e){
        e.preventDefault();
        showModal({
            url:`/admin/quotes/makeOrder/{{$quote->id}}`,
            c: 2
        });
    });
</script>