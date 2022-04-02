<?php $__env->startSection('title', "Vakant qo'shish"); ?>

<?php $__env->startSection('content'); ?>

    <!-- Start Content -->
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-xs-12">
                    <?php echo $__env->make('includes.company_profile_leftside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-9 col-md-12 col-xs-12" style="border: 1px solid #eeeeee; padding: 20px;">
                    <!-- Start Content -->

                    <?php echo $__env->make('admin.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <form method="post" action="<?php echo e(route('vacancy.update', ['vacancy' => $vacancy])); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="col-form-label text-md-end"><?php echo e(__('Nomlanishi')); ?></label>
                                <input id="name" type="text" class="name form-control" name="name" value="<?php echo e($vacancy->name); ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="specialist_id" class="col-form-label text-md-end"><?php echo e(__('Mutaxassislik')); ?></label>
                                <select name="specialist_id" id="specialist_id" class="form-control">
                                    <option value="">Mutaxassislikni tanlang...</option>
                                    <?php $__currentLoopData = $specialists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($specialist->id); ?>" <?php if($vacancy->specialist_id == $specialist->id): ?> selected <?php endif; ?> data-id="<?php echo e($specialist->id); ?>"><?php echo e($specialist->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="skill" class="col-form-label text-md-end"><?php echo e(__('Mehnat staji')); ?></label>
                                <select name="skill" id="skill" class="form-control">
                                    <option value="">Mehnat stajini tanlang...</option>
                                    <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($skill->id); ?>" <?php if($vacancy->skill == $skill->id): ?> selected <?php endif; ?> data-id="<?php echo e($skill->id); ?>"><?php echo e($skill->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-3" id="salary_hidden">
                                <label for="salary" class="col-form-label text-md-end"><?php echo e(__('Oylik maosh (so‘m)')); ?></label>
                                <input id="salary" type="text" class="salary form-control" name="salary" value="<?php echo e($vacancy->salary); ?>">
                            </div>
                            <div class="col-md-3 mt-4">
                                <label class="col-form-label text-md-end">
                                    <input type="checkbox" id="is_salary" name="is_salary" value="<?php echo e($vacancy->is_salary); ?>" class="hide_salary"><span> <?php echo e(__('Oylik kelishlgan holda')); ?></span>
                                </label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="desc">Vakant haqida (To'liq matn)</label>
                                <textarea name="desc" id="desc" cols="30" rows="10"><?php echo e($vacancy->desc); ?></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="lni lni-save"></i> Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">

        CKEDITOR.replace('desc', {
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

<?php echo $__env->make('layouts.app_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/profile/editvacancy.blade.php ENDPATH**/ ?>