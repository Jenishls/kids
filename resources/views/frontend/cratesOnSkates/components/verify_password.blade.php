 @include('frontend.cratesOnSkates.components.main_header')
 @include('frontend.cratesOnSkates.components.nav')
<style>
    .order-verify-pw {
        font-weight: 500;
    }

    .pw-verify-container {
        background: #FFFFFF;
        box-shadow: 0 2px 48px 0 rgba(0, 0, 0, 0.06);
        border-radius: 4px;
        box-shadow: 4px 4px 20px 18px rgb(86, 171, 28);
        -moz-box-shadow: 4px 4px 20px 18px rgb(86, 171, 28);
        -webkit-box-shadow: 4px 4px 20px 18px rgb(86, 171, 28);
        padding: 0px 0px 20px 0px;
        max-width:35%;
    }

    .formHead {
        background: #f39731;
        padding: 20px;
        color: black;
    }
    .verify_submit_btn{
        text-align: center;
    }

    #verify_pw_form {
        padding: 20px 20px;
        margin-bottom: 0px;
    }

    .err-msg{
        color: #b12704;
        font-size: 13px;
    }

    @media (max-width: 416px) {
        .pw-verify-container {
            min-width:80%;
        }
    }

    @media only screen and (max-width: 1391px){
        .pw-verify-container{
            max-width: 50%;
        }
    }

    @media only screen and (max-width: 1391px){
        .pw-verify-container{
            max-width: 70%;
        }
    }

    @media only screen and (max-width: 694px){
        .pw-verify-container{
            max-width: 90%;
        }
    }

    @media only screen and (max-width: 640px){
        .formHead p {
            font-size: 15px !important;
        }
    }

</style>
<div id="page-section" class="page-section">
    <div class="hr"></div>
    <div class="sec-resi radial-th-gradient">
        <div class="faq-section" style="padding:30px 0">
            <div class="pw-verify-container container">
                <div class="formHead">
                    <p style="font-size:18px;font-weight:bold;margin-bottom:0px;color:#fff;margin-left:13px; text-transform:uppercase; letter-spacing:1px">Please verify your password to Proceed.</p>
                </div>
                <form id="verifyPasswordForm" style="padding:15px" action="javascript:void(0)">
                    <div class="row">
                        <div class="form-group label-floating col-md-12">
                            <label class="cs-label order-verify-pw" for="password">Password</label>
                            <span class="err-msg"></span>
                            <input class="form-control" type="password" name="password" id="password" autocomplete="off">
                            <div class="errorMessage"></div>
                        </div>
                    </div>
                    <div class="contact_submit_btn ">
                        <div class="global-btn global-btn__yellow cmrcl-submit-btn" id="verifyPassword" data-status-request="{{$statusRequest}}" data-order-id="{{$order->id}}" data-user-id="{{$user->id}}">
                            <p>Verify</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('frontend.cratesOnSkates.components.footer')
@include('frontend.cratesOnSkates.components.main_footer')

<script>

    $('#verifyPasswordForm input:first').focus()

    $(document).off('click', '#verifyPassword').on('click', '#verifyPassword', function(e) {
        e.preventDefault();
        $('.err-msg').text('')
        $('#verifyPasswordForm input').css("border-color", "#b12704")
        cratesAjax({
            url : `/calendar/verify_update_request/${$(this).attr('data-order-id')}/${$(this).attr('data-user-id')}/${$(this).attr('data-status-request')}`,
            method: "post",
            data : $('#verifyPasswordForm').serializeArray()
        }, response => {
            $('#page-section').html(response);
        }, ({responseJSON:{errors}}) => {
            for(let key in errors){
                $(`#verifyPasswordForm [name="${key}"]`).css("border-color", "#b12704");
                $(`#verifyPasswordForm [name="${key}"]`).closest('.form-group').find('.err-msg').text(errors[key][0]);
            }
        });
    });

    $(document).off('keyup', '#verifyPasswordForm input').on('keyup', '#verifyPasswordForm input', function(e){
        e.preventDefault();
        e.stopPropagation()
        if(e.which === 13){
            $('#verifyPassword').trigger('click');
        }
    });

</script>
