@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Edit Customer Management</h4>
                <h6>Edit/Update Customer</h6>
            </div>
            <a href="{{ route('customer.index') }}" class="btn btn-info" >Back</a>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('customer.update',$customer->id) }}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" name="name" value="{{ $customer->name }}" required>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" value="{{ $customer->email }}">
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" name="company_name" value="{{ $customer->company_name }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" value="{{ $customer->phone }}">
                        </div>
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" value="{{ $customer->address }}">
                        </div>
                    </div>

                    <div class="col-lg-3 col-12">
                        <div class="form-group">
                            <label>Dealer</label>
                            <select name="user_id" class="form-control select2" id="">
                                @foreach (\App\Models\User::get() as $item)
                                    <option value="{{ $item->id }}"
                                        @if ($item->id == $customer->user_id)
                                            selected
                                        @endif
                                        >{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Update</button>
                        <a href="" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <!-- /add -->
    </div>
</div>
@endsection
