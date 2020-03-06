<style>
    .updateCodeGenerator {
        margin-left: 68px;
        font-size: 11px;
        background: #00951b;
        color: white;
        /* margin-bottom: 6px; */
        padding-left: 5px;
        padding-right: 5px;
        border-radius: 4px;
    }

    .updateCodeGenerator:hover {
        cursor: pointer;
        background: #025e12;
    }
</style>

<div class="modal-dialog addZipModalDialog" role="document">
    <div class="modal-content addZipModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Coupon</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">

            <div class="row">
                <div class="col">
                    <form id="update_coupon_form">
                        @csrf
                        <div class="row">
                            <div class="form-group label-floating col-md-6 ">
                                <label class="control-label" for="name">Name</label>
                                <input class="form-control" type="text" id="name" data-inputName="name" value="{{$coupon->name}}" name="name" placeholder="Name" required="require" autocomplete="off">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="code">Coupon Code<span class="updateCodeGenerator">Generate Code</span></label>
                                <input class="form-control" type="text" name="code" data-inputName="code" value="{{$coupon->code}}" id="code" placeholder="Code" required="require" autocomplete="off">
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 label-floating">
                                <label class="control-label" for="type">Type</label>
                                <select id="type" name="type">
                                    <option value="Flat" @if($coupon->type === "flat") selected @endif>Flat</option>
                                    <option value="Percentage" @if($coupon->type === "percentage") selected @endif>Percentage</option>
                                </select>
                            </div>
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="value">Amount</label>
                                <input class="form-control" type="number" min="5" id="value" data-inputName="value" value="{{$coupon->value}}" name="value" placeholder="Value" required="require" autocomplete="off">
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="start_date">Start Date</label>
                                <input type="date" class="form-control" name="start_date" value="{{$coupon->start_date}}" id="start_date" autocomplete="off">
                                <div class="errorMessage"></div>

                            </div>
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="start_date">Expiry Date</label>
                                <input type="date" class="form-control" name="end_date" value="{{$coupon->end_date}}" id="end_date" autocomplete="off">
                                <div class="errorMessage"></div>

                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="usage">Usage</label>
                                <input class="form-control" type="number" min="0" id="usage" data-inputName="usage" value="{{$coupon->usage}}" name="usage" placeholder="Usage" required="require" autocomplete="off">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-6">
                                <label class="control-label" for="min_price">Minimum Price</label>
                                <input class="form-control" type="number" min="1" id="min_price" data-inputName="min_price" value="{{$coupon->min_price}}" name="min_price" placeholder="Minimum Price" required="require" autocomplete="off">
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-12 label-floating">
                                <label class="control-label" for="description">Description</label>
                                <textarea class="form-control rounded-0" id="exampleFormControlTextarea3" data-inputName="description" name="description" placeholder="Description" rows="3">{{$coupon->description}}</textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="update_coupon" data-id="{{$coupon->id}}">Update</button>
        </div>
    </div>
</div>









<!-- Modal 1 -->

<script>
    $(document).off('click', '#update_coupon').on('click', '#update_coupon', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let update_coupon_form = $('#update_coupon_form');
        let data = $('#update_coupon_form').serializeArray();
        let id = $(this).attr('data-id');
        supportAjax({
            url: 'coupon/updateCoupon/' + id,
            method: 'POST',
            data: data
        }, function(resp) {
            $('#cModal').modal('hide');
            toastr.success("Coupon updated!");
            $('#t_couponstable').KTDatatable().reload();

        }, function({
            status,
            responseJSON
        }) {
            if (status === 422) {
                update_coupon_form.find('input[name]').css('border-color', '#ddd');
                $(`input[name]`).siblings(".errorMessage").empty();
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    update_coupon_form.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`input[name="${key}"]`).siblings(".errorMessage").append(message);

                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        });
    });

    $(document).off('click', '.updateCodeGenerator').on('click', '.updateCodeGenerator', function(e) {
        e.preventDefault();
        e.stopPropagation();

        function generateCode(length) {
            let prefix = 'CS';
            let characters = '0123456789';
            let charactersLength = characters.length;
            for (let i = 0; i < length; i++) {
                prefix += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return prefix;
        }
        $('#code').val(generateCode(5));
    });

    // function membershipDatepicker() {
    //     var arrows;
    //     if (KTUtil.isRTL()) {
    //         arrows = {
    //             leftArrow: '<i class="la la-angle-right"></i>',
    //             rightArrow: '<i class="la la-angle-left"></i>'
    //         }
    //     } else {
    //         arrows = {
    //             leftArrow: '<i class="la la-angle-left"></i>',
    //             rightArrow: '<i class="la la-angle-right"></i>'
    //         }
    //     }
    //     $('.couponDatePicker').datepicker({
    //         format: 'yyyy-mm-dd',
    //         rtl: KTUtil.isRTL(),
    //         todayHighlight: true,
    //         orientation: "bottom left",
    //         templates: arrows
    //     }).on('hide', function(event) {
    //         event.preventDefault();
    //         event.stopPropagation();
    //     });
    // }
    // membershipDatepicker();

    $('#type').select2({
        placeholder: "select a type",
        width: "100%"
    });

    $('#start_date').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        orientation: "bottom left",
    });

    $('#end_date').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        orientation: "bottom left",
    });
</script>