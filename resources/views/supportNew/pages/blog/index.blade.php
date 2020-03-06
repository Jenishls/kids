{{-- {{dd($blog->id)}} --}}
<div id="datatable_container" class="usersControlContent">
    <div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Blog
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">SETTINGS</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Blog</a>
                </div>
            </div>
        </div>
        <div class="kt-subheader__wrapper">
            <a href="#" class="btn btn-brand btn-elevate btn-icon-sm" id="add_blog" data-id=""><i class="la la-plus"></i>Blog
                <!-- Company -->
            </a>
        </div>
    </div>
    <div class="row py-3 main">
        <div class="col-lg-3 blog-sidebar-content">
            <div class="blog-single-sidebar bordered blog-container">
                <div class="blog-single-sidebar-search">
                    <div class="input-group mb-3 input-group-sm userInputGroup">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Blog</span>
                        </div>
                        <input type="text" class="form-control" data-route="/admin/blog/search/" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Keywords.." id="blogSearch" autocomplete="off">
                    </div>
                </div>
                <div class="blog-single-sidebar-recent blog-single-sidebar">
                    <div class="rec_title"> 

                        <h3 class="blog-sidebar-title uppercase" style="    width: 151px;"><i class="fas fa-sync" style="font-size: 13px;padding-right: 10px; color: #ffcd35;"></i>Recent Posts</h3>
                    </div>
                    <ul>
                        @foreach($blogs as $blog)
                        <li class="kt-nav__item viewBlog" data-route="/admin/view/blog/{{$blog->id}}">
                            <a href="javascript:;">{{ucfirst($blog->title)}}</a>
                        </li>
                        {{-- <hr> --}}
                        @endforeach
                    </ul>
                </div>


                @if($categories->count())
                <div class="blog-single-sidebar-links blog-single-sidebar" style="margin-top:50px;">
                    <div class="cat_title">
                        <h3 class="blog-sidebar-title uppercase">
                            <i class="fas fa-bars" style="font-size: 13px;padding-right: 10px; color: #ffcd35;">
                            </i>
                            Categories
                        </h3>
                    </div>
                    
                    <ul>
                        @foreach($categories as $category)
                        <li class="uppercase blogCategoryTags" data-route="/admin/categoryBlog/{{$category->id}}">
                            <a href="javascript:;">{{ucwords($category->category)}}</a>
                        </li>
                        {{-- <hr> --}}
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
        <div class="blog-post-lg bordered blog-container-right col-lg-8" id="blogs-right">
            
                @include('support.pages.blog.inc.blogRightContent')
            
        </div>
        

    </div>
</div>




<script>
    $(document).off('click', '#add_blog').on('click', '#add_blog', function(e) {
        e.preventDefault();
        let id = $(this).data('id'); 
        showModal({
            url: '/admin/add/blog' + id,
        });
        // supportAjax({
        //     url: '/add/blog',
        // }, function(resp){
        //     $('.blog-container-right').empty().append(resp);
        // }, function(err){

        // });
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
    $(document).off('click', '.viewBlog').on("click", ".viewBlog", function(e) {
        e.preventDefault();
        $(this).siblings().removeClass('blogActive');
        $(this).addClass('blogActive');
        let url = $(this).attr("data-route");
        supportAjax({
            url: url,

        }, function(resp) {
            $('.blog-container-right').empty().append(resp);
        }, function(err) {
            console.log(err);
        });
    });

    $(document).off('click', '.blogCategoryTags').on("click", ".blogCategoryTags", function(e) {
        e.preventDefault();
        
        $(this).siblings().removeClass('blogActive');
        $(this).addClass('blogActive');

        let url = $(this).attr("data-route");
        supportAjax({
            url: url,

        }, function(resp) {
            $('.blog-container-right').empty().append(resp);
            $('.viewBack').show();

        }, function(err) {
            console.log(err);
        });
    });

    

    $(document).ready(function() {
        $('#blogSearch').off('keyup', '#blogSearch').on('keyup', function(e) {
            let value= $(this).val();
            if (value.length >= 3) {
                $.ajax({
                    url: "/admin/blogs/search",
                    method: 'POST',
                    headers: {
                        'X-CSRF-Token': '{{csrf_token()}}'
                    },
                    data:{
                        searchText: value,
                       
                    },
                    success: function(resp) {
                        $('.blog-container-right').empty().append(resp);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }

            if (value == '') {

                $.ajax({
                    method: "get",
                    url: "/admin/back/rightBlogContent",
                    success: function(resp) {
                        $('.blog-container-right').empty().append(resp);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }

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