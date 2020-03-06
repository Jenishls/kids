<div class="col-md-6">
    <div class="kt-portlet">
        <div class="kt-portlet__head" style="min-height: 45px;">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="flaticon-interface-10"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Delivery Signature
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit" style="padding: 15px;">
            <div class="kt-invoice-2">	
                <div class="kt-invoice__body">
                    <div class="kt-invoice__container">
                        <div> 
                            @if($order->deliverySignature)
                                <img src="{{$order->deliverySignature->signature}}" alt="" style="width: 100%; height: 200px;">
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            {{ $order->deliverySignature->signature_by}} | {{format_to_us_date($order->deliverySignature->created_at)}} {{format_to_time($order->deliverySignature->created_at)}} | {{$order->deliverySignature->ip}} | {{$order->deliverySignature->device?:$order->deliverySignature->operating_system}} | {{$order->deliverySignature->browser}}
                                        </span>
                                    </div>
                                </div>
                            @else
                            <div class="col-md-12">
                                No Signature Available
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="kt-portlet">
        <div class="kt-portlet__head" style="min-height: 45px;">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="flaticon-interface-10"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Pickup Signature
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body kt-portlet__body--fit" style="padding: 15px;">
                    <div class="kt-invoice-2">	
                        <div class="kt-invoice__body">
                            <div class="kt-invoice__container">
                        <div >

                            @if($order->pickupSignature)
                                <img src="{{$order->pickupSignature->signature}}" alt="" style="width: 100%; height: 200px;">
                               <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            {{$order->pickupSignature->signature_by}} | 
                                            {{format_to_us_date($order->pickupSignature->created_at)}} {{format_to_time($order->pickupSignature->created_at)}} | {{$order->pickupSignature->ip}} | {{$order->pickupSignature->device?:$order->pickupSignature->operating_system}} | {{$order->pickupSignature->browser}}
                                        </span>
                                    </div>
                                </div>
                            @else
                            <div class="col-md-12">
                                No Signature Available
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>