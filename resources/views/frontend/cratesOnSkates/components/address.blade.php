{{-- {{dd($user->client->id)}} --}}
<hr class="hr">
<div class="crates_container pd-10-20">
    <div id="crumbs">
        <ul>
          {{-- <li><a href="#1"><i class="fa fa-home" aria-hidden="true"></i></a></li> --}}
          <li><a class="load_pages c-p" data-route="/cratesonskates/dashboard">Dashboard</a></li>
          <li >
            <a class="active">your address</a>
          </li>
        </ul>
    </div>
</div>
<div>
    <div class="crates_container">
        <div class="dashboard-address db-pd-50-20" id="dashboard--address">
            <div class="row db-your-oder-pd-50-10 justify-center">
                <div class="col-md-3 col-sm-6 m-b-20" title="add_address">
                    <div class="db-dashed-border c-p br-4 load--modal" data-route="dashboard/modal/addaddressmodal/{{$user->client->id}}">
                        <div class="pd-100 text-center">
                            <a  class="text-white fs-30 ">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                   
                </div>
                @if(count($addresses))
                    @foreach ($addresses as $address)
                        @if($address->is_active ===1)
                            <div class="col-md-3 col-sm-6  ad--col m-b-20" title="address">
                                <div class=" text-left db-box-shadow c-p db-bg-white br-4">
                                    <div class="default-addresses">
                                        @if($address->is_active=== 1)
                                            <div class="db-bg-orange pd-10 ">
                                                <span class="text-white">Default Address</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="pd-10 d-g min-height-195">
                                        <span class="text-capitalize f-w-600">{{$address->first_name}} {{$address->last_name}}</span>
                                        <span class="text-capitalize f-w-600">
                                            {{$address->add1}}
                                        </span>
                                        <span class="text-capitalize f-w-600">
                                            Building
                                        </span>
                                        <span class="text-capitalize f-w-600">
                                            {{$address->city}}, {{$address->state}}
                                        </span>
                                        <span class="text-capitalize f-w-600">
                                            {{$address->zip}},
                                        </span>
                                        <span class="text-capitalize f-w-600">
                                            {{$address->country}}
                                        </span>

                                        <div class="display-flex pd-t-10">
                                            <span class=" ">
                                            <a  data-addrId="" class="db-editAddr db-color-orange load--modal" data-route="dashboard/modal/editaddressmodal/{{$address->id}}" title="Edit"><i class="fa fa-edit"></i></a>
                                            </span>
                                            <span class="m-l-15">
                                            <a class="trigger-btn db-deleteAddr db-color-red delete--address"  data-route="dashboard/address/deleteAddress/{{$address->id}}" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></i></a>
                                            </span>
                                            @if(!($address->is_active=== 1))
                                                <span class="m-l-15">
                                                <a  data-addrId="{{$address->id}}" class="trigger-btn makeDefault db-color-green make--default"  data-route="dashboard/address/makeDefaultAddress/" title="Make Default"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    {{-- for none default --}}
                    @foreach($addresses as $address)
                        @if($address->is_active !== 1)
                            <div class="col-md-3 col-sm-6  ad--col m-b-20" title="address">
                                <div class=" text-left db-box-shadow c-p db-bg-white br-4">
                                    <div class="default-addresses">
                                        @if($address->is_active=== 1)
                                            <div class="db-bg-orange pd-10 ">
                                                <span class="text-white">Default Address</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="pd-10 d-g min-height-235">
                                        <span class="text-capitalize f-w-600">{{$address->first_name}} 
                                          @if ($address->last_name)
                                              
                                          @endif  {{$address->last_name}}</span>
                                        <span class="text-capitalize f-w-600">
                                            {{$address->add1}}
                                        </span>
                                        <span class="text-capitalize f-w-600">
                                            Building
                                        </span>
                                        <span class="text-capitalize f-w-600">
                                            {{$address->city}}, {{$address->state}}
                                        </span>
                                        <span class="text-capitalize f-w-600">
                                            {{$address->zip}},
                                        </span>
                                        <span class="text-capitalize f-w-600">
                                            {{$address->country}}
                                        </span>

                                        <div class="display-flex pd-t-10">
                                            <span class=" ">
                                            <a  data-addrId="" class="db-editAddr db-color-orange load--modal" data-route="dashboard/modal/editaddressmodal/{{$address->id}}" title="Edit"><i class="fa fa-edit"></i></a>
                                            </span>
                                            <span class="m-l-15">
                                            <a class="trigger-btn db-deleteAddr db-color-red delete--address"  data-route="dashboard/address/deleteAddress/{{$address->id}}" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></i></a>
                                            </span>
                                            @if(!($address->is_active=== 1))
                                                <span class="m-l-15">
                                                    <a  class="trigger-btn makeDefault db-color-green make--default" data-route="dashboard/address/makeDefaultAddress/" data-addrId="{{$address->id}}" title="Make Default"><i class="fa fa-star"></i></a>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

