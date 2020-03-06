<style>
    .type_color{
       color: #707070;
    }
    .info_text_color{
        color: #55bff1
    }
</style>
<div class="modal-dialog" role="document">
    <div class="modal-content modal-400">
        <div class="modal-header">
            <h5 class="modal-title"  id="exampleModalLabel">Card Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:cornsilk;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
           <div class="container p-3">
               <div class="row py-2">
                    <div class="col-md-6">
                        <h6 class="info_text_color"><span class="pr-1 type_color">Payment Type:</span>{{$payment->payment_type}}</h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="info_text_color"><span class="pr-1 type_color">Gateway: </span>{{$payment->gateway}}x</h6>
                    </div>
               </div>
               <div class="row py-2">
                   <div class="col-md-6">
                        <h6 class="info_text_color"><span class="pr-1 type_color">Last four digits:</span>{{$payment->cr_last4}}</h6>
                   </div>
                   <div class="col-md-6">
                        <h6 class="info_text_color"><span class="pr-1 type_color">Card Last Name:</span>{{$payment->card_last_name}}</h6>
                   </div>
               </div>
           </div>
        </div>
    </div>
</div>
