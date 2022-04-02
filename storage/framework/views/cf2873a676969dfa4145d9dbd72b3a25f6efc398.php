<?php $__env->startSection('title', $post->title); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b><?php echo e($post->title); ?></b>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="btn-group">
                                    <a href="<?php echo e(route('post.index')); ?>" class="btn btn-primary btn-sm"><i class="lni lni-arrow-right"></i> Yangiliklar</a>
                                    <a href="<?php echo e(route('post.edit', ['post' => $post])); ?>" class="btn btn-success btn-sm"><i class="lni lni-pencil"></i> Tahrirlash</a>
                                    <form action="<?php echo e(route('post.destroy', ['post' => $post])); ?>" method="POST" id="delete-form" onsubmit="return confirm('Ishonchingiz komilmi? Siz rostdan ham ushbu yangilikni o\'chirishni xoxlaysizmi?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>
                                        <button type="submit" class="btn btn-danger" style="border-bottom-left-radius: 0; border-top-left-radius: 0;"><i class="lni lni-trash"></i> O'chirish</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(session()->has('saved_successfully')): ?>
                            <p class="alert alert-success"><?php echo e(session()->get('saved_successfully')); ?></p>
                        <?php endif; ?>
                        <table class="table table-bordered">
                            <tr>
                                <th><b>Sarlavha</b></th>
                                <td><?php echo e($post->title); ?></td>
                            </tr>
                            <tr>
                                <th><b>Holadi</b></th>
                                <td><?php echo e($post->get_status()[$post->status]); ?></td>
                            </tr>
                            <tr>
                                <th><b>Qisqacha matn</b></th>
                                <td><?php echo $post->short_desc; ?></td>
                            </tr>
                            <tr>
                                <th><b>To'liq matn</b></th>
                                <td><?php echo $post->desc; ?></td>
                            </tr>
                            <tr>
                                <th><b>Tartibi</b></th>
                                <td><?php echo e($post->p_order); ?></td>
                            </tr>
                            <tr>
                                <th><b>Sanasi</b></th>
                                <td><?php echo e($post->publish_date); ?></td>
                            </tr>
                            <tr>
                                <th><b>URL manzilida ko'rishi</b></th>
                                <td><?php echo e($post->slug); ?></td>
                            </tr>
                            <?php if($post->image): ?>
                                <tr>
                                    <th><b>Rasm</b></th>
                                    <td><img src="/storage/uploads/post/medium/<?php echo e($post->image); ?>" width="800" alt="<?php echo e($post->title); ?>"></td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/admin/post/show.blade.php ENDPATH**/ ?>