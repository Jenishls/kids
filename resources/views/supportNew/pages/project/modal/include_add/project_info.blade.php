<div class="row mb-3">
    <div class="form-group col-7">
        <div class="row">
            <div class="col-md-12">
                <div class="formWrapper">
                    <div class="form-group row ">
                        <div class="col-lg-12" >
                            <label class="control-label" for="salutation">Project Name <span class="warning-msg"></span></label>
                            <input type="text" name="title" class="form-control" placeholder="Website" id="checkProjectName">
                           <div class="errorMessage"></div>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-lg-6">
                            <label class="control-label" for="first_name">Budget ($)</label>
                            <input type="text" name="budget" class="form-control" placeholder="$9000.00" id="amount-mask">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="col-lg-6">
                            <label class="control-label" for="project_type">Project Type</label>
                            <select class="form-control project_type" name="project_type">
                            </select>
                            <div class="errorMessage"></div>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-lg-6">
                            <label class="control-label" for="url">URL <span class="warning-msg"></span></label>
                            <input type="text" name="url" id="checkProjectUrl" class="form-control" placeholder="https://www.example.com">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="col-lg-6">
                            <label class="control-label" for="project_type">Company</label>
                            <select class="form-control company_id" name="company_id">
                            </select>
                            <div class="errorMessage"></div>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-lg-12">
                            <label class="control-label" for="">Description</label>
                            <textarea class="form-control" oninput="auto_grow(this)" name="description" placeholder="Write..."></textarea>
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
                            <input class="form-control datepick" type="text" name="start_date"  autocomplete="off" placeholder="{{$date}}">
                            <div class="errorMessage"></div>
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="control-label" for="add2">Estimated Delivery Date</label>
                            <input class="form-control datepick" type="text" name="estimated_date"  autocomplete="off" placeholder="{{$date}}">
                            <div class="errorMessage"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        
                        <div class="form-group  col-md-6">
                            <label class="control-label" for="state">Due Date</label>
                            <input class="form-control datepick" type="text" name="due_date"  autocomplete="off" placeholder="{{$date}}">
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="control-label" for="state">Project Manager</label>
                            <select class="form-control project_manager" name="project_manager">
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">  
                        <div class="form-group col-md-6">
                            <label class="control-label" for="description">Priority</label>
                            <select class="form-control priority" name="priority">
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                                <option value="low">Low</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="description">Status</label>
                            <select class="form-control status" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

var currencyMask = IMask(
  document.getElementById('amount-mask'),
  {
    mask: 'num',
    blocks: {
      num: {
        // nested masks are available!
        mask: Number,
        thousandsSeparator: ','
      }
    }
  });
</script>