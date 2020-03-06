<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor task-board">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Taskboard
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Task</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Kanban</a>
				</div>
			</div>
		</div>
		<div class="kt-subheader__wrapper" style="display:flex">
			{{-- <button type="button" class="btn btn-success btn-sm openModal" data-url="/admin/taskboard/add" id="taskboardAdd" style="width:max-content"><i class="fa fa-plus"></i> Add Board</button> --}}
			<button type="button" class="btn btn-success btn-sm openModel" data-url="/admin/taskboard/add/" style="width:max-content"><i class="fa fa-plus"></i> Add Board</button>
		</div>
	</div>
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid taskboard-wrapper">
		<div class="taskboard-container">
			@if(count($taskboards)>0)
				@foreach($taskboards as $board)
					<div class="taskboard pageload" data-route="admin/taskboard/{{$board->id}}">
					@if(isset($board->background))
						<img src="view/{{$board->background}}">
					@else
						<img src="{{asset('images/taskboard.jpg')}}">
					@endif
					<div class="taskboard__header">
						<div class="taskboard__title-container">
							<h3 class="taskboard__title" style="text-transform:uppercase">
								{{$board->title}}
							</h3>
						</div>
						<div class="taskboard__toolbar">
							{{-- <a href="javascript:void(0);" data-id="{{$board->id}}" class="taskboard__action-icon updateBoard" > --}}
							<a href="javascript:void(0);" class="taskboard__action-icon openModel" data-url="/admin/taskboard/edit/{{$board->id}}">
								<i class="flaticon-more-1"></i>
							</a>
							<a href="javascript:void(0);" class="taskboard__action-icon openModel" data-url="/admin/taskboard/delete/{{$board->id}}">
								<i class="flaticon-delete"></i>
							</a>
						</div>
					</div>
				</div>
				@endforeach
			@else
			<p>No Boards Yet</p>
			@endif
		</div>
	</div>
</div>