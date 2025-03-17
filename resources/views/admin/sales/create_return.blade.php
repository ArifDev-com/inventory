@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Return  Sale</h4>
                <h6>return your sale </h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('sale.update',$sale->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Customer</label>
                            <div class="row">
                                <div class="col-lg-10 col-sm-10 col-10">
                                    <select class="select" name="customer_id">
                                        <option>Choose customer</option>
                                        @foreach ($customers as $customer)                            
                                        <option value="{{ $customer->id }}" {{ $customer->id == $sale->customer_id ? "selected":"" }}>{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Sale Date</label>
                            <div class="input-groupicon">
                                <input type="date" name="date" value="{{ $sale->date }}">
                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Warehouse</label>
                            <select class="select" name="warehouse_id">
                                @foreach ($warehouses as $warehouse)                            
                                <option value="{{ $warehouse->id }}" {{ $warehouse->id == $sale->warehouse_id ? "selected":"" }}>{{ $warehouse->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
 
                <div class="row">
                    <div class="table-responsive mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>QTY</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Tax</th>
                                    <th class="text-end">Subtotal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach ($sale->items as $item)
                                <tr>
                                    <input type="hidden" name="product_id[]"  class="form-control product_id"  value="{{ $item->product->id }}">

                                    <td>1</td>
                                    <td class="productimgname">
                                        <a class="product-img">
                                            <img src="{{ asset($item->product->image) }}" alt="product">
                                        </a>
                                        <a href="javascript:void(0);">{{ $item->product->name }}</a>
                                    </td>
                                    <td>
                                    <input type="text" name="quantity[]" class="form-control quantity"  placeholder="quantity" value="0" style="width:100px;">
                                    </td>
                                    <td class="price">{{ $item->product->price }}</td>
                                    <td class="inline_discount">{{ $item->product->discount}}</td>
                                    <td class="inline_tax">{{ $item->product->tax }}</td>
                                    <td class="text-end">
                                        <input type="text"  class="inline_total"  name="sub_total[]" value="{{ $item->sub_total }}" style="width:100px;">
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="delete-set"><img src="{{asset('backend')}}/img/icons/delete.svg" alt="svg"></a>
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
                                <li>
                                    <h4>Order Tax</h4>
                                    <h5 id="tax_amount">$ 0.00 <span id="tax_percent">(0.00%)</span></h5>
                                </li>
                                <li>
                                    <h4>Discount</h4>
                                    <h5 id="discount">$ 0.00</h5>
                                </li>	
                                <li>
                                    <h4>Shipping</h4>
                                    <h5 id="shipping">$ 0.00</h5>
                                </li>
                                <li class="total">
                                    <h4>Grand Total</h4>
                                    <input type="text" readonly class="total_val" name="grand_total" value="{{$sale->grandtotal}}" style="margin-left:30px;">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Order Tax</label>
                            <input type="text" name="tax" value="{{ $sale->tax }}"  id="tax_val">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Discount</label>
                            <input type="text" name="discount" value="{{ $sale->discount }}" id="discount_val">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Shipping</label>
                            <input type="text" name="shipping" value="{{ $sale->shipping }}"  id="shipping_val">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Payment Status</label>
                            <select class="select" name="payment_status" >
                                <option>Choose Payment Status</option>
                                <option value="paid" {{ $sale->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="unpaid" {{ $sale->payment_status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Payment Type</label>
                            <select class="select" name="payment_type" >
                                <option>Choose Payment Type</option>
                                <option value="cash" {{ $sale->payment_type == 'cash' ? 'selected' : '' }}>Cash</option>
                                <option value="card" {{ $sale->payment_type == 'card' ? 'selected' : '' }}>Card</option>
                                <option value="online" {{ $sale->payment_type == 'online' ? 'selected' : '' }}>Online</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Paid Amount</label>
                            <input type="text" value="{{ $sale->paid_amount }}" name="paid_amount" class="paid_amount" >
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Due Amount</label>
                            <input type="text" value="{{ $sale->due_amount }}" name="due_amount" readonly class="due_amount" >
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Reference</label>
                            <input type="text" name="ref_code" value="{{ $sale->ref_code }}">
                        </div>
                    </div>
                   
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Note</label>
                            <textarea class="form-control" name="note">{{ $sale->note }}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Update</button>
                        <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
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
     
   });

    // when qty will increment or drecrement.. it will be call automically
	$("table tbody").delegate(".quantity", "keyup",function(){
	var tr = $(this).parent().parent();
	var qty = tr.find('.quantity').val();
	var price = tr.find('.price').text();
	var totalAmount = price * qty;
    var inlineDiscont = tr.find('.inline_discount').text();
    var inlinetax = tr.find('.inline_tax').text();
    
	var discountAmount =  ( totalAmount -  (parseInt(totalAmount) * parseInt(inlineDiscont)) /100)

	var inlineSubTotal =  ( discountAmount +  (parseInt(discountAmount) * parseInt(inlinetax)) /100)

	tr.find('.inline_total').val(inlineSubTotal);


	});

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

   //Discount
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

@endsection