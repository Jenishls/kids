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
 }
 ul.card_member{
    padding: 10px 0;
 }
 ul.card_member li{
    list-style: none;
    border-bottom: 1px solid #efeded;
    padding: 10px 0 5px 0;
    cursor: pointer;
 }
 
 </style>
 <li class="card-assign-member" title="Assign Members" style="position:relative">
    <button type="button" class="btn action-button"><i class="la la-user"></i> Member</button>
    <div class="card-members-list custom" style="display:none" >
        <input type="text" name="member" data-board-id = "" data-card-id="{{$card->id}}" class="form-control m-input form-control-sm input-member-search" placeholder="Search members...">
        <form class="form-group m-t-10" id="formTaskboardMember">
            <div class="kt-checkbox-list">
                <input type="hidden" name="taskboard_id" value="{{$card->taskboardList->taskboard->id}}">
                @if(count($users)>0)
                    @foreach($users as $user)
                    <label class="kt-checkbox">
                        <input type="checkbox" checked name="member[]" value="{{$user->id}}"> {{$user->fullname()}}
                        <span></span>
                    </label>
                    @endforeach
                @else 
                    <p>No Users</p>
                @endif
            </div>
        </form>
    <button type="button" class="btn btn-outline-success  btn-sm m-t-10" id="btnSaveMember">Save</button>
    </div>
</li>

<script>
$(".card-assign-member").on("click",function() {
    $(".card-members-list").toggle();
});
$("#btnSaveMember").on("click",function(e) {
e.preventDefault();
e.stopPropagation();
    let data = $("#formTaskboardMember").serializeArray();
    supportAjax({
        url:"/taskboard/members/",
        data:data,
        method:"POST"
    },(resp) => {
        $(".card-members-list").toggle();
       $("#cardMembersContainer").empty().append(tempMembers(resp.data));
    },({responseJSON}) => {
        console.log(responseJSON.errors);
    });
});


function tempMembers(data) {
    let temp = "";
    if(data.length>4){
        $.each(data,(index, value) =>{
            if(index<4){
                temp+=`
                    <a href="javascript:void(0)" class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Selina Cranson">
                        <img src="/images/default.jpg" alt="image" title="${value.full_name}">
                    </a>
                `;
            }
        });
        temp+=`
        <a href="#" class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Micheal York">
            <span>${data.length - 3}</span>
        </a>
        `;
    }else{
        $.each(data,(index, value) =>{
            temp+=`
                <a href="javascript:void(0)" class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Selina Cranson">
                    <img src="/images/default.jpg" alt="image" title="${value.full_name}">
                </a>
            `;
        });
        temp+=`
        <a href="javascript:void(0)" class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Micheal York">
            <span>+0</span>
        </a>
        `;
    }
    return temp;
}
</script>