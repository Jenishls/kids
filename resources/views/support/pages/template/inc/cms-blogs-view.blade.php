<div class="row">
        
        {{-- <div class="inner">
            <span>i</span>
            <h1>Hey</h1>
            <p>This is an informative card that will tell you something that's... well, important!</p>
        </div> --}}
        {{-- <a href="" class="animate_a">
            <svg>
                <rect></rect>
            </svg>
            Button
        </a> --}}
            
    <div class="col-lg-12 col-md-12 col-sm-12">
        @foreach($blogs as $blog)
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
                        {{-- <a class="pull-left" href="#">
                            <img class="media-object media_image" src="http://placekitten.com/150/150">
                        </a> --}}
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
                            {{-- <li style="padding: 0px 10px;">|</li>
                            <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span> --}}
                            {{-- <li>|</li> --}}
                            <li>
                            <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- @foreach($blogs as $blog)
    <div class="blog-right-content col-md-4">
        <div class="blog-img-thumb viewBlog" data-route="/view/blog/{{$blog->id}}">
            <a href="javascript:;">
                @if($blog->file)
                <img src="data:image;base64,{{base64_encode(file_get_contents(storage_path('app/blog'.'/'.$blog->file->file_name)))}}">
                @else
                <img src="media/blog/No_Image_Available.jpg">
                @endif
            </a>
        </div>
        <div class="blog-post-content">
            <div>
                <div class="blog-content-head">
                    <div class="viewBlog" data-route="/view/blog/{{$blog->id}}">
                        <h2 class="blog-title blog-post-title">

                            <a href="javascript:;">{{ucfirst($blog->title)}}</a>
                        </h2>
                    </div>
                    <div class="right_content_icons">
                        <a class="btn btn-hover-brand btn-icon btn-pill viewBlog" onclick="event.preventDefault();" data-route="/view/blog/{{$blog->id}}">
                            <i class="la la-eye" title="View Blog"></i>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load editBlog" data-route="/edit/blog/{{$blog->id}}" data-toggle="modal" data-target="#sy_global_modal" title="Update details">
                            <i class="la la-edit"></i>
                        </a>
                        <a href="#" class="btn btn-hover-danger btn-icon btn-pill delButton" data-id="{{$blog->id}}" title="Delete">
                            <i class="la la-trash"></i>
                        </a>

                    </div>
                </div>
                <div class="blogDescription">
                    <p class="blog-post-desc my-2">

                        {{str_limit(strip_tags($blog->description),450,'...')}}

                    </p>
                </div>
            </div>
            <div class="blog-post-foot">
                <ul class="blog-post-tags">

                    <li class="uppercase blogCategoryTags" data-route="/categoryBlog/{{$blog->category->id}}">

                        <a href="javascript:;">{{ucwords($blog->category->category)}}</a>
                    </li>
                </ul>
                <div class="blog-post-meta-content">
                    <div class="blog-post-meta mx-4">
                        <i class="far fa-calendar-alt"></i>
                        <a href="javascript:;">{{$blog->created_at->diffForHumans()}}</a>
                    </div>
                    <!-- <div class="blog-post-meta">
                                        <i class="far fa-comment"></i>
                                        <a href="javascript:;">14 Comments</a>
                                    </div> -->
                </div>
            </div>
        </div>


    </div>
    @endforeach --}}
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
</script>