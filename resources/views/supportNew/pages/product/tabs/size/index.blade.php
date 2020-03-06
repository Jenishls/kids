<div class="kt-subheader   kt-grid__item" id="kt_subheader" style="width: 100%;">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main" style="border-bottom: 2px solid #ccc;">
            <h3 class="kt-subheader__title">

                    Size   </h3>
            <div class="kt-subheader__breadcrumbs">
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                                {{$product->name}}                        </a>
                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        <button type="button" class="btn btn-info btn-elevate btn-pill btn-sm ml-auto" id="add_size" data-route="/admin/products/tab/size/add/{{$product->id}}"><i class="flaticon-add"></i> Add</button>
        </div>
    </div>
</div>

<div id="productSizeDataTable" style="width: 100%"></div>
@include('.supportNew.pages.product.tabs.size._dataTable')
<script>
    $(document).off('click', '#add_size').on('click', '#add_size', function(e) {
        let url = $(this).attr("data-route");
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: url
        });
    })
</script>