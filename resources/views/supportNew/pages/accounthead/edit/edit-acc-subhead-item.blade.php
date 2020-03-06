<div class="custom-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Account Subhead Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
               {{-- {{dd($subhead_item)}} --}}
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="editAccSubHeadItemsForm" style="margin-top:15px;">   
                        @csrf
                        <div class="" id="kt_portlet_base_demo_1_1_tab_content"style="background:#e5f7ff !important;" >
                            <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important;">
                                <div class="row" style="margin-bottom:1rem;">
                                    <div class="form-group col-12">
                                        <div class="">
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-6">
                                                    <label class="control-label" for="type">Account Head</label>
                                                    <select name="account_head_id" id="accHeadSelect">
                                                        <option value="">Select</option>
                                                        {{-- @foreach ($acc_heads as $acc_head) --}}
                                                            <option value="{{$subhead_item->account_head_id}}" selected>{{$subhead_item->accountHead->name}}</option>
                                                        {{-- @endforeach --}}
                                                    </select>
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label class="control-label" for="type">Account Sub Head</label>
                                                    <select name="account_sub_head_id" id="accSubHeadSelect">
                                                        <option value="{{$subhead_item->account_sub_head_id}}" selected>{{$subhead_item->accountSubHead->name}}</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-6">
                                                    <label class="control-label" for="name">Name</label>
                                                    <input class="form-control" type="text" value="{{$subhead_item->name}}" name="name">
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label class="control-label" for="code">Code</label>
                                                    <input class="form-control" type="text" value="{{$subhead_item->code}}" name="code">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-12">
                                                    <label class="control-label" for="description">Description</label>
                                                    <textarea class="form-control" id="text_editor" type="text" value="{{$subhead_item->description}}" name="description"></textarea>
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
                                            <button id="updateAccSubHeadItems" data-id="{{$subhead_item->id}}" class="btn btn-pill btn-success"><i class="la la-upload"></i>Update</button>
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
    $('#text_editor').markdown();
    $('#accHeadSelect').select2({
        width:'100%',
        placeholder: 'select',
        ajax: {
            url: "/admin/accounthead/getAccountHead",
            dataType: 'json',
            processResults: function (data) {
                var d = [];
                $(data).each(function (k, v) {
                    var a = {
                        text: v.name,
                        id: v.id
                    };
                    d.push(a);
                });
                return {
                    results: d
                };
            }
        }
    });
    $('#accSubHeadSelect').select2({
        width:'100%',
    });

    $('#accHeadSelect').on('change',function(){
        let value = $(this).val();
        $('#accSubHeadSelect').select2({
            width: '100%',
            placeholder: 'select',
            allowClear:true,
            ajax: {
                url: "/admin/accounthead/subhead/list?acc_head_id="+value,
                dataType: 'json',
                processResults: function (data) {
                    var d = [];
                    $(data).each(function (k, v) {
                        var a = {
                            text: v.name,
                            id: v.id
                        };
                        d.push(a);
                    });
                    return {
                        results: d
                    };
                }
            }
        })
    })
    $(document).off('click', '#updateAccSubHeadItems').on('click', '#updateAccSubHeadItems', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        let data = $('#editAccSubHeadItemsForm').serializeArray();
        supportAjax({
            url: `/admin/accounthead/subheaditems/edit/${id}`,
            method:"POST",
            data: data
        }, function(resp){
            $('#cModal').modal('hide');
            toastr.success('Updated Successfully.');
            $('#accountSubHeadItemsTable').KTDatatable().reload();
        }, function(err){
            console.log(err);
        });
    });
</script>