<div class="row mb-3">
    <!-- company -->
    <div class="col-md-4">
        <label for="company_name" class="col-form-label text-md-end"><?php echo e(__('Kompaniya nomi *')); ?></label>
        <input id="company_name" type="text" class="form-control" name="company_name" value="<?php echo e($company->company_name); ?>" autocomplete="company_name" autofocus>
    </div>
    
    <!-- company -->
    <div class="col-md-4">
        <label for="company_inn" class="col-form-label text-md-end"><?php echo e(__('Kompaniya inn *')); ?></label>
        <input id="company_inn" type="text" class="inn form-control" name="company_inn" value="<?php echo e($company->company_inn); ?>" autocomplete="company_inn" autofocus>
    </div>

    <!-- both -->
    <div class="col-md-4">
        <label for="name" class="col-form-label text-md-end"><?php echo e(__('Korxona rahbari ismi *')); ?></label>
        <input id="name" type="text" class="form-control" name="name" value="<?php echo e($company->full_name); ?>" required autocomplete="name" autofocus>
    </div>                            
</div>
<div class="row mb-3">

    <!-- both -->
    <div class="col-md-4">
        <label for="region_id" class="col-form-label text-md-end"><?php echo e(__('Viloyat *')); ?></label>
        <select name="region_id" required id="region_id" class="form-control">
            <option value="">Viloyatni tanlang...</option>
                <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($company->region_id == $region->id): ?>
                        <option value="<?php echo e($region->id); ?>" selected="selected" data-id="<?php echo e($region->id); ?>"><?php echo e($region->name_uz); ?></option>
                    <?php endif; ?>
                    <option value="<?php echo e($region->id); ?>" data-id="<?php echo e($region->id); ?>" ><?php echo e($region->name_uz); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <!-- both -->
    <div class="col-md-4">
        <label for="city_id" class="col-form-label text-md-end"><?php echo e(__('Tuman')); ?></label>
        <select id="city_id" class="form-control" name="city_id">
            <option value="">Tumanni tanlang...</option>
            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($company->city_id == $city->id): ?>
                    <option value="<?php echo e($city->id); ?>" selected="selected" data-id="<?php echo e($city->id); ?>"><?php echo e($city->name_uz); ?></option>
                <?php endif; ?>
                <option value="<?php echo e($city->id); ?>" data-id="<?php echo e($city->id); ?>" ><?php echo e($city->name_uz); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <!-- company -->
    <div class="col-md-4">
        <label for="address" class="col-form-label text-md-end"><?php echo e(__('Korxona manzili')); ?></label>
        <input id="address" type="text" class="form-control" name="address" value="<?php echo e($company->address); ?>" autocomplete="address">
    </div>
</div>

<div class="row mb-3">

    <!-- both -->
    <div class="col-md-4">
        <label for="phone_number" class="col-form-label text-md-end"><?php echo e(__('Telefon raqam *')); ?></label>
        <input id="phone_number" type="text" class="phone form-control" name="phone_number" value="<?php echo e($company->company_phone_number); ?>" required autocomplete="phone_number" autofocus>
    </div>

    <!-- company -->
    <div class="col-md-4">
        <label for="web_site" class="col-form-label text-md-end"><?php echo e(__('Web sayt')); ?></label>
        <input id="web_site" type="web_site" class="form-control" name="web_site" value="<?php echo e($company->web_site); ?>" autocomplete="web_site">
    </div>          

    <!-- company -->
    <!-- <div class="col-md-4">
        <label for="logo" class="col-form-label text-md-end"><?php echo e(__('Logo')); ?></label>
        <input id="logo" type="file" class="form-control" name="logo" value="<?php echo e($company->logo_path); ?>">
    </div> -->

</div>
<?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/companies/form.blade.php ENDPATH**/ ?>