@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">


                
					@php 
					
                    $quantity = App\Models\Product::sum('quantity');
                    $qtyprice = App\Models\Product::sum('price');
                    $grandtotal = App\Models\Sale::sum('grandtotal');
                    $paid_amount = App\Models\Sale::sum('paid_amount');
                    $amount = App\Models\Expense::sum('amount');
                    // $depositsum = App\Models\Deposit::sum('damount');
                    // $withdrawsum = App\Models\Withdraw::sum('dwithdraw');

                    // Profit or Loss
                    // $p_price = App\Models\Product::sum('purchase_price');
                    // $s_price = App\Models\Sale::sum('grandtotal');

                @endphp

{{-- <div class="col-lg-3 col-sm-6 col-12">
    <div class="dash-widget">
        <div class="dash-widgetimg">
            <span><img src="{{ asset('backend') }}/img/icons/dash1.svg" alt="img"></span>
        </div>
        <div class="dash-widgetcontent">
            <h5><span class="counters" data-count="{{ $s_price-$p_price }}"></span></h5>
            <h6>Total Profit or Loss</h6>
        </div>
    </div>
</div> --}}

                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash1.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5><span class="counters" data-count="{{ $quantity}}"></span></h5>
                            <h6>Total Stock Qty</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash1.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="{{ $qtyprice}}"></span></h5>
                            <h6>Total Stock Amount</h6>
                        </div>
                    </div>
                </div>

         

                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash1.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="{{ $grandtotal}}"></span></h5>
                            <h6>Today Sale Amount</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget dash1">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash2.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="{{ $paid_amount}}"></span></h5>
                            <h6>Total Received Amount</h6>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget dash2">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash3.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="12000"></span></h5>
                            <h6>{{ trans('sidebar.dashboard.body.today purchase amount') }}</h6>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget dash3">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash4.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="5000"></span></h5>
                            <h6>{{ trans('sidebar.dashboard.body.today purchase paying amount') }} </h6>
                        </div>
                    </div>
                </div> --}}
                 {{-- <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash1.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="10000"></span></h5>
                            <h6> {{ trans('sidebar.dashboard.body.today sale return') }} </h6>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget dash1">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash2.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="7000"></span></h5>
                            <h6> {{ trans('sidebar.dashboard.body.today purchase return') }} </h6>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget dash2">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash3.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="{{ $amount}}"></span></h5>
                            <h6> Total Expense </h6>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget dash3">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash4.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="3000"></span></h5>
                            <h6>  {{ trans('sidebar.dashboard.body.today profite') }}  </h6>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash1.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="{{ $purchaseDue }}">{{ $purchaseDue }}</span></h5>
                            <h6>{{ trans('sidebar.dashboard.body.total_purchase_due') }}</h6>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget dash1">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash2.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="{{ $saleDue }}">${{ $saleDue }}</span></h5>
                            <h6>{{ trans('sidebar.dashboard.body.total_sales_due') }}</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12"></div>
                <div class="col-lg-3 col-sm-6 col-12"></div>
                {{-- <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget dash2">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash3.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="{{ $purchaseTotal }}">{{ $purchaseTotal }}</span></h5>
                            <h6> {{ trans('sidebar.dashboard.body.total_purchase') }}</h6>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget dash3">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash4.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="{{ $saleTotal }}">{{ $saleTotal }}</span></h5>
                            <h6>{{ trans('sidebar.dashboard.body.total_sale') }} </h6>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count">
                        <div class="dash-counts">
                            <h4>{{ $cusCount }}</h4>
                            <h5>{{ trans('sidebar.dashboard.body.customers') }}</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="user"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count das1">
                        <div class="dash-counts">
                            <h4>{{ $supCount }}</h4>
                            <h5>{{ trans('sidebar.dashboard.body.suppliers') }}</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="user-check"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count das2">
                        <div class="dash-counts">
                            <h4>{{$pCount}}</h4>
                            <h5>{{ trans('sidebar.dashboard.body.products') }}</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="file-text"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count das3">
                        <div class="dash-counts">
                            <h4>{{ $saleCount }}</h4>
                            <h5>{{ trans('sidebar.dashboard.body.sales') }}</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="file"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Button trigger modal -->

            <div class="row">
                <div class="col-lg-7 col-sm-12 col-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">{{ trans('sidebar.dashboard.body.purchase & sales') }}</h5>
                            <div class="graph-sets">
                                <ul>
                                    <li>
                                        <span>{{ trans('sidebar.dashboard.body.sales') }}</span>
                                    </li>
                                    <li>
                                        <span>{{ trans('sidebar.dashboard.body.purchase') }}</span>
                                    </li>
                                </ul>
                                <div class="dropdown">
                                    <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        2023 <img src="{{ asset('backend') }}/img/icons/dropdown.svg" alt="img"
                                            class="ms-2">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">2023</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">2022</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">2021</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">2020</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div id="sales_charts"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-12 col-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">{{ trans('sidebar.dashboard.body.recently added products') }}</h4>
                            <div class="dropdown">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"
                                    class="dropset">
                                    <i class="fa fa-ellipsis-v"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a href="{{ route('product.index') }}" class="dropdown-item">{{ trans('sidebar.dashboard.body.product list') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('product.create') }}" class="dropdown-item">{{ trans('sidebar.dashboard.body.product add') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive dataview">
                                <table class="table datatable ">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('table.add-product.sno') }}</th>
                                            <th>{{ trans('table.add-product.products') }}</th>
                                            <th>{{ trans('table.add-product.price') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                               {{-- @foreach ($recentProducts as $rp)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                        <td class="productimgname">
                                            <a href="productlist.html" class="product-img">
                                                <img src="{{ asset($rp->image) }}"
                                                    alt="product">
                                                </a>
                                                <a href="productlist.html">{{ $rp->name }}</a>
                                            </td>
                                            <td>{{ $rp->price }}</td>
                                        </tr>
                                        @endforeach --}}
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-0">
                <div class="card-body">
                    <h4 class="card-title">{{ trans('sidebar.dashboard.body.stock less products') }}</h4>
                    <div class="table-responsive dataview">
                        <table class="table datatable ">
                            <thead>
                                <tr>
                                    <th>{{ trans('table.stock.sno') }}</th>
                                    <th>{{ trans('table.stock.product code') }}</th>
                                    <th>{{ trans('table.stock.product name') }}</th>
                                    <th>{{ trans('table.stock.brand name') }}</th>
                                    <th>{{ trans('table.stock.category name') }}</th>
                                    <th>{{ trans('table.stock.stock') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                              {{-- @foreach ($recentProducts as $rp)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                        <td class="productimgname">
                                            <a href="productlist.html" class="product-img">
                                                <img src="{{ asset($rp->image) }}"
                                                    alt="product">
                                                </a>
                                                <a href="productlist.html">{{ $rp->name }}</a>
                                            </td>
                                            <td>{{ $rp->price }}</td>
                                        </tr>
                                        @endforeach --}}
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
