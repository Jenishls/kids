<div class="kt-subheader   kt-grid__item" id="kt_subheader" style="width: 100%;">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main" style="border-bottom: 2px solid #ccc;">
            <h3 class="kt-subheader__title">

                    Description   </h3>
            <div class="kt-subheader__breadcrumbs">
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                                {{$product->name}}                        </a>
                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        <button type="button" class="btn btn-info btn-elevate btn-pill btn-sm ml-auto edit_Desc" ><i class="flaticon-edit"></i> Edit</button>
        </div>
    </div>
</div>

<div id="Detail" style="width: 100%; padding: 15px 5px;">
    <div class="kt-portlet__body">
        <div class="desc">
            {{$product->short_desc}}
        </div>
        <div id="desc_container" style="display: none;">
            <form class="kt-form kt-form--label-right" id="productDescForm">   
                @csrf
                <textarea class="form-control" name="short_desc" id="short_desc" rows="10">{{$product->short_desc}}</textarea>
                <button type="" class="btn btn-default btn-sm btn-pill" id="cancelDesc" style="margin-top: 10px; margin-right: 10px;">Cancel</button>
                <button type="" class="btn btn-success btn-sm btn-pill" id="updateDesc" style="margin-top: 10px;">Edit</button>
            </form>
        </div>
    </div>
</div>

<script>
    $('.edit_Desc').off('click').on('click', function(e){
        e.preventDefault();
        $(this).hide();
        $('.desc').hide();
        $('#desc_container').show();
    });
    
    $('#cancelDesc').off('click').on('click', function(e){
        e.preventDefault();
        $('.edit_Desc').show();
        $('.desc').show();
        $('#desc_container').hide();
    });

    $(document).off('click','#updateDesc').on('click','#updateDesc',function(e){
        e.preventDefault();
        $.ajax({
            url:'/admin/products/tab/description/update/{{$product->id}}',
            method: 'POST',
            data: new FormData(document.getElementById('productDescForm')),
            contentType: false,
            processData: false,
            success: function(response){
                $('#cModal').modal('hide');
                toastr.success(response.message);
                $.ajax({
                    method: "get",
                    url: "admin/products/tab/overall/{{$product->id}}",
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
                
            }, 
            error:function({status, responseJSON})
            {
               
            }
        });
    });
</script>