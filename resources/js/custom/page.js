var cssload = `<div id="cssload-loader">
    <ul>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>`;

// $(".pageload").click(function() {
//     event.preventDefault();
//     let url = $(this).attr("data-route");

//     pageload(url);
// });

// function pageload(url) {
//     $.ajax({
//         method: "get",
//         url: url,
//         data: {},
//         beforeSend: function() {
//             $("#kt_body").html(cssload);
//         },
//         success: function(response, status, xhr) {
//             setTimeout(function() {
//                 $("#kt_body").html(response);
//             }, 1000);
//         },
//         error: function(xhr, status, error) {}
//     });
// }
