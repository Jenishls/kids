<div class="kt-portlet kt-portlet--tabs detail" style="margin-bottom:0; box-shadow:none !important;">
    <div class="kt-portlet__body personal_info_portlet_body" style="padding:0px 0px;">
            <form action="">
                <div class="" id="personal_detail_child">
                    <div class="active " id="personal_detail_division" >
                        @include('supportNew.pages.userControl.inc.personal_details')
                    </div>
                    <div class="dotted-brd contact_details" id="contact_detail_division" >
                        @include('supportNew.pages.userControl.inc.user-contact-details')
                    </div>
                    <div class="dotted-brd address_info_details" id="address_detail_division" >
                        @include('supportNew.pages.userControl.inc.address-details')
                    </div>
                    
                </div>  
            </form>
    </div>
</div>