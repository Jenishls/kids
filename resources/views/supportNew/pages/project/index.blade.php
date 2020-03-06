<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor task-board">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Projects
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Project</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Projects</a>
				</div>
			</div>
		</div>
		<div class="kt-subheader__wrapper" style="display:flex">
			{{-- <button type="button" class="btn btn-success btn-sm openModal" data-url="/admin/taskboard/add" id="taskboardAdd" style="width:max-content"><i class="fa fa-plus"></i> Add Board</button> --}}
			<button type="button" class="btn btn-success btn-sm openModel" data-url="/admin/project/add/" style="width:max-content"><i class="fa fa-plus"></i> New Project</button>
		</div>
	</div>
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid taskboard-wrapper">
		<div class="projects-container">
			<div class="row">
                @if(count($projects)>0)
                @foreach($projects as $project)
                <div class="col-xl-4">
                    <!--begin:: Portlet-->
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__body kt-portlet__body--fit">
                            <!--begin::Widget -->
                            <div class="kt-widget kt-widget--project-1">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__label">
                                        <div class="kt-widget__media">
                                            <span class="kt-media kt-media--lg kt-media--circle"> 
                                                <img src="{{asset("images/noimage.png")}}" alt="image">
                                            </span>
                                        </div>
                                        <div class="kt-widget__info kt-margin-t-5">
                                            <a href="javascript:void(0)" class="kt-widget__title">
                                                {{$project->title}}                                      
                                            </a>
                                            <span class="kt-widget__desc">
                                                {{$project->description??"No Description"}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__head-toolbar">
                                        <a href="javascript:void(0)" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                            <i class="flaticon-more-1"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                            <ul class="kt-nav">
                                                <li class="kt-nav__item openModel" data-url="/admin/project/edit/{{$project->id}}">
                                                    <a href="javascript:void(0)" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                        <span class="kt-nav__link-text">Update</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__item openModel" data-url="/admin/project/delete/{{$project->id}}">
                                                    <a href="javascript:void(0)" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-send"></i>
                                                        <span class="kt-nav__link-text">Archive </span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__item">
                                                    <a href="javascript:void(0)" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                        <span class="kt-nav__link-text">View Detail</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__item">
                                                    <a href="javascript:void(0)" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                        <span class="kt-nav__link-text">Members</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__item">
                                                    <a href="javascript:void(0)" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                        <span class="kt-nav__link-text">Settings</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="kt-widget__body">
                                    <div class="kt-widget__stats">
                                        <div class="kt-widget__item">
                                            <span class="kt-widget__date">
                                                Start Date
                                            </span>
                                            <div class="kt-widget__label">
                                                <span class="btn btn-label-brand btn-sm btn-bold btn-upper">{{viewBladeDate($project->start_date)??"Not Set"}}</span>
                                            </div>
                                        </div>
            
                                        <div class="kt-widget__item">
                                            <span class="kt-widget__date">
                                                Due Date
                                            </span>
                                            <div class="kt-widget__label">
                                                <span class="btn btn-label-danger btn-sm btn-bold btn-upper">{{viewBladeDate($project->due_date)??"Not Set"}}</span>
                                            </div>
                                        </div>
            
                                        <div class="kt-widget__item flex-fill">
                                            <span class="kt-widget__subtitel">Progress</span>
                                            <div class="kt-widget__progress d-flex  align-items-center">
                                                <div class="progress" style="height: 5px;width: 100%;">
                                                    <div class="progress-bar kt-bg-warning" role="progressbar" style="width: 78%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="kt-widget__stat">
                                                    78%
                                                </span>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__details">
                                            <span class="kt-widget__subtitle">Budget</span>
                                            <span class="kt-widget__value">{{priceFormat($project->budget)}}</span>
                                        </div>
            
                                        <div class="kt-widget__details">
                                            <span class="kt-widget__subtitle">Expances</span>
                                            <span class="kt-widget__value">{{priceFormat($project->expected_exp)}}</span>
                                        </div>
            
                                        <div class="kt-widget__details">
                                            <span class="kt-widget__subtitle">Members</span>
                                            <div class="kt-media-group">
                                                <a href="javascript:void(0)" class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="John Myer">
                                                    <img src="{{asset("images/default.jpg")}}" alt="image">
                                                </a>
                                                <a href="javascript:void(0)" class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Alison Brandy">
                                                    <img src="{{asset("images/default.jpg")}}" alt="image">
                                                </a>
                                                <a href="javascript:void(0)" class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Selina Cranson">
                                                    <img src="{{asset("images/default.jpg")}}" alt="image">
                                                </a>
                                                <a href="javascript:void(0)" class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Luke Walls">
                                                    <img src="{{asset("images/default.jpg")}}" alt="image">
                                                </a>
                                                <a href="javascript:void(0)" class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Micheal York">
                                                    <img src="{{asset("images/default.jpg")}}" alt="image">
                                                </a>
                                                <a href="javascript:void(0)" class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Micheal York">
                                                    <span>+3</span>
                                                </a>
                                            </div>                                 
                                        </div>
                                    </div>
                                </div>
            
                                <div class="kt-widget__footer">
                                    <div class="kt-widget__wrapper">
                                        <div class="kt-widget__section">
                                            <div class="kt-widget__blog">
                                                <i class="flaticon2-list-1"></i>
                                                <a href="javascript:void(0)" class="kt-widget__value kt-font-brand">72 Tasks</a>
                                            </div>
            
                                            <div class="kt-widget__blog">
                                                <i class="flaticon2-talk"></i>
                                                <a href="javascript:void(0)" class="kt-widget__value kt-font-brand">648 Comments</a>
                                            </div>
                                        </div>
            
                                        <div class="kt-widget__section">
                                            <button type="button" class="btn btn-brand btn-sm btn-upper btn-bold pageload" data-route="/admin/project/detail/{{$project->id}}">details</button>                                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Widget -->
                        </div>
                    </div>
                    <!--end:: Portlet-->
                </div>
                @endforeach
                @else 
                <p>No projects</p>
                @endif
                
            </div>
		</div>
	</div>
</div>