<?php echo $__env->make('supportNew.pages.global.model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div id="my-mdl"></div>
 <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
 </form>
<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#716aca",
						"light": "#ffffff",
						"dark": "#282a3c",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>
	
	
	
	<script src="<?php echo e(asset("js/babel.js")); ?>"></script>
	<script src="supportNew/js/all.js"></script>
	<script src="<?php echo e(asset("js/app.js")); ?>"></script>
	<script>
		var de = '<?php echo e($dashboard_route); ?>'; 
		if(de && de !=''){
			$.ajax(de).then(function(response) {
				$('#kt_body').html(response);
			}, function(error) {
				toastr.error(error.responseText);
			});
		}
	</script> 
		 
</body>
</html><?php /**PATH D:\support\resources\views/supportNew/pages/dashboard/inc/footer.blade.php ENDPATH**/ ?>