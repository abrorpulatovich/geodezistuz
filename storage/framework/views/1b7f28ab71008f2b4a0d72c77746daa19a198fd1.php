<?php $__env->startSection('title', $user->name); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .btn-group > .btn-group:not(:last-child) > .btn, .btn-group > .btn:not(:last-child):not(.dropdown-toggle) {
            border-top-right-radius: 30px !important;
            border-bottom-right-radius: 30px !important;
        }
    </style>
    <!-- Start Content -->
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-xs-12">
                    <?php echo $__env->make('includes.user_profile_leftside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <?php if(session()->has('rezume_added_successfully')): ?>
                        <div class="alert alert-success"><i
                                class="lni lni-check-mark-circle"></i> <?php echo e(session()->get('rezume_added_successfully')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session()->has('rezume_deleted_successfully')): ?>
                        <div class="alert alert-success"><i
                                class="lni lni-check-mark-circle"></i> <?php echo e(session()->get('rezume_deleted_successfully')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session()->has('not_personal_rezume')): ?>
                        <div class="alert alert-danger"><i
                                class="lni lni-warning"></i> <?php echo e(session()->get('not_personal_rezume')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session()->has('error_occurred')): ?>
                        <div class="alert alert-danger"><i
                                class="lni lni-warning"></i> <?php echo e(session()->get('error_occurred')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(sizeof($rezumes) > 0): ?>
                        <div class="job-alerts-item candidates">
                            <?php $__currentLoopData = $rezumes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rezume): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="manager-resumes-item">
                                    <div class="manager-content">
                                        <div class="manager-info">
                                            <div class="manager-name">
                                                <h4><a href="#"><?php echo e($rezume->name); ?></a></h4>
                                                <h6><?php echo e($rezume->specialist->name); ?></h6>
                                            </div>
                                            <div class="manager-meta">
                                                <span class="location"><i class="lni-map-marker"></i> <?php echo e($citizen->region->name_uz); ?>, <?php echo e($citizen->city->name_uz); ?></span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="update-date">
                                        <p class="status">
                                            <strong>Yangilangan sana:</strong> <i
                                                class="lni lni-alarm-clock"></i> <?php echo e($rezume->updated_at); ?>

                                        </p>
                                        <div class="action-btn btn-group">
                                            
                                            <a class="btn btn-xs btn-primary"
                                               href="<?php echo e(route('user_edit_rezume', ['rezume' => $rezume])); ?>"><i
                                                    class="lni lni-pencil"></i> Tahrirlash</a>
                                            <form action="<?php echo e(route('user_delete_rezume')); ?>" method="post"
                                                  onsubmit="return confirm('Siz rostdan ham ushbu rezumeni o\'chirishni xoxlaysizmi?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <input type="hidden" name="rezume_id" value="<?php echo e($rezume->id); ?>"/>
                                                <button type="submit" class="btn btn-xs btn-danger"><i
                                                        class="lni lni-trash"></i> O'chirish
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger"><i class="lni lni-warning"></i> Sizda rezume yo'q</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/profile/user.blade.php ENDPATH**/ ?>