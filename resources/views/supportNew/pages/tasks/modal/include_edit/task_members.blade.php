<div class="row" id="branchFormContainer">
    <div class="col-md-12 col-sm-12">
     <div class="kt-portlet kt-portlet--mobile">
       <div class="kt-portlet__body pt-0 px-3">
          <div class="row">
              <div class="col-md-12">
                  <div style="display:flex" class="m-t-15 m-b-15">
                     <select class="memberLookup"></select>
                     <button type="button" class="btn btn-outline-brand btn-icon btn-circle btn-xs" style="margin: 6px 0 6px 10px;"><i class="fa fa-plus"></i></button>
                  </div>
              </div>
          </div>
 
          <div class="row">
              <div class="col-md-12">
                  <div id="memberDatatable" data-task="{{$task->id}}"></div>
              </div>
          </div>
       </div>
     </div>
   </div>
 </div>
 <script>
 $(".memberLookup").select2({
     width:"100%",
     placeholder:"Select"
 });
 var taskId = $('#memberDatatable').attr("data-task");
 console.log(taskId);
 var taskDatatable = $('#memberDatatable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/users/list?task_id='+taskId,
                    method: 'get',
                    map: function(raw) {
                        // sample data mapping
                        var dataSet = raw;
                        if (typeof raw.data !== 'undefined') {
                            dataSet = raw.data;
                        }
                        return dataSet;
                    },
                },
            },
            pageSize: 50,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
            //saveState: true 
        },
        // layout definition
        layout: {
            scroll: false,
            footer: false,
        },
        // column sorting
        sortable: true,
        pagination: true,
        // columns definition
        columns: [
         {
             field: 'id',
             title: '#',
             width: 20,
             sortable:false,
             class: 'kt-datatable--off-click_over_action_btn',
             selector : {
                    class: 'kt-checkbox--solid grab_item'
                },
            template:function(row){
                return `
                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid grab_item"><input type="checkbox" ${row.ismember?'checked':''} value="${row.id}" name="members[]">&nbsp;<span></span></label>
                `;
            }
        },
            {
                // sortable: true,
                field: 'name',
                title: 'Name',
                width: 200,
 
            },
            {
                field: 'email',
                title: 'Email',
            },
        ],
    });
 
   
 </script>
 
 
 