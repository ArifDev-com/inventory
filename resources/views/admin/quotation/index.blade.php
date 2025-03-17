@extends('layouts.app')
@section('content')
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
                                    <input type="text" class="datetimepicker cal-icon" placeholder="Choose Date" >
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Reference ">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Customer</option>
                                        <option>Customer1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Status</option>
                                        <option>Inprogress</option>
                                        <option>Complete</option>
                                    </select>
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <label class="checkboxs">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmarks"></span>
                                    </label>
                                </th>
                                {{-- <th>Product Name</th> --}}
                                <th>Reference</th>
                                <th>Custmer Name</th>
                                <th>Status</th>
                                <th>Grand Total ($)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quotations as $quotation)
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                {{-- <td class="productimgname">
                                    <a href="javascript:void(0);" class="product-img">
                                        <img src="{{asset('backend')}}/img/product/product1.jpg" alt="product">
                                    </a>

                                </td> --}}
                                <td>{{ $quotation->ref_code }}</td>
                                <td>{{ $quotation->customer->name }}</td>
                                <td><span class="badges bg-lightgreen">{{ $quotation->status }}</span></td>
                                <td>{{ $quotation->grandtotal }}</td>
                                {{-- <td>
                                    <a class="me-3" href="{{ route('quotation.edit',$quotation->id) }}">
                                        <img src="{{asset('backend')}}/img/icons/edit.svg" alt="img">
                                    </a>
                                    <a class="me-3 confirm-text" href="">
                                        <img src="{{asset('backend')}}/img/icons/delete.svg" alt="img">
                                    </a>
                                </td> --}}

                                <td class="text-center">
                                    <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu"  >
                                        <li>
                                            <a href="" class="dropdown-item"><img src="{{asset('backend')}}/img/icons/eye1.svg" class="me-2" alt="img">Purchase Detail</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('quotation.edit',$quotation->id) }}" class="dropdown-item"><img src="{{asset('backend')}}/img/icons/edit.svg" class="me-2" alt="img">Edit Purchase</a>
                                        </li>
                                        {{-- <li>
                                            <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showpayment"><img src="{{asset('backend')}}/img/icons/dollar-square.svg" class="me-2" alt="img">Show Payments</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createpayment"><img src="{{asset('backend')}}/img/icons/plus-circle.svg" class="me-2" alt="img">Create Payment</a>
                                        </li> --}}
                                        <li>
                                            <a href="{{ route('quotation.pdf',$quotation->id) }}" class="dropdown-item"><img src="{{asset('backend')}}/img/icons/download.svg" class="me-2" alt="img">Download pdf</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('quotation.delete',$quotation->id) }}" class="dropdown-item confirm-text"><img src="{{asset('backend')}}/img/icons/delete1.svg" class="me-2" alt="img">Delete Purchase</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                       @endforeach
                        </tbody>
                    </table>
                    {{-- {!! $quotations->links() !!} --}}
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>
@endsection