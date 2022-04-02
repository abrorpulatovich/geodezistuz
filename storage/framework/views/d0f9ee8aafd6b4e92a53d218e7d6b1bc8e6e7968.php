<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title', 'Geodezist'); ?></title>

    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/line-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/owl.theme.default.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/slicknav.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/style.css')); ?>">

</head>
<body>
        <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <br>
        <br>
        <br>

        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Go To Top Link -->
        <a href="#" class="back-to-top">
          <i class="lni-arrow-up"></i>
        </a>

        <!-- Preloader -->
        <div id="preloader">
          <div class="loader" id="loader-1"></div>
        </div>
        <!-- End Preloader -->

    <script src="<?php echo e(asset('/assets/js/jquery-min.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/js/color-switcher.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/js/jquery.slicknav.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/js/wow.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/js/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/js/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/js/form-validator.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/js/contact-form-script.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/js/main.js')); ?>"></script>

    <script src="<?php echo e(asset('js/jquery.inputmask.bundle.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/form.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/dinamic-form.js')); ?>" defer></script>
</body>
</html>
<?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/layouts/app_template.blade.php ENDPATH**/ ?>