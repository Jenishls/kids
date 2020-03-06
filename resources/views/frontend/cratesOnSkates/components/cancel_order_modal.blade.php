<div class="modal-dialog modal-transform  mxw-full-i cancel--order-modal" role="document" id="cancel--order--modal">
    <div class="modal-content m-t-200">
        <div class="modal-header global-btn__orange">
            <h4 class="modal-title text-center text-white" id="">do you really want to cancel this item?</h4>
            <div>
            <a class="close text-white" data-dismiss="modal" aria-label="Close"><i class="fa fa-times "></i>
            </a>
            </div>
        </div>
        <div class="modal-body db-bg-modal-grey pd-20">
            <div class=" db-display-flex justify-center">
                <div class="text-right w-200">
                    <h5 class="f-w-600">Order Number:</h5>
                    <h5 class="f-w-600">Order Items:</h5>
                </div>
                <div class="pd-l-10 w-200">
                <h5 class="text-uppercase f-w-500">#cs-{{$order->order_no}}</h5>
                    @if(isset($order->items))
                        <ul class="inventory_ul text-capitalize pd-l-20">
                            @foreach($order->items as $item)
                                <li style="display: list-item;">
                                    <h5 class="text-capitalize f-w-500 db-color-orange">{{$item->inventory->product->name}}</h5>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div style="clear: both;"></div>
            <div class="db-display-flex justify-center">
                <div class="text-right">
                    <h5 class="f-w-600">Reason for cancellation:</h5>
                </div>
                <div class="pd-l-10 ">
                    <form action="#" id="cancellationReason">
                        	
                        <textarea class="form-control text_area_form cancelTextArea" rows="1"></textarea>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer pd-10 display-flex justify-space-between">
            <button type="button" class="global-btn global-btn__default no-m-left global-cancel-btn" data-dismiss="modal">
                <p>No</p>
            </button>
            <button type="button" class="global-btn global-btn__orange global-add-btn" id="cancel--order--items"  data-route="dashboard/cancelorderitem/{{$order->id}}">
                <p>yes</p>
            </button>
        </div>
    </div>
</div>