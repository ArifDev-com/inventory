<?php $__env->startSection('name', 'Date wise Stock Report'); ?>
<?php $__env->startSection('content'); ?>
<style>
    table * {
        font-size: 12px !important;
    }
</style>
<div style=" margin-top: 30px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">
    Date:
    &nbsp;
    <?php echo e($fromDate->format('d-m-Y')); ?> to <?php echo e($toDate->format('d-m-Y')); ?>

    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    Time:
    &nbsp;
    <?php echo e(now()->format('h:i a')); ?>

</div>
<table style="padding-top: 5px; border-collapse: collapse; margin: auto; width: 100%;border: 1px solid #969696; " cellspacing="0" class="border">
    <thead>
        <tr style="height: 20pt;">
            <td style="
                        width: 50px;
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
                <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">
                    S.L
                </p>
            </td>
            <td style="
                        width: 80px;
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
                <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">
                    Item Code
                </p>
            </td>
            <td style="
                        width: 300px;
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
                <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">Product Name</p>
            </td>
            <td style="
                        width: 36pt;
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
                <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">Qty</p>
            </td>
            <td style="
                        width: 46pt;
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
                <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Sale Qty
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
                <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Add Qty
                </p>
            </td>
        </tr>
    </thead>
    <tbody>

        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr style="height: 17pt;">
            <td>
                <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;"><?php echo e($loop->iteration); ?></p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;"><?php echo e($product->code); ?></p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: left;">
                    <?php echo e($product->name); ?>

                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    <?php echo e($product->current_stock); ?>

                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    <?php echo e($product->sales_count); ?>

                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    <?php echo e($product->add_count); ?>

                </p>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <td style="text-align: center; opacity: 0;">
        _______________
        <br>
        Received by
    </td>
    <td style="text-align: center ; opacity: 0;">
        SOLD GOODS ARE NOT TAKEN BACK
    </td>
    <td style="text-align: center;">
        <div>
            
        </div>
        <div style="border-top: 2px solid #000; margin-top: 3px;">
            CAPITAL LIFT
        </div>
    </td>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ariful/Developer/Personal_Projects/Inventory/inventory/resources/views/admin/reports/datewise-stock-report-print.blade.php ENDPATH**/ ?>