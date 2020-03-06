<style>
    .cart-left {
        height: fit-content;
        padding: 0px !important;
    }

    .cart-left table thead tr th {
        padding: 4px !important;
        color: black;
        font-size: 14px;
        border-top: #000;
    }

    .cartBody {
        color: #525252;
    }

    .cartRight .rounded-pill {
        color: #dc3545;
        text-align: center;
        border: 1px solid #dc3545;
    }

    .cartRight .title {
        font-size: 16px;
    }

    .cartRight .amount {
        color: #525252;
    }

    .cart-table td,
    .cart-left table thead tr th {
        padding-right: 30px !important;
    }

    .catcher {
        font-size: 20px;
        color: #dc3545;
    }

    .cart-price{
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }
  
    .rentable{
        width: fit-content;
        font-size: 13px;
        /* border-bottom: 2px solid #ffc107; */
        text-transform:capitalize;
        color: #929292;
    }

    .purchaseable{
        width: fit-content;
        font-size: 13px;
        /* border-bottom: 2px solid #76c043; */
        text-transform:capitalize;
        color: #929292;
    }

    .bg-dark{
        background: black;
    }

    .bg-dark div{
        color: white;
    }

    .cart-info{
        transform: rotate(180deg);
        width: 25px !important;
    }
    .cart-info:hover{
        color: #007bff;
        cursor: pointer;
    }

</style>
<div class="hr"></div>
<div class="section-product radial-th-gradient">
    <!-- End -->
    <div class="container cs-container-wrapper " style="padding:0px 9rem">
        <div class="pb-5" rel="js--cart-container">
            @if($cart['items'])
            <div class="container cartContainer">
                <div class="row">
                    <div class="col-lg-12 bg-white rounded shadow-sm mb-5 cart-left" style="padding-bottom: 30px !important">
                        <div class="table-responsive">
                            <table class="table cart-table">
                                <thead>
                                    <tr>
                                        <th scope="col" class=" bg-dark">
                                            <div class="p-2 px-3 text-uppercase">Product</div>
                                        </th>
                                        <th scope="col" class=" bg-dark text-right">
                                            <div class="py-2 text-uppercase">Price</div>
                                        </th>
                                        <th scope="col" class=" bg-dark text-right">
                                            <div class="py-2 text-uppercase">Quantity</div>
                                        </th>
                                        <th scope="col" class=" bg-dark text-right">
                                            <div class="py-2 text-uppercase">Total</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="cartBody">
                                    @foreach($cart['items'] as $item)
                                        <tr style="border-bottom: 1px solid #e8e8e8">
                                            <td class="text-capitalize" style="padding-left:30px">
                                                <div class="d-flex">
                                                    <div style="height: 100px; width: 100px; margin-right: 20px">
                                                        @if($item['inventory']['cart_product']['thumb'])
                                                        <img src="admin/products/image/{{$item['inventory']['cart_product']['thumb']}}" style="height:100%; width: 100%">
                                                        @else
                                                        <img src="images/noimage.png" style="height:100%; width: 100%">
                                                        @endif
                                                    </div>
                                                    <span class="d-flex flex-column">
                                                        <strong>{{$item['inventory']['cart_product']['name']}}</strong>                                                       
                                                        <div style="margin-top:5px; font-size:13px">
                                                            <a href="#" class="remove--cart-item text-danger" data-inv-id="{{$item['inventory']['id']}}" data-rent-days="1"><i class="fa fa-trash"></i>&nbsp;Remove</a>
                                                        </div>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="cart-price">
                                                    ${{number_format($item['inventory']['price'], 2, '.', '')}}
                                                    @if($item['inventory']['cart_product']['sales'] == "rent")
                                                        <div class="rentable">Rental</div>
                                                    @else
                                                        <div class="purchaseable">Purchase</div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="text-right">                                                
                                                <div class="cs-input-group d-flex justify-content-end">
                                                    <input type="button" value="-" class="cs-button-minus" data-field="quantity">
                                                    <input type="text" step="1" max="" value="{{$item['quantity']}}" name="quantity" readonly class="cs-p-qty flex-qty update--cart" style="border: 1px solid whitesmoke;" data-inv-id="{{$item['inventory']['id']}}">
                                                    <input type="button" value="+" class="cs-button-plus" data-field="quantity">
                                                </div>
                                            </td>
                                            <td class="text-right">${{number_format($item['inventory']['price'] * $item['quantity'], 2, '.', '')}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row col-lg-4 px-3 bg-white rounded cartRight" style="float:right">
                            <div class="col-lg-12" style="padding:0px;">
                                {{-- <div class="rounded-pill px-3 py-2 text-uppercase font-size-20px font-weight-bold title" style="margin-top:5px">Cart</div> --}}
                                <div>
                                    <ul class="list-unstyled mb-4">
                                        <li class="d-flex justify-content-between py-3 border-bottom">
                                            <strong class="text-black" title="Only applied to rentable items">Rental Days </strong>
                                            <div class="cs-input-group d-flex">
                                                <input type="button" value="-" class="cs-button-minus" data-field="days">
                                                <input type="text" step="1" max="" value="1" name="days" readonly="" class="cs-p-qty flex-qty" style="border: 1px solid #f5f5f5" id="rent--days">
                                                <input type="button" value="+" class="cs-button-plus" data-field="days">
                                            </div>
                                        </li>
                                        {{-- <li class="d-flex justify-content-between py-3 border-bottom">
                                                <strong class="text-black">Subtotal </strong>
                                                <strong class="amount">$390.00</strong>
                                            </li>
                                            <li class="d-flex justify-content-between py-3 border-bottom">
                                                <strong class="text-black">Tax</strong>
                                                <strong class="amount">$0.00</strong>
                                            </li> --}}
                                        <li class="d-flex justify-content-between py-3 border-bottom">
                                            <strong class="text-black catcher">Total</strong>
                                            <h5 class="font-weight-bold catcher" id="js--cart-list-total">${{number_format($cart['total'], 2, '.', '')}}</h5>
                                        </li>
                                    </ul>

                                    <div class="order_now text-center" id="checkout--btn" data-route="crates/checkout_from_cart?rentedDays=1">
                                        <div class="global-btn global-btn__yellow">
                                            <p>Checkout</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="crates_container text-center" style="background:white; padding: 100px">
                <h2 class="title">There are no items in this cart</h2>
                <div class="global-btn global-btn__yellow section-product__btn_order m-t-30 load_pages" data-route="/cratesonskates/products" data-slug="page-products">
                    <p>Continue Shopping</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>