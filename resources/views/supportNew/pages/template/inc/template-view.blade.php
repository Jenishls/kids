<div id="cms_template_view_container" class=" kt-content" style="padding-top: 13px;">
	{{-- begin breadcrumb --}}
	<div class="kt-subheader kt-grid__item uc_subHeader" id="kt_subheader" style="padding: 24px 0px;">
		<div class="kt-container sub_header">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					{{ucfirst($cms_temp->name)}}
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
					<a class="kt-subheader__breadcrumbs-link">Settings</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a class="kt-subheader__breadcrumbs-link pageload" data-route="/admin/cms">Template</a>
                    
				</div>
			</div>
			<div class="back_temp">
				<a class="kt-menu__link pageload" onclick="event.preventDefault();" data-route="/admin/cms">
					<i class="fas fa-arrow-left" style="padding-right: 10px;
					"></i>
					Back
				</a>
			</div>
		</div>
        
	</div>
	{{-- end breadcrumb --}}


	
	{{-- {{dd($cms_temp->cmsPages)}} --}}
	<div id="cms_template_view" data-id="{{$cms_temp->id}}">
		<div class="row pt-2">
			<div class="col col-sm-12 col-md-12 col-lg-3 col-xl-3" style="max-width: 19%;">

				<div class="kt-portlet kt-portlet--tabs">
					<div class="kt-portlet__head" style="padding:0px 10px;">
						<div class="kt-portlet__head-toolbar">
							<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success nav-tabs-line-2x" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#kt_portlet_base_demo_1_1_tab_content" role="tab" aria-selected="true">
										<i class="la la-cog"></i> Page Set Up
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#content_mgnt" role="tab" aria-selected="false">
										<i class="la la-briefcase"></i>Manage Component
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="kt-portlet__body component_page_body" style="padding:0;">
						<div class="tab-content">
							<div class="tab-pane active" id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">

								{{-- company --}}
								<div class="menu_card card">
									<div class="card-header company_view" id="cms_company " data-route="/admin/cms/view/company/1">
										<div class="card-title menu_card_title">
											<i class="fas fa-building"></i> Company Details
										</div>
									</div>
								</div>

								{{-- menus --}}
								<div class="accordion accordion-solid accordion-toggle-arrow" id="accordionExample1">
									<div class="card menu_card">
										<div class="card-header" id="headingOne1">
											<div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne1">
												<i class="flaticon-menu-2"></i> Menus
											</div>
										</div>
										<div id="collapseOne1" class="collapse page_section " aria-labelledby="headingOne1" data-parent="#accordionExample1" style="">
											<div class="card-body ">
												<div class="template_view_tt">
													<div class="add_new_menu" style="" id="add_cms_menu" data-id="{{$cms_temp->id}}">
														<span>
															<i class="la la-plus"></i>
															<span style="font-size:1.1rem">
																New Menu
															</span>
														</span>
													</div>
												</div>
												<div class="kt-section__content kt-section__content--border kt-section__content--fit sideSectionContent">
													<ul class="kt-nav kt-nav--bold kt-nav--md-space kt-nav--v3 " role="tablist" id="accordion" style="">
														@foreach ($cms_temp->cmsMenus as $menu)
															@if ($menu->is_parent === 1)
																
																<li class="kt-nav__item  view_sections_element" data-route="/admin/cms/view/menus/{{$menu->id}}" role="tab">
																	<a class="kt-nav__link">
																			<i class="fas fa-bars"></i><span class="kt-nav__link-text" style="padding-left: 10px;">{{ucfirst($menu->name)}}</span>
																	</a>
																	<div class="cms_page_edit_delete">
																		<i class="la la-edit cms_page_li_edit " data-route="/admin/cms/editmodal/menu/{{$menu->id}}" data-toggle="modal" data-target="#sy_global_modal"style="font-size: 16px; padding: 0px 9px;" title="Edit {{ucfirst($menu->name)}}"></i>
																		<i class="la la-trash cms_page_li_delete delCmsMenuPageButton" data-id="menu/{{$menu->id}}" style="font-size: 16px;" title="Delete {{ucfirst($menu->name)}}"></i>
																	</div>
																	{{-- @if (count($menu->childMenus)>0)
																		<ul>
																			@foreach ($menu->childMenus as $children)
																				<liclass="kt-nav__item view_sections_element" data-route="/cms/view/posts/{{$children->id}}" role="tab">{{ucwords($children->name)}}</li>
																			@endforeach
																		</ul>
																	@endif --}}
																</li>
															@endif
														@endforeach
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--begin::Accordion-->
								
								<div class="accordion accordion-solid accordion-toggle-arrow" id="accordionExample6">
									<div class="card">
										<div class="card-header" id="headingOne6">
											<div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne6" aria-expanded="false" aria-controls="collapseOne6">
												<i class="fas fa-copy"></i> Pages
											</div>
										</div>
										<div id="collapseOne6" class="collapse page_section " aria-labelledby="headingOne6" data-parent="#accordionExample6" style="">
											<div class="card-body ">
												<div class="template_view_tt">
													<div class="add_new_menu" style="" id="add_cms_page" data-id="{{$cms_temp->id}}">
														<span>
															<i class="la la-plus"></i>
															<span style="font-size:1.1rem">
																New Page
															</span>
														</span>
													</div>
												</div>
												<div class="kt-section__content kt-section__content--border kt-section__content--fit sideSectionContent">
													<ul class="kt-nav kt-nav--bold kt-nav--md-space kt-nav--v3 " role="tablist" id="accordion" style="">
														@foreach ($cms_temp->cmsPages as $page)
															<li class="kt-nav__item  view_sections_element" data-route="/admin/cms/components/{{$page->id}}" role="tab">
																<a class="kt-nav__link">
																		<i class="fas fa-copy"></i><span class="kt-nav__link-text" style="padding-left: 10px;">{{ucfirst($page->page_name)}}</span>
																</a>
																<div class="cms_page_edit_delete">
																<i class="la la-edit cms_page_li_edit " data-route="/admin/cms/editmodal/page/{{$page->id}}" data-toggle="modal" data-target="#sy_global_modal"style="font-size: 16px; padding: 0px 9px;" title="Edit {{ucfirst($page->page_name)}}"></i>
																	<i class="la la-trash cms_page_li_delete delCmsMenuPageButton" data-id="page/{{$page->id}}" style="font-size: 16px;" title="Delete {{ucfirst($page->page_name)}}"></i>
																</div>
															</li>
														@endforeach
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--end::Accordion-->

								
							</div>
							<div class="tab-pane" id="content_mgnt" role="tabpanel">
								<span>Components</span> 
								<ul>
									@foreach ($all_components as $component)
										<li class="kt-nav__item view_sections_element" data-route="/admin/cms/view/posts/{{$component->id}}" role="tab">
											<a class="kt-nav__link" style="padding-left:0 !important;">
												<span class="kt-nav__link-text">{{ucfirst($component->name)}}</span>
											</a>
											{{-- <div class="cms_page_edit_delete">
												<i class="la la-edit cms_page_li_edit " data-route="/cms/editmodal/page/{{$post->id}}" data-toggle="modal" data-target="#sy_global_modal"style="font-size: 16px; padding: 0px 9px;" title="Edit {{ucfirst($post->)}}"></i>
												<i class="la la-trash cms_page_li_delete delCmsMenuPageButton" data-id="{{$page->id}}" style="font-size: 16px;" title="Delete {{ucfirst($page->page_name)}}"></i>
											</div> --}}
										</li>
									@endforeach
								</ul>
							</div>

							
						</div> 
						
						
					</div>
				</div>

				
			</div>
			<div class="col col-sm-12 col-md-12 col-lg-9 col-xl-9">
				<div class="col_style">
					<div class="col-md-12 kt-kt-portlet sticky" id="cmsElContainer" data-sticky="true" data-margin-top="100px" data-sticky-for="1023" data-sticky-class="kt-sticky">
						{{-- @include('supportNew.pages.template.inc.cms-component-view') --}}
					</div>
				</div>
			</div>
	
		</div>
	</div>
</div>

<script>

$(document).off('click', '.company_view').on('click', '.company_view', function (e){
	e.preventDefault();
	let url = $(this).attr('data-route');

	supportAjax({
		url: url,
		
	}, function(resp){
		$('#cmsElContainer').empty().append(resp);
	},
	function (err){
		
	}
	)

});

$(document).off("click", ".view_sections_element").on("click", ".view_sections_element", function (e) {
    e.preventDefault();
    $(this).siblings().removeClass("view_menu_active");
    $(this).addClass("view_menu_active");
	let url = $(this).attr("data-route");
	
	if($(this).hasClass('view_menu_active')){
		$(this).siblings().removeClass("view_menu_active");
		$(this).children('.cms_page_edit_delete').children().css('display', 'block');
		$(this).siblings().children('.cms_page_edit_delete').children().css('display', 'none');
	}else {
            // el.css('display', 'none');
            $(this).css('background', 'white');

        }
    $.ajax({
        url: url,
        method: "GET",
        success: function(resp) {
                $('#cmsElContainer').empty().append(resp);
        },
        error: function(err) {
            console.log(err);
        }
    });

});
$(document).off('click', '.pageload').on('click', '.pageload', function(e){
	e.preventDefault();
	let url = $(this).attr('data-route');
	supportAjax({
		url:url,
		
	},function(resp){
		$('#kt_body').empty().append(resp);

	})
});

$(document).off('click', '#add_cms_page').on('click', '#add_cms_page', function(e){
		e.preventDefault();
		e.stopPropagation();
		let template_id = $(this).attr('data-id');
		showModal({
			url: '/admin/cms/addmodal/page/'+template_id	
		});
	})
	.off('click', '.cms_page_li_edit').on('click', '.cms_page_li_edit', function(e){
		e.preventDefault();
		showModal({
			url: $(this).data('route')	
		});
	}).off('click', '.delCmsMenuPageButton').on('click', '.delCmsMenuPageButton', function(e){
		e.preventDefault();
		let id= $(this).attr('data-id');
		console.log(id);
		delConfirm({
			url:`/admin/cms/delete/${id}`,
			appendView: $("#kt_body")

		});
	});

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
</script>