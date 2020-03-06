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
        </style>
        <div class="modal-dialog addProductModalDialog modal-md" role="document" style="margin-top: 4% !important; margin-left: 28% !important;">
            <div class="modal-content addProductModal" style="width: 1000px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Size</h5>
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
                                                    <div class="form-group row" style="padding: 5px;">
                                                        <div class="col-md-2" style="flex: 0 0 20%; max-width: 20%;">
                                                            <label class="control-label boldLabel" for="salutation">Size</label>
                                                            <select class="form-control size" name="size">
                                                            <option value="{{$selsize->id}}">{{$selsize->size}}</option>
                                                            </select>
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                        <div class="col-md-2" style="flex: 0 0 20%; max-width: 20%;">
                                                            <label class="control-label boldLabel" for="salutation">Long</label>
                                                            <input class="form-control" type="text" value="{{$selsize->long}}" name="long" required="require" autocomplete="off">
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                        <div class="col-md-2" style="flex: 0 0 20%; max-width: 20%;">
                                                            <label class="control-label boldLabel" for="salutation">Wide</label>
                                                            <input class="form-control" type="text" value="{{$selsize->wide}}" name="wide" required="require" autocomplete="off">
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                        
                                                        <div class="col-md-2" style="flex: 0 0 20%; max-width: 20%;">
                                                            <label class="control-label boldLabel" for="salutation">High</label>
                                                            <input class="form-control" type="text" value="{{$selsize->high}}" name="high"  required="require" autocomplete="off">
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                        <div class="col-md-2" style="flex: 0 0 20%; max-width: 20%;">
                                                            <label class="control-label boldLabel" for="salutation">Measurement Type</label>
                                                            <input class="form-control" type="text" value="{{$selsize->measurement_type}}" name="measurement_type" required="require" autocomplete="off">
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
                                                    <button type="" class="btn btn-success btn-pill" id="updateSize">Save</button>
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
            $(document).off('click','#updateSize').on('click','#updateSize',function(e){
                e.preventDefault();
                $.ajax({
                    url:'/admin/products/tab/size/update/{{$size->id}}',
                    method: 'POST',
                    data: new FormData(document.getElementById('productSizeEditForm')),
                    contentType: false,
                    processData: false,
                    success: function(response){
                        $('#cModal').modal('hide');
                        toastr.success('Size Updated Successfully.');
                        $('#productSizeDataTable').KTDatatable().reload();
                    }, 
                    error:function({status, responseJSON})
                    {
                        // if(status===422){
                        //     $('#accountAddForm').find('input[name], select[name]').css('border-color', '#ddd');
                        //     $(`input[name]`).siblings(".errorMessage").empty();
                        //     $(`select[name]`).siblings(".errorMessage").empty();
            
                        //     if (!responseJSON.errors) return;
                        //     const messages = [];
                        //     for (const [key, message] of Object.entries(responseJSON.errors)) {
                        //          $('#accountAddForm').find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                        //          $('#accountAddForm').find(`select[name = "${ key }"]`).siblings('button').css('border-color', '#F44336');
                        //         messages.push(message);
                        //         $(`input[name="${key}"]`).siblings(".errorMessage").empty().append(message);
            
                        //         $(`select[name="${key}"]`).siblings(".errorMessage").empty().append(message);
                        //     }
                        //     toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
                        // }
                    }
                });
            });

            $(document).off('click', "#add_more").on('click', "#add_more", function(e){
                e.preventDefault();
                initilizeSelect2($('.clonedColors').append(createTemplate()));
            });
            $(document).off('click', '.removeCloned').on('click', '.removeCloned', function(e){
                $(this).parent().remove();
            });

            function initilizeSelect2(context){

                let tar = context ? context.find('.size') : $('.size');

                // context.find('.color').each(function(){
                    
                    tar.select2({
                        placeholder: 'Select color',
                        width: '100%',
                        tags: true,
                        ajax: {
                            method: 'POST',
                            url: '/admin/products/size/all',
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
                                    parent.find("input[name='size']").val(response.size);
                                    parent.find("input[name='high']").val(response.high);
                                    parent.find("input[name='long']").val(response.long);
                                    parent.find("input[name='wide']").val(response.wide);
                                    parent.find("input[name='measurement_type']").val(response.measurement_type);
                                }, 
                                error:function({status, responseJSON})
                                {

                                }
                            });
                        }
                    });
                // })
            }

            function createTemplate() {
                return (
                    `<div class="form-group row" style="padding: 5px; position: relative;">
                        <button type="button" class="btn btn-info btn-sm btn-icon removeCloned" style="height: 1.5rem; width: 1.5rem; background: #be0505; border: #be0505; position: absolute; right: 5px; top: 15px; z-index: 9;">
                            <i class="la la-close"></i>
                            </button>
                        <div class="col-lg-2" style="flex: 0 0 20%; max-width: 20%;">
                            <select class="form-control size" name="size[]">
                            </select>
                            <div class="errorMessage"></div>
                        </div>
                        <div class="col-lg-2" style="flex: 0 0 20%; max-width: 20%;">
                            <input class="form-control" type="text" name="long[]" data-inputName="FirstName" id="code" placeholder="Long" required="require" autocomplete="off">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="col-lg-2" style="flex: 0 0 20%; max-width: 20%;">
                            <input class="form-control" type="text" name="wide[]" data-inputName="FirstName" id="code" placeholder="Wide" required="require" autocomplete="off">
                            <div class="errorMessage"></div>
                        </div>
                        
                        <div class="col-lg-2" style="flex: 0 0 20%; max-width: 20%;">
                            <input class="form-control" type="text" name="high[]" placeholder="Hight" required="require" autocomplete="off">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="col-lg-2" style="flex: 0 0 20%; max-width: 18%;">
                            <input class="form-control" type="text" name="measurement_type[]"  placeholder="Measurement Type" required="require" autocomplete="off">
                            <div class="errorMessage"></div>
                        </div>
                    </div>`
                );
            }

            
        </script>