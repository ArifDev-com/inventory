<?php $__env->startSection('name', 'Dues Report'); ?>

<?php $__env->startSection('content'); ?>
<style>
    table * {
        font-size: 9px !important;
    }

.c_list_c{
  		padding-left: 290px !important;
  }
</style>

<div style=" margin-top: 20px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">
    <table>
        <tbody>
            <tr>
                <td>
                    Date: <?php echo e($toDate->format('d-m-Y')); ?>

                </td>
                <td style="text-align: right;">
                    Time: <?php echo e(now()->format('h:i a')); ?>

                </td>
            </tr>
        </tbody>
    </table>
</div>
<table style="padding-top: 5px; border-collapse: collapse; margin: auto; width: 100%; border: 1px solid #969696; " cellspacing="0" class="border">
    <thead>
        <tr style="height: 15pt;">
            <td style="
                        width: 20px;
                        border-top-style: solid;
                        border-top-width: 1pt;
                        border-top-color: #959595;
                        border-left-style: solid;
                        border-left-width: 1pt;
                        border-left-color: #959595;
                        border-bottom-style: solid;
                        border-bottom-width: 1pt;
                        border-bottom-color: #959595;
                        border-right-style: solid;
                        border-right-width: 1pt;
                        border-right-color: #959595;
                    " bgcolor="#EFEFEF">
                <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">S.L</p>
            </td>
            <td style="
                        width: 55px;
                        border-top-style: solid;
                        border-top-width: 1pt;
                        border-top-color: #959595;
                        border-left-style: solid;
                        border-left-width: 1pt;
                        border-left-color: #959595;
                        border-bottom-style: solid;
                        border-bottom-width: 1pt;
                        border-bottom-color: #959595;
                        border-right-style: solid;
                        border-right-width: 1pt;
                        border-right-color: #959595;
                    " bgcolor="#EFEFEF">
                <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">Date</p>
            </td>
            <td style="
                        width: 120px;
                        border-top-style: solid;
                        border-top-width: 1pt;
                        border-top-color: #959595;
                        border-left-style: solid;
                        border-left-width: 1pt;
                        border-left-color: #959595;
                        border-bottom-style: solid;
                        border-bottom-width: 1pt;
                        border-bottom-color: #959595;
                        border-right-style: solid;
                        border-right-width: 1pt;
                        border-right-color: #959595;
                    " bgcolor="#EFEFEF">
                <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">Client Name</p>
            </td>
            <td style="
                        width: 100px;
                        border-top-style: solid;
                        border-top-width: 1pt;
                        border-top-color: #959595;
                        border-left-style: solid;
                        border-left-width: 1pt;
                        border-left-color: #959595;
                        border-bottom-style: solid;
                        border-bottom-width: 1pt;
                        border-bottom-color: #959595;
                        border-right-style: solid;
                        border-right-width: 1pt;
                        border-right-color: #959595;
                    " bgcolor="#EFEFEF">
                <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">Company Name</p>
            </td>
            <td style="
                        width: 70px;
                        border-top-style: solid;
                        border-top-width: 1pt;
                        border-top-color: #959595;
                        border-left-style: solid;
                        border-left-width: 1pt;
                        border-left-color: #959595;
                        border-bottom-style: solid;
                        border-bottom-width: 1pt;
                        border-bottom-color: #959595;
                        border-right-style: solid;
                        border-right-width: 1pt;
                        border-right-color: #959595;
                    " bgcolor="#EFEFEF">
                <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">Contact</p>
            </td>
            <td style="
                        width: 60px;
                        border-top-style: solid;
                        border-top-width: 1pt;
                        border-top-color: #959595;
                        border-left-style: solid;
                        border-left-width: 1pt;
                        border-left-color: #959595;
                        border-bottom-style: solid;
                        border-bottom-width: 1pt;
                        border-bottom-color: #959595;
                        border-right-style: solid;
                        border-right-width: 1pt;
                        border-right-color: #959595;
                    " bgcolor="#EFEFEF">
                <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Previous
                </p>
            </td>
            <td style="
                        width: 60px;
                        border-top-style: solid;
                        border-top-width: 1pt;
                        border-top-color: #959595;
                        border-left-style: solid;
                        border-left-width: 1pt;
                        border-left-color: #959595;
                        border-bottom-style: solid;
                        border-bottom-width: 1pt;
                        border-bottom-color: #959595;
                        border-right-style: solid;
                        border-right-width: 1pt;
                        border-right-color: #959595;
                    " bgcolor="#EFEFEF">
                <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Add Due
                </p>
            </td>
            <td style="
                        width: 70px;
                        border-top-style: solid;
                        border-top-width: 1pt;
                        border-top-color: #959595;
                        border-left-style: solid;
                        border-left-width: 1pt;
                        border-left-color: #959595;
                        border-bottom-style: solid;
                        border-bottom-width: 1pt;
                        border-bottom-color: #959595;
                        border-right-style: solid;
                        border-right-width: 1pt;
                        border-right-color: #959595;
                    " bgcolor="#EFEFEF">
                <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Paid Due
                </p>
            </td>
            <td style="
                        width: 70px;
                        border-top-style: solid;
                        border-top-width: 1pt;
                        border-top-color: #959595;
                        border-left-style: solid;
                        border-left-width: 1pt;
                        border-left-color: #959595;
                        border-bottom-style: solid;
                        border-bottom-width: 1pt;
                        border-bottom-color: #959595;
                        border-right-style: solid;
                        border-right-width: 1pt;
                        border-right-color: #959595;
                    " bgcolor="#EFEFEF">
                <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Discount
                </p>
            </td>
            <td style="
                        width: 70px;
                        border-top-style: solid;
                        border-top-width: 1pt;
                        border-top-color: #959595;
                        border-left-style: solid;
                        border-left-width: 1pt;
                        border-left-color: #959595;
                        border-bottom-style: solid;
                        border-bottom-width: 1pt;
                        border-bottom-color: #959595;
                        border-right-style: solid;
                        border-right-width: 1pt;
                        border-right-color: #959595;
                    " bgcolor="#EFEFEF">
                <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Curr. Due
                </p>
            </td>
        </tr>
    </thead>
    <tbody>
        <?php
            $prev = 0;
            $add = 0;
            $paid = 0;
            $curr = 0;
            $discount = 0;
        ?>

        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $sales = $customer->sales;
            $payments = $customer->payments;

            // Current due before or on the date
            $_curr = $sales
                ->where('due_amount', '>', 0)
                ->where('date', '<=', $toDate->format('Y-m-d'))
                ->sum('due_amount');

            // Payments that are due pays and sale date = target date
            $futureDuePayments = $payments->filter(function($payment) use ($toDate) {
                return $payment->is_due_pay
                    && optional($payment->sale)->date === $toDate->format('Y-m-d');
            });

            // Add amount for today's sales due + future due payments
            $_add = $sales
                ->where('due_amount', '>', 0)
                ->where('date', '=', $toDate->format('Y-m-d'))
                ->sum('due_amount')
                + $futureDuePayments->sum('paying_amount')
                + $futureDuePayments->sum('discount');

            // Paid amount today (only due payments)
            $todayDuePayments = $payments->filter(function($payment) use ($toDate) {
                return $payment->is_due_pay
                    && $payment->date === $toDate->format('Y-m-d');
            });
            $_paid = $todayDuePayments->sum('paying_amount') + $todayDuePayments->sum('discount');
            $_paid_show = $todayDuePayments->sum('paying_amount');
            $_discount = $todayDuePayments->sum('discount');

            // Previous due logic
            $prevDuePayments = $payments->filter(function($payment) use ($toDate) {
                $saleDate = optional($payment->sale)->date;
                return $payment->is_due_pay && $saleDate < $toDate->format('Y-m-d');
            });

            $prevPaid = $payments->filter(function($payment) use ($toDate) {
                $saleDate = optional($payment->sale)->date;
                return $payment->is_due_pay
                    && $payment->date < $toDate->format('Y-m-d')
                    && $saleDate < $toDate->format('Y-m-d');
            });

            $_prev = $sales
                ->where('due_amount', '>', 0)
                ->where('date', '<', $toDate->format('Y-m-d'))
                ->sum('due_amount')
                + $prevDuePayments->sum('paying_amount') + $prevDuePayments->sum('discount')
                - $prevPaid->sum('paying_amount') - $prevPaid->sum('discount');
        ?>
		<?php if($_curr || $_prev || $_paid_show || $_add): ?>
        <tr style="height: 17pt;">
            <td>
                <p class="s2" style="padding: 3px; text-indent: 0pt; text-align: center;"><?php echo e($loop->iteration); ?></p>
            </td>
            <td>
                <p class="s2" style="padding: 3px; text-indent: 0pt; text-align: center;">
                    <?php echo e($toDate->format('Y-m-d')); ?>

                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px; text-indent: 0pt; text-align: left;">
                    <?php echo e($customer->name); ?>

                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px; padding-left: 2pt; text-indent: 0pt; text-align: left;">
                    <?php echo e($customer->company_name); ?>

                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    <?php echo e($customer->phone); ?>

                </p>
            </td>

            <td>
                <p class="s2" style="padding: 3px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                <?php echo e($_prev); ?>

                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    <?php echo e($_add); ?>

                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    <?php echo e($_paid_show); ?>

                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    <?php echo e($_discount); ?>

                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    <?php echo e($_curr); ?>

                </p>
            </td>
        </tr>
        <?php
            $prev += $_prev;
            $add += $_add;
            $paid += $_paid_show;
            $curr += $_curr;
            $discount += $_discount;
        ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td colspan="4">

            </td>
            <td style="padding: 4px; text-align: right;">
                Total
            </td>
            <td style="text-align: center;">
                <?php echo e($prev); ?>

            </td>
            <td style="text-align: center;">
                <?php echo e($add); ?>

            </td>
            <td style="text-align: center;">
                <?php echo e($paid); ?>

            </td>
            <td style="text-align: center;">
                <?php echo e($discount); ?>

            </td>
            <td style="text-align: center;">
                <?php echo e($curr); ?>

            </td>
        </tr>
    </tbody>
</table>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<td style="text-align: center; opacity: 0;">
    _______________
</td>
<td style="text-align: center; opacity: 0;">
    _______________
</td>
<td style="text-align: center; opacity: 0;">
    _______________
</td>
<td style="text-align: center; opacity: 0;">
    _______________
</td>
<td style="text-align: center; opacity: 0;">
    _______________
</td>
<td style="text-align: center;">
    <?php echo e(auth()->user()->name); ?>

    <br>
    _______________
    <br>
    CAPITAL LIFT
</td>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ariful/Developer/Personal_Projects/Inventory/inventory/resources/views/admin/customer/dueListPrint.blade.php ENDPATH**/ ?>