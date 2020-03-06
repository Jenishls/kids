
<div class="form-group label-floating">

					<label class="control-label">Nameasdadad</label>
					<input class="form-control" type="text" name="name">
					<div class="errorMessage"></div>

			</div>
			<div class="form-group label-floating">
				<label class="control-label">Route</label>
				<input class="form-control" id="route" name="route">
				<div class="errorMessage"></div>

			</div>
			<div class="row">
				<div class="col form-group label-floating">
					<label class="control-label">Parent ID</label>
					<select class="form-control kt-select2 " id="parent_id" name="parent_id">
						@foreach($menus as $menu)
							<option value="{{$menu->id}}" selected>{{$menu->name}}</option>
						@endforeach
					</select>
					<div class="errorMessage"></div>

				</div>
				<div class="col form-group label-floating">
					<label class="control-label">Icon &nbsp; &nbsp; <i class="place_icon" id="place_icon" > </i> </label>
					<select class="form-control kt-select2" id="icon_class" name="icon">
						@foreach($icons as $icon)
						<option value="{{$icon->icon_class}}">{{$icon->icon_name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col form-group label-floating">
					<label class="control-label">Sequence #</label>
					<input class="form-control" id="seq" name="seq">
				</div>
				<div class="col form-group label-floating">
					<label class="control-label">Active</label>
					<select class="form-control" id="active">
						<option>Yes</option>
						<option>No</option>
					</select>
				</div>
			</div>
