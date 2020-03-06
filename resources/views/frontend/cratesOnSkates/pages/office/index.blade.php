<div class="hr"></div>
<div class="sec-resi radial-th-gradient">
    <div class="container cs-container-wrapper">
        <div class="row">
            <!-- ***** Product Start ***** -->
            <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 section-content">
                <div class="sec-resi__title-container">
                    <h2 class="title">Pricing Below Is For Week 1 Rental.</h2>
                    <p>Subsequent weeks are all <span>50% off </span> the pricing of Week 1.</p>
                </div>
                <hr class="border-green">
            </div>
            <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 no-pd-left col-package" style="padding-bottom: 100px; padding-top: 30px;">
                    @include("frontend.cratesOnSkates.components.packages")
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    clickEvent(".showRate")(showPackageRate);
    clickEvent(".buttonBack")(backToFeatures);

    function showPackageRate() {
        let packageId = $(this).attr("data-id");
        let backPriceText = $("#backPrice"+packageId).text("Back").addClass("buttonBack");
        let subHeadintText = $("#subHeading"+packageId).text("Rates").addClass("packageRates");
        $("#packageFeatures"+packageId).hide();
        $("#continueButton"+packageId).hide();
        $("#packageDetail"+packageId).show();
    }

    function backToFeatures() {
        let packageId = $(this).attr("data-id");
        $("#backPrice"+packageId).text("$75.00").removeClass("buttonBack");
        let subHeadintText = $("#subHeading"+packageId).text("250-500 SQ FT").removeClass("packageRates");
        $("#packageFeatures"+packageId).show();
        $("#continueButton"+packageId).show();
        $("#packageDetail"+packageId).hide();
    }
</script>
