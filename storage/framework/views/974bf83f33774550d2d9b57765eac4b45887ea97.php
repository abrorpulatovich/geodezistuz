<?php $__env->startSection('title', 'Foydalanuvchilar'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b><?php echo e(__('Foydalanuvchilar')); ?></b>
                    </div>
                    <div class="card-body">
                        <?php if(session()->has('deleted_successfully')): ?>
                            <p class="alert alert-success"><i class="lni lni-warning"></i> <?php echo e(session()->get('deleted_successfully')); ?></p>
                        <?php endif; ?>
                        <?php if(session()->has('accepted_successfully')): ?>
                            <p class="alert alert-success"><i class="lni lni-warning"></i> <?php echo e(session()->get('accepted_successfully')); ?></p>
                        <?php endif; ?>
                        <?php if(session()->has('changed_to_moderator_successfully')): ?>
                            <p class="alert alert-success"><i class="lni lni-warning"></i> <?php echo e(session()->get('changed_to_moderator_successfully')); ?></p>
                        <?php endif; ?>
                        <?php if(session()->has('changed_to_citizen_successfully')): ?>
                            <p class="alert alert-success"><i class="lni lni-warning"></i> <?php echo e(session()->get('changed_to_citizen_successfully')); ?></p>
                        <?php endif; ?>
                        <?php if(sizeof($users)): ?>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th><b>#</b></th>
                                    <th><b>FIO</b></th>
                                    <th><b>Roli</b></th>
                                    <th><b>Login</b></th>
                                    <th><b>Parol</b></th>
                                    <th><b>Rezume/Vakant qo'sha oladimi?</b></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(++$loop->index); ?></td>
                                        <td><?php echo e($user->name); ?></td>
                                        <td><?php echo $user->getRole(); ?></td>
                                        <td><?php echo e($user->username); ?></td>
                                        <td><?php echo e($user->password_text); ?></td>
                                        <td class="text-center"><?php echo $user->getCanDo(); ?></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="btn-group">
                                                        <a href="<?php echo e(route('admin.user_info', ['user' => $user])); ?>" class="btn btn-primary btn-sm"><i class="lni lni-eye"></i> Batafsil</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <br>
                            <?php echo e($users->appends(request()->query())->links()); ?>

                        <?php else: ?>
                            <div class="alert alert-danger"><i class="lni lni-warning"></i> Foydalanuvchilar yo'q</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/admin/users/index.blade.php ENDPATH**/ ?>