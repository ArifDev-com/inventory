@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<style>
    select.link {
        border: none;
        background-color: transparent;
    }
</style>
@php
    $selected_customer = $quotation ? $quotation->customer : null;
@endphp
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>{{ trans('sidebar.sale.create.add sale') }}</h4>
                <h6>{{ trans('sidebar.sale.create.add your new sale') }}</h6>
            </div>
            <a href="{{ route('sale.index') }}" class="btn btn-info">{{ trans('sidebar.sale.create.back') }}</a>
        </div>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route('sale.store') }}" id="sale_store" method="post" enctype="multipart/form-data">
                    @csrf
                    @if ($quotation)
                        <input type="hidden" name="quotation_id" value="{{ $quotation->id }}">
                    @endif
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>{{ trans('form.sale.sale date') }}</label>
                                <div class="input-groupicon">
                                    <input type="date" class="form-control" name="date" placeholder="Choose Date"
                                        value="{{ $quotation ? $quotation->date : date('Y-m-d') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="">
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        @include('common.customer')
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-2 ps-0 mt-2">
                                        <label for="customer_id_due">&nbsp;</label>
                                        <label for="customer_id_due">&nbsp;</label>
                                        <div class="add-icon">
                                            <span>
                                                <img src="{{ asset('backend') }}/img/icons/plus1.svg"
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
                                        <th>{{ trans('form.sale.product name') }}</th>
                                        <th>Stock</th>
                                        <th>{{ trans('form.sale.qty') }}</th>
                                        <th>{{ trans('form.sale.price') }}</th>

                                        <th class="text-end">{{ trans('form.sale.subtotal') }}</th>
                                        <th>{{ trans('form.sale.action') }}</th>
                                    </tr>
                                </thead>
                                <br>
                                <tbody class="tbody">
                                    @if ($quotation)
                                        @foreach ($quotation->items as $item)
                                            <tr id="product_${product.id}">
                                                <input type="hidden" name="product_id[]"  class="form-control product_id"  value="{{ $item->product_id }}">
                                                <td class="productimgname">
                                                    <a href="javascript:void(0);">{{ $item->product?->name }}</a>-<a href="javascript:void(0);">{{ $item->product?->code }}</a>
                                                </td>

                                                <td >{{ $item->product?->current_stock }}</td>

                                                <td>
                                                    <input type="number" name="quantity[]" class="form-control quantity"  placeholder="quantity" value="{{ $item->quantity }}" style="width:100px;"
                                                        min="1"
                                                    >
                                                </td>

                                                <input type="hidden" name="purchase_price[]" class="purchase_price" value="{{ $item->product?->price }}" style="width:100px;">

                                                <td class="price_td" mrp="{{ $item->product?->price }}" retail="{{ $item->product?->retail_price }}" purchase="{{ $item->product?->purchase_price }}" wholesale="{{ $item->product?->wholesale_price }}">
                                                    <input type="number" name="price[]" class="form-control price"  placeholder="price" value="{{ $item->price }}" style="width:100px;"
                                                        onkeyup="$(this).next().val('').trigger('change');"
                                                    >
                                                    <select name="price_type[]" class="link" onchange="updatePriceTypePrice(this)">
                                                        <option value="">Custom price</option>
                                                        <option value="mrp" selected>MRP price - {{ $item->product?->price }}</option>
                                                        <option value="retail">Retail price - {{ $item->product?->retail_price }}</option>
                                                        <option value="wholesale">Wholesale price - {{ $item->product?->wholesale_price }}</option>
                                                    </select>
                                                </td>
                                                <td class="text-end" >
                                                    <input type="number" class="inline_total" readonly name="sub_total[]" value="{{ $item->sub_total }}" style="width:100px;">
                                                </td>
                                                <td>
                                                    <a class="remove"><img src="{{ asset('backend') }}/img/icons/delete.svg" alt="svg"></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                  	<div class="col-lg-12 col-sm-6 col-12">
                            <div class="form-group">
                                <label>{{ trans('form.sale.product name') }}</label>
                                <div class="input-groupicon">

                                    <input type="text" id="search" placeholder="Please type product code and select..."
                                        autocomplete="off">
                                    <div class="addonset">
                                        <img src="{{ asset('backend') }}/img/icons/scanners.svg" alt="img">
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
                                                value="{{ $quotation ? $quotation->discount : '' }}">
                                        </h5>
                                    </li>
                                    <li>
                                        <h4>Other Cost</h4>
                                        <h5>
                                            <input type="number" name="other_cost"
                                                class="form-control other_cost" placeholder="Enter Other Cost"
                                                onkeyup="updateGrandTotal();" onblur="updateGrandTotal();"
                                                value="{{ $quotation ? $quotation->other_cost : '' }}">
                                        </h5>
                                    </li>


                                    <li class="total">
                                        <h4>{{ trans('form.sale.grand total') }}</h4>
                                        <input type="number" readonly class="total_val form-control" name="grand_total"
                                            style="margin-left:30px;"
                                            value="{{ $quotation ? $quotation->grandtotal : '' }}">
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
                                <label>{{ trans('form.sale.paid amount') }}</label>
                                <input type="number" name="paid_amount" class="paid_amount form-control"
                                    placeholder="{{ trans('form.sale.enter paid amount') }}" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>{{ trans('form.sale.due amount') }}</label>
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
                                <label>{{ trans('form.sale.note') }}</label>
                                <textarea class="form-control" name="note"
                                    placeholder="{{ trans('form.sale.enter note') }}"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">{{ trans('form.sale.submit') }}</button>
                            <a href="" class="btn btn-cancel me-2">{{ trans('form.sale.cancel') }}</a>
                            <a href="#" onclick="checkout()" class="btn me-2 btn-warning">Checkout</a>
                            <button type="button" class="btn btn-success" id="quotation_add">
                                @if (!$quotation)
                                    Add
                                @else
                                    Update
                                @endif
                                    Quotation
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- modal here --}}
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
                <form action="{{ route('customer.store.modal') }}" method="post" enctype="multipart/form-data">
                    @csrf
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
                                <input type="date" name="dob" value="{{ date('Y-m-d') }}">
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
@endsection

@section('scripts')
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
        let token = "{{ csrf_token() }}";
        var route = "{{ route('find.products.purchase') }}";
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
                        <a class="remove"><img src="{{ asset('backend') }}/img/icons/delete.svg" alt="svg"></a>
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
    var quotationData = @json(session('quotation_to_sale'));
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
            // $('#sale_store').attr('action', "{{ route('quotation.store') }}");
            // return $('#sale_store').submit();

            // Send AJAX request
            $.ajax({
                url: "{{ route('quotation.store') }}", // Ensure this route exists
                type: "POST",
                data: formData,
                success: function(response) {
                    alert("Quotation saved successfully!");
                    // console.log(response);
                    // Redirect to quotation.index route
                    window.location.href = "{{ route('quotation.index') }}?quotation_id=" + response.id;
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

    const customers = @json($customers);

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
@endsection

{{-- function PrintMe(DivID) {
var disp_setting = "toolbar=yes,location=no,";
disp_setting += "directories=yes,menubar=yes,";
disp_setting += "scrollbars=yes,width=410, height=600, left=100, top=25";
var content_vlue = document.getElementById("print_area_container").innerHTML;
var docprint = window.open("", "", disp_setting);
docprint.document.open();
docprint.document.write('
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"');
    docprint.document.write('"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">');
docprint.document.write('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">');
docprint.document.write('

<head>
    <title>My Title</title>');
    docprint.document.write(`
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+128&display=swap" rel="stylesheet">
    <style>
        .barcode {
            font-family: "Libre Barcode 128", system-ui;
            font-weight: 400;
            font-style: normal;
        }
    </style>
    `);
    docprint.document.write('<style type="text/css">
        body {
            margin: 0px;
            ');
 docprint.document.write('font-family:verdana,Arial;color:#000;');
            docprint.document.write('font-family:Verdana, Geneva, sans-serif; font-size:12px;}');
            docprint.document.write('a{color:#000;text-decoration:none;}
    </style>');
    docprint.document.write('
</head>

<body onLoad="self.print()">
    <center>');
        docprint.document.write(content_vlue.replace('400px', '405px'));
        docprint.document.write('</center>
</body>

</html>');
docprint.document.close();
docprint.focus();
} --}}