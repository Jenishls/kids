<!--begin: User bar -->
<div class="kt-header__topbar-item kt-header__topbar-item--user get_profile" data-route="/admin/users/userProfile/<?php echo e(auth()->user()->id); ?>" style="cursor: pointer;">
	<span class="kt-header__topbar-username kt-visible-desktop text-info" data-toggle="kt-popover" title="" data-placement="bottom" data-content="<?php echo e(ucfirst(auth()->user()->name)); ?>" data-original-title=""><?php echo e(ucfirst(auth()->user()->name)); ?></span>
</div>
<?php /**PATH D:\support\resources\views/supportNew/pages/dashboard/inc/userbar.blade.php ENDPATH**/ ?>