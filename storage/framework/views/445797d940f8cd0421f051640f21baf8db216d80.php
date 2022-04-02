<?php $__env->startSection('title', "Resrus turi qo'shish"); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b>Resurs turi qo'shish</b>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="<?php echo e(route('resource_type.index')); ?>" class="btn btn-primary btn-sm"><i class="lni lni-arrow-right"></i> Resurs turlari</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php echo $__env->make('admin.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <form action="<?php echo e(route('resource_type.store')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="name">Nomi</label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?php echo e(old('name')); ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="status">Holati</label> <br>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">---</option>
                                        <option value="2" <?php if(old('status') == 2): ?> selected <?php endif; ?>>Aktiv</option>
                                        <option value="1" <?php if(old('status') == 1 and old('status') != null): ?> selected <?php endif; ?>>Aktiv emas</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="r_order">Tartibi</label> <br>
                                    <input type="number" name="r_order" class="form-control" id="r_order" value="<?php echo e(old('r_order')); ?>">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="lni lni-save"></i> Saqlash</button>
                                        <a href="<?php echo e(route('resource_type.index')); ?>" class="btn btn-secondary btn-sm"><i class="lni lni-arrow-left"></i> Orqaga qaytish</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/admin/resource_types/create.blade.php ENDPATH**/ ?>