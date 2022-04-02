<?php $__env->startSection('title', $rezume->specialist->name); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo e($rezume->specialist->name); ?> (<?php echo e($rezume->user->citizen->full_name); ?>)
                            </div>
                            <div class="col-md-8 text-right">
                                <div class="btn-group">
                                    <a href="<?php echo e(route('admin.acceptable_rezumes')); ?>" class="btn btn-primary"><i class="lni lni-arrow-right"></i> Tasdiqlanishi kutilayotgan rezumelar</a>
                                    <?php if($rezume->is_active == 1): ?>
                                        <a href="<?php echo e(route('admin.accept_rezume', ['rezume' => $rezume])); ?>" class="btn btn-success btn-sm"><i class="lni lni-check-mark-circle"></i> Rezumeni tasdiqlash(faollashtirish)</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(session()->has('rezume_accepted_successfully')): ?>
                            <div class="alert alert-success"><i class="lni lni-check-mark-circle"></i> <?php echo e(session()->get('rezume_accepted_successfully')); ?></div>
                        <?php endif; ?>

                        <table class="table table-bordered">
                            <tr>
                                <th><b>FIO</b></th>
                                <td><?php echo e($rezume->user->citizen->full_name); ?></td>
                            </tr>
                            <tr>
                                <th><b>Mutaxassislik</b></th>
                                <td><?php echo e($rezume->specialist->name); ?></td>
                            </tr>
                            <tr>
                                <th><b>Joylashuv</b></th>
                                <td><?php echo e($rezume->user->citizen->region->name_uz); ?>, <?php echo e($rezume->user->citizen->city->name_uz); ?></td>
                            </tr>
                            <tr>
                                <th><b>Telefon nomer</b></th>
                                <td><?php echo e($rezume->user->citizen->phone_number); ?></td>
                            </tr>
                            <tr>
                                <th><b>Holati</b></th>
                                <td><?php echo $rezume->getStatus(); ?></td>
                            </tr>
                            <tr>
                                <th><b>Kandidat haqida</b></th>
                                <td><?php echo $rezume->about_me; ?></td>
                            </tr>
                            <tr>
                                <th><b>Ish tajribasi</b></th>
                                <td>
                                    <?php if(sizeof($rezume->workbooks) > 0): ?>
                                        <?php $__currentLoopData = $rezume->workbooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workbook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <h4><?php echo e($workbook->position_name); ?></h4>
                                            <h6><?php echo e($workbook->old_company_name); ?></h6>
                                            <span class="date"><i class="lni lni-calendar"></i> <?php echo e(date('d.m.Y', strtotime($workbook->from_date))); ?> - <?php echo e(date('d.m.Y', strtotime($workbook->to_date))); ?></span>
                                            
                                            <br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <div class="alert alert-warning"><i class="lni lni-warning"></i> Ish tajribasi mavjud emas</div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/admin/accept/rezume.blade.php ENDPATH**/ ?>