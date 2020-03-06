// user table profile on click
$(document)
    .off("click", ".get_profile")
    .on("click", ".get_profile", function(e) {
        e.preventDefault();
        let url = $(this).attr("data-route");

        // function loadProfile(url) {
        supportAjax(
            {
                url: url
            },
            function(resp) {
                $("#kt_body")
                    .empty()
                    .append(resp);
            },
            function(err) {
                console.log(err);
            }
        );
        // }
    });
// user profile menu on click
$(document)
    .off("click", ".user_profile_menu")
    .on("click", ".user_profile_menu", function(e) {
        e.preventDefault();
        // alert('he');
        $(this)
            .siblings()
            .removeClass("profile_menu_active");
        $(this).addClass("profile_menu_active");
        let url = $(this).attr("data-url");
        user_profile_menu(url);
    });

// passing url of menu tab of profile
function user_profile_menu(url) {
    $.ajax({
        url: url,
        method: "GET",
        success: function(resp) {
            $("#user-profile-content")
                .empty()
                .append(resp);
        },
        error: function(err) {
            console.log(err);
        }
    });
}
// input mask
