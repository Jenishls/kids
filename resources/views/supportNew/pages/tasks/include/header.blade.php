<div class="m-subheader m-custom-subheader">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator text-white">
                <i class="m-nav__link-icon flaticon-list"></i>
                @if($boardView)
                    <span>Board View</span>
                @else
                    <span>Task Table</span>
                @endif
                {{-- <span>Tasks</span> --}}
            </h3>
			<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">                      
                {{-- <li class="m-nav__item m-r-10">
                    <span style="font-weight: 500" class="grey-medium-e9-shade">365 Total</span>
                </li> --}}
                <li class="m-nav__item">
                    <div class="m-form m-form--label-align-right">
                        <div class="form-group m-form__group row justify-content-start toolbar ">
                            @if(!$boardView)
                                <form class="form form-inline" id="taskQuickSearch">
                                <div class="col-auto">
                                    <div class="m-form__group m-form__group--inline pill-style" style="min-width: 250px;">
                                        <div class="m-form__label left">
                                            <label class="m-label m-label--single">
                                                User
                                            </label>
                                        </div>
                                        <div class="m-form__control custom-selecter-btn">
                                            <select name="members[]" multiple id="membersSelect" data-style="btn-redius" class="form-control m-bootstrap-select m-input selectpicker m-input--pill" title="Select users" data-selected-text-format="count > 2">
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}" @if($user->id === auth()->id()) selected @endif>{{ucfirst($user->fullname())}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-md-none m--margin-bottom-10"></div>
                                </div>

                                @SearchBar([
                                    "label" => "Project",
                                    "form" => '<select id="project" name="projects[]" multiple data-selected-text-format="count > 2"></select>'
                                ])
                                @endSearchBar

                                @SearchBar([
                                    "label" => "Status",
                                    "form" => '<select id="status" name="status[]" multiple data-selected-text-format="count > 2"></select>'
                                ])
                                @endSearchBar

                                @SearchBar([
                                    "label" => "Priority",
                                    "form" => '<select id="priority" name="priority[]" multiple data-selected-text-format="count > 2">
                                        <option value="high">High</option>
                                        <option value="medium">Medium</option>
                                        <option value="low">Low</option>
                                    </select>'
                                ])
                                @endSearchBar

                                <button class="hidden" id="taskTsBtn" data-target="taskQuickSearch"></button>
                                <button title="Reset Search" data-route="tasks" onclick="resetCookie('task_table_quick', 'task_table')"
                                        class="btn btn-sm btn-outline-secondary  m-btn m-btn--outline-2x m-btn--icon m-btn--icon-only m-btn--pill m-l-20">
                                    <i class="fa fa-undo"></i>
                                </button>
                            </form>
                            @else
                             <form class="form form-inline" id="siteSettingsFilter">
                                                
                                @SearchBar([
                                    "label" => "Board Name", 
                                    "labelStyle" => "style=width:max-content",
                                    "form" => '<input type="text" class="form-control btn-redius form-control-sm lr-b-0" name="project_name" id="project_name">'
                                ])
                                @endSearchBar

                                @SearchBar([
                                    "label" => "Created Date",
                                    "labelStyle" => "style=width:100px",
                                    "form" => '<input type="text" class="form-control btn-redius form-control-sm lr-b-0" name="due_date" id="created_date">'
                                ])
                                @endSearchBar

                                <button class="hidden" id="quickSearch" data-target="siteSettingsFilter"></button>
                            </form>
                            @endif
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        @if(!$boardView)
        <button id="btnCreateNewTask" class="btn btn-warning m-btn btn-sm m-btn--custom m-btn--icon m-btn--pill mr-10"
                data-modal-route="/tasks/create" data-backdrop="static" data-keyboard="false">
            <span>
                <i class="la la-plus"></i>
                <span>
                    Add Task
                </span>
            </span>
        </button>
        @else
        <button id="btnAddNewBoard" class="btn btn-warning m-btn btn-sm m-l-10 m-btn--custom m-btn--icon mr-10"
                data-modal-route="/tasks/board/modal/new" data-backdrop="static" data-keyboard="false">
            <span>
                <i class="la la-plus"></i>
                <span>
                    Add Board
                </span>
            </span>
        </button>
        @endif
    </div>
</div>

<script>

    $(() => {
        let cookie = getCookie("task_table_quick");
        if(cookie) {
            let cookieArray = JSON.parse(cookie)
            let memberExists = cookieArray.some(x => x.name === "members[]" && x.value.length);
            if (!memberExists)
                setCookie("task_table_quick", `[{"name" :"members[]" , "value" : [${$("#membersSelect").val()}]}]`);
        }

        /** NOt working properly not as expected */
        // Promise.all([fetchStatus(), fetchProjects()]).then(() => {
        //     setTimeout(() => {
        //         loadCookie('task_table_quick', '#taskTsBtn')
        //     }, 1000);
        // });


    });

</script>