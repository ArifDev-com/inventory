@extends('layouts.app')
@section('content')
<div class="page-wrapper">
				<div class="content">
					<div class="page-header">
						<div class="page-title">
							<h4>Permission Management</h4>
							<h6>Add/Update Permission</h6>
						</div>
						<a href="{{ route('permission.index') }}" class="btn btn-info" >Back</a>
					</div>
					<!-- /add -->
					<div class="card">
						<div class="card-body">
						<form action="{{route('permission.store')}}" method="post" >
							@csrf
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label>Select Role: <span> * </span></label>
										<select class="form-control" name="role_id">
											<option disabled selected>Select Role</option>

										@forelse ($roles as $role)
											<option value="{{ $role->id }}">{{ $role->name }}</option>
										@empty
										<p class="text-danger">
											No Roles Found..!
										</p>
										@endforelse
										
										  </select>
										  @error('role_id')
											  <strong class="text-danger">{{ $message }}</strong>
										  @enderror
										
									</div>
								</div>

							   <div class="row">
							   <div class="col-lg-4 col-sm-6 col-12">
									<div class="form-group">
									<label>Permission: <span> * </span>
									<input type="checkbox" id="selectAll" > All Permissions
									</label>
									</div>
								</div>
							   </div>

								<div class="row">
									<!-- 1st line -->
								<div class="col-lg-4 col-sm-6 col-12">
									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_roles]" > Manage Roles
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_warehouse]" > Manage Warehouses
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_products]" > Manage Products 
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_users]" > Manage Users
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_sale]" > Manage Sale
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_transfer]" > Manage Transfers
									</label>
									</div>

									<div class="form-group">
										<label>
											<input type="checkbox" value="1" name="permission[manage_damage_product]" > Manage Damage Product
										</label>
									</div>

									<div class="form-group">
										<label>
											<input type="checkbox" value="1" name="permission[manage_sub_category]" > Manage Sub-Category
										</label>
										</div>
								</div>

								<!-- 2nd line -->
								<div class="col-lg-4 col-sm-6 col-12">
								<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_brands]" > Manage Brands
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_units]" > Manage Units
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_suppliers]" > Manage Suppliers
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_expense_category]" > Manage Expense Categories
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_purchase_return]" > Manage Purchase Return
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_adjustment]" > Manage Adjustments
									</label>
									</div>

									<div class="form-group">
										<label>
											<input type="checkbox" value="1" name="permission[manage_city]" > Manage City
										</label>
										</div>

										<div class="form-group">
											<label>
												<input type="checkbox" value="1" name="permission[manage_dashboard]" > Manage Dashboard
											</label>
									  </div>	
								</div>
								
				                <!-- 3rd line -->
								<div class="col-lg-4 col-sm-6 col-12">
									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_currency]"> Manage Currency
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_product_category]" > Manage Product Categories
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_customers]" > Manage Customers
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_expense]"> Manage Expenses
									</label>
									</div>

								  <div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_purchase]"> Manage Purchase
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_sale_return]" > Manage Sale Return
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_quotations]" > Manage Quotations
									</label>
									</div>
								</div>
								</div>

								<div class="col-lg-12">
									<button type="submit" class="btn btn-submit me-2">Save</button>
									<a href=""  class="btn btn-cancel">Cancel</a>
								</div>
							</div>
							</form>
						</div>
					</div>
					<!-- /add -->
				</div>
			</div>
			@endsection


			@section('scripts')
				<script>

				$("#selectAll").click(function() {
				$("input[type=checkbox]").prop("checked", $(this).prop("checked"));
				});


				$("input[type=checkbox]").click(function() {
				if (!$(this).prop("checked")) {
					$("#selectAll").prop("checked", false);
				}
				});
				</script>
			@endsection