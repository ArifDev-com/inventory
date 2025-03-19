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
                <h4>Datewise Sale Report</h4>
                <h6>Manage your Datewise Sale Report</h6>
            </div>
        </div>


        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <!-- /Filter -->
                <form action="{{ route('reports.datewise-sale') }}" method="get">
                    <div class="pb-0">
                        <div class="row">
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="datetimepicker cal-icon" placeholder="Choose Start Date"
                                        name="from_date" value="{{ request()->from_date }}">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="datetimepicker cal-icon" placeholder="Choose End Date"
                                        name="to_date" value="{{ request()->to_date }}">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select" name="customer_id">
                                        <option>Choose Customer</option>
                                        @foreach ($customers ?? [] as $customer)
                                        <option @if(request()->customer_id == $customer->id)
                                            selected
                                            @endif
                                            value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-filters ms-auto"><img
                                            src="{{ asset('backend') }}/img/icons/search-whites.svg" alt="img">

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Grand Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data ?? [] as $key => $sale)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sale->ref_code }}</td>
                                <td>{{ $sale->customer->name }}</td>
                                <td><span class="badges bg-lightgreen">{{ $sale->status }}</span></td>
                                <td>{{ $sale->grandtotal }}</td>
                                {{-- <td>
                                    <a class="me-3" href="{{ route('quotation.edit',$quotation->id) }}">
                                        <img src="{{asset('backend')}}/img/icons/edit.svg" alt="img">
                                    </a>
                                    <a class="me-3 confirm-text" href="">
                                        <img src="{{asset('backend')}}/img/icons/delete.svg" alt="img">
                                    </a>
                                </td> --}}

                                <td class="text-center">
                                    <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown"
                                        aria-expanded="true">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('quotation.move_sale', $quotation->id) }}"
                                                class="dropdown-item confirm-text">
                                                Move to Sales
                                            </a>
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

<script>
    $('#example').DataTable({ pageLength: 100,
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
        });
</script>
@endsection