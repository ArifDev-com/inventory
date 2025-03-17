@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>User Management</h4>
                <h6>Edit/Update User</h6>
            </div>
            <a href="{{ route('user.index') }}" class="btn btn-info" >Back</a>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                <div class="row">

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" value="{{ $user->first_name }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" value="{{ $user->last_name }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" value="{{ $user->phone }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" value="{{ $user->email}}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Role</label>
                            <select class="select" name="role_id">
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ $role->id == $user->role_id ? 'selected' : '' }}>
                                    {{ $role->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" >
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>	User Image</label>
                            <div class="image-upload">
                                <input type="file" name="image">
                                <div class="image-uploads">
                                    <img src="{{asset('backend')}}/img/icons/upload.svg" alt="img">
                                    <h4>Drag and drop a file to upload</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="product-list">
                            <ul class="row">
                                <li class="ps-0">
                                    <div class="productviewset">
                                        <div class="productviewsimg">
                                            <img src="{{asset($user->image)}}" alt="img">
                                        </div>
                                        <div class="productviewscontent">
                                            <a href="javascript:void(0);" class="hideset"><i class="fa fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
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