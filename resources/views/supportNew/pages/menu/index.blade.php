<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    @include('support.pages.menu.inc.menu_top_band')
    @include('support.pages.menu.inc.menu_datatable')
    
</div>
    
    <div class="modal fade show" id="sys_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-right: 17px; display: none; " aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="sys_model_content" style="width:auto;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Menu Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body" style="overflow-y:none;">
                    
                    @include('support.pages.menu.menu')
                   
    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary sy_form" >Save</button>
                </div>
            </div>
        </div>
    </div>
    
    
    <script type="text/javascript">
    
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
    
    
     $('.sy_form').on('click', function() {
      
        event.preventDefault();

        var sy_form = $('#menu');
    
        $.ajax({
            method:'post',
            url: 'system/menucreate',
            data: sy_form.serialize(),
            beforeSend: function(){

                //  $('#kt_body').html(cssload);
            },
            success: function(response, status, xhr) {
                sy_form.resetForm(); 
                $('.x').click();
                menu.reload();
            },
            error({status, responseJSON}) {
                if(status === 422) {
                    sy_form.find('input[name]').css('border-color', '#ddd');
                    $(`input[name]`).siblings(".errorMessage").empty();
                    
                    if(!responseJSON.errors) return;
                    const messages = [];
                    for(const[key, message] of Object.entries(responseJSON.errors)) {
                        sy_form.find(`input[name="${ key }"]`).css('border-color', '#F44336');
                        // console.log(sy_form);
                        messages.push(message);
                        $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                        $(`input[name="${key}"]`).siblings(".errorMessage").append(message);

                    }
                    toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>'+ messages.flat(1).join('<br>'));
                }
            }
        });
    });
    
    
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
    
    
    
</script>