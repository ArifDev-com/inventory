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
                    <h4>{{ trans('sidebar.unit.body.unit list') }}</h4>
                    <h6>{{ trans('sidebar.unit.body.manage your unit') }}</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('unit.create') }}" class="btn btn-added"><img
                            src="{{ asset('backend') }}/img/icons/plus.svg" class="me-2" alt="img">{{ trans('sidebar.unit.body.add unit') }}</a>
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
                    {{-- <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Brand Name">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Brand Description">
                                    </div>
                                </div>
                                <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                    <div class="form-group">
                                        <a class="btn btn-filters ms-auto"><img
                                                src="{{ asset('backend') }}/img/icons/search-whites.svg" alt="img"></a>
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
                                    <th>Sl</th>
                                    <th>
                                        {{-- <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                        </label> --}}
                                    </th>
                                    <th>{{ trans('table.unit.unit_name') }}</th>
                                    <th>{{ trans('table.unit.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($units as $key=> $unit)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            {{-- <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label> --}}
                                        </td>
                                        <td>{{ $unit->name }}</td>
                                        <td>
                                            <a class="me-3" href="{{ route('unit.edit', $unit->id) }}">
                                                <img src="{{ asset('backend') }}/img/icons/edit.svg" alt="img">
                                            </a>
                                            {{-- <a class="me-3 confirm-text" href="{{ route('unit.destroy', $unit->id) }}">
                                                <img src="{{ asset('backend') }}/img/icons/delete.svg" alt="img">
                                            </a> --}}
                                            <form method="POST" action="{{ route('unit.delete', $unit->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="show_confirm"  data-toggle="tooltip" title='Delete'>
                                                    <img src="{{ asset('backend') }}/img/icons/delete.svg" 
                                                    alt="img">
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {!! $units->links() !!} --}}
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
