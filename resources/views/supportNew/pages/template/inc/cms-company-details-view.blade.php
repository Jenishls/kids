<div class="row search_row cms_post_row">
    <div class="rp_btn " style="width:100%">
        <div class="kt-subheader__wrapper page_table_head">
            <div style="" class="page_title_div">
                <button type="button" class="btn btn-bold" id=''>
                    <span class="page_name_span"> 
                        <span class="cms_title_name">Company Details</span>
                    </span>
                </button>
            </div>
        </div>
        

    </div>
</div>

<div class="cms_company_container">
    <div class="cms_company_holder">
        <div class="cms_company_header_location">
            <div class=" cms_company_head">
                <div class="kt-widget__media" style="display:inline-flex;">
                    <div class="cms_company_logo">
                        <img src="{{asset('/images/default.jpg')}}" id="comp_logo" alt="Logo"> 
                    </div>
                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle" id="kt_user_avatar_3">
                        
                        <label class="kt-avatar__upload logoUpload" data-toggle="kt-tooltip" title="" data-original-title="Change logo">
                            <i class="fa fa-pen"></i>
                            <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" onchange="document.getElementById('comp_logo').src = window.URL.createObjectURL(this.files[0])">
                        </label>
                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                            <i class="fa fa-times"></i>
                        </span>
                    </div>

                </div>
                
                <div class="cms_company_intro">
                    <div class="cmsCompanyInfo">
                        <p class="kt-widget__title cmsdefaultCompanyTitle">
                            Shubhu Tech
                        </p>
                        <span class="kt-widget__desc cmsdefaultCompanyHeadDesc">
                            Business Technology Solution Provider.
                        </span>
                        <p class="cms_company_desc">
                            Shubhu Tech is one of the few IT system integration, professional service and software development company that works with Enterprise systems and companies. As a privately-owned company, Shubhu Tech provides IT Consultancy, software design and development as well as professional services and hardware deployment 
                        </p>
                    </div>
                </div>
            </div>
            <div class=" cms_company_info">
                <div class="kt-widget__section cmsCompanyContactSection">
                    <span class="kt-widget__date cmsCompanyContactTitle">
                        <i class="fas fa-address-book"></i>Contact
                        <a title="Edit Contact" class="btn btn-hover-brand btn-icon btn-pill model_load editContact pull-right" style="height: 1.4rem;">		<i class="la la-edit"></i>							
                        </a>
                    </span>
                    <div class="contact_detl">
                        <div class="company_phone_number">
                            <p class="contact_p">
                                Phone No.:
                            </p>
                            <p class="myP">
                                01-4232556
                            </p>
                        </div>
                        <div class="">
                            <p class="contact_p">
                                Website:
                            </p>
                            <p>
                                www.shubhu.com
                            </p>
                        </div>
            
                        <div class="">
                            <p class="contact_p">
                                Email:
                            </p>
                            <p class="">
                                shubhu@gmail.com
            
                            </p>
                        </div>
                    </div>
                    
                </div>

                <div class="kt-widget__section cmscompanyAddressSection">
                    <span class="kt-widget__date cmsCompanyAddTitle">
                        <i class="fas fa-map-marker-alt"></i> Main Location
                    </span>
                    <div class="contact_detl">
                        <div class="company_phone_number">
                            <p class="address_p">
                                101 Kapan,
                            </p>
                        </div>
                        <div class="">
                            <p class="address_p">
                                SaraswotiNagar, Kapan, Kathmandu,
                            </p>
                        </div>
            
                        <div class="">
                            <p class="address_p">
                                44600,
                            </p>
                        </div>
                        <div class="">
                            <p class="address_p">
                                Nepal
                            </p>
                        </div>
                    </div>
                    
                </div>

                {{-- branch location --}}
                <div class="kt-widget__section cmscompanyAddressSection">
                    <span class="kt-widget__date cmsCompanyAddTitle">
                            <i class="fas fa-map-marker-alt"></i> Branch Location
                    </span>
                    <div class="contact_detl">
                        <div class="company_phone_number">
                            <p class="address_p">
                                    123 2nd street, Suite # A,
                            </p>
                        </div>
                        <div class="">
                            <p class="address_p">
                                    Austin, Texas,
                            </p>
                        </div>
            
                        <div class="">
                            <p class="address_p">
                                    75189,
                            </p>
                        </div>
                        <div class="">
                            <p class="address_p">
                                    USA.
                            </p>
                        </div>
                    </div>
                    
                </div>
                
            </div>

            
            
        </div>
        
        <div class="cms_company_body">
            
            <div class="employes_job">
                <div class="cmsCompanyInfoTitle">
                    <p>Info</p>
                </div>
                <div class="cms_company_est_date">
                    <p class="cms_company_employee">
                        Established Date
                    </p>
                    <p class="no_employee">
                        19/08/2015
                    </p>
                </div>
                <div class="">
                    <p class="cms_company_employee">
                        Industry
                    </p>
                    <p class="no_employee">
                        09789089080
    
                    </p>
                </div>
    
                <div class="">
                    <p class="cms_company_employee">
                        Ownership
                    </p>
                    <p class="no_employee">
                        Pvt. Ltd.
    
                    </p>
                </div>
    
                <div>
                    <p class="cms_company_employee">
                        Total Employees
                    </p>
                    <p class="no_employee">
                        20
                    </p>
                </div>
                
    
                
            </div>
            <div class="">
    
            </div>
        </div>
    </div>

    {{-- business hours --}}
    <hr style="width:100%;">

    <div class="kt-portlet__body kt-portlet__body--fit businessHourContent">
        <!--begin::Widget -->
        <div class=" cmsBusinessHoursHead">
            <div>
                <h5 class="business_title">Business Hours</h5>
            </div>
            <div class="kt-subheader__wrapper addHourBtn">
                <a href="#" class="btn btn-brand btn-elevate btn-icon-sm" id="addHoursBtn"><i class="la la-plus"></i>
                    <!-- Company -->
                </a>
            </div>
        </div>
        @include('supportNew.pages.template.inc.cms-company-business-hour')

        {{-- <div class="cms_business_table">
            <table class="table table-fixed">
                <thead>
                    <tr>
                    <th class="col-xs-3">Day</th>
                    <th class="col-xs-3">Open</th>
                    <th class="col-xs-6">Closes</th>
                    <th class="col-xs-6">Status</th>
                    <th class="col-xs-6">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td class="col-xs-3">Sunday</td>
                    <td class="col-xs-3">10:00 AM</td>
                    <td class="col-xs-6">11:00 PM</td>
                    <td class="col-xs-6">Open</td>
                    <td class="col-xs-6">
                        <span>
                            <a title="Edit" data-id="8" class="btn btn-icon btn-pill edit_cms_menu" data-route="" style="height: 2px;"><i class="la la-edit"></i>							
                            </a>

                            <a title="Delete" data-id="8" class="btn btn-icon btn-pill edit_cms_menu" data-route="" style="height: 2px;"><i class="la la-trash"></i>							
                            </a>
                        </span>
                    </td>
                    </tr>
            
                    <tr>
                    <td class="col-xs-3">John</td>
                    <td class="col-xs-3">Doe</td>
                    <td class="col-xs-6">johndoe@email.com</td>
                    <td class="col-xs-6">johndoe@email.com</td>
                    <td class="col-xs-6">
                        <span>
                            <a title="Edit" data-id="8" class="btn btn-icon btn-pill edit_cms_menu" data-route="" style="height: 2px;"><i class="la la-edit"></i>							
                            </a>

                            <a title="Delete" data-id="8" class="btn btn-icon btn-pill edit_cms_menu" data-route="" style="height: 2px;"><i class="la la-trash"></i>							
                            </a>
                        </span>
                    </td>
                    </tr>
                    
                </tbody>
            </table>
        </div> --}}
        <!--end::Widget -->
    </div>
    
</div>

<script>    
    $(document).on('click', '.editContact', function(e){
        e.preventDefault();
        alert('hello');
        var child = $(this).parent().siblings('.contact_detl').children('.company_phone_number').children('.myP');
        console.log(child);
        $(this).parent().siblings('.contact_detl').children('.company_phone_number').children('.myP').contentEditable = true;
    })
</script>