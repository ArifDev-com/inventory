@extends('layouts.app')
@section('content')

				@php 

$carbonToDay =  Carbon\Carbon::today();
$cash_amount = App\Models\Sale::whereDate('created_at', $carbonToDay)->where('payment_type','cash')->sum('paid_amount');
$card_amount = App\Models\Sale::whereDate('created_at', $carbonToDay)->where('payment_type','card')->sum('paid_amount');
$online_amount = App\Models\Sale::whereDate('created_at', $carbonToDay)->where('payment_type','online')->sum('paid_amount');
$bkash_amount = App\Models\Sale::whereDate('created_at', $carbonToDay)->where('payment_type','bkash')->sum('paid_amount');
$nogodh_amount = App\Models\Sale::whereDate('created_at', $carbonToDay)->where('payment_type','nogodh')->sum('paid_amount');
$rocket_amount = App\Models\Sale::whereDate('created_at', $carbonToDay)->where('payment_type','rocket')->sum('paid_amount');
$bank_amount = App\Models\Sale::whereDate('created_at', $carbonToDay)->where('payment_type','bank')->sum('paid_amount');
					
                   // $cash_amount = App\Models\Sale::where('payment_type','cash')->sum('paid_amount'); 
                   // $card_amount = App\Models\Sale::where('payment_type','card')->sum('paid_amount'); 
                   // $online_amount = App\Models\Sale::where('payment_type','online')->sum('paid_amount'); 

                  //  $bkash_amount = App\Models\Sale::where('payment_type','bkash')->sum('paid_amount'); 
                  //  $nogodh_amount = App\Models\Sale::where('payment_type','nogodh')->sum('paid_amount'); 
                  //  $rocket_amount = App\Models\Sale::where('payment_type','rocket')->sum('paid_amount'); 
                  //  $bank_amount = App\Models\Sale::where('payment_type','bank')->sum('paid_amount'); 
                   
                @endphp

<div class="page-wrapper">
				<div class="content">
					
				     <div class="row">
				    	<div class="col-lg-4 col-sm-6 col-12 d-flex">
							<div class="dash-count das1">
								<div class="dash-counts">
									<a class="btn btn-primary" href="{{ route('sale.create') }}" >Add Sale</a>
								</div>
							</div>
							</div>
						<div class="col-lg-4 col-sm-6 col-12 d-flex">
							  <div class="dash-count das2">
								<div class="dash-counts">
									<a class="btn btn-primary" href="{{ route('customer.create') }}" >Add Customer</a>
							   </div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6 col-12 d-flex">
							 <div class="dash-count das3">
								<div class="dash-counts">
									<a class="btn btn-primary" href="{{ route('package.create') }}" >Add Package</a>
							   </div>
							</div>
						</div>
				    
					<div class="col-lg-3 col-sm-6 col-12">
						<div class="dash-widget btn-primary">
							<div class="dash-widgetimg">
								<span><img src="{{ asset('backend') }}/img/icons/dash1.svg" alt="img"></span>
							</div>
							<div class="dash-widgetcontent">
								<h5>৳<span class="counters" data-count="{{ $todaySale->sum('grandtotal') }}"></span></h5>
								<h6> Today Sale Amount </h6>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 col-12">
						<div class="dash-widget btn-primary">
							<div class="dash-widgetimg">
								<span><img src="{{ asset('backend') }}/img/icons/dash2.svg" alt="img"></span>
							</div>
							<div class="dash-widgetcontent">
								<h5>৳<span class="counters" data-count="{{ $todaySale->sum('paid_amount') }}"></span></h5>
								<h6>Today Received Amount </h6>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-sm-6 col-12">
						<div class="dash-widget btn-primary">
							<div class="dash-widgetimg">
								<span><img src="{{ asset('backend') }}/img/icons/dash1.svg" alt="img"></span>
							</div>
							<div class="dash-widgetcontent">
								<h5>৳<span class="counters" data-count="{{ $todaySale->sum('due_amount') }}"></span></h5>
								<h6> Today Due Amount </h6>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 col-12">
						<div class="dash-widget dash2 btn-primary">
							<div class="dash-widgetimg">
								<span><img src="{{ asset('backend') }}/img/icons/dash3.svg" alt="img"></span>
							</div>
							<div class="dash-widgetcontent">
								<h5><span class="counters" data-count="{{ $packageQty }}"></span></h5>
								<h6> Today Sale Package </h6>
							</div>
						</div>
					</div>
					</div>
					<div class="row">

						

						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count">
								<div class="dash-counts">
									<h4>{{ $cusCount }}</h4>
									<h5>Customers</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="user"></i> 
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count ">
								<div class="dash-counts">
									<h4>{{ $pCount }}</h4>
									<h5>Services</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="user-check"></i> 
								</div>
							</div>
						</div>

						

						<div class="col-lg-3 col-sm-6 col-12 d-flex d-none">
							<div class="dash-count das2">
								<div class="dash-counts">
									<h4>{{ $saleCount }}</h4>
									<h5>Sales</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="file-text"></i>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12 d-flex d-none">
							<div class="dash-count das3">
								<div class="dash-counts">
									<h4>{{ $saleTotal }}</h4>
									<h5>Sales Amount</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="file"></i>  
								</div>
							</div>
						</div>

						
						<div class="col-lg-3 col-sm-6 col-12 d-flex"></div>
						<div class="col-lg-3 col-sm-6 col-12 d-flex"></div>
						

						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count das1">
								<div class="dash-counts">
									<h4>{{ $cash_amount }}</h4>
									<h5>Cash</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="user-check"></i> 
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count das1">
								<div class="dash-counts">
									<h4>{{ $card_amount }}</h4>
									<h5>Card</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="user-check"></i> 
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count das1">
								<div class="dash-counts">
									<h4>{{ $online_amount }}</h4>
									<h5>Online</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="user-check"></i> 
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count das1">
								<div class="dash-counts">
									<h4>{{ $bkash_amount }}</h4>
									<h5>bKash</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="user-check"></i> 
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count das1">
								<div class="dash-counts">
									<h4>{{ $nogodh_amount }}</h4>
									<h5>Nogodh</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="user-check"></i> 
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count das1">
								<div class="dash-counts">
									<h4>{{ $rocket_amount }}</h4>
									<h5>Rocket</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="user-check"></i> 
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count das1">
								<div class="dash-counts">
									<h4>{{ $bank_amount }}</h4>
									<h5>Bank</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="user-check"></i> 
								</div>
							</div>
						</div>

						</div>


					<!-- Button trigger modal -->

					{{-- <div class="row">
						<div class="col-lg-7 col-sm-12 col-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header pb-0 d-flex justify-content-between align-items-center">
									<h4 class="card-title mb-0">Recently Added Customers</h4>
									<div class="dropdown">
										<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" class="dropset">
											<i class="fa fa-ellipsis-v"></i>
										</a>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
											<li>
												<a href="" class="dropdown-item">Customer List</a>
											</li>
											<li>
												<a href="" class="dropdown-item">Add Customer</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive dataview">
										<table class="table datatable ">
											<thead>
												<tr>
													<th>SNo</th>
													<th>Customer</th>
													<th>Phone</th>
													<th>Address</th>
												</tr>
											</thead>
											<tbody>
                                             @foreach($recentCustomers as $recus)
												<tr>
													<td>{{ $loop->iteration }}</td>
												    <td>{{ $recus->name }}</td>
													<td>{{ $recus->phone }}</td>
													<td>{{ $recus->address }}</td>
												</tr>
											@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-5 col-sm-12 col-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header pb-0 d-flex justify-content-between align-items-center">
									<h4 class="card-title mb-0">Recently Added Packages</h4>
									<div class="dropdown">
										<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" class="dropset">
											<i class="fa fa-ellipsis-v"></i>
										</a>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
											<li>
												<a href="{{ route('package.index') }}" class="dropdown-item">Package List</a>
											</li>
											<li>
												<a href="{{ route('package.create') }}" class="dropdown-item">Package Add</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive dataview">
										<table class="table datatable ">
											<thead>
												<tr>
													<th>SNo</th>
													<th>Service</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												 @foreach ($recentPackages as $rp)
												<tr>
													<td>{{ $loop->iteration }}</td>
													<td>{{$rp->name}}</td>
													<td>{{$rp->price}}</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div> --}}
				
				</div>
			</div>
            @endsection