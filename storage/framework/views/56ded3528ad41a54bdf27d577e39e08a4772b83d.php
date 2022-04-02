<?php $__env->startSection('content'); ?>

<div class="page-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-header">
          <h3><?php echo e(__('Kirish')); ?></h3>
        </div>
      </div>
    </div>
  </div>
</div>

<section id="content" class="section-padding">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-6 col-xs-12">
        <div class="page-login-form box">
          <h3>
            Kirish
          </h3>
            <?php if(session()->has('username_or_password_incorrect')): ?>
                <div class="alert alert-danger"><i class="lni lni-warning"></i> <?php echo e(session()->get('username_or_password_incorrect')); ?></div>
            <?php endif; ?>
          <form method="POST" class="login-form" action="<?php echo e(route('post_login')); ?>">
                <?php echo csrf_field(); ?>
                    <div class="form-group">
                      <div class="input-icon">
                        <i class="lni-user"></i>
                        <input id="username" type="text" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="username" value="<?php echo e(old('username')); ?>" required autocomplete="username" autofocus placeholder="Username">

                        <?php $__errorArgs = ['username'];
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
                    </div>

                    <div class="form-group">
                      <div class="input-icon">
                        <i class="lni-lock"></i>
                        <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password" placeholder="Password">

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
                    </div>
                    <div class="form-group form-check">
                      <input type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                            <label class="form-check-label" for="remember">
                                <?php echo e(__('Eslab qol')); ?>

                            </label>
                    </div>
                        <button type="submit" class="btn btn-success log-btn">
                            <?php echo e(__('Kirish')); ?>

                        </button>

                        <!-- <?php if(Route::has('password.request')): ?>
                            <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                <?php echo e(__('Forgot Your Password?')); ?>

                            </a>
                        <?php endif; ?> -->
            </form>
            <p class="text-center"><a href="<?php echo e(route('register')); ?>">Ro‘yxatdan o‘tish uchun</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/auth/login.blade.php ENDPATH**/ ?>