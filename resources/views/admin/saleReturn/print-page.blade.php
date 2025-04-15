@extends('layouts.pdf')

@section('name', 'Sale Return')

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
                            <td style="width: 20%;">
                                Cell No.
                            </td>
                            <td>
                                : {{ $saleReturn->customer?->phone }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%;">
                                Customer Name
                            </td>
                            <td>
                                : {{ $saleReturn->customer?->name }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%;">
                                Company Name
                            </td>
                            <td>
                                : {{ $saleReturn->customer?->company_name }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%; vertical-align: top;">
                                Address
                            </td>
                            <td style="width: 400px;">
                                : {{ $saleReturn->customer?->address }}
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            
            <td style="text-align: right">
                <div style="display: inline-block; text-align: left;">
                    <table>
                        <tr>
                            <td style="width: 50%;">
                                Bill No
                            </td>
                            <td>
                                : {{ $saleReturn->ref_code }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Date
                            </td>
                            <td>
                                : {{ \Carbon\Carbon::parse($saleReturn->date)->format('d-m-Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Time
                            </td>
                            <td>
                                : {{ $saleReturn->created_at->format('H:i') }}
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
    
    <table style="border-collapse: collapse; margin: auto; width: 100%; margin-top: 8px;" cellspacing="0" class="border">
        <tbody>
            <tr style="height: 20pt;">
                <td
                    style="
                        width: 43pt;
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
                    "
                    bgcolor="#EFEFEF"
                >
                    <p class="s2" style="padding: 3px 0px; text-indent: 0pt; text-align: center;">SL No.</p>
                </td>
                <td
                    style="
                        width: 56pt;
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
                    "
                    bgcolor="#EFEFEF"
                >
                    <p class="s2" style="padding: 3px 0px; text-indent: 0pt; text-align: center;">Item Code</p>
                </td>
                <td
                    style="
                        width: 218pt;
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
                    "
                    bgcolor="#EFEFEF"
                >
                    <p class="s2" style="padding: 3px 0px; text-indent: 0pt; text-align: center;">Particulars</p>
                </td>
                <td
                    style="
                        width: 46pt;
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
                    "
                    bgcolor="#EFEFEF"
                >
                    <p class="s2" style="padding: 3px 0px; padding-left: 1pt; text-indent: 0pt; text-align: center;">Unit</p>
                </td>
                <td
                    style="
                        width: 70pt;
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
                    "
                    bgcolor="#EFEFEF"
                >
                    <p class="s2" style="padding: 3px 0px; padding-left: 1pt; text-indent: 0pt; text-align: center;">Unit Amount</p>
                </td>
                <td
                    style="
                        width: 100pt;
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
                    "
                    bgcolor="#EFEFEF"
                >
                    <p class="s2" style="padding: 3px 0px; padding-left: 1pt; text-indent: 0pt; text-align: center;">Total Amount(Tk)</p>
                </td>
            </tr>
            @foreach ($saleReturn->items as $item)
                <tr style="height: 17pt;">
                    <td>
                        <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">{{ $loop->iteration }}</p>
                    </td>
                    <td
                    >
                        <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">
                            {{ $item->product?->code }}
                        </p>
                    </td>
                    <td
                    >
                        <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: left;">
                            {{ $item->product?->name }}
                        </p>
                    </td>
                    <td
                    >
                        <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                            {{ $item->quantity }}
                        </p>
                    </td>
                    <td>
                        <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                        {{ $item->price }}
                        </p>
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
                <td>
                    <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Total
                    </p>
                </td>
                <td style="text-align: center;">
                    <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    {{ $saleReturn->items->sum('sub_total') }}
                    </p>
                </td>
            </tr>
            <tr>
                <td style="border: none;"></td>
                <td style="border: none;"></td>
                <td style="border: none;"></td>
                <td style="border: none;"></td>
                <td>
                    <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Paid Amount
                    </p>
                </td>
                <td style="text-align: center;">
                    <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    {{ $saleReturn->paid_amount }}
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <h1 style="padding: 4px; text-indent: 0pt; text-align: left;">In Word: {{ numberToWords($saleReturn->grandtotal) }} Taka Only.</h1>

    @if ($saleReturn->note)
        <p>
            <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: left;">
            Note: {{ $saleReturn->note }}
            </p>
        </p>
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
        {{ $saleReturn->user?->name }}
        <br>
        _______________
        <br>
        for CAPITAL LIFT
    </td>
@endsection


