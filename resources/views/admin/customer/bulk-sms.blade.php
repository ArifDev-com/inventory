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
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route('customer.bulk.sms.send') }}" method="post"
                    onsubmit="$('.btn-submit').text('Sending...');"
                >
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Customer</label>
                                <select class="form-control select2" name="phones[]" required multiple>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->phone }}">{{ $customer->phone }} ({{ $customer->name }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" name="message"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2"

                            >Send</button>
                            <a href="{{ route('customer.bulk.sms') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    $(document).ready(function () {
        $(".select2").select2({
            multiple: true,
            placeholder: "Select Customer phones",
            allowClear: true,
        });
    });
</script>

@endsection