@extends('layouts.pdf')

@section('name', 'Sales order Reports')
@section('content')
<style>
    table * {
        font-size: 10px !important;
      
    }
    .c_list_c{
  		padding-left: 250px !important;
	}
</style>
<div style=" margin-top: 30px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">
    Date:
    &nbsp;
    {{ $fromDate->format('d-m-Y') }} to {{ $toDate->format('d-m-Y') }}
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
  	&nbsp;
  	&nbsp;
    Time:
    &nbsp;
    {{ now()->format('h:i a') }}
</div>
<table style="padding-top: 5px; border-collapse: collapse; margin: auto; width: 100%;border: 1px solid #969696; " cellspacing="0" class="border">
    <tbody>
        <tr style="height: 20pt;">
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
                <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">
                    S.L
                </p>
            </td>
            <td style="
                        width: 30px;
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
                <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">
                    ID
                </p>
            </td>
            <td style="
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
                <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">
                    Date
                </p>
            </td>
            <td style="
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
                <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Client Name
                </p>
            </td>
            <td style="
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
                <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Cell
                </p>
            </td>
            <td style="
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
                <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Discount
                </p>
            </td>
            <td style="
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
                <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Bill Due
                </p>
            </td>
            <td style="
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
                <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Bill Paid
                </p>
            </td>
            <td style="
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
                <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Total
                </p>
            </td>
        </tr>
        @php
            $total_due = 0;
            $total_paid = 0;
            $total_discount = 0;
            $total_grandtotal = 0;
        @endphp
        @foreach ($sales as $sale)
        <tr style="height: 17pt;">
            <td>
                <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">{{ $loop->iteration }}</p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">
                    {{ $sale->ref_code }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    {{ $sale->date }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: left;">
                    {{ $sale->customer?->name }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    {{ $sale->customer?->phone }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    {{ $sale->discount }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    {{ $sale->due_amount }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    {{ $sale->paid_amount }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    {{ $sale->grandtotal }}
                </p>
            </td>
        </tr>
        @php
            $total_due += $sale->due_amount;
            $total_paid += $sale->paid_amount;
            $total_discount += $sale->discount;
            $total_grandtotal += $sale->grandtotal;
        @endphp
        @endforeach
        <tr style="height: 17pt;">
            <td colspan="5" style="text-align: right;">
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: right;">
                    Total
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    {{ $total_discount   }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    {{ $total_due }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    {{ $total_paid }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    {{ $total_grandtotal }}
                </p>
            </td>
        </tr>
    </tbody>
</table>


<div style="margin-top: 20px">
    <b>Due Paid </b>
</div>
<table style="padding-top: 5px; border-collapse: collapse; margin: auto; width: 100%;border: none; " cellspacing="0" class="border">
    <tbody>
        <tr style="height: 20pt;">
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
                <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">
                    No
                </p>
            </td>
            <td style="
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
                <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">
                    Date
                </p>
            </td>
            <td style="
                        width: 350px;
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
                <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Client Name
                </p>
            </td>
            <td style="
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
                <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Cell
                </p>
            </td>
            <td style="
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
                <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Discount
                </p>
            </td>
            <td style="
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
                <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Paid Amount
                </p>
            </td>
        </tr>
        @php
            $total_paid = 0;
            $total_discount = 0;
            $pays = \App\Models\CutomerPayment::query()
                ->whereIn('sale_id', $sales->pluck('id'))
                ->where('is_due_pay', true)
                ->whereBetween('created_at', [$fromDate, $toDate])
                ->get();
        @endphp
        @foreach ($pays as $payment)
        <tr style="height: 17pt;">
            <td>
                <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">
                    {{ $loop->iteration }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    {{ $payment->date }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: left;">
                    {{ $payment->customer?->name }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    {{ $payment->customer?->phone }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    {{ $payment->sale?->discount }}
                </p>
            </td>
            <td style="width: 98px;">
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    {{ $payment->paying_amount }}
                </p>
            </td>
        </tr>
        @php
            $total_paid += $payment->paying_amount;
            $total_discount += ($payment->sale?->discount ?? 0);
        @endphp
        @endforeach
        <tr style="height: 17pt;">
            <td style="border: none"></td>
            <td style="border: none"></td>
            <td style="border: none"></td>
            <td style="text-align: right;">
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    Total
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    {{ $total_discount }}
                </p>
            </td>
            <td style="width: 98px;">
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    {{ $total_paid }}
                </p>
            </td>
        </tr>
    </tbody>
</table>

<div style="margin-top: 20px">
    <b>Financial Summary</b>
</div>

<table style="border-collapse: collapse; margin-top: 5px; width: 100%;">
    <tr>
        
        <td style="text-align: left; padding: 5px; border: 1px solid #969696;">
            Bill Due
        </td>
        <td style="text-align: center; padding: 5px; border: 1px solid #969696;">
            {{ $total_due }}
        </td>
        <td style="width: 150px; border: 0px;"></td>
        <td style="text-align: left; padding: 5px; border: 1px solid #969696;">
            Total Sale
        </td>
        <td style="text-align: center; padding: 5px; border: 1px solid #969696;">
            {{ \App\Models\Sale::whereBetween('created_at', [$fromDate, $toDate])->sum('grandtotal') }}
        </td>
    </tr>
    
    <tr>
        <td style="text-align: left; padding: 5px; border: 1px solid #969696;">
            Bank
        </td>
        <td style="text-align: center; padding: 5px; border: 1px solid #969696;">
            {{
            App\Models\CutomerPayment::where('payment_method', 'bank')
                 ->whereBetween('created_at', [$fromDate, $toDate])
                 ->with('sale')
                 ->sum('paying_amount')
            }}
        </td>
        <td style="width: 150px; border: 0px;"></td>
        <td style="text-align: left; padding: 5px; border: 1px solid #969696;">
            Total Due Received
        </td>
        <td style="text-align: center; padding: 5px; border: 1px solid #969696;">
            {{ \App\Models\CutomerPayment::whereBetween('created_at', [$fromDate, $toDate])
                ->whereNotNull('sale_id')
                ->where('is_due_pay', true)
                ->sum('paying_amount') }}
        </td>
    </tr>
    <tr>
        <td style="text-align: left; padding: 5px; border: 1px solid #969696;">
            Mobile Banking
        </td>
        <td style="text-align: center; padding: 5px; border: 1px solid #969696;">
                {{
                  App\Models\CutomerPayment::whereIn('payment_method', ['bkash', 'rocket', 'nagad'])
                        ->whereBetween('created_at', [$fromDate, $toDate])
                        ->with('sale')
                        ->sum('paying_amount')
                  }}
        </td>
        <td style="width: 150px; border: 0px;"></td>
        <td style="text-align: left; padding: 5px; border: 1px solid #969696;">
            Total Adavnced
        </td>
        <td style="text-align: center; padding: 5px; border: 1px solid #969696;">
            {{App\Models\AdvancePayment::whereBetween('created_at', [$fromDate, $toDate])
            ->sum('amount')}}
        </td>
    </tr>
    <tr>
        
        <td style="text-align: left; padding: 5px; border: 1px solid #969696;">
            Other's Cost
        </td>
        <td style="text-align: center; padding: 5px; border: 1px solid #969696;">
                {{
                  App\Models\Sale::whereBetween('created_at', [$fromDate, $toDate])
                                      ->where('other_cost', '>', 0)
                                      ->with('customer')
                                    ->sum('other_cost')
                  }}
        </td>
        <td style="width: 150px; border: 0px;"></td>
        <td style="text-align: left; padding: 5px; border: 1px solid #969696;">
            All Other's
        </td>
        <td style="text-align: center; padding: 5px; border: 1px solid #969696;">
            - {{
                $total_due
                
                + App\Models\CutomerPayment::where('payment_method', 'bank')
                         ->whereBetween('created_at', [$fromDate, $toDate])
                         ->with('sale')
                         ->sum('paying_amount')
                 
                 + App\Models\CutomerPayment::whereIn('payment_method', ['bkash', 'rocket', 'nagad'])
                        ->whereBetween('created_at', [$fromDate, $toDate])
                        ->with('sale')
                        ->sum('paying_amount')
                 
                 + App\Models\Sale::whereBetween('created_at', [$fromDate, $toDate])
                                      ->where('other_cost', '>', 0)
                                      ->with('customer')
                                    ->sum('other_cost')
                 
                 + App\Models\CutomerPayment::where('payment_method', 'advance')
                                    ->whereBetween('created_at', [$fromDate, $toDate])
                                      ->with('sale')
                                    ->sum('paying_amount')
                  
                  + App\Models\SaleReturn::whereBetween('created_at', [$fromDate, $toDate])
                                      ->where('paid_amount', '>', 0)
                                      ->with('customer')
                                    ->sum('paid_amount')
                  
                  + App\Models\Expense::whereBetween('created_at', [$fromDate, $toDate])
                            ->with('customer')
                            ->sum('amount')
            }}
        </td>
    </tr>
    
    <tr>
        <td style="text-align: left; padding: 5px; border: 1px solid #969696;">
            Advance Used
        </td>
        <td style="text-align: center; padding: 5px; border: 1px solid #969696;">
            {{
                  App\Models\CutomerPayment::where('payment_method', 'advance')
                                    ->whereBetween('created_at', [$fromDate, $toDate])
                                      ->with('sale')
                                    ->sum('paying_amount')
                  }}
        </td>
        
        <td style="width: 150px; border: 0px;"></td>
        
        <td style="text-align: left; padding: 5px; border: 1px solid #969696;">
            Present Cash
        </td>
        
        <td style="text-align: center; padding: 5px; border: 1px solid #969696;">
            
            {{ App\Models\Sale::whereBetween('created_at', [$fromDate, $toDate])->sum('grandtotal') 
            
            + App\Models\CutomerPayment::whereBetween('created_at', [$fromDate, $toDate])
                ->whereNotNull('sale_id')
                ->where('is_due_pay', true)
                ->sum('paying_amount') 
                
            + App\Models\AdvancePayment::whereBetween('created_at', [$fromDate, $toDate])
                ->sum('amount')
            
               
              - ($total_due
                
                + App\Models\CutomerPayment::where('payment_method', 'bank')
                         ->whereBetween('created_at', [$fromDate, $toDate])
                         ->with('sale')
                         ->sum('paying_amount')
                 
                 + App\Models\CutomerPayment::whereIn('payment_method', ['bkash', 'rocket', 'nagad'])
                        ->whereBetween('created_at', [$fromDate, $toDate])
                        ->with('sale')
                        ->sum('paying_amount')
                 
                 + App\Models\Sale::whereBetween('created_at', [$fromDate, $toDate])
                                      ->where('other_cost', '>', 0)
                                      ->with('customer')
                                    ->sum('other_cost')
                 
                 + App\Models\CutomerPayment::where('payment_method', 'advance')
                                    ->whereBetween('created_at', [$fromDate, $toDate])
                                      ->with('sale')
                                    ->sum('paying_amount')
                  
                  + App\Models\SaleReturn::whereBetween('created_at', [$fromDate, $toDate])
                                      ->where('paid_amount', '>', 0)
                                      ->with('customer')
                                    ->sum('paid_amount')
                  
                  + App\Models\Expense::whereBetween('created_at', [$fromDate, $toDate])
                            ->with('customer')
                            ->sum('amount'))
            }}
        </td>
    </tr>
    
    <tr>
        <td style="text-align: left; padding: 5px; border: 1px solid #969696;">
            Return
        </td>
        
        <td style="text-align: center; padding: 5px; border: 1px solid #969696;">
                {{
                  App\Models\SaleReturn::whereBetween('created_at', [$fromDate, $toDate])
                                      ->where('paid_amount', '>', 0)
                                      ->with('customer')
                                    ->sum('paid_amount')
                  }}
        </td>
        
        <td style="width: 150px; border: 0px;"></td>
        
        <td></td>
        <td></td>
    </tr>
    
    
    <tr>
        <td style="text-align: left; padding: 5px; border: 1px solid #969696;">
            Expense
        </td>
        
        <td style="text-align: center; padding: 5px; border: 1px solid #969696;">
            {{
                  App\Models\Expense::whereBetween('created_at', [$fromDate, $toDate])
                            ->with('customer')
                            ->sum('amount')
                  }}
        </td>
        <td style="width: 150px; border: 0px;"></td>
        <td></td>
        <td></td>
    </tr>
    
    <tr>
        <td style="text-align: left; padding: 5px; border: 1px solid #969696;">
            Total
        </td>
        
        <td style="text-align: center; padding: 5px; border: 1px solid #969696;">
            {{
                $total_due
                
                + App\Models\CutomerPayment::where('payment_method', 'bank')
                         ->whereBetween('created_at', [$fromDate, $toDate])
                         ->with('sale')
                         ->sum('paying_amount')
                 
                 + App\Models\CutomerPayment::whereIn('payment_method', ['bkash', 'rocket', 'nagad'])
                        ->whereBetween('created_at', [$fromDate, $toDate])
                        ->with('sale')
                        ->sum('paying_amount')
                 
                 + App\Models\Sale::whereBetween('created_at', [$fromDate, $toDate])
                                      ->where('other_cost', '>', 0)
                                      ->with('customer')
                                    ->sum('other_cost')
                 
                 + App\Models\CutomerPayment::where('payment_method', 'advance')
                                    ->whereBetween('created_at', [$fromDate, $toDate])
                                      ->with('sale')
                                    ->sum('paying_amount')
                  
                  + App\Models\SaleReturn::whereBetween('created_at', [$fromDate, $toDate])
                                      ->where('paid_amount', '>', 0)
                                      ->with('customer')
                                    ->sum('paid_amount')
                  
                  + App\Models\Expense::whereBetween('created_at', [$fromDate, $toDate])
                            ->with('customer')
                            ->sum('amount')
            }}
        </td>
        <td></td>
        <td></td>
    </tr>
    
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
