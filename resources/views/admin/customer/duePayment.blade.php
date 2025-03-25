@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Make Due Payment</h4>
                <h6>Add/Update Due Payment</h6>
            </div>
            {{-- <a href="{{ route('due.payment.list') }}" class="btn btn-info">Back</a> --}}
        </div>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('due.payment') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div>
                                @include('common.customer')
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Sale</label>
                                <select class="form-control select2" name="sale_id" required>
                                    <option value="">Select Sale</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="number" class="form-control" name="paying_amount" required min="0">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Next Due</label>
                                <input type="number" class="form-control" name="next_due" readonly required min="0">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Payment Method</label>
                                <select class="form-control select2" name="payment_method" required>
                                    <option value="cash" selected>Cash</option>
                                    <option value="bank">Bank</option>
                                    <option value="bkash">Bkash</option>
                                    <option value="rocket">Rocket</option>
                                    <option value="mobile_banking">Mobile Banking</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Payment Date</label>
                                <input type="date" class="form-control" name="payment_date" required value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Next Due Date: (If applicable)</label>
                                <input type="date" class="form-control" name="next_due_date">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Note</label>
                                <textarea class="form-control" name="note"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @php
        $sales = \App\Models\Sale::all(['id', 'customer_id', 'due_amount', 'ref_code']);
    @endphp
<script>
    let allSales = @json($sales);
    $(document).ready(function () {
        $('select[name="customer_id"]').on('change', function () {
            var customer_id = $(this).val();
            let sales = allSales.filter(sale => sale.customer_id == customer_id && sale.due_amount > 0);
            let totalDue = sales.reduce((acc, sale) => acc + sale.due_amount, 0);
            $('[name="paying_amount"]').val(totalDue);
            $('[name="paying_amount"]').attr('max', totalDue);
            $('[name="next_due"]').val(0);

            $('input[name="paying_amount"]').on('keyup', function () {
                let nextDue = $(this).attr('max') - $(this).val();
                $('input[name="next_due"]').val(nextDue);
            });

        });

        @if(request()->customer)
        setTimeout(() => {
            // check url param customer
            let customer = new URLSearchParams(window.location.search).get('customer');
            if (customer) {
                $('select[name="customer_id"]').html('');
                $('select[name="customer_id"]').append('<option value="' + customer + '">{{  App\Models\Customer::find(request()->customer)?->name }}</option>');
                $('select[name="customer_id"]').val(customer).trigger('change');
            }
        }, 500);
        @endif
    });
    @if(session('payments'))
        let payments = @json(json_decode(session('payments'), true));
        payments.forEach(payment => {
            window.open("{{ route('due.payment.print', ':id') }}".replace(':id', payment.id), '_blank');
        });
    @endif
</script>

@endsection