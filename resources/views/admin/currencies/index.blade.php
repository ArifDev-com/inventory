@extends('layouts.app')
@section('content')
<div class="page-wrapper">
				<div class="content">
					<div class="page-header">
						<div class="page-title">
							<h4>Currencie List</h4>
							<h6>Manage your Currencies</h6>
						</div>
						<div class="page-btn">
                        <a href="javascript:void(0);" class="btn btn-adds" data-bs-toggle="modal" data-bs-target="#create"><i class="fa fa-plus me-2"></i>Add Currency</a>
							<!-- <a href="addcustomer.html" class="btn btn-added"><img src="{{asset('backend')}}/img/icons/plus.svg" alt="img">Add Currencies</a> -->
						</div>
					</div>
					<!-- /product list -->
					<div class="card">
						<div class="card-body">
							<div class="table-top">
								<div class="search-set">
									<div class="search-path">
										<a class="btn btn-filter" id="filter_search">
											<img src="{{asset('backend')}}/img/icons/filter.svg" alt="img">
											<span><img src="{{asset('backend')}}/img/icons/closes.svg" alt="img"></span>
										</a>
									</div>
									<div class="search-input">
										<a class="btn btn-searchset"><img src="{{asset('backend')}}/img/icons/search-white.svg" alt="img"></a>
									</div>
								</div>
								<div class="wordset">
									<ul>
										<li>
											<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="{{asset('backend')}}/img/icons/pdf.svg" alt="img"></a>
										</li>
										<li>
											<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="{{asset('backend')}}/img/icons/excel.svg" alt="img"></a>
										</li>
										<li>
											<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="{{asset('backend')}}/img/icons/printer.svg" alt="img"></a>
										</li>
									</ul>
								</div>
							</div>
							<!-- /Filter -->
							<div class="card" id="filter_inputs">
								<div class="card-body pb-0">
									<div class="row">
										<div class="col-lg-2 col-sm-6 col-12">
											<div class="form-group">
												<input type="text" placeholder="Enter Customer Code">
											</div>	
										</div>
										<div class="col-lg-2 col-sm-6 col-12">
											<div class="form-group">
												<input type="text" placeholder="Enter Customer Name">
											</div>
										</div>
										<div class="col-lg-2 col-sm-6 col-12">
											<div class="form-group">
												<input type="text" placeholder="Enter Phone Number">
											</div>
										</div>
										<div class="col-lg-2 col-sm-6 col-12">
											<div class="form-group">
												<input type="text" placeholder="Enter Email">
											</div>
										</div>
										<div class="col-lg-1 col-sm-6 col-12  ms-auto">
											<div class="form-group">
												<a class="btn btn-filters ms-auto"><img src="{{asset('backend')}}/img/icons/search-whites.svg" alt="img"></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Filter -->
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>
												<label class="checkboxs">
													<input type="checkbox" id="select-all">
													<span class="checkmarks"></span>
												</label>
											</th>
											<th>Name</th>
											<th>Code</th>
											<th>Symbol</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($currencies as $currency)
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>{{$currency->name}}</td>
											<td>{{$currency->code}}</td>
											<td>{{$currency->symbol}}</td>
											<td>
												<a href="{{route('currency.edit',$currency->id)}}" class="me-3" data-bs-toggle="modal" data-bs-target="#edit">
													<img src="{{asset('backend')}}/img/icons/edit.svg" alt="img">
												</a>
												{{-- <a class="me-3 confirm-text" href="{{route('currency.delete',$currency->id)}}">
													<img src="{{asset('backend')}}/img/icons/delete.svg" alt="img">
												</a> --}}
												<form method="POST" action="{{ route('currency.delete', $currency->id) }}">
													@csrf
													@method('DELETE')
													<button type="submit" class="show_confirm"  data-toggle="tooltip" title='Delete'>
														<img src="{{ asset('backend') }}/img/icons/delete.svg" 
														alt="img">
													</button>
												</form>
											</td>
										</tr>
                                        @endforeach
									</tbody>
								</table>
								{!! $currencies->links() !!}
							</div>
						</div>
					</div>
					<!-- /product list -->
				</div>
			</div>

            <!-- Add Currency Model -->
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
                        <form action="{{route('currency.store')}}" method="POST" >
                        @csrf
						<div class="row">
							<div class="col-lg-12 col-sm-12 col-12">
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name">
								</div>
							</div>
							<div class="col-lg-12 col-sm-12 col-12">
								<div class="form-group">
									<label>Code</label>
									<input type="text" name="code">
								</div>
							</div>
							<div class="col-lg-12 col-sm-12 col-12">
								<div class="form-group">
									<label>Symbol</label>
									<input type="text" name="symbol">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<button type="submit" class="btn btn-submit me-2">Save</button>
							<a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
						</div>
                     </form>
					</div>
				</div>
			</div>
		</div>

            <!-- Edit Currency Model -->
		{{-- <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="edit"  aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						 <h5 class="modal-title" >Edit</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
                        <form action="{{route('currency.update',$currency->id)}}" method="post">
                        @csrf
						<div class="row">
							<div class="col-lg-12 col-sm-12 col-12">
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" value="{{$currency->name}}">
								</div>
							</div>
							<div class="col-lg-12 col-sm-12 col-12">
								<div class="form-group">
									<label>Code</label>
									<input type="text" name="code" value="{{$currency->code}}">
								</div>
							</div>
							<div class="col-lg-12 col-sm-12 col-12">
								<div class="form-group">
									<label>Symbol</label>
									<input type="text" name="symbol" value="{{$currency->symbol}}">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<button type="submit" class="btn btn-submit me-2">Update</button>
							<a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
						</div>
                     </form>
					</div>
				</div>
			</div>
		</div> --}}
        @endsection