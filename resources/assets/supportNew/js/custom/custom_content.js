$(document).off('click','#add_content').on('click','#add_content', function(e){
  	e.preventDefault();
    e.stopPropagation();
    showModal({
        url: '/admin/content/add',
        c: 1
    });
});