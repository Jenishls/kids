<style>
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
</style>
<div class="row py-3 view_blog_row">
    <div class="blog-post-lg bordered col-lg-9">

        <div class="blog-single-content bordered viewBlogContent" >
            <div class="kt-portlet__head">
                <div class="kt-inbox__toolbar">
                    <div class="kt-inbox__actions">
                        <a class="kt-inbox__icon kt-inbox__icon--back viewBack" data-route="/admin/back/rightBlogContent">
                            <i class="fas fa-arrow-left"></i>
                        </a>

                        <a class="kt-inbox__icon editBlog" data-toggle="kt-tooltip" title="" data-original-title="Edit" data-route="/admin/edit/blog/{{$blog->id}}" data-toggle="modal" data-target="#sy_global_modal">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="kt-inbox__icon delButton" data-toggle="kt-tooltip" title="" data-original-title="Delete"  data-id="{{$blog->id}}">
                            <i class="fas fa-trash"></i>                    
                        </a>
                        
                    </div>
                    <div class="kt-inbox__controls">
                        <span class="kt-inbox__pages" data-toggle="kt-tooltip" title="" data-original-title="Records per page">
                            <span class="kt-inbox__perpage" data-toggle="dropdown">3 of 230 pages</span>
                        </span>

                        <button class="kt-inbox__icon" data-toggle="kt-tooltip" title="" data-original-title="Previose message">
                            <i class="fas fa-angle-left"></i>
                        </button>

                        <button class="kt-inbox__icon" data-toggle="kt-tooltip" title="" data-original-title="Next message">
                            <i class="fas fa-angle-right"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="blog-single-head viewBlogHead">
                <div class="view_blog_heading">
                    <h4 class="blog-single-head-title">{{ucfirst($blog->title)}}</h4>
                </div>

                <div class="headIcons">
                    <div class="blog-single-head-date px-3">
                        <i class="far fa-calendar-alt"></i>

                        <a href="javascript:;">{{$blog->updated_at->diffForHumans()}}</a>
                    </div>
                    {{-- <a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load editBlog" data-route="/edit/blog/{{$blog->id}}" data-toggle="modal" data-target="#sy_global_modal" title="Update details">
                        <i class="la la-edit"></i>
                    </a>
                    <a href="#" class="btn btn-hover-danger btn-icon btn-pill delButton" data-id="{{$blog->id}}" title="Delete">
                        <i class="la la-trash"></i>
                    </a>
                    <a href="#" class="btn btn-hover-brand btn-icon btn-pill viewBack" data-route="/back/rightBlogContent" title="Go Back">
                        <i class="fas fa-arrow-left"></i>
                    </a> --}}

                </div>
            </div>
            <hr>
            <div class="blog-single-img">

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
            <div class="blog-single-foot">
                <ul class="list-inline list-unstyled display_flex blog-post-ul">
                    <li class="uppercase blogCategoryTags" data-route="/admin/categoryBlog/{{$blog->category->id}}">
                        <a href="javascript:;">{{ucwords($blog->category->category)}}</a>
                    </li>
                    <li style="padding: 0px 10px;">|</li>

                    <li><span><i class="far fa-calendar-alt"></i> <span style="color: #5867dd;">{{$blog->updated_at->diffForHumans()}} </span></span></li>
                </ul>
                {{-- <div class="blog-single-head-date px-3">
                        <i class="far fa-calendar-alt"></i>

                        <a href="javascript:;">{{$blog->updated_at->diffForHumans()}}</a>
                    </div> --}}
                
            </div>
            <hr>

        </div>

    </div>

</div>
<script>
    $(document).off('click', '#addBlog').on('click', '#addBlog', function(e) {
        e.preventDefault();
        showModal({
            url: '/admin/add/blog'
        });
    });
    $(document).off('click', '.editBlog').on('click', '.editBlog', function(e) {
        e.preventDefault();
        let url = $(this).data('route');
        showModal({
            url
        });
    });
    $(document).off('click', '.delButton').on('click', '.delButton', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        delConfirm({
            url: "/admin/delete/blog/" + id,
            appendView: '#kt_body'
        });
    });
    $(document).off('click', '.viewBack').on("click", ".viewBack", function(e) {
        e.preventDefault();
        let url = $(this).attr("data-route");

        // function loadProfile(url) {
        supportAjax({
            url: url,

        }, function(resp) {
            $('#blogs-right').empty().append(resp);
            removeCustomClass('blogActive');
        }, function(err) {
            console.log(err);
        });
        // }
    });
</script>