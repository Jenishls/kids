<style>
    .d-grid{
        display: grid;
    }
    .m-t-10{
        margin-top: 10px;
    }

    .grid-gap-25{
        grid-gap: 25px;
    }

    .d-grid h5{
        color: #13b2fd;
    }

</style>
<div class="modal-dialog addZipModalDialog" role="document">
    <div class="modal-content addZipModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row" style="background: #fff; padding: 20px">
                <form id="add--enquiry-form" style="width: 100%">
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="control-label">First Name</label>
                            <input class="form-control" type="text" name="fname" required="require" autocomplete="off">
                        </div>
                        <div class="col-lg-6">
                            <label class="control-label">Last Name</label>
                            <input class="form-control" type="text" name="lname" required="require" autocomplete="off">
                        </div>                        
                    </div>
                    <div class="row m-t-10">
                        <div class="col-md-12">
                            <label class="control-label">Email</label>
                            <input type="email" name="email" required autocomplete="off" class="form-control">
                        </div>
                    </div>
                    <div class="row m-t-10">                        
                        <div class="col-lg-6">
                            <label class="control-label">Company</label>
                            <input class="form-control" type="text" name="company" required="require" autocomplete="off">
                        </div>
                        <div class="col-lg-6">
                            <label class="control-label">Phone</label>
                            <input class="form-control cs--mask-phone" type="text" name="phone" required="require" autocomplete="off">
                        </div>             
                    </div>
                    <div class="row m-t-10">
                        <div class="col-lg-6">
                            <label class="control-label">Reason</label>
                            <select name="reason" id="enq--reason">
                                <option selected disabled>Choose</option>
                                <option value="I Need Help">I Need Help </option>
                                <option value="Call Me">Call Me</option>
                                <option value="Email Me">Email Me</option>
                                <option value="Text Me">Text Me</option>
                                <option value="Help with my order">Help with my order</option>
                                <option value="I would like to place an order">I would like to place an order</option>
                                <option value="I am ready for pick up">I am ready for pick up</option>
                                <option value="Other">Other</option>
                            </select>
                        </div> 
                        <div class="col-lg-6">
                            <label class="control-label">Enquiry Type</label>
                            <select name="type" id="enq--type">
                                <option value="contact">Contact</option>
                                <option value="commercial_mover">Commercial Mover</option>                                
                            </select>
                        </div>                        
                    </div>
                    <div class="row m-t-10">
                        <div class="col-lg-12">
                            <label class="control-label">Description</label>
                            <textarea name="desc" class="form-control"></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button class="btn btn-sm btn-pill btn-success text-capitalize" id="add--enq">ADD</button>
        </div>
    </div>
</div>

<script>    

    phoneMask('.cs--mask-phone');

    $('#enq--reason').selectpicker({width : "100%"})
    $('#enq--type').selectpicker({width: "100%"})

    clickEvent('#add--enq')(storeEnq)

    function storeEnq(e){
        e.preventDefault()
        $(`#add--enquiry-form input`).css('border-color', "rgb(226, 229, 236)");
        $(`#add--enquiry-form textarea`).css('border-color', "rgb(226, 229, 236)");
        supportAjax({
            url : '/admin/enquiry/store',
            method: "post",
            data : $('#add--enquiry-form').serializeArray()
        }, () => {  
            toastr.success("Successfully converted to client");
            $('#cModal').modal('hide')
            $('#t_contactstable').KTDatatable('reload')
        }, ({responseJSON : {errors}}) => {
            for(let key in errors){
                $(`#add--enquiry-form [name="${key}"]`).css('border-color', "red");
            }
        })
    }

</script>