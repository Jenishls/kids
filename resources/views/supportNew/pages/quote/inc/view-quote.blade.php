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
        font-size: 1.2rem;
        margin-right: 10px;
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
<div class="modal-dialog addClientModalDialog" role="document" style="margin-left:22%; margin-top:1.5rem;">
    <div class="modal-content addClientModal modal-1000">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Quotation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        {{-- {{dd($order->poItems[0]->product)}} --}}
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                <div class="kt-portlet">
                    {{-- {{dd($quote)}} --}}
                    <div class="kt-portlet__body kt-portlet__body--fit">
                        <div class="kt-invoice-2">
                            <div class="kt-invoice__head">
                                <div class="kt-invoice__container">
                                    <div class="kt-invoice__brand">
                                            <div class="kt-invoice__item">
                                                <span class="kt-invoice__title">FOR:</span><br>
                                                <span class="kt-invoice__text">
                                                    {{ucfirst($requestedBy->c_name)}}<br>@if($requestedBy_add) {{$requestedBy_add->add1}}, {{$requestedBy_add->add2}}<br>{{ucfirst($requestedBy_add->city)}}, {{ucfirst($requestedBy_add->state)}}, {{$requestedBy_add->zip}}@endif
                                                </span>
                                            </div>
                                            {{-- @if ($vendor->c_name)
                                                {{ucfirst($vendor->c_name)}}
                                            @else
                                                {{ucfirst($vendor->fname)}} {{$vendor->mname? ucfirst($vendor->mname): ''}} {{$vendor->lname? ucfirst($vendor->lname): ''}}
                                            @endif --}}

                                        <div target="_blank" class="kt-invoice__logo">
                                            {{-- @if ($vendor->logo) --}}
                                            {{-- @else --}}
                                            <a><img src="media/blog/No_Image_Available.jpg" width="203" height="50"></a>
                                            {{-- @endif --}}
                                            {{-- <a target="_blank"><img src="{{asset('media/company-logos/logo_client_color.png')}}"></a> --}}

                                            <span class="kt-invoice__desc">
                                                <span>{{ucfirst($vendor_add->add1)}}, {{ucfirst($vendor_add->add2)}}</span>
                                                <span>{{ucfirst($vendor_add->city)}} {{ucfirst($vendor_add->state)}}{{ucfirst($vendor_add->zip)}}</span>
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <div class="kt-invoice__items">
                                        <div class="kt-invoice__item">
                                            <span class="kt-invoice__subtitle">DATE</span>
                                            <span class="kt-invoice__text">{{ Carbon\Carbon::parse($quote->delivery_date)->isoFormat('ll')}}</span>
                                           
                                        </div>
                                        <div class="kt-invoice__item">
                                            {{-- <span class="kt-invoice__subtitle">INVOICE NO.</span>
                                            <span class="kt-invoice__text">GS 000014</span>
                                            <br> --}}
                                            <span class="kt-invoice__subtitle">ORDER NO.</span>
                                            <span class="kt-invoice__text">{{$quote->quote_number}}</span>
                                        </div>
                                        <div class="kt-invoice__item">
                                            <span class="kt-invoice__subtitle">STATUS</span>
                                            <span class="kt-invoice__text">Not Paid</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>	
                            <div class="kt-invoice__body">
                                <div class="kt-invoice__container">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>NAME</th>
                                                    <th style="width:10%;">IMAGE</th>
                                                    <th>QUANTITY</th>
                                                    <th>RATE</th>
                                                    <th>AMOUNT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $total = 0;
                                                ?>
                                                @foreach ($quote->quoteItems as $key =>$item)
                                                    <tr>
                                                        {{-- @if($key===1)
                                                        {{dd($item->product)}}
                                                        @endif --}}
                                                        <td>{{$item->product->name}}</td>
                                                        <td><img src="{{asset('media/products/product27.jpg')}}" alt="" width="180" height="100"></td>
                                                        <td>{{$item->total_quantity}}</td>
                                                        <td>${{$item->actual_price}}.00</td>
                                                        <td class="kt-font-danger kt-font-lg">${{number_format((int)$item->total_quantity*(int)$item->actual_price,2)}}</td>
                                                    </tr>
                                                    <?php
                                                        $total+= ((int)$item->total_quantity*(int)$item->actual_price );
                                                    ?>
                                                @endforeach
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
                                                    <th style="width:25%;"></th>
                                                    <th style="width:53%;"></th>
                                                    <th style="width:25%;">SUB TOTAL</th>
                                                    <th class="kt-align-right">${{number_format($total, 2)}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width:25%;"></td>
                                                    <td style="width:25%;"></td>
                                                    <td style="width:25%;">TAXES</td>
                                                    <td class="kt-align-right" style="padding-right:0px;">15%</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    </td>
                                                    <td></td>
                                                    <td style="width:25%;">GRAND TOTAL</td>
                                                    <td class="kt-font-danger kt-font-xl kt-font-boldest kt-align-right" style="padding-right:0px;">${{number_format($total+$total*(15/100), 2)}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="kt-invoice__actions">
                                {{-- <div class="kt-invoice__container">
                                    <button type="button" class="btn btn-pill btn-label-brand btn-bold" onclick="window.print();">Download</button>
                                    <button type="button" class="btn btn-pill btn-brand btn-bold" onclick="window.print();">Print</button>
                                </div> --}}
                                <div class="kt-portlet__foot footer_white">
                                    <div class="kt-form__actions">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button class="btn btn-pill btn-secondary" data-dismiss="modal"><i class="la la-times"></i>Cancel</button>
                                                <button class="btn btn-pill btn-danger delquotes" data-url="/admin/quotes/delete/{{$quote->id}}"><i class="la la-trash"></i>Delete</button>
                                            </div>
                                            <div class="col-lg-6 kt-align-right">
                                                <button class="btn btn-pill btn-success" onclick="window.print();"><i class="la la-print"></i>Print</button>
                                                <button class="btn btn-pill btn-brand editquotes" data-id="{{$quote->id}}" data-type="{{$quote->supplier_type}}"><i class="la la-edit"></i>Edit</button>
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
</div>

<script>
    $(document).off('click', '.delquotes').on('click', '.delquotes', function(e){
        e.preventDefault();
        let url = $(this).attr('data-url');
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            confirmButtonText: 'Yes, delete it!',
            showCancelButton: true,
            reverseButtons: true,
            confirmButtonColor: '#f44336',
            customClass: {
                confirmButton: 'btn btn-pill btn-danger',
                cancelButton: 'btn btn-pill btn-secondary',
            }
        }).then(function(result) {
            // alert(url);
            if(result.value){
                supportAjax({
                    url:url
                }, function(resp){
                    $('#cModal').modal('hide');
                    swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    setTimeout(() => {
                        $('#quotesTable').KTDatatable().reload();
                    }, 500);
                }, function(err){
                    console.log(err);
                })
            }
        });
    });

    $(document).off('click', '.editquotes').on('click', '.editquotes', function(e){
        // e.preventDefault();
        let id = $(this).attr('data-id');
        $('#cModal').modal('hide');
        showModal({
            url:`/admin/quotes/edit/${id}`,
            c: 'poEdit'
        });
    });
    
</script>