<?php $__env->startSection('content'); ?>

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Customer List</h4>
                <h6>Manage your Customers</h6>
            </div>
            <div class="page-btn">
                <a href="<?php echo e(route('customer.create')); ?>" class="btn btn-added">
                    <img src="<?php echo e(asset('backend')); ?>/img/icons/plus.svg" alt="img">
                    Add Customer
                </a>
            </div>
        </div>
        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <a href="<?php echo e(route('customer.print')); ?>" class="btn btn-info" target="_blank">
                    <i class="fa fa-print"></i>
                    <span>Print</span>
                </a>
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Phone</th>
                                
                                <th>Address</th>
                                <th>Company Name</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th>Dealer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($loop->iteration); ?>

                                </td>
                                <td><?php echo e($customer->id); ?></td>
                                <td class="productimgname">
                                    <a href="<?php echo e(route('customer.show', $customer->id)); ?>" id="cus_name"><?php echo e($customer->name); ?></a>
                                </td>
                                <?php if($customer->phone): ?>
                                    <td><?php echo e($customer->phone); ?></td>
                                <?php else: ?>
                                    <td>Null</td>
                                <?php endif; ?>

                                

                                <?php if($customer->address): ?>
                                    <td style="text-align: left;"><?php echo e($customer->address); ?></td>
                                <?php else: ?>
                                    <td></td>
                                <?php endif; ?>
                                <?php if($customer->company_name): ?>
                                    <td style="text-align: left;"><?php echo e($customer->company_name); ?></td>
                                <?php else: ?>
                                    <td></td>
                                <?php endif; ?>
                                <td id="grand_total"><?php echo e($customer->sales->sum('grandtotal') ?? 'N/A'); ?></td>
                                <td id="paid_amount"><?php echo e($customer->sales->sum('paid_amount') ?? 'N/A'); ?></td>
                                <td id="due_amount"><?php echo e($customer->sales->sum('due_amount') ?? 'N/A'); ?></td>
                                <td>
                                    <?php echo e($customer->creator?->first_name); ?>

                                </td>
                                <td class="text-center">
                                    
                                    <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu"  >

                                        <li>
                                            <a href="<?php echo e(route('customer.show', $customer->id)); ?>" class="dropdown-item"><img src="<?php echo e(asset('backend')); ?>/img/icons/eye1.svg" class="me-2" alt="img">Customer Details</a>
                                        </li>

                                        <li>
                                            <a href="<?php echo e(route('customer.edit',$customer->id)); ?>" class="dropdown-item"><img src="<?php echo e(asset('backend')); ?>/img/icons/edit.svg" class="me-2" alt="img">Customer Edit</a>
                                        </li>


                                        


                                        


                                        <li>
                                            <a href="<?php echo e(route('customer.delete',$customer->id)); ?>" class="dropdown-item confirm-text"><img src="<?php echo e(asset('backend')); ?>/img/icons/delete1.svg" class="me-2" alt="img">Customer Delete</a>
                                        </li>
                                    </ul>
                                </td>
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

	<!-- show payment Modal -->
    <div class="modal fade" id="showpayment" tabindex="-1" aria-labelledby="showpayment" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Show Payments</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Reference</th>
                                    <th>Amount	</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                

                            

                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- show payment Modal -->

    <!-- show payment Modal -->
    <div class="modal fade" id="createpayment" tabindex="-1" aria-labelledby="createpayment" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Payment</h5>
                    <button type="button" class="btn-close createpaymentclose" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>

                <form action="<?php echo e(route('due.payment')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Date</label>
                                <div class="input-groupicon">
                                    

                                    <input type="date" class="form-control" name="date" value="<?php echo date("Y-m-d");?>">
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Invoice No</label>
                                <input type="text" name="reference" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Paying Amount</label>
                                <input type="text" name="paying_amount" placeholder="Enter Pay Amount" required>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-submit">Submit</button>
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- show payment Modal -->

    <!-- edit payment Modal -->
    <div class="modal fade" id="editpayment" tabindex="-1" aria-labelledby="editpayment" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Payment</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Customer</label>
                                <div class="input-groupicon">
                                    <input type="text" value="2022-03-07" class="datetimepicker">
                                    <div class="addonset">
                                        <img src="<?php echo e(asset('backend')); ?>/img/icons/datepicker.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Reference</label>
                                <input type="text" value="INV/SL0101">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Received Amount</label>
                                <input type="text" value="0.00">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Paying Amount</label>
                                <input type="text" value="0.00">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Payment type</label>
                                <select class="select">
                                    <option>Cash</option>
                                    <option>Online</option>
                                    <option>Inprogress</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-0">
                                <label>Note</label>
                                <textarea class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-submit">Submit</button>
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- edit payment Modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    let table = new DataTable('#myTable', {
        pageLength: 50,
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ariful/Developer/Personal_Projects/Inventory/inventory/resources/views/admin/customer/index.blade.php ENDPATH**/ ?>