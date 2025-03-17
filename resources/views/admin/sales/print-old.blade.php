@extends('layouts.app')
@section('content')
<div class="page-wrapper mt-5">
<div class="container">
<div class="row">

  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
	  <p><strong>Shop Information</strong></p>
		<div class="form-group">
		<p>Name: City Shop</p>
		<p>Email: cityshop@gmail.com</p>
		<p>Phone: 01900000011</p>
		<p>Address: Savar, Dhaka</p>
	  </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
	  <p><strong>Customer Information</strong></p>
		<div class="form-group">
		<p>Name: Md.Rahim Hossin</p>
		<p>Email: rahim123@gmail.com</p>
		<p>Phone: 01933518972</p>
		<p>Address: Uttara, Dhaka</p>
		</div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
	  <p><strong>Sale Document</strong></p>
		<div class="form-group">
		<p>Invoice Id: ### </p>
		<p>Date: 10/04/23</p>
        <br>
		<br>
		<br>
		</div>
      </div>
    </div>
  </div>
  </div>

		      <div class="row">
								<div class="table-responsive mb-3">
									<table class="table">
										<thead>
											<tr>
											    <th>S/N</th>
												<th>Product Name</th>
												<th>QTY</th>
												<th>Price</th>
												<th>Discount</th>
												<th>Tax</th>
												<th class="text-end">Subtotal</th>
											</tr>
										</thead>
										<tbody>
                                     			<tr>
												<td>1</td>
												<td class="productimgname">
													<a class="product-img">
														<img src="{{asset('backend')}}/img/product/product7.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">Apple Earpods</a>
												</td>
												<td>1.00</td>
												<td>15000.00</td>
												<td>0.00</td>
												<td>0.00</td>
												<td class="text-end">1500.00</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 float-md-right">
									<div class="total-order">
										<ul>
											<li>
												<h4>Total</h4>
												<h5 id="total">$ 0.00 </h5>
											</li>
											<li>
												<h4>Discount</h4>
												<input type="text" name="discount" style="margin-left:30px;">
											</li>	
											<li>
												<h4>GrandTotal</h4>
												<h5 id="grandtotal">$ 0.00 </h5>
											</li>
											<li>
												<h4>Paid Amount</h4>
												 <h5 id="paid_total">$ 0.00 </h5>
											</li>
											<li>
												<h4>Due Amount</h4>
												<h5 id="due_total">$ 0.00 </h5>
											</li>
										</ul>
									</div>
								</div>
							</div>
							
						<div class="row mb-5">
						<div class="col-lg-12">
							<p>IN Word: </p>
							<p>Note: </p>
						</div>
						</div>
						
						<div class="row">
						<div class="col-lg-6">
						<p>
						<span> ------------ </span>
						<strong> Customer's Signature </strong>
						</p>
						</div>
						
						<div class="col-lg-6">
						<p style="text-align:right">
						<span> ------------ </span>
						<strong> Authorized Signature </strong>
						</p>
						</div>
	                </div>
					<hr>
					<div class="row">
					<div class="col-lg-12">
					<p style="text-align:center"> Software Developed by SHERAZI IT. For query: 01900000000 </P>
					</div>
					</div>
					
					<div class="row">
					<div class="col-lg-12">
					<div class="d-grid gap-2">
					<button type="button" class="btn-secondary"><img src="{{asset('backend')}}/img/icons/printer.svg" alt="img">Print</button>
					</div>
					</div>
					</div>
					
					<div class="row mt-2 mb-5">
					<div class="col-lg-6">
					<div class="d-grid gap-2">
					<button type="button" class="btn-primary"><img src="{{asset('backend')}}/img/icons/return1.svg" alt="img">New Sale</button>
					</div>
					</div>
					
					<div class="col-lg-6">
					<div class="d-grid gap-2">
					<button type="button" class="btn-primary"><img src="{{asset('backend')}}/img/icons/return1.svg" alt="img">Sale List</button>
					</div>
					</div>
					
					</div>
					</div>
@endsection

