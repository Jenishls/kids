<style>
    #style-7::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
        border-radius: 10px;
    }
    .scrollbar
    {
        margin-left: 30px;
        float: left;
        height: 50px;
        width: 65px;
        background: #F5F5F5;
        overflow-y: scroll;
        margin-bottom: 25px;
    }
    .force-overflow
    {
        min-height: 100px;
    }
    .custom_respo_liner{
        width: 100%!important;
        padding: 0!important;
    }

</style>
<div class="datatable_container usersControlContent" id="datatable_container">
    <div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Product
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Table</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Product</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">{{$product->name}}</a>
                </div>
                <div class="back_temp ml-auto" style="width: 94px;">
                        <a class="kt-menu__link pageload backBtn" onclick="event.preventDefault();" data-route="/admin/products">
                            <i class="fas fa-arrow-left" style="padding-right: 10px;
                            "></i>
                            Back
                        </a>
                    </div>
                {{-- <button type="button" class="btn btn-light btn-elevate-hover btn-pill ml-auto pageload" data-route="/admin/products"><i class="fa fa-arrow-left"></i> Back</button> --}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <!--begin:: Portlet-->
            <div class="kt-portlet" style="margin-right: 10px;">
                    <div class="kt-portlet__body">
                        <div class="kt-widget kt-widget--user-profile-3">
                            <div class="kt-widget__top">
                                <div class="kt-widget__media kt-hidden-" style="position: relative;">
                                    <img id="product_thumb" src="{{$thumb?"/admin/products/image/".$thumb->file_name:"/images/100_1.jpg"}}" alt="image">
                                    <label class="kt-avatar__upload logoUpload edit_product_thumb" data-toggle="kt-tooltip" title="" data-original-title="Change logo" style="top: -15px; right: -15px;">
                                        <i class="fa fa-pen"></i>
                                    </label>
                                </div>
                                <div class="kt-widget__content">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3" style="border-right: 2px dashed #ccc;">
                                            <div class="kt-widget__head">
                                                <a class="kt-widget__username pointer custom_respo_liner">
                                                {{ucfirst($product->name)}}    
                                                {{--  <i class="flaticon2-correct kt-font-success"></i>  --}}            
                                                </a>
                                            </div>
                                            <div class="kt-widget__subhead">
                                                <a class="custom_respo_liner">
                                                    <table>
                                                        <tr>
                                                            <td style="width: 80px;">
                                                                <span style="color: #464457;">Code:&nbsp;</span>
                                                            </td>
                                                            <td>
                                                                <span>{{$product->code?:""}}</span> 
                                                            </td>
                                                        </tr>
                                                    </table>
                                                 </a>
                                                <a class="custom_respo_liner">
                                                    <table>
                                                        <tr>
                                                            <td style="width: 80px;">
                                                                <i class="flaticon2-placeholder"></i>
                                                                <span style="color: #464457;">Brand:&nbsp;</span>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                 {{$product->brand?$product->brand->name:""}} </span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </a>
                                                <a class="custom_respo_liner">
                                                    <table>
                                                        <tr>
                                                            <td style="width: 80px;">
                                                                <i class="flaticon-time"></i>
                                                                <span style="color: #464457;">Weight:&nbsp;</span>
                                                            </td>
                                                            <td>
                                                                <span> {{$product->weight?:""}} {{$product->weight_type?:""}}</span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6" style="border-right: 2px dashed #ccc; padding-left: 20px; height: 100%;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div style="border-right: 2px dashed #ccc;">
                                                        <div class="kt-widget__head">
                                                            <a class="kt-widget__username pointer" style="font-size: 15px;">
                                                            Categories                       
                                                            </a>
                                                            <div class="kt-widget__action" style="margin-right: 10px;">
                                                            <button type="button" class="btn btn-brand btn-sm btn-upper btn-pill" id="edit_category" data-route="/admin/products/tab/category/edit/{{$product->id}}" style="width: 20px; height: 21px; padding-left: 10px; line-height: 0; padding-right: 25px;"><i class="la la-edit" style="font-size: 15px;"></i></button>
                                                            </div>
                                                        </div>
                        
                                                        <div class="kt-widget__subhead">
                                                            @if($product->categories)
                                                            @foreach ($product->categories as $category)
                                                                <a><i class="fa fa-tags"></i><span style="color: #464457;">Category:&nbsp; </span>{{$category->category}} </a><br/>
                                                            @endforeach
                                                            @foreach ($product->sub_categories as $category)
                                                                <a style="margin-left: 20px;"><i class="fa fa-tags"></i><span style="color: #464457;">Sub Category:&nbsp; </span>{{$category->category}} </a><br/>
                                                            @endforeach
                                                            @foreach ($product->child_categories as $category)
                                                                <a style="margin-left: 40px;"><i class="fa fa-tags"></i><span style="color: #464457;">Child Category:&nbsp; </span>{{$category->category}} </a>
                                                            @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div>
                                                        <div class="kt-widget__head">
                                                            <a class="kt-widget__username pointer" style="font-size: 15px;">
                                                            Colors                       
                                                            </a>
                                                            {{-- <div class="kt-widget__action">
                                                            <button type="button" class="btn btn-brand btn-sm btn-upper btn-pill" id="edit_category" data-route="/admin/products/tab/category/edit/{{$product->id}}" style="width: 20px; height: 21px; padding-left: 10px; line-height: 0; padding-right: 25px;"><i class="la la-edit" style="font-size: 15px;"></i></button>
                                                            </div> --}}
                                                        </div>
                        
                                                        <div class="kt-widget__subhead">
                                                            @foreach ($product->colors as $color)
                                                            @if($color->image)
                                                            <span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill" style="background: url({{"/admin/products/color/image/".$color->image}}); margin-right:5px !important; margin-left:5px !important;">{{$color->color}}</span>
                                                            @else
                                                            <span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill" style="background: {{$color->color_code}}; margin-left:5px !important; margin-right:5px !important;">{{$color->color}}</span>
                                                            @endif
                                                        {{-- <span class="kt-badge kt-badge--brand kt-badge--lg kt-badge--rounded" style="background: {{$color->color_code}};">{{$color->color}}</span> --}}
                                                            {{-- <a><i class="flaticon-grid-menu-v2"></i><span style="color: #464457;">{{$color->color}}:&nbsp; </span>{{$color->color_code}} </a> --}}
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3" style="padding-left: 20px;">
                                            <div class="kt-widget__head">
                                                <a class="kt-widget__username pointer" style="font-size: 15px;">
                                                Features                    
                                                </a>
                                            </div>
                                            <div class="kt-list-timeline">
                                                <div class="kt-list-timeline__items kt-menu__item--submenu">
                                                    <?php $c =1?>
                                                    @foreach ($product->features as $feature)
                                                    @if($loop->iteration > 3)
                                                    @if($c== 1)
                                                    <span style="margin-left: 10px; cursor: pointer;" id="featureSmallList"><strong>More...</strong>
                                                        <div class="kt-portlet__body" id="featureList" style="z-index: 9; display: none; background: rgb(255, 255, 255); border: 1px solid; position: absolute; right: 0px; left: -27px; max-height: 500px; top: 105px; overflow: auto;">
                                                                @foreach ($product->features as $feature)
                                                                <div class="kt-list-timeline__item" style="margin:0;">
                                                                    <span class="kt-list-timeline__badge kt-list-timeline__badge--success"></span>
                                                                    <span class="kt-list-timeline__text">{{$feature->feature}}</span>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </span>
                                                    @endif
                                                    <?php $c++; ?>
                                                    @continue
                                                    @endif
                                                    <div class="kt-list-timeline__item" style="margin:0;">
                                                        <span class="kt-list-timeline__badge kt-list-timeline__badge--success"></span>
                                                        <span class="kt-list-timeline__text">{{str_limit($feature->feature, 60)}}</span>
                                                    </div>

                                                    @endforeach
                                                    
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget__bottom">
                                <div class="kt-widget__item">
                                    <div class="kt-widget__icon">
                                        <i class="flaticon-piggy-bank"></i>
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title pointer">Average Price</span>
                                        <span class="kt-widget__value"><span>$</span>{{$product->averagePrice}}</span>
                                    </div>
                                </div>
                                
                                <div class="kt-widget__item">
                                    <div class="kt-widget__icon">
                                        <i class="fab fa-hotjar"></i>
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title pointer">Damage Price</span>
                                        @if($product->damage_price_type == 'flat')
                                        <span class="kt-widget__value"><span>$</span>{{$product->damage_price}}</span>
                                        @elseif($product->damage_price_type == 'percent')
                                        <span class="kt-widget__value">{{$product->damage_price}}<span>%</span></span>
                                        @endif
                                    </div>
                                </div>
    
                                <div class="kt-widget__item">
                                    <div class="kt-widget__icon">
                                        <i class="flaticon2-graph"></i>
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title pointer">Available Items</span>
                                        <span class="kt-widget__value"><span></span>{{$product->inventories?$product->inventories()->sum('quantity'):0}}</span>
                                    </div>
                                </div>
    
                                <div class="kt-widget__item">
                                    <div class="kt-widget__icon">
                                        <i class="flaticon2-box"></i>
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title pointer">Inventory Holds</span>
                                        <span class="kt-widget__value"><span></span>{{$product->inventories?$product->inventories()->sum('inv_hold'):0}}</span>
                                    </div>
                                </div>
    
                                <div class="kt-widget__item">
                                    <div class="kt-widget__icon">
                                        <i class="fab fa-opencart"></i>
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title pointer">Inventory Sold</span>
                                        <a class="kt-widget__value kt-font-brand pointer">{{$product->inventorySold}}</a>
                                    </div>
                                </div>
    
                                <div class="kt-widget__item">
                                    <div class="kt-widget__icon">
                                        <i class="flaticon2-shopping-cart-1"></i>
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title pointer">Total Orders</span>
                                    <a class="kt-widget__value kt-font-brand pointer">{{$product->totalOrders}}</a>
                                    </div>
                                </div>
                                <div class="kt-widget__item">
                                    <div class="kt-widget__icon">
                                        <i class="flaticon-questions-circular-button"></i>
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title pointer">Answered Questions</span>
                                        <a class="kt-widget__value kt-font-brand pointer">{{ $product->answered_questions->count() }} </a>
                                    </div>
                                </div>
                                <div class="kt-widget__item">
                                    <div class="kt-widget__icon">
                                        <i class="flaticon-questions-circular-button"></i>
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title pointer">Unanswered Questions</span>
                                    <a class="kt-widget__value kt-font-brand pointer">{{ $product->questions->count() - $product->answered_questions->count() }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!--end:: Portlet-->
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                    <!--Begin::App-->
                <div class="kt-grid row kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app w-100">
                    @include('.supportNew.pages.product.includes.side_tabs')
                    {{-- Start of tab view --}}
                    <div class=" col-lg-10 col-md-12 pr-0" >
                        <div class="row w-100 "  id="tab-detail_container" style="background: #fff;border-radius: 5px;margin: 0;padding: 2px 0px 5px 9px;" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   $(document).ready(function(e){
    $.ajax({
            method: "get",
            url: "/admin/products/tab/overall/{{$product->id}}",
            data: {},
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

   $(document).off('click', '.edit_product_thumb').on('click', '.edit_product_thumb', function(e) {
       e.preventDefault();
       e.stopPropagation();
       let url = "/admin/products/thumb/{{$product->id}}";
        showModal({
            url: url
        });
    })

    $(document).off('click', '#edit_category').on('click', '#edit_category', function(e) {
        let url = $(this).attr("data-route");
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: url
        });
    })

    $('#featureSmallList').hover(function(e){
        e.preventDefault();
        $('#featureList').toggle();
    });
</script>