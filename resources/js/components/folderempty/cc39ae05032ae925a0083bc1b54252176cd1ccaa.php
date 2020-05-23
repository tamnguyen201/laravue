<?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(trans_url($menu->url)); ?>" ><?php echo e($menu->name); ?></a>
    <?php if($menu->hasChildren()): ?>
        <?php echo $__env->make('menu::menu.sub.footer', array('menus' => $menu->getChildren()), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\xampp\htdocs\website\website\resources\views/vendor/menu/menu/footer.blade.php ENDPATH**/ ?>