<?php $__env->startSection('title', $rezume->specialist->name); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3><?php echo e($rezume->specialist->name); ?></h3>
                        <p><?php echo e($rezume->user->citizen->full_name); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Start Content -->
    <div class="section">
        <div class="container">
            <div class="row">














                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="inner-box my-resume">
                        <div class="author-resume">














                            <h3><?php echo e($rezume->user->citizen->full_name); ?></h3>
                            <h6><b><?php echo e($rezume->name); ?></b></h6>
                            <p><span class="address"><i class="lni-map-marker"></i><?php echo e($rezume->user->citizen->region->name_uz); ?>, <?php echo e($rezume->user->citizen->city->name_uz); ?></span>
                                <br> <span><i class="lni lni-phone"></i> <?php echo e($rezume->user->citizen->phone_number); ?></span></p>






                        </div>
                        <div class="about-me item">
                            <h3>Kandidat haqida</h3>
                            <?php echo $rezume->about_me; ?>

                        </div>
                        <div class="work-experence item">
                            <h3>Ish tajribasi</h3>
                            <?php if(sizeof($rezume->workbooks) > 0): ?>
                                <?php $__currentLoopData = $rezume->workbooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workbook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h4><?php echo e($workbook->position_name); ?></h4>
                                    <h5><?php echo e($workbook->old_company_name); ?></h5>
                                    <span class="date"><i class="lni lni-calendar"></i> <?php echo e(date('d.m.Y', strtotime($workbook->from_date))); ?> - <?php echo e(date('d.m.Y', strtotime($workbook->to_date))); ?></span>

                                    <br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <div class="alert alert-warning"><i class="lni lni-warning"></i> Ish tajribasi mavjud emas</div>
                            <?php endif; ?>
                        </div>
                        <div class="item">
                            <h3>So'ralayotgan maosh</h3>
                            <span class="text-success"><?php echo $rezume->salary_hidden == 0? $rezume->salary . " so'm": "<span class='text-info'>Kelishilgan holda</span>"; ?></span>
                        </div>










                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/rezume_details.blade.php ENDPATH**/ ?>