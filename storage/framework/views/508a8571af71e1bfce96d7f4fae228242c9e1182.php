<?php $__env->startSection('name', 'Product added report'); ?>

<?php $__env->startSection('content'); ?>
    <table style="margin-top: 25px;">
        <tr>
            <td>
                Date: <?php echo e($fromDate); ?> to <?php echo e($toDate); ?>

            </td>
            <td style="text-align: right;">
                Time: <?php echo e(now()->format('h:i A')); ?>

            </td>
        </tr>
    </table>
    <table style="border-collapse: collapse; margin: auto; width: 100%; margin-top: 5px" cellspacing="0" class="border">
        <thead>
            <tr style="height: 20pt;">
                <td
                    style="
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
                    "
                    bgcolor="#EFEFEF"
                >
                    <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">S.L</p>
                </td>
                <td
                    style="
                        width: 66pt;
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
                    "
                    bgcolor="#EFEFEF"
                >
                    <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">Date</p>
                </td>
                <td
                    style="
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
                    "
                    bgcolor="#EFEFEF"
                >
                    <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">Item Code</p>
                </td>
                <td
                    style="
                        width: 218pt;
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
                    "
                    bgcolor="#EFEFEF"
                >
                    <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">Product Name</p>
                </td>
                <td
                    style="
                        width: 50pt;
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
                    "
                    bgcolor="#EFEFEF"
                >
                    <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                        Quantity
                    </p>
                </td>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $updates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $update): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr style="height: 17pt;">
                    <td>
                      <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                        <?php echo e($loop->iteration); ?>

                       </p>
                    </td>
                    <td>
                      <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                        <?php echo e($update->created_at->format('d-m-Y')); ?>

                        </p>
                    </td>
                    <td>
                      <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                        <?php echo e($update->product->code); ?>

                        </p>
                    </td>
                    <td>
                      	<p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: left;">
                        <?php echo e($update->product->name); ?>

                        </p>
                    </td>
                    <td>
                      <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                        <?php echo e($update->quantity); ?>

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


<?php echo $__env->make('layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ariful/Developer/Personal_Projects/Inventory/inventory/resources/views/admin/reports/product-added-report-print.blade.php ENDPATH**/ ?>