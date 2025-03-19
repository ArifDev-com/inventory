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
                <h4>Product Wise Report</h4>
                <h6>Manage your Product Wise Report</h6>
            </div>
        </div>


        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <!-- /Filter -->
                <form action="{{ route('reports.product-wise') }}" method="get">
                    <div class="pb-0">
                        <div class="row">
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="datetimepicker cal-icon" placeholder="Choose Start Date" required
                                        name="from_date" value="{{ request()->from_date }}">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="datetimepicker cal-icon" placeholder="Choose End Date" required
                                        name="to_date" value="{{ request()->to_date }}">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select" name="product_id" required>
                                        <option>Choose Product</option>
                                        @foreach ($products ?? [] as $product)
                                        <option @if(request()->product_id == $product->id)
                                            selected
                                            @endif
                                            value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-1 col-sm-6 col-12 ">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-filters"><img
                                            src="{{ asset('backend') }}/img/icons/search-whites.svg" alt="img">

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /Filter -->
                @if ($data)
                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Date</th>
                                <th>Quantity</th>
                                <th>Added Quantity</th>
                                <th>Sale Quantity</th>
                                <th>Purchase Quantity</th>
                                <th>Current Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data ?? [] as $key => $sale)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $key }}</td>
                                <td>{{ $sale['start_quantity'] }}</td>
                                <td>{{ $sale['add_quantity'] }}</td>
                                <td>{{ $sale['sales'] }}</td>
                                <td>{{ $sale['purchase_quantity'] }}</td>
                                <td>{{ $sale['end_quantity'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {!! $quotations->links() !!} --}}
                </div>
                @endif
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