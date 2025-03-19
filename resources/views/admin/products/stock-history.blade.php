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
                    <h4>
                        Stock Update History
                    </h4>
                </div>
                <div class="page-btn">
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- /product list -->
            <div class="card">
                <div class="card-body">
                        <!-- /Filter -->
                        <table class="table " id="example">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Date</th>
                                    <th>
                                        Code
                                    </th>
                                    <th>{{ trans('table.thead.product_name') }}</th>
                                    <th>{{ trans('table.thead.qty') }}</th>
                                    <th>Previous Quantity</th>
                                    <th>Added By</th>
                                    {{-- <th>{{ trans('table.thead.purchaseprice') }}</th>
                                    <th>Wholesale Price</th>
                                    <th>Retail Price</th>
                                    <th>{{ trans('table.thead.price') }}</th> --}}
                                    <th>{{ trans('table.thead.created by') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stockUpdates as $key => $stockUpdate)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $stockUpdate->created_at->format('d F, Y') }}
                                        </td>
                                        <td>
                                            {{ $stockUpdate->product->code }}
                                        </td>

                                        <td class="productimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                @if ($stockUpdate->product->image)
                                                    <img src="{{ asset($stockUpdate->product->image) }}" alt="product">
                                                @else
                                                    <img src="{{ asset('backend\img\img-01.jpg') }}" alt="product">
                                                @endif
                                            </a>
                                            <a href="javascript:void(0);">{{ $stockUpdate->product->name }}</a>
                                        </td>
                                        <td>{{ $stockUpdate->quantity }}</td>
                                        <td>{{ $stockUpdate->prev_quantity }}</td>
                                        <td>{{ $stockUpdate->user->name }}</td>
                                        {{-- <td>{{ $stockUpdate->product->purchase_price }}</td>
                                        <td>{{ $stockUpdate->product->wholesale_price }}</td>
                                        <td>{{ $stockUpdate->product->retail_price }}</td>
                                        <td>{{ $stockUpdate->product->price }}</td> --}}
                                        <td>{{ $stockUpdate->user->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="card-footer"> --}}
                    {{-- </div> --}}
            </div>
            <!-- /product list -->
        </div>
    </div>

    <script>
        $('#example').DataTable({
            dom: 'Bfrtip',
        });
    </script>
@endsection
