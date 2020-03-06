<style>
    .cs-cmrcl-label {
        font-weight: 500;
    }

    .cs-cmrcl-container {
        background: #FFFFFF;
        box-shadow: 0 2px 48px 0 rgba(0, 0, 0, 0.06);
        border-radius: 4px;
        box-shadow: 4px 4px 20px 18px rgb(86, 171, 28);
        -moz-box-shadow: 4px 4px 20px 18px rgb(86, 171, 28);
        -webkit-box-shadow: 4px 4px 20px 18px rgb(86, 171, 28);
        padding: 0px 0px 20px 0px;
        margin-bottom: 80px;
    }

    .formHead {
        background: #f39731;
        padding: 20px;
        color: black;
    }

    #cmrcl_contact_form {
        padding: 20px 20px;
        margin-bottom: 0px;
    }

    .hr {
        background-image: url(../../images/pattern.png);
        height: 66px;
        margin: 0;
    }

    @media (max-width: 1050px) {
        .cmrcl-form {
            width: 100%;
            margin: 0px;
            min-width: 100%;
        }
    }
</style>
<div id="page-section" class="page-section">
    <div class="hr"></div>
    <div class="cs-cmrcl-container">
        <div class="formHead">
            <p style="font-size:18px;font-weight:bold;margin-bottom:0px;color:#fff;margin-left:13px;">Fill out the form to start working with us today !</p>
        </div>
        <form id="cmrcl_contact_form">
            {{-- modal body --}}
            @csrf
            <div class="row">
                <div class="form-group label-floating col-md-12">
                    <label class="cs-label cs-cmrcl-label" for="name">Company Name</label>
                    <input class="form-control" value="" id="" name="company" required="require">
                    <div class="errorMessage"></div>
                </div>

                @auth
                @else
                    <div class="form-group label-floating col-md-6">
                        <label class="cs-label section-contact__form-input-label" for="name">First Name</label>
                        <input class="form-control" name="fname" required="require">
                        <div class="errorMessage"></div>
                    </div>
                    <div class="form-group label-floating col-md-6">
                        <label class="cs-label section-contact__form-input-label" for="name">Last Name</label>
                        <input class="form-control" name="lname" required="require">
                        <div class="errorMessage"></div>
                    </div>
                @endif
            </div>
            <div class="row">
                @auth
                @else
                    <div class="form-group label-floating col-md-12">
                        <label class="cs-label cs-cmrcl-label" for="email">Email</label>
                        <input class="form-control" value="" id="email" name="email" required="require">
                        <div class="errorMessage"></div>
                    </div>
                @endauth
                <div class="form-group label-floating col-md-12">
                    <label class="cs-label cs-cmrcl-label" for="name">Phone</label>
                    <input class="form-control cs_mask_phone" value="" id="phone" type="text" name="phone" required="require" placeholder="(xxx) - xxx - xxxx">
                    <div class="errorMessage"></div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="cs-label cs-cmrcl-label" for="name">Specific Job Quote Request or Question</label>
                    <textarea class="form-control" rows="3" name="desc"></textarea>
                </div>
            </div>
            <div class="contact_submit_btn ">
                <div class="global-btn global-btn__yellow cmrcl-submit-btn" data-route="crates/ordernow">
                    <p>Submit</p>
                </div>
                {{-- <button class="btn-solid">Submit</button> --}}
            </div>
        </form>
    </div>
</div>
<script>
    $(document).off('input keyup', '.cs_mask_phone').on('input keyup', '.cs_mask_phone', function(e) {
        e.preventDefault();
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    });

    $(document).off('click','.contact_submit_btn').on('click', ".contact_submit_btn", function(e){
        e.preventDefault();
        $(`#cmrcl_contact_form input`).css("border-color", '#ced4da');
        $(`#cmrcl_contact_form textarea`).css("border-color", '#ced4da');
        $(`#cmrcl_contact_form select`).css("border-color", '#ced4da');
        let data = $('#cmrcl_contact_form').serializeArray();
        cratesAjax({
            url : "/crates/enquire/commercial_movers",
            method: 'post',
            data
        },() => {
            toastr.success("Enquire successfully submitted");
            $(`#cmrcl_contact_form input`).val('');
            $(`#cmrcl_contact_form select`).text('');
        },({responseJSON : {errors}}) => {
            for(let key in errors){
                $(`#cmrcl_contact_form [name="${key}"]`).css("border-color", '#b12704');
            }
        });
    });
</script>