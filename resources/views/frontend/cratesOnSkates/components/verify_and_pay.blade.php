<div class="tab-pane fade  " id="contact" role="tabpanel" aria-labelledby="contact-tab">
            
    <div style="text-align:center;" class="third_wizard_tabs_content_form crates_container">       

        <h3 class="crates_container m-t-50" style="color:#252525; margin-bottom: 50px">
            YOUR ORDER IS NOT FINISHED. PLEASE VERIFY THE INFORMATION AND CLICK PURCHASE.
        </h3>
        {{-- verify infm --}}
        <div class="veify_infm_content ">
            <div class="verify_infm_first_content">
                    <div class="verify_infm_first_content">
                        {{-- <div>
                            <h4 class="text_uppercase text-black">packages</h4>
                        </div> --}}
                        <div class="package_content">
                            {{-- onclick div--}}
                            <div class="hidden_update_package">
                                <div class="form-group label-floating">
                                    <select name="package_id" id="package_id" class="form-control">
                                        <option value="1">1 Bedroom $80.00</option>
                                        <option value="5" selected="selected">2 Bedroom $95.00</option>
                                        <option value="9">3 Bedroom $125.00</option>
                                        <option value="13">4 Bedroom $169.00</option>
                                        <option value="17">5 Bedroom $279.00</option>
                                        <option value="60">6 Bedroom $339.00</option>           
                                    </select>
                                </div>

                                <div class="row flex_end package_row_padding">
                                    <button class="btn btn-success btn-lg text_uppercase package_change">Update</button>
                                    {{-- <a class="btn btn-solid text_uppercase package_change field_update_btn">update</a> --}}
                                </div>
                            </div>
                            
                            <div>
                                <div class="row justify_space_between display_flex package_row_padding package">
                                    <h4 class="text_uppercase">2 Bedroom</h4>
                                    <h4 style="color: #252525">$95.00</h4>
                                </div>

                                <div class="row flex_end package_row_padding">
                                    <button class="btn btn-warning btn-lg text_uppercase bedroom_package_change verify_change_btn">Change</button>

                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>

                <div class="border_bottom_green"></div>

                {{-- rental --}}
                    <div class="verify_infm_second_content">
                        <div class="verify_infm_second_content">
                            {{-- onclick div--}}
                            <div class="hidden_update_package">
                                <h4 class="text_uppercase text-black text_align_left">rental length</h4>

                                <div class="form-group label-floating">
                                    <select id="rental_week" class="form-control">
                                        <option value="1" selected="selected">1 week</option>
                                        <option value="2">2 weeks</option>
                                        <option value="3">3 weeks</option>
                                        <option value="4">4 weeks</option>
                                    </select>
                                </div>

                                <div class="row flex_end package_row_padding">
                                    {{-- <a class="btn btn-solid text_uppercase package_change field_update_btn">update</a> --}}
                                    <button class="btn btn-success btn-lg text_uppercase package_change">Update</button>

                                </div>
                            </div>
                                
                            {{-- end onclick div --}}
                            <div>
                                <div class="row justify_space_between display_flex package_row_padding package">
                                    <h4 class="text_uppercase text-black">rental duration</h4>
                                    <h4 class="text_uppercase text-black">1 week(s)</h4>
                                </div>

                                <div class="row flex_end package_row_padding">
                                    {{-- <a class="btn btn-solid text_uppercase rental_change field_change_btn verify_change_btn">Change</a> --}}
                                    <button class="btn btn-warning btn-lg text_uppercase rental_change verify_change_btn">Change</button>

                                </div>
                            </div>
                        </div>
                    </div>
                {{-- end rental --}}

                <div class="border_bottom_green"></div>

                {{-- delivery walk up --}}
                <div class="verify_infm_third_content">
                    <div class="verify_infm_third_content">
                        {{-- onclick div--}}
                        <div class="hidden_update_package">
                                <h4 class="text_uppercase text-black text_align_left">delivery walk up charges</h4>

                            <div class="form-group label-floating">
                                <select id="walk_up" class="form-control">
                                    <option value="Street Level Free">Street Level Free</option>
                                    <option value="1 Flight $5.00">1 Flight $5.00</option>
                                    <option value="2 Flights $10.00">2 Flights $10.00</option>
                                    <option value="3 Flights $15.00">3 Flights $15.00</option>
                                    <option value="4 Flights $20.00">4 Flights $20.00</option>
                                </select>
                            </div>

                            <div class="row flex_end package_row_padding">
                                <button class="btn btn-lg btn-success text_uppercase package_change ">update</button>
                                {{-- <a class="btn btn-solid text_uppercase package_change field_update_btn">update</a> --}}
                            </div>
                        </div>
                            
                        {{-- end onclick div --}}

                        <div>
                            <div class="row justify_space_between display_flex package_row_padding package">
                                <h4 class="text_uppercase text-black">delivery walk up charges</h4>
                                <h4 class="text_uppercase text-black">street level free</h4>
                            </div>

                            <div class="row flex_end package_row_padding">
                                    <button class="btn btn-warning btn-lg text_uppercase delivery_walk_change verify_change_btn">change</button>

                                {{-- <a class="btn btn-solid text_uppercase delivery_walk_change field_change_btn verify_change_btn">Change</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end delivery walk up--}}

                <div class="border_bottom_green"></div>

                {{-- pick up --}}
                    <div class="verify_infm_pickup_content">
                        <div class="verify_infm_pickup_content">
                            {{-- onclick div--}}
                            <div class="hidden_update_package">
                                    <h4 class="text_uppercase text-black text_align_left text-black">pickup walk charges</h4>

                                <div class="form-group label-floating">
                                    <select id="pick_walk_up" class="form-control">
                                        <option value="Street Level Free">Street Level Free</option>
                                        <option value="1 Flight $5.00">1 Flight $5.00</option>
                                        <option value="2 Flights $10.00">2 Flights $10.00</option>
                                        <option value="3 Flights $15.00">3 Flights $15.00</option>
                                        <option value="4 Flights $20.00">4 Flights $20.00</option>
                                    </select>
                                </div>

                                <div class="row flex_end package_row_padding ">
                                        <button class="btn btn-warning btn-lg text_uppercase package_change">change</button>
                                    {{-- <a class="btn btn-solid text_uppercase package_change field_update_btn">update</a> --}}
                                </div>
                            </div>
                                
                            {{-- end onclick div --}}
                            <div>
                                <div class="row justify_space_between display_flex package_row_padding package">
                                    <h4 class="text_uppercase text-black">pickup walk charges</h4>
                                    <h4 class="text_uppercase text-black">3 flights $30.00</h4>
                                </div>

                                <div class="row flex_end package_row_padding">
                                    <button class="btn btn-warning btn-lg text_uppercase delivery_walk_change  verify_change_btn">Change</button>

                                    {{-- <a class="btn btn-solid text_uppercase delivery_walk_change field_change_btn verify_change_btn">Change</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- end pick up--}}
                    <div class="border_bottom_green"></div>
                {{-- total --}}
                    <div class="verify_infm_total_content">
                        <div class="verify_infm_total_content">
                            
                            <div>
                                <div class="row justify_space_between display_flex package_row_padding">
                                    <h4 class="text_uppercase text-black">subtotal</h4>
                                    <h4 class="text_uppercase text-black">$100.00</h4>
                                </div>
                                <div class="row justify_space_between display_flex package_row_padding">
                                    <h4 class="text_uppercase text-black">delivery</h4>
                                    <h4 class="text_uppercase text-black">free</h4>
                                </div>
                                <div class="row justify_space_between display_flex package_row_padding">
                                    <h4 class="text_uppercase text-black">discount</h4>
                                    <h4 class="text_uppercase text-black">$0.00</h4>
                                </div>
                                <div class="row justify_space_between display_flex package_row_padding">
                                    <h4 class="text_uppercase text-black">tax</h4>
                                    <h4 class="text_uppercase text-black">$0.00</h4>
                                </div>
                                <div class="row justify_space_between display_flex package_row_padding">
                                    <h4 class="text_uppercase text-black">total</h4>
                                    <h3 class="text_uppercase text-black">$0.00</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- end total--}}
                <div class="border_bottom_green"></div>
        </div>
        {{-- end info --}}

        {{-- coupon gift --}}
        <div class="coupon_gift_row">
            <div class="accordion package_row_padding" id="accordionCouponGift" style="text-align:left;">
                <div id="coupon_head" class="">
                    <h4 class="text_uppercase bold_font text-black" data-toggle="collapse" data-target="#collapseCouponForm" aria-expanded="true" aria-controls="collapseCouponForm">enter coupon code</h4>
                </div>
                
                <div id="collapseCouponForm" class="collapse " aria-labelledby="coupon_head" data-parent="#accordionCouponGift">
                    <div class="row flex_end coupon_accordion_row">
                        <input type="text" name="coupon_code" id="coupon_code" style="width:100%;">
                        <button class="btn btn-warning btn-lg coupon_apply_btn text_uppercase flex_end">Apply</button>

                        {{-- <a class="btn btn-solid coupon_apply_btn text_uppercase flex_end">Apply</a> --}}
                    </div>
                </div>
                {{-- gift card --}}
                <div id="gift_head" class="">
                    <h4 class="text_uppercase bold_font text-black collapsed" data-toggle="collapse" data-target="#collapseGiftCode" aria-expanded="false" aria-controls="collapseGiftCode">enter gift card</h4>
                </div>

                <div id="collapseGiftCode" class="collapse " aria-labelledby="gift_head" data-parent="#accordionCouponGift">
                    <div class="row flex_end coupon_accordion_row">
                        <input type="text" name="gift_code" id="gift_code" class="text_uppercase" placeholder="Enter 'paid by' Last Name+Last 4 digit of redemption code, no spaces in between" style="width:100%;">
                        {{-- <a class="btn btn-solid gift_apply_btn text_uppercase flex_end">Apply</a> --}}
                        <button class="btn btn-warning btn-lg gift_apply_btn text_uppercase flex_end">Apply</button>

                    </div>
                </div>
            </div>
        </div>
        {{-- end coupon gift --}}

    </div>

    <div class="border_bottom_white"></div>

    {{-- delivery info pick up info form --}}
    <div>
        <div class="crates_container third_wizard_tabs_content_form">
            {{-- deliver info --}}
            <div class="verify_delivery_info_third_tab"> 
                <div class="deliver_information">
                    <div class="row delivery_info_row_padding info_data">
                        <div class="col-md-6 text_align_left">
                            <div class="">
                                <h3 class="text_uppercase bold_font text-black">delivery info</h3>
                            </div>
                            <div class="padding_top_10">
                                <h5 class="text_uppercase bold_font text-black">1356 Lazaji Key<br>
                                    Lois Horton            
                                </h5><br>
                                <h5 class="text_uppercase bold_font text-black">
                                        Austin           
                                </h5><br>

                                <h5 class="text_uppercase bold_font text-black">
                                    20148    
                                </h5><br>
                                <h5 class="text_uppercase bold_font text-black">
                                    12/10/2019       
                                </h5><br>
                                <h5 class="text_uppercase bold_font text-black">
                                    PREFERRED TIME OF DAY     
                                </h5><br>
                                <h5 class="text_uppercase bold_font text-black">
                                        12pm-03pm                
                                </h5><br>
                                <h5 class="text_uppercase bold_font text-black">
                                    Virgie Brooks               
                                </h5><br>
                                <h5 class="text_uppercase bold_font text-black">
                                    Email Me               
                                </h5>

                            </div>
                        </div>
                        <div class="col-md-6 text_align_left">
                            <div class="">
                                <h3 class="text_uppercase bold_font text-black">pickup info</h3>
                            </div>
                            <div class="padding_top_10">
                                <h5 class="text_uppercase bold_font text-black">1356 Lazaji Key<br>
                                    Cole Parson           
                                </h5><br>
                                <h5 class="text_uppercase bold_font text-black">
                                    Austin           
                                </h5><br>

                                <h5 class="text_uppercase bold_font text-black">
                                    20148    
                                </h5><br>
                                <h5 class="text_uppercase bold_font text-black">
                                    12/12/2019       
                                </h5><br>
                                <h5 class="text_uppercase bold_font text-black">
                                    PREFERRED TIME OF DAY     
                                </h5><br>
                                <h5 class="text_uppercase bold_font text-black">
                                        12pm-03pm                
                                </h5><br>
                                <h5 class="text_uppercase bold_font text-black">
                                        SALLIE PETERSON              
                                </h5>

                            </div>
                        </div>
                    </div>
                    
                    <div class="row delivery_info_row_padding flex_end">
                        <button class="btn btn-warning btn-lg checkout_delivery_info_change_btn text_uppercase">change</button>
                        {{-- <a class="btn btn-solid text_uppercase checkout_delivery_info_change_btn" >Change</a> --}}
                    </div>
                </div>
                
                {{-- hidden form --}}
                <div class="hidden_info_form">
                    <div class="row delivery_info_row_padding ">
                        {{-- delivery info --}}
                        <div class="form-group label-floating col-md-6">
                            <div class="padding_top_15">
                                <h3 class="text_uppercase bold_font text-black text_align_left">delivery info</h3>
                            </div>
                            <div class="padding_top_15">
                                <input class="form-control text_uppercase" value="" type="text" id="" name=""  required="require" placeholder="delivery address"> 
                                <div class="errorMessage"></div>
                            </div>

                            <div class="padding_top_15"> 
                                <input class="form-control text_uppercase " value="" type="text" id="" name=""  required="require" placeholder="BUILDING NAME, APT/SUITE"> 
                                <div class="errorMessage"></div>
                            </div> <br>
                            <div class="form-group label-floating padding_top_15">
                                <select name="i_need_help_with" class="form-control ">
                                    <option selected="">Ashburn</option>
                                </select>
                                <div class="errorMessage"></div>
                            </div>
                            <div class="text_align_left">
                                <h5 class="text_uppercase bold_font text-black">Austin <br> </h5>
                                <select name="i_need_help_with" class="form-control">
                                    <option selected="">20148</option>
                                </select>
                            </div><br>

                            <div>
                                <input class="form-control text_uppercase" value="" type="date" id="" name=""  required="require" placeholder="delivery day"> 
                                <div class="errorMessage"></div>
                            </div><br>
                            <div class="text_align_left">
                                <h5 class="text_uppercase bold_font text-black">preferred time of day</h5>

                            </div>

                            <div class="form-group label-floating">
            
                                <select name="i_need_help_with" class="form-control">
                                    <option selected="">6-9AM</option>
                                    <option value="Call Me">9-12AM </option>
                                    <option value="Email Me">12-3PM</option>
                                    <option value="Text Me">3-6PM</option>
                                </select>
                                <div class="errorMessage"></div>
                            </div><br>
                            <div class="form-group label-floating">
            
                                <select name="i_need_help_with" class="form-control">
                                    <option value="" selected="" class="text_uppercase">Select contact mode</option>
                                    <option class="text_uppercase">call me</option>
                                    <option value="1flight" class="text_uppercase">text me</option>
                                    <option value="2flight" class="text_uppercase">email me</option>
                                </select>
                                <div class="errorMessage"></div>
                            </div><br>

                            <div class="form-group">
                                <textarea class="form-control text_uppercase" rows="3" placeholder="NOTES "></textarea>
                            </div>
                            
                            
                        </div>
                        {{-- end delivery info --}}

                        {{-- pick up info --}}
                        <div class="form-group label-floating col-md-6">
                            <div class="padding_top_15">
                                <h3 class="text_uppercase bold_font text-black text_align_left">pickup info</h3>
                            </div>
                            <div class="padding_top_15">
                                <input class="form-control text_uppercase" value="" type="text" id="" name=""  required="require" placeholder="pickup address"> 
                                <div class="errorMessage"></div>
                            </div>

                            <div class="padding_top_15"> 
                                <input class="form-control text_uppercase" value="" type="text" id="" name=""  required="require" placeholder="BUILDING NAME, APT/SUITE"> 
                                <div class="errorMessage"></div>
                            </div><br>
                            <div class="form-group label-floating padding_top_15">
                                <select name="i_need_help_with" class="form-control">
                                    <option selected="">Ashburn</option>
                                </select>
                                <div class="errorMessage"></div>
                            </div>
                            <div class="text_align_left">
                                <h5 class="text_uppercase bold_font text-black">Austin <br> </h5>
                                <select name="i_need_help_with" class="form-control">
                                    <option selected="">20148</option>
                                </select>
                            </div><br>

                            <div>
                                <input class="form-control text_uppercase" value="" type="date" id="" name=""  required="require" placeholder="delivery day"> 
                                <div class="errorMessage"></div>
                            </div><br>
                            <div class="text_align_left">
                                <h5 class="text_uppercase bold_font text-black">preferred time of day</h5>

                            </div>

                            <div class="form-group label-floating">
            
                                <select name="i_need_help_with" class="form-control">
                                    <option selected="">6-9AM</option>
                                    <option value="Call Me">9-12AM </option>
                                    <option value="Email Me">12-3PM</option>
                                    <option value="Text Me">3-6PM</option>
                                </select>
                                <div class="errorMessage"></div>
                            </div><br>
                            <div class="form-group label-floating">
            
                                <select name="i_need_help_with" class="form-control">
                                    <option value="" selected="" class="text_uppercase">Select contact mode</option>
                                    <option class="text_uppercase">call me</option>
                                    <option value="1flight" class="text_uppercase">text me</option>
                                    <option value="2flight" class="text_uppercase">email me</option>
                                </select>
                                <div class="errorMessage"></div>
                            </div><br>

                            <div class="form-group">
                                <textarea class="form-control text_uppercase" rows="3" placeholder="NOTES "></textarea>
                            </div>
                            
                            
                        </div>
                        {{-- end pick up info --}}
                    </div>
                    <div class="row delivery_info_row_padding flex_end">
                        <span>
                            <button class="btn btn-success btn-lg uppercase update_deliver_info_form">Update</button>
                            <button class="btn btn-danger btn-lg uppercase cancel_deliver_info_form">Cancel</button>
                            {{-- <a class="btn btn-solid text_uppercase update_deliver_info_form">update</a> --}}
                            {{-- <a class="btn btn-solid text_uppercase cancel_deliver_info_form">Cancel</a> --}}
                        </span>
                    </div>
                </div>
                {{-- end hidden form --}}   
            </div>

            {{-- personal info --}}
            <div class="verify_personal_info_third_tab"> 
                <div class="">
                    <h3 class="text_uppercase bold_font text-black text_align_left">personal information</h3>
                </div>
                {{-- hidden form --}}
                <div class="hidden_info_form">
                    <div class="row personal_info_row_padding">
                        <div class="form-group label-floating col-md-6">
                            <div>
                                <input class="form-control text_uppercase" value="" type="text" id="" name=""  required="require" placeholder="First Name"> 
                                <div class="errorMessage"></div>
                            </div><br>
                            <div>
                                <input class="form-control text_uppercase" value=""  id="" name="last_name"  required="require" placeholder="phone">
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                
                        <div class="form-group label-floating col-md-6">
                            <div>
                                <input class="form-control text_uppercase" value="" type="text" id="" name=""  required="require" placeholder="Email"> 
                                <div class="errorMessage"></div>
                            </div><br>
                            <div>
                                <input class="form-control text_uppercase" value=""  id="" name="last_name"  required="require" placeholder="Last Name">
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row delivery_info_row_padding flex_end">
                        <span>
                            <a class="btn btn-solid text_uppercase update_deliver_info_form">update</a>
                            <a class="btn btn-solid text_uppercase cancel_deliver_info_form">Cancel</a>
                        </span>
                    </div>
                </div>
                {{-- end hidden form --}}
                <div>
                    <div class="row personal_info_row_padding">
                        <div class="col-md-6 text_align_left">
                            <div class="padding_top_10">
                                <h5 class="text_uppercase bold_font text-black">Santa<br>          
                                </h5>
                                <h5 class="text_uppercase bold_font text-black">
                                    Dien         
                                </h5>

                                

                            </div>
                        </div>
                        <div class="col-md-6 text_align_left">
                            <div class="padding_top_10">
                                <h5 class="text_uppercase bold_font text-black">1356 Lazaji Key<br>    
                                </h5>
                                <h5 class="text_uppercase bold_font text-black">
                                    4525689955           
                                </h5>

                            </div>
                        </div>
                    </div>
                    <div class="row delivery_info_row_padding flex_end">
                        <button class="btn btn-warning btn-lg text_uppercase checkout_delivery_info_change_btn">change</button>

                        {{-- <a class="btn btn-solid text_uppercase checkout_delivery_info_change_btn" >Change</a> --}}
                    </div>
                </div>
            </div>

            {{-- billing info --}}
            <div class="verify_billing_info_third_tab"> 
                <div class="">
                    <h3 class="text_uppercase bold_font text-black text_align_left">billing info</h3>
                </div>

                <div class="deliver_information">
                    <div class="row billing_info_row_padding">
                        <div class="col-md-6 text_align_left">
                            <div class="padding_top_10">
                                <h5 class="text_uppercase bold_font text-black">Christopher<br> 
                                </h5>
                                <h5 class="text_uppercase bold_font text-black">
                                    Davidson        
                                </h5>

                                <h5 class="text_uppercase bold_font text-black">OFE@HOST.TEST<br>
                                </h5>
                                <h5 class="text_uppercase bold_font text-black">
                                        5475057957        
                                </h5>

                            </div>
                        </div>
                        <div class="col-md-6 text_align_left">
                            <div class="padding_top_10">
                                <h5 class="text_uppercase bold_font text-black">202 OGOHE STREET<br>         
                                </h5>
                                <h5 class="text_uppercase bold_font text-black">
                                        MAWEUHLEFMUM    <br>     
                                </h5>
                                <h5 class="text_uppercase bold_font text-black">
                                        ARBUHA    <br>      
                                </h5>
                                <h5 class="text_uppercase bold_font text-black">
                                        NY    <br>      
                                </h5>
                                <h5 class="text_uppercase bold_font text-black">
                                        88434   <br>      
                                </h5>

                            </div>
                        </div>
                    </div>
                    <div class="row delivery_info_row_padding flex_end">
                        <button class="btn btn-warning btn-lg text_uppercase checkout_delivery_info_change_btn">change</button>

                        {{-- <a class="btn btn-solid text_uppercase checkout_delivery_info_change_btn" >Change</a> --}}
                    </div>
                </div>

                {{-- hidden form --}}
                <div class="hidden_info_form">
                    <div class="row ">
                        {{-- delivery info --}}
                        <div class="form-group label-floating col-md-6">
                            <div class="padding_top_15">
                                <input class="form-control text_uppercase" value="" type="text" id="" name=""  required="require" placeholder="first name"> 
                                <div class="errorMessage"></div>
                            </div>

                            <div class="padding_top_15"> 
                                <input class="form-control text_uppercase " value="" type="text" id="" name=""  required="require" placeholder="last name"> 
                                <div class="errorMessage"></div>
                            </div> 
                            <div class="padding_top_15"> 
                                <input class="form-control text_uppercase " value="" type="text" id="" name=""  required="require" placeholder="phone"> 
                                <div class="errorMessage"></div>
                            </div> 
                            <div class="padding_top_15"> 
                                <input class="form-control text_uppercase " value="" type="text" id="" name=""  required="require" placeholder="email"> 
                                <div class="errorMessage"></div>
                            </div> 
                            
                        </div>
                        {{-- end delivery info --}}

                        {{-- pick up info --}}
                        <div class="form-group label-floating col-md-6">
                            <div class="padding_top_15">
                                <input class="form-control text_uppercase" value="" type="text" id="" name=""  required="require" placeholder="address"> 
                                <div class="errorMessage"></div>
                            </div>

                            <div class="padding_top_15"> 
                                <input class="form-control text_uppercase" value="" type="text" id="" name=""  required="require" placeholder="APT/unit"> 
                                <div class="errorMessage"></div>
                            </div>
                            <div class="padding_top_15"> 
                                <input class="form-control text_uppercase" value="" type="text" id="" name=""  required="require" placeholder="city"> 
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating padding_top_15">
                                <select name="i_need_help_with" class="form-control">
                                    <option selected="">state</option>
                                </select>
                                <div class="errorMessage"></div>
                            </div>
                            <div class="padding_top_15"> 
                                <input class="form-control text_uppercase" value="" type="text" id="" name=""  required="require" placeholder="zip"> 
                                <div class="errorMessage"></div>
                            </div>
                            
                            
                        </div>
                        {{-- end pick up info --}}
                    </div>
                    <div class="row delivery_info_row_padding flex_end">
                        <span>
                            <button class="btn btn-sucess btn-lg text_uppercase update_deliver_info_form">update</button>
                            <button class="btn btn-danger btn-lg text_uppercase cancel_deliver_info_form">cancel</button>
{{-- 
                            <a class="btn btn-solid text_uppercase update_deliver_info_form">update</a>
                            <a class="btn btn-solid text_uppercase cancel_deliver_info_form">Cancel</a> --}}
                        </span>
                    </div>
                </div>  
            </div>


            {{-- card info --}}
            <div class="verify_cardinfo_third_tab"> 
                <div class="">
                    <h3 class="text_uppercase bold_font text-black text_align_left">card info</h3>
                </div>
                <form class="">
                    <div class="row check-out card_info_row_padding text_align_left">
                        <div class="form-group col-md-6 col-sm-4 col-xs-12">
                            <div class="field-label">
                                <h5 class="text_uppercase bold_font text-black">Card Number
                                </h5>
                            </div>
                            <input type="text" name="field-name" value="" placeholder="CARD#"  style="width: 100%;">
                        </div>
                        <div class="form-group col-md-3 col-sm-4 col-xs-12">
                            <div class="field-label">
                                <h5 class="text_uppercase bold_font text-black">Expiry month & year
                                </h5>
                            </div>
                            <select class="" style="height: 28px; width: 100%;" name="expiration_month" id="expiration_month">
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 col-sm-4 col-xs-12">
                            <div class="field-label">
                                <h5 class="text_uppercase bold_font text-black" style="margin-bottom:10px;">
                                </h5><br>
                            </div>
                            <select class="" style="height: 28px; width: 100%;" name="expiration_month" id="expiration_month">
                                <option value="01">2017</option>
                                <option value="02">2018</option>
                                <option value="03">2019</option>
                            </select>
                        </div>
                    </div>

                    <div class="row check-out card_info_row_padding text_align_left">
                        <div class="form-group col-md-6 col-sm-4 col-xs-12">
                            <div class="field-label">
                                <h5 class="text_uppercase bold_font text-black">CVV
                                </h5>
                            </div>
                            <input type="text" name="field-name" value="" placeholder=""  style="width: 100%;">
                        </div>

                        <div class="form-group col-md-6 col-sm-4 col-xs-12">
                            <div class="agree-terms-conditions" style="margin-top:35px;">
                                <span style="display:flex;">
                                    <input name="terms_and_conditions" type="checkbox" id="terms_and_conditions" value="y" style="margin:5px;">
                                    <h5 class="terms_conditions text-black" >I agree to the terms and conditions</h5>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    {{-- end delivery info pick up info form--}}
    
    <div class="prev_next_checkout_btn crates_conatiner ">

        <button class="btn btn-default btn-lg prevtab">back</button>
        <button class="btn btn-warning btn-lg order_now nexttab" data-route="crates/purchasesuccess">Purchase</button>
{{-- 
        <a class="prevtab btn btn-solid">Back</a>
        
        <a class="nexttab btn btn-solid order_now" data-route="crates/purchasesuccess">Purchase</a> --}}
    </div>
</div>