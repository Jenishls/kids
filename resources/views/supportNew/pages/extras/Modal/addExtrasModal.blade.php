{{-- 
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Extras</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form id ="extras_form">
            <div class="modal-body">
                <div class="extras--field">
                    <div class="row">
                        
                        <div class="form-group label-floating col-md-5">
                            <label class="control-label" for="">Type</label>
                            <div class="">
                                <select class="form-control selectPicker" name="type[]">
                                    <option selected=""></option>
                                    <option value="delivery">Delivery</option>
                                    <option value="pickup">Pickup</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group label-floating col-md-5">
                            <label class="control-label" for=""> Flights</label>
                            <div class="">
                                <select class="form-control selectPicker" name="flight[]">
                                    <option selected=""></option>
                                    <option value="1:5"><span>1</span> flight <span>$5.00</span></option>
                                    <option value="2:10"><span>2</span> flight <span>$10.00</span></option>
                                    <option value="3:15"><span>3</span> flight <span>$15.00</span></option>
                                    <option value="4:20"><span>4</span> flight <span>$20.00</span></option>
                                    <option value="5:25"><span>5</span> flight <span>$25.00</span></option>
                                </select>
                            </div>
                            <input type="text" placeholder="" name="flight[]">
                        </div>

                        <div class="form-group label-floating col-md-5">
                            <label class="control-label" for=""> Price</label>
                            <input type="text" placeholder="" name="price[]">
                        </div>

                        <div class="form-group label-floating col-md-1 pd-t-30 text-center">
                            <button class="btn btn-sm btn-success btn-secondary btn-elevate-hover btn-circle btn-icon addNewLevel" data-id="" style="color:brown">
                                <i class="la la-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary sy_icon extras_store"  id="store_extras">Add</button>
            </div>
        </form>
    </div>
</div> --}}

<div class="modal-dialog addQusetionModalDialog modal-800" id="addQuestionModal" role="document" style="margin-left: 30%;">
    <div class="modal-content addQuestionModalContent ">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Options</h5>
            <div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
            </div>
        </div>
        <div class="modal-body"> 
            <form id="add_question_form" class="option--field">
                @csrf
                <div class="row form-group " data-id="1">
                    <div class="col-md-2 label-floating">
                        <label class="control-label" for="price" class="required">Seq No.</label>
                        <input type="text" class="form-control sequence_no" id="" value="{{$seq}}" name="seq[]" autocomplete="off" >
                    </div>
                    <div class="col-md-4 label-floating">
                        <label class="control-label" for="label" class="required">Label</label>
                        <input type="text" class="form-control" id="code" name="label[]" autocomplete="off" >
                        <div class="errorMessage"></div>
                    </div>
                    <div class="col-md-4 label-floating">
                        <label class="control-label" for="price" class="required">Price</label>
                        <input type="text" class="form-control" id="" name="price[]" autocomplete="off" >
                    </div>
                    <div class="col-md-1 label-floating">
                        <label class="control-label">Default</label><br>
                        <input type="checkbox" style="margin-top:10px;" name="is_default[]">
                            <span></span>
                    </div>
                    
                    <div class="form-group label-floating col-md-1 pd-t-30 text-center">
                        <button class="btn btn-sm btn-success btn-secondary btn-elevate-hover btn-circle btn-icon addNewOptionField" data-id="" style="color:brown">
                            <i class="la la-plus"></i>
                        </button>
                    </div>
                </div>
                
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-pill x" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary sy_icon btn-pill"  id="add--question--option"  data-id="{{$question->id}}">Save</button>
        </div>
    </div>
</div>

<script>
    function defaultBoxOperation(){
        $('input[type="checkbox"]').on('change',function(e){
            let self = $(this);
            let boxes = document.querySelectorAll('input[type="checkbox"]');
            $.each(boxes,function(i,v){
                $(v).prop('checked', false);
            });
            self.prop('checked', true);
        });
    }
    // create new options label
    $(document).off("click", "#add--question--option").on("click", "#add--question--option", function (e) {
        var add_question_form = $("#add_question_form");
        add_question_form.find('input[type="checkbox"]').each(function(){
            let box = $(this);
            if(box.is(':checked') == true){

                box.attr('value', '1');
            }else{
                box.prop('checked', true);
                box.attr('value', '0');
            }
        });
        e.preventDefault();
        e.stopPropagation();
        let table = $(".tableloader").attr("id");
        let form_data = $("#add_question_form").serializeArray();
        console.log(form_data);
        let question_id = $(this).attr("data-id");
        let data = form_data.concat({
            name: "question_id",
            value: question_id
        });
        supportAjax({
                url: "/admin/extras/newquestionoption",
                method: "post",
                data: data
            },
            function (resp) {
                $("#cModal").modal("hide");
                toastr.success("New Option added successfully");
                $(`#${table}`)
                    .KTDatatable()
                    .reload();
            },
            function ({
                status,
                responseJSON
            }) {
                if (status === 422) {
                    add_question_form
                        .find("input[name]")
                        .css("border-color", "#ddd");
                    $(`input[name]`)
                        .siblings(".errorMessage")
                        .empty();

                    if (!responseJSON.errors) return;
                    const messages = [];
                    for (const [key, message] of Object.entries(
                            responseJSON.errors
                        )) {
                        add_question_form
                            .find(`input[name="${key}"]`)
                            .css("border-color", "#f44336");
                        add_question_form
                            .find(`textarea[name="${key}"]`)
                            .css("border-color", "#f44336");
                        messages.push(message);
                        $(`input[name="${key}"]`)
                            .siblings(".errorMessage")
                            .empty()
                            .append(message);
                    }
                    toastr.error(
                        "<strong>Please check highlighted fields! </strong> <br> <br>" +
                        messages.flat(1).join("<br>")
                    );
                }
            }
        );
    });

    // add lookup
    // add new extras
    var option_add_row = 2;
    var row_data_id= $('.option--field').children('.row').find('.sequence_no').attr('value');
    var row_data_add_id = parseInt(row_data_id)+1;
    $(document).off('click', '.addNewOptionField').on('click', '.addNewOptionField', function(e){
        e.preventDefault();
        let appendNewRow = `
                        <div class="row form-group addedOptionFieldRow" data-id="${option_add_row}">
                            
                            <div class="col-md-2 label-floating">
                                <input type="text" class="form-control" value="${row_data_add_id}" name="seq[]" autocomplete="off" >
                            </div>
                            <div class="col-md-4 label-floating">
                                <input type="text" class="form-control" id="code" name="label[]" autocomplete="off" >
                                <div class="errorMessage"></div>
                            </div>
                            <div class="col-md-4 label-floating">
                                <input type="text" class="form-control" name="price[]" autocomplete="off" >
                            </div>
                            <div class="col-md-1 label-floating">
                                <input type="checkbox" style="margin-top:10px;" name="is_default[]">
                                    <span></span>
                            </div>
                            <div class="form-group label-floating col-md-1 text-center">
                                <button class="btn btn-sm btn-danger btn-secondary btn-elevate-hover btn-circle btn-icon delNewTime" data-id="" style="color:brown">
                                    <i class="la la-remove"></i>
                                </button>
                            </div>
                        </div>`
        $('.option--field').append(appendNewRow);
        option_add_row+=1;
        row_data_add_id+=1;
        defaultBoxOperation();
    });

    $(document).off('click', '.delNewTime').on('click', '.delNewTime', function(e){
        e.preventDefault();
        $(this).closest('div.addedOptionFieldRow').remove();
       
    });
</script>


{{-- <script>

    $('.selectPicker').select2({
        width:'100%',
        placeholder: 'Select'
    });

    // store
	$(document).off('click', '#store_extras').on('click', '#store_extras', function(e) {
        e.preventDefault();
        let add_extras_form = $('#extras_form');
        let data = $('#extras_form').serializeArray();
        // console.log(data);

        supportAjax({
            url: '/admin/extras/store',
            method: 'POST',
            data: data
        }, function(resp) {
            $('#cModal').modal('hide');
            toastr.success("New Time added!");
            $('#t_extras_table').KTDatatable().reload();

        },function(err){
            toastr.error("Something went wrong!");

        }
        )

    });

     // add new item 
     $(document).off('click', '.addNewLevel').on('click', '.addNewLevel', function(e){
        e.preventDefault();

        let appendNewRow = `
                    <div class="row addedExtrasRow">
                        
                        <div class="form-group label-floating col-md-5">
                            <label class="control-label" for="">Type</label>
                            <div class="">
                                <select class="form-control selectPicker" name="type[]">
                                    <option selected=""></option>
                                    <option value="delivery">Delivery</option>
                                    <option value="pickup">Pickup</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group label-floating col-md-5">
                            <label class="control-label" for=""> Flights</label>
                            <input type="text" placeholder="" name="flight[]">
                        </div>

                        <div class="form-group label-floating col-md-5">
                            <label class="control-label" for=""> Price</label>
                            <input type="text" placeholder="" name="price[]">
                        </div>

                        <div class="form-group label-floating col-md-1 pd-t-30 text-center">
                            <button class="btn btn-sm btn-danger btn-secondary btn-elevate-hover btn-circle btn-icon delNewExtras" data-id="" style="color:brown">
                                <i class="la la-remove"></i>
                            </button>
                        </div>
                    </div>`
        $('.extras--field').append(appendNewRow);
        
        $('.selectPicker').select2({
            width:'100%',
            placeholder: 'Select'
        });

        $('.timepicker, .timepicker_1').timepicker({
            // minuteStep: false,
            defaultTime: '1',
            showSeconds: false,
            showMeridian: false,
            // snapToStep: true
        });

        
    });


    $(document).off('click', '.delNewExtras').on('click', '.delNewExtras', function(e){
        e.preventDefault();
        $(this).closest('div.addedExtrasRow').remove();
       
    });
</script> --}}