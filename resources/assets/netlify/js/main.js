/*********************************************************************

    Note: style js.

*********************************************************************/

/*************************************************************************
                            INDEX
*************************************************************************/
/*
    
    00. Sticky Header
    01. Mobile Menu
    03. Progress Bar
    04. scrollUp jquery active
    04. Youtube video trigger 
    05. Slider
    06. Services Carousel
    07. Post Slider
    08. Team Carousel
    09. Client Testimonail Carousel
    10. Masonry
    11. IsoTop Postfolio
    12. Counter
    13. Google Map


*/
/*********************************************************************/





(function($) {
    'use strict';
    
    /*-------------------------------------------
    	00. Sticky Header
    --------------------------------------------- */
    var stickyMenu = $('.site-header').clone().appendTo('#sticky-header');
    $(window).on('scroll', function() {
        var w = $(window).width();
        if (w > 992) {
            if ($(this).scrollTop() > 600) {
                $('#sticky-header').slideDown(300);
            } else {
                $('#sticky-header').slideUp(500);
            }
        }
    });
    
    /* ---------------------------------------------
        01. Mobile Menu
    --------------------------------------------- */
    $('header nav').meanmenu({
        meanMenuClose: 'X',
        meanMenuCloseSize: '18px',
        meanScreenWidth: '991',
        meanExpandableChildren: true,
        meanMenuContainer: '.mobile-menu'
    });   
    
    
    /* ---------------------------------------------
        02. Progress Bar
    --------------------------------------------- */
    $(".team_details_area").waypoint(function() {
        $('.progress-bar').css("width",
            function() {
                return $(this).attr("aria-valuenow") + "%";
            }
        );
        offset: 'bottom-in-view'
    });

    /*-------------------------------------------
    	03. scrollUp jquery active
    --------------------------------------------- */
	$.scrollUp({
	    scrollText: '<i class="fa fa-angle-up"></i>',
	    easingType: 'linear',
	    scrollSpeed: 900,
	    animation: 'fade'
	});

    /*-------------------------------------------
        04. Youtube video trigger 
    --------------------------------------------- */
    $('.video__trigger, .btn_video').yu2fvl();
    

    /* ---------------------------------------------
        05. Slider
    --------------------------------------------- */
    $('.slider_inner').owlCarousel({
        center: false,
        items: 1,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        singleItem: false,
        loop: true,
        margin: 0,
        nav: false,
        dots: true
    });  
    /* ---------------------------------------------
        06. Services Carousel
    --------------------------------------------- */
    $('.services_carousel').owlCarousel({
        center: false,
        items: 1,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        singleItem: false,
        loop: true,
        margin: 0,
        nav: false,
        dots: true
    });  
    
    /* ---------------------------------------------
        07. Post Slider
    --------------------------------------------- */
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

    
    /* ---------------------------------------------
        08. Team Carousel
    --------------------------------------------- */
    var item = 4;
    $('#team_carousel').owlCarousel({
        center: false,
        items: item,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        singleItem: false,
        loop: true,
        margin: 30,
        nav: true,
        dots: false,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        responsive: {
            280: {
                items: 1
            },
            400: {
                items: 1
            },
            500: {
                items: 1
            },
            768: {
                items: 2
            },
            800: {
                items: 2
            },
            1000: {
                items: 3
            },
            1200: {
                items: item
            },
            1400: {
                items: item
            }
        }
    });  
    
    /* ---------------------------------------------
        09. Client Testimonail Carousel
    --------------------------------------------- */
    var item = 1;
    $('.client_testimonail_carousel').owlCarousel({
        center: false,
        items: item,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        singleItem: false,
        loop: false,
        margin: 30,
        nav: false,
        dots: true
    });  

    
    /* ---------------------------------------------
        10. Masonry
    --------------------------------------------- */
    if ($('#masonry').length > 0) {
        var container = $('#masonry');
        container.imagesLoaded(function () {
            container.masonry({
                itemSelector: '.grid'
            });
        });
    }
    
    /* ---------------------------------------------
        14. IsoTop Postfolio
    --------------------------------------------- */
    var $modelisotop = $('.recent_work_list');
    $modelisotop.isotope({
        filter: '*',
        animationOptions: {
            duration: 1000,
            easing: 'linear',
            queue: false
        }
    });
    $('.recent_work_nav > li a').on("click", function () {
        $('.recent_work_nav > li a').removeClass('active');
        $(this).addClass('active');
        var selector = $(this).attr('data-filter');
        $modelisotop.isotope({ 
            filter: selector,
            animationOptions: {
                duration: 1000,
                easing: 'linear',
                queue: false
            }
        });
        return false;
    });
    
    /* ---------------------------------------------
        12. Counter
    --------------------------------------------- */
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });
    
    /* ---------------------------------------------
        13. Google Map
    --------------------------------------------- */
    if ($('#gmaps').length) {
        var map;
        map = new GMaps({
            el: '#gmaps',
            lat: 19.411364,
            lng: -99.164961,
            scrollwheel: false,
            zoom: 16,
            zoomControl: true,
            panControl: false,
            streetViewControl: false,
            mapTypeControl: false,
            overviewMapControl: false,
            clickable: false
        });  
        map.addMarker({
            lat: 19.410217,
            lng: -99.165139,
            animation: google.maps.Animation.DROP,
            verticalAlign: 'bottom',
            horizontalAlign: 'center'
        }); 
    }

})(jQuery);