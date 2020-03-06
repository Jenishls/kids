<!-- Start Contact Form area -->
<div class="contact-form-area mtb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- Start Google Map -->
                    <div id="gmaps"></div>
                </div>
                <div class="col-md-6">
                    <form id="contact_form" class="default_form contact_form shadow__black" name="contactform">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="contact-title">Get in Touch </h2>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input name="name" id="first_name" placeholder="Your Name" class="form-controllar" type="text">
                                </div><!--/.form-group-->   
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input name="email" id="email" placeholder="Your Emaill" class="form-controllar" type="email">
                                </div><!--/.form-group-->  
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input name="mobile" id="mobile" placeholder="Mobile Number" class="form-controllar" type="text">
                                </div><!--/.form-group-->   
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input name="sub" id="sub" placeholder="Subject" class="form-controllar" type="text">
                                </div><!--/.form-group-->  
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" class="form-controllar" placeholder="Your Message"></textarea>
                                </div><!--/.form-group-->
                            </div>
                            <div class="col-md-12">
                                <div class="form-group-btn text-right">
                                    <button id="submit" type="submit" class="btn btn-default btn-primary">Submit</button>
                                </div><!--/.form-group-btn-->
                            </div>
                        </div>   
                    </form>
                </div>
            </div>
        </div>
    </div><!-- End Contact Form area -->

<script>
    $(document).ready(function(){
        if ($('#gmaps').length) {
            var map;
            map = new GMaps({
                el: '#gmaps',
                lat: 27.723969,
                lng: 85.351544,
                scrollwheel: false,
                zoom: 16,
                zoomControl: true,
                panControl: false,
                streetViewControl: false,
                mapTypeControl: false,
                overviewMapControl: false,
                clickable: false
            });  
            map.addMarker({
                lat: 27.723969,
                lng: 85.351544,
                animation: google.maps.Animation.DROP,
                verticalAlign: 'bottom',
                horizontalAlign: 'center'
            }); 
        }
    });


</script>