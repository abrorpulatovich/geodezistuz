<?php $__env->startSection('title', 'Yangiliklar'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Yangiliklar</h3>
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
                <?php if(sizeof($news) > 0): ?>
                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- Start Post -->
                        <div class="blog-post">
                        <?php if($new->image): ?>
                            <!-- Post thumb -->
                            <div class="post-thumb">
                                <a href="<?php echo e(route('news_details', ['slug' => $new->slug])); ?>">
                                    <img class="img-fluid" src="/storage/uploads/post/medium/<?php echo e($new->image); ?>" width="100%" alt="<?php echo e($new->title); ?>">
                                </a>
                                <div class="hover-wrap"></div>
                            </div>
                            <!-- End Post post-thumb -->
                        <?php endif; ?>
                        <!-- Post Content -->
                            <div class="post-content">
                                <h3 class="post-title"><a href="<?php echo e(route('news_details', ['slug' => $new->slug])); ?>"><?php echo e($new->title); ?></a></h3>
                                <div class="meta">
                                    <span class="meta-part"><i class="lni-calendar"></i><a href="#"><?php echo e($new->publish_date); ?></a></span>
                                    <span class="meta-part"><a href="#"><i class="lni-eye"></i> <?php echo e($new->view_count); ?></a></span>
                                </div>
                                <p><?php echo $new->short_desc; ?></p>
                                <a href="<?php echo e(route('news_details', ['slug' => $new->slug])); ?>" class="btn btn-common">Batafsil</a>
                            </div>
                            <!-- Post Content -->
                        </div>
                        <!-- End Post -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="alert alert-warning"><i class="lni lni-warning"></i> Yangiliklar topilmadi!!!</div>
                <?php endif; ?>

                <!-- Start Pagination -->
                
                
                
                
                
                
                
                
                
                <!-- End Pagination -->
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

<?php echo $__env->make('layouts.app_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/news/index.blade.php ENDPATH**/ ?>