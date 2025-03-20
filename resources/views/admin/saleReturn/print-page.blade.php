@extends('layouts.pdf')

@section('name', 'Sale Return')

@section('content')
    <table>
        <tr>
            <td>
                <div>
                    <p style="padding-left: 8pt; text-indent: 0pt; line-height: 14pt; text-align: left;">Cell No. : {{ $saleReturn->customer?->phone }}</p>

                    <p style="padding-left: 9pt; text-indent: 0pt; line-height: 14pt; text-align: left;">Customer Name : <span class="s1">{{ $saleReturn->customer?->name }} </p>
                    <p style="padding-left: 9pt; text-indent: 0pt; line-height: 14pt; text-align: left;">Company Name : <span class="s1"> {{ $saleReturn->customer->company_name }} </span></p>
                    <p style="padding-bottom: 1pt; padding-left: 10pt; text-indent: 0pt; line-height: 14pt; text-align: left;">Address : <span class="s1">{{ $saleReturn->customer->address }}</span></p>
                </div>
            </td>
            <td style="">
                <div style="
                    display: inline-block;
                    padding-left: 300px
                ">
                    <div>
                        Return No. : {{ $saleReturn->ref_code }}
                    </div>
                    <div>
                        Bill No. : {{ $saleReturn->sale?->ref_code }}
                    </div>
                    <div>
                        Date: {{ \Carbon\Carbon::parse($saleReturn->date)->format('d-m-Y') }}
                    </div>
                    <div>
                        Time: {{ $saleReturn->created_at->format('H:i') }}
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <table style="border-collapse: collapse; margin: auto; width: 100%; margin-top: 20px" cellspacing="0" class="border">
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
                    <p class="s2" style="padding-top: 3pt; text-indent: 0pt; text-align: center;">SL No.</p>
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
                    <p class="s2" style="padding-top: 3pt; text-indent: 0pt; text-align: center;">Item Code</p>
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
                    <p class="s2" style="padding-top: 3pt; text-indent: 0pt; text-align: center;">Particulars</p>
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
                    <p class="s2" style="padding-top: 3pt; padding-left: 1pt; text-indent: 0pt; text-align: center;">Unit</p>
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
                    <p class="s2" style="padding-top: 3pt; padding-left: 1pt; text-indent: 0pt; text-align: center;">Unit Amount</p>
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
                    <p class="s2" style="padding-top: 3pt; padding-left: 1pt; text-indent: 0pt; text-align: center;">Total Amount(Tk)</p>
                </td>
            </tr>
            @foreach ($saleReturn->items as $item)
                <tr style="height: 17pt;">
                    <td
                    >
                        <p class="s2" style="padding-top: 1pt; text-indent: 0pt; text-align: center;">{{ $loop->iteration }}</p>
                    </td>
                    <td
                    >
                        <p class="s2" style="padding-top: 1pt; text-indent: 0pt; text-align: center;">
                            {{ $item->product->code }}
                        </p>
                    </td>
                    <td
                    >
                        <p class="s2" style="padding-top: 1pt; padding-left: 2pt; text-indent: 0pt; text-align: left;">
                            {{ $item->product->name }}
                        </p>
                    </td>
                    <td
                    >
                        <p class="s2" style="padding-top: 1pt; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                            {{ $item->quantity }}
                        </p>
                    </td>
                    <td
                    >
                        <p class="s2" style="padding-top: 1pt; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                            {{ $item->price }}
                        </p>
                    </td>
                    <td
                    >
                        <p class="s2" style="padding-top: 1pt; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                            {{ $item->sub_total }}
                        </p>
                    </td>
                </tr>
            @endforeach
            {{-- <tr>
                <td style="border: none;"></td>
                <td style="border: none;"></td>
                <td style="border: none;"></td>
                <td style="border: none;"></td>
                <td>
                    Sub Amount
                </td>
                <td style="text-align: center;">
                    {{ $saleReturn->items->sum('sub_total') }}
                </td>
            </tr> --}}
            <tr>
                <td style="border: none;"></td>
                <td style="border: none;"></td>
                <td style="border: none;"></td>
                <td style="border: none;"></td>
                <td>
                    Total
                </td>
                <td style="text-align: center;">
                    {{ $saleReturn->grandtotal }}
                </td>
            </tr>
            {{-- <tr>
                <td style="border: none;"></td>
                <td style="border: none;"></td>
                <td style="border: none;"></td>
                <td style="border: none;"></td>
                <td>
                    Paid Amount
                </td>
                <td style="text-align: center;">
                    {{ $saleReturn->paid_amount }}
                </td>
            </tr> --}}
        </tbody>
    </table>
    <h1 style="padding-top: 1pt; padding-left: 10pt; text-indent: 0pt; text-align: left;">In Word: {{ numberToWords($saleReturn->grandtotal) }} Taka Only</h1>

    @if ($saleReturn->note)
        <p>
            Note: {{ $saleReturn->note }}
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


