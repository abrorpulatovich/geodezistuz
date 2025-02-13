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

    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/responsive.css')); ?>">

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/jquery.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/jquery.inputmask.bundle.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/form.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/dinamic-form.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Styles -->


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    Geodezist Admin
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right"></i> <?php echo e(__('Tizimdan chiqish')); ?>

                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                    <?php if(Auth::user()->status == 2): ?>
                                        <a class="dropdown-item" href="#"><i class="bi bi-eye"></i> <?php echo e(__('Korxona ma‘lumotlari')); ?></a>
                                    <?php elseif(Auth::user()->status == 1): ?>
                                        <a class="dropdown-item" href=""><i class="bi bi-eye"></i> <?php echo e(__('Mening ma‘lumotlarim')); ?></a>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="list-group">
                            <a href="<?php echo e(route('admin.home')); ?>" class="list-group-item list-group-item-action <?php if(request()->segment(2) == 'home'): ?> active <?php endif; ?>"><i class="lni lni-home"></i> Bosh sahifa</a>
                            <a href="<?php echo e(route('post.index')); ?>" class="list-group-item list-group-item-action <?php if(request()->segment(2) == 'post'): ?> active <?php endif; ?>"><i class="lni lni-list"></i> Yangiliklar</a>
                            <a href="<?php echo e(route('admin.messages')); ?>" class="list-group-item list-group-item-action <?php if(request()->segment(2) == 'messages'): ?> active <?php endif; ?>"><i class="lni lni-envelope"></i> Xabarlar <?php if($didnt_read_messages_count > 0): ?> <span class="badge badge-danger"><?php echo e($didnt_read_messages_count); ?></span> <?php endif; ?></a>
                            <a href="<?php echo e(route('specialist.index')); ?>" class="list-group-item list-group-item-action <?php if(request()->segment(2) == 'specialist'): ?> active <?php endif; ?>"><i class="lni lni-users"></i> Mutaxassisliklar</a>
                            <a href="<?php echo e(route('admin.users')); ?>" class="list-group-item list-group-item-action <?php if(request()->segment(2) == 'users'): ?> active <?php endif; ?>"><i class="lni lni-user"></i> Foydalanuvchilar</a>
                            <a href="<?php echo e(route('admin.acceptable_vacancies')); ?>" class="list-group-item list-group-item-action <?php if(request()->segment(2) == 'accept' && (request()->segment(3) == 'vacancies' || request()->segment(3) == 'vacancy')): ?> active <?php endif; ?>"><i class="lni lni-check-mark-circle"></i> Tasdiqlanishi kutilayotgan vakantlar</a>
                            <a href="<?php echo e(route('admin.acceptable_rezumes')); ?>" class="list-group-item list-group-item-action <?php if(request()->segment(2) == 'accept' && (request()->segment(3) == 'rezumes' || request()->segment(3) == 'rezume')): ?> active <?php endif; ?>"><i class="lni lni-check-mark-circle"></i> Tasdiqlanishi kutilayotgan rezumelar</a>
                            <a href="<?php echo e(route('resource_type.index')); ?>" class="list-group-item list-group-item-action <?php if(request()->segment(2) == 'resource_type'): ?> active <?php endif; ?>"><i class="lni lni-list"></i> Resurslar turlari</a>
                            <a href="<?php echo e(route('resource.index')); ?>" class="list-group-item list-group-item-action <?php if(request()->segment(2) == 'resource'): ?> active <?php endif; ?>"><i class="lni lni-book"></i> Resurslar</a>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>
</html>
<?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/layouts/app.blade.php ENDPATH**/ ?>