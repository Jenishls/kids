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
            <div class="modal-content addProductModal" style="width: 900px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Color</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="color: #fff !important;">
                    </button>
                </div>
                <div class="modal-body" style="padding:0px !important;">
                    <div class="kt-portlet" style="margin-bottom:0px !important;">
                        <div class="kt-portlet__body" style="background:#e4e4e4 !important; padding:0px !important;"> 
                            <form class="kt-form kt-form--label-right" id="productColorForm">   
                                @csrf
                                <div class="pt-10" style="background:#e5f7ff !important;">
                                    <div class="kt-portlet__body pl-35 pr-35 pb-35">
                                        <div class="row no-margin">
                                            <div class="form-group col-12 box_shadow" >
                                                <div class="product_color">
                                                    <div class="form-group row" style="padding: 5px; position: relative;">
                                                        <button type="button" id="addMoreColors" class="btn btn-info btn-sm btn-icon" style="height: 1.5rem; width: 1.5rem; background: #49bdf4; border: #47bdf5; position: absolute; right: 10px; top: 40px; z-index: 9;"><i class="fa fa-plus"></i></button>
                                                        <div class="col-lg-3">
                                                            <label class="control-label boldLabel" for="salutation">Color</label>
                                                            <select class="form-control color" name="color_id[]">
                                                            </select>
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <label class="control-label boldLabel" for="salutation">Code</label>
                                                            <input class="form-control" type="text" name="color_code[]" data-inputName="FirstName" id="code" placeholder="Color Code" required="require" autocomplete="off">
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <label class="control-label boldLabel" for="salutation">Image</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="image[]" class="custom-file-input" id="Image">
                                                                <label class="custom-file-label selected" for="Image"></label>
                                                            </div>
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                        <div class="col-lg-3" style="flex: 0 0 23%; max-width: 23%;">
                                                            <label class="control-label boldLabel" for="salutation">Sequence</label>
                                                            <input class="form-control" type="text" name="seq[]" data-inputName="FirstName" id="code" placeholder="Sequence No" required="require" autocomplete="off">
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cloned">
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
                                                    <button type="" class="btn btn-success btn-pill" id="storeColor">Add</button>
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
            $(document).off('click','#storeColor').on('click','#storeColor',function(e){
                e.preventDefault();
                $.ajax({
                    url:'/admin/products/tab/color/add/{{$product}}',
                    method: 'POST',
                    data: new FormData(document.getElementById('productColorForm')),
                    contentType: false,
                    processData: false,
                    success: function(response){
                        $('#cModal').modal('hide');
                        toastr.success('Color Added Successfully.');
                        $('#productColorDataTable').KTDatatable().reload();
                    }, 
                    error:function({status, responseJSON})
                    {
                       
                    }
                });
            });

            $("#addMoreColors").off('click').on('click', function(e){
                e.preventDefault();
                initilizeSelect2($('.cloned').append(createTemplate()));
            });
            $(document).off('click', '.removeCloned').on('click', '.removeCloned', function(e){
                $(this).parent().remove();
            });

            function initilizeSelect2(context){

                let tar = context ? context.find('.color') : $('.color');

                // context.find('.color').each(function(){
                    
                    tar.select2({
                        placeholder: 'Select color',
                        width: '100%',
                        tags: true,
                        ajax: {
                            method: 'POST',
                            url: '/admin/products/colors/all',
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
                        var parent = $(this).parent().parent();
                        if(!isNaN(id)){
                            $.ajax({
                                url:'/admin/products/colors/fill/'+id,
                                method: 'get',
                                success: function(response){ 
                                    parent.find("input[name='color_code[]']").val(response.color_code);
                                    parent.find("input[name='seq[]']").val(response.seq_no);
                                    parent.find("input[name='image[]']").parent().append(`<input class="form-control" type="hidden" name="image[]" val="${response.image}">`);
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
                        <button type="button" class="btn btn-info btn-sm btn-icon removeCloned" style="height: 1.5rem; width: 1.5rem; background: #be0505; border: #be0505; position: absolute; right: 10px; top: 15px; z-index: 9;">
                        <i class="la la-close"></i>
                        </button>
                        <div class="col-lg-3">
                            <select class="form-control color" name="color_id[]">
                            </select>
                            <div class="errorMessage"></div>
                        </div>
                        <div class="col-lg-3">
                            <input class="form-control" type="text" name="color_code[]" data-inputName="FirstName" id="code" placeholder="Color Code" required="require" autocomplete="off">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="col-lg-3">
                            <div class="custom-file">
                                <input type="file" name="image[]" class="custom-file-input" id="Image">
                                <label class="custom-file-label selected" for="Image"></label>
                            </div>
                            <div class="errorMessage"></div>
                        </div>
                        <div class="col-lg-3" style="flex: 0 0 23%; max-width: 23%;">
                            <input class="form-control" type="text" name="seq[]" data-inputName="FirstName" id="code" placeholder="Sequence No" required="require" autocomplete="off">
                            <div class="errorMessage"></div>
                        </div>
                    </div>`
                );
            }

            
        </script>