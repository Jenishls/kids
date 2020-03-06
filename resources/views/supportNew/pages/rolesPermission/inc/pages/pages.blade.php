{{-- <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <div id="data_field">
    
    </div>
    @include('support.pages.rolesPermission.inc.pages_table')
    
    </div>
    
    <div class="modal fade show" id="sys_icon_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-right: 17px; display: none;" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Icon Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    
                    @include('support.pages.icon.icon')
                   
    
                      </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary sy_icon">Save</button>
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
    
    
     $('.sy_icon').on('click', function() {
      
       console.log($(this));
        event.preventDefault();
        var sy_icon = $('#icon');
    
          $.ajax({
                method:'post',
                url: 'system/iconcreate',
                data: sy_icon.serialize(),
                beforeSend: function(){
                },
                success: function(response, status, xhr) {
                    sy_icon.resetForm(); 
                    $('.x').click();
    
    
    
                  }, 
                 error: function (xhr, status, error){
    
                 }
            });
    
    
     });
    
    
     $('.model_load').on('click',function() {
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
    
    
    
    </script> --}}