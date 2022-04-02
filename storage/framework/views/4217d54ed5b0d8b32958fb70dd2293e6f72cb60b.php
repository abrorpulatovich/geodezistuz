<?php $__env->startSection('content'); ?>

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Bo'sh ish o'rni qo'shish</h3>
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
                <div class="col-lg-12 col-md-12 col-xs-12" style="border: 1px solid #eee; padding: 20px;">
                    <form method="post" action="<?php echo e(route('vacancies.store')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="specialist_id"
                                       class="col-form-label text-md-end"><?php echo e(__('Mavjud vakansiyani tanlang')); ?></label>
                                <select name="specialist_id" required id="specialist_id" class="form-control">
                                    <option value="">Vakansiyani tanlang...</option>
                                    <?php $__currentLoopData = $specialists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($specialist->id); ?>"
                                                data-id="<?php echo e($specialist->id); ?>"><?php echo e($specialist->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-3">
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
                            <div class="col-md-3" id="salary_hidden">
                                <label for="salary"
                                       class="col-form-label text-md-end"><?php echo e(__('Oylik maosh (so‘m)')); ?></label>
                                <input id="salary" type="text" class="salary form-control" name="salary"
                                       value="<?php echo e(old('salary') ?? $vacancy->salary); ?>" required="required">
                            </div>
                            <div class="col-md-3 mt-4">
                                <label class="col-form-label text-md-end">
                                    <input type="checkbox" id="is_salary" name="is_salary" value="0" class="hide_salary"><span> <?php echo e(__('Oylikni kelishamiz')); ?></span>
                                </label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="desc">Bo'sh ish o'rni haqida</label>
                                <textarea name="desc" id="desc" cols="30" rows="10"><?php echo e(old('desc')); ?></textarea>
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

<?php echo $__env->make('layouts.app_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/vacancies/create.blade.php ENDPATH**/ ?>