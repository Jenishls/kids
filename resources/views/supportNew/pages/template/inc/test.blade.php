
component_name template_id location 
1 services       3   services/
2 blog            3  blog
3 feature        3 features
portfolio     3  portfolio
banner       3 banner
projects     2 projects
tasks       2 tasks
user       2   users


//locationAccessors(){
    location = $activeTemplate/components/${location}/index.blade.php //netlify
}

page_components
page_id   component_id  seq_no
1 (HOME)   services(1)   3
1          banner    1
1          features  2
2 (About us) Services 1
1  home   prjects   1
1  home   tasks     2


HOme::getAllComponents()

function getAllComponents($page_ID){ // 1
    pageComponents::find($page_ID)->components();
    $components = [
        projects : "metronic/components/projects/index.php",
        tasks : "metronic/components/tasks/index.php",
        {{-- banner : "banner",
        feature : "feature" --}}
   ]
    $activeTemplateComponents = ActiveTemplate::components();
    @foreach ($activeTemplateComponents as $aComponents)
        if(in_array($components, $aComponents->name)){            
            $data[$aComponents->name] = $this->$aComponents->name();
        }
    @endforeach
    $data = [];
    if(in_array($banner)){
        //get active template banners from pageID
        $data['banners'] = $upperData;

    }
    if(in_array($projects)){
        //get projects
        $data['projects'] = $projects;
    }
    //$data['services'] == [{}];
   
    return view($activeTemplate.pages.components-container.blade.php, compact($components, $data));
}

public function projects()


@foreach($components as $component)
  @include("netlify/components/services/index.php")
@endforeach

@foreach($data->banners as $banner)
    <img src="{{$banner->image}}" />
@endforeach

@foreach($data->services as $services)
        <h5>$services->name</h5>
@endforeach
  
//index.blade.php  
@include('header.blade.php')
<div id="components-container">
    @include('components-container.blade.php')
</div>
@include('footer.blade.php')




{{-- 
    blog.blade.php-> loop on components -> include(component)

    component.blade.php 
    -> Loop through posts;
    check post type
    
    --}}



    {{-- CMS Menu old view --}}
    <div class="col-md-12 col-sm-12 cms_menu_table">
		<table class="table table-striped" id="myTable">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Menu</th>
					<th scope="col">Sequence_no.</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody id="sort_me " class="menu_view_tbody">
				@foreach ($temp->cmsMenus as $cmsMenu)
					@if($cmsMenu->is_parent === 1)
						<tr data-toggle="collapse" data-target="#toggle_menu_child_table_{{$cmsMenu->id}}" class="accordion-toggle menu_parent_tr" >
							<th scope="row" style="cursor: pointer;"><i class="fa fa-caret-right" style="width: 30px;"></i></th>
							<td>{{$cmsMenu->name}}</td>
							<td>
								<span>{{$cmsMenu->seq_no}}</span>
							</td>
							<td>
								<span>
									<a title="Add"  class="btn btn-hover-danger btn-icon btn-pill add_cms_menu_page" data-route="cms/addmodal/menupage/" data-id="{{$cmsMenu->id}}" data-toggle="modal" data-target="#sys_icon_model">
										<i class="la la-plus" style="font-size: 1.2rem;"></i>							
									</a>
									<a title="Edit"  class="btn btn-hover-brand btn-icon btn-pill edit_cms_menu"  data-route="/cms/editmodal/menu/"  data-id="{{$cmsMenu->id}}" data-toggle="modal" data-target="#sys_icon_model">
										<i style="font-size: 1.2rem;" class="la la-edit"></i>							
									</a>
									<a title="Delete"  class="btn btn-hover-danger btn-icon btn-pill delButton" data-id="{{$cmsMenu->id}}" >
										<i class="la la-trash" style="font-size: 1.2rem;"></i>							
									</a>
									
								</span>
							
							</td>
						</tr>
					@endif

					
					<tr class="accordian-body collapse p-3" id="toggle_menu_child_table_{{$cmsMenu->id}}">		
						<td scope="col" colspan="8" class="menu_acc_child_td">
							<div>
								
								<table class="menu_child_table">
									@if (count($cmsMenu->childMenus)>0)
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Menu</th>
											<th scope="col">Sequence_no.</th>
											<th scope="col">Actions</th>
										</tr>
									</thead>
									<tbody id = 'sortMeChildTable'>
									
									@foreach($cmsMenu->childMenus as $childmenu)
										<tr>
											<th>#</th>
											<td>{{$childmenu->name}}</td>
											<td>{{$childmenu->seq_no}}</td>
											<td>
												<a title="Delete"  class="btn temp_table_del btn-icon btn-pill delButton" style="height: 2px;" data-id="{{$childmenu->id}}">
													<i class="la la-trash"></i>							
												</a>
											</td>
										</tr>
									@endforeach
									@else
										<span>No child menu</span>
										{{-- @if ($menu->is_parent === 0 && $menu->parent_id === $cmsMenu->id )
										<tr>
											<th>#</th>
											<td>{{$menu->name}}</td>
											<td>{{$menu->seq_no}}</td>
											<td>
												<a title="Delete"  class="btn temp_table_del btn-icon btn-pill delButton" style="height: 2px;" data-id="{{$menu->id}}">
													<i class="la la-trash"></i>							
												</a>
											</td>
										</tr>
										@endif --}}
										
									</tbody>
									@endif
								</table>

							</div>
						</td>
					</tr>
				@endforeach
				{{-- <tr data-toggle="collapse" data-target="#toggle_menu_child_table" class="accordion-toggle menu_parent_tr" >
					<th scope="row" style="cursor: pointer;"><i class="fa fa-caret-right" style="width: 30px;"></i></th>
					<td>name</td>
					<td>
						<span>Seq</span>
					</td>
					<td>
						<a title="Delete"  class="btn temp_table_del btn-icon btn-pill delButton" style="height: 2px;">
							<i class="la la-trash"></i>							
						</a>
					</td>
				</tr> --}}
				{{-- <tr class="accordian-body collapse p-3" id="toggle_menu_child_table">		
					<td scope="col" colspan="8" class="menu_acc_child_td">
						<div>
							<table class="menu_child_table">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Menu</th>
										<th scope="col">Sequence_no.</th>
										<th scope="col">Actions</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th>#</th>
										<td>Home</td>
										<td>1</td>
										<td>
											<a title="Delete"  class="btn temp_table_del btn-icon btn-pill delButton" style="height: 2px;">
												<i class="la la-trash"></i>							
											</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</td>
				</tr> --}}
			
			</tbody>
		</table>
    </div>
    {{-- End CMS Menu old view --}}