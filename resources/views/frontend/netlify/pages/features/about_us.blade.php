@foreach($components as $component)
    @include($component->location.$component->file_name, ['posts' => $component->posts])
@endforeach

<script>

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
    
</script>