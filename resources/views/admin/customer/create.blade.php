@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Customer Management</h4>
                <h6>Add/Update Customer</h6>
            </div>
            <a href="{{ route('customer.index') }}" class="btn btn-info" >Back</a>
        </div>
        <!-- /add -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('customer.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" name="name" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" name="company_name">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" required>
                        </div>
                    </div>

        {{-- <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>Country</label>
                <select class="select" name="country_id">
                    <option>Choose Country</option>
                    @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
                </select>
            </div>
        </div> --}}

        {{-- <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>City</label>
                <select class="select" name="city_id">
                    <option>Choose City</option>
                    @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
                </select>
            </div>
        </div> --}}


        {{-- <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" class="form-control" name="dob" value="<?php echo date("Y-m-d");?>">
            </div>
        </div> --}}

                    <div class="col-lg-12 col-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                        <a href=""  class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <!-- /add -->
    </div>
</div>
@endsection