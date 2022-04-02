<?php $__env->startSection('title', 'Resruslar'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3><span class="text-success"><?php echo e($resource_type->name); ?></span> bo'yicha resruslar</h3>
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
                <?php if(sizeof($resources) > 0): ?>
                    <?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- Start Post -->
                            <div class="blog-post">
                                <!-- Post Content -->
                                <div class="post-content">
                                    <h3 class="post-title"><a
                                            href="<?php echo e(route('news_details', ['slug' => $resource->slug])); ?>"><?php echo e($resource->title); ?></a>
                                    </h3>
                                    <div class="meta">
                                        <span class="meta-part"><i class="lni-user"></i><a
                                                href="#"><?php echo e($resource->author); ?></a></span>
                                        <span class="meta-part"><a href="#"><i class="lni-eye"></i> <?php echo e($resource->clicked_count); ?></a></span>
                                    </div>
                                    <p><?php echo substr($resource->desc, 0, 200); ?>...</p>
                                    <a href="<?php echo e(route('resource_details', ['slug' => $resource->slug])); ?>"
                                       class="btn btn-common"><i class="lni lni-arrow-right"></i> Batafsil</a>
                                </div>
                                <!-- Post Content -->
                            </div>
                            <!-- End Post -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($resources->appends(request()->query())->links()); ?>

                    <?php else: ?>
                        <div class="alert alert-warning"><i class="lni lni-warning"></i> <?php echo e($resource_type->name); ?>

                            bo'yicha resruslar topilmadi!!!
                        </div>
                    <?php endif; ?>
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

<?php echo $__env->make('layouts.app_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/resources/index.blade.php ENDPATH**/ ?>