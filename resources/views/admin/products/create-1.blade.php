@extends('layouts.app')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>

    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>{{ trans('sidebar.product.create.product create') }}</h4>
                    <h6>{{ trans('sidebar.product.create.add your product') }}</h6>
                </div>
                <a href="{{ route('product.index') }}" class="btn btn-info" >{{ trans('sidebar.product.create.back') }}</a>
            </div>
           
            <!-- /add -->
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                  
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>{{ trans('form.form.product_name') }}</label>
                                    <input type="text" name="name" placeholder="{{ trans('form.form.enter product name') }}">
                                </div>
                            </div>

                          

                            {{-- <div class="col-lg-3 col-sm-6 col-12 ">
                                <div class="form-group">
                                    <label>{{ trans('form.form.sku') }}</label>
                                    <input type="text" name="product_code" required placeholder="{{ trans('form.form.enter sku') }}">
                                </div>
                            </div> --}}

                            @php 
                                $randNumber = rand(1000,100000);
                            @endphp


                            <div class="col-lg-3 col-sm-6 col-12 ">
                                <div class="form-group">
                                    <label>{{ trans('form.form.product_code') }}</label>
                                    <input type="text" name="product_code" value="<?php echo $randNumber; ?>" placeholder="{{ trans('form.form.enter product_code') }}">
                                </div>
                            </div>

                            {{-- <div class="col-lg-3 col-sm-6 col-12 ">
                                <div class="form-group">
                                    <label>{{ trans('form.form.product_size') }}</label>
                                    <input type="text" name="product_size" required placeholder="{{ trans('form.form.enter product_size') }}">
                                </div>
                            </div> --}}

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>{{ trans('form.form.category') }}</label>
                                    <select class="" name="category_id" >
                                        {{-- <option>{{ trans('form.form.choose category') }}</option> --}}
                                        <option value=""></option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>{{ trans('form.form.sub_category') }}</label>
                                    <select class="" name="subCategory_id" >
                                        {{-- <option>{{ trans('form.form.choose subCategory') }}</option> --}}
                                         <option value=""></option>
                                        @foreach ($subCategories as $subCategory)
                                            <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>{{ trans('form.form.brand') }}</label>
                                    <select class="" name="brand_id" >
                                        {{-- <option>{{ trans('form.form.choose brand') }}</option> --}}
                                        <option value=""></option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>{{ trans('form.form.unit') }}</label>
                                    <select class="" name="unit_id" >
                                        {{-- <option>{{ trans('form.form.choose unit') }}</option> --}}
                                        <option value=""></option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>{{ trans('form.form.warehouse') }}</label>
                                    <select class="" name="warehouse_id" required>
                                        {{-- <option>{{ trans('form.form.choose warehouse') }}</option> --}}
                                        @foreach ($warehouses as $warehouse)
                                            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    {{-- <label>{{ trans('form.form.supplier') }}</label> --}}
                                    <label>Supplier</label>
                                    <select class="" name="supplier_id" >
                                        {{-- <option>{{ trans('form.form.choose supplier') }}</option> --}}
                                        {{-- <option>{{ trans('form.form.choose picker') }}</option> --}}
                                        <option value=""></option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                          
                            <div class="col-lg-3 col-sm-6 col-12 ">
                                <div class="form-group">
                                    <label>{{ trans('form.form.minimum_qty') }}</label>
                                    <input type="text" name="min_qty" required placeholder="{{ trans('form.form.enter minimum_qty') }}" value="5" >
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12 ">
                                <div class="form-group">
                                    <label>{{ trans('form.form.quantity') }}</label>
                                    <input type="text" name="quantity" required placeholder="{{ trans('form.form.enter quantity') }}" value="1" >
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>{{ trans('form.form.purchase_price') }}</label>
                                    <input type="text" name="purchase_price" required placeholder="{{ trans('form.form.enter purchase price') }}">
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>MRP Price</label>
                                    <input type="text" name="price" required placeholder="{{ trans('form.form.enter price') }}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ trans('form.form.description') }}</label>
                                    <textarea class="form-control" name="description" required placeholder="{{ trans('form.form.enter description') }}"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>{{ trans('form.form.tax') }}</label>
                                    <select class="" name="tax" >
                                        {{-- <option>{{ trans('form.form.select tax') }}</option> --}}
                                       
                                        <option value="0">0%</option>
                                        <option value="2">2%</option>
                                        <option value="5">5%</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>{{ trans('form.form.discount') }}</label>
                                    <select class="" name="discount" >
                                       
                                        {{-- <option>{{ trans('form.form.select discount') }}</option> --}}
                                     
                                        <option value="0">0%</option>
                                        <option value="5">5%</option>
                                        <option value="10">10%</option>
                                        <option value="15">15%</option>
                                        <option value="20">20%</option>
                                    </select>
                                </div>
                            </div>
                   
                            
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label> {{ trans('form.form.status') }}</label>
                                    <select class="" name="status" >
                                        {{-- <option>{{ trans('form.form.select status') }}</option> --}}
                                        <option value=""></option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> {{ trans('form.form.product image') }}</label>
                                    <div class="image-upload">
                                        <input type="file" name="image" >
                                        <div class="image-uploads">
                                            <img src="{{ asset('backend') }}/img/icons/upload.svg" alt="img">
                                            <h4>{{ trans('form.form.drag and drop a file to upload') }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">{{ trans('form.form.save') }}</button>
                                <a href="" class="btn btn-cancel">{{ trans('form.form.cancel') }}</a>
                            </div>
                    </div>
                </form>
                </div>
            </div>
            <!-- /add -->
        </div>
    </div>

    <script>
        $('select').select2({ width: '100%', placeholder: "Default", allowClear: true });
   
        
       </script>
       
@endsection
