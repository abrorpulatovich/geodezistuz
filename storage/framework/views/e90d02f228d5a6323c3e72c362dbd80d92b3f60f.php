<?php $__env->startSection('title', $message->subject); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b><?php echo e($message->fio); ?></b>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="<?php echo e(route('admin.messages')); ?>" class="btn btn-primary btn-sm"><i class="lni lni-arrow-right"></i> Xabarlarga qaytish</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th><b>FIO</b></th>
                                <td><?php echo e($message->fio); ?></td>
                            </tr>
                            <tr>
                                <th><b>Telefon</b></th>
                                <td><?php echo e($message->phone); ?></td>
                            </tr>
                            <tr>
                                <th><b>Mavzu</b></th>
                                <td><?php echo e($message->subject); ?></td>
                            </tr>
                            <tr>
                                <th><b>Jo'natilgan vaqti</b></th>
                                <td><?php echo e(date('d-m-Y H:i:s', strtotime($message->created_at))); ?></td>
                            </tr>
                            <tr>
                                <th><b>Xabar</b></th>
                                <td><?php echo e($message->message); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/admin/message/details.blade.php ENDPATH**/ ?>