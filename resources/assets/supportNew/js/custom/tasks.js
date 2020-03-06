//update task
clickEvent(".editTask")(taskUpdate)
clickEvent(".btnUpdatDetail")(taskDetailUpdate)
function taskUpdate(){
    showModal({
        url: $(this).attr("data-url"),
        c: 1
    });
}
function taskDetailUpdate(){
    showModal({
        url: $(this).attr("data-url"),
        c: 1
    });
}


//task detail

clickEvent(".btnEditDesc")(updateDescription)
clickEvent(".editConclusion")(updateConclusion)
clickEvent("#updateDesc")(updateTaskDescription)
clickEvent("#updateConclusion")(updateTaskConclusion)
submitEvent("#taskDetailUpdateForm")(submitTaskDetail)


clickEvent(".clearForm")(clearForm)


function submitTaskDetail(e){
    e.preventDefault();
    e.stopPropagation();
    console.log($(this).serializeArray());
    supportAjax({
        url:"/admin/tasks/detail/update",
        method:"post",
        data:$(this).serializeArray()
    },(response)=>{
        toastr.success(response.message);
        routeExecute(location.hash);
        $('#cModal1').modal('hide');
    },({responseJSON}) =>{
        toastr.error(responseJSON.errors);
    });
}

function updateDescription(){
    let data = {id:$(this).attr("data-id"), desc:$(this).attr("data-value")};
    $(document).find(".task_description_"+data.id).empty().append(textareaTemp(data));
}
function updateConclusion(){
    let data = {id:$(this).attr("data-id"), desc:$(this).attr("data-value")};
    $(document).find(".task_conclusion_"+data.id).empty().append(textareaConclusion(data));
}

function textareaTemp(data) {
    console.log(data);
    return `
    <form>
    <input type="hidden" name="id" value="${data.id}">
    <textarea placeholder="Write Descripion..." 
        class="form-control mb-10 cardTextarea"
        style="height: 60px;
        margin-top: 0px;
        margin-bottom: 10px;
        resize: none;
        min-height: 60px;
        overflow-y: hidden;" 
        oninput="auto_grow(this)" 
        name="description">${data.desc}</textarea>
        <button type="submit" class="btn btn-success btn-sm" id="updateDesc">Submit</button>
        <button type="button" class="btn cbtn-default btn-sm clearForm" style="border: 1px solid #e2e5ec;" data-id="${data.id}" data-value="${data.desc}">cancel</button>
    </form>
    `;
}

function textareaConclusion(data) {
    console.log(data);
    return `
    <form>
    <input type="hidden" name="id" value="${data.id}">
    <textarea placeholder="Write Descripion..." 
        class="form-control mb-10 cardTextarea"
        style="height: 60px;
        margin-top: 0px;
        margin-bottom: 10px;
        resize: none;
        min-height: 60px;
        overflow-y: hidden;" 
        oninput="auto_grow(this)" 
        name="conclusion">${data.desc}</textarea>
        <button type="submit" class="btn btn-success btn-sm" id="updateConclusion">Submit</button>
        <button type="button" class="btn cbtn-default btn-sm clearForm" style="border: 1px solid #e2e5ec;" data-id="${data.id}" data-value="${data.desc}">cancel</button>
    </form>
    `;
}
function updateTaskDescription(e){
    e.preventDefault();
    e.stopPropagation();
    console.log($(this).parent().serializeArray());
    supportAjax({
        url:'/admin/tasks/update/description',
        data:$(this).parent().serializeArray(),
        method:"POST",
    },(response) => {
        $(document).find(".btnEditDesc").attr("data-value",response.data.description);
        $(this).closest(".task_description_"+response.data.id).empty().append(`<p>${response.data.description}</p>`);
        toastr.success(response.message);
    },({responseJSON}) => {
        console.log(responseJSON.errors);
    });
}
function updateTaskConclusion(e){
    e.preventDefault();
    e.stopPropagation();
    supportAjax({
        url:'/admin/tasks/update/conclusion',
        data:$(this).parent().serializeArray(),
        method:"POST",
    },(response) => {
        $(document).find(".editConclusion").attr("data-value",response.data.conclusion);
        $(this).closest(".task_conclusion_"+response.data.id).empty().append(`<p>${response.data.conclusion}</p>`);
        toastr.success(response.message);
    },({responseJSON}) => {
        console.log(responseJSON.errors);
    });
}

function clearForm(){
    let data = $(this).attr("data-value");
    $(this).closest(".task_description_"+$(this).attr("data-id")).empty().append(data);
    $(this).closest(".task_conclusion_"+$(this).attr("data-id")).empty().append(data);
}