@extends('layouts.pdf')

@section('name', 'Customer List')
@section('content')
<table style="border-collapse: collapse; margin: auto; width: 100%; margin-top: 50px" cellspacing="0" class="border">
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
                <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">
                    SL No.
                </p>
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
                <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">
                    Client Name
                </p>
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
                <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">
                    Company Name
                </p>
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
                <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Contact
                </p>
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
                <p class="s2" style="padding: 5px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                    Address
                </p>
            </td>
        </tr>
        @foreach ($customers as $customer)
            <tr style="height: 17pt;">
                <td>
                    <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">{{ $loop->iteration }}</p>
                </td>
                <td
                >
                    <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">
                        {{ $customer->name }}
                    </p>
                </td>
                <td
                >
                    <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: left;">
                        {{ $customer->company_name }}
                    </p>
                </td>
                <td
                >
                    <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                        {{ $customer->phone }}
                    </p>
                </td>
                <td
                >
                    {{ $customer->address }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
