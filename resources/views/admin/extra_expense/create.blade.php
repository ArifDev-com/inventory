@extends('layouts.app')
@section('content')
<div class="page-wrapper">
				<div class="content">
					<div class="page-header">
						<div class="page-title">
							<h4>Extra Expense Add</h4>
							<h6>Add/Update Extra Expenses</h6>
						</div>
						<a href="{{ route('extra.expense.index') }}" class="btn btn-info" >Back</a>
					</div>
					<div class="card">
						<div class="card-body">
						{{-- <form action="{{route('expense.store')}}" method="post" enctype="multipart/form-data"> --}}
                            <form action="{{route('extra.expense.store')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-lg-3 col-sm-6 col-12">
									<div class="form-group">
										<label>Extra Expense Category</label>
										<select class="select" name="expenseCategory_id">
										<option>Choose Category</option>
											@foreach ($extra_expenseCategories as $expCat)                            
                                           <option value="{{ $expCat->id }}">{{ $expCat->name }}</option>
                                           @endforeach
										</select>
									</div>
								</div>
								<div class="col-lg-3 col-sm-6 col-12">
									<div class="form-group">
										<label>Expense Date </label>
										<div class="input-groupicon">
											<input type="date" name="date" >
										
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-sm-6 col-12">
									<div class="form-group">
										<label>Amount</label>
								
											<input type="number" name="amount">
											{{-- <div class="addonset">
												<img src="{{asset('backend')}}/img/icons/dollar.svg" alt="img">
											</div> --}}
								
									</div>
								</div>
								<div class="col-lg-3 col-sm-6 col-12">
									<div class="form-group">
										<label>Reference No.</label>
										<input type="text" name="expense_code">
									</div>
								</div>

								<div class="col-lg-8">
									<div class="form-group">
										<label>Expense for</label>
										<input type="text" name="expense_for">
									</div>
								</div>
								<div class="col-lg-4 col-sm-6 col-12">
									<div class="form-group">
										<label>	Status</label>
										<select class="select" name="status">
										<option>Select Status</option>
										<option value="completed">Completed</option>
										<option value="inprogress">Inprogress</option>
										</select>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label>Description</label>
										<textarea class="form-control" name="description"></textarea>
									</div>
								</div>
							
								<div class="col-lg-12">
									<button type="submit" class="btn btn-submit me-2">Save</button>
									<a href="expenselist.html"  class="btn btn-cancel">Cancel</a>
								</div>
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
            @endsection