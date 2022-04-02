<?php $__env->startSection('title', "Rezume qo'shish"); ?>

<?php $__env->startSection('content'); ?>

    <!-- Start Content -->
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1 col-md-12 col-xs-12"></div>
                <div class="col-lg-3 col-md-12 col-xs-12">
                    <?php echo $__env->make('includes.user_profile_leftside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-7 col-md-12 col-xs-12" style="border: 1px solid #eee; padding: 20px;">

                    <?php echo $__env->make('admin.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <form method="post" action="<?php echo e(route('user_post_rezume')); ?>">
                        <?php echo csrf_field(); ?>
                        <h6>Shaxsiy ma‘lumotlaringiz</h6>
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
                                <label for="about_me" class="col-form-label text-md"><?php echo e(__('Men haqimda')); ?></label>
                                <textarea name="about_me" id="about_me" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <hr style="height: 5%;">
                            </div>
                        </div>
                        <h6>Mehnat stajingiz</h6>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="col-form-label text-md-end">
                                    <input type="checkbox" id="is_history" name="is_history" value="0" class="history_hide"><span> <?php echo e(__('Mehnat staji mavjud emas')); ?></span>
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
                                                <button type="button" class="btn btn-primary" id="plus_btn"><i class="lni lni-plus"></i></button>
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
                <div class="col-lg-1 col-md-12 col-xs-12"></div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">

        CKEDITOR.replace('about_me', {
            filebrowserUploadUrl: "<?php echo e(route('ckeditor_image_upload', ['_token' => csrf_token() ])); ?>",
            filebrowserUploadMethod: 'form',
            allowedContent: true,
            toolbar: [
                {name: 'document', groups: ['mode', 'document', 'doctools'], items: ['Source', '-', '-']},
                {
                    name: 'clipboard',
                    groups: ['clipboard', 'undo'],
                    items: ['Cut', 'Copy', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
                },
                {
                    name: 'editing',
                    groups: ['find', 'selection', 'spellchecker', 'editing'],
                    items: ['-', '-', 'Scayt']
                },
                {name: 'forms', groups: ['forms'], items: ['']},
                {
                    name: 'paragraph',
                    groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph'],
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'Language']
                },
                {name: 'links', groups: ['links'], items: ['Link', 'Unlink', 'Anchor']},
                {name: 'insert', groups: ['insert'], items: ['Table', 'SpecialChar']},
                {name: 'styles', groups: ['styles'], items: ['Styles', 'Format', 'Font', 'FontSize']},
                {name: 'colors', groups: ['colors'], items: ['TextColor', 'BGColor']},
                {
                    name: 'basicstyles',
                    groups: ['basicstyles', 'cleanup'],
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-']
                },
                {name: 'tools', groups: ['tools'], items: ['Maximize']},
                {name: 'others', groups: ['others'], items: ['-']},
                {name: 'about', groups: ['about'], items: ['About']}
            ],
            toolbarGroups: [
                {name: 'document', groups: ['mode', 'document', 'doctools']},
                {name: 'clipboard', groups: ['clipboard', 'undo']},
                {name: 'editing', groups: ['find', 'selection', 'spellchecker', 'editing']},
                {name: 'forms', groups: ['forms']},
                {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']},
                {name: 'links', groups: ['links']},
                {name: 'insert', groups: ['insert']},
                {name: 'styles', groups: ['styles']},
                {name: 'colors', groups: ['colors']},
                {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
                {name: 'tools', groups: ['tools']},
                {name: 'others', groups: ['others']},
                {name: 'about', groups: ['about']}
            ]
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/profile/addrezume.blade.php ENDPATH**/ ?>