<div class="section-top">
    <div class="single-item">
        <div class="kt-portlet kt-iconbox kt-iconbox--wave">
            <div class="kt-portlet__body single-item__body">
                <div class="kt-iconbox__body single-item__content">
                    <div class="kt-iconbox__icon single-item__icon">
                        <i class="flaticon-statistics fs-30 text-success"></i>		
                    </div>
                    <div class="kt-iconbox__desc single-item_desc">
                        <h3 class="kt-iconbox__title">
                            <a class="kt-link single-item__title" href="javascript:void(0);">Project</a>
                        </h3>
                        <div class="kt-iconbox__content">
                            {{$task->project->project_name}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-item">
        <div class="kt-portlet kt-iconbox kt-iconbox--wave">
            <div class="kt-portlet__body single-item__body" style="position:relative">
                <div class="kt-iconbox__body single-item__content">
                    <div class="kt-iconbox__icon single-item__icon">
                        <i class="flaticon-interface-6 fs-30 text-success"></i>	
                    </div>
                    <div class="kt-iconbox__desc single-item_desc" >
                        <h3 class="kt-iconbox__title">
                            <a class="kt-link single-item__title" href="javascript:void(0);">Priority</a>
                        </h3>
                        <div class="kt-iconbox__content btnUpdatDetail" data-url="/admin/tasks/detail/update?task={{$task->id}}&&section=priority">
                            {{strtoupper($task->priority)??"Not Set"}}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-item">
        <div class="kt-portlet kt-iconbox kt-iconbox--wave">
            <div class="kt-portlet__body single-item__body">
                <div class="kt-iconbox__body single-item__content">
                    <div class="kt-iconbox__icon single-item__icon">
                        <i class="fs-30 text-success flaticon-calendar-3"></i>
                    </div>
                    <div class="kt-iconbox__desc single-item_desc">
                        <h3 class="kt-iconbox__title">
                            <a class="kt-link single-item__title" href="javascript:void(0);">Start Date</a>
                        </h3>
                        <div class="kt-iconbox__content btnUpdatDetail" data-url="/admin/tasks/detail/update?task={{$task->id}}&&section=start_date">
                            @if(isset($task->start_date)) {{bladeDate($task->start_date)}} @else Not Set @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-item">
        <div class="kt-portlet kt-iconbox kt-iconbox--wave">
            <div class="kt-portlet__body single-item__body">
                <div class="kt-iconbox__body single-item__content">
                    <div class="kt-iconbox__icon single-item__icon">
                        <i class="flaticon-statistics fs-30 text-success"></i>		
                    </div>
                    <div class="kt-iconbox__desc single-item_desc">
                        <h3 class="kt-iconbox__title">
                            <a class="kt-link single-item__title" href="javascript:void(0);">Due Date</a>
                        </h3>
                        <div class="kt-iconbox__content btnUpdatDetail" data-url="/admin/tasks/detail/update?task={{$task->id}}&&section=due_date">
                            @if(isset($task->due_date)) {{bladeDate($task->due_date)}} @else Not Set @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-item">
        <div class="kt-portlet kt-iconbox kt-iconbox--wave">
            <div class="kt-portlet__body single-item__body">
                <div class="kt-iconbox__body single-item__content">
                    <div class="kt-iconbox__icon single-item__icon">
                        <i class="fs-30 text-success flaticon-pie-chart"></i>	
                    </div>
                    <div class="kt-iconbox__desc single-item_desc">
                        <h3 class="kt-iconbox__title">
                            <a class="kt-link single-item__title" href="javascript:void(0);">Status</a>
                        </h3>
                        <div class="kt-iconbox__content btnUpdatDetail" data-url="/admin/tasks/detail/update?task={{$task->id}}&&section=status">
                            {{$task->taskStatus->value??"Not Set"}}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-item">
        <div class="kt-portlet kt-iconbox kt-iconbox--wave">
            <div class="kt-portlet__body single-item__body">
                <div class="kt-iconbox__body single-item__content">
                    <div class="kt-iconbox__icon single-item__icon">
                        <i class="fs-30 text-success  flaticon-calendar-1"></i>
                    </div>
                    <div class="kt-iconbox__desc single-item_desc">
                        <h3 class="kt-iconbox__title">
                            <a class="kt-link single-item__title" href="javascript:void(0);">Remin. Date</a>
                        </h3>
                        <div class="kt-iconbox__content btnUpdatDetail" data-url="/admin/tasks/detail/update?task={{$task->id}}&&section=reminder_date">
                            @if(isset($task->reminder_date)) {{bladeDate($task->reminder_date)}} @else Not Set @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-item">
        <div class="kt-portlet kt-iconbox kt-iconbox--wave">
            <div class="kt-portlet__body single-item__body">
                <div class="kt-iconbox__body single-item__content">
                    <div class="kt-iconbox__icon single-item__icon">
                        <i class="fs-30 text-success flaticon-time-1"></i>	
                    </div>
                    <div class="kt-iconbox__desc single-item_desc">
                        <h3 class="kt-iconbox__title">
                            <a class="kt-link single-item__title" href="javascript:void(0);">Estimated Hours</a>
                        </h3>
                        <div class="kt-iconbox__content">
                            {{$task->estimate_hours??"Not set"}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-item">
        <div class="kt-portlet kt-iconbox kt-iconbox--wave">
            <div class="kt-portlet__body single-item__body">
                <div class="kt-iconbox__body single-item__content">
                    <div class="kt-iconbox__icon single-item__icon">
                        <i class="fs-30 text-success flaticon-time-1"></i>
                    </div>
                    <div class="kt-iconbox__desc single-item_desc">
                        <h3 class="kt-iconbox__title">
                            <a class="kt-link single-item__title" href="javascript:void(0);">Actual Hours</a>
                        </h3>
                        <div class="kt-iconbox__content">
                            {{$task->estimate_hours??"Not set"}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="kt-portlet kt-iconbox kt-iconbox--wave">
        <div class="kt-portlet__body single-item__body">
            <div class="row">
                <div class="col-md-6 col-lg-4 col-sm-12">
                    <div class="">
                        <div class="sub-left">
                            <ul class="m-nav--inline task-detail-heading pd-l-0 mb-0">                      
                                <li class="custom-border-right pd-l-0-i">
                                    <div class="kt-widget__details">
                                        <h5 class="fs-13 text-success m-0 p-0">Created By</h5>
                                        <span class="fs-12"><span>Prajesh Jha</span><br>
                                        <span class="fs-12"><span>29th Nov, 2019</span>
                                    </span></span></div>
                                </li>
                
                                <li class="custom-border-right">
                                    <div class="kt-widget__details">
                                        <h5 class="fs-13 text-success m-0 p-0">Assigned By</h5>
                                        <span class="fs-12"><span>prajesh</span><br>
                                        <span class="fs-12"><span></span>
                                    </span></span></div>
                                </li>
                               
                                <li class="custom-border-right">
                                    <div class="kt-widget__details">
                                        <h5 class="fs-13 text-success m-0 p-0">Approved By</h5>
                                        <span class="fs-12"><span> Not Approved Yet </span><br>
                                         <span class="fs-12"><span>    </span>
                                    </span></span></div>
                                </li>
                             
                                <li class="custom-border-right">
                                    <div class="custom-progress-bar">
                                        <h5 class="fs-13 text-success m-t-5">Progress</h5>
                                        <span>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span>25%</span>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-8 col-sm-12">
                    <div class="sub-right">
                            <button type="button" class="btn btn-outline-success btn-elevate btn-circle btn-icon "><i class="la la-file-image-o"></i></button>
                            <button type="button" class="btn btn-outline-success btn-elevate btn-circle btn-icon m-r-10"><i class="la la-pied-piper-alt"></i></button>
                            <button type="button" class="btn btn-outline-success btn-elevate btn-circle btn-icon m-r-10"><i class="la la-random"></i></button>
                            <button type="button" class="btn btn-outline-success btn-elevate btn-circle btn-icon m-r-10"><i class="la la-tasks"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>