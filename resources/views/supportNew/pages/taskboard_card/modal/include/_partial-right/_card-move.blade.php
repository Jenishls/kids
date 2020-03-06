<style>
.custom{
    background: #ffffff;
    position: absolute;
    left: 0;
    border-left: 1px solid #fafafa;
    border-bottom: 1px solid #fafafa;
    -webkit-box-shadow: 2px 3px 9px 3px rgba(224,224,224,0.67);
    -moz-box-shadow: 2px 3px 9px 3px rgba(224,224,224,0.67);
    box-shadow: 2px 3px 9px 3px rgba(224,224,224,0.67);
    padding: 11px;
    z-index: 1;
    top: 35px;
    width: 100%;
 }
</style>
<li class="card-move" title="Move Card" style="position:relative">
    <button type="button" class="btn action-button btn-move"><i class="la la-arrow-right"></i> Move</button>
    <div class="card-move-custom custom" style="display:none" >
        <form class="form-group m-t-10" id="formTaskboardCardMove">
            <div class="kt-checkbox-list">
                <input type="hidden" name="taskboard_id" value="{{$card->taskboardList->taskboard->id}}">
                <input type="hidden" name="id" value="{{$card->id}}">
                <label for="taskboard_list_id">Taslboard</label>
                <select class="form-control taskboard" name="taskboard_id">
                    <option value="{{$card->taskboardList->taskboard->id}}">{{$card->taskboardList->taskboard->title}}</option>
                </select>
                    <label for="taskboard_list_id">Taslboard List</label>
                <select class="form-control taskboard_list" name="taskboard_list_id" data-url="/admin/taskboardlist/fetch/{{$card->taskboardList->taskboard->id}}"></select>
            </div>
        </form>
        <div style="display:flex; justify-content:space-between">
            <button type="button" class="btn btn-outline-success  btn-sm m-t-10" id="btnTaskboardCardMove">Move</button>
            <button type="button" class="btn btn-outline-danger  btn-sm m-t-10 closeBox">Cancel</button>
        </div>
    </div>
</li>

<script>
$(".btn-move").on("click",function() {
    $(".card-move-custom").toggle();
    $(document).find(".card-copy-custom").hide();
    $(document).find(".card-archive").hide();
});
$(".closeBox").on("click",function() {
    $(".card-move-custom").hide();
});
   $(document).find('.taskboard').select2({
            placeholder: 'Select',
            width: '100%',
            ajax: {
                method: 'get',
                url: '/taskboard/fetch/',
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
        }).on("change",function(e){
            $(".taskboard_list").attr("data-url","/admin/taskboardlist/fetch/"+e.target.value);
        });
        
        $(document).find('.taskboard_list').select2({
            placeholder: 'Select',
            width: '100%',
            ajax: {
                method: 'get',
                url: function(){
                    return $(this).attr("data-url");
                },
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
        });
</script>