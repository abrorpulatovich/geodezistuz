<?php $__env->startSection('content'); ?>

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Rezumelar ro‘yhati</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Rezumelar ro‘yhati')); ?></div>
                    <div class="card-body">
                        <?php if(Auth::user()->status == 1): ?>
                            <div class="btn-group d-grid gap-2 d-md-flex justify-content-md-end">
                                <?php if($citizen_status == 2): ?>
                                    <a href="<?php echo e(route('rezumes.create')); ?>">
                                        <button class="btn btn-success" type="button"><i class="bi bi-plus-lg"></i>
                                            Rezume qo‘shish
                                        </button>
                                    </a>
                                <?php endif; ?>
                                <a href="<?php echo e(route('citizens.show', ['citizen' => $citizen_id])); ?>">
                                    <button class="btn btn-info" type="button"><i class="bi bi-info-circle"></i> Fuqaro
                                        ma‘lumotlari
                                    </button>
                                </a>
                            </div>
                        <?php endif; ?>
                        <br>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>T/R</th>
                                <th>Passport</th>
                                <th>F.I.O</th>
                                <th>Telefon raqam</th>
                                <th>Tug‘ilgan sana</th>
                                <th>Soha</th>
                                <th>Mehnat staji</th>
                                <th>Oylik</th>
                                <th>Qo‘shilgan sana</th>
                                <th>Holati</th>
                                <th>Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($rezumes) > 0): ?>

                                <?php $__currentLoopData = $rezumes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rezume): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(($rezumes->currentpage()-1)*$rezumes->perpage() + $loop->index+1); ?></td>
                                        <td><?php echo e($rezume->passport); ?> </td>
                                        <td><?php echo e($rezume::citizen($rezume->passport)->full_name); ?> </td>
                                        <td><?php echo e($rezume::citizen($rezume->passport)->phone_number); ?> </td>
                                        <td><?php echo e(date("d.m.Y", strtotime($rezume::citizen($rezume->passport)->birth_date))); ?> </td>
                                        <td><?php echo e($rezume::specialist($rezume->specialist_id)->name); ?> </td>
                                        <td><?php echo e($rezume::skill($rezume->skill)->name); ?> </td>
                                        <td>
                                            <?php if($rezume->salary_hidden): ?>
                                                Ko‘rsatilmagan
                                            <?php else: ?>
                                                <?php echo e($rezume->salary); ?> so‘m
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e(date("d.m.Y", strtotime($rezume->created_at))); ?></td>
                                        <td>
                                            <?php if($rezume->is_published == 0): ?>
                                                <span class="badge bg-danger text-wrap">Tasdiqlanmagan</span>
                                            <?php elseif($rezume->is_published == 1): ?>
                                                <span class="badge bg-success text-wrap">Tasdiqlangan</span>
                                            <?php elseif($rezume->is_published == 2): ?>
                                                <span class="badge bg-danger text-wrap">Bloklangan</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo e(route('rezumes.show', ['rezume' => $rezume->id])); ?>"
                                                   class="btn btn-info"><i class="bi bi-eye"></i></a>
                                                <?php if(Auth::user()->status == 1): ?>

                                                    <form
                                                        action="<?php echo e(route('rezumes.destroy', ['rezume' => $rezume->id])); ?>"
                                                        method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" style="margin-left:4px;"
                                                                class="btn btn-danger"
                                                                onclick="return confirm('Haqiqatdan ham ushbu rezumeni o‘chirmoqchimisiz?')">
                                                            <i class="bi bi-trash"></i></button>
                                                    </form>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <span class="text-center fst-italic">Ma‘lumot yo‘q</span>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <?php echo e($rezumes->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/rezumes/index.blade.php ENDPATH**/ ?>