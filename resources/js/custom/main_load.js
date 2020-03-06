$(document).on('click', '.load_content', function(e){
    e.preventDefault();
    $.ajax({
        url: '/member',
        method: 'GET',
        success: function(resp){
            $('#kt_content').empty().append(resp);
        },
        error: function(err){
            console.log(err);
        }
    });
});