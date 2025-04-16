<ul class="list-group" style="margin-top: -20px; margin-bottom: 20px;">
    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <a href="javascript::void(0)" onclick="testClick(<?php echo e(json_encode($product)); ?>)">
        <li class="list-group-item" style="padding: 8px; ">
            <?php if($product->image): ?>
            <img src="<?php echo e(asset($product->image)); ?>" alt="img" height="40px;" width="40px;">
            <?php else: ?>
            <img src="<?php echo e(asset('backend/img/img-01.jpg')); ?>" alt="img" height="40px;" width="40px;">
            <?php endif; ?>
            <p style="margin-top: -36px; margin-left: 46px; padding-bottom: 8px; padding-top: 8px;"><strong><?php echo e($product->name); ?> | <?php echo e($product->code); ?> </strong></p>
        </li>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <li style="color:red; padding: 0 20px; font-size: 18px;">Stock Out</li>
    <?php endif; ?>
</ul><?php /**PATH /Users/ariful/Developer/Personal_Projects/Inventory/inventory/resources/views/admin/search-product.blade.php ENDPATH**/ ?>