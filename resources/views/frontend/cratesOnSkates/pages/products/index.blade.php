<style>
    .forTag {
        padding: 6px;
        margin-top: 8px;
        width: fit-content;
        color: white;
        background: #76c043;
    }

    .forTag p {
        color: black;
        padding: 0px !important;
        margin: 0px !important;
        font-weight: 500;
    }
</style>
<div class="hr"></div>
<div class="section-product radial-th-gradient">
    <div class="container cs-container-wrapper">
        <div class="row">
            <!-- ***** Product Start ***** -->
            <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 section-content">
                <div class="section-product__title-container">
                    <h2 class="title">rental items pricing below is for week 1 rental.</h2>
                    <p>Subsequent weeks are all <span>50%</span> off the pricing of Week 1 just like Residential and Office packages</p>
                </div>
                <hr class="border-green">
            </div>
            <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12" style="padding-bottom: 100px;">
                <div class="collection-wrapper" data-count="{{count($data)}}">
                    @if(count($data)>0)
                    @foreach($data as $key => $product)
                        @php
                            $price = 0;
                            if($product->inventory){
                                $price = $product->inventory->price;
                            }
                        @endphp 
                        @if($price > 0)

                        <div class="crates_container mt-5">
                            <div class="row main">
                                <div class="col-lg-6 section-product__image_container no-pd-left no-pd-right">
                                    @if(count($product->files))
                                    <div class="main section-product__container" style="height: 100%">
                                        <div class="slider slider-for-{{$key}} product_main_image_panel text_align_center" data-index="{{$key}}">
                                            @foreach($product->files as $slides)
                                            <div>
                                                <img src="data:image/png;base64,{{base64_encode(file_get_contents(storage_path('product/images/'.$slides->file_name)))}}" alt="" class="img-fluid blur-up lazyload">
                                            </div>
                                            @endforeach

                                        </div>

                                        <div class="slider slider-nav-{{$key}} product_sliding_thumb_image">
                                            @foreach($product->files as $slides)
                                            <div>
                                                <img src="data:image/png;base64,{{base64_encode(file_get_contents(storage_path('product/images/'.$slides->file_name)))}}" alt="" class="img-fluid blur-up lazyload">
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    @else
                                    <div>
                                        <img src="{{asset('images/noimage.png')}}" alt="" class="img-fluid blur-up lazyload" style="height: 100%">
                                    </div>
                                    @endif
                                </div>
                                <div class="col-lg-6 rtl-text section-product__product_description js--product-cart">
                                    <div class="section-product__product_desc">

                                        <h2 class="pr_n">{{$product->name}}
                                            @if($product->addon)
                                                @if($product->addon->sales == "rent")
                                                    <div class="forTag">
                                                        <p>For Rental</p>
                                                    </div>
                                                @else
                                                    <div class="forTag">
                                                        <p>For Purchase</p>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="forTag">
                                                    <p>For Purchase</p>
                                                </div>
                                            @endif
                                        </h2>
                                        <h3 class="pr_p">{{$product->inventory ? priceFormat($product->inventory->price) : '0.00'}}</h3>
                                        <div class="section-product__description_list">
                                            <ul class="dashed">
                                                <li>DIMENSIONS: 27″ LONG X 17″ WIDE X 12″ HIGH (2.5 CUBIC FEET)</li>
                                                <li>Made Of 100% Recycled Industrial-Strength Plastic</li>
                                                <li>Stacks And Nests Easilyc</li>
                                                <li>Attached Lids</li>
                                                <li>First Week $2.00 - Additional Weeks $1.00 (50% Off)</li>
                                            </ul>
                                        </div>
                                        <div>
                                            @if($product->inventory)
                                            <form>
                                                <div class="cs-input-group d-flex">
                                                    <input type="button" value="-" class="cs-button-minus" data-field="quantity">
                                                    <input type="text" step="1" max="" value="1" name="quantity" readonly class="cs-p-qty flex-qty">
                                                    <input type="button" value="+" class="cs-button-plus" data-field="quantity">
                                                </div>
                                                <input type="hidden" name="inventory_id" value="{{$product->inventory->id}}">
                                            </form>
                                            <div class="global-btn global-btn__yellow section-product__btn_order" rel="js--add-to-cart">
                                                <p>Add to cart</p>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    @else
                    <h3>No Products Available</h3>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.product_main_image_panel').each(function(i, el) {
        let dataIndex = $(el).attr('data-index')
        $(`.slider-for-${dataIndex}`).slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: `.slider-nav-${dataIndex}`
        });
        $(`.slider-nav-${dataIndex}`).slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: `.slider-for-${dataIndex}`,
            arrows: false,
            dots: true,
            centerMode: true,
            focusOnSelect: true
        });
    });

    //Move to cart.js
    clickEvent('[rel="js--add-to-cart"]')(addCart);

    function addCart() {
        cratesAjax({
            url: 'crates/add_to_cart',
            method: 'post',
            data: $(this).closest('.js--product-cart').find('form').serializeArray()
        }, ({
            data: {
                items,
                totalQuantity = 0,
                price,
                total
            }
        }) => {
            totalQuantity ? updateCart(totalQuantity) : '';
        }, err => {
            console.warning("you have a error")
            console.log({
                err
            })
            toastr.error("hey man error please fix this cb()")
        })
    }
</script>