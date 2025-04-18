@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Due Added History</h4>
                <h6>Manage your Due Added History</h6>
            </div>
        </div>
        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <!-- /Filter -->
                <div>
                    <form class="row">
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="form-group">
                                <input type="text" class="datetimepicker cal-icon" placeholder="Choose Date"
                                    value="{{ $fromDate->format('d-m-Y') }}" name="from_date" id="from_date">
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="form-group">
                                <input type="text" class="datetimepicker cal-icon" placeholder="Choose Date"
                                    value="{{ $toDate->format('d-m-Y') }}" name="to_date" id="to_date">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-group w-100">
                                <button type="submit" class="btn btn-filters d-inline-block"
                                    onclick="this.form.target='';"
                                >
                                    <img
                                        src="{{ asset('backend') }}/img/icons/search-whites.svg" alt="img">
                                </button>
                                <button type="submit" class="btn btn-info"
                                    onclick="this.form.target='_blank';"
                                    name="print" value="1">
                                    <i class="fa fa-print" aria-hidden="true"></i>
                                    Print
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <script>
                    function openOther() {
                        window.open(location.href.split('?')[0] + '?print_material=1&from_date=' + document.getElementById('from_date').value + '&to_date=' + document.getElementById('to_date').value, '_blank');
                    }
                </script>
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>S.L</th>
                                <th>Code</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Discount</th>
                                <th>Due</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dueAddedHistory ?? [] as $key => $sale)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ route('sale.pdf', $sale->id) }}" target="_blank">
                                        {{ $sale->ref_code }}
                                    </a>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($sale->date)->format('d-m-Y') }}</td>
                                <td style="text-align: left;">{{ $sale->customer?->name }}</td>
                                <td>{{ $sale->customer?->phone }}</td>
                                <td>{{ $sale->discount }}</td>
                                <td>{{ $sale->due_amount }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {!! $quotations->links() !!} --}}
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>

<script>
    $('#example').DataTable({ pageLength: 100,

        });
</script>
@endsection