@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

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
        @php
            $user = Auth::user();
            $dueReports = App\Models\Sale::where('due_amount', '>', 0)
                ->where('due_date', '<', now()->addDays(7))
                ->orderBy('due_date', 'asc') // get upcoming due
                ->limit(7)
                ->get();
        @endphp
        <div class="row">
            <div class="col-md-8">
                <div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-4 col-xl-4">
                            <a class="card dash-widget" style="border-top: 3px solid #1071d6;" href="{{ route('product.index') }}">
                                <div class="card-body">
                                    <span class="dash-widget-icon"><i class="fa fa-box"></i></span>
                                    <div class="dash-widget-info">
                                        <h3>
                                            {{ App\Models\Product::where('status', 1)->count() }}
                                            /
                                            {{ App\Models\Product::count() }}
                                        </h3>
                                        <strong>Products</strong>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 col-sm-6 col-lg-4 col-xl-4">
                            <a class="card dash-widget" style="border-top: 3px solid #10d66b;" href="{{ route('sale.index') }}">
                                <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-money-bill"></i></span>
                                    <div class="dash-widget-info">
                                        <h3>
                                            {{ App\Models\Sale::count() }}
                                        </h3>
                                        <strong>Total Sales</strong>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 col-sm-6 col-lg-4 col-xl-4">
                            <a class="card dash-widget" style="border-top: 3px solid #fba042;" href="{{ route('sale.index') }}">
                                <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-clock"></i></span>
                                    <div class="dash-widget-info">
                                        <h3>
                                            {{ App\Models\Sale::whereDate('created_at', now())->count() }}
                                        </h3>
                                        <strong>Today Sales</strong>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 col-sm-6 col-lg-4 col-xl-4">
                            <a class="card dash-widget" style="border-top: 3px solid #fd3622;" href="{{ route('product.low.stock') }}">
                                <div class="card-body">
                                    <span class="dash-widget-icon">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </span>
                                    <div class="dash-widget-info">
                                        <h3>
                                            {{ App\Models\Product::get()
                                            ->filter(function ($product) {
                                            return $product->current_stock <= $product->alert_quantity;
                                                })
                                                ->count() }}
                                        </h3>
                                        <strong>Low Stock</strong>
                                    </div>
                                </div>
                            </a>
                        </div>
                  
						@if($user->user_role == 'superadmin')
                        <div class="col-md-6 col-sm-6 col-lg-4 col-xl-4">
                            <a class="card dash-widget" style="border-top: 3px solid #b27ef7;" href="{{ route('customer.index') }}">
                                <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                                    <div class="dash-widget-info">

                                        <h3>
                                            {{ App\Models\Customer::count() }}
                                        </h3>
                                        <strong>
                                            Customers
                                        </strong>
                                    </div>
                                </div>
                            </a>
                        </div>
                  		@endif
                    </div>

                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card p-3" style="border-top: 3px solid #b27ef7;">
                    <h4>Upcoming Due:</h4>
                    <div class="">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Due</th>
                                    <th>Due Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dueReports as $dueReport)
                                <tr>
                                    <td>
                                        {{ $dueReport->customer?->name }}
                                        <br>
                                        <sub style="font-size: 10px;" class="text-muted">
                                            {{ $dueReport->customer?->phone }}
                                        </sub>
                                    </td>
                                    <td>{{ $dueReport->due_amount }}</td>
                                    <td>{{ $dueReport->due_date }}</td>
                                    {{-- <td>
                                        <a href="{{ route('sale.edit', $dueReport->id) }}" class="btn btn-primary">Edit</a>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif

        @if($user->user_role == 'superadmin')

        <div class="row">
            <div class="col-md-12">
                <div>
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <div class="card-header border-bottom mb-3">
                                    <h5>Today Financial Summary</h5>
                                </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-lg-3 col-xl-3">
                                    <a class="card dash-widget" style="border-top: 3px solid #b27ef7;" href="{{ route('collection.details') }}">
                                        <div class="card-body" style="padding: 0px;">
                                            <span class="dash-widget-icon" style="font-size: 24px;">
                                                <i class="fa fa-money-bill"></i>
                                            </span>
                                            <div class="dash-widget-info">
                                                <h4>
                                                    {{-- due_pay + sale --}}
                                                    {{ App\Models\CutomerPayment::whereDate('created_at', now())
                                                    ->sum('paying_amount') }}
                                                </h4>
                                                <strong>
                                                    Total Collection
                                                </strong>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                
                                <div class="col-md-3 col-sm-6 col-lg-3 col-xl-3">
                                    <a class="card dash-widget" style="border-top: 3px solid #b27ef7;" href="#">
                                        <div class="card-body" style="padding: 0px;">
                                            <span class="dash-widget-icon" style="font-size: 24px;">
                                                <i class="fa fa-money-bill"></i>
                                            </span>
                                            <div class="dash-widget-info">
                                                <h4>
                                                    {{ App\Models\CutomerPayment::whereDate('created_at', now())
                                                    ->where('is_due_pay', 1)
                                                    ->sum('paying_amount') }}
                                                </h4>
                                                <strong>
                                                    Due Collection
                                                </strong>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                  				
                  				<div class="col-md-3 col-sm-6 col-lg-3 col-xl-3">
                                    <a class="card dash-widget" style="border-top: 3px solid #b27ef7;" href="#">
                                        <div class="card-body" style="padding: 0px;">
                                            <span class="dash-widget-icon" style="font-size: 24px;">
                                                <i class="fa fa-money-bill"></i>
                                            </span>
                                            <div class="dash-widget-info">
                                                <h4>
                                                    {{ App\Models\Sale::whereDate('created_at', now())
                                                    ->sum('other_cost') }}
                                                </h4>
                                                <strong>
                                                    Others Cost
                                                </strong>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                
                                <div class="col-md-3 col-sm-6 col-lg-3 col-xl-3">
                                    <a class="card dash-widget" style="border-top: 3px solid #b27ef7;" href="#">
                                        <div class="card-body" style="padding: 0px;">
                                            <span class="dash-widget-icon" style="font-size: 24px;">
                                                <i class="fa fa-money-bill"></i>
                                            </span>
                                            <div class="dash-widget-info">
                                                <h4>
                                                    {{ App\Models\CutomerPayment::whereDate('created_at', now())
                                                    ->where('is_due_pay', 0)
                                                    ->sum('paying_amount') }}
                                                </h4>
                                                <strong>
                                                    Total Sale
                                                </strong>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                
                                <div class="col-md-3 col-sm-6 col-lg-3 col-xl-3">
                                    <a class="card dash-widget" style="border-top: 3px solid red;" href="#">
                                        <div class="card-body" style="padding: 0px;">
                                            <span class="dash-widget-icon" style="font-size: 24px;">
                                                <i class="fa fa-money-bill"></i>
                                            </span>
                                            <div class="dash-widget-info">
                                                <h4>
                                                    {{
                                                    App\Models\SaleReturn::whereDate('created_at', now())
                                                    ->sum('paid_amount')
                                                    }}
                                                </h4>
                                                <strong>
                                                    Total Return
                                                </strong>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3 col-sm-6 col-lg-3 col-xl-3">
                                    <a class="card dash-widget" style="border-top: 3px solid red;" href="#">
                                        <div class="card-body" style="padding: 0px;">
                                            <span class="dash-widget-icon" style="font-size: 24px;">
                                                <i class="fa fa-money-bill"></i>
                                            </span>
                                            <div class="dash-widget-info">
                                                <h4>
                                                    {{ App\Models\Expense::whereDate('created_at', now())->sum('amount') }}
                                                </h4>
                                                <strong>
                                                    Total Expense
                                                </strong>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- finance closed-->
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($cancellationRequests->count() > 0)
            <hr>
            <div>
                <h4>Cancellation Requests:</h4>
                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Invoice No</th>
                                <th>{{ trans('table.sale.date') }}</th>
                                <th>{{ trans('table.sale.customer') }}</th>
                                <th>{{ trans('table.sale.payment') }}</th>
                                <th>{{ trans('table.sale.total') }}</th>
                                <th>Discount</th>
                                <th>{{ trans('table.sale.paid') }}</th>
                                <th>{{ trans('table.sale.due') }}</th>
                                <th>Due Date</th>
                                <th>{{ trans('table.sale.biller') }}</th>
                                <th class="text-center">{{ trans('table.sale.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cancellationRequests as $key => $sale)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="" style="font-size: 13px;">{{ $sale->ref_code }}</td>
                                <td>{{ $sale->date }}</td>
                                <td>{{ $sale->customer?->name }}</td>
                                <td>
                                    {{ join(', ', $sale->payments->pluck('payment_method')->toArray()) }}
                                </td>
                                <td>{{ $sale->grandtotal }}</td>
                                <td>{{ $sale->discount }}</td>
                                <td>{{ $sale->paid_amount }}</td>
                                <td class="text-red">{{ $sale->due_amount }}</td>
                                <td>{{ $sale->due_date }}</td>
                                <td>
                                    {{ $sale->user?->first_name . ' ' . $sale->user?->last_name }}
                                    @if($sale->cancel_requested)
                                    <br>
                                    <span class="badge bg-danger">Requested to Cancel</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('sale.delete', $sale->id) }}"
                                        onclick="return confirm('Are you sure you want to delete this sale?')"
                                        class="btn btn-danger btn-sm text-white">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a href="{{ route('sale.cancel.undo', [$sale->id]) }}"
                                        onclick="return confirm('Are you sure you want to undo cancellation?')"
                                        class="btn btn-success btn-sm text-white">
                                        <i class="fa fa-undo"></i>
                                    </a>
                                    <a href="{{ route('sale.pdf', [$sale->id]) }}" target="_blank"
                                        class="btn btn-warning btn-sm text-white">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <script>
                    $('#example').DataTable({ pageLength: 100 });
                </script>
            </div>
            @endif

            @if($saleReturns->count() > 0)
            <hr>
            <div>
                <h4>Sale Returns:</h4>
                <div class="table-responsive">
                    <table class="table" id="example2">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Invoice No</th>
                                <th>{{ trans('table.sale.date') }}</th>
                                <th>{{ trans('table.sale.customer') }}</th>
                                <th>{{ trans('table.sale.payment') }}</th>
                                <th>{{ trans('table.sale.total') }}</th>
                                <th>{{ trans('table.sale.paid') }}</th>
                                <th>{{ trans('table.sale.biller') }}</th>
                                <th class="text-center">{{ trans('table.sale.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($saleReturns as $key => $saleReturn)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="" style="font-size: 13px;">{{ $saleReturn->ref_code }}</td>
                                <td>{{ $saleReturn->date }}</td>
                                <td>{{ $saleReturn->customer?->name }}</td>
                                <td><span class="badges bg-lightgreen">{{ $saleReturn->payment_type }}</span></td>
                                <td>{{ $saleReturn->grandtotal }}</td>
                                <td>{{ $saleReturn->paid_amount }}</td>
                                <td>
                                    {{ $saleReturn->user?->name }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('sale.return.approve', [$saleReturn->id]) }}"
                                        onclick="return confirm('Are you sure you want to approve this sale return?')"
                                        class="btn btn-primary btn-sm text-white">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="{{ route('sale.return.delete', $saleReturn->id) }}"
                                        onclick="return confirm('Are you sure you want to delete this sale return?')"
                                        class="btn btn-danger btn-sm text-white">
                                        <i class="fa fa-times"></i>
                                    </a>
                                    <a target="_blank" href="{{ route('sale.return.pdf', $saleReturn->id) }}"
                                        class="btn btn-warning btn-sm text-white">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {!! $sales->links() !!} --}}
                </div>
                <script>
                    $('#example2').DataTable({ pageLength: 100 });
                </script>
            </div>
            @endif
        @endif
    </div>
</div>
@endsection