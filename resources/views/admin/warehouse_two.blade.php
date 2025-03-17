@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                @php 
                $warehouses = Illuminate\Support\Facades\DB::table('warehouses')->where('id', 5)->first();
                $warehouses2 = Illuminate\Support\Facades\DB::table('warehouses')->where('id', 4)->first();
               //  print($data);
           @endphp
              
                

                <div class="col-md-10">
                    <center><h3>Warehouse: {{ $warehouses2->name}}</h3></center>
                </div>

                

                    


                <div class="col-md-2 d-flex justify-content-end" style="margin-top: -6px;">

                    <select name="links" id="" size="1" onchange="window.location.href=this.value;" class="form-select form-select-lg mb-3" style="width: 2033px; height: 42px; font-size: 16px;">
                       
                     
                        {{-- <option value="{{route('warehouse.details',$warehouse->id)}}">Warehouse: {{ $warehouse->name }}</option> --}}
                       
                        {{-- <option value="{{ route('warehouse-2.report') }}"> {{ $warehouses->name}}</option>
                        <option value="{{ route('warehouse.report') }}"> {{ $warehouses2->name}}</option> --}}

                        <option value="{{ url('/admin/warehouse-two')}}"> {{ $warehouses2->name}}</option>
                        <option value="{{ url('/admin/warehouse-one')}}"> {{ $warehouses->name}}</option>
                        
                       
                      </select> &nbsp;&nbsp;

                    {{-- <select name="links" id="" size="1" onchange="window.location.href=this.value;" class="form-select form-select-lg mb-3" style="width: 173px; height: 42px; font-size: 16px;">
                        <option disabled selected>Choose Report</option>
                        <option value="{{ url('/admin/dashboard')}}">Daily Report</option>
                        <option value="{{ url('/admin/dashboard-two')}}">Monthly Report</option>
                        <option value="{{ url('/admin/dashboard-three')}}">Yearly Report</option>
                      </select> --}}
                      
                      
                </div>
                
					@php 

$stockqty = App\Models\Product::where('warehouse_id', 4)->sum('quantity');
$stockamount= App\Models\Purchase::where('warehouse_id', 4)->sum('grandtotal');
$saleamount= App\Models\Sale::where('warehouse_id', 4)->sum('grandtotal');
$receiveamount= App\Models\Sale::where('warehouse_id', 4)->sum('paid_amount');
$dueamount= App\Models\Sale::where('warehouse_id', 4)->sum('due_amount');

					
                    // $carbonToDay =  Carbon\Carbon::today();
                    // $stockqty = App\Models\PurchaseItem::whereDate('created_at', $carbonToDay)->sum('quantity');
                    // $stockamount= App\Models\Purchase::whereDate('created_at', $carbonToDay)->sum('grandtotal');
                    // $saleamount= App\Models\Sale::whereDate('created_at', $carbonToDay)->sum('grandtotal');
                    // $receiveamount= App\Models\Sale::whereDate('created_at', $carbonToDay)->sum('paid_amount');
                    // $dueamount= App\Models\Sale::whereDate('created_at', $carbonToDay)->sum('due_amount');
                    // $emipay= App\Models\CustomerPayment::whereDate('created_at', $carbonToDay)->sum('paying_amount');

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

                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="dash-widget sherazi1">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash1.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5><span class="counters" data-count="{{ $stockqty}}"></span></h5>
                            <h6>Total Stock Qty</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="dash-widget sherazi2">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash1.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="{{ $stockamount}}"></span></h5>
                            <h6>Total Stock Amount</h6>
                        </div>
                    </div>
                </div>

         

                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="dash-widget sherazi3">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash1.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="{{ $saleamount}}"></span></h5>
                            <h6>Total Sale Amount</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="dash-widget dash1 sherazi3">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash2.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="{{ $receiveamount}}"></span></h5>
                            <h6>Daily Received Amount</h6>
                        </div>
                    </div>
                </div>
            
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="dash-widget dash2 sherazi1">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash3.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="{{ $dueamount}}"></span></h5>
                            <h6> Daily Due Amount </h6>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-4 col-sm-6 col-12">
                    <div class="dash-widget dash2">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash3.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="{{ $emipay}}"></span></h5>
                            <h6> Daily EMI Pay Amount </h6>
                        </div>
                    </div>
                </div> --}}
                
                

                
               
                
            
               
              
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
                                        @php 
                                            $recentProducts = App\Models\Product::latest()->paginate(5);
                                        @endphp
                               @foreach ($recentProducts as $rp)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                        <td class="productimgname">
                                            <a  class="product-img">
                                                @if($rp->image)
                                                <img src="{{ asset($rp->image) }}"
                                                    alt="product">
                                                    @else 
                                                    <img src="{{ asset('backend\img\img-01.jpg')}}" alt="product">
                                                    @endif
                                                </a>
                                                <a >{{ $rp->name }}</a>
                                            </td>
                                            <td>{{ $rp->price }}</td>
                                        </tr>
                                        @endforeach
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         


        </div>
    </div>
@endsection
