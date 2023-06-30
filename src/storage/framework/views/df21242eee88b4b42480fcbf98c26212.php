<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p><?php echo e($user->name); ?></p>
    <p><?php echo e($user->email); ?></p>
    <p><?php echo e($user->created_ato); ?></p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /work/web/resources/views/user.blade.php ENDPATH**/ ?>