@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>{{ trans('sidebar.product.import.import products') }}</h4>
                <h6>{{ trans('sidebar.product.import.bulk upload your products') }}</h6>
            </div>
        </div>

        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div class="requiredfield">
                    <h4>{{ trans('table.import.field must be in csv format') }}</h4>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <a class="btn btn-submit w-100">{{ trans('table.import.download sample file') }}</a>
                        </div>
                    </div>
                         <!-- Success message -->
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                  @endif

                    <div class="col-lg-12">
                        <form method='post' action="{{ route('product.importdata') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>	{{ trans('table.import.upload csv file') }}</label>
                            <div class="image-upload">
                                <input type="file" name="file">
                                <div class="image-uploads">
                                    <img src="{{asset('backend')}}/img/icons/upload.svg" alt="img">
                                    <h4>{{ trans('table.import.drag and drop a file to upload') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="productdetails productdetailnew">
                            <ul class="product-bar">
                                <li>
                                    <h4>{{ trans('table.import.product name') }}</h4>
                                    <h6 class="manitorygreen">{{ trans('table.import.this field is required') }}</h6>
                                </li>
                                <li>
                                    <h4>{{ trans('table.import.category') }}</h4>
                                    <h6 class="manitorygreen">{{ trans('table.import.this field is required') }}</h6>
                                </li>
                                <li>
                                    <h4>{{ trans('table.import.subCategory') }}</h4>
                                    <h6 class="manitorygreen">{{ trans('table.import.this field is required') }}</h6>
                                </li>
                        
                                <li>
                                    <h4>{{ trans('table.import.purchase_price') }}</h4>
                                    <h6 class="manitorygreen">{{ trans('table.import.this field is required') }}</h6>
                                </li>
                                <li>
                                    <h4>{{ trans('table.import.product_price') }}</h4>
                                    <h6 class="manitorygreen">{{ trans('table.import.field optional') }}</h6>
                                </li>
                                <li>
                                    <h4>{{ trans('table.import.product unit') }}</h4>
                                    <h6 class="manitorygreen">{{ trans('table.import.this field is required') }}</h6>
                                </li>
                                <li>
                                    <h4>{{ trans('table.import.description') }}</h4>
                                    <h6 class="manitoryblue">{{ trans('table.import.this field is required') }}</h6>
                                </li>
                                <li>
                                    <h4>{{ trans('table.import.status') }}</h4>
                                    <h6 class="manitoryblue">{{ trans('table.import.this field is required') }}</h6>
                                </li>
                                <li>
                                    <h4>{{ trans('table.import.image') }}</h4>
                                    <h6 class="manitoryblue">{{ trans('table.import.this field is required') }}</h6>
                                </li>
                                <li>
                                    <h4>{{ trans('table.import.product_slug') }}</h4>
                                    <h6 class="manitoryblue">{{ trans('table.import.this field is required') }}</h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="productdetails productdetailnew">
                            <ul class="product-bar">
                                <li>
                                    <h4>{{ trans('table.import.minimum qty') }}</h4>
                                    <h6 class="manitoryblue">{{ trans('table.import.this field is required') }}</h6>
                                </li>
                                <li>
                                    <h4>{{ trans('table.import.quantity') }}</h4>
                                    <h6 class="manitoryblue">{{ trans('table.import.this field is required') }}</h6>
                                </li>
                                <li>
                                    <h4>{{ trans('table.import.tax') }}</h4>
                                    <h6 class="manitoryblue">{{ trans('table.import.this field is required') }}</h6>
                                </li>
                                <li>
                                    <h4>{{ trans('table.import.discount') }}</h4>
                                    <h6 class="manitoryblue">{{ trans('table.import.this field is required') }}</h6>
                                </li>
                                <li>
                                    <h4>{{ trans('table.import.brand') }}</h4>
                                    <h6 class="manitoryblue">{{ trans('table.import.this field is required') }}</h6>
                                </li>
                                <li>
                                    <h4>{{ trans('table.import.warehouse') }}</h4>
                                    <h6 class="manitoryblue">{{ trans('table.import.this field is required') }}</h6>
                                </li>
                                <li>
                                    <h4>{{ trans('table.import.supplier') }}</h4>
                                    <h6 class="manitoryblue">{{ trans('table.import.this field is required') }}</h6>
                                </li>
                                <li>
                                    <h4>{{ trans('table.import.product code') }}</h4>
                                    <h6 class="manitoryblue">{{ trans('table.import.this field is required') }}</h6>
                                </li>
                                <li>
                                    <h4>{{ trans('table.import.user') }}</h4>
                                    <h6 class="manitoryblue">{{ trans('table.import.this field is required') }}</h6>
                                </li>
                                <li>
                                    <h4>{{ trans('table.import.barcode url') }}</h4>
                                    <h6 class="manitoryblue">{{ trans('table.import.this field is required') }}</h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-submit me-2">{{ trans('table.import.submit') }}</button>
                            <a href="" class="btn btn-cancel">{{ trans('table.import.cancel') }}</a>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>
@endsection