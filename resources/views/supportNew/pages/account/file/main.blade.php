
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-sm btn-brand btn-pill btn-elevate btn-icon-sm custom-button pull-right" id="addFile" data-id="{{$company->id}}">
            <i class="la la-plus"></i>
            Files
        </button>
    </div>
</div>
<div class="kt-section">
    <div class="kt-section__content" id="fileTemplater">
        @include('supportNew.pages.account.file.fileTemplater')
    </div>
</div>
<script>
    $(document).off('click', '#addFile').on('click', '#addFile', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        showModal({
            url: `/admin/account/files/add/${id}`,
        })
    })
     $(document).off('click', '.downloadFile').on('click', '.downloadFile', function(e){
        e.preventDefault();
        let filename = $(this).attr('data-file');
        $(`<a href="/admin/account/file/download/${filename}" download="" />`)[0].click();
    });
     $(document).off('click', '.delFile').on('click', '.delFile', function(e){
        e.preventDefault();
        let url = $(this).attr('data-route');
        console.log(url);
        delConfirm({
            url
        },function(resp){
            $('#fileTemplater').html(response);
            toastr.success('<strong>Attachments Deleted Successfully!</strong>');
        })
       
    });
</script>