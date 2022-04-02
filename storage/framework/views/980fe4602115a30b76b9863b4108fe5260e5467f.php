<?php $__env->startSection('title', $vacancy->name); ?>

<?php $__env->startSection('content'); ?>

    <!-- Start Content -->
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-xs-12">
                    <?php echo $__env->make('includes.company_profile_leftside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-9 col-md-12 col-xs-12">
                    <?php if(session()->has('saved_successfully')): ?>
                        <div class="alert alert-success"><i class="lni lni-check-mark-circle"></i> <?php echo e(session()->get('saved_successfully')); ?></div>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/profile/vacancy.blade.php ENDPATH**/ ?>