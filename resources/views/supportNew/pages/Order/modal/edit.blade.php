<style>
.box_shadow{
    padding: 10px 15px 10px 15px;
    margin-bottom: 10px;
    border-radius: 4px;
    background: #fefefe;
    box-shadow: 2px 2px 7px 1px rgba(201, 201, 201, 0.7);
}

.portlet_custom_label {
    margin-top: -25px;
    font-weight: 800;
    display: table;
    z-index: 1;
    font-size: 12px;
    padding: 5px 15px;
    letter-spacing: 1px;
    border: 1px solid #f1f2f6;
    border-radius: 19px;
    background: #cbcbcb;
    color: #646c9a;
}

.dropzone {
    border: 2px dashed #0087F7;
    border-radius: 5px;
    background: white;
    min-height: 150px;
    padding: 54px 54px;
    box-sizing: border-box;
    cursor: pointer;
}

.boldLabel{
    font-weight: 600 !important;
}
</style>
<div class="modal-dialog addProductModalDialog modal-md" role="document" style="margin-top: 4% !important; margin-left: 31% !important;">
    <div class="modal-content addProductModal" style="width: 700px;">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Order</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="color: #fff !important;">
            </button>
        </div>
        <div class="modal-body no-padding" style="">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
                <div class="kt-portlet__body no-padding" style="background:#e4e4e4 !important; "> 
                    <form class="kt-form kt-form--label-right" id="order_edit_form">   
                        @csrf
                        <div class="pt-10" style="background:#e5f7ff !important;">
                            <div class="kt-portlet__body pl-35 pr-35 pb-35">
                                <div class="row mb-5 no-margin">
                                    <div class="form-group col-12 box_shadow" >
                                        <div class="form-group row" style="padding: 5px;">
                                            <div class="col-6">
                                                @if($order->client)
                                                <label class="control-label boldLabel" for="dob">Customer Name</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text" name="name" value="{{$order->client?ucfirst($order->client->fname):""}} {{$order->client?ucfirst($order->client->mname):""}} {{ $order->client?ucfirst($order->client->lname):""}}" autocomplete="off">
                                                </div>
                                                @else
                                                <label class="control-label boldLabel" for="dob">Company Name</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text" name="name" value="{{$order->company?ucfirst($order->company->c_name):""}}" autocomplete="off">
                                                </div>
                                                @endif
                                                <div class="errorMessage"></div>
                                            </div>
                                            <div class="col-6">
                                                <label class="control-label boldLabel" for="dob">Phone</label>
                                                <div class="input-group">
                                                    @if($order->client)
                                                    <input class="form-control" type="text" name="phone" value="{{$order->client?$order->client->phone_no:"-"}} " autocomplete="off">
                                                    @else
                                                    <input class="form-control" type="text" name="phone" value="{{$order->company?$order->company->account?$order->company->account->contact?$order->company->account->contact->phone_no:"":"":"-"}}" autocomplete="off">
                                                    @endif
                                                </div>
                                                <div class="errorMessage"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row" style="padding: 5px;">
                                            <div class="col-6">
                                                <label class="control-label boldLabel" for="dob">Email</label>
                                                <div class="input-group">
                                                    @if($order->client)
                                                    <input class="form-control" type="text" name="email" value="{{$order->client?$order->client->email:"-"}}" autocomplete="off">
                                                    @else
                                                    <input class="form-control" type="text" name="email" value="{{$order->company?$order->company->account?$order->company->account->contact?$order->company->account->contact->email:"":"":"-"}} " autocomplete="off">
                                                    @endif
                                                </div>
                                                <div class="errorMessage"></div>
                                            </div>
                                            <div class="col-6">
                                                <label class="control-label boldLabel" for="dob">Sales Rep</label>
                                                {{--  --}}
                                                <div class="input-group">
                                                    <select class="form-control" name="sales_rep" id="sales_rep">
                                                    @if(!$order->sales_rep == 000)
                                                    <option value="{{$order->sales_rep}}">{{$order->sales_representative?ucfirst($order->sales_representative->name):""}}</option>
                                                    @else
                                                    <option value="000">Website</option>
                                                    @endif
                                                    </select>
                                                </div>
                                                <div class="errorMessage"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>	                
                            </div>
                            <div class="kt-portlet__foot footer_white">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <button type="reset" class="btn btn-secondary btn-pill" data-dismiss="modal">  <i class="la la-times"></i>Cancel</button>
                                        </div>
                                        <div class="col-lg-6 kt-align-right">
                                            <button type="" class="btn btn-success btn-pill" id="updateOrder"> <i class="la la-save"></i>Save</button>
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
    $('#sales_rep').select2({
        placeholder: 'Select Sales Rep',
        width: '100%',
        tags: true,
        ajax: {
            method: 'POST',
            url: '/admin/order/users/all',
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
    $(document).off('click','#updateOrder').on('click','#updateOrder',function(e){
        e.preventDefault();
        let formData = new FormData(document.getElementById('order_edit_form')) 
        $.ajax({
            url:'/admin/order/edit/{{$order->id}}',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                $('#cModal').modal('hide');
                toastr.success(response.message);
                if(response.data.client){

                    if(response.data.client.mname){
                        $('#span_name').text(response.data.client.fname + ' '+ response.data.client.mname+' '+ response.data.client.lname);
                    }else{
                        $('#span_name').text(response.data.client.fname + ' '+ response.data.client.lname);
                    }
                    $('#span_phone').text(response.data.client.phone_no);
                    $('#span_email').text(response.data.client.email);
                }
                else{
                    $('#span_name').text(response.data.company.c_name);
                    $('#span_phone').text(response.data.company.account.contact.phone_no);
                    $('#span_email').text(response.data.company.account.contact.email);
                }
                if(response.data.sales_rep == 000){
                    $('#span_sales_rep').text("Website");
                }
                else{
                    $('#span_sales_rep').text(response.sales_rep.name);
                }
            }, 
            error:function({status, responseJSON})
            {
                
            }
        });
    });
</script>