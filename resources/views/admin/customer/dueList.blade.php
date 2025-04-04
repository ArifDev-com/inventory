@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Due List</h4>
            </div>
        </div>
        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <a href="{{ route('due.list', ['print' => 1]) }}"
                    target="_blank"
                    class="btn btn-info btn-sm">
                    <i class="fa fa-print"></i> Print Due List
                </a>
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Customer</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Total Due</th>
                                <th>Due Payment Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $key => $customer)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td style="text-align: left;">
                                    <a href="{{ route('customer.show', ['customer' => $customer->id]) }}">
                                        {{ $customer->name }}
                                    </a>
                                </td>
                                <td>{{ $customer->phone }}</td>
                                <td style="text-align: left;">{{ $customer->address }}</td>
                                <td>{{ $customer->sales()->sum('due_amount') }}</td>
                                <td>
                                    {{ $customer->sales()->where('due_amount', '>', 0)->max('due_date') }}
                                </td>
                                <td>
                                    <a href="{{ route('due.payment', ['customer' => $customer->id]) }}" class="btn btn-info btn-sm">
                                         Pay Due
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