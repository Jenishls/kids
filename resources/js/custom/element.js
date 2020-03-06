
// This change Title and with of modal
function modal_width_title(e){
	$('.modal-title').text(e.attr("data-title"));
	$('.modal-dialog').css("max-width",e.attr("data-width"));

}
