@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Purchase Add</h4>
                <h6>Add/Update Purchase</h6>
            </div>
            <a href="{{ route('purchase.index') }}" class="btn btn-info">Back</a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('purchase.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Supplier Name</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <select class="select2" id="selectpicker" name="supplier_id">
                                            {{-- <option>Select Supplier</option> --}}
                                            @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                        <div class="add-icon">
                                            <span><img src="{{asset('backend')}}/img/icons/plus1.svg"
                                                    data-bs-toggle="modal" data-bs-target="#create" alt="img"></span>
                                            {{-- <a href="javascript:void(0);" class="btn btn-adds"
                                                data-bs-toggle="modal" data-bs-target="#create"><i
                                                    class="fa fa-plus me-2"></i></a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Purchase Date </label>
                                <div class="input-groupicon">
                                    <input type="date" name="date" class="form-control" placeholder="Choose Date"
                                        value="<?php echo date("Y-m-d");?>" >
                                </div>
                            </div>
                        </div>

                        @php
                        $randNumber = rand(1000,100000);
                        @endphp

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Invoice No</label>
                                <input type="text" name="purchase_code" value="<?php echo $randNumber; ?>" required>
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Product Name</label>
                                <div class="input-groupicon">
                                    <input type="text" id="search"
                                        placeholder="Scan/Search Product by code and select..." autocomplete="off">
                                    <div class="addonset">
                                        <img src="{{asset('backend')}}/img/icons/scanners.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="suggestProduct"></div>
                    </div>

                    <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Stock</th>
                                        <th>QTY</th>
                                        <th>Purchase Price(৳) </th>
                                        <th class="d-none">Discount(৳) </th>
                                        <th class="d-none">Tax %</th>

                                        <th class="text-end">Total Cost (৳) </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 float-md-right">
                            <div class="total-order">
                                <ul>

                                    <li>
                                        <h4>Discount</h4>
                                        <h5 id="discount">৳ 0.00</h5>
                                    </li>

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

                        <div class="col-lg-3 col-sm-6 col-12 d-none">
                            <div class="form-group">
                                <label>Order Tax</label>
                                <input type="text" name="tax" value="00" id="tax_val">
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Discount Amount <code>(optional)</code></label>
                                <input type="text" name="discount" id="discount_val" min="1"
                                    placeholder="Enter Your Discount *" placeholder="must type your discount amount">
                            </div>
                        </div>


                        <div class="col-lg-3 col-sm-6 col-12 d-none">
                            <div class="form-group">
                                <label>Shipping</label>
                                <input type="text" name="shipping" value="00" id="shipping_val">
                            </div>
                        </div>





                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Paid Amount <code>*</code></label>
                                <input type="text" name="paid_amount" class="paid_amount"
                                    placeholder="Enter Paid Amount *" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Due Amount</label>
                                <input type="text" name="due_amount" readonly class="due_amount" required>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Note</label>
                                <textarea class="form-control" name="note"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Save</button>
                            <a href="" class="btn btn-cancel">Cancel</a>
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
                <form action="{{ route('supplier.store.modal') }}" method="post">
                    @csrf
                    <div class="row">

                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Supplier Name</label>
                                <input type="text" name="name">
                            </div>
                        </div>

                        {{-- <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Brand</label>
                                <select class="select" name="brand_id">
                                    <option value="">Default</option>
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone">
                            </div>
                        </div>

                        {{-- <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Country</label>
                                <select class="select" name="country_id">
                                    <option value="">Default</option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                        {{-- <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>City</label>
                                <select class="select" name="city_id">
                                    <option value="">Default</option>
                                    @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                        <a href="" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    $("body").on("keyup","#search", function(){
				let searchData = $("#search").val();
				let token = "{{ csrf_token() }}";
				var route = "{{route('find.products')}}";
				if(searchData.length > 0){
					$.ajax({
						type:'GET',
						url: route,
						data:{
							search:searchData,
							// _token:token,
						},
						success:function(result){
							$('#suggestProduct').html(result)
						}
					});
				}
				if(searchData.length < 1) $('#suggestProduct').html(" ");
			})


			function testClick(product){

                var htmldata = `<tr>
						<input type="hidden" name="product_id[]"  class="form-control product_id"  value="${product.id}">

						<td class="productimgname">

						<a href="javascript:void(0);">${product.name}</a>-<a href="javascript:void(0);">${product.product_code}</a>
					   </td>

                        <td >${product.quantity}</td>



						<td>
						<input type="text" name="quantity[]" class="form-control quantity"  placeholder="quantity" value="1" style="width:100px;" >
						</td>

                        <input type="hidden" name="purchase_price[]" class="purchase_price" value="${product.price}" style="width:100px;">



                        <td class="price_td" mrp="${product.price}" retail="${product.retail_price}" purchase="${product.purchase_price}" wholesale="${product.wholesale_price}">
                            <input type="text" name="price[]" class="form-control price"  placeholder="price" value="${product.price}" style="width:100px;"
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
                            <input type="text" class="inline_total" readonly name="sub_total[]" value="${product.price}" style="width:100px;">
                        </td>
						<td>
							<a class="remove"><img src="{{ asset('backend') }}/img/icons/delete.svg" alt="svg"></a>
						</td>
					</tr>`;

				$('table tbody').append(htmldata);
				updateGrandTotal();
			}

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
			// var inlineDiscont = tr.find('.inline_discount').text();
			// var inlinetax = tr.find('.inline_tax').text();


			// var discountAmount =  ( totalAmount -  (parseInt(totalAmount) * parseInt(inlineDiscont)) /100)

			// var inlineSubTotal =  ( discountAmount +  (parseInt(discountAmount) * parseInt(inlinetax)) /100)

			// tr.find('.inline_total').val(inlineSubTotal);
			tr.find('.inline_total').val(totalAmount);
			updateGrandTotal();

			});

			 //Grand Total
	// 		 function updateGrandTotal() {

	// 	   var total = 0;
	// 	   $('.inline_total').each(function(i, e) {
	// 		   var inlineTotal = $(this).val() - 0;
	// 		   total += inlineTotal;

	// 	   });

	// 	   $('.total_val').val(total.toFixed(0));
	//    }
    function totalOfSubTotal(tr) {
            var qty = tr.find(".quantity").val();
            var price = tr.find(".price").val();
            var totalAmount = price * qty;
            tr.find(".inline_total").val(totalAmount);
            updateGrandTotal();
        }
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
        var formattedTotal = total.toFixed(0);
        $(".total_val").val(formattedTotal);
    }


		  //tax
		  $('#tax_val').keyup(function () {

			var total = 0;
					$('.inline_total').each(function (i, e) {
						var inlineTotal = $(this).val() - 0;
						total += inlineTotal;
					});


				var taxPercent =  $(this).val();
				var discount =  $('#discount_val').val() || 0;
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

		    //discount Customs
   $('#discount_val').keyup(function () {

var total = 0;
		$('.inline_total').each(function (i, e) {
			var inlineTotal = $(this).val() - 0;
			total += inlineTotal;
		});


	var discount =  $(this).val() || 0;
	// var taxPercent =  $('#tax_val').val();
	// var shipping =  $('#shipping_val').val();
	var t = parseInt(total)  - parseInt(discount);
	// var grandTotal = t + parseInt(shipping);
	// var finalTotal = grandTotal + ((grandTotal * parseInt(taxPercent)) /100)



	// var grandtotal = total - discount;
	$('.total_val').val(t);
	$('#discount').text(discount);

});

		//Paid
		// $('.paid_amount').keyup(function () {

		// var total = 0;
		// 		$('.inline_total').each(function (i, e) {
		// 			var inlineTotal = $(this).val() - 0;
		// 			total += inlineTotal;
		// 		});


		// 	var discount =  $(this).val();
		// 	var taxPercent =  $('#tax_val').val();
		// 	var shipping =  $('#shipping_val').val();
		// 	var t = parseInt(total) ;
		// 	var grandTotal = t + parseInt(shipping);
		// 	//var finalTotal = grandTotal + ((grandTotal * parseInt(taxPercent)) /100);
		// 	var finalTotal = grandTotal ;


		// 	// var grandtotal = total - discount;
		// 	$('.total_val').val(finalTotal);
		// 	//$('#discount').text(discount);

		// });



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




			///paid_amount and due amount calculation
			$('.paid_amount').keyup(function () {
			  var paidAmount =   $(this).val();
			  var grandTotal =   $('.total_val').val();
			  var dueAmount =grandTotal  - paidAmount;

			 $('.due_amount').val(dueAmount);

		});

</script>

<script>
    $(document).ready(function () {
  $(".select2").select2();
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