@extends('layouts.app')
@section('content')
<div class="page-wrapper">
				<div class="content">
					<div class="page-header">
						<div class="page-title">
							<h4>Edit Expense EDIT</h4>
							<h6>Add/Update Edit Expenses</h6>
						</div>
						<a href="{{ route('extra.expense.index') }}" class="btn btn-info" >Back</a>
					</div>
					<div class="card">
						<div class="card-body">
						{{-- <form action="{{ route('expense.update',$expense->id) }}" method="POST" enctype="multipart/form-data"> --}}
                            <form action="{{ route('extra.expense.update',$expense->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
							<div class="row">
								<div class="col-lg-3 col-sm-6 col-12">
									<div class="form-group">
										<label>Extra Expense Category</label>
										<select class="select" name="expenseCategory_id">
										@foreach ($expenseCategories as $expCategory)                            
                                          <option value="{{ $expCategory->id }}" {{ $expCategory->id == $expense->expCategory_id ? "selected":"" }}>{{ $expCategory->name }}</option>
                                          @endforeach
										</select>
									</div>
								</div>
								<div class="col-lg-3 col-sm-6 col-12">
									<div class="form-group">
										<label>Expense Date </label>
										<div class="input-groupicon">
											<input type="date" name="date" value="{{$expense->date}}">
										
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-sm-6 col-12">
									<div class="form-group">
										<label>Amount</label>
		
											<input type="number" name="amount" value="{{$expense->amount}}">
					
									</div>
								</div>
								<div class="col-lg-3 col-sm-6 col-12">
									<div class="form-group">
										<label>Reference No.</label>
										<input type="text" name="expense_code" value="{{$expense->expense_code}}">
									</div>
								</div>
								<div class="col-lg-8 col-sm-6 col-12">
									<div class="form-group">
										<label>Expense for</label>
										<input type="text" name="expense_for" value="{{$expense->expense_for}}">
									</div>
								</div>
								<div class="col-lg-4 col-sm-6 col-12">
									<div class="form-group">
										<label>	Status</label>
										<select class="select" name="status">
										<option value="completed" {{ $expense->status == 'completed' ? 'selected' : '' }}>Completed</option>
										<option value="inprogress" {{ $expense->status == 'inprogress' ? 'selected' : '' }}>Inprogress</option>
										</select>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label>Description</label>
										<textarea class="form-control" name="description">{{$expense->description}} </textarea>
									</div>
								</div>
					
								<div class="col-lg-12">
									<button type="submit" class="btn btn-submit me-2">Update</button>
									<a href="expenselist.html" class="btn btn-cancel">Cancel</a>
								</div>
							</div>
                          </form>
						</div>
					</div>
				</div>
			</div>
            @endsection