<div id="datatable_container" class="usersControlContent">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Order
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Table</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Order</a>
				</div>
			</div>
		</div>
		<div class="kt-subheader__wrapper">
			<a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill" id="add_order"><i class="la la-plus"></i>
				Order
			</a>
		</div>
	</div>

	<?php echo $__env->make('supportNew.pages.Order.includes.order', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div><?php /**PATH D:\support\resources\views/supportNew/pages/order/index.blade.php ENDPATH**/ ?>