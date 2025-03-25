@extends('layouts.pdf')

@section('name', 'Bill')

@section('content')
<table>
    <tr>
        <td>
            <div>
                <table>
                    <tr>
                        <td style="width: 30%">
                            Cell No.
                        </td>
                        <td>
                            :
                            {{ $sale->customer?->phone }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 30%">
                            Customer Name
                        </td>
                        <td>
                            : {{ $sale->customer?->name }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 30%">
                            Company Name
                        </td>
                        <td>
                            : {{ $sale->customer?->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 30%">
                            Address
                        </td>
                        <td>
                            : {{ $sale->customer?->address }}
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <td style="text-align: right">
            <div style="
                    display: inline-block;
                    text-align: left;
                ">
                <table>
                    <tr>
                        <td>
                            Bill No
                        </td>
                        <td>
                            : {{ $sale->ref_code }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Date
                        </td>
                        <td>
                            : {{ \Carbon\Carbon::parse($sale->date)->format('d-m-Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Time
                        </td>
                        <td>
                            : {{ $sale->created_at->format('H:i') }}
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>
<table style="border-collapse: collapse; margin: auto; width: 100%; margin-top: 20px; border: 1px solid #969696;" cellspacing="0" class="border">
    <tbody>
        <tr style="height: 20pt;">
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
                <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">SL No.</p>
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
                <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">Item Code</p>
            </td>
            <td style="
                        width: 30%;
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
                <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">Particulars</p>
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
                <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">Unit</p>
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
                <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">Unit Amount
                </p>
            </td>
            <td style="
                        width: 20%;
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
                <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">Total
                    Amount(Tk)</p>
            </td>
        </tr>
        @foreach ($sale->items as $item)
        <tr style="height: 17pt;">
            <td>
                <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">{{ $loop->iteration }}</p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">
                    {{ $item->product->code }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: left;">
                    {{ $item->product->name }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    {{ $item->quantity }}
                </p>
            </td>
            <td>
                {{ $item->price }}
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    {{ $item->price * $item->quantity }}
                </p>
            </td>
        </tr>
        @endforeach
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="padding: 5px">
                Sub Amount
            </td>
            <td style="text-align: center;">
                {{ $sale->items->sum('sub_total') }}
            </td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="padding: 5px">
                Other Cost
            </td>
            <td style="text-align: center;">
                {{ $sale->other_cost }}
            </td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none; text-align: right; padding: 0;">
                <div
                    style="width: 100px; border: 1px solid #969696; margin: 0; padding: 5px;display: inline-block; border-right: none;">
                    <div style="text-align: center;">
                        Previous Due
                    </div>
                </div>
            </td>
            <td>
                {{ $sale->customer?->sales()->where('id', '!=', $sale->id)->sum('due_amount') }}
            </td>
            <td>
                Discount
            </td>
            <td style="text-align: center;">
                {{ $sale->discount ?: 0 }}
            </td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none; text-align: right; padding: 0;">
                <div
                    style="width: 100px; border: 1px solid #969696; margin: 0; padding: 5px;display: inline-block; border-right: none; border-top: none;">
                    <div style="text-align: center;">
                        Add Due
                    </div>
                </div>
            </td>
            <td>
                {{ $sale->due_amount }}
            </td>
            <td>
                Total
            </td>
            <td style="text-align: center;">
                {{ $sale->grandtotal }}
            </td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>

            <td style="border: none; text-align: right; padding: 0;">
                <div
                    style="width: 100px; border: 1px solid #969696; margin: 0; padding: 5px;display: inline-block; border-right: none; border-top: none; border-bottom: none;">
                    <div style="text-align: center;">
                        Total Due
                    </div>
                </div>
            </td>
            <td>
                {{ $sale->customer?->sales()->sum('due_amount') }}
            </td>
            <td>
                Paid Amount
            </td>
            <td style="text-align: center;">
                {{ $sale->paid_amount }}
            </td>
        </tr>
    </tbody>
</table>
<h1 style="padding-top: 4px; text-indent: 0pt; text-align: left;">In Word: {{ numberToWords($sale->grandtotal) }} Taka
    Only.</h1>

@if ($sale->note)
<h1 style="padding-top: 4px; text-indent: 0pt; text-align: left;">
    Note: {{ $sale->note }}
</h1>
@endif
@endsection
@section('footer')
<td style="text-align: center;">
    _______________
    <br>
    Received by
</td>
<td style="text-align: center;">
    SOLD GOODS ARE NOT TAKEN BACK
</td>
<td style="text-align: center;">
    {{ $sale->user?->name }}
    <br>
    _______________
    <br>
    for CAPITAL LIFT
</td>
@endsection