@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Send Bulk SMS</h4>
                <h6>Send SMS to multiple customers</h6>
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
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                            aria-selected="true">
                            Custom Number
                        </button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" onclick="initSelect2()"
                            type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                            Customers
                        </button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <form action="{{ route('customer.bulk.sms.send') }}" method="post"
                        onsubmit="$('.btn-submit').text('Sending...');" class="pt-4">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number:</label>
                                        <input type="number" class="form-control select2" name="phones[]" maxlength="11" minlength="10" required />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea class="form-control" name="message" required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-submit me-2">Send</button>
                                    <a href="{{ route('customer.bulk.sms') }}" class="btn btn-cancel">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <form action="{{ route('customer.bulk.sms.send') }}" method="post"
                        onsubmit="$('.btn-submit').text('Sending...');" class="pt-4">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Customer</label>
                                        <select class="form-control select-phones select2" name="phones[]" required multiple>
                                            @foreach ($customers as $customer)
                                            <option value="{{ $customer->phone }}">{{ $customer->phone }} ({{ $customer->name
                                                }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">&nbsp;</label>
                                        <button class="btn btn-primary btn-sm" type="button" id="select-all-customers"
                                            onclick="selectAllCustomers()">
                                            <i class="fa fa-plus"></i> Select all
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea class="form-control" name="message" required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-submit me-2">Send</button>
                                    <a href="{{ route('customer.bulk.sms') }}" class="btn btn-cancel">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    function initSelect2() {
        $(".select-phones.select2").select2({
            multiple: true,
            placeholder: "Select Customer phones",
            allowClear: true,
        });
    }

    function selectAllCustomers() {
        var allCustomerIds = []
        $(".select-phones.select2 option").each(function() {
            allCustomerIds.push($(this).attr('value'));
        });
        $(".select-phones.select2").val(allCustomerIds)
            .trigger('change');
    }
</script>

@endsection