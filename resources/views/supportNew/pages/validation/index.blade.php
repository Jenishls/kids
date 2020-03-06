{{-- {{dd($validations->section)}} --}}
<div id="validation_container" class="validation_index">
    <!--BreadCrumb Start-->
    <div class="kt-subheader kt-grid__item uc_subHeader " id="kt_subheader">
		<div class="kt-container validation_breadcumb">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Validation
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">TABLES</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">Validation</a>
				</div>
            </div>
            <div>
                <button class="btn btn-pill btn-info m-btn add_validation_btn demo_2_add_btn_background" data-target="#sy_global_modal" data-toggle="modal"  id="addValidation" title="Add Validation">
                    <span>
                        <i class="la la-plus"></i>
                        <span>
                            Validation
                        </span>
                    </span>
                </button>
            </div>
		</div>
    </div>
    <!--BreadCrumb End-->
    <div class="row pt-2">
        <div class="col col-sm-12 col-md-12 col-lg-2 col-xl-2">
            <div class="col_style left_col_style">
                <div class="kt-section">
                        <div class="add_validation_section_div">
                            <div class="bs-searchbox " style="padding:0; width: 75%;">
                                <input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search" id="searchValidationSections" placeholder="Search Section" style="height: 34px;">
                            </div>
                            <div class="kt-subheader__wrapper" title="Add Section">
                                <a class="btn btn-brand btn-elevate btn-icon-sm create_new_section" data-route="/admin/validation/addSectionModal" id="addSection" style="color: white; height: 34px;"><i class="la la-plus validation_section_add_icon" style="padding-bottom: 6px;"></i>
                                    
                                </a>
                            </div>
                        </div>
                    <div class="kt-section__content kt-section__content--border kt-section__content--fit sideSectionContent sideValidNav">
                        <ul class="kt-nav kt-nav--bold kt-nav--md-space kt-nav--v3 "  role="tablist" id="validationSectionsContainer">
                            @foreach($validationSections as $section)
                            {{-- <div class="load_validations"> --}}
                                <li class="kt-nav__item  validation_sections_element"  role="tab">
                                    <a class="kt-nav__link load_validations" data-id="{{$section->id}}" data-toggle="tab" data-route="/admin/validations/list/{{$section->id}}"  style="padding-top:0; padding-left:0; width: 285px;" >
                                        <span class="kt-nav__link-text">{{ucfirst($section->section)}}</span>
                                    </a>
                                    <div class="section_edit_delete">
                                        <i class="la la-edit validation_section_li_edit " data-route="/admin/validation/editSectionModal/{{$section->id}}" data-toggle="modal" data-target="#sy_global_modal"style="font-size: 16px; padding: 0px 9px;"></i>
                                        <i class="la la-trash validation_section_li_delete delValidationSectionButton" data-id="{{$section->id}}" style="font-size: 16px;"></i>
                                    </div>
                                </li>
                                
                            {{-- </div> --}}
                                
                                
                                <hr style="margin: 0px;">
                            @endforeach
                                                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-sm-12 col-md-12 col-lg-9 col-xl-9">
            <div class="col_style">
                    <div class="col-md-12" id="lookupTableContainer"></div>
            </div>
        </div>

    </div>

</div>
<script>
    $(function(){
        $('#searchValidationSections').selectpicker({
            liveSearch: true,
            showTick: true
        });
            
    });
</script>