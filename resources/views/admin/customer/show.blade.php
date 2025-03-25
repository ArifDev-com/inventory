@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Customer Details</h4>
                <h6>Customer Details</h6>
            </div>
        </div>
        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div>
                    <h2>Name: {{ $customer->name }}</h2>
                </div>
                <div>
                    <b>ID:</b>
                    <span>{{ $customer->id }}</span>
                </div>
                <div>
                    <b>Phone:</b>
                    <span>{{ $customer->phone }}</span>
                </div>
                <div>
                    <b>Email:</b>
                    <span>{{ $customer->email }}</span>
                </div>
                <div>
                    <b>Address:</b>
                    <span>{{ $customer->address }}</span>
                </div>
                <div>
                    <b>Company:</b>
                    <span>{{ $customer->company_name }}</span>
                </div>
                <div class="mt-5">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Total Orders</h5>
                                    <span>{{ $customer->sales->count() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Total Purchased</h5>
                                    <span>{{ $customer->sales->sum('grandtotal') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Total Paid</h5>
                                    <span>{{ $customer->sales->sum('paid_amount') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Total Due</h5>
                                    <span>{{ $customer->sales->sum('due_amount') }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Total Return Item</h5>
                                    <span>{{ $customer->returns }}</span>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <hr>
                <div class="mt-3">
                    <h5>Due Pay History: </h5>
                    <div class="mt-2 table-responsive">
                        <table class="table" id="example2">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Payment Date</th>
                                    <th>Inv. No.</th>
                                    <th>Paid Amount</th>
                                    <th>Payment Method</th>
                                    <th>Due Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customer->payments()->where('is_due_pay', true)->get() as $key => $payment)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $payment->date }}</td>
                                    <td>{{ $payment->sale?->ref_code }}</td>
                                    <td>{{ $payment->paying_amount }}</td>
                                    <td>{{ $payment->payment_method }}</td>
                                    <td>{{ $payment->due_date }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="mt-3">
                    <h5>Orders: </h5>
                    <div class="mt-2 table-responsive">
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Inv. No.</th>
                                    <th>Date</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Discount</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Payment Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customer->sales as $key => $sale)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $sale->id }}</td>
                                    <td>{{ $sale->date }}</td>
                                    <td style="width: 400px;">
                                        <table class="" style="width: 100%;">
                                            <thead style="background: none; border: none;">
                                                <tr style="background-color: none;">
                                                    <th style="border: 1px solid gray;">Product</th>
                                                    <th style="border: 1px solid gray;">Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($sale->items as $item)
                                                <tr>
                                                    <td style="border: 1px solid gray; text-align: left;">{{ $item->product?->name }}</td>
                                                    <td style="border: 1px solid gray; width: 70px">{{ $item->quantity }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>{{ $sale->grandtotal }}</td>
                                    <td>{{ $sale->discount }}</td>
                                    <td>{{ $sale->paid_amount }}</td>
                                    <td>{{ $sale->due_amount }}</td>
                                    <td>
                                        {{ $sale->payment_type }}
                                    </td>
                                    <td>
                                        <a href="{{ route('sale.pdf', $sale->id) }}" class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            pageLength: 10,
            language: {
                'paginate': {
                    'previous': '<i class="fa fa-arrow-left"></i>',
                    'next': '<i class="fa fa-arrow-right"></i>'
                }
            }
        });
        $('#example2').DataTable({
            pageLength: 10,
            language: {
                'paginate': {
                    'previous': '<i class="fa fa-arrow-left"></i>',
                    'next': '<i class="fa fa-arrow-right"></i>'
                }
            }
        });
    });
</script>
@endsection