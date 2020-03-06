<style>
        .box_shadow{
            padding: 10px 15px 10px 15px;
            margin-bottom: 10px;
            border-radius: 4px;
            background: #fefefe;
            box-shadow: 2px 2px 7px 1px rgba(201, 201, 201, 0.7);
        }
        
        .portlet_custom_label {
            margin-top: -25px;
            font-weight: 800;
            display: table;
            z-index: 1;
            font-size: 12px;
            padding: 5px 15px;
            letter-spacing: 1px;
            border: 1px solid #f1f2f6;
            border-radius: 19px;
            background: #cbcbcb;
            color: #646c9a;
        }
        
        .dropzone {
            border: 2px dashed #0087F7;
            border-radius: 5px;
            background: white;
            min-height: 150px;
            padding: 54px 54px;
            box-sizing: border-box;
            cursor: pointer;
        }
        
        .boldLabel{
            font-weight: 600 !important;
        }
        .modal-900 {
          width: 900px!important;
        }
        </style>
        <div class="modal-dialog custom_dialog" role="document" >
            <div class="modal-content addProductModal">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Inventory</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="color: #fff !important;">
                    </button>
                </div>
                <div class="modal-body" style="padding:0px !important;">
                    <div class="kt-portlet" style="margin-bottom:0px !important;">
                        <div class="kt-portlet__body" style="background:#e4e4e4 !important; padding:0px !important;"> 
                            <form class="kt-form kt-form--label-right" id="productSizeEditForm">   
                                @csrf
                                <div class="pt-10" style="background:#e5f7ff !important;">
                                    <div class="kt-portlet__body pl-35 pr-35 pb-35">
                                        <div class="row no-margin">
                                            <div class="form-group col-12 box_shadow" >
                                                <div class="product_color">
                                                    <div class="form-group row" style="padding: 5px; position: relative">
                                                        {{-- <button type="button" id="add_more" class="btn btn-info btn-sm btn-icon" style="height: 1.5rem; width: 1.5rem; background: #49bdf4; border: #47bdf5; position: absolute; right: 10px; top: 40px; z-index: 9;"><i class="fa fa-plus"></i></button> --}}
                                                        <div class="col-md-2">
                                                            <label class="control-label boldLabel" for="salutation">Name</label>
                                                        <input class="form-control" type="text" name="name" value="{{$inventory->name}}"  required="require" autocomplete="off">
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="control-label boldLabel" for="salutation">Company</label>
                                                            <select class="form-control size" name="company_id">
                                                                @if($company)
                                                                <option value="{{$company->id}}"> {{$company->company_name}}</option>
                                                                @endif
                                                            </select>
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="control-label boldLabel" for="salutation">Color</label>
                                                            <select class="form-control selectpicker" name="color_id">
                                                            @foreach($colors as $color)
                                                            <option value="{{$color->id}}" @if($color->id == $inventory->color_id) selected @endif >{{$color->color}}</option>
                                                            @endforeach
                                                            </select>
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="control-label boldLabel" for="salutation">Size</label>
                                                            <select class="form-control selectpicker" name="size_id">
                                                                @foreach ($sizes as $size)
                                                                <option value="{{$size->id}}" @if($size->id == $inventory->size_id) selected @endif>{{$size->size}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                        
                                                        <div class="col-md-2">
                                                            <label class="control-label boldLabel" for="salutation">Price</label>
                                                            <input class="form-control" type="text" name="price" value="{{$inventory->price}}"  required="require" autocomplete="off">
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                        <div class="col-md-2" style="flex: 0 0 14.6%; max-width: 14.6%;">
                                                            <label class="control-label boldLabel" for="salutation">Quantity</label>
                                                            <input class="form-control" type="text" name="quantity" value="{{$inventory->quantity}}"  required="require" autocomplete="off">
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clonedColors">
                                                </div>
                                            </div>
                                        </div>	                
                                    </div>
                                    <div class="kt-portlet__foot footer_white">
                                        <div class="kt-form__actions">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <button type="reset" class="btn btn-secondary btn-pill" data-dismiss="modal">Cancel</button>
                                                </div>
                                                <div class="col-lg-6 kt-align-right">
                                                    <button type="" class="btn btn-success btn-pill" id="updateInventory">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>     
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            initilizeSelect2();
            $(document).off('click','#updateInventory').on('click','#updateInventory',function(e){
                e.preventDefault();
                $.ajax({
                    url:'/admin/products/tab/inventory/update/{{$inventory->id}}',
                    method: 'POST',
                    data: new FormData(document.getElementById('productSizeEditForm')),
                    contentType: false,
                    processData: false,
                    success: function(response){
                        $('#cModal1').modal('hide');
                        toastr.success(response.message);
                        $('#productInventoryDataTable').KTDatatable().reload();
                    }, 
                    error:function({status, responseJSON})
                    {
                        
                    }
                });
            });

            function initilizeSelect2(context){

                let tar = context ? context.find('.size') : $('.size');
                let sel = context ? context.find('.selectpicker') : $('.selectpicker');

                sel.selectpicker();

                // context.find('.color').each(function(){
                    
                    tar.select2({
                        placeholder: 'Select color',
                        width: '100%',
                        ajax: {
                            method: 'POST',
                            url: '/admin/products/company/all',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            processResults: function(data) {
                                let res = [];
                                $.each(data, function(i, obj) {
                                    res.push({
                                        id: obj.id,
                                        text: obj.name
                                    });
                                });
                                return {
                                    results: res
                                };
                            }
                        }
                    }).on('change', function(e){
                        e.preventDefault();
                        let id = $(this).val();
                        if(!isNaN(id)){
                            $.ajax({
                                url:'/admin/products/sizes/fill/'+id,
                                method: 'get',
                                success: function(response){ 
                                    let parent = $('.size').parent().parent();
                                    parent.find("input[name='size[]']").val(response.size);
                                    parent.find("input[name='high[]']").val(response.high);
                                    parent.find("input[name='long[]']").val(response.long);
                                    parent.find("input[name='wide[]']").val(response.wide);
                                    parent.find("input[name='measurement_type[]']").val(response.measurement_type);
                                }, 
                                error:function({status, responseJSON})
                                {

                                }
                            });
                        }
                    });
                // })
            }

            
        </script>