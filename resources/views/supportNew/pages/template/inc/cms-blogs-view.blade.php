<style> 
    .kt-inbox .kt-inbox__view .kt-inbox__messages {
        margin-top: 15px;
    }
    .kt-inbox .kt-inbox__view .kt-inbox__messages .kt-inbox__message {
    padding: 0 25px 15px 25px;
    margin-bottom: 15px;
    border-radius: 4px;
    -webkit-box-shadow: 0 3px 7px 0 rgba(0,0,0,.05);
    box-shadow: 0 3px 7px 0 rgba(0,0,0,.05);
    }
    .kt-inbox .kt-inbox__view .kt-inbox__messages .kt-inbox__message .kt-inbox__head {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    cursor: pointer;
    }
    .kt-media>img{
        height: 54px;
    border-radius: 4px;
    }
    .kt-inbox__info{
        margin-left: 16px;
    }
    .kt-inbox__info {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding: .5rem .5rem .5rem 0;
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    }
    .kt-inbox__info .kt-inbox__author .kt-inbox__name {
        color: #48465b;
        font-weight: 600;
        font-size: 1.1rem;
        margin-right: .5rem;
    }
    .kt-inbox__head .kt-inbox__info .kt-inbox__author .kt-inbox__status .kt-badge {
        margin-right: .4rem;
        margin-bottom: .1rem;
    }
    .kt-inbox__info .kt-inbox__author .kt-inbox__status {
        color: #a2a5b9;
        font-weight: 500;
    }
     .kt-inbox__head .kt-inbox__actions {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }
    .kt-inbox__head .kt-inbox__actions .kt-inbox__datetime {
        color: #a2a5b9;
        font-weight: 500;
        font-size: 1rem;
        margin-right: 1.5rem;
    }
     .kt-inbox__icon {
        border: 0;
        outline: 0!important;
        -webkit-box-shadow: none;
        box-shadow: none;
        outline: 0!important;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        height: 35px;
        width: 35px;
        -webkit-transition: all .3s ease;
        transition: all .3s ease;
        cursor: pointer;
        margin: 0;
        border-radius: 0;
        border-radius: 4px;
    }
    .kt-inbox__icon i {
        color: #8e96b8;
    }
    .kt-inbox__icon i {
        font-size: 1.1rem;
    }
    .kt-inbox__group{
        display: flex;
    }
     .kt-inbox__body {
        display: none;
        padding: 1rem 0;
    }
     .kt-inbox__message {
        padding: 10px 15px 10px 15px;
        margin-bottom: 15px;
        border-radius: 4px;
        -webkit-box-shadow: 0 3px 7px 0 rgba(0,0,0,.05);
        box-shadow: 0 3px 7px 0 rgba(0,0,0,.05);
        border-top: 1px solid #f6f6f6;
    }
    .view_span:hover{
        background: #22b9ff;
    }
    .kt-inbox__icon:hover>i {
        cursor: pointer !important;
        color: white !important;
    }
    .edit_span:hover{
        background: #fbce44;

    }
    .edit_span{
        padding-right: 0;
    }
    .delete_span:hover{
        background: #e8aee2;
    }
</style>
<div class="">
           
    
{{-- @foreach($blogs as $blog)
    <div class="well">
        <div class="media">
            <div class="viewBlog" data-route="/view/blog/{{$blog->id}}">
                <a class="pull-left" href="javascript:;">
                        @if($blog->file)
                        <img class="media-object media_image" src="data:image;base64,{{base64_encode(file_get_contents(storage_path('app/blog'.'/'.$blog->file->file_name)))}}">
                        @else
                        <img class="media-object media_image" src="media/blog/No_Image_Available.jpg">
                        @endif
                    </a>
            </div>
            
            <div class="media-body p_l_15">
                <div class="d_s">
                    <div class="viewBlog" data-route="/view/blog/{{$blog->id}}">
                        <h4 class="media-heading" style="font-size:1.4rem">{{ucfirst($blog->title)}}</h4>
                    </div>
                    
                    <div class="right_content_icons" style="display: flex;">
                        <a class="btn btn-hover-brand btn-icon btn-pill viewBlog" onclick="event.preventDefault();" data-route="/view/blog/{{$blog->id}}">
                            <i class="la la-eye" title="View Blog"></i>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load editBlog" data-route="/edit/blog/{{$blog->id}}" data-toggle="modal" data-target="#sy_global_modal" title="Update details">
                            <i class="la la-edit"></i>
                        </a>
                        <a href="#" class="btn btn-hover-danger btn-icon btn-pill delButton" data-id="{{$blog->id}}" title="Delete">
                            <i class="la la-trash"></i>
                        </a>
                        <a class="btn btn-hover-brand btn-icon btn-pill viewBack " style="display:none;" data-route="/back/rightBlogContent" title="Go Back" >
                            <i class="fas fa-arrow-left"></i>
                        </a>

                    </div>
                </div>
                
                <p class="blog_para_min_height blog-post-desc">
                        {{str_limit(strip_tags($blog->description),1000,'...')}}
                </p>
                <ul class="list-inline list-unstyled display_flex blog-post-ul">
                    <li class="uppercase blogCategoryTags" data-route="/categoryBlog/{{$blog->category->id}}" title="{{ucwords($blog->category->category)}}">

                        <a href="javascript:;">{{ucwords($blog->category->category)}}</a>
                    </li>
                    <li style="padding: 0px 10px;">|</li>

                    <li><span><i class="far fa-calendar-alt"></i> <span style="color: #5867dd;">{{$blog->created_at->diffForHumans()}} </span></span></li>
                    <li>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endforeach --}}
    <div class="col-md-12" style="padding:0;">
        <div class="row search_row">
            <div class="col-xl-8 order-2 order-xl-1 serach_col" style="padding: 10px 7px;">
                <div class="form-group m-form__group row align-items-center" style="margin-left:0px;">
                    <div class="col-md-6">
                        <div class="m-input-icon m-input-icon--left">
                            <input type="text" class="form-control m-input" placeholder="Search by blog category" id="cms_blog_category">
                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                <span>
                                    <i class="la la-search"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rp_btn col-xl-4 order-1 order-xl-2">
                
                <div class="kt-subheader__wrapper">
                <button type="button" class="btn btn-bold btn-label-brand btn-sm add_field" data-toggle="modal" data-target="#sys_icon_model" data-id="1" id="add_cms_blog">
                        <span>
                            <i class="la la-plus"></i>
                            <span style="font-size: 1rem;">
                                Blog
                            </span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        {{-- {{dd($blogs)}} --}}
        @foreach ($blogs as $blog)
            
        <div class="kt-inbox__messages" data-id="{{$blog->id}}">
            <div class="kt-inbox__message kt-inbox__message--expanded">
                <div class="kt-inbox__head" style="display: flex;">
                    <span class="kt-media" data-toggle="expand">
                        @if ($blog->created_by->profilePicture())
                            <img src="data:image;base64,{{base64_encode(file_get_contents(storage_path("user/profile/".$blog->created_by->profilePicture())))}}" alt="">
                        @else
                            <img src="{{asset('media/users/default.jpg')}}" alt="">
                        @endif
                        <span></span>
                    </span>
                    <div class="kt-inbox__info" data-id ="{{$blog->id}}" style="cursor: pointer;">
                        <div class="kt-inbox__author" data-toggle="expand" style="display:flex">
                            <a href="#" class="kt-inbox__name">{{ucfirst($blog->created_by->name)}}</a>

                            <div class="kt-inbox__status">
                                <span class="kt-badge kt-badge--success kt-badge--dot"></span> {{$blog->created_at->diffForHumans()}}
                            </div>
                        </div>
                        <div class="kt-inbox__details">
                            <div class="kt-inbox__tome">
                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-left">
                                    <table class="kt-inbox__details">
                                        <tbody><tr>
                                            <td>from</td>
                                            <td>Mark Andre</td>
                                        </tr>
                                        <tr>
                                            <td>date:</td>
                                            <td>Jul 30, 2019, 11:27 PM</td>
                                        </tr>
                                        <tr>
                                            <td>from:</td>
                                            <td>Mark Andre</td>
                                        </tr>
                                        <tr>
                                            <td>subject:</td>
                                            <td>Trip Reminder. Thank you for flying with us!</td>
                                        </tr>
                                        <tr>
                                            <td>reply to:</td>
                                            <td>mark.andre@gmail.com</td>
                                        </tr>
                                    </tbody></table>
                                </div>
                            </div>
                            <div class="kt-inbox__desc">
                                {{ucfirst($blog->title)}}
                            </div>
                        </div>
                    </div>
                    <div class="kt-inbox__actions">
                            <div class="kt-inbox__datetime" data-toggle="expand">
                                {{-- Jul 15, 2019, 11:19AM --}}
                                {{$blog->created_at->toDayDateTimeString()}}
                            </div>

                            <div class="kt-inbox__group">
                                <span class="kt-inbox__icon kt-inbox__icon--label kt-inbox__icon--light view_span" data-toggle="kt-tooltip" data-placement="top" title="" data-original-title="View">
                                    <i title="View profile" class="la la-eye"></i>
                                </span>
                            <span class="kt-inbox__icon kt-inbox__icon--label kt-inbox__icon--light edit_span edit_blog"  data-id="" data-route="/admin/edit/blog/1" data-placement="top" title="Edit Blog" >
                                    <i class="la la-edit"></i>
                                </span>
                                {{-- <span class="kt-inbox__icon kt-inbox__icon--reply kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="top" title="" data-original-title="">
                                    <i class="flaticon2-reply-1"></i>
                                </span> --}}
                                <span class="kt-inbox__icon kt-inbox__icon--light delete_span" data-toggle="kt-tooltip" data-placement="top" title="Delete Blog" data-original-title="Delete">
                                    <i class="la la-trash"></i>
                                </span>
                            </div>
                        </div>
                </div>
            <div class="kt-inbox__body blog_toggle_{{$blog->id}}" id="div_body_{{$blog->id}}">
                    <div class="kt-inbox__text">
                        <div class="blog-single-img" style="display:flex; justify-content:center;">

                @if($blog->file)
                <img class="media-object media_obj" alt="" src="data:image;base64,{{base64_encode(file_get_contents(storage_path('app/blog'.'/'.$blog->file->file_name)))}}">
                @else
                <img class="media_obj" src="media/blog/No_Image_Available.jpg">
                @endif
            </div>
            <hr>
            <div class="blog-single-desc" style="margin-bottom: 16px;">
                <p>{!!$blog->description!!} </p>
            </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
<script>
$(document).ready(function () {
    // Configure/customize these variables.
    var showChar = 600; // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Show more >";
    var lesstext = "Show less";


    $('.blog-post-desc').each(function () {
        var content = $(this).html();

        if (content.length > showChar) {

            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);

            var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

            $(this).html(html);
        }

    });

    $(".morelink").click(function () {
        if ($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});

$('.kt-inbox__info').click(function(){
    let id = $(this).attr('data-id');
    $(`#div_body_${id}`).toggle(`.blog_toggle_${id}`);
});

$(document).off('click', '#add_cms_blog').on('click', '#add_cms_blog', function(e){
		e.preventDefault();
		e.stopPropagation();
		showModal({
			url: '/admin/add/blog'	
		});
	}).off('click', '.edit_blog').on('click', '.edit_blog', function(e){
		e.preventDefault();
		showModal({
			url: $(this).data('route')	
		});
	}).off('click', '.view_blog').on('click', '.view_blog', function(e){
		e.preventDefault();
		showModal({
			url: $(this).data('route')	
		});
    });
    

</script>