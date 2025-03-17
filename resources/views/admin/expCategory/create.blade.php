@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Expense Category Add</h4>
                <h6>Create new Expense Category</h6>
            </div>
            <a href="{{ route('expense.category.index') }}" class="btn btn-info" >Back</a>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('expense.category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Expense Category Name</label>
                                <input type="text" name="name" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Save</button>
                            <a href="" class="btn btn-cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /add -->
    </div>
</div>
 @endsection