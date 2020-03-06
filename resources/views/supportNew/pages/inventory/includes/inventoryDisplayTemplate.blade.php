
<div class="col-lg-12 col-md-4 box_shadow inventoryTemplate" id="inventoryTemplate{{$data['uniqId']}}">
    <div class="row">
        <div class="col-md-8 heading">
            <h6 class="m-0"><i class=" fas fa-dolly-flatbed"></i>{{$data['name']}}</h6>
            <input type="hidden" name="name[]" value="{{$data['name']}}">
            <input type="hidden" name="uniqId[]" value="inventoryTemplate{{$data['uniqId']}}">
        </div>
        <div class="col-md-4">
            <a class="btn btn-hover-brand btn-icon btn-pill edit_inventory_template" data-id="#inventoryTemplate{{$data['uniqId']}}">
                <i class="la la-edit"></i>
            </a>                        
            <a class="btn btn-hover-danger btn-icon btn-pill del_inventory_template" data-id="#inventoryTemplate{{$data['uniqId']}}" href="#">
                <i class="la la-trash"></i>
            </a>
        </div>
    </div>
    <div class="row mt-4 templateContainer">
        <div class="col-lg-6 subHeading">
            <h6><i class="flaticon2-gift-1"></i><span class="mr-1" >Product :</span> {{$data['product']->name}}</h6>
            <input type="hidden" name="product_id[]" value="{{$data['product']->id}}">
            <input type="hidden" name="product_name[]" value="{{$data['product']->name}}">
        </div>
        <div class="col-lg-6 subHeading">
            <h6><i class="la la-bank"></i><span class="mr-1" >Company :</span> {{$data['company']->c_name}}</h6>
            <input type="hidden" name="company_id[]" value="{{$data['company']->id}}">
            <input type="hidden" name="company_name[]" value="{{$data['company']->c_name}}">
        </div>
        @if($data['color'])
        <div class="col-lg-4 subHeading">
            <h6><span class="mr-1" >Color :</span>
                @if($data['color']->color_code)
                <span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill" style="background:{{$data['color']->color_code}}; color: white;margin: 0!important;">{{$data['color']->color}}</span>
                @else
                    {{$data['color']->color}}
                @endif
            </h6>
            <input type="hidden" name="color_id[]" value="{{$data['color']->id}}">
            <input type="hidden" name="color_name[]" value="{{$data['color']->color}}">
        </div>
        @endif
        @if($data['size'])
        <div class="col-lg-4 subHeading">
            <h6>
                <span class="mr-1" >
                    Size :
                </span>
                {{$data['size']->size}}
            </h6>
            <input type="hidden" name="size_id[]" value="{{$data['size']->id}}">
            <input type="hidden" name="size_name[]" value="{{$data['size']->size}}">
        </div>
        @endif
        <div class="col-lg-4 subHeading">
            <h6><span class="mr-1" >Price :</span>  ${{$data['price']}}</h6>
            <input type="hidden" name="price[]" value="{{$data['price']}}">

        </div>
        <div class="col-lg-4 subHeading">
            <h6><span class="mr-1" >Quantity :</span> {{$data['quantity']}}</h6>
            <input type="hidden" name="quantity[]" value="{{$data['quantity']}}">
        </div>
    </div>
</div>