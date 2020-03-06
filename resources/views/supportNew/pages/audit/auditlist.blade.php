<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

@include('support.pages.global.topband.audittopband')
 @include('support.pages.audit.audittable')

 

</div>

<div class="modal fade show" id="sys_audit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-right: 17px; display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Audit Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                
                @include('support.pages.audit.audit')
               

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary sy_audit">Save</button>
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


 $('.sy_audit').on('click', function() {
  
    event.preventDefault();
    var sy_audit = $('#audit');
    

      $.ajax({
            method:'post',
            url: 'system/auditcreate',
            data: sy_audit.serialize(),
            beforeSend: function(){

               //  $('#kt_body').html(cssload);
            },
            success: function(response, status, xhr) {
                sy_audit.resetForm(); 
                $('.x').click();
                menu.reload();



              }, 
             error: function (xhr, status, error){

             }
        });


 });

</script>

