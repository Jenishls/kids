<div class="address_info_title_name">
    <span  class="head_bottom_border">Address Detail</span>
    <span class="add_address_details" id="addressBox" data-target="#sy_global_modal" data-toggle="modal" data-route="address/addAddressDetails/" data-id="{{$user->member->id}}" user-id = "{{$user->id}}">
        <i class="far fa-plus-square" id="addIcons" style="font-size: 1.2rem;" title="Add Address"></i>
    </span>
</div>
<div class="row m-row--no-padding" style="padding-bottom: 52px;">
       
    @foreach ($addresses as $address)
        <div class="" style="width: 64%; margin: 0 auto; text-align: left;">
            <div class="m-widget1" style=" padding-bottom: 55px;">
                <div class="m-widget1__item">
                    <div class="row m-row--no-padding">             
                        <table cellpadding="10px" class="table-brd">
                            <tbody>
                                <tr style="text-align: right;">
                                    <td style="padding-bottom: 35px; width:62%; text-align:left;"> <span class="vol-labels"></span></td>
                                    <td class="d-flex justify-content-between align-items-center">
                                        <a title="Edit details" data-target="#sy_global_modal" data-toggle="modal" data-route="/userProfile/address/{{$address->id}}" data-id="{{$user->member->id}}" class="btn btn-hover-brand btn-icon btn-pill model_load update_address_details"><i class="la la-edit" title="Edit"></i>								
                                        </a>

                                        {{-- delete --}}
                                        <a title="Delete" data-target="#sy_global_modal" data-toggle="modal" data-route="/address/deleteAddress/{{$address->id}}" data-id="{{$address->id}}" class="btn btn-hover-danger btn-icon btn-pill m_deteteAddress">								
                                            <i class="la la-trash"></i>							
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="vol-labels">Address Type: </span></td>
                                    <td class="global_page_color">{{ucfirst($address->address_type)}}</td>
                                </tr>
                                <tr>
                                    <td><span class="vol-labels">Address 1: </span></td>
                                    <td class="global_page_color">{{ucfirst($address->add1)}}</td>
                                </tr>
                                <tr>
                                    <td><span class="vol-labels">Address 2: </span></td>
                                    <td class="global_page_color">{{ucfirst($address->add2)}}</td>
                                </tr>
                                <tr>
                                    <td><span class="vol-labels">City: </span></td>
                                    <td class="global_page_color">{{ucfirst($address->city)}}</td>
                                </tr>
                                <tr>
                                    <td><span class="vol-labels">State: </span></td>
                                    <td class="global_page_color">{{ucfirst($address->state)}}</td>
                                </tr>
                                <tr>
                                    <td><span class="vol-labels">Zip: </span></td>
                                    <td class="global_page_color">{{ucfirst($address->zip)}}</td>
                                </tr>
                                
                                <tr>
                                    <td><span class="vol-labels">County: </span></td>
                                    <td class="global_page_color"> {{ucfirst($address->county)}}</td>
                                </tr>
                                <tr>
                                    <td><span class="vol-labels">Country: </span></td>
                                    <td class="global_page_color"> {{ucfirst($address->country)}}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="row"  style="margin: 0 auto; margin-left: 212px; margin-right: 174px;">
   
    
    {{-- @foreach ($addresses as $address)
        <div class="col-6" style="margin-bottom: 25px;">
            <div class="second_address_title a-box">
                <div class="def_address">
                    <div class="first_def_title ">
                        <span>Address</span>
                    </div>
                </div>
                <div class="second_def_desc">
                    <span>
                        <h5>{{ucfirst($address->add1)}}</h5>
                    </span>
                    <span>
                        {{ucfirst($address->add2)}},
                    </span>
                    <span>
                        {{ucfirst($address->city)}},
                    </span>
                    <span>
                        {{ucfirst($address->state)}},{{ucfirst($address->zip)}}
                    </span>
                    <span>
                        {{ucfirst($address->address_type)}},
                    </span>
                    <span>
                        {{ucfirst($address->country)}}
                    </span>
                    
                    <div class="add_edit_del option_span">
                    <span class="edit_span box_operation update_address_details" data-target="#sy_global_modal" data-toggle="modal" data-route="/userProfile/address/{{$address->id}}" data-id="{{$user->member->id}}">
                        <a class="m_editAddr" title="Edit"><i class="fa fa-edit"></i></a>
                        </span>
                        <span class="del_span option_span m_deteteAddress" data-target="#sy_global_modal" data-toggle="modal" data-route="/address/deleteAddress/{{$address->id}}" data-id="{{$address->id}}">
                        <a class="trigger-btn m_deleteAddr" title="Delete" ><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </span>
                                                    
                    </div>
                </div>    
            </div>
        </div>
    @endforeach
    <div class="col-6">
    <div class="first_address_title a-box box_operation add_address_details" id="addressBox" data-target="#sy_global_modal" data-toggle="modal" data-route="address/addAddressDetails/" data-id="{{$user->member->id}}" user-id = "{{$user->id}}">
            <div class="icon_address">
                <div class="add_icon m_addNewAddr">
                <i class="fa fa-plus " id="addIcons"></i>
                </div>
            </div>
        </div>
    </div> --}}
</div>
<script>
$(document).off('click', '.m_deteteAddress').on('click', '.m_deteteAddress', function (e) {
    e.preventDefault();
    let url = $(this).attr('data-route');
    delConfirm({
        url: url,
        reload_div: '#personalInformation',
    });

});
</script>