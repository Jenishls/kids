<div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <hr class="hr">
    <div style="text-align:center;" class=" ">
        
        {{-- delivery ddress head --}}
        <h3 class="bold_font  crates_container">
                DELIVER AND PICK UP CUSTOMER
        </h3>
        
        {{-- delivery form --}}
        <form id ="deliver_address_form">
            {{-- modal body --}}
            @csrf
            {{-- delivery and pick up  --}}
                <div class="crates_container padding_top_15 second_wizard_tabs_content_form">
                    <div class="row padding_bottom_40">
                        <div class="form-group label-floating col-md-6">

                            <div>
                                <input class="form-control text_uppercase" value="" type="" id="" name=""  required="require" placeholder="First Name"> 
                                <div class="errorMessage"></div>
                            </div><br>

                            <div>
                                <input class="form-control text_uppercase" value=""  id="" name="last_name"  required="require" placeholder="Last Name">
                                <div class="errorMessage"></div>
                            </div>  
                        </div>
                
                        <div class="form-group label-floating col-md-6">
                            
                            <div>
                                <input class="form-control text_uppercase" value="" type="" id="" name=""  required="require" placeholder="Email"> 
                                <div class="errorMessage"></div>
                            </div><br>

                            <div>
                                <input class="form-control text_uppercase" value=""  id="" name="last_name"  required="require" placeholder="phone # (not disconnected)">
                                <div class="errorMessage"></div>
                            </div> 
                        </div>
                    </div>
                </div>
            {{-- end --}}

            {{-- border --}}
            <div class="border_bottom_white"></div>

            {{-- delivery onfo and pick up info --}}
                <div class="crates_container second_wizard_tabs_content_form">
                    <div class="row padding_top_40 padding_bottom_40">

                        {{-- delivery info --}}
                        <div class="form-group label-floating col-md-6">
                            <div class="text_uppercase">
                                <h3 class="bold_font font_color_green crates_container">
                                        DELIVER Info
                                </h3>
                            </div>
                            <div class="padding_top_15">
                                <input class="form-control text_uppercase" value="" type="" id="" name=""  required="require" placeholder="delivery address"> 
                                <div class="errorMessage"></div>
                            </div><br>

                            <div>
                                <input class="form-control text_uppercase" value="" type="" id="" name=""  required="require" placeholder="BUILDING NAME, APT/SUITE"> 
                                <div class="errorMessage"></div>
                            </div>
                            <div class="text_align_left">
                                <h5 class="text_uppercase bold_font font_color_green">Austin <br><span class="text_uppercase bold_font font_color_green">20148</span> </h5>
                                <h5 class="text_uppercase bold_font font_color_green"></h5>
                            </div><br>

                            <div>
                                <input class="form-control text_uppercase" value="" type="date" id="" name=""  required="require" placeholder="delivery day"> 
                                <div class="errorMessage"></div>
                            </div><br>
                            <div class="text_align_left">
                                <h5 class="text_uppercase bold_font font_color_green">preferred time of day</h5>

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

                            <div class="form-group">
                                <textarea class="form-control text_uppercase" rows="3" placeholder="NOTES FOR DELIVERY - GATE CODE, BUILDING NAME OR NUMBER, ETC."></textarea>
                            </div>
                            
                            
                        </div>
                        {{-- end delivery info --}}

                        {{-- pick up info --}}
                        <div class="form-group label-floating col-md-6">
                            <div class="text_uppercase">
                                <h3 class="bold_font font_color_green crates_container">
                                        pickup info
                                </h3>
                            </div>
                            <div class="padding_top_15">
                                <input class="form-control text_uppercase" value="" type="" id="" name=""  required="require" placeholder="pick up address"> 
                                <div class="errorMessage"></div>
                            </div><br>

                            <div>
                                <input class="form-control text_uppercase" value="" type="" id="" name=""  required="require" placeholder="BUILDING NAME, APT/SUITE"> 
                                <div class="errorMessage"></div>
                            </div>
                                <div class="text_align_left">
                                    <h5 class="text_uppercase bold_font font_color_green">Austin <br><span class="text_uppercase bold_font font_color_green">20148</span> </h5>
                                    <h5 class="text_uppercase bold_font font_color_green"></h5>
                                </div><br>

                                <div>
                                <input class="form-control text_uppercase" value="" type="date" id="" name=""  required="require" placeholder="pickup day"> 
                                <div class="errorMessage"></div>
                            </div><br>
                            <div class="text_align_left">
                                <h5 class="text_uppercase bold_font font_color_green">preferred time of day</h5>

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

                            <div class="form-group">
                                <textarea class="form-control text_uppercase" rows="3" placeholder="NOTES FOR DELIVERY - GATE CODE, BUILDING NAME OR NUMBER, ETC."></textarea>
                            </div>
                                
                            
                        </div>
                        {{-- end pick up info --}}

                    </div>
                </div>
            {{-- end info --}}
            <div class="border_bottom_white"></div>
            {{-- additional info --}}
                <div class="crates_container second_wizard_tabs_content_form">
                    <div class="text_uppercase padding_top_40 padding_bottom_40">
                        <h3 class="bold_font font_color_green crates_container">
                                additional info
                        </h3>
                    </div>
                    <div class="row padding_top_15 ">
                        <div class="form-group label-floating col-md-6">
                            
                            <div class="text_align_left">
                                <h5 class="text_uppercase bold_font font_color_green">DO YOU NEED DELIVERY IN A WALK-UP APARTMENT?</h5>

                            </div><br>

                            <div class="form-group label-floating">
            
                                <select name="i_need_help_with" class="form-control">
                                    <option value="" selected="" class="text_uppercase">Select your apartment level</option>
                                    <option class="text_uppercase">street level free</option>
                                    <option value="1flight" class="text_uppercase">1 flight $5.00 </option>
                                    <option value="2flight" class="text_uppercase">2 flight $10.00</option>
                                    <option value="3flight" class="text_uppercase">3 flight $15.00</option>
                                    <option value="4flight" class="text_uppercase">4 flight $20.00</option>
                                </select>
                                <div class="errorMessage"></div>
                            </div><br>
                        </div>

                        <div class="form-group label-floating col-md-6">
                            
                            <div class="text_align_left">
                                <h5 class="text_uppercase bold_font font_color_green">DO YOU NEED PICKUP IN A WALK-UP APARTMENT?</h5>

                            </div><br>

                            <div class="form-group label-floating">
            
                                <select name="i_need_help_with" class="form-control">
                                    <option value="" selected="" class="text_uppercase">Select your apartment level</option>
                                    <option class="text_uppercase">street level free</option>
                                    <option value="1flight" class="text_uppercase">1 flight $5.00 </option>
                                    <option value="2flight" class="text_uppercase">2 flight $10.00</option>
                                    <option value="3flight" class="text_uppercase">3 flight $15.00</option>
                                    <option value="4flight" class="text_uppercase">4 flight $20.00</option>
                                </select>
                                <div class="errorMessage"></div>
                            </div><br>
                        </div>
                    </div><br>

                    {{-- contact method --}}

                    <div class="text_uppercase">
                        <div class="text_align_left">
                            <h5 class="text_uppercase bold_font font_color_green">PREFERRED METHOD OF CONTACT?</h5>

                        </div>

                        <div class="form-group label-floating padding_top_15">
        
                            <select name="i_need_help_with" class="form-control">
                                <option value="" selected="" class="text_uppercase">Select contact mode</option>
                                <option class="text_uppercase">call me</option>
                                <option value="1flight" class="text_uppercase">text me</option>
                                <option value="2flight" class="text_uppercase">email me</option>
                            </select>
                            <div class="errorMessage"></div>
                        </div><br>
                    </div>
                    <div>
                        
                    </div>
                    {{-- contact method --}}
                </div>
            {{-- end additional info --}}

            {{-- billing info --}}
            <div class="crates_container second_wizard_tabs_content_form">
                <div class="text_uppercase padding_top_40 padding_bottom_40">
                    <h3 class="bold_font font_color_green crates_container">
                            billing info
                    </h3>
                </div>
                <div class="row padding_bottom_40">
                    <div class="form-group label-floating col-md-6">

                        <div>
                            <input class="form-control text_uppercase" value="" type="text" id="" name=""  required="require" placeholder="First Name"> 
                            <div class="errorMessage"></div><br>
                        </div>

                        <div>
                            <input class="form-control text_uppercase" value=""  id="" name="last_name"  required="require" placeholder="Last Name">
                            <div class="errorMessage"></div><br>
                        </div> 
                        
                        <div>
                            <input class="form-control text_uppercase" value=""  id="" name="last_name"  required="require" placeholder="Phone">
                            <div class="errorMessage"></div><br>
                        </div> 
                        <div>
                            <input class="form-control text_uppercase" value=""  id="" name="last_name"  required="require" placeholder="Email">
                            <div class="errorMessage"></div><br>
                        </div> 
                    </div>
            
                    <div class="form-group label-floating col-md-6">
                        
                        <div>
                            <input class="form-control text_uppercase" value="" type="text" id="" name=""  required="require" placeholder="Address"> 
                            <div class="errorMessage"></div><br>
                        </div>

                        <div>
                            <input class="form-control text_uppercase" value=""  id="" name="last_name"  required="require" placeholder="ste/apt/unit">
                            <div class="errorMessage"></div><br>
                        </div> 
                        <div>
                            <input class="form-control text_uppercase" value=""  id="" name=""  required="require" placeholder="city">
                            <div class="errorMessage"></div><br>
                        </div> 

                        <div class="form-group label-floating">
    
                            <select name="i_need_help_with" class="form-control">
                                <option value="" selected="" class="text_uppercase">----</option>
                                <option class="text_uppercase">Alabama</option>
                                <option value="1flight" class="text_uppercase">alaska</option>
                                <option value="2flight" class="text_uppercase">arizona</option>
                            </select>
                            <div class="errorMessage"></div>
                        </div>

                        <div>
                            <input class="form-control text_uppercase" value=""  id="" name=""  required="require" placeholder="zip">
                            <div class="errorMessage"></div><br>
                        </div>
                    </div>
                </div><br>

                
            </div>
            {{-- end additional info --}}
        </form>
    </div>
    <div class="prev_next_checkout_btn crates_conatiner ">

        <a class="prevtab btn btn-solid">Back</a>
        
        <a class="nexttab btn btn-solid">Next</a>
    </div>

</div>