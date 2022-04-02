<?php $__env->startSection('title', "Yangilik qo'shish"); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b>Mutaxassislik qo'shish</b>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="<?php echo e(route('specialist.index')); ?>" class="btn btn-primary btn-sm"><i class="lni lni-arrow-right"></i> Mutaxassisliklar</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <?php echo $__env->make('admin.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <form action="<?php echo e(route('specialist.store')); ?>" method="post">
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
                                    <label for="s_order">Tartibi</label> <br>
                                    <input type="number" name="s_order" class="form-control" id="s_order" value="<?php echo e(old('s_order')); ?>">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="icon">Ikonka</label> <br>
                                    <input type="text" name="icon" class="form-control" id="icon" value="<?php echo e(old('icon')); ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="color">Rang</label> <br>
                                    <input type="text" name="color" class="form-control" id="color" value="<?php echo e(old('color')); ?>">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="lni lni-save"></i> Saqlash</button>
                                        <a href="<?php echo e(route('specialist.index')); ?>" class="btn btn-secondary btn-sm"><i class="lni lni-arrow-left"></i> Orqaga qaytish</a>
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/admin/specialists/create.blade.php ENDPATH**/ ?>