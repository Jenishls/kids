<div class="template_container">
    <!--BreadCrumb Start-->
    <div class="kt-subheader kt-grid__item uc_subHeader " id="kt_subheader">
        <div class="kt-container validation_breadcumb">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title pageload" data-route="/cms">
                    Template
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">SETTINGS</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">Template Buider</a>
                </div>
            </div>
            <div>
                <button class="btn btn-pill btn-brand m-btn " data-target="#sy_global_modal" data-toggle="modal" id="addTemplate" title="Add Template ">
                    <span>
                        <i class="la la-plus"></i>
                        <span>
                            Template
                        </span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <!--BreadCrumb End-->
    <div class="row ui-sortable" style="padding-top:25px; width: 100%;">
        @foreach($templates as $template)
        {{-- {{dd($template)}} --}}
        <div class="col-lg-3 template_div" id="kt_sortable_portlets" sortable="true">

            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--mobile kt-portlet--sortable" style="padding-bottom: 18px;">
                <div class="kt-portlet__head ui-sortable-handle" style="padding-left: 12px; padding-right: 7px; min-height: 45px;">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title" style="text-transform:capitalize;">
                            {{$template->name}}
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-group">
                            {{-- <a href="#" class="btn btn-sm btn-icon btn-clean btn-icon-md"><i class="la la-angle-down"></i></a> --}}
                            <a class="btn btn-sm btn-icon btn-clean btn-icon-md edit_cms_temp" data-id="{{$template->id}}" title="Edit">
                                <i class="la la-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-icon btn-clean btn-icon-md delete_cms_temp" data-id="{{$template->id}}" title="Delete">
                                <i class="la la-close"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body" style="padding:0; height: 284px;">
                    {{-- <img src=" {{asset('media/demos/preview/demo7.jpg')}}" alt="support" style="min-height: 284px;"> --}}
                    {{--<!-- @if($template->preview)
                            <img class="editableImage" src="data:image;base64,{{base64_encode(file_get_contents(storage_path('CMS/preview'.'/'.$template->previewImage())))}}" style="min-height: 284px; display:block;" id="tempView_output">
                    @else -->--}}
                    {{--<img class="media_obj" src="media/blog/No_Image_Available.jpg" id="tempView_output" style="min-height: 284px;">--}}
                    {{--@endif--}}
                    {{-- <input class="form-control" type="file" name="file" id="editImageInput" onchange="document.getElementById('tempView_output').src = window.URL.createObjectURL(this.files[0])"> --}}
                    <div class="img_overlay">
                        <a class="btn btn-pill btn-brand btn-elevate view_template" data-route="/admin/cms/{{$template->id}}">View</a>
                    </div>
                </div>
            </div>

        </div>
        @endforeach

    </div>
</div>


<script>
    $(document)
        .off("click", "#addTemplate")
        .on("click", "#addTemplate", function(e) {
            e.preventDefault();
            showModal({
                url: "/admin/cms/addmodal/template"
            });
        });

    $(document)
        .off("click", ".edit_cms_temp")
        .on("click", ".edit_cms_temp", function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            showModal({
                url: "/admin/cms/editmodal/template/" + id
            });
        });

    $(document)
        .off("click", ".view_template")
        .on("click", ".view_template", function(e) {
            e.preventDefault();
            supportAjax({
                url: $(this).attr('data-route'),
            }, function(resp) {
                $('#kt_body').empty().append(resp);
            }, function(err) {
                console.log(err);
            });
        });

    $(document).off('click', '.delete_cms_temp').on('click', '.delete_cms_temp', function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        delConfirm({
            url: '/admin/cms/delete/template/' + id,
            appendView: '#kt_body',
        });
    });
    "use strict";

    var KTPortletDraggable = function() {

        return {
            //main function to initiate the module
            init: function() {
                $("#kt_sortable_portlets").sortable({
                    connectWith: ".kt-portlet__head",
                    items: ".kt-portlet",
                    opacity: 0.8,
                    handle: '.kt-portlet__head',
                    coneHelperSize: true,
                    placeholder: 'kt-portlet--sortable-placeholder',
                    forcePlaceholderSize: true,
                    tolerance: "pointer",
                    helper: "clone",
                    tolerance: "pointer",
                    forcePlaceholderSize: !0,
                    helper: "clone",
                    cancel: ".kt-portlet--sortable-empty", // cancel dragging if portlet is in fullscreen mode
                    revert: 250, // animation in milliseconds
                    update: function(b, c) {
                        if (c.item.prev().hasClass("kt-portlet--sortable-empty")) {
                            c.item.prev().before(c.item);
                        }
                    }
                });
            }
        };
    }();

    jQuery(document).ready(function() {
        KTPortletDraggable.init();
    });
</script>