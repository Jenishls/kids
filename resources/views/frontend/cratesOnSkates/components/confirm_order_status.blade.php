<style>

    .title_second{
        display: none;
    }
.p_title{
    font-size: 12px;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
@media only screen and (max-width: 690px){
    .p_title{
        font-size: 12px;
    }
}
@media only screen and (max-width: 555px){
    .p_title{
        font-size: 12px;
    }
    .title_first{
        display: none;
    }
    .title_second{
        display: block;
    }
}
@media only screen and (max-width: 500px){
    .cell-qty {
        margin: 0;
        text-align: center;
    }
    .title_second{
        text-align: center;
    }
    input[type="number"]{
        width: 55px;
        margin: 0 auto;
        height: 30px;
        font-size: 13px;
    }
}
@media only screen and (max-width: 380px){
    .cell-qty {
        margin: 0;
        text-align: center;
    }
    .title_first,
    .title_second{
        text-align: center;
        font-size: 10px !important;
    }
    input[type="number"]{
        width: 45px;
        padding: 5px;
        margin: 0;
    }
}
/* Firefox */
input[type=number] {
  -moz-appearance:textfield;
}
.modal-800{
        max-width: 800px;
    }
    .order_modal_footer{
        display: inline-block; 
        background: #eee;
    }
    @media only screen and (max-width: 358px) {
        .order_modal_footer{
            display: flex;
            justify-content: space-between;
        }
        .clear_cancel_btn{
            font-size: 11px;
        }
    }
</style>
<div class="modal-dialog addProductModalDialog modal-md modal-800" role="document">
    <div class="modal-content addProductModal">
        <div class="modal-header" style="background: #76c043;">
            <h5 class="modal-title" id="exampleModalLabel"><p class="order-title text-white m-b-0">Order  {{$order->order_no}} </p> </h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="color: #fff !important;">
                <i class="icon fa fa-close"></i>
            </button>
        </div>
        <div class="modal-body no-pd" style="">
            <div class="db-order-details-div">
                
                <div class="items_summary pd-b-5 text-left br-4">
                    <div>
                        <div class="row pro_det m-t-10  m-b-10 order_item_header1">
                            <div class="col-6">
                                <p class="p_title text-left">Item</p>
                            </div>
                            <div class="col-2">
                                <p class="p_title title_first">Qty.</p>
                                <p class="p_title title_second">Qty.</p>
                            </div>
                            <div class="col-2">
                                <p class="p_title title_first">Lost/Damage</p>
                                <p class="p_title title_second">Lst./Dmg.</p>
                            </div>
                            <div class="col-2">
                                <p class="p_title title_first">Extra ($)</p>
                                <p class="p_title title_second">Ext.($)</p>
                            </div>
                        </div>
                        <hr>
                        @foreach($order->items as $item) 
  
                        <div class="row pro_det m-t-10 m-b-10 align-items-center">
                            <div class="col-6 d-flex align-items-center ">
                                <div class="d-table-cell item_image" >
                                    @if($item->inventory->product->thumb) 
                                    <img src="data:image/png;base64,{{base64_encode(file_get_contents(storage_path('product/images/'.$item->inventory->product->thumb->file_name)))}}" class="main-logo" style="height:100%; width: 100%"> 
                                    @else 
                                    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('/images/noimage.png')))}}" class="main-logo" style="height:100%; width: 100%""> 
                                    @endif 
                                </div>
                                <p class="p_item_name">  {{$item->inventory->product->name}}  </p>
                            </div>
                            <div class="col-2">
                                <p class="p_style cell-qty">  {{$item->quantity}}  </p>
                            </div>
                            <div class="col-2">
                                <input type="number" class="form-control lost_damage_items" value="0" data-price="{{number_format($item->amount, 2, '.', '')}}" data-target="#damage--{{$loop->iteration}}" data-damage-type={{$item->inventory?$item->inventory->product?$item->inventory->product->damage_price_type:"":""}} data-damage={{$item->inventory?$item->inventory->product?$item->inventory->product->damage_price:0:0}}>
                            </div>
                            <div class="col-2">
                            <input type="number" class="form-control lost_damage_amount" value="0" id="damage--{{$loop->iteration}}">
                            </div>
                        </div>
                        <hr>
                        @endforeach 
                        <div>
                            <div class="row pro_det pd-t-10 pd-b-10">
                                <div class="col-6">
                                </div>
                                <div class="col-3">
                                    <p class="text-capitalize fs-18 m-b-5-i text-black f-w-600 text-right">total</p>
                                </div>
                                <div class="col-3">
                                    <p class="text-capitalize fs-18 m-b-5-i text-black f-w-600 text-right " id="total_damage"> </p>
                                    <input type="hidden" id="total_damage_input" name="total_damage" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer order_modal_footer">
            <button type="button" class="btn btn-light btn-pill float-left clear_cancel_btn" style="border-radius: 5px;" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-success btn-pill btn-elevate float-right clear_cancel_btn" style="border-radius: 5px;" data-type="{{$statusRequest}}" id="mark_as_pickup_process">
                <span>
                    Mark as Pickup
                </span>
            </button>
            <button type="button" class="btn btn-success btn-pill btn-elevate float-right clear_cancel_btn" style="border-radius: 5px; display: none;" id="Pay_and_mark_as_pickup">
                <span>
                    Continue
                </span>
            </button>
        </div>
    </div>
</div>

<script>
    $(document).off('keyup','.lost_damage_items').on('keyup','.lost_damage_items', function(e){
        e.preventDefault();
        let id = $(this).attr('data-target');
        let damage_type = $(this).attr('data-damage-type')
        let damage = $(this).attr('data-damage')
        let price = $(this).attr('data-price')
        let qty = $(this).val();
        let damage_amt = 0;
        if(damage_type == 'flat'){
            damage_amt = qty * damage;
        }
        else{
            damage_amt = (damage/100) * qty * price;
        }
        $(id).val(damage_amt);
        total_damage();
    });

    function total_damage(){
        let g_total = 0;
        $('.lost_damage_amount').each(function(i, obj) {
            let value =obj.value;
            value = isNaN(value)?0:value;
            g_total += Number(value);
        });
        if(g_total > 0){
            $('#mark_as_pickup_process').hide();
            $('#Pay_and_mark_as_pickup').show();
        }
        else{
            $('#mark_as_pickup_process').show();
            $('#Pay_and_mark_as_pickup').hide();
        }

        $('#total_damage').text('$ '+g_total);
        $('#total_damage_input').val(g_total);
    }

    $(document).off('click','#mark_as_pickup_process').on('click','#mark_as_pickup_process',function(e){
        e.preventDefault();
        let status = $(this).attr('data-type');
        let amount = $('#total_damage_input').val();
        
        if(amount > 0 ){
            showModal({
                url: `/calendar/order/payment/{{$order->id}}/${status}/${amount}`,
                c:2
            });
        }
        else{
            $('#cModal1').modal('hide');
            showModal({
                url: "/calendar/order/confirmation/signature/{{$order->id}}/"+status,
                c:2
            });
        }
    });
    
    $(document).off('click','#Pay_and_mark_as_pickup').on('click','#Pay_and_mark_as_pickup',function(e){
        e.preventDefault();
        let status = $(this).attr('data-type');
        let amount = $('#total_damage_input').val();
        showModal({
            url: `/calendar/order/payment/{{$order->id}}/${status}/${amount}`,
            c:2
        });
    });
</script>