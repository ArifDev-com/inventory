@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Product Edit Category</h4>
                    <h6>Edit a product Category</h6>
                </div>
            </div>
            <!-- /add -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('category.edit', $category->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" value="Computers" value="{{ $category->name }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Category Code</label>
                                    <input type="text" value="{{ $category->name }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control">{{ $category->name }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Product Image</label>
                                    <div class="image-upload">
                                        <input type="file">
                                        <div class="image-uploads">
                                            <img src="{{ asset('upload/categories/' . $category->image) }}" alt="img">s
                                            <h4>Drag and drop a file to upload</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="product-list">
                                    <ul class="row">
                                        <li class="ps-0">
                                            <div class="productviews">
                                                <div class="productviewsimg">
                                                    <img src="{{ asset('backend') }}/img/icons/macbook.svg" alt="img">
                                                </div>
                                                <div class="productviewscontent">
                                                    <div class="productviewsname">
                                                        <h2>macbookpro.jpg</h2>
                                                        <h3>581kb</h3>
                                                    </div>
                                                    <a href="javascript:void(0);" class="hideset">x</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Update</button>
                                <a href="categorylist.html" class="btn btn-cancel">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /add -->
        </div>
    </div>
@endsection
