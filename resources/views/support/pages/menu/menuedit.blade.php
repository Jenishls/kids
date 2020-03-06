<div class="form-group label-floating">
	<label class="control-label">Name</label>
	<input class="form-control" type="text" name="name" value="{{$menudata->name}}">
</div>
<div class="form-group label-floating">
	<label class="control-label">Route</label>
	<input class="form-control" id="route" name="route" value="{{$menudata->route}}">
</div>
<div class="row">
	<div class="col form-group label-floating">
		<label class="control-label">Parent ID</label>
		<select class="form-control kt-select2 " id="parent_id" name="parent_id">\
		<option value="{{$menudata->parent_id}}" selected>{{$menudata->name}}</option>
			@foreach($parentMenus as $menu)
			
					<option value="{{$menu->id}}">{{$menu->name}}</option>
				
			@endforeach
		</select>
	</div>
	<div class="col form-group label-floating">
		<label class="control-label">Icon &nbsp; &nbsp; <i class="place_icon" id="place_icon" > </i> </label>
		<select class="form-control kt-select2" id="icon" name="icon">
			@foreach($icons as $icon)
			@if($menudata->icon == $icon->id)
			<option value="{{$icon->icon_class}}" selected>{{$icon->icon_name}}</option>
			@else 
					<option value="{{$icon->id}}">{{$icon->icon_name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row">
	<div class="col form-group label-floating">
		<label class="control-label">Sequence #</label>
		<input class="form-control" id="seq" name="seq" value="{{$menudata->seq}}">
	
	</div>
	<div class="col form-group label-floating">
		<label class="control-label">Active</label>
		<select class="form-control" id="active">
			<option>Yes</option>
			<option>No</option>
		</select>
	</div>
</div>

<input type="hidden" name="id" value="{{$menudata->id}}">	

<script>
	$(function(){
        $('#menu_parent_id').selectpicker({
            liveSearch: true,
            showTick: true,
            actionsBox: true,
            doneButton : true, 
            doneButtonText : "Apply"
        });
            
    });
</script>