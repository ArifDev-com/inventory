@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Customer List</h4>
                <h6>Manage your Customers</h6>
            </div>
            <div class="page-btn">
                <a href="{{ route('customer.create') }}" class="btn btn-added"><img src="{{asset('backend')}}/img/icons/plus.svg" alt="img">Add Customer</a>
            </div>
        </div>
        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                {{-- <div class="table-top">
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
                </div> --}}
                <!-- /Filter -->
                {{-- <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Customer Code">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Customer Name">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Phone Number">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="col-lg-1 col-sm-6 col-12  ms-auto">
                                <div class="form-group">
                                    <a class="btn btn-filters ms-auto"><img src="{{asset('backend')}}/img/icons/search-whites.svg" alt="img"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Phone</th>
                                {{-- <th>Country</th>
                                <th>City</th> --}}
                                <th>Address</th>
                                <th>Company Name</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th>Dealer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $key => $customer)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{ $customer->id }}</td>
                                <td class="productimgname">
                                    <a href="javascript:void(0);" id="cus_name">{{ $customer->name }}</a>
                                </td>
                                @if($customer->phone)
                                    <td>{{ $customer->phone }}</td>
                                @else
                                    <td>Null</td>
                                @endif

                                {{-- <td>{{ $customer->country->name }} </td>
                                <td>{{ $customer->city->name }}</td> --}}

                                @if($customer->address)
                                    <td style="text-align: left;">{{ $customer->address }}</td>
                                @else
                                    <td></td>
                                @endif
                                @if($customer->company_name)
                                    <td style="text-align: left;">{{ $customer->company_name }}</td>
                                @else
                                    <td></td>
                                @endif
                                <td id="grand_total">{{ $customer->sales()->sum('grandtotal') ?? 'N/A' }}</td>
                                <td id="paid_amount">{{ $customer->sales()->sum('paid_amount') ?? 'N/A'}}</td>
                                <td id="due_amount">{{ $customer->sales()->sum('due_amount') ?? 'N/A' }}</td>
                                <td>
                                    {{ $customer->creator?->first_name }}
                                </td>
                                <td class="text-center">
                                    {{-- <a class="me-3" href="{{ route('customer.edit',$customer->id) }}">
                                        <img src="{{asset('backend')}}/img/icons/edit.svg" alt="img">
                                    </a>
                                    <a class="me-3 confirm-text" href="{{ route('customer.delete',$customer->id) }}">
                                        <img src="{{asset('backend')}}/img/icons/delete.svg" alt="img">
                                    </a> --}}
                                    <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu"  >

                                        {{-- <li>
                                            <a href="{{route('customer.details', $customer->id)}}" class="dropdown-item"><img src="{{asset('backend')}}/img/icons/eye1.svg" class="me-2" alt="img">Customer Details</a>
                                        </li> --}}

                                        <li>
                                            <a href="{{ route('customer.edit',$customer->id) }}" class="dropdown-item"><img src="{{asset('backend')}}/img/icons/edit.svg" class="me-2" alt="img">Customer Edit</a>
                                        </li>


                                        {{-- <li>
                                            <a href="javascript:void(0);" data-id="{{ $customer->id }}" class="dropdown-item oprenCreateModal"
                                            ><img src="{{asset('backend')}}/img/icons/plus-circle.svg" class="me-2" alt="img">Create Payment</a>
                                        </li> --}}


                                        {{-- <li>
                                            <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showpayment"><img src="{{asset('backend')}}/img/icons/dollar-square.svg" class="me-2" alt="img">Show Payments</a>
                                        </li> --}}


                                        <li>
                                            <a href="{{ route('customer.delete',$customer->id) }}" class="dropdown-item confirm-text"><img src="{{asset('backend')}}/img/icons/delete1.svg" class="me-2" alt="img">Customer Delete</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                    {{-- {!! $customers->links() !!} --}}
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>

	<!-- show payment Modal -->
    <div class="modal fade" id="showpayment" tabindex="-1" aria-labelledby="showpayment" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Show Payments</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Reference</th>
                                    <th>Amount	</th>
                                    {{-- <th>Paid By	</th> --}}
                                </tr>
                            </thead>
                            <tbody>

                                {{-- @php

                                    $payments = App\Models\CustomerPayment::where('reference')->first();
                                @endphp --}}

                            {{-- @foreach($payments as  $payment)
                                <tr class="bor-b1">
                                    <td>{{ $payment->date}}	</td>
                                    <td>{{ $payment->reference}}</td>
                                    <td>{{ $payment->paying_amount}}	</td>
                            @endforeach --}}

                                    {{-- <td>
                                        <a class="me-2" href="javascript:void(0);">
                                            <img src="{{asset('backend')}}/img/icons/printer.svg" alt="img">
                                        </a>
                                        <a class="me-2" href="javascript:void(0);" data-bs-target="#editpayment" data-bs-toggle="modal" data-bs-dismiss="modal" >
                                            <img src="{{asset('backend')}}/img/icons/edit.svg" alt="img">
                                        </a>
                                        <a class="me-2 confirm-text" href="javascript:void(0);">
                                            <img src="{{asset('backend')}}/img/icons/delete.svg" alt="img">
                                        </a>
                                    </td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- show payment Modal -->

    <!-- show payment Modal -->
    <div class="modal fade" id="createpayment" tabindex="-1" aria-labelledby="createpayment" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Payment</h5>
                    <button type="button" class="btn-close createpaymentclose" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>

                <form action="{{ route('due.payment') }}" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Date</label>
                                <div class="input-groupicon">
                                    {{-- <input type="text"  class="datetimepicker" name="date" > --}}

                                    <input type="date" class="form-control" name="date" value="<?php echo date("Y-m-d");?>">
                                    {{-- <h6 id="customer_name"></h6> --}}
                                    {{-- <div class="addonset">
                                        <img src="{{asset('backend')}}/img/icons/calendars.svg" alt="img">
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Invoice No</label>
                                <input type="text" name="reference" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Paying Amount</label>
                                <input type="text" name="paying_amount" placeholder="Enter Pay Amount" required>
                            </div>
                        </div>
                        {{-- <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Payment type</label>
                                <select class="select" name="payment_type">
                                    <option value="cash">Cash</option>
                                    <option value="online">Online</option>
                                    <option value="card">Card</option>
                                </select>
                            </div>
                        </div> --}}
                        {{-- <div class="col-lg-12">
                            <div class="form-group mb-0">
                                <label>Note</label>
                                <textarea class="form-control"></textarea>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-submit">Submit</button>
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- show payment Modal -->

    <!-- edit payment Modal -->
    <div class="modal fade" id="editpayment" tabindex="-1" aria-labelledby="editpayment" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Payment</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Customer</label>
                                <div class="input-groupicon">
                                    <input type="text" value="2022-03-07" class="datetimepicker">
                                    <div class="addonset">
                                        <img src="{{asset('backend')}}/img/icons/datepicker.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Reference</label>
                                <input type="text" value="INV/SL0101">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Received Amount</label>
                                <input type="text" value="0.00">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Paying Amount</label>
                                <input type="text" value="0.00">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Payment type</label>
                                <select class="select">
                                    <option>Cash</option>
                                    <option>Online</option>
                                    <option>Inprogress</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-0">
                                <label>Note</label>
                                <textarea class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-submit">Submit</button>
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- edit payment Modal -->
@endsection

@section('scripts')
    <script>

function openCreatePamentModal(){
    $('#createpayment').modal('show');

}
// due ta payment system ta diken
$(document).ready(function () {

    // $('.oprenCreateModal').click(function (e) {
    //     e.preventDefault();
    //     let cusId =  $(this).data('id');
    //     $('#createpayment').modal('show');
    //     // $.ajax({
    //     //     type: "GET",
    //     //     url: "/admin/customer/due/"+cusId,
    //     //     dataType: "dataType",
    //     //     success: function (res) {
    //     //      console.log(res);
    //     //     }
    //     // });

    // });

	$("table tbody").delegate(".oprenCreateModal", "click",function(){
	var tr = $(this).parent().parent().parent().parent();
	// var qty = tr.find('.quantity').val();
	var due_amount = tr.find('#due_amount').text();
	var cus_name = tr.find('#cus_name').text();

    // $('#customer_name').text(cus_name);

	// var totalAmount = price * qty;
    // var inlineDiscont = tr.find('.inline_discount').text();
    // var inlinetax = tr.find('.inline_tax').text();

    let cusId =  $(this).data('id');
    $('#createpayment').modal('show');

    console.log(due_amount);

    });

    $('.createpaymentclose').click(function (e) {
        e.preventDefault();
        // alert(custId)
        $('#createpayment').modal('hide');

    });

});

</script>

<script>
    let table = new DataTable('#myTable', {pageLength:50});

</script>

@endsection
