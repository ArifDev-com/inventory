@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>{{ trans('sidebar.product.detail.product details') }}</h4>
                    <h6>{{ trans('sidebar.product.detail.full details of a product') }}</h6>
                </div>
                <a href="{{ route('product.index') }}" class="btn btn-info" >{{ trans('sidebar.product.detail.back') }}</a>
            </div>
            <!-- /add -->
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- <div class="bar-code-view"> --}}
                            <div class="">
                                <img src="{{ asset($product->barcode_url) }}" alt="barcode">

                                <p>Product Name - {{ $product->name }} | Price - {{ $product->price }}</p>

                                {{-- <a class="printimg">
                                    <img src="{{ asset('backend') }}/img/icons/printer.svg" alt="print">
                                </a> --}}
                            </div>

                            <div class="productdetails mt-2">
                                <ul class="product-bar">
                                    <li>
                                        <h4>{{ trans('details.form.product_name') }}</h4>
                                        <h6>{{ $product->name }}</h6>
                                    </li>

                                    <li>
                                        <h4>Product Code</h4>
                                        <h6>{{ $product->code }}</h6>
                                    </li>

                                    <li>
                                        <h4>{{ trans('details.form.quantity') }}</h4>
                                        <h6>{{ $product->quantity }}</h6>
                                    </li>
                                    <li>
                                        <h4>Stock Alert</h4>
                                        <h6>{{ $product->alert_quantity }}</h6>
                                    </li>
                                    <li>
                                        <h4>{{ trans('details.form.purchase_price') }}</h4>
                                        <h6>{{ $product->purchase_price }}</h6>
                                    </li>
                                    <li>
                                        <h4>Wholesale Price</h4>
                                        <h6>{{ $product->wholesale_price }}</h6>
                                    </li>
                                    <li>
                                        <h4>Retail Price</h4>
                                        <h6>{{ $product->retail_price }}</h6>
                                    </li>
                                    <li>
                                        <h4>{{ trans('details.form.price') }}</h4>
                                        <h6>{{ $product->price }}</h6>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="slider-product-details">
                                <div class="owl-carousel owl-theme product-slide">
                                    <div class="slider-product">
                                        @if($product->image)
                                        <img src="{{ asset($product->image) }}" alt="img">
                                        @else
                                        <img src="{{ asset('backend\img\img-01.jpg')}}" alt="product">
                                        @endif
                                        {{-- <h4>macbookpro.jpg</h4>
                                        <h6>581kb</h6> --}}
                                    </div>
                                    {{-- <div class="slider-product">
                                        <img src="{{ asset('backend') }}/img/product/product69.jpg" alt="img">
                                        <h4>macbookpro.jpg</h4>
                                        <h6>581kb</h6>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /add -->
        </div>
    </div>
@endsection
