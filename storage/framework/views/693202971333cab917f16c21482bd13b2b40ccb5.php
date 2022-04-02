<div class="widget">
    <h5 class="widget-title bg-gray"><i class="lni lni-home"></i> Mening profilim</h5>
    <div class="right-sideabr">
        <ul class="list-group">
            <a href="<?php echo e(route('vacancy.index')); ?>" class="list-group-item <?php if(request()->segment(1) == 'vacancy' && request()->segment(2) == null): ?> active <?php endif; ?>"><i class="lni lni-list"></i> Vakantlar</a>
            <?php if(auth()->user()->can_login == 1): ?>
                <a href="<?php echo e(route('vacancy.create')); ?>" class="list-group-item <?php if(request()->segment(1) == 'vacancy' && request()->segment(2) == 'create'): ?> active <?php endif; ?>"><i class="lni lni-plus"></i> Vakant qo'shish</a>
            <?php endif; ?>
            <a class="list-group-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="lni lni-exit"></i> <?php echo e(__('Tizimdan chiqish')); ?></a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                <?php echo csrf_field(); ?>
            </form>
        </ul>
    </div>
</div>
<?php /**PATH /Users/abrorkhan/Projects/Personal/geodezistuz/resources/views/includes/company_profile_leftside.blade.php ENDPATH**/ ?>