@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Customer Report</h4>
                <h6>Manage your Customer Report</h6>
            </div>
        </div>

        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div class="table-top">
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
                </div>
                <!-- /Filter -->
                <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                        <form action="{{ route('customer.report') }}" method="get">
                            <div class="row">

                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <div class="input-groupicon">
                                            <input type="text" name="from_date" placeholder="From Date" class="datetimepicker">
                                            <div class="addonset">
                                                <img src="{{asset('backend')}}/img/icons/calendars.svg" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <div class="input-groupicon">
                                            <input type="text" name="to_date" placeholder="To Date" class="datetimepicker">
                                            <div class="addonset">
                                                <img src="{{asset('backend')}}/img/icons/calendars.svg" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-filters ms-auto"><img src="{{asset('backend')}}/img/icons/search-whites.svg" alt="img"></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                <th>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </th>
                                <th>Customer name </th>
                                <th>Amount</th>
                                <th>Paid</th>
                                <th>Amount due</th>
                                <th>Status</th>
                                <th>Paument Status</th>
                            </tr>
                        </thead>
                        <tbody>

                           @foreach ($sales as $sale)
                           <tr>
                            <td>
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>

                            <td>{{ $sale->customer->name }}</td>
                            <td>{{ $sale->grandtotal }}</td>
                            <td>{{ $sale->paid_amount }}</td>
                            <td>{{ $sale->due_amount }}</td>
                            <td><span class="badges bg-lightgreen">{{ $sale->payment_status }}</span></td>
                            <td><span class="badges bg-lightgreen" type="{{ $sale->payment_type }}">{{ $sale->payment_type }}</span></td>
                        </tr>
                           @endforeach

                           <tfoot>
                            <td></td>
                            <td></td>


                            <td>
                                <b>
                                     {{ $grandtotalSum }}
                                </b>
                            </td>
                            <td>
                                <b>
                                    {{ $paidAmountSum }}
                                </b>
                            </td>
                            <td>
                                <b>
                                    {{ $dueAmountSum }}
                                </b>
                            </td>
                           </tfoot>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>
@endsection