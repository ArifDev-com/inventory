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
                    <h4>
                        Total Present Cash: {{
                            App\Models\CutomerPayment::whereIn('payment_method', ['cash', 'bkash', 'rocket', 'nagad', 'card', 'bank'])
                                ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                ->sum('paying_amount')
                            - App\Models\SaleReturn::whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                ->sum('paid_amount')
                            - App\Models\Expense::whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                ->sum('amount')
                            + App\Models\AdvancePayment::whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
                                ->sum('amount')
                        }}
                    </h4>
                    <hr>
                </div>
				@include('admin.home.sale')
				@include('admin.home.advance')
            </div>
        </div>
    </div>
@endsection

