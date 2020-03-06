<style>
    #companyNoteAddForm .custom-button{
        padding: 0.3rem 1rem!important;
    }
    #companyNoteAddForm .custom-button:hover{
        background-color: #003af5;
    }
    #companyNoteAddForm .custom-button.no-hover{
        background-color: #ffb822;
        border-color: #ffb822;
    }
    #companyNoteAddForm .custom-button.no-hover:hover{
        background-color: #db9500;
    }
    #updateNote{
        display: none;
    }
    .custom-button i{
        font-size: 1rem!important;
    }
    #companyNoteAddForm .formgroup textarea{
        background: #fafafa!important;
    }
    #companyNoteAddForm.editMode #updateNote{
        display: inline;
        width: 90px!important;
    }
    #companyNoteAddForm.editMode #storeNote{
        display: none;
    }
</style>
<div class="row">
    <div class="col-md-12" style="padding: 10px 5px 30px;">
        <form action="javascript;" id="companyNoteAddForm" data-clientid="{{$company->id}}">
            @csrf
            <div class="formgroup">
                <textarea class="form-control" name="description" id="noteDescription" rows="4" placeholder="Write a note..."></textarea>
            </div>
            <div class="row mb-3">
                <div class="col-md-12 mt-3">
                    <button class="btn btn-sm btn-brand btn-pill btn-elevate btn-icon-sm custom-button" id="storeNote">
                        <i class="la la-plus"></i>
                        Add
                    </button>
                    <button id="updateNote" class="btn btn-sm btn-warning btn-pill btn-elevate btn-icon-sm custom-button no-hover" id="updateNote">
                        <i class="la la-edit"></i>
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12">
        @if($company->notes)
        <div class="kt-notes">
            <div class="kt-notes__items" id="company_note_templater">
               @include('supportNew.pages.account.note.notes_data_template')
            </div>
        </div>
        @endif
    </div>
</div>
<script>
    $('#companyNoteAddForm').off('submit').on('submit', function(e){
        e.preventDefault();
        let data= $(this).serializeArray();
        supportAjax({
            url: `/admin/account/company/notes/store/`+$(this).attr('data-clientid'),
            method: "POST",
            data: data
        }, function(resp){
            $('#company_note_templater').html(resp);
            $("#noteDescription").val('');
            toastr.success('Note Added');
        }, function(err){

        });
    })
    $(document).off('click','#updateNote').on('click','#updateNote', function(e){
        e.preventDefault();
        let data= $('#companyNoteAddForm').serializeArray();
        supportAjax({
            url: `/admin/account/company/update/note/`+$('#companyNoteAddForm').attr('data-noteid'),
            method: "POST",
            data: data
        }, function(resp){
             $("#noteDescription").val('');
            $('#company_note_templater').html(resp);
            toastr.success('Note Updated');
            $('#companyNoteAddForm').removeClass('editMode')
        }, function(err){
            console.log(err);
        });
    })
</script>
