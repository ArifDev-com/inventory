<?php $__env->startSection('name', 'Due paid'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .c_info td {color: #383838; font-size: 14px;}
</style>
    <table class="c_info">
        <tr>
            <td>
                <div>
                    <table>
                        <tr>
                            <td style="width: 26%;">
                                Cell No.
                            </td>
                            <td>
                                :
                                <?php echo e($payment->customer?->phone); ?>

                            </td>
                        </tr>
                        <tr>
                            <td style="width: 26%;">
                                Customer name
                            </td>
                            <td>
                                : <?php echo e($payment->customer?->name); ?>

                            </td>
                        </tr>
                        <tr>
                            <td style="width: 26%;">
                                Company name
                            </td>
                            <td>
                                : <?php echo e($payment->customer?->company_name); ?>

                            </td>
                        </tr>
                        <tr>
                            <td style="width: 26%;">
                                Address
                            </td>
                            <td>
                                : <?php echo e($payment->customer?->address); ?>

                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <td style="text-align: right">
                <div style="
                    display: inline-block;
                    text-align: left;
                ">
                    <table>
                        <tr>
                            <td>
                                Date
                            </td>
                            <td>
                                : <?php echo e(\Carbon\Carbon::parse($payment->date)->format('d-m-Y')); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Time
                            </td>
                            <td>
                                : <?php echo e($payment->created_at->format('H:i')); ?>

                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
    <table style="border-collapse: collapse; margin: auto; width: 100%; margin-top: 10px" cellspacing="0" class="border">
        <tbody>
            <tr style="height: 17pt;">
                <td bgcolor="#EFEFEF" style="width: 50%; padding: 5px">

                        Previous Due

                </td>
                <td>
                    <?php echo e($payment->customer?->sales()->sum('due_amount') + $payment->paying_amount); ?>

                </td>
            </tr>
            <tr style="height: 17pt;">
                <td bgcolor="#EFEFEF" style="width: 50%; padding: 5px">

                        Paid Amount

                </td>
                <td>
                    <?php echo e($payment->paying_amount); ?>

                </td>
            </tr>
            <tr style="height: 17pt;">
                <td bgcolor="#EFEFEF" style="width: 50%; padding: 5px">

                        Discount

                </td>
                <td>
                    <?php echo e($payment->discount); ?>

                </td>
            </tr>
            <tr style="height: 17pt;">
                <td bgcolor="#EFEFEF" style="width: 50%; padding: 5px">

                        Current Due

                </td>
                <td>
                    <?php echo e($payment->customer?->sales()->sum('due_amount')); ?>

                </td>
            </tr>
        </tbody>
    </table>
    <?php if($payment->note): ?>
        <h1 style="padding-top: 4px; text-indent: 0pt; text-align: left;">
            Note: <br><?php echo e($payment->note); ?>

        </h1>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <td style="text-align: center;">
        _______________
        <br>
        Received by
    </td>
    <td style="text-align: center;">
        SOLD GOODS ARE NOT TAKEN BACK
    </td>
    <td style="text-align: center;">
        <?php echo e($payment->user?->name); ?>

        <br>
        _______________
        <br>
        for CAPITAL LIFT
    </td>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ariful/Developer/Personal_Projects/Inventory/inventory/resources/views/admin/customer/duePaymentPrint.blade.php ENDPATH**/ ?>