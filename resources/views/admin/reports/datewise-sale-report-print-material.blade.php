@extends('layouts.pdf')

@section('name', 'Material Order Reports')
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
  <thead>
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
                        width: 60px;
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
                    Item Code
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
                    Products
                </p>
            </td>
            <td style="
                        width: 60px;
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
                    Sell Qty
                </p>
            </td>
            <td style="
                        width: 60px;
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
                    Remarks
                </p>
            </td>
        </tr>
  </thead>
  <tbody>
        @php
            $total_qty = 0;
      		$index = 1;
            $ids = [];
            $products = \App\Models\Product::orderBy('code')->get();
        @endphp
        {{-- @foreach ($sales as $sale)
        @foreach ($sale->items as $detail)
            @php
                if($ids[$detail->product_id] ?? null)
                    $ids[$detail->product_id]++;
                else
                    $ids[$detail->product_id] = $detail->quantity;
            @endphp
        @endforeach
        @endforeach --}}
        @foreach($products as $product)
        @php
            $qty = 0;
            foreach($sales as $sale)
                $qty += $sale->items->where('product_id', $product->id)->sum('quantity');
        @endphp
        @if($qty > 0)
      		<tr style="height: 17pt;">
      		 <td>
                <p class="s2" style="padding: 4px; text-indent: 0pt; text-align: center;">
                    {{ $loop->iteration }}
                </p>
             </td>
                <td>
                    <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                        {{ $product->code }}
                    </p>
                </td>
                <td>
                    <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: left;">
                        {{ $product->name }}
                    </p>
                </td>
                <td>
                    <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                        {{ $qty ?? 0 }}
                    </p>
                </td>
                <td>
                    <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">

                    </p>
                </td>
            </tr>
            @php
                $total_qty += $qty;
            @endphp
        @endif
        @endforeach
        <tr style="height: 17pt;">
            <td colspan="3" style="text-align: right;">
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: right;">
                    Total
                </p>
            </td>
            <td>
                <p class="s2" style="padding: 4px; padding-left: 2pt; text-indent: 0pt; text-align: center;">
                    {{ $total_qty }}
                </p>
            </td>
            <td></td>
        </tr>
    </tbody>
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
