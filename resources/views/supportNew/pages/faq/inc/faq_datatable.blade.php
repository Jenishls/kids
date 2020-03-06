<style>
    .faqTableContent {
        padding: 20px 21px 11px 14px !important;
        border-bottom: 1px solid #ebedf2;
    }

    #t_faq_datatable>table {
        padding: 25px !important;
        border-radius: 4px;
        border: none;
    }

    .faqTableHead {
        display: flex;
        justify-content: space-between;
    }
</style>
<div id="t_faq_datatable" style="background: white;" class="faqTableLoader">
    <div class="faqTableContent">
        <div class="row faqTableHead">
            <div class="input-group mb-3 input-group-sm col-xl-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-code">Questions</span>
                </div>
                <input type="text" class="form-control searchFaq" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Search.." id="faq_questions_search" autocomplete="off">
            </div>
            <div class="rp_btn">
                <div class="dropdown dropdown-inline exportBtn">
                    <button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-download"></i></button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="kt-nav">
                            <li class="kt-nav__section kt-nav__section--first">
                                <span class="kt-nav__section-text">Choose an option</span>
                            </li>
                            <li class="kt-nav__item">
                                <a href="javascript:void(0);" class="kt-nav__link">
                                    <i class="kt-nav__link-icon la la-file-text-o"></i>
                                    <span class="kt-nav__link-text exportTo" data-export-to="csv">CSV</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="javascript:void(0);" class="kt-nav__link">
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

<script type="text/javascript">
    var faqTable = $('#t_faq_datatable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/faq/list',
                    method: 'get',
                    params: {
                        "_token": "{{ csrf_token() }}"
                    },
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
            pageSize: 10,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
        },

        // layout definition
        layout: {
            scroll: false,
            footer: false,
        },

        // column sorting
        sortable: true,

        pagination: true,

        search: {
            input: $('#generalSearch'),
        },

        // columns definition
        columns: [{
                field: 'id',
                title: '#',
                sortable: 'asc',
                type: 'number',
                selector: false,
                textAlign: 'center',
                width: 100
            },
            {
                field: 'question',
                title: 'FAQs',
                width: 300
            },
            {
                field: 'answer',
                title: 'Answers',
                width: 300,
                template: function({
                    faq_answer = null
                }) {
                    return faq_answer ? faq_answer.answer : ''
                }
            }, {
                field: 'seq',
                title: 'Sequence #',
                width: 300
            },
            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 130,
                overflow: 'visible',
                textAlign: 'center',
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return '<button  class="btn btn-hover-brand btn-icon btn-pill model_load edit1 faq_edit_icon"  data-route="/faq/edit/' + row.id + '" data-id="' + row.id + '" href="JavaScript:void(0);" data-toggle="modal" data-target="#sys_model"  title="Edit details">\
                        <i class="la la-edit"></i>\
                    </button>\
                    <button class="btn btn-hover-danger btn-icon btn-pill del faq_delete_icon"  data-id="' + row.id + '" title="Delete">\
                        <i class="la la-trash"></i>\
                    </button>';
                },
            }
        ],

    });


    $(document).off('click', '.faq_edit_icon').on('click', '.faq_edit_icon', function(e) {
        e.preventDefault();
        showModal({
            url: $(this).data('route')
        });
    }).off('click', '.faq_delete_icon').on('click', '.faq_delete_icon', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        delConfirm({
            url: "faq/deletefaq/" + id,
            header: $('#t_faq_datatable')
        });
    });

    $('#faq_questions_search').on('keyup', function(e) {
        if ($(this).val().length >= 3) {
            $('#t_faq_datatable').KTDatatable().search($(this).val(), 'question');
        }
        if ($(this).val() == '') {
            $('#t_faq_datatable').KTDatatable().search($(this).val(), 'question');
        }
    });

    $('#faq_answers_search').on('keyup', function(e) {
        if ($(this).val().length >= 3) {
            $('#t_faq_datatable').KTDatatable().search($(this).val(), 'answer');
        }
        if ($(this).val() == '') {
            $('#t_faq_datatable').KTDatatable().search($(this).val(), 'answer');
        }
    });

    // $('.faqTableReset').on('click', function(e) {
    //     e.preventDefault();
    //     $('.searchFaq').val('');
    //     faqTable.setDataSourceParam("query", {});
    //     $('#t_faq_datatable').KTDatatable().reload();
    //     localStorage.removeItem("t_faq_datatable-1-meta");
    // });

    $(document).off('click', '.exportTo').on('click', '.exportTo', function(e) {
        e.preventDefault();
        e.stopPropagation();
        window.open('/export/faq/' + $(this).attr('data-export-to'));
    });
</script>