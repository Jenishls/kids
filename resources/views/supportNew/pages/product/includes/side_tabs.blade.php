<style>
    .product_side_tab{
        text-align: center!important;
    }
</style>
<div class=" col-lg-2 col-md-12" id="kt_user_profile_aside" style="padding-right: 0!important;">
    <!--begin:: Widgets/Applications/User/Profile1-->
    <div class="kt-portlet kt-portlet--height-fluid-">
        <div class="kt-portlet__body kt-portlet__body--fit-y" style="padding:0 15px!important;">
            <!--begin::Widget -->
            <div class="kt-widget kt-widget--user-profile-1" style="margin-top: 20px;">
                <div class="kt-widget__body">
                    <div class="kt-widget__items row">
                        <a href="#" class="kt-widget__item kt-widget__item--active col-lg-12 col-md-1 product_side_tab" data-url="/admin/products/tab/overall/{{$product->id}}">
                            <span class="kt-widget__section">
                                <span class="kt-widget__icon">
                                </span>
                                <span class="kt-widget__desc">
                                    Description
                                </span>
                            </span>
                        </a>
                        <a class="kt-widget__item product_side_tab col-lg-12 col-md-1 " data-url="/admin/products/tab/color/{{$product->id}}">
                            <span class="kt-widget__section">
                                <span class="kt-widget__desc">
                                    Color
                                </span>
                            </span>
                        </a>
                        <a class="kt-widget__item product_side_tab col-lg-12 col-md-1" data-url="/admin/products/tab/size/{{$product->id}}">
                            <span class="kt-widget__section">
                                <span class="kt-widget__desc">
                                    Size
                                </span>
                            </span>
                        </a>
                        <a class="kt-widget__item product_side_tab col-lg-12 col-md-1" data-url="/admin/products/tab/image/{{$product->id}}">
                            <span class="kt-widget__section">
                                <span class="kt-widget__desc">
                                    Images
                                </span>
                            </span>
                        </a>
                       
                        <a class="kt-widget__item product_side_tab col-lg-12 col-md-1" data-url="/admin/products/tab/inventory/{{$product->id}}">
                            <span class="kt-widget__section">
                                <span class="kt-widget__desc">
                                    Inventory
                                </span>
                            </span>
                        </a>
                        <a class="kt-widget__item product_side_tab col-lg-12 col-md-1" data-url="/admin/products/tab/order/{{$product->id}}">
                            <span class="kt-widget__section">
                                <span class="kt-widget__desc">
                                    Orders
                                </span>
                            </span>
                        </a>
                         {{-- <a class="kt-widget__item product_side_tab col-lg-12 col-md-1" data-url="/admin/products/tab/info/{{$product->id}}">
                            <span class="kt-widget__section">
                                <span class="kt-widget__desc">
                                    Extra Info
                                </span>
                            </span>
                        </a> --}}
                        <a class="kt-widget__item product_side_tab col-lg-12 col-md-1" data-url="/admin/products/tab/feature/{{$product->id}}">
                            <span class="kt-widget__section">
                                <span class="kt-widget__desc">
                                    Features
                                </span>
                            </span>
                        </a>
                        <a class="kt-widget__item product_side_tab col-lg-12 col-md-1" data-url="/admin/products/tab/review/{{$product->id}}">
                            <span class="kt-widget__section">
                                <span class="kt-widget__desc">
                                    Reviews
                                </span>
                            </span>
                        </a>
                        <a class="kt-widget__item product_side_tab col-lg-12 col-md-1" data-url="/admin/products/tab/faq/{{$product->id}}">
                            <span class="kt-widget__section">
                                <span class="kt-widget__desc">
                                    FAQ
                                </span>
                            </span>
                        </a>
                        <a class="kt-widget__item product_side_tab col-lg-12 col-md-1" data-url="/admin/products/tab/answer/{{$product->id}}">
                            <span class="kt-widget__section">
                                <span class="kt-widget__desc">
                                    Answers
                                </span>
                            </span>
                        </a>
                        <a class="kt-widget__item product_side_tab col-lg-12 col-md-1" data-url="/admin/products/tab/message/{{$product->id}}">
                            <span class="kt-widget__section">
                                <span class="kt-widget__desc">
                                    Messages
                                </span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <!--end::Widget -->
        </div>
    </div>
    <!--end:: Widgets/Applications/User/Profile1-->
</div>

<script>
    $(document).off('click', '.product_side_tab').on('click', '.product_side_tab', function(e){
        e.preventDefault();
        $('.product_side_tab').removeClass('kt-widget__item--active');
        $(this).addClass('kt-widget__item--active');
        let url = $(this).attr('data-url');
        $.ajax({
            method: "get",
            url: url,
            beforeSend: function () {
                $("#tab-detail_container").html(cssload);
            },
            success: function (response, status, xhr) {
                setTimeout(function () {
                    $("#tab-detail_container").html(response);
                }, 200);
            },
            error: function (xhr, status, error) {}
        });
    })
</script>