
<div class="modal-dialog editUserModalDialog" role="document">
    <div class="modal-content" >
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Photo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        
        <form id ="edit_profile_image" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="dropzone dropzone-default dropzone-success dz-clickable" id="kt_dropzone_3" style="border:1px dashed #c1c1c1;">
                    <div class="dropzone-msg dz-message needsclick">
                        {{-- <input class="dropzone-msg-title">Click here to upload photo.> --}}
                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                            {{-- <i class="fa fa-pen"></i> --}}
                            {{-- <p>Upload your photo</p> --}}
                             @if($user->profilePicture() != null)
                                <img src="data:image;base64,{{base64_encode(file_get_contents(storage_path("user/profile/".$user->profilePicture())))}}" alt=" " id="output" height="100" width="100">
                            @else
                                <img src="{{asset('media/users/default.jpg')}}" alt=" "  height="100" width="100">
                            @endif
                            <br>

                            <input id="profile_image" type="file" name="profile_pic" placeholder="Upload Your Photo"  onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                        </label>
                        <div id="nameError" style="color:red;"></div>
                        {{-- <span class="dropzone-msg-desc">Only image, pdf and psd files are allowed for upload</span> --}}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary sy_icon profile_image_update" data-route="/admin/update/profileImage/userImage" data-id="{{$user->id}}" >Upload</button>
            </div>
        </form>
    </div>
</div>
{{-- <script>
    function change_dp(){
        document.getElementsByClassName('output').src = window.URL.createObjectURL(this.files[0]);
    }
</script> --}}
