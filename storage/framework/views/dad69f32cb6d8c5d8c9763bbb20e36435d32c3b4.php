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
                <h4><?php echo e(trans('sidebar.sale.body.sales list')); ?></h4>
                <h6><?php echo e(trans('sidebar.sale.body.manage your sales')); ?></h6>
            </div>
            <div class="page-btn">
                <a href="<?php echo e(route('sale.create')); ?>" class="btn btn-added"><img
                        src="<?php echo e(asset('backend')); ?>/img/icons/plus.svg" alt="img" class="me-1"><?php echo e(trans('sidebar.sale.body.add sale')); ?></a>
            </div>
        </div>

        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Inv. No.</th>
                                <th><?php echo e(trans('table.sale.date')); ?></th>
                                <th><?php echo e(trans('table.sale.customer')); ?></th>
                                <th  style="width: 40px !important;">P. Type</th>
                                <th><?php echo e(trans('table.sale.total')); ?></th>
                                
                                <th><?php echo e(trans('table.sale.paid')); ?></th>
                                <th><?php echo e(trans('table.sale.due')); ?></th>
                                <th>Due Date</th>
                                <th><?php echo e(trans('table.sale.biller')); ?></th>
                                <th class="text-center"><?php echo e(trans('table.sale.action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($key + 1); ?></td>
                                <td ><?php echo e($sale->ref_code); ?></td>
                                <td><?php echo e($sale->date); ?></td>
                                <td style="text-align: left;">
                                    <a href="<?php echo e(route('customer.show', ['customer' => $sale->customer->id])); ?>">
                                        <?php echo e($sale->customer?->name); ?>

                                    </a>
                                </td>
                                <td>
                                    <div style="width: 100px; word-wrap: break-word; overflow: hidden;">
                                        <?php echo e(join(', ', $sale->payments->pluck('payment_method')->toArray())); ?>

                                    </div>
                                </td>
                                <td><?php echo e($sale->grandtotal); ?></td>
                                
                                <td><?php echo e($sale->paid_amount); ?></td>
                                <td class="text-red"><?php echo e($sale->due_amount); ?></td>
                                <td><?php echo e($sale->due_date); ?></td>
                                <td style="text-align: left;">
                                    <?php echo e($sale->user?->first_name . ' ' . $sale->user?->last_name); ?>

                                    
                                    <?php if($sale->cancel_requested): ?>
                                    <br>
                                    <span class="badge bg-danger">Cancel Pending</span>
                                    <?php endif; ?>
                                    
                                    <?php if($sale->returns->count()): ?>
                                    <br>
                                        <?php if($sale->returns()->orderBy('id', 'desc')->first()->status == 'received'): ?>
                                        <span class="badge bg-info">Return Approved</span>
                                        <?php else: ?>
                                        <span class="badge bg-warning">Return Pending</span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a
                                        class="btn btn-primary btn-sm text-white" target="_blank"
                                        href="<?php echo e(route('sale.pdf', [$sale->id])); ?>"
                                        onclick="window.open('<?php echo e(route('sale.challan.pdf', [$sale->id])); ?>', '_blank')"
                                        >
                                        <i class="fa fa-print"></i> Print 
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#example').DataTable({
        pageLength: 100,
    });

    <?php if(session()->has('return_id')): ?>
        window.open("<?php echo e(route('sale.return.pdf', [session()->get('return_id')])); ?>", '_blank');
    <?php elseif(session()->has('sale_id')): ?>
        window.open("<?php echo e(route('sale.pdf', [session()->get('sale_id')])); ?>", '_blank');
        window.open("<?php echo e(route('sale.challan.pdf', [session()->get('sale_id')])); ?>", '_blank');
    <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ariful/Developer/Personal_Projects/Inventory/inventory/resources/views/admin/sales/index.blade.php ENDPATH**/ ?>