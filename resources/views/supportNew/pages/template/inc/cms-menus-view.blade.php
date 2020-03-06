<div class="row search_row cms_post_row">
	<div class="rp_btn " style="width:100%">
		<div class="kt-subheader__wrapper page_table_head">
			<div style="" class="page_title_div">
				<button type="button" class="btn btn-bold btn-label-brand btn-sm page_name_view" id=''>
					<span class="page_name_span"> 
						<span class="cms_title_name">Child Menus in {{ucfirst($menu->name)}}
							@if (count($menu->childMenus)<1)
							&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;<span>No Childmenus available</span>
							@endif
						</span>
					</span>
				</button>
			</div>
			<div>
				{{-- <button type="button" class="btn btn-bold btn-label-brand btn-sm add_field" data-route="/cms/addmodal/component/" data-toggle="modal" data-target="#sys_icon_model" data-id ="{{$temp->id}}"  id='add_cms_menu'>

				<span>
					<i class="la la-plus"></i>
					<span style="font-size: 1rem;">
						Menu
					</span>
				</span>
				</button> --}}
			</div>
		</div>
	</div>
</div>


{{-- <div class="row cms_menu_content"> --}}
	{{-- {{dd($menu->childMenus)}} --}}
	{{-- <div class="accordion  accordion-toggle-arrow" id="accordionExample4">
		<div class="card">
			<div class="card-header" id="headingOne4">
				<div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="false" aria-controls="collapseOne4">
					<i class="flaticon2-layers-1"></i> User Permissions
				</div>
			</div>
			<div id="collapseOne4" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample4" style="">
				<div class="card-body">
					Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header" id="headingTwo4">
				<div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo4" aria-expanded="false" aria-controls="collapseTwo4">
					<i class="flaticon2-copy"></i> Account Settings
				</div>
			</div>
			<div id="collapseTwo4" class="collapse" aria-labelledby="headingTwo1" data-parent="#accordionExample4">
				<div class="card-body">
					Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header" id="headingThree4">
				<div class="card-title collapsed" data-toggle="collapse" data-target="#collapseThree4" aria-expanded="false" aria-controls="collapseThree4">
					<i class="flaticon2-bell-alarm-symbol"></i> Application Options
				</div>
			</div>
			<div id="collapseThree4" class="collapse" aria-labelledby="headingThree1" data-parent="#accordionExample4">
				<div class="card-body">
					Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				</div>
			</div>
		</div>
	</div> --}}
<div class="row cms_menu_content">
    <div class="col-md-12 col-sm-12 cms_menu_table">
		@if (count($menu->childMenus)>0)
			
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Seq#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Linked to</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="sort_me">
                @foreach ($menu->childMenus as $childMenu)
                    <tr id="{{$childMenu->id}}">
					<td>
						<span>{{$childMenu->seq_no}}</span>
					</td>
                    <td>{{ucfirst($childMenu->name)}}</td>
					<td>
                        <span>{{$childMenu->route}}</span>
                    </td>
                    <td>
						<a title="Edit" data-id="{{$childMenu->id}}" class="btn btn-icon btn-pill edit_cms_menu" data-route="/admin/cms/editmodal/menu/{{$childMenu->id}}" style="height: 2px;"><i class="la la-edit"></i>							
                        </a>
                        <a title="Delete" data-id="{{$childMenu->id}}" class="btn temp_table_del btn-icon btn-pill delButton" href="#" style="height: 2px;">								<i class="la la-trash"></i>							
                        </a>
                    </td>
                    </tr>
                @endforeach
                {{-- <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                </tr> --}}
            </tbody>
		</table>
		@else
			
			<table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Seq#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Linked to</th>
                </tr>
            </thead>
            <tbody id="sort_me">
                    <tr id="{{$menu->id}}">
					<td>
						<span>{{$menu->seq_no}}</span>
					</td>
                    <td>{{ucfirst($menu->name)}}</td>
					<td>
                        <span>{{$menu->route}}</span>
                    </td>
                    
                    </tr>
            </tbody>
		</table>
		@endif
		
    </div>
</div>
	
{{-- </div> --}}

	<div id="t_cmsmenustable"></div>

    <script type="text/javascript">	
		var menuTableToggleIcon = 0;

		$(document).off('click', '#add_cms_menu').on('click', '#add_cms_menu', function(e){
			e.preventDefault();
			e.stopPropagation();
			let template_id = $(this).attr('data-id');
			showModal({
				url: '/admin/cms/addmodal/menu/'+template_id	
			});
		}).off('click', '.edit_cms_menu').on('click', '.edit_cms_menu', function(e){
			e.preventDefault();
			let menu_id = $(this).attr('data-id');

			showModal({
				url: '/admin/cms/editmodal/menu/'+menu_id
			});
		}).off('click', '.add_cms_menu_page').on('click', '.add_cms_menu_page', function(e){
			e.preventDefault();
			let menu_id = $(this).attr('data-id');

			showModal({
				url: '/admin/cms/addmodal/menupage/'+menu_id
			});
		}).off('click', '.delButton').on('click', '.delButton', function(e){
			e.preventDefault();
			let id= $(this).data('id');
			delConfirm({
				url:"/admin/cms/delete/menu/"+id
			});
		});

		// $('.accordion-toggle').click(function(){
		// 	$('.hiddenRow').hide();
		// 	$(this).next('tr').find('.hiddenRow').show();
		// });
		$(document).on('click','.menu_parent_tr', function(e) {
			e.preventDefault();
			$(this).siblings().removeClass("menu_tr_active");
    		$(this).addClass("menu_tr_active");
			
			if(menuTableToggleIcon === 0){
				$(this).children('th').children('i').removeClass('fa-caret-right').addClass('fa-caret-down');
				menuTableToggleIcon = 1;
			}else{
				$(this).children('th').children('i').removeClass('fa-caret-down').addClass('fa-caret-right');
				menuTableToggleIcon = 0;
			}
		})
		
		
		$("#sort_me").sortable({
        distance: 5,
        delay: 100,
        opacity: 0.6,
        cursor: 'move',
        update: function(event, ui) {
            var seqData = new Array();
            $('#sort_me tr').each( function() {
                seqData.push({['menu_id']:$(this).attr("id")});
            });

            $.ajax({
                url:'/admin/cms/menu/drag_sort',
                method:'POST',
                data:{data:seqData},
                success: function(resp) {
                    $('#cmsElContainer').empty().append(resp);
                }
            });
        }
    });
	</script>