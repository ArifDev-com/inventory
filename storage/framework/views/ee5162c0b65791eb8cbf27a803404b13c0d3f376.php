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
                <h4>Specific Product Report</h4>
                <h6>Manage your Specific Product Report</h6>
            </div>
        </div>


        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <!-- /Filter -->
                <form action="<?php echo e(route('reports.product-wise')); ?>" method="get">
                    <div class="pb-0">
                        <div class="row">
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="datetimepicker cal-icon" placeholder="Choose Start Date" required
                                        name="from_date" value="<?php echo e(request()->from_date); ?>">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="datetimepicker cal-icon" placeholder="Choose End Date" required
                                        name="to_date" value="<?php echo e(request()->to_date); ?>">
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select3" name="product_id" required>
                                        <option value="">Choose Product</option>
                                        <?php $__currentLoopData = $products ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($product->id); ?>"
                                                <?php echo e(request()->product_id == $product->id ? 'selected' : ''); ?>>
                                                <?php echo e($product->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                                <script>
                                    $(document).ready(function() {
                                        $('.select3').select2({
                                            placeholder: 'Choose Product',
                                            allowClear: true
                                        });
                                    });
                                </script>
                            <div class="col-lg-2 ">
                                <div class="form-group w-150">
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
                        </div>
                    </div>
                </form>
                <!-- /Filter -->
                <?php if(request()->product_id): ?>
                    <?php
                        $product = \App\Models\Product::findOrFail(request()->product_id);
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <b>Date : <?php echo e(request()->from_date); ?> to <?php echo e(request()->to_date); ?></b> <br>
                            <b>Product Name : <?php echo e($product->name); ?></b> <br>
                            <b>Item Code : <?php echo e($product->code); ?></b> <br>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($data): ?>
                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Date</th>
                                <th>Quantity</th>
                                <th>Added Quantity</th>
                                <th>Sale Quantity</th>
                                <th>Purchase Quantity</th>
                                <th>Current Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($key); ?></td>
                                <td><?php echo e($sale['start_quantity']); ?></td>
                                <td><?php echo e($sale['add_quantity']); ?></td>
                                <td><?php echo e($sale['sales']); ?></td>
                                <td><?php echo e($sale['purchase_quantity']); ?></td>
                                <td><?php echo e($sale['end_quantity']); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    
                </div>
                <?php endif; ?>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ariful/Developer/Personal_Projects/Inventory/inventory/resources/views/admin/reports/product-wise-report.blade.php ENDPATH**/ ?>