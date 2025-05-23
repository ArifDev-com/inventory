@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Picker Report</h4>
                <h6>Manage your Picker Report</h6>
            </div>
        </div>

        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div class="tabs-set">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="purchase-tab" data-bs-toggle="tab" data-bs-target="#purchase" type="button" role="tab" aria-controls="purchase" aria-selected="true">Purchase</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button" role="tab" aria-controls="payment" aria-selected="false">Payment</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="return-tab" data-bs-toggle="tab" data-bs-target="#return" type="button" role="tab" aria-controls="return" aria-selected="false">Return</button>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="purchase" role="tabpanel" aria-labelledby="purchase-tab">
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
                                    <div class="row">
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="form-group">
                                                <div class="input-groupicon">
                                                    <input type="text" placeholder="From Date" class="datetimepicker">
                                                    <div class="addonset">
                                                        <img src="{{asset('backend')}}/img/icons/calendars.svg" alt="img">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="form-group">
                                                <div class="input-groupicon">
                                                    <input type="text" placeholder="To Date" class="datetimepicker">
                                                    <div class="addonset">
                                                        <img src="{{asset('backend')}}/img/icons/calendars.svg" alt="img">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                            <div class="form-group">
                                                <a class="btn btn-filters ms-auto"><img src="{{asset('backend')}}/img/icons/search-whites.svg" alt="img"></a>
                                            </div>
                                        </div>
                                    </div>
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
                                            <th>Purchased Date</th>
                                            <th>Purchased amount</th>
                                            <th>purchased QTY</th>
                                            <th>Paid</th>
                                            <th>balance</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($purchases as $purchase)
                                        <tr>
                                            <td>
                                                <label class="checkboxs">
                                                    <input type="checkbox">
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </td>
                                            <td>{{ $purchase->date }}</td>
                                           
                                            <td>{{ $purchase->grandtotal }}</td>
                                            <td>{{ $purchase->items()->sum('quantity') }}</td>
                                            <td>{{ $purchase->paid_amount }}</td>
                                            <td>{{ $purchase->due_amount }}</td>
                                            <td><span class="badges bg-lightgrey">{{ $purchase->status }}</span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="payment" role="tabpanel" >
                            <div class="table-top">
                                <div class="search-set">
                                    <div class="search-path">
                                        <a class="btn btn-filter" id="filter_search2">
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
                            <div class="card" id="filter_inputs2">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="form-group">
                                                <div class="input-groupicon">
                                                    <input type="text" placeholder="From Date" class="datetimepicker">
                                                    <div class="addonset">
                                                        <img src="{{asset('backend')}}/img/icons/calendars.svg" alt="img">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="form-group">
                                                <div class="input-groupicon">
                                                    <input type="text" placeholder="To Date" class="datetimepicker">
                                                    <div class="addonset">
                                                        <img src="{{asset('backend')}}/img/icons/calendars.svg" alt="img">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                            <div class="form-group">
                                                <a class="btn btn-filters ms-auto"><img src="{{asset('backend')}}/img/icons/search-whites.svg" alt="img"></a>
                                            </div>
                                        </div>
                                    </div>
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
                                            <th>DATE</th>
                                            {{-- <th>Purchase</th> --}}
                                            <th>Reference</th>
                                            <th>Supplier name </th>
                                            <th>Amount</th>
                                            <th>Paid</th>
                                            <th>paid by</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($purchases as $purchase)
                                    
                                        <tr>
                                            <td>
                                                <label class="checkboxs">
                                                    <input type="checkbox">
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </td>
                                            <td>{{ $purchase->date }}	</td>
                                            <td>{{ $purchase->purchase_code }}</td>
                                            <td>{{ $purchase->supplier->name }}</td>
                                            <td>{{ $purchase->grandtotal }}</td>
                                            <td>{{ $purchase->paid_amount }}</td>
                                            <td>{{ $purchase->status }}</td>
                                        </tr>
                                     @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="return" role="tabpanel" >
                            <div class="table-top">
                                <div class="search-set">
                                    <div class="search-path">
                                        <a class="btn btn-filter" id="filter_search1">
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
                            <div class="card" id="filter_inputs1">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="form-group">
                                                <div class="input-groupicon">
                                                    <input type="text" placeholder="From Date" class="datetimepicker">
                                                    <div class="addonset">
                                                        <img src="{{asset('backend')}}/img/icons/calendars.svg" alt="img">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="form-group">
                                                <div class="input-groupicon">
                                                    <input type="text" placeholder="To Date" class="datetimepicker">
                                                    <div class="addonset">
                                                        <img src="{{asset('backend')}}/img/icons/calendars.svg" alt="img">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                            <div class="form-group">
                                                <a class="btn btn-filters ms-auto"><img src="{{asset('backend')}}/img/icons/search-whites.svg" alt="img"></a>
                                            </div>
                                        </div>
                                    </div>
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
                                            <th>Reference</th>
                                            <th>Supplier name </th>
                                            <th>Amount</th>
                                            {{-- <th>Paid</th>
                                            <th>Amount due</th> --}}
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($purchaseReturns as $purchaseReturn)
                                        <tr>
                                            <td>
                                                <label class="checkboxs">
                                                    <input type="checkbox">
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </td>
                                            <td>{{ $purchaseReturn->ref_code }}</td>
                                            <td>{{ $purchaseReturn->supplier->name }}</td>
                                            <td>{{ $purchaseReturn->grandtotal }}</td>
                                            {{-- <td>{{ $purchaseReturn->paid_amount }}</td>
                                            <td>{{ $purchaseReturn->due_amount }}</td> --}}
                                            <td><span class="badges bg-lightgreen">{{ $purchaseReturn->status }}</span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      </div>	
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>
@endsection