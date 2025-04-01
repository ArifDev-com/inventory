@extends('layouts.pdf')

@section('name', 'Specific Product Report')

@section('content')
    <style>
        .main tbody td {
            padding: 5px !important;
        }
    </style>
    @php
        $product = \App\Models\Product::findOrFail(request()->product_id);
    @endphp
    <div class="row" style="margin-top: 30px;">
        <div class="col-lg-12">
            <b>Date : {{ request()->from_date }} to {{ request()->to_date }}</b> <br>
            <b>Product Name : {{ $product->name }}</b> <br>
            <b>Item Code : {{ $product->code }}</b> <br>
        </div>
    </div>
    <table style="border-collapse: collapse; margin: auto; width: 100%; margin-top: 5px" cellspacing="0" class="border main">
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
                    <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">
                        Date
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
                    <p class="s2" style="padding: 5px; text-indent: 0pt; text-align: center;">
                        Quantity
                    </p>
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
                        Added Qty
                    </p>
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
                        Sale Qty
                    </p>
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
                        Purchase Qty
                    </p>
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
                        Current Qty
                    </p>
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data ?? [] as $key => $sale)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $key }}</td>
                    <td>{{ $sale['start_quantity'] }}</td>
                    <td>{{ $sale['add_quantity'] }}</td>
                    <td>{{ $sale['sales'] }}</td>
                    <td>{{ $sale['purchase_quantity'] }}</td>
                    <td>{{ $sale['end_quantity'] }}</td>
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

