<div class="hr"></div>
<div class="section-contact radial-th-gradient">
    <div class="container cs-container-wrapper">
        <div class="row">
            <!-- ***** FAQ Start ***** -->
            <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 section-content">
                <div class="section-contact__title-container">
                    <h2 class="title">THANK YOU FOR YOUR INTEREST IN {{default_company('company_name')}}</h2>
                </div>
                <hr class="border-green">
                <div class="mb-4">
                    <ul class="address">
                        {{-- <li><i class="fas fa-map-marker-alt cs-custom-icon"></i> <span class="cs-fw-600">Austin, TX, 77777, USA</span></li> --}}
                        <li><i class="fas fa-map-marker-alt cs-custom-icon"></i> <span class="cs-fw-600">
                            @if(isset(custom_exploder('|',default_company('address'))[2]))
                                {!! custom_exploder('|',default_company('address'))[2]."<br/>" !!}
                            @else
                                {{custom_exploder('|',default_company('address'))[0]}}</span>
                            @endif
                        </li>
                        <li><i class="fas fa-phone cs-custom-icon"></i> <span class="cs-fw-600">{{preg_replace('/(\d{3})(\d{3})(\d{1,4})/','($1) $2-$3',default_company('phone_number'))}}</span></li>
                        <li><i class="fas fa-envelope cs-custom-icon"></i> <span class="cs-fw-600">{{default_company('email')}}</span></li>
                    </ul>
                </div>
            </div>   
            <hr class="border-green">
            <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 no-pd-left" style="padding-bottom: 100px;">
                <div>
                    <div class="row">
                        <div class="col-md-12 col-lg-6 col-sm-12 section-contact__main-form">
                            <div class="section-contact__bx-shadow">
                                <div class="section-contact__form-title">
                                    <p>Call us or fill out this contact form to reach us.</p>
                                </div>
                                <form class="section-contact__contact-form" id="submitEnqForm">
                                    @if(!auth()->check())
                                        <div class="row">
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
                                        </div>
                                        <div class="row">
                                            <div class="form-group label-floating col-md-12">
                                                <label class="cs-label section-contact__form-input-label" for="name">Email</label>
                                                <input class="form-control" name="email" required="require">
                                                <div class="errorMessage"></div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row">
                                        @if(!auth()->check())
                                            <div class="form-group label-floating col-md-6">
                                                <label class="cs-label section-contact__form-input-label" for="name">Phone</label>
                                                <input class="form-control cs_mask_phone" id="phone" type="text" name="phone" required="require">
                                                <div class="errorMessage"></div>
                                            </div>
                                        @endif

                                        <div class="form-group label-floating @if(!auth()->check()) col-md-6 @else col-md-12 @endif">
                                            <label class="cs-label section-contact__form-input-label" for="name">Reason</label>
                                            <select name="reason" class="form-control">
                                                <option selected disabled>Choose</option>
                                                <option value="I Need Help">I Need Help </option>
                                                <option value="Call Me">Call Me</option>
                                                <option value="Email Me">Email Me</option>
                                                <option value="Text Me">Text Me</option>
                                                <option value="Help with my order">Help with my order</option>
                                                <option value="I would like to place an order">I would like to place an order</option>
                                                <option value="I am ready for pick up">I am ready for pick up</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <div class="errorMessage"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group label-floating col-md-12">
                                            <label class="cs-label section-contact__form-input-label" for="name">Company <span class="cs-text-gray">(Optional)</span></label>
                                            <input class="form-control" name="company">
                                            <div class="errorMessage"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="cs-label section-contact__form-input-label" for="name">Description</label>
                                            <textarea class="form-control" rows="3" name="desc"></textarea>
                                        </div>
                                    </div>
                                    <div class="contact_submit_btn">
                                        <div class="global-btn global-btn__yellow" id="submitMe">
                                            <p>Submit</p>
                                        </div>
                                        {{-- <button class="btn-solid">Submit</button> --}}
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="col-md-12 col-lg-6 col-sm-12 no-pd-right section-contact__section-map">
                            <div class="mapouter">
                                <div class="gmap_canvas"><iframe width="100%" height="633" id="gmap_canvas" src="https://maps.google.com/maps?q=austin&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    phoneMask('#phone');

    $(document).off('click','.contact_submit_btn').on('click', ".contact_submit_btn", function(e){
        e.preventDefault();
        $(`#submitEnqForm input`).css("border-color", '#ced4da');
        $(`#submitEnqForm textarea`).css("border-color", '#ced4da');
        $(`#submitEnqForm select`).css("border-color", '#ced4da');
        let data = $('#submitEnqForm').serializeArray();
        cratesAjax({
            url : "/crates/enquire",
            method: 'post',
            data
        },() => {
            toastr.success("Enquire successfully submitted");
            $(`#submitEnqForm input`).val('');
            $(`#submitEnqForm select`).text('');
        },({responseJSON : {errors}}) => {
            for(let key in errors){
                $(`#submitEnqForm [name="${key}"]`).css("border-color", '#b12704');
            }
        });
    });
</script>
