<?php if($errors->any()): ?>
    <ul class="list-group">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item list-group-item-danger"><?php echo e($error); ?></li> <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>
<?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/admin/includes/errors.blade.php ENDPATH**/ ?>