@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>User Management</h4>
                <h6>Add/Update User</h6>
            </div>
            <a href="{{ route('user.index') }}" class="btn btn-info" >Back</a>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="first_name" required>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" required>
                        </div>
                    </div> --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" autocomplete="new-password">
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>User Role</label>
                            <select class="select" name="user_role">
                                <option>Select User Role</option>
                                <option value="superadmin">Super Admin</option>
                                <option value="admin">Admin</option>
                                <option value="salesman">Salesman</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>	User Image</label>
                            <div class="image-upload">
                                <input type="file" name="image">
                                <div class="image-uploads">
                                    <img src="{{asset('backend')}}/img/icons/upload.svg" alt="img" >
                                    <h4>Drag and drop a file to upload</h4>
                                </div>
                            </div>
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