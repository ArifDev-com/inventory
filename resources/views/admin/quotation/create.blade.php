@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Quotation Add</h4>
                <h6>Add/Update Quotation</h6>
            </div>
            <a href="{{ route('quotation.index') }}" class="btn btn-info" >Back</a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('quotation.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Customer Name</label>
                            <div class="row">
                                <div class="col-lg-10 col-sm-10 col-10">
                                    <select class="select" name="customer_id">
                                        <option>Select Customer</option>
                                        @foreach ($customers as $customer)                            
                                         <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                         @endforeach   
                                    </select>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                    <div class="add-icon">
                                        <span><img src="{{asset('backend')}}/img/icons/plus1.svg" data-bs-toggle="modal" data-bs-target="#create" alt="img"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Warehouse Name</label>
                            <div class="row">
                                <div class="col-lg-10 col-sm-10 col-10">
                                    <select class="select" name="warehouse_id">
                                        <option>Select Warehouse</option>
                                        @foreach ($warehouses as $warehouse)                            
                                         <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                         @endforeach   
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Quotation Date </label>
                            <div class="input-groupicon">
                                <input type="date" name="date" placeholder="DD-MM-YYYY" >
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Reference No.</label>
                            <input type="text" name="ref_code">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Product Name</label>
                            <div class="input-groupicon">
                                <input type="text" id="search" placeholder="Scan/Search Product by code and select...">
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
                                    <th>Product</th>
                                    <th>Net Unit Price($)	</th>
                                    <th>Stock</th>
                                    <th>Qty</th>
                                    <th>Discount($)	</th>
                                    <th>Tax %	</th>
                                    <th class="text-end">Subtotal ($)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                           
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-12 float-md-right">
                        <div class="total-order">
                            <ul>
                                <li>
                                    <h4>Order Tax</h4>
                                    <h5 id="tax_amount">$ 0.00 <span id="tax_percent">(0.00%)</span></h5>
                                </li>
                                <li>
                                    <h4>Discount	</h4>
                                    <h5 id="discount">$ 0.00</h5>
                                </li>	
                                <li>
                                    <h4>Shipping</h4>
                                    <h5 id="shipping">$ 0.00</h5>
                                </li>
                                <li class="total">
                                    <h4>Grand Total</h4>
                                    <input type="text" readonly class="total_val" name="grand_total" style="margin-left:30px;">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Order Tax</label>
                            <input type="text" name="tax" id="tax_val">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Discount</label>
                            <input type="text" name="discount" value="00" id="discount_val" min="1">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Shipping</label>
                            <input type="text" name="shipping" value="00" id="shipping_val">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="select" name="status">
                                <option>Choose Status</option>
                                <option value="pending">Pending</option>
                                <option value="sent">Sent</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Note</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                        <a href="quotationList.html"  class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>


{{-- modal here --}}
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="create"  aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                 <h5 class="modal-title" >Create</h5>
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
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Country</label>
                            <select class="select" name="country_id">
                                <option>Choose Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>City</label>
                            <select class="select" name="city_id">
                                <option>Choose City</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" name="dob">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-submit me-2">Submit</button>
                    <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
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
    
            var htmldata =`<tr>
                        <input type="hidden" name="product_id[]"  class="form-control product_id"  value="${product.id}">

                        <td class="productimgname">
                            <a class="product-img">
                            <img src="/${product.image}" alt="product">
                            </a>
                        <a href="javascript:void(0);">${product.name}</a>
                       </td>
                        <td class="price">${product.price}</td>
                        <td>${product.quantity}</td>
                        <td>
                        <input type="text" name="quantity[]" class="form-control quantity"  placeholder="quantity" value="0" style="width:100px;">
                        </td>
                        <td class="inline_discount">${product.discount}</td>
                        <td class="inline_tax">${product.tax}</td>
                        <td class="text-end" >
                        <input type="text" readonly class="inline_total" name="sub_total[]" value="00" style="width:100px;">
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

    ///paid_amount and due amount calculation
    $('.paid_amount').keyup(function () { 
      var paidAmount =   $(this).val();
      var grandTotal =   $('.total_val').val();
      var dueAmount =grandTotal  - paidAmount;

     $('.due_amount').val(dueAmount);

});

</script>


@endsection