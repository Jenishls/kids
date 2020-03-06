<div class="row">
	<div class="col">
		<form id ="icon">
			@csrf
			<!-- <input type="hidden" name="edit" value="dialogue"> -->
			<div class="icon-dialog">	</div>

		</form>
	</div>
</div>
<script> 
 $('#parent_id').select2({
            placeholder: "Select parent menu"
       });
$('#icon').on('change', function(){
	$('#place_icon').attr("class","");
	$('#place_icon').addClass($(this).val());
});
</script>