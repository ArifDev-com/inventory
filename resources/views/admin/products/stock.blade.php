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
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
        @endforeach

        <!-- /product list -->
        <form action="{{ route('product.stock.update') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <!-- /Filter -->
                    <button type="submit" class="btn btn-primary">Update Stock</button>
                    <div class="table-responsive">
                        <table class="table " id="example">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>
                                        Code
                                    </th>
                                    <th>{{ trans('table.thead.product_name') }}</th>
                                    <th>Current Stock</th>
                                    <th>QTY Update</th>
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
                                    <td><b style="background: #00adee;
                                                padding: 8px 12px;
                                                color: white;
                                                font-size: 16px;
                                                border-radius: 5px;"
                                                >
                                        {{ $product->current_stock }}</b></td>
                                    <td>
                                        <input type="number" class="form-control"
                                            value="{{ old('quantity.' . $product->id) }}"
                                            name="quantity[{{ $product->id }}]" style="width: 100px;" >
                                    </td>
                                    

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Update Stock</button>
                    </div>
                    {{-- <div class="card-footer"> --}}
                        {{-- </div> --}}
                </div>
        </form>
        <!-- /product list -->
    </div>
</div>

<script>
    $('#example').DataTable({ pageLength: 100,
            dom: 'Bfrtip',
            buttons: []
        });
</script>
@endsection