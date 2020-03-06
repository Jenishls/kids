<div class="membership_info_title_name">
    <span class="head_bottom_border">Contact Details</span> 
</div>
<div class="row m-row--no-padding" style="padding-bottom: 52px;">
    <div class="" style="width: 64%; margin: 0 auto;">
        <div class="m-widget1" style="padding: 0rem 2.1rem;">
            <div class="m-widget1__item">
                <div class="row m-row--no-padding">             
                    <table cellpadding="10px" class="table-brd">
                        <tbody>
                            <tr style="text-align: right;">
                                <td style="padding-bottom: 15px; width:62%; text-align:left;">
                                    <span class="vol-labels" style="font-size: 16px;"></span>
                                </td>
                                <td class="d-flex justify-content-between align-items-center">
                                    <a title="Edit details" data-target="#sy_global_modal" data-toggle="modal" data-route="/userProfile/contact/{{$user->id}}" class="btn btn-hover-brand btn-icon btn-pill model_load update_address_details" data-id="{{$user->id}}"><i class="la la-edit"></i>								
                                    </a>
                                </td>
                            </tr>
                            {{-- Begin Contact Info  --}}
                            <tr>
                                <td class="num_email_icon" style="padding-left: 15px;">
                                    <img src="{{asset('media/img/mobile_number_icon.png')}}" />
                                    <span class="vol-labels">
                                        Mobile: 
                                    </span>
                                </td>
                                <td class="global_page_color user_mobile_num">{{$user->member->mobile_no? $user->member->mobile_no: ''}}</td>
                            </tr>
                            <tr>
                                <td class="num_email_icon">
                                    <img src="{{asset('media/img/home_number_icon.png')}}"/>
                                    <span class="vol-labels ">Contact Number(Home):
                                     </span>
                                </td>
                                <td class="global_page_color">{{$user->member->home_phone_no? $user->member->home_phone_no: ''}}</td>
                            </tr>
                            <tr>

                                <td class="num_email_icon">
                                    <img src="{{asset('media/img/office_num_icon.png')}}"/>
                                    <span class="vol-labels ">Contact Number(Office): </span>
                                </td>
                                <td class="global_page_color">{{$user->member->office_phone_no? $user->member->office_phone_no: ''}}</td>
                            </tr>
                            {{-- EndContact Info  --}}

                            {{-- Begin Contact Info  --}}
                            <tr>
                                <td class="num_email_icon">
                                    <img src="{{asset('media/img/personal_email.png')}}"/>
                                    <span class="vol-labels ">Personal Email: </span>
                                </td>
                                <td class="global_page_color">{{$user->member->personal_email? $user->member->personal_email: ''}}</td>
                            </tr>
                            <tr>
                                <td class="num_email_icon">
                                    <img src="{{asset('media/img/office_email_icon.png')}}"/>
                                    <span class="vol-labels ">Office Email: </span>
                                </td>
                                <td class="global_page_color">{{$user->member->office_email? $user->member->office_email: ''}}</td>
                            </tr>
                            <tr>
                                <td class="num_email_icon">
                                    <img src="{{asset('media/img/other_email.png')}}"/>
                                    <span class="vol-labels">Other Email: </span>
                                </td>
                                <td class="global_page_color">{{$user->member->other_email? $user->member->other_email: ''}}</td>
                            </tr>
                            {{-- EndContact Info  --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>