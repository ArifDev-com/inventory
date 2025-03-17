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
                    <h4>{{ trans('sidebar.sub_category.body.product sub category list') }}</h4>
                    <h6>{{ trans('sidebar.sub_category.body.view/search product category') }}</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('subCategory.create') }}" class="btn btn-added"><img
                            src="{{ asset('backend') }}/img/icons/plus.svg" class="me-2" alt="img"> {{ trans('sidebar.sub_category.body.add sub category') }}</a>
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
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="select">
                                            <option>Choose Category</option>
                                            <option>Computers</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Sub Category</label>
                                        <select class="select">
                                            <option>Choose Sub Category</option>
                                            <option>Fruits</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Category Code</label>
                                        <select class="select">
                                            <option>CT001</option>
                                            <option>CT002</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
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
                                    {{-- <th>{{ trans('table.sub_category.image') }}</th> --}}
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    {{-- <th>{{ trans('table.sub_category.caregory_code') }}</th>
                                    <th>{{ trans('table.sub_category.description') }}</th> --}}
                                    <th>{{ trans('table.sub_category.created by') }}</th>
                                    <th>{{ trans('table.sub_category.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subCategories as $key=> $subCategory)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            {{-- <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label> --}}
                                        </td>
                                        {{-- <td>
                                            <a class="product-img">
                                                <img src="{{ asset('upload/category/'.$subCategory->category->image) }}" alt="product">
                                            </a>
                                        </td> --}}
                                        <td>{{ $subCategory->category->name ?? 'N/A' }}</td>
                                        <td>{{ $subCategory->name }}</td>
                                        {{-- <td>{{ $subCategory->code }}</td>
                                        <td>{{ $subCategory->description }}</td> --}}
                                        <td>{{ $subCategory->user->first_name .' '. $subCategory->user->last_name}}</td>
                                        <td>
                                            <a class="me-3" href="{{ route('subCategory.edit', $subCategory->id) }}">
                                                <img src="{{ asset('backend') }}/img/icons/edit.svg" alt="img">
                                            </a>
                                            {{-- <a class="me-3 confirm-text"
                                                href="{{ route('subCategory.destroy', $subCategory->id) }}">
                                                <img src="{{ asset('backend') }}/img/icons/delete.svg" alt="img">
                                            </a> --}}
                                            <form method="POST" action="{{ route('subCategory.delete', $subCategory->id) }}">
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
                        {{-- {!! $subCategories->links() !!} --}}
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
