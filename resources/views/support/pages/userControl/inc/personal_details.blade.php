<div class="kt-portlet__head">
    <div class="kt-portlet__head-toolbar details_div">
        <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-danger nav-tabs-line-2x nav-tabs-line-right" role="tablist">
            <li class="nav-item  ">
                <a class="nav-link active">
                    Personal Details
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
                                    <a title="Edit details" data-target="#sy_global_modal" data-toggle="modal" data-route="/dashboard/userProfile/personal/{{$user->id}}" class="btn btn-hover-brand btn-icon btn-pill model_load update_address_details" data-id="{{$user->id}}"><i class="la la-edit"></i>								
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="vol-labels" >Date of Birth: </span></td>
                                <td class="global_page_color">{{$user->member->date_of_birth? $user->member->date_of_birth: ''}}</td>
                            </tr>
                            <tr>
                                <td><span class="vol-labels">Place of Birth: </span></td>
                                <td class="global_page_color">{{$user->member->place_of_birth? ucfirst($user->member->place_of_birth): ''}}</td>
                            </tr>
                            <tr>
                                <td><span class="vol-labels">Gender: </span></td>
                                <td class="global_page_color">{{$user->member->sex? ucfirst($user->member->sex): ''}}</td>
                            </tr>
                            <tr>
                                <td><span class="vol-labels">Marital Status: </span></td>
                                <td class="global_page_color">{{$user->member->marital_status? ucfirst($user->member->marital_status): ''}}</td>
                            </tr>
                            <tr>
                                <td><span class="vol-labels">Anniversary Date: </span></td>
                                <td class="global_page_color">{{$user->member->ann_date? $user->member->ann_date: ''}}</td>
                            </tr>
                            <tr>
                                <td><span class="vol-labels">Religion: </span></td>
                                <td class="global_page_color">{{$user->member->religion? ucfirst($user->member->religion): ''}}</td>
                            </tr>
                            <tr>
                                <td><span class="vol-labels">Race: </span></td>
                                <td class="global_page_color">{{$user->member->race? ucfirst($user->member->race): ''}}</td>
                            </tr>
                            <tr>
                                <td><span class="vol-labels">Nationality: </span></td>
                                <td class="global_page_color">{{$user->member->nationality? ucfirst($user->member->nationality): ''}}</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



