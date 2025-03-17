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
                @foreach($sales as $sale)
                <h4>Warehouse : {{ $sale->warehouse->name}} - Sales List Click</h4>
                @endforeach
                <h6>Manage Your Warehouse</h6>
            </div>
            {{-- <div class="page-btn">
                <a href="{{ route('sale.create') }}" class="btn btn-added"><img src="{{asset('backend')}}/img/icons/plus.svg" alt="img" class="me-1">{{ trans('sidebar.sale.body.add sale') }}</a>
            </div> --}}

            @php 
                     $warehouses = Illuminate\Support\Facades\DB::table('warehouses')->where('id', 5)->first();
                     $warehouses2 = Illuminate\Support\Facades\DB::table('warehouses')->where('id', 4)->first();
              
                @endphp

<div class="page-btn">
    <a href="{{ route('product.warehouse.list') }}" class="btn btn-added"><img src="" class="me-1">Click - {{ $warehouses2->name}} - Product List </a>
</div>

                {{-- <div class="col-md-2 d-flex justify-content-end" style="margin-top: -6px;">

                    <select name="links" id="" size="1" onchange="window.location.href=this.value;" class="form-select form-select-lg mb-3" style="width: 2033px; height: 42px; font-size: 16px;">
                        <option selected="" disabled="">Choose Warehouse</option>
                     
                    
                        <option value="{{ route('warehouse-2.report') }}"> {{ $warehouses->name}}</option>
                        <option value="{{ route('warehouse.report') }}"> {{ $warehouses2->name}}</option>
                       
                       
                        
                        
                        
                       
                      </select> &nbsp;&nbsp;

                    <select name="links" id="" size="1" onchange="window.location.href=this.value;" class="form-select form-select-lg mb-3" style="width: 143px; height: 42px; font-size: 16px;">
                        <option value="{{ url('/admin/dashboard')}}">Daily Report</option>
                        <option value="{{ url('/admin/dashboard-two')}}">Monthly Report</option>
                        <option value="{{ url('/admin/dashboard-three')}}">Yearly Report</option>
                      </select>
                      
                      
                </div> --}}
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
                                <th>{{ trans('table.sale.date') }}</th>
                                <th>{{ trans('table.sale.customer') }}</th>
                                <th>{{ trans('table.sale.reference') }}</th>
                                <th>{{ trans('table.sale.status') }}</th>
                                <th>{{ trans('table.sale.payment') }}</th>
                                <th>{{ trans('table.sale.total') }}</th>
                                <th>{{ trans('table.sale.paid') }}</th>
                                <th>{{ trans('table.sale.due') }}</th>
                                <th>{{ trans('table.sale.biller') }}</th>
                                {{-- <th class="text-center">{{ trans('table.sale.action') }}</th> --}}
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
                                <td><span class="badges bg-lightgreen">{{ $sale->payment_status }}</span></td>
                                <td><span class="badges bg-lightgreen">{{ $sale->payment_type }}</span></td>
                                <td>{{ $sale->grandtotal }}</td>
                                <td>{{ $sale->paid_amount }}</td>
                                <td class="text-red">{{ $sale->due_amount }}</td>
                                <td>{{ $sale->user->first_name .' '. $sale->user->last_name}}</td>
                                
                            </tr>
                         @endforeach

                         <tfoot>
                            <td></td>
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