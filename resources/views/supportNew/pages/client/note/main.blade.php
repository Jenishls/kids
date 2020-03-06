<style>
    #clientNoteAddForm .custom-button{
        padding: 0.3rem 1rem!important;
    }
    #clientNoteAddForm .custom-button:hover{
        background-color: #003af5;
    }
    #clientNoteAddForm .custom-button.no-hover{
        background-color: #ffb822;
        border-color: #ffb822;
    }
    #clientNoteAddForm .custom-button.no-hover:hover{
        background-color: #db9500;
    }
    #updateNote{
        display: none;
    }
    .custom-button i{
        font-size: 1rem!important;
    }
    #clientNoteAddForm .formgroup textarea{
        background: #fafafa!important;
    }
    #clientNoteAddForm.editMode #updateNote{
        display: inline;
    }
    #clientNoteAddForm.editMode #storeNote{
        display: none;
    }
</style>
{{-- <div class="clientNoteAdd" id="addClientNoteNew" data-id="{{$client->id}}">
    <a class="kt-menu__link">
        <i class="fas fa-plus" style="padding-right: 10px;
        "></i>
        Note
    </a>
</div> --}}
<div class="row">
    <div class="col-md-12" style="padding: 10px 5px 10px;">
        <form action="javascript;" id="clientNoteAddForm" data-clientid="{{$client->id}}">
            @csrf
            <div class="formgroup">
                <textarea class="form-control" name="description" id="noteDescription" rows="4" placeholder="Write a note..."></textarea>
            </div>
            <div class="row">
                <div class="col-md-12 text-right mt-3">
                    <button class="btn btn-sm btn-brand btn-pill btn-elevate btn-icon-sm custom-button" id="storeNote">
                        <i class="la la-plus"></i>
                        Add
                    </button>
                    <button id="updateNote" class="btn btn-sm btn-warning btn-pill btn-elevate btn-icon-sm custom-button no-hover" id="updateNote">
                        <i class="la la-edit"></i>
                        Edit
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12">
        @if($client->notes)
        <div class="kt-notes">
            <div class="kt-notes__items" id="client_note_templater">
               @include('supportNew.pages.client.note.notes_data_template')
            </div>
        </div>
        @endif
    </div>
</div>
<script>
    $('#clientNoteAddForm').off('submit').on('submit', function(e){
        e.preventDefault();
        let data= $(this).serializeArray();
        supportAjax({
            url: `/admin/client/add/note/`+$(this).attr('data-clientid'),
            method: "POST",
            data: data
        }, function(resp){
            $('#client_note_templater').html(resp);
            $("#noteDescription").val('');
            toastr.success('Note Added');
        }, function(err){

        });
    })
    $(document).off('click','#updateNote').on('click','#updateNote', function(e){
        e.preventDefault();
        let data= $('#clientNoteAddForm').serializeArray();
        supportAjax({
            url: `/admin/client/update/note/`+$('#clientNoteAddForm').attr('data-noteid'),
            method: "POST",
            data: data
        }, function(resp){
             $("#noteDescription").val('');
            $('#client_note_templater').html(resp);
            toastr.success('Note Updated');
            $('#clientNoteAddForm').removeClass('editMode')
        }, function(err){

        });

    })
    
</script>
