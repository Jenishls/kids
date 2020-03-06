<style>
    .form-group{
        padding-bottom:5px !important;
    }
</style>
<div class="custom-dialog" role="document" style="margin-left:-15%;">
    <div class="modal-content" style="width:900px;">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Journal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
               
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important; padding-top:0px!important;color:#000;"> 
                    <form class="kt-form kt-form--label-right" id="addJournalForm" style="margin-top:15px;">   
                        @csrf
                        <div class="" id="kt_portlet_base_demo_1_1_tab_content"style="background:#e5f7ff !important;" >
                            <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important; padding-top:0px !important;">
                                <div class="row" style="margin-bottom:1rem;">
                                    <div class="form-group col-12">
                                        <div class="">
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-9" style="padding-top:10px;">
                                                    <label class="control-label" for="j_description">Description</label>
                                                    <textarea class="form-control" name="description" id="j_description" rows="1">
                                                      
                                                    </textarea>
                                                    <div class="errorMessage"></div>   
                                                </div>
                                                <div class="form-group  col-md-3" style="padding-top:10px;">
                                                    <label class="control-label" for="j_date">Date</label>
                                                    <input class="form-control" name="journal_date" id="j_date">
                                                    <div class="errorMessage"></div>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <hr>
                                            </div>
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-3" style="padding-top:10px;">
                                                    <label class="control-label" for="">Account</label>
                                                    <select class="form-control accountHeadSelect" name="account_head[]">
                                                        <option value="">Select</option>
                                                    </select>
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
                                                <div class="form-group  col-md-4" style="padding-top:10px;">
                                                    <label class="control-label" for="">Description</label>
                                                    <input class="form-control" name="jt_description[]" >
                                                    <div class="errorMessage"></div>
                                                </div>
                                            </div>
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-3" style="padding-top:10px;">
                                                     <select class="form-control accountHeadSelect" name="account_head[]">
                                                        <option value="">Select</option>
                                                    </select>
                                                    <div class="errorMessage"></div>
                                                </div>
                                                
                                                <div class="form-group  col-md-2" style="padding-top:10px;">
                                                    <input class="form-control" type="number" min="0" name="credit[]" >
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="form-group  col-md-2" style="padding-top:10px;">
                                                    <input class="form-control" type="number" min="0" name="debit[]" >
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="form-group  col-md-4" style="padding-top:10px;">
                                                    <input class="form-control" name="jt_description[]" >
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="form-group  col-md-1" style="padding-top:10px;">
                                                    <div style="padding-top:5px; ">
                                                        <button class="btn btn-success btn-pill btn-icon btn-sm addNewRow"><i class="la la-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="newRowContainer" class="form-group row" style="padding:5px;">

                                            </div>
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
                                            <button id="createJournal" class="btn btn-pill btn-success"><i class="la la-save"></i>Save</button>
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
    $('#createJournal').prop('disabled', true);
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


    var newrow = `
        <div class="appendedrow" style="width:100%;padding:0px!important;display:flex!important">
            <div class="form-group  col-md-3" style="padding-top:10px;">
                <select class="form-control accountHeadSelect" name="account_head[]">
                    <option value="">Select</option>
                </select>
                <div class="errorMessage"></div>
            </div>
            
            <div class="form-group  col-md-2" style="padding-top:10px;">
                <input class="form-control" type="number" min="0" name="credit[]" >
                <div class="errorMessage"></div>
            </div>
            <div class="form-group  col-md-2" style="padding-top:10px;">
                <input class="form-control" type="number" min="0" name="debit[]" >
                <div class="errorMessage"></div>
            </div>
            <div class="form-group  col-md-4" style="padding-top:10px;">
                <input class="form-control" name="jt_description[]" >
                <div class="errorMessage"></div>
            </div>
            <div class="form-group  col-md-1" style="padding-top:10px;">
                <div style="padding-top:5px; ">
                    <button class="btn btn-danger btn-pill btn-icon btn-sm removeRow"><i class="la la-remove"></i></button>
                </div>
            </div>
        </div>
    `;
    clickEvent('.addNewRow')(addNewRow);
    function addNewRow(e){
        e.preventDefault();
        $('#newRowContainer').append(newrow);
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
    };

    clickEvent('.removeRow')(removeRow);
    function removeRow(e){
        e.preventDefault();
        $(this).closest('.appendedrow').remove();
    };

    $('#addJournalForm').on('focusout', 'input[name="debit[]"]', function(e){
        var dr_total = 0;
        $('#addJournalForm input[name="debit[]"]').each(function(k,v){
            var $amt=parseFloat($(this).val());
            if(!isNaN($amt))
                dr_total+=$amt;
        });
        $('#drTotal').html("");
        $('#drTotal').html(dr_total.toFixed(2));

        if($('#drTotal').html()==$('#crTotal').html())
        {
            $('#createJournal').prop('disabled',false);
        }
        else {
            $('#createJournal').prop('disabled',true);
        }
    });
    $('#addJournalForm').on('focusout', 'input[name="credit[]"]', function(e){
        var dr_total = 0;
        $('#addJournalForm input[name="credit[]"]').each(function(k,v){
            var $amt=parseFloat($(this).val());
            if(!isNaN($amt))
                dr_total+=$amt;
        });
        $('#crTotal').html("");
        $('#crTotal').html(dr_total.toFixed(2));

        if($('#crTotal').html()==$('#drTotal').html())
        {
            $('#createJournal').prop('disabled',false);
        }
        else {
            $('#createJournal').prop('disabled',true);
        }
    });


    clickEvent('#createJournal')(saveJournal);
    function saveJournal(e){
        e.preventDefault();
        let journalform = $('#addJournalForm');
        let data = $('#addJournalForm').serializeArray();
        supportAjax({
            url:'/admin/journal/add',
            method: "POST",
            data: data,
        }, function(resp){
            $('#cModal').modal('hide');
            $('#journalTable').KTDatatable().reload();
            toastr.success('Journal Added');
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