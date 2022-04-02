
<div class="row mb-3">
	<div class="col-md-4">
		<label for="specialist_id" class="col-form-label text-md-end"><?php echo e(__('Mavjud vakansiyani tanlang')); ?></label>
		<select name="specialist_id" required id="specialist_id" class="form-control">
            <option value="">Vakansiyani tanlang...</option>
                <?php $__currentLoopData = $specialists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($specialist->id); ?>" data-id="<?php echo e($specialist->id); ?>" ><?php echo e($specialist->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
	</div>
	<div class="col-md-3">
		<label for="skill" class="col-form-label text-md-end"><?php echo e(__('Mehnat staji')); ?></label>
		<select name="skill" required id="skill" class="form-control">
            <option value="">Mehnat stajini tanlang...</option>
                <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($skill->id); ?>" data-id="<?php echo e($skill->id); ?>" ><?php echo e($skill->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
	</div>
</div>
<div class="row mb-3">
	<div class="col-md-3" id="salary_hidden">
		<label for="salary" class="col-form-label text-md-end"><?php echo e(__('Oylik maosh (so‘m)')); ?></label>
		<input id="salary" type="text" class="salary form-control" name="salary" value="<?php echo e(old('salary') ?? $vacancy->salary); ?>" required="required">
	</div>
	<div class="col-md-3 mt-4">
		<label class="col-form-label text-md-end">
			<input type="checkbox" id="is_salary" name="is_salary" value="0" class="hide_salary"><span> <?php echo e(__('Oylikni kelishamiz')); ?></span>
		</label>
	</div>
</div>
<?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/vacancies/form.blade.php ENDPATH**/ ?>