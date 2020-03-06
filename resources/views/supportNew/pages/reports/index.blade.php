<style>
    .m-list-search .m-list-search__results .m-list-search__result-category.m-list-search__result-category--first {
        margin-top: 0;
    }

    .m-list-search .m-list-search__results .m-list-search__result-category {
        color: #716aca;
    }

    .m-list-search .m-list-search__results .m-list-search__result-category {
        display: block;
        margin: 30px 0 10px 0;
        font-weight: 600;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .m-list-search .m-list-search__results .m-list-search__result-item {
        display: table;
        table-layout: fixed;
        width: 100%;
        padding: 5px 0;
        outline: none;
    }

    .m-list-search .m-list-search__results .m-list-search__result-item .m-list-search__result-item-icon {
        color: #cfcedb;
    }

    .m-list-search .m-list-search__results .m-list-search__result-item .m-list-search__result-item-icon {
        display: table-cell;
        height: 100%;
        vertical-align: middle;
        text-align: left;
        padding: 1px;
        width: 32px;
        font-size: 1.2rem;
    }

    .m-list-search .m-list-search__results .m-list-search__result-item .m-list-search__result-item-text {
        color: #7b7e8a;
    }

    .m-list-search .m-list-search__results .m-list-search__result-item .m-list-search__result-item-text {
        display: table-cell;
        height: 100%;
        width: 100%;
        vertical-align: middle;
        font-size: 1rem;
    }
    .kt-radius-20 {
        border-radius: 20px;
    }
</style>

<div id="datatable_container" class="clientContent">
    <div class="kt-subheader kt-grid__item uc_subHeader clientSubHeader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Reports
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link pageload"
                        data-route="/admin/reports">Reports</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 col-md-3">
            <div class="kt-portlet">
                <div class="kt-portlet__body">
                    <div class="m-list-search">
                        <div class="m-list-search__results">
                            <span class="m-list-search__result-category m-list-search__result-category--first">
                                Reports
                            </span>
                            <a href="javascript::" class="m-list-search__result-item" data-route="admin/reports/section/product-list"
                            data-title="Product List Report">
                                <span class="m-list-search__result-item-icon">
                                    <i class="flaticon2-gift-1 kt-font-warning"></i>
                                </span>
                                <span class="m-list-search__result-item-text">
                                    Product List
                                </span>
                            </a>
                            <span class="m-list-search__result-category m-list-search__result-category--first">
                                SQL Reports
                            </span>
                            <a href="javascript::" class="m-list-search__result-item" data-route="admin/reports/section/sql-raw"
                            data-title="SQL Report List">
                                <span class="m-list-search__result-item-icon">
                                    <i class="fa fa-database kt-font-danger"></i>
                                </span>
                                <span class="m-list-search__result-item-text">
                                    Create Report
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-9" id="reportRightSection">
            {{-- @include('views.supportNew.pages.reports.include.rightSection') --}}
        </div>
    </div>
</div>

<script>
$(function() {
    let report = $('.m-list-search__result-item:first');
    report.trigger('click');
});
</script>