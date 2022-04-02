<?php $__env->startSection('title', 'Tasdiqlanishi kutilayotgan rezumelar'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Tasdiqlanishi kutilayotgan rezumelar')); ?></div>
                    <div class="card-body">
                        <?php if(sizeof($rezumes) > 0): ?>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th><b>#</b></th>
                                    <th><b>FIO</b></th>
                                    <th><b>Mutaxasislik</b></th>
                                    <th><b>Holati</b></th>
                                    <th><b>Joylashuv</b></th>
                                    <th><b>Yaratilgan sana</b></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $rezumes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rezume): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(++$loop->index); ?></td>
                                        <td><?php echo e($rezume->user->citizen->full_name); ?></td>
                                        <td><?php echo e($rezume->specialist->name); ?></td>
                                        <td><?php echo $rezume->getStatus(); ?></td>
                                        <td><?php echo e($rezume->user->citizen->region->name_uz); ?>, <?php echo e($rezume->user->citizen->city->name_uz); ?></td>
                                        <td><?php echo e($rezume->created_at); ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo e(route('admin.acceptable_rezume', ['rezume' => $rezume])); ?>" class="btn btn-primary"><i class="lni lni-eye"></i> Batafsil</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <div class="alert alert-danger"><i class="lni lni-warning"></i> Sizda rezumelar yo'q</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/admin/accept/rezumes.blade.php ENDPATH**/ ?>