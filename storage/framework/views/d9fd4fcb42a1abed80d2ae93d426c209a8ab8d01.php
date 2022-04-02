<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Vakansiyalar ro‘yhati')); ?></div>
                    <div class="card-body">
                        <?php if(Auth::user()->status == 2): ?> 
                            <div class="btn-group d-grid gap-2 d-md-flex justify-content-md-end">
                            <?php if($company_status == 2): ?>
                                <a href="<?php echo e(route('vacancies.create')); ?>"><button class="btn btn-success" type="button"><i class="bi bi-plus-lg"></i> Vakansiya qo‘shish</button></a>
                            <?php endif; ?>                                
                                <a href="<?php echo e(route('companies.show', ['company' => $company_id])); ?>"><button class="btn btn-info" type="button"><i class="bi bi-info-circle"></i> Korxona ma‘lumotlari</button></a>
                            </div>
                        <?php endif; ?>
                        <br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>T/R</th>
                                        <th>Korxona INN</th>
                                        <th>Korxona nomi</th>
                                        <th>F.I.O</th>
                                        <th>Telefon raqam</th>
                                        <th>Mavjud vakansiya</th>
                                        <th>Mehnat staji</th>
                                        <th>Oylik</th>
                                        <th>Qo‘shilgan sana</th>
                                        <th>Holati</th>
                                        <th>Amallar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(count($vacancies) > 0): ?>

                                    <?php $__currentLoopData = $vacancies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vacancy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(($vacancies->currentpage()-1)*$vacancies->perpage() + $loop->index+1); ?></td>
                                            <td><?php echo e($vacancy->company_inn); ?> </td>
                                            <td><?php echo e($vacancy::company($vacancy->company_inn)->company_name); ?> </td>
                                            <td><?php echo e($vacancy::company($vacancy->company_inn)->full_name); ?> </td>
                                            <td><?php echo e($vacancy::company($vacancy->company_inn)->company_phone_number); ?> </td>
                                            <td><?php echo e($vacancy::specialist($vacancy->specialist_id)->name); ?> </td>
                                            <td><?php echo e($vacancy::skill($vacancy->skill)->name); ?> </td>
                                            <td>
                                                <?php if($vacancy->salary_hidden): ?>
                                                    Ko‘rsatilmagan 
                                                <?php else: ?>
                                                    <?php echo e($vacancy->salary); ?> so‘m
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(date("d.m.Y", strtotime($vacancy->created_at))); ?></td>
                                            <td>
                                                <?php if($vacancy->is_published == 0): ?>
                                                    <span class="badge bg-danger text-wrap">Tasdiqlanmagan</span> 
                                                <?php elseif($vacancy->is_published == 1): ?>
                                                    <span class="badge bg-success text-wrap">Tasdiqlangan</span>
                                                <?php elseif($vacancy->is_published == 2): ?>
                                                    <span class="badge bg-danger text-wrap">Bloklangan</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                        <a href="<?php echo e(route('vacancies.show', ['vacancy' => $vacancy->id])); ?>" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                                    <?php if(Auth::user()->status == 2): ?>
                                                        <a href="<?php echo e(route('vacancies.edit', ['vacancy' => $vacancy->id])); ?>" class="btn btn-success" style="margin-left:4px"><i class="bi bi-pencil"></i></a>
                                                    <?php endif; ?>
                                                        <form action="<?php echo e(route('vacancies.destroy', ['vacancy' => $vacancy->id])); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="submit" style="margin-left:4px;" class="btn btn-danger" onclick="return confirm('Haqiqatdan ham ushbu vakansiyani o‘chirmoqchimisiz?')"><i class="bi bi-trash"></i></button>
                                                        </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <span class="text-center fst-italic">Ma‘lumot yo‘q</span>
                                <?php endif; ?>
                                </tbody>
                            </table>
                            <?php echo e($vacancies->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/vacancies/index.blade.php ENDPATH**/ ?>