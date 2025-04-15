@extends('layouts.pdf')

@section('name', 'Quotation')

@section('content')
<style>
    .c_info td {color: #383838; font-size: 14px;}
</style>

<table class="c_info">
    <tr>
        <td>
            <div>
                <table>
                    <tr>
                        <td style="width: 20%">
                            Cell No.
                        </td>
                        <td>
                            :
                            {{ $quotation->customer?->phone }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%">
                            Customer Name
                        </td>
                        <td>
                            : {{ $quotation->customer?->name }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%">
                            Company Name
                        </td>
                        <td>
                            : {{ $quotation->customer?->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%; vertical-align: top;">
                            Address
                        </td>
                        <td style="width: 400px;">
                            : {{ $quotation->customer?->address }}
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
                            Quotation No
                        </td>
                        <td>
                            : {{ $quotation->ref_code }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Date
                        </td>
                        <td>
                            : {{ \Carbon\Carbon::parse($quotation->date)->format('d-m-Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Time
                        </td>
                        <td>
                            : {{ $quotation->created_at->format('H:i') }}
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>
<table style="border-collapse: collapse; margin: auto; width: 100%; margin-top: 8px; border: 1px solid #969696;" cellspacing="0" class="border">
    <tbody>
        <tr style="height: 16pt;">
            <td style="
                        width: 7%;
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
                <p class="s2" style="padding: 3px 0px; text-indent: 0pt; text-align: center;">SL No.</p>
            </td>
            <td style="
                        width: 10%;
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
                <p class="s2" style="padding: 3px 0px; text-indent: 0pt; text-align: center;">Item Code</p>
            </td>
            <td style="
                        width: 42%;
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
                <p class="s2" style="padding: 3px 0px; text-indent: 0pt; text-align: center;">Particulars</p>
            </td>
            <td style="
                        width: 12%;
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
                <p class="s2" style="padding: 3px 0px; padding-left: 1pt; text-indent: 0pt; text-align: center;">Unit</p>
            </td>
            <td style="
                        width: 13%;
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
                <p class="s2" style="padding: 3px 0px; padding-left: 1pt; text-indent: 0pt; text-align: center;">Unit Amount
                </p>
            </td>
            <td style="
                        width: 14%;
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
                <p class="s2" style="padding: 3px 0px; padding-left: 1pt; text-indent: 0pt; text-align: center;">Total Amn.(Tk)</p>
            </td>
        </tr>
        @foreach ($quotation->items as $item)
        <tr style="height: 17pt;">
            <td>
                <p class="s2" style="padding: 3px 0px; text-indent: 0pt; text-align: center;">{{ $loop->iteration }}</p>
            </td>
            <td>
                <p class="s2" style="padding: 3px 0px; text-indent: 0pt; text-align: center;">
                    {{ $item->product->code }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px 0px; padding-left: 2pt; text-indent: 0pt; text-align: left;">
                    {{ $item->product->name }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px 0px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    {{ $item->quantity }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px 0px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                {{ $item->price }}
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 3px 0px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
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
            <td style="padding: 5px 0px">
                <p class="s2">
                Sub Amount
                </p>
            </td>
            <td style="text-align: center;">
                <p class="s2">
                {{ $quotation->items->sum('sub_total') }}
                </p>
            </td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="padding: 5px 0px">
                <p class="s2">
                Other Cost
                </p>
            </td>
            <td style="text-align: center;">
                <p class="s2">
                {{ $quotation->other_cost }}
                </p>
            </td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;">

            </td>
            <td style="border: none;">

            </td>
            <td style="padding: 5px 0px">
                <p class="s2">
                Discount
                </p>
            </td>
            <td style="text-align: center;">
                <p class="s2">
                {{ $quotation->discount ?: 0 }}
                </p>
            </td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none; ">

            </td>
            <td style="border: none;">

            </td>
            <td style="padding: 5px 0px">
                <p class="s2">
                Total
                </p>
            </td>
            <td style="text-align: center;">
                <p class="s2">
                {{ $quotation->grandtotal }}
                </p>
            </td>
        </tr>
    </tbody>
</table>
<h1 style="padding-top: 4px; text-indent: 0pt; text-align: left;">
    In Word: {{ numberToWords($quotation->grandtotal) }} Taka Only.
</h1>
@if ($quotation->note)
<h1 style="padding-top: 4px; text-indent: 0pt; text-align: left;">
    Note: {{ $quotation->note }}
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
    {{ $quotation->user?->name }}
    <br>
    _______________
    <br>
    CAPITAL LIFT
</td>
@endsection