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
                <form action="{{ route('due.payments') }}" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="date" name="start_date" class="form-control" value="{{ request('start_date') ?: now()->format('Y-m-d') }}">
                        </div>
                        <div class="col-md-3">
                            <input type="date" name="end_date" class="form-control" value="{{ request('end_date') ?: now()->format('Y-m-d') }}">
                        </div>
                        <div class="col-md-3">
                            <button type="submit" onclick="this.form.target='';" class="btn btn-primary">Search</button>
                            <button type="submit" onclick="this.form.target='_blank';" name="print" value="1" class="btn btn-info">
                                <i class="fa fa-print"></i> Print
                            </button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Inv. No.</th>
                                <th>Payment Date</th>
                                <th>Customer</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Paid Amount</th>
                                <th>Due Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $key => $payment)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $payment->sale?->ref_code }}</td>
                                <td>{{ $payment->date }}</td>
                                <td>{{ $payment->customer?->name }}</td>
                                <td>{{ $payment->customer?->phone }}</td>
                                <td>{{ $payment->customer?->address }}</td>
                                <td>{{ $payment->paying_amount }}</td>
                                <td>{{ $payment->due_date }}</td>
                                <td>
                                    <a href="{{ route('due.payment.print', $payment->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-print"></i> Print
                                    </a>
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