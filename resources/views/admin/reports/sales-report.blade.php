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
                <h4>Sales Report</h4>
                <h6>Manage your Sales Report</h6>
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
                {{-- <div class="card" id="filter_inputs"> --}}
                    <div class="card" >
                    <div class="card-body pb-0">
                        <form action="{{ route('sale.report') }}" method="get">
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
                                <th>Reference</th>
                        
                                <th>Payment</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Due</th>
                                {{-- <th class="text-center">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sales as $key => $sale)
                            <tr>
                                <td>
                                    {{-- <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label> --}}
                                </td>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $sale->date }}</td>
                                <td>{{ $sale->customer->name }}</td>
                                <td>{{ $sale->ref_code}}</td>
                              
                                <td><span class="badges bg-lightgreen">{{ $sale->payment_type }}</span></td>
                                <td>{{ $sale->grandtotal }}</td>
                                <td>{{ $sale->paid_amount }}</td>
                                <td class="text-red">{{ $sale->due_amount }}</td>
{{--                               
                                <td class="text-center">
                                    <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu"  >
                                        <li>
                                            <a href="sales-details.html" class="dropdown-item"><img src="{{asset('backend')}}/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('sale.edit',$sale->id) }}" class="dropdown-item"><img src="{{asset('backend')}}/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
                                        </li>
                                     
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item"><img src="{{asset('backend')}}/img/icons/download.svg" class="me-2" alt="img">Download pdf</a>
                                        </li>	
                                        <li>
                                            <a href="{{ route('sale.delete',$sale->id) }}" class="dropdown-item confirm-text"><img src="{{asset('backend')}}/img/icons/delete1.svg" class="me-2" alt="img">Delete Sale</a>
                                        </li>								
                                    </ul>
                                </td> --}}
                            </tr>
                         @endforeach
                           
                        <tfoot>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
                    {{-- {!! $sales->links() !!} --}}
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