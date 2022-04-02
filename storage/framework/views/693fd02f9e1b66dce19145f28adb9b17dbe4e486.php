<?php $__env->startSection('title', in_array($user->status, [1, 3])? $user->citizen->full_name: $company->company_name); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <b><?php echo e(in_array($user->status, [1, 3])? 'Jismoniy shaxs (' . $user->citizen->full_name . ')': 'Yuridik shaxs (' . $company->company_name . ')'); ?></b>
                            </div>
                            <div class="col-md-8 text-right">
                                <div class="btn-group">
                                    <a href="<?php echo e(route('admin.users')); ?>" class="btn btn-primary btn-sm"><i class="lni lni-arrow-right"></i> Foydalanuvchilar</a>
                                    <?php if(!$user->can_login): ?>
                                        <a href="<?php echo e(route('admin.user_accept', ['user' => $user])); ?>" class="btn btn-success btn-sm"><i class="lni lni-check-mark-circle"></i>Tasdiqlash</a>
                                    <?php endif; ?>
                                    <?php if($user->status == 1): ?>
                                        <a href="<?php echo e(route('admin.user_makemoderator', ['user' => $user])); ?>" class="btn btn-primary btn-sm"><i class="lni lni-user"></i> Moderator sifatida belgilash</a>
                                    <?php endif; ?>
                                    <?php if($user->status == 3): ?>
                                        <a href="<?php echo e(route('admin.user_makecitizen', ['user' => $user])); ?>" class="btn btn-success btn-sm"><i class="lni lni-user"></i> Jismoniy shaxs sifatida belgilash</a>
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('admin.user_delete', ['user' => $user])); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Siz rostdan ham ushbu foydalanuvchini o\'chirishni xoxlaysizmi?')"><i class="lni lni-trash"></i> O'chirish</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(in_array($user->status, [1, 3])): ?>
                            <table class="table table-bordered">
                                <tr>
                                    <th><b>FIO</b></th>
                                    <td><?php echo e($user->citizen->full_name); ?></td>
                                </tr>
                                <tr>
                                    <th><b>Roli</b></th>
                                    <td><?php echo $user->getRole(); ?></td>
                                </tr>
                                <tr>
                                    <th><b>Pasport</b></th>
                                    <td><?php echo e($user->citizen->passport); ?></td>
                                </tr>
                                <tr>
                                    <th><b>Telefon</b></th>
                                    <td><?php echo e($user->citizen->phone_number); ?></td>
                                </tr>
                                <tr>
                                    <th><b>Tug'ilgan sanasi</b></th>
                                    <td><?php echo e(date('d-m-Y', strtotime($user->citizen->birth_date))); ?></td>
                                </tr>
                                <tr>
                                    <th><b>Mutaxassisligi</b></th>
                                    <td><?php echo e($user->citizen->specialist->name); ?></td>
                                </tr>
                                <tr>
                                    <th><b>Jinsi</b></th>
                                    <td><?php echo e($user->citizen->gender()); ?></td>
                                </tr>
                                <tr>
                                    <th><b>Rezume/Vakant qo'sha oladimi?</b></th>
                                    <td><?php echo $user->getCanDo(); ?></td>
                                </tr>
                            </table>
                        <?php else: ?>
                            <?php if($company): ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <th><b>Nomi</b></th>
                                        <td><?php echo e($company->company_name); ?></td>
                                    </tr>
                                    <tr>
                                        <th><b>Roli</b></th>
                                        <td><?php echo $user->getRole(); ?></td>
                                    </tr>
                                    <tr>
                                        <th><b>Direktor FIO</b></th>
                                        <td><?php echo e($company->full_name); ?></td>
                                    </tr>
                                    <tr>
                                        <th><b>INN</b></th>
                                        <td><?php echo e($company->company_inn); ?></td>
                                    </tr>
                                    <tr>
                                        <th><b>Tel.nomer</b></th>
                                        <td><?php echo e($company->company_phone_number); ?></td>
                                    </tr>
                                    <tr>
                                        <th><b>Websayt</b></th>
                                        <td><a href="https://<?php echo e($company->website); ?>"
                                               target="_blank"><?php echo e($company->website); ?></a></td>
                                    </tr>
                                    <tr>
                                        <th><b>Viloyat</b></th>
                                        <td><?php echo e($company->region->name_uz); ?></td>
                                    </tr>
                                    <tr>
                                        <th><b>Tuman</b></th>
                                        <td><?php echo e($company->city->name_uz); ?></td>
                                    </tr>
                                    <tr>
                                        <th><b>Manzil</b></th>
                                        <td><?php echo e($company->address); ?></td>
                                    </tr>
                                </table>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/admin/users/info.blade.php ENDPATH**/ ?>