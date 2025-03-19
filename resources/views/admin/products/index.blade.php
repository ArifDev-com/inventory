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
                    <h4>{{ trans('sidebar.product.body.product list') }}</h4>
                    <h6>{{ trans('sidebar.product.body.manage your products') }}</h6>
                </div>
                <div class="page-btn">
                    @if (auth()->user()->user_role == 'admin')
                        <a href="{{ route('product.create') }}" class="btn btn-added"><img
                                src="{{ asset('backend') }}/img/icons/plus.svg" alt="img"
                                class="me-1">{{ trans('sidebar.product.body.add new product') }}</a>
                    @endif
                </div>
            </div>


            <!-- /product list -->
            <div class="card">
                <div class="card-body">
                    {{-- <div class="table-top">
                        <div class="search-set">
                            <div class="search-path">
                                <a class="btn btn-filter" id="filter_search">
                                    <img src="{{ asset('backend') }}/img/icons/filter.svg" alt="img">
                                    <span><img src="{{ asset('backend') }}/img/icons/closes.svg" alt="img"></span>
                                </a>
                            </div>
                            <div class="search-input">
                                <a class="btn btn-searchset"><img src="{{ asset('backend') }}/img/icons/search-white.svg"
                                        alt="img"></a>
                            </div>
                        </div>
                        <div class="wordset">
                            <ul>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                            src="{{ asset('backend') }}/img/icons/pdf.svg" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                            src="{{ asset('backend') }}/img/icons/excel.svg" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                            src="{{ asset('backend') }}/img/icons/printer.svg" alt="img"></a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                    <!-- /Filter -->
                    {{-- <div class="card mb-0" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg col-sm-6 col-12">
                                            <div class="form-group">
                                                <select class="select">
                                                    <option>Choose Product</option>
                                                    <option>Macbook pro</option>
                                                    <option>Orange</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg col-sm-6 col-12">
                                            <div class="form-group">
                                                <select class="select">
                                                    <option>Choose Category</option>
                                                    <option>Computers</option>
                                                    <option>Fruits</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg col-sm-6 col-12">
                                            <div class="form-group">
                                                <select class="select">
                                                    <option>Choose Sub Category</option>
                                                    <option>Computer</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg col-sm-6 col-12">
                                            <div class="form-group">
                                                <select class="select">
                                                    <option>Brand</option>
                                                    <option>N/D</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg col-sm-6 col-12 ">
                                            <div class="form-group">
                                                <select class="select">
                                                    <option>Price</option>
                                                    <option>150.00</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-sm-6 col-12">
                                            <div class="form-group">
                                                <a class="btn btn-filters ms-auto"><img
                                                        src="{{ asset('backend') }}/img/icons/search-whites.svg"
                                                        alt="img"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- /Filter -->
                    <div class="table-responsive">
                        <table class="table " id="example">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>
                                        Code
                                    </th>
                                    <th>{{ trans('table.thead.product_name') }}</th>
                                    <th>{{ trans('table.thead.qty') }}</th>
                                    <th>Stock Alert </th>
                                    <th>{{ trans('table.thead.purchaseprice') }}</th>
                                    <th>Wholesale Price</th>
                                    <th>Retail Price</th>
                                    <th>{{ trans('table.thead.price') }}</th>
                                    <th>{{ trans('table.thead.created by') }}</th>
                                    <th>{{ trans('table.thead.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $product->code }}
                                        </td>

                                        <td class="productimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                @if ($product->image)
                                                    <img src="{{ asset($product->image) }}" alt="product">
                                                @else
                                                    <img src="{{ asset('backend\img\img-01.jpg') }}" alt="product">
                                                @endif
                                            </a>
                                            <a href="javascript:void(0);">{{ $product->name }}</a>
                                        </td>
                                        <td><span class="badge bg-danger text-white"
                                                style="font-size: 15px;">{{ $product->quantity }}</span></td>
                                        <td>{{ $product->alert_quantity }}</td>
                                        <td>{{ $product->purchase_price }}</td>
                                        <td>{{ $product->wholesale_price }}</td>
                                        <td>{{ $product->retail_price }}</td>
                                        <td>{{ $product->price }}</td>

                                        <td>{{ $product->user?->first_name . ' ' . $product->user?->last_name }}</td>
                                        <td>
                                            <a class="me-3" href="{{ route('product.details', $product->id) }}">
                                                <img src="{{ asset('backend') }}/img/icons/eye.svg" alt="img">
                                            </a>
                                            @if (auth()->user()->user_role == 'admin')
                                                <a class="me-3" href="{{ route('product.edit', $product->id) }}">
                                                    <img src="{{ asset('backend') }}/img/icons/edit.svg" alt="img">
                                                </a>

                                                {{-- ekhane form submit diye delete korte hobe.. evabe korle direct requrest chole jabe.. tai delete hobe.. --}}
                                                {{-- <a class="show_confirm" href="{{ route('product.delete', $product->id) }}">
                                                    <img src="{{ asset('backend') }}/img/icons/delete.svg"
                                                    alt="img">
                                                </a> --}}

                                                <form method="POST" action="{{ route('product.delete', $product->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="show_confirm" data-toggle="tooltip"
                                                        title='Delete'>
                                                        <img src="{{ asset('backend') }}/img/icons/delete.svg"
                                                            alt="img">
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        {{-- table footer  --}}

                        {{-- <div class="dataTables_length" ><label><select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div>

                        <div class="dataTables_paginate paging_numbers">
                            <ul class="pagination">
                                <li class="paginate_button page-item active">
                                    <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link"></a>
                                </li>
                            </ul>
                        </div>

                        <div class="dataTables_info"  role="status" aria-live="polite">1 - 1 of 1 items</div> --}}

                        {{-- {!! $products->links() !!} --}}
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
    </script>
@endsection
