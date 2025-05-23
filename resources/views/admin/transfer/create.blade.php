@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>ADD Transfer</h4>
                <h6>Transfer your stocks to one store another store.</h6>
            </div>
            <a href="{{ route('transfer.index') }}" class="btn btn-info">Back</a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('transfer.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Date </label>
                                <div class="input-groupicon">
                                    <input type="date" class="form-control" name="date" value="<?php echo date("
                                        Y-m-d");?>">
                                    {{-- <div class="addonset">
                                        <img src="{{asset('backend')}}/img/icons/calendars.svg" alt="img">
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>From Warehouse</label>
                                <select class="select2" name="from_warehouse_id">
                                    {{-- <option>Choose Warehouse</option> --}}
                                    @foreach ($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>To Warehouse</label>
                                <select class="select2" name="to_warehouse_id">
                                    {{-- <option>Choose Warehouse</option> --}}
                                    @foreach ($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @php
                        $randNumber = rand(1000,100000);
                        @endphp

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Reference No.</label>
                                <input type="text" name="ref_code" value="<?php echo $randNumber; ?>">
                            </div>
                        </div>


                        <div class="col-lg-12 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Product Name</label>
                                <div class="input-groupicon">
                                    <input type="text" id="search"
                                        placeholder="Scan/Search Product by code and select...">
                                    <div class="addonset">
                                        <img src="{{asset('backend')}}/img/icons/scanners.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="suggestProduct"></div>
                    </div>
                    <div class="row">
                        <div class="table-responsive ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Stock </th>
                                        <th>QTY</th>
                                        <th>Price</th>
                                        {{-- <th>Discount</th>
                                        <th>Tax </th> --}}
                                        <th class="text-end">Total Cost (৳)</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>

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
                                        <h4>Order Tax</h4>
                                        <h5 id="tax_amount">৳ 0.00 <span id="tax_percent">(0.00%)</span></h5>
                                    </li>
                                    <li>
                                        <h4>Discount </h4>
                                        <h5 id="discount">৳ 0.00</h5>
                                    </li>
                                    <li>
                                        <h4>Shipping</h4>
                                        <h5 id="shipping">৳ 0.00</h5>
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

                        {{-- <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Order Tax</label>
                                <input type="text" name="tax" id="tax_val">
                            </div>
                        </div> --}}

                        {{-- <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Discount</label>
                                <input type="text" name="discount" value="00" id="discount_val" min="1">
                            </div>
                        </div> --}}

                        {{-- <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Shipping</label>
                                <input type="text" name="shipping" value="00" id="shipping_val">
                            </div>
                        </div> --}}






                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Item Qty <code>*</code></label>
                                <input type="text" name="item" class="item" placeholder="Enter your total qty" required>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="select2" name="status">
                                    {{-- <option>Choose Status</option> --}}
                                    <option value="completed">Completed</option>
                                    <option value="pending">Pending</option>
                                </select>
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



            var htmldata =`<tr>
                        <input type="hidden" name="product_id[]"  class="form-control product_id"  value="${product.id}">

                        <td class="productimgname" >

                        <a href="javascript:void(0);">${product.name}</a>
                       </td>
                       <td>${product.quantity}</td>
                        <td>
                        <input type="text" name="quantity[]" class="form-control quantity"  placeholder="quantity" value="1" style="width:100px;">
                        </td>
                        <td class="price">${product.price}</td>

                        <td class="text-end" >
                        <input type="text" readonly class="inline_total" name="sub_total[]" value="${product.price}" style="width:100px;">
                        </td>

                        <td class="text-end" >
                        <input type="hidden" readonly class="" name="product_name[]" value="${product.name}" style="width:100px;">
                        </td>

                        <td class="text-end" >
                        <input type="hidden" readonly class="" name="barcode[]" value="${product.barcode_url}" style="width:100px;">
                        </td>

                        <td class="text-end" >
                        <input type="hidden" readonly class="" name="purchase_price[]" value="${product.purchase_price}" style="width:100px;">
                        </td>

                        <td class="text-end" >
                        <input type="hidden" readonly class="" name="mrp_price[]" value="${product.price}" style="width:100px;">
                        </td>



                        <td class="text-end" >

                        <input type="text"  class="" name="category[]" value="${product.category_id}" style="width:100px;">


                        </td>

                        <td class="text-end" >

                           <input type="text"  class="" name="subCategory_id[]" value="${product.subCategory_id}" style="width:100px;">


                           </td>

                           <td class="text-end" >

                           <input type="text"  class="" name="brand_id[]" value="${product.brand_id}" style="width:100px;">


                           </td>

                           <td class="text-end" >

                           <input type="text"  class="" name="unit_id[]" value="${product.unit_id}" style="width:100px;">


                           </td>






                        <td class="text-end" >

                           <input type="hidden" readonly class="" name="supplier_id[]" value="${product.supplier_id}" style="width:100px;">

                        </td>

                        <td class="text-end" >

                           <input type="hidden" readonly class="" name="product_code[]" value="${product.product_code}" style="width:100px;">

                        </td>

                        <td>
                            <a class="remove"><img src="{{asset('backend')}}/img/icons/delete.svg" alt="svg"></a>
                        </td>
                    </tr>`

        $('table tbody').append(htmldata);


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

    tr.find('.inline_total').val(totalAmount);


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

     //Paid
		$('.item').keyup(function () {

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
