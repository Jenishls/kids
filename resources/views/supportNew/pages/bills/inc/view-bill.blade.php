<style>
    .kt-grid.kt-grid--hor:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile)>.kt-grid__item.kt-grid__item--fluid {
        -webkit-box-flex: 1;
        -ms-flex: 1 0 auto;
        flex: 1 0 auto;
    }
    .kt-portlet {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-shadow: 0 0 13px 0 rgba(82,63,105,.05);
        box-shadow: 0 0 13px 0 rgba(82,63,105,.05);
        background-color: #fff;
        margin-bottom: 20px;
        border-radius: 4px;
    }
    .kt-portlet .kt-portlet__body.kt-portlet__body--fit {
        padding: 0;
    }
    .kt-portlet .kt-portlet__body {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        padding: 25px;
        border-radius: 4px;
    }
    .kt-invoice-2 {
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
    }
    .kt-invoice-2 .kt-invoice__head {
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        background-size: cover;
        background-repeat: no-repeat;
        padding: 20px 0;
    }
    .kt-invoice-2 .kt-invoice__head .kt-invoice__container {
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
    }
    .kt-invoice-2 .kt-invoice__head .kt-invoice__brand {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }
    .kt-invoice-2 .kt-invoice__head .kt-invoice__brand .kt-invoice__title {
        font-weight: 400;
        font-size: 1.3rem;
        margin-right: 10px;
        margin-left: 10px;
        margin-top: 5px;
        color: #595d6e;
        vertical-align: top;
    }
    .kt-invoice-2 .kt-invoice__head .kt-invoice__brand .kt-invoice__logo {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        margin-top: 5px;
        text-align: right;
    }
    .kt-invoice-2 .kt-invoice__head .kt-invoice__brand .kt-invoice__logo img {
        text-align: right;
    }
    .kt-invoice-2 .kt-invoice__head .kt-invoice__brand .kt-invoice__logo .kt-invoice__desc {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        text-align: right;
        font-weight: 400;
        padding: 1rem 0 1rem 0;
        color: #74788d;
    }
    .kt-invoice-2 .kt-invoice__head .kt-invoice__items {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-top: 50px;
        width: 100%;
        border-top: 1px solid #ebedf2;
    }
    .kt-invoice-2 .kt-invoice__head .kt-invoice__items .kt-invoice__item {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        color: #595d6e;
        margin-right: 10px;
        margin-top: 20px;
    }
    .kt-invoice-2 .kt-invoice__head .kt-invoice__items .kt-invoice__item .kt-invoice__subtitle {
        font-weight: 500;
        padding-bottom: .5rem;
    }
    .kt-invoice-2 .kt-invoice__head .kt-invoice__items .kt-invoice__item .kt-invoice__text {
        font-weight: 400;
        color: #74788d;
    }
    .kt-invoice-2 .kt-invoice__body {
        padding: 1rem 0;
    }
    .kt-invoice-2 .kt-invoice__container {
        width: 100%;
        margin: 0;
        padding: 0 30px;
    }
    .kt-invoice-2 .kt-invoice__body table {
        background-color: transparent;
    }
    .kt-invoice-2 .kt-invoice__body table thead tr th {
        background-color: transparent;
        padding: 1rem 0 .5rem 0;
        color: #74788d;
        border-top: 0;
        border-bottom: 1px solid #ebedf2;
    }
    .kt-invoice-2 .kt-invoice__body table thead tr th:not(:first-child) {
        text-align: right;
    }
    .kt-invoice-2 .kt-invoice__body table tbody tr td {
        background-color: transparent;
        padding: 1rem 0 1rem 0;
        border-top: none;
        font-weight: 700;
        font-size: 1.1rem;
        color: #595d6e;
    }
    .kt-invoice-2 .kt-invoice__body table tbody tr:first-child td {
        padding-top: 1.8rem;
    }
    .kt-invoice-2 .kt-invoice__body table tbody tr td:not(:first-child) {
        text-align: right;
    }
    .kt-invoice-2 .kt-invoice__footer {
        padding: 1rem 0;
        background-color: #f7f8fa;
    }
    .kt-invoice-2 .kt-invoice__footer .kt-invoice__container {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }
    .kt-invoice-2 .kt-invoice__footer .table th {
        font-size: 1.1rem;
        text-transform: capitalize;
        font-weight: 500;
        color: #74788d;
        border-top: 0;
        border-bottom: 1px solid #ebedf2;
        padding: 10px 10px 10px 0;
        background-color: transparent;
    }
    .kt-invoice-2 .kt-invoice__footer .table th:last-child {
        padding-right: 0;
    }
    .kt-invoice-2 .kt-invoice__footer .table td {
        font-size: 1.1rem;
        text-transform: capitalize;
        background-color: transparent;
        font-weight: 500;
        color: #595d6e;
        padding: 10px 10px 10px 0;
    }
    .kt-invoice-2 .kt-invoice__actions {
        padding: 1rem 0;
    }
    .kt-invoice-2 .kt-invoice__actions .kt-invoice__container {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }
    
</style>
{{-- {{dd($bill->account)}} --}}

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">
        <div class="kt-portlet__body kt-portlet__body--fit">
            <div class="kt-invoice-2">

                <div class="kt-invoice__head">
                    <div class="kt-invoice__container">
                        <div class="row" style="padding: 10px;">
                            <div class="billMemberName col-6">
                                <h4 class="kt-invoice__title">
                                    {{-- {{$bill->account_id  ucfirst($bill->account->company_name) : ucfirst($bill->member->name)}} --}}
                                    @if ($bill->account_id)
                                        {{ucfirst($bill->account->company_name)}}
                                    @elseif ($bill->member_id)
                                        {{ucfirst($bill->member->name)}}
                                    @else
                                        Bill is not assigned to either user or company.
                                    @endif
                                </h4>
                            </div>
                            {{-- <div class="btn-toolbar col-6" role="toolbar" aria-label="..." style="justify-content:flex-end !important;">
                                <div class="btn-group mr-2" role="group" aria-label="...">
                                    <button type="button" class="btn btn-pill btn-success statusUpdate" data-id="{{$bill->id}}" data-status="approved" @if($bill->status === 'approved') disabled @endif><i class="la la-check"></i>Approved</button>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="..." @if($bill->status === 'approved') hidden @endif>
                                    <button type="button" class="btn btn-pill btn-danger statusUpdate" data-id="{{$bill->id}}" data-status="not approved"><i class="la la-close"></i>Not Approved</button>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="...">
                                    <button type="button" class="btn btn-pill btn-primary"><i class="la la-cloud-upload"></i>Upload Bills</button>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="...">
                                    <button type="button" class="btn btn-pill btn-secondary" onclick="window.print();"><i class="la la-print"></i>Print</button>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="...">
                                    <button type="button" class="btn btn-pill btn-secondary" style="background:#dbdbdb"><i class="la la-mail-forward"></i>Export in PDF</button>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="...">
                                    <button type="button" class="btn btn-pill btn-warning pageload" data-route="/admin/bills"><i class="la la-arrow-left"></i>Back</button>
                                </div>
                                
                            </div> --}}
                            {{-- <div class="col-3"></div> --}}
                            
                            <div class="btn-toolbar col-6" role="toolbar" aria-label="..." style="justify-content:flex-end !important;">
                                <div class="btn-group" role="group" aria-label="...">
                                    <button type="button" class="btn btn-pill btn-sm btn-upper btn-warning pageload" data-route="/admin/bills"><i class="la la-arrow-left"></i>Back</button>
                                </div>
                                &nbsp;
                                <div class="btn-group">
                                    <div class="dropdown">
                                        <button class="btn btn-pill btn-sm btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            ACTIONS
                                            <i class="kt-menu__hor-arrow la la-angle-down"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                            @if ($bill->status === 'cancelled')
                                                <a class="dropdown-item viewCancelNote kt-font-info" data-id="{{$bill->id}}"><i class="flaticon2-sheet kt-font-info"></i>View Note</a>
                                            @endif
                                            <a class="dropdown-item statusUpdate kt-font-success" data-id="{{$bill->id}}" data-status="approved" @if($bill->status === 'approved' || $bill->status === 'cancelled') hidden @endif><i class="flaticon2-check-mark kt-font-success"></i>Mark as approved</a>
                                            <a class="dropdown-item cancelReason kt-font-danger" data-id="{{$bill->id}}" data-status="not approved" @if($bill->status === 'approved' || $bill->status === 'cancelled') hidden @endif><i class="flaticon2-cross kt-font-danger"></i> Disapprove</a>
                                            <a class="dropdown-item kt-font-info" @if($bill->status === 'cancelled') hidden @endif id="billFileUpload" data-id="{{$bill->id}}"><i class="flaticon-upload kt-font-info"></i> Upload Files</a>
                                            <a class="dropdown-item printBill" data-id="{{$bill->id}}"><i class="flaticon-technology"></i> Print</a>
                                            <a class="dropdown-item kt-font-primary"><i class="la la-mail-forward kt-font-primary"></i> Export as PDF</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="kt-invoice__brand">
                            <h4 class="kt-invoice__title">Bill Title: <em>{{ucfirst($bill->bill_title)}}</em></h4>
                            <h4 class="kt-invoice__title">Status: <span class="kt-badge @if($bill->status){{$bill->status ==='approved'? 'kt-badge--success' : 'kt-badge--danger' }} @endif kt-badge--inline kt-badge--pill kt-badge--rounded">{{$bill->status? ucfirst($bill->status):''}}</span></h4>
                            <div class="kt-invoice__logo">
                                {{-- @if ($vendor->logo) --}}
                                {{-- @else --}}
                                <a><img src="media/blog/No_Image_Available.jpg" width="203" height="50"></a>
                                {{-- @endif --}}
                                {{-- <a target="_blank"><img src="{{asset('media/company-logos/logo_client_color.png')}}"></a> --}}

                                {{-- <span class="kt-invoice__desc">
                                    <span>Hello</span>
                                </span> --}}
                               
                            </div>
                        </div>
                        
                        <div class="kt-invoice__items" style="background: #dbdbdb; padding-bottom:10px;">
                            
                            <div class="kt-invoice__item">
                                <div class="row xs-p-10 no-margin bg-breakpoint">
                                    <div class="col-sm-7">
                                    </div>
                                    <div class="col-sm-3 text-right">
                                        <strong>Bill #</strong><br>
                                        <strong>Bill Date</strong><br>
                                        <strong>Due Date</strong>
                                    </div>
                                    <div class="col-sm-2 text-right">
                                        <strong>{{$bill->bill_no}}</strong><br>
                                        {{$bill->created_at->format(settingsValue('dateFormat'))}}<br>
                                        {{\Carbon\Carbon::parse($bill->bill_date)->format(settingsValue('dateFormat'))}} <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>	
                <div class="kt-invoice__body">
                    <div class="kt-invoice__container">
                        <div class="table-responsive">
                            <table class="table">
                                {{-- {{dd($bill->accountHead)}} --}}
                                <thead>
                                    <tr>
                                        <th style="width:17%">SN#</th>
                                        <th style="width:60%">Account Head</th>
                                        <th style="width:15%">AMOUNT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>{{$bill->accountHead->name}}</td>
                                        <td>{{number_format($bill->amount, 2)}} {{$bill->currency}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="kt-invoice__footer">
                    <div class="kt-invoice__container">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width:17%;"></th>
                                        <th class="kt-align-right" style="width:60%;">TOTAL</th>
                                        <th class="kt-align-right" style="width: 15%;">{{number_format($bill->amount, 2)}} {{$bill->currency}}</th>
                                    </tr>
                                </thead>
                               
                            </table>
                        </div>
                    </div>
                </div>

                <div class="kt-invoice__actions">
                    {{-- <div class="kt-invoice__container">
                        <button type="button" class="btn btn-pill btn-label-brand btn-bold" onclick="window.print();">Download</button>
                        <button type="button" class="btn btn-pill btn-brand btn-bold" onclick="window.print();">Print</button>
                    </div> --}}
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // $('.dropdown').dropdown('toggle');
    $(document).off('click', '.statusUpdate').on('click', '.statusUpdate', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        let status = $(this).attr('data-status');
        swal.fire({
            title: `Change bill status to ${status}`,
            text: "Click yes to confirm",
            type: 'info',
            confirmButtonText: 'Yes, Change it!',
            showCancelButton: true,
            reverseButtons: true,
            // confirmButtonColor: '#f44336',
            customClass: {
                confirmButton: 'btn btn-pill btn-success',
                cancelButton: 'btn btn-pill btn-secondary',
            }
        }).then(function(result) {
            // alert(url);
            if(result.value){
                supportAjax({
                    url: `/admin/bills/status/${id}/${status}`,
                }, function(resp){
                    $('#billsTable').empty().append(resp);
                }, function(err){
                    console.log(err);
                });
            }
        });
        
    });


    clickEvent('.printBill')(print_bill);
    function print_bill(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        supportAjax({
            url: `/admin/bills/print/${id}`
        }, function(resp){
            var w =window.open('about:blank');
            w.document.open();
            w.document.write(resp);
            w.document.close();
        }, function(err){
            console.log(err);
        });
    }

    clickEvent('.cancelReason')(bill_cancel);
    function bill_cancel(e) {
        e.preventDefault();
        let id= $(this).attr('data-id');
        showModal({
            url: `/admin/bills/cancel/${id}`,
        });
    }


    clickEvent('.viewCancelNote')(view_cancel_reason);
    function view_cancel_reason(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        showModal({
            url: `/admin/bills/viewnote/${id}`,
        });
    }

    clickEvent('#billFileUpload')(uploadModal);
    function uploadModal(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        showModal({
            url: `/admin/bills/uploadfile/${id}`,
        });
    }
</script>

