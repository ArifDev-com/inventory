@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<div class="page-wrapper">
	<div class="content">
		<div class="page-header">
			<div class="page-title">
				<h4>Expense Add</h4>
				<h6>Add/Update Expenses</h6>
			</div>
			<a href="{{ route('expense.index') }}" class="btn btn-info">Back</a>
		</div>
		<div class="card">
			<div class="card-body">
				<form action="{{route('expense.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Expense Category</label>
								<select class="select2" name="expenseCategory_id">
									{{-- <option>Choose Category</option> --}}
									@foreach ($expenseCategories as $expCat)
									<option value="{{ $expCat->id }}">{{ $expCat->name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Date</label>
								<input type="date" class="form-control" name="date" value="<?php echo date("
									Y-m-d");?>">
							</div>
						</div>





						<div class="col-md-6 ">
							<div class="form-group">
								<label>Expense Name</label>

								<input type="text" name="expense_for" required>

							</div>
						</div>

						<div class=" col-md-6 ">
							<div class="form-group">
								<label>Amount</label>
								<input type="text" name="amount" required>
							</div>
						</div>



						<div class="col-md-12">
							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" name="description"></textarea>
							</div>
						</div>

						<div class="col-md-12">
							<button type="submit" class="btn btn-submit me-2">Save</button>
							<a href="" class="btn btn-cancel">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
			$(".select2").select2();
			});
</script>
@endsection
