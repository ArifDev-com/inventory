@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Create Sales Return</h4>
                <h6>Add/Update Sales Return</h6>
            </div>
            <a href="{{ route('sale.return.list') }}" class="btn btn-info">Back</a>
        </div>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route('sale.return.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="sale_id" value="{{ $sale->id }}">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Customer Name</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <select class="select2 " disabled>
                                            @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}" {{ $sale->customer_id == $customer->id ?
                                                'selected' : '' }}
                                                >{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Return Date</label>
                                <div class="input-groupicon">
                                    <input type="date" class="form-control" name="date" value="{{ date("Y-m-d") }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Reference No.</label>
                                <input type="text" name="ref_code" value="{{ $sale->ref_code }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Net Unit Price(৳) </th>
                                        <th>Stock</th>
                                        <th>QTY </th>
                                        <th class="text-end">Subtotal (৳) </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sale->items as $item)
                                    <tr>
                                        <input type="hidden" name="product_id[]" class="form-control product_id"
                                            value="{{ $item->product_id }}">
                                        <td class="">
                                            <a href="javascript:void(0);">{{ $item->product->name }}</a>
                                        </td>
                                        <td class="price">
                                            {{ $item->price }}
                                            <input type="hidden" name="price[]" value="{{ $item->price }}">
                                        </td>
                                        <td>{{ $item->product->current_stock }}</td>
                                        <td>
                                            <input type="number" name="quantity[]" class="form-control quantity"
                                                placeholder="quantity" value="{{ $item->quantity }}" style="width:100px;">
                                        </td>

                                        <td class="text-end">
                                            <input type="number" readonly class="inline_total" name="sub_total[]"
                                                value="{{ $item->price }}" style="width:100px;">
                                        </td>
                                        <td>
                                            <a class="remove"><img src="{{asset('backend')}}/img/icons/delete.svg"
                                                    alt="svg"></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 float-md-right">
                            <div class="total-order">
                                <ul>
                                    <li class="total">
                                        <h4>Grand Total</h4>
                                        <input type="text" readonly class="total_val" name="grand_total"
                                            style="margin-left:30px;">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>{{ trans('form.sale.paid amount') }}</label>
                                <input type="text" name="paid_amount" class="paid_amount"
                                    placeholder="{{ trans('form.sale.enter paid amount') }}" required>
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
@endsection

@section('scripts')

<script>
    //delete row
    $("table tbody").delegate(".remove", "click",function(){
       $(this).parent().parent().remove();
       updateGrandTotal();
    });


    // when qty will increment or drecrement.. it will be call automically
    // function updateSubTotal(){
    $("table tbody").delegate(".quantity", "keyup", function(){
        updateSubTotal($(this).parent().parent());
    });

    function updateSubTotal(tr) {
        var qty = tr.find('.quantity').val();
        var price = tr.find('.price').text();
        var totalAmount = price * qty;
        tr.find('.inline_total').val(totalAmount);
        // var inlineDiscont = tr.find('.inline_discount').text();
        // var inlinetax = tr.find('.inline_tax').text();


        // var discountAmount =  ( totalAmount -  (parseInt(totalAmount) * parseInt(inlineDiscont)) /100)

        // var inlineSubTotal =  ( discountAmount +  (parseInt(discountAmount) * parseInt(inlinetax)) /100)

        // tr.find('.inline_total').val(inlineSubTotal);
        tr.find('.inline_total').val(totalAmount);
        updateGrandTotal();

    };

    function updateGrandTotal() {

        var total = 0;
        $('.inline_total').each(function(i, e) {
            var inlineTotal = $(this).val() - 0;
            total += inlineTotal;
            console.log(i);
            console.log(e);
        });
        var formattedTotal = total.toFixed(2); // Fixed a typo: 'num' should be 'total'
        $('.total_val').val(formattedTotal);
    }

  //tax
  $('#tax_val').keyup(function () {

    var total = 0;
            $('.inline_total').each(function (i, e) {
                var inlineTotal = $(this).val() - 0;
                total += inlineTotal;
            });


        var taxPercent =  $(this).val();
        var discount =  $('#discount_val').val();
        var shipping =  $('#shipping_val').val();

        var t = parseInt(total)  - parseInt(discount);
        var grandTotal = t + parseInt(shipping);

        var taxAmount =  ((grandTotal * parseInt(taxPercent)) /100)

        var finalTotal  = grandTotal + taxAmount;


        // var grandtotal = total - discount;
        $('.total_val').val(finalTotal);
        $('#tax_amount').text(taxAmount);
        // $('#tax_percent').text(taxPercent);
        $('#tax_amount').append('<span id="tax_percent">('+taxPercent+'%)</span>');

  });

   //discount
   $('#discount_val').keyup(function () {

        var total = 0;
        $('.inline_total').each(function (i, e) {
            var inlineTotal = $(this).val() - 0;
            total += inlineTotal;
        });


        var discount =  $(this).val();
        var taxPercent =  $('#tax_val').val();
        var shipping =  $('#shipping_val').val();
        var t = parseInt(total)  - parseInt(discount);
        var grandTotal = t + parseInt(shipping);
        var finalTotal = grandTotal + ((grandTotal * parseInt(taxPercent)) /100)


        // var grandtotal = total - discount;
        $('.total_val').val(finalTotal);
        $('#discount').text(discount);

    });

    //Paid
    $('.paid_amount').keyup(function () {

		var total = 0;
        $('.inline_total').each(function (i, e) {
            var inlineTotal = $(this).val() - 0;
            total += inlineTotal;
        });


        var discount =  $(this).val();
        // var taxPercent =  $('#tax_val').val();
        // var shipping =  $('#shipping_val').val();
        var t = parseInt(total) ;
        // var grandTotal = t + parseInt(shipping);
        //var finalTotal = grandTotal + ((grandTotal * parseInt(taxPercent)) /100);
        // var finalTotal = grandTotal ;


        // var grandtotal = total - discount;
        $('.total_val').val(t);
        //$('#discount').text(discount);

    });

    //shipping cost
    $('#shipping_val').keyup(function () {

        var total = 0;
            $('.inline_total').each(function (i, e) {
                var inlineTotal = $(this).val() - 0;
            return	total += inlineTotal;
            });
            var shipping =  $(this).val();
            var discount = $('#discount_val').val();
            var taxPercent =  $('#tax_val').val();

            var t = parseInt(total)  - parseInt(discount);
            var grandTotal = t + parseInt(shipping);
            var finalTotal = grandTotal + ((grandTotal * parseInt(taxPercent)) /100)

        $('.total_val').val(finalTotal);
        $('#shipping').text(shipping);

    });

    //paid_amount and due amount calculation

    $('.paid_amount').keyup(function () {
        var paidAmount =   $(this).val();
        var grandTotal =   $('.total_val').val();
        var dueAmount = grandTotal  - paidAmount;

        $('.due_amount').val(dueAmount);

    });

</script>

<script>
    $(document).ready(function () {
        $(".select2").select2();
        $('table tbody tr').each(function(){
            updateSubTotal($(this));
        });
    });
</script>

<script>
    $(document).ready(function() {

		// $("#suggestProduct").click(function() {
		// 	$("#suggestProduct").slideUp();
		// });

		// $("#suggestProduct").click(function() {
		// 	$("#suggestProduct").slideDown();
		// });


		$("#suggestProduct").click(function() {
			$("#suggestProduct").slideUp(1400);
            $(this).next('#suggestProduct').slideDown('slide', {direction: 'left'}, 1400);
          ;
		});

        $("#suggestProduct").click(function() {
			$("#suggestProduct").slideDown(1400);
            $(this).next('#suggestProduct').slideUp('slide', {direction: 'left'}, 1400);
          ;
		});


	});
</script>

@endsection