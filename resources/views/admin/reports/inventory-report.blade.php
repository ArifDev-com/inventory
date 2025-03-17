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

<style>
    
.select2-container {
  min-width: 112% !important;
}
</style>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Inventory Report</h4>
                <h6>Manage your Inventory Report</h6>
            </div>
        </div>

        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <form action="{{ route('inventory.report') }}" method="get" id="stockSubmit">
                        <div class="form-group">
                            <label>Stock Type</label>
                            <select class="select form-control" name="stock" id="stock" onchange="this.form.submit()" >
                                <option selected disabled>choose one</option>
                                <option value="in">InStock</option>
                                <option value="out">OutStock</option>
                            </select>
                        </div>
                    </form>
                    {{-- <div class="wordset">
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
                    </div> --}}
                </div>
                <!-- /Filter -->
                {{-- <div class="card" id="filter_inputs">
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
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Suppliers</option>
                                        <option>Suppliers</option>
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
                </div> --}}
                <!-- Default dropright button -->
               
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
                                <th>Product Name</th>
                                <th>Product Code</th>
                             
                                <th>price</th>
                             
                                <th>Qty</th>
                                <th>Stock</th>
                            
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>
                                        {{-- <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label> --}}
                                    </td>
                                    <td>{{ $key+1 }}</td>
                                    <td class="productimgname">
                                        <a href="javascript:void(0);" class="product-img">
                                            @if($product->image)
                                            <img src="{{ asset($product->image) }}" alt="product">
                                            @else 
                                            <img src="{{ asset('backend\img\img-01.jpg')}}" alt="product">
                                            @endif
                                        </a>
                                        <a href="javascript:void(0);">{{ $product->name }}</a>
                                    </td>
                                    <td>{{ $product->product_code }}</td>
                                    <td>{{ $product->price }}</td>
                                  
                                    <td><span class="badge bg-success" style="font-size: 16px;">{{ $product->quantity }}</span></td>
                                    <td>
                                        @if ($product->quantity == 0)
                                            <span >
                                                Stock Out
                                            </span>

                                            @else
                                            <span >
                                                Stock In
                                            </span>
                                        @endif
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {!! $products->links() !!} --}}
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

