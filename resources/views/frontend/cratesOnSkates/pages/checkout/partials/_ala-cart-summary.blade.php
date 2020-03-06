<style type="text/css">
    p.extras{
        font-size: 13px;
        font-weight: 500;
        color: #000;
        padding: 0;
        margin-bottom: 10px;
    }
    .extra-delivery,
    .extra-pickup{
        color: #b12704;
        font-size: 14px;
        font-weight: 600;
    }

   

</style>
<div class="col-md-4 no-pd-right order-summary" id="js--order-summary">
    <div class="d-flex flex-column op-summary-col m-t-30">
        <h3 class="ord-sum-heading">Order Summary</h3>
        <div class="d-flex flex-column flex-grow-1">
            <div class="or-p l-parent">
                <div class="or-p__item l-child">                   
                    <div class="or-p__item--details" style="margin-left:0">                        
                        <label for="">Plan</label>                        
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
            <div class="or-p parent-cart-items m-t-20">
                <p class="cs-package-title">Cart Items</p>
                <div class="summary-items">
                    @foreach($cartItems['items'] as $item)
                        @php
                            $inv = $item['inventory'];
                            $cartProduct = $inv['cart_product']  
                        @endphp

                        <div class="or-p__item l-child" id="{{$cartProduct['id']}}">
                            <div class="or-p__item--img">
                                @if($cartProduct['thumb'])
                                    <img src="admin/products/image/{{$cartProduct['thumb']}}" alt="{{$cartProduct['name']}}">
                                @else
                                    <img src="images/noimage.png" alt="{{$cartProduct['name']}}">
                                @endif
                            </div>
                            <div class="or-p__item--details">
                                @if($cartProduct['is_rental'])
                                    <div class="cart-rentable">Rental</div>
                                @else
                                    <div class="cart-purchaseable">Purchase</div>
                                @endif
                                <h5>
                                    {{ucfirst($cartProduct['name'])}}
                                    <p class="no-m-bottom price price lh-20">
                                        @if($cartProduct['is_rental'])
                                            ${{number_format($inv['price'] * (request()->rentedDays ?: 1), 2, '.', '')}}
                                            <span style="color: #545454; font-size:11px;font-weight: 300;text-transform:lowercase">&nbsp;
                                            {{preg_replace('/\.00$/', '',$inv['price'])}} x {{request()->rentedDays}} days</span>
                                        @else
                                        ${{number_format($inv['price'], 2, '.', '')}}
                                        @endif
                                    </p>
                                    <input type="hidden" name="product[]" value="{{$cartProduct['id']}}">
                                    <input type="hidden" name="addon[]" value="0">
                                </h5>                                
                                <label for="Qty" style="font-size:11px">Quantity</label>
                                <div class="cs-input-group">
                                    <input type="button" value="-" class="cs-button-minus-u" data-field="quantity[]">
                                    <input type="text" step="1" readonly="" value="{{$item['quantity']}}" name="quantity[]" class="quantity-field cs-qty update--cart" style="border-color: rgb(255, 255, 255);" data-inv-id="{{$inv['id']}}" data-cart="true">
                                    <input type="button" value="+" class="cs-button-plus-u" data-field="quantity[]">
                                </div>
                                <a href="javascript:void(0);" class="m-t-10 csBtnRemove" data-cart="true" data-inv-id="{{$inv['id']}}" style="color: #b12704; text-decoration: underline; display: inline-block">Remove</a>
                            </div>
                        </div>
                    @endforeach
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
                            <div></div>
                        </div>
                    </div>
                </div>
            @else
                <div class="or-p parent-extras dp-none" rel="js--item-extras">
                    <p class="cs-package-title">Extras</p>
                    <div style="padding: 8px 15px;">
                        
                    </div>
                </div>
            @endif
            <div>
                <div class="pd-20 coupon--grouper">
                    <div class="flex-between">
                        <div>
                            <input type="text" name="coupon_code" placeholder="Coupon" class="form-control">
                        </div>
                        <div class="global-btn global-btn__yellow cs-add-qty  m-l-5" id="js--apply-coupon" data-is-ala-carte="true">
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
                            <td style=""><p class="cs-sub-total-title cs-fw-600">Sub Total</p></td>
                            <th><p class="cs-sub-total-title cs-color-amount js--subtotal">${{number_format($cartTotal,2,'.', '')}}</p></th>
                        </tr>
                        <tr class="js--coupon-total" style="display:none">
                            <td><p class="cs-sub-total-title cp--label">Coupon</p></td>
                            <th><p class="cs-sub-total-title cs-color-amount cp--amt">$0.00</p></th>
                        </tr>
                        <tr>
                            <td><p class="cs-sub-total-title">Discount</p></td>
                            <th><p class="cs-sub-total-title cs-color-amount">$0.00</p></th>
                        </tr>
                        <tr>
                            @php $taxAmount = default_company('sales_tax', 0)/100 * $zip_charges_excluded_price; @endphp
                            <td><p class="cs-sub-total-title">Tax <small>({{default_company('sales_tax', 0)}}%)</small></p></td>
                            <th><p class="cs-sub-total-title cs-color-amount tax--amt">${{number_format($taxAmount, 2, '.', '')}}</p></th>
                        </tr>
                        <tr>
                            <td><p class="cs-sub-total-title cs-fw-800">Total</p></td>
                            <th><p class="cs-sub-total-title cs-first-sub-total cs-final-price js--total">${{number_format($cartTotal + $taxAmount,2,'.', '')}}</p></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>