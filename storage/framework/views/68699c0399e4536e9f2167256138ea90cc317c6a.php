<?php $__env->startSection('content'); ?>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Low Stock Products</h4>
                <h6><?php echo e(trans('sidebar.product.body.manage your products')); ?></h6>
            </div>
            <div class="page-btn">
                <?php if(auth()->user()->user_role == 'superadmin'): ?>
                <a href="<?php echo e(route('product.create')); ?>" class="btn btn-added"><img
                        src="<?php echo e(asset('backend')); ?>/img/icons/plus.svg" alt="img" class="me-1"><?php echo e(trans('sidebar.product.body.add new product')); ?></a>
                <?php endif; ?>
            </div>
        </div>

        <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
        <?php endif; ?>

        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                
                <!-- /Filter -->
                
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table " id="example">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>
                                    Code
                                </th>
                                <th><?php echo e(trans('table.thead.product_name')); ?></th>
                                <th>Current Stock</th>
                                <?php if(auth()->user()->user_role == 'admin' || auth()->user()->user_role == 'superadmin'): ?>
                                <th><?php echo e(trans('table.thead.purchaseprice')); ?></th>
                                <?php endif; ?>
                                <th>Wholesale Price</th>
                                <th>Retail Price</th>
                                <th><?php echo e(trans('table.thead.price')); ?></th>
                                <th><?php echo e(trans('table.thead.action')); ?></th>
                                <th><?php echo e(trans('table.thead.created by')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($key + 1); ?></td>
                                <td>
                                    <?php echo e($product->code); ?>

                                </td>

                                <td class="productimgname">
                                    <a href="javascript:void(0);" class="product-img">
                                        <?php if($product->image): ?>
                                        <img src="<?php echo e(asset($product->image)); ?>" alt="product">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset('backend\img\img-01.jpg')); ?>" alt="product">
                                        <?php endif; ?>
                                    </a>
                                    <a href="javascript:void(0);"><?php echo e($product->name); ?></a>
                                </td>
                                <td>
                                    <span <?php if($product->current_stock <= $product->alert_quantity): ?>
                                            class="badge bg-danger text-white"
                                            <?php else: ?>
                                            class="text-primary"
                                            <?php endif; ?>
                                            style="font-size: 15px;"><?php echo e($product->current_stock); ?></span>
                                </td>
                                <?php if(auth()->user()->user_role == 'admin' || auth()->user()->user_role == 'superadmin'): ?>
                                    <td><?php echo e($product->purchase_price); ?></td>
                                <?php endif; ?>
                                <td><?php echo e($product->wholesale_price); ?></td>
                                <td><?php echo e($product->retail_price); ?></td>
                                <td><?php echo e($product->price); ?></td>

                                <td>
                                    <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown"
                                        aria-expanded="true">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="<?php echo e(route('product.details', $product->id)); ?>"
                                                class="dropdown-item"><img
                                                    src="<?php echo e(asset('backend')); ?>/img/icons/eye.svg" class="me-2"
                                                    alt="img">
                                                View
                                            </a>
                                        </li>

                                        <?php if(auth()->user()->user_role == 'superadmin'): ?>
                                        <li>
                                            <a href="<?php echo e(route('product.edit', $product->id)); ?>"
                                                class="dropdown-item"><img
                                                    src="<?php echo e(asset('backend')); ?>/img/icons/edit.svg" class="me-2"
                                                    alt="img">
                                                Edit
                                            </a>
                                        </li>
                                        <li>
                                            <form method="POST" action="<?php echo e(route('product.delete', $product->id)); ?>"
                                                class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <span class="show_confirm text-danger dropdown-item"
                                                    style="cursor: pointer;" data-toggle="tooltip" title='Delete'>
                                                    <img src="<?php echo e(asset('backend')); ?>/img/icons/delete.svg" alt="img">
                                                    Delete
                                                </span>
                                            </form>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </td>
                                <td><?php echo e($product->user?->name); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>


                    

                    

                    
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>

<script>
    $('#example').DataTable({ pageLength: 100,
            
        });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ariful/Developer/Personal_Projects/Inventory/inventory/resources/views/admin/products/low-stock.blade.php ENDPATH**/ ?>