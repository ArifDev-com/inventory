@extends('layouts.app')

@section('content')
    <style>
        .dash-widget-icon {
            background-color: rgba(14, 217, 106, 0.2);
            border-radius: 100%;
            color: var(--head_left_color);
            display: inline-block;
            float: left;
            font-size: 30px;
            height: 60px;
            line-height: 60px;
            margin-right: 10px;
            text-align: center;
            width: 60px;
        }

        .dash-widget-info {
            text-align: right;
        }

        .dash-widget-info>h3 {
            font-size: 30px;
            font-weight: 600;
        }

        .dash-widget-info>span {
            font-size: 16px;
        }

        .dash-statistics .stats-info {
            margin-bottom: 5px;
        }

        .dash-statistics .stats-info:last-child {
            margin-bottom: 0;
        }

        .dash-statistics .progress {
            height: 4px;
        }

        .dash-statistics .stats-list {
            height: auto;
        }

        .leave-info-box {
            border: 1px solid #e5e5e5;
            padding: 15px;
            margin-bottom: 15px;
        }

        .leave-info-box:last-child {
            margin-bottom: 0;
        }

        .card {
            border: 1px solid #ededed;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
        }
        a.card {
            text-decoration: none;
            color: #1f1f1f;
        }
        .card-title {
            color: #1f1f1f;
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #fff;
        }
        .card-footer {
            background-color: #fff;
        }
        .card-body {
            width: 100%;
            padding: 10px;
        }
    </style>
    <div class="page-wrapper">
        <div class="content">
            <div>
                @php
                    $from = request()->get('from') ?? now()->format('Y-m-d');
                    $to = request()->get('to') ?? now()->format('Y-m-d');
                @endphp
                <div class="card">
                    <div class="card-body">
                        <form class="row">
                            <div class="col-md-3 col-sm-6">
                                <label for="date">From</label>
                                <input type="date" class="form-control" id="date" name="from"
                                    value="{{ $from }}">
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <label for="date">To</label>
                                <input type="date" class="form-control" id="date" name="to"
                                    value="{{ $to }}">
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <label for="">&nbsp;</label>
                                <br>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
             
				
				<div>
					<div class="row">
						@foreach (['cash', 'bkash', 'rocket', 'card', 'nagad'] as $item)
						<div class="col-md-6 col-sm-6 col-lg-4 col-xl-4">
							<div class="card p-3" style="border-top: 3px solid #b27ef7;">
								<h4>
                                  {{ ucfirst($item) }}: {{
                                  App\Models\CutomerPayment::where('payment_method', $item)
                                                    ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                          			->whereNotNull('sale_id')
                                          			->with('sale')
                                                    ->sum('paying_amount')
                                  }}
                              </h4>
								<div class="">
									<table class="table">
										<thead>
											<tr>
												<th>S.L</th>
												<th>Inv. No</th>
												<th>Salesman</th>
												<th>Amount</th>
											</tr>
										</thead>
										<tbody>
										 @foreach (App\Models\CutomerPayment::where('payment_method', $item)
                                                    ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                          			->whereNotNull('sale_id')
                                          			->with('sale')
                                                    ->get() as $key => $sale)
                                          <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td >{{ $sale->sale?->ref_code }}</td>
                                            <td style="text-align: left;">
                                    			{{ $sale->sale?->user?->name }}
                                            </td>
                                            <td>
                                            	{{ $sale->paying_amount }}
                                            </td>
										</tbody>
                                      	@endforeach
									</table>
								</div>
							</div>
						</div>
                      @endforeach
						<div class="col-md-6 col-sm-6 col-lg-4 col-xl-4">
							<div class="card p-3" style="border-top: 3px solid #b27ef7;">
								<h4>
                                  Bank: {{
                                  App\Models\CutomerPayment::where('payment_method', 'bank')
                                                    ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                          			->whereNotNull('sale_id')
                                          			->with('sale')
                                                    ->sum('paying_amount')
                                  }}
                              </h4>
								<div class="">
									<table class="table">
										<thead>
											<tr>
												<th>S.L</th>
												<th>Inv. No</th>
												<th>Customer</th>
												<th>Amount</th>
											</tr>
										</thead>
										<tbody>
										 @foreach (App\Models\CutomerPayment::where('payment_method', 'bank')
                                                    ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                          			->whereNotNull('sale_id')
                                          			->with(['sale', 'customer'])
                                                    ->get() as $key => $sale)
                                          <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td >{{ $sale->sale?->ref_code }}</td>
                                            <td style="text-align: left;">
                                    			{{ $sale->sale?->customer?->name }}
                                            </td>
                                            <td>
                                            	{{ $sale->paying_amount }}
                                            </td>
										</tbody>
                                      	@endforeach
									</table>
								</div>
							</div>
						</div>
                      
						<div class="col-md-6 col-sm-6 col-lg-4 col-xl-4">
							<div class="card p-3" style="border-top: 3px solid #b27ef7;">
								<h4>
                                  Other Cost: {{
                                  App\Models\Sale::whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                  					->where('other_cost', '>', 0)
                                          			->with('customer')
                                                    ->sum('other_cost')
                                  }}
                              </h4>
								<div class="">
									<table class="table">
										<thead>
											<tr>
												<th>S.L</th>
												<th>Inv. No</th>
												<th>Customer</th>
												<th>Amount</th>
											</tr>
										</thead>
										<tbody>
										 @foreach (App\Models\Sale::whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                  					->where('other_cost', '>', 0)
                                          			->with('customer')
                                                    ->get() as $key => $sale)
                                          <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td >{{ $sale->ref_code }}</td>
                                            <td style="text-align: left;">
                                    			{{ $sale->customer?->name }}
                                            </td>
                                            <td>
                                            	{{ $sale->other_cost }}
                                            </td>
										</tbody>
                                      	@endforeach
									</table>
								</div>
							</div>
						</div>
                      <div class="col-md-6 col-sm-6 col-lg-4 col-xl-4">
							<div class="card p-3" style="border-top: 3px solid #b27ef7;">
								<h4>
                                  Return: {{
                                  App\Models\SaleReturn::whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                  					->where('paid_amount', '>', 0)
                                          			->with('customer')
                                                    ->sum('paid_amount')
                                  }}
                              </h4>
								<div class="">
									<table class="table">
										<thead>
											<tr>
												<th>S.L</th>
												<th>Inv. No</th>
												<th>Customer</th>
												<th>Amount</th>
											</tr>
										</thead>
										<tbody>
										 @foreach (App\Models\SaleReturn::whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                  					->where('paid_amount', '>', 0)
                                          			->where('status', 'received')
                                          			->with('customer')
                                                    ->get() as $key => $sale)
                                          <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td >{{ $sale->ref_code }}</td>
                                            <td style="text-align: left;">
                                    			{{ $sale->customer?->name }}
                                            </td>
                                            <td>
                                            	{{ $sale->paid_amount }}
                                            </td>
										</tbody>
                                      	@endforeach
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>	
            </div>
        </div>
    </div>
@endsection

