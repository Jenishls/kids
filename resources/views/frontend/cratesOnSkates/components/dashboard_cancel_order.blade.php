<div id="cancel-order-collapse" class="card  db-no-pd db-ff min-height-200" >
    <div id="db-cancel-order" >
        <div class="card-body">
            <h4 class="text-light-green f-w-600">Cancel Orders</h4>

            <div class="pd-t-15">
                @if(count($cancelledOrders)>0)
                    @foreach ($cancelledOrders as $cancelOrder)
                        @foreach ($cancelOrder->items as $cancelItem)
                            <div class="row db-box-shadow pd-15 m-b-20 br-4 db-bg-white ">
                                <div class="col-6 db-no-pd">
                                    <div class="db-display-flex db-ff-poppins">
                                        <div class="db-width-135 db-height-150">
                                        <img src="{{asset('cratesOnSkatesImages/products/2/1.jpg')}}" class="db-width-full db-height-full" alt="">
                                        </div>
                                        <div class="text-capitalize pd-l-10">
                                            <p class="f-w-600 db-color-orange db-mr-bottom-10">{{$cancelItem->inventory->product->name}}</p>
                                            <span class="db-display-flex">
                                                <p class="db-color-black db-mr-bottom-10 ">sold by: <p class="f-w-600 db-color-orange db-pd-l-5 db-mr-bottom-10">crates on skates</p></p>
                                            </span>
                                            
                                            <span class="db-display-flex">
                                                <p class="db-color-black db-mr-bottom-10 db-display-flex">qty: <p class="f-w-600 db-color-orange db-pd-l-5 db-mr-bottom-5">{{$cancelItem->quantity}}</p></p>
                                            </span>
                                            <p class="db-pd-2-10 db-p-price-bg db-color-black db-mr-bottom-5 db-width-60 db-pd-5-10 br-4">${{$cancelItem->amount * $cancelItem->quantity}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 align-left text-capitalize">
                                    <div class=" pd-l-r-30">
                                        <p class="db-color-black f-w-600 pd-2 db-ff-poppins no-m">reasons for cancellation: 
                                            <p class="f-w-500  db-pd-l-5 db-mr-bottom-10 db-pd-3-7 db-color-black db-ff-poppins">mistakely chosen this product.</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach

                    @else
                    <h4>No order available.</h4>
                @endif
            </div>
        </div>
    </div>
</div>