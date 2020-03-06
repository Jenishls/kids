<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <div class="kt-subheader kt-grid__item userControlSubHeader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main lookUpSubheader">
                <div class="subHeaderLeft">
                    <h3 class="kt-subheader__title">
                        Lookup
                    </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link">TABLES</a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link">Lookup</a>
                    </div>
                </div>
                <div class="kt-subheader__wrapper">
                    <a class="btn btn-success btn-pill btn-elevate btn-icon-sm add_new_lookup_fields" data-id="{{$sections[0]->id}}" id="addNewLookup"><i class="la la-plus"></i>
                        Lookup
                    </a>
                </div>
                
            </div>

            <div class="row pt-4">
                <div class=" col-md-3 ">
                    <div class="kt-section sideNavContent">
                        {{-- <div class="kt-subheader__wrapper">
                            <a href="#" class="btn btn-brand btn-elevate btn-icon-sm" id="addLookupSection"><i class="la la-plus"></i>
                                Section
                            </a>
                        </div>
                        <div class="bs-searchbox sideNavSearch">
                            <input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search" id="searchLookupSections">
                        </div> --}}
                        <div class="add_validation_section_div" style="margin-top:15px!important;">
                            <div class="bs-searchbox " style="padding:0; width: 82%;">
                                <input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search" id="searchLookupSections" placeholder="Search Section" style="height: 34px;">
                            </div>
                            <div class="kt-subheader__wrapper" title="Add Section">
                                <a class="btn btn-brand btn-elevate btn-icon-sm" id="addLookupSection" style="color: white; height: 32px;margin-top:1px;"><i class="la la-plus " style="margin-left:5px;"></i>
                                    
                                </a>
                            </div>
                        </div>

                        <div class="kt-section__content kt-section__content--border kt-section__content--fit sideSectionContent sideValidNav" style="margin-top:20px!important;">
                            <ul class="kt-nav kt-nav--bold kt-nav--md-space kt-nav--v3" role="tablist" id="lookupSectionsContainer">
                                @foreach($sections as $key => $section)
                                {{-- <li class="kt-nav__item lookup_sections_element @if($key == 0)lookup_active @endif" data-id = "{{$section->id}}">
                                    <a class="kt-nav__link load_lookup" data-toggle="tab" data-route="/lookupTable/{{$section->id}}" role="tab">
                                        <span class="kt-nav__link-text">{{ucfirst($section->section)}}</span>
                                    </a>
                                    <p class="font-12" style="margin:0px;margin-left:4px;padding-bottom:1rem;"><span class="kt-nav__link-text">{{ucfirst($section->description)}}</span></p>
                                </li>
                                <hr style="margin:0px;"> --}}

                                <li class="kt-nav__item  validation_sections_element "  role="tab" @if($key === 0) style="background: rgba(93, 88, 209, 0.16);"@endif>
                                    <a class="kt-nav__link load_lookup @if($key === 0)lookup_active @endif" data-id="{{$section->id}}" data-toggle="tab" data-route="/admin/lookupTable/{{$section->id}}"  style="padding-top:0; padding-left:0; width: 285px;" >
                                        <span class="kt-nav__link-text">{{ucfirst($section->section)}}</span>
                                    </a>
                                    <div class="section_edit_delete">
                                        <i class="la la-edit validation_section_li_edit " data-route="/admin/lookup/editSectionModal/{{$section->id}}" data-toggle="modal" data-target="#sy_global_modal"style="font-size: 16px; padding: 0px 9px; @if($key === 0) display:block;@endif"></i>
                                        <i class="la la-trash validation_section_li_delete delLookupSection" data-route="/admin/lookup/deleteSection/{{$section->id}}" style="font-size: 16px;@if($key === 0) display:block;@endif"></i>
                                    </div>
                                </li>
                                @endforeach
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <diV class="col-md-9" id="lookupTableContainer">
                    <div id="t_lookUpTable" class="lookUpTableContent">
                        <div class="row tableHead">
                            <div class="input-group mb-3 input-group-sm col-xl-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-code">Code</span>
                                </div>
                                <input type="text" class="form-control searchLookup" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-code" placeholder="search.." id="code_search" autocomplete="off">
                            </div>
                            <div class="input-group mb-3 input-group-sm col-xl-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-value">Value</span>
                                </div>
                                <input type="text" class="form-control searchLookup" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-value" placeholder="search.." id="value_search" autocomplete="off">
                            </div>
                            <div class="input-group mb-3 input-group-sm col-xl-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-desc">Description</span>
                                </div>
                                <input type="text" class="form-control searchLookup" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-desc" placeholder="search.." id="desc_search" autocomplete="off">
                            </div>
                            
                        </div>
                    </div>
                    <div  id = "t_lookuptable_{{$sections[0]->id}}" data-id="{{$sections[0]->id}}" class="tableloader">
                       
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(e){
        var table = $('.tableloader').attr('id');
        var id = $('.tableloader').attr('data-id');
        var lookUpTable= $(`#${table}`).KTDatatable({
        // datasource definition
            data: {
                type: 'remote',
                source: {
                read: {
                    url: '/admin/lookUp/list/'+id,
                    method: 'get',
                    params: {
                        "_token": "{{ csrf_token() }}"
                    },
                    /*map: function(raw) {
                        // sample data mapping
                        console.log(raw);
                        var dataSet = raw;
                        if (typeof raw.data !== 'undefined') {
                            dataSet = raw.data;
                        }
                        console.log(dataSet);
                        return dataSet;
                    },*/
                },
            },
                pageSize:50,
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true,
                //saveState: true 
            },

            // layout definition
            layout: {
                scroll: true,
                footer: false,
                
            },
            
            detail: {
                title: "sub child data table",
                content:  subTableInit
               
            },

            // column sorting
            sortable: true,

            pagination:true,

            
            // columns definition
            columns: [
                {
                    field: 'id',
                    title: '#',
                    width: 12,
                    template: function(row, index, datatable){
                        return '<div>#</div>';
                    },
                    autohide: true,
                },
                {
                    field: 'code',
                    title: 'Code',
                    type: 'text',
                    width: 500,
                    
                    
                },
                {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
                textAlign: 'center',
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return     '<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load add_lookup_group" data-id="'+row.id+'" data-route="/admin/lookup/addGroup/'+row.code+'" data-toggle="modal" data-target="#sy_global_modal"  title="Add lookup group">\
                                    <i class="la la-plus"></i>\
                                </a>\
                                <a href="#" class="btn btn-hover-danger btn-icon btn-pill delLookupGroupButton" data-id="'+row.code+'" title="Delete">\
                                    <i class="la la-trash"></i>\
                                </a>\
                                <a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load view_audit_detail" data-id="'+row.id+'" data-route="/audit/details/'+row.id+'" data-toggle="modal" data-target="#sy_global_modal"  title="View audit details">\
                                    <i class="la la-eye"></i>\
                                </a>';
                },
                
                
                }],
        });
    });
    

    $(document).on('keyup','#code_search', function(e){
        var table = $('.tableloader').attr('id');
        if($(this).val().length >= 3){
            $(`#${table}`).KTDatatable().search($(this).val(), 'code');	
        
        }
        if($(this).val() == ''){
            $(`#${table}`).KTDatatable().search($(this).val(), 'code');
            
        }
    });	

    $(document).on('keyup', '#value_search',function(e){
        var table = $('.tableloader').attr('id');
        if($(this).val().length >= 3){
            $(`#${table}`).KTDatatable().search($(this).val(), 'value');	
        
        }
        if($(this).val() == ''){
            $(`#${table}`).KTDatatable().search($(this).val(), 'value');
            
        }
    });	

    $(document).on('keyup','#desc_search', function(e){
        var table = $('.tableloader').attr('id');
        if($(this).val().length >= 3){
            $(`#${table}`).KTDatatable().search($(this).val(), 'description');	
        
        }
        if($(this).val() == ''){
            $(`#${table}`).KTDatatable().search($(this).val(), 'description');
            
        }
    });

function subTableInit(e){
    var id = $('.tableloader').attr('data-id');
    let group = $('.kt-datatable__row--subtable-expanded td span').html();
    $('<div/>').attr('class', 'child_data_ajax_' + e.detail).appendTo(e.detailCell).KTDatatable({ 
       
        // datasource definition
            data: {
                type: 'remote',
                source: {
                read: {
                    url: '/admin/lookUp/child/'+group+'/'+id,
                    method: 'get',
                    params: {
                        "_token": "{{ csrf_token() }}"
                    },
                    /*map: function(raw) {
                        // sample data mapping
                        console.log(raw);
                        var dataSet = raw;
                        if (typeof raw.data !== 'undefined') {
                            dataSet = raw.data;
                        }
                        console.log(dataSet);
                        return dataSet;
                    },*/
                },
            },
                pageSize:50,
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true,
                //saveState: true 
            },

            // layout definition
            layout: {
                scroll: true,
                footer: false,
            },
            
            // column sorting
            sortable: true,

            pagination:true,

            
            // columns definition
            columns: [
                {
                    sortable:false,
                    field: '#',
                    title: '#',
                    width: 12,
                    template: function(row, index, datatable){
                    return '#';
                    }
                },
                
                {
                field: 'value',
                title: 'value',
                
                },
                {
                field: 'description',
                title: 'Description',
                
                },    
                {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
                textAlign: 'center',
                template: function(row, index, datatable) {
                    var new_data = JSON.stringify(row);
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return     '<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load edit_lookup" data-id="'+row.id+'" data-route="/admin/lookup/edit/'+row.id+'" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
                                    <i class="la la-edit"></i>\
                                </a>\
                                <a href="#" class="btn btn-hover-danger btn-icon btn-pill delLookupButton" data-id="'+row.id+'" title="Delete">\
                                    <i class="la la-trash"></i>\
                                </a>\
                                <a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load view_audit_detail" data-id="'+row.id+'" data-route="/audit/details" data-table="lookups" data-new="'+new_data+'" data-toggle="modal" data-target="#sy_global_modal"  title="View audit details">\
                                    <i class="la la-eye"></i>\
                                </a>';
                },
                }]
     });
}


$(document).off('click', '.delLookupButton').on('click', '.delLookupButton', function(e){
        e.preventDefault();
        let lookup_id= $(this).data('id');
        let table = $('.tableloader').attr('id');
        delConfirm({
            url:"/admin/lookup/deleteLookup/"+lookup_id,
            header: $(`#${table}`),
        });
    }).off('click', '.delLookupSection').on('click', '.delLookupSection', function(e){
        e.preventDefault();
        let url = $(this).attr('data-route');
        delConfirm({
            url: url,
            appendView: '#kt_body',
        });
    });
</script>