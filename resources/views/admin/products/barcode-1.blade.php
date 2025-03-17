@extends('layouts.app')

<style>
    @page { size: auto;  margin: 0mm; }

    .list-group-item:last-child {
        margin-top: 10px!important;
    }
    </style>
    
@section('content')

{{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> --}}

    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>{{ trans('sidebar.product.barcode.print_barcode') }}</h4>
                    <h6>{{ trans('sidebar.product.barcode.print_product_barcodes') }}</h6>
                </div>
            </div>
            <!-- /add -->
            <div class="card">
                <div class="card-body">
                    <div class="requiredfield">
                        <h4>{{ trans('table.barcode.the field labels marked with * are required input fields.') }}</h4>
                    </div>
                    <div class="form-group">
                        <label>{{ trans('table.barcode.product name') }}</label>
                        <div class="input-groupicon">
                            <input type="text" id="search" placeholder="{{ trans('table.barcode.please type product code and select...') }}">
                            <div class="addonset">
                                <img src="{{ asset('backend') }}/img/icons/scanners.svg" alt="img">
                            </div>
                        </div>
                        <div id="suggestProduct"></div>
                        {{-- <div id="suggestPackage"></div> --}}
                    </div>

                    <div class="table-responsive mt-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ trans('table.barcode.name') }}</th>
                                    {{-- <th>{{ trans('table.barcode.sku') }}</th> --}}
                                    <th>Product Code</th>
                                    <th>{{ trans('table.barcode.qty') }}</th>
                                    <th>{{ trans('table.barcode.action') }}</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                <tr>
                                    <td>Macbook pro</td>
                                    <td>PT001</td>
                                    <td>100.00</td>
                                    <td class="text-end">
                                        <a class="delete-set"><img src="{{ asset('backend') }}/img/icons/delete.svg"
                                                alt="img"></a>
                                    </td>
                                </tr>
                            </tbody> --}}
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>{{ trans('table.barcode.paper size') }}</label>
                                <select class="select">
                                    <option>36mm (1.4 inch)</option>
                                    <option>12mm (1 inch)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2 barcode_submit" >{{ trans('table.barcode.submit') }}</button>
                            <a href="" class="btn btn-cancel">{{ trans('table.barcode.cancel') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /add -->

            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-submit mb-3" onclick="printDiv('barcodeImg')">{{ trans('table.barcode.print') }}</button>
                    <div class="row" id="barcodeImg">
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
            
            {{-- <a href="{{ route('barcode.pdf') }}" class="btn btn-info" >Print</a> --}}
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
		console.log(product);
	
			var htmldata =`<tr>
						<input type="hidden"   class="form-control barcode_url"  value="${product.barcode_url}">

                       
                            <input type="hidden" name="price[]" class="form-control price"  placeholder="Quantity here" value="${product.price}" style="width:200px;">

                            <input type="hidden" name="name[]" class="form-control name"  placeholder="Quantity here" value="${product.name}" style="width:200px;">
					   

						<td>
						<a href="javascript:void(0);">${product.name}</a>
					   </td>
						<td class="price">${product.product_code}</td>
						<td>
						<input type="text" name="quantity[]" class="form-control quantity"  placeholder="Quantity here" value="1" style="width:200px;">
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
       subTotalAmount();
       grandTotal();
  });

  //barcode show
  $('.barcode_submit').click(function (e) { 
    e.preventDefault();

   var barcodeUrl =  $('.barcode_url').val();
   var quantity =  $('.quantity').val();
   var price =  $('.price').val();
   var name =  $('.name').val();


   for(var i = 0; i < quantity; i++) {
                             
                     $('#barcodeImg').append(`<div class="col-md-3" style="padding: 10px; border: 1px solid #adadad;" align="center">
                        <h5>${name}</h5>
                            <img src="/${barcodeUrl}" alt="">
                            <p>PRICE - ${price}</p>
                           
                        </div>`);

                    }

  }); 
  
// barcode print
  $('a.printPage').click(function(){
           window.print();
           return false;
});


    function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }

	</script>

<script>

$(document).ready(function() {

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