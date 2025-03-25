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
                                <th>Customer</th>
                                <th>Phone</th>
                                <th>Payment Date</th>
                                <th>Inv. No.</th>
                                <th>Paid Amount</th>
                                <th>Payment Method</th>
                                <th>Due Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(App\Models\CutomerPayment::where('is_due_pay', true)->get() as $key => $payment)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $payment->customer?->name }}</td>
                                <td>{{ $payment->customer?->phone }}</td>
                                <td>{{ $payment->date }}</td>
                                <td>{{ $payment->sale?->ref_code }}</td>
                                <td>{{ $payment->paying_amount }}</td>
                                <td>{{ $payment->payment_method }}</td>
                                <td>{{ $payment->due_date }}</td>
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