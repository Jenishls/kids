//click events
clickEvent("#btnProjectCreate")(projectCreate)
blurEvent("#checkProjectName")(projectCheckName)
blurEvent("#checkProjectUrl")(projectCheckUrl)
clickEvent("#btnProjectUpdate")(projectUpdate)


function projectCreate(e){
    e.preventDefault();
    supportAjax({
        url:'/admin/project/create',
        method:'POST',
        data:$("#projectAddForm").serializeArray(),
    },(response)=>{
        $("#cModal1").modal("hide");
        routeExecute(location.hash);
    },({responseJSON}) =>{
        toastr.error(responseJSON.errors);
    });
}

function projectCheckName(){
    let self = $(this);
    if($(this).attr("data-id")){
        return;
    }else{
        supportAjax({
            url:'/admin/project/check',
            method:'POST',
            data:{field:'title',value:$(this).val()},
        },(response)=>{
            $(self).siblings("label").children(".warning-msg").text("");
        },({responseJSON}) =>{
            $(self).siblings("label").children(".warning-msg").text(responseJSON.errors);
            toastr.error(responseJSON.errors);
        });

    }
}
function projectCheckUrl(){
    let self = $(this);
        supportAjax({
            url:'/admin/project/check',
            method:'POST',
            data:{field:'url',value:$(this).val()},
        },(response)=>{
            $(self).siblings("label").children(".warning-msg").text("");
        },({responseJSON}) =>{
            $(self).siblings("label").children(".warning-msg").text(responseJSON.errors);
            toastr.error(responseJSON.errors);
        });
}

function projectUpdate(e){
    e.preventDefault();
    let data = $("#projectAttachmentSection").find(':input').serializeArray();
    supportAjax({
        url:'/admin/project/update/attachments',
        method:'Post',
        data
    }, function(resp){
        $('#cModal1').modal('hide');
        routeExecute(location.hash);
        if(!resp) return; 
        toastr.success(resp.message);
    });
}