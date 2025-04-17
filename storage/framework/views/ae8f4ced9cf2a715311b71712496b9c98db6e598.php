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
                <h4>Datewise Stock Report</h4>
                <h6>Manage your Datewise Stock Report</h6>
            </div>
        </div>


        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <!-- /Filter -->
                <div class="">
                    <div class="pb-0">
                        <form class="row">
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="datetimepicker cal-icon" placeholder="Choose Date"
                                        value="<?php echo e($fromDate->format('d-m-Y')); ?>" name="from_date">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="datetimepicker cal-icon" placeholder="Choose Date"
                                        value="<?php echo e($toDate->format('d-m-Y')); ?>" name="to_date">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="form-group w-100">
                                    <button type="submit" class="btn btn-filters d-inline-block"
                                        onclick="this.form.target='';"
                                    >
                                        <img
                                            src="<?php echo e(asset('backend')); ?>/img/icons/search-whites.svg" alt="img">
                                    </button>
                                    <button type="submit" class="btn btn-info" onclick="this.form.target='_blank';" name="print" value="1">
                                        <i class="fa fa-print" aria-hidden="true"></i>
                                        Print
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Code</th>
                                <th>Product Name</th>
                                <th>Qty</th>
                                <th>Sale Qty</th>
                                <th>Add Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $products ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($product->code); ?></td>
                                <td style="text-align: left;"><?php echo e($product->name); ?></td>
                                <td><?php echo e($product->current_stock); ?></td>
                                
                                <td><?php echo e($product->sales_count); ?></td>
                                <td><?php echo e($product->add_count); ?></td>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ariful/Developer/Personal_Projects/Inventory/inventory/resources/views/admin/reports/datewise-stock-report.blade.php ENDPATH**/ ?>