<div class="kt-portlet__head">
    <div class="kt-portlet__head-toolbar details_div">
        <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-danger nav-tabs-line-2x nav-tabs-line-right" role="tablist">
            <li class="nav-item  ">
                <a class="nav-link active">
                    Email Details
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="row m-row--no-padding dotted-brd" style="padding-bottom: 50px; padding-top: 27px;">
    <div class="" style="width: 64%; margin: 0 auto;">
        <div class="m-widget1" style="padding: 0.1rem 2.1rem;">
            <div class="m-widget1__item">
                <div class="row m-row--no-padding">             
                    <table cellpadding="10px" class="table-brd">
                        <tbody>
                            <tr style="text-align: right;">
                                <td style="padding-bottom: 35px; width:62%; text-align:left;"><span class="vol-labels"></span></td>
                                <td class="d-flex justify-content-between align-items-center">
                                    <a title="Edit details" data-target="#sy_global_modal" data-toggle="modal" data-route="/admin/userProfile/email/{{$user->id}}" class="btn btn-hover-brand btn-icon btn-pill model_load update_address_details" data-id="{{$user->id}}"><i class="la la-edit"></i>								
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="vol-labels" >Email: </span></td>
                                <td class="global_page_color">{{$user->emailSetting?$user->emailSetting->email: ''}}</td>
                            </tr>
                            <tr>
                                <td><span class="vol-labels">Server: </span></td>
                                <td class="global_page_color">{{$user->emailSetting?$user->emailSetting->server: ''}}</td>
                            </tr>
                            {{-- <tr>
                                <td><span class="vol-labels">Password: </span></td>
                                <td class="global_page_color">{{$user->emailSetting? $user->emailSetting->password: ''}}</td>
                            </tr> --}}
                            <tr>
                                <td><span class="vol-labels">Mail Type: </span></td>
                                <td class="global_page_color">{{$user->emailSetting? ucfirst($user->emailSetting->mail_type): ''}}</td>
                            </tr>
                            <tr>
                                <td><span class="vol-labels">Auth: </span></td>
                                @if($user->emailSetting)
                                @if($user->emailSetting->auth == 0)
                                    <td class="global_page_color">Off</td>
                                @else
                                <td class="global_page_color">On</td>
                                @endif
                                @else
                                <td class="global_page_color">-</td>
                                @endif
                            </tr>
                            <tr>
                                <td><span class="vol-labels">Is SSL: </span></td>
                                @if($user->emailSetting)
                                @if($user->emailSetting->is_ssl == 0)
                                    <td class="global_page_color">Off</td>
                                @else
                                <td class="global_page_color">On</td>
                                @endif
                                @else
                                <td class="global_page_color">-</td>
                                @endif
                            </tr>
                            <tr>
                                <td><span class="vol-labels">Is TLS: </span></td>
                                @if($user->emailSetting)
                                @if($user->emailSetting->is_tls == 0)
                                    <td class="global_page_color">Off</td>
                                @else
                                <td class="global_page_color">On</td>
                                @endif
                                @else
                                <td class="global_page_color">-</td>
                                @endif
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
    
    
    