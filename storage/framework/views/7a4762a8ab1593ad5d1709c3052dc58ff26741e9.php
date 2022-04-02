<?php $__env->startSection('title', 'Rezumelar'); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Rezumelar</h3>
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
                    <div class="job-alerts-item candidates">
                        <?php if(sizeof($rezumes) > 0): ?>
                            <?php $__currentLoopData = $rezumes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rezume): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="manager-resumes-item">
                                    <div class="manager-content">
                                        <div class="manager-info">
                                            <div class="manager-name">
                                                <h4><a href="<?php echo e(route('rezume_details', ['rezume' => $rezume])); ?>"><?php echo e($rezume->user->citizen->full_name); ?></a></h4>
                                                <h4><?php echo e($rezume->name); ?></h4>
                                            </div>
                                            <div class="manager-meta">
                                                <span class="location"><i class="lni-map-marker"></i> <?php echo e($rezume->user->citizen->region->name_uz); ?>, <?php echo e($rezume->user->citizen->city->name_uz); ?></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="update-date">
                                        <p class="status">
                                            <strong>Yangilangan sana:</strong> <i class="lni lni-alarm-clock"></i> <?php echo e($rezume->updated_at); ?>

                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="alert alert-warning"><i class="lni lni-warning"></i> Rezumelar mavjud emas</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/rezumes.blade.php ENDPATH**/ ?>