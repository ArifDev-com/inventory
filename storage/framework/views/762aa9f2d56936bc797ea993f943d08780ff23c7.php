<?php $__env->startSection('name', 'Bill'); ?>

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
                        <td style="width: 20%;">
                            Cell No.
                        </td>
                        <td>
                            :
                            <?php echo e($sale->customer?->phone); ?>

                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%">
                            Customer Name
                        </td>
                        <td>
                            : <?php echo e($sale->customer?->name); ?>

                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%">
                            Company Name
                        </td>
                        <td>
                            : <?php echo e($sale->customer?->company_name); ?>

                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%; vertical-align: top;">
                            Address
                        </td>
                        <td style="width: 400px;">
                            : <?php echo e($sale->customer?->address); ?>

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
                            Bill No
                        </td>
                        <td>
                            : <?php echo e($sale->ref_code); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            Date
                        </td>
                        <td>
                            : <?php echo e(\Carbon\Carbon::parse($sale->date)->format('d-m-Y')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            Time
                        </td>
                        <td>
                            : <?php echo e($sale->created_at->format('H:i')); ?>

                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>
<table style="border-collapse: collapse; margin: auto; width: 100%; margin-top: 8px; border: 1px solid #969696;" cellspacing="0" class="border">
    <tbody>
        <tr style="height: 16pt;">
            <td style="
                        width: 7%;
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
                <p class="s2" style="padding: 3px 0px; text-indent: 0pt; text-align: center;">SL No.</p>
            </td>
            <td style="
                        width: 10%;
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
                <p class="s2" style="padding: 3px 0px; text-indent: 0pt; text-align: center;">Item Code</p>
            </td>
            <td style="
                        width: 42%;
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
                <p class="s2" style="padding: 3px 0px; text-indent: 0pt; text-align: center;">Particulars</p>
            </td>
            <td style="
                        width: 12%;
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
                <p class="s2" style="padding: 3px 0px; padding-left: 1pt; text-indent: 0pt; text-align: center;">Unit</p>
            </td>
            <td style="
                        width: 13%;
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
                <p class="s2" style="padding: 3px 0px; padding-left: 1pt; text-indent: 0pt; text-align: center;">Unit Amount
                </p>
            </td>
            <td style="
                        width: 14%;
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
                <p class="s2" style="padding: 3px 0px; padding-left: 1pt; text-indent: 0pt; text-align: center;">Total Amn.(Tk)</p>
            </td>
        </tr>
        <?php $__currentLoopData = $sale->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr style="height: 17pt;">
            <td>
                <p class="s2" style="padding: 3px 0px; text-indent: 0pt; text-align: center;"><?php echo e($loop->iteration); ?></p>
            </td>
            <td>
                <p class="s2" style="padding: 3px 0px; text-indent: 0pt; text-align: center;">
                    <?php echo e($item->product->code); ?>

                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px 0px; padding-left: 2pt; text-indent: 0pt; text-align: left;">
                    <?php echo e($item->product->name); ?>

                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px 0px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    <?php echo e($item->quantity); ?>

                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px 0px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                <?php echo e($item->price); ?>

            </td>
            <td>
                <p class="s2" style="padding: 3px 0px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    <?php echo e($item->price * $item->quantity); ?>

                </p>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="padding: 5px">
                <p class="s2">
                Sub Amount
                </p>
            </td>
            <td style="text-align: center;">
                <p class="s2">
                <?php echo e($sale->items->sum('sub_total')); ?>

                </p>
            </td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="padding: 5px">
                <p class="s2">
                Other Cost
                </p>
            </td>
            <td style="text-align: center;">
                <p class="s2">
                <?php echo e($sale->other_cost); ?>

                </p>
            </td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none; text-align: right; padding: 0;">
                <div
                    style="width: 100px; border: 1px solid #969696; margin: 0; padding: 5px;display: inline-block; border-right: none;">
                    <div style="text-align: center;">
                        <p class="s2">
                        Previous Due
                        </p>
                    </div>
                </div>
            </td>
            <td>
                <p class="s2">
                <?php echo e($sale->customer?->sales()->where('id', '!=', $sale->id)->sum('due_amount')); ?>

                </p>
            </td>
            <td>
                <p class="s2">
                Discount
                </p>
            </td>
            <td style="text-align: center;">
                <p class="s2">
                <?php echo e($sale->discount ?: 0); ?>

                </p>
            </td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none; text-align: right; padding: 0;">
                <div
                    style="width: 100px; border: 1px solid #969696; margin: 0; padding: 5px;display: inline-block; border-right: none; border-top: none;">
                    <div style="text-align: center;">
                        <p class="s2">
                        Add Due
                        </p>
                    </div>
                </div>
            </td>
            <td>
                <p class="s2">
                <?php echo e($sale->due_amount); ?>

                </p>
            </td>
            <td>
                <p class="s2">
                Total
                </p>
            </td>
            <td style="text-align: center;">
                <p class="s2">
                <?php echo e($sale->grandtotal); ?>

                </p>
            </td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>

            <td style="border: none; text-align: right; padding: 0;">
                <div
                    style="width: 100px; border: 1px solid #969696; margin: 0; padding: 5px;display: inline-block; border-right: none; border-top: none; border-bottom: none;">
                    <div style="text-align: center;">
                        <p class="s2">
                        Total Due
                        </p>
                    </div>
                </div>
            </td>
            <td>
                <p class="s2">
                <?php echo e($sale->customer?->sales()->sum('due_amount')); ?>

                </p>
            </td>
            <td>
                <p class="s2">
                Paid Amount
            </td>
            <td style="text-align: center;">
                <p class="s2">
                <?php echo e($sale->paid_amount); ?>

                </p>
            </td>
        </tr>
    </tbody>
</table>
<h1 style="padding-top: 4px; text-indent: 0pt; text-align: left;">In Word: <?php echo e(numberToWords($sale->grandtotal)); ?> Taka
    Only.</h1>

<?php if($sale->note): ?>
<h1 style="padding-top: 4px; text-indent: 0pt; text-align: left;">
    Note: <?php echo e($sale->note); ?>

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
    <?php echo e($sale->user?->name); ?>

    <br>
    _______________
    <br>
    CAPITAL LIFT
</td>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ariful/Developer/Personal_Projects/Inventory/inventory/resources/views/admin/sales/print-page.blade.php ENDPATH**/ ?>