<?php $__env->startSection('content'); ?>

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Rezume qo'shish</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Start Content -->
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <form method="post" action="<?php echo e(route('rezumes.store')); ?>">
                        <?php echo csrf_field(); ?>

                        <h4>Fuqaro ma‘lumotlari</h4>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="passport"
                                       class="col-form-label text-md-end"><?php echo e(__('Passport')); ?></label>
                                <input id="passport" type="text" class="form-control" name="passport"
                                       value="<?php echo e($citizen->passport); ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="full_name" class="col-form-label text-md-end"><?php echo e(__('F.I.O')); ?></label>
                                <input id="full_name" type="text" class="form-control" name="full_name"
                                       value="<?php echo e($citizen->full_name); ?>" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="phone_number"
                                       class="col-form-label text-md-end"><?php echo e(__('Telefon raqam')); ?></label>
                                <input id="phone_number" type="text" class="form-control" name="phone_number"
                                       value="<?php echo e($citizen->phone_number); ?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="region_id" class="col-form-label text-md-end"><?php echo e(__('Hudud')); ?></label>
                                <input id="region_id" type="text" class="form-control" name="region_id"
                                       value="<?php echo e($rezume::regionName($citizen->region_id)->name_uz); ?>" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="birth_date"
                                       class="col-form-label text-md-end"><?php echo e(__('Tug‘ilgan sana')); ?></label>
                                <input id="birth_date" type="text" class="form-control" name="birth_date"
                                       value="<?php echo e($citizen->birth_date); ?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <hr style="height: 5%;">
                            </div>
                        </div>
                        <h4>Mehnat faoliyati</h4>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="col-form-label text-md-end">
                                    <input type="checkbox" id="is_history" name="is_history" value="0"
                                           class="history_hide"><span> <?php echo e(__('Mehnat staji mavjud emas')); ?></span>
                                </label>
                            </div>
                        </div>
                        <div id="hide_history">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th><?php echo e(__('Korxona nomi')); ?></th>
                                            <th><?php echo e(__('Lavozim')); ?></th>
                                            <th><?php echo e(__('Ishni boshlagan sana')); ?></th>
                                            <th><?php echo e(__('Ishdan bo‘shagan sana')); ?></th>
                                            <th>
                                                <button type="button" class="btn btn-primary" id="plus_btn"><i
                                                        class="lni lni-plus"></i>
                                                </button>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <input id="old_company_name" type="text"
                                                       class="old_company_name form-control"
                                                       name="workplaces[0][old_company_name]"
                                                       value="<?php echo e(old('old_company_name') ?? $workbook->old_company_name); ?>"
                                                       required="required">
                                            </td>
                                            <td>
                                                <input id="position_name" type="text"
                                                       class="position_name form-control"
                                                       name="workplaces[0][position_name]"
                                                       value="<?php echo e(old('position_name') ?? $workbook->position_name); ?>"
                                                       required="required">
                                            </td>
                                            <td>
                                                <input id="from_date" type="text"
                                                       class="birth_date from_date form-control"
                                                       name="workplaces[0][from_date]"
                                                       value="<?php echo e(old('from_date') ?? $workbook->from_date); ?>"
                                                       required="required">
                                            </td>
                                            <td>
                                                <input id="to_date" type="text"
                                                       class="birth_date to_date form-control"
                                                       name="workplaces[0][to_date]"
                                                       value="<?php echo e(old('to_date') ?? $workbook->to_date); ?>"
                                                       required="required">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <hr style="height: 5%;">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="specialist_id"
                                       class="col-form-label text-md-end"><?php echo e(__('Mutaxassislikni tanlang')); ?></label>
                                <select name="specialist_id" required id="specialist_id" class="form-control">
                                    <option value="">Mutaxassislikni tanlang...</option>
                                    <?php $__currentLoopData = $specialists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($specialist->id); ?>"
                                                data-id="<?php echo e($specialist->id); ?>"><?php echo e($specialist->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="skill"
                                       class="col-form-label text-md-end"><?php echo e(__('Mehnat staji')); ?></label>
                                <select name="skill" required id="skill" class="form-control">
                                    <option value="">Mehnat stajini tanlang...</option>
                                    <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($skill->id); ?>"
                                                data-id="<?php echo e($skill->id); ?>"><?php echo e($skill->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6" id="salary_hidden">
                                <label for="salary"
                                       class="col-form-label text-md"><?php echo e(__('Siz kutayotgan maosh miqdori? (so‘m)')); ?></label>
                                <input id="salary" type="text" class="salary form-control" name="salary"
                                       value="<?php echo e(old('salary') ?? $rezume->salary); ?>" required="required">
                            </div>
                            <div class="col-md-6 mt-5">
                                <label class="col-form-label text-md-end">
                                    <input type="checkbox" id="is_salary" name="is_salary" value="0"
                                           class="hide_salary"><span> <?php echo e(__('Maosh kelishilgan holda')); ?></span>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="lni lni-save"></i> Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/rezumes/create.blade.php ENDPATH**/ ?>