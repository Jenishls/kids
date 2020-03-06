
$(document)
    .off("click", ".load_pages")
    .on("click", ".load_pages", function (e) {
        e.preventDefault();        
        let url = $(this).attr("data-route");
        let slug = $(this).attr('data-slug');
        if(!slug){
            console.warn("Slug is not available as data-slug attribute")
        }
        fetch(url)
        historyCreater(url, "/"+slug);
    });

$(document).off('click', '[rel="js--norouter-load"]').on('click', "[rel='js--norouter-load']", function(e){
    e.preventDefault()
    fetch($(this).attr('data-route-norouter'));
});


// $(document).off('click', '.login_menu').on('click', '.login_menu', function (e) {
//     e.preventDefault();
//     let url = $(this).attr("data-route");
//     cratesAjax({
//             url: url,
//             method: "GET",
//             data: ""
//         },
//         function (response) {
//             $("body")
//                 .empty()
//                 .append(response);
//             historyCreater(url, "login");
//         },
//         function (error) {
//             console.log(error);
//         }
//     );
// });

var historyCreater = (state, url) => {
    history.pushState(state, null, url);   
}

window.onload = function(e){
    let url = window.history.state;
    url ? fetch(url) : '';
    getCartDetails();
}

window.onpopstate = function(e) {
    if (e.state != null) {
        fetch(e.state);
    }else{
        window.location.href= '/'
    }
    
}

function getCartDetails(){
    cratesAjax({
        url : '/crates/cart',
        method: "get"        
    }, ({data : {items, totalQuantity = 0, price, total}}) => {
        totalQuantity ? updateCart(totalQuantity): '';
    })
}


function updateCart(totalQuantity){
    $('#shopping--cart').removeClass('dp-none').addClass('animated rollIn').text(totalQuantity);
}

function fetch(url){
    cratesAjax({
        url,
        method: "GET",
        data: ""
    },
    function (response) {
        $("#page-section")
            .empty()
            .append(response);
        window.scrollTo({
            top: 100,
            left: 100,
            behavior: 'smooth'
        });      
        
        /** highlisght */
        let currentMenu = $(`[data-route="${url}"]`);
        currentMenu.closest('li').siblings().children().removeClass('active')
        currentMenu.addClass('active');
    },
    function (error) {
        console.log(error);
    });
}

$(document).off('scroll').on('scroll', function(e){
    e.preventDefault()
    let el = $('.js--primary-navbar');
     var w = window.innerWidth;
    if ((w<= 991) && (el.offset().top <= window.pageYOffset)) {
        $('.nav-check').css("display","flex");
        $('.nav-check').show();
    }else{
        $('.nav-check').hide();
    }
    if(el.offset().top <= window.pageYOffset){
        $('.li-logo').show();
    }else{
        $('.li-logo').hide();
    }
});

clickEvent(".cs-nav-link")(makeActive)
function makeActive() {
    $(document).find(".cs-nav-link").removeClass("active-nav");
    $(this).addClass("active-nav");
}


$(document).find(".account_dropdown").on("hover",function() {
    console.log("ok");
    $(document)
        .find(".main-backdrop")
        .css("display","block");
    $(document)
        .find(".main-backdrop")
        .show();
});