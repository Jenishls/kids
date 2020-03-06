<div class="kt-portlet__body" style=" padding:0px !important;border-top: 2px solid #41bcf6;border-radius: 5px;"> 
    <div style="">
        <div class="kt-portlet__body" style="padding:25px;padding-bottom:25px !important;">
            <div class="row">
                <div class="col-xl-4"></div>     
                <div class="col-xl-4">
                    @if($type === 'clients')
                        <div class="form-group col-12">
                            <span class="btn portlet_label" style="position:relative !important;margin: 0 auto !important; left:0%!important;top:18px!important;">Select Client</span>
                            <div class="shadow_inputs" style="padding-top:1.5rem;">
                                <div class="form-group row" style="padding-top:10px;">
                                    <div class="col-lg-2 col-sm-3">
                                        
                                    </div>
                                    <div class="col-lg-8 col-sm-6">
                                        <select name="client" class="vendor--select" data-type="{{$type}}" id="supplierClient">
                                            <option value="">---------Client----------</option>
                                            @foreach ($data as $client)
                                                <option value="{{$client->id}}">{{$client->fname}} {{$client->mname?:''}} {{$client->lname?:''}}</option>
                                            @endforeach
                                        </select> 
                                        {{-- <div class="errorMessage"></div> --}}
                                        {{-- <div class="input-group" >
                                            <input type="text" id="clientNameSearch" data-type="clients" class="form-control" name="client_name" placeholder="Client Name">
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @else
                        <div class="form-group col-12">
                            <span class="btn portlet_label" style="position:relative !important;margin: 0 auto !important; left:0%!important;top:18px!important;">Select Company</span>
                            <div class="shadow_inputs" style="padding-top:1.5rem;">
                                <div class="form-group row" style="padding-top:10px;">
                                    <div class="col-lg-2 col-sm-3">
                                        
                                    </div>
                                    <div class="col-lg-8 col-sm-6">
                                        <select name="company" class="vendor--select" data-type="{{$type}}"  id="supplierCompany">
                                            <option value="">---------Company----------</option>
                                            @foreach ($data as $company)
                                                <option value="{{$company->id}}">{{$company->c_name}}</option>
                                            @endforeach
                                        </select>
                                        {{-- <div class="input-group" >
                                            <input type="text" id="companyNameSearch" data-type="companies" class="form-control" name="company_name" placeholder="Company Name">
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>         
                <div class="col-xl-4">
                    <span style="position:relative;left:86%;">
                        <button class="btn btn-pill btn-warning pageload" data-route="/admin/quotes"><i class="la la-arrow-left"></i>back</button>
                    </span>
                </div>     
            </div>                   
        </div>
    </div>
    <div id="appendedForm"></div>
</div>

<script>

var quote_grand_total = 0;
var tax_value = 0;
function calculate_sub_total(){
    let qty_el = document.querySelectorAll('input[name="billed_amt[]"]');
    let sub_total = 0;
    let grand_total = 0;
    $.each(qty_el, function(i, data){
        sub_total+=parseFloat($(data).val());
    });
    $('input[name="subtotal"]').val(sub_total.toFixed(2));
    $('input[name="po_subtotal"]').val(sub_total.toFixed(2));
    let taxes = document.querySelectorAll('.selectTax');
    grand_total = sub_total;
    $.each(taxes, function(i, data){
        if ($(data).val()) {
            if($(data).val()=== '' || $(data).val()=== 'Select Tax' || $(data).val()=== 'Choose Tax'){
                
                grand_total = grand_total || 0;
                $(data).parent().next().children('input[name="tax_value[]"]').val('');
                $(data).parent().next().children('input[name="tax[]"]').val('');
                $('input[name="total"]').val(grand_total.toFixed(2));
                $('input[name="po_total"]').val(grand_total.toFixed(2));
            }else{
                let tax_id = $(data).val();
                supportAjax({
                    url: `/admin/purchaseorder/taxes/${tax_id}`
                }, function(resp){
                    if(resp.is_percentage === 1){
                        tax_value = (grand_total*resp.value)/100
                        grand_total += tax_value;
                    }else{
                        tax_value = resp.value;
                        grand_total += parseInt(resp.value);
                    }
                    tax_value = tax_value || 0;
                    quote_grand_total = grand_total;
                    quote_grand_total = quote_grand_total || 0;
                    // console.log(quote_grand_total);
                    $('input[name="total"]').val(quote_grand_total.toFixed(2));
                    $(data).parent().next().children('input[name="tax_value[]"]').val(tax_value.toFixed(2));
                    $(data).parent().next().children('input[name="tax[]"]').val(tax_value.toFixed(2));
                    $('input[name="po_total"]').val(quote_grand_total.toFixed(2));
                });
            }
        // grand_total+=parseFloat($(data).val());
        }else{
            grand_total = grand_total || 0;
            $('input[name="total"]').val(grand_total.toFixed(2));
            $('input[name="po_total"]').val(grand_total.toFixed(2));
        }
    });
}

    // $('#clientNameSearch, #companyNameSearch').on('keyup', function(e){
    //     var el = $(this);
    //     let value = el.val();
    //     let entity = el.attr('data-type');
    //     var data = [];
    //     if(value.length>=3){
    //         supportAjax({
    //             url: `/admin/quotes/lookup/${entity}/${value}`,
    //         }, function(resp){
    //             $.each(resp, function(i, value){
    //                 let name = '';
    //                 let fname = '';
    //                 let mname = '';
    //                 let lname = '';
    //                 if(value.fname){
    //                     if(value.mname) mname= value.mname;
    //                     if(value.lname) lname= value.lname;
    //                     name=value.fname+` `+mname+' '+lname;
    //                 }
    //                 if(value.c_name){
    //                     name= value.c_name
    //                 }
    //                 data.push({id: value.id , text: name});
    //             })
    //             console.log(data.length);
    //             el.select2({
    //                 placeholder: 'Select',
    //                 data:data
    //             }).select2('open');
    //             if(data.length === 0){
    //                 setTimeout(() => {
    //                     el.select2('destroy');
    //                 }, 500);
    //             }
    //         }, function(err){
    //             console.log(err);
    //         })
    //     }
    // }).on('change', function(e){
    //     e.preventDefault();
    //     let el= $(this);
    //     let value = $(this).val();
    //     let entity = $(this).attr('data-type');
    //     if(parseInt(value)>=0) {
    //         supportAjax({
    //             url: `/admin/quotes/addform/${entity}/${value}`
    //         }, function(resp){
    //             $('#appendedForm').append(`<div class="col-sm" style="position:absolute;top70%;left:50%;">
    //                              <div class="kt-spinner kt-spinner--v2 kt-spinner--lg kt-spinner--dark"></div>
    //                         </div>`);
    //             setTimeout(() => {
    //                 $('#appendedForm').empty().append(resp);
    //                 el.select2('destroy');
    //                 el.val('');
    //             }, 500);
    //         }, function(err){
    //             console.log(err);
    //         });
    //     };
    // });

    $('.vendor--select').select2({
        placeholder: 'Select',
        width: 300,
    });
    $('.vendor--select').on('change', function(e){
        e.preventDefault();
        let el= $(this);
        let value = $(this).val();
        let entity = $(this).attr('data-type');
        if(parseInt(value)>=0) {
            supportAjax({
                url: `/admin/quotes/addform/${entity}/${value}`
            }, function(resp){
                $('#appendedForm').append(`<div class="col-sm" style="position:absolute;top70%;left:50%;">
                                 <div class="kt-spinner kt-spinner--v2 kt-spinner--lg kt-spinner--dark"></div>
                            </div>`);
                setTimeout(() => {
                    $('#appendedForm').empty().append(resp);
                }, 500);
            }, function(err){
                console.log(err);
            });
        };
    });
</script>