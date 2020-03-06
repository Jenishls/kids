<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <div class="kt-subheader   kt-grid__item rp_subheader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main kt_sub_main">
    
                <h3 class="kt-subheader__title">
                   Roles
                </h3>
    
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs kt_sub_bread_crumb">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">SETTINGS</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Icon</a>
                </div>
            </div>
            
            <div class="kt-subheader__toolbar rp_subheader_toolbar row">
                <div class="no-padding col-lg-2">
                    <div class="page-menu">
                        <div class="rp_menus">
                            <div id="role-page" class="rp_menu rp_menu_active" data-pageIndex="0" data-tab = "/" data-url = '/admin/rolePermission/pages'>
                                <a class="rp_menu_nav_link"><i class="far fa-file-alt rp_menu_icon"></i><p class="page_tab_name" style="margin:0;">Pages</p></a></div>
                            
                            <div id="role-role" class="rp_menu" data-pageIndex="1" data-tab = "/rolePermission/roles" data-url = '/admin/rolePermission/roles'>
                                <a class="rp_menu_nav_link"><i class="fas fa-user-lock rp_menu_icon"></i><p class="page_tab_name" style="margin:0;">Roles</p></a>
                            </div>
                            <div id="role-permission" class="rp_menu" data-pageIndex="2" data-tab = "/rolePermission/permission" data-url = '/admin/rolePermission/permission'>
                                <a class="rp_menu_nav_link"><i class="flaticon-interface-7 rp_menu_icon"></i> <p class="page_tab_name" style="margin:0;">Permissions</p></a>
                            </div>
                            <div id="role-permissionMgmt" class="rp_menu" data-pageIndex="3" data-tab = "/rolePermission/permissionManagement" data-url = '/admin/rolePermission/permission_management'>
                                <a  class="rp_menu_nav_link"><i class="fas fa-users-cog rp_menu_icon"></i><p class="page_tab_name" style="margin:0;">Role Permissions</p></a>
                            </div>
                            <div id="role-permissionUser" class="rp_menu" data-pageIndex="4" data-tab = "/rolePermission/userPermissions" data-url = '/admin/rolePermission/user_permission'>
                                <a class="rp_menu_nav_link"><i class="fas fa-user-cog rp_menu_icon"></i><p class="page_tab_name" style="margin:0;">User Permissions</p></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" right_kt_div col-lg-10">
                    <div class="right_kt_content">
                        {{-- <div class="right_kt_head_content">
                            <div id="current_tab_name" style="font-size: 17px; font-weight: 500;">
                            Pages
                            </div>
                        </div> --}}
                        
                        <div id="datatable_container">
                        @include('supportNew.pages.rolesPermission.inc.pages_table')
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <div id="data_field">
    
    </div>
    
    </div>
    
 
    <script type="text/javascript">
    
    var cssload =`<div id="cssload-loader">
        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>`; 
    
     $('.model_load').on('click',function() {
        //console.log($(this));
    
        event.preventDefault();
          $.ajax({
                method:'get',
                url: $(this).attr("data-route"),
                data: {},
                beforeSend: function(){
    
                     $('#sy_global_modal').html(cssload);
                },
                success: function(response, status, xhr) {
                    setTimeout(function(){
                       $('#sy_global_modal').html(response);  
                   }, 1000);
    
                 }, 
                 error: function (xhr, status, error){
    
                 }
            });
     });
    
    $(document).off('click', '#add_field').on('click', '#add_field', function(e){
		e.preventDefault();
		e.stopPropagation();
        let modal_name = $('.rp_menu_active').find('p').html();
		showModal({
			url: '/admin/callModal/'+modal_name	
		});
    });
    $(document).ready(function () {
    	$(".kt-header__topbar-wrapper").dropdown();
	});
    </script>