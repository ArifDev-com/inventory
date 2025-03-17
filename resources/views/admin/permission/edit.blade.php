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
						<form action="{{route('permission.update',$permission->id)}}" method="post" >
							@csrf
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label>Select Role: <span> * </span></label>
										<select class="form-control" name="role_id">
											<option disabled selected>Select Role</option>

										@forelse ($roles as $role)
											<option value="{{ $role->id }}" {{ $permission->role_id == $role->id ? 'selected':'' }}>{{ $role->name }}</option>
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
									<input type="checkbox" value="1" name=""> All Permissions
									</label>
									</div>
								</div>
							   </div>

								<div class="row">
									<!-- 1st line -->
								<div class="col-lg-4 col-sm-6 col-12">
									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_roles]"
										@isset($permission['permission']['manage_roles'])
											checked
										@endisset
										> Manage Roles
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_warehouse]" 
										
										@isset($permission['permission']['manage_warehouse'])
										checked
									@endisset> Manage Warehouses
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_products]" 
										@isset($permission['permission']['manage_products'])
										checked
									@endisset
										> Manage Products 
									
										
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_users]" 
										@isset($permission['permission']['manage_users'])
										checked
									@endisset
										> Manage Users
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_sale]" 
										@isset($permission['permission']['manage_sale'])
										checked
									@endisset
										> Manage Sale
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_transfer]" 
										@isset($permission['permission']['manage_transfer'])
										checked
									@endisset
										> Manage Transfers
									</label>
									</div>

									<div class="form-group">
										<label>
											<input type="checkbox" value="1" name="permission[manage_damage_product]" 
											@isset($permission['permission']['manage_damage_product'])
											checked
										@endisset
											> Manage Damage Product
										</label>
									</div>

									<div class="form-group">
										<label>
											<input type="checkbox" value="1" name="permission[manage_sub_category]"
											@isset($permission['permission']['manage_sub_category'])
											checked
										@endisset
											> Manage Sub-Category
										</label>
										</div>
								</div>

								<!-- 2nd line -->
								<div class="col-lg-4 col-sm-6 col-12">
								<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_brands]" 
										@isset($permission['permission']['manage_brands'])
										checked
									@endisset
										> Manage Brands
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_units]" 
										@isset($permission['permission']['manage_units'])
										checked
									@endisset
										> Manage Units
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_suppliers]" 
										@isset($permission['permission']['manage_suppliers'])
										checked
									@endisset
										> Manage Suppliers
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_expense_category]" 
										@isset($permission['permission']['manage_expense_category'])
										checked
									@endisset
										> Manage Expense Categories
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_purchase_return]" 
										@isset($permission['permission']['manage_purchase_return'])
										checked
									@endisset
										> Manage Purchase Return
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_adjustment]"
										@isset($permission['permission']['manage_adjustment'])
										checked
									@endisset
										> Manage Adjustments
									</label>
									</div>

									<div class="form-group">
										<label>
											<input type="checkbox" value="1" name="permission[manage_city]" 
											@isset($permission['permission']['manage_city'])
											checked
										@endisset
											> Manage City
										</label>
										</div>

										<div class="form-group">
											<label>
												<input type="checkbox" value="1" name="permission[manage_dashboard]" 
												@isset($permission['permission']['manage_dashboard'])
												checked
											@endisset
												> Manage Dashboard
											</label>
									  </div>

								</div>
								
				                <!-- 3rd line -->
								<div class="col-lg-4 col-sm-6 col-12">
									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_currency]"
										@isset($permission['permission']['manage_currency'])
										checked
									@endisset
										> Manage Currency
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_product_category]" 
										@isset($permission['permission']['manage_product_category'])
										checked
									@endisset
										> Manage Product Categories
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_customers]" 
										@isset($permission['permission']['manage_customers'])
										checked
									@endisset
										> Manage Customers
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_expenses]"
										@isset($permission['permission']['manage_expenses'])
										checked
									@endisset
										> Manage Expenses
									</label>
									</div>

								  <div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_purchase]"
										@isset($permission['permission']['manage_purchase'])
										checked
									@endisset
										> Manage Purchase
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_sale_return]" 
										@isset($permission['permission']['manage_sale_return'])
										checked
									@endisset
										> Manage Sale Return
									</label>
									</div>

									<div class="form-group">
									<label>
										<input type="checkbox" value="1" name="permission[manage_quotations]" 
										@isset($permission['permission']['manage_quotations'])
										checked
									@endisset
										> Manage Quotations
									</label>
									</div>
								</div>
								</div>

								<div class="col-lg-12">
									<button type="submit" class="btn btn-submit me-2">Update</button>
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