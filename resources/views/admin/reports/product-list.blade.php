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
                <h4>Product List</h4>
                {{-- <h6>your products</h6> --}}
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
                <div class="table-responsive">
                    <table class="table " id="example">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>
                                    Code
                                </th>
                                <th>Product Name</th>
                                <th>Quantity</th>
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
                                    <a href="javascript:void(0);">{{ $product->name }}</a>
                                </td>
                                <td>
                                    {{ $product->current_stock }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                    {{-- table footer --}}

                    {{-- <div class="dataTables_length"><label><select name="DataTables_Table_0_length"
                                aria-controls="DataTables_Table_0"
                                class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select></label></div>

                    <div class="dataTables_paginate paging_numbers">
                        <ul class="pagination">
                            <li class="paginate_button page-item active">
                                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0"
                                    class="page-link"></a>
                            </li>
                        </ul>
                    </div>

                    <div class="dataTables_info" role="status" aria-live="polite">1 - 1 of 1 items</div> --}}

                    {{-- {!! $products->links() !!} --}}
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>

<script>
    $('#example').DataTable({ pageLength: 100,
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
        });
</script>
@endsection