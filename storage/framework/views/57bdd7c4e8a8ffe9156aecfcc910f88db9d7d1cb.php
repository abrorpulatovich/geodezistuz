<!-- Categories Widget -->
<div class="widget">
    <h5 class="widget-title bg-gray">Geodeziya tarmoqlari bo'yicha vakantlar</h5>
    <div class="right-sideabr">
        <ul class="list-item">
            <?php $__currentLoopData = $specialists_with_vacancies_count; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('vacancies', ['id' => $specialist->id])); ?>">
                        <?php echo e($specialist->name); ?> <span class="num-posts"><span class="notinumber"><?php echo e(sizeof($specialist->vacancies)); ?></span></span>
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/includes/specialists_with_vacancies_count.blade.php ENDPATH**/ ?>