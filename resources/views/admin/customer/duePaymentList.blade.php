@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Due Payment List</h4>
            </div>
            <div class="page-btn">
                <a href="{{ route('due.payment') }}" class="btn btn-added"><img src="{{asset('backend')}}/img/icons/plus.svg" alt="img">Add Due Payment</a>
            </div>
        </div>
        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Customer Name</th>
                                <th>Phone</th>
                                <th>Company Name</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $key => $payment)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td class="productimgname">
                                    {{ $payment->customer->name }}
                                </td>
                                @if($payment->customer->phone)
                                    <td>{{ $payment->customer->phone }}</td>
                                @else
                                    <td>Null</td>
                                @endif

                                @if($customer->email)
                                    <td>{{ $customer->email }}</td>
                                @else
                                    <td>Null</td>
                                @endif
                                {{-- <td>{{ $customer->country->name }} </td>
                                <td>{{ $customer->city->name }}</td> --}}

                                @if($customer->address)
                                    <td>{{ $customer->address }}</td>
                                @else
                                    <td>Null</td>
                                @endif
                                @if($customer->company_name)
                                    <td>{{ $customer->company_name }}</td>
                                @else
                                    <td>Null</td>
                                @endif
                                <td id="grand_total">{{ $customer->sales()->sum('grandtotal') ?? 'N/A' }}</td>
                                <td id="paid_amount">{{ $customer->sales()->sum('paid_amount') ?? 'N/A'}}</td>
                                <td id="due_amount">{{ $customer->sales()->sum('due_amount') ?? 'N/A' }}</td>
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

    <!-- edit payment Modal -->
@endsection

@section('scripts')
    <script>

</script>

<script>
    let table = new DataTable('#myTable');
</script>

@endsection