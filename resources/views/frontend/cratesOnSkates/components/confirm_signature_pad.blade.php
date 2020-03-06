<style>

    .p_title{
        font-size: 15px;
    }
    .modal-600{
        max-width: 600px;
    }
    .order_modal_footer{
        display: inline-block; 
        background: #eee;
    }
    @media only screen and (max-width: 358px) {
        .order_modal_footer{
            display: flex;
            flex-direction: column;
        }
        .clear_cancel_btn{
            width: 100%;
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .btnMark{
            width: 100%;
        }
    }
</style>
<div class="modal-dialog addProductModalDialog modal-md modal-600" role="document">
    <div class="modal-content addProductModal">
        <div class="modal-header" style="background: #76c043;">
            <h5 class="modal-title" id="exampleModalLabel"><p class="order-title text-white m-b-0">Order  {{$order->order_no}} </p> </h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="color: #fff !important;">
                <i class="icon fa fa-close"></i>
            </button>
        </div>
        <div class="modal-body no-pd" style="">
            <div class="row mt-3 cs-pdb-20">
                <div class="col-md-8">
                    <label class="checkout-label" for="name">Delivery By</label>
                    <input class="form-control text-capitalize signature_by" value="{{$order->client->fname}} {{$order->client->lname}}" name="signature_by">
                    <div class="errorMessage"></div>
                </div>
            </div>
            <div class="signatature_pad" style="padding: 15px; width: 100%;">
                <label class="checkout-label" for="name">Signature Pad</label>
                <div style="border:1px solid #ccc;">
                    <canvas id="signature-pad" class="signature-pad" width=500 height=200 ></canvas>
                </div>
            </div>  
        </div>
        <div class="modal-footer order_modal_footer">
                <div class="clear_cancel_btn">
                    <button type="button" class="btn btn-light btn-pill float-left" style="border-radius: 5px;" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-light btn-pill float-left" style="border-radius: 5px;" id="clear">Clear</button>
                </div>
                <button type="button" class="btn btn-success btn-pill btn-elevate float-right btnMark" style="border-radius: 5px;" id="mark_as_pickup">
                    @if($statusRequest == "pickedup")
                    <span>
                        Mark as Pickup
                    </span>
                    @else
                        <span>
                            Mark as Deliver
                        </span>
                    @endif
                </button>
        </div>
    </div>
</div>

<script>
        $(document).off('click','#mark_as_pickup').on('click','#mark_as_pickup',function(e){
            e.preventDefault();
            if(!signaturePad.isEmpty()){
                let data  = $('#updateCalendarOrderForm').serializeArray();
                data.push({name: 'signature', value: signaturePad.toDataURL()});
                data.push({name: 'signature_by', value: $('.signature_by').val()});
                cratesAjax({
                    url: '/calendar/mark_order',
                    data : data,
                    method: 'post'
                }, resp => {
                    $('#cModal').modal('hide');
                    $('#cModal2').modal('hide');
                    toastr.success('Order marked as {{$statusRequest}} successfully');
                    $('#page-section').html(resp);
                }, ({responseJSON : {message}}) => {
                    toastr.error(message);
                });
            }
            else{
                toastr.error('Please sign on the given place to proceed.');
            }
        });

 var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
        });
        
        // var saveButton = document.getElementById('save');
        
        // saveButton.addEventListener('click', function (event) {
        //     var data = signaturePad.toDataURL('image/png');
            
        //     // Send data to server instead...
        //     window.open(data);
        // });
        
        var cancelButton = document.getElementById('clear');
        cancelButton.addEventListener('click', function (event) {
            signaturePad.clear();
            });


       
</script>