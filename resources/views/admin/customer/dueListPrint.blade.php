@extends('layouts.pdf')

@section('name', 'Dues Report')

@section('content')
<style>
    table * {
        font-size: 9px !important;
    }

.c_list_c{
  		padding-left: 290px !important;
  }
</style>

<div style=" margin-top: 20px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">
    <table>
        <tbody>
            <tr>
                <td>
                    Date: {{ $toDate->format('d-m-Y') }}
                </td>
                <td style="text-align: right;">
                    Time: {{ now()->format('h:i a') }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
<table style="padding-top: 5px; border-collapse: collapse; margin: auto; width: 100%; border: 1px solid #969696; " cellspacing="0" class="border">
    <thead>
        <tr style="height: 15pt;">
            <td style="
                        width: 20px;
                        border-top-style: solid;
                        border-top-width: 1pt;
                        border-top-color: #959595;
                        border-left-style: solid;
                        border-left-width: 1pt;
                        border-left-color: #959595;
                        border-bottom-style: solid;
                        border-bottom-width: 1pt;
                        border-bottom-color: #959595;
                        border-right-style: solid;
                        border-right-width: 1pt;
                        border-right-color: #959595;
                    " bgcolor="#EFEFEF">
                <p class="s2" style="padding: 4px 1px; text-indent: 0pt; text-align: center;">S.L</p>
            </td>
            <td style="
                        width: 52px;
                        border-top-style: solid;
                        border-top-width: 1pt;
                        border-top-color: #959595;
                        border-left-style: solid;
                        border-left-width: 1pt;
                        border-left-color: #959595;
                        border-bottom-style: solid;
                        border-bottom-width: 1pt;
                        border-bottom-color: #959595;
                        border-right-style: solid;
                        border-right-width: 1pt;
                        border-right-color: #959595;
                    " bgcolor="#EFEFEF">
                <p class="s2" style="padding: 4px 1px; text-indent: 0pt; text-align: center;">Date</p>
            </td>
            <td style="
                        width: 130px;
                        border-top-style: solid;
                        border-top-width: 1pt;
                        border-top-color: #959595;
                        border-left-style: solid;
                        border-left-width: 1pt;
                        border-left-color: #959595;
                        border-bottom-style: solid;
                        border-bottom-width: 1pt;
                        border-bottom-color: #959595;
                        border-right-style: solid;
                        border-right-width: 1pt;
                        border-right-color: #959595;
                    " bgcolor="#EFEFEF">
                <p class="s2" style="padding: 4px 1px; text-indent: 0pt; text-align: center;">Client Name</p>
            </td>
            <td style="
                        width: 150px;
                        border-top-style: solid;
                        border-top-width: 1pt;
                        border-top-color: #959595;
                        border-left-style: solid;
                        border-left-width: 1pt;
                        border-left-color: #959595;
                        border-bottom-style: solid;
                        border-bottom-width: 1pt;
                        border-bottom-color: #959595;
                        border-right-style: solid;
                        border-right-width: 1pt;
                        border-right-color: #959595;
                    " bgcolor="#EFEFEF">
                <p class="s2" style="padding: 4px 1px; text-indent: 0pt; text-align: center;">Company Name</p>
            </td>
            <td style="
                        width: 60px;
                        border-top-style: solid;
                        border-top-width: 1pt;
                        border-top-color: #959595;
                        border-left-style: solid;
                        border-left-width: 1pt;
                        border-left-color: #959595;
                        border-bottom-style: solid;
                        border-bottom-width: 1pt;
                        border-bottom-color: #959595;
                        border-right-style: solid;
                        border-right-width: 1pt;
                        border-right-color: #959595;
                    " bgcolor="#EFEFEF">
                <p class="s2" style="padding: 4px 1px; text-indent: 0pt; text-align: center;">Contact</p>
            </td>
            <td style="
                        width: 50px;
                        border-top-style: solid;
                        border-top-width: 1pt;
                        border-top-color: #959595;
                        border-left-style: solid;
                        border-left-width: 1pt;
                        border-left-color: #959595;
                        border-bottom-style: solid;
                        border-bottom-width: 1pt;
                        border-bottom-color: #959595;
                        border-right-style: solid;
                        border-right-width: 1pt;
                        border-right-color: #959595;
                    " bgcolor="#EFEFEF">
                <p class="s2" style="padding: 4px 1px; text-indent: 0pt; text-align: center;">
                    Previous
                </p>
            </td>
            <td style="
                        width: 50px;
                        border-top-style: solid;
                        border-top-width: 1pt;
                        border-top-color: #959595;
                        border-left-style: solid;
                        border-left-width: 1pt;
                        border-left-color: #959595;
                        border-bottom-style: solid;
                        border-bottom-width: 1pt;
                        border-bottom-color: #959595;
                        border-right-style: solid;
                        border-right-width: 1pt;
                        border-right-color: #959595;
                    " bgcolor="#EFEFEF">
                <p class="s2" style="padding: 4px 1px; text-indent: 0pt; text-align: center;">
                    Add Due
                </p>
            </td>
            <td style="
                        width: 50px;
                        border-top-style: solid;
                        border-top-width: 1pt;
                        border-top-color: #959595;
                        border-left-style: solid;
                        border-left-width: 1pt;
                        border-left-color: #959595;
                        border-bottom-style: solid;
                        border-bottom-width: 1pt;
                        border-bottom-color: #959595;
                        border-right-style: solid;
                        border-right-width: 1pt;
                        border-right-color: #959595;
                    " bgcolor="#EFEFEF">
                <p class="s2" style="padding: 4px 1px; text-indent: 0pt; text-align: center;">
                    Paid Due
                </p>
            </td>
            <td style="
                        width: 50px;
                        border-top-style: solid;
                        border-top-width: 1pt;
                        border-top-color: #959595;
                        border-left-style: solid;
                        border-left-width: 1pt;
                        border-left-color: #959595;
                        border-bottom-style: solid;
                        border-bottom-width: 1pt;
                        border-bottom-color: #959595;
                        border-right-style: solid;
                        border-right-width: 1pt;
                        border-right-color: #959595;
                    " bgcolor="#EFEFEF">
                <p class="s2" style="padding: 4px 1px; text-indent: 0pt; text-align: center;">
                    Discount
                </p>
            </td>
            <td style="
                        width: 55px;
                        border-top-style: solid;
                        border-top-width: 1pt;
                        border-top-color: #959595;
                        border-left-style: solid;
                        border-left-width: 1pt;
                        border-left-color: #959595;
                        border-bottom-style: solid;
                        border-bottom-width: 1pt;
                        border-bottom-color: #959595;
                        border-right-style: solid;
                        border-right-width: 1pt;
                        border-right-color: #959595;
                    " bgcolor="#EFEFEF">
                <p class="s2" style="padding: 4px 1px; text-indent: 0pt; text-align: center;">
                    Curr. Due
                </p>
            </td>
        </tr>
    </thead>
    <tbody>
        @php
            $prev = 0;
            $add = 0;
            $paid = 0;
            $curr = 0;
            $discount = 0;
      		$index = 1;
        @endphp

        @foreach ($customers as $customer)
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
                + $futureDuePayments->sum('paying_amount')
                + $futureDuePayments->sum('discount');

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

            $_prev = $sales
                ->where('due_amount', '>', 0)
                ->where('date', '<', $toDate->format('Y-m-d'))
                ->sum('due_amount')
                + $prevDuePayments->sum('paying_amount') + $prevDuePayments->sum('discount')
                - $prevPaid->sum('paying_amount') - $prevPaid->sum('discount');
        @endphp
		@if($_curr || $_prev || $_paid_show || $_add)
        <tr style="height: 17pt;">
            <td>
                <p class="s2" style="padding: 3px; text-indent: 0pt; text-align: center;">{{ $index ++ }}</p>
            </td>
            <td>
                <p class="s2" style="padding: 3px; text-indent: 0pt; text-align: center;">
                    {{ $toDate->format('Y-m-d') }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px; text-indent: 0pt; text-align: left;">
                    {{ $customer->name }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px; padding-left: 2pt; text-indent: 0pt; text-align: left;">
                    {{ $customer->company_name }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    {{ $customer->phone }}
                </p>
            </td>

            <td>
                <p class="s2" style="padding: 3px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                {{ $_prev }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    {{ $_add }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    {{ $_paid_show }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    {{ $_discount }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    {{ $_curr }}
                </p>
            </td>
        </tr>
        @php
            $prev += $_prev;
            $add += $_add;
            $paid += $_paid_show;
            $curr += $_curr;
            $discount += $_discount;
        @endphp
        @endif
        @endforeach
        <tr>
            <td colspan="4">

            </td>
            <td style="padding: 4px; text-align: right;">
                Total
            </td>
            <td style="text-align: center;">
                {{ $prev }}
            </td>
            <td style="text-align: center;">
                {{ $add }}
            </td>
            <td style="text-align: center;">
                {{ $paid }}
            </td>
            <td style="text-align: center;">
                {{ $discount }}
            </td>
            <td style="text-align: center;">
                {{ $curr }}
            </td>
        </tr>
    </tbody>
</table>

@endsection
@section('footer')
<td style="text-align: center; opacity: 0;">
    _______________
</td>
<td style="text-align: center; opacity: 0;">
    _______________
</td>
<td style="text-align: center; opacity: 0;">
    _______________
</td>
<td style="text-align: center; opacity: 0;">
    _______________
</td>
<td style="text-align: center; opacity: 0;">
    _______________
</td>
<td style="text-align: center;">
    {{ auth()->user()->name }}
    <br>
    _______________
    <br>
    CAPITAL LIFT
</td>
@endsection
