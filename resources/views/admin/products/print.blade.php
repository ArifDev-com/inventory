@extends('layouts.pdf')

@section('name', $active ? 'Active Products' : 'Inactive Products')

@section('content')
    <table style="margin-top: 30px;">
        <tr>
            <td>
                Date: {{ now()->format('d-m-Y') }}
            </td>
            <td style="text-align: right;">
                Time: {{ now()->format('h:i A') }}
            </td>
        </tr>
    </table>
    
    <style>
        .ac_fs *{
            font-size: 11px;
        }
    </style>
    
    <table style="border-collapse: collapse; margin: auto; width: 100%; margin-top: 4px" cellspacing="0" class="border ac_fs">
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
                    <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">S.L</p>
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
                    <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">Item Code</p>
                </td>
                <td
                    style="
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
                    <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">Product Name</p>
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
                    <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                        Quantity
                    </p>
                </td>
                <td
                    style="
                        width: 80pt;
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
                    <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                        W. Price
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
                    <p class="s2" style="padding: 4px; padding-left: 1pt; text-indent: 0pt; text-align: center;">
                        R. Price
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
                        Price
                    </p>
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr style="height: 17pt;">
                    <td style="padding: 3px; color: #383838;">
                        {{ $loop->iteration }}
                    </td>
                    <td style="padding: 3px; color: #383838;">
                        {{ $product->code }}
                    </td>
                    <td style="text-align: left; padding: 3px; color: #383838;">
                        {{ $product->name }}
                    </td>
                    <td style="padding: 3px; color: #383838;">
                        {{ $product->current_stock }}
                    </td>
                    <td style="padding: 3px; color: #383838;">
                        {{ $product->wholesale_price }}
                    </td>
                    <td style="padding: 3px; color: #383838; text-align: center;">
                        {{ $product->retail_price }}
                    </td>
                    <td style="padding: 3px; color: #383838; text-align: center;">
                        {{ $product->price }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" style="text-align: right;">
                    Total
                </td>
                <td>
                    {{ $products->sum('current_stock') }}
                </td>
                <td>
                    {{ $products->sum('wholesale_price') }}
                </td>
                <td>
                    {{ $products->sum('retail_price') }}
                </td>
                <td>
                    {{ $products->sum('price') }}
                </td>
            </tr>
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
        <div style="border-top: 1px solid #000; margin-top: 3px;">
            CAPITAL LIFT
        </div>
    </td>
@endsection

