@extends('layouts.app')
 @section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Extra Expenses Category </h4>
                <h6>Manage your Expense Category</h6>
            </div>
            <div class="page-btn">
                {{-- <a href="{{ route('expense.category.create') }}" class="btn btn-added"><img src="{{asset('backend')}}/img/icons/plus.svg" alt="img">Add Extra EXPENSES CATEGORY</a> --}}
                <a href="{{ route('extra.expense.category.create') }}" class="btn btn-added"><img src="{{asset('backend')}}/img/icons/plus.svg" alt="img">Add Extra EXPENSES CATEGORY</a>
            </div>
        </div>
        

        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-path">
                            <a class="btn btn-filter" id="filter_search">
                                <img src="{{asset('backend')}}/img/icons/filter.svg" alt="img">
                                <span><img src="{{asset('backend')}}/img/icons/closes.svg" alt="img"></span>
                            </a>
                        </div>
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="{{asset('backend')}}/img/icons/search-white.svg" alt="img"></a>
                        </div>
                    </div>
                    <div class="wordset">
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
                    </div>
                </div>
                <!-- /Filter -->
                <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="datetimepicker cal-icon" placeholder="Choose Date" >
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Reference">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Category</option>
                                        <option>Computers</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Status</option>
                                        <option>Complete</option>
                                        <option>Inprogress</option>
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
                </div>
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </th>
                                
                                <th>Category name</th>
                                {{-- <th>Date</th>
                                <th>Reference</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Description</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($extraexpenseCategories as $expCategory)
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>{{ $expCategory->name }}</td>
                                    {{-- <td>{{ $expCategory->created_at }}</td>
                                    <td>PT001</td>
                                    <td><span class="badges bg-lightgreen">Active</span></td>
                                    <td>120</td>
                                    <td>Employee Vehicle</td> --}}
                                    <td>  
                                        <a class="me-3" href="{{ route('extra.expense.category.edit',$expCategory->id) }}">
                                            <img src="{{asset('backend')}}/img/icons/edit.svg" alt="img">
                                        </a>
                                        {{-- <a class="me-3 confirm-text" href="{{ route('expense.category.delete',$expCategory->id) }}">
                                            <img src="{{asset('backend')}}/img/icons/delete.svg" alt="img">
                                        </a> --}}
                                        <form method="POST" action="{{ route('expense.category.delete', $expCategory->id) }}">
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
                    {!! $extraexpenseCategories->links() !!}
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>
@endsection