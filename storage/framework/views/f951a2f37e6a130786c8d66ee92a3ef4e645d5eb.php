<?php $__env->startSection('title', $keyword . " bo'yicha topilgan natijalar"); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3><span class="text-success"><?php echo e($keyword); ?></span> bo'yicha topilgan natijalar</h3>
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
                        <?php if(isset($result['result_data']) && sizeof($result['result_data']) > 0): ?>
                            <?php $__currentLoopData = $result['result_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="manager-resumes-item">
                                    <div class="manager-content">
                                        <?php if($item['key'] == 'Vakant'): ?>
                                            <div class="manager-info">
                                                <div class="manager-name">
                                                    <a href="<?php echo e(route('vacancy_details', ['vacancy' => $item['id']])); ?>"><?php echo e($item['result']); ?></a>
                                                </div>
                                                <div class="manager-meta">
                                                    <?php echo e($item['key']); ?>

                                                </div>
                                            </div>
                                        <?php elseif($item['key'] == 'Rezume'): ?>
                                            <div class="manager-info">
                                                <div class="manager-name">
                                                    <a href="<?php echo e(route('rezume_details', ['rezume' => $item['id']])); ?>"><?php echo e($item['result']); ?></a>
                                                </div>
                                                <div class="manager-meta">
                                                    <?php echo e($item['key']); ?>

                                                </div>
                                            </div>
                                        <?php elseif($item['key'] == 'Yangilik'): ?>
                                            <div class="manager-info">
                                                <div class="manager-name">
                                                    <a href="<?php echo e(route('news_details', ['slug' => $item['slug']])); ?>"><?php echo e($item['result']); ?></a>
                                                </div>
                                                <div class="manager-meta">
                                                    <?php echo e($item['key']); ?>

                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="alert alert-warning"><i class="lni lni-warning"></i> <span class="text-success"><?php echo e($keyword); ?></span> bo'yicha topilgan natijalar topilmadi</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/search_result.blade.php ENDPATH**/ ?>