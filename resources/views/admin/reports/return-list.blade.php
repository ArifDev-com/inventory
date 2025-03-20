@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Return Report</h4>
            </div>
        </div>

        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <!-- /Filter -->
                {{-- <div class="card" id="filter_inputs"> --}}
                    <div class="card" >
                    <div class="card-body pb-0">
                        <form action="{{ route('return.report') }}" method="get">
                        <div class="row">

                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <div class="input-groupicon">
                                        <input type="text" name="from_date" placeholder="From Date" class="datetimepicker">
                                        <div class="addonset">
                                            <img src="{{asset('backend')}}/img/icons/calendars.svg" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <div class="input-groupicon">
                                        <input type="text" name="to_date" placeholder="To Date" class="datetimepicker">
                                        <div class="addonset">
                                            <img src="{{asset('backend')}}/img/icons/calendars.svg" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-sm-6 col-12 ">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-filters"><img src="{{asset('backend')}}/img/icons/search-whites.svg" alt="img"></a>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table " id="example">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Customer</th>
                                {{-- <th>Payment</th> --}}
                                <th>Items</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($saleReturns as $key => $saleReturn)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $saleReturn->id }}</td>
                                <td>{{ $saleReturn->date }}</td>
                                <td>{{ $saleReturn->customer->name }}</td>

                                {{-- <td>
                                    <span class="badges bg-lightgreen">{{ $saleReturn->payment_type }}</span>
                                </td> --}}
                                <td style="width: 400px;">
                                    <table class="" style="width: 100%;">
                                        <thead style="background: none; border: none;">
                                            <tr style="background-color: none;">
                                                <th style="border: 1px solid gray;">Product</th>
                                                <th style="border: 1px solid gray;">Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($saleReturn->items as $item)
                                            <tr>
                                                <td style="border: 1px solid gray; text-align: left;">{{ $item->product?->name }}</td>
                                                <td style="border: 1px solid gray; width: 70px">{{ $item->quantity }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </td>
                                <td>{{ $saleReturn->grandtotal }}</td>
                                <td>{{ $saleReturn->paid_amount }}</td>
                                <td>
                                    {{ $saleReturn->user?->name }}
                                </td>
                                <td>
                                    <a href="{{ route('sale.return.pdf', $saleReturn->id) }}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                         @endforeach

                    </table>
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>

<script>

    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf' , 'print'
        ]
    } );

</script>


@endsection