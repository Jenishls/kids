<style>
.custom-activity__temp-header{
    font-size: 17px;
    color: #41bcf6;
}
.custom-scroller{
    height: 312px;
    overflow: scroll;
    overflow-x: hidden;
}
.activityTemplate .giver{
    display: none;
}
.activityTemplate .g--full_width{
    display: none;
    max-width:100%;
}
.activityTemplate.editMode .giver{
    display: block;
}

.activityTemplate.editMode .shower{
    display: none;
}
.activityTemplate .shower{
    display: block;
}
.actEmptyRow{
    display: none;
}
.actEmptyRow.active{
    display: table-row;
}
.actEmptyRow h6{
    color: ##41bcf6!important;
}
</style>
<div class="kt-portlet__body pt-0 px-3 pb-1">
    <div class="row">
        <div class="col-lg-4 col-md-12 shadow_inputs" id="formInputs">
            <div class="form-group row mt-3 pt-5" id="sActivity">
                <span class="btn portlet_label" style="top:-14px;left:15px;">Create Activity</span>	
                @csrf
                <div class=" col-lg-6 col-md-6 col-sm-6">
                    <label class="control-label" for="name">Activity Name</label>
                    <select name="c_activity_name" class="activityNameSelect2 clearSelect2"></select>
                    {{-- <input type="text" name="c_activity_name" class="form-control" > --}}
                    <div class="errorMessage"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6" >
                    <label class="control-label" for="branch_name">Budget</label>
                    <input type="text" name="c_activity_budget" class="form-control" >
                    <div class="errorMessage"></div>
                </div>
                <div class="col-lg-6 col-md-3 col-sm-6">
                    <label class="control-label" for="industry">Start Date</label>
                    <input type="text" autocomplete="off" name="c_activity_start_date" class="form-control datePickerEl">
                    <div class="errorMessage"></div>
                </div>
                <div class="col-lg-6 col-md-3 col-sm-6">
                    <label class="control-label" for="industry">End Date</label>
                    <input type="text"  autocomplete="off" name="c_activity_end_date" class="form-control datePickerEl">
                    <div class="errorMessage"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <label class="control-label" for="c_activity_user_id">Assigned To</label>
                    <select name="c_activity_user_id" class="userSelect2 clearSelect2">
                    </select>
                    <div class="errorMessage"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <label class="control-label" for="c_activity_user_id">Type</label>
                    <select name="c_activity_type" class="activityTypeSelect2 clearSelect2">
                    </select>
                    <div class="errorMessage"></div>
                </div>
                <div class="offset-lg-6 col-md-6 pt-3 text-right">
                    <button type="" class="btn btn-sm btn-pill btn-success" id="createNewActivity">
                        <i class="la la-plus"></i>Activity
                    </button>
                </div>
            </div>
        </div>
       
        <div class="col-lg-8 col-md-12">
            <div class="row custom-scroller">
                <div class="col-md-12 activityTemplate" id="ac-t-IdgoesHere">
                    <div class="c-table--container" style="background:white;">
                        <table style="width:100%" class="table kt-datatable__table">
                            <thead class="kt-datatable__head" style="background: #41bcf6 !important;
                            color: white;">
                                <tr>
                                    <th>Activity Name</th>
                                    <th>Activity Type</th>
                                    <th class="text-right">Budget</th>
                                    <th>Assigned To</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="activityTableBody">
                                @if(isset($campaign) && $campaign->activities->count())
                                    @foreach($campaign->activities as $key=>$activity)
                                    <tr class="activityTemplate" id="ac-id-{{$activity->id}}">
                                        <td>
                                            <input class="form-control" type="hidden" name="activity_id[]" value="{{$activity->id}}">
                                            <div class="shower">
                                               @if($activity->name){{$activity->name}}@endif
                                            </div>
                                            <div class="giver">
                                                <select name="activity_name[]" class="activityNameSelect2">
                                                    @if($activity->name)
                                                        <option value="{{$activity->name}}" selected="selected">
                                                            {{ucwords($activity->name)}}
                                                        </option>
                                                    @else 
                                                        <option value="" selected="selected">&nbsp</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="shower">
                                               @if($activity->type){{$activity->type}}@endif
                                            </div>
                                            <div class="giver">
                                                <select name="activity_type[]" class="activityTypeSelect2">
                                                    @if($activity->type)
                                                        <option value="{{$activity->type}}" selected="selected">
                                                            {{ucwords($activity->type)}}
                                                        </option>
                                                    @else 
                                                        <option value="" selected="selected">&nbsp</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="shower m-activity_budget">
                                               @if($activity->budget){{$activity->budget}}@else 0.00 @endif
                                            </div>
                                            <div class="giver">
                                                <input class="form-control m-activity_budget" type="text" name="activity_budget[]" value="@if($activity->budget){{$activity->budget}}@endif">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="shower">
                                                
                                               @if($activity->assignedTo){{ucwords($activity->assignedTo->name)}}@endif
                                            </div>
                                            <div class="giver">
                                                <select name="activity_user_id[]" class="userSelect2">
                                                    @if($activity->assignedTo)
                                                        <option value="{{$activity->assignedTo->id}}" selected="selected">
                                                            {{ucwords($activity->assignedTo->name)}}
                                                        </option>
                                                    @else 
                                                        <option value="" selected="selected">&nbsp</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="shower">
                                                @if($activity->start_date){{format_to_us_date($activity->start_date)}}@endif
                                            </div>
                                            <div class="giver">
                                                <input class="form-control datePickerEl2" type="text" name="activity_start_date[]" value="@if($activity->start_date){{format_to_us_date($activity->start_date)}}@endif">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="shower">
                                                @if($activity->end_date){{format_to_us_date($activity->end_date)}}@endif
                                            </div>
                                            <div class="giver">
                                                <input class="form-control datePickerEl2" type="text" name="activity_end_date[]" value=" @if($activity->end_date){{format_to_us_date($activity->end_date)}}@endif">
                                            </div>
                                        </td>
                                        <input type="hidden" name="activity_user_id[]" value="@if($activity->user_id){{$activity->user_id}}@endif">
                                        <td>
                                            <div class="shower">
                                                <a href="javascript:;"  class="btn btn-sm btn-icon btn-icon-sm editAct" data-target="#ac-id-{{$activity->id}}">
                                                    <i class="la la-edit"></i>
                                                </a>
                                                <a href="javascript:;"  class="btn btn-sm btn-icon btn-icon-sm delAct" data-target="#ac-id-{{$activity->id}}">
                                                    <i class="la la-trash"></i>
                                                </a>
                                            </div>
                                            <div class="giver">
                                                <a href="javascript:;"  class="btn btn-sm btn-icon btn-icon-sm applyEditAct" data-target="#ac-id-{{$activity->id}}">
                                                    <i class="la la-check text-success"></i>
                                                </a>
                                                <a href="javascript:;"  class="btn btn-sm btn-icon btn-icon-sm discardChangeAct" data-target="#ac-id-{{$activity->id}}">
                                                    <i class="la la-close text-danger"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                                @if(isset($campaign))
                                    <tr class="actEmptyRow @if(!$campaign->activities->count()) active @endif">
                                        <td colspan="5">
                                            <h6 class="text-success text-center"> No Activity Added!</h6>
                                        </td>   
                                    </tr>
                                @else 
                                    <tr class="actEmptyRow active">
                                        <td colspan="5">
                                            <h6 class="text-center"> No Activity Added!</h6>
                                        </td>   
                                    </tr> 
                                @endif
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
    initActivityAll();
    function initActivityAll()
    {

        $(".userSelect2").select2({
        width: '100%',
        placeholder: '\u200B',
        tags: true,
        ajax: {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: function (params) {
                return '/admin/campaign/users/select2Data'
            },
            processResults: function (data) {
                let res = [];
                $.each(data, function(i , obj){
                    res.push({
                        id: obj.id,
                        text : capitalizeFirstLetter(obj.name),
                        data : obj
                    });
                });
                return {
                    results: res
                };
            }
        }
    })

    $(".activityNameSelect2").select2({
        width: '100%',
        placeholder: '\u200B',
        tags: true,
        ajax: {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: function (params) {
                return '/admin/campaign/activityName/select2Data'
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
    $(".activityTypeSelect2").select2({
        width: '100%',
        placeholder: '\u200B',
        tags: true,
        ajax: {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: function (params) {
                return '/admin/campaign/activityType/select2Data'
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


        $("input[name=budget]").inputmask("currency");
        $("input[name=c_activity_budget]").inputmask("currency");
        $(".m-activity_budget").inputmask("currency");
        $('.datePickerEl2').daterangepicker({
            singleDatePicker: true,
            autoUpdateInput: false,
            showDropdowns: true,
            minYear: 2001,
            maxYear: parseInt(moment().format('YYYY'),10)
        }, function(start_date, end_date) {
            this.element.val(start_date.format("{{settingsValue('momentDateFormat')}}"));
        });
        
    }
    $('#createNewActivity').off('click').on('click',function(e){
        e.preventDefault();
        let userNameArr= {name: 'activity_user_name',value: $('#sActivity').find('.userSelect2').text().trim()};
        let data = $('#sActivity').find('select,textarea,input').serializeArray()
        data.push(userNameArr)
        supportAjax({
            url:"/admin/campaign/validate/activity",
            method:'POST',
            data
        },function(resp){
            $('#activityTableBody').append(makeActivityTemplate(actToArray(data)));
            initActivityAll()
            $('.actEmptyRow').removeClass('active');
            $('#sActivity').find('select,textarea,input').val('');
            $('.clearSelect2').val(null).trigger('change');
            
        },function(err){

        })
    })
    clickEvent('.editAct')(function(e){
        e.preventDefault();
        let template=  $(this).closest('.activityTemplate');
        pastData= $(this).closest('.activityTemplate').find(':input').serializeArray();
        $($(this).attr('data-target')).addClass('editMode');
    });
    clickEvent('.delAct')(function(e){
        e.preventDefault();
        $($(this).attr('data-target')).remove();
        let template=  $(this).closest('.activityTemplate');
        let id =template.find('[name="activity_id[]"').val();
        if(id){
            $('#activityTableBody').append(`
                <input name="deleted_activity_id[]" value="${id}" type="hidden"/>
                `);
        }
        if(! $('#activityTableBody').children('.activityTemplate').length){
            $('.actEmptyRow').addClass('active');
        }
    });


    clickEvent('.discardChangeAct')(function(e){
        e.preventDefault();
        $($(this).attr('data-target')).removeClass('editMode');
        let template=  $(this).closest('.activityTemplate');
        $(pastData).each(function(index, data){
            if(data.name == 'activity_type[]' || data.name == 'activity_name[]'|| data.name == 'activity_user_id[]'){
                template.find('[name="'+data.name+'"]').val(data.value).trigger('change')
            }
            template.find('[name="'+data.name+'"]').val(data.value);
        });
    });


    clickEvent('.applyEditAct')(function(e){
        e.preventDefault();
        let template=  $(this).closest('.activityTemplate');
        let userNameArr= {name: 'activity_user_name',value: template.find('.userSelect2').text().trim()};
        let dataArr = template.find(':input').serializeArray();
        dataArr.push(userNameArr)
        let data= actToArray(dataArr);
        template.replaceWith(makeActivityTemplate(data));
        $($(this).attr('data-target')).removeClass('editMode');
        initActivityAll()
    });
    function actToArray(array)
    {
        let arr={};
        $(array).each(function(i, field){
            arr[field.name.replace("c_", "").replace('[]','')] = field.value;
        });
        return arr;
    }
    function makeActivityTemplate(data){
        let uniqueId= data.activity_id?data.activity_id:Date.now();
        let template=`
            <tr class="activityTemplate" id="ac-id-${uniqueId}">
                <td>
                    <input class="form-control" type="hidden" name="activity_id[]" value="${(typeof data.activity_id !=="undefined")?data.activity_id:''}">
                    <div class="shower">
                        ${data.activity_name?data.activity_name:''}
                    </div>
                    <div class="giver">
                        <select name="activity_name[]" class="activityNameSelect2">
                            `;
            if(data.activity_name)
                template+=`
                        <option value="${data.activity_name}" selected="selected">
                            ${capitalizeFirstLetter(data.activity_name)}
                        </option>  
                `;
            template+=`                            
                        </select>
                    </div>
                </td>
                <td>
                    <div class="shower">
                        ${data.activity_type?data.activity_type:''}
                    </div>
                    <div class="giver">
                        <select name="activity_type[]" class="activityTypeSelect2">
                            `;
            if(data.activity_type)
                template+=`
                        <option value="${data.activity_type}" selected="selected">
                            ${capitalizeFirstLetter(data.activity_type)}
                        </option>  
                `;
            template+=`                            
                        </select>
                    </div>
                </td>
                <td>
                    <div class="shower  m-activity_budget">
                        ${data.activity_budget?data.activity_budget:''}
                    </div>
                    <div class="giver">
                        <input class="form-control m-activity_budget" type="text" name="activity_budget[]" value="${data.activity_budget?data.activity_budget:''}">
                    </div>
                </td>
                <td>
                    <div class="shower">
                        ${data.activity_user_id?data.activity_user_name:''}
                    </div>
                    <div class="giver">
                        <select name="activity_user_id[]" class="userSelect2">
                            `;
            if(data.activity_user_id)
                template+=`
                            <option value="${data.activity_user_id}" selected="selected">
                                ${data.activity_user_name?capitalizeFirstLetter(data.activity_user_name):''}
                            </option>  
                `;
            template+=`                            
                        </select>
                    </div>
                </td>
                <td>
                    <div class="shower">
                        ${data.activity_start_date?data.activity_start_date:''}
                    </div>
                    <div class="giver">
                        <input class="form-control datePickerEl2" type="text" name="activity_start_date[]" value="${data.activity_start_date?moment(data.activity_start_date).format("{{settingsValue('momentDateFormat')}}"):''}">
                    </div>
                </td>
                <td>
                    <div class="shower">
                        ${data.activity_end_date?data.activity_end_date:''}
                    </div>
                    <div class="giver">
                        <input class="form-control datePickerEl2" type="text" name="activity_end_date[]" value="${data.activity_end_date? moment(data.activity_end_date).format("{{settingsValue('momentDateFormat')}}"):''}">
                    </div>
                </td>
                <td>
                    <div class="shower">
                        <a href="javascript:;"  class="btn btn-sm btn-icon btn-icon-sm editAct" data-target="#ac-id-${uniqueId}">
                            <i class="la la-edit"></i>
                        </a>
                        <a href="javascript:;"  class="btn btn-sm btn-icon btn-icon-sm delAct" data-target="#ac-id-${uniqueId}">
                            <i class="la la-trash"></i>
                        </a>
                    </div>
                    <div class="giver">
                        <a href="javascript:;"  class="btn btn-sm btn-icon btn-icon-sm applyEditAct" data-target="#ac-id-${uniqueId}">
                            <i class="la la-check text-success"></i>
                        </a>
                        <a href="javascript:;"  class="btn btn-sm btn-icon btn-icon-sm discardChangeAct" data-target="#ac-id-${uniqueId}">
                            <i class="la la-close text-danger"></i>
                        </a>
                    </div>
                </td>
            </tr>
        `;
        return template;
    }

    
</script>