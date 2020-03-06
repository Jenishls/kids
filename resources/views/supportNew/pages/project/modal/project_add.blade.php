<style>
    .form-group{
        padding-bottom:5px !important;
    }
    label{
        font-weight: bold !important;
    }
    .portlet_label{
        position: absolute;
        font-weight: 500;
        display: table;
        z-index: 1;
        font-size: 15px;
        padding: 7px 26px;
        letter-spacing: 1px;
        border: 1px solid #f1f2f6;
        border-radius: 19px;
        background: #41bcf6;
        color: white!important;
        font-size: 13px!important;
    }
   /* .portlet_label:hover{
        color: #e5f7ff!important;
    }*/
    .form-group label {
        font-size: 0.9rem!important;
        font-weight: 500!important;
    }
    .nav-link.modal_tab_headers{
        text-align:center!important;
    }
    .tableParentTitle{
        padding: 10px;
        background: #49bdf4!important;
        color: #ffffff!important;
        font-weight: 500;
        border: 1px solid #ebedf2;
        margin-bottom: 10px!important;
    }
    .custom_wizard_table{
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        background-color: #e5f7ff26;
        border: 1px solid #e1e1ef;
    }
    .img_placeholder{
      height: 100px;
    }
    .img_placeholder img{
      max-width: 100%;
      height: 100%;
      object-fit: contain;
    }
    .modal-900 {
      width: 900px!important;
    }
    .formWrapper{
        padding: 10px 19px 10px 19px;
        margin-bottom: 10px;
        border-radius: 4px;
        background: #fefefe;
    }
</style>
<div class="modal-dialog custom_dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" style="margin-left:2.5rem;" id="cWizardTitle">New Project</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:cornsilk;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;" id="projectAddWizard">
            <div class="kt-portlet kt---tabs" style="margin-bottom:0px !important;">
                <div class="kt-portlet__head" style="padding:0px !important;">
                    <div class="kt-portlet__head-toolbar" style="width:100%;padding: 0 25px;">
                        <ul class="nav  nav-tabs-line" role="tablist"  style="width: 100%;display:flex;">
                            <li class="wizard-tabs active" data-validateurl="/admin/project/validate/project_info" data-target="#projectInfoSection" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab" href="javascript:" role="tab" aria-selected="false">
                                    <i class="la la-user mr-1"></i>Project
                                </a>
                            </li>
                            <li class="wizard-tabs col-sm-12" data-validateurl="/admin/project/valid" data-target="#projectMemberSection" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab"  href="javascript:" role="tab" aria-selected="false">
                                    <i class="flaticon-map mr-1"></i> Assign Members
                                </a>
                            </li>
                            <li class="wizard-tabs col-sm-12" data-validateurl="/admin/project/valid"  data-target="#projectAttachmentSection" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab"  href="javascript:" role="tab" aria-selected="true">
                                    <i class="flaticon2-group mr-1"></i> Attachments
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="projectAddForm">   
                        @csrf
                        <div class="tab-content">
                            <div class="wizard-panel active" id="projectInfoSection" role="tabpanel" style="background:#e5f7ff !important;">
                                <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important;">
                                    @include('supportNew.pages.project.modal.include_add.project_info')
                                </div>
                            </div>
                            <div class="wizard-panel" id="projectMemberSection" style="background:#e5f7ff !important;">
                                <div class="kt-portlet__body" style="padding: 20px 25px 0!important;">
                                    @include('supportNew.pages.project.modal.include_add.project_members')
                                </div>
                            </div>
                            <div class="wizard-panel" id="projectAttachmentSection" style="background:#e5f7ff !important;">
                                    @include('supportNew.pages.project.modal.include_add.project_attachments')
                            </div>
                        </div>
                        <div class="kt-portlet__foot footer_white">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-md-6  wizard--btn" data-wizard-step="prev">
                                        <button type="reset" class="btn btn-secondary btn-sm btn-pill" ><i class="la la-arrow-left"></i>Back</button>
                                    </div>
                                    <div class="col-md-6 kt-align-right wizard--btn ml-auto" data-wizard-step="next">
                                        <button type="" class="btn btn-sm btn-pill btn-success " >Continue <i class="la la-arrow-right"></i></button>
                                    </div>
                                    <div class="col-md-6 wizard--btn kt-align-right ml-auto" data-wizard-step="save">
                                        <button type="button" class="btn btn-sm btn-pill btn-success" id="btnProjectCreate">Save <i class="la la-save"></i></button>
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

    $(".priority, .status").select2({
        width:"100%",
        placeholder:"Select"
    });
    $('.estimated_hours').timepicker({
        minuteStep:5,
        showInputs:true,
        disableFocus:true,
        showMeridian:false,
        template:false,
        defaultTime:'',
        use24hours:false
    });
    var estd_date= $('.datepick').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            autoUpdateInput: false,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'),10)
          }, function(start, end, label) {
                this.element.val( start.format('MM/DD/YYYY'));
          });
    
        $(document).find('.project').select2({
            placeholder: 'Select Project',
            width: '100%',
            ajax: {
                method: 'POST',
                url: '/admin/project/fetch',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processResults: function(data) {
                    let res = [];
                    $.each(data, function(i, obj) {
                        res.push({
                            id: obj.id,
                            text: obj.name
                        });
                    });
                    return {
                        results: res
                    };
                }
            }
        });
        $(document).find('.project_manager').select2({
            placeholder: 'Select',
            width: '100%',
            ajax: {
                method: 'POST',
                url: '/admin/fetch/user',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processResults: function(data) {
                    let res = [];
                    $.each(data, function(i, obj) {
                        res.push({
                            id: obj.id,
                            text: obj.name
                        });
                    });
                    return {
                        results: res
                    };
                }
            }
        });
        $(document).find('.company_id').select2({
            placeholder: 'Select Project',
            width: '100%',
            ajax: {
                method: 'POST',
                url: '/admin/account/select2/data',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processResults: function(data) {
                    let res = [];
                    $.each(data, function(i, obj) {
                        res.push({
                            id: obj.id,
                            text: obj.c_name
                        });
                    });
                    return {
                        results: res
                    };
                }
            }
        });
        initializeSelect2("project_type")
        initializeSelect2("task_status")
    
        function initializeSelect2(className){
        
            $(document).find("."+className).select2({
                placeholder: 'Select',
                width: '100%',
                ajax: {
                    method: 'get',
                    url: '/fetch/lookup/'+className,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    processResults: function(data) {
                        let res = [];
                        $.each(data, function(i, obj) {
                            res.push({
                                id: obj.id,
                                text: obj.name
                            });
                        });
                        return {
                            results: res
                        };
                    }
                }
            });
        }


        $('[name="estd_date"]').daterangepicker({
        singleDatePicker: true,
        autoUpdateInput: false,
        showDropdowns: true,
        minYear: 2001,
        maxYear: parseInt(moment().format('YYYY'),10)
    }, function(start_date, end_date) {
        this.element.val(start_date.format('YYYY-MM-DD'));
    });

    // $('.industrySelect2').select2({
    //     width: '100%',
    //     placeholder: "Select an industry",
    //     tags: true,
    //     ajax: {
    //         method: 'POST',
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url: function (params) {
    //             return '/admin/account/industries'
    //         },
    //         processResults: function (data) {
    //             let res = [];
    //             $.each(data, function(i , obj){
    //                 res.push({
    //                     id: obj.industry,
    //                     text : obj.industry,
    //                     data : obj
    //                 });
    //             });
    //             return {
    //                 results: res
    //             };
    //         }
    //     }
    // })

    var wizardProjectAdd = $('#projectAddWizard').WizardForm();

        wizardProjectAdd.on('nextBtn', function(wizard){
        wizard.sendAjax(wizard.currentStep().data("validateurl"));

    });

    // projectAddWizard.on("formChange",function(wizard){
    //     if(wizard.currentStep().data("target") == "#assignMemberSection"){
    //         getSelectedMembers(wizard.currentStep().data("target"));
    //     }
    // });


    // var projectAddWizard = $('#projectAddWizard').WizardForm();
    // projectAddWizard.on('nextBtn', function(wizard){
    //     wizard.sendAjax(wizard.currentStep().data("validateurl"));
    // });

    // projectAddWizard.on("formChange",function(wizard){
    //     if(wizard.currentStep().data("target") == "#assignMemberSection"){
    //         getSelectedMembers(wizard.currentStep().data("target"));
    //     }
    // });
    // function getSelectedMembers(memberSection){
    //     console.log(memberSection);
    // }
        $(document).off('change', '.grab_item input').on('change', '.grab_item input', function(e) {
            if($(this).parent().hasClass('kt-checkbox--all')){
                $('.grab_item input').attr('name', 'members[]');
                $('#grab_items_btn').show();
                $(this).attr("name","");
            }
            else{
                $(this).attr('name', 'members[]');
                $('#grab_items_btn').show();
            }
        });



    // $('#btnCreateTask').off('click').on('click', function(e){
    // e.preventDefault();

    //     let data = $("form#projectCreateForm").serializeArray()
    //     supportAjax({
    //         url:'/admin/tasks/store',
    //         method:'Post',
    //         data
    //     }, function(resp){
    //         $('#cModal1').modal('hide');
    //         $(document).find('#tasksDatatable').KTDatatable().reload();
    //         toastr.success(resp.message);
    //     },
    //     function(err){
    //         console.log(err);
    //     });
    // })
    </script>