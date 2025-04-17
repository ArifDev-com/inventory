<?php $__env->startSection('content'); ?>

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Customer Details</h4>
                <h6>Customer Details</h6>
            </div>
        </div>
        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div>
                    <h2>Name: <?php echo e($customer->name); ?></h2>
                </div>
                <div>
                    <b>ID:</b>
                    <span><?php echo e($customer->id); ?></span>
                </div>
                <div>
                    <b>Phone:</b>
                    <span><?php echo e($customer->phone); ?></span>
                </div>
                <div>
                    <b>Email:</b>
                    <span><?php echo e($customer->email); ?></span>
                </div>
                <div>
                    <b>Address:</b>
                    <span><?php echo e($customer->address); ?></span>
                </div>
                <div>
                    <b>Company:</b>
                    <span><?php echo e($customer->company_name); ?></span>
                </div>
                <div class="mt-5">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Total Orders</h5>
                                    <span><?php echo e($customer->sales->count()); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Total Purchased</h5>
                                    <span><?php echo e($customer->sales->sum('grandtotal')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Total Paid</h5>
                                    <span><?php echo e($customer->sales->sum('paid_amount')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Total Due</h5>
                                    <span><?php echo e($customer->sales->sum('due_amount')); ?></span>
                                </div>
                            </div>
                        </div>

                         <div class="col-md-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Total Advance</h5>
                                    <span><?php echo e($customer->advance); ?></span>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <hr>
                <div class="mt-3">
                    <h5>Orders: </h5>
                    <div class="mt-2 table-responsive">
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Inv. No.</th>
                                    <th>Date</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Discount</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Payment Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $customer->sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($sale->id); ?></td>
                                    <td><?php echo e($sale->date); ?></td>
                                    <td style="width: 400px;">
                                        <table class="" style="width: 100%;">
                                            <thead style="background: none; border: none;">
                                                <tr style="background-color: none;">
                                                    <th style="border: 1px solid gray;">Product</th>
                                                    <th style="border: 1px solid gray;">Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $sale->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td style="border: 1px solid gray; text-align: left;"><?php echo e($item->product?->name); ?></td>
                                                    <td style="border: 1px solid gray; width: 70px"><?php echo e($item->quantity); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td><?php echo e($sale->grandtotal); ?></td>
                                    <td><?php echo e($sale->discount); ?></td>
                                    <td><?php echo e($sale->paid_amount); ?></td>
                                    <td><?php echo e($sale->due_amount); ?></td>
                                    <td>
                                        <div style="width: 100px;">
                                            <?php echo e(join(', ', $sale->payments->pluck('payment_method')->toArray())); ?>

                                            
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
                                        </div>
                                    </td>
                                    <td>
                                        <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown"
                                            aria-expanded="true">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="<?php echo e(route('sale.pdf', [$sale->id])); ?>" class="dropdown-item"><img
                                                        src="<?php echo e(asset('backend')); ?>/img/icons/download.svg" class="me-2"
                                                        alt="img">Print Invoice</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(route('sale.challan.pdf', [$sale->id])); ?>"
                                                    class="dropdown-item">
                                                    <img
                                                        src="<?php echo e(asset('backend')); ?>/img/icons/download.svg" class="me-2"
                                                        alt="img">
                                                    Print Challan
                                                </a>
                                            </li>

                                            
                                            <li>
                                                <a href="<?php echo e(route('sale.return', [$sale->id])); ?>"
                                                    class="dropdown-item">
                                                    Sale Return
                                                </a>
                                            </li>
                                            
                                            
                                            <?php if(!$sale->cancel_requested && auth()->user()->id == $sale->user_id): ?>
                                            <li>
                                                <a href="<?php echo e(route('sale.cancel', [$sale->id])); ?>"
                                                    onclick="return confirm('Are you sure you want to request cancellation?')"
                                                    class="dropdown-item confirm-text">
                                                    Request Cancellation</a>
                                            </li>
                                            <?php endif; ?>
                                            <?php if(auth()->user()->user_role == 'admin'): ?>
                                            <li>
                                                <a href="<?php echo e(route('sale.delete', $sale->id)); ?>"
                                                    onclick="return confirm('Are you sure you want to delete this sale?')"
                                                    class="dropdown-item confirm-text"><img
                                                        src="<?php echo e(asset('backend')); ?>/img/icons/delete1.svg" class="me-2"
                                                        alt="img"><?php echo e(trans('table.sale.delete sale')); ?></a>
                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="mt-3">
                    <h5>Due Pay History: </h5>
                    <div class="mt-2 table-responsive">
                        <table class="table" id="example2">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Payment Date</th>
                                    <th>Inv. No.</th>
                                    <th>Paid Amount</th>
                                    <th>Discount</th>
                                    <th>Payment Method</th>
                                    <th>Due Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $customer->payments()->where('is_due_pay', true)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($payment->date); ?></td>
                                    <td><?php echo e($payment->sale?->ref_code); ?></td>
                                    <td><?php echo e($payment->paying_amount); ?></td>
                                    <td><?php echo e($payment->discount); ?></td>
                                    <td><?php echo e($payment->payment_method); ?></td>
                                    <td><?php echo e($payment->due_date); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            pageLength: 10,
            language: {
                'paginate': {
                    'previous': '<i class="fa fa-arrow-left"></i>',
                    'next': '<i class="fa fa-arrow-right"></i>'
                }
            }
        });
        $('#example2').DataTable({
            pageLength: 10,
            language: {
                'paginate': {
                    'previous': '<i class="fa fa-arrow-left"></i>',
                    'next': '<i class="fa fa-arrow-right"></i>'
                }
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ariful/Developer/Personal_Projects/Inventory/inventory/resources/views/admin/customer/show.blade.php ENDPATH**/ ?>