<style type="text/css">
.select2-container--default .select2-results > .select2-results__options {
    max-height: auto !important;
    overflow-y: auto;
    display: flex !important;
    flex-direction: column !important;
    width: 100% !important;
}
.select2-container .select2-selection--single {
    border: 1px solid #ced4da !important;
    border-radius: 0px !important;
    padding: 4px !important;
    height:38px !important;
}
.select2-container--default .select2-search--dropdown .select2-search__field {
    border: 1px solid #e0e0e0 !important;
}
.select2-container--default .select2-results > .select2-results__options {
    width: 100% !important;
    padding: 4px !important;
}
.select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: #76c043 !important;
    color: white !important;
}
</style>
<div class="sec-checkout2">
    <form id="deliver-billing-form">
        @csrf
        <div class="row pd-t-30">
            <div class="col-md-12 col-lg-12 col-sm-12 no-pd-left">
                {{-- customer detail--}}
                <div class="checkout--step2--info checkout-divider-bg " data-step="step_1">
                    {{-- delivery address head --}}
                    <div class="ord-sum-heading d-f justify-space-between" data-toggle="collapse" data-target="#checkout--personal--info"
                    aria-expanded="true" aria-controls="checkout--personal--info ">
                          <h3 class="cs-title-h3"><span>1.</span> Personal Information</h3>
                          <i class="fa fa-edit pd-r-10 fs-30 edit-checkout-2 c-p text-black"></i>
                    </div>
                
                    <div class="checkout--step2--fill-form pd-l-r-10 collapse show cs-bg-white js--checkout-form" id="checkout--personal--info"  aria-labelledby="headingOne" data-parent="#deliver-billing-form">
                        <div class="row pd-t-15 ">
        
                            <div class="col-md-6">
                                <label class="checkout-label" for="name">First Name</label>
                                <input class="form-control text-capitalize firstName" value="{{$user ? $user->first_name : ''}}" type="text" name="first_name"  required="require"> 
                                <div class="errorMessage"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="checkout-label" for="name">Last Name</label>
                                <input class="form-control text-capitalize lastName" type="text" value="{{$user ? $user->last_name:''}}"  name="last_name"  required="require"> 
                                <div class="errorMessage"></div>
                            </div>
                            <div class="col-md-6 pd-t-15">
                                <label class="checkout-label" for="name">Email</label>
                                <input class="form-control email" name="email" autocomplete="off" required="require" value="{{$user ? $user->personal_email : ''}}">
                                <div class="errorMessage"></div>
                            </div>                           
            
                            <div class="col-md-6 pd-t-15">
                                <label class="checkout-label" for="name">Phone</label>
                                <input class="form-control phone" name="phone" required="require" value="{{$user? $user->mobile_no : ''}}">
                                <div class="errorMessage"></div>
                            </div>                             
                        </div>
                        <div class="row pd-t-20 checkout--continue cs-pd-20" data-id="1" js--validator="crates/validate/personal-info">
                            <div class="global-btn global-btn__yellow">
                            <p>Continue</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                {{-- end --}}
        
                {{-- border --}}
        
                {{-- delivery Information --}}
                <div class="pd-t-15 checkout-divider-bg checkout--step2--info" data-step="step_2">
                    <div class="ord-sum-heading collapsed d-f justify-space-between " 
                    
                    data-target="#checkout--deliver--info" aria-expanded="false" aria-controls="checkout--deliver--info">
                        <h3 class="cs-title-h3"><span>2.</span> delivery Information</h3>
                        <i class="fa fa-edit pd-r-10 fs-30 edit-checkout-2 c-p text-black"></i>
                    </div>
                    <div class=" checkout--step2--fill-form pd-l-r-10 collapse cs-bg-white js--checkout-form" id="checkout--deliver--info" 
                   aria-labelledby="headingTwo" data-parent="#deliver-billing-form"> 
                        <div class="">
                            <div class="row pd-t-15 ">
                                <div class="col-sm-12 col-md-12 pd-t-15">
                                    <label class="checkout-label" for="delivery_address">Street name</label>
                                    <input class="form-control text-capitalize address1" type="text" id="" name="delivery_addr1"  required="require"> 
                                    <div class="errorMessage"></div>
                                </div>                
                                <div class="col-sm-12 col-md-6 pd-t-15">
                                    <label class="checkout-label" for="">Apartment</label>
                                    <input class="form-control text-capitalize address2" type="text" name="delivery_addr2" > 
                                    <div class="errorMessage"></div>
                                </div>
                                <div class="col-sm-6 col-md-6 pd-t-15">
                                    <label class="checkout-label" for="">city</label>
                                    <input class="form-control text-capitalize city"type="text" name="delivery_city" value="{{$movingFrom->city}}" required="require" placeholder=""> 
                                    <div class="errorMessage"></div>
                                </div>
                                <div class="col-sm-6 col-md-6 pd-t-15">
                                    <label class="checkout-label" for="">State</label>
                                    <select name="delivery_state" class="form-control state new-select2">
                                        <option value="{{$movingFrom->state}}" selected>{{$movingFrom->state}}</option>
                                    </select>
                                    <div class="errorMessage"></div>
                                </div>
                                <div class="col-sm-6 col-md-6 pd-t-15">
                                    <label class="checkout-label" for="">zip</label>
                                    <input class="form-control text-capitalize zip mask--zip" name="delivery_zip" value="{{$movingFrom->zipcode}}" required="require" placeholder="">
                                    <div class="errorMessage"></div>
                                </div> 
                                <div class="col-sm-12 col-md-6 pd-t-15">
                                    <label class="checkout-label " for="">day</label>
                                    <input class="form-control mydatepicker" id="day" name="delivery_date"  required="require" @if(request()->alaCartRequest === "true") data-is-ala-carte="true" @endif> 
                                    <div class="errorMessage"></div>
                                </div>
                
                                <div  class="col-sm-12 col-md-6 pd-t-15">
                                    <label class="checkout-label" for="">preferred time of day</label>
                                    <select name="delivery_time" class="form-control preferred_time">
                                        @foreach($delivery_pref_times as $time)
                                            <option value="{{format_preffered_time($time)}}">{{format_preffered_time($time)}}</option>
                                        @endforeach                                       
                                    </select>
                                    <div class="errorMessage"></div>
                                </div>                                
                            </div>
                            <div class="row pd-t-20">
                                
                                <div  class="col-sm-12 col-md-12">
                                    <label class="checkout-label" for="">Notes</label>
                                    <textarea class="form-control text-capitalize " name="delivery_note" rows="3" placeholder="Notes for delivery - gate code, buliding name or number, etc."></textarea>
                                </div> 
                            </div>
                        </div>                        
                        <div class="row pd-t-20 checkout--continue cs-pd-20" data-id="2" js--validator="crates/validate/delivery-info">
                            <div class="global-btn global-btn__yellow">
                            <p>Continue</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                {{-- end delivery Information --}}       
        
                {{-- pick up Information --}}
                <div class="pd-t-15 checkout-divider-bg  checkout--step2--info" data-step="step_3">
                    <div class="ord-sum-heading collapsed d-f justify-space-between" 
                    data-target="#checkout--pickup--info" aria-expanded="false" aria-controls="checkout--pickup--info">                       
                        <h3 class="cs-title-h3"><span>3.</span> pickup Information</h3>
                        <i class="fa fa-edit pd-r-10 fs-30 edit-checkout-2 c-p text-black"></i>

                    </div>
                    <div class="checkout--step2--fill-form pd-l-r-10 collapse cs-bg-white js--checkout-form" id="checkout--pickup--info"  aria-labelledby="" data-parent="#deliver-billing-form">
                        <div class="">
                            <div class="row pd-t-15 ">
                                <div class="sec-checkout2__checkbox">
                                    <label class="checkbox-container" for="same--as-delivery">Same as delivery information
                                      <input type="checkbox" id="same--as-delivery">
                                      <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-12 pd-t-15">
                                    <label class="checkout-label" for="">Street</label>
                                     <input class="form-control text-capitalize pickup_address1" type="text" id="" name="pickup_addr1"  required="require"> 
                                    <div class="errorMessage"></div>
                                </div>                
                                <div class="col-sm-12 col-md-6 pd-t-15">
                                    <label class="checkout-label" for="">Apartment</label>
                                     <input class="form-control text-capitalize pickup_address2" type="text" name="pickup_addr2" placeholder=""> 
                                    <div class="errorMessage"></div>
                                </div>
                                <div class="col-sm-6 col-md-6 pd-t-15">
                                    <label class="checkout-label">city</label>
                                    <input class="form-control text-capitalize city"type="text" name="pickup_city" value="{{$movingTo->city}}" required="require"> 
                                    <div class="errorMessage"></div>
                                </div>
                                <div class="col-sm-6 col-md-6 pd-t-15">
                                    <label class="checkout-label" for="">State</label>
                                    <select name="pickup_state" class="form-control state init--state-select2">
                                        <option value="{{$movingTo->state}}" selected>{{$movingTo->state}}</option>
                                    </select>
                                    <div class="errorMessage"></div>
                                </div>
                                <div class="col-sm-6 col-md-6 pd-t-15">
                                    <label class="checkout-label" for="">zip</label>
                                    <input class="form-control text-capitalize zip mask--zip" name="pickup_zip" value="{{$movingTo->zipcode}}" required="require" placeholder="">
                                    <div class="errorMessage"></div>
                                </div>              
                                <div class="col-sm-12 col-md-6 pd-t-15">
                                    <label class="checkout-label" for="">day</label>
                                     <input class="form-control mydatepicker--pickup" type="text" name="pickup_date"  required="require" @if(request()->alaCartRequest === "true") data-is-ala-carte="true" @endif> 
                                    <div class="errorMessage"></div>
                                </div>
                
                                <div class="col-sm-12 col-md-6 pd-t-15">
                                    <label class="checkout-label" for="">preferred Time of day</label>
                                    <select name="pickup_time" class="form-control preferred_time">
                                        @foreach($pickup_pref_times as $time)
                                            <option value="{{format_preffered_time($time)}}">{{format_preffered_time($time)}}</option>
                                        @endforeach  
                                    </select>
                                    <div class="errorMessage"></div>
                                </div>
                            </div> 
                            <div class="row row pd-t-20">
                                <div  class="col-sm-12 col-md-12">
                                    <label class="checkout-label" for="">notes </label>
                                    <textarea class="form-control text-capitalize pickup_note" name="pickup_note" rows="3" placeholder="Notes for pickup - gate code, buliding name or number, etc."></textarea>
                                </div> 
                            </div>
                        </div>
                        
                        <div class="row pd-t-20 checkout--continue cs-pd-20" data-id="3" js--validator="crates/validate/pickup-info">
                            <div class="global-btn global-btn__yellow">
                            <p>Continue</p>
                            </div>
                        </div> 
                    </div>
                </div>
                {{-- additional Information --}}
                <div class="pd-t-15 checkout-divider-bg  checkout--step2--info" data-step="step_4">
                    <div class="ord-sum-heading collapsed d-f justify-space-between" 
                    data-target="#checkout--additional--info" aria-expanded="false" aria-controls="checkout--additional--info">
                        <h3 class="cs-title-h3"> <span>4.</span> extras</h3>
                        <i class="fa fa-edit pd-r-10 fs-30 edit-checkout-2 c-p text-black"></i>

                    </div>
                    <div class="checkout--step2--fill-form pd-l-r-10 collapse cs-bg-white cs-pdb-20 " id="checkout--additional--info"  aria-labelledby="" data-parent="#deliver-billing-form">
                        <div class="row pd-t-15">

                            @foreach($extras as $extra)
                                <div class=" col-md-12">
                                    <label class="checkout-label" for="">{{ucfirst($extra->question)}}</label>            
                                    <div class="form-group label-floating">                                    
                                        <select name="extras[]" class="form-control delivery_apartment add--extras" @if(request()->alaCartRequest === "true") data-is-ala-carte="true" @endif>
                                            <option disabled selected>select</option>
                                            @foreach($extra->options as $option)
                                                <option value="{{$option->id}}" class="text-capitalize">{{ucfirst($option->label)}}</option>   
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                            <div class="row pd-t-20 checkout--continue cs-pd-20 text-center">
                            <div class="global-btn global-btn__yellow btnStep" data-step="3" style="margin: 0 auto;">
                            <p>Continue</p>
                            </div>
                        </div>       
                    </div>
                </div>
            </div>
        </div>
    
    </form>
</div>
<script type="text/javascript">

phoneMask("[name='phone']");
zipMask(".mask--zip")


$(".init--state-select2").select2({
    placeholder : 'Select',
    width: "100%",     
    ajax : {
        url : '/crates/state',
        processResults: function(data) {
            let states = [];
            $.each(data,function(index, value){
                states.push({id:value.text, text:value.text});
            });
        return {
            results: states
        };
        }
    },
});

$(".new-select2").select2({
    placeholder : 'Select',
    width: "100%",     
    ajax : {
        url : '/crates/state',
        processResults: function(data) {
            let states = [];
            $.each(data,function(index, value){
                states.push({id:value.text, text:value.text});
            });
        return {
            results: states
        };
        }
    },
});

</script>