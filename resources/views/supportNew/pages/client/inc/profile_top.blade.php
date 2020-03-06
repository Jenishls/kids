<style>
.edit_this:hover{
    color: #22b9ff;
}
.kt-widget__desc p{
    margin-bottom:0px !important;
    padding-bottom:5px !important;
}
.kt-svg-icon g [fill] {
    fill: #6c7293;
}
.kt-svg-icon {
    height: 17px;
    width: 23px;
}
@media screen  and (max-width:1311px) and (min-width:1024px){
    .b1311to1024{
        -webkit-box-flex: 0!important;
        -ms-flex: 0 0 100%!important;
        flex: 0 0 100%!important;
        max-width: 100%!important;
    }
}
.dashedBorderRespr{
    border-right:1px dashed grey;
    padding-right:20px;
}
.rowAfterPicture{
    padding-left:40px!important;
}
@media screen and (max-width:1311px){
    .rowAfterPicture{
        padding-left:1.7rem!important;
    }
    .b1311to1024.b{
        padding-top:5px;
    }
    .bRowResp{
        margin-left:10px;
    }
    .semiSectionBordR{
        border-right: 1px dashed grey;
    }
    .dashedBorderRespr{
        border:none;
        border-bottom: 1px dashed grey!important;
        padding-right:0.9rem;
    }
}

</style>
<!--Begin:: Portlet-->
<div class="kt-portlet">
    <div class="kt-portlet__body">
        <div class="kt-widget kt-widget--user-profile-3">
            <div class="kt-widget__top">
                <div class="kt-widget__media">
                    <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                        <form id="client_image_form" enctype="multipart/form-data">
                            @csrf
                            @if ($client->image)
                                <div class="kt-avatar__holder" id="uploaded_img" style="background-image: url(data:image;base64,{{base64_encode(file_get_contents(storage_path("client/profile/".$client->image->file_name)))}}"></div>
                            @else
                                <div class="kt-avatar__holder" id="uploaded_img" style="background-image: url({{asset('media/users/default.jpg')}})"></div>
                            @endif
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar" style="z-index:1;">
                                <i class="fa fa-pen"></i>
                                <input id="client_pic" data-id="{{$client->id}}" type="file" name="client_profile_pic" accept=".png, .jpg, .jpeg">
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                <i class="fa fa-times"></i>
                            </span>
                        </form>
                    </div>
                </div>
                <div class="row bRowResp" style="width:100%;">
                    <div class="col-lg-6 col-md-12 b1311to1024 dashedBorderRespr" id="updateClientAddrContact">
                        <div class="row">
                             <div class="kt-widget__content col-lg-6 col-md-6 semiSectionBordR rowAfterPicture">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__user">
                                        <a class="kt-widget__username">
                                            <span id="salutation">
                                                {{ucfirst($client->salutation)}}.

                                            </span>
                                            <span  id="fname">
                                                 {{ucfirst($client->fname)}} 
                                            </span>
                                            <span id="mname">
                                                 {{$client->mname ? ucfirst($client->mname): ''}}
                                            </span>
                                            <span id="lname">
                                                {{$client->lname ? ucfirst($client->lname): ''}} 
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="kt-widget__info" style="margin-top:10px;">
                                     {{-- <span><i class="fa fa-directions"></i></span> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg>
                                    <div class="kt-widget__desc">
                                        @if ($client->address)
                                            <p><span id="add1">{{$client->address->add1}}</span></p>
                                            <p><span id="add2">{{$client->address->add2}}</span></p>
                                            <p>
                                                <span id="city">{{$client->address->city}}</span>,
                                                <span id="state">{{$client->address->state}}</span>,
                                                <span id="zip">{{$client->address->zip}}</span>
                                            </p>
                                            <p>
                                                <span id="county">
                                                    {{$client->address->county}}
                                                </span>
                                            </p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget__content col-lg-6 col-md-6 ">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__user">
                                        <a class="kt-widget__username">
                                            Contact Information
                                        </a>
                                    </div>
                                    <div class="kt-widget__action">
                                        <a class="edit_this" data-route="/admin/client/editcontactdetails/{{$client->id}}">
                                            <span><i class="flaticon2-note" style="font-size:1.3rem;"></i></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="kt-widget__info" style="margin-top:10px;">
                                    <div class="kt-widget__desc">
                                         @if ($client->contact && $client->contact->phone_no)
                                            @if($client->contact->phone_no)
                                                <p>

                                                    <i class="flaticon2-phone"></i>&nbsp;&nbsp;&nbsp;<span id="phone_no">{{$client->contact->phone_no}}</span>
                                                </p>
                                            @endif
                                            @if($client->contact->mobile_no)
                                                <p>
                                                    <i class="la la-mobile-phone"></i>&nbsp;&nbsp;&nbsp;
                                                    <span id="mobile_no">{{$client->contact->mobile_no}}</span>
                                                </p>
                                            @endif
                                             @if($client->contact->email)
                                                <p>
                                                    <i class="flaticon-email"></i>&nbsp;&nbsp;&nbsp;
                                                    <span id="email">{{$client->contact->email}}</span>
                                                </p>
                                             @endif
                                             @if($client->contact->other_email)
                                                <p>
                                                    <i class="flaticon2-mail"></i>&nbsp;&nbsp;&nbsp;
                                                    <span id="other_email">{{$client->contact->other_email}}</span>
                                                </p>
                                             @endif
                                        @else
                                            @if($client->phone_no)
                                                <p>
                                                    <i class="flaticon2-phone"></i>&nbsp;&nbsp;&nbsp;
                                                    <span id="phone_no">{{$client->phone_no}}</span>
                                                </p>
                                            @endif
                                            @if($client->email)
                                               <p>
                                                    <i class="flaticon-email"></i>&nbsp;&nbsp;&nbsp;
                                                    <span id="email">{{$client->email}}</span>
                                                </p> 
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 b1311to1024 b">
                        <div class="row">
                            <div class="kt-widget__content col-lg-6 col-md-6 semiSectionBordR" style="" id="companyGeneralInfo">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__user">
                                        <a class="kt-widget__username">
                                            Company Information 
                                        </a>
                                    </div>
                                    <div class="kt-widget__action">
                                        <a class="btn btn-clean btn-sm btn-icon btn-icon-md edit_account" data-route="/admin/client/companies/edit/{{$client->id}}">
                                            <span><i class="flaticon2-note" style="font-size:1.3rem;"></i></span>
                                        </a>
                                    </div>
                                </div>
                                @if($company)
                                <div class="kt-widget__info" style="margin-top:10px;">
                                   <div class="mb-2" style="width:100% !important;">
        
                                        <i class="la la-bank mr-2"></i>
                                        <span id="c_name">
                                            {{$company->c_name}}
                                        </span>
        
                                    </div>
                                    @if($company->address && $company->address->add1)
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                    @endif
                                    <div class="kt-widget__desc">
                                        @if($company->address && $company->address->add1)
                                            <p>
                                                <span id="add1">
                                                    @if(isset($company->address->add1) && $company->address->add1)
                                                        {{$company->address->add1}},
                                                    @endif
                                                </span>
                                            </p>
                                        @endif
                                        @if($company->address && $company->address->add2)
                                            <p>
                                                <span id="add2">
                                                    @if(isset($company->address->add2) && $company->address->add2)
                                                        {{$company->address->add2}},
                                                    @endif
                                                </span>
                                            </p>
                                        @endif
                                        <p>
                                            <span id="city">
                                                @if(isset($company->address->city) && $company->address->city)
                                                    {{$company->address->city}},
                                                @endif
                                            </span>
                                            <span id="state">
                                                @if(isset($company->address->state) && $company->address->state)
                                                    {{$company->address->state}},
                                                @endif
                                            </span>
                                            <span id="zip">
                                                @if(isset($company->address->zip) && $company->address->zip)
                                                    {{$company->address->zip}},
                                                @endif
                                            </span>
                                        </p>
                                        <p>
                                            <span id="phone_no">
                                                @if(isset($company->contact->phone_no) && $company->contact->phone_no)
                                                    {{$company->contact->phone_no}},
                                                @endif
                                            </span>
                                        </p>
                                        <p>
                                            <span id="mobile_no">
                                                @if(isset($company->contact->mobile_no) && $company->contact->mobile_no)
                                                    {{$company->contact->mobile_no}},
                                                @endif
                                            </span>
                                        </p>
                                        <p >
                                            {{-- <i class="flaticon2-new-email"></i> --}}
                                            <a href="{{$company->url}}/" target="_blank">
                                                <span id="url">
                                                    @if(isset($company->url))
                                                        {{$company->url}},
                                                    @endif
                                                </span>
                                            </a>
                                        </p>
                                        {{-- <span>{{$address->city}}, {{$address->state}}, {{$address->zip}}</span>
                                        <br>
                                        <span>{{$address->county}}</span> --}}
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="kt-widget__content col-lg-6 col-md-6 "  >
                                <div class="kt-widget__head">
                                    <div class="kt-widget__user">
                                        <a class="kt-widget__username">
                                           Summary
                                        </a>
                                    </div>
                                </div>
                                <div class="kt-widget__info" style="margin-top:10px;">
                                    <div class="kt-widget__desc">
                                        <div style="display: flex;">
                                            <span style="flex:1;">Client Since </span>
                                            <span style="flex:1;">: {{format_to_us_date($client->created_at)}} </span>
                                        </div>
                                        <hr style="margin-top:0px !important; margin-bottom:0px !important; border-top: 1px dotted rgba(0,0,0,0.1) !important;padding-bottom:5px !important;">
                                        <div style="display: flex;">
                                            <span style="flex:1;">Total Invoice </span>
                                            <span style="flex:1;">: $395.50 </span>
                                        </div>
                                        <hr style="margin-top:0px !important; margin-bottom:0px !important; border-top: 1px dotted rgba(0,0,0,0.1) !important;padding-bottom:5px !important;">
                                        <div style="display: flex;">
                                            <span style="flex:1;">Outstanding Payment </span>
                                            <span style="flex:1;">: $45 </span>
                                        </div>
                                        <hr style="margin-top:0px !important; margin-bottom:0px !important; border-top: 1px dotted rgba(0,0,0,0.1) !important;padding-bottom:5px !important;">
                                        <div class="kt-widget13__item" style="display: flex;">
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text" style="flex:1;margin:auto 0;">
                                                    Status
                                            </span>
                                            <span class="kt-widget13__text" style="flex:1;"> 
                                                :
                                                <span id="clientStatusDiv">
                                                    @if($client->status == "active")
                                                        <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill pointer" data-id="{{$client->id}}">Active</span>
                                                    @elseif($client->status == "inactive")
                                                        <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill pointer" data-id="{{$client->id}}" >Inactive</span>
                                                    @endif
                                                </span>
                                                <div class="dropdown dropdown-inline">
                                                    <button type="button" class="btn btn-sm btn-hover-brand btn-elevate-hover btn-icon btn-icon-md btn-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                        <i class="far fa-edit"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" style="">
                                                        <a class="dropdown-item pointer update_client_status" data-status="active"> Active</a>
                                                        <a class="dropdown-item pointer update_client_status" data-status="inactive"> Inactive</a>
                                                    </div>
                                                </div>		 
                                            </span>
                                        </div>
                                        <hr style="margin-top:0px !important; margin-bottom:0px !important; border-top: 1px dotted rgba(0,0,0,0.1) !important;padding-bottom:5px !important;">
                                        <div style="display: flex;">
                                            <span style="flex:1;">Last Order Date </span>
                                            <span style="flex:1;">: 
                                                @if($client->latestOrder)
                                                {{format_to_us_date($client->latestOrder->created_at)}}
                                                @endif
                                            </span>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End:: Portlet-->
<script>
    $('#client_pic').change(function(e){
        e.preventDefault();
        var profile_pic = window.URL.createObjectURL(this.files[0]);
        var pic = new FormData(document.getElementById('client_image_form'));
        let file = this.files;
        let id = $(this).attr('data-id');
        $.ajax({
            url: `/admin/client/profile/image/update/${id}`,
            method: "POST",
            data : pic,
            contentType: false,
            processData: false,
            success: function(response){
                if(response.image){
                    $('#uploaded_img').css({backgroundImage:`url(/admin/client/profile/c/view/${response.image})`});
                    toastr.success('<strong> Updated Image Succesfully!</strong>');
                }
            }
        });
    });
    $(document).off('click', '.edit_this').on('click', '.edit_this', function(e){
        e.preventDefault();
        showModal({
            url: $(this).attr('data-route')
        });
    })
    $(document).off('click', '.update_client_status').on('click', '.update_client_status', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let status = $(this).attr('data-status');
        showModal({
            url: "/admin/client/status/{{$client->id}}?status="+status,
        });
    });
</script>