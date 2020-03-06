
<div class="kt-container kt-body kt-grid kt-grid--ver task-detail" id="kt_body">
    <div class="datatable_container usersControlContent" id="datatable_container">
        <div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
            <div class="kt-container ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Task Detail
                    </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link">Task </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link">Detail</a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link">{{$task->title}}</a>
                    </div>
                    <div class="back_temp ml-auto" style="width: 94px;">
                            <a class="kt-menu__link pageload backBtn" onclick="event.preventDefault();" data-route="/admin/tasks">
                                <i class="fas fa-arrow-left" style="padding-right: 10px;
                                "></i>
                                Back
                            </a>
                        </div>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                @include("supportNew.pages.tasks.detail.include.detail_top")
        
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="kt-portlet kt-portlet--mobile">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon">
                                        <i class="la la-align-left m--font-success"></i>
                                    </span>
                                    <h3 class="kt-portlet__head-title">
                                        Description
                                    </h3>
                                </div>
                                <div class="kt-portlet__head-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <button type="button" class="btn btn-outline-success btn-elevate btn-circle btn-icon btn-sm btnEditDesc" data-value="{{$task->desc}}" id="" data-id="{{$task->id}}"><i class="flaticon-edit"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__body task_description_{{$task->id}}">
                                <p>{{$task->desc??"No Description"}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="kt-portlet kt-portlet--mobile">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon">
                                        <i class="la la-comments m--font-success"></i>
                                    </span>
                                    <h3 class="kt-portlet__head-title">
                                        Comment
                                    </h3>
                                </div>
                                <div class="kt-portlet__head-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <button type="button" class="btn btn-outline-success btn-elevate btn-circle btn-icon btn-sm"><i class="flaticon-edit"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="kt-portlet kt-portlet--mobile">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon">
                                        <i class="la la-git-square m--font-success"></i>
                                    </span>
                                    <h3 class="kt-portlet__head-title">
                                        Activities
                                    </h3>
                                </div>
                                <div class="kt-portlet__head-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <button type="button" class="btn btn-outline-success btn-elevate btn-circle btn-icon btn-sm"><i class="flaticon-edit"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="kt-portlet kt-portlet--mobile">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon">
                                        <i class="la la-lightbulb-o m--font-success"></i>
                                    </span>
                                    <h3 class="kt-portlet__head-title">
                                        Conclusion
                                    </h3>
                                </div>
                                <div class="kt-portlet__head-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <button type="button" class="btn btn-outline-success btn-elevate btn-circle btn-icon btn-sm editConclusion" data-id="{{$task->id}}" data-value="{{$task->conclusion??"Write conclusion..."}}"><i class="flaticon-edit"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div class="task_conclusion_{{$task->id}}">
                                    {{$task->conclusion??"No conclusion"}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>