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
                            src="{{ asset('backend') }}/img/icons/plus.svg" alt="img"
                            class="me-1">{{ trans('sidebar.sale.body.add sale') }}</a>
                </div>
            </div>


            <!-- /product list -->
            <div class="card">
                <div class="card-body">
                    {{-- <div class="table-top">
                    <div class="search-set">
                        <div class="search-path">
                            <a class="btn btn-filter" id="filter_search">
                                <img src="{{asset('backend')}}/img/icons/filter.svg" alt="img">
                                <span><img src="{{asset('backend')}}/img/icons/closes.svg" alt="img"></span>
                            </a>
                        </div>
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="{{asset('backend')}}/img/icons/search-white.svg" alt="img"></a>
                        </div>
                    </div>
                    <div class="wordset">
                        <ul>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="{{asset('backend')}}/img/icons/pdf.svg" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="{{asset('backend')}}/img/icons/excel.svg" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="{{asset('backend')}}/img/icons/printer.svg" alt="img"></a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                    <!-- /Filter -->
                    {{-- <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Reference No">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Completed</option>
                                        <option>Paid</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <a class="btn btn-filters ms-auto"><img src="{{asset('backend')}}/img/icons/search-whites.svg" alt="img"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                    <!-- /Filter -->
                    <div class="table-responsive">
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th>
                                        {{-- <label class="checkboxs">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmarks"></span>
                                    </label> --}}
                                    </th>
                                    <th>Sl</th>
                                    <th>Invoice No</th>
                                    <th>{{ trans('table.sale.date') }}</th>
                                    <th>{{ trans('table.sale.customer') }}</th>
                                    <th>{{ trans('table.sale.payment') }}</th>
                                    <th>{{ trans('table.sale.total') }}</th>
                                    <th>Discount</th>
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
                                        <td>
                                            {{-- <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label> --}}
                                        </td>
                                        <td>{{ $key + 1 }}</td>
                                        <td class="" style="font-size: 13px;">{{ $sale->ref_code }}</td>
                                        <td>{{ $sale->date }}</td>
                                        <td>{{ $sale->customer?->name }}</td>
                                        <td><span class="badges bg-lightgreen">{{ $sale->payment_type }}</span></td>
                                        <td>{{ $sale->grandtotal }}</td>
                                        <td>{{ $sale->discount }}</td>
                                        <td>{{ $sale->paid_amount }}</td>
                                        <td class="text-red">{{ $sale->due_amount }}</td>
                                        <td>{{ $sale->due_date }}</td>
                                        <td>{{ $sale->user?->first_name . ' ' . $sale->user?->last_name }}</td>
                                        <td class="text-center">
                                            <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown"
                                                aria-expanded="true">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{ route('sale.pdf', [$sale->id]) }}"
                                                        class="dropdown-item"><img
                                                            src="{{ asset('backend') }}/img/icons/download.svg"
                                                            class="me-2" alt="img">Print Invoice</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('sale.challan.pdf', [$sale->id]) }}"
                                                        class="dropdown-item"><img
                                                            src="{{ asset('backend') }}/img/icons/download.svg"
                                                            class="me-2" alt="img">Print Challan</a>
                                                </li>
                                                @if (auth()->user()->user_role == 'admin')
                                                    <li>
                                                        <a href="{{ route('sale.delete', $sale->id) }}"
                                                            class="dropdown-item confirm-text"><img
                                                                src="{{ asset('backend') }}/img/icons/delete1.svg"
                                                                class="me-2"
                                                                alt="img">{{ trans('table.sale.delete sale') }}</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {!! $sales->links() !!} --}}
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>
    </div>

    <script>
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
        });

        @if (session()->has('sale_id'))
            window.open("{{ route('sale.pdf', [session()->get('sale_id')]) }}", '_blank');
            window.open("{{ route('sale.challan.pdf', [session()->get('sale_id')]) }}", '_blank');
        @endif
    </script>
@endsection
