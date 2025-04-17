@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Due Report</h4>
            </div>
        </div>
        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <form class="row" action="{{ route('due.list') }}" method="get">
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <input type="text" class="datetimepicker cal-icon" placeholder="Choose Date"
                                value="{{ $toDate->format('d-m-Y') }}" name="to_date" id="to_date">
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="form-group w-100">
                            <button type="submit" class="btn btn-filters d-inline-block"
                                onclick="this.form.target='';"
                            >
                                <img
                                    src="{{ asset('backend') }}/img/icons/search-whites.svg" alt="img">
                            </button>
                            <button type="submit" class="btn btn-info"
                                onclick="this.form.target='_blank';openOther()"
                                name="print" value="1">
                                <i class="fa fa-print" aria-hidden="true"></i>
                                Print
                            </button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>S.l</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Company</th>
                                <th>Phone</th>
                                <th>Prev. Due</th>
                                <th>Add Due</th>
                                <th>Paid Due</th>
                                <th>Discount</th>
                                <th>Curr. Due</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $key => $customer)
                            @php
                                $sales = $customer->sales;
                                $payments = $customer->payments;

                                // Current due before or on the date
                                $_curr = $sales
                                    ->where('due_amount', '>', 0)
                                    ->where('date', '<=', $toDate->format('Y-m-d'))
                                    ->sum('due_amount');

                                // Payments that are due pays and sale date = target date
                                $futureDuePayments = $payments->filter(function($payment) use ($toDate) {
                                    return $payment->is_due_pay
                                        && optional($payment->sale)->date === $toDate->format('Y-m-d');
                                });

                                // Add amount for today's sales due + future due payments
                                $_add = $sales
                                    ->where('due_amount', '>', 0)
                                    ->where('date', '=', $toDate->format('Y-m-d'))
                                    ->sum('due_amount')
                                    + $futureDuePayments->sum('paying_amount');
                                    // + $futureDuePayments->sum('discount');

                                // Paid amount today (only due payments)
                                $todayDuePayments = $payments->filter(function($payment) use ($toDate) {
                                    return $payment->is_due_pay
                                        && $payment->date === $toDate->format('Y-m-d');
                                });
                                $_paid = $todayDuePayments->sum('paying_amount') + $todayDuePayments->sum('discount');
                                $_paid_show = $todayDuePayments->sum('paying_amount');
                                $_discount = $todayDuePayments->sum('discount');

                                // Previous due logic
                                $prevDuePayments = $payments->filter(function($payment) use ($toDate) {
                                    $saleDate = optional($payment->sale)->date;
                                    return $payment->is_due_pay && $saleDate < $toDate->format('Y-m-d');
                                });

                                $prevPaid = $payments->filter(function($payment) use ($toDate) {
                                    $saleDate = optional($payment->sale)->date;
                                    return $payment->is_due_pay
                                        && $payment->date < $toDate->format('Y-m-d')
                                        && $saleDate < $toDate->format('Y-m-d');
                                });

                                // $_prev = $sales
                                //     ->where('due_amount', '>', 0)
                                //     ->where('date', '<', $toDate->format('Y-m-d'))
                                //     ->sum('due_amount')
                                //     + $prevDuePayments->sum('paying_amount') + $prevDuePayments->sum('discount')
                                //     - $prevPaid->sum('paying_amount') - $prevPaid->sum('discount');
                                $_prev = $sales
                                    ->where('due_amount', '>', 0)
                                    ->where('date', '<', $toDate->format('Y-m-d'))
                                    ->sum('due_amount')
                                    + $prevDuePayments->sum('paying_amount')
                                    - $prevPaid->sum('paying_amount');
                            @endphp

                            @if($_curr || $_prev || $_paid_show || $_add)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        {{ $toDate->format('Y-m-d') }}
                                    </td>
                                    <td style="text-align: left;">
                                        <a href="{{ route('customer.show', ['customer' => $customer->id]) }}">
                                            {{ $customer->name }}
                                        </a>
                                    </td>
                                    <td style="text-align: left;">
                                        {{ $customer->company_name }}
                                    </td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $_prev ?? 0 }}</td>
                                    <td>{{ $_add ?? 0 }}</td>
                                    <td>{{ $_paid_show ?? 0 }}</td>
                                    <td>{{ $_discount ?? 0 }}</td>
                                    <td>
                                        {{ $_prev + $_add - $_paid }}
                                    </td>
                                </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>

    <!-- edit payment Modal -->
@endsection

@section('scripts')
<script>

</script>

<script>
    let table = new DataTable('#myTable', {
        pageLength: 25,
    }
    );

</script>

@endsection
