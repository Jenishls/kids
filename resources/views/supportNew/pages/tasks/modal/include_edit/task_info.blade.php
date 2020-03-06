<div class="row mb-3">
    <div class="form-group col-7">
        <div class="row">
            <div class="col-md-12">
                <div class="formWrapper">
                    <div class="form-group row ">
                        <div class="col-lg-12" >
                            <label class="control-label" for="salutation">Title</label>
                           <input type="text" name="title" value="{{$task->title}}" class="form-control" placeholder="Frontend Cleanup">
                           <div class="errorMessage"></div>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-lg-6">
                            <label class="control-label" for="first_name">Project</label>
                            <select class="form-control project" name="project_id">
                                <option value="{{$task->project_id}}">{{$task->project->project_name}}</option>
                            </select>
                            <div class="errorMessage"></div>
                        </div>
                        <div class="col-lg-6">
                            <label class="control-label" for="middle_name">Type</label>
                            <select class="form-control project_type" name="task_type_id">
                                @if(isset($task->task_type_id))
                                <option value="{{$task->task_type_id}}">{{$task->taskType->value}}</option>
                                @endif
                            </select>
                            <div class="errorMessage"></div>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-lg-6">
                            <label class="control-label" for="last_name">Priority</label><Br>
                            <select class="form-control priority" name="priority">
                                <option value="high" @if($task->priority == "high") selected @endif>High</option>
                                <option value="medium" @if($task->priority == "medium") selected @endif>Medium</option>
                                <option value="low" @if($task->priority == "low") selected @endif>Low</option>
                            </select>
                            <div class="errorMessage"></div>
                        </div>
                        <div class="col-lg-6">
                            <label class="control-label" for="">Status</label>
                            <select class="form-control task_status" name="status">
                                @if(isset($task->status))
                                <option value="{{$task->status}}">{{$task->status}}</option>
                                @endif
                            </select>
                            <div class="errorMessage"></div>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-lg-12">
                            <label class="control-label" for="">Note</label>
                            <textarea class="form-control" id="note" oninput="taskNote(this)" name="cause" placeholder="Write note...">{{$task->cause??''}}</textarea>
                            <div class="errorMessage"></div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-5">
        <div class="row">
            <div class="col-md-12 pb-4">
                <div class="formWrapper">
                    <div class="form-group row">
                        @php
                            $date = date("d/m/Y");
                        @endphp
                        <div class="form-group  col-md-6" >
                            <label class="control-label" for="add1">Start Date</label>
                            <input class="form-control datepick" type="text" name="start_date" value="@if(isset($task->start_date)){{format_to_us_date($task->start_date)}} @endif" placeholder="{{$date}}">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="control-label" for="add2">End Date</label>
                            <input class="form-control datepick" type="text" name="due_date"  value="@if(isset($task->due_date)){{format_to_us_date($task->due_date)}}@endif" placeholder="{{$date}}">
                            <div class="errorMessage"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        
                        <div class="form-group  col-md-6">
                            <label class="control-label" for="state">Reminder Date</label>
                            <input class="form-control datepick" type="text"  value="@if(isset($task->reminder_date)){{format_to_us_date($task->reminder_date)}}@endif" name="reminder_date" placeholder="{{$date}}">
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="control-label" for="state">Estimated Hours</label>
                            <input class="form-control estimated_hours" type="text" name="estimate_hours" value="{{$task->estimate_hours??''}}" placeholder="1:45">
                        </div>
                    </div>
                    <div class="form-group row">  
                        <div class="form-group col-md-12">
                             <label class="control-label" for="description">Description</label>
                           <textarea id="description" oninput="taskDescription(this)" name="desc" class="form-control" 
                           style="min-height:140px;" placeholder="Write description...">{{$task->desc??''}}</textarea>
                            <div class="errorMessage"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>