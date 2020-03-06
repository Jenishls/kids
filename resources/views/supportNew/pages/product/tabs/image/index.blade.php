<style>
.icon_btns:hover {
	color: black !important;
    background-color: #fff;
    border-color: #fff;
}

.icon_btns:hover>i {
	color: black !important;
}</style>
<div class="kt-subheader   kt-grid__item" id="kt_subheader" style="width: 100%;">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main" style="border-bottom: 2px solid #ccc;">
            <h3 class="kt-subheader__title">

                    Image   </h3>
            <div class="kt-subheader__breadcrumbs">
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                                {{$product->name}}                        </a>
                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        <button type="button" class="btn btn-info btn-elevate btn-pill btn-sm ml-auto" id="add_image" data-route="/admin/products/tab/image/add/{{$product->id}}"><i class="flaticon-add"></i> Add</button>
        </div>
    </div>
</div>

<div id="productImageContainer" style="width: 100%">
    <div class="row">
        @foreach($product->files as $file)
        <div class="col-md-2 product_images mb-20" style="height: 200px; border-radius: 10px;">
            <img style="width: 100%; height: 100%; border-radius: 10px; object-fit: contain;" src="/admin/products/image/{{$file->file_name}}" alt="">
            <div style="position: absolute; top: 85px; left: 85px; display: none;" class="img_btns">
                <a style="background: #ebedf2; height: 25px; width: 35px; margin-right: 3px;" title="Edit Icon"  data-toggle="modal" data-url="/admin/products/tab/image/edit/{{$file->id}}" class="btn icon_btns btn-hover-brand btn-icon btn-pill model_load edit_image">								
                        <i style="font-size: 20px;" class="la la-edit"></i>							
                    </a>							
                <a style="background: #ebedf2; height: 25px; width: 35px;" title="Delete" data-id="{{$file->id}}" class="btn btn-hover-danger btn-icon btn-pill icon_btns del_image" data-url ="admin/products/tab/image/delete/{{$file->id}}" href="#">								
                    <i style="font-size: 20px;" class="la la-trash"></i>							
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script>
    $(document).off('click', '#add_image').on('click', '#add_image', function(e) {
        let url = $(this).attr("data-route");
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: url
        });
    })
    
    $(document).off('click', '.edit_image').on('click', '.edit_image', function(e) {
        let url = $(this).attr("data-url");
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: url
        });
    })

    $('.product_images').hover(function () {
        $(this).children('.img_btns').toggle();
    })

    $(document).off('click', '.del_image').on('click', '.del_image', function(e){
        e.preventDefault();
        delConfirm({
			url: $(this).attr('data-url'),
        });
    })
</script>