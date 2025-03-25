@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Create Sales Return</h4>
                <h6>Add/Update Sales Return</h6>
            </div>
            <a href="{{ route('sale.return.list') }}" class="btn btn-info">Back</a>
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
                <form action="">
                    <div class="form-group">
                        <label for="sale_id">Select Invoice</label>
                        <select name="sale_id" id="sale_id" class="form-control select2" required>
                            <option value="">Select Invoice</option>
                            @foreach ($sales as $sale)
                            <option value="{{ $sale->id }}">{{ $sale->ref_code }} - {{ $sale->customer?->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>
@endsection
