<!-- Header Section Start -->
<header id="home" class="hero-area">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
        <div class="container">
            <div class="theme-header clearfix">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="lni-menu"></span>
                        <span class="lni-menu"></span>
                        <span class="lni-menu"></span>
                    </button>
                    <a href="<?php echo e(route('home')); ?>" class="navbar-brand"><img src="/assets/img/logo3.png" alt=""></a>
                </div>
                <div class="collapse navbar-collapse" id="main-navbar">
                    <ul class="navbar-nav mr-auto w-100 justify-content-end">
                        <li class="nav-item dropdown <?php if(request()->segment(1) == null): ?> active <?php endif; ?>">
                            <a class="nav-link dropdown-toggle" href="<?php echo e(route('home')); ?>" aria-haspopup="true" aria-expanded="false">
                                Bosh sahifa
                            </a>
                        </li>
                        <?php if(sizeof($resource_types) > 0): ?>
                            <li class="nav-item dropdown <?php if(in_array(request()->segment(1), ['books', 'programs', 'videos'])): ?> active <?php endif; ?>">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Resurslar
                                </a>
                                <ul class="dropdown-menu">
                                    <?php $__currentLoopData = $resource_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a class="dropdown-item" href="<?php echo e(route('resources', ['slug' => $type->slug])); ?>"><?php echo e($type->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item <?php if(request()->segment(1) == 'rezumes'): ?> active <?php endif; ?>">
                            <a class="nav-link dropdown-toggle" href="<?php echo e(route('rezumes')); ?>" aria-haspopup="true" aria-expanded="false">Rezumelar</a>
                        </li>
                        <li class="nav-item <?php if(request()->segment(1) == 'vacancies'): ?> active <?php endif; ?>">
                            <a class="nav-link dropdown-toggle" href="<?php echo e(route('vacancies')); ?>" aria-haspopup="true" aria-expanded="false">Vakantlar</a>
                        </li>
                        <li class="nav-item dropdown <?php if(request()->segment(1) == 'news'): ?> active <?php endif; ?>">
                            <a class="nav-link dropdown-toggle" href="<?php echo e(route('news')); ?>" aria-haspopup="true" aria-expanded="false">
                                Yangiliklar
                            </a>
                        </li>
                        <li class="nav-item <?php if(request()->segment(1) == 'contact'): ?> active <?php endif; ?>">
                            <a class="nav-link" href="<?php echo e(route('contact')); ?>">
                                Biz bilan bog'lanish
                            </a>
                        </li>
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item <?php if(request()->segment(1) == 'login'): ?> active <?php endif; ?>">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item <?php if(request()->segment(1) == 'register'): ?> active <?php endif; ?>">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" data-toggle="dropdown">
                                    <i class="lni lni-user"></i> <?php echo e(Auth::user()->name); ?>

                                </a>


                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php if(in_array(auth()->user()->status, [1, 3])): ?>
                                        <a class="dropdown-item" href="<?php echo e(route('user_profile')); ?>"><i class="lni lni-user"></i> <?php echo e(__('Mening profilim')); ?></a>
                                    <?php else: ?>
                                        <a class="dropdown-item" href="<?php echo e(route('vacancy.index')); ?>"><i class="lni lni-home"></i> <?php echo e(__('Mening profilim')); ?></a>
                                    <?php endif; ?>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="lni lni-exit"></i> <?php echo e(__('Tizimdan chiqish')); ?></a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mobile-menu" data-logo="/assets/img/logo3.png"></div>
    </nav>
    <!-- Navbar End -->
</header>
<!-- Header Section End -->
<?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/layouts/header.blade.php ENDPATH**/ ?>