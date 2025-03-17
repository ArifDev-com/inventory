@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Purchase Report</h4>
                <h6>Manage your Purchase Report</h6>
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
                         <form action="{{ route('purchase.report') }}" method="get">
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
                                    <button type="submit" class="btn btn-filters ms-auto"><img src="{{asset('backend')}}/img/icons/search-whites.svg" alt="img"></button>
                                </div>
                            </div>
                        </div>
                         </form>
                    </div>
                </div>
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <label class="checkboxs">
                                        <input type="checkbox" id="select-all"> 
                                        <span class="checkmarks"></span>
                                    </label>
                                </th>
                                <th>Supplier</th>
                                <th>Purchased amount</th>
                                <th>Paid amount</th>
                                <th>Due amount</th>
                                <th>Purchased QTY</th>
                                {{-- <th>Instock qty</th> --}}
                                <th class="text-center">Action</th>
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
                                <td>{{ $purchase->supplier->name }}</td>
                                <td>{{ $purchase->grandtotal }}</td>
                                <td>{{ $purchase->paid_amount }}</td>
                                <td>{{ $purchase->due_amount }}</td>
                                <td>{{ $purchase->items()->sum('quantity') }}</td>
                                {{-- <td class="text-red">{{ $purchase->quantity }}</td>  --}}
                                <td class="text-center">
                                    <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu"  >
                                        <li>
                                            <a href="sales-details.html" class="dropdown-item"><img src="{{asset('backend')}}/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('purchase.edit',$purchase->id) }}" class="dropdown-item"><img src="{{asset('backend')}}/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
                                        </li>
                                        {{-- <li>
                                            <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showpayment"><img src="{{asset('backend')}}/img/icons/dollar-square.svg" class="me-2" alt="img">Show Payments</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createpayment"><img src="{{asset('backend')}}/img/icons/plus-circle.svg" class="me-2" alt="img">Create Payment</a>
                                        </li> --}}
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item"><img src="{{asset('backend')}}/img/icons/download.svg" class="me-2" alt="img">Download pdf</a>
                                        </li>	
                                        <li>
                                            <a href="{{ route('purchase.delete',$purchase->id) }}" class="dropdown-item confirm-text"><img src="{{asset('backend')}}/img/icons/delete1.svg" class="me-2" alt="img">Delete Sale</a>
                                        </li>								
                                    </ul>
                                </td>
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
                    {!! $purchases->links() !!}
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>
@endsection