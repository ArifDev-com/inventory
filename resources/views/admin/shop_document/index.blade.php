@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Shop Document </h4>
                    <h6>Manage your Shop Document</h6>
                </div>
                <div class="page-btn">


    {{-- <a href="{{ route('shopDocument.create') }}" class="btn btn-added"><img
            src="{{ asset('backend') }}/img/icons/plus.svg" alt="img">Add
            Shop Document</a> --}}


                </div>
            </div>


            <!-- /product list -->
            <div class="card">
                <div class="card-body">
                    <div class="table-top">


                        {{-- <div class="search-set">
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
                        </div> --}}


                        <div class="wordset">


                            {{-- <ul>
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
                            </ul> --}}


                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Supplier Code">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Supplier">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Phone">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                    <div class="form-group">
                                        <a class="btn btn-filters ms-auto"><img
                                                src="{{ asset('backend') }}/img/icons/search-whites.svg"
                                                alt="img"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        {{-- <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                        </label> --}}
                                    </th>
                                    <th>Shop Name</th>
                                    <th>email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shopDocuments as $shopDocument)
                                    <tr>
                                        <td>
                                            {{-- <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label> --}}
                                        </td>
                                        <td class="productimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{ asset($shopDocument->image) }}" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">{{ $shopDocument->name }}</a>
                                        </td>

                                        @if($shopDocument->email)
                                        <td>{{ $shopDocument->email }}</td>
                                        @else 
                                        <td>Null</td>
                                        @endif

                                        @if($shopDocument->phone)
                                        <td>{{ $shopDocument->phone }} </td>
                                        @else 
                                        <td>Null</td>
                                        @endif

                                        @if($shopDocument->address)
                                        <td>{{ $shopDocument->address }}</td>
                                        @else 
                                        <td>Null</td>
                                        @endif

                                        <td>

                {{-- <a class="me-3" href="{{ route('shopDocument.edit', $shopDocument->id) }}">
                    <img src="{{ asset('backend') }}/img/icons/edit.svg" alt="img">
                </a> --}}

                <a class="me-3 btn btn-info" style="color: white;" href="{{ route('shopDocument.edit', $shopDocument->id) }}">
                    Update
                </a>


                                        

                                            {{-- <form method="POST" action="{{ route('shopDocument.delete', $shopDocument->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="show_confirm"  data-toggle="tooltip" title='Delete'>
                                                    <img src="{{ asset('backend') }}/img/icons/delete.svg" 
                                                    alt="img">
                                                </button>
                                            </form> --}}


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {!! $shopDocuments->links() !!} --}}
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>
    </div>
@endsection
