@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>ALL Report</h4>
                <h6>Manage your All Report</h6>
            </div>
        </div>

        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-path">
                            <a class="btn btn-filter" id="filter_search">
                                <img src="{{asset('backend')}}/img/icons/filter.svg" alt="img">
                                <span><img src="{{asset('backend')}}/img/icons/closes.svg" alt="img"></span>
                            </a>
                        </div>
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="{{asset('backend')}}/img/icons/search-white.svg" alt="img"></a>
                        </div>
                    </div>
                    <div class="wordset">
                        <ul>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="{{asset('backend')}}/img/icons/pdf.svg" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="{{asset('backend')}}/img/icons/excel.svg" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="{{asset('backend')}}/img/icons/printer.svg" alt="img"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /Filter -->
                <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <div class="input-groupicon">
                                        <input type="text" placeholder="From Date" class="datetimepicker">
                                        <div class="addonset">
                                            <img src="{{asset('backend')}}/img/icons/calendars.svg" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <div class="input-groupicon">
                                        <input type="text" placeholder="To Date" class="datetimepicker">
                                        <div class="addonset">
                                            <img src="{{asset('backend')}}/img/icons/calendars.svg" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                <div class="form-group">
                                    <a class="btn btn-filters ms-auto"><img src="{{asset('backend')}}/img/icons/search-whites.svg" alt="img"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                <th>
                                    <label class="checkboxs">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmarks"></span>
                                    </label>
                                </th>
                                <th>Product Name</th>
                                <th>SKU</th>
                                <th> Category</th>
                                <th>Brand</th>
                                <th>Sold amount</th>
                                <th>Sold qty</th>
                                <th>Instock qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td class="productimgname">
                                    <a class="product-img">
                                        <img src="{{asset('backend')}}/img/product/product1.jpg" alt="product">
                                    </a>
                                    <a href="javascript:void(0);">Macbook pro</a>
                                </td>
                                <td>PT001</td>
                                <td>Computer</td>
                                <td>N/D</td>
                                <td>1500.00</td>
                                <td>1</td>
                                <td>1356</td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td class="productimgname">
                                    <a class="product-img">
                                        <img src="{{asset('backend')}}/img/product/product2.jpg" alt="product">
                                    </a>
                                    <a href="javascript:void(0);">Orange</a>
                                </td>
                                <td>PT002</td>
                                <td>Fruits</td>
                                <td>N/D</td>
                                <td>10.00</td>
                                <td>1</td>
                                <td>131</td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td class="productimgname">
                                    <a class="product-img">
                                        <img src="{{asset('backend')}}/img/product/product3.jpg" alt="product">
                                    </a>
                                    <a href="javascript:void(0);">Pineapple</a>
                                </td>
                                <td>PT003</td>
                                <td>Fruits</td>
                                <td>N/D</td>
                                <td>10.00</td>
                                <td>3</td>
                                <td>72</td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td class="productimgname">
                                    <a class="product-img">
                                        <img src="{{asset('backend')}}/img/product/product4.jpg" alt="product">
                                    </a>
                                    <a href="javascript:void(0);">Strawberry</a>
                                </td>
                                <td>PT004</td>
                                <td>Fruits</td>
                                <td>N/D</td>
                                <td>10.00</td>
                                <td>1</td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td class="productimgname">
                                    <a class="product-img">
                                        <img src="{{asset('backend')}}/img/product/product5.jpg" alt="product">
                                    </a>
                                    <a href="javascript:void(0);">Sunglasses</a>
                                </td>
                                <td>PT005</td>
                                <td>Accessories</td>
                                <td>N/D</td>
                                <td>10.00</td>
                                <td>1</td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td class="productimgname">
                                    <a class="product-img">
                                        <img src="{{asset('backend')}}/img/product/product6.jpg" alt="product">
                                    </a>
                                    <a href="javascript:void(0);">Unpaired gray</a>
                                </td>
                                <td>PT006</td>
                                <td>Shoes</td>
                                <td>Adidas</td>
                                <td>100.00</td>
                                <td>3</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td class="productimgname">
                                    <a class="product-img">
                                        <img src="{{asset('backend')}}/img/product/product7.jpg" alt="product">
                                    </a>
                                    <a href="javascript:void(0);">Avocat</a>
                                </td>
                                <td>PT007</td>
                                <td>Fruits</td>
                                <td>N/D</td>
                                <td>5.00</td>
                                <td>5</td>
                                <td>29</td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td class="productimgname">
                                    <a class="product-img">
                                        <img src="{{asset('backend')}}/img/product/product8.jpg" alt="product">
                                    </a>
                                    <a href="javascript:void(0);">Banana</a>
                                </td>
                                <td>PT008</td>
                                <td>Fruits</td>
                                <td>N/D</td>
                                <td>10.00</td>
                                <td>1</td>
                                <td>24</td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td class="productimgname">
                                    <a class="product-img">
                                        <img src="{{asset('backend')}}/img/product/product9.jpg" alt="product">
                                    </a>
                                    <a href="javascript:void(0);">Earphones</a>
                                </td>
                                <td>PT009</td>
                                <td>Computers</td>
                                <td>N/D</td>
                                <td>15.00</td>
                                <td>2</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td class="productimgname">
                                    <a class="product-img">
                                        <img src="{{asset('backend')}}/img/product/product8.jpg" alt="product">
                                    </a>
                                    <a href="javascript:void(0);">Banana</a>
                                </td>
                                <td>PT010</td>
                                <td>Health Care	</td>
                                <td>N/D</td>
                                <td>5.00</td>
                                <td>5</td>
                                <td>16</td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td class="productimgname">
                                    <a class="product-img">
                                        <img src="{{asset('backend')}}/img/product/product6.jpg" alt="product">
                                    </a>
                                    <a href="javascript:void(0);">Unpaired gray</a>
                                </td>
                                <td>PT006</td>
                                <td>Shoes</td>
                                <td>Adidas</td>
                                <td>100.00</td>
                                <td>1</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td class="productimgname">
                                    <a class="product-img">
                                        <img src="{{asset('backend')}}/img/product/product7.jpg" alt="product">
                                    </a>
                                    <a href="javascript:void(0);">Avocat</a>
                                </td>
                                <td>PT007</td>
                                <td>Fruits</td>
                                <td>N/D</td>
                                <td>5.00</td>
                                <td>2</td>
                                <td>29</td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td class="productimgname">
                                    <a class="product-img">
                                        <img src="{{asset('backend')}}/img/product/product8.jpg" alt="product">
                                    </a>
                                    <a href="javascript:void(0);">Banana</a>
                                </td>
                                <td>PT008</td>
                                <td>Fruits</td>
                                <td>N/D</td>
                                <td>10.00</td>
                                <td>2</td>
                                <td>24</td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td class="productimgname">
                                    <a class="product-img">
                                        <img src="{{asset('backend')}}/img/product/product9.jpg" alt="product">
                                    </a>
                                    <a href="javascript:void(0);">Earphones</a>
                                </td>
                                <td>PT009</td>
                                <td>Computers</td>
                                <td>N/D</td>
                                <td>15.00</td>
                                <td>2</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td class="productimgname">
                                    <a class="product-img">
                                        <img src="{{asset('backend')}}/img/product/product8.jpg" alt="product">
                                    </a>
                                    <a href="javascript:void(0);">Banana</a>
                                </td>
                                <td>PT010</td>
                                <td>Health Care	</td>
                                <td>N/D</td>
                                <td>5.00</td>
                                <td>4</td>
                                <td>16</td>
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>
@endsection