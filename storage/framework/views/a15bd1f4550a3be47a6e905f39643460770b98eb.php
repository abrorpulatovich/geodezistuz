<?php $__env->startSection('title', $resource->title); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3><?php echo e($resource->title); ?></h3>
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
                <!-- Start Blog Posts -->
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <!-- Start Post -->
                    <div class="blog-post">

                        <!-- Post Content -->
                        <div class="post-content">
                            <h3 class="post-title"><a href="#"><?php echo e($resource->title); ?></a></h3>
                            <div class="meta">
                                <span class="meta-part"><i class="lni-user"></i><a href="#"><?php echo e($resource->author); ?></a></span>
                                <span class="meta-part"><a href="#"><i class="lni-eye"></i> <?php echo e($resource->clicked_count); ?></a></span>
                                <span class="meta-part"><a href="#"><i class="lni-calendar"></i> <?php echo e($resource->created_at); ?></a></span>
                            </div>
                            <p><?php echo $resource->desc; ?></p>
                            <p>
                                <a href="<?php echo e($resource->link); ?>" class="btn btn-success"><i class="lni lni-arrow-right"></i> Resrus manbaasi</a>
                            </p>
                        </div>
                        <!-- Post Content -->
                    </div>
                    <!-- End Post -->
                </div>
                <!-- End Blog Posts -->

                <!--Sidebar-->
                <aside id="sidebar" class="col-lg-4 col-md-12 col-xs-12">
                    <?php echo $__env->make('includes.specialists_with_vacancies_count', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </aside>
                <!--End sidebar-->
            </div>
        </div>
    </div>
    <!-- End Content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/resources/details.blade.php ENDPATH**/ ?>