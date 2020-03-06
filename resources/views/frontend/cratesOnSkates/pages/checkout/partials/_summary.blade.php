<style type="text/css">
    p.extras {
        font-size: 13px;
        font-weight: 500;
        color: #000;
        padding: 0;
        margin-bottom: 10px;
    }

    .extra-delivery,
    .extra-pickup {
        color: #b12704;
        font-size: 14px;
        font-weight: 600;
    }
    .sec-resi__package-features_ord_sm li{
        color:black;
        font-size:11px;
    }
</style>
<div class="col-md-4 no-pd-right order-summary" id="js--order-summary">
    <div class="d-flex flex-column op-summary-col m-t-30">
        <h3 class="ord-sum-heading">Order Summary</h3>
        <div class="d-flex flex-column flex-grow-1">
            <div class="or-p l-parent">
                <p class="cs-package-title">Main Package</p>
                <div class="or-p__item l-child">
                    <div class="or-p__item--img">
                        @if(isset($package->thumb->file_name))
                        <img src="admin/package/thumb/{{$package->thumb->file_name}}" alt="" class="package-image">
                        @else
                        <img src="/images/1 bedroom.png" alt="" class="package-image">
                        @endif
                    </div>
                    <div class="or-p__item--details">
                        <h5>
                            {{ucwords($package->package_name)}}
                            <p style="margin:0px;">
                                <ul class="sec-resi__package-features_ord_sm" id="packageFeatures{{$package->id}}">
                                    @if(count($package->packageItems)>0)
                                    @foreach($package->packageItems as $product)
                                    <li>- {{$product->quantity}} {{$product->inventory->product->name}}</li>
                                    @endforeach
                                    @else
                                    <li>- No Product Added</li>
                                    @endif
                                </ul>
                            </p>
                            <p class="no-m-bottom price js--package-price">${{number_format($package->priceCalculator($week),2,'.', '')}}</p>
                            <input type="hidden" value="{{$package->id}}" name="package_id">
                        </h5>
                        <label for="">Update Plan</label>
  
                        <input type="text" value="8 days" class="js--update-rent-days form-control" style="width:70%" onkeyup="return false" onkeypress="return false">

                        <input type="hidden" name="selected_delivery_date">
                        <input type="hidden" name="selected_pickup_date">
                    </div>
                </div>
            </div>
            <div class="or-p parent-recommended">
                <p class="cs-package-title">Delivery - Pickup Date</p>
                <div class="pd-l-15">
                    <span class="js--del--date" style="color:#313131"></span>&nbsp;-&nbsp;
                    <span class="js--pickup--date" style="color:#313131"></span>
                </div>
            </div>
  
            <div class="or-p parent-recommended">
                <p class="cs-package-title">Recommended items</p>
                <div class="summary-items">
                    <p class="no-item-recommanded summary-items" style="margin: 0 15px">No Items Added</p>
                </div>
            </div>
            <div class="or-p parent-additional">
                <p class="cs-package-title">Additional items</p>
                <div class="summary-items">
                    <p class="no-item-additional" style="margin: 0 15px">No Items Added</p>
                </div>
            </div>

@if($movingFrom->price || $movingTo->price)
    <div class="or-p parent-extras">
        <p class="cs-package-title">Extras</p>
        <div style="padding: 8px 15px;">
            <div>
                @if($movingFrom->price)
                    <p class="extras">
                        <input type="hidden" name="zip_delivery_charge" value="{{$movingFrom->id}}">
                        <span>Standard Delivery Charge</span> - <span class="pull-right" style="font-weight:600; color: #b12704; font-size:14px">${{number_format($movingFrom->price, 2, '.', '')}}</span>
                    </p>
                @endif
                @if($movingTo->price)
                    <input type="hidden" name="zip_pickup_charge" value="{{$movingTo->id}}">
                    <p class="extras"><span>Standard Pickup Charge</span> - <span class="pull-right" style="font-weight:600; color: #b12704; font-size:14px">${{number_format($movingTo->price, 2, '.', '')}}</span></p>
                @endif
            </div>
            <div class="dp-none" rel="js--item-extras">
                <div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="or-p parent-extras dp-none" rel="js--item-extras">
        <p class="cs-package-title">Extras</p>
        <div style="padding: 8px 15px;" >

        </div>
    </div>
@endif
<div>
    <div class="pd-20 coupon--grouper">
        <div class="flex-between">
            <div>
                <input type="text" name="coupon_code" placeholder="Coupon" class="form-control">
            </div>
            <div class="global-btn global-btn__yellow cs-add-qty  m-l-5" id="js--apply-coupon">
                <p class="fs-13 pd-15-x-i">Apply</p>
            </div>
        </div>
        <span class="cp-error-msg">Not valid</span>
        <div class="hide-me m-t-15" style="width:100%">
            <div class="pd-10 d-flex align-items-between valid-coupon-box">
            </div>
        </div>
    </div>
</div>
<div class="d-flex align-items-center flex-grow-1 bg-f9" style="padding: 25px 0;">
    <table class="ml-auto" style="margin-right: 45px;">
        <tbody class="cs-sub-total">
            <tr>
                <td style="">
                    <p class="cs-sub-total-title cs-fw-600">Sub Total</p>
                </td>
                <th>
                    <p class="cs-sub-total-title cs-color-amount js--subtotal">${{number_format($package->priceCalculator($week) + $cartTotal + $movingFrom->price + $movingTo->price ,2,'.', '')}}</p>
                </th>
            </tr>
            <tr class="js--coupon-total" style="display:none">
                <td>
                    <p class="cs-sub-total-title cp--label">Coupon</p>
                </td>
                <th>
                    <p class="cs-sub-total-title cs-color-amount cp--amt">$0.00</p>
                </th>
            </tr>
            <tr>
                <td>
                    <p class="cs-sub-total-title">Discount</p>
                </td>
                <th>
                    <p class="cs-sub-total-title cs-color-amount">$0.00</p>
                </th>
            </tr>
            <tr>
                <td>
                    <p class="cs-sub-total-title">Tax <small>({{default_company('sales_tax', 0)}}%)</small></p>
                </td>
                <th>
                    @php $taxAmount = default_company('sales_tax', 0)/100 * ($package->priceCalculator($week)+ $cartTotal); @endphp
                    <p class="cs-sub-total-title cs-color-amount tax--amt">${{number_format($taxAmount, 2, '.', '')}}</p>
                </th>
            </tr>
            <tr>
                <td>
                    <p class="cs-sub-total-title cs-fw-800">Total</p>
                </td>
                <th>
                    <p class="cs-sub-total-title cs-first-sub-total cs-final-price js--total">${{number_format($package->priceCalculator($week)+ $cartTotal + $movingFrom->price + $movingTo->price + $taxAmount,2,'.', '')}}</p>
                </th>
            </tr>
        </tbody>
    </table>
</div>
</div>
</div>
</div>