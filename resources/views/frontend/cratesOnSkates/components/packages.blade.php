@if(count($data)>0)
        @foreach($data as  $key => $package)
        <div class="package-product-container mb-5">
            <div class="package-product">
              <span class="price-ribbon">
                <span class="package-price-ribbon" id="backPrice{{$package->id}}" data-id="{{$package->id}}" data-price="{{$package->price}}">{{priceFormat($package->price)}}</span></span>
                  <div class="product-inner-container">
                        <div style="flex-basis: 35%" class="image-content">
                            @if(isset($package->thumb->file_name))
                                <img src="admin/package/thumb/{{$package->thumb->file_name}}" alt="" class="package-image" style="height:100%">
                            @else 
                                <img src="/images/1 bedroom.png" alt="" class="package-image" style="height:100%">
                            @endif
                        </div>
                        <div class="sec-resi__package-desc-container" style="flex-basis: 65%">
                            <h4 class="sec-resi__heading">{{$package->package_name}}</h4>
                            {{-- @if($package->package_type_id === 1) 
                                <p class="sec-resi__sub-heading" id="subHeading{{$package->id}}">250-500 SQ FT</p>
                            @endif --}}

                            <ul class="sec-resi__package-features" id="packageFeatures{{$package->id}}" >
                                @if(count($package->packageItems)>0)
                                    @foreach($package->packageItems as $product)
                                        <li>{{$product->quantity}} {{$product->inventory->product->name}}</li>
                                    @endforeach
                                @else
                                    <li>No Product Added</li>
                                @endif
                            </ul>
                            <div class="package-continue-button showRate" id="continueButton{{$package->id}}" data-id="{{$package->id}}" >
                                <p class="text-continue">Continue</p>
                            </div>

                            <div class="sec-resi__package-detail" id="packageDetail{{$package->id}}" style="display: none;">
                                <table>
                                    <tbody>
                                        <tr>
                                            <th style="width: 25%;">1 WK</th>
                                            <th style="width: 25%;">2 WK</th>
                                            <th style="width: 25%;">3 WK</th>
                                            <th style="width: 25%;">4 WK</th>
                                        </tr>
                                        <tr>
                                            <td><strike></strike><br><span>{{priceFormat($package->priceCalculator(1))}}</span></td>

                                            <td>
                                                <strike class="old-price">{{priceFormat($package->price * 2)}}</strike><br>
                                                <span>{{priceFormat($package->priceCalculator(2))}}</span><br>
                                            </td>
                                            <td>
                                                <strike class="old-price">{{priceFormat($package->price * 3)}}</strike><br>
                                                <span>{{priceFormat($package->priceCalculator(3))}}</span><br>
                                            </td>
                                            <td>
                                                <strike class="old-price">{{priceFormat($package->price * 4)}}</strike><br>
                                                <span>{{priceFormat($package->priceCalculator(4))}}</span><br>
                                            </td>
                                        </tr>
                                        <tr style="height: 0">
                                            <td></td><td class="" colspan="3"><span class="notice">Pricings are 50% off of the first week!</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="select-button order_now selected" id="" data-route="crates/select-package/{{$package->id}}/1" data-id="{{$package->id}}" >
                                                    <p class="text-continue">select</p>
                                                </div>
                                            </td>
                                            <td>
                                               <div class="select-button order_now" id="" data-route="crates/select-package/{{$package->id}}/2" data-id="{{$package->id}}" >
                                                    <p class="text-continue">select</p>
                                                </div>
                                            </td>
                                            <td>
                                               <div class="select-button order_now" id="" data-route="crates/select-package/{{$package->id}}/3"data-id="{{$package->id}}" >
                                                    <p class="text-continue">select</p>
                                                </div>
                                            </td>
                                            <td>
                                               <div class="select-button order_now" id="" data-route="crates/select-package/{{$package->id}}/4" data-id="1" >
                                                    <p class="text-continue">select</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                  </div>
            </div>
        </div>
        @endforeach
    @else 
        <p>No package available!</p>
    @endif
    