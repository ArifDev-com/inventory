@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Shop Document Management</h4>
                    <h6>Add/Update Shop Document</h6>
                </div>
                <a href="{{ route('shopDocument.index') }}" class="btn btn-info" >Back</a>
            </div>
            <!-- /add -->
            <div class="card">
                <div class="card-body">
                   <form action="{{ route('shopDocument.store') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                    <div class="row">
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Shop Name</label>
                                    <input type="text" name="name" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone">
                                </div>
                            </div>
             
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Product Image</label>
                                    <div class="image-upload">
                                        <input type="file" name="image" required>
                                        <div class="image-uploads">
                                            <img src="{{ asset('backend') }}/img/icons/upload.svg" alt="img">
                                            <h4>Drag and drop a file to upload</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Save</button>
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
