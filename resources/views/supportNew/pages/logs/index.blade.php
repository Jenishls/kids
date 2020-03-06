<div id="cms_template_view_container" class=" kt-content" style="padding-top: 13px;">
	{{-- begin breadcrumb --}}
	<div class="kt-subheader kt-grid__item uc_subHeader" id="kt_subheader" style="padding: 24px 0px;">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Template
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">Settings</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
					<a class="kt-subheader__breadcrumbs-link">Template</a>
				</div>
			</div>
		</div>
        
	</div>
	{{-- end breadcrumb --}}
	<div id="cms_template_view">
		<div class="row pt-2">
			<div class="col col-sm-12 col-md-12 col-lg-2 col-xl-2">
				<div class="col_style">
					<div class="kt-section" style="padding-bottom:3rem;">
						<div class="template_view_tt" >
							<div class="bs-searchbox " style="padding: 0;width: 100%;">
								Template
							</div>
						</div>
						<div class="kt-section__content kt-section__content--border kt-section__content--fit sideSectionContent ">
							<ul class="kt-nav kt-nav--bold kt-nav--md-space kt-nav--v3 " role="tablist" id="" style="padding: 0 20px;
							margin-top: 30px;">
															
								<li class="kt-nav__item  view_sections_element view_menu_active" role="tab">
									<a class="kt-nav__link">
										<span class="kt-nav__link-text">Menu</span>
									</a>
									{{-- <div class="section_edit_delete">
										<i class="la la-edit validation_section_li_edit " data-route="/validation/editSectionModal/1" data-toggle="modal" data-target="#sy_global_modal" style="font-size: 16px; padding: 0px 9px;"></i>
										<i class="la la-trash validation_section_li_delete delValidationSectionButton" data-id="1" style="font-size: 16px;"></i>
									</div> --}}
								</li>
								<hr style="margin: 0px; border-color: #e2d5c3;">
														
								<li class="kt-nav__item  view_sections_element" role="tab">
									<a class="kt-nav__link ">
										<span class="kt-nav__link-text">Pages</span>
									</a>
								</li>
								<hr style="margin: 0px; border-color: #e2d5c3;">
																							
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-sm-12 col-md-12 col-lg-9 col-xl-9">
				<div class="col_style">
					<div class="col-md-12" id="">
						</div>
				</div>
			</div>
	
		</div>
	</div>
</div>

<script>
$(document).off("click", ".view_sections_element").on("click", ".view_sections_element", function (e) {
    e.preventDefault();
    // alert('he');
    $(this).siblings().removeClass("view_menu_active");
    $(this).addClass("view_menu_active");
    let url = $(this).attr("data-url");
    view_sections_element(url);
});</script>