<?php $__env->startSection('title', $resource->title . ' ni tahrirlash'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b><?php echo e($resource->title); ?> ni tahrirlash</b>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="<?php echo e(route('resource.index')); ?>" class="btn btn-primary btn-sm"><i class="lni lni-arrow-right"></i> Resurs turlari</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php echo $__env->make('admin.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <form action="<?php echo e(route('resource.update', ['resource' => $resource])); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="type_id">Resrus turi</label> <br>
                                    <select name="type_id" id="type_id" class="form-control">
                                        <option value="">---</option>
                                        <?php $__currentLoopData = $resource_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($type->id); ?>" <?php if($resource->id == $type->id): ?> selected <?php endif; ?>><?php echo e($type->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="author">Muallif</label>
                                    <input type="text" name="author" class="form-control" id="author" value="<?php echo e($resource->author); ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="link">Link</label>
                                    <input type="text" name="link" class="form-control" id="link" value="<?php echo e($resource->link); ?>">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="title">Sarlavha</label>
                                    <input type="text" name="title" class="form-control" id="title" value="<?php echo e($resource->title); ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="status">Holati</label> <br>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">---</option>
                                        <option value="2" <?php if($resource->status == 2): ?> selected <?php endif; ?>>Aktiv</option>
                                        <option value="1" <?php if($resource->status == 1): ?> selected <?php endif; ?>>Aktiv emas</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="r_order">Tartibi</label> <br>
                                    <input type="number" name="r_order" class="form-control" id="r_order" value="<?php echo e($resource->r_order); ?>">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="desc">To'liq matn</label>
                                    <textarea name="desc" id="desc" cols="30" rows="10"><?php echo e($resource->desc); ?></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="lni lni-save"></i> Saqlash</button>
                                        <a href="<?php echo e(route('resource.index')); ?>" class="btn btn-secondary btn-sm"><i class="lni lni-arrow-left"></i> Orqaga qaytish</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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
                {name: 'insert', groups: ['insert'], items: ['Image', 'Table', 'SpecialChar']},
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/admin/resources/edit.blade.php ENDPATH**/ ?>