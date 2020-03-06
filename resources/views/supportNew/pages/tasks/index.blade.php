<style>
    @media screen and (max-width: 1023px){
       .custom__offset {
           margin-left: 5.5%!important;
           padding-top: 10px!important;
       }
   }
   .project_search .bootstrap-select > .dropdown-toggle {
        padding: 0.50rem 0.60rem!important;
        font-size: 0.9rem!important;
        border-left: none!important;
        border-radius: 0 !important;
    }
    .custom_search_bar{
        padding: 20px 0;
        min-height: 60px;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
    }
</style>
<div id="datatable_container" class="usersControlContent">
   <div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
       <div class="kt-container ">
           <div class="kt-subheader__main">
               <h3 class="kt-subheader__title">
                   Tasks
               </h3>
               <span class="kt-subheader__separator kt-hidden"></span>
               <div class="kt-subheader__breadcrumbs">
                   <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon-gift"></i></a>
                   <span class="kt-subheader__breadcrumbs-separator"></span>
                   <a href="" class="kt-subheader__breadcrumbs-link">Table</a>
                   <span class="kt-subheader__breadcrumbs-separator"></span>
                   <a href="" class="kt-subheader__breadcrumbs-link">Tasks</a>
               </div>
           </div>
       </div>
       <div class="kt-subheader__wrapper">
           <a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill" id="btnTaskAdd"><i class="la la-plus"></i>
               Task
           </a>
       </div>
   </div>

   <div  style="box-shadow: 0px 0px 13px 0px rgba(82, 63, 105, 0.05); background-color: #ffffff; margin-bottom: 20px; border-radius: 4px;">
        <div id="tasksDatatable" style="padding: 25px;">
           <div class="row custom_search_bar">
               <div class="col-lg-9 col-md-10 order-1 order-1 serach_col user_search_col userSearchCol">
                   <div class="form-group m-form__group row align-items-center ">
                       <div class="accountFilterSearch">

                       </div>
                       <div class=" col-lg-3 col-md-5 col-sm-3">
                           <div class="input-group mb-3 input-group-sm userInputGroup">
                               <div class="input-group-prepend">
                                   <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                               </div>
                               <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="title">
                           </div>
                       </div>
                       <div class="input-group input-group-sm  userInputGroup ml-4"  style="width: 306px!important;">
                        <div class="project_search row w-100" >
                            <div class="input-group-prepend" style="height: 32px;">
                                <button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">
                                    Projects
                                </button>
                            </div>
                            <div class="col-md-8 col-lg-8" id="taskProjectSelect" style="position:absolute;left:51px;">
                                <select name="industry[]" data-title="Select" id="task_projects" multiple="">
                                    @if(count($projects)>0)
                                        @foreach($projects as $project)
                                            <option value="{{$project->id}}">{{$project->project_name}}</option>
                                        @endforeach
                                    @else 
                                        <option value="1">Create on Scate </option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                       <div class="reloadTaskDatatable custom__offset">
                           <i class="fas fa-redo searchRedo"></i>
                       </div>
                   </div>
               </div>
               <div class="rp_btn col-md-2 col-lg-2 order-1" style="display:inline-flex;">
                   <div class="dropdown dropdown-inline exportBtn">
    
                       <button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-download"></i></button>
    
                       <div class="dropdown-menu dropdown-menu-right">
                           <ul class="kt-nav">
                               <li class="kt-nav__section kt-nav__section--first">
                                   <span class="kt-nav__section-text">Choose an option</span>
                               </li>
    
                               <li class="kt-nav__item">
                                   <a href="#" class="kt-nav__link">
                                       <i class="kt-nav__link-icon la la-file-text-o"></i>
                                       <span class="kt-nav__link-text exportTo" data-export-to="csv">CSV</span>
                                   </a>
                               </li>
                               <li class="kt-nav__item">
                                   <a href="#" class="kt-nav__link">
                                       <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                       <span class="kt-nav__link-text exportTo" data-export-to="pdf">PDF</span>
                                   </a>
                               </li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
        </div>

   </div>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script>

   <script type="text/javascript">

       var taskDatatable = $('#tasksDatatable').KTDatatable({
       // datasource definition
       data: {
           type: 'remote',
           source: {
               read: {
                   url: '/admin/tasks/fetch',
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
               // sortable: true,
               field: 'title',
               title: 'Title',
               width: 200,

           },{
               // sortable: true,
               field: 'project_id',
               title: 'Project',
               width: 200,
               template:function(row) {
                   return `${row.project.project_name}`;
               }

           },
           {
               field: 'task_type_id',
               title: 'Project Type',
               width: 100,
               template:function(row){
                   return `${row.task_type.value}`;
               }
           },
           {
               field: 'priority',
               title: 'Priority',
               width: 70,
                template:function(row){
                    return ` <span><span class="kt-badge kt-badge--success kt-badge--dot"></span>&nbsp;<span class="kt-font-bold kt-font-success">${row.priority}</span></span>`;
               }

           },
           {
               field: 'status',
               title: 'Status',
               template:function(row) {
                   return `${row.task_status.value}`;
               }
           },
           {
               field: 'assigned_by',
               sortable: true,
               title: 'Assigned By',
               template:function(row) {
                    return `${row.assigned_by.full_name}`;
               }
           },
           {
               field: 'reminder_date',
               sortable: true,
               title: 'Rem. Date',
                template:function(row) {
                    return `${moment(row.reminder_date).format("MM/DD/YYYY")}`;
                }
           },

           {
               field: 'Actions',
               title: 'Actions',
               sortable: false,
               overflow: 'visible',
               textAlign: 'center',
               template: function(row, index, datatable) {
                   var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                   return '<a class="btn btn-hover-brand btn-icon btn-pill pageload" data-route="/admin/tasks/'+row.id+'"><i class="la la-eye" title="View Task"></i></a>\<a class="btn btn-hover-brand btn-icon btn-pill model_load editTask" data-url="/admin/tasks/edit/'+row.id+'" data-toggle="modal"  title="Edit Task">\
                           <i class="la la-edit"></i>\
                       </a>\
                       <a href="#" class="btn btn-hover-danger btn-icon btn-pill" data-url ="admin/products/delete/'+row.id+'" title="Delete">\
                           <i class="la la-trash"></i>\
                       </a>';
               },
           }
       ],
   });

    $(function() {
        $('#task_projects').selectpicker({
            liveSearch: true,
            // showTick: true,
            actionsBox: true,
            doneButton : true,
            width:'100%',
            doneButtonText : "Apply",
		});
        var taskDatatableSearch = (advanced = false, cb = "default cb") => {
	        if (advanced) {
	            taskDatatable.setDataSourceParam("query", {});
	        } else {
	            let sanitized = taskDatatable.getDataSourceQuery('query');
	            if (sanitized.advanced) delete sanitized.advanced;
	            taskDatatable.setDataSourceParam("query", sanitized);
	        }
	        typeof cb === "function" ? cb() : '';
		}

	    $('#taskProjectSelect .bs-donebutton').on('click', function(e,){
			e.preventDefault();
	        taskDatatableSearch(false, () => {
		    	taskDatatable.search($('#task_projects').val(), 'projects');
			});
		});
		
		let currentTimeout = '';
		$('#tasksDatatable .basic--search').off('blur keyup').on('blur keyup', function(e) {
			if($(this).val().length > 2 || $(this).val().length == 0)
			{
				clearInterval(currentTimeout)
				currentTimeout = setTimeout(() => {
					taskDatatableSearch(false, () => {
						taskDatatable.search($(this).val(), $(this).attr('name'));
					}); 
				}, 1500);

			}
        });
        
    });
    
    $('.reloadTaskDatatable').off('click').on('click', function(e) {
        e.preventDefault();
        $('#tasksDatatable .userInputGroup').find('input').val('');
        taskDatatable.setDataSourceParam("query",{});
        $('#tasksDatatable').KTDatatable().reload();
        localStorage.removeItem("tasksDatatable-1-meta");
    });

	$(document).off('click', '#btnTaskAdd').on('click', '#btnTaskAdd', function(e) {
		e.preventDefault();
		e.stopPropagation();
		showModal({
			url: '/admin/tasks/modal/add',
			c: 1
		});
	});
   </script>
</div>