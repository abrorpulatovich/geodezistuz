<?php $__env->startSection('title', 'Vakantlar'); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3><?php echo $specialist? "<span class='text-success'>" . $specialist->name . "</span>" . " bo'yicha mavjud vakantlar": "<span class='text-success'>Barcha mavjud vakantlar</span>"; ?></h3>
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
                <div class="col-lg-3 col-md-4 col-xs-12">
                    <?php echo $__env->make('includes.specialists_with_vacancies_count', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-9 col-md-8 col-xs-12">
                    <div class="job-alerts-item candidates">
                        <div class="alerts-list">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-12">
                                    <p><b>Vakant nomi</b></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-xs-12">
                                    <p><b>Talab qilinadigan mehnat staji</b></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-xs-12">
                                    <p><b>Tarmoq</b></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-xs-12">
                                    <p><b>Vakant berilgan sana</b></p>
                                </div>
                            </div>
                        </div>
                        <?php if(sizeof($vacancies) > 0): ?>
                            <?php $__currentLoopData = $vacancies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vacancy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="alerts-content">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-5 col-xs-12">
                                            <h3><a href="<?php echo e(route('vacancy_details', ['vacancy' => $vacancy])); ?>"><?php echo e($vacancy->name); ?></a></h3>
                                            <span class="location"><i class="lni-home"></i> <?php echo e($vacancy->company->company_name); ?></span>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-xs-12">
                                            <p><?php echo e($vacancy->vskill->name); ?></p>
                                        </div>
                                        <div class="col-lg-3 col-md-2 col-xs-12">
                                            <p><?php echo e($vacancy->specialist->name); ?></p>
                                        </div>
                                        <div class="col-lg-3 col-md-2 col-xs-12">
                                            <p><?php echo e($vacancy->created_at); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($vacancies->appends(request()->query())->links()); ?>

                        <?php else: ?>
                            <div class="alert alert-warning"><i class="lni lni-warning"></i> Vakantlar mavjud emas</div>
                        <?php endif; ?>
                        <br>
                        <!-- Start Pagination -->










                        <!-- End Pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/vacancies.blade.php ENDPATH**/ ?>