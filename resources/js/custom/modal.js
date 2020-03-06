var cssload =`<div id="cssload-loader">
    <ul>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>`; 




 $('.model_load').on('click',function() {
    //console.log($(this));
    alert("test");

    event.preventDefault();
      $.ajax({
            method:'get',
            url: $(this).attr("data-route"),
            data: {},
            beforeSend: function(){

                 $('#sy_global_modal').html(cssload);
            },
            success: function(response, status, xhr) {
                setTimeout(function(){
                   $('#sy_global_modal').html(response);  
               }, 1000);

             }, 
             error: function (xhr, status, error){

             }
        });
 });


// var cratePopup = function(options){
// 	var d_options ={
// 		draggable:false,
// 		hight:500, 
// 		width:500,
// 		modal:true,
// 		title: options.title, 
// 		rezisable:false, 
// 		zIndex:2000,
// 		position:'top'
// 	}; 

// 	var d_ajax_options={
// 		url: options.url,
// 		data: $.extend(options.data, {popupId:options.elementId}), 
// 		succuess:function(html){
// 			$('#'+options.elementId).html(html);
// 		}
// 	}

// 	var ajaxOptions = $.extend(d_ajax_options,options.ajax_options);
// 	var dialogOptions = $.extend(d_ajax_options, options.dialogOptions);

// 	dialogOptions.open = function(){

// 	}
// 	}


// }