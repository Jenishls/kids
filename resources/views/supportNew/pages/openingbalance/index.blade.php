<style>
    .small--cell{
        width: 150px;
    }
    .medium--cell{
        width:200px;
    }
</style>

<div id="datatable_container" class="clientContent">
    <div class="kt-subheader kt-grid__item uc_subHeader clientSubHeader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Opening Balance
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">FINANCE</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Opening Balance</a>
                </div>
            </div>
        </div>
        <div class="kt-subheader__wrapper kt-align-right" style="width:100%;">
            <a class="btn btn-pill btn-danger btn-elevate btn-icon-sm" id="closeAccount" style="color:#fff;"><i class="la la-minus-circle"></i>
                Close Account
            </a>
        </div>
    </div>

    <div>
        <div class="alert alert-light alert-elevate search_top_container" role="alert">
            <div class="alert-text">
                <div class="row">
                    <div class="col-xl-8 order-1 order-xl-1 serach_col po_search_col billsSearchCol">
                        <div class="form-group m-form__group row align-items-center ">
                            
                            <div class="col-md-4 col-sm-6">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Fiscal Year</span>
                                    </div>
                                    <select type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="fiscal_year" autocomplete="off" name="fiscal_year">
                                        <option value="">Select</option>
                                        <option value="2019" @if($yearcookie === '2019') selected @endif>2019</option>
                                        <option value="2020" @if($yearcookie === '2020') selected @endif>2020</option>
                                    </select>
                                </div>

                            </div>
                            {{-- <div class="col-md-3 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Status</span>
                                    </div>
                                    
                                    <select name="statusSelect" id="statusSelect">
                                        <option value="not_paid">Not Paid</option>
                                        <option value="paid">Paid</option>
                                    </select>
                                </div>
                            </div> --}}
                           
                            <div>
                                <i class="fas fa-redo searchRedo"></i>
                            </div>

                        </div>
                    </div>
                    <div class="rp_btn col-xl-4 order-1 order-xl-1" style="display:inline-flex;">
                        <div class="dropdown dropdown-inline exportBtn">

                            <button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-download"></i></button>

                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="kt-nav">
                                    <li class="kt-nav__section kt-nav__section--first">
                                        <span class="kt-nav__section-text">Choose an option</span>
                                    </li>

                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon la la-file-text-o"></i>
                                            <span class="kt-nav__link-text exportTo" data-export-to="csv">CSV</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                            <span class="kt-nav__link-text exportTo" data-export-to="pdf">PDF</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet kt-portlet--tabs">
           
            <div class="kt-portlet__body">                   
                <div class="kt-section">
                    <div class="kt-section__content">
                        <div class="table-responsive" style="border-radius:7px!important;">
                            <form id="addOpeningBalanceForm">
                                <table class="table table-striped" >
                                    <thead class="thead-light">
                                        <tr style="height: 45px;">
                                            <th>Account Head</th>
                                            <th>Fiscal Year</th>
                                            <th>Dr.</th>
                                            <th>Cr.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($accounts)<= 0)
                                            <tr>
                                                <td colspan="4" style="text-align:center;">No records to display</td>
                                            </tr>
                                        @else
                                        @foreach ($accounts as $accHead)
                                            <tr style="height:40px;">
                                                <td>{{$accHead->name}}</td>
                                                
                                                <td class="small--cell fiscalYearTd">
                                                    {{-- <input type="text" class="form-control fiscalYear" autocomplete="off" name="fiscal_year[]" value="{{\Carbon\Carbon::parse(now())->format('Y')}}"> --}}
                                                    {{-- <select name="fiscal_year[]" class="form-control fiscalYear">
                                                        <option value="">Select</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2024">2024</option>
                                                    </select> --}}
                                                    <span>{{\Carbon\Carbon::parse(now())->format('Y')}}</span>
                                                    <input type="text" value="{{\Carbon\Carbon::parse(now())->format('Y')}}" name ="fiscal_year[]" hidden>
                                                </td>
                                                <td class="medium--cell">
                                                    @if (strtolower($accHead->type) === 'asset' || strtolower($accHead->type) === 'expense' )
                                                        @if (is_null($accHead->dr_amount))
                                                            <input type="number" min="1" class="form-control" autocomplete="off" name="debit[]" placeholder="0.00" rel="accountHeadValue" data-acc-head="{{$accHead->id}}" data-type="debit">
                                                        @else
                                                            <strong>{{$accHead->dr_amount}}</strong>
                                                        @endif
                                                    @else
                                                        &nbsp;
                                                    @endif
                                                </td>
                                                <td class="medium--cell">
                                                    @if (strtolower($accHead->type) === 'liability' || strtolower($accHead->type) === 'equity' || strtolower($accHead->type) === 'income')
                                                        @if (is_null($accHead->cr_amount))
                                                            <input type="number" min="1" class="form-control" autocomplete="off" name="credit[]" placeholder="0.00" rel="accountHeadValue" data-acc-head="{{$accHead->id}}" data-type="credit">
                                                        @else
                                                            <strong>{{$accHead->cr_amount}}</strong>
                                                        @endif
                                                    @else
                                                        &nbsp;
                                                    @endif
                                                    {{-- <input type="number" min="1" class="form-control" autocomplete="off" name="credit[]" placeholder="0.00"> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                @if($yearcookie === '')
                                <div class="row" style="padding-bottom:25px;margin-right:0px !important;">
                                    <div class="col-lg-6">
                                        {{-- <button  class="btn btn-pill btn-brand addNewItem" data-id="1"><i class="la la-plus"></i>Add Item</button> --}}
                                    </div>
                                    <div class="col-lg-6 kt-align-right">
                                        {{-- <button type="reset" class="btn btn-pill btn-secondary" id="resetForm"><i class="fa fa-eraser"></i>Clear</button> --}}
                                        <button class="btn btn-pill btn-success" id="addOpeningBalance"><i class="la la-save"></i>Save</button>
                                    </div>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.searchRedo').on('click', function(){
        $('#fiscal_year').val('').trigger('change');
    });
    $('#fiscal_year').select2({
        width: '100%',
    });
    $('#fiscal_year').change(function(e){
        e.preventDefault();
        let v = $(this).val();
        let name = $(this).attr('name');
            console.log(name, '=', v);
            supportAjax({
                url: `/admin/openingbalance?${name}=${v}`
            },function(resp){
                setTimeout(() => {
                    $('#kt_body').empty().append(resp);
                }, 300);
            }, function(err){
                console.log(err);
            });
    });
    var fiscal = document.querySelectorAll('.fiscalYear');
    $.each(fiscal, function(i,v){
        $(v).select2({
           width:'100%',
        });
    });

    clickEvent('#addOpeningBalance')(add_opening_balance)
    function add_opening_balance(e) {
        e.preventDefault();
        let balance = [];
        $.each($('input[rel="accountHeadValue"]'), function(i,v){
            let self = $(this);
            let type = "";
            let head = "";
            let f_year = "";
            let amount = self.val();

            if (amount !== '') {
                type = self.attr('data-type').toLowerCase();
                head = self.attr('data-acc-head');
                f_year = $(self.parent('td').siblings().children('input[name="fiscal_year[]"]')).val();
               
                balance.push({
                    type: type,
                    fiscal_year: f_year,
                    account_head: head,
                    amount: amount
                });
            }
        });
        swal.fire({
            title: 'Do you want to save these entries?',
            text: "You won't be able to revert this!",
            type: 'question',
            confirmButtonText: '<i class="la la-check"></i>Yes!',
            confirmButtonColor: '#1dc9b7',
            showCancelButton: true,
            reverseButtons: true,
            customClass: {
                confirmButton: 'btn btn-pill btn-success',
                cancelButton: 'btn btn-pill btn-secondary',
            }
        }).then(function(result) {
            if (result.value) {
                if (balance.length > 0) {
                    supportAjax({
                        url: '/admin/openingbalance/save',
                        method: 'POST',
                        data: {data: balance}
                    }, function(resp){
                        $('#kt_body').empty().append(resp);
                        $('html, body').animate({scrollTop: 0}, 200);
                        toastr.success('Opening Balance Updated');
                    }, function(err){
                        console.log(err);
                    })
                }else{
                    toastr.error('No Data filled');
                    // $('html, body').animate({scrollTop: 0}, 200);
                }
            }
        });
    }
</script>