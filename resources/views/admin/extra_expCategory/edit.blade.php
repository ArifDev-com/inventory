@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Extra Expense Category Edit</h4>
                <h6>Update your Extra Expense Category</h6>
            </div>
            <a href="{{ route('extra.expense.category.index') }}" class="btn btn-info" >Back</a>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    {{-- <form action="{{ route('expense.category.update', $expenseCategory->id) }}" method="POST" enctype="multipart/form-data"> --}}
                        <form action="{{ route('extra.expense.category.update', $edit_extraexpenseCategory->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Expense Category Name</label>
                                <input type="text" name="name" value="{{ $edit_extraexpenseCategory->name }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Update</button>
                            <a href="brandlist.html" class="btn btn-cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /add -->
    </div>
</div>
@endsection