@extends('layouts.pdf')

@section('name', 'Advance paid')

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
                            <td style="width: 26%;">
                                Cell No.
                            </td>
                            <td>
                                :
                                {{ $payment->customer?->phone }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 26%;">
                                Customer name
                            </td>
                            <td>
                                : {{ $payment->customer?->name }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 26%;">
                                Company name
                            </td>
                            <td>
                                : {{ $payment->customer?->company_name }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 26%;">
                                Address
                            </td>
                            <td>
                                : {{ $payment->customer?->address }}
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
                                Date
                            </td>
                            <td>
                                : {{ \Carbon\Carbon::parse($payment->date)->format('d-m-Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Time
                            </td>
                            <td>
                                : {{ $payment->created_at->format('H:i') }}
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
    <table style="border-collapse: collapse; margin: auto; width: 100%; margin-top: 10px" cellspacing="0" class="border">
        <tbody>
            <tr style="height: 17pt;">
                <td bgcolor="#EFEFEF" style="width: 50%; padding: 5px">

                        Previous Advance

                </td>
                <td>
                    {{ $payment->customer?->advance - $payment->amount }}
                </td>
            </tr>
            <tr style="height: 17pt;">
                <td bgcolor="#EFEFEF" style="width: 50%; padding: 5px">

                        Paid Amount

                </td>
                <td>
                    {{ $payment->amount }}
                </td>
            </tr>
            <tr style="height: 17pt;">
                <td bgcolor="#EFEFEF" style="width: 50%; padding: 5px">

                        Current Advance

                </td>
                <td>
                    {{ $payment->customer?->advance }}
                </td>
            </tr>
        </tbody>
    </table>
    @if ($payment->note)
        <h1 style="padding-top: 4px; text-indent: 0pt; text-align: left;">
            Note: {{ $payment->note }}
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
        {{ $payment->user?->name }}
        <br>
        _______________
        <br>
        for CAPITAL LIFT
    </td>
@endsection


