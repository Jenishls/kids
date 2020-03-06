<hr class="hr">
<div class="cs-select-zip-container">
    <div class="crates_container">

        <div class="cs-form-content">
             <h2 style="color:#222;">Let's get started</h2>
            <form id="zipForm">
                <div class="row" style="justify-content:center;">
                    <div class="order_now_start_form" >
                        <div class=" moving_from">
                            <h4 class="text_uppercase fs-22">I'm moving my home</h4><br>
                            <div class="form-imput-container">
                                <input type="text" name="current_zip" id="curr_zip" value="" placeholder="CURRENT ZIP">
                                <h4 class="text_uppercase">to</h4>
                                <input type="text" name="moving_zip" value="" id="new_zip" placeholder="NEW ZIP">
                                {{-- <input type="hidden" name="package_id" value="{{$package->id}}"> --}}
                                {{-- <input type="hidden" name="week" value="{{$week}}"> --}}
                            </div>
                            
                        </div>

                        <br>
                    </div>
                </div>
                <div class="global-btn global-btn__yellow m-t-15" id="js--proceed-checkout" style="margin: auto">
                    <p>Continue</p>  
                </div>
                {{-- <div class="row justify_content_center ">
                    <a class="btn btn-solid buy_now m_b_50 load_pages" data-route="/cratesonskates/residential" id="submit_store_form">Continue</a >
                </div> --}}

                <div class="row" id="error_zip_code" style="display: none;">
                    <div class="">
                    <div class="h1">We're sorry,</div>
                    <div class="h3">It appears that you have entered zip codes outside of our current free delivery service area, please contact us for a customized quote.</div>
                    </div>
                </div>
                <input type="hidden" name="fresh_start" value="1">
            </form>
        </div>
    </div>

</div> 
<hr class="hr">

<script>

    clickEvent('#js--proceed-checkout')(checkValidZip)
    keyupEvent('#zipForm input')(e => e.which === 13 ? checkValidZip() : '')

    // @todo break this into another component function proceedToCheckout() and use a promise 
    function checkValidZip(){
        $(`#zipform input`).css('border-color', '#e8e8e8');
        cratesAjax({
            url : "/crates/validate-zip",
            method: 'post',
            data : $('#zipForm').serializeArray()
        }, response => {
            $("#page-section")
            .empty()
            .append(response);
        }, ({status,responseText, responseJSON : {errors}}) => {
            if(status === 422){
                for(let key in errors){
                    $(`#zipForm  [name="${key}"]`).css('border-color', '#b12704');
                }
            }else{
               toastr.error(JSON.parse(responseText).message)
            }
        })
    }



</script>