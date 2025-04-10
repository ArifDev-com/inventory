@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>{{ trans('sidebar.sale.body.sales list') }}</h4>
                <h6>{{ trans('sidebar.sale.body.manage your sales') }}</h6>
            </div>
            <div class="page-btn">
                <a href="{{ route('sale.create') }}" class="btn btn-added"><img
                        src="{{ asset('backend') }}/img/icons/plus.svg" alt="img" class="me-1">{{
                    trans('sidebar.sale.body.add sale') }}</a>
            </div>
        </div>

        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Inv. No.</th>
                                <th>{{ trans('table.sale.date') }}</th>
                                <th>{{ trans('table.sale.customer') }}</th>
                                <th  style="width: 40px !important;">P. Type</th>
                                <th>{{ trans('table.sale.total') }}</th>
                                {{-- <th>Discount</th>
                                <th>Other Cost</th> --}}
                                <th>{{ trans('table.sale.paid') }}</th>
                                <th>{{ trans('table.sale.due') }}</th>
                                <th>Due Date</th>
                                <th>{{ trans('table.sale.biller') }}</th>
                                <th class="text-center">{{ trans('table.sale.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $key => $sale)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td >{{ $sale->ref_code }}</td>
                                <td>{{ $sale->date }}</td>
                                <td style="text-align: left;">
                                    <a href="{{ route('customer.show', ['customer' => $sale->customer->id]) }}">
                                        {{ $sale->customer?->name }}
                                    </a>
                                </td>
                                <td>
                                    <div style="width: 100px; word-wrap: break-word; overflow: hidden;">
                                        {{ join(', ', $sale->payments->pluck('payment_method')->toArray()) }}
                                    </div>
                                </td>
                                <td>{{ $sale->grandtotal }}</td>
                                {{-- <td>{{ $sale->discount }}</td>
                                <td>{{ $sale->other_cost }}</td> --}}
                                <td>{{ $sale->paid_amount }}</td>
                                <td class="text-red">{{ $sale->due_amount }}</td>
                                <td>{{ $sale->due_date }}</td>
                                <td style="text-align: left;">
                                    {{ $sale->user?->first_name . ' ' . $sale->user?->last_name }}
                                    {{-- @dump($sale->cancel_requested) --}}
                                    @if($sale->cancel_requested)
                                    <br>
                                    <span class="badge bg-danger">Cancel Pending</span>
                                    @endif
                                    {{-- @dump($sale->returns->first()?->status) --}}
                                    @if($sale->returns->count())
                                    <br>
                                        @if ($sale->returns()->orderBy('id', 'desc')->first()->status == 'received')
                                        <span class="badge bg-info">Return Approved</span>
                                        @else
                                        <span class="badge bg-warning">Return Pending</span>
                                        @endif
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a
                                        class="btn btn-primary btn-sm text-white" target="_blank"
                                        href="{{ route('sale.pdf', [$sale->id]) }}"
                                        onclick="window.open('{{ route('sale.challan.pdf', [$sale->id]) }}', '_blank')"
                                        >
                                        <i class="fa fa-print"></i> Print 
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#example').DataTable({
        pageLength: 100,
    });

    @if (session()->has('return_id'))
        window.open("{{ route('sale.return.pdf', [session()->get('return_id')]) }}", '_blank');
    @elseif (session()->has('sale_id'))
        window.open("{{ route('sale.pdf', [session()->get('sale_id')]) }}", '_blank');
        window.open("{{ route('sale.challan.pdf', [session()->get('sale_id')]) }}", '_blank');
    @endif
</script>
@endsection
