<div id="datatable_container" class="clientContent">
    <div class="kt-subheader kt-grid__item uc_subHeader clientSubHeader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Account Heads
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">FINANCE</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Account Heads</a>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand nav-tabs-line-2x nav-tabs-line-right nav-tabs-bold" role="tablist">
                        <li class="nav-item getAccHeadTab" data-url="/admin/accounthead/tab/accounthead">
                            <a class="nav-link active">
                                Account Head
                            </a>
                        </li>
                        <li class="nav-item getAccHeadTab"  data-url="/admin/accounthead/tab/subhead">
                            <a class="nav-link">
                                Account Sub Head
                            </a>
                        </li>
                        <li class="nav-item getAccHeadTab" data-url="/admin/accounthead/tab/subheaditems">
                            <a class="nav-link">
                                Account Sub Head Items
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">                   
                <div class="tab-content">
                    <div class="tab-pane active" id="accountHeadContainer">
                        @include('supportNew.pages.accounthead.inc.account-head-view')
                    </div>
                </div>      
            </div>
        </div>
    </div>
</div>


<script>
    $(document).off('click', '.getAccHeadTab').on('click', '.getAccHeadTab', function(e){
        e.preventDefault();
        if ($(this).children('a').hasClass('active')) {
            return;
        }
        $(this).siblings().children('a').removeClass('active');
        $(this).children('a').addClass('active');
        let url = $(this).attr('data-url');
        supportAjax({
            url:url,
        }, function(resp){
            $('#accountHeadContainer').empty();
            setTimeout(() => {
                $('#accountHeadContainer').append(resp);
            }, 400);
        })
    });


    $(document).off('click', '#addAccHead').on('click', '#addAccHead', function(e){
        e.preventDefault();
        showModal({
            url: `/admin/accounthead/add`
        });
    });

    $(document).off('click', '.edit_acchead').on('click', '.edit_acchead', function(e){
        e.preventDefault();
        let url = $(this).attr('data-route');
        showModal({
            url:url,
        }); 
    });

    $(document).off('click', '.accHeadDeletet').on('click', '.accHeadDeletet', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        delConfirm({
            url: "/admin/accounthead/delete/" + id,
            header: $("#accountHeadsTable")
        });
    });
</script>