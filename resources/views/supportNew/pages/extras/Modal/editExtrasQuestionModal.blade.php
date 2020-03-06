<div class="modal-dialog editQuestionModalDialog" id="editQuestionModal" role="document" style="width: 600px;">
    <div class="modal-content addQuestionModalContent">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
            <div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
            </div>
        </div>
        <div class="modal-body">
            <form id="update_question_form">
                @csrf

                <div class="row form-group">
                    <div class="col-lg-12 label-floating">
                        <label class="control-label" for="question">Question</label>
                    <textarea type="text" class="form-control"  name="question" autocomplete="off" value="{{ucfirst($questionSection->question?$questionSection->question:'')}}">{{$questionSection->question}}</textarea>
                        <div class="errorMessage"></div>

                    </div>
                </div>
                <div class="row form-group">
                    {{-- <div class="col-lg-6 label-floating">
                        <label class="control-label" for="question">Type</label>
                        <select class="form-control selectPicker" name="type">
                            <option selected=""></option>
                            <option value="delivery" @if($questionSection->type==='delivery') selected @endif>Delivery</option>
                            <option value="pickup" @if($questionSection->type==='pickup') selected @endif>Pickup</option>
                        </select>
                        <div class="errorMessage"></div>

                    </div> --}}
                   <div class="col-lg-12 label-floating">
                        <label class="control-label" for="label">Label</label>
                        <input type="text" class="form-control"  name="label" autocomplete="off" value="{{$questionSection->label}}">
                    <div class="errorMessage"></div>
                   </div>
                </div>
                
            </form>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="update_question" data-id="{{$questionSection->id}}">Save</button>
        </div>
    </div>
</div>

<script>
    $('.selectPicker').select2({
        width:'100%',
        placeholder: 'Select'
    });
</script>