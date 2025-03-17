@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Profile</h4>
                <h6>User Profile</h6>
            </div>
        </div>
        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div class="profile-set">
                    <div class="profile-head">

                    </div>
                    <div class="profile-top">
                        <div class="profile-content">
                            <div class="profile-contentimg">
                                <img src="{{ asset($user->image) }}" alt="img" id="blah">
                                <div class="profileupload">
                                    <input type="file" id="imgInp">
                                    <a href="javascript:void(0);" ><img src="{{ asset('backend') }}/img/icons/edit-set.svg"  alt="img"></a>
                                </div>
                            </div>
                            <div class="profile-contentname">
                                <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
                                <h4>Updates Your Photo and Personal Details.</h4>
                            </div>
                        </div>
                        <div class="ms-auto">
                            <button type="submit" class="btn btn-submit me-2">Update</button>
                            <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('user.update') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" value="{{ $user->first_name }}" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" value="{{ $user->last_name }}">
                        </div>
                    </div>
                   
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" value="{{ $user->phone }}">
                        </div>
                    </div>
              
                   
                    <div class="col-12">
                        <button type="submit" class="btn btn-submit me-2">Update</button>
                        <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>
@endsection