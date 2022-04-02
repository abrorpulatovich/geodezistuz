<?php $__env->startSection('title', 'Yangiliklar'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b><?php echo e(__('Yangiliklar')); ?></b>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="<?php echo e(route('post.create')); ?>" class="btn btn-primary btn-sm"><i class="lni lni-plus"></i> Qo'shish</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(session()->has('deleted_successfully')): ?>
                            <p class="alert alert-success"><i class="lni lni-warning"></i> <?php echo e(session()->get('deleted_successfully')); ?></p>
                        <?php endif; ?>
                        <?php if(sizeof($posts)): ?>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><b>#</b></th>
                                        <th><b>Sarlavha</b></th>
                                        <th><b>Sana</b></th>
                                        <th><b>Holati</b></th>
                                        <th><b>Tartibi</b></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$loop->index); ?></td>
                                            <td><?php echo e($post->title); ?></td>
                                            <td><?php echo e($post->publish_date); ?></td>
                                            <td><?php echo e($post->get_status()[$post->status]); ?></td>
                                            <td><?php echo e($post->p_order); ?></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="btn-group">
                                                            <a href="<?php echo e(route('post.show', ['post' => $post])); ?>" class="btn btn-primary btn-sm"><i class="lni lni-eye"></i></a>
                                                            <a href="<?php echo e(route('post.edit', ['post' => $post])); ?>" class="btn btn-secondary btn-sm"><i class="lni lni-pencil"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <br>
                            <?php echo e($posts->appends(request()->query())->links()); ?>

                        <?php else: ?>
                            <div class="alert alert-danger"><i class="lni lni-warning"></i> Yangiliklar yo'q</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/admin/post/index.blade.php ENDPATH**/ ?>