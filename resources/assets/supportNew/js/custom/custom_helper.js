$(document).off('input keyup','.e_mask_phone').on('input keyup','.e_mask_phone', function(e){
    e.preventDefault();
    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
    e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});

$(".text_to_p_mask").text(function(i, text){
	text = text.replace(/(\d{3})(\d{3})(\d{4})/, "($1) $2 $3");
	return text;
});

$(document).find('.text_to_p_mask').text(function(i, text){
	text = text.replace(/(\d{3})(\d{3})(\d{4})/, "($1) $2 $3");
	return text;
})

/*
  Render on update
  Parma - data: data , id : parent_id
  key in the loop must match the dom element id
*/
function update_render( data, id)
{
  $.each(data, function(key, value){
    if(typeof(value) == 'object' )
      update_render(value, id);
    $('#'+id).find('#'+key).html(data[key]);
  });
}

 function resultToObj(array)
  {
    let arr={};
    $(array).each(function(i, field){
      arr[field.name] = field.value;
    });
    return arr;
  }

  $(document).off('click','.pageLoadWithBack').on('click','.pageLoadWithBack', function(e){
    e.preventDefault();
    let url= $(this).attr('data-route');
    let backUrl= $(this).attr('data-backurl')
    pageload(url,function(){
      $(document).find('.backBtn').attr('data-route', backUrl);
    });

  })

  function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
  }
  /*
    info- substring the word and gives ellipis 
    param- input (string) and count(of letters to show)
    return-  letters with ellipsis
  */
  let truncate = (input,count=5) => input.length > count ? `${input.substring(0, count)}...` : input;
