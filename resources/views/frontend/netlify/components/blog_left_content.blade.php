<div class="col-md-8 col-sm-12">
    <main id="main" class="site-main">
        <article class="post post-large post-format-slide">
            <div class="post-thumbnail">
                <div class="post-slide owl-carousel">
                    <a href="single-blog.html"><img src="{{asset('netlify/images/blog/1.jpg')}}" alt="post"></a>
                    <a href="single-blog.html"><img src="{{asset('netlify/images/blog/2.jpg')}}" alt="post"></a>
                </div>
                <div class="entry-date">
                    <a href="#">
                        <span class="date">20 <b>March</b></span>
                    </a>
                </div>
            </div>
            <div class="entry-content">

                <h2 class="entry-title">
                    <a href="single-blog.html">7 Rules of user interface design</a>
                </h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five</p>
                <div class="entry-meta">
                    <span><i class="fa fa-user"></i> By <a href="#">Admin</a> </span>
                    <span><i class="fa fa-folder-open"></i> <a href="#">Web Development</a> </span>
                    <span><i class="fa fa-comment"></i> <a href="#">20 Comments</a></span>
                    <span><i class="fa fa-eye"></i> <a href="#">250 Views</a></span>
                </div>
            </div>
        </article>
        <article class="post post-large post-format-image">
            <div class="post-thumbnail">
                <a href="single-blog.html"><img src="{{asset('netlify/images/blog/2.jpg')}}" alt="post"></a>
                <div class="entry-date">
                    <a href="#">
                        <span class="date">20 <b>March</b></span>
                    </a>
                </div>
            </div>
            <div class="entry-content">

                <h2 class="entry-title">
                    <a href="single-blog.html">14 Rules of user interface design</a>
                </h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five</p>

                <div class="entry-meta">
                    <span><i class="fa fa-user"></i> By <a href="#">Admin</a> </span>
                    <span><i class="fa fa-folder-open"></i> <a href="#">Web Development</a> </span>
                    <span><i class="fa fa-comment"></i> <a href="#">20 Comments</a></span>
                    <span><i class="fa fa-eye"></i> <a href="#">250 Views</a></span>
                </div>
            </div>
        </article>
        <article class="post post-large post-format-video">
            <div class="post-thumbnail">
                <div class="post-video">
                    <a href="single-blog.html"><img src="{{asset('netlify/images/blog/3.jpg')}}" alt="post"></a>
                    <div class="video__inner">
                        <a href="https://www.youtube.com/watch?v=dBlBYP1pQgE" class="video__trigger"><i class="fa fa-play"></i></a>
                    </div>
                </div>
                <div class="entry-date">
                    <a href="#">
                        <span class="date">20 <b>March</b></span>
                    </a>
                </div>
            </div>
            <div class="entry-content">

                <h2 class="entry-title">
                    <a href="single-blog.html">20 Rules of user interface design</a>
                </h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five</p>

                <div class="entry-meta">
                    <span><i class="fa fa-user"></i> By <a href="#">Admin</a> </span>
                    <span><i class="fa fa-folder-open"></i> <a href="#">Web Development</a> </span>
                    <span><i class="fa fa-comment"></i> <a href="#">20 Comments</a></span>
                    <span><i class="fa fa-eye"></i> <a href="#">250 Views</a></span>
                </div>
            </div>
        </article>
        
        <article class="post post-large post-format-audio">
            <div class="post-audio single">
                <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/115637399&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
            </div>

            <div class="entry-content">

                <h2 class="entry-title">
                    <a href="single-blog.html">10 Rules of user interface design</a>
                </h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five</p>

                <div class="entry-meta">
                    <span><i class="fa fa-user"></i> By <a href="#">Admin</a> </span>
                    <span><i class="fa fa-folder-open"></i> <a href="#">Web Development</a> </span>
                    <span><i class="fa fa-comment"></i> <a href="#">20 Comments</a></span>
                    <span><i class="fa fa-eye"></i> <a href="#">250 Views</a></span>
                </div>
            </div>
        </article>
    </main>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li>
                <a href="#" aria-label="Previous">
                    <i class="fa fa-angle-left"></i> Pre
                </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
                <a href="#" aria-label="Next">
                Next <i class="fa fa-angle-right"></i>
                </a>
            </li>
        </ul>
    </nav>
</div>

<script>
    $('.post-slide').owlCarousel({
        center: false,
        items: 1,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        singleItem: false,
        loop: true,
        margin: 0,
        nav: true,
        dots: false
    });
</script>