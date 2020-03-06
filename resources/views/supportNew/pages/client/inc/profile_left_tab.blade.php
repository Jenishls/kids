<style>
.clientNoteAdd{
    width: 100%;
    margin-bottom: 10px;
    /* position: relative; */
    float: right;
    color: #ffffff;
    /* padding: 5px 15px;
    border-radius: 19px;
    background: #22b9ff; */
}
.clientNoteAdd a{
    position: relative;
    float: right;
    padding: 5px 15px;
    color: #ffffff;
    border-radius: 19px;
    background: #22b9ff;
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
.kt-todo .kt-todo__list {
    display: -webkit-box!important;
    display: -ms-flexbox!important;
    display: flex!important;
    padding: 0;
}
.kt-portlet .kt-portlet__body.kt-portlet__body--fit-x, .kt-portlet .kt-portlet__body.kt-portlet__body--hor-fit {
    padding-left: 0;
    padding-right: 0;
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
.kt-todo .kt-todo__list .kt-todo__head .kt-todo__toolbar {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding: 0 25px;
}
.kt-todo .kt-todo__list .kt-todo__head .kt-todo__toolbar .kt-todo__actions {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    margin-right: 1rem;
}
.kt-todo .kt-todo__list .kt-todo__body {
    padding: 20px 0 0 0;
}
.kt-todo .kt-todo__list .kt-todo__body .kt-todo__items {
    padding: 0;
    margin-bottom: 15px;
}
.kt-todo .kt-todo__list .kt-todo__body .kt-todo__items .kt-todo__item {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
    padding: 12px 25px;
    -webkit-transition: all .3s ease;
    transition: all .3s ease;
    cursor: pointer;
}
.kt-todo .kt-todo__list .kt-todo__foot {
    margin-top: 10px;
    padding: 0 25px;
}
.kt-todo .kt-todo__list .kt-todo__foot .kt-todo__toolbar {
    float: right;
}
.kt-todo .kt-todo__list .kt-todo__foot .kt-todo__toolbar .kt-todo__controls {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    margin-left: 1rem;
}
.kt-todo .kt-todo__list .kt-todo__foot .kt-todo__toolbar .kt-todo__controls .kt-todo__pages {
    margin-left: .5rem;
}
.kt-todo .kt-todo__list .kt-todo__foot .kt-todo__toolbar .kt-todo__controls .kt-todo__pages .kt-todo__perpage {
    color: #74788d;
    font-size: 1rem;
    font-weight: 500;
    margin-right: 1rem;
    cursor: pointer;
    -webkit-transition: all .3s ease;
    transition: all .3s ease;
    padding: .5rem 0;
}
.kt-todo .kt-todo__list .kt-todo__foot .kt-todo__toolbar .kt-todo__controls .kt-todo__icon {
    margin-left: .5rem;
}
.kt-todo .kt-todo__icon {
    border: 0;
    background: 0 0;
    outline: 0!important;
    -webkit-box-shadow: none;
    box-shadow: none;
    outline: 0!important;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    height: 35px;
    width: 35px;
    background-color: #f7f8fa;
    -webkit-transition: all .3s ease;
    transition: all .3s ease;
    cursor: pointer;
    margin: 0;
    border-radius: 0;
    border-radius: 4px;
}
</style>
<div class="col-xl-4">
   
    <div class="kt-portlet kt-portlet--tabs">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-toolbar">
                <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#client_profile_left_1" role="tab" aria-selected="false">
                            <i class="flaticon-notes"></i>Notes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#client_profile_left_2" role="tab" aria-selected="false">
                            <i class="flaticon2-phone"></i>Comm. Preference
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#client_profile_left_3" role="tab" aria-selected="false">
                            <i class="fas fa-mail-bulk"></i> Email Log
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#clientSmsLog" role="tab" aria-selected="true">
                            <i class="la la-comment"></i> SMS Log
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="kt-portlet__body kt-scroll ps ps--active-y" data-scroll="true" style="height:770px;">
            
            <div class="tab-content">
                <!--Begin:: Tab Content-->
                <div class="tab-pane active" id="client_profile_left_1" role="tabpanel" >
                    @include('supportNew.pages.client.note.main')
                </div>
                <!--End:: Tab Content-->
                <!--Begin:: Tab Content-->
                <div class="tab-pane" id="client_profile_left_2" role="tabpanel">
                    <div class="form-group">
                        <label style="font-size:1.2rem!important;">Communication Preference</label>
                        <form id="updateClientCommPref" data-clientid="{{$client->id}}">
                            @csrf
                            <div class="kt-checkbox-list" id="comm_pref">
                                @include('supportNew.pages.client.inc.communication_template')
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="" class="btn btn-sm btn-pill btn-success">
                                        <i class="la la-save"></i>
                                        update
                                    </button>
                                </div>
                            </div>
                        </form>
					</div>
                </div>
                <!--End:: Tab Content-->
                <!--Begin:: Tab Content-->
                <div class="tab-pane" id="client_profile_left_3" role="tabpanel">
                    <h6 class="text-center">We are currently working in this feature</h6>
                </div>
                <!--End:: Tab Content-->
                <!--Begin:: Tab Content-->
                <div class="tab-pane" id="clientSmsLog" role="tabpanel">
                    <message-component sms-logs="{{json_encode($smsLogs)}}" :reply-off="true"></message-component>
                </div>
                <!--End:: Tab Content-->
            </div>
        </div>
    </div>
</div>
<script>

    $(function(){
        const messageApp = new Vue({
            el : '#clientSmsLog',
            name : "Sms Log Application"
        });
    });

    $('[data-scroll="true"]').each(function() {
        var el = $(this);
        KTUtil.scrollInit(this, {
            mobileNativeScroll: true,
            handleWindowResize: true,
            rememberPosition: (el.data('remember-position') == 'true' ? true : false),
            height: function() {
                if (KTUtil.isInResponsiveRange('tablet-and-mobile') && el.data('mobile-height')) {
                    return el.data('mobile-height');
                } else {
                    return el.data('height');
                }
            }
        });
    });

    $(document).off('click', '#addClientNoteNew').on('click', '#addClientNoteNew', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        showModal({
            url: `/admin/client/addnote/${id}`
        })
    }).off('click', '.edit_note').on('click', '.edit_note', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        showModal({
            url: `/admin/client/editnote/${id}`
        });
    }).off('click', '.delete_note').on('click', '.delete_note', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        delConfirm({
            url: "/admin/client/deletenote/" + id,
            appendView: "#kt_body"
        });
    })

    $(document).off('submit','#updateClientCommPref').on('submit','#updateClientCommPref', function(e){
        e.preventDefault();
        let data = $(this).serializeArray();
        let id = $(this).attr('data-clientid');
        supportAjax({
            url:'/admin/client/comm_pref/update/'+id,
            method:'post',
            data
        },
        function(resp){
            $('#comm_pref').html(resp);
            toastr.success('<strong>Updated CLient\'s Communication Preferences</strong>')
        },
        function(err){
            console.log(err);
        });
    })
</script>