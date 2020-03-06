<div class="modal-dialog" role="document" style="width: 600px;">
    <div class="modal-content">
        <form id="performa_invoice_form">
        <input type="hidden" name="quote_id" value="{{$quote->id}}" >
            <div class="modal-body" style="background: #fff;">
                <p style="font-size: 19px;">Are you sure you want to Generate Performa Invoice?</p>
                <p class="text-danger">This action will generate a new Performa Invoice !</p>
            </div>
        </form>

        <!-- Modal Footer -->
        <div class="modal-footer" style="display: inline-block; background: #eee;">
            <button type="button" class="btn btn-light btn-pill float-left" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger btn-pill btn-elevate float-right" id="generate_performa_invoice">
                <span>
                    Generate
                </span>
            </button>
        </div>
    </div>
</div>

<script>
    $(document).off('click','#generate_performa_invoice').on('click','#generate_performa_invoice',function(e){
        e.preventDefault();
        let data = $('#performa_invoice_form').serializeArray();
        supportAjax({
            url:'/admin/quotes/makePerformaInvoice',
            method:'Post',
            data
        }, function(resp){
            $('#cModal1').modal('hide');
            $('#convert_to_boking').attr('data-check-inv', 1);
            toastr.success('<strong>'+resp.message+'</strong>');
            $('#porformaInvoicedataTable').KTDatatable().reload();
        },
        function(err){
            console.log(err);
        })
    });
</script>