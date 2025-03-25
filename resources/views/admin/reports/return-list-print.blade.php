@extends('layouts.app')

@section('content')
<div class="table-responsive">
    <table class="table " id="example">
        <thead>
            <tr>
                <th>Sl</th>
                <th>ID</th>
                <th>Date</th>
                <th>Customer</th>
                {{-- <th>Payment</th> --}}
                <th>Items</th>
                <th>Total</th>
                <th>Paid</th>
                <th>By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($saleReturns as $key => $saleReturn)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $saleReturn->id }}</td>
                <td>{{ $saleReturn->date }}</td>
                <td>{{ $saleReturn->customer->name }}</td>

                {{-- <td>
                    <span class="badges bg-lightgreen">{{ $saleReturn->payment_type }}</span>
                </td> --}}
                <td style="width: 400px;">
                    <table class="" style="width: 100%;">
                        <thead style="background: none; border: none;">
                            <tr style="background-color: none;">
                                <th style="border: 1px solid gray;">Product</th>
                                <th style="border: 1px solid gray;">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($saleReturn->items as $item)
                            <tr>
                                <td style="border: 1px solid gray; text-align: left;">{{ $item->product?->name }}</td>
                                <td style="border: 1px solid gray; width: 70px">{{ $item->quantity }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </td>
                <td>{{ $saleReturn->grandtotal }}</td>
                <td>{{ $saleReturn->paid_amount }}</td>
                <td>
                    {{ $saleReturn->user?->name }}
                </td>
                <td>
                    <a href="{{ route('sale.return.pdf', $saleReturn->id) }}" class="btn btn-primary">View</a>
                </td>
            </tr>
         @endforeach

    </table>
</div>

@endsection
