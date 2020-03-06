
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
									
<!-- begin:: Subheader -->
<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
    <div class="kt-container ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Note
            </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a class="kt-subheader__breadcrumbs-link">Settings</a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a class="kt-subheader__breadcrumbs-link">Logs</a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a class="kt-subheader__breadcrumbs-link">Note</a>
            </div>
        </div>
    </div>
    <div class="kt-subheader__wrapper">
        <button class="btn btn-brand btn-elevate btn-icon-sm" id="add_note"><i class="la la-plus"></i>
            Note
        </button>
    </div>
</div>
<!-- end:: Subheader -->
<!-- begin:: Content -->
<div class="kt-portlet">
    <div class="kt-portlet__body kt-portlet__body--fit">
        <div class="row row-no-padding row-col-separator-xl">
            <div class="col-md-12 col-lg-12 col-xl-4">
                <!--begin:: Widgets/Stats2-1 -->
                <div class="kt-widget1" style="padding-left:0px;padding-right:0px;">
                    
                    <canvas id="notesChart" width="497" height="230"></canvas>
                </div>
                <!--end:: Widgets/Stats2-1 -->            
            </div>
            <div class="col-md-12 col-lg-12 col-xl-4">
                <!--begin:: Widgets/Stats2-2 -->
                <div class="kt-widget1">
                    <div class="kt-widget1__item row kt_widget_row_notes">
                        <div class="kt-widget1__info col col_header">
                            <h3 class="kt-widget1__title">Todo</h3>
                            <span class="kt-widget1__desc">@if($note){{$note->todo_date}}@endif</span>
                        </div> 

                        <div class="col col-align-right col_header m_inline">
                            <div class="">
                                <select title="Select" class="todo_date_select"  name="" id="">
                                    <option value="created">Created</option>
                                    <option value="todo">Todo</option>
                                    <option value="task">Task</option>
                                    <option value="reminder">Reminder</option>
                                </select>
                            </div>
                            <input id="todoDatePicker"  type="text" class="form-control btn-redius dateRangePicker w-170 dateTodoPicker" name="date">
                        </div>
                    </div>
                    <div class="p_top_24">
                        <div class="kt-widget1__info  col_header">
                            <h3 class="kt-widget1__title">Title</h3>
                            <span class="kt-widget1__desc">@if($note){{ucfirst($note->title)}} @else No notes available.@endif</span>
                        </div>
                    </div>
                    {{-- @foreach($notes as $note)
                    <div class="kt-widget1__item">
                        <div class="kt-widget1__info">
                            <h3 class="kt-widget1__title">{{$note->title}}</h3>
                            <span class="kt-widget1__desc">TODO date: </span>
                        </div>			
                        <span class="kt-widget1__number kt-font-info">{{$note->todo_date}}</span>
                    </div>
                    @endforeach --}}
                    

                </div>
                <!--end:: Widgets/Stats2-2 -->            
            </div>
            <div class="col-md-12 col-lg-12 col-xl-4">
                <!--begin:: Widgets/Stats2-3 -->
                <div class="kt-widget1">
                    <div class="kt-widget1__item row kt_widget_row_notes">
                        <div class="kt-widget1__info col col_header">
                            <h3 class="kt-widget1__title">Reminder</h3>
                            <span class="kt-widget1__desc">@if($note){{$note->reminder_date}}@endif</span>
                        </div> 

                        <div class="col col-align-right col_header m_inline">
                            <div class="">
                                <select title="Select" class="todo_date_select"  name="" id="">
                                    <option value="created">Created</option>
                                    <option value="todo">Todo</option>
                                    <option value="task">Task</option>
                                    <option value="reminder">Reminder</option>
                                </select>
                            </div>
                            <input id="reminderDatePicker"  type="text" class="form-control btn-redius dateRangePicker w-170 dateTodoPicker" name="date">
                        </div>
                    </div>
                    <div class="p_top_24">
                        <div class="m_inline">
                            <div class="kt-widget1__info  col_header w-140">
                                <h3 class="kt-widget1__title">Created Date</h3>
                            </div>
                            <div class="kt-widget1__info  col_header">
                                <h3 class="kt-widget1__title">Title</h3>
                            </div>
                        </div>
                        <div>@if($note)
                            <div><i class="la la-bell"></i> @if(\Carbon\Carbon::today()->format('Y-m-d') == $note->reminder_date)
                            {{\Carbon\Carbon::parse($note->created_at)->format('Y-m-d')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$note->title}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="kt-badge kt-badge--warning kt-badge--inline kt-badge--pill kt-badge--rounded">complete fast</span>
                            @else
                                   No reminders for today.
                            @endif</div> @else <i class="la la-bell"></i>No reminders for today.@endif
                        </div>
                    </div>
                </div>
                <!--end:: Widgets/Stats2-3 -->            
            </div>
        </div>
    </div>
</div>
<div id="t_notestable">
    <div class="row notes_search_row">
        <div class="col-xl-12 order-1 order-xl-1 serach_col note_search_col noteSearchCol">
            <div class="form-group m-form__group row align-items-center ">
                <div class="noteFilterSearch">
                    <div class="dropdown noteAdvSearch ">
                        <button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle waves-effect waves-light" role="button" id="dropdownNoteLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i title="Advanced search" class="fas fa-filter"></i></button>
                        <!-- Advanced Search -->
                        <div class="dropdown-menu noteAdvSearchDropDown" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -225px, 0px);">
                            <span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust" style="right: auto; left: 33.5px;"></span>
                            <div>
                                <form class="kt-form kt-form--fit" id="noteAdvSearchForm" autocomplete="off">
                                    <input type="hidden" name="_token" value="d07M0O1atzwNcX3WmuJ016w3Yo5CSPcq6NwQ5usi">										
                                    <div class="bodyContent w-400">
                                        <div class="row kt-margin-b-20">
                                            <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
                                                <label class="active">User</label>
                                                {{-- <input type="text" class="form-control kt-input advSearchInput" placeholder="" name="user" data-col-index="0" autocomplete="off"> --}}
                                                <select class="form-control select_note_picker" title="Choose" name="status" tabindex="-98" id='type_select'>
                                                    <option class="bs-title-option" value="">Created</option>
                                                    <option value="rem_date">Reminder Date</option>
                                                    <option value="tode_date">Todo date</option>
                                                    <option value="note_date">Note Date</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
                                                <label class="active">Created By</label>
                                                <input type="text" name="name" class="form-control kt-input advSearchInput" placeholder="" data-col-index="4" autocomplete="off">
                                            </div>

                                        </div>
                                        <div class="row kt-margin-b-20">
                                            <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
                                                <label class="active">Title</label>
                                                <input type="text" class="form-control kt-input advSearchInput" name="title" placeholder="" data-col-index="1" autocomplete="off" im-insert="true">
                                            </div>
                                            <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
                                                <label class="active">Sites</label>
                                                <input type="text" name="page" class="form-control kt-input advSearchInput" placeholder="" data-col-index="1" autocomplete="off">
                                            </div>

                                        </div>

                                        <div class="row kt-margin-b-20">
                                            <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
                                                <label class="active">Status</label>
                                                <input type="text" class="form-control kt-input advSearchInput" name="status" placeholder="" data-col-index="1" autocomplete="off" im-insert="true">
                                            </div>
                                            <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
                                                <label class="active">Priority</label>
                                                <input type="text" name="priority" class="form-control kt-input advSearchInput" placeholder="" data-col-index="1" autocomplete="off">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row userAdvFooter">
                                        <div class="footerLeftBtns">
                                            <div class="advSearchResetBtn">
                                                <button class="btn btn-secondary btn-secondary--icon waves-effect waves-light" id="adv_note_reset">
                                                    Reset
                                                </button>
                                            </div>
                                        </div>
                                        <div class="">
                                            <button class="btn btn-primary btn-brand--icon waves-effect waves-light" id="advNoteSearchBtn">
                                                Apply
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                
                <!-- Begin Date Range  -->
                <div class="col-auto mt-3 mb-3">
                    <div class="col col-align-right col_header m_inline" style="height:32px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default" style="font-size: 0.92rem">Date Range</span>
                        </div>
                        <div class="" style="margin-right: 10px;">
                            <select class="form-control dateRangeTable " title="Choose" name="status" tabindex="-98" id="type_select">
                                <option class="bs-title-option" value="">Created</option>
                                <option value="rem_date">Reminder Date</option>
                                <option value="tode_date">Todo date</option>
                                <option value="note_date">Note Date</option>
                            </select>
                        </div>
                        <input id="datePickerTable" type="text" class="form-control btn-redius dateRangePicker w-170 dateTodoPicker" name="date">
                    </div>
                </div>
                <!-- End Date Range  -->

                <!-- Begin  Note type   -->
                <div class="col-md-3 col-sm-3 col_width_20">
                    <div class="input-group mb-3 input-group-sm userInputGroup">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-code">Title</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-code" placeholder="search.." id="title_search" autocomplete="off">
                    </div>
                </div>
                <!-- End Note type  -->

                <!-- Begin Priority  -->
                <div class="col-md-3 col-sm-3 col_width_20">
                    <div class="input-group mb-3 input-group-sm userInputGroup">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary waves-effect waves-light" type="button">Priority</button>
                        </div>
                        <div class=" custom-select" style="max-width: 155px !important;">
                            <select title="Select" class="note_search"  name="" id="" multiple>
                            <!-- <option value="*">All</option> -->
                                <option value="high">High</option>
                                <option value="standard">Standard</option>
                            </select>
                        
                        </div>
                    </div>
                </div>
                <!-- End Priority  -->

                <!-- Begin Status  -->
                <div class="col-md-3 col-sm-3 col_width_20" style="display:inline-flex;">
                    <div class="input-group input-group-sm userInputGroup">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary waves-effect waves-light" type="button">Status</button>
                        </div>
                        <div class=" custom-select">
                            <select title="Select" class="note_search"  name="" id="" multiple>
                            <!-- <option value="*">All</option> -->
                                <option value="done">Done</option>
                                <option value="notdone">Not Done</option>
                            </select>
                        
                        </div>
                    </div>
                    <div class="redo_class">
                        <i class="fas fa-redo searchRedo"></i>
                    </div>
                </div>
                <!-- End Status  -->

                
            </div>
            {{-- export div --}}
            <div class="rp_btn col-xl-2 order-1 order-xl-1" style="display:inline-flex; padding: 13px; margin-left:100px;display:none;">
                <div class="dropdown dropdown-inline exportBtn" data-skin="dark" data-toggle="kt-tooltip" data-placement="top" title="" data-original-title="Export As">
                    <button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false" title="Export as"><i class="la la-download"></i></button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="kt-nav">
                            <li class="kt-nav__section kt-nav__section--first">
                                <span class="kt-nav__section-text">Choose an option</span>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon la la-print"></i>
                                    <span class="kt-nav__link-text">Print</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                {{-- <a href="{{route('export.file',['type'=>'csv'])}}" class="kt-nav__link"> --}}
                                    <i class="kt-nav__link-icon la la-file-text-o"></i>
                                    <span class="kt-nav__link-text">CSV</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                    <span class="kt-nav__link-text">PDF</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- end:: Content -->							
</div>

<script type="text/javascript">
    var notesTable = $('#t_notestable').KTDatatable({
    // datasource definition
        data: {
            type: 'remote',
                source: {
                    read: {
                        url: '/notes/table',
                        method: 'GET',
                        params: {
                            "_token": "{{ csrf_token() }}"
                        },
                        //map: function(raw) {
                        // sample data mapping
                        //var dataSet = raw;
                        //if (typeof raw.original !== 'undefined') {
                        //	dataSet = raw.original;
                        //}
                        //return dataSet;
                    //},
                    },
                },
                pageSize: 10,
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true,
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
                        field: 'created_at',
                        title: 'Created at',
                        template: ({created_at}) => `<span data-tooltip="" title="${created_at}">${created_at}</span>`
                    },
                    {
                        field: 'title',
                        title: 'Title',
                        template: ({title}) => `<span data-tooltip="" title="${title}">${title}</span>`
                    },
                    {
                        field: 'priority',
                        title: 'Priority',
                        template: function(row){
                            if(row.priority === 'High'){
                                return '<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill kt-badge--rounded">'+row.priority+'</span>';
                            }else{
                                return '<span class="kt-badge kt-badge--info kt-badge--inline kt-badge--pill kt-badge--rounded">'+row.priority+'</span>';
                            }
                        },
                    },
                    {
                        field: 'todo_date',
                        title: 'TODO Date',
                        template: ({todo_date}) => `<span data-tooltip="" title="${todo_date}">${todo_date}</span>`
                    },
                    {
                        field: 'reminder_date',
                        title: 'Reminder Date',
                        template: ({reminder_date}) => `<span data-tooltip="" title="${reminder_date}">${reminder_date}</span>`
                    },
                    {
                        field: 'created_by',
                        title: 'Created by',
                    },
                    {
                        field: 'status',
                        title: 'Status',
                        template: function(row){
                            if(row.status === 'Done'){
                                return '<span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill kt-badge--rounded">'+row.status+'</span>';
                            }else{
                                return '<span class="kt-badge kt-badge--warning kt-badge--inline kt-badge--pill kt-badge--rounded">'+row.status+'</span>';
                            }
                        },
                    },
                    {
                        field: 'Actions',
                        title: 'Actions',
                        sortable: false,
                        width: 130,
                        overflow: 'visible',
                        textAlign: 'center',
                        template: function(row, index, datatable) {
                            let new_data = JSON.stringify(row);
                            var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                            return     '<a id="edit_note" class="btn btn-hover-brand btn-icon btn-pill model_load" data-route="note/edit/'+row.id+'" href="JavaScript:void(0);" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
                                            <i class="la la-edit"></i>\
                                        </a>\
                                        <a href="#" class="btn btn-hover-danger btn-icon btn-pill delButton" data-id="'+row.id+'" title="Delete">\
                                            <i class="la la-trash"></i>\
                                        </a>';
                        },
                    }
                ],
    });

    $(document).off('click', '#edit_note').on('click', '#edit_note', function(e){
    e.preventDefault();
    showModal({
        url: $(this).data('route')	
    });
}).off('click', '.delButton').on('click', '.delButton', function(e){
    e.preventDefault();
    let id= $(this).data('id');
    delConfirm({
        url:"/note/delete/"+id,
        header: $('#t_notestable')
    });
});

    // datepicker
    
$('#todoDatePicker ').daterangepicker({
        buttonClasses: ' btn',
        applyClass: 'btn-primary',
        cancelClass: 'btn-secondary',

        locale: {
            format: 'YYYY-MM-DD',
            separator: '/',
        }
    }, function(start, end, label) {
        $('#todoDatePicker').val( start.format('YYYY-MM-DD') + ' / ' + end.format('YYYY-MM-DD'));
});

$('#reminderDatePicker,  #datePickerTable').daterangepicker({
        buttonClasses: ' btn',
        applyClass: 'btn-primary',
        cancelClass: 'btn-secondary',

        locale: {
            format: 'YYYY-MM-DD',
            separator: '/',
        }
    }, function(start, end, label) {
        $('#reminderDatePicker, #datePickerTable').val( start.format('YYYY-MM-DD') + ' / ' + end.format('YYYY-MM-DD'));
});

// select 2

$('.note_search').selectpicker({
    showTick: true,
    doneButton: true,
    doneButtonText: "Apply"

});

$('.todo_date_select').selectpicker({
    showTick: true,
    doneButton: true,
    doneButtonText: "Apply"

});


var ctx = document.getElementById('notesChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Done', 'Not Done'],
        datasets: [{
            label: 'Note status',
            data: [0,99],
            backgroundColor: [
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235)',
                
            ],
            borderColor: [
                'rgba(255, 255, 255)',
                'rgba(255, 255, 255)',
               
            ],
            borderWidth: 2
        }]
    },
    options: {
       responsive: false,
       legend:{
            position:'right',
       },
    }
});


// $(document).ready(function() {

//     const basicSearch = (advanced = false, cb = "default cb") => {
//         if (advanced) {
//             notesTable.setDataSourceParam("query", {});
//         } else {
//             let sanitized = notesTable.getDataSourceQuery('query');

//             if (sanitized.advanced) delete sanitized.advanced;
//             notesTable.setDataSourceParam("query", sanitized);

//         }
//         typeof cb === "function" ? cb() : '';

//     }

//     $('.basic--search').off('blur').on('blur', function() {
//         basicSearch(false, () => {
//             notesTable.search($(this).val(), $(this).attr('name'));
//         });
//     });



//     // advance search

//     // $('#advNoteSearchBtn').on('click', function(e) {
//     //     e.preventDefault();
//     //     let data = $('#noteAdvSearchForm').serializeArray();
//     //     let reducedData = data.reduce((acc, x) => {
//     //         acc[x.name] = x.value;
//     //         return acc;
//     //     }, {})

//     //     basicSearch(true, () => {
//     //         notesTable.search(reducedData, "advanced");
//     //     });

//     //     $('#dropdownMenuLink').css({
//     //         'background' : '#8b83f3',
//     //     });


//     // });

    $('#adv_note_reset').on('click', function(e) {
        e.preventDefault();
        $('#t_notestable').KTDatatable().reload();
    });

    $('.searchRedo').on('click', function(e){
        e.preventDefault();
        // $('.userInputGroup').find('input').val('');
        // $("#user_role_search").val('');
        $('#t_notestable').KTDatatable().reload();
        
    });


// });

$(document).ready(function(){
    $('#title_search').on('keyup', function(e){

        if($(this).val().length >= 3){
            $('#t_notestable').KTDatatable().search($(this).val(), 'title');	

        }
        if($(this).val() == ''){
            $('#t_notestable').KTDatatable().search($(this).val(), 'title');
            
        }
    });	
});
</script>