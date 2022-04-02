<?php $__env->startSection('title', 'Xabarlar'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Xabarlar</div>
                    <div class="card-body">
                        <?php if(sizeof($messages) > 0): ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><b>#</b></th>
                                        <th><b>FIO</b></th>
                                        <th><b>Telefon</b></th>
                                        <th><b>Mavzu</b></th>
                                        <th><b>Jo'natilgan vaqti</b></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="<?php if(!$message->is_read): ?> bg-warning <?php endif; ?>">
                                            <td><?php echo e(++$loop->index); ?></td>
                                            <td><?php echo e($message->fio); ?></td>
                                            <td><?php echo e($message->phone); ?></td>
                                            <td><?php echo e($message->subject); ?></td>
                                            <td><?php echo e(date('d-m-Y H:i:s', strtotime($message->created_at))); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.message_details', ['id' => $message->id])); ?>" class="btn btn-primary"><i class="lni lni-eye"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <br>
                            <?php echo e($messages->appends(request()->query())->links()); ?>

                        <?php else: ?>
                            <div class="alert alert-danger"><i class="lni lni-warning"></i> Xabarlar yo'q</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/admin/message/index.blade.php ENDPATH**/ ?>