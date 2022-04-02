<?php $__env->startSection('content'); ?>

<div class="page-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-header">
          <h3><?php echo e(__('Ro‘yxatdan o‘tish')); ?></h3>
        </div>
      </div>
    </div>
  </div>
</div>

<section id="content" class="section-padding">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-9 col-md-12 col-xs-12">
        <div class="page-login-form box post-job">



            <div class="row">
                <div class="col-md-6">
                    <input type="radio" name="user_check" class="btn-check" value="role_citizen" id="citizen" checked autocomplete="off" style="display:none;">
                    <label for="citizen" class="btn btn-common btn-block mt-3">Jismoniy shaxs</label>
                </div>
                <div class="col-md-6">
                    <input type="radio" name="user_check" class="btn-check" value="role_company" id="company" autocomplete="off" style="display:none">
                    <label for="company" class="btn btn-common btn-block mt-3">Yuridik shaxs</label>
                </div>
            </div>

            <h3 class="mt-2" id="nameregister">
                <?php echo e(__('Jismoniy shaxs uchun ro‘yxatdan o‘tish')); ?>

            </h3>

            <?php echo $__env->make('admin.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <form method="POST" action="<?php echo e(route('post_register')); ?>" enctype="multipart/form-data" class="form-ad">
                <?php echo csrf_field(); ?>

                <div class="row mb-3">
                    <div class="col-md-4 form-group" id="passport_hide">
                        <label for="passport" class="control-label"><?php echo e(__('Passport seriya')); ?> <span style="color: red;">*</span></label>
                        <input id="passport" type="text" class="passport form-control <?php $__errorArgs = ['passport'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="passport" value="<?php echo e(old('passport')); ?>" autocomplete="passport" autofocus required="required">
                    </div>
                </div>
                <div class="row mb-3">
                    <!-- status -->
                    <div style="display: none;">
                        <input type="number" name="status" id="status" value="1">
                    </div>

                    <!-- company -->
                    <div class="col-md-4 form-group" style="display: none;" id="comp_nameshow">
                        <label for="company_name" class="control-label"><?php echo e(__('Kompaniya nomi')); ?> <span style="color: red;">*</span></label>
                        <input id="company_name" type="text" class="form-control <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="company_name" value="<?php echo e(old('company_name')); ?>" autocomplete="company_name" autofocus>
                    </div>

                    <!-- company -->
                    <div class="col-md-4 form-group" style="display: none;" id="comp_innshow">
                        <label for="company_inn" class="control-label"><?php echo e(__('Kompaniya inn')); ?> <span style="color: red;">*</span></label>
                        <input id="company_inn" type="text" class="inn form-control <?php $__errorArgs = ['company_inn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="company_inn" value="<?php echo e(old('company_inn')); ?>" autocomplete="company_inn" autofocus>
                    </div>

                    <!-- citizen -->
                    <div class="col-md-4 form-group" id="full_namehide">
                        <label for="full_name" class="control-label"><?php echo e(__('F.I.O')); ?> <span style="color: red;">*</span></label>
                        <input id="full_name" type="text" class="form-control <?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="full_name" value="<?php echo e(old('full_name')); ?>" autocomplete="full_name" autofocus>

                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- company -->
                    <div class="col-md-4 form-group" style="display: none;" id="comp_directorshow">
                        <label for="director_name" class="control-label"><?php echo e(__('Korxona rahbari')); ?> <span style="color: red;">*</span></label>
                        <input id="director_name" type="text" class="form-control <?php $__errorArgs = ['director_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="director_name" value="<?php echo e(old('director_name')); ?>" autocomplete="director_name" autofocus>

                        <?php $__errorArgs = ['director_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- citizen -->
                    <div class="col-md-4 form-group" id="emailhide">
                        <label for="email" class="control-label"><?php echo e(__('E-Mail Address')); ?></label>

                        <input id="email" type="email" class="email form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" autocomplete="email">

                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- citizen -->
                    <div class="col-md-4 form-group" id="birthhide">
                        <label for="birth_date" class="control-label"><?php echo e(__('Tug‘ilgan sana')); ?> <span style="color: red;">*</span></label>

                        <input id="birth_date" type="text" class="birth_date form-control <?php $__errorArgs = ['birth_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="birth_date" value="<?php echo e(old('birth_date')); ?>" autocomplete="birth_date" required="required">
                    </div>
                </div>
                <div class="row mb-3">

                    <!-- both -->
                    <div class="col-md-4 form-group">
                        <label for="region_id" class="control-label"><?php echo e(__('Viloyat')); ?> <span style="color: red;">*</span></label>
                        <div class="search-category-container">
                            <label class="styled-select">
                                <select name="region_id" required id="region_id" class="dropdown-product selectpicker">
                                    <option value="">Viloyatni tanlang...</option>
                                        <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($region->id); ?>" data-id="<?php echo e($region->id); ?>" ><?php echo e($region->name_uz); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </label>
                        </div>
                    </div>

                    <!-- both -->
                    <div class="col-md-4 form-group">
                        <label for="city_id" class="control-label"><?php echo e(__('Tuman')); ?></label>
                        <div class="search-category-container">
                            <label class="styled-select">
                                <select id="city_id" class="dropdown-product selectpicker" name="city_id">
                                    <option value="">Tumanni tanlang...</option>
                                </select>
                            </label>
                        </div>
                    </div>

                    <!-- citizen -->
                    <div class="col-md-2 form-group" id="genderhide">
                        <label for="gender" class="control-label"><?php echo e(__('Jinsi')); ?> <span style="color: red;">*</span></label>
                        <div class="radio">
                            <input type="radio" name="gender" id="genderM" checked value="1">
                            <label for="genderM" class="radio-label">Erkak</label><br>

                            <input type="radio" name="gender" id="genderF" value="0">
                            <label for="genderF" class="radio-label">Ayol</label>
                        </div>
                    </div>

                    <!-- company -->
                    <div class="col-md-4 form-group" style="display: none;" id="comp_addressshow">
                        <label for="address" class="control-label"><?php echo e(__('Korxona manzili')); ?></label>
                        <input id="address" type="text" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="address" value="<?php echo e(old('address')); ?>" autocomplete="address">
                    </div>
                </div>

                <div class="row mb-3">

                    <!-- both -->
                    <div class="col-md-4 form-group">
                        <label for="phone_number" class="control-label"><?php echo e(__('Telefon raqam')); ?> <span style="color: red;">*</span></label>
                        <input id="phone_number" type="text" class="phone form-control <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone_number" value="<?php echo e(old('phone_number')); ?>" required autocomplete="phone_number" autofocus>
                    </div>

                    <!-- company -->
                    <div class="col-md-4 form-group" style="display: none;" id="comp_siteshow">
                        <label for="web_site" class="control-label"><?php echo e(__('Web sayt')); ?></label>
                        <input id="web_site" type="text" class="form-control <?php $__errorArgs = ['website'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="website" value="<?php echo e(old('website')); ?>" autocomplete="website">
                    </div>

                    <!-- company -->
                    <div class="col-md-4 form-group" style="display: none;" id="comp_logoshow">
                        <label for="logo" class="control-label"><?php echo e(__('Logo')); ?></label>
                        <input id="logo" type="file" class="form-control" name="logo" value="<?php echo e(old('logo')); ?>">
                    </div>

                    <!-- citizen -->
                    <div class="col-md-4 form-group" id="specialisthide">
                        <label for="specialist_id" class="col-form-label text-md-end"><?php echo e(__('Mutaxassislik')); ?></label>
                        <select name="specialist_id" required id="specialist_id" class="form-control">
                            <option value="">Vakansiyani tanlang...</option>
                            <?php $__currentLoopData = $specialists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($specialist->id); ?>" data-id="<?php echo e($specialist->id); ?>" ><?php echo e($specialist->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <!-- citizen -->
                    <div class="col-md-4 form-group" id="avatarhide">
                        <label for="avatar" class="control-label"><?php echo e(__('Rasm')); ?></label>
                        <input id="avatar" type="file" class="form-control" name="avatar" value="<?php echo e(old('avatar')); ?>">
                    </div>

                </div>

                <div class="row mb-3">

                    <!-- both -->
                    <div class="col-md-4 form-group">
                        <label for="username" class="control-label"><?php echo e(__('Login')); ?> <span style="color: red;">*</span></label>
                        <input id="username" type="text" class="form-control" required name="username" value="<?php echo e(old('username')); ?>">
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="password" class="control-label"><?php echo e(__('Parol')); ?> <span style="color: red;">*</span></label>

                        <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="password-confirm" class="control-label"><?php echo e(__('Parolni tasdiqlash')); ?> <span style="color: red;">*</span></label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-3 clearfix"></div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-common log-btn">
                            <?php echo e(__('Ro‘yxatdan o‘tish')); ?>

                        </button>
                        <p class="text-center">Allaqachon ro‘yxatdan o‘tgan?<a href="<?php echo e(route('login')); ?>"> Kirish</a></p>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/auth/register.blade.php ENDPATH**/ ?>