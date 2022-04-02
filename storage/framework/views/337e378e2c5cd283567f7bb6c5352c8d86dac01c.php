<?php $__env->startSection('name', $specialist->name); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <b><?php echo e($specialist->name); ?></b>
                            </div>
                            <div class="col-md-8 text-right">
                                <div class="btn-group">
                                    <a href="<?php echo e(route('specialist.index')); ?>" class="btn btn-primary btn-sm"><i class="lni lni-arrow-right"></i> Mutaxassisliklar</a>
                                    <a href="<?php echo e(route('specialist.edit', ['specialist' => $specialist])); ?>" class="btn btn-success btn-sm"><i class="lni lni-pencil"></i> Tahrirlash</a>
                                    <form action="<?php echo e(route('specialist.destroy', ['specialist' => $specialist])); ?>" method="POST" id="delete-form" onsubmit="return confirm('Ishonchingiz komilmi? Siz rostdan ham ushbu yangilikni o\'chirishni xoxlaysizmi?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>
                                        <button type="submit" class="btn btn-danger" style="border-bottom-left-radius: 0; border-top-left-radius: 0;"><i class="lni lni-trash"></i> O'chirish</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(session()->has('saved_successfully')): ?>
                            <p class="alert alert-success"><?php echo e(session()->get('saved_successfully')); ?></p>
                        <?php endif; ?>
                        <table class="table table-bordered">
                            <tr>
                                <th><b>Nomi</b></th>
                                <td><?php echo e($specialist->name); ?></td>
                            </tr>
                            <tr>
                                <th><b>Tartibi</b></th>
                                <td><?php echo e($specialist->s_order); ?></td>
                            </tr>
                            <tr>
                                <th><b>Holati</b></th>
                                <td><?php echo e($specialist->get_status()[$specialist->status]); ?></td>
                            </tr>
                            <tr>
                                <th><b>Slug(URL manzilida ko'rishi)</b></th>
                                <td><?php echo e($specialist->slug); ?></td>
                            </tr>
                            <tr>
                                <th><b>Ikonka</b></th>
                                <td><?php echo e($specialist->icon); ?></td>
                            </tr>
                            <tr>
                                <th><b>Rang</b></th>
                                <td><?php echo e($specialist->color); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/admin/specialists/show.blade.php ENDPATH**/ ?>