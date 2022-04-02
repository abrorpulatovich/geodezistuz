<?php $__env->startSection('content'); ?>

<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Korxona</h3>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container">        
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-8 col-xs-12">
        <div class="inner-box my-resume">
        	<div class="row">
	    		<a class="btn btn-xs btn-primary" href="<?php echo e(url()->previous()); ?>"><i class="lni lni-angle-double-left"></i> Ortga</a>
			</div>
    		<div class="row mt-3">
    			<div class="author-resume">
		            <div class="thumb">
		              <img src="/assets/img/resume/img-1.png" alt="">
		            </div>
		            <div class="author-info">
		              <h3><?php echo e($company->company_name); ?></h3>
		              <p><span class="address"><i class="lni-map-marker"></i><?php echo e($company::regionName($company->region_id)->name_uz); ?>, <?php echo e($company::cityName($company->city_id)->name_uz ?? ''); ?></span></p>
		              <p><span><i class="lni lni-mobile"></i> <?php echo e($company->company_phone_number); ?></span></p>
		              <!-- <div class="social-link">  
		                <a href="#" class="Twitter"><i class="lni-twitter-filled"></i></a>
		                <a href="#" class="facebook"><i class="lni-facebook-filled"></i></a>
		                <a href="#" class="google"><i class="lni-google-plus"></i></a>
		                <a href="#" class="linkedin"><i class="lni-linkedin-fill"></i></a>
		              </div> -->
		            </div>                  
		        </div>
    		</div>
	      <table class="table table-hover">
				<tr>
					<td>Korxona nomi</td>
					<td><?php echo e($company->company_name); ?></td>
				</tr>
				<tr>
					<td>Korxona INN si</td>
					<td><?php echo e($company->company_inn); ?></td>
				</tr>
				<tr>
					<td>Korxona rahbari</td>
					<td><?php echo e($company->full_name); ?></td>
				</tr>
				<tr>
					<td>Korxona telefon raqami</td>
					<td><?php echo e($company->company_phone_number); ?></td>
				</tr>
				<tr>
					<td>Hudud</td>
					<td><?php echo e($company::regionName($company->region_id)->name_uz); ?>, <?php echo e($company::cityName($company->city_id)->name_uz ?? ''); ?></td>
				</tr>
				<tr>
					<td>Manzil</td>
					<td>
                            <?php echo e($company->address ?? 'Ko‘rsatilmagan'); ?> 
					</td>
				</tr>
				<tr>
					<td>Web sayt</td>
					<td>
						<?php echo e($company->webdite ?? 'Ko‘rsatilmagan'); ?>

					</td>
				</tr>
				<tr>
					<td>Holati</td>
					<td>
						<?php if($company->status == 1): ?>
                            <span class="new-time">Yangi</span>
                        <?php elseif($company->status == 2): ?>
                            <span class="full-time">Tasdiqlangan</span>
                        <?php elseif($company->status == 3): ?>
                            <span class="part-time">Vaqtinchalik bloklangan</span>
                        <?php endif; ?>
					</td>
				</tr>
				<tr>
					<td>Qo'shilgan vaqt</td>
					<td><?php echo e($company->created_at); ?></td>
				</tr>
			</table>
			<div class="mb-3 btn-group">
				 <?php if(Auth::user()->status == 2): ?>
					 		<a type="button" href="<?php echo e(route('companies.edit', ['company' => $company->id])); ?>" class="btn btn-success"><i class="lni lni-pencil"></i> Tahrirlash</a>
				 <?php endif; ?>
				 <?php if(Auth::user()->status == 3): ?>
					 	<form action="<?php echo e(route('companies.destroy', ['company' => $company->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" style="margin-left:4px;" class="btn btn-danger" onclick="return confirm('Haqiqatdan ham ushbu korxonani o‘chirmoqchimisiz?')"><i class="lni lni-trash"></i> O‘chirish</button>
                        </form>
				 <?php endif; ?>

				<?php if(Auth::user()->status == 3): ?>
					<?php if($company->status == 1 || $company->status == 3): ?>
						<form action="<?php echo e(route('companies.check', ['id' => $company->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" style="margin-left:4px;" class="btn btn-success "onclick="return confirm('Haqiqatdan ham ushbu korxonani tasdiqlaysizmi?')"><i class="lni lni-check-box"></i> Tasdiqlash</button>
                        </form>
                    <?php elseif($company->status == 2): ?>
                    	<form action="<?php echo e(route('companies.check', ['id' => $company->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" style="margin-left:4px;" class="btn btn-danger "onclick="return confirm('Haqiqatdan ham ushbu korxonani bloklaysizmi?')"><i class="lni lni-cross-circle"></i> Vaqtinchalik bloklash</button>
                        </form>
                    <?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
      </div>
    </div>
  </div>      
</div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/companies/show.blade.php ENDPATH**/ ?>