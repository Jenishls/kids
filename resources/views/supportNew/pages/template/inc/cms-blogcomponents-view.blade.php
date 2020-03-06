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
    .edit_span:hover, .editComponent:hover{
        background: #fbce44 !important;

    }
    .edit_span{
        padding-right: 0;
    }
    .delete_span:hover, .delButton:hover{
        background: #e8aee2 !important;
    }


    /* header */
    .kt-portlet__head {
        display: flex;
        -webkit-box-align: stretch;
        align-items: stretch;
        -webkit-box-pack: justify;
        justify-content: space-between;
        position: relative;
        border-bottom: 1px solid #ebedf2;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        min-height: 45px !important;
    }
    .kt-inbox__toolbar {
        position: relative;
        display: flex;
        -webkit-box-flex: 1;
        flex-grow: 1;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .kt-inbox__actions {
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        margin-right: 1rem;
    }
    .kt-inbox__icon {
        border: 0;
        background: 0 0;
        box-shadow: none;
        outline: 0!important;
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        height: 35px;
        width: 35px;
        transition: all .3s ease;
        cursor: pointer;
        margin: 0;
        border-radius: 4px;
    }
    .kt-inbox__icon.kt-inbox__icon--back {
        margin-right: 2.5rem;
    }
    .kt-inbox__actions .kt-inbox__icon {
        margin-right: .5rem;
    }

    .kt-inbox__controls {
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        margin-left: 1rem;
    }
    .kt-inbox__pages {
        margin-left: .5rem;
    }
    .blog-single-img{
        display: flex!important;
        align-items: center!important;
        justify-content: center!important;
    }
    .viewBlogHead{
        padding-top: 10px !important;
    }
    .viewBack:hover{
        background: #d7d7d7;
    }
</style>
{{-- {{dd($components)}} --}}
<div class="kt-portlet__head">
    <div class="kt-inbox__toolbar">
        <div class="kt-inbox__actions">
            <a class="kt-inbox__icon kt-inbox__icon--back viewBack" data-route="">
                <i class="fas fa-arrow-left"></i>
            </a>

            <a class="kt-inbox__icon editComponent" data-toggle="kt-tooltip" title="" data-original-title="Edit" data-route="/admin/edit/component/" data-toggle="modal" data-target="#sy_global_modal">
                <i class="fas fa-edit"></i>
            </a>
            <a class="kt-inbox__icon delButton" data-toggle="kt-tooltip" title="" data-original-title="Delete"  data-id="">
                <i class="fas fa-trash"></i>                    
            </a>
            
        </div>
        <div class="kt-inbox__controls">
            <button type="button" class="btn btn-bold btn-label-brand btn-sm add_field" data-toggle="modal" data-target="#sys_icon_model" id='add_cms_component' data-id="{{$menu_id}}">
                <span>
                    <i class="la la-plus"></i>
                    <span style="font-size: 1rem;">
                        Component
                    </span>
                </span>
            </button>
        </div>
        </div>
    </div>
</div>
@foreach ($components as $component)
    
    
    <div class="kt-inbox__messages" data-id="{{$component->id}}">
        <div class="kt-inbox__message kt-inbox__message--expanded">
            <div class="kt-inbox__head" style="display: flex;">
                <span class="kt-media" data-toggle="expand">
                    {{-- @if ($component->created_by->profilePicture())
                        <img src="data:image;base64,{{base64_encode(file_get_contents(storage_path("user/profile/".$component->created_by->profilePicture())))}}" alt="">
                    @else
                        <img src="{{asset('media/users/default.jpg')}}" alt="">
                    @endif --}}
                    <span></span>
                </span>
                <div class="kt-inbox__info" data-id ="{{$component->id}}" style="cursor: pointer;">
                    <div class="kt-inbox__author" data-toggle="expand" style="display:flex">
                        <a href="#" class="kt-inbox__name">{{ucfirst($component->title)}}</a>

                        {{-- <div class="kt-inbox__status">
                            <span class="kt-badge kt-badge--success kt-badge--dot"></span> {{$component->created_at->diffForHumans()}}
                        </div> --}}
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
                            {{ucfirst($component->sub_header)}}
                        </div>
                    </div>
                </div>
                <div class="kt-inbox__actions">
                    {{-- <div class="kt-inbox__datetime" data-toggle="expand">
                        {{$blog->created_at->toDayDateTimeString()}}
                    </div> --}}

                    {{-- <div class="kt-inbox__group">
                        <span class="kt-inbox__icon kt-inbox__icon--label kt-inbox__icon--light view_span viewBlog" data-toggle="kt-tooltip" data-placement="top" title="" data-original-title="View" data-route="/view/component/{{$component->id}}">
                            <i title="View Component" class="la la-eye"></i>
                        </span>
                            
                        <span class="kt-inbox__icon kt-inbox__icon--label kt-inbox__icon--light edit_span edit_blog editBlog"  data-id="" data-route="/edit/component/{{$component->id}}" data-placement="top" title="Edit Component" >
                            <i class="la la-edit"></i>
                        </span>
                        
                        <span class="kt-inbox__icon kt-inbox__icon--light delete_span delButton" data-toggle="kt-tooltip" data-placement="top" title="Delete Component" data-original-title="Delete" data-id="{{$component->id}}">
                            <i class="la la-trash"></i>
                        </span>
                    </div> --}}
                </div>
            </div>
            <div class="kt-inbox__body blog_toggle_{{$component->id}}" id="div_body_{{$component->id}}">
                <div class="kt-inbox__text">
                    <div class="blog-single-img" style="display:flex; justify-content:center;">

                        @if($component->file)
                        <img class="media-object media_obj" alt="" src="data:image;base64,{{base64_encode(file_get_contents(storage_path('app/blog'.'/'.$blog->file->file_name)))}}">
                        @else
                        <img class="media_obj" src="media/blog/No_Image_Available.jpg">
                        @endif
                    </div>
                    <hr>
                    <div class="blog-single-desc" style="margin-bottom: 16px;">
                        <p>{!!$component->content!!} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
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


$(document).off('click', '#add_cms_component').on('click', '#add_cms_component', function(e){
    e.preventDefault();
    let menu_id = $(this).attr('data-id');
    showModal({
        url:'/admin/cms/addmodal/component/'+menu_id
    })
})
</script>