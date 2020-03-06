//global open modal
$(document).off("click",".openModel").on("click",".openModel",function(e){
	e.preventDefault();
	e.stopPropagation();
	showModal({
		url: $(this).attr("data-url"),
		c:1,
    });
});

//open sub modal
$(document).off("click",".subModel").on("click",".subModel",function(e){
	e.preventDefault();
	e.stopPropagation();
	showModal({
		url: $(this).attr("data-url"),
        c:2,
        p:1
    });
});

//refresh page after success currente URL
function routeExecute(currentRoute){
    pageload(currentRoute.replace("#",""));
}

//sortable taskboard card
function sortableCardTableView(){

    $(document).find(".sortable").sortable({
        containment: "parent",
        cursor: "move",
        opacity: 1,
        delay: 100,
        dropOnEmpty: true,
        placeholder: "movable-placeholder",
        start: function(e, ui) {
            ui.placeholder.height(ui.helper.outerHeight());
            ui.placeholder.width(ui.helper.outerWidth());
        }
    });

    $(document).find('.kanban-drag').sortable({
        containment: "window",
        dropOnEmpty: true,
        connectWith: ['.kanban-drag'],
        placeholder: "movable-placeholder",
        start: function(e, ui) {
            ui.placeholder.height(ui.helper.outerHeight());
            ui.placeholder.width(ui.helper.outerWidth());
        },
        stop:function(e, ui) {

          let container = $(ui.item).closest(".kanban-board");
          let cards = [];

          $(`#${$(container).attr("id")} .kanban-drag .card-items`).each((index, value) => {
              cards.push({id:$(value).attr("data-id"), taskboard_list_id:$(value).attr("data-parent")});
          });
          supportAjax({
                url: "/admin/taskboardcard/update/sequence",
                method: "POST",
                loader:true,
                data: {cards, targetTaskboardListId:$(container).attr("data-id"), current_card_id:$(ui.item).attr("data-id")}
            }, (resp) => {
                routeExecute(location.hash);
                toastr.success(resp.message);
            }, ({responseJSON}) => {
                toastr.error(responseJSON.errors);
            });
        }
    }); 
    // $(document).find(".m-testing").sortable(); 
    // $(document).find(".m-tested-clsoed").sortable();
    // $(document).find(".newListAdd").sortable("disable");
}



//taskboard CRUD    
clickEvent("#btnTaskboardCreate")(taskboardCreate)
clickEvent("#btnTaskboardUpdate")(taskboardUpdate)
clickEvent(".btnTaskboardDelete")(taskboardDelete)

//taskboardList CRUD    
clickEvent("#btnTaskboardListCreate")(taskboardListCreate)
clickEvent("#btnTaskboardListUpdate")(taskboardListUpdate)
clickEvent("#btnTaskboardListDelete")(taskboardListDelete)

//taskboard Card CRUD
clickEvent(".card_title_container")(taskboardCardTitle)
blurEvent("#btnTaskboardCardTitle")(taskboardCardTitleUpdate)
clickEvent("#btnTaskboardCardAttachmentUpdate")(taskboardCardAttachment)
clickEvent("#btnTaskboardCardMove")(taskboardCardMove)
clickEvent("#btnTaskboardCardCopy")(taskboardCardCopy)
clickEvent("#btnTaskboardCardArchive")(taskboardCardArchive)
clickEvent("#btnTaskboardCardDescription")(taskboardCardDescription)
clickEvent("#btnTaskboardCardDescriptionCancel")(taskboardCardDescriptionCancel)
clickEvent(".btnTaskboardCardEditDescription")(taskboardCardEditForm)

clickEvent("#btnTaskboardCardCommentSubmit")(taskboardCardComment)
clickEvent("#btnTaskboardCardCommentFormClear")(taskboardCardCommentClear)

clickEvent(".btnTaskboardCardCommentEdit")(taskboardCardCommentEdit)
clickEvent(".btnTaskboardCardCommentUpdate")(taskboardCardCommentUpdate)
clickEvent("#btnTaskboardCardCommentDelete")(taskboardCardCommentDelete)

clickEvent(".btnTaskboardCardNew")(taskboardCardNew)

//file view and download
clickEvent(".downloadFile")(downloadFile)
clickEvent(".viewFile")(viewFile)




//function for taskboad create()
function taskboardCreate(){
    supportAjax({
        url:'/admin/taskboard/create',
        method: 'POST',
        data: $("#taskboardForm").serializeArray(),
    },(response) =>{
        $('#cModal1').modal('hide');
        routeExecute(location.hash);
        toastr.success(response.message);
    },({responseJSON})=>{
        $("#taskboardForm input#board_name").css("border","1px solid red");
        toastr.error(responseJSON.errors.title);
    });
}
//function for taskboad update()
function taskboardUpdate(){
    supportAjax({
        url:'/admin/taskboard/update',
        method: 'POST',
        data: $("#taskboardUpdateForm").serializeArray(),
    },(response) =>{
        $('#cModal1').modal('hide');
        routeExecute(location.hash);
        toastr.success(response.message);
    },({responseJSON})=>{
        $("#taskboardUpdateForm input#board_name").css("border","1px solid red");
        toastr.error(responseJSON.errors.title);
    });
}

//taskboard delete()
function taskboardDelete(){
    supportAjax({
        url:'/admin/taskboard/delete',
        data:{id:$(this).attr("data-id")},
        method:"POST",
    },(response) =>{
        $('#cModal1').modal('hide');
        routeExecute(location.hash);
        toastr.success(response.message);
    },({responseJSON}) => {
        toastr.error(responseJSON.errors);
    });
}

//taskboard list create()
function taskboardListCreate(){
    $.ajax({
        url:'/admin/taskboardlist/create',
        method: 'POST',
        data: $("#taskboardListForm").serializeArray(),
        success: function(response){
            $('#cModal1').modal('hide');
            routeExecute(location.hash);
            toastr.success(response.message);
        }, 
        error:function({status, responseJSON}){
            toastr.error(responseJSON.errors)
        }
    });
}
//taskboard list update()
function taskboardListUpdate(){
    $.ajax({
        url:'/admin/taskboardlist/update',
        method: 'POST',
        data: $("#taskboardListUpdateForm").serializeArray(),
        success: function(response){
            $('#cModal1').modal('hide');
            routeExecute(location.hash);
            toastr.success(response.message);
        }, 
        error:function({status, responseJSON}){
            toastr.error(responseJSON.errors)
        }
    });
}
//taskboard delete()
function taskboardListDelete(){
    supportAjax({
        url:'/admin/taskboardlist/delete',
        data:{id:$(this).attr("data-id")},
        method:"POST",
    },(response) =>{
        $('#cModal1').modal('hide');
        routeExecute(location.hash);
        toastr.success(response.message);
    },({responseJSON}) => {
        toastr.error(responseJSON.errors);
    });
}

//taskboard description update
function taskboardCardDescription(e) {
    e.preventDefault();
    e.stopPropagation();
    supportAjax({
        url:"/taskboardcard/update/description",
        method:"POST",
        data:$(".descriptionCreateForm").serializeArray(),
    },(response) =>{
       $(this).closest(".card-description__content").empty().append(templateDescription(response.card));
    },({responseJSON}) =>{
        $("textarea[name='description']").css('border','1px solid red');
        toastr.error(responseJSON.errors);
    })
}
//taskboard description update
function taskboardCardDescriptionCancel(e) {
    e.preventDefault();
    e.stopPropagation();
    if($(this).attr("data-value")){
    
        $(this).closest(".card-description__content").empty().append(templateDescription({id:$(this).attr("data-id"),description:$(this).attr("data-value")}));
    }else{
        $(".descriptionCreateForm").trigger('reset');
    }
}


//taskboard description update
function taskboardCardComment(e) {
    e.preventDefault();
    e.stopPropagation();
    supportAjax({
        url:'/taskboardcard/comment/create',
        method:"POST",
        data:$("#commentCreateForm").serializeArray(),
    },(response) =>{
        let comment =  templateComment(response.comments);
           $(".comment-all-container").empty().append(comment);
           $("textarea[name='comment']").css('border','1px solid #e2e5ec');
           $("#commentCreateForm").trigger('reset');
    },({responseJSON}) =>{
        toastr.error(responseJSON.errors.comment);
        $("textarea[name='comment']").css('border','1px solid red');
    })
}
//comment form clear
function taskboardCardCommentClear(){
    $(document).find("#commentCreateForm").trigger('reset');
}

//comment update
function taskboardCardCommentEdit(){
    $(document).find(`.comment_${$(this).attr("data-id")}`).empty().append(`<input type="text" class="form-control newComment m-b-15" data-id="${$(this).attr("data-id")}" value="${$(this).attr("data-value")}">`);
    $(this).removeClass("btnTaskboardCardCommentEdit").addClass("btnTaskboardCardCommentUpdate").text("Update");
}
//update to database
function taskboardCardCommentUpdate(e){
    e.preventDefault();
    let comment = $(`.comment_${$(this).attr("data-id")}`).children("input.newComment").val();
    let id = $(this).attr("data-id");
    supportAjax({
        url:'/taskboardcard/comment/update',
        method:"POST",
        data:{id,comment},
    },(response) =>{
        $(`.comment_${response.data.id}`).empty().append(`<p>${response.data.comment}</p>`);
        $("input.newComment").css('border','1px solid #e2e5ec');
        $(`#commentEdit${response.data.id}`).text("Edit").removeClass("btnTaskboardCardCommentUpdate").addClass("btnTaskboardCardCommentEdit").attr("data-value",response.data.comment);
    },({responseJSON}) =>{
        toastr.error(responseJSON.errors);
        $("input.newComment").css('border','1px solid red');
    })
}
//card comment delete 
function taskboardCardCommentDelete(e){
    e.preventDefault();

    supportAjax({
        url:'/taskboardcard/comment/delete',
        method:"POST",
        data:{id:$(this).attr("data-id")},
    },(response) =>{
        $("#cModal2").modal("hide");
        $("#comment"+response.data.id).remove();
    },({responseJSON}) =>{
        toastr.error(responseJSON.errors);
    })
}
//add new card
function taskboardCardNew(){
    $("#addCard"+$(this).attr("data-id")).trigger("click");
}
//card description form
function taskboardCardEditForm(){
    $(this)
    .closest(".card_action_container")
    .empty()
    .append(templateDescriptionForm($(this).attr("data-id"),$(this).attr("data-value")));
}

//comment template
function templateComment(data) {
    let template = "";
    $.each(data,(index, value) =>{
        template += `
            <div class="comment-all" id="comment${value.id}">
                <div class="comment-all__user-image">
                    <img src="/images/default.jpg" alt="img" title="${value.user.full_name}">
                </div>
                <div class="comment-all__content">
                    <p class="user_name">${value.user.full_name}<span class="comment_time"> ${moment(value.created_at).fromNow()}</span></p>
                    <div class="comment_${value.id}"><p class="comment">${value.comment}</p></div>
                    <div class="comment-all__action">
                        <a href="javascript:void(0)" class="btnTaskboardCardCommentEdit" id="commentEdit${value.id}" data-id="${value.id}" data-value="${value.comment}">Edit</a>
                        <a href="javascript:void(0)" data-url="taskboardcard/comment/${value.id}" class="btnTaskboardCardCommentDelete subModel" data-id="${value.id}">Delete</a>
                    </div>
                </div>
            </div>
        `;
    });
    return template;
}

$(document).off("submit",".cardCreateForm").on("submit",".cardCreateForm",createNewCardList);
$(document).off("submit",".descriptionCreateForm").on("submit",".descriptionCreateForm",updateDescription)


function downloadFile(){
    let path = $(this).attr("data-file");
    window.open('/download/'+path);
}
function viewFile(){
    let path = $(this).attr("data-file");
    window.open('/view/'+path);
}
//card title update
function taskboardCardTitle(){
   $(this).parent().empty().append(`<input type="text" name="title" style="width: 504px;margin-left: 10px;margin-bottom: 4px;" class="form-control" id="btnTaskboardCardTitle" data-id="${$(this).attr("data-id")}" value="${$(this).text()}">`);
}

//card title update 
function taskboardCardTitleUpdate(){
    supportAjax({
        url:"/taskboardcard/title",
        data:{id:$(this).attr("data-id"),title:$(this).val()},
        method:"POST",
    },(response) =>{
        $(this).parent().empty().append(`<h4 class="title card_title_container" data-id="${response.data.id}">${response.data.title}</h4>`);
        routeExecute(location.hash);
        toastr.success(response.message);
    },({responseJSON})=>{
        $("input[name='title']").css("border","1px solid red");
        toastr.error(responseJSON.errors.title);
    });
}
//card attachment
function taskboardCardAttachment(){
    supportAjax({
        url:'taskboardcard/attachments/upload',
        method:"POST",
        data:$("#cardAttachmentForm").serializeArray(),
        loader:true,
    },(resp) => {
        toastr.success(resp.message);
        $(document).find(".card_attachments_content").empty().append(templateCardAttachment(resp.attachments));
        $(document)
        .find(".dropzone")
        .children()
        .remove();
        $(document)
        .find(".dropzone")
        .siblings("input[name='paths[]']")
        .remove();
        $(document)
        .find(".dropzone")
        .append(`
            <div class="dropzone-msg dz-message needsclick">
                <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                <span class="dropzone-msg-desc">Only image, pdf and psd files are allowed for upload</span>
            </div>`);

    },({responseJSON}) => {
        toastr.error(responseJSON.errors);
    })
}

//taskboard card move

function taskboardCardMove(e){
    e.preventDefault();
    e.stopPropagation();
    let data = $("#formTaskboardCardMove").serializeArray();
    let valid = false;
    $.each(data,(index, value)=>{
        if(value.name =="taskboard_list_id"){
            valid = true;
            return;
        }
    });
    if(valid){
        supportAjax({
            url:"/taskboardcard/move",
            data,
            method:"POST",
        },(response) =>{
            $("#cModal1").modal("hide");
            routeExecute(location.hash);
            toastr.success(response.message);
        },({responseJSON})=>{
            toastr.error(responseJSON.errors);
        });
    }
}
//taskboard card copy()

function taskboardCardCopy(e){
    e.preventDefault();
    e.stopPropagation();
    let data = $("#formTaskboardCardCopy").serializeArray();
    let valid = false;
    $.each(data,(index, value)=>{
        if(value.name =="taskboard_list_id"){
            valid = true;
            return;
        }
    });
    if(valid){
        supportAjax({
            url:"/taskboardcard/copy",
            data,
            method:"POST",
        },(response) =>{
            $("#cModal1").modal("hide");
            routeExecute(location.hash);
            toastr.success(response.message);
        },({responseJSON})=>{
            toastr.error(responseJSON.errors);
        });
    }
}
//taskboaard card archive
function taskboardCardArchive(e){
    e.preventDefault();
    e.stopPropagation();
        supportAjax({
            url:"/taskboardcard/archive",
            data:{id:$(this).attr("data-id")},
            method:"POST",
        },(response) =>{
            $("#cModal1").modal("hide");
            routeExecute(location.hash);
            toastr.success(response.message);
        },({responseJSON})=>{
            toastr.error(responseJSON.errors);
        });
}

function templateCardAttachment(data) {
    let template = "";
   $.each(data,function(index,value) {
        template+=`
        <tr>
            <td style="width:30px">${index+1}</td>
            <td>${value.file_name}</td>`;
            if(value.extension){
                template+=`<td><img src="/file/placeholder/${value.extension}" height="30" title="${value.file_name}" class="kt-widget__img kt-hidden-"></td>`;
            }else{
                template+=`<td><img src="/images/file-icon/file.svg" height="60" title="${value.file_name}" class="kt-widget__img kt-hidden-"></td>`;
            }
            template+=`
            <td style="width:100px;">
                <button type="button" class="btn btn-outline-brand btn-elevate btn-circle btn-icon btn-xs viewFile" title="View File" data-file="${value.path}"><i class="la la-eye"></i></button>
                <button type="button" class="btn btn-outline-brand btn-elevate btn-circle btn-icon btn-xs downloadFile" title="Download File" data-file="${value.path}"><i class="la la-cloud-download"></i></button>
            </td>
        </tr>
        `;
   });
   return template;
}
function templateDescriptionForm(id,value){
    let html = `<div class="card-description__content m-t-20">
        <form id="" class="descriptionCreateForm description_form_${id}">
            <input type="hidden" name="id" value="${id}">
            <textarea placeholder="Write Descripion..." 
                class="form-control mb-10 cardTextarea"
                style="height: 60px;
                margin-top: 0px;
                margin-bottom: 10px;
                resize: none;
                min-height: 60px;
                overflow-y: hidden;" 
                oninput="auto_grow(this)" 
                name="description">${value}</textarea>
                <button type="submit" id="btnTaskboardCardDescription" data-id="${id}" class="btn btn-success btn-sm">Submit</button>
                <button type="button" id="btnTaskboardCardDescriptionCancel"  data-id="${id}" data-value="${value}" class="btn cbtn-default btn-sm hideForm">cancel</button>
        </form>
    </div>`;
    return html;
}
function updateDescription(e){
    e.preventDefault();
    e.stopPropagation();
    supportAjax({
        url:'/taskboardcard/update',
        data:$(this).serializeArray(),
        method:'POST',
        loader:true,
    },(resp)=>{
        $(this).closest(".card_action_container").append(templateDescription(resp.card));
        $(this).parent().hide();
    },({responseJSON})=>{
        toaster.error(responseJSON.errors);
    });
}

function templateDescription(data){
    let template = `
    <p class="card-description__content" style="padding-left:0">${data.description}</p>
    <div class="card-description__action" style="padding-left:0">
        <a href="javascript:void(0)" data-value="${data.description}" class="btnTaskboardCardEditDescription" data-id="${data.id}">Edit</a>
    </div>
    `;
    return template;
}

function taskDescription(element) {
    if($(element).val()){
        if(element.scrollHeight < 140){
            element.style.height = "140px";
        }else{
            element.style.height = element.scrollHeight + "px";
        }
    }else{
        element.style.height = "140px";
    }
}
function taskNote(element) {
    if($(element).val()){
        if(element.scrollHeight < 60){
            element.style.height = "60px";
        }else{
            element.style.height = element.scrollHeight + "px";
        }
    }else{
        element.style.height = "60px";
    }
}
function auto_grow(element) {
    if($(element).val()){
        if(element.scrollHeight < 60){
            element.style.height = "60px";
        }else{
            element.style.height = element.scrollHeight + "px";
        }
    }else{
        element.style.height = "60px";
    }
}


function createNewCardList(e){
    e.preventDefault();
    e.stopPropagation();
    $.ajax({
        url:'/admin/taskboardcard/create',
        method: 'POST',
        data: $(this).serializeArray(),
        success: function(response){
            routeExecute(location.hash);
            toastr.success(response.message);
        }, 
        error:function({status, responseJSON}){
            toastr.error(responseJSON.errors)
        }
    });
}
$(document).off("click",".cardTextarea").on("click",".cardTextarea",function(e){
    e.preventDefault();
    e.stopPropagation();
})