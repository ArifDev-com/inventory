<?php $__env->startSection('content'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<style>
    select.link {
        border: none;
        background-color: transparent;
    }
</style>
<?php
    $selected_customer = $quotation ? $quotation->customer : null;
?>
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4><?php echo e(trans('sidebar.sale.create.add sale')); ?></h4>
                <h6><?php echo e(trans('sidebar.sale.create.add your new sale')); ?></h6>
            </div>
            <a href="<?php echo e(route('sale.index')); ?>" class="btn btn-info"><?php echo e(trans('sidebar.sale.create.back')); ?></a>
        </div>
        <?php if(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(route('sale.store')); ?>" id="sale_store" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php if($quotation): ?>
                        <input type="hidden" name="quotation_id" value="<?php echo e($quotation->id); ?>">
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label><?php echo e(trans('form.sale.sale date')); ?></label>
                                <div class="input-groupicon">
                                    <input type="date" class="form-control" name="date" placeholder="Choose Date"
                                        value="<?php echo e($quotation ? $quotation->date : date('Y-m-d')); ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="">
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <?php echo $__env->make('common.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-2 ps-0 mt-2">
                                        <label for="customer_id_due">&nbsp;</label>
                                        <label for="customer_id_due">&nbsp;</label>
                                        <div class="add-icon">
                                            <span>
                                                <img src="<?php echo e(asset('backend')); ?>/img/icons/plus1.svg"
                                                    data-bs-toggle="modal" data-bs-target="#create" alt="img">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive mb-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><?php echo e(trans('form.sale.product name')); ?></th>
                                        <th>Stock</th>
                                        <th><?php echo e(trans('form.sale.qty')); ?></th>
                                        <th><?php echo e(trans('form.sale.price')); ?></th>

                                        <th class="text-end"><?php echo e(trans('form.sale.subtotal')); ?></th>
                                        <th><?php echo e(trans('form.sale.action')); ?></th>
                                    </tr>
                                </thead>
                                <br>
                                <tbody class="tbody">
                                    <?php if($quotation): ?>
                                        <?php $__currentLoopData = $quotation->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="product_${product.id}">
                                                <input type="hidden" name="product_id[]"  class="form-control product_id"  value="<?php echo e($item->product_id); ?>">
                                                <td class="productimgname">
                                                    <a href="javascript:void(0);"><?php echo e($item->product?->name); ?></a>-<a href="javascript:void(0);"><?php echo e($item->product?->code); ?></a>
                                                </td>

                                                <td ><?php echo e($item->product?->current_stock); ?></td>

                                                <td>
                                                    <input type="number" name="quantity[]" class="form-control quantity"  placeholder="quantity" value="<?php echo e($item->quantity); ?>" style="width:100px;"
                                                        min="1"
                                                    >
                                                </td>

                                                <input type="hidden" name="purchase_price[]" class="purchase_price" value="<?php echo e($item->product?->price); ?>" style="width:100px;">

                                                <td class="price_td" mrp="<?php echo e($item->product?->price); ?>" retail="<?php echo e($item->product?->retail_price); ?>" purchase="<?php echo e($item->product?->purchase_price); ?>" wholesale="<?php echo e($item->product?->wholesale_price); ?>">
                                                    <input type="number" name="price[]" class="form-control price"  placeholder="price" value="<?php echo e($item->price); ?>" style="width:100px;"
                                                        onkeyup="$(this).next().val('').trigger('change');"
                                                    >
                                                    <select name="price_type[]" class="link" onchange="updatePriceTypePrice(this)">
                                                        <option value="">Custom price</option>
                                                        <option value="mrp" selected>MRP price - <?php echo e($item->product?->price); ?></option>
                                                        <option value="retail">Retail price - <?php echo e($item->product?->retail_price); ?></option>
                                                        <option value="wholesale">Wholesale price - <?php echo e($item->product?->wholesale_price); ?></option>
                                                    </select>
                                                </td>
                                                <td class="text-end" >
                                                    <input type="number" class="inline_total" readonly name="sub_total[]" value="<?php echo e($item->sub_total); ?>" style="width:100px;">
                                                </td>
                                                <td>
                                                    <a class="remove"><img src="<?php echo e(asset('backend')); ?>/img/icons/delete.svg" alt="svg"></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                  	<div class="col-lg-12 col-sm-6 col-12">
                            <div class="form-group">
                                <label><?php echo e(trans('form.sale.product name')); ?></label>
                                <div class="input-groupicon">

                                    <input type="text" id="search" placeholder="Please type product code and select..."
                                        autocomplete="off">
                                    <div class="addonset">
                                        <img src="<?php echo e(asset('backend')); ?>/img/icons/scanners.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="suggestProduct"></div>

                    <div class="row">
                        <div class="col-lg-12 float-md-right">
                            <div class="total-order">
                                <ul>
                                    <li>
                                        <h4>Discount</h4>
                                        <h5>
                                            <input type="number"  name="discount" class="form-control discount"
                                                placeholder="Enter Discount" onkeyup="updateGrandTotal();"
                                                onblur="updateGrandTotal();"
                                                value="<?php echo e($quotation ? $quotation->discount : ''); ?>">
                                        </h5>
                                    </li>
                                    <li>
                                        <h4>Other Cost</h4>
                                        <h5>
                                            <input type="number" name="other_cost"
                                                class="form-control other_cost" placeholder="Enter Other Cost"
                                                onkeyup="updateGrandTotal();" onblur="updateGrandTotal();"
                                                value="<?php echo e($quotation ? $quotation->other_cost : ''); ?>">
                                        </h5>
                                    </li>


                                    <li class="total">
                                        <h4><?php echo e(trans('form.sale.grand total')); ?></h4>
                                        <input type="number" readonly class="total_val form-control" name="grand_total"
                                            style="margin-left:30px;"
                                            value="<?php echo e($quotation ? $quotation->grandtotal : ''); ?>">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group mb-1 first-method">
                                <label>
                                    Payment Method
                                </label>
                                <select class="form-control" name="payment_type" required="true" onchange="paymentMethodChange(this)">
                                    <option value="">Select</option>
                                    <option value="cash">Cash</option>
                                    <option value="card">Card</option>
                                    <option value="bank">Bank</option>
                                    <option value="bkash">bKash</option>
                                    <option value="rocket">Rocket</option>
                                    <option value="nagad">Nagad</option>
                                    <option value="advance">Advance</option>
                                </select>
                                <span class="text-danger advance_message"></span>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label><?php echo e(trans('form.sale.paid amount')); ?></label>
                                <input type="number" name="paid_amount" class="paid_amount form-control"
                                    placeholder="<?php echo e(trans('form.sale.enter paid amount')); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label><?php echo e(trans('form.sale.due amount')); ?></label>
                                <input type="number" name="due_amount" class="due_amount form-control" id="due_amount"
                                    value="0" min="0">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Due Date </label>
                                <input type="date" name="due_date" class="form-control due_date" id="due_date" value="">
                            </div>
                        </div>
                        <div class="col-12 mt-2 additional-payment-methods">
                            <div class="list">

                            </div>

                            <button class="btn btn-primary btn-sm"
                                onclick="addPaymentMethod()" type="button"
                                id="add_payment_method">
                                <i class="fa fa-plus"></i>
                                Add More Method
                            </button>
                        </div>

                        <div class="col-lg-12 mt-4">
                            <div class="form-group">
                                <label><?php echo e(trans('form.sale.note')); ?></label>
                                <textarea class="form-control" name="note"
                                    placeholder="<?php echo e(trans('form.sale.enter note')); ?>"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2"><?php echo e(trans('form.sale.submit')); ?></button>
                            <a href="" class="btn btn-cancel me-2"><?php echo e(trans('form.sale.cancel')); ?></a>
                            <a href="#" onclick="checkout()" class="btn me-2 btn-warning">Checkout</a>
                            <button type="button" class="btn btn-success" id="quotation_add">
                                <?php if(!$quotation): ?>
                                    Add
                                <?php else: ?>
                                    Update
                                <?php endif; ?>
                                    Quotation
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('customer.store.modal')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Customer Name</label>
                                <input type="text" name="name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" name="company_name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12 d-none">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" value="<?php echo e(date('Y-m-d')); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                        <a href="" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    function checkout() {
        // Open the current page in a new tab
        let newTab = window.open(window.location.href, '_blank');
        // Ensure the new tab opened successfully
        if (newTab) {
            // Delay refocusing on the original tab
            setTimeout(() => {
                window.focus();
            }, 500);
        } else {
            alert("Popup blocked! Please allow pop-ups for this site.");
        }
    }

    function updateDueDate() {
        alert('Please wait...');
    }

    $("body").on("keyup", "#search", function() {
        let searchData = $("#search").val();
        let token = "<?php echo e(csrf_token()); ?>";
        var route = "<?php echo e(route('find.products.purchase')); ?>";
        if (searchData.length > 0) {
            $.ajax({
                type: "GET",
                url: route,
                data: {
                    search: searchData,
                    // _token:token,
                },
                success: function(result) {
                    $("#suggestProduct").html(result);
                },
            });
        }
        if (searchData.length < 1) $("#suggestProduct").html(" ");
    });

    function testClick(product) {
        // console.log(product);
        if ($(`#product_${product.id}`).length > 0) {
            return;
        }
        var htmldata = `<tr id="product_${product.id}">
                    <input type="hidden" name="product_id[]"  class="form-control product_id"  value="${product.id}">

                    <td class="productimgname">

                    <a href="javascript:void(0);">${product.name}</a>-<a href="javascript:void(0);">${product.code}</a>
                    </td>

                    <td >${product.current_stock}</td>

                    <td>
                    <input type="number" name="quantity[]" class="form-control quantity"  placeholder="quantity" value="1" style="width:100px;"
                        min="1"
                    >
                    </td>

                    <input type="hidden" name="purchase_price[]" class="purchase_price" value="${product.price}" style="width:100px;">

                    <td class="price_td" mrp="${product.price}" retail="${product.retail_price}" purchase="${product.purchase_price}" wholesale="${product.wholesale_price}">
                        <input type="number" name="price[]" class="form-control price"  placeholder="price" value="" style="width:100px;" required min="0"
                            onkeyup="$(this).next().val('').trigger('change');"
                        >
                        <select name="price_type[]" class="link" onchange="updatePriceTypePrice(this)">
                            <option value="">Custom price</option>
                            <option value="mrp" selected>MRP price - ${product.price}</option>
                            <option value="retail">Retail price - ${product.retail_price}</option>
                            <option value="wholesale">Wholesale price - ${product.wholesale_price}</option>
                        </select>
                    </td>
                    <td class="text-end" >
                        <input type="number" class="inline_total" readonly name="sub_total[]" value="${product.price}" style="width:100px;">
                    </td>
                    <td>
                        <a class="remove"><img src="<?php echo e(asset('backend')); ?>/img/icons/delete.svg" alt="svg"></a>
                    </td>
                </tr>`;

        $(".table .tbody").append(htmldata);

        updateGrandTotal();
        $('#search').val('');
        $("#suggestProduct").html('');
        // subTotalAmount();
    }

    //delete row
    $("table tbody").delegate(".remove", "click", function() {
        $(this).parent().parent().remove();
    });

    function updatePriceTypePrice(element) {
        //  console.log($(element), element);
        var td = $(element).parent();
        var priceType = $(element).val();
        var price = td.attr(priceType);
        if (priceType == "mrp") {
            td.find(".price").val(price);
        } else if (priceType == "retail") {
            td.find(".price").val(price);
        } else if (priceType == "purchase") {
            td.find(".price").val(price);
        } else if (priceType == "wholesale") {
            td.find(".price").val(price);
        }
        setTimeout(() => {
            totalOfSubTotal(td.parent());
        }, 100);
    }

    // when qty will increment or drecrement.. it will be call automically
    function totalOfSubTotal(tr) {
        var qty = tr.find(".quantity").val();
        var price = tr.find(".price").val();
        var totalAmount = price * qty;
        tr.find(".inline_total").val(totalAmount);
        updateGrandTotal();
    }
    $("table tbody").delegate(".quantity", "keyup", function() {
        var tr = $(this).parent().parent();
        totalOfSubTotal(tr);
    });

    $("table tbody").delegate(".price", "keyup", function() {
        var tr = $(this).parent().parent();
        totalOfSubTotal(tr);
    });

    function updateGrandTotal() {
        var total = 0;
        $(".inline_total").each(function(i, e) {
            var inlineTotal = parseFloat($(this).val()) || 0;
            total += inlineTotal;
        });
        total += parseFloat($(".other_cost").val()) || 0;
        total -= parseFloat($(".discount").val()) || 0;
        var formattedTotal = total.toFixed(0);
        $(".total_val").val(formattedTotal);
    }

    // Discount calculation
    $("#discount_val").keyup(function() {
        updateGrandTotal();

        var total = parseFloat($(".total_val").val()) || 0;
        var discount = parseFloat($(this).val()) || 0;
        var t = total - discount;

        $(".total_val").val(t.toFixed(0)); // Updating total value
        $("#discount").text(discount.toFixed(0)); // Displaying discount value
    });

    // Paid amount and due amount calculation
    $(".paid_amount").keyup(function() {
        updatePaidAmount();
    });
    function updatePaidAmount () {
        let paidAmount = $('.paid_amount').val()
        let partials = $('.additional-payment-methods .list [_index]');
        let grandTotal = $(".total_val").val();
        if(partials.length > 0) {
            paidAmount = 0
            partials.each(function() {
                paidAmount += parseInt($(this).find('input.amount').val());
            });
            $('.paid_amount').val(paidAmount);
        }
        let dueAmount = grandTotal - paidAmount;
        $(".due_amount").val(dueAmount);
        $('#due_date').attr('required', false);
    }

    $(document).ready(function() {
        $(".select2").select2();
    });
</script>
<script>
    var quotationData = <?php echo json_encode(session('quotation_to_sale'), 15, 512) ?>;
    $(document).ready(function() {

        if (quotationData) {
            console.log("Quotation Details:", quotationData);
            customer_id = quotationData.customer_id;
            $('#selectpicker').val(customer_id).change();

            items = quotationData.items;

            items.forEach(element => {
                testClick(element.product);
            });
        }

        $('#due_amount').on('blur', function() {
            let dueAmount = parseFloat($(this).val().trim()); // Get value & convert to number

            if (!isNaN(dueAmount) && dueAmount != 0) {
                $('#due_date').attr('required', true); // Add required if amount > 0
            } else {
                $('#due_date').removeAttr('required'); // Remove required if amount is 0 or empty
            }
        });

        $('#quotation_add').on('click', function() {
            let isValid = true;

            // If any required field is empty, prevent form submission
            if (!isValid) {
                alert("Please fill all required fields before submitting.");
                return;
            }

            // Collect form data
            let formData = $('#sale_store').serialize(); // Converts form fields into a query string
            // $('#sale_store').attr('action', "<?php echo e(route('quotation.store')); ?>");
            // return $('#sale_store').submit();

            // Send AJAX request
            $.ajax({
                url: "<?php echo e(route('quotation.store')); ?>", // Ensure this route exists
                type: "POST",
                data: formData,
                success: function(response) {
                    alert("Quotation saved successfully!");
                    // console.log(response);
                    // Redirect to quotation.index route
                    window.location.href = "<?php echo e(route('quotation.index')); ?>?quotation_id=" + response.id;
                },
                error: function(xhr, status, error) {
                    alert("Error submitting form.");
                    console.error(xhr.responseText);
                }
            });
        });

    });

    $(document).ready(function() {
        // $("#suggestProduct").click(function() {
        // 	$("#suggestProduct").slideUp(1400);
        //     $(this).next('#suggestProduct').slideDown('slide', {direction: 'left'}, 1400);
        //   ;
        // });

        // $("#suggestProduct").click(function() {
        // 	$("#suggestProduct").slideDown(1400);
        //     $(this).next('#suggestProduct').slideUp('slide', {direction: 'left'}, 1400);
        //   ;
        // });

        showCustomerDue();
    });
    function addPaymentMethod(element = null) {
        console.log(element);
        if(element) {
            let index = $(element).attr('index');
            $('.additional-payment-methods [_index="' + index + '"]').remove();
        } else {
            let len = parseInt(Math.random() * 1000000);
            $('.additional-payment-methods .list').append(`
                <div class="row" _index="${len}">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Payment Method</label>
                            <select class="select2 form-control" name="payments[${len}][method]" required="true" onchange="paymentMethodChange(this)">
                                <option value="cash">Cash</option>
                                <option value="card">Card</option>
                                <option value="bank">Bank</option>
                                <option value="bkash">bKash</option>
                                <option value="rocket">Rocket</option>
                                <option value="nagad">Nagad</option>
                                <option value="advance">Advance</option>
                            </select>
                                <span class="text-danger advance_message"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Payment Amount</label>
                            <input type="number" class="form-control amount" name="payments[${len}][amount]" required min="0"
                                onkeyup="updatePaidAmount()"
                            >
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">&nbsp;</label>
                            <button type="button" class="btn btn-danger btn-sm" onclick="addPaymentMethod(this)" index="${len}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `)
        }
        // check existing inputs
        let len = $('.additional-payment-methods .list [_index]').length;
        $('.paid_amount').attr('readonly', len > 0);
        if(len > 0) $('.first-method').hide();
        else $('.first-method').show();

        // let index = $(element).attr('index');
        // let html = `<div class="row list" _index="${index}">
        // </div>`;
        // $('.additional-payment-methods').append(html);
    }
</script>

<script>
    var i = 0;
    $('#add').click(function() {
        ++i;
        $('#table').append(
            `<tr>
            <td>
                <div class="form-group">
                    <input type="text" name="inputs[` + i + `][emi_amount]" required >
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input type="date" name="inputs[` + i + `][emi_date]"   class="form-control" required>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <button type="button" class="btn btn-danger remove-table-row">Remove</button>
                </div>
            </td>
        </tr>`
        );
    });

    $(document).on('click', '.remove-table-row', function() {
        $(this).parents('tr').remove();
    })

    const customers = <?php echo json_encode($customers, 15, 512) ?>;

    function showCustomerDue() {
        var customerId = $('#selectpicker').val();
        // // alert(customerId);
        // if (customerId) {
        //     const customer = customers.find(customer => customer.id == customerId);
        //     // console.log(customer);
        //     $('#customerDue').text(
        //         'Due: ' + customer.sales.reduce((acc, sale) => acc + sale.due_amount, 0) +
        //         ' Tk | Dealer: ' + (customer.creator?.first_name || 'Admin')
        //     );
        // } else {
        //     $('#customerDue').text('');
        // }
    }
    setInterval(() => {
        $('.table .tbody tr').each(function() {
            totalOfSubTotal($(this));
        });
        updateGrandTotal();
    }, 1000);

    function paymentMethodChange(element) {
        let method = $(element).val();
        if(method == 'advance') {
            $('.advance_message').text('Advance: ' + $('.advance_amount').text() + ' Tk');
        } else {
            $('.advance_message').text('');
        }
        let parent = $(element).parent();
        if(method == 'bank') {
            let type = $(element).attr('name');
            let newName = (type === 'payment_type' ? 'bank_note' : type.replace('method', 'bank_note'));
            parent.append(`
                <div class="form-group bank_info">
                    <label>Bank Note:</label>
                    <input type="text" class="form-control" name="${newName}">
                </div>
            `);
        } else {
            parent.find('.bank_info').remove();
        }
    }
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ariful/Developer/Personal_Projects/Inventory/inventory/resources/views/admin/sales/create.blade.php ENDPATH**/ ?>