<?php $__env->startSection('pageContent'); ?>
    <!-- Start page section area -->
    <div id="page-section" class="page-section">
        <?php $__currentLoopData = $components; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make($component->location.$component->file_name, ['posts' =>$component->posts], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>    
    <!-- End page section area -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.cratesOnSkates.layout.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\support\resources\views/frontend/cratesOnSkates/index.blade.php ENDPATH**/ ?>