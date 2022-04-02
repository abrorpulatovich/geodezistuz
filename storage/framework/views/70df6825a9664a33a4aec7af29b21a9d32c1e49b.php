<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
            	<div class="card-header"><?php echo e(__('Korxona ma‘lumotlarini tahrirlash')); ?></div>
            	<div class="card-body">
            	<div class="mb-3">
					  <a href="	<?php echo e(url()->previous()); ?>"><button class="btn btn-primary" type="button">Orqaga <i class="bi bi-box-arrow-in-left"></i></button></a>
				 </div>
				<form method="post" action="<?php echo e(route('companies.update', ['company' => $company->id])); ?>">
		  		  <?php echo method_field('PUT'); ?>
				  <?php echo csrf_field(); ?>
				  <?php echo $__env->make('companies.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				 
				  <button type="submit" class="btn btn-success">Saqlash</button>
				</form>
			</div>
			</div>
		</div>
	</div>	
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/companies/edit.blade.php ENDPATH**/ ?>