@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">

              
               

                <div class="col-md-10">
                    <center><h3> Daily Report</h3></center>
                    
                </div>

                @php 
                     $warehouses = Illuminate\Support\Facades\DB::table('warehouses')->where('id', 5)->first();
                     $warehouses2 = Illuminate\Support\Facades\DB::table('warehouses')->where('id', 4)->first();
                    //  print($data);
                @endphp




                <div class="col-md-2 d-flex justify-content-end" style="margin-top: -6px;">

                    

                    <select name="links" id="" size="1" onchange="window.location.href=this.value;" class="form-select form-select-lg mb-3" style="width: 2033px; height: 42px; font-size: 16px;">
                        <option selected="" disabled="">Choose Warehouse</option>
                     
                        {{-- <option value="{{route('warehouse.details',$warehouse->id)}}">Warehouse: {{ $warehouse->name }}</option> --}}
                       
                        {{-- <option value="{{ route('warehouse-2.report') }}"> {{ $warehouses->name}}</option>
                        <option value="{{ route('warehouse.report') }}"> {{ $warehouses2->name}}</option> --}}

                        <option value="{{ url('/admin/warehouse-one')}}"> {{ $warehouses->name}}</option>
                        <option value="{{ url('/admin/warehouse-two')}}"> {{ $warehouses2->name}}</option>
                        
                       
                      </select> &nbsp;&nbsp;

                    <select name="links" id="" size="1" onchange="window.location.href=this.value;" class="form-select form-select-lg mb-3" style="width: 143px; height: 42px; font-size: 16px;">
                        <option value="{{ url('/admin/dashboard')}}">Daily Report</option>
                        <option value="{{ url('/admin/dashboard-two')}}">Monthly Report</option>
                        <option value="{{ url('/admin/dashboard-three')}}">Yearly Report</option>
                      </select>

                      
                      
                      
                </div>
                
					@php 
					
                    $carbonToDay =  Carbon\Carbon::today();
                    $stockqty = App\Models\PurchaseItem::whereDate('created_at', $carbonToDay)->sum('quantity');
                    $stockamount= App\Models\Purchase::whereDate('created_at', $carbonToDay)->sum('grandtotal');
                    $saleamount= App\Models\Sale::whereDate('created_at', $carbonToDay)->sum('grandtotal');
                    $receiveamount= App\Models\Sale::whereDate('created_at', $carbonToDay)->sum('paid_amount');
                    $dueamount= App\Models\Sale::whereDate('created_at', $carbonToDay)->sum('due_amount');
                    $emipay= App\Models\CustomerPayment::whereDate('created_at', $carbonToDay)->sum('paying_amount');

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
                    <div class="dash-widget">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash1.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5><span class="counters" data-count="{{ $stockqty}}"></span></h5>
                            <h6>Daily Stock Qty</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="dash-widget">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash1.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="{{ $stockamount}}"></span></h5>
                            <h6>Daily Stock Amount</h6>
                        </div>
                    </div>
                </div>

         

                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="dash-widget">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash1.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="{{ $saleamount}}"></span></h5>
                            <h6>Daily Sale Amount</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="dash-widget dash1">
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
                    <div class="dash-widget dash2">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash3.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="{{ $dueamount}}"></span></h5>
                            <h6> Daily Due Amount </h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="dash-widget dash2">
                        <div class="dash-widgetimg">
                            <span><img src="{{ asset('backend') }}/img/icons/dash3.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="{{ $emipay}}"></span></h5>
                            <h6> Daily EMI Pay Amount </h6>
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
            


            <!-- Calculator -->
            <div class="modal1">
                <div class="modal-content1">
                  <span class="close-button1">&times;</span>
                

                  <h4 class="hcenter">Calculator</h4>

                  <!-- Table to show calculator -->
                  <table class="center1 table1">
                  
                    <!-- row to have result display and clear result  -->
                    <tr>
                      <td colspan="3" class="td1">
                        <input type="text" id="result" />
                      </td>
                  
                      <!-- clearResult() function will clear result textbox -->
                      <td class="td1">
                        <input type="button" value="c" onclick="clearResult()" />
                      </td>
                    </tr>
                  
                    <!-- numeric and operator button rows starts  -->
                    <!-- create button and assign value to each button -->
                    <tr>
                      <!-- displayValue("1") will be called -->
                      <td class="td1"><input type="button" value="1" onclick="displayValue('1')" /> </td>
                      <td class="td1"><input type="button" value="2" onclick="displayValue('2')" /> </td>
                      <td class="td1"><input type="button" value="3" onclick="displayValue('3')" /> </td>
                      <td class="td1"><input type="button" value="/" onclick="displayValue('/')" /> </td>
                    </tr>
                    <tr>
                      <td class="td1"><input type="button" value="4" onclick="displayValue('4')" /> </td>
                      <td class="td1"><input type="button" value="5" onclick="displayValue('5')" /> </td>
                      <td class="td1"><input type="button" value="6" onclick="displayValue('6')" /> </td>
                      <td class="td1"><input type="button" value="-" onclick="displayValue('-')" /> </td>
                    </tr>
                    <tr>
                      <td class="td1"><input type="button" value="7" onclick="displayValue('7')" /> </td>
                      <td class="td1"><input type="button" value="8" onclick="displayValue('8')" /> </td>
                      <td class="td1"><input type="button" value="9" onclick="displayValue('9')" /> </td>
                      <td class="td1"><input type="button" value="+" onclick="displayValue('+')" /> </td>
                    </tr>
                    
                    <!-- last row  -->
                    <tr>
                      <td class="td1"><input type="button" value="." onclick="displayValue('.')" /> </td>
                      <td class="td1"><input type="button" value="0" onclick="displayValue('0')" /> </td>
                  
                      <!-- solve() will evaluate value and display to result -->
                      <td class="td1"><input type="button" value="=" onclick="solve()" /> </td>
                  
                      <td class="td1"><input type="button" value="*" onclick="displayValue('*')" /> </td>
                    </tr>
                    <!-- numeric and operator button rows ends  -->
                  </table>

                </div>
              </div>

         


        </div>
    </div>
@endsection
