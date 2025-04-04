@extends('layouts.pdf')

@section('name', 'Product added report')

@section('content')
    <table style="margin-top: 50px;">
        <tr>
            <td>
                Date: {{ $fromDate }} to {{ $toDate }}
            </td>
            <td style="text-align: right;">
                Time: {{ now()->format('h:i A') }}
            </td>
        </tr>
    </table>
    <table style="border-collapse: collapse; margin: auto; width: 100%; margin-top: 5px" cellspacing="0" class="border">
        <thead>
            <tr style="height: 20pt;">
                <td
                    style="
                        width: 36pt;
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
                    <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">S.L</p>
                </td>
                <td
                    style="
                        width: 66pt;
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
                    <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">Date</p>
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
                    <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">Item Code</p>
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
                    <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">Product Name</p>
                </td>
                <td
                    style="
                        width: 50pt;
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
                    <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                        Quantity
                    </p>
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($updates as $update)
                <tr style="height: 17pt;">
                    <td style="padding: 5px">
                        {{ $loop->iteration }}
                    </td>
                    <td style="padding: 5px">
                        {{ $update->created_at->format('d-m-Y') }}
                    </td>
                    <td style="padding: 5px">
                        {{ $update->product->code }}
                    </td>
                    <td style="text-align: left; padding: 5px;">
                        {{ $update->product->name }}
                    </td>
                    <td style="padding: 5px">
                        {{ $update->quantity }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('footer')
    <td style="text-align: center; opacity: 0;">
        _______________
        <br>
        Received by
    </td>
    <td style="text-align: center ; opacity: 0;">
        SOLD GOODS ARE NOT TAKEN BACK
    </td>
    <td style="text-align: center;">
        <div>
            {{-- {{ auth()->user()?->name }} --}}
        </div>
        <div style="border-top: 2px solid #000; margin-top: 3px;">
            for CAPITAL LIFT
        </div>
    </td>
@endsection

