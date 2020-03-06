<hr class="hr">
<div class="cs-select-zip-container">
    <div class="crates_container">
        <div class="cs-form-content">
             <h2 class="cos-sz-title">Let's get started</h2>
            <form id="zipForm">
                <div class="row" style="justify-content:center;">
                    <div class="order_now_start_form" >
                        <div class=" moving_from">
                            <div class="moving_from_title">
                                <h4 class="text_uppercase fs-22">I'm moving my home</h4><br>
                            </div>
                            <div class="form-imput-container">
                                <div>
                                    <input type="text" name="current_zip" id="curr_zip" autocomplete="off" placeholder="CURRENT ZIP" value="78619">
                                    <div class="zip--price text-left" style="padding-left:15px; color: #b12704"></div>
                                    <div class="select-zip-error-msg">                            
                                    </div>
                                </div>
                                 <div class="to">    
                                     <h4 class="text_uppercase">to</h4>
                                 </div>
                                <div>
                                    <input type="text" name="moving_zip" autocomplete="off" id="new_zip" placeholder="NEW ZIP" value="78619">
                                    <div class="zip--price text-left" style="padding-left:15px; color: #b12704"></div>
                                    <div class="select-zip-error-msg">                            
                                    </div>
                                </div>
                                @if(!isset($alaCartRequest))
                                    <input type="hidden" name="package_id" value="{{$package->id}}">
                                    <input type="hidden" name="week" value="{{$week}}">
                                @endif
                            </div>                            
                        </div>                        
                        <br>                        
                    </div>
                </div>                
                <div class="global-btn global-btn__yellow m-t-15" id="js--proceed-checkout" style="margin: auto">
                    <p>Continue</p>  
                </div>
                <input type="hidden" name="ala_cart" value="@if(isset($alaCartRequest)) true  @endif">
                <input type="hidden" name="rentedDays" value="@if(isset($alaCartRequest)) {{request()->rentedDays}}  @endif">
            </form>
        </div>
    </div>

</div> 
<hr class="hr">

<script>

    clickEvent('#js--proceed-checkout')(checkValidZip)
    keyupEvent('#zipForm input')(function(e){
        e.which === 13 ? checkValidZip() : '';
    });

    // @todo break this into another component function proceedToCheckout() and use a promise 
    function checkValidZip(){
        $(`#zipform input`).css('border-color', '#e8e8e8');
        $('.select-zip-error-msg').hide()
        let alaCartRequest = $('[name="ala_cart"]').val() ? true : false;
        let url = "/crates/validate-zip?alaCartRequest="+alaCartRequest;
        if(alaCartRequest){
            let rentedDays = parseInt($('[name="rentedDays"]').val());
            url += `&rentedDays=${rentedDays}`;
        }
        cratesAjax({
            url,
            method: 'post',
            data : $('#zipForm').serializeArray()
        }, response => {
            $("#page-section")
            .empty()
            .append(response);
        }, ({status,responseText,key, responseJSON : {errors, input_name}}) => {
            if(status === 422){
                let html = '';
                for(let key in errors){
                    $(`#zipForm  [name="${key}"]`).css('border-color', '#b12704');
                    $(`#zipForm  [name="${key}"]`).parent().find('.select-zip-error-msg').show().html(`<span>${errors[key]}</span>`);                   
                }
                toastr.error("Please check the errors");
            }else{
               toastr.error(JSON.parse(responseText).message)
               $(`#zipForm  [name="${input_name}"]`).parent().find('.select-zip-error-msg').show().html(`<span>${JSON.parse(responseText).message}</span>`); 
            }
        })
    }



</script>