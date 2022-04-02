<?php $__env->startSection('title', $vacancy->name); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-xs-12">
                    <div class="breadcrumb-wrapper">
                        <div class="img-wrapper">
                            <img src="/assets/img/about/company-logo.png" alt="">
                        </div>
                        <div class="content">
                            <h3 class="product-title"><?php echo e($vacancy->name); ?></h3>
                            <p class="brand"><b><i class="lni lni-home"></i> <?php echo e($vacancy->company->company_name); ?></b></p>
                            <div class="tags">
                                <span><i class="lni-map-marker"></i> <?php echo e($vacancy->company->region->name_uz); ?>, <?php echo e($vacancy->company->city->name_uz); ?></span>
                                <br>
                                <span><i class="lni-calendar"></i> <?php echo e($vacancy->created_at); ?></span>
                                <br>
                                <span><i class="lni-eye"></i> <?php echo e($vacancy->view_count); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="month-price">
                        <span class="year">Kutilayotgan maosh</span>
                        <div class="price">
                            <?php echo e(($vacancy->salary_hidden == 1)? 'Kelishilgan holda': $vacancy->salary); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Job Detail Section Start -->
    <section class="job-detail section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="content-area">
                        <?php echo $vacancy->desc; ?>

                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-xs-12">
                    <?php echo $__env->make('includes.specialists_with_vacancies_count', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Job Detail Section End -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/vacancy_details.blade.php ENDPATH**/ ?>