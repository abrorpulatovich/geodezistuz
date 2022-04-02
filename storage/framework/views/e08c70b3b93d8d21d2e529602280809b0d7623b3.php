<?php $__env->startSection('title', $company->company_name); ?>

<?php $__env->startSection('content'); ?>
    <!-- Start Content -->
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-xs-12">
                    <?php echo $__env->make('includes.company_profile_leftside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-9 col-md-12 col-xs-12">
                    <?php if(session()->has('vacancy_added_successfully')): ?>
                        <div class="alert alert-success"><i class="lni lni-check-mark-circle"></i> <?php echo e(session()->get('vacancy_added_successfully')); ?></div>
                    <?php endif; ?>
                    <?php if(sizeof($vacancies) > 0): ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><b>#</b></th>
                                    <th><b>Nomi</b></th>
                                    <th><b>Oylik maosh (so‘m)</b></th>
                                    <th><b>Holati</b></th>
                                    <th><b>Yaratilgan sana</b></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $vacancies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vacancy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(++$loop->index); ?></td>
                                        <td><?php echo e($vacancy->name); ?></td>
                                        <td><?php echo e(($vacancy->salary_hidden == 1)? 'Kelishilgan holda': $vacancy->salary); ?></td>
                                        <td><?php echo $vacancy->getStatus(); ?></td>
                                        <td><?php echo e($vacancy->created_at); ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo e(route('vacancy.show', ['vacancy' => $vacancy])); ?>" class="btn btn-common"><i class="lni lni-eye"></i> Batafsil</a>
                                                <a href="<?php echo e(route('vacancy.edit', ['vacancy' => $vacancy])); ?>" class="btn btn-primary btn-sm"><i class="lni lni-pencil"> Tahrirlash</i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <div class="alert alert-danger"><i class="lni lni-warning"></i> Sizda vakantlar yo'q</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/profile/company.blade.php ENDPATH**/ ?>