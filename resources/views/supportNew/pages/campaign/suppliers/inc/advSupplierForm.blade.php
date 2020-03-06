<style>
    .custom-activity__temp-header{
        font-size: 17px;
        color: #41bcf6;
    }
    .custom-scroller{
        height: 262px;
        overflow: scroll;
        overflow-x: hidden;
    }
    .supplierTemplate .giver{
        display: none;
    }
    .supplierTemplate .g--full_width{
        display: none;
        max-width:100%;
    }
    .supplierTemplate.editMode .giver{
        display: block;
    }
    
    .supplierTemplate.editMode .shower{
        display: none;
    }
    .supplierTemplate .shower{
        display: block;
    }
    .supEmptyRow{
        display: none;
    }
    .supEmptyRow.active{
        display: table-row;
    }
    .supEmptyRow h6{
        color: ##41bcf6!important;
    }
    </style>
    <div class="kt-portlet__body">
        <div class="row">
            <div class="col-lg-4 col-md-12 shadow_inputs" id="formInputs">
                <div class="form-group row mt-3 pt-5" id="sSupplier">
                    <span class="btn portlet_label" style="top:-14px;left:15px;">Create a Supplier</span>	
                    @csrf
                    <div class="col-md-6 col-sm-6" >
                        <label class="control-label" for="company_id">Company</label>
                        <select name="c_company_id" class="supplierSelect2 clearSelect2"></select>
                        <div class="errorMessage"></div>
                    </div>
                    <div class="col-md-6 col-sm-6" >
                        <label class="control-label" for="type_of_service">Type of Service</label>
                        <select name="c_type_of_service" class="serviceSelect2 clearSelect2"></select>
                        <div class="errorMessage"></div>
                    </div>
                    <div class="col-md-6 col-sm-6" >
                        <label class="control-label" for="type_of_service">Status</label>
                        <select name="c_status" class="supplierStatus clearSelect2"></select>
                        <div class="errorMessage"></div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <label class="control-label" for="industry">Cost</label>
                        <input type="text" name="c_cost" class="form-control m-supplier_cost">
                        <div class="errorMessage"></div>
                    </div>
                    <div class="offset-lg-6 col-md-6 pt-3 text-right">
                        <button type="" class="btn btn-sm btn-pill btn-success" id="cSupplierTemp">
                            <i class="la la-plus"></i>Supplier
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row custom-scroller">
                    <div class="col-md-12 supplierTemplate" id="ac-t-IdgoesHere">
                        <div class="c-table--container" style="background:white;">
                            <table style="width:100%" class="table kt-datatable__table">
                                <thead class="kt-datatable__head" style="background: #41bcf6 !important;
                                color: white;">
                                    <tr>
                                        <th>Supplier</th>
                                        <th>Type of Services</th>
                                        <th class="text-right">Cost</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="supplierTableBody">
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var pastData="";
        initSupplierAll();
        function initSupplierAll()
        {
            $(".serviceSelect2").select2({
                width: '100%',
                placeholder: '\u200B',
                tags: true,
                ajax: {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: function (params) {
                        return '/admin/campaign/type_of_services/select2Data'
                    },
                    processResults: function (data) {
                        let res = [];
                        $.each(data, function(i , obj){
                            res.push({
                                id: obj.value,
                                text : capitalizeFirstLetter(obj.value),
                                data : obj
                            });
                        });
                        return {
                            results: res
                        };
                    }
                }
            })
            $(".supplierStatus").select2({
                width: '100%',
                placeholder: '\u200B',
                tags: true,
                ajax: {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: function (params) {
                        return '/admin/campaign/supplier_status/select2Data'
                    },
                    processResults: function (data) {
                        let res = [];
                        $.each(data, function(i , obj){
                            res.push({
                                id: obj.value,
                                text : capitalizeFirstLetter(obj.value),
                                data : obj
                            });
                        });
                        return {
                            results: res
                        };
                    }
                }
            })
            $(".supplierSelect2").select2({
                width: '100%',
                placeholder: '\u200B',
                tags: true,
                ajax: {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: function (params) {
                        return 'admin/account/select2/data'
                    },
                    processResults: function (data) {
                        let res = [];
                        $.each(data, function(i , obj){
                            res.push({
                                id: obj.id,
                                text : capitalizeFirstLetter(obj.c_name),
                                data : obj
                            });
                        });
                        return {
                            results: res
                        };
                    }
                }
            })
            $(".m-supplier_cost").inputmask("currency");
        }
        $('#cSupplierTemp').off('click').on('click',function(e){
            e.preventDefault();
            let supplierName= {name: 'supplier_name',value: $('#sSupplier').find('.supplierSelect2 option:selected').text().trim()};
            let data = $('#sSupplier').find('select,textarea,input').serializeArray();
            console.log(data);
            data.push(supplierName)
            supportAjax({
                url:"/admin/campaign/validate/supplier",
                method:'POST',
                data
            },function(resp){
                console.log(actToArray(data));
                    $('#supplierTableBody').append(makesupplierTemplate(actToArray(data)));

                    initSupplierAll()
                    $('.supEmptyRow').removeClass('active');
                    $('#sSupplier').find('select,textarea,input').val('');
                    $('.clearSelect2').val(null).trigger('change');
            },function(err){
    
            })
        })
        clickEvent('.editSup')(function(e){
            e.preventDefault();
            let template=  $(this).closest('.supplierTemplate');
            pastData= $(this).closest('.supplierTemplate').find(':input').serializeArray();
            $($(this).attr('data-target')).addClass('editMode');
        });
        clickEvent('.delSup')(function(e){
            e.preventDefault();
            $($(this).attr('data-target')).remove();
            let template=  $(this).closest('.supplierTemplate');
            let id =template.find('[name="supplier_id[]"').val();
            if(id){
                $('#supplierTableBody').append(`
                    <input name="deleted_supplier_id[]" value="${id}" type="hidden"/>
                    `);
            }
            if(! $('#supplierTableBody').children('.supplierTemplate').length){
                $('.supEmptyRow').addClass('active');
            }
        });
    
        clickEvent('.discardChangeSup')(function(e){
            e.preventDefault();
            $($(this).attr('data-target')).removeClass('editMode');
            let template=  $(this).closest('.supplierTemplate');
            $(pastData).each(function(index, data){
                if(data.name == 'activity_type[]' || data.name == 'activity_name[]'|| data.name == 'activity_user_id[]'){
                    template.find('[name="'+data.name+'"]').val(data.value).trigger('change')
                }
                template.find('[name="'+data.name+'"]').val(data.value);
            });
        });
    
        clickEvent('.applyeditSup')(function(e){
            e.preventDefault();
            let template=  $(this).closest('.supplierTemplate');
            console.log(template.find('.supplierSelect2'));
            let supplierName= {name: 'supplier_name',value: template.find('.supplierSelect2 option:selected').text().trim()};
            let dataArr = template.find(':input').serializeArray();
            dataArr.push(supplierName)
            let data= actToArray(dataArr);
            template.replaceWith(makesupplierTemplate(data));
            $($(this).attr('data-target')).removeClass('editMode');
            initSupplierAll()
        });
        function actToArray(array)
        {
            let arr={};
            $(array).each(function(i, field){
                arr[field.name.replace("c_", "").replace('[]','')] = field.value;
            });
            return arr;
        }
        function makesupplierTemplate(data){
            let uniqueId= data.supplier_id?data.supplier_id:Date.now();
            let template=`
                <tr class="supplierTemplate" id="c-supplier-${uniqueId}">
                    <td style="width:200px;">
                        <input class="form-control" type="hidden" name="supplier_id[]" value="${(typeof data.supplier_id !=="undefined")?data.supplier_id:''}">
                        <div class="shower">
                            ${data.company_id?data.supplier_name:''}
                        </div>
                        <div class="giver">
                            <select name="company_id[]" class="supplierSelect2">
                                `;
                if(data.company_id)
                    template+=`
                            <option value="${data.company_id}" selected="selected">
                                ${capitalizeFirstLetter(data.supplier_name)}
                            </option>  
                    `;
                template+=`                            
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="shower">
                            ${data.type_of_service?data.type_of_service:''}
                        </div>
                        <div class="giver">
                            <select name="type_of_service[]" class="serviceSelect2">
                                `;
                if(data.type_of_service)
                    template+=`
                            <option value="${data.type_of_service}" selected="selected">
                                ${capitalizeFirstLetter(data.type_of_service)}
                            </option>  
                    `;
                template+=`                            
                            </select>
                        </div>
                    </td>
                    <td style="width:100px;">
                        <div class="shower  m-supplier_cost">
                            ${data.cost?data.cost:''}
                        </div>
                        <div class="giver">
                            <input class="form-control m-supplier_cost" type="text" name="cost[]" value="${data.cost?data.cost:''}">
                        </div>
                    </td>
                    <td>
                        <div class="shower">
                            ${data.status?capitalizeFirstLetter(data.status):''}
                        </div>
                        <div class="giver">
                            <select name="status[]" class="supplierStatus">
                                `;
                if(data.status)
                    template+=`
                                <option value="${data.status}" selected="selected">
                                    ${data.status?capitalizeFirstLetter(data.status):''}
                                </option>  
                    `;
                template+=`                            
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="shower">
                            <a href="javascript:;"  class="btn btn-sm btn-icon btn-icon-sm editSup" data-target="#c-supplier-${uniqueId}">
                                <i class="la la-edit"></i>
                            </a>
                            <a href="javascript:;"  class="btn btn-sm btn-icon btn-icon-sm delSup" data-target="#c-supplier-${uniqueId}">
                                <i class="la la-trash"></i>
                            </a>
                        </div>
                        <div class="giver">
                            <a href="javascript:;"  class="btn btn-sm btn-icon btn-icon-sm applyeditSup" data-target="#c-supplier-${uniqueId}">
                                <i class="la la-check text-success"></i>
                            </a>
                            <a href="javascript:;"  class="btn btn-sm btn-icon btn-icon-sm discardChangeSup" data-target="#c-supplier-${uniqueId}">
                                <i class="la la-close text-danger"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            `;
            return template;
        }
</script>