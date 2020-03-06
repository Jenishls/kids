<div class="row mb-3">
    <div class="form-group col-7">
        <div class="row">
            <div class="col-md-12">
                {{-- <span class="btn portlet_label" style="top:-4%!important; left:3%!important">General Info</span>  --}}
                <div class="formWrapper">
                    <div class="form-group row ">
                        <div class="col-lg-12" >
                            <label class="control-label" for="salutation">Title</label>
                           <input type="text" name="title" class="form-control" placeholder="Frontend Cleanup">
                           <div class="errorMessage"></div>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-lg-6">
                            <label class="control-label" for="first_name">Project</label>
                            <select class="form-control project" name="project_id"></select>
                            <div class="errorMessage"></div>
                        </div>
                        <div class="col-lg-6">
                            <label class="control-label" for="middle_name">Type</label>
                            <select class="form-control project_type" name="task_type_id">
                            </select>
                            <div class="errorMessage"></div>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-lg-6">
                            <label class="control-label" for="last_name">Priority</label><Br>
                            <select class="form-control priority" name="priority">
                                <option value="high">High</option>
                                <option value="medium">Medium</option>
                                <option value="low">Low</option>
                            </select>
                            <div class="errorMessage"></div>
                        </div>
                        <div class="col-lg-6">
                            <label class="control-label" for="">Status</label>
                            <select class="form-control task_status" name="status">
                            </select>
                            <div class="errorMessage"></div>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-lg-12">
                            <label class="control-label" for="">Note</label>
                            <textarea class="form-control" id="note" oninput="taskNote(this)" name="cause" placeholder="Write note..."></textarea>
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
                            <input class="form-control datepick" type="text" name="start_date" placeholder="{{$date}}">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="control-label" for="add2">End Date</label>
                            <input class="form-control datepick" type="text" name="due_date" placeholder="{{$date}}">
                            <div class="errorMessage"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        
                        <div class="form-group  col-md-6">
                            <label class="control-label" for="state">Reminder Date</label>
                            <input class="form-control datepick" type="text" name="reminder_date" placeholder="{{$date}}">
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="control-label" for="state">Estimated Hours</label>
                            <input class="form-control estimated_hours" type="text" name="estimate_hours" placeholder="1:45">
                        </div>
                    </div>
                    <div class="form-group row">  
                        <div class="form-group col-md-12">
                             <label class="control-label" for="description">Description</label>
                           <textarea id="description" oninput="taskDescription(this)" name="desc" class="form-control" style="min-height:140px;" placeholder="Write description..."></textarea>
                            <div class="errorMessage"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>