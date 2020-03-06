<style>
    .cs-contact-ul {
        display: flex;
        justify-content: space-between;
    }

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

    #contact_form {
        padding: 20px 20px;
        margin-bottom: 0px;
    }

    .cs-contact-ul {
        display: flex;
        justify-content: space-between;
    }

    .cs-contact-ul li {
        padding: 0px;
    }

    .cs-contact-ul svg {
        margin: 0px;
        margin-right: 0px;
        font-size: 18px;
        color: #ffbf00;
    }

    .cs-contact-ul span {
        font-size: 14px;
        color: white;
    }

    /* .mapouter iframe{
        border:1px dashed green;
    } */
</style>


<div class="hr"></div>
<div class="faq-section radial-th-gradient">
    <div class="container">
        <div class="row">
            <!-- ***** FAQ Start ***** -->
            <div class="col-md-10 offset-md-1">
                <div class="title3">
                    <h2 class="title-inner3 mb-5">THANK YOU FOR YOUR INTEREST IN CRATES ON SKATES.</h2>
                </div>
            </div>
            <hr class="border-green">
            <div class="col-md-10 offset-md-1">
                <div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 cs-contact-cust-pd">
                            <!-- <p class="cs-contact-sub-title">You can reach us by calling or use the
                                contact form. </p> -->
                            <div class="mb-4">
                                <ul class="cs-contact-ul">
                                    <li><i class="fas fa-map-marker-alt cs-custom-icon"></i> <span class="cs-fw-600">Austin, TX, 77777, USA</span></li>
                                    <li><i class="fas fa-phone cs-custom-icon"></i> <span class="cs-fw-600">(512)-298-1111</span></li>
                                    <li><i class="fas fa-envelope cs-custom-icon"></i> <span class="cs-fw-600">sales@cratesonskates.com</span></li>
                                </ul>
                            </div>
                            <div class="cs-cmrcl-container">
                                <div class="formHead">
                                    <p style="font-size:18px;font-weight:bold;margin-bottom:0px;color:#fff;margin-left:13px;">Call us or fill out this
                                        contact form to reach us.</p>
                                </div>
                                <form id="contact_form">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group label-floating col-md-6">
                                            <label class="cs-label cs-cmrcl-label" for="name">First Name</label>
                                            <input class="form-control" value="" id="" name="" required="require">
                                            <div class="errorMessage"></div>
                                        </div>
                                        <div class="form-group label-floating col-md-6">
                                            <label class="cs-label cs-cmrcl-label" for="name">Last Name</label>
                                            <input class="form-control" required="require">
                                            <div class="errorMessage"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group label-floating col-md-6">
                                            <label class="cs-label cs-cmrcl-label" for="name">Phone</label>
                                            <input class="form-control cs_mask_phone" value="" id="phone" type="text" name="phone" required="require">
                                            <div class="errorMessage"></div>
                                        </div>
                                        <div class="form-group label-floating col-md-6">
                                            <label class="cs-label cs-cmrcl-label" for="name">Email</label>
                                            <input class="form-control" value="" id="" name="Email" required="require">
                                            <div class="errorMessage"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group label-floating col-md-6">
                                            <label class="cs-label cs-cmrcl-label" for="name">Company <span class="cs-text-gray">(Optional)</span></label>
                                            <input class="form-control" value="" id="" name="" required="require">
                                            <div class="errorMessage"></div>
                                        </div>

                                        <div class="form-group label-floating col-md-6">
                                            <label class="cs-label cs-cmrcl-label" for="name">Select</label>
                                            <select name="i_need_help_with" class="form-control">
                                                <option selected="">Choose</option>
                                                <option value="">I Need Help With</option>
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
                                        <div class="form-group col-md-12">
                                            <label class="cs-label cs-cmrcl-label" for="name">Description</label>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="contact_submit_btn ">
                                        <div class="global-btn global-btn__yellow" data-route="crates/ordernow">
                                            <p>Submit</p>
                                        </div>
                                        {{-- <button class="btn-solid">Submit</button> --}}
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="mapouter">
                                <div class="gmap_canvas"><iframe width="540" height="600" id="gmap_canvas" src="https://maps.google.com/maps?q=austin&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    // $(document).foundation({
    //   accordion: {
    //     // specify the class used for active (or open) accordion panels
    //     active_class: 'active',
    //     // allow multiple accordion panels to be active at the same time
    //     multi_expand: true,
    //   }
    // });
</script>