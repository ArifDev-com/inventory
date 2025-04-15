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
                <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">S.L</p>
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
                <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">Date</p>
            </td>
            <td style="
                        width: 140px;
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
                <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">Client Name</p>
            </td>
            <td style="
                        width: 170px;
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
                <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">Company Name</p>
            </td>
            <td style="
                        width: 70px;
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
                <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">Contact</p>
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
                <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Previous
                </p>
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
                <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Add Due
                </p>
            </td>
            <td style="
                        width: 70px;
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
                <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Paid Due
                </p>
            </td>
            <td style="
                        width: 70px;
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
                <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
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
        @endphp
        
        @foreach ($customers as $customer)
        <tr style="height: 17pt;">
            <td>
                <p class="s2" style="padding: 3px; text-indent: 0pt; text-align: center;">{{ $loop->iteration }}</p>
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
            @php
                $_prev = $customer->sales()
                    ->whereDate('date', '<', $toDate->format('Y-m-d'))
                    ->where('due_amount', '>', 0)
                    ->sum('due_amount')
                         + $customer->payments()
                     ->whereHas('sale', function($query) use ($toDate){
                         $query->whereDate('date', '<', $toDate->format('Y-m-d'));
                     })
                     ->where('is_due_pay', true)
                     ->sum('paying_amount')
                    ;
                 $_add = $customer->sales()
                     ->whereDate('date', '=', $toDate->format('Y-m-d'))
                     ->where('due_amount', '>', 0)
                     ->sum('due_amount')
                         + $customer->payments()
                     ->whereHas('sale', function($query){
                         $query->whereDate('date', '=', now()->format('Y-m-d'));
                     })
                     ->where('is_due_pay', true)
                     ->sum('paying_amount');
                 $_paid = $customer->payments()
                     ->whereDate('date', '=', now()->format('Y-m-d'))
                     ->where('is_due_pay', true)
                    ->sum('paying_amount');
                $_curr = $customer->sales()
                    ->where('due_amount', '>', 0)
                    ->whereDate('date', $toDate->format('Y-m-d'))
                    ->sum('due_amount');
                $prev += $_prev;
                 $add += $_add;
                 $paid += $_paid;
                $curr += $_curr;
            @endphp
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
                    {{ $_paid }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    {{ $_curr }}
                </p>
            </td>
        </tr>
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