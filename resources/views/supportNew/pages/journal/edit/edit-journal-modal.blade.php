<style>
    .form-group{
        padding-bottom:5px !important;
    }
</style>
<div class="custom-dialog" role="document" style="margin-left:-15%;">
    <div class="modal-content" style="width:900px;">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Journal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
               
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important; padding-top:0px!important;color:#000;"> 
                    <form class="kt-form kt-form--label-right" id="updateJournalForm" style="margin-top:15px;">   
                        @csrf
                        {{-- {{dd($journal)}} --}}
                        <div class="" id="kt_portlet_base_demo_1_1_tab_content"style="background:#e5f7ff !important;" >
                            <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important; padding-top:0px !important;">
                                <div class="row" style="margin-bottom:1rem;">
                                    <div class="form-group col-12">
                                        <div class="">
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-9" style="padding-top:10px;">
                                                    <label class="control-label" for="j_description">Description</label>
                                                    <textarea class="form-control" value="{{$journal->description}}" name="description" id="j_description" rows="1">
                                                      {{$journal->description}}
                                                    </textarea>
                                                    <div class="errorMessage"></div>   
                                                </div>
                                                <div class="form-group  col-md-3" style="padding-top:10px;">
                                                    <label class="control-label" for="j_date">Date</label>
                                                    <input class="form-control" value="{{\Carbon\Carbon::parse($journal->journal_date)->format('m/d/Y')}}" name="journal_date" id="j_date">
                                                    <div class="errorMessage"></div>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <hr>
                                            </div>
                                            @foreach ($journal->transactions as $transaction)
                                                <div class="form-group row" style="padding:5px;">
                                                    <div class="form-group  col-md-3" style="padding-top:10px;">
                                                        @if ($loop->first)
                                                            
                                                        <label class="control-label" for="">Account</label>
                                                        @endif
                                                        <select class="form-control accountHeadSelect" name="account_head[]">
                                                            <option value="{{$transaction->accountHead->id}}">{{$transaction->accountHead->name}}</option>
                                                        </select>
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                    
                                                    <div class="form-group  col-md-2" style="padding-top:10px;">
                                                        @if ($loop->first)

                                                        <label class="control-label" for="">Cr.</label>
                                                        @endif
                                                        <input class="form-control" type="number" min="0" name="credit[]" value="{{$transaction->cr}}" >
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group  col-md-2" style="padding-top:10px;">
                                                        @if ($loop->first)

                                                        <label class="control-label" for="">Dr.</label>
                                                        @endif
                                                        <input class="form-control" type="number" min="0" name="debit[]" value="{{$transaction->dr}}" >
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="form-group  col-md-5" style="padding-top:10px;">
                                                        @if ($loop->first)

                                                        <label class="control-label" for="">Description</label>
                                                        @endif
                                                        <input class="form-control" name="jt_description[]" value="{{$transaction->description}}" >
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            {{-- <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-3" style="padding-top:10px;">
                                                    <label class="control-label" for="">Account</label>
                                                     <select class="form-control accountHeadSelect" name="account_head[]">
                                                        <option value="">Select</option>
                                                    </select>
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="form-group  col-md-4" style="padding-top:10px;">
                                                    <label class="control-label" for="">Description</label>
                                                    <input class="form-control" name="jt_description[]" >
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="form-group  col-md-2" style="padding-top:10px;">
                                                    <label class="control-label" for="">Cr.</label>
                                                    <input class="form-control" type="number" min="0" name="credit[]" >
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="form-group  col-md-2" style="padding-top:10px;">
                                                    <label class="control-label" for="">Dr.</label>
                                                    <input class="form-control" type="number" min="0" name="debit[]" >
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="form-group  col-md-1" style="padding-top:10px;">
                                                    <label for="">&nbsp;</label>
                                                    <div style="padding-top:5px; ">
                                                        <button class="btn btn-success btn-pill btn-icon btn-sm addNewRow"><i class="la la-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="newRowContainer" class="form-group row" style="padding:5px;">

                                            </div> --}}
                                            <div>
                                                <hr>
                                            </div>
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-3" style="padding-top:10px;">
                                                      
                                                </div>
                                                <div class="form-group  col-md-4 kt-font-danger" style="padding-top:10px;font-weight:400;">
                                                    Total
                                                </div>
                                                <div class="form-group  col-md-2" style="padding-top:10px;" >
                                                    <p id="crTotal">0.00</p>
                                                </div>
                                                <div class="form-group  col-md-2" style="padding-top:10px;">
                                                    <p id="drTotal">0.00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>	  
                            </div>
                            <div class="kt-portlet__foot footer_white">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-lg-6">
                                        </div>
                                        <div class="col-lg-6 kt-align-right">
                                            <button id="updateJournal" data-id="{{$journal->id}}" class="btn btn-pill btn-success"><i class="la la-upload"></i>Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>     
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#updateJournal').prop('disabled', true);
    $('#j_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        todayHighlight: true,
        locale: {
              format: 'MM/DD/YYYY'
        },
        templates: {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    });
    $('.accountHeadSelect').select2({
        width: '100%',
        ajax: {
            url: '/admin/journal/getaccountheads',
            dataType: 'json',
            processResults: function(data){
                return{
                    results: data
                }
            }
        }
    });

    $('#updateJournalForm').on('focusout', 'input[name="debit[]"]', function(e){
        var dr_total = 0;
        $('#updateJournalForm input[name="debit[]"]').each(function(k,v){
            var $amt=parseFloat($(this).val());
            if(!isNaN($amt))
                dr_total+=$amt;
        });
        $('#drTotal').html("");
        $('#drTotal').html(dr_total.toFixed(2));

        if($('#drTotal').html()==$('#crTotal').html())
        {
            $('#updateJournal').prop('disabled',false);
        }
        else {
            $('#updateJournal').prop('disabled',true);
        }
    });
    $('#updateJournalForm').on('focusout', 'input[name="credit[]"]', function(e){
        var dr_total = 0;
        $('#updateJournalForm input[name="credit[]"]').each(function(k,v){
            var $amt=parseFloat($(this).val());
            if(!isNaN($amt))
                dr_total+=$amt;
        });
        $('#crTotal').html("");
        $('#crTotal').html(dr_total.toFixed(2));

        if($('#crTotal').html()==$('#drTotal').html())
        {
            $('#updateJournal').prop('disabled',false);
        }
        else {
            $('#updateJournal').prop('disabled',true);
        }
    });


    clickEvent('#updateJournal')(saveJournal);
    function saveJournal(e){
        e.preventDefault();
        let id = $(this).attr('data-id')
        let journalform = $('#updateJournalForm');
        let data = $('#updateJournalForm').serializeArray();
        supportAjax({
            url:`/admin/journal/edit/${id}`,
            method: "POST",
            data: data,
        }, function(resp){
            $('#cModal').modal('hide');
            $('#journalTable').KTDatatable().reload();
            toastr.success('Journal Updated');
        }, function({status, responseJSON}){
            if (status === 422) 
            {
                journalform.find('input[name]').css('border-color', '#ddd');
                journalform.find('select[name]').css('border-color', '#ddd');
                $(`input[name]`).siblings(".errorMessage").empty();
                $(`select[name]`).siblings(".errorMessage").empty();
                if (!responseJSON.errors){
                    toastr.error(responseJSON.message);
                    return;
                }
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    journalform.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    journalform.find(`select[name = "${ key }"]`).css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`select[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`input[name="${key}"]`).siblings(".errorMessage").append(message);
                    $(`select[name="${key}"]`).siblings(".errorMessage").append(message);

                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        })
    }
    
</script>