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
        border-bottom: 0px solid #ebedf2;
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
        border-bottom: 0px solid #ebedf2;
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
<div class="custom-dialog" role="document" style="margin-left:-15%;">
    <div class="modal-content" style="width:900px;">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Journal Sheet</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
               
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <div class="kt-invoice-2">

                        <div class="kt-invoice__head">
                            <div class="kt-invoice__container">
                                <div class="row" style="padding: 10px;">
                                    <div class="billMemberName col-6">
                                        <h6 class="kt-invoice__title">
                                            Date: {{\Carbon\Carbon::parse($journal->journal_date)->format(settingsValue('dateFormat'))}}
                                        </h6>
                                        <br>
                                        <h6>
                                            Description:
                                        </h6>
                                        <br>
                                        <p>{{trim($journal->description)}}</p>
                                    </div>
                                    
                                    <div class="btn-toolbar col-6" role="toolbar" aria-label="..." style="justify-content:flex-end !important;height:40px !important;">
                                        @if (is_null($journal->status))
                                            <div class="btn-group" role="group" aria-label="...">
                                                <button type="button" class="btn btn-pill btn-sm btn-upper btn-success"  id="journalApprove" data-id="{{$journal->id}}"><i class="la la-check"></i>Approve</button>
                                            </div>
                                            &nbsp;
                                            <div class="btn-group" role="group" aria-label="...">
                                                <button type="button" class="btn btn-pill btn-sm btn-upper btn-info"  id="" data-id="{{$journal->id}}"><i class="la la-edit"></i>Edit</button>
                                            </div>
                                        @else
                                            @if ($journal->status === 0)
                                                <div class="btn-group" role="group" aria-label="...">
                                                <button type="button" class="btn btn-pill btn-sm btn-upper btn-danger" onclick="event.preventDefault();" style="cursor: default;">Rejected</button>
                                            </div>
                                            @endif
                                            @if ($journal->status === 1)
                                                <button type="button" class="btn btn-pill btn-sm btn-upper btn-success" onclick="event.preventDefault();" style="cursor: default;">Accepted</button>
                                            @endif
                                            
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="kt-invoice__brand">
                                    
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>	
                        {{-- {{dd($journal)}} --}}
                        <?php 
                            $debit_total = 0;
                            $credit_total = 0;
                        ?>
                        @foreach ($journal->transactions as $transaction)
                            @if (!is_null($transaction->dr))
                                <?php $debit_total+=$transaction->dr ?>
                            @endif
                            @if (!is_null($transaction->cr))
                                <?php $credit_total+=$transaction->cr ?>
                            @endif
                        @endforeach
                        <div class="kt-invoice__body" id="journalTransactionsTable" data-id="{{$journal->id}}">
                        </div>
                        <div class="kt-invoice__footer">
                            <div class="kt-invoice__container">
                                <div class="table-responsive" style="padding-right:50px;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="width: 25%;"></th>
                                                <th></th>
                                                <th class="kt-align-right" style="width:17%;">TOTAL</th>
                                                <th class="kt-align-right" style="width:15%;">${{number_format($debit_total,2)}}</th>
                                                <th class="kt-align-right" style="width:21%;">${{number_format($debit_total,2)}}</th>
                                                <th style="width:12%;"></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div>
                            <hr>
                        </div>
                        <div class="kt-invoice__actions">
                            <div class="kt-portlet__foot footer_white">
                                    <div class="kt-form__actions">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                {{-- <button class="btn btn-pill btn-secondary" data-dismiss="modal"><i class="la la-times"></i>Cancel</button>
                                                <button class="btn btn-pill btn-danger delPurchaseOrder" ><i class="la la-trash"></i>Delete</button> --}}
                                            </div>
                                            <div class="col-lg-6 kt-align-right">
                                                <button class="btn btn-pill btn-secondary" data-dismiss="modal"></i>Cancel</button>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var id = $('#journalTransactionsTable').attr('data-id');
    var journalTransactionsTable = $('#journalTransactionsTable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: `/admin/journal/transactions/list/${id}`,
                    method: 'get',
                    map: function(raw) {
                        // sample data mapping
                        var dataSet = raw;
                        if (typeof raw.data !== 'undefined') {
                            dataSet = raw.data;
                        }
                        return dataSet;
                    },
                },
            },
            pageSize: 50,
            serverPaging: false,
            serverFiltering: false,
            serverSorting: false,
            //saveState: true 
        },

        // layout definition
        layout: {
            minHeight: 100,
            scroll: false,
            footer: false,
        },

        // column sorting
        sortable: false,

        pagination: false,


        // columns definition
        columns: [
            {
                field: 'account_head',
                title: 'Account Head',
                template: function(row){
                    return row.account_head.name;
                },
            },
            {
                field: 'description',
                title: 'Description',
                template: function(row){
                    if (row.description) {
                        return row.description;
                    }
                    return '--';
                },
            },
            {
                field: 'ref_no',
                title: 'Refrence#',
                width: 100,
            },
            {
                field: 'dr',
                title: 'Debit',
                template: function(row){
                    if (row.dr) {
                        return `$${row.dr}.00`;
                    }
                    return '-';
                },
            },
            {
                field: 'cr',
                title: 'Credit',
                template: function(row){
                    if (row.cr) {
                        return `$${row.cr}.00`;
                    }
                    return '-';
                },
            },
        ],

    });

    clickEvent('#journalApprove')(approve_journal);
    clickEvent('#journalReject')(reject_journal);

    function approve_journal(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
         swal.fire({
            title: 'Do you want to approve this Journal?',
            // text: "You won't be able to revert this!",
            type: 'question',
            confirmButtonText: '<i class="la la-check"></i>Yes, approve it!',
            confirmButtonColor: '#1dc9b7',
            showCancelButton: true,
            reverseButtons: true,
            customClass: {
                confirmButton: 'btn btn-pill btn-success',
                cancelButton: 'btn btn-pill btn-secondary',
            }
        }).then(function(result) {
            if(result.value){
                supportAjax({
                    url:`/admin/journal/approve/${id}`
                }, function(resp){
                    $('#cModal').modal('hide');
                    swal.fire(
                        'Journal Approved',
                        '',
                        'success'
                    )
                    setTimeout(() => {
                        $('#journalTable').KTDatatable().reload();
                    }, 500);
                }, function(err){
                    console.log(err);
                })
            }
        });
    };


    function reject_journal(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
         swal.fire({
            title: 'Do you want to reject this Journal?',
            // text: "You won't be able to revert this!",
            type: 'question',
            confirmButtonText: '<i class="la la-close"></i>Yes, reject it!',
            confirmButtonColor: '#fd397a',
            showCancelButton: true,
            reverseButtons: true,
            customClass: {
                confirmButton: 'btn btn-pill btn-danger',
                cancelButton: 'btn btn-pill btn-secondary',
            }
        }).then(function(result) {
            if(result.value){
                supportAjax({
                    url:`/admin/journal/reject/${id}`
                }, function(resp){
                    $('#cModal').modal('hide');
                    swal.fire(
                        'Journal Rejected',
                        '',
                        'error'
                    )
                    setTimeout(() => {
                        $('#journalTable').KTDatatable().reload();
                    }, 500);
                }, function(err){
                    console.log(err);
                })
            }
        });
    }
</script>