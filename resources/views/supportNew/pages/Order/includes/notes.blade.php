<style>
    #orderNoteAddForm .custom-button{
        padding: 0.3rem 1rem!important;
    }
    #orderNoteAddForm .custom-button:hover{
        background-color: #003af5;
    }
    #orderNoteAddForm .custom-button.no-hover{
        background-color: #ffb822;
        border-color: #ffb822;
    }
    #orderNoteAddForm .custom-button.no-hover:hover{
        background-color: #db9500;
    }
    #updateNote{
        display: none;
    }
    .custom-button i{
        font-size: 1rem!important;
    }
    #orderNoteAddForm .formgroup textarea{
        background: #fafafa!important;
    }
    #orderNoteAddForm.editMode #updateNote{
        display: inline;
    }
    #orderNoteAddForm.editMode #storeNote{
        display: none;
    }
    .custom-notes-user__info{
        font-size: 1rem;
        border:none;
        color: #171718;
        font-weight: 600;
        background-color: white;
        text-transform: capitalize!important;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }
    .custom-notes-user__info.date_info{
        font-weight: 100!important;
        font-size: 0.8rem!important;
        color: #a7abc3!important;
    }
    .custom-kt-notes__body{
        padding: 8px;
        text-align: justify;
    }
    .kt-notes__content{
        padding-top:0px !important;
    }
</style>
{{-- <div class="clientNoteAdd" id="addClientNoteNew" data-id="{{$order->id}}">
    <a class="kt-menu__link">
        <i class="fas fa-plus" style="padding-right: 10px;
        "></i>
        Note
    </a>
</div> --}}
<div class="row">
    <div class="col-md-12" style="padding: 10px 5px 10px;">
        <form action="javascript;" id="orderNoteAddForm" data-clientid="{{$order->id}}">
            @csrf
            <div class="formgroup">
                <textarea class="form-control" name="description" id="noteDescription" rows="4" required placeholder="Write a note..."></textarea>
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
        @if($order->notes)
        <div class="kt-notes">
            <div class="kt-notes__items" id="order_note_templater">
                    @include('supportNew.pages.Order.includes.notes_data_template')
            </div>
        </div>
        @endif
    </div>
</div>
<script>
    $('#orderNoteAddForm').off('submit').on('submit', function(e){
        e.preventDefault();
        let data= $(this).serializeArray();
        supportAjax({
            url: `/admin/order/note/add/{{$order->id}}`,
            method: "POST",
            data: data
        }, function(resp){
            $('#order_note_templater').html(resp);
            $("#noteDescription").val('');
            toastr.success('Note Added');
        }, function(err){
 
        });
    });

    $(document).off('click','#updateNote').on('click','#updateNote', function(e){
        e.preventDefault();
        let data= $('#orderNoteAddForm').serializeArray();
        supportAjax({
            url: `/admin/order/note/update/`+$('#orderNoteAddForm').attr('data-noteid'),
            method: "POST",
            data: data
        }, function(resp){
                $("#noteDescription").val('');
            $('#order_note_templater').html(resp);
            toastr.success('Note Updated');
            $('#orderNoteAddForm').removeClass('editMode')
        }, function(err){

        });

    })

</script>
