<style>
    #noteCreate .select2-selection.select2-selection--single, #LookupCreate .select2-selection.select2-selection--single, #lookupUpdate .select2-selection.select2-selection--single, #siteCreate .select2-selection.select2-selection--single, #siteUpdate .select2-selection.select2-selection--single, #organizationCreate .select2-selection.select2-selection--single, #organizationUpdate .select2-selection.select2-selection--single, #newCounty .select2-selection.select2-selection--single, #newStateCreate .select2-selection.select2-selection--single, #newRegionCreate .select2-selection.select2-selection--single, #newDistrictCreate .select2-selection.select2-selection--single, #newCityCreate .select2-selection.select2-selection--single {
        height: 30px !important;
    }

    .m-checkbox-list .m-checkbox, .m-checkbox-list .m-radio, .m-radio-list .m-checkbox, .m-radio-list .m-radio {
        display: inline !important;
    }

    .floatLabelForm .m-radio-list input {
        height: 20px !important;
    }

    /* .removeRowFile {
        display: none !important;
    } */
    .files-section {
        position: relative;
    }
    .files-section .badge.badge-danger.badge-pill {
        left:-6px;top:-3px;position:absolute;
    }

    #NoteCreate table tr td:first-child {
        width: 25%;
    }
</style>
<div class="modal-dialog note_create_modal_dialog" role="document" id="addNoteModal" style="diaplay:block;">
   <div class="modal-content note_create_modal_content" >

        <!-- Modal Header -->
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                <span id="modal_dynamic_title">Add Note</span>
            </h5>
            <button type="button" class="close change_member_close_modal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    ×
                </span>
            </button>
        </div>
        <div class="modal-body has-divider note_create_body" style="padding-top: 25px !important;">
            <form id="noteCreate" enctype="multipart/form-data" class="m-form m-form--label-align-right">
                @csrf
                <div class="row no-padding">
                    <div class="col-md-4 no-padding" style="border-right: 1px solid #e4e4e4;height:100%;">
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi no-margin no-padding" style="height: 100%; background: #eee;">
                            <div class="m-portlet__body no-pd-i" style="padding-bottom: 10px !important;">
                                <div class="form-group m-form__group row" style="">
                                    <div class="i_f" >
                                        <h5 class="m-widget24__title no-margin" style="margin-bottom:-30px;">
                                                Member
                                        </h5>
                                        <button type="button" class="float-right change_mem_btn">
                                            <span>
                                                <span>Change</span>
                                            </span>
                                        </button>
                                    </div>
                                    
                                    <div class="col-lg-12 pt-10">
                                        <div class="m-widget24">
                                                
                                            <div class="m-widget24__item">
                                                
                                                <div class="col-md-12 no-padding mt-10" style="padding-bottom: 15px !important; border-bottom: 1px solid #ccc;margin-left:-10px;margin-bottom:5px!important;">
                                                <table style="width: 100%;" class="add_note_member_table">
                                                    <tbody>
                                                    <tr>
                                                        <td><h6>Name</h6></td>
                                                        <td>
                                                            <h6> <span class="m-widget24__desc" id="note_site_name"> Please select Member</span>
                                                                <input type="hidden" name="user_id" id="site_id">
                                                            </h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><h6>Address</h6></td>
                                                        <td>
                                                            <h6>
                                                                <span class="m-widget24__desc" id="note_user_addr">  Please select Member</span>
                                                            </h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><h6>Email</h6></td>
                                                        <td>
                                                            <h6>
                                                                <span class="m-widget24__desc" id="note_user_email"> Please select Member</span>
                                                            </h6>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- section div --}}
                                    <div class="i_f" style="padding-top: 20px;">
                                        <h5 class="m-widget24__title no-margin" style="">
                                            Section
                                        </h5>
                                        <button type="button" class="float-right change_section_btn">
                                            <span>
                                                <span>Change</span>
                                            </span>
                                        </button>
                                    </div>

                                    <div class="col-lg-12 pt-10 pt_17">
                                        <div class="m-widget24">
                                            <div class="m-widget24__item">
                                                <div class="col-md-12 no-padding mt-10" style="padding-bottom: 15px !important; border-bottom: 1px solid #ccc;margin-left:-10px;margin-bottom:5px!important;">
                                                    <table style="width: 100%;" class="add_note_section_table">
                                                        <tbody>
                                                        <tr>
                                                            <td><h6>Menu</h6></td>
                                                            <td>
                                                                <h6> <span class="m-widget24__desc" id="note_menu_name"> Please select Section</span>
                                                                    <input type="hidden" name="menu_id" id="menu_id">
                                                                </h6>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><h6>Location</h6></td>
                                                            <td>
                                                                <h6>
                                                                    <span class="m-widget24__desc" id="note_menu_addr">  Please select Section</span>
                                                                </h6>
                                                            </td>
                                                        </tr>
                                                        {{-- <tr>
                                                            <td><h6>--</h6></td>
                                                            <td>
                                                                <h6>
                                                                    <span class="m-widget24__desc" id="note_menu_email"> Please select Section</span>
                                                                </h6>
                                                            </td>
                                                        </tr> --}}
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="is_active" value="0">
                                    <input type="hidden" name="is_completed" value="0">
                                    <input type="hidden" name="is_seen" value="0">
                                    <div class="col-lg-12 pt-10 pt_17" id="noteFiles">
                                        <div class="m-widget24">
                                            <div class="m-widget24__item pt-10">
                                                <h5 class="m-widget24__title no-margin">
                                                    Files
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="file_row_container" id="file_row_container">
                                            <div class="files-section d-flex m-t-5" data-id="1">
                                                <input type="text" class="form-control custom_file_label" value="" placeholder="File Title" for="file-input" data-id="1">
                                                <div class="d-flex m-l-5" style="padding-left:10px;">
                                                    <input id="file-input" type="file"  name="file" style="display:none;" class="uploadFile" data-id="1"/>
                                                    <label class="m-btn--icon m-btn--icon-only m-btn--pill uploadNoteFile" for="file-input" data-id="1">
                                                        <i class="la la-upload"></i>
                                                    </label>
                                                    <a class=" m-btn--icon m-btn--icon-only m-btn--pill addNoteFileRow">
                                                        <i class="la la-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 no-padding">
                        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi no-margin" style="background: #eee; height: 100%;">
                            <div class="m-portlet__body no-pd-i" style="padding-bottom: 10px !important;">
                                <div class="form-group m-form__group row no-pd-right no-pd-left m-t-10">
                                    <div class="col-lg-8 col-sm-12 mb-lg-0 mb-3">
                                        <label class="ml-3 lbl" for="note_title">Title</label>
                                        <input type="text" class="form-control form-control-sm m-input ucfirst ml-3" name="title" id="note_title" autocomplete="off" style="width:97%;">
                                        <div class="errorMessage" style="margin-left: 9px;"></div>

                                    </div>
                                    <div class="col-lg-2 col-sm-6 mb-lg-0 mb-3 sp_adjust">
                                        <label class="lbl" for="status_select">Status</label>
                                        <select class="form-control add_note_select" title="Choose" name="status" tabindex="-98" id='status_select'>
                                            <option value="Done">Done</option>
                                            <option value="Not Done">Not Done</option>
                                        </select>
                                        <div class="errorMessage"></div>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 mb-lg-0 mb-3 sp_adjust">
                                        <label class="lbl" for="priority_select">Priority</label>
                                        <select class="form-control add_note_select" title="Choose" name="priority" tabindex="-98" id='priority_select' style="width:94%;">
                                            <option value="High">High</option>
                                            <option value="Standard">Standard</option>
                                        </select>
                                        <div class="errorMessage"></div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12 mt-20 pt_lbl">
                                        <label class="ml-3 lbl" for="start_end_date">Start &amp; End Date</label>
                                        <input type="text" class="form-control form-control-sm m-input ml-3" name="start_date" id="start_end_date" autocomplete="off" title="Start and End Date">
                                    </div>
                                     <div class="col-lg-2 col-sm-12 mt-20 pt_lbl">
                                        <label class="ml-3 lbl" for="reminder_date">Reminder Date</label>
                                        <input type="text" class="form-control form-control-sm m-input ml-2" name="reminder_date" id="reminder_date" autocomplete="off">
                                        <div class="errorMessage"></div>

                                    </div>
                                    <div class="col-lg-2 col-sm-6  mt-20 pt_lbl">
                                        <label for="note_todo " title="To Do Date" class="lbl">
                                            To Do Date
                                        </label>
                                        <input type="text" class="form-control form-control-sm m-input note-datepicker" name="todo_date" id="note_todo" autocomplete="off" title="To Do Date">
                                        <div class="errorMessage"></div>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 mb-lg-0 mb-3 sp_adjust pt_lbl">
                                        <label class="lbl" for="type_select">Type</label>

                                        {{-- <select title="Select" class="todo_date_select"  name="" id="">
                                            <option value="1">Created</option>
                                            <option value="1">Todo</option>
                                            <option value="2">Task</option>
                                            <option value="2">Reminder</option>
                                        </select> --}}
                                        <select class="form-control add_note_select" title="Choose" name="type" id='type_select'>
                                            <option value="todo">Todo</option>
                                            <option value="task">Task</option>
                                            <option value="reminder">Reminder</option>
                                        </select>
                                        <div class="errorMessage"></div>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 mb-lg-0 mb-3 pt_lbl">
                                            <label for="note_code"  class="lbl">
                                                Note Code
                                            </label>
                                            <input type="text" class="form-control form-control-sm m-input" id="note_code" name="note_code" autocomplete="off" data-advanced="" data-lookup="/lookup/getData/note_code" style="width:94%;" title="Note Code">
                                    </div>
                                    <div class="col-sm-12 mt-20 pt_lbl">
                                        <label class="ml-3 lbl" for="summernote">Description</label>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                        <textarea name="description" id="summernote" style="display: none;"></textarea>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Modal Footer -->
        <div class="modal-footer d-ib">
            <button type="button" class="btn btn-secondary m-btn--pill float-left change_member_close_modal" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-success m-btn--icon m-btn--pill float-right" id="submitNote" data-target="NoteCreate">
                <span>
                    <span>Save</span>
                </span>
            </button>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
  $('#summernote').summernote({
      height:200,
      toolbar: [
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['font', ['bold', 'underline', 'italic']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview']],
        ],
        dialogsInBody: true,
        dialogsFade: true,  
  });
  $('.note-editing-area').css('z-index', '-1');
});

    // selectpicker
    $('.add_note_select').selectpicker({
        showTick: true,
        doneButton: true,
        doneButtonText: "Apply"

    });
var arrows;
    if (KTUtil.isRTL()) {
        arrows = {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>'
        }
    } else {
        arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    }
    $('#reminder_date, #note_todo').datepicker({
        format:'yyyy-mm-dd',
        rtl: KTUtil.isRTL(),
        todayHighlight: true,
        orientation: "bottom left",
        templates: arrows
    }).on('hide', function(event) {
        event.preventDefault();
        event.stopPropagation();
    });
    $(document).ready(function(){
        // $('#reminder_date', '#note_todo').datepicker().init();
         $('#reminder_date', '#note_todo').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'),10)
              }, function(start, end, label) {
                var years = moment().diff(start, 'years');
                alert("You are " + years + " years old!");
              });

});
$(document).ready(function(){
    $('.sp_adjust .dropdown').css('height', '32px').css('width', '94%');
    $('.sp_adjust .dropdown-toggle').css('height', '32px');
     $('#start_end_date').daterangepicker({
            buttonClasses: ' btn',
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',

            locale: {
                format: 'YYYY-MM-DD',
                separator: '/',
            }
        }, function(start, end, label) {
            $('#start_end_date').val( start.format('YYYY-MM-DD') + ' / ' + end.format('YYYY-MM-DD'));
    });
});


$(document).off('click', '#submitNote').on('click', '#submitNote', function(e){
    e.preventDefault();
    var notecreate = $('#noteCreate');
    // let data = $('#noteCreate').serializeArray();
    $.ajax({
        url: 'note/addNew',
        method: 'POST',
        data: new FormData(document.getElementById('noteCreate')),
        contentType: false,
        processData: false,
        success: function(response){
            $('#cModal').modal('hide');
            toastr.success('Successfully added.');
            $('#t_notestable').KTDatatable().reload();
        }, 
        error:function({status, responseJSON})
        {
            if(status===422){
                notecreate.find('input[name], select[name]').css('border-color', '#ddd');
                $(`input[name]`).siblings(".errorMessage").empty();
                $(`select[name]`).siblings(".errorMessage").empty();

                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    notecreate.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    notecreate.find(`select[name = "${ key }"]`).siblings('button').css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty().append(message);

                    $(`select[name="${key}"]`).siblings(".errorMessage").empty().append(message);
                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        }
    });
});

// upload file value

$(document).on("change", ".uploadFile", function() {
    // console.log($(this).attr('data-id'));
    let fileName = $(this).val().split("\\").pop();
    $(this).parent().siblings().addClass("selected").val(fileName);
});


// form validation

</script>
@include('support.pages.note.modal.change_member_modal')
@include('support.pages.note.modal.change_section_modal')


{{-- document.getElementById('output').src = window.URL.createObjectURL(this.files[0]) --}}
