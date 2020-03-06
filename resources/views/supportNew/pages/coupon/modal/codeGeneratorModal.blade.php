<div class="modal-dialog addZipModalDialog" role="document">
    <div class="modal-content addZipModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Coupon</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">

            <div class="row">
                <div class="col">
                    <form id="generate_code_form">
                        @csrf
                        <div class="row">
                            <div class="form-group label-floating col-md-12 ">
                                <label class="control-label" for="prefix">Prefix</label>
                                <input class="form-control" type="text" id="prefix" data-inputName="prefix" name="prefix" placeholder="Prefix" required="require" autocomplete="off">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-12">
                                <label class="control-label" for="postfix">Postfix</label>
                                <input class="form-control" type="text" name="post_fix" data-inputName="post_fix" id="post_fix" placeholder="Postfix" required="require" autocomplete="off">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-12">
                                <label class="control-label" for="character">Character</label>
                                <input class="form-control" type="text" name="character" data-inputName="character" id="character" placeholder="Character" required="require" autocomplete="off">
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="generate_coupon_code">Generate</button>
        </div>
    </div>
</div>

<script>
   
</script>