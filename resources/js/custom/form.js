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

$("#sy_form").on("click", function() {
    alert("test");
    console.log($(this));
    event.preventDefault();

    var sy_btn = $(this);
    var sy_form = $(this).closest("form");
    console.log(sy_form);

    form.validate({
        rules: {
            fullname: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            username: {
                unique: true
            },
            password: {
                required: true
            },
            rpassword: {
                required: true
            },
            agree: {
                required: true
            }
        }
    });

    if (!form.valid()) {
        return;
    }
});
