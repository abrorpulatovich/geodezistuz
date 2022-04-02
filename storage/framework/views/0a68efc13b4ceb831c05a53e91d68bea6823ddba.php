<?php $__env->startSection('title', $vacancy->name); ?>

<?php $__env->startSection('content'); ?>
    <!-- Start Content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b><?php echo e($vacancy->name); ?></b>
                            </div>
                            <div class="col-md-6 text-right">
                                <?php if($vacancy->is_active == 0): ?>
                                    <a href="<?php echo e(route('admin.accept_vacancy', ['vacancy' => $vacancy])); ?>" class="btn btn-primary btn-sm"><i class="lni lni-check-mark-circle"></i> Vakantni tasdiqlash(faollashtirish)</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <?php if(session()->has('vacancy_accepted_successfully')): ?>
                            <div class="alert alert-success"><i class="lni lni-check-mark-circle"></i> <?php echo e(session()->get('vacancy_accepted_successfully')); ?></div>
                        <?php endif; ?>
                        <table class="table table-bordered">
                            <tr>
                                <th><b>Nomi</b></th>
                                <td><?php echo e($vacancy->name); ?></td>
                            </tr>
                            <tr>
                                <th><b>Oylik maosh (so‘m)</b></th>
                                <td><?php echo e(($vacancy->salary_hidden == 1)? 'Kelishilgan holda': $vacancy->salary); ?></td>
                            </tr>
                            <tr>
                                <th><b>Holati</b></th>
                                <td><?php echo $vacancy->getStatus(); ?></td>
                            </tr>
                            <tr>
                                <th><b>Yaratilgan sana</b></th>
                                <td><?php echo e($vacancy->created_at); ?></td>
                            </tr>
                            <tr>
                                <th><b>Mutaxassislik</b></th>
                                <td><?php echo e($vacancy->specialist->name); ?></td>
                            </tr>
                            <tr>
                                <th><b>Mehnat stajini tanlang</b></th>
                                <td><?php echo e($vacancy->vskill->name); ?></td>
                            </tr>
                            <tr>
                                <th><b>Vakant haqida (To'liq matn)</b></th>
                                <td><?php echo $vacancy->desc; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/admin/accept/vacancy.blade.php ENDPATH**/ ?>