<?php $__env->startSection('content'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Make Due Payment</h4>
                <h6>Add/Update Due Payment</h6>
            </div>
            
        </div>
        <?php if(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger">
                <?php echo e($error); ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(route('due.payment')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <?php echo $__env->make('common.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="number" class="form-control" name="paying_amount" required min="0"
                                    onchange="calculateNextDue()" onkeyup="calculateNextDue()"
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Discount</label>
                                <input type="number" class="form-control" name="discount" min="0"
                                    onchange="calculateNextDue()" onkeyup="calculateNextDue()"
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Next Due</label>
                                <input type="number" class="form-control" name="next_due" readonly required min="0">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Payment Method</label>
                                <select class="form-control select2" name="payment_method" required onchange="paymentMethodChange(this)">
                                    <option value="">Select</option>
                                    <option value="cash">Cash</option>
                                    <option value="bank">Bank</option>
                                    <option value="bkash">Bkash</option>
                                    <option value="rocket">Rocket</option>
                                    <option value="nagad">Nagad</option>
                                    <option value="advance">Advance</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Payment Date</label>
                                <input type="date" class="form-control" name="payment_date" required value="<?php echo e(date('Y-m-d')); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Next Due Date: (If applicable)</label>
                                <input type="date" class="form-control" name="next_due_date">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Note</label>
                                <textarea class="form-control" name="note"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php
        $sales = \App\Models\Sale::all(['id', 'customer_id', 'due_amount', 'ref_code']);
    ?>
<script>
    let allSales = <?php echo json_encode($sales, 15, 512) ?>;
    function calculateNextDue() {
        let payingAmount = $('[name="paying_amount"]').val();
        let discount = $('[name="discount"]').val();
        let nextDue = $('[name="paying_amount"]').attr('max') - (
            Number(payingAmount || 0) + Number(discount || 0)
        );
        $('input[name="next_due"]').val(nextDue);
    }
    $(document).ready(function () {
        $('select[name="customer_id"]').on('change', function () {
            var customer_id = $(this).val();
            let sales = allSales.filter(sale => sale.customer_id == customer_id && sale.due_amount > 0);
            let totalDue = sales.reduce((acc, sale) => acc + sale.due_amount, 0);
            $('[name="paying_amount"]').val(0);
            $('[name="paying_amount"]').attr('max', totalDue);
            $('[name="next_due"]').val(totalDue);
            $('[name="discount"]').attr('max', totalDue);
        });
        <?php if(request()->customer): ?>
        setTimeout(() => {
            // check url param customer
            let customer = new URLSearchParams(window.location.search).get('customer');
            if (customer) {
                $('select[name="customer_id"]').html('');
                $('select[name="customer_id"]').append('<option value="' + customer + '"><?php echo e(App\Models\Customer::find(request()->customer)?->name); ?></option>');
                $('select[name="customer_id"]').val(customer).trigger('change');
            }
        }, 500);
        <?php endif; ?>
    });
    <?php if(session('payments')): ?>
        let payments = <?php echo json_encode(json_decode(session('payments'), true), 512) ?>;
        payments.forEach(payment => {
            window.open("<?php echo e(route('due.payment.print', ':id')); ?>".replace(':id', payment.id), '_blank');
        });
    <?php endif; ?>


    function paymentMethodChange(element) {
        let parent = $(element).parent();
        if($(element).val() == 'bank') {
            parent.append(`
                <div class="form-group bank_info">
                    <label>Bank Note:</label>
                    <input type="text" class="form-control" name="bank_note">
                </div>
            `);
        } else {
            parent.find('.bank_info').remove();
        }
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ariful/Developer/Personal_Projects/Inventory/inventory/resources/views/admin/customer/duePayment.blade.php ENDPATH**/ ?>