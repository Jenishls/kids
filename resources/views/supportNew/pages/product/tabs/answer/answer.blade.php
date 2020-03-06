<div class="kt-sc-faq-3 kt-negative-spacing"></div>
<div class="kt-sc-faq-3 kt-sc-faq-3--accordion">
    <div class="accordion accordion-solid  accordion-toggle-svg" id="faq">

        @foreach ($product->questions as $faq)
        <div class="card">
            <div class="card-header" id="faqHeading3">
                <div class="card-title collapsed" data-toggle="collapse" data-target="#faq{{$loop->iteration}}" aria-expanded="false" aria-controls="faq{{$loop->iteration}}">
                    {{$faq->question}}
                    <div class="ml-auto">
                        @if (!$faq->answer)
                        <button type="button" class="btn btn-hover-brand btn-elevate-hover btn-icon btn-sm btn-icon-md btn-circle reply_faq" data-url = "admin/products/tab/question/reply/{{ $faq->id }}">
                            <i class="fa fa-reply"></i>
                        </button>
                        @else
                        <button type="button" class="btn btn-hover-brand btn-elevate-hover btn-icon btn-sm btn-icon-md btn-circle edit_reply">
                            <i class="far fa-edit"></i>
                        </button>
                        @endif
                        <button type="button" class="btn btn-hover-brand btn-elevate-hover btn-icon btn-sm btn-icon-md btn-circle del_faq" data-url ="admin/products/tab/question/delete/{{$faq->id}}">
                            <i class="la la-trash"></i>
                        </button>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon ">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                            <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                            <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>
                            </g>
                        </svg> 
                    </div>
                </div>
            </div>
            <div id="faq{{$loop->iteration}}" class="collapse" aria-labelledby="faqHeading3" data-parent="#faq">
                <div class="card-body" >
                    @if ($faq->answer)
                    <div class="faqreply">
                        {{ $faq->answer->question}}
                    </div>

                    <div id="faq_container" style="display: none;">
                        <form class="kt-form kt-form--label-right editReplyForm">   
                            @csrf
                            <textarea class="form-control" name="answer" rows="10">{{ $faq->answer->question}}</textarea>
                            <button type="" class="btn btn-default btn-sm btn-pill cancelReply" style="margin-top: 10px; margin-right: 10px;">Cancel</button>
                            <button type="" class="btn btn-success btn-sm btn-pill updateReply" data-url="/admin/products/tab/faq/reply/update/{{$faq->answer->id}}" style="margin-top: 10px;">Edit</button>
                        </form>
                    </div>
                    @else
                    No Answers made yet.
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    $(document).off('click', '.reply_faq').on('click', '.reply_faq', function(e) {
        let url = $(this).attr("data-url");
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: url
        });
    })

    $('.edit_reply').off('click').on('click', function(e){
        e.preventDefault();
        $(this).hide();
        $(this).parent().parent().parent().parent().find('.faqreply').hide();
        $(this).parent().parent().parent().parent().find('#faq_container').show();
    });
    
    $('.cancelReply').off('click').on('click', function(e){
        e.preventDefault();
        console.log($(this).parent().parent().parent().parent().parent());
        $(this).parent().parent().parent().parent().parent().find('.edit_reply').show();
        $(this).parent().parent().parent().parent().parent().find('.faqreply').show();
        $(this).parent().parent().parent().parent().parent().find('#faq_container').hide();
    });

    $(document).off('click','.updateReply').on('click','.updateReply',function(e){
        e.preventDefault();
        console.log($(this).parent()[0]);
        let url = $(this).attr('data-url');
        $.ajax({
            url:url,
            method: 'POST',
            data: new FormData($(this).parent()[0]),
            contentType: false,
            processData: false,
            success: function(response){
                toastr.success(response.message);
                $.ajax({
                        method: "get",
                        url: "admin/products/tab/answer/{{$product->id}}",
                        beforeSend: function () {
                            $("#tab-detail_container").html(cssload);
                        },
                        success: function (response, status, xhr) {
                            setTimeout(function () {
                                $("#tab-detail_container").html(response);
                            }, 200);
                        },
                        error: function (xhr, status, error) {}
                    });
                
            }, 
            error:function({status, responseJSON})
            {
               
            }
        });
    });

    $(document).off('click', '.del_faq').on('click', '.del_faq', function(e){
        e.preventDefault();
        console.log($(this).attr('data-url'));
        delConfirm({
			url: $(this).attr('data-url'),
			header: $('#productColorDataTable')
        });
    })
</script>