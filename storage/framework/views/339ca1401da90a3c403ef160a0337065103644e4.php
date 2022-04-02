<?php $__env->startSection('title', 'Mutaxassisliklar'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b><?php echo e(__('Mutaxassisliklar')); ?></b>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="<?php echo e(route('specialist.create')); ?>" class="btn btn-primary btn-sm"><i class="lni lni-plus"></i> Qo'shish</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(session()->has('deleted_successfully')): ?>
                            <p class="alert alert-success"><i class="lni lni-warning"></i> <?php echo e(session()->get('deleted_successfully')); ?></p>
                        <?php endif; ?>
                        <?php if(sizeof($specialists)): ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><b>#</b></th>
                                        <th><b>Nomi</b></th>
                                        <th><b>Holati</b></th>
                                        <th><b>Tartibi</b></th>
                                        <th><b>Slug(URL manzilida ko'rishi)</b></th>
                                        <th><b>Ikonka</b></th>
                                        <th><b>Rang</b></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $specialists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$loop->index); ?></td>
                                            <td><?php echo e($specialist->name); ?></td>
                                            <td><?php echo e($specialist->get_status()[$specialist->status]); ?></td>
                                            <td><?php echo e($specialist->s_order); ?></td>
                                            <td><?php echo e($specialist->slug); ?></td>
                                            <td><?php echo e($specialist->icon); ?></td>
                                            <td><?php echo e($specialist->color); ?></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="btn-group">
                                                            <a href="<?php echo e(route('specialist.show', ['specialist' => $specialist])); ?>" class="btn btn-primary btn-sm"><i class="lni lni-eye"></i></a>
                                                            <a href="<?php echo e(route('specialist.edit', ['specialist' => $specialist])); ?>" class="btn btn-secondary btn-sm"><i class="lni lni-pencil"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <br>
                            <?php echo e($specialists->appends(request()->query())->links()); ?>

                        <?php else: ?>
                            <div class="alert alert-danger"><i class="lni lni-warning"></i> Mutaxassisliklar yo'q</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/admin/specialists/index.blade.php ENDPATH**/ ?>