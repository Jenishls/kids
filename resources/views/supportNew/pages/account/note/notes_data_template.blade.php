<style>
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
@foreach($company->notes as $key => $note)
       <div class="kt-notes__item"> 
           <div class="kt-notes__media">
               @if($note->createdUser->profilePicture && $note->createdUser->profilePicture->file_name)
                <img class="kt-hidden-" title="{{$note->createdUser->name}}" src="data:image;base64,{{base64_encode(file_get_contents(storage_path("client/profile/".$note->createdUser->profilePicture->file_name)))}}" alt="{{ucwords($note->createdUser->name)}}">
               @endif
               <span class="kt-notes__icon kt-font-boldest kt-hidden">
                   <i class="flaticon2-cup"></i>                                    
               </span> 
               <div class="custom-notes-user__info ">
                  {{$note->createdUser->name}}                                                  
               </div>    
               <div class="custom-notes-user__info date_info">
                   {{format_to_us_date($note->updated_at)}}                                               
               </div>                                 
           </div>    
           <div class="kt-notes__content">
            <div class="row mb-3" style="border-bottom: 1px dashed #d8d5d5;">
              <div class="col-md-12">
                    @if(auth()->user()->id == $note->userc_id)
                    <span class="pull-right" style="padding-left: 10px;">
                       <a href="javascript:void(0);" class="btn btn-clean btn-sm btn-icon btn-icon-md  editNote" data-content="{!!$note->description!!}" data-id="{{$note->id}}">
                           <i class="far fa-edit"></i>
                       </a>
                       <a href="javascript:void(0);" class="btn btn-clean btn-sm btn-icon btn-icon-md deleteNote" data-route="/admin/account/company/deletenote/{{$note->id}}">
                           <i class="flaticon-delete"></i>
                       </a>
                    </span>
                  @endif
              </div>
            </div>
                 
               <span class="custom-kt-notes__body">                                        
                  {!!$note->description!!}
               </span>  
           </div>                              
       </div>
@endforeach
<script>
	$('.editNote').off('click').on('click', function(e){
		e.preventDefault();
		let data= $(this).attr('data-content');
		let noteId= $(this).attr('data-id');
		$('#updateNote').attr('data-noteid', $(this).attr('data-id'));
		$('#noteDescription').val(data);
		$('#companyNoteAddForm').addClass('editMode').attr('data-noteid', noteId);
	})
	$('.deleteNote').off('click').on('click', function(e){
		e.preventDefault();
		let url = $(this).attr('data-route');
		confirmAction({
            btn: 'btn-danger',
            action: 'Delete',
            message: '<i class="la la-trash text-danger display-4"></i> <br> <br> Are you sure you want to delete this Note ?'
        }, function () {
            $.get(url, {
                _token: $('meta[name="csrf-token"]').attr('content')
            }).then(function (response) {
             $('#company_note_templater').html(response);
            	toastr.success('Note Deleted');
            }, function (err) {
                toastr.error('Failed To Delete!');
            });
        });
	})

</script>