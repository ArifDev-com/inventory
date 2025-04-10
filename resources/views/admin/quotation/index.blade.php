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
                <h4>Quotation List</h4>
                <h6>Manage your Quotations</h6>
            </div>
            <div class="page-btn">
                {{-- <a href="{{ route('quotation.create') }}" class="btn btn-added">
                    <img src="{{asset('backend')}}/img/icons/plus.svg" alt="img" class="me-2"> Add Quotation
                </a> --}}
            </div>
        </div>


        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
                @if (session()->has('delete'))
                <div class="alert alert-danger">
                    {{ session()->get('delete') }}
                </div>
                @endif
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>
                                    ID
                                </th>
                                <th>Date</th>
                                <th>Custmer</th>
                                <th>Items</th>
                                <th>Total</th>
                                <th>By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quotations as $key => $quotation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $quotation->id }}</td>
                                <td>{{ $quotation->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('customer.show', $quotation->customer?->id ?? 0) }}">
                                        {{ $quotation->customer?->name ?? 'N/A' }}
                                    </a>
                                </td>
                                <td style="width: 400px;">
                                    <table class="" style="width: 100%;">
                                        <thead style="background: none; border: none;">
                                            <tr style="background-color: none;">
                                                <th style="border: 1px solid gray;">Product</th>
                                                <th style="border: 1px solid gray;">Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($quotation->items as $item)
                                            <tr>
                                                <td style="border: 1px solid gray; text-align: left;">{{
                                                    $item->product?->name }}</td>
                                                <td style="border: 1px solid gray; width: 70px">{{ $item->quantity }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                                <td>{{ $quotation->grandtotal }}</td>
                                <td>{{ $quotation->user?->name }}</td>
                                <td class="text-center">
                                    <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown"
                                        aria-expanded="true">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('quotation.print', $quotation->id) }}" target="_blank"
                                                class="dropdown-item confirm-text">
                                                View
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('sale.create', ['quotation_id' => $quotation->id]) }}"
                                                class="dropdown-item confirm-text">
                                                Move to Sales
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('quotation.print', $quotation->id) }}" target="_blank"
                                                class="dropdown-item confirm-text">
                                                Print
                                            </a>
                                        </li>
                                        @if (auth()->user()->user_role == 'superadmin' || auth()->user()->user_role ==
                                        'admin')
                                        <li>
                                            <a href="{{ route('quotation.delete', $quotation->id) }}"
                                                class="dropdown-item confirm-text">
                                                Delete
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>

<script>
    $('#example').DataTable({ pageLength: 100});
    @if (request()->get('quotation_id'))
        window.open("{{ route('quotation.print', request()->get('quotation_id')) }}", '_blank');
        window.location.href = "{{ route('quotation.index') }}";
    @endif
</script>
@endsection