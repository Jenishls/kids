<style type="text/css">

input[type="button"] {
  -webkit-appearance: button;
  cursor: pointer;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
}
</style>
<div>
  <div>
      <div class="row pd-t-30">
          <div class="col-md-12 col-lg-12 col-sm-12 no-pd-left">
            <div class="ord-sum-heading">
              <h3 class="cs-title-h3"> Recommendations</h3><br>
            </div>
            <div style="background: #fff">
              @if(count($recommanded)>0)
                @foreach($recommanded as $product)
                  @continue(!$product->getInventory())
                  <div class="d-flex cs-product-container" data-id="1">
                    <div class="cs-60">
                      <div class="cs-product-tumb"> 
                        @if(isset($product->thumb->file_name))
                          <img src="admin/products/image/{{$product->thumb->file_name}}" class="cs-p-image" />
                        @else 
                          <img src="{{asset("images/noimage.png")}}" class="cs-p-image">
                        @endif
                      </div>
                      <div>
                        <p class="cs-item-title cs-p-title">{{$product->name}}</p>
                        <p class="cs-item-amount cs-p-amount m-b-5-i" data-amount="{{$product->getInventory()->price}}">{{priceFormat($product->getInventory()->price)}}</p>
                        @if($product->is_rental)
                          <div class="cart-rentable">Rental</div>
                        @else
                            <div class="cart-purchaseable">Purchase</div>
                        @endif
                        <span class="cs-item-added-msg"></span>
                      </div>
                    </div>
                    <div class="cs-40 js--extra-product-container">
                        <div>
                          <p class="qty-title">Quantity</p>
                          <div class="cs-input-group">
                            <input type="hidden" name="extra_products" value="{{$product->id}}">
                            <input type="hidden" value="1" name="extra_addon">
                            <input type="button" value="-" class="cs-button-minus" data-field="extra_product_quantity">
                            <input type="text" step="1" max="" value="1" name="extra_product_quantity" readonly class="quantity-field cs-p-qty">
                            <input type="button" value="+" class="cs-button-plus" data-field="extra_product_quantity">
                          </div>
                        </div>
                        <div class="global-btn global-btn__yellow cs-add-qty csBtnAdd customStyle" data-id="{{$product->id}}" style="margin-left: 20px;" 
                        data-field="quantity">
                          <p>Add</p>
                        </div>
                    </div>
                  </div>
                @endforeach
              @else
              <p class="pd-20">No Recommendated Items</p>
              @endif

            </div>

            <div class="ord-sum-heading cs-mt-20">
              <h3 class="cs-title-h3"> Additional Items</h3>
            </div>
            <div class="cs-bg-white">

              @if(count($additional)>0)
                @foreach($additional as $product)
                  @continue(!$product->getInventory())
                  <div class="d-flex cs-product-container" data-id="2">
                    <div class="cs-60">
                      <div class="cs-product-tumb">
                        @if(isset($product->thumb->file_name))
                          <img src="admin/products/image/{{$product->thumb->file_name}}" class="cs-p-image" />
                        @else 
                          <img src="{{asset("images/noimage.png")}}" class="cs-p-image">
                        @endif
                      </div>
                      <div>
                        <p class="cs-item-title cs-p-title">{{$product->name}}</p>
                        <p class="cs-item-amount cs-p-amount m-b-5-i" data-amount="{{$product->getInventory()->price}}">{{priceFormat($product->getInventory()->price)}}</p>
                        @if($product->is_rental)
                          <div class="cart-rentable">Rental</div>
                        @else
                          <div class="cart-purchaseable">Purchase</div>
                        @endif
                        <span class="cs-item-added-msg"></span>
                      </div>
                    </div>
                    <div class="cs-40 js--extra-product-container">
                        <div>
                          <input type="hidden" name="extra_products" value="{{$product->id}}">
                          <p class="qty-title">Quantity</p>
                          <div class="cs-input-group">
                            <input type="hidden" value="2" name="extra_addon">
                            <input type="button" value="-" class="cs-button-minus" data-field="extra_product_quantity">
                            <input type="text" step="1" max="" value="1" name="extra_product_quantity" readonly class="quantity-field cs-p-qty">
                            <input type="button" value="+" class="cs-button-plus" data-field="extra_product_quantity">
                          </div>
                        </div>
                        <div class="global-btn global-btn__yellow cs-add-qty csBtnAdd customStyle" data-id="{{$product->id}}" style="margin-left: 20px;" 
                        data-field="quantity">
                          <p>Add</p>
                        </div>
                    </div>
                  </div>
                @endforeach
              @else
              <p class="pd-20">No Additional Items</p>
              @endif
            </div>
              <div class="cs-btn-step-container">
                  <div class="global-btn global-btn__yellow btnStep" data-step="2">
                    <p>Continue</p>
                  </div>
              </div>
          </div>
      </div>
  </div>

</div>