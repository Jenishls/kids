

<div class="form-group label-floating">
	<label class="control-label">Icon Group</label>
	<input class="form-control" type="text" name="icon_group" id="icon_group" value="{{$icondata->icon_group}}">
	<div class="errorMessage"></div>
</div>
<div class="form-group label-floating">
	<label class="control-label">Icon Name</label>
	<input class="form-control" id="icon_name" name="icon_name" value="{{$icondata->icon_name}}">
	<div class="errorMessage"></div>
</div>
<div class="form-group label-floating">
	<label class="control-label">Icon Class</label>
	<input class="form-control" id="icon_class" name="icon_class" value="{{$icondata->icon_class}}">
	<div class="errorMessage"></div>
</div>

<input type="hidden" name="id" value="{{$icondata->id}}">	

