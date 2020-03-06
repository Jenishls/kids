<style>
.add_faq_btn {
    background: #22b9ff;
    color: white !important;
    outline: none !important;
    border: none !important;
}    
</style>

<div class="kt-subheader kt-grid__item uc_subHeader " id="kt_subheader">
    <div class="kt-container validation_breadcumb">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Frequently Asked Questions
            </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a class="kt-subheader__breadcrumbs-link">SETTINGS</a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a class="kt-subheader__breadcrumbs-link">FAQs</a>
            </div>
        </div>
        <div class="kt-subheader__toolbar" style="margin-top:0;">
            <div class="kt-subheader__wrapper">
            </div>
            <div class="kt-subheader__wrapper">
                <button type="button" class="btn btn-info m-btn add_faq_btn " data-toggle="modal" id='add_faq'>
                    <span>
                        <i class="la la-plus"></i>
                        <span>
                            FAQs
                        </span>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).off('click', '#add_faq').on('click', '#add_faq', function(e) {
        e.preventDefault();
        showModal({
            url: 'faq/add'
        });
    });
</script>