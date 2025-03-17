@extends('layouts.app')
@section('content')
<div class="page-wrapper">
				<div class="content">
					<div class="page-header">
						<div class="page-title">
							<h4>{{ trans('sidebar.adjustment.create.adjustment add') }}</h4>
							<h6>{{ trans('sidebar.adjustment.create.add/update adjustment') }}</h6>
						</div>
						<a href="{{ route('adjustment.index') }}" class="btn btn-info" >Back</a>
					</div>
					<div class="card">
						<div class="card-body">
						 <form action="{{ route('adjustment.store') }}" method="post" id="commentForm" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-lg-3 col-sm-6 col-12">
									<div class="form-group">
										<label>{{ trans('form.adjustment.warehouse name') }}</label>
										<div class="row">
											<div class="col-lg-10 col-sm-10 col-10">
												<select class="select" name="warehouse_id">
												<option>{{ trans('form.adjustment.select warehouse') }}</option>
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
										<label> {{ trans('form.adjustment.adjustment date') }} </label>
										<div class="input-groupicon">
											<input type="date" name="date" placeholder="DD-MM-YYYY" date="date" required >
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-sm-6 col-12">
									<div class="form-group">
										<label> {{ trans('form.adjustment.referance') }} </label>
										<div class="input-groupicon">
											<input type="text" name="ref_code" placeholder="{{ trans('form.adjustment.enter referance') }}" >
										</div>
									</div>
								</div>
                                <div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>{{ trans('form.adjustment.status') }}</label>
											<select class="select" name="status">
												<option>{{ trans('form.adjustment.choose status') }}</option>
												<option value="addition">Addition</option>
												<option value="buy">Buy</option>
											</select>
										</div>
									</div>
								<div class="col-lg-12 col-sm-6 col-12">
									<div class="form-group">
										<label>{{ trans('form.adjustment.product name') }}</label>
										<div class="input-groupicon">
											<input type="text"  id="search" 
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
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>{{ trans('form.adjustment.product name') }}</th>
												<th>{{ trans('form.adjustment.qty') }}</th>
												<th>{{ trans('form.adjustment.purchase price($)') }} </th>
												<th class="text-end">{{ trans('form.adjustment.stock') }}</th>	</th>
												<th>{{ trans('form.adjustment.action') }}</th>
											</tr>
										</thead>
										<tbody>
											
										</tbody>
									</table>
								</div>
							</div>
								<div class="col-lg-12">
									<button type="submit" class="btn btn-submit me-2">{{ trans('form.adjustment.save') }}</button>
									<a href="purchaselist.html" class="btn btn-cancel">{{ trans('form.adjustment.cancel') }}</a>
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
		
						      <td class="productimgname">
									<a class="product-img">
									<img src="/${product.image}" alt="product">
									</a>
								    <a href="javascript:void(0);">${product.name}</a>
							   </td>
								<td>
								<input type="text" name="quantity[]" class="form-control quantity"  placeholder="quantity" value="0" style="width:100px;">
								</td>
								<td>${product.purchase_price}</td>
								<td class="text-end">${product.quantity}</td>
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
		
			var qty = tr.find('.quantity').val();

			});
	
			</script>

		<script>
		$("#commentForm").validate();
		</script>
		

	@endsection