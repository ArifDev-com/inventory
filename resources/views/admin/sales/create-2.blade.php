@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>



<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>{{ trans('sidebar.sale.create.add sale') }}</h4>
                <h6>{{ trans('sidebar.sale.create.add your new sale') }}</h6>
            </div>
            <a href="{{ route('sale.index') }}" class="btn btn-info">{{ trans('sidebar.sale.create.back') }}</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('sale.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>{{ trans('form.sale.customer') }}</label>
                            <div class="row">
                                <div class="col-lg-10 col-sm-10 col-10">
                                    <select class="select2" id="selectpicker" name="customer_id">
                                        {{-- <option>{{ trans('form.sale.choose customer') }}</option> --}}
                                        @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                    <div class="add-icon">
                                        <span><img src="{{asset('backend')}}/img/icons/plus1.svg" data-bs-toggle="modal"
                                                data-bs-target="#create" alt="img"></span>
                                        {{-- <a href="javascript:void(0);" class="btn btn-adds" data-bs-toggle="modal"
                                            data-bs-target="#create"><i class="fa fa-plus me-2"></i></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>{{ trans('form.sale.sale date') }}</label>
                            <div class="input-groupicon">
                                <input type="date" class="form-control" name="date" placeholder="Choose Date"
                                    value="<?php echo date(" Y-m-d");?>" >
                                {{-- <a class="addonset">
                                    <img src="{{asset('backend')}}/img/icons/calendars.svg" alt="img">
                                </a> --}}
                            </div>
                        </div>
                    </div>


                    @php
                    $randNumber = rand(1000,100000);
                    @endphp

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Invoice No</label>
                            <input type="text" name="ref_code" placeholder="{{ trans('form.sale.enter reference') }}"
                                value="<?php echo $randNumber; ?>">
                        </div>
                    </div>

                    <div class="col-lg-12 col-sm-6 col-12">
                        <div class="form-group">
                            <label>{{ trans('form.sale.product name') }}</label>
                            <div class="input-groupicon">

                                <input type="text" id="search" placeholder="Please type product code and select..."
                                    autocomplete="off">
                                <div class="addonset">
                                    <img src="{{asset('backend')}}/img/icons/scanners.svg" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="suggestProduct"></div>
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

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 float-md-right">
                        <div class="total-order">
                            <ul>

                                <li>
                                    <h4>{{ trans('form.sale.discount') }}</h4>
                                    <h5 id="discount">৳ 0.00</h5>
                                </li>

                                <li class="total">
                                    <h4>{{ trans('form.sale.grand total') }}</h4>
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
                            <label>{{ trans('form.sale.order tax') }} %</label>
                            <input type="text" name="tax" value="0" id="tax_val">
                        </div>
                    </div> --}}

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Discount Amount <code>(Optional)</code></label>
                            <input type="text" name="discount" class="discount" id="discount_val" min="1"
                                placeholder="Enter Your Discount " placeholder="must type your discount amount">
                        </div>
                    </div>


                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>{{ trans('form.sale.payment type') }}</label>
                            <select class="select2" name="payment_type" required="true">

                                <option value="cash">Cash</option>
                                <option value="bkash">bKash</option>
                                <option value="rocket">Rocket</option>
                                <option value="nagad">Nagad</option>

                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>{{ trans('form.sale.paid amount') }}</label>
                            <input type="text" name="paid_amount" class="paid_amount"
                                placeholder="{{ trans('form.sale.enter paid amount') }}" required>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>{{ trans('form.sale.due amount') }}</label>
                            <input type="text" name="due_amount" class="due_amount" value="0">
                        </div>
                    </div>





                    <div class="row">







                    </div>

                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <tr>

                                        <th>EMI Amount</th>
                                        <th>EMI Date</th>

                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" name="inputs[0][emi_amount]">
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-group">
                                                <input type="date" name="inputs[0][emi_date]" class="form-control">
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-group">
                                                <button type="button" name="add" id="add" class="btn btn-success">Add
                                                    More</button>
                                            </div>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>



                        </div>
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
                        <a href="" class="btn btn-cancel">{{ trans('form.sale.cancel') }}</a>
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
                                    <option>Choose Country</option>
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
                                    <option>Choose City</option>
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
                        <div class="col-lg-6 col-sm-12 col-12 d-none">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" value="<?php echo date(" Y-m-d");?>">
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
		var route = "{{route('find.products.purchase')}}";
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

						<td class="productimgname">

						<a href="javascript:void(0);">${product.name}</a>-<a href="javascript:void(0);">${product.product_code}</a>
					   </td>

                        <td >${product.quantity}</td>



						<td>
						<input type="text" name="quantity[]" class="form-control quantity"  placeholder="quantity" value="1" style="width:100px;" >
						</td>

                        <input type="hidden" name="purchase_price[]" class="purchase_price" value="${product.price}" style="width:100px;">



                        <td>
                <input type="text" name="price[]" class="form-control price"  placeholder="price" value="${product.price}" style="width:100px;" >
                </td>

						<td class="text-end" >
                        <input type="text" class="inline_total" readonly name="sub_total[]" value="${product.price}" style="width:100px;">
                        </td>
						<td>
							<a class="remove"><img src="{{asset('backend')}}/img/icons/delete.svg" alt="svg"></a>
						</td>
					</tr>`

		$('.table .tbody').append(htmldata);

        updateGrandTotal();

		// subTotalAmount();

	}

	 //delete row
	 $("table tbody").delegate(".remove", "click",function(){
       $(this).parent().parent().remove();

  });


// when qty will increment or drecrement.. it will be call automically

$("table tbody").delegate(".quantity", "keyup", function() {
            var tr = $(this).parent().parent();
            var qty = tr.find('.quantity').val();
            var price = tr.find('.price').val();
            var totalAmount = price * qty;


            tr.find('.inline_total').val(totalAmount);
            updateGrandTotal();


        });

        $("table tbody").delegate(".price", "keyup", function() {
            var tr = $(this).parent().parent();
            var qty = tr.find('.quantity').val();
            var price = tr.find('.price').val();
            var totalAmount = price * qty;


            tr.find('.inline_total').val(totalAmount);
            updateGrandTotal();


        });

        function updateGrandTotal() {

var total = 0;
$('.inline_total').each(function(i, e) {
    var inlineTotal = $(this).val() - 0;
    total += inlineTotal;
    console.log(i);
    console.log(e);
});
var formattedTotal = total.toFixed(0); // Fixed a typo: 'num' should be 'total'

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

   //discount
//    $('#discount_val').keyup(function () {

// var total = 0;
// 		$('.inline_total').each(function (i, e) {
// 			var inlineTotal = $(this).val() - 0;
// 			total += inlineTotal;
// 		});


// 	var discount =  $(this).val();
// 	var taxPercent =  $('#tax_val').val();
// 	var shipping =  $('#shipping_val').val();
// 	var t = parseInt(total)  - parseInt(discount);
// 	var grandTotal = t + parseInt(shipping);
// 	var finalTotal = grandTotal + ((grandTotal * parseInt(taxPercent)) /100)



// 	// var grandtotal = total - discount;
// 	$('.total_val').val(finalTotal);
// 	$('#discount').text(discount);

// });


  //discount Customs
   $('#discount_val').keyup(function () {

var total = 0;
		$('.inline_total').each(function (i, e) {
			var inlineTotal = $(this).val() - 0;
			total += inlineTotal;
		});


	var discount =  $(this).val() || 0;

	var t = parseInt(total)  - parseInt(discount) || 0;

	$('.total_val').val(t);
	$('#discount').text(discount);

});


    ///paid_amount and due amount calculation
    $('.paid_amount').keyup(function () {
      var paidAmount =   $(this).val();
      var grandTotal =   $('.total_val').val() || 0;
      var dueAmount =grandTotal  - paidAmount || 0;


     $('.discount').val(dueAmount);

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

<script>
    var i = 0;
                $('#add').click(function(){
                    ++i;
                    $('#table').append(
                        `<tr>
                            <td>


                                <div class="form-group">
                                <input type="text" name="inputs[`+i+`][emi_amount]" required >
                            </div>

                            </td>

                            <td>



                                <div class="form-group">
                                <input type="date" name="inputs[`+i+`][emi_date]"   class="form-control" required>
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

                $(document).on('click','.remove-table-row',function(){
                    $(this).parents('tr').remove();
                })
</script>

@endsection