@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

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
                <h4>Sales Return List</h4>
                <h6>Manage your Returns</h6>
            </div>
            <div class="page-btn">
                <a href="{{ route('saleReturn.create') }}" class="btn btn-added"><img src="{{asset('backend')}}/img/icons/plus.svg" alt="img" class="me-2">Add New Sales Return</a>
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
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="datetimepicker cal-icon" placeholder="Choose Date" >
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Reference">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Customer</option>
                                        <option>Customer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Status</option>
                                        <option>Inprogress</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Payment Status</option>
                                        <option>Payment Status</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
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
                                <th>Date</th>
                                <th>Customer</th>
                              
                                <th>Paid Amount (৳)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($saleReturns as $key => $saleReturn)
                            <tr>
                                <td>
                                    {{-- <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label> --}}
                                </td>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $saleReturn->date }}</td>
                                <td>{{ $saleReturn->customer->name }}</td>
                               
                                <td>{{ $saleReturn->grandtotal }}</td>
                                {{-- <td>
                                     
                                    <a class="me-3" href="{{ route('saleReturn.edit',$saleReturn->id) }}">
                                        <img src="{{asset('backend')}}/img/icons/edit.svg" alt="img">
                                    </a>
                                    <a class="me-3 confirm-text" href="{{ route('saleReturn.edit',$saleReturn->id) }}">
                                        <img src="{{asset('backend')}}/img/icons/delete.svg" alt="img">
                                    </a>
                                </td> --}}
                                <td class="text-center">
                                    <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu"  >
                                        {{-- <li>
                                            <a href="" class="dropdown-item"><img src="{{asset('backend')}}/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
                                        </li> --}}


                                        {{-- <li>
                                            <a href="{{ route('saleReturn.edit',$saleReturn->id) }}" class="dropdown-item"><img src="{{asset('backend')}}/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
                                        </li> --}}


                                        {{-- <li>
                                            <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showpayment"><img src="{{asset('backend')}}/img/icons/dollar-square.svg" class="me-2" alt="img">Show Payments</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createpayment"><img src="{{asset('backend')}}/img/icons/plus-circle.svg" class="me-2" alt="img">Create Payment</a>
                                        </li> --}}
                                       
                                        <li>
                                            <a href="{{ route('saleReturn.delete',$saleReturn->id) }}" class="dropdown-item confirm-text"><img src="{{asset('backend')}}/img/icons/delete1.svg" class="me-2" alt="img">Delete Sale</a>
                                        </li>								
                                    </ul>
                                </td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                    {{-- {!! $saleReturns->links() !!} --}}
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>

<script>

    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf' , 'print'
        ]
    } );

    </script>
@endsection